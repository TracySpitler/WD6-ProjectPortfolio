<!-- header.php -->

<!-- navbar   -->
<div style="background-color:var(--red);"><?=@$_REQUEST['msg']?@$_REQUEST['msg']:''?></div>

<nav id="header-navigation" class="navbar navbar-toggleagble-lg bg-dark navbar-dark  p-3">
    <div class="container-fluid">
        <!-- header -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/welcome"><strong>SSL</strong></a>


        </div>

        <!-- nav links -->

        <ul id="navbarToggle" class="navbar-nav collapse navbar-collapsenav">
            <div class="nav">
            <?
                foreach ($data as $key => $value) {
                    echo '<li class="">';
                    //echo '<li ',(@$page["pagename"]=="$value"?'class="active current"':''),' >';
                    echo '<a class="nav-link ',($_SERVER['PHP_SELF'] == "/index.php/welcome/$value" ? 'active current' : ''),'" href="/welcome/'.$value.'">'.$value.'</a></li>';
                    //echo '<a class="nav-link" href="/',($_SERVER['PHP_SELF'] == "/index.php/$value" ? 'active' : ''),''
                    //echo "/index.php/$value";
                }
                echo '<li class="">';
                echo '<a class="nav-link ',($_SERVER['PHP_SELF'] == "/index.php/about" ? 'active current' : ''),'" href="/about">About</a></li>';

                echo '<li class="">';
                echo '<a class="nav-link ',($_SERVER['PHP_SELF'] == "/index.php/api" ? 'active current' : ''),'" href="/api">API</a></li>';


            ?>
        </ul>


        <!-- side login -->
            <?if(@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1){?>

                    <form class="nav form-inline navbar-form">
                        <a class="nav-link" href='/profile'>Profile</a>
                        <a class="nav-link" href='/auth/logout'>Logout</a>
                        <button class="navbar-toggler navbar-right" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                            <span id="toggle" class="navbar-toggler-icon"></span>
                        </button>
                    </form>

            <?}else{?>

                <form id="head-login" class="form form-inline navbar-form" method='post' action='/auth/login'>
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
                    <button class="navbar-toggler navbar-right" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </form>

            <?}

            // record digits in session variable
            //$_SESSION['Email'] = $_POST['Email'];
            //$_SESSION['Password'] = $_POST['Password'];
            ?>





        </div>

    </div>
</nav>

<!-- if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"] == 1) {
    echo "<form class='navbar-form navbar-right'>
    <a href='/profile'>Profile</a>
    <a href='auth/login'>Logout</a>
    </form>";
}
else {
    // Log In
    echo "<div class='container login-form'>
                <form class='form' method='post' action='/auth/login'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class='form-group'>
                                <input type='email' id='Email' name='Email' class='form-control' placeholder='Your Email *' value='' required/>
                                <i class=errorSpan></i>
                            </div>

                            <div class='form-group'>
                                <input type='password' id='Password' name='Password' class='form-control' minlength='4' placeholder='Password' * value='' required/>
                                <i class='errorSpan'></i>
                            </div>
                            <div class='form-group'>
                                <button id='ajaxButton' type='submit' name='ajaxButton' class='btn'/>Log In</button>
                            </div>
                        </div>

                    </div>
                </form>
    </div>";
} -->
