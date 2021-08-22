<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\HeroReward;
use App\Models\HeroPhoto;
use App\Models\HeroVideo;
use Illuminate\Support\Facades\DB;

class HeroController extends Controller
{
    public function heroes_list(Request $request){

        DB::setDefaultConnection('pguty');

        $filter = [];
        $postFilter = [];

        $next_query = [
            'lastName' => '',
            'firstName' => '',
            'secondName' => '',
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

        $heroes = Hero::where($filter)->orderBy("lastName")->paginate(18);

        return view('heroesList', [
            'heroes' => $heroes,
            'next_query' => $next_query,
            'moreType' => 'hero_more'
        ]);
    }

    public function hero_more($id = null){
        DB::setDefaultConnection('pguty');

        $params = [
            'storageServer' => env('PGUTY_STORAGE') . '/storage/',
        ];

        if(isset($id)){
            $hero = Hero::where([
                ['id', $id],
            ])->get()->first();
            if($hero->exists()){

                foreach($hero->videos as $index => $video){
                    $snippet = YoutubeApiService::getSnippet($video->video);
                    $hero->videos[$index]['snippet'] = $snippet;
                }

                $params['hero'] = $hero;
            }else{
                return redirect(route('heroes_list'));
            }
        }

        return view('heroMore', $params);
    }
}
