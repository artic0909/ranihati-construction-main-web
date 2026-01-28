@extends('frontend.layouts.app')

@section('title', 'Contact Us - Ranihati Construction Private Limited')

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Get In Touch</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="contact wow fadeInUp">
        <div class="container">
            <div class="section-header text-center">
                <p>Get In Touch</p>
                <h2>For Any Query</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="flaticon-address"></i>
                            <div class="contact-text">
                                <h2>Location</h2>
                                <p>Shop No.13,M.Plaza,Ranihati, (Opp: Bank Of Baroda)
                                    Joynagar Panchla,, West Bengal 711302</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-call"></i>
                            <div class="contact-text">
                                <h2>Phone</h2>
                                <p>+91-9874444725 (HR)</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-send-mail"></i>
                            <div class="contact-text">
                                <h2>Email</h2>
                                <p>ranihati.construction@rconpl.in</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" method="POST" action="{{ route('enquiry.store') }}">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" name="name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" name="email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" name="message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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

@endsection