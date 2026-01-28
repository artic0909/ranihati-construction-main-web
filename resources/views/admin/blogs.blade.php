@extends('admin.layouts.app')

@section('title', 'Blogs | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Blogs
                            </h5>
                            <p class="mb-4">Add Blogs</p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <!-- Search Functionality -->
                        <form class="me-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="btn btn-warning me-2" type="button">Search</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal">Add
                                Blog</button>
                        </div>
                        <div class="card-body">
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Author Name</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr style="text-align: left;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Work Image"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->category }}</td>
                                            <td>{{ $blog->author_name }}</td>
                                            <td><button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#viewBlogModal{{ $blog->id }}">View Details</button></td>
                                            <td>
                                                <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                    data-bs-target="#updateBlogModal{{ $blog->id }}"><i
                                                        class='bx bx-pencil'></i></button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteBlogModal{{ $blog->id }}"><i
                                                        class='bx bx-trash'></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- {{-- Pagination --}} -->
                            @if ($blogs->hasPages())
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4 align-items-center">

                                        <!-- {{-- Prev Button --}} -->
                                        <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary" href="{{ $blogs->previousPageUrl() }}">Prev</a>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Page Input + Total --}} -->
                                        <li class="page-item d-flex align-items-center" style="margin: 0 2px;">
                                            <form action="" method="GET" class="d-flex align-items-center"
                                                style="margin:0; padding:0;">
                                                <input type="number" name="page" value="{{ $blogs->currentPage() }}" min="1"
                                                    max="{{ $blogs->lastPage() }}" readonly class="form-control">
                                                <input type="text" value="/ {{ $blogs->lastPage() }}" readonly
                                                    class="form-control">
                                            </form>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Next Button --}} -->
                                        <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary" href="{{ $blogs->nextPageUrl() }}">Next</a>
                                        </li>

                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Blog Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" action="{{ route('admin.blogs.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addBlogModalLabel">Add Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="blogImage" class="form-label">Blog Image</label>
                        <input class="form-control" type="file" id="blogImage" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="blogTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="blogTitle" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="blogCategory" class="form-label">Category</label>
                        <select name="category" id="blogCategory" class="form-control">
                            <option value="">Select Category</option>
                            <option value="technology">Technology</option>
                            <option value="construction">Construction</option>
                            <option value="finishing">Finishing</option>
                            <option value="facade">Facade Work</option>
                            <option value="cladding">Cladding Work</option>
                            <option value="canopy">Canopy</option>
                            <option value="false-ceiling">False Ceiling</option>
                            <option value="waterproofing">Waterproofing</option>
                            <option value="structural-glazing">Structural Glazing</option>
                            <option value="interior">Interior Work</option>
                            <option value="exterior">Exterior Work</option>
                            <option value="painting">Painting Work</option>
                            <option value="flooring">Flooring Work</option>
                            <option value="tiling">Tiling Work</option>
                            <option value="insulation">Insulation Work</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="business">Business</option>
                            <option value="health">Health & Wellness</option>
                            <option value="travel">Travel</option>
                            <option value="food">Food & Recipes</option>
                            <option value="fashion">Fashion</option>
                            <option value="education">Education</option>
                            <option value="entertainment">Entertainment</option>
                            <option value="sports">Sports</option>
                            <option value="politics">Politics</option>
                            <option value="trending">Trending</option>
                            <option value="featured">Featured</option>
                            <option value="latest">Latest</option>
                            <option value="popular">Popular</option>
                            <option value="tutorial">Tutorial</option>
                            <option value="guide">Guide</option>
                            <option value="tips">Tips & Tricks</option>
                            <option value="news">News</option>
                            <option value="review">Review</option>
                            <option value="howto">How To</option>
                            <option value="beginner">Beginner</option>
                            <option value="advanced">Advanced</option>
                            <option value="government">Government</option>
                            <option value="election">Election</option>
                            <option value="policy">Policy</option>
                            <option value="international">International</option>
                            <option value="debate">Debate</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="blogTag" class="form-label">Tag</label>
                        <select name="tag" id="blogTag" class="form-control">
                            <option value="">Select Tag</option>
                            <option value="residential">Residential</option>
                            <option value="commercial">Commercial</option>
                            <option value="industrial">Industrial</option>
                            <option value="renovation">Renovation</option>
                            <option value="new-build">New Build</option>
                            <option value="eco-friendly">Eco-Friendly</option>
                            <option value="budget">Budget-Friendly</option>
                            <option value="premium">Premium</option>
                            <option value="diy">DIY</option>
                            <option value="professional">Professional</option>
                            <option value="modern">Modern</option>
                            <option value="traditional">Traditional</option>
                            <option value="contemporary">Contemporary</option>
                            <option value="luxury">Luxury</option>
                            <option value="affordable">Affordable</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="repair">Repair</option>
                            <option value="installation">Installation</option>
                            <option value="design">Design</option>
                            <option value="planning">Planning</option>
                            <option value="safety">Safety</option>
                            <option value="materials">Materials</option>
                            <option value="techniques">Techniques</option>
                            <option value="before-after">Before & After</option>
                            <option value="case-study">Case Study</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="blogDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="blogDescription" rows="3" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="blogAuthorName" class="form-label">Author Name</label>
                        <input type="text" class="form-control" id="blogAuthorName" name="author_name">
                    </div>
                    <div class="mb-3">
                        <label for="blogAboutAuthor" class="form-label">About Author</label>
                        <textarea class="form-control" id="blogAboutAuthor" rows="3" name="about_author"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Add Work Modal -->

    <!-- Update Testimonial Modal -->
    @foreach ($blogs as $blog)
        <div class="modal fade" id="updateBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="updateBlogModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form class="modal-content" action="{{ route('admin.blogs.update', $blog->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="updateBlogModalLabel">Update Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="blogImage" class="form-label">Blog Image</label>
                            <input class="form-control" type="file" id="blogImage" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="blogTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="blogTitle" name="title" value="{{ $blog->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="blogCategory" class="form-label">Category</label>
                            <select name="category" id="blogCategory" class="form-control">
                                <option value="">Select Category</option>
                                <option value="technology" {{ $blog->category == 'technology' ? 'selected' : '' }}>Technology
                                </option>
                                <option value="lifestyle" {{ $blog->category == 'lifestyle' ? 'selected' : '' }}>Lifestyle
                                </option>
                                <option value="business" {{ $blog->category == 'business' ? 'selected' : '' }}>Business</option>
                                <option value="health" {{ $blog->category == 'health' ? 'selected' : '' }}>Health & Wellness
                                </option>
                                <option value="travel" {{ $blog->category == 'travel' ? 'selected' : '' }}>Travel</option>
                                <option value="food" {{ $blog->category == 'food' ? 'selected' : '' }}>Food & Recipes</option>
                                <option value="fashion" {{ $blog->category == 'fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="education" {{ $blog->category == 'education' ? 'selected' : '' }}>Education
                                </option>
                                <option value="entertainment" {{ $blog->category == 'entertainment' ? 'selected' : '' }}>
                                    Entertainment</option>
                                <option value="sports" {{ $blog->category == 'sports' ? 'selected' : '' }}>Sports</option>
                                <option value="politics" {{ $blog->category == 'politics' ? 'selected' : '' }}>Politics</option>
                                <option value="construction" {{ $blog->category == 'construction' ? 'selected' : '' }}>
                                    Construction
                                </option>
                                <option value="finishing" {{ $blog->category == 'finishing' ? 'selected' : '' }}>Finishing
                                </option>
                                <option value="facade" {{ $blog->category == 'facade' ? 'selected' : '' }}>Facade Work
                                </option>
                                <option value="cladding" {{ $blog->category == 'cladding' ? 'selected' : '' }}>Cladding Work
                                </option>
                                <option value="canopy" {{ $blog->category == 'canopy' ? 'selected' : '' }}>Canopy</option>
                                <option value="false-ceiling" {{ $blog->category == 'false-ceiling' ? 'selected' : '' }}>
                                    False Ceiling</option>
                                <option value="waterproofing" {{ $blog->category == 'waterproofing' ? 'selected' : '' }}>
                                    Waterproofing</option>
                                <option value="structural-glazing" {{ $blog->category == 'structural-glazing' ? 'selected' : '' }}>Structural Glazing</option>
                                <option value="interior" {{ $blog->category == 'interior' ? 'selected' : '' }}>Interior Work
                                </option>
                                <option value="exterior" {{ $blog->category == 'exterior' ? 'selected' : '' }}>Exterior Work
                                </option>
                                <option value="painting" {{ $blog->category == 'painting' ? 'selected' : '' }}>Painting Work
                                </option>
                                <option value="flooring" {{ $blog->category == 'flooring' ? 'selected' : '' }}>Flooring Work
                                </option>
                                <option value="tiling" {{ $blog->category == 'tiling' ? 'selected' : '' }}>Tiling Work</option>
                                <option value="insulation" {{ $blog->category == 'insulation' ? 'selected' : '' }}>Insulation
                                    Work</option>
                                <option value="lifestyle" {{ $blog->category == 'lifestyle' ? 'selected' : '' }}>Lifestyle
                                </option>
                                <option value="business" {{ $blog->category == 'business' ? 'selected' : '' }}>Business</option>
                                <option value="health" {{ $blog->category == 'health' ? 'selected' : '' }}>Health & Wellness
                                </option>
                                <option value="travel" {{ $blog->category == 'travel' ? 'selected' : '' }}>Travel</option>
                                <option value="food" {{ $blog->category == 'food' ? 'selected' : '' }}>Food & Recipes</option>
                                <option value="fashion" {{ $blog->category == 'fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="education" {{ $blog->category == 'education' ? 'selected' : '' }}>Education
                                </option>
                                <option value="entertainment" {{ $blog->category == 'entertainment' ? 'selected' : '' }}>
                                    Entertainment</option>
                                <option value="sports" {{ $blog->category == 'sports' ? 'selected' : '' }}>Sports</option>
                                <option value="politics" {{ $blog->category == 'politics' ? 'selected' : '' }}>Politics</option>
                                <option value="trending" {{ $blog->category == 'trending' ? 'selected' : '' }}>Trending</option>
                                <option value="featured" {{ $blog->category == 'featured' ? 'selected' : '' }}>Featured</option>
                                <option value="latest" {{ $blog->category == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="popular" {{ $blog->category == 'popular' ? 'selected' : '' }}>Popular</option>
                                <option value="tutorial" {{ $blog->category == 'tutorial' ? 'selected' : '' }}>Tutorial</option>
                                <option value="guide" {{ $blog->category == 'guide' ? 'selected' : '' }}>Guide</option>
                                <option value="tips" {{ $blog->category == 'tips' ? 'selected' : '' }}>Tips & Tricks</option>
                                <option value="news" {{ $blog->category == 'news' ? 'selected' : '' }}>News</option>
                                <option value="review" {{ $blog->category == 'review' ? 'selected' : '' }}>Review</option>
                                <option value="howto" {{ $blog->category == 'howto' ? 'selected' : '' }}>How To</option>
                                <option value="beginner" {{ $blog->category == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="advanced" {{ $blog->category == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                <option value="government" {{ $blog->category == 'government' ? 'selected' : '' }}>Government
                                </option>
                                <option value="election" {{ $blog->category == 'election' ? 'selected' : '' }}>Election</option>
                                <option value="policy" {{ $blog->category == 'policy' ? 'selected' : '' }}>Policy</option>
                                <option value="international" {{ $blog->category == 'international' ? 'selected' : '' }}>
                                    International</option>
                                <option value="debate" {{ $blog->category == 'debate' ? 'selected' : '' }}>Debate</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="blogTag" class="form-label">Tag</label>
                            <select name="tag" id="blogTag" class="form-control">
                                <option value="">Select Tag</option>
                                <option value="residential" {{ $blog->tag == 'residential' ? 'selected' : '' }}>Residential
                                </option>
                                <option value="commercial" {{ $blog->tag == 'commercial' ? 'selected' : '' }}>Commercial
                                </option>
                                <option value="industrial" {{ $blog->tag == 'industrial' ? 'selected' : '' }}>Industrial
                                </option>
                                <option value="renovation" {{ $blog->tag == 'renovation' ? 'selected' : '' }}>Renovation
                                </option>
                                <option value="new-build" {{ $blog->tag == 'new-build' ? 'selected' : '' }}>New Build
                                </option>
                                <option value="eco-friendly" {{ $blog->tag == 'eco-friendly' ? 'selected' : '' }}>Eco-Friendly
                                </option>
                                <option value="budget" {{ $blog->tag == 'budget' ? 'selected' : '' }}>Budget-Friendly
                                </option>
                                <option value="premium" {{ $blog->tag == 'premium' ? 'selected' : '' }}>Premium</option>
                                <option value="diy" {{ $blog->tag == 'diy' ? 'selected' : '' }}>DIY</option>
                                <option value="professional" {{ $blog->tag == 'professional' ? 'selected' : '' }}>Professional
                                </option>
                                <option value="modern" {{ $blog->tag == 'modern' ? 'selected' : '' }}>Modern</option>
                                <option value="traditional" {{ $blog->tag == 'traditional' ? 'selected' : '' }}>Traditional
                                </option>
                                <option value="contemporary" {{ $blog->tag == 'contemporary' ? 'selected' : '' }}>
                                    Contemporary</option>
                                <option value="luxury" {{ $blog->tag == 'luxury' ? 'selected' : '' }}>Luxury</option>
                                <option value="affordable" {{ $blog->tag == 'affordable' ? 'selected' : '' }}>Affordable
                                </option>
                                <option value="maintenance" {{ $blog->tag == 'maintenance' ? 'selected' : '' }}>Maintenance
                                </option>
                                <option value="repair" {{ $blog->tag == 'repair' ? 'selected' : '' }}>Repair</option>
                                <option value="installation" {{ $blog->tag == 'installation' ? 'selected' : '' }}>
                                    Installation</option>
                                <option value="design" {{ $blog->tag == 'design' ? 'selected' : '' }}>Design</option>
                                <option value="planning" {{ $blog->tag == 'planning' ? 'selected' : '' }}>Planning</option>
                                <option value="safety" {{ $blog->tag == 'safety' ? 'selected' : '' }}>Safety</option>
                                <option value="materials" {{ $blog->tag == 'materials' ? 'selected' : '' }}>Materials
                                </option>
                                <option value="techniques" {{ $blog->tag == 'techniques' ? 'selected' : '' }}>Techniques
                                </option>
                                <option value="before-after" {{ $blog->tag == 'before-after' ? 'selected' : '' }}>
                                    Before & After</option>
                                <option value="case-study" {{ $blog->tag == 'case-study' ? 'selected' : '' }}>Case Study
                                </option>
                                <option value="trending" {{ $blog->tag == 'trending' ? 'selected' : '' }}>Trending</option>
                                <option value="featured" {{ $blog->tag == 'featured' ? 'selected' : '' }}>Featured</option>
                                <option value="latest" {{ $blog->tag == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="popular" {{ $blog->tag == 'popular' ? 'selected' : '' }}>Popular</option>
                                <option value="tutorial" {{ $blog->tag == 'tutorial' ? 'selected' : '' }}>Tutorial</option>
                                <option value="guide" {{ $blog->tag == 'guide' ? 'selected' : '' }}>Guide</option>
                                <option value="tips" {{ $blog->tag == 'tips' ? 'selected' : '' }}>Tips & Tricks</option>
                                <option value="news" {{ $blog->tag == 'news' ? 'selected' : '' }}>News</option>
                                <option value="review" {{ $blog->tag == 'review' ? 'selected' : '' }}>Review</option>
                                <option value="howto" {{ $blog->tag == 'howto' ? 'selected' : '' }}>How To</option>
                                <option value="beginner" {{ $blog->tag == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="advanced" {{ $blog->tag == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                <option value="government" {{ $blog->tag == 'government' ? 'selected' : '' }}>Government
                                </option>
                                <option value="election" {{ $blog->tag == 'election' ? 'selected' : '' }}>Election</option>
                                <option value="policy" {{ $blog->tag == 'policy' ? 'selected' : '' }}>Policy</option>
                                <option value="international" {{ $blog->tag == 'international' ? 'selected' : '' }}>
                                    International</option>
                                <option value="debate" {{ $blog->tag == 'debate' ? 'selected' : '' }}>Debate</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="blogDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="blogDescription" rows="3"
                                name="description">{{ $blog->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="blogAuthorName" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="blogAuthorName" name="author_name"
                                value="{{ $blog->author_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="blogAboutAuthor" class="form-label">About Author</label>
                            <textarea class="form-control" id="blogAboutAuthor" rows="3"
                                name="about_author">{{ $blog->about_author }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <!-- End Update Blog Modal -->

    <!-- Delete Modal -->
    @foreach ($blogs as $blog)
        <div class="modal fade" id="deleteBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="deleteBlogModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteBlogModalLabel">Delete Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this blog?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <!-- End Delete Modal -->

    <!-- View Blog Modal -->
    @foreach ($blogs as $blog)
        <div class="modal fade" id="viewBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="viewBlogModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewBlogModalLabel">View Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" alt="Blog Image"
                                    style="max-height: 300px; width: auto; object-fit: cover;">
                            </div>

                            <div class="col-12">
                                <h3 class="fw-bold text-primary mb-2">{{ $blog->title }}</h3>

                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    <span class="badge bg-label-primary fs-6">{{ $blog->category }}</span>
                                    <span class="badge bg-label-info fs-6">{{ $blog->tag }}</span>
                                </div>

                                <div class="mb-4">
                                    <h5 class="fw-semibold">Description</h5>
                                    <p class="text-secondary">
                                        {{ $blog->description }}
                                    </p>
                                </div>

                                <div class="card bg-light border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class='bx bx-user-circle fs-3 text-primary me-2'></i>
                                            <h5 class="fw-bold mb-0">Author Details</h5>
                                        </div>
                                        <hr class="mt-1 mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <small class="text-uppercase text-muted fw-bold">Author Name</small>
                                                <p class="fw-semibold text-dark">{{ $blog->author_name }}</p>
                                            </div>
                                            <div class="col-md-8">
                                                <small class="text-uppercase text-muted fw-bold">About Author</small>
                                                <p class="text-secondary mb-0">
                                                    {{ $blog->about_author }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End View Blog Modal -->


@endsection

@push('styles')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize Summernote for Add Blog Modal
            $('#blogDescription').summernote({
                height: 300,
                placeholder: 'Write your blog content here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onImageUpload: function (files) {
                        // Handle image upload if needed
                        for (let i = 0; i < files.length; i++) {
                            uploadImage(files[i], $(this));
                        }
                    }
                }
            });

            // Initialize Summernote for Update Blog Modals
            @foreach($blogs as $blog)
                $('#updateBlogModal{{ $blog->id }}').on('shown.bs.modal', function () {
                    $(this).find('textarea[name="description"]').summernote({
                        height: 300,
                        placeholder: 'Write your blog content here...',
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'clear']],
                            ['fontname', ['fontname']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                });

                // Destroy Summernote when modal is hidden to prevent conflicts
                $('#updateBlogModal{{ $blog->id }}').on('hidden.bs.modal', function () {
                    $(this).find('textarea[name="description"]').summernote('destroy');
                });
            @endforeach

            // Image upload function (optional - for base64 encoding)
            function uploadImage(file, editor) {
                let reader = new FileReader();
                reader.onloadend = function () {
                    editor.summernote('insertImage', reader.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush