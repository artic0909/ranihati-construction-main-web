@extends('admin.layouts.app')

@section('title', 'Facts | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Facts
                            </h5>
                            <p class="mb-4">Add Facts</p>
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
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFactModal">Add
                                Fact</button>
                        </div>
                        <div class="card-body">
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">No. Of Experts</th>
                                        <th scope="col">No. Of Clients</th>
                                        <th scope="col">No. Of Completed Projects</th>
                                        <th scope="col">No. Of Running Projects</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>10</td>
                                        <td>10</td>
                                        <td>10</td>
                                        <td>10</td>
                                        <td>
                                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateFactModal"><i class='bx bx-pencil'></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteFactModal"><i class='bx bx-trash'></i></button>
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


    <!-- Add Fact Modal -->
    <div class="modal fade" id="addFactModal" tabindex="-1" aria-labelledby="addFactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFactModalLabel">Add Fact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="noOfExperts" class="form-label">No. Of Experts</label>
                        <input class="form-control" type="number" id="noOfExperts">
                    </div>
                    <div class="mb-3">
                        <label for="noOfClients" class="form-label">No. Of Clients</label>
                        <input type="number" class="form-control" id="noOfClients">
                    </div>
                    <div class="mb-3">
                        <label for="noOfCompletedProjects" class="form-label">No. Of Completed Projects</label>
                        <input type="number" class="form-control" id="noOfCompletedProjects">
                    </div>
                    <div class="mb-3">
                        <label for="noOfRunningProjects" class="form-label">No. Of Running Projects</label>
                        <input type="number" class="form-control" id="noOfRunningProjects">
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

    <!-- Update Fact Modal -->
    <div class="modal fade" id="updateFactModal" tabindex="-1" aria-labelledby="updateFactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateFactModalLabel">Update Fact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="noOfExperts" class="form-label">No. Of Experts</label>
                        <input class="form-control" type="number" id="noOfExperts">
                    </div>
                    <div class="mb-3">
                        <label for="noOfClients" class="form-label">No. Of Clients</label>
                        <input type="number" class="form-control" id="noOfClients">
                    </div>
                    <div class="mb-3">
                        <label for="noOfCompletedProjects" class="form-label">No. Of Completed Projects</label>
                        <input type="number" class="form-control" id="noOfCompletedProjects">
                    </div>
                    <div class="mb-3">
                        <label for="noOfRunningProjects" class="form-label">No. Of Running Projects</label>
                        <input type="number" class="form-control" id="noOfRunningProjects">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Update Fact Modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteFactModal" tabindex="-1" aria-labelledby="deleteFactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteFactModalLabel">Delete Fact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this fact?</p>
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