@extends('newtheme.layouts.app')
@section('css')
<style>
.blog_image {
    width: 100% !important;
}
.error{
    color:red;
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
                    <h3 class="mb-4 text-white">{{auth()->user()->name ?? ''}}</h3>
                    <div class="post-meta align-items-center text-center">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content comment-form-wrap">

                <h1>Add Blog</h1>
                
                <form class="p-5 bg-light text-dark" id="productForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Blog Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="description1" class="form-label">Description 1 <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description1" name="description1" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="description2" class="form-label">Description 2 <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description2" name="description2" rows="5" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Upload Thumbnail <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Upload Images <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple >
                    </div>

                    <div class="mb-4">
                        <label for="category" class="form-label" <span class="text-danger">*</span>Select Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" disabled selected>Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            
                            
                        </select>
                    </div>

                
           
                    <div id="toggleProductForm" class="btn btn-secondary mt-3"> &plus;  Add Product</div>

                    <!-- Add Product Form -->
                    <div class="productForm" style="margin-top: 20px;">
                            
                            
                    </div>
                    <button type="submit" class="btn btn-success">Add Blog</button>
                </form>                    

                <div class="pt-5">
                    <p>Categories: <a href="#">Food</a>, <a href="#">Travel</a> Tags: <a href="#">#manila</a>, <a
                            href="#">#asia</a></p>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <!-- sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>

                            <li>
                                <a href="">
                                    <img src="images/img_1_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->
            </div>
            <!-- END sidebar -->

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
<script>
    $("#toggleProductForm").click(function(){
        var productNum = $('.productNum').last().text();
        const categories = <?php echo json_encode($categories); ?>;
        let optionsHtml = '';

        categories.forEach(category => {
            optionsHtml += `<option value="${category.id}">${category.name}</option>`;
        });
        if(productNum == ''){
            productNumVal = 1;
        }else {
            productNumVal = parseInt(productNum) + 1;
        }
        if(productNumVal == 5){
            $('.productNum').prop('disabled', true);
            toastr.info("You can only add four products for one blog", "Info", {
                positionClass: "toast-top-right",
            });
            return false;
        }
    $(".productForm").append(`
                    <h3>Product <span class="productNum">`+ productNumVal +`</span></h3>
                    <br><br>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description[]" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image[]" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Product URL</label>
                        <input type="url" class="form-control" id="url" name="url[]" placeholder="https://example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_cat`+ productNumVal +`" class="form-label">Select Category</label>
                        <select class="form-select  product_cat"  name="product_cat[]" required>
                            <option value="" disabled selected>Select a category</option>
                            `+ optionsHtml +`
                        </select>
                    </div>`);

                   
  });

  $(document).ready(function() {
    $("#productForm").validate({
        rules: {

            "title": {
                required: true,
                minlength: 5
            },

            "description1": {
                required: true,
                minlength: 20 
            },

            "thumbnail": {
                required: true,
                extension: "jpg|jpeg|png|gif"
            },

            "category_id": {
                required: true
            },

            

            "product_name[]": {
                required: true,
                minlength: 2 
            },
            "description[]": {
                required: true,
                minlength: 10 // Example: at least 10 characters
            },
            "image[]": {
                required: true,
                extension: "jpg|jpeg|png|gif" // Allowed image types
            },
            "url[]": {
                required: true,
            },
            "product_cat[]": {
                required: true
            }

           
        },
       
        messages: {
            "title": {
                required: "Please enter title",
                minlength: "title  must be at least 5 characters long."
            },

            "description1": {
                required: "Please enter description",
                minlength: "Description  must be at least 20 characters long." 
            },

            "thumbnail": {
                required: "Please upload an image.",
                extension: "Only jpg, jpeg, png, and gif formats are allowed."
            },

            "category_id": {
                required: "Please select a category."
            },

            "product_name[]": {
                required: "Please enter a product name.",
                minlength: "Product name must be at least 2 characters long."
            },
            "description[]": {
                required: "Please enter a description.",
                minlength: "Description must be at least 10 characters long."
            },
            "image[]": {
                required: "Please upload an image.",
                extension: "Only jpg, jpeg, png, and gif formats are allowed."
            },
            "url[]": {
                required: "Please enter a product URL.",
            },
            "product_cat[]": {
                required: "Please select a category."
            }
        },
        submitHandler: function(form) {
            // This function is called when the form is valid
            form.submit(); // Submit the form
        }
    });
});

</script>
@endsection