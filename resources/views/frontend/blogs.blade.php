@extends('frontend.layouts.app')

@section('title', 'Blogs - Ranihati Construction Private Limited')



@section('content')

    @foreach($blogs as $blog)
        <meta name="description" content="{{ $blog->description }}">
        <meta name="keywords"
            content="{{ $blog->tags }}, {{ $blog->category }}, {{ $blog->title }}, {{ $blog->author_name }}">

        <meta property="og:title" content="{{ $blog->title }}">
        <meta property="og:description" content="{{ $blog->description }}">
        <meta property="og:url" content="{{ url('/blog/' . $blog->slug) }}">
        <meta name="twitter:title" content="{{ $blog->title }}">
        <meta name="twitter:description" content="{{ $blog->description }}">
        <meta name="twitter:category" content="{{ $blog->category }}">
        <meta name="twitter:link" content="{{ url('/blog/' . $blog->slug) }}">
    @endforeach

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

            <!-- Search Bar -->
            <div class="row mb-5">
                <div class="col-12">
                    <form action="{{ route('blogs') }}" method="GET" class="d-flex justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search blogs by title, category, or tags..." value="{{ request('search') }}"
                                style="border-radius: 25px 0 0 25px; padding: 12px 20px; border: 2px solid #FDBE33; border-right: none; height: 50px;">
                            <button class="btn" type="submit"
                                style="border-radius: 0 25px 25px 0; padding: 12px 30px; background-color: #FDBE33; border: 2px solid #FDBE33; color: #fff; font-weight: 600; height: 50px; display: flex; align-items: center; gap: 5px;">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </form>

                    @if(request('search'))
                        <div class="text-center mt-3">
                            <p class="text-muted">
                                Search results for: <strong>"{{ request('search') }}"</strong>
                                <a href="{{ route('blogs') }}" class="text-danger ms-2">(Clear Search)</a>
                            </p>
                        </div>
                    @endif
                </div>
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
                                <p>By<a href="">{{ $blog->author_name }}</a></p>
                                <p>In<a href="">{{ ucfirst($blog->category) }}</a>
                                </p>
                            </div>
                            <div class="blog-text">
                                <p>
                                    {{ Str::length($blog->description) > 150 ? Str::limit(strip_tags($blog->description), 150, '...') : strip_tags($blog->description) }}
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
                            <li class="page-item"><a class="page-link"
                                    href="{{ $blogs->appends(['search' => request('search')])->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($blogs->appends(['search' => request('search')])->getUrlRange(1, $blogs->lastPage()) as $page => $url)
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
                            <li class="page-item"><a class="page-link"
                                    href="{{ $blogs->appends(['search' => request('search')])->nextPageUrl() }}">Next</a>
                            </li>
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