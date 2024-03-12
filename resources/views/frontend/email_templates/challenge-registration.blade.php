<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email inbox message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .body {
        background-color: #ffff;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;
    }

    .bg-light {
        background-color: #b7dbff !important;
    }
    .p-5 {
    padding: 1rem!important;
    }

    .text-primary {
        color: #141414 !important;
    }

    .text-muted {
        color: #020202 !important;
        background-color: white;
    }

    .img-fluid {
    max-width: 21%;
    height: auto;
    }

    h4 {
        display: block;
        margin-block-start: 1.33em;
        margin-block-end: 1.33em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: lighter;
    }
    img {
    vertical-align: middle;
    border-style: none;
    width: 93%;
    }
    .h3, h3 {
    font-size: 1.75rem;
    text-align: center;
}
</style>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="bg-light p-5">
                    <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%;">
                        <tbody>
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 150px;">
                                                    <div class="row p-4">
                                                        <div class="d-flex justify-content-center"
                                                            style="width: 130px; height: 130px; flex-shrink: 0; background: #fffbfb;">
                                                            <img src="{{asset('public/uploads/challenge-logo/')}}/{{$data['logo']}}"
                                                            style="max-width: 100%; max-height: 100%;"
                                                            alt="Image">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="padding-left: 30px; padding-right: 60px;">
                                                    <h2 class="text-primary"
                                                        style="margin-top: 0; text-align: left; color: #1c4980; margin: 0px 0 8px; font-size: 20px; font-weight: 700; line-height: 24px;">
                                                        {{$data['challenge_title']}}
                                                    </h2>
                                                    <p>
                                                        {{$data['org_name']}}
                                                    </p>
                                                </td>
                                                <h3 class="rights">DDD <br>
                                                    (Discovery Data Deal-making)
                                                </h3>
                                            </tr>
                                        </tbody>
                                    
                                    </table>
                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 p-4">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Hi <b>{{$data['firstname']}} {{$data['lastname']}},</b>
                </p>
                <div class="text-muted">
                    <h4><b>THANKS YOU FOR REGISTRATION!</b></h4>
                    <p>
                        You are requested to fill the form and submit your pitch deck 
                    </p>
                    <p>
                        Click on the link to check your field form: <a href="http://devddd.accessassist.in/user-profile" target="_blank"
                            rel="noopener noreferrer">View Profile</a>
                    </p>
                    <p>
                        <strong>BEYOND THE LAST DATE OF SUBMISSION YOUR APPLICATION WILL NOT BE ACCEPTED.</strong>
                    </p>
                   
                    <p>
                        Best Regards,<br>
                        <strong>DDD Young Indians</strong>
                    </p>
                </div>
                <div class="text-center view-button">
                    <a href="http://devddd.accessassist.in/challenge" target="_blank" rel="noopener noreferrer">
                        <img src="https://ci6.googleusercontent.com/proxy/aMQgiFZiWuvxHHh8G55GatrmCunZKGf7ut5oGKq2MlVUyPIpjnKKi5xEjwRCX40jp8MDMoG3gNiDB09vcqF0NjCeQsufl_O7bl5k_Hk3nzERFqGYStbta9QnpCy3k-kAOpA-Y_jFxr8bBuOFqT04SQ=s0-d-e1-ft#https://d8it4huxumps7.cloudfront.net/uploads/images/unstop/emails/view-opportunity-button.png"
                            alt="View opportunity" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
     <section class="bg-green">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table style="width: 100%;">
                        <tbody style="background-color: #dae6f4;">
                            <tr >
                                <td style="padding: 50px 25px 0 25px;">
                                    <p
                                        style="box-sizing:border-box;line-height:1.5em;margin-top:0;font-family:'Roboto',sans-serif;text-align:center;color:#434343;font-size:14px;font-weight:500;margin:0">
                                        <strong
                                            style="box-sizing:border-box;font-family:'Roboto',sans-serif;font-weight:700">Disclaimer:</strong>
                                        This email has been sent to you on behalf of the {{$data['org_name']}}, organizer of
                                        the {{$data['challenge_title']}} <br>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 20px;">
                                    <p class="text-center font-weight-bold"
                                        style="font-size: 14px; color: #434343; margin: 0;">
                                        Queries? Please reach out to the organizers using the contact details mentioned
                                        <br>on the opportunity page or to us at
                                    </p>
                                    <p class="text-center font-weight-bold"
                                        style="font-size: 14px; color: #434343; margin: 6px 0 0;">
                                        © 2023 <a href="#"
                                            style="text-decoration: none; color: #434343;" target="_blank"
                                            rel="noreferrer">DDD</a>. All rights reserved <br>
                                    </p>
                                </td>
                            </tr>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section> <br>
</body>
</html>
