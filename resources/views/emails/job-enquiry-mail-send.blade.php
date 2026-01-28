<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Application Received</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #030f27 0%, #1a2a4a 100%);
            padding: 40px 30px;
            text-align: center;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .email-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(236, 127, 35, 0.1) 0%, transparent 70%);
        }

        .email-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }

        .email-header .badge {
            display: inline-block;
            background: #EC7F23;
            color: #ffffff;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 10px;
            position: relative;
            z-index: 1;
        }

        .email-body {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.6;
        }

        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #030f27;
            margin-bottom: 20px;
        }

        .message-text {
            font-size: 15px;
            color: #666666;
            margin-bottom: 25px;
        }

        .applicant-header {
            background: linear-gradient(135deg, #EC7F23 0%, #ff9944 100%);
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin-top: 25px;
        }

        .applicant-header h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .applicant-header p {
            font-size: 14px;
            opacity: 0.95;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
        }

        .info-table tr {
            border-bottom: 1px solid #dee2e6;
        }

        .info-table tr:last-child {
            border-bottom: none;
        }

        .info-table td {
            padding: 15px 20px;
            font-size: 14px;
        }

        .info-table td:first-child {
            font-weight: 600;
            color: #030f27;
            background-color: #f8f9fa;
            width: 35%;
        }

        .info-table td:last-child {
            color: #666666;
        }

        .highlight-value {
            color: #EC7F23;
            font-weight: 600;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #EC7F23, transparent);
            margin: 30px 0;
        }

        .action-box {
            background: linear-gradient(135deg, #fff8f0 0%, #ffe6cc 100%);
            border: 2px solid #EC7F23;
            border-radius: 8px;
            padding: 25px;
            margin-top: 25px;
            text-align: center;
        }

        .action-box h3 {
            color: #030f27;
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .action-box p {
            font-size: 14px;
            color: #666666;
            margin-bottom: 15px;
        }

        .action-button {
            display: inline-block;
            background: linear-gradient(135deg, #EC7F23 0%, #ff9944 100%);
            color: #ffffff;
            padding: 12px 35px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(236, 127, 35, 0.3);
            margin-top: 10px;
        }

        .email-footer {
            background-color: #030f27;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .email-footer h3 {
            color: #EC7F23;
            font-size: 20px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .contact-info {
            font-size: 13px;
            line-height: 1.8;
            color: #cccccc;
            margin-bottom: 15px;
        }

        .contact-info a {
            color: #EC7F23;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        .copyright {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #444444;
            font-size: 12px;
            color: #999999;
        }

        @media only screen and (max-width: 600px) {
            .email-header {
                padding: 30px 20px;
            }

            .email-header h1 {
                font-size: 24px;
            }

            .email-body {
                padding: 30px 20px;
            }

            .info-table td {
                display: block;
                width: 100% !important;
                padding: 10px 15px;
            }

            .info-table td:first-child {
                background-color: #f0f0f0;
                font-weight: 700;
                border-bottom: none;
                padding-bottom: 5px;
            }

            .info-table td:last-child {
                padding-top: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>New Job Application</h1>
            <div class="badge">Career Opportunity</div>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="greeting">Hello HR Team,</div>

            <p class="message-text">
                Great news! A new candidate has submitted their application for a position at <strong>Ranihati
                    Construction Private Limited</strong>.
                Please review the details below and take appropriate action.
            </p>

            <!-- Applicant Details -->
            <div class="applicant-header">
                <h2>{{ $jobEnquiry->name }}</h2>
                <p>Applied for: <strong>{{ $jobEnquiry->job_title }}</strong></p>
            </div>

            <table class="info-table">
                <tr>
                    <td>Full Name</td>
                    <td class="highlight-value">{{ $jobEnquiry->name }}</td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>{{ $jobEnquiry->email }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>{{ $jobEnquiry->phone }}</td>
                </tr>
                <tr>
                    <td>Job Position</td>
                    <td class="highlight-value">{{ $jobEnquiry->job_title }}</td>
                </tr>
                <tr>
                    <td>Qualification</td>
                    <td>{{ $jobEnquiry->qualification }}</td>
                </tr>
                <tr>
                    <td>HS Division</td>
                    <td>{{ ucfirst($jobEnquiry->hs_division) }}</td>
                </tr>
                <tr>
                    <td>10th Percentage</td>
                    <td>{{ $jobEnquiry->tenth_percentage }}%</td>
                </tr>
                <tr>
                    <td>HS Percentage</td>
                    <td>{{ $jobEnquiry->hs_percentage }}%</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $jobEnquiry->address }}</td>
                </tr>
                <tr>
                    <td>Application Date</td>
                    <td>{{ $jobEnquiry->created_at->format('d M Y, h:i A') }}</td>
                </tr>
            </table>

            <div class="divider"></div>

            <div class="action-box">
                <h3>📄 CV Attached</h3>
                <p>The candidate's CV has been uploaded and is ready for review. Please download and assess the
                    application.</p>
                <a href="{{ url('/admin/job-enquiries') }}" class="action-button">View in Admin Panel</a>
            </div>

            <p class="message-text" style="margin-top: 30px; font-size: 14px; color: #999; text-align: center;">
                Please respond to the candidate within 3-5 business days to maintain a professional recruitment process.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <h3>Ranihati Construction Pvt. Ltd.</h3>
            <div class="contact-info">
                Shop No.13, M.Plaza, Ranihati (Opp: Bank Of Baroda)<br>
                Joynagar Panchla, West Bengal 711302<br>
                Phone: <a href="tel:+919874444725">+91-9874444725 (HR)</a><br>
                Email: <a href="mailto:ranihati.construction@rconpl.in">ranihati.construction@rconpl.in</a>
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} Ranihati Construction Private Limited. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>