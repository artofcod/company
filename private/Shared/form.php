

<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($contact)) {
    //echo url_for('/staff/profile.php');
     // die();
  //redirect_to(url_for('/staff/profile.php'));
}
?>


<div class="row">
      <div class=" col-md-12">
          <div class="form-group">
              <input type="text" class="form-control" required="" placeholder="Name" name="name" value="<?php echo h($contact->name);?>" >
              <div class="help-block with-errors"></div>
          </div>
      </div>

      <div class="col-lg-6 col-md-12">
          <div class="form-group">
              <input type="email" class="form-control" required="" placeholder="Email" name="email" value="<?php echo h($contact->email);?>" >
              <div class="help-block with-errors"></div>
          </div>
      </div>

      <div class="col-lg-6 col-md-12">
          <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject" name="subject" value="<?php echo h($contact->subject);?>" >
          </div>
      </div>

      <div class="col-lg-12 col-md-12">
          <div class="form-group">
              <textarea name="message" class="form-control" cols="30" rows="4" required="" placeholder="Your Message" name="mesage"><?php echo h($contact->message);?></textarea>
              <div class="help-block with-errors"></div>
          </div>
      </div>

      
  </div>