<!-- contact.php -->
<div class="main">

<div class="container contact-form">
            <form class="form" method="post" action="/welcome/contactRecv">
                <h3>Drop Me a Message</h3>
               <div class="row">
                    <div class="col-md-6">

                        <!-- name -->
                        <div class="form-group">
                            <input type="text" name="Name" class="form-control" placeholder="Your Name *" value="" required/>
                            <i class="errorSpan"></i>
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" required/>
                            <i class="errorSpan"></i>
                        </div>

                        <!-- message -->
                        <div class="form-group">
                            <textarea name="Msg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                            <i class="errorSpan"></i>
                        </div>



                        <!-- button -->
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>

                </div>
            </form>
</div>

<?



?>
</div>
