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

class EmployeeController extends Controller
{
    public function edit_employee($id = null){
        $file_size = FileSize::where('name', 'file')->exists()? FileSize::where('name', 'file')->first()['size'] : 0;
        $photo_size = FileSize::where('name', 'photo')->exists()? FileSize::where('name', 'photo')->first()['size'] : 0;
        $video_size = FileSize::where('name', 'video')->exists()? FileSize::where('name', 'video')->first()['size'] : 0;

        $units = Unit::orderBy('fullUnitName')->get();
        $counter = Employee::where('addUserId', Auth::user()->id)->get()->count();
        $params = [
            'units' => $units,
            'counter' => $counter,
            'id' => $id,
            'file_size' => $file_size,
            'photo_size' => $photo_size,
            'video_size' => $video_size
        ];
        if(isset($id)){
            $employee = Employee::where([
                ['id', $id],
                ['addUserId', Auth::user()->id]
            ]);
            if($employee->exists()){
                $params['id'] = $id;
                $params['employee'] = $employee->get()->first();
            }else{
                return redirect(route('employees_list'));
            }
        }

        return view('employeesEdit', $params);
    }

    public function employees_list(Request $request){
        $filter = [];
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
        if($request->input("firedFrom") != null){
            $filter[] = ["fired", ">=", $request->input("firedFrom")];
            $next_query['firedFrom'] = $request->input("firedFrom");
        }
        if($request->input("firedTo") != null){
            $filter[] = ["fired", "<", $request->input("firedTo")];
            $next_query['firedTo'] = $request->input("firedTo");
        }

        $employees = Employee::where($filter)->orderBy("firstName")->paginate(3);

        return view('employeesList', [
            'employees' => $employees,
            'next_query' => $next_query,
            'name' => 'ПГУТИ'
        ]);
    }
}
