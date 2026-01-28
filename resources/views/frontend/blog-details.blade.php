@extends('frontend.layouts.app')

@section('title', 'Ranihati Construction Private Limited - RCPL')

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Blogs Details</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Single Post Start-->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content wow fadeInUp">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                            style="width: 100%; height: auto; object-fit: cover; margin-bottom: 20px;" />

                        <h2>{{ $blog->title }}</h2>

                        <div class="blog-meta" style="margin-bottom: 20px;">
                            <p>
                                <span class="badge bg-primary">{{ ucfirst($blog->category) }}</span>
                                <span class="badge bg-info">{{ ucfirst($blog->tag) }}</span>
                                <span style="margin-left: 10px;">By <strong>{{ $blog->author_name }}</strong></span>
                                <span style="margin-left: 10px;">{{ $blog->created_at->format('M d, Y') }}</span>
                            </p>
                        </div>

                        <div class="blog-description">
                            {!! $blog->description !!}
                        </div>
                    </div>

                    <div class="single-bio wow fadeInUp">
                        <div class="single-bio-img">
                            <img src="{{ asset('img/user.jpg') }}" alt="{{ $blog->author_name }}" />
                        </div>
                        <div class="single-bio-text">
                            <h3>{{ $blog->author_name }}</h3>
                            <p>
                                {{ $blog->about_author }}
                            </p>
                        </div>
                    </div>
                    <div class="single-related wow fadeInUp">
                    <h2>Related Posts - {{ ucfirst($blog->category) }}</h2>
                    @if($relatedBlogs->count() > 0)
                        <div class="owl-carousel related-slider">
                            @foreach($relatedBlogs as $relatedBlog)
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="{{ asset('storage/' . $relatedBlog->image) }}" alt="{{ $relatedBlog->title }}" />
                                    </div>
                                    <div class="post-text">
                                        <a href="{{ route('blog.details', $relatedBlog->slug) }}">{{ Str::limit($relatedBlog->title, 50) }}</a>
                                        <div class="post-meta">
                                            <p>By<a href="">{{ $relatedBlog->author_name }}</a></p>
                                            <p>In<a href="">{{ ucfirst($relatedBlog->category) }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No related posts found in this category.</p>
                    @endif
                </div>


                    <div class="comment-form wow fadeInUp">
                        <h2>Leave a comment</h2>
                        <form>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="search-widget">
                                <form>
                                    <input class="form-control" type="text" placeholder="Search by Tags">
                                    <button class="btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="sidebar-widget wow fadeInUp">
                        <h2 class="widget-title">Recent Post</h2>
                        <div class="recent-post">
                            @foreach($recentBlogs as $recentBlog)
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="{{ asset('storage/' . $recentBlog->image) }}" alt="{{ $recentBlog->title }}" />
                                    </div>
                                    <div class="post-text">
                                        <a href="{{ route('blog.details', $recentBlog->slug) }}">{{ Str::limit($recentBlog->title, 40) }}</a>
                                        <div class="post-meta">
                                            <p>By<a href="">{{ $recentBlog->author_name }}</a></p>
                                            <p>In<a href="">{{ ucfirst($recentBlog->category) }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                        <div class="sidebar-widget wow fadeInUp">
                            <div class="image-widget">
                                <a href="#"><img src="img/blog-1.jpg" alt="Image"></a>
                            </div>
                        </div>


                        <div class="sidebar-widget wow fadeInUp">
                            <div class="image-widget">
                                <a href="#"><img src="{{ asset('img/blog-2.jpg') }}" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget wow fadeInUp">
                            <h2 class="widget-title">Categories</h2>
                            <div class="category-widget">
                                <ul>
                                    <li><a href="">National</a><span>(98)</span></li>
                                    <li><a href="">International</a><span>(87)</span></li>
                                    <li><a href="">Economics</a><span>(76)</span></li>
                                    <li><a href="">Politics</a><span>(65)</span></li>
                                    <li><a href="">Lifestyle</a><span>(54)</span></li>
                                    <li><a href="">Technology</a><span>(43)</span></li>
                                    <li><a href="">Trades</a><span>(32)</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget wow fadeInUp">
                            <div class="image-widget">
                                <a href="#"><img src="{{ asset('img/blog-3.jpg') }}" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget wow fadeInUp">
                            <h2 class="widget-title">Raniahti Construction</h2>
                            <div class="text-widget">
                                <p style="text-align: justify;">
                                    We are doing finishing work, FACADE WORK &nbsp;&nbsp; ( Glazing, Acp, stone, funder
                                    max), Ss hand rail, louver, glass. Radiance Construction my proprietor ship business.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Post End-->

@endsection