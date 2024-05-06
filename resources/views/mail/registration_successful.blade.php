<!DOCTYPE html>
<html>
<head>
    <title> </title>
</head>
<body>
<body style="margin: 0;">
    <div marginwidth="0" marginheight="0">
        <div marginwidth="0" marginheight="0" id="" dir="ltr" style="background-color:#f5ee8f;margin:0;padding:20px 0 20px 0;width:100%; margin: 0;">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                    <tr>
                        <td align="center" valign="top" style="">
                            <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#ffffff;border:0px solid #dadada;border-radius:10px!important; overflow: hidden;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div style="padding: 15px 20px; background:#eee; padding-bottom: 15px;">
                                                <table style="background:#eee; font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;width: 100%;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 75%;" align="center">
                                                                 
                                                                <img src="{{ asset('') }}admin-assets/assets/img/new-logo.png" alt="" style="max-width: 120px; margin-bottom: 0px; ">

                                                                
                                                                <h1 style="color: #252525; font-size: 25px; line-height: 26px; margin:20px 0 0 0;">Deals Drive: Email Verification Instructions
                                                                </h1>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" style="background-color:#fff; padding:0px;">
                                                            <table border="0" cellpadding="20" cellspacing="0" width="100%" style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="padding-bottom: 0px;">
                                                                            <div style="color:#000;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left;margin-top: 30px">
                                                                                <h4 style="font-size: 16px;">Hi {{$user->name}},</h4>
                                                                                <h4 style="font-size: 14px;">Thank you for registering and welcome aboard with Deals Drive Platform! </span></h4>
                                                                                
                                                                               
                                                                                 <p style="margin:0;padding:0;margin-bottom:5px;color:#000;font-weight:400;font-size:13px;line-height:1.6"> To complete your registration and unlock the full benefits of our platform, we kindly ask you to verify your email address by clicking on the link below:</p><br><br>
                                                                                <a href="{{url('email_verify')}}/{{urlencode(base64_encode($user->id));}}" style="text-decoration: none; background: #000; color: #fff; padding: 10px 16px; border-radius: 5px; font-size: 16px;">Verify Email Now!</a>
                                                                                <br><br>
                                                                                <p style="margin:0;padding:0;margin-bottom:5px;color:#000;font-weight:400;font-size:13px;line-height:1.6">Please note that your account will be fully activated after it has been approved by our administrators. We will notify you via email once this approval process is complete.</p>
                                                                                <br style="margin:0;padding:0">
                                                                               
                                                                                
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h4 style="color: #000; font-size: 14px; margin: 0px 0px 8px; text-align: left;">Thank You,</h4>
                                                                            <p style="color: #000; font-size: 16px; margin: 0px 0px 10px; text-align: left;">Team {{ config('app.name') }}</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="padding: 20px; background:#f2f2f2;">
                                                <table style="background:#f2f2f2; font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;width: 100%;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center;">
                                                           
                                                            <p style="color: #000;">&#169;{{date('Y')}} {{ config('app.name') }}. All Rights Reserved.</p>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</body>
</html>
