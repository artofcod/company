<?php include('../../private/initiate.php');

required_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/admin/index.php'));
}
$id = $_GET['id'];
$admin = admin::find_by_id($id);
if($admin == false) {
    redirect_to(url_for('/admin/index.php'));
  }
if(is_post_request()) {
    
  // Delete bicycle
  $result = $admin->delete();
 
  $_SESSION['message'] = 'The admin was deleted successfully.';
  redirect_to(url_for('/admin/index.php'));
} else {
  // Display form
}


 $page_titel = "Delete admin";
 $caption = "Delete admin";
 include_once(SHARED_PATH .'/header.php')?>

<div class="container">
<a href="<?php echo url_for('/admin/index.php');?>">&laquo;Back to List </a>
<div class="view" >

  <div class="Delete admin">
    <h2>Delete admin</h2>
    <p >Are you sure you want to delete this admin?</p>
    <p class="item"><i><?php echo h($admin->name); ?></i></p>

    <form action="<?php echo url_for('/admin/delete.php?id=' . h(u($id))); ?>" method="post">
      <div class="form-group" style="margin-left:0px">
        <button>Delete admin</button>
      </div>
    </form>
  </div>
</div>
</div>



<?php include_once(SHARED_PATH.'/footer.php');

db_disconnect($database);?>