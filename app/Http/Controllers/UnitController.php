<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;

class UnitController extends Controller
{
    public function unit_more($name, $id = null){
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

        $units = Unit::orderBy('fullUnitName')->get();

        $params = [
            'storageServer' => $storageServer
        ];

        if(isset($id)){
            $unit = Unit::where([
                ['id', $id],
            ])->get()->first();
            if($unit->exists()){
                $params['unit'] = $unit;
            }else{
                return redirect(route('units_list'));
            }
        }

        return view('unitMore', $params);
    }

    public function units_list(Request $request, $name){
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
            'fullUnitName' => '',
            'shortUnitName' => '',
            'typeUnit' => '',
            'creationDateFrom' => '',
            'creationDateTo' => '',
        ];

        if($request->input("fullUnitName") != null){
            $filter[] = ["fullUnitName", "like", '%' . $request->input("fullUnitName") . '%'];
            $next_query['fullUnitName'] = $request->input("fullUnitName");
        }
        if($request->input("shortUnitName") != null){
            $filter[] = ["shortUnitName", "like", '%' . $request->input("shortUnitName") . '%'];
            $next_query['shortUnitName'] = $request->input("shortUnitName");
        }
        if($request->input("typeUnit") != null){
            $filter[] = ["typeUnit", "like", '%' . $request->input("typeUnit") . '%'];
            $next_query['typeUnit'] = $request->input("typeUnit");
        }
        if($request->input("creationDateFrom") != null){
            $filter[] = ["creationDate", ">=", $request->input("creationDateFrom")];
            $next_query['creationDateFrom'] = $request->input("creationDateFrom");
        }
        if($request->input("creationDateTo") != null){
            $filter[] = ["creationDate", "<=", $request->input("creationDateTo")];
            $next_query['creationDateTo'] = $request->input("creationDateTo");
        }

        $units = Unit::where($filter)->orderBy("fullUnitName")->paginate(17);

        return view('unitsList', [
            'units' => $units,
            'next_query' => $next_query,
            'name' => $titleName
        ]);
    }
}
