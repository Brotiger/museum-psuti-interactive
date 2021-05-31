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
    public function graduate_more($name, $id = null){
        $storageServer = '';

        if($name == "pguty"){
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
            'storageServer' => $storageServer
        ];

        if(isset($id)){
            $graduate = Graduate::where([
                ['id', $id],
            ])->get()->first();
            if($graduate->exists()){
                $params['graduate'] = $graduate;
            }else{
                return redirect(route('graduates_list'));
            }
        }

        return view('graduateMore', $params);
    }

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
        if($request->input("exitYearFrom") != null){
            $filter[] = ["exitYear", ">=", $request->input("exitYearFrom")];
            $next_query['exitYearFrom'] = $request->input("exitYearFrom");
        }
        if($request->input("exitYearTo") != null){
            $filter[] = ["exitYear", "<", $request->input("exitYearTo")];
            $next_query['exitYearTo'] = $request->input("exitYearTo");
        }

        $graduates = Graduate::where($filter)->orderBy("lastName")->paginate(20);

        return view('graduatesList', [
            'graduates' => $graduates,
            'next_query' => $next_query,
            'name' => $titleName
        ]);
    }
}
