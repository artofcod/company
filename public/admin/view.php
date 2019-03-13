<?php include('../../private/initiate.php');
required_login();
$id =$_GET['id'] ?? false;
if(!$id)
{
     redirect_to('/admin/index.php');
}
$admin = admin::find_by_id($id);


 $page_titel ="View Detailse" ;
 $caption = "Admin detailes "; 
 include_once(SHARED_PATH .'/header.php')?>

     <div class="container">
          <a href="<?php echo url_for('/admin/index.php');?>">&laquo;Back to List </a>
          <div class="view">
               <p><b>No :</b> <?php echo h($admin->id);  ?></p>
               <p><b>Name :</b> <?php echo h($admin->name);  ?></p>
               <p><b>Email :</b> <?php echo h($admin->email);  ?></p>
               <p><b>Username :</b> <?php echo h($admin->username);  ?></p> 
          </div>
     </div>
    


    <?php include_once(SHARED_PATH.'/footer.php');

    db_disconnect($database);?> 