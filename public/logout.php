<?php
require_once('../private/initiate.php');

// Log out the admin
$session->logout();
redirect_to(url_for('login.php'));

?>
