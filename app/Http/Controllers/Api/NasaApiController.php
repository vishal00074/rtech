<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\{Epic, PexelsVideo, Apod};
use Illuminate\Support\Facades\Http;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class NasaApiController extends Controller
{
     public function EpicApi()
     {
        $client = new Client();

        $now = Carbon::now()->subDays(2);
        
        $date = $now->format('Y-m-d');
        
        $imageDate = $now->format('Y/m/d');
        
        
        $url = 'https://api.nasa.gov/EPIC/api/natural/date/'.$date.'?api_key=Ba6H9zFJhKTlSwl5bt7DqsuG9D8cF1tyZi8sL3DL';
        
        $response = $client->get($url);
       
        $json = json_decode(file_get_contents($url), true);
        
    
       
        foreach($json as $item)
        {
            
            $json_encode = json_encode($item);
           
            $image = "https://api.nasa.gov/EPIC/archive/natural/".$imageDate."/png/".$item['image'].".png?api_key=Ba6H9zFJhKTlSwl5bt7DqsuG9D8cF1tyZi8sL3DL";
            $imageUrl ='';
            if (!empty($image)) {
                $img_url= $image;
                
                $uniqueId = uniqid();
                $prefix = 'thumbnail_';
                $uniqueName = $prefix . $uniqueId . '_' . time();

            
                $uniqueId = uniqid();
                $prefix = 'thumbnail_';
                $uniqueName = $prefix . $uniqueId . '_' . time() . '.jpg';

                // Save the image to the local storage
                file_put_contents(public_path('epic/' . $uniqueName), file_get_contents($img_url));

                // Get the URL of the saved image
                $imageUrl = 'epic/' . $uniqueName;

                $name = json_decode($json_encode);
                $slug = $name->caption.$name->identifier;
                
                $data = [
                    'json_data'=> $json_encode,
                    'image' =>$imageUrl,
                    'slug' => $slug,
                    ];
                    
                Epic::create($data);  
                sleep(5);
            
             }
        } 
        
    }


    public function pexelsVideoPage()
    {
       for($i=3; $i < 13; $i++){
        $this->pexelsVideo($i);
       }
    }

    public function pexelsVideo($i)
    {
        $url = "https://api.pexels.com/videos/search";

        $query= 'astronomy';
        $page = $i;

        $response = Http::withHeaders([
            'Authorization' => env('PEXELS_API_KEY'), 
        ])->get($url, [
            'query' => $query,    
            'per_page' => $page         
        ]);
        if ($response->successful()) {
            
            $data = $response->json();
           
            foreach($data['videos'] as $item)
            {

                    $video = $item['video_files'][0];
             
                    $ext =  str_replace("video/","",$video['file_type'][0]);

                    $uniqueName = $video['id'] . '.' . $ext;

                    $isExists = PexelsVideo::where('video_id',  $item['id'])->first();

                    if(!$isExists){
                        file_put_contents(public_path('pexels_video/' . $uniqueName), file_get_contents($video['link']));
                        $videoUrl = 'pexels_video/' . $uniqueName;
                        $data = [
                            "video_id" => $item['id'],
                            "category" =>  $query,
                            "quality" => $video['quality'],
                            "file_type" => $video['file_type'],
                            "width" => $video['width'],
                            "height" => $video['height'],
                            "fps" => $video['fps'],
                            "link" => $videoUrl,
                            "size" => $video['size']
                            ];
                        PexelsVideo::create($data);
                    }
            }
            
        } else {
            
        }
    }


    public function ApodApi()
    {

        $now = Carbon::now()->subday(1);
        $date = $now->format('Y-m-d');
        $url = 'https://api.nasa.gov/planetary/apod?api_key=Ba6H9zFJhKTlSwl5bt7DqsuG9D8cF1tyZi8sL3DL&date='.$date;
       
        $json = json_decode(file_get_contents($url), true);

        $imageUrl ='';
        if (!empty($json['url'])) {
            $img_url= $json['url'];

            $fileType= 'jpg';
            $uniqueId = uniqid();
            $prefix = 'thumbnail_';
            $uniqueName = $prefix . $uniqueId . '_' . time() .'.'.$fileType;

            file_put_contents(public_path('apod/' . $uniqueName), file_get_contents($img_url));

            
            $imageUrl = 'apod/' . $uniqueName;

            $slug = $json['title'].$json['copyright'];
            
            $data = [
                'copyright' => $json['copyright'] ?? '',
                'date' => $json['date'] ?? '',
                'explanation' =>$json['explanation'] ?? '' ,
                'hdurl' => $json['hdurl'] ?? '',
                'media_type' => $json['media_type'] ?? '',
                'service_version' => $json['service_version'] ?? '',
                'title' => $json['title'] ?? '',
                'url' => $imageUrl,
                'slug' =>\Str::slug($slug)
                ];
            Apod::create($data);  
            
        } 
    }

    public function UpdateSlug()
    {
        $slug  = Epic::select('*')->get();

        foreach($slug as $item)
        {
            $json_data =  json_decode($item->json_data);
            $slug = SlugService::createSlug(Epic::class, 'slug', $json_data->caption);
            Epic::where('id', $item->id)->update(['slug' =>$slug]);
        }
        return 1;
    }

}
