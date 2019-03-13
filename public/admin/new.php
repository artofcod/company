<?php include('../../private/initiate.php'); 
required_login();
if(is_post_request()) {

// Create record using post parameters
$args = $_POST['admin'];

$admin = new Admin($args);
$result = $admin->save();

if($result === true) {
  $new_id = $admin->id;
  $session->message('The admin was created successfully.');
  redirect_to(url_for('/admin/view.php?id=' . $new_id));
} else {
  // show errors
}

} else {
// display the form
$admin = new Admin;
}

 $page_titel = "Create Adminn";
 $caption ="Create Admin";
 include_once(SHARED_PATH .'/header.php')?>

<div class="container">

<a class="back-link" href="<?php echo url_for('/admin/index.php'); ?>">&laquo; Back to List</a>

<div class="admin new form">

  <?php echo display_errors($admin->errors); ?>
  <form action="<?php echo url_for('/admin/new.php'); ?>" method="post">

    <?php include('form.php'); ?>

    <div id="operations">
      <button style="padding: 6px 10px;margin-left:10px">Create Admin</button>
    </div>
  </form>

</div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
