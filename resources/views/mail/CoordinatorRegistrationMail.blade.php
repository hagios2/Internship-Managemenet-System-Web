<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Verification Email</title>
    <style type="text/css">
        body {
            Margin: 0;
            padding: 0;
            background: #f6f9fc;
        }
        table {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }

        @media screen and (max-width: 600px) {
        }
        @media screen and (max-width: 400px) {
        }
    </style>
</head>
<body>
<center style="width: 100%;table-layout: fixed;background-color: #f6f9fc;">
    <div style="max-width: 600px;background-color: #FFFFFF;">
        <table style="Margin:0 auto;width: 100%;max-width:600px;font-family: sans-serif;color: #4a4a4a;" align="center">
            <tr>
                <td style="background-color: #6EC7E0;padding:20px 10px;text-align: center;">
                    <a href="https://martekgh.com"><img src="https://snake-platform.herokuapp.com/images/smplogo.png" alt="SMP-logo" title="waPatron" style="height: 50px;width: auto;"></a>
                </td>
            </tr>

            <tr>
                <td style="padding:0px 30px;">
                    <p style="font-size: 14px; color: #25383C; font-weight: 400;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                        <span style="font-weight: 700;font-size: 18px;text-align: left !important;">Congratulations {{ $coordinator->name }}!</span><br/><br/> You have been added as a Staff on the UENR internship Platform. <br>
                        Kindly find the credentials below to login
                        You are one click away from completing your registration. To proceed, please click the button below.
                    </p>

                    <p style="font-size: 14px; color: #25383C; font-weight: 400;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                        <span style="font-weight: 700;font-size: 18px;text-align: left !important;">Email: <b>{{ $coordinator->email }}</b> </span><br/><br>
                        <span style="font-weight: 700;font-size: 18px;text-align: left !important;">Password: <b>{{ $password }}</b> </span><br/><br/>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding: 0px 30px;">
                    <p style="font-size: 14px; color: #25383C; font-weight: 400;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                        If you did not create an account using this address, please ignore this email.
                    </p>
                </td>
            </tr>

            <tr>
                <td style="padding: 10px;"></td>
            </tr>

            <tr>
                <td style="background-color:#6EC7E0;text-align: center;">
                    <h5><a style="color: black !important;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" href="https://martekgh.com/user/help-center" target="_blank">FAQS</a> | <a style="color: black !important;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" href="https://martekgh.com/user/contact-us" target="_blank">FEEDBACK</a></h5>
                    <h5><a href="mailto:support@martekgh.com">support@martekgh.com</a> | <a style="color: black !important; text-decoration: none !important;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" href="tel:0558341865">[+233] 55 834 1865</a></h5>
                </td>
            </tr>

        </table>
    </div>
</center>
</body>
</html>
