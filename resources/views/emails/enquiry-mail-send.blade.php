<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Enquiry Received</title>
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

        .info-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #EC7F23;
            padding: 20px;
            border-radius: 6px;
            margin: 25px 0;
        }

        .info-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #030f27;
            min-width: 120px;
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

        .footer-message {
            background: #fff8f0;
            border: 1px solid #ffd699;
            border-radius: 6px;
            padding: 20px;
            margin-top: 25px;
            text-align: center;
        }

        .footer-message p {
            font-size: 14px;
            color: #666666;
            margin-bottom: 10px;
        }

        .footer-message strong {
            color: #EC7F23;
            font-size: 16px;
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

        .social-links {
            margin-top: 20px;
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
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>New Contact Enquiry</h1>
            <p>Ranihati Construction Private Limited</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="greeting">Hello Admin,</div>

            <p class="message-text">
                You have received a new contact enquiry through your website. Below are the details of the submission:
            </p>

            <div class="info-box">
                <div class="info-row">
                    <div class="info-label">Name:</div>
                    <div class="info-value">{{ $enquiry->name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $enquiry->email }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Subject:</div>
                    <div class="info-value">{{ $enquiry->subject }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Message:</div>
                    <div class="info-value">{{ $enquiry->message }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Submitted On:</div>
                    <div class="info-value">{{ $enquiry->created_at->format('d M Y, h:i A') }}</div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="footer-message">
                <p><strong>Action Required:</strong></p>
                <p>Please respond to this enquiry at your earliest convenience to maintain excellent customer service.
                </p>
            </div>
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