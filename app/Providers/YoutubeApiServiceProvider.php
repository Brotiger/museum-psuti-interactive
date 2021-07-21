<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class YoutubeApiServiceProvider extends ServiceProvider {
    public function register(){
        $this->app->bind('YoutubeApi', 'App\Services\YoutubeApi');
    }
}