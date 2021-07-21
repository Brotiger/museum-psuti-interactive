<?php
namespace App\Services;

class YoutubeApi{
    public function getSnippet($video_id){
        $key = env('YoutubeApiKey');
        $result = json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/videos?part=snippet&id=".$video_id."&key=".$key), true);

        if(!empty($result['items'][0]['snippet']['thumbnails']['maxres'])){
            $url = $result['items'][0]['snippet']['thumbnails']['maxres']['url'];
        }else{
            $url = $result['items'][0]['snippet']['thumbnails']['standard']['url'];
        }

        return $url;
    }
}