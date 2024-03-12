<!DOCTYPE html>
<html lang="en">

<style>
    
body {
    font-family: Arial, sans-serif;
    background-color: #a1bcce; 
}
.container {
    padding-top: 2rem;
}
.card {
    border: 1px solid #024e85;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(6, 1, 1, 0.1);
    background-color: rgb(131, 245, 249);
}

.card-title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 1rem;
    color: #333;
    /* background-color: #4dabef; */
    width: 100%;
}
.card-body {
    flex: 1 1 auto;
    padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
    color: var(--bs-card-color);
    background-color: rgb(210, 244, 244);
}
.card-text {
    margin-bottom: 1rem;
    font-size: 16px;
    line-height: 1.5;
    color: #020101;
}
.text-danger {
    color: #dc3545;
}

strong {
    font-size: 20px;
    color: #007bff; 
}

.text-center {
    margin-top: 2rem;
}
.box {
    background-color: #f5f5f5; 
    padding: 20px;
    border-radius: 10px;
}

@media (max-width: 768px) {
    .card {
        margin-top: 2rem;
    }
}

</style>
<body>
    <div class="box">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">DDD 
                                (Discovery Data Deal-making)
                            </h4><br>
                           
                            <p class="card-text">
                                <span id="greet"><b>Dear Mr./Mrs,</b> </span><?php echo e($data['username']); ?> <br><br>
                                You are just a step away from updating your email address.
                                We are sharing a one-time use verification code (OTP) for this request.
                                Once updated, you can use the new email address to access your Access Assist account.
                            </p>
                            <p class="card-text">Verification Code (OTP): <strong><?php echo e($data['otp']); ?></strong></p>
                            <p class="card-text">Validity: 10 minutes</p>
                            <p class="card-text text-danger">
                                Important note: Please do not share this code with anyone for the security of your Access Assist account.
                            </p>
                        </div>
                        <div class="text-center mt-4">
                            <p>Thanks & Regards</p>
                            <p><b>DDD</b><br>
                            (Discovery Data Deal-making)</p>
                        </div>
                    </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/email_templates/email-otp.blade.php ENDPATH**/ ?>