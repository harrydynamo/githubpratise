<!DOCTYPE html>
<html lang="en">
<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    require 'C:\xampp\htdocs\petiwala\ServerScripts\PHPMailer\PHPMailer\PHPMailer.php';
    require 'C:\xampp\htdocs\petiwala\ServerScripts\PHPMailer\PHPMailer\SMTP.php';
    // require 'C:\xampp\htdocs\petiwala\ServerScripts\PHPMailer\PHPMailer\Exception.php';

    // Load Composer's autoloader
    require 'C:\xampp\phpMyAdmin\vendor\autoload.php';
?>
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indian Pest Control | Callback</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" id="font-awesome-css" href="https://secureservercdn.net/160.153.137.14/87s.dce.myftpupload.com/wp-content/themes/oceanwp/assets/css/third/font-awesome.min.css?ver=4.7.0&amp;time=1576403266" type="text/css" media="all">
    <style>
        .response {
            /* border: 1px solid red; */
            width: 40%;
            margin-left: 30%;
            margin-top: 10%;
        }

        .message {
            /* border: 1px solid red; */
            text-align: center;
            font-family: sans-serif;
        }

        @media only screen and (min-width: 1080px) {
            .response {
                /* border: 1px solid red; */
                width: 10%;
                margin-left: 45%;
                margin-top: 5%;
            }
        }
    </style>
</head>
<body>
    <div id="navbar">
        <div id="nav_logo">
            <img src="../images/logo.png" alt="" srcset="" onclick="goToHomePage()">
        </div>        
        <a href="tel:8108053583" id="direct_call"> <span>CALL NOW</span> </a>
    </div>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mobile_number'])) {

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'Smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'harrisnawarangee91@gmail.com';                     // SMTP username
                $mail->Password   = 'mywork@myplace';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('mohammadharris412@gmail.com', 'Mailer');
                $mail->addAddress('harrisnawarangee91@gmail.com');     // Add a recipient Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                if ($mail->send()) {
                    echo '<img class="response" src="../images/green-tick.png" alt="">';
                    echo '<p class="message">You will get a phone call soon.</p>';
                } else {
                    echo '<img class="response" src="../images/red-cross.png" alt="">';
                    echo '<p class="message">Something went wrong.</p>';
                }
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                echo '<img class="response" src="../images/red-cross.png" alt="">';
                echo '<p class="message">Server Error.</p>';
            }
        }        
    ?>
    <script>
        function goToHomePage() {
            window.location.href = "http://192.168.0.105/petiwala";
        }
    </script>
</body>