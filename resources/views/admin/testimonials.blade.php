@extends('admin.layouts.app')

@section('title', 'Testimonials | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Testimonials
                            </h5>
                            <p class="mb-4">Add Testimonials</p>
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
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">Add
                                Testimonial</button>
                        </div>
                        <div class="card-body">
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Profession</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($testimonials as $testimonial)
                                        <tr style="text-align: left;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Work Image"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->profession }}</td>
                                            <td><button class="btn btn-success me-2" data-bs-toggle="modal"
                                                    data-bs-target="#viewDescriptionModal{{$testimonial->id}}"><i
                                                        class='bx bx-file'></i></button>
                                            </td>
                                            <td>
                                                <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                    data-bs-target="#updateTestimonialModal{{$testimonial->id}}"><i
                                                        class='bx bx-pencil'></i></button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteTestimonialModal{{$testimonial->id}}"><i
                                                        class='bx bx-trash'></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- {{-- Pagination --}} -->
                            @if ($testimonials->hasPages())
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4 align-items-center">

                                        <!-- {{-- Prev Button --}} -->
                                        <li class="page-item {{ $testimonials->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary"
                                                href="{{ $testimonials->previousPageUrl() }}">Prev</a>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Page Input + Total --}} -->
                                        <li class="page-item d-flex align-items-center" style="margin: 0 2px;">
                                            <form action="" method="GET" class="d-flex align-items-center"
                                                style="margin:0; padding:0;">
                                                <input type="number" name="page" value="{{ $testimonials->currentPage() }}" min="1"
                                                    max="{{ $testimonials->lastPage() }}" readonly class="form-control">
                                                <input type="text" value="/ {{ $testimonials->lastPage() }}" readonly
                                                    class="form-control">
                                            </form>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Next Button --}} -->
                                        <li class="page-item {{ !$testimonials->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary" href="{{ $testimonials->nextPageUrl() }}">Next</a>
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


    <!-- Add Testimonial Modal -->
    <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addTestimonialModalLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="testimonialImage" class="form-label">Testimonial Image</label>
                        <input class="form-control" type="file" id="testimonialImage" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="testimonialName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialProfession" class="form-label">Profession</label>
                        <input type="text" class="form-control" id="testimonialProfession" name="profession">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="testimonialDescription" rows="3" name="description"></textarea>
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
    @foreach($testimonials as $testimonial)
        <div class="modal fade" id="updateTestimonialModal{{ $testimonial->id }}" tabindex="-1" aria-labelledby="updateTestimonialModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateTestimonialModalLabel">Update Testimonial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="testimonialImage" class="form-label">Testimonial Image</label>
                            <input class="form-control" type="file" id="testimonialImage" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="testimonialName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="testimonialName" name="name"
                                value="{{ $testimonial->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="testimonialProfession" class="form-label">Profession</label>
                            <input type="text" class="form-control" id="testimonialProfession" name="profession"
                                value="{{ $testimonial->profession }}">
                        </div>
                        <div class="mb-3">
                            <label for="testimonialDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="testimonialDescription" rows="3"
                                name="description">{{ $testimonial->description }}</textarea>
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
    <!-- End Update Testimonial Modal -->

    <!-- Delete Modal -->
    @foreach($testimonials as $testimonial)
        <div class="modal fade" id="deleteTestimonialModal{{ $testimonial->id }}" tabindex="-1" aria-labelledby="deleteTestimonialModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.testimonials.delete', $testimonial->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTestimonialModalLabel">Delete Testimonial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this testimonial?</p>
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

    <!-- View Description Modal -->
    @foreach($testimonials as $testimonial)
        <div class="modal fade" id="viewDescriptionModal{{ $testimonial->id }}" tabindex="-1" aria-labelledby="viewDescriptionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDescriptionModalLabel">View Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $testimonial->description }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End View Description Modal -->


@endsection