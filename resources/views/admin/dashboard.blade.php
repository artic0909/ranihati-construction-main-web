@extends('admin.layouts.app')

@section('title', 'Admin Dashboard | Ranihati Construction Private Limited')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            Welcome Back Super Admin! 🎉
                        </h5>
                        <p class="mb-4">It's your space.</p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('./admin/assets/img/illustrations/man-with-laptop-light.png') }}"
                            height="140" alt="View Badge User" />
                    </div>
                </div>

                <div class="col-12">
                    <div class="card-footer text-end">
                        <!-- Additional content can go here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add more dashboard content here -->
@endsection