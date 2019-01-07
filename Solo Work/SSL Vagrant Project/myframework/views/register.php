<!-- register.php -->

<html>

<head>
    <title>SSL</title>
    <!-- Include the API client and Google+ client. -->
    <script src = "https://plus.google.com/js/client:platform.js" async defer></script>
    <meta name="google-signin-client_id" content="926874331865-3j1ejp435e5pqs1l625evpmkq0o5fsc3.apps.googleusercontent.com">
</head>

<body>

<div class='main'>
    <div class='container register'>

        

        <form class="" id="register" style="margin: 1rem 0 1rem 0;" action="/auth/register" method="post">

            <div class='input-wrapper'>
                <input type='email' id='Email' name='email' class='form-control' placeholder='Your Email *' value='' required/>
                <i class=errorSpan></i>
            </div>

            <div class='input-wrapper'>
                <input type='password' id='Password' name='password' class='form-control' minlength='4' placeholder='Password' * value='' required/>
                <i class='errorSpan'></i>
            </div>

            <button id='ajaxButton' class="btn" type="submit" name="register">Register!</button>
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
</html>
