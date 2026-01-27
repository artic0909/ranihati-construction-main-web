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

                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>
                                            <img src="{{ asset('img/logo.png') }}" alt="Work Image"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td><button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#viewBlogModal">View Details</button></td>
                                        <td>
                                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateBlogModal"><i class='bx bx-pencil'></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteBlogModal"><i class='bx bx-trash'></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <!-- {{-- Pagination --}} -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Blog Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content">
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
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="blogTag" class="form-label">Tag</label>
                        <select name="tag" id="blogTag" class="form-control">
                            <option value="">Select Tag</option>
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
        <div class="modal fade" id="updateBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="updateBlogModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form class="modal-content">
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
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="blogTag" class="form-label">Tag</label>
                            <select name="tag" id="blogTag" class="form-control">
                                <option value="">Select Tag</option>
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
                                <option value="government" {{ $blog->tag == 'government' ? 'selected' : '' }}>Government</option>
                                <option value="election" {{ $blog->tag == 'election' ? 'selected' : '' }}>Election</option>
                                <option value="policy" {{ $blog->tag == 'policy' ? 'selected' : '' }}>Policy</option>
                                <option value="international" {{ $blog->tag == 'international' ? 'selected' : '' }}>International
                                </option>
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
        <div class="modal fade" id="deleteBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="deleteBlogModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content">
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
        <div class="modal fade" id="viewBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="viewBlogModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewBlogModalLabel">View Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded"
                                    alt="Blog Image" style="max-height: 300px; width: auto; object-fit: cover;">
                            </div>

                            <div class="col-12">
                                <h3 class="fw-bold text-primary mb-2">{{ $blog->title }}</h3>

                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    <span class="badge bg-label-primary fs-6">{{ $blog->category }}</span>
                                    <span class="badge bg-label-info fs-6">{{ $blog->tags }}</span>
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