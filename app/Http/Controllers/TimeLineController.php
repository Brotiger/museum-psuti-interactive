<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Employee;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimeLineController extends Controller
{
    public function index(Request $request, $name){
        if($name == "pguty"){
            DB::setDefaultConnection('pguty');
            $titleName = "КЭИС ПИИРС ПГАТИ ПГУТИ";
            $site = "pguty";
        }else if($name == "ks"){
            DB::setDefaultConnection('ks');
            $titleName = "КС ПГУТИ";
            $site = "ks";
        }else{
            return;
        }

        $filterEvent = [
            ["date", ">=", Carbon::parse("1957-01-01")],
            ["date", "<=", date("Y-m-d")]
        ];

        $filterEmployee = [
            ["hired", ">=", Carbon::parse("1957-01-01")],
            ["hired", "<=", date("Y-m-d")]
        ];

        $filterUnit = [
            ["creationDate", ">=", Carbon::parse("1957-01-01")],
            ["creationDate", "<=", date("Y-m-d")]
        ];

        if($request->input('dateFrom') && $request->input('dateTo')){
            $filterUnit = [];
            $filterEmployee = [];
            $filterEvent = [];

            if($request->input('dateFrom') <= $request->input('dateTo')){
                $filterEvent[] = ["date", ">=", Carbon::parse($request->input('dateFrom'))];
                $filterEvent[] = ["date", "<=", Carbon::parse($request->input('dateTo'))];

                $filterUnit[] = ["creationDate", ">=", Carbon::parse($request->input('dateFrom'))];
                $filterUnit[] = ["creationDate", "<=", Carbon::parse($request->input('dateTo'))];

                $filterEmployee[] = ["hired", ">=", Carbon::parse($request->input('dateFrom'))];
                $filterEmployee[] = ["hired", "<=", Carbon::parse($request->input('dateTo'))];
            }else{
                $filterEvent[] = ["date", "<=", Carbon::parse($request->input('dateFrom'))];
                $filterEvent[] = ["date", ">=", Carbon::parse($request->input('dateTo'))];

                $filterUnit[] = ["creationDate", "<=", Carbon::parse($request->input('dateFrom'))];
                $filterUnit[] = ["creationDate", ">=", Carbon::parse($request->input('dateTo'))];

                $filterEmployee[] = ["hired", "<=", Carbon::parse($request->input('dateFrom'))];
                $filterEmployee[] = ["hired", ">=", Carbon::parse($request->input('dateTo'))];
            }
        }

        $events = Event::where($filterEvent)->orderBy('name')->limit(7)->get();
        $employees = Employee::where($filterEmployee)->orderBy('lastName')->limit(7)->get();
        $units = Unit::where($filterUnit)->orderBy('fullUnitName')->limit(7)->get();

        if($request->ajax()){
            $response = [];

            $response['events'] = view('ajax.events', [
                'events' => $events
            ])->render();

            $response['employees'] = view('ajax.employees', [
                'employees' => $employees
            ])->render();

            $response['units'] = view('ajax.units', [
                'units' => $units
            ])->render();

            return $response;
        }

        $storageServer = env("PGUTY_STORAGE").'/storage/';

        return view('timeLine', [
            'site' => $site,
            'titleName' => $titleName,
            'events' => $events,
            'employees' => $employees,
            'units' => $units,
            'storageServer' => $storageServer
        ]);
    }
}
