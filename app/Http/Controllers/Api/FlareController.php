<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\Flare;

class FlareController extends Controller
{
    public function FlareApi()
    {
       $now = Carbon::now()->subDays(1);       
       $date = $now->format('Y-m-d');

       $url = 'https://api.nasa.gov/DONKI/FLR?startDate='.$date.'&endDate='.$date.'&api_key=Ba6H9zFJhKTlSwl5bt7DqsuG9D8cF1tyZi8sL3DL';
     
       $json = file_get_contents($url);


       Flare::create(['json_data'=> $json]);  
   }

}
