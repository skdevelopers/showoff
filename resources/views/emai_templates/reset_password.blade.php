<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RESET PASSWORD</title>    
</head>

<body style="margin: 0; color: #ffffff;">
        
    <div marginwidth="0" marginheight="0">
    <div marginwidth="0" marginheight="0" id="" dir="ltr" style="background-color: #cb9b47;margin:0;padding:20px 0 20px 0;width:100%; margin: 0;">

    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tbody>
            <tr>
                <td align="center" valign="top" style=""> 
                    <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#ffffff;border-radius:3px!important">
                        <tbody>
                            <tr>
                                <td>
                                    <div style="padding: 15px 20px; background:#000000; padding-bottom: 15px;">
                                        <table style="background:#000000; font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <img src="{{ asset('') }}admin-assets/assets/img/new-logo.png" alt="" style="max-width: 120px; margin-bottom: 0px; ">
                                                        
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
                                        <td valign="top" style=" background-color: #ffffff; padding:0;">
                                            <table border="0" cellpadding="20" cellspacing="0" width="100%" style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
                                                <tbody>
                                                <tr>
                                                    <td valign="top" style="padding-bottom: 0px;">
                                                        <div align="center"><strong><h2 style="color: #000000; font-size: 20px;line-height: 100%;">Reset Your {{ env('APP_NAME') }} Password</h2></strong></div>
                                                        <div  style="color:#cb9b47;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left;margin-top: 30px">
                                                            <h4 style="font-weight: 600; font-size: 18px; color: #cb9b47;">Hello,</h4>
                                                            <p style="margin:0 0 16px; font-size: 14px; line-height: 26px; color: #cb9b47; text-align: left;">
                                                                We've received a request to reset the password for your {{ env('APP_NAME') }} account.
                                                            You can reset your password by clicking the link below.</p>

                                                            <p style="margin:0 0 16px; font-size: 14px; line-height: 26px; color: #F7D047; text-align: left;">
                                                                <strong><a style="text-decoration: none;color: #000000;" href="{{$link}}" target="_blank" rel="noopener noreferrer">Reset your password</a></strong>
                                                                </p>
                                                        </div>
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
                                <div style="padding: 20px; background: #000000;">
                                    <table style="background: #000000; font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;width: 100%;">
                                        <tbody>
                                            
                                            <tr>
                                                <td style="width: 100%;" colspan="2">
                                                    <table style="font-size: 14px; width: 100%;">
                                                        <tbody>
                                                            

                                                            <tr>
                                                                <td colspan="2" valign="middle"
                                                                    style="padding:0;border:0;color:#aac482;font-family:Arial;font-size:12px;line-height:125%;text-align:center; background: #000000;">
                                                                    <p style="color: #ffffff; padding-top: 20px; font-style: 14px; margin-top: 0px">
                                                                        © {{date('Y')}} {{ env('APP_NAME') }} Market. All Rights Reserved</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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

</html>