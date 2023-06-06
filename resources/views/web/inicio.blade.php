@extends('web.layout')


@section('main')
<link rel="stylesheet" href="{{ asset('css2/bootstrap.css')}}">
<link rel="stylesheet" href="{{ asset('css2/font-awesome.css')}}">
<link rel="stylesheet" href="{{ asset('css2/custom.css') }}">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Lora|Merriweather:300,400" rel="stylesheet">
<section id="home" class="main-home parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12 " style="margin-top: 45%">
                    <h1>HELP A MOVIE</h1>
                    <h4>Beautiful masterpieces waiting for your help</h4>
                    <a href="/peliculas" class="smoothScroll btn btn-default">Donate here</a>
               </div>
          </div>
     </div>
</section>
<section id="blog">
     <div class="container">
          <div class="row">
               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="blog-post-thumb">
                         <div class="blog-post-image">
                              <a href="single-post.html">
                                   <img src="https://images.pexels.com/photos/65437/pexels-photo-65437.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-responsive" alt="Blog Image">
                              </a>
                         </div>
                         <div class="blog-post-title">
                              <h3><a href="single-post.html">We Help Creators Show Their Talent</a></h3>
                         </div>
                         <div class="blog-post-format">
                              <span><i class="fa fa-date"></i> July 22, 2017</span>
                         </div>
                         <div class="blog-post-des">
                              <p>
                                   At our crowdfunding platform, we are dedicated to empowering creators and providing them with a global platform to showcase their innovative projects. We believe in nurturing their talent and helping them bring their ideas to life. By supporting these creators, we aim to amplify their voices and connect them with a wide audience, propelling their projects to new heights. Together, let's foster a community that celebrates creativity, fuels inspiration, and enables visionary storytellers to shine.
                              </p>
                             
                         </div>
                    </div>

                    <div class="blog-post-thumb">
                         <div class="blog-post-image">
                              <a href="single-post.html">
                                   <img src="https://images.pexels.com/photos/7991579/pexels-photo-7991579.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-responsive" alt="Blog Image">
                              </a>
                         </div>
                         <div class="blog-post-title">
                              <h3><a href="single-post.html">Our Mission</a></h3>
                         </div>
                         <div class="blog-post-format">
                              <span><i class="fa fa-date"></i> June 10, 2017</span>
                         </div>
                         <div class="blog-post-des">
                              <p>Our mission is to revolutionize the way talented individuals in the creative industry gain exposure and funding for their projects. Through our crowdfunding platform, we offer creators a powerful avenue to showcase their work, secure vital investments, and generate buzz. By investing in these exceptional talents, we not only provide them with the necessary financial support but also leverage our extensive marketing and advertising network to ensure their projects receive the attention they deserve. Together, let's unlock the potential of aspiring creators, amplify their reach, and shape the future of the entertainment industry.</p>
                              
                         </div>
                    </div>
               </div>

          </div>
     </div>
</section>
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


</body>
</html>
@endsection