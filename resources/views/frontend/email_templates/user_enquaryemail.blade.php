<!DOCTYPE html>
<html lang="en">
<style>
    
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,800&display=swap');
*{
    overflow-x: hidden;
    font-family: "Poppins", sans-serif;
}
.main{
    
    width: 500px;
    /* height: 700px; */
    top: -1217px;
    left: -4677px;
    background: #daf8e4;
    margin: 0 auto;
    border-radius: 25px;
    padding: 15px;
}
.main img{
    position: relative;
    left: 36%;
    padding: 10px 0;
}
#greet{
    font-size: 25px;
}
.container p{
    align-items: center;
    justify-content: center;
    background: #000000;
    font-size: 20px;
    padding: 15px;
    margin: 0 auto;
    background: #FFFFFF;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
}
.container img{
    position: relative;
    
}
.header{
    margin-bottom: 20px;
    
}
.main h1{
    margin: 0;
    font-size: 24px;
    text-align: center;
}

.content{
    text-align: right;
    padding-bottom: 15px;
    /* font-size: small; */
}
.content p{
    text-align: left;
    text-decoration: #000000;

}

@media (max-width: 768px) {
    .main {
        width: 80%; /* Adjust the width for smaller screens */
    }
    
    .container p {
        font-size: 16px; /* Further adjust font size for smaller screens */
        padding: 8px; /* Further adjust padding for smaller screens */
    }
}

/* Media query for screens with a maximum width of 480px (typical mobile phone size) */
@media (max-width: 480px) {
    .main {
        width: 95%; /* Adjust the width for smaller screens */
    }
    
    .container p {
        font-size: 14px; /* Further adjust font size for smaller screens */
        padding: 6px; /* Further adjust padding for smaller screens */
    }
}
</style>
<body>
    <div class="main">
        <p><span id="greet">Dear </span>[customer name],</p>
        <h1>We have received <br>your message</h1>
            <div class="image">
                <img src="img/Mailbox.png" width="20%">
            </div>
            
            <br>
            <br>
        <div class="container">
            <p>
                <b>Your message</b><br><br>

                Financially healthy people make for financially healthy communities, institutions, and economies. For years, the siloed approach to inclusive deThere is a realization that simply having access services and products is not enough to improve economic resilience and secure future vulnerabilities. 
                
                <br>                
            </p>
        </div>
        <div class="content">
            <p>Thank you for texting us, we will get back to you as soon as possible.
            </p>
            <div class="regards">
                <p>
                    regards <br>
                    Access Assist
                </p>

            </div>
        </div>
        </div>
    </body>
    </html>


   