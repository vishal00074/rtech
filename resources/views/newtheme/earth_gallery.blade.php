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
                    <h3 class="mb-4 text-white">Earth Gallery</h3>
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
                        @foreach($earthImages as $item)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <a href="{{ url('epic_detail') }}/{{ $item->id }}">
                                    <div class="card">
                                        <img src="{{ $item->image }}" alt="{{ $item->json_data->caption }}" class="img-fluid rounded card-img-top img-fixed-size">
                                            <div class="card-body">
                                            
                                                <span class="date">{{ $item->json_data->date }}</span>
                                            </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{  $earthImages->onEachSide(1)->links() }}
        </div>
        
</section>
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
