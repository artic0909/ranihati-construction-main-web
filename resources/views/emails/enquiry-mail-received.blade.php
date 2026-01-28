<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
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
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #EC7F23 0%, #ff9944 100%);
            padding: 40px 30px;
            text-align: center;
            color: #ffffff;
        }

        .email-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .email-header p {
            font-size: 14px;
            opacity: 0.95;
            margin-top: 5px;
        }

        .email-body {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.6;
        }

        .greeting {
            font-size: 20px;
            font-weight: 600;
            color: #030f27;
            margin-bottom: 20px;
        }

        .message-text {
            font-size: 15px;
            color: #666666;
            margin-bottom: 20px;
        }

        .highlight-box {
            background: linear-gradient(135deg, #fff8f0 0%, #ffe6cc 100%);
            border-left: 4px solid #EC7F23;
            padding: 25px;
            border-radius: 6px;
            margin: 25px 0;
            text-align: center;
        }

        .highlight-box h2 {
            color: #EC7F23;
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .highlight-box p {
            color: #666666;
            font-size: 15px;
            line-height: 1.7;
        }

        .info-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 6px;
            margin: 25px 0;
        }

        .info-box h3 {
            color: #030f27;
            font-size: 16px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .info-row {
            display: flex;
            padding: 8px 0;
        }

        .info-label {
            font-weight: 600;
            color: #030f27;
            min-width: 100px;
            font-size: 14px;
        }

        .info-value {
            color: #666666;
            font-size: 14px;
            word-break: break-word;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #EC7F23, transparent);
            margin: 30px 0;
        }

        .cta-section {
            text-align: center;
            margin: 30px 0;
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
            transition: all 0.3s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(236, 127, 35, 0.4);
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

            .info-row {
                flex-direction: column;
            }

            .info-label {
                margin-bottom: 5px;
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
            <h1>Thank You!</h1>
            <p>We've Received Your Message</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="greeting">Dear {{ $enquiry->name }},</div>

            <p class="message-text">
                Thank you for reaching out to <strong>Ranihati Construction Private Limited</strong>. We have
                successfully received your enquiry and appreciate your interest in our services.
            </p>

            <div class="highlight-box">
                <h2>We're On It! 🚀</h2>
                <p>
                    Our team will review your message and get back to you within <strong>24-48 hours</strong>.
                    We're committed to providing you with the best construction solutions.
                </p>
            </div>

            <div class="info-box">
                <h3>Your Enquiry Details:</h3>
                <div class="info-row">
                    <div class="info-label">Subject:</div>
                    <div class="info-value">{{ $enquiry->subject }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Message:</div>
                    <div class="info-value">{{ $enquiry->message }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Submitted:</div>
                    <div class="info-value">{{ $enquiry->created_at->format('d M Y, h:i A') }}</div>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message-text" style="text-align: center;">
                In the meantime, feel free to explore our website to learn more about our projects and services.
            </p>

            <div class="cta-section">
                <a href="{{ url('/') }}" class="cta-button">Visit Our Website</a>
            </div>

            <p class="message-text" style="margin-top: 30px; font-size: 14px; color: #999;">
                If you have any urgent queries, please don't hesitate to call us at <strong
                    style="color: #EC7F23;">+91-9874444725</strong>
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <h3>Ranihati Construction Pvt. Ltd.</h3>
            <div class="contact-info">
                Shop No.13, M.Plaza, Ranihati (Opp: Bank Of Baroda)<br>
                Joynagar Panchla, West Bengal 711302<br>
                Phone: <a href="tel:+919874444725">+91-9874444725</a><br>
                Email: <a href="mailto:ranihati.construction@rconpl.in">ranihati.construction@rconpl.in</a>
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} Ranihati Construction Private Limited. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>