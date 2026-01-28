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

            <!-- Category Filter -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                        <a href="{{ route('blogs') }}"
                            class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}">
                            All Categories
                        </a>
                        @foreach($categories as $cat)
                            <a href="{{ route('blogs', ['category' => $cat]) }}"
                                class="btn {{ request('category') == $cat ? 'btn-primary' : 'btn-outline-primary' }}">
                                {{ ucfirst($cat) }}
                            </a>
                        @endforeach
                    </div>

                    @if(request('category'))
                        <div class="text-center mt-3">
                            <p class="text-muted">
                                Showing blogs in category: <strong>{{ ucfirst(request('category')) }}</strong>
                                <a href="{{ route('blogs') }}" class="text-danger ms-2">(Clear Filter)</a>
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
                                <p>In<a
                                        href="{{ route('blogs', ['category' => $blog->category]) }}">{{ ucfirst($blog->category) }}</a>
                                </p>
                            </div>
                            <div class="mb-2">
                                <span class="badge bg-primary">{{ ucfirst($blog->category) }}</span>
                                <span class="badge bg-info">{{ ucfirst($blog->tag) }}</span>
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
                                    href="{{ $blogs->appends(['category' => request('category')])->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($blogs->appends(['category' => request('category')])->getUrlRange(1, $blogs->lastPage()) as $page => $url)
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
                                    href="{{ $blogs->appends(['category' => request('category')])->nextPageUrl() }}">Next</a>
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