<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!-- Footer -->
<footer class="bg-dark p-3 mt-3 navbar-dark footer">
    <div class="container">

      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a class="btn-floating" href="https://github.com/TracySpitler">
            <i class="fab fa-github"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating" href="https://www.youtube.com/user/tracyspitler/">
            <i class="fab fa-youtube"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating" href="https://www.linkedin.com/in/tracyspitler">
            <i class="fab fa-linkedin"></i>
          </a>
        </li>
      </ul>

    </div>

    <div class="footer text-center">A Project created by <strong>Tracy Spitler</strong>.</div>

  </footer>
  <!-- Footer -->


<?



?>

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<script>


$(document).ready(function(){

    // function toggle_visibility(id) {
    //
    //   var e = document.getElementById(id);
    //   if (e.style.display == 'block' || e.style.display == '')
    //     e.style.display = 'none';
    //   else
    //     e.style.display = 'block';
    // }

    // Carousel
    $('.carousel').carousel({
        interval: 6000,
        pause: "false"
    });

    // Popover
    $("body").popover({
        selector: "[data-toggle='popover']",
        container: "body",
        html: true
    });

    // AJAX
    $('#ajaxButton').click(function() {
        alert("Alert: footer.php line 35");

        $.ajax({
            method: "POST",
            url: "/index.php/welcome/ajaxParams",
            data: {"welcome"},
            success: function(data) {
                console.log(data);
                if (data=="welcome") {
                    alert("Welcome! You have successfully loggd in!");
                }
                else {
                    alert("Bad login. Please try again.");
                }
            }
        });
    });


    // testing jquery
    //$("div").css("border", "3px solid red");

});


</script>


    </body>
</html>
