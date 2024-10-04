@extends('newtheme.layouts.app')
@section('css')
<style>
	.apod{
		height:30rem;
		width:25rem;
	}

	.latestVideo{
		position: fixed;
		top: 0;
		left: 0;
		width: 100vh;
		height: 100vh; /* 100% of the viewport height */
		object-fit: cover; /* Ensures the video covers the entire screen */
		z-index: -1; /* Keep the video behind the content */
	}
	.video-container {
		position: relative;
		overflow: hidden;
		height: 100vh;
	}
	.video-heading {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
		font-size: 3rem;
		text-align: center;
		z-index: 1; /* Ensure it's above the video */
		/* width: 100%; */
	}
</style>
@endsection


@section('content')
	<!-- <section>
		<div class="row align-items-stretch retro-layout">
			<div class="col-md-12 col-lg-12 video-container">
				<video autoplay muted loop playsinline id="latestVideo">
					<source src="{{ asset($pexelsVideo[0]->link) }}" type="{{ $pexelsVideo[0]->file_type }}">
					Your browser does not support the video tag.
				</video>
				<div class="content" align="center">
					<h1 class="video-heading">Revolution in Science and Technology</h1>
				</div>
			</div>
		</div>
	</section> -->

	<!-- Start retroy layout blog posts -->
	<section class="section sectionBg">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-4">
                    @foreach($epicfirst as $first)
					<a href="{{ url('/epic_detail') }}/{{ $first->id }}" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url({{ $first->image}});"></div>

						<div class="text">
							<span class="date">{{ $first->json_data->date ?? ''}}</span>
							<span>Latitude :{{ $first->json_data->centroid_coordinates->lat ?? ''}}</span>
							<span>Longitude :{{ $first->json_data->centroid_coordinates->lon ?? ''}}</span>
						</div>
					</a>
					@endforeach
				</div>
				<div class="col-md-4">
					<a href="{{ url('/epic_detail') }}/{{ $latest->id }}" class="h-entry img-5 h-100 gradient">

						<div class="featured-img" style="background-image: url({{ $latest->image}});"></div>

						<div class="text">
							<span class="date">{{ $latest->json_data->date ?? ''}}</span>
							<h2>{{ $latest->json_data->caption ?? ''}}</h2>
							<span>Latitude :{{ $latest->json_data->centroid_coordinates->lat ?? ''}}</span>
							<span>Longitude :{{ $latest->json_data->centroid_coordinates->lon ?? ''}}</span>
						</div>
					</a>
				</div>
				<div class="col-md-4">

					 @foreach($epiclast as $last)
					<a href="{{ url('/epic_detail') }}/{{ $last->id }}" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url({{ $last->image}});"></div>

						<div class="text">
							<span class="date">{{ $last->json_data->date ?? ''}}</span>
							<span>Latitude :{{ $last->json_data->centroid_coordinates->lat ?? ''}}</span>
							<span>Longitude :{{ $last->json_data->centroid_coordinates->lon ?? ''}}</span>
						</div>
					</a>
					@endforeach
					
				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2>Astrophile: A Passion for the Cosmos</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="{{ url('apod_gallery') }}" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
					@foreach($apod as $apodItem)
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="{{ url('apod_detail') }}/{{ $apodItem->slug }}" class="img-link">
									<img src="{{ $apodItem->url }}" alt="{{ $apodItem->title ?? '' }}" class="img-fluid apod">
								</a>
								<span class="date">{{ $apodItem->date ?? '' }}</span>
								<p><a href="{{ url('apod_detail') }}/{{ $apodItem->slug }}">{{ $apodItem->copyright ?? '' }}</a></p>
								<p>{{ $apodItem->title ?? '' }}</p>
								<!--<p><a href="{{ url('apod_detail') }}/{{ $apodItem->slug }}" class="btn btn-sm btn-outline-primary">Read More</a></p>-->
							</div>
						</div>
					@endforeach
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
					@foreach($apodMini as $apodMiniItem)
						<li>
							<span class="date">{{ $apodMiniItem->date ?? '' }}</span>
							<h3><a href="single.html">{{ $apodMiniItem->title ?? '' }}</a></h3>
							<p>{!! Str::limit($apodMiniItem->explanation ?? '', 50, ' ...') !!}</p>
							<p><a href="{{ url('apod_detail') }}/{{ $apodMiniItem->slug }}" class="read-more">Continue Reading</a></p>
						</li>
					@endforeach	
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="{{ asset('public/assets/newtheme/images/img_1_horizontal.jpg') }}" alt="Image" class="img-fluid">
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
							<img src="{{ asset('public/assets/newtheme/images/img_2_horizontal.jpg') }}" alt="Image" class="img-fluid">
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
							<img src="{{ asset('public/assets/newtheme/images/img_3_horizontal.jpg') }}" alt="Image" class="img-fluid">
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
							<img src="{{ asset('public/assets/newtheme/images/img_4_horizontal.jpg') }}" alt="Image" class="img-fluid">
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

	<!-- Start posts-entry -->
	<section class="section posts-entry sectionBgVideos">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Videos Library</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="{{ url('video_gallery') }}" class="read-more">View All</a></div>
			</div>
			<div class="row g-12">
				<div class="col-md-12 order-md-2">
					<div class="row g-3">
						@foreach($pexelsVideo as $video)	
							<div class="col-md-4">
								<div class="blog-entry">
									<a class="img-link">
										<video class="img-fluid" controls data-src="{{ asset($video->link) }}">
											<source src="{{ asset($video->link) }}" type="{{ $video->file_type }}">
											Your browser does not support the video tag.
										</video>
									</a>
									<span class="date">{{ $video->date }}</span>
									<!-- <h2><a>{{ ucfirst($video->category) }}</a></h2> -->
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Politics</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_7_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_6_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_2.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_5_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_3.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>


				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_4_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_4.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_3_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_5.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_2_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_4.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>


				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_1_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_3.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_4_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_2.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="{{ asset('public/assets/newtheme/images/img_3_horizontal.jpg') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('public/assets/newtheme/images/person_5.jpg') }}" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>

	<section class="section sectionBgMars">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Mars Gallery</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="{{ url('/mars/gallery') }}" class="read-more">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">
				<div class="col-md-5 order-md-2">
					<a href="{{ url('/mars/gallery') }}" class="hentry img-1 h-100 gradient">
						<div class="featured-img" style="background-image: url({{ $portrait->image }});"></div>
						<div class="text">
							<span>{{ $portrait->json_data->date }}</span>
							<h2>{{ $portrait->name }}</h2>
						</div>
					</a>
				</div>

				<div class="col-md-7">
					<a href="{{ url('/mars/gallery') }}" class="hentry img-2 v-height mb30 gradient">
						<div class="featured-img" style="background-image: url({{ $secondPortrait->image }});"></div>
						<div class="text text-sm">
							<span>{{ $secondPortrait->json_data->date }}</span>
							<h2>{{ $secondPortrait->name }}</h2>
						</div>
					</a>

					<div class="two-col d-block d-md-flex justify-content-between">
						
					@foreach($landscapeMars as $landscape)
						<a href="{{ url('/mars/gallery') }}" class="hentry v-height img-2 gradient">
							<div class="featured-img" style="background-image: url({{ $landscape->image }});"></div>
							<div class="text text-sm">
								<span>{{ $landscape->json_data->date }}</span>
								<h2>{{ $landscape->name }}</h2>
							</div>
						</a>
					@endforeach	
					</div>
				</div>
			</div>

		</div>
	</section>

@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let videos = document.querySelectorAll('video.lazy-video');
        videos.forEach(function(video) {
            video.src = video.dataset.src;
            let sources = video.querySelectorAll('source');
            sources.forEach(function(source) {
                source.src = source.dataset.src;
            });
        });
    });
</script>

@endsection