<!doctype html>
<html lang="{{getLangValue('email_register.lang')}}"><head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>{{getLangValue('email_register.subject')}}</title>
    <meta name="description" content="{{getLangValue('email_register.description')}}">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<!-- 100% body table -->
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
    <tbody><tr>
        <td>
            <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a href="https://iq-certify.com" title="IQ Certify" target="_blank">
                            <img width="250" src="{{asset('panel/img/logo.png')}}" title="IQ Certify" alt="IQ Certify">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                            <tbody><tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding:0 35px;">
                                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">{{getLangValue('email_register.title')}}</h1>
                                    <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">{{getLangValue('email_register.description')}} 
                                        <br>{{getLangValue('email_register.password_text')}} {{$user['password']}}
                                    </p>
                                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                    <p style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;"><strong>
                                            {{getLangValue('email_register.iq_obtained')}}<span style="color:#00784c;">{{App\Helpers\Results::Get($id,'total')}}</span>




                                        </strong></p>
                                    <a href="{{url('test-result',$key)}}" style="background: #00784c;text-decoration:none !important;display:inline-block;font-weight:500;margin-top:24px;color:#fff;text-transform:uppercase;font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">{{getLangValue('email_register.results_button')}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">© IQ Certify <a target="_blank" href="https://www.iq-certify.com" style="color: #7b7b7b;"><strong>www.iq-certify.com</strong></a> </p>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
                </tbody></table>
        </td>
    </tr>
    </tbody></table>
<!--/100% body table-->
</body></html>
