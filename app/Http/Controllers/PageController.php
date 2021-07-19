<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

class PageController extends Controller
{
    public function index(Request $request, $id){
        DB::setDefaultConnection('pguty');

        $page = Page::where('id', $id)->first();

        $storageServer = env('PGUTY_STORAGE');
        $storageServer .= '/storage/';

        return view('page', [
            'page' => $page,
            'storageServer' => $storageServer
        ]);
    }
}
