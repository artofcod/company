<?php include('../../private/initiate.php');

required_login();

    if(!isset($_GET['id'])) {
      redirect_to(url_for('/staff/profile.php'));
    }
    $id = $_GET['id'];
    $contact = Contact::find_by_id($id);
    
    if($contact == false)
    {
      redirect_to(url_for('/staff/profile.php'));
    }
 
  if(is_post_request()) {
    // Create record using post parameters

    $args = [];
    $args['date'] = date("d/m/y") ?? NULL;
    $args['name'] = $_POST['name'] ?? NULL;
    $args['email'] = $_POST['email'] ?? NULL;
    $args['subject'] = $_POST['subject'] ?? NULL;
    $args['message'] = $_POST['message'] ?? NULL;
        
    $contact->marge_attribuites($args);
    $result = $contact->save();
    
  
    if($result == true) {
      $session->message('The contact was edited successfully.');
      redirect_to( url_for('/staff/view.php?id='.$id));
    } else {
      // show errors

    }
  
  } else {
    // display the form

  }
 ?>


<?php $page_titel = "Edit contact";
 $caption ="Edit contact";
 include_once(SHARED_PATH .'/header.php');?>

<div class="container">
  <a href="<?php echo url_for('/staff/profile.php');?>">&laquo;Back to List </a>
    <div class="form">
      <form action="<?php echo url_for('/staff/edit.php?id='. h(u($id))); ?>" method="POST">

        <?php include_once(SHARED_PATH."/form.php");?>

        <div class="form-group">
            <button type="submit" style="pointer-events: all; cursor: pointer;padding:6px 40px;">Edit</button>
            <div class="h3 text-center hidden"></div>
        </div>
      </form>
    </div>
</div>

<?php include_once(SHARED_PATH.'/footer.php');

db_disconnect($database);?>