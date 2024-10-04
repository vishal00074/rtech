@extends('newtheme.layouts.app')
@section('css')
<style>
    /* Set the size of the map */
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@endsection

@section('content')
  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ asset('assets/newtheme/images/hero.jpg') }});">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">Astrophile: A Passion for the Cosmos</h1>
            <div class="post-meta align-items-center text-center">
              <!--<figure class="author-figure mb-0 me-3 d-inline-block"><img src="{{ asset('assets/newtheme/images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>-->
              <!--<span class="d-inline-block mt-1">By Carl Atkinson</span>-->
              <!--<span>&nbsp;-&nbsp; {{ $epic->json_data->date ?? ''}}</span>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="section">
    <div class="container">
      <div class="row blog-entries element-animate">

        <div class="col-md-12  col-lg-8 main-content">
          <div class="post-content-body">
          
              <h1 class="mb-4">{{ $apod->title ?? ''}}</h1>
              <img src="{{$apod->url ?? ''}}" style="height:100%; width:100%" alt="epic"/>
              <div class="d-inline-block mt-1">By{{ $apod->copyright ?? ''}}</div>
              <div>{{ $apod->date ?? ''}}</div>
              <br>
              <p>{!! nl2br(e($apod->explanation ?? '')) !!}</p>

            
          </div>
        </div>

        
        
        <!-- sidebar-box -->
        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box">
            <h3 class="heading">Related Images</h3>
            <div class="post-entry-sidebar">
              <ul>
                @foreach($apodsQuery as $detail)
                  <li>
                    <a href="{{ url('apod_detail') }}/{{ $detail->slug }}">
                      <img src="{{$detail->url ?? ''}}" alt="Image"  style="height:100%; width:100%">
                      <span class="mr-2 mt-2">{{$detail->copyright ?? ''}} </span>
                      <!-- <div class="text">
                      </div> -->
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <!-- END sidebar-box -->

      </div>
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