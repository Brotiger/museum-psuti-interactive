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
        if($name == "pguty" || $name == "psuti"){
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
            ["date", ">=", Carbon::parse("1956-01-01")],
            ["date", "<=", Carbon::parse("1956-12-31")]
        ];

        $filterEmployee = [
            ["hired", ">=", Carbon::parse("1956-01-01")],
            ["hired", "<=", Carbon::parse("1956-12-31")]
        ];

        $filterUnit = [
            ["creationDate", ">=", Carbon::parse("1956-01-01")],
            ["creationDate", "<=", Carbon::parse("1956-12-31")]
        ];

        $filterYearEvent = $filterEvent;
        $filterYearEmployee = $filterEmployee;
        $filterYearUnit = $filterUnit;

        if($request->input('dateFrom') && $request->input('dateTo')){
            $filterUnit = [];
            $filterEmployee = [];
            $filterEvent = [];

            $filterYearEvent = [];
            $filterYearEmployee = [];
            $filterYearUnit = [];

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

            $daysInLastMonthYear = str_pad(cal_days_in_month(CAL_GREGORIAN, 12, $request->input('year')), 2, "0", STR_PAD_LEFT);
            
            $from = Carbon::parse($request->input('year') . '-01-01');
            $to = Carbon::parse($request->input('year') . '-12-'. $daysInLastMonthYear);

            $filterYearEvent[] = ["date", ">=", $from];
            $filterYearEvent[] = ["date", "<=", $to];

            $filterYearEmployee[] = ["hired", ">=", $from];
            $filterYearEmployee[] = ["hired", "<=", $to];

            $filterYearUnit[] = ["creationDate", ">=", $from];
            $filterYearUnit[] = ["creationDate", "<=", $to];
        }

        $maxRecordCount = 10;

        $events = Event::where($filterEvent)->orderBy('name')->limit($maxRecordCount)->get();
        $employees = Employee::where($filterEmployee)->orderBy('lastName')->limit($maxRecordCount)->get();
        $units = Unit::where($filterUnit)->orderBy('fullUnitName')->limit($maxRecordCount)->get();

        $events_count = Event::where($filterYearEvent)->count();
        $employees_count = Employee::where($filterYearEmployee)->count();
        $units_count = Unit::where($filterYearUnit)->count();

        $month = false;

        if($events_count > $maxRecordCount || $employees_count > $maxRecordCount || $units_count > $maxRecordCount){
            $month = true;
        }

        if($request->ajax()){

            $response = [];

            $response['month'] = $month;

            $response['events'] = view('ajax.events', [
                'events' => $events,
                'maxRecordCount' => $maxRecordCount
            ])->render();

            $response['employees'] = view('ajax.employees', [
                'employees' => $employees,
                'maxRecordCount' => $maxRecordCount
            ])->render();

            $response['units'] = view('ajax.units', [
                'units' => $units,
                'maxRecordCount' => $maxRecordCount
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
            'storageServer' => $storageServer,
            'month' => $month,
            'maxRecordCount' => $maxRecordCount
        ]);
    }
}
