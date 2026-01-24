@extends('admin.layouts.app')

@section('title', 'Projects | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Projects
                            </h5>
                            <p class="mb-4">Add Projects</p>
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
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">Add
                                Project</button>
                        </div>
                        <div class="card-body">
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Project Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>
                                            <img src="{{ asset('./img/logo.png') }}" alt="Project Image"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td>RCPL</td>
                                        <td>RCPL</td>
                                        <td>
                                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateProjectModal"><i class='bx bx-pencil'></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteProjectModal"><i class='bx bx-trash'></i></button>
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


    <!-- Add Project Modal -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Add Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="projectImage" class="form-label">Project Image</label>
                        <input class="form-control" type="file" id="projectImage">
                    </div>
                    <div class="mb-3">
                        <label for="projectTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="projectTitle">
                    </div>
                    <div class="mb-3">
                        <label for="projectTitle" class="form-label">Category</label>
                        <select name="projectCategory" id="projectCategory" class="form-control">
                            <option value="">Select Category</option>
                            <option value="">Complete</option>
                            <option value="">Running</option>
                            <option value="">Upcoming</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Add Project Modal -->

    <!-- Update Project Modal -->
    <div class="modal fade" id="updateProjectModal" tabindex="-1" aria-labelledby="updateProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProjectModalLabel">Update Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="projectImage" class="form-label">Project Image</label>
                        <input class="form-control" type="file" id="projectImage">
                    </div>
                    <div class="mb-3">
                        <label for="projectTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="projectTitle">
                    </div>
                    <div class="mb-3">
                        <label for="projectCategory" class="form-label">Category</label>
                        <select name="projectCategory" id="projectCategory" class="form-control">
                            <option value="">Select Category</option>
                            <option value="">Complete</option>
                            <option value="">Running</option>
                            <option value="">Upcoming</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Update Project Modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="deleteProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProjectModalLabel">Delete Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this project?</p>
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