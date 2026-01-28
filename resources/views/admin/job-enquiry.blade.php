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
                                        <th scope="col">Date</th>
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
                                    @foreach($jobEnquiries as $jobEnquiry)
                                        <tr style="text-align: left;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jobEnquiry->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $jobEnquiry->job_title }}</td>
                                            <td>{{ $jobEnquiry->qualification }}</td>
                                            <td>{{ ucfirst($jobEnquiry->hs_division) }}</td>
                                            <td>{{ $jobEnquiry->tenth_percentage }}%</td>
                                            <td>{{ $jobEnquiry->hs_percentage }}%</td>
                                            <td>{{ $jobEnquiry->phone }}</td>
                                            <td>{{ Str::limit($jobEnquiry->address, 15) }}</td>
                                            <td><button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#viewCVModal{{ $jobEnquiry->id }}">CV</button></td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteEnquiryModal{{ $jobEnquiry->id }}"><i class='bx bx-trash'></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- {{-- Pagination --}} -->
                            @if ($jobEnquiries->hasPages())
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4 align-items-center">

                                        <!-- {{-- Prev Button --}} -->
                                        <li class="page-item {{ $jobEnquiries->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary"
                                                href="{{ $jobEnquiries->previousPageUrl() }}">Prev</a>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Page Input + Total --}} -->
                                        <li class="page-item d-flex align-items-center" style="margin: 0 2px;">
                                            <form action="" method="GET" class="d-flex align-items-center"
                                                style="margin:0; padding:0;">
                                                <input type="number" name="page" value="{{ $jobEnquiries->currentPage() }}" min="1"
                                                    max="{{ $jobEnquiries->lastPage() }}" readonly class="form-control">
                                                <input type="text" value="/ {{ $jobEnquiries->lastPage() }}" readonly
                                                    class="form-control">
                                            </form>
                                        </li>
                                        &nbsp;
                                        <!-- {{-- Next Button --}} -->
                                        <li class="page-item {{ !$jobEnquiries->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link btn btn-primary" href="{{ $jobEnquiries->nextPageUrl() }}">Next</a>
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

    <!-- View CV Modal -->
    @foreach($jobEnquiries as $jobEnquiry)
        <div class="modal fade" id="viewCVModal{{ $jobEnquiry->id }}" tabindex="-1" aria-labelledby="viewCVModalLabel{{ $jobEnquiry->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewCVModalLabel{{ $jobEnquiry->id }}">CV - {{ $jobEnquiry->job_title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <h6 class="mb-3"><strong>Applicant Details:</strong></h6>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%; background-color: #f8f9fa;">Name</th>
                                        <td>{{ $jobEnquiry->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">Email</th>
                                        <td>{{ $jobEnquiry->email }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">Phone</th>
                                        <td>{{ $jobEnquiry->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">Job Title</th>
                                        <td>{{ $jobEnquiry->job_title }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">Qualification</th>
                                        <td>{{ $jobEnquiry->qualification }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">HS Division</th>
                                        <td>{{ ucfirst($jobEnquiry->hs_division) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">10th Percentage</th>
                                        <td>{{ $jobEnquiry->tenth_percentage }}%</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">HS Percentage</th>
                                        <td>{{ $jobEnquiry->hs_percentage }}%</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f8f9fa;">Address</th>
                                        <td>{{ $jobEnquiry->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <p><strong>CV Document:</strong></p>
                            @if($jobEnquiry->cv)
                                <iframe src="{{ asset('storage/' . $jobEnquiry->cv) }}" width="100%" height="600px" style="border: 1px solid #ccc;"></iframe>
                                <div class="mt-3">
                                    <a href="{{ asset('storage/' . $jobEnquiry->cv) }}" target="_blank" class="btn btn-primary">
                                        <i class='bx bx-download'></i> Download CV
                                    </a>
                                </div>
                            @else
                                <p class="text-danger">No CV uploaded</p>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End View CV Modal -->


    <!-- Delete Modal -->
    @foreach($jobEnquiries as $jobEnquiry)
        <div class="modal fade" id="deleteEnquiryModal{{ $jobEnquiry->id }}" tabindex="-1" aria-labelledby="deleteEnquiryModalLabel{{ $jobEnquiry->id }}" aria-hidden="true"> 
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('admin.job-enquiries.destroy', $jobEnquiry->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEnquiryModalLabel{{ $jobEnquiry->id }}">Delete Enquiry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the job enquiry for <strong>{{ $jobEnquiry->job_title }}</strong>?</p>
                        <p class="text-muted">Applicant: {{ $jobEnquiry->phone }}</p>
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