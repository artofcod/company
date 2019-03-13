
<?php include('../../private/initiate.php');
 required_login();
 $page_titel = "Admin Profile";
 $caption ="Existing Admin list";
 include_once(SHARED_PATH .'/header.php');?>
    <style>
        table th,td{
            padding:10px;
        }
    </style>
    <?php  $Admin_list = admin::find_all();?>
    <div class="viewTable container">
    <a href="new.php">Add Admin</a>
    <table  border="1" style="margin:auto;">
        <thead>
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th colspan=3>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($Admin_list as $admin) {?>
            <tr>
            <td><?php echo h($admin->id);  ?></td>
            <td><?php echo h($admin->name);  ?></td>
            <td><?php echo h($admin->email); ?></td>
            <td><?php echo h($admin->username); ?></td>
            <td><a href="view.php?id=<?php echo $admin->id ;?>">View</a></td>
            <td><a href="edit.php?id=<?php echo $admin->id ;?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $admin->id ;?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

<?php include_once(SHARED_PATH.'/footer.php');

db_disconnect($database);
?>
