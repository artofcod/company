<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($admin)) {
  redirect_to(url_for('/admin/index.php'));
}
?>

<dl class="form-group">
  <dt>Name</dt>
  <dd><input type="text" name="admin[name]" value="<?php echo h($admin->name); ?>" /></dd>
</dl>

<dl class="form-group">
  <dt>Email</dt>
  <dd><input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>" /></dd>
</dl>

<dl class="form-group">
  <dt>Username</dt>
  <dd><input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>" /></dd>
</dl>

<dl class="form-group">
  <dt>Password</dt>
  <dd><input type="password" name="admin[password]" value="" /></dd>
</dl>

<dl class="form-group">
  <dt>Confirm Password</dt>
  <dd><input type="password" name="admin[conform_password]" value="" /></dd>
</dl>

