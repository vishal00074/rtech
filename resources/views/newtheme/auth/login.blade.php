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
                    <h3 class="mb-4 text-white">LOGIN HERE</h3>
                    <div class="post-meta align-items-center text-center">
                        <span> <a href="{{url('/')}}" class="text-white">Home </a></span>
                        <span> <i class="bi-chevron-compact-right"></i>  </span>
                        <span> Login</span>
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
                    <form action="{{ route('postLogin') }}"  method="post" class="p-5 bg-light text-dark">
                        @csrf
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
                        <div class="form-group" align="center">
                            <input type="submit" value="LOGIN" class="btn btn-primary">
                        </div>
                        <div class="form-group mt-3" align="center">
                            <label>Don't have an account? <span class=""><a href="{{url('/register')}}" class="text-secondary">Register here</a></span></label>
                            <br>
                            <label class="mt-2"><a href="{{url('/forgot-password')}}" class="text-secondary">Forgot Password ? </a></label>
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