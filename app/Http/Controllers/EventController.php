<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

use YoutubeApiService;

class EventController extends Controller
{
    public function event_more($name, $id = null){
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
            'storageServer' => $storageServer
        ];

        if(isset($id)){
            $event = Event::where([
                ['id', $id],
            ])->get()->first();
            if($event->exists()){
                foreach($event->videos as $index => $video){
                    $snippet = YoutubeApiService::getSnippet($video->video);
                    $event->videos[$index]['snippet'] = $snippet;
                }

                $params['event'] = $event;
            }else{
                return redirect(route('events_list'));
            }
        }

        return view('eventMore', $params);
    }

    public function events_list(Request $request, $name){
        $titleName = '';
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
        $next_query = [
            'name' => '',
            'dateFrom' => '',
            'dateTo' => '',
        ];

        if($request->input("name") != null){
            $filter[] = ["name", "like", '%' . $request->input("name") . '%'];
            $next_query['name'] = $request->input("name");
        }
        if($request->input("dateFrom") != null){
            $filter[] = ["date", ">=", $request->input("dateFrom")];
            $next_query['dateFrom'] = $request->input("dateFrom");
        }
        if($request->input("dateTo") != null){
            $filter[] = ["date", "<=", $request->input("dateTo")];
            $next_query['dateTo'] = $request->input("dateTo");
        }

        $events = Event::where($filter)->orderBy("name")->paginate(18);

        return view('eventsList', [
            'events' => $events,
            'next_query' => $next_query,
            'titleName' => $titleName,
            'name' => $name,
            'moreType' => 'event_more'
        ]);
    }
}
