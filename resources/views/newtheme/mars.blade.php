@extends('newtheme.layouts.app')
@section('css')
<style>

/* Ensures all images have the same fixed width and height */
.img-fixed-size {
    width: 100%;             /* Ensures it fits the width of the container */
    height: 250px;           /* Fixed height to maintain uniformity */
    object-fit: cover;       /* Ensures the image covers the area while cropping if necessary */
    border-radius: 10px;     /* Optional: to keep rounded corners */
}

/* Media query for smaller screens */
@media (max-width: 576px) {
    .img-fixed-size {
        height: 180px;       /* Reduce height for smaller screens */
    }
}



</style>
@endsection

@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url({{ asset('assets/newtheme/images/hero.jpg') }});">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12">
                <div class="post-entry text-center">
                    <h3 class="mb-4 text-white">Mars Gallery</h3>
                    <div class="post-meta align-items-center text-center">
                        <span> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
        <div class="container">
            <div class="row blog-entries element-animate">
                <div class="col-md-12 main-content">
                    <div class="row">
                        @foreach($mars as $mar)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card">
                                    <img src="{{ $mar->image }}" alt="{{ $mar->name }}" class="img-fluid rounded card-img-top img-fixed-size">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $mar->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{  $mars->onEachSide(1)->links() }}
        </div>
        
</section>

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-uppercase text-black">More Blog Posts</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">UK sees highest inflation in 30 years</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Don’t assume your user data in the cloud is safe</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry -->
@endsection


