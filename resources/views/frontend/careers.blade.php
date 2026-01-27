@extends('frontend.layouts.app')

@section('title', 'Career Opportunity - Ranihati Construction Private Limited')

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Career Opportunity</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="about wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="img/about.png" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>Shape Your Future With</p>
                        <h2>Ranihati Construction Private Limited</h2>
                    </div>
                    <div class="about-text" style="text-align: justify;">
                        <p>
                            With us you can expect to continually evolve your career, benefitting from mentorship at
                            every level and working collaboratively with other teams to expand your knowledge and
                            experience.
                        </p>
                        <p>
                            Values-based leadership. EllisDon’s culture and approach to business is a reflection of
                            our core values and principles: freedom, trust, complete openness, mutual
                            accountability, entrepreneurial enthusiasm, integrity and mutual respect.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- CV Start -->
    <div class="contact wow fadeInUp">
        <div class="container">
            <div class="section-header text-center">
                <p>Apply Now</p>
                <h2>Submit Your Application Today</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="flaticon-address"></i>
                            <div class="contact-text">
                                <h2>Location</h2>
                                <p>Shop No.13,M.Plaza,Ranihati, (Opp: Bank Of Baroda)
                                    Joynagar Panchla,, West Bengal 711302</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-call"></i>
                            <div class="contact-text">
                                <h2>Phone</h2>
                                <p>+91-9874444725 (HR)</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-send-mail"></i>
                            <div class="contact-text">
                                <h2>Email</h2>
                                <p>ranihati.construction@rconpl.in</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4533.541170854932!2d88.15360417599884!3d22.564074033281436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a028142cd118f05%3A0x573fefde2b8f0953!2sRANIHATI%20CONSTRUCTION%20PVT.%20LTD.!5e1!3m2!1sen!2sin!4v1769076689828!5m2!1sen!2sin"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @elseif(session()->has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>Form submitted successfully</li>
                                </ul>
                            </div>
                            @endif
                            <!-- Select Job Post Dropdown -->
                            <div class="control-group">
                                <select class="form-control" id="jobPost" required="required" name="job_title"
                                    data-validation-required-message="Please select a job post">
                                    <option value="" disabled selected>Select Job Post</option>
                                    <option value="Project Manager">Project Manager</option>
                                    <option value="Project Engineer">Project Engineer</option>
                                    <option value="Site Supervisor">Site Supervisor</option>
                                    <option value="Account Manager(project)">Account Manager(project)</option>
                                    <option value="Account Manager(Office)">Account Manager(Office)</option>
                                    <option value="Assistant Account">Assistant Account</option>
                                    <option value="HR(Site)">HR(Site)</option>
                                    <option value="HR(Office)">HR(Office)</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>

                            <!-- Final Qualification -->
                            <div class="control-group">
                                <input type="text" class="form-control" id="qualification" placeholder="Final Qualification (e.g., B.Tech, MBA, Diploma)" name="qualification"
                                    required="required" maxlength="255" minlength="2"
                                    data-validation-required-message="Please enter your qualification" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <!-- HS Division Radio Buttons -->
                            <div class="control-group">
                                <label style="display: block; margin-bottom: 10px; font-weight: 600;">HS Division
                                    :</label>
                                <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                                    <label style="display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                        <input type="radio" name="hs_division" value="art" required="required"
                                            data-validation-required-message="Please select HS division" />
                                        <span>Art</span>
                                    </label>
                                    <label style="display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                        <input type="radio" name="hs_division" value="science" />
                                        <span>Science</span>
                                    </label>
                                    <label style="display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                        <input type="radio" name="hs_division" value="commerce" />
                                        <span>Commerce</span>
                                    </label>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>

                            <!-- 10th Marks and HS Marks in same row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="number" class="form-control" id="tenthMarks" placeholder="10th Marks(%)" name="tenth_percentage"
                                            required="required" min="0" max="100" step="0.01"
                                            data-validation-required-message="Please enter your 10th marks" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="number" class="form-control" id="hsMarks" placeholder="HS Marks (%)" name="hs_percentage"
                                            required="required" min="0" max="100" step="0.01"
                                            data-validation-required-message="Please enter your HS marks" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone Number and Address in same row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="tel" class="form-control" id="phone" placeholder="Phone Number (10 digits)" name="phone"
                                            required="required" pattern="[0-9]{10}" maxlength="10" minlength="10"
                                            data-validation-required-message="Please enter your phone number" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="text" class="form-control" id="address" placeholder="Address" name="address"
                                            required="required" minlength="10" maxlength="500"
                                            data-validation-required-message="Please enter your address" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload CV Section -->
                            <div class="control-group">
                                <label style="display: block; margin-bottom: 10px; font-weight: 600;">Upload Your
                                    CV (PDF only, max 10MB)</label>
                                <input type="file" class="form-control" id="cvUpload" accept=".pdf" name="cv"
                                    required="required" data-validation-required-message="Please upload your CV" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <!-- Drag & Drop Area -->
                            <div class="control-group">
                                <div id="dropArea"
                                    style="border: 2px dashed #ccc; border-radius: 8px; padding: 40px; text-align: center; background: #f9f9f9; cursor: pointer;">
                                    <p style="font-size: 20px; font-weight: 600; color: #333; margin-bottom: 10px;">
                                        Drag & Drop Files Here</p>
                                    <p style="color: #666; margin-bottom: 10px;">or</p>
                                    <label for="fileInput"
                                        style="color: #EC7F23; font-weight: 600; cursor: pointer; text-decoration: underline;">
                                        Browse Files
                                    </label>
                                    <input type="file" id="fileInput" multiple style="display: none;"
                                        accept=".pdf,.doc,.docx,.jpg,.png" />
                                    <p style="color: #999; font-size: 12px; margin-top: 10px;">0 of 10</p>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button class="btn" type="submit" id="sendMessageButton">Submit Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CV End -->



    <!-- Benefits Start -->
    <div class="contact wow fadeInUp">
        <div class="container">
            <div class="section-header text-center">
                <p>Benefits of Working At</p>
                <h2>Ranihati Construction PVT. LTD.</h2>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: justify;">
                    <p>At Ranihati Construction PVT. LTD., we believe in creating an environment where our team
                        members can thrive professionally and personally. We offer competitive compensation
                        packages, comprehensive health benefits, and opportunities for continuous learning and
                        career advancement. Our commitment to work-life balance ensures that our employees maintain
                        a healthy lifestyle while contributing to groundbreaking construction projects.</p>

                    <p>We foster a culture of innovation, collaboration, and mutual respect where every voice is
                        heard and valued. Our employees benefit from working on diverse, challenging projects that
                        enhance their skills and expertise. We provide state-of-the-art tools, technology, and
                        safety equipment to ensure optimal working conditions. Additionally, we offer
                        performance-based incentives, retirement plans, and recognition programs that reward
                        dedication and excellence.</p>

                    <p>Join our dynamic team and be part of a company that invests in your growth, celebrates your
                        achievements, and provides a supportive workplace where you can build a rewarding career in
                        the construction industry. Together, we build not just structures, but lasting careers and
                        meaningful relationships.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Benefits End -->

@endsection