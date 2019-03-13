
<?php include('../../private/initiate.php');
 required_login();
 $page_titel = "Staff Profile";
 $caption ="Contact list";
 include_once(SHARED_PATH .'/header.php')?>
    <style>
        table th,td{
            padding:10px;
        }
    </style>
    <?php  $contact_detailse = Contact::find_all();?>
    <div class="viewTable">
    <table  border="1" style="margin:auto;">
        <thead>
            <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th colspan=3>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contact_detailse as $contact) {?>
            <tr>
            <td><?php echo h($contact->date);  ?></td>
            <td><?php echo h($contact->name);  ?></td>
            <td><?php echo h($contact->email); ?></td>
            <td><?php echo h($contact->subject); ?></td>
            <td style="width:340px;"><?php echo h($contact->message); ?></td>
            <td><a href="view.php?id=<?php echo $contact->id ;?>">View</a></td>
            <td><a href="edit.php?id=<?php echo $contact->id ;?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $contact->id ;?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

<?php include_once(SHARED_PATH.'/footer.php');

db_disconnect($database);
?>
