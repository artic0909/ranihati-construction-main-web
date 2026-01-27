@extends('admin.layouts.app')

@section('title', 'About | Ranihati Construction Private Limited')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                About & Mission
                            </h5>
                            <p class="mb-4">Add About & Mission Details</p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card-footer text-end">
                            @if($abouts->count() < 1)
                            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addAboutModal">Add
                                About</button>
                            @endif
                            
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addMissionModal">Add
                                Mission</button>
                        </div>
                        <div class="card-body">

                            <!-- About Table -->
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">About Image</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Description One</th>
                                        <th scope="col">Description Two</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($abouts as $about)
                                        <tr style="text-align: left;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $about->image) }}" alt="About Image"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </td>
                                            <td>{{ $about->phone }}</td>
                                            <td>{{ $about->email }}</td>
                                            <td><button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#viewAboutDescriptionOneModal{{ $about->id }}"><i
                                                        class='bx bx-file'></i></button></td>
                                            <td><button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#viewAboutDescriptionTwoModal{{ $about->id }}"><i
                                                        class='bx bx-file'></i></button></td>
                                            <td>
                                                <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                    data-bs-target="#updateAboutModal{{ $about->id }}"><i
                                                        class='bx bx-pencil'></i></button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAboutModal{{ $about->id }}"><i
                                                        class='bx bx-trash'></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <br><br>

                            <!-- Mission Table -->
                            <table class="table responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Mission Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: left;">
                                        <td>1</td>
                                        <td>
                                            <img src="{{ asset('./img/logo.png') }}" alt="Mission Image"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td>RCPL</td>
                                        <td><button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#missionDescriptionModal"><i
                                                    class='bx bx-file'></i></button></td>
                                        <td>
                                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateMissionModal"><i class='bx bx-pencil'></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteMissionModal"><i class='bx bx-trash'></i></button>
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


    <!-- Add About Modal -->
    <div class="modal fade" id="addAboutModal" tabindex="-1" aria-labelledby="addAboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addAboutModalLabel">Add About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="aboutImage" class="form-label">About Image</label>
                        <input class="form-control" type="file" id="aboutImage" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="descriptionOne" class="form-label">Description One</label>
                        <textarea class="form-control" id="descriptionOne" rows="3" name="description_one"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="descriptionTwo" class="form-label">Description Two</label>
                        <textarea class="form-control" id="descriptionTwo" rows="3" name="description_two"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Add About Modal -->

    <!-- Update About Modal -->
    @foreach($abouts as $about)
        <div class="modal fade" id="updateAboutModal{{ $about->id }}" tabindex="-1" aria-labelledby="updateAboutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateAboutModalLabel">Update About</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="aboutImage" class="form-label">About Image</label>
                            <input class="form-control" type="file" id="aboutImage" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="contact" name="phone" value="{{ $about->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $about->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="descriptionOne" class="form-label">Description One</label>
                            <textarea class="form-control" id="descriptionOne" rows="3" name="description_one">{{ $about->description_one }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="descriptionTwo" class="form-label">Description Two</label>
                            <textarea class="form-control" id="descriptionTwo" rows="3" name="description_two">{{ $about->description_two }}</textarea>
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
    <!-- End Update About Modal -->

    <!-- Delete Modal -->
    @foreach($abouts as $about)
        <div class="modal fade" id="deleteAboutModal{{ $about->id }}" tabindex="-1" aria-labelledby="deleteAboutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.about.delete', $about->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAboutModalLabel">Delete About</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this about?</p>
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

    <!-- About Description One View -->
    @foreach($abouts as $about)
        <div class="modal fade" id="viewAboutDescriptionOneModal{{ $about->id }}" tabindex="-1"
            aria-labelledby="viewAboutDescriptionOneModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewAboutDescriptionOneModalLabel">About Description One</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $about->description_one }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <!-- End About Description One View -->

    <!-- About Description Two View -->
    @foreach($abouts as $about)
        <div class="modal fade" id="viewAboutDescriptionTwoModal{{ $about->id }}" tabindex="-1"
            aria-labelledby="viewAboutDescriptionTwoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewAboutDescriptionTwoModalLabel">About Description Two</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $about->description_two }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <!-- End About Description Two View -->


    <!-- ==================================================================================================================================================================================================================== -->

    <!-- Add Mission Modal -->
    <div class="modal fade" id="addMissionModal" tabindex="-1" aria-labelledby="addMissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMissionModalLabel">Add Mission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="missionImage" class="form-label">Mission Image</label>
                        <input class="form-control" type="file" id="missionImage">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Add Mission Modal -->


    <!-- Update Mission Modal -->
    <div class="modal fade" id="updateMissionModal" tabindex="-1" aria-labelledby="updateMissionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateMissionModalLabel">Update Mission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="missionImage" class="form-label">Mission Image</label>
                        <input class="form-control" type="file" id="missionImage">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Update Mission Modal -->


    <!-- Delete Mission Modal -->
    <div class="modal fade" id="deleteMissionModal" tabindex="-1" aria-labelledby="deleteMissionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMissionModalLabel">Delete Mission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this mission?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Delete Mission Modal -->

    <!-- Mission Description Modal -->
    <div class="modal fade" id="missionDescriptionModal" tabindex="-1" aria-labelledby="missionDescriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="missionDescriptionModalLabel">Mission Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>RCPL</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Mission Description Modal -->


@endsection