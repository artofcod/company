<?php include('../../private/initiate.php');

required_login();

    if(!isset($_GET['id'])) {
      redirect_to(url_for('/admin/index.php'));
    }
    $id = $_GET['id'];
    $admin = admin::find_by_id($id);
    
    if($admin == false)
    {
        redirect_to(url_for('/admin/index.php'));
    }
 
  if(is_post_request()) {
    // Create record using post parameters
    $args = $_POST['admin'];    
    $admin->marge_attribuites($args);
    $result = $admin->save();
    
  
    if($result == true) {
      $session->message('The admin  was edited successfully.');
      redirect_to( url_for('/admin/view.php?id='.$id));
    } else {
      // show errors

    }
  
  } else {
    // display the form

  }
 ?>


<?php $page_titel = "Edit Admin"?>
<?php $caption ="Edit Admin"?>
<?php include_once(SHARED_PATH .'/header.php')?>

<div class="container">
  <a href="<?php echo url_for('/admin/index.php');?>">&laquo;Back to List </a>
    <div class="form">
     <?php echo display_errors($admin->errors); ?>
      <form action="<?php echo url_for('/admin/edit.php?id='. h(u($id))); ?>" method="POST">

        <?php include_once("form.php");?>

        <div class="form-group">
            <button type="submit" style="pointer-events: all; cursor: pointer;padding:6px 40px;">Edit</button>
            <div class="h3 text-center hidden"></div>
        </div>
      </form>
    </div>
</div>

<?php include_once(SHARED_PATH.'/footer.php');

db_disconnect($database);?>