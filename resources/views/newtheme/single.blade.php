@extends('newtheme.layouts.app')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <h1 class="mb-4">EPIC camera onboard the NOAA DSCOVR spacecraft</h1>
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
              <h3><b>{{ $epic->json_data->caption ?? ''}}</b></h3>
              <br>
              <h4><strong>Distance from the Sun</strong></h4>
              <p><strong>Coordinates in Space:</strong> ({{ $x }}, {{ $y }}, {{ $z }})</p>
              <p><strong>Calculated Distance from the Sun:</strong> {{ number_format($distance, 2) }} Miles</p>

              <br>
              <h4><strong>Lunar J2000 Position</strong></h4>
              <p><strong>Lunar Coordinates (J2000):</strong> ({{ $lunar_x }}, {{ $lunar_y }}, {{ $lunar_z }})</p>
              <p><strong>Calculated Distance from Earth:</strong> {{ number_format($lunarDistance, 2) }} Miles</p>
              <h6><strong>Date:</strong> {{$epic->json_data->date ?? ''}} </h6>
              <br>
              <img src="{{$epic->image ?? ''}}" style="height:100%; width:100%" alt="epic"/>
            
              <h3 class="mt-4 mb-4">Centroid Coordinates</h3>
              <div id="map"></div>
            
          </div>
        </div>

        
        
        <!-- sidebar-box -->
        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box">
            <h3 class="heading">Related Images</h3>
            <div class="post-entry-sidebar">
              <ul>
                @foreach($epic_all as $detail)
                  <li>
                    <a href="{{$detail->id ?? ''}}">
                      <img src="{{$detail->image ?? ''}}" alt="Image"  style="height:100%; width:100%">
                      <span class="mr-2 mt-2">{{$detail->json_data->date ?? ''}} </span>
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

@section('script')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Your coordinates (latitude: 4.006348, longitude: 177.766113)
    const lat = <? echo  $epic->json_data->centroid_coordinates->lat ?? 0 ?>;
    const lng = <? echo  $epic->json_data->centroid_coordinates->lon ?? 0 ?>;

    // Initialize the map and set its view to the specified coordinates and zoom level
    const map = L.map('map').setView([lat, lng], 2);

    // Add OpenStreetMap tiles as the base layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Add a marker at the specified coordinates
    L.marker([lat, lng]).addTo(map)
        .bindPopup('Location: ' + lat + ', ' + lng)
        .openPopup();
</script>

<script>
        // Prepare data for the graph
        const data = {
            labels: ['X Distance', 'Y Distance', 'Z Distance'],
            datasets: [{
                label: '3D Coordinates relative to the Sun',
                data: [{{ $x }}, {{ $y }}, {{ $z }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Configure the chart
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Sun to Earth (Miles)'
                        }
                    }
                }
            }
        };

        // Render the chart
        const ctx = document.getElementById('solarGraph').getContext('2d');
        new Chart(ctx, config);
    </script>
   <script>
    // Prepare data for the graph
    const Lunar_data = {
        labels: ['X Distance', 'Y Distance', 'Z Distance'],
        datasets: [{
            label: 'Lunar J2000 Coordinates',
            data: [{{ $lunar_x }}, {{ $lunar_y }}, {{ $lunar_z }}], // Change here
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Configure the chart
    const lunar_config = {
        type: 'bar',
        data: Lunar_data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Distance in Miles'
                    }
                }
            }
        }
    };

    // Render the chart
    const Lunar_ctx = document.getElementById('lunarGraph').getContext('2d');
    new Chart(Lunar_ctx, lunar_config);
</script>


@endsection