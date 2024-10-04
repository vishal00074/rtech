<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\MarsRover;

class MarsRoverController extends Controller
{
    public function MarsRoverApi()
     {
         die;
        for($i =0; $i < 100; $i++)
        {
           
            $data = "https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&page=".$i."&api_key=Ba6H9zFJhKTlSwl5bt7DqsuG9D8cF1tyZi8sL3DL";
           
       
            $json = json_decode(file_get_contents($data), true);
            $singleArray = $json['photos'];
            

            
            if(!empty($singleArray)){
                foreach($singleArray as $item){
                   
                  $image =  $item['img_src'];
                  
                  $json_encode = json_encode($item);
                    
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
                        file_put_contents(public_path('mars/' . $uniqueName), file_get_contents($img_url));
        
                        // Get the URL of the saved image
                        $imageUrl = 'mars/' . $uniqueName;

                        $slug = $json_encode->full_name.$json_encode->id; 
                        
                        $data = [
                            'json_data'=> $json_encode,
                            'image' =>$imageUrl,
                            'name' => $json_encode->full_name,
                            'slug' =>\Str::slug($slug)
                            ];
                        MarsRover::create($data);  
                        sleep(5);
                        
                       }
                 }
            }else{
                break;
            }
        } 
        
    }

}
