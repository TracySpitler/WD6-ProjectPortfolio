<!-- welcome.php -->

<div class="main">

<!-- Card -->
<!-- <div class="card">

    <div class="description">
        <h2>Behind this project:</h2><br>
    </div>


    <p>Assignment 2: <span class="week">Sept. 30th<span></p><br>
    <iframe src="https://www.youtube.com/embed/XF_1PdLzgEQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


    <p>Assignment 3: <span class="week">Oct. 2nd<span></p><br>
    <iframe src="https://www.youtube.com/embed/XF_1PdLzgEQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

</div> -->

<div class="container welcome">

    <h2>Modal:</h2>

    <div class="row mb-4">
      <div class="col text-left">
        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Click to open Modal</a>
        <p>Modals with assignment videos are under the Videos tab!</p>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">My Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>Modal Body.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <h2>Carousel:</h2>

    <!-- Carousel -->
    <div class="carousel">
        <div id="myCarousel" class="carousel slide" data-interval="6500" data-ride="carousel">

            <div class="carousel-inner" role="listbox">
              <div class="item carousel-fade active">
                  <img class="d-block img-fluid" src="https://images.pexels.com/photos/595804/pexels-photo-595804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=350" alt="Third slide">
              </div>
              <div class="item carousel-fade">
                  <img class="d-block img-fluid" src="https://images.pexels.com/photos/101764/pexels-photo-101764.png?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="First slide">
              </div>
              <div class="item carousel-fade">
                  <img class="d-block img-fluid" src="https://images.pexels.com/photos/1114220/pexels-photo-1114220.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Second slide">
              </div>
              <div class="item carousel-fade">
                  <img class="d-block img-fluid" src="https://images.pexels.com/photos/595804/pexels-photo-595804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=350" alt="Third slide">
              </div>
            </div>

            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

    <h2>Progress Bar:</h2>

    <!-- Progress Bar -->
    <div class="progress bar">
      <div class="progress-bar" role="progressbar" style="width: 37%;" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100">37%</div>
    </div>

    <h2>Popover:</h2>

    <!-- Popover -->
    <button type="button" class="btn btn-primary bar" data-toggle="popover" data-placement="right" data-original-title="popover" data-content="Look at me!">
          Click me for a popover!
    </button>

    <div class="div"></div>

    <?php

    //include('reset.css');
    //include('custom.css');

    ?>

</div>

</div>
