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
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enquiries as $enquiry)
                                        <tr style="text-align: left;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $enquiry->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if($enquiry->status == 'pending')
                                                    <span class="badge bg-warning">{{ $enquiry->status }}</span>
                                                @else
                                                    <span class="badge bg-success">{{ $enquiry->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $enquiry->name }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>{{ $enquiry->subject }}</td>
                                            <td><button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#viewMessageModal{{ $enquiry->id }}">View Enquiry</button>
                                            </td>
                                            <td>
                                                @if($enquiry->status == 'replied')
                                                    <button class="btn btn-info me-2" data-bs-toggle="modal"
                                                        data-bs-target="#viewMessageModal{{ $enquiry->id }}"><i
                                                            class='bx bx-reply'></i></button>
                                                @endif
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteEnquiryModal{{ $enquiry->id }}"><i
                                                        class='bx bx-trash'></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- {{-- Pagination --}} -->
                            @if ($enquiries->hasPages())
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4 align-items-center">

                                        <!-- {{-- Prev Button --}} -->
                                        <li class="page-item {{ $enquiries->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary"
                                                href="{{ $enquiries->previousPageUrl() }}">Prev</a>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Page Input + Total --}} -->
                                        <li class="page-item d-flex align-items-center" style="margin: 0 2px;">
                                            <form action="" method="GET" class="d-flex align-items-center"
                                                style="margin:0; padding:0;">
                                                <input type="number" name="page" value="{{ $enquiries->currentPage() }}" min="1"
                                                    max="{{ $enquiries->lastPage() }}" readonly class="form-control">
                                                <input type="text" value="/ {{ $enquiries->lastPage() }}" readonly
                                                    class="form-control">
                                            </form>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Next Button --}} -->
                                        <li class="page-item {{ !$enquiries->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary" href="{{ $enquiries->nextPageUrl() }}">Next</a>
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

    <!-- View Message Modal -->
    @foreach($enquiries as $enquiry)
        <div class="modal fade" id="viewMessageModal{{ $enquiry->id }}" tabindex="-1" aria-labelledby="viewMessageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMessageModalLabel">View Enquiry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="fw-bold text-primary mb-2">{{ $enquiry->subject }}</h3>

                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    <span class="badge bg-label-primary fs-6">Date :
                                        {{ $enquiry->created_at->format('d-m-Y') }}</span>

                                    @if($enquiry->status == 'pending')
                                        <span class="badge bg-label-warning fs-6">Status : Pending</span>
                                    @else
                                        <span class="badge bg-label-success fs-6">Status : Replied</span>
                                    @endif
                                </div>

                                <div class="mb-4">
                                    <h5 class="fw-semibold">Enquiry Message</h5>
                                    <p class="text-secondary">
                                        {{ $enquiry->message }}
                                    </p>
                                </div>

                                @if($enquiry->reply)
                                    <div class="mb-4">
                                        <h5 class="fw-semibold">Replied Message</h5>
                                        <p class="text-secondary">
                                            {{ $enquiry->reply }}
                                        </p>
                                    </div>
                                @endif

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
                                                <p class="fw-semibold text-dark">{{ $enquiry->name }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <small class="text-uppercase text-muted fw-bold">Email</small>
                                                <p class="fw-semibold text-dark">{{ $enquiry->email }}</p>
                                            </div>
                                            <form class="col-md-12" action="{{ route('admin.enquiry.reply', $enquiry->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <small class="text-uppercase text-muted fw-bold">Message</small>
                                                <textarea name="reply" id="reply{{ $enquiry->id }}" rows="6"
                                                    class="form-control">{{ $enquiry->reply }}</textarea>
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
    @endforeach
    <!-- End View Message Modal -->


    <!-- Delete Modal -->
    @foreach($enquiries as $enquiry)
        <div class="modal fade" id="deleteEnquiryModal{{ $enquiry->id }}" tabindex="-1"
            aria-labelledby="deleteEnquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.enquiry.delete', $enquiry->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

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
    @endforeach
    <!-- End Delete Modal -->


@endsection