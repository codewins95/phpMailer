<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Guruji Ayush Astrologer</title>
    <link rel="icon" type="image/icon" href="./assets/img/fevicon.jpg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
       
        /*Css For Form Loader Start*/
        #loader2 {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .spinner2 {
            border: 8px solid rgba(0, 0, 0, 0.1);
            border-top: 8px solid #000;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin2 1s linear infinite;
        }
        
        @keyframes spin2 {
            0% {
                transform: rotate(0deg);
            }
        
            100% {
                transform: rotate(360deg);
            }
        }
        /*Css For Form Loader End*/
    </style>

</head>

<body>

    <!-- //loader section when form submit -->
	<div id="loader2" style="display: none;">
		<div class="spinner2"></div>
		<span class="ms-3">Please Wait...</span>
	</div>
	<!-- //end loader section when form submit -->




    
    <form class="form-wrap" action="sendmail.php" method="POST" onsubmit="formSubmit(event)" id="contactForm">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name*" id="name"
                        required data-error="Please enter your name">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" name="email" id="email" required
                        placeholder="Email*" data-error="Please enter your email">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="number" name="phone" id="phone" required
                        placeholder="Phone Number*" data-error="Please enter your email">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="subject" placeholder="Subject*" id="msg_subject" required data-error="Please enter your subject">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group v1">
                    <textarea name="message" id="message" placeholder="Your Messages.." cols="30" rows="10" required data-error="Please enter your message"></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>                                            
            <div class="col-md-12">
                <button type="submit" id="submitBtn" class="btn style1">Send Message</button>
                <div class="h3 text-center hidden"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>




    <a href="https://api.whatsapp.com/send/?phone=%2B919821343163&text&type=phone_number&app_absent=0" class="float" target="_blank">
        <i class="fa-brands fa-whatsapp my-float"></i>
    </a>
    <a href="tel:+919821343163" class="call" target="_blank">
        <i class="fa-solid fa-phone my-call"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>
