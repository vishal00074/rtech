<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{MarsRover, Epic, PexelsVideo};
use URL;
use Carbon\Carbon;
class EarthController extends Controller
{
    public function EarthGallery(Request $request)
    {
        $earthImages = Epic::orderby('created_at','desc')->paginate(12);
        foreach($earthImages as $epic){
            $epic->json_data =  json_decode($epic->json_data);
            $epic->image = URL::to('/'). '/public/'.$epic->image;   
            $date =  Carbon::parse($epic->json_data->date);
            $epic->json_data->date = $date->format('d F Y g:i a');
        }

        
        return view('newtheme.earth_gallery', compact('earthImages'));
    }
}
