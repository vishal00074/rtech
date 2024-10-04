@extends('newtheme.layouts.app')
@section('css')
<style>

.breatcome_area:before {
    background: rgb(0 0 0 / 65%) !important;
}
.blog_image {
    width: 100% !important;
}
.comment-form-wrap {
    box-shadow: 0px 0px 37px 0px rgba(0, 0, 0, 0.2);
}
</style>
@endsection

@section('content')
<div class="breatcome_area site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url({{ asset('assets/newtheme/images/bg-parallax.jpg') }});">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12">
                <div class="post-entry text-center">
                    <h3 class="mb-4 text-white">REGISTER HERE</h3>
                    <div class="post-meta align-items-center text-center">
                        <span> <a href="{{url('/')}}" class="text-white">Home </a></span>
                        <span> <i class="bi-chevron-compact-right"></i>  </span>
                        <span> Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-3 main-content">
                <!-- <img src="{{ asset('assets/newtheme/images/hero.jpg') }}" alt="image" class="blog_image"> -->
            </div>
            
            <div class="col-md-12 col-lg-6 main-content">
                <div class="comment-form-wrap">
                    <form action="{{ route('postRegister') }}" method="post" class="p-5 bg-light text-dark">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                               @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                               @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email">
                               @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                               @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password">
                               @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                               @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            @if ($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                        <div class="form-group" align="center">
                            <input type="submit" value="REGISTER" class="btn btn-primary">
                        </div>
                        <div class="form-group mt-3" align="center">
                            <label> Already have an account? <span class=""><a href="{{url('/login')}}"  class="text-secondary">Login here</a></span></label>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 col-lg-3 main-content">
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection