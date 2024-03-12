<!doctype html>
<html lang="en">


<style>
    p,
    h1,
    h2,
    h3,
    h4,
    .h5,
    h6 {
        color: white;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .page {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .section {
        padding: 50px 50px;
    }

    .main-img {
        width: 50%;
    }

    @media screen and (min-width:700px) {
        .card {
            width: 40%;
            align-content: center;
        }
    }
    
        @media screen and (min-width:500px) {
        .card {
            width: 60%;
            align-content: center;
        }
    }

    @media screen and (max-width:500px) {
        .section {
            padding: 5px;
        }

        .main-img {
            width: 70%;
        }
    }
</style>

<body>

    <section class="section">
        <div class="container">
            <div class="page">
                <div class="card" style="border-radius: 50px; background-color:#034AA6; padding:50px 20px; width:50%;">
                    <div style="text-align: center; padding:20px;">
                        <img style="border-radius: 50%;" class="main-img" src="https://static.vecteezy.com/system/resources/previews/014/905/319/non_2x/up-to-date-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg" alt="" width="50%">
                    </div>
                    <div style="padding: 0 20px 0 20px ;">
                        <h3 style="color:white;">
                            <hr>
                            To Finish Signing-up, Please Confirm your User Credencials Login to your Account.This Ensure you got a right UserName and Password.
                        </h3>
                        <hr>
                        <p style="color:white;">There is Your Credencials:</p>
                         
                        <p style="color:white;">Username : <span id="username"><strong>{{$data['username']}}</strong></span></p>
                        <p style="color:white;">Password : <span id="password"><strong>{{$data['password']}}</strong></span></p>
                    </div>
                    <div style="text-align: center;">
                        <button type="button" style="padding: 10px 50px; background-color:white; color:#034AA6; border:2px solid white; border-radius:30px; font-weight:bold;">Login <i class="fa-solid fa-arrow-right-long"></i></button>
                    </div>
                    <div>
                        <hr>
                        <h3 style="margin: 0 20px 20px 40px; color:white;">Thanks, <br><strong>DDD Team</strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>