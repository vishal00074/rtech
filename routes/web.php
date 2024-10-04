<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Api\NasaApiController;
use App\Http\Controllers\Api\FlareController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EarthController;
use App\Http\Controllers\UserBlogController;

use App\Http\Controllers\Auth\AuthController;

use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/routes', function(){
    $routeCollection = Route::getRoutes();
    
    echo "<table style='border:solid 1px;width:100%'>";
    echo "<tr>";
    echo "<th style='border:solid 1px;width:10%'>HTTP <br /> Method</th>";
    echo "<th style='border:solid 1px;border:solid 1px;width:10%'>Route</th>";
    echo "<th style='border:solid 1px;width:10%'>Name</th>";
    echo "<th style='border:solid 1px;width:70%'>Corresponding <br /> Action</th>";
    echo "</tr>";
            
    foreach($routeCollection as $route){
        echo "<tr>";
        echo "<td style='padding:3px;border:solid 1px'>".$route->methods()[0]."</td>";
        echo "<td style='padding:3px;border:solid 1px'>".$route->uri()."</td>";
        echo "<td style='padding:3px;border:solid 1px'>".$route->getName()."</td>";
        echo "<td style='padding:3px;border:solid 1px'>".$route->getActionName()."</td>";
        echo "</tr>";
    }
    echo "</table>";
});




// FRONTEND ROUTES ****************

Route::get('/', [DashboardController::class, 'index']);
Route::get('epic_detail/{id}', [DashboardController::class, 'EpicDetail']);
Route::get('apod_detail/{slug}', [DashboardController::class, 'ApodView']);
Route::get('apod_gallery', [DashboardController::class, 'ApodGallery']);


Route::get('/blogs', [BlogController::class, 'BlogPage']);
Route::get('/blog_detail/{id}', [BlogController::class, 'BlogDetail']);
Route::get('/mars/gallery', [BlogController::class, 'MarsGallery']);
Route::get('video_gallery', [BlogController::class, 'VideoGallery']);
Route::get('earth_gallery', [EarthController::class, 'EarthGallery']);
Route::get('earth_gallery', [EarthController::class, 'EarthGallery']);


// Route::get('epic/detail//{id}', [DashboardController::class, 'EpicDetail']);

Route::get('/old_theme', [DashboardController::class, 'Oldtheme']);



// AUTH ROUTES *****

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage']);
Route::get('/forgot-password', [AuthController::class, 'forgot_password']);
Route::post('/register', [AuthController::class, 'registerUser'])->name('postRegister');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');








Route::group(['middleware' => 'auth'], function (){
    Route::get('/sign-out', [AuthController::class, 'signOut']);

    
    // USER BLOG ROUTES
    Route::get('/create_blog', [UserBlogController::class, 'CreateBlog']);
});

// END - AUTH ROUTES ****************



Route::get('/services', function () {
    return view('web.services');
});

Route::get('/contact', function () {
    return view('web.contact');
});
// BACKEND CREATION AND DATA MANIPULATION ROUTES ****************

// Route::get('/blog-generate', [BlogController::class, 'ScienceNews']);
// Route::get('/epic-api', [NasaApiController::class, 'EpicApi']);
// Route::get('/apod-api', [NasaApiController::class, 'ApodApi']);
// Route::get('/pexels-video', [NasaApiController::class, 'pexelsVideo']);

// Route::get('/flare-api', [FlareController::class, 'FlareApi']);

// END - BACKEND ROUTES ****************

Route::get('/update-slug', [NasaApiController::class, 'UpdateSlug']);



//------------------------------------------------------------------------------------------------------------
// Route::get('/Category', function(){
  
//     $num = 0;

//     $scienceCategories = [
//         "Physics",
//         "Biology",
//         "Chemistry",
//         "Astronomy",
//         "Earth Science",
//         "Environmental Science",
//         "Mathematics",
//         "Computer Science",
//         "Telescope",
//         "Microscope",
//         "Spectrophotometer",
//         "Thermometer",
//         "Barometer",
//         "Centrifuge",
//         "pH Meter",
//         "Oscilloscope"
//     ];
    
//     // Clothing Categories
//     $clothingCategories = [
//         "Clothes",
//         "Footwear",
//         "Accessories",
//         "Others"
//     ];
    
//     // Example: Combining both into one array if needed
//     $allCategories = array_merge($scienceCategories, $clothingCategories);
    
//     foreach($allCategories as $record){
//         $records = Category::create(['name' => $record]);
//     }
//     echo ' records is updated';
// });
//------------------------------------------------------------------------------------------------------------
