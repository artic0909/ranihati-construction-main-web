@extends('admin.layouts.app')

@section('title', 'Enquiries | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Enquiries
                            </h5>
                            <p class="mb-4">All Enquiries</p>
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
                        <div class="card-body">
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td><button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#viewMessageModal">View Enquiry</button></td>
                                        <td>
                                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#viewMessageModal"><i class='bx bx-reply'></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteEnquiryModal"><i class='bx bx-trash'></i></button>
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

    <!-- View Message Modal -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1" aria-labelledby="viewMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewMessageModalLabel">View Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="fw-bold text-primary mb-2">Enquiry Subject goes here</h3>
                            
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-label-primary fs-6">Date : 27-01-2026</span>
                                <span class="badge bg-label-info fs-6">Status : Pending</span>
                            </div>

                            <div class="mb-4">
                                <h5 class="fw-semibold">Enquiry Message</h5>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, voluptatum. Beatae, dolor. 
                                    Quisquam, voluptatum. Beatae, dolor.
                                </p>
                            </div>

                            <div class="mb-4">
                                <h5 class="fw-semibold">Replied Message</h5>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, voluptatum. Beatae, dolor. 
                                    Quisquam, voluptatum. Beatae, dolor.
                                </p>
                            </div>

                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class='bx bx-reply fs-3 text-primary me-2'></i>
                                        <h5 class="fw-bold mb-0">Reply Message</h5>
                                    </div>
                                    <hr class="mt-1 mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small class="text-uppercase text-muted fw-bold">Name</small>
                                            <p class="fw-semibold text-dark">Email ID</p>
                                        </div>
                                        <form class="col-md-12">
                                            <small class="text-uppercase text-muted fw-bold">Message</small>
                                            <textarea name="" id="" rows="6" class="form-control"></textarea>
                                            <button type="submit" class="btn btn-warning mt-2">Send</button>
                                        </form>
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
    <!-- End View Message Modal -->


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteEnquiryModal" tabindex="-1" aria-labelledby="deleteEnquiryModalLabel" aria-hidden="true"> 
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteEnquiryModalLabel">Delete Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this enquiry?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Delete Modal -->


@endsection