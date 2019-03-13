<?php include('../../private/initiate.php');
required_login();

$id =$_GET['id'] ?? false;
if(!$id)
{
     redirect_to('/staff/profile.php');
}
$contact = contact::find_by_id($id);


 $page_titel ="View Detailse" ;
 $caption = "Contact detailes "; 
 include_once(SHARED_PATH .'/header.php')?>

     <div class="container">
          <a href="<?php echo url_for('/staff/profile.php');?>">&laquo;Back to List </a>
          <div class="view">
               <p><b>Date :</b> <?php echo h($contact->date);  ?></p>
               <p><b>Name :</b> <?php echo h($contact->name);  ?></p>
               <p><b>Email :</b> <?php echo h($contact->email);  ?></p>
               <p><b>Subject :</b> <?php echo h($contact->subject);  ?></p>
               <p><b>Message : </b> <?php echo h($contact->message);  ?></p> 
          </div>
     </div>
    


    <?php include_once(SHARED_PATH.'/footer.php');

    db_disconnect($database);?> 