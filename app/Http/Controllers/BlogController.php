<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Blog, MarsRover, PexelsVideo};
use Goutte\Client;
use URL;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function ScienceNews()
    {
        $client = new Client();

        $url = 'https://timesofindia.indiatimes.com/science';

        // Send a GET request to the URL
        $crawler = $client->request('GET', $url);

        // Extract information using CSS selectors
        $title = $crawler->filter('title')->text();
        $paragraphs = $crawler->filter('a')->each(function ($node) {
            return [
                'text' => $node->text(),
                'href' => $node->attr('href'),
            ];
        });
        
        
        foreach ($paragraphs as $paragraph) {
            $href = $paragraph['href'];
            $containsHomeScience = strpos($href, '/science/') !== false;

            if ($containsHomeScience) {
                $input = ['title' => $paragraph['text'], 'href' => $paragraph['href']];
                // echo "- Text: {$paragraph['text']}, Href: {$paragraph['href']}\n";
                // Blog::create($input);
            }
        }
       self::ScienceBlogs();
       return true;
    }

    public static function ScienceBlogs()
    {

        $science = Blog::orderby('created_at', 'desc')->first();
        $href_link =  Blog::where('created_at', $science->created_at)->get();


        $client = new Client();

        foreach ($href_link as $link) {

            $url = 'https://timesofindia.indiatimes.com' . $link->href;
            
            // Send a GET request to the URL
            $crawler = $client->request('GET', $url);

            // Extract information using CSS selectors

            $title = $crawler->filter('h1')->each(function ($node) {
                return [
                    'title' => $node->text(),
                ];
            });

            $paragraphs = $crawler->filter('.clearfix')->each(function ($node) {
                return [
                    'text' => $node->text(),
                ];
            });

            $image = $crawler->filter('.wJnIp img')->each(function ($node) {
                return [
                  
                    'img' => $node->attr('src'),
                ];
            });
           
            $img_url ='';
            if (!empty($image)) {
                $img_url= $image[0]['img'];
                
                $uniqueId = uniqid();
                $prefix = 'thumbnail_';
                $uniqueName = $prefix . $uniqueId . '_' . time();

            
                $uniqueId = uniqid();
                $prefix = 'thumbnail_';
                $uniqueName = $prefix . $uniqueId . '_' . time() . '.jpg';

                // Save the image to the local storage
                file_put_contents(public_path('blog/thumbnail/' . $uniqueName), file_get_contents($img_url));

                // Get the URL of the saved image
                $imageUrl = 'blog/thumbnail/' . $uniqueName;
            
             }

             $input = [
            // 'title'=> $title[0]['title'],
            'para1' =>$paragraphs[1]['text'],
            'para2' =>$paragraphs[3]['text'],
            'para3' =>$paragraphs[6]['text'],
            'image'=> $imageUrl
             ];
            // Blog::where('id', $link->id)->update($input);         
        }
       
    }
    
    public function BlogPage(Request $request)
    {
        $blogs = Blog::orderby('id', 'desc')->paginate(8);
        
        $recent_blogs = Blog::orderby('id','desc')->limit(5)->get();
        foreach($recent_blogs as $detail){
            // $detail->json_data =  json_decode($detail->json_data);
            $detail->image = URL::to('/'). '/public/'.$detail->image;   
            $date =  Carbon::parse($detail->created_at);
            $detail->created_at = $date->format('d F Y g:i a');
        }
        
        return view('newtheme.blog',compact('blogs', 'recent_blogs'));
    }
   
    public function BlogDetail($id){
        try{
            $blog = Blog::find($id);

            return view('newtheme.blog_detail',compact('blog'));
        }
        catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function MarsGallery()
    {
        try{
            $mars =  MarsRover::orderby('id', 'desc')->paginate(12);
            foreach($mars as $content){
                $content->json_data =  json_decode($content->json_data);
                $content->image = URL::to('/'). '/public/'.$content->image;   
                $date =  Carbon::parse($content->json_data->earth_date);
                $content->json_data->date = $date->format('d F Y g:i a');
            }
            // dd( $mars );

            return view('newtheme.mars', compact('mars'));
           
        }
        catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function VideoGallery()
    {
        try{
            $videos = PexelsVideo::select('*')->paginate(12);

            return view('newtheme.pexels_video',compact('videos'));
         }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    
}
