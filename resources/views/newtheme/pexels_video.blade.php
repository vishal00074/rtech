@extends('newtheme.layouts.app')
@section('css')
<style>

/* Ensures all images have the same fixed width and height */
.img-fixed-size {
    width: 100%;             /* Ensures it fits the width of the container */
    height: 200px;           /* Fixed height to maintain uniformity */
    object-fit: cover;       /* Ensures the image covers the area while cropping if necessary */
    /* border-radius: 10px;     Optional: to keep rounded corners */
}

/* Media query for smaller screens */
@media (max-width: 576px) {
    .img-fixed-size {
        height: 180px;       /* Reduce height for smaller screens */
    }
}

.btn{
    padding: 9px 15px !important;
}
.btn.btn-color-d {
    margin-top: 5% !important;
    width: 115px !important;
    color: #ffffff !important;
    background-color: #000000 !important;
}
.btn.btn-color-d:hover {
    margin-top: 5% !important;
    width: 115px !important;
    box-shadow: 0px 0px 37px 0px rgb(189 180 180 / 58%);
    color: #000000 !important;
    background-color: #ffffff !important;
    border-color: #000000 !important;
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
                    <h3 class="mb-4 text-white">Pexels Videos</h3>
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
                        <div class="col-md-6"></div>
                        <div class="col-md-6 main-content">
                            <div class="row mb-3">
                                <div class="col-md-9">
                                    <form action="#" class="sidebar-search-form">
                                        <input type="date" class="form-control" value="{{now()->format('Y-m-d')}}" id="filterDate" />
                                    </form>
                                </div>
                                <div class="col-md-3" align="right">
                                    <span id="searchDate" class="mt-3 btn btn-sm btn-color-d"> Search</span>
                                    <img src="https://abacus.mytura.in/assets/ajax_clock_small.gif" alt="Loading..." id="loading_spinner">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="responseDateData">
                        @foreach($videos as $video)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card">
                                    <video class="img-fluid card-img-top img-fixed-size" controls data-src="{{ asset($video->link) }}">
                                        <source src="{{ asset($video->link) }}" type="{{ $video->file_type }}">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">{{ $video->category }}</h5> -->
                                        <span class="date">{{ \Carbon\Carbon::parse($video->created_at)->format('d M Y g:i a') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{  $videos->onEachSide(1)->links() }}
        </div>
        
</section>

<!-- Start posts-entry -->
    <!-- <section class="section posts-entry posts-entry-sm bg-light">
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
    </section> -->
<!-- End posts-entry -->
@endsection


@section('script')
<script type="text/javascript">
    $('#loading_spinner').hide();

    $('#searchDate').on('click', function(){
        alert('love you baby');

        var date = $('#filterDate').val();

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url:'/rtech/video_gallery',
    //         type:'GET',
    //         data:{date:date,search:'search'},
    //         beforeSend: function() {
    //             $("#loading").html('Loading...');
    //             $('#loading_spinner').show();
    //         },
    //         success:function(data){
    //             $("#loading").html('Search');
    //             $('#loading_spinner').hide();
            
    //             $('#responseDateData').html(data);
    //         },
    //         error:function(){
    //             $("#loading").html('Search');
    //             $('#loading_spinner').hide();
                
    //             $('#responseDateData').html('<div>ERROR LOADING DATA...</div>');
    //         }
        //});
    })
</script>
@endsection
