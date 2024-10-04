<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{MarsRover, Epic, PexelsVideo, Apod};
use URL;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $epic = Epic::orderby('created_at','desc');
        $latest = $epic->first();
        $epicfirst = $epic->offset(1)->limit(2)->get();
        $epiclast = $epic->offset(3)->limit(2)->get();
            
        $latest->json_data =  json_decode($latest->json_data);
        $latest->image = URL::to('/'). '/public/'.$latest->image;   
        $latestDate =  Carbon::parse($latest->json_data->date);
        $latest->json_data->date = $latestDate->format('d F Y g:i a');
        
        foreach($epicfirst as $epic){
            $epic->json_data =  json_decode($epic->json_data);
            $epic->image = URL::to('/'). '/public/'.$epic->image;   
            $date =  Carbon::parse($epic->json_data->date);
            $epic->json_data->date = $date->format('d F Y g:i a');
        }

        foreach($epiclast as $epicitem){
            $epicitem->json_data =  json_decode($epicitem->json_data);
            $epicitem->image = URL::to('/'). '/public/'.$epicitem->image;
            $date =  Carbon::parse($epicitem->json_data->date);
            $epicitem->json_data->date = $date->format('d F Y  g:i a');
        }

        $mars =  MarsRover::orderby('id', 'desc')->get();

        $landscapeMars =  $mars->shuffle()->take(2);

        $portrait = $mars->random();

        $portrait->json_data = json_decode($portrait->json_data);
        $portrait->image = URL::to('/') . '/public/' . $portrait->image;
        $portraitdate = Carbon::parse($portrait->json_data->earth_date ?? 'now');
        $portrait->json_data->date = $portraitdate->format('d F Y g:i a');


        $secondPortrait = $mars->random();

        $secondPortrait->json_data = json_decode($secondPortrait->json_data);
        $secondPortrait->image = URL::to('/') . '/public/' . $secondPortrait->image;
        $secondPortraitdate = Carbon::parse($secondPortrait->json_data->earth_date ?? 'now');
        $secondPortrait->json_data->date = $secondPortraitdate->format('d F Y g:i a');

        foreach($landscapeMars as $content){
            $content->json_data =  json_decode($content->json_data);
            $content->image = URL::to('/'). '/public/'.$content->image;   
            $date =  Carbon::parse($content->json_data->earth_date);
            $content->json_data->date = $date->format('d F Y g:i a');
        }

        $pexelsVideo = PexelsVideo::select('*')->orderby('id', 'desc')->get()->take(3);

        foreach($pexelsVideo as $videoItem)
        {
            $date =  Carbon::parse($videoItem->created_at);
            $videoItem->date = $date->format('d M Y g:i a');

            $videoItem->link = URL::to('/'). '/public/'.$videoItem->link;   
        }


        $apodApi = Apod::orderby('id', 'desc');

        $apod = $apodApi->take(2)->get();
        $apodMini = $apodApi->offset(2)->take(3)->get();
        $apod = $this->FormatApod($apod);
        $apodMini = $this->FormatApod($apodMini);
       

        return view('newtheme.index', compact('epicfirst', 'epiclast', 'latest', 'landscapeMars', 'portrait', 'secondPortrait', 'pexelsVideo','apod', 'apodMini'));
    }

    public function FormatApod($apod)
    {
        foreach($apod as $apodItem)
        {
            $apoddate =  Carbon::parse($apodItem->date);
            $apodItem->date = $apoddate->format('d M Y g:i a');

            $apodItem->url = URL::to('/'). '/public/'.$apodItem->url;   
        }

        return $apod;
    }

    


    public function EpicDetail($id)
    {
        $epic = Epic::find($id);
        $epic->json_data =  json_decode($epic->json_data);
        $epic->image = URL::to('/'). '/public/'.$epic->image;
        $date =  Carbon::parse($epic->json_data->date);
        $epic->json_data->date = $date->format('d F Y  g:i a');

        // dd($epic);
        
        $epic_all = Epic::orderby('created_at','desc')->where('id', '!=', $id)->whereDate('created_at',  $epic->created_at)->limit(5)->get();
        foreach($epic_all as $epicItem){
            $epicItem->json_data =  json_decode($epicItem->json_data);
            $epicItem->image = URL::to('/'). '/public/'.$epicItem->image;   
            $date =  Carbon::parse($epicItem->json_data->date);
            $epicItem->json_data->date = $date->format('d F Y g:i a');
        }


      // Sun Calaculation

       $x = $epic->json_data->sun_j2000_position->x;
       $y = $epic->json_data->sun_j2000_position->y;
       $z =  $epic->json_data->sun_j2000_position->z;

       $distanceInMeters = sqrt(pow($x, 2) + pow($y, 2) + pow($z, 2));
 
       $distance = $distanceInMeters * 0.621371;


       // Lunar calculation 

       $lunar_x = $epic->json_data->lunar_j2000_position->x;
       $lunar_y = $epic->json_data->lunar_j2000_position->y;
       $lunar_z =  $epic->json_data->lunar_j2000_position->z;

       $lunar_distanceInMeters = sqrt(pow($lunar_x, 2) + pow($lunar_y, 2) + pow($lunar_z, 2));
 
       $lunarDistance = $lunar_distanceInMeters * 0.621371;

        return  view('newtheme.single', compact('epic', 'epic_all', 'x', 'y', 'z', 'distance', 'lunarDistance', 'lunar_x', 'lunar_y', 'lunar_z'));
    }


    public function ApodView($slug)
    {
        $apod = Apod::where('slug', $slug)->first();

        $apoddate =  Carbon::parse($apod->date);
        $apod->date = $apoddate->format('d M Y g:i a');

        $apod->url = URL::to('/'). '/public/'.$apod->url;
       

        $apodsQuery = Apod::where('slug','<>', $slug)->orderby('id', 'desc')->limit(4)->get();
        $apodsQuery = $this->FormatApod($apodsQuery);
        if($apod){
            return view('newtheme.apod', compact('apod', 'apodsQuery'));
        }
        return redirect()->back()->with('info', 'Page Not found');
    }

    public function ApodGallery()
    {
        $apodsQuery = Apod::orderby('id', 'desc')->paginate(12);
        $apodsQuery = $this->FormatApod($apodsQuery);
        return view('newtheme.apod_gallery', compact('apodsQuery'));
    }


    public function Oldtheme()
    {
        $mars= MarsRover::take(12)->get()->shuffle();
        foreach($mars as $item){

            $item->json_data =  json_decode($item->json_data);
            $item->image = URL::to('/'). '/public/'.$item->image;   
           
        }
        return  view('web.index', compact('mars'));
    }
}
