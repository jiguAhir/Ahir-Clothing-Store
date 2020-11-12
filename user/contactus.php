<?php
  session_start();

    include('connect_db.php');

    if(isset($_SESSION['usrid']))
    {
      $usrid = $_SESSION['usrid'];
    }

    if(isset($_POST['submit_msg']))
    {
      echo "<script>alert('Thank you for contacting AHIR-CLOTHING STORE, We will reply within 48 hours.')</script>";
    }
?>
<?php
  include('layouts/header.php');
?>
<div id="contact-page" class="container">
  <div class="bg">
    <div class="row">       
      <div class="col-sm-12">                 
        <h2 class="title text-center">Contact <strong>Us</strong></h2>                                  
      </div>          
    </div>      
    <div class="row">   
      <div class="col-sm-8">
        <div class="contact-form">
          <h2 class="title text-center">Get In Touch</h2>
          <div class="status alert alert-success" style="display: none"></div>
            <form id="main-contact-form" class="contact-form row" name="contact-form" method="POST">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
              </div>
              <div class="form-group col-md-6">
                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
              </div>
              <div class="form-group col-md-12">
                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
             </div>                        
              <div class="form-group col-md-12">
               <input type="submit" name="submit_msg" class="btn btn-primary pull-right" value="Submit">
              </div>
             </form>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="contact-info">
          <h2 class="title text-center">Contact Info</h2>
          <address>
            <p>AHIR-CLOTHING STORE</p>
            <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
            <p>New york USA</p>
            <p>Mobile: +1 713 409 0123</p>
            <p>Fax: 1-714-252-0026</p>
            <p>Email: info@ahirclstore.com</p>
          </address>
        </div>
      </div>          
    </div>  
  </div>  
</div><!--/#contact-page-->          
<?php
  include('layouts/footer.php');
?>    