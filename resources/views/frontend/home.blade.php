@extends('frontend.layouts.app')

@section('title', 'Ranihati Construction Private Limited - RCPL')

@section('content')

    <!-- Carousel Start -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($carousels as $carousel)
                <li data-target="#carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($carousels as $carousel)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $carousel->image) }}" alt="Carousel Image">
                    <div class="carousel-caption">
                        <p class="animated fadeInRight">{{ $carousel->title }}</p>
                        <h1 class="animated fadeInLeft">{{ $carousel->bold_text }}</h1>
                        <a class="btn animated fadeInUp" href="#">Get Quote</a>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Carousel End -->


    <!-- Feature Start-->
    <div class="feature wow fadeInUp" data-wow-delay="0.1s">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="flaticon-worker"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Expert Worker</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phasus nec pretim ornare velit non</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="flaticon-building"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Quality Work</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phasus nec pretim ornare velit non</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="feature-text">
                            <h3>24/7 Support</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phasus nec pretim ornare velit non</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->

    <!-- Our Works Start -->
    <div class="service">
        <div class="container">
            <div class="section-header text-center">
                <p>Our Works</p>
                <h2>Excellence in Finishing & Facade Solutions</h2>
            </div>
            <div id="service-carousel" class="service-carousel">
                <div class="service-carousel-inner">
                    @foreach ($works as $work)
                        <div class="service-carousel-item">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="{{ asset('storage/' . $work->image) }}" alt="Image">
                                </div>
                                <div class="service-text">
                                    <h3>{{ $work->title }}</h3>
                                    <a class="btn" href="{{ asset('storage/' . $work->image) }}" data-lightbox="service">+</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Our Works End -->

    <!-- Our Projects & Segments Start -->
    <div class="service">
        <div class="container">
            <div class="section-header text-center">
                <p>Our Projects & Segments</p>
                <h2>Materials & Construction Solutions</h2>
            </div>
            <div id="work-carousel" class="work-carousel">
                <div class="work-carousel-inner">
                    @foreach ($projects as $project)
                        <div class="work-carousel-item">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Our Projects & Segments End -->

    <!-- Fact Start -->
    <div class="fact">
        <div class="container-fluid">
            <div class="row counters">
                <div class="col-md-6 fact-left wow slideInLeft">
                    <div class="row">
                        <div class="col-6">
                            <div class="fact-icon">
                                <i class="flaticon-worker"></i>
                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">{{ $fact->no_of_experts }}</h2>
                                <p>Expert Workers</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fact-icon">
                                <i class="flaticon-building"></i>
                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">{{ $fact->no_of_clients }}</h2>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 fact-right wow slideInRight">
                    <div class="row">
                        <div class="col-6">
                            <div class="fact-icon">
                                <i class="flaticon-address"></i>
                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">{{ $fact->no_of_completed_projects }}</h2>
                                <p>Completed Projects</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fact-icon">
                                <i class="flaticon-crane"></i>
                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">{{ $fact->no_of_running_projects }}</h2>
                                <p>Running Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- About Start -->
    <div class="about wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>Welcome to Ranihati Construction Private Limited</p>
                        <h2>18 Years Experience</h2>
                    </div>
                    <div class="about-text" style="text-align: justify;">
                        <p>
                            {{ $about->description_one }}
                        </p>
                        <p>
                            {{ $about->description_two }}
                        </p>
                        <a class="btn" href="">Get A Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Video Start -->
    <div class="video wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc"
                data-target="#videoModal">
                <span></span>
            </button>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->

    <!-- Our Clients Start -->
    <div class="team">
        <div class="container">
            <div class="section-header text-center">
                <p>Our Clients</p>
                <h2>Our Happy Clients</h2>
            </div>
            <div id="client-carousel" class="client-carousel">
                <div class="client-carousel-inner">
                    @foreach ($clients as $client)
                        <div class="client-carousel-item">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="{{ asset('storage/' . $client->image) }}" alt="Client Image">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Our Clients End -->

    <!-- Map Start-->
    <div class="team">
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.2457400305148!2d88.15359881116677!3d22.564069079412285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a028142cd118f05%3A0x573fefde2b8f0953!2sRANIHATI%20CONSTRUCTION%20PVT.%20LTD.!5e1!3m2!1sen!2sin!4v1769065889562!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- Map End -->

    <!-- FAQs Start -->
    <div class="faqs">
        <div class="container">
            <div class="section-header text-center">
                <p>Frequently Asked Question</p>
                <h2>You May Ask</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="accordion-1">
                        @foreach ($faqsFirstEight as $index => $faq)
                            <div class="card wow fadeInLeft" data-wow-delay="{{ 0.1 * ($index + 1) }}s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{ $faq->id }}">
                                        {{ Str::length($faq->question) > 70 ? Str::limit($faq->question, 70, '...') : $faq->question }}
                                    </a>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="accordion-2">
                        @foreach ($faqsLastEight as $index => $faq)
                            <div class="card wow fadeInRight" data-wow-delay="{{ 0.1 * ($index + 1) }}s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{ $faq->id }}">
                                        {{ Str::length($faq->question) > 70 ? Str::limit($faq->question, 70, '...') : $faq->question }}
                                    </a>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

    <!-- Testimonial Start -->
    <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider-nav">
                        <div class="slider-nav"><img src="img/testimonial-1.jpg" alt="Testimonial"></div>
                        <div class="slider-nav"><img src="img/testimonial-2.jpg" alt="Testimonial"></div>
                        <div class="slider-nav"><img src="img/testimonial-3.jpg" alt="Testimonial"></div>
                        <div class="slider-nav"><img src="img/testimonial-4.jpg" alt="Testimonial"></div>
                        <div class="slider-nav"><img src="img/testimonial-1.jpg" alt="Testimonial"></div>
                        <div class="slider-nav"><img src="img/testimonial-2.jpg" alt="Testimonial"></div>
                        <div class="slider-nav"><img src="img/testimonial-3.jpg" alt="Testimonial"></div>
                        <div class="slider-nav"><img src="img/testimonial-4.jpg" alt="Testimonial"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider">
                        @foreach ($testimonials as $testimonial)
                            <div class="slider-item">
                                <h3>{{ $testimonial->name }}</h3>
                                <h4>{{ $testimonial->profession }}</h4>
                                <p>{{ $testimonial->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            <div class="section-header text-center">
                <p>Latest Blog</p>
                <h2>Latest From Our Blog</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-1.jpg" alt="Image">
                        </div>
                        <div class="blog-title">
                            <h3>Lorem ipsum dolor sit</h3>
                            <a class="btn" href="">+</a>
                        </div>
                        <div class="blog-meta">
                            <p>By<a href="">Admin</a></p>
                            <p>In<a href="">Construction</a></p>
                        </div>
                        <div class="blog-text">
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis
                                ornare velit non vulputate. Aliquam metus tortor
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-2.jpg" alt="Image">
                        </div>
                        <div class="blog-title">
                            <h3>Lorem ipsum dolor sit</h3>
                            <a class="btn" href="">+</a>
                        </div>
                        <div class="blog-meta">
                            <p>By<a href="">Admin</a></p>
                            <p>In<a href="">Construction</a></p>
                        </div>
                        <div class="blog-text">
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis
                                ornare velit non vulputate. Aliquam metus tortor
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-3.jpg" alt="Image">
                        </div>
                        <div class="blog-title">
                            <h3>Lorem ipsum dolor sit</h3>
                            <a class="btn" href="">+</a>
                        </div>
                        <div class="blog-meta">
                            <p>By<a href="">Admin</a></p>
                            <p>In<a href="">Construction</a></p>
                        </div>
                        <div class="blog-text">
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis
                                ornare velit non vulputate. Aliquam metus tortor
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container">
            <div class="section-header text-center">
                <p>We Build Everything</p>
                <h2>Brands Under Ranihati Construction</h2>
            </div>
            <div class="brand-container">
                <div class="brand-item wow fadeInUp" data-wow-delay="0.1s">
                    <a href="http://www.duracoat.co.in/" target="_blank" class="brand-img">
                        <img src="img/brand1.png" alt="Brand Image">
                    </a>
                </div>
                <div class="brand-item wow fadeInUp" data-wow-delay="0.3s">
                    <a href="https://rconpl.in/dozo/" target="_blank" class="brand-img">
                        <img src="img/brand2.png" alt="Brand Image">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

@endsection