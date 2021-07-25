<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

use YoutubeApiService;

class PageController extends Controller
{
    public function index(Request $request, $alias){
        DB::setDefaultConnection('pguty');

        $page = Page::where('alias', $alias)->first();

        foreach($page->videos as $index => $video){
            $snippet = YoutubeApiService::getSnippet($video->video);
            $page->videos[$index]['snippet'] = $snippet;
        }

        $storageServer = env('PGUTY_STORAGE');
        $storageServer .= '/storage/';

        return view('page', [
            'page' => $page,
            'storageServer' => $storageServer
        ]);
    }
}
