@extends('frontend.layouts.app')

@section('title', 'Mission & Vision - Ranihati Construction Private Limited')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Mission & Vision</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Mission & Vision Start -->
<div class="mission-vision">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Mission & Vision</p>
            <h2>Mission Statement & Vision Statement</h2>
        </div>
        <div class="row">
            @foreach($missions as $mission)
            <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="mission-vision-item">
                    <div class="mv-content">
                        <div class="mission-vision-img">
                            <img src="{{ asset('storage/' . $mission->image) }}" alt="Mission">
                        </div>
                        <div class="mission-vision-text">
                            <h3>{{ $mission->title }}</h3>
                            <p>
                                {{ $mission->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Mission & Vision End -->

@endsection