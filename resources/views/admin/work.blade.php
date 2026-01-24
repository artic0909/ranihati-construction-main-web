@extends('admin.layouts.app')

@section('title', 'Works | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Works
                            </h5>
                            <p class="mb-4">Add Works</p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <!-- Search Functionality -->
                    </div>

                    <div class="col-12">
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWorkModal">Add
                                Work</button>
                        </div>
                        <div class="card-body">
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Work Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>
                                            <img src="{{ asset('./img/logo.png') }}" alt="Work Image"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td>RCPL</td>
                                        <td>
                                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateWorkModal"><i class='bx bx-pencil'></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteWorkModal"><i class='bx bx-trash'></i></button>
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


    <!-- Add Work Modal -->
    <div class="modal fade" id="addWorkModal" tabindex="-1" aria-labelledby="addWorkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWorkModalLabel">Add Work</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="workImage" class="form-label">Work Image</label>
                            <input class="form-control" type="file" id="workImage">
                        </div>
                        <div class="mb-3">
                            <label for="workTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="workTitle">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Work Modal -->

    <!-- Update Work Modal -->
    <div class="modal fade" id="updateWorkModal" tabindex="-1" aria-labelledby="updateWorkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateWorkModalLabel">Update Work</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="carouselImage" class="form-label">Carousel Image</label>
                            <input class="form-control" type="file" id="carouselImage">
                        </div>
                        <div class="mb-3">
                            <label for="carouselTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="carouselTitle">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Update Work Modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteWorkModal" tabindex="-1" aria-labelledby="deleteWorkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteWorkModalLabel">Delete Work</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this work?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal -->

@endsection