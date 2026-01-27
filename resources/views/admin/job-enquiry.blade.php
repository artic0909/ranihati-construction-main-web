@extends('admin.layouts.app')

@section('title', 'Job Enquiries | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Job Enquiries
                            </h5>
                            <p class="mb-4">All Job Enquiries</p>
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
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Qualification</th>
                                        <th scope="col">HS Division</th>
                                        <th scope="col">10th %</th>
                                        <th scope="col">HS %</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">CV File</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td><button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#viewCVModal">View CV</button></td>
                                        <td>
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