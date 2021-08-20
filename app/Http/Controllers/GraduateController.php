<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Graduate;
use App\Models\Degree;
use App\Models\Photo;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GraduateController extends Controller
{
    public function graduates_list(Request $request, $name){
        $titleName = '';
        if($name == "pguty"){
            DB::setDefaultConnection('pguty');
            $titleName = "ПГУТИ";
        }else if($name == "ks"){
            DB::setDefaultConnection('ks');
            $titleName = "КС ПГУТИ";
        }else{
            return;
        }

        $filter = [];
        $next_query = [
            'lastName' => '',
            'firstName' => '',
            'secondName' => '',
            'exitYearFrom' => '',
            'exitYearTo' => '',
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
        if($request->input("exitYear") != null){
            $filter[] = ["exitYear", "=", $request->input("exitYear")];
            $next_query['exitYear'] = $request->input("exitYear");
        }
        if($request->input("specialtyName") != null){
            $filter[] = ["specialtyName", "like", '%' . $request->input("specialtyName") . '%'];
            $next_query['specialtyName'] = $request->input("specialtyName");
        }

        $graduates = Graduate::where($filter)->orderBy("lastName")->paginate(18);

        return view('graduatesList', [
            'graduates' => $graduates,
            'next_query' => $next_query,
            'name' => $titleName
        ]);
    }
}
