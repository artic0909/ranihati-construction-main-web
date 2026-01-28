@extends('frontend.layouts.app')

@section('title', 'Services - Ranihati Construction Private Limited')

@section('content')


    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Our Services</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="service">
        <div class="container">
            <div class="section-header text-center">
                <p>Our Services</p>
                <h2>We Provide Services</h2>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Image">
                            </div>
                            <div class="service-text">
                                <h3>{{ $service->title }}</h3>
                                <a class="btn" href="{{ asset('storage/' . $service->image) }}" data-lightbox="service">+</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Project Start -->
    <div class="portfolio">
        <div class="container">
            <div class="section-header text-center">
                <p>Our Projects</p>
                <h2>Visit Our Projects</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*">All</li>
                        <li data-filter=".complete" class="filter-active">Complete</li>
                        <li data-filter=".running">Running</li>
                        <li data-filter=".upcoming">Upcoming</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item {{ Str::slug($project->category) }} wow fadeInUp"
                        data-wow-delay="0.1s">
                        <div class="portfolio-warp">
                            <div class="portfolio-img">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="Image">
                            </div>
                            <div class="portfolio-text">
                                <h3>{{ $project->title }}</h3>
                                <a class="btn" href="{{ asset('storage/' . $project->image) }}" data-lightbox="portfolio">+</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Project End -->

@endsection