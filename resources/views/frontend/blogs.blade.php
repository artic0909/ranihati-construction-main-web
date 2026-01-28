@extends('frontend.layouts.app')

@section('title', 'Blogs - Ranihati Construction Private Limited')

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>RCPL - Blogs</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            <div class="section-header text-center">
                <p>Latest Blog</p>
                <h2>Latest From Our Blog</h2>
            </div>
            <div class="row blog-page">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <a href="{{ route('blog.details', $blog->slug) }}" class="blog-img">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Image">
                            </a>
                            <div class="blog-title">
                                <h3>{{ $blog->title }}</h3>
                                <a class="btn" href="{{ route('blog.details', $blog->slug) }}">+</a>
                            </div>
                            <div class="blog-meta">
                                <p>By<a href="">Admin</a></p>
                                <p>In<a href="">Ranihati Const. Pvt. Ltd.</a></p>
                            </div>
                            <div class="blog-text">
                                <p>
                                    {{ Str::length($blog->about_author) > 100 ? Str::limit($blog->about_author, 100, '...') : $blog->about_author }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($blogs->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $blogs->previousPageUrl() }}">Previous</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            @if ($page == 1 || $page == $blogs->lastPage() || ($page >= $blogs->currentPage() - 1 && $page <= $blogs->currentPage() + 1))
                                @if ($page == $blogs->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @elseif ($page == 2 && $blogs->currentPage() > 3)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @elseif ($page == $blogs->lastPage() - 1 && $blogs->currentPage() < $blogs->lastPage() - 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($blogs->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection