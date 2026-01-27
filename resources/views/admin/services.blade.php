@extends('admin.layouts.app')

@section('title', 'Services | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Services
                            </h5>
                            <p class="mb-4">Add Services</p>
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
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add
                                Service</button>
                        </div>
                        <div class="card-body">
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Service Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr style="text-align: left;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $service->image) }}" alt="Project Image"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </td>
                                            <td>{{ $service->title }}</td>
                                            <td>
                                                <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                    data-bs-target="#updateServiceModal{{ $service->id }}"><i
                                                        class='bx bx-pencil'></i></button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteServiceModal{{ $service->id }}"><i
                                                        class='bx bx-trash'></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- {{-- Pagination --}} -->
                            @if ($services->hasPages())
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4 align-items-center">

                                        <!-- {{-- Prev Button --}} -->
                                        <li class="page-item {{ $services->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary"
                                                href="{{ $services->previousPageUrl() }}">Prev</a>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Page Input + Total --}} -->
                                        <li class="page-item d-flex align-items-center" style="margin: 0 2px;">
                                            <form action="" method="GET" class="d-flex align-items-center"
                                                style="margin:0; padding:0;">
                                                <input type="number" name="page" value="{{ $services->currentPage() }}" min="1"
                                                    max="{{ $services->lastPage() }}" readonly class="form-control">
                                                <input type="text" value="/ {{ $services->lastPage() }}" readonly
                                                    class="form-control">
                                            </form>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Next Button --}} -->
                                        <li class="page-item {{ !$Services->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary" href="{{ $services->nextPageUrl() }}">Next</a>
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


    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('admin.services.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Service Image</label>
                        <input class="form-control" type="file" id="serviceImage" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="serviceTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="serviceTitle" name="title">
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

    <!-- Update Service Modal -->
    @foreach ($services as $service)
        <div class="modal fade" id="updateServiceModal{{ $service->id }}" tabindex="-1"
            aria-labelledby="updateServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.services.update', $service->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="updateServiceModalLabel">Update Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="serviceImage" class="form-label">Service Image</label>
                            <input class="form-control" type="file" id="serviceImage" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="serviceTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="serviceTitle" name="title"
                                value="{{ $service->title }}">
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
    <!-- End Update Service Modal -->

    <!-- Delete Modal -->
    @foreach ($services as $service)
        <div class="modal fade" id="deleteServiceModal{{ $service->id }}" tabindex="-1"
            aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.services.delete', $service->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteServiceModalLabel">Delete Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this service?</p>
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

@endsection