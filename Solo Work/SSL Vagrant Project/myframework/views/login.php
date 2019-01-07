<!-- Google Sign-in (new) -->

<html>

<head>
    <title>SSL</title>
    <!-- Include the API client and Google+ client. -->
    <script src = "https://plus.google.com/js/client:platform.js" async defer></script>
    <meta name="google-signin-client_id" content="926874331865-3j1ejp435e5pqs1l625evpmkq0o5fsc3.apps.googleusercontent.com">
</head>

<body>


    <div class="main">

    <div class="container login-form">

        <?

        function create_image($captcha)

        {

            unlink("./assets/image1.png");

            global $image;

            $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");

            $background_color = imagecolorallocate($image, 255, 255, 255);

            $text_color = imagecolorallocate($image, 0, 255, 255);

            $line_color = imagecolorallocate($image, 64, 64, 64);

            $pixel_color = imagecolorallocate($image, 0, 0, 255);

            imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

            for ($i = 0; $i < 3; $i++) {

                imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);

            }

            for ($i = 0; $i < 1000; $i++) {

                imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);

            }

            $text_color = imagecolorallocate($image, 0, 0, 0);

            ImageString($image, 22, 30, 22, $captcha, $text_color);

            /************************************/

            // Create your session variable that carries the data, you will check against this in your controller.
            //
            // Something like $_SESSION[..]=....;
            // Set session variable


            /*************************************/

            imagepng($image, "./assets/image1.png");

        }

        create_image($data["captcha"]);

        // record digits in session variable
        $_SESSION = $data;




        ?>

        <form id="head-login" class="form navbar-form" method='post' action='/welcome/contactRecv'>
            <div class="h2">
                <h2>Log In</h2>
            </div>

            <div class='input-wrapper'>
                <input type='email' id='Email' name='email' class='form-control' placeholder='Your Email *' value='' required/>
                <i class=errorSpan></i>
            </div>

            <div class='input-wrapper'>
                <input type='password' id='Password' name='password' class='form-control' minlength='4' placeholder='Password' * value='' required/>
                <i class='errorSpan'></i>
            </div>

            <div class='input-wrapper'>
                <button id='ajaxButton' type='submit' name='ajaxButton' class='btn'/>Log In</button>
            </div>

            <div class="wrapper">
                <img src='/assets/image1.png'>
            </div>

            <div class="wrapper">
                <label for="captcha">Enter Captcha:</label><br>
                <input name="captcha" type="captcha" id="captcha"  placeholder="">
            </div>




        </form>

        <!-- Container with the Sign-In button. -->
        <div id="gConnect" class="google">

            <h4>Or sign in with Google</h4>

            <!-- Google Sign-in (new) -->
            <div
            class="g-signin2"
            data-clientid="926874331865-3j1ejp435e5pqs1l625evpmkq0o5fsc3.apps.googleusercontent.com"
            data-scope="https://www.googleapis.com/auth/plus.login"
            data-accesstype="offline"
            data-onsuccess="onSignIn"
            data-onfailure="onSignInFailure">
            </div>

        </div>




    </div>

    </div>


</body>

<script>


function onSignIn(resp) {
    var data = resp;
    alert("it works!");

    // Sets up an API call after the Google API client loads.
    gapi.client.load('plus', 'v1', function() {
        gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);

    });

}

function onSignInFailure() {
    alert("it failed!");
}


// Response callback for when the API client receives a response.
function handleEmailResponse(resp) {

    var tokens = gapi.auth2.getAuthInstance().currentUser.get().getAuthResponse(true);

    var profile = JSON.stringify({profile: resp}, null, '\t');

    var email = resp.emails[0].value;
    var name = resp.displayName;
    var id = resp.id;
    var token = tokens.id_token;

     // document.getElementById('responseContainer').value = 'Name: ' +
     // name +'Primary email: ' + email + '\n\nFull Response:\n' + profile;

    window.location.href = "http://localhost/google?email=" + email + "&name=" + name + "&id=" + id + "&token=" + token;
}

</script>

</html>
