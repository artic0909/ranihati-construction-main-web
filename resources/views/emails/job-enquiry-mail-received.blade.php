<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received - Ranihati Construction</title>
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
            background: linear-gradient(135deg, #EC7F23 0%, #ff9944 100%);
            padding: 50px 30px;
            text-align: center;
            color: #ffffff;
            position: relative;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #ffffff;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .email-header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .email-header p {
            font-size: 16px;
            opacity: 0.95;
            margin-top: 10px;
        }

        .email-body {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.6;
        }

        .greeting {
            font-size: 22px;
            font-weight: 600;
            color: #030f27;
            margin-bottom: 20px;
        }

        .message-text {
            font-size: 15px;
            color: #666666;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .highlight-box {
            background: linear-gradient(135deg, #030f27 0%, #1a2a4a 100%);
            color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            margin: 30px 0;
            text-align: center;
        }

        .highlight-box h2 {
            color: #EC7F23;
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .highlight-box p {
            font-size: 15px;
            line-height: 1.7;
            opacity: 0.9;
        }

        .timeline {
            margin: 30px 0;
            padding: 25px;
            background: #f8f9fa;
            border-left: 4px solid #EC7F23;
            border-radius: 6px;
        }

        .timeline h3 {
            color: #030f27;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .timeline-item {
            display: flex;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-number {
            width: 30px;
            height: 30px;
            background: #EC7F23;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
            margin-right: 15px;
        }

        .timeline-content {
            flex: 1;
            padding-top: 3px;
        }

        .timeline-content strong {
            color: #030f27;
            display: block;
            margin-bottom: 3px;
        }

        .timeline-content span {
            color: #666666;
            font-size: 14px;
        }

        .info-box {
            background: #ffffff;
            border: 2px solid #dee2e6;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .info-box h3 {
            color: #030f27;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
        }

        .info-box h3::before {
            content: '📋';
            margin-right: 10px;
            font-size: 22px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-item {
            padding: 12px;
            background: #f8f9fa;
            border-radius: 6px;
        }

        .info-label {
            font-size: 12px;
            color: #999999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 15px;
            color: #030f27;
            font-weight: 600;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #EC7F23, transparent);
            margin: 30px 0;
        }

        .cta-section {
            text-align: center;
            margin: 35px 0;
            padding: 30px;
            background: linear-gradient(135deg, #fff8f0 0%, #ffe6cc 100%);
            border-radius: 8px;
        }

        .cta-section h3 {
            color: #030f27;
            font-size: 20px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .cta-section p {
            color: #666666;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #EC7F23 0%, #ff9944 100%);
            color: #ffffff;
            padding: 15px 40px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(236, 127, 35, 0.3);
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

        .social-note {
            margin-top: 20px;
            padding: 15px;
            background: rgba(236, 127, 35, 0.1);
            border-radius: 6px;
            font-size: 13px;
            color: #cccccc;
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
                padding: 40px 20px;
            }

            .email-header h1 {
                font-size: 26px;
            }

            .success-icon {
                width: 60px;
                height: 60px;
                font-size: 30px;
            }

            .email-body {
                padding: 30px 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .cta-button {
                padding: 12px 30px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="success-icon">✓</div>
            <h1>Application Received!</h1>
            <p>Thank you for applying to Ranihati Construction</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="greeting">Dear {{ $jobEnquiry->name }},</div>

            <p class="message-text">
                Thank you for your interest in the <strong>{{ $jobEnquiry->job_title }}</strong> position at
                <strong>Ranihati Construction Private Limited</strong>. We are delighted to confirm that we have
                successfully received your application.
            </p>

            <div class="highlight-box">
                <h2>Your Application is Under Review 🎯</h2>
                <p>
                    Our HR team is carefully reviewing all applications. We appreciate the time and effort you've
                    invested in applying to join our team. Your qualifications and experience will be thoroughly
                    evaluated.
                </p>
            </div>

            <div class="info-box">
                <h3>Your Application Summary</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Position Applied</div>
                        <div class="info-value">{{ $jobEnquiry->job_title }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Qualification</div>
                        <div class="info-value">{{ $jobEnquiry->qualification }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Application Date</div>
                        <div class="info-value">{{ $jobEnquiry->created_at->format('d M Y') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Application ID</div>
                        <div class="info-value">#JOB{{ str_pad($jobEnquiry->id, 5, '0', STR_PAD_LEFT) }}</div>
                    </div>
                </div>
            </div>

            <div class="timeline">
                <h3>What Happens Next?</h3>
                <div class="timeline-item">
                    <div class="timeline-number">1</div>
                    <div class="timeline-content">
                        <strong>Application Review</strong>
                        <span>Our HR team will review your CV and qualifications (3-5 business days)</span>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-number">2</div>
                    <div class="timeline-content">
                        <strong>Shortlisting</strong>
                        <span>Qualified candidates will be shortlisted for the next round</span>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-number">3</div>
                    <div class="timeline-content">
                        <strong>Interview Process</strong>
                        <span>Selected candidates will be contacted for an interview</span>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-number">4</div>
                    <div class="timeline-content">
                        <strong>Final Decision</strong>
                        <span>We'll notify you of the outcome via email or phone</span>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="cta-section">
                <h3>Stay Connected</h3>
                <p>While you wait, explore our website to learn more about our projects and company culture.</p>
                <a href="{{ url('/') }}" class="cta-button">Visit Our Website</a>
            </div>

            <p class="message-text" style="margin-top: 30px; font-size: 14px; color: #999; text-align: center;">
                <strong>Important:</strong> Please keep this email for your records. If you have any questions,
                contact our HR department at <strong style="color: #EC7F23;">+91-9874444725</strong>
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
            <div class="social-note">
                We wish you the best of luck with your application! 🌟
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} Ranihati Construction Private Limited. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>