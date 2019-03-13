<?php include('../../private/initiate.php');
 required_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/profile.php'));
}
$id = $_GET['id'];
$contact = contact::find_by_id($id);
if($contact == false) {
    redirect_to(url_for('/staff/profile.php'));
  }
if(is_post_request()) {
    
  // Delete bicycle
  $result = $contact->delete();
 
  $session->message('The contact  was deleted successfully.');
  redirect_to(url_for('/staff/profile.php'));
  print_r($result);
  die();
} else {
  // Display form
}

 $page_titel = "Delete contact";
 $caption = "Delete contact";
 include_once(SHARED_PATH .'/header.php')?>

<div class="container">
<a href="<?php echo url_for('/staff/profile.php');?>">&laquo;Back to List </a>
<div class="view" >

  <div class="Delete Contact">
    <h2>Delete Contact</h2>
    <p >Are you sure you want to delete this Contact?</p>
    <p class="item"><i><?php echo h($contact->name); ?></i></p>

    <form action="<?php echo url_for('/staff/delete.php?id=' . h(u($id))); ?>" method="post">
      <div class="form-group" style="margin-left:0px">
        <button>Delete Contact</button>
      </div>
    </form>
  </div>
</div>
</div>



<?php include_once(SHARED_PATH.'/footer.php');

db_disconnect($database);?>