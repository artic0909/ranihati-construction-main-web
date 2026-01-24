@extends('frontend.layouts.app')

@section('title', 'Ranihati Construction Private Limited - RCPL')

@section('content')

<!-- Carousel Start -->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/c1.jpg" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">Professional Craftsmanship</p>
                <h1 class="animated fadeInLeft">Perfect Finishes Every Time</h1>
                <a class="btn animated fadeInUp"
                    href="#">Get A Quote</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="img/c7.jpg" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">Complete Interior Solutions</p>
                <h1 class="animated fadeInLeft">From Flooring to False Ceiling</h1>
                <a class="btn animated fadeInUp"
                    href="#">Get A Quote</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="img/c9.jpg" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">Professional Builder</p>
                <h1 class="animated fadeInLeft">We Build Your Home</h1>
                <a class="btn animated fadeInUp"
                    href="#">Get A Quote</a>
            </div>
        </div>
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

                <div class="service-carousel-item">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/c1.jpg" alt="Image">
                        </div>
                        <div class="service-text">
                            <h3>Building Construction</h3>
                            <a class="btn" href="img/c1.jpg" data-lightbox="service">+</a>
                        </div>
                    </div>
                </div>

                <div class="service-carousel-item">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/c3.jpg" alt="Image">
                        </div>
                        <div class="service-text">
                            <h3>House Renovation</h3>
                            <a class="btn" href="img/c3.jpg" data-lightbox="service">+</a>
                        </div>
                    </div>
                </div>

                <div class="service-carousel-item">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/c4.jpg" alt="Image">
                        </div>
                        <div class="service-text">
                            <h3>Architecture Design</h3>
                            <a class="btn" href="img/c4.jpg" data-lightbox="service">+</a>
                        </div>
                    </div>
                </div>

                <div class="service-carousel-item">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/c2.jpg" alt="Image">
                        </div>
                        <div class="service-text">
                            <h3>Interior Design</h3>
                            <a class="btn" href="img/c2.jpg" data-lightbox="service">+</a>
                        </div>
                    </div>
                </div>

                <div class="service-carousel-item">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/c5.jpg" alt="Image">
                        </div>
                        <div class="service-text">
                            <h3>Fixing & Support</h3>
                            <a class="btn" href="img/c5.jpg" data-lightbox="service">+</a>
                        </div>
                    </div>
                </div>

                <div class="service-carousel-item">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/c6.jpg" alt="Image">
                        </div>
                        <div class="service-text">
                            <h3>Painting</h3>
                            <a class="btn" href="img/c6.jpg" data-lightbox="service">+</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Indicators -->
            <div class="carousel-indicators">
                <span class="indicator active" data-slide="0"></span>
                <span class="indicator" data-slide="1"></span>
                <span class="indicator" data-slide="2"></span>
                <span class="indicator" data-slide="3"></span>
                <span class="indicator" data-slide="4"></span>
                <span class="indicator" data-slide="5"></span>
            </div>
        </div>
    </div>
</div>
<!-- Our Works End -->

<!-- Our Products & Segments Start -->
<div class="service">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Products & Segments</p>
            <h2>Materials & Construction Solutions</h2>
        </div>
        <div id="work-carousel" class="work-carousel">
            <div class="work-carousel-inner">

                <div class="work-carousel-item">
                    <img src="img/s1.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s2.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s3.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s4.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s5.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s6.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s7.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s8.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/s9.jpg" alt="">
                </div>

                <div class="work-carousel-item">
                    <img src="img/c10.jpg" alt="">
                </div>

            </div>

            <!-- Indicators - 9 pills for 9 items -->
            <div class="carousel-indicators">
                <span class="indicator active" data-slide="0"></span>
                <span class="indicator" data-slide="1"></span>
                <span class="indicator" data-slide="2"></span>
                <span class="indicator" data-slide="3"></span>
                <span class="indicator" data-slide="4"></span>
                <span class="indicator" data-slide="5"></span>
                <span class="indicator" data-slide="6"></span>
                <span class="indicator" data-slide="7"></span>
                <span class="indicator" data-slide="8"></span>
                <span class="indicator" data-slide="8"></span>
            </div>
        </div>

    </div>
</div>
<!-- Our Products & Segments End -->


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
                            <h2 data-toggle="counter-up">109</h2>
                            <p>Expert Workers</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="fact-icon">
                            <i class="flaticon-building"></i>
                        </div>
                        <div class="fact-text">
                            <h2 data-toggle="counter-up">485</h2>
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
                            <h2 data-toggle="counter-up">789</h2>
                            <p>Completed Projects</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="fact-icon">
                            <i class="flaticon-crane"></i>
                        </div>
                        <div class="fact-text">
                            <h2 data-toggle="counter-up">890</h2>
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
                    <img src="img/about.png" alt="Image">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="section-header text-left">
                    <p>Welcome to Ranihati Construction Private Limited</p>
                    <h2>18 Years Experience</h2>
                </div>
                <div class="about-text" style="text-align: justify;">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                        Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida
                        condimentum, viverra quis sem.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                        Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida
                        condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean
                        consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
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
        <button type="button" class="btn-play" data-toggle="modal"
            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
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

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-1.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-2.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-3.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-4.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-1.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-1.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-2.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

                <div class="client-carousel-item">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-3.jpg" alt="Client Image">
                        </div>
                    </div>
                </div>

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
                    <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInLeft" data-wow-delay="0.5s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseFive" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="accordion-2">
                    <div class="card wow fadeInRight" data-wow-delay="0.1s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseSix" class="collapse" data-parent="#accordion-2">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInRight" data-wow-delay="0.2s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseSeven">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseSeven" class="collapse" data-parent="#accordion-2">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInRight" data-wow-delay="0.3s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseEight">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseEight" class="collapse" data-parent="#accordion-2">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInRight" data-wow-delay="0.4s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseNine">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseNine" class="collapse" data-parent="#accordion-2">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
                    <div class="card wow fadeInRight" data-wow-delay="0.5s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseTen">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapseTen" class="collapse" data-parent="#accordion-2">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium
                                mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>
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
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
                    <div class="slider-item">
                        <h3>Customer Name</h3>
                        <h4>profession</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.
                            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id
                            gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque
                            maximus.</p>
                    </div>
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