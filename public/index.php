<?php include('../private/initiate.php');
required_login();
 $page_titel = "Dashbord";
 $caption ="Staff Dashbord to Controll Application";
 include_once(SHARED_PATH .'/header.php');?>
    
    <ul>
        <li><a href="<?php echo url_for('/staff/profile.php');?>">Contact</a></li>
        <li><a href="<?php echo url_for('/admin/index.php');?>">Admin</a></li>
    </ul>
    
<?php include_once(SHARED_PATH.'/footer.php');

db_disconnect($database);
?>