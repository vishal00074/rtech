@extends('newtheme.layouts.app')
@section('css')
<style>
    .blog_image{
      width:100% !important;
    }

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
</style>
@endsection

@section('content')
  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ asset('assets/newtheme/images/bg-parallax.jpg') }});">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">OUR BLOGS</h1>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading" align="center">
            Welcome to the RTECH Blogs, your portal to the forefront of science, technology, and astronomy. Our meticulously crafted articles delve into the latest innovations, groundbreaking research, and celestial discoveries. Each entry provides an elegant and insightful exploration of the forces shaping our future and expanding our understanding of the universe. Whether you're a curious mind or a tech enthusiast, our blog offers a blend of depth and clarity, designed to inspire and inform. Journey with us through the wonders of modern science and the mysteries of space.
          </div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
          @foreach($blogs as $detail)
            <div class="blog-entry d-flex blog-entry-search-item">
              <a href="{{url('/blog_detail/'.$detail->id ?? '')}}" class="img-link me-4 img-fixed-size">
                <img src="{{asset($detail->image)}}" alt="Image" class="img-fluid blog_image">
              </a>
              <div>
                <span class="date">&bullet; {{\Carbon\Carbon::parse($detail->created_at)->format('d F Y g:i a')}} </span>
                <h2><a href="{{url('/blog_detail/'.$detail->id ?? '')}}">{{$detail->title ?? ''}}</a></h2>
                <p>{{$detail->para1 ? mb_strimwidth($detail->para1, 0, 140, "...") : ''}}</p>
                <p><a href="{{url('/blog_detail/'.$detail->id ?? '')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
              </div>
            </div>
          @endforeach

					<div class="row text-start pt-5 border-top">
						<div class="col-md-12">
              {{  $blogs->links() }}
						</div>
					</div>

				</div>

				<div class="col-lg-4 sidebar">
					<!-- sidebar-box -->
					<div class="sidebar-box">
						<h3 class="heading">Recent Posts</h3>
						<div class="post-entry-sidebar">
							<ul>
                @foreach($recent_blogs as $detail)
                  <li>
                    <a href="{{url('/blog_detail/'.$detail->id ?? '')}}">
                        <img src="{{$detail->image}}" alt="Image" class="blog_image">
                        <div class="">
                            <p class="mt-3 blog_side_heading">{{$detail->title ?? ''}}</p>
                            <div class="post-meta">
                                <span class="mr-2">{{\Carbon\Carbon::parse($detail->created_at)->format('d F Y g:i a')}} </span>
                            </div>
                        </div>
                    </a>
                  </li>
                @endforeach
							</ul>
						</div>
					</div>
					<!-- END sidebar-box -->
				</div>
			</div>
		</div>
	</div>

@endsection

@section('script')

@endsection