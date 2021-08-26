<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Education;
use App\Models\Degree;
use App\Models\Title;
use App\Models\Reward;
use App\Models\Attainment;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Unit;
use App\Models\User;
use App\Models\FileSize;
use App\Models\UnitEmployee;
use App\Models\PersonalFile;
use App\Models\AutobiographyFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use YoutubeApiService;

class EmployeeController extends Controller
{
    public function employee_more($name, $id = null){
        $storageServer = '';

        if($name == "pguty" || $name == "psuti"){
            DB::setDefaultConnection('pguty');
            $storageServer = env('PGUTY_STORAGE');
        }else if($name == "ks"){
            DB::setDefaultConnection('ks');
            $storageServer = env('PGUTY_KS_STORAGE');
        }else{
            return;
        }

        $storageServer .= '/storage/';

        $params = [
            'storageServer' => $storageServer,
            'name' => $name
        ];

        if(isset($id)){
            $employee = Employee::where([
                ['id', $id],
            ])->get()->first();
            if($employee->exists()){

                foreach($employee->videos as $index => $video){
                    $snippet = YoutubeApiService::getSnippet($video->video);
                    $employee->videos[$index]['snippet'] = $snippet;
                }

                $params['employee'] = $employee;
            }else{
                return redirect(route('employees_list'));
            }
        }

        return view('employeeMore', $params);
    }

    public function employees_list(Request $request, $name, $post = null){

        $titleName = '';
        $role = "сотрудников";
        $postfix = "";

        if($name == "pguty" || $name == "psuti"){
            DB::setDefaultConnection('pguty');
            $titleName = "ПГУТИ";
        }else if($name == "ks"){
            DB::setDefaultConnection('ks');
            $titleName = "КС ПГУТИ";
        }else{
            return;
        }

        $filter = [];
        $postFilter = [];

        $next_query = [
            'lastName' => '',
            'firstName' => '',
            'secondName' => '',
            'firedFrom' => '',
            'firedTo' => '',
        ];

        if($request->input("lastName") != null){
            $filter[] = ["lastName", "like", '%' . $request->input("lastName") . '%'];
            $next_query['lastName'] = $request->input("lastName");
        }
        if($request->input("firstName") != null){
            $filter[] = ["firstName", "like", '%' . $request->input("firstName") . '%'];
            $next_query['firstName'] = $request->input("firstName");
        }
        if($request->input("secondName") != null){
            $filter[] = ["secondName", "like", '%' . $request->input("secondName") . '%'];
            $next_query['secondName'] = $request->input("secondName");
        }
        if($request->input("hiredFrom") != null){
            $filter[] = ["hired", ">=", $request->input("hiredFrom")];
            $next_query['hiredFrom'] = $request->input("hiredFrom");
        }
        if($request->input("hiredTo") != null){
            $filter[] = ["hired", "<=", $request->input("hiredTo")];
            $next_query['hiredTo'] = $request->input("hiredTo");
        }

        if($post){
            if($post != "Участники ВОВ"){
                $postFilter[] = ['post', "like", $post . '%'];

                $employees = Employee::where($filter)->with('units')->whereHas('units', function($q) use ($postFilter){
                    $q->where($postFilter);
                })->with(['units' => function($query){
                    $query->orderBy('recruitmentDate', 'DESC');
                }])->orderBy("lastName")->paginate(18);

                if($post == "Декан"){
                    $role = "деканов";
                }else if ($post == "Проректор"){
                    $role = "проректоров";
                }else if ($post == "Заведующий кафедрой"){
                    $role = "заведующих кафедрами";
                }else if ($post == "Деректор"){
                    $role = "деректоров";
                }
            }else{
                $filter[] = ['wwii', 1];
                $postfix = " - участники Великой Отечественной войны";
                $employees = Employee::where($filter)->with(['units' => function($query){
                    $query->orderBy('recruitmentDate', 'DESC');
                }])->orderBy("lastName")->paginate(18);
            }

        }else{
            $employees = Employee::where($filter)->with(['units' => function($query){
                $query->orderBy('recruitmentDate', 'DESC');
            }])->orderBy("lastName")->paginate(18);
        }

        return view('employeesList', [
            'employees' => $employees,
            'next_query' => $next_query,
            'titleName' => $titleName,
            'name' => $name,
            'role' => $role,
            'moreType' => 'employee_more',
            'postfix' =>  $postfix
        ]);
    }
}
