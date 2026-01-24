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

                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>
                                            <img src="{{ asset('img/logo.png') }}" alt="Work Image"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td><button class="btn btn-success me-2" data-bs-toggle="modal"
                                                data-bs-target="#viewDescriptionModal"><i class='bx bx-file'></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateTestimonialModal"><i
                                                    class='bx bx-pencil'></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteTestimonialModal"><i
                                                    class='bx bx-trash'></i></button>
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


    <!-- Add Testimonial Modal -->
    <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTestimonialModalLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="testimonialImage" class="form-label">Testimonial Image</label>
                        <input class="form-control" type="file" id="testimonialImage">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="testimonialName">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialProfession" class="form-label">Profession</label>
                        <input type="text" class="form-control" id="testimonialProfession">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="testimonialDescription" rows="3"></textarea>
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
    <div class="modal fade" id="updateTestimonialModal" tabindex="-1" aria-labelledby="updateTestimonialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTestimonialModalLabel">Update Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="testimonialImage" class="form-label">Testimonial Image</label>
                        <input class="form-control" type="file" id="testimonialImage">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="testimonialName">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialProfession" class="form-label">Profession</label>
                        <input type="text" class="form-control" id="testimonialProfession">
                    </div>
                    <div class="mb-3">
                        <label for="testimonialDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="testimonialDescription" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Update Testimonial Modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteTestimonialModal" tabindex="-1" aria-labelledby="deleteTestimonialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
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
    <!-- End Delete Modal -->

    <!-- View Description Modal -->
    <div class="modal fade" id="viewDescriptionModal" tabindex="-1" aria-labelledby="viewDescriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDescriptionModalLabel">View Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to view this testimonial.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End View Description Modal -->


@endsection