<?php
session_start();
include_once('./header.php');
include_once('./models/admin.php');

if (isset($_POST['password']) && !empty($_POST['password'])) {
  $admin = new Admin($DB, $_POST['username'], $_POST['password']);
  $result = $admin->login();
  if ($result == false || empty($result)) {
    echo '<div class="ui floating error message mcenter">
            <p>Wrong username or password!</p>
          </div>';
  } else {
    $_SESSION['admin'] = serialize($admin);
    header("Refresh:0");
  }
}


if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
  $admin = unserialize($_SESSION['admin']);
  echo "<div class='ui floating teal message mcenter'>
          <p>Hello {$admin->username}!</p>
        </div>";
} else {
  echo '<div class="ui center aligned grid loginform mcenter" style="width: 50%;">
  <div class="column">
    <h2 class="ui teal image header">

      <div class="content">
        Login
      </div>
    </h2>
    <form class="ui large form" action="" method="post">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <button class="ui fluid large teal submit button"  type="submit">Login</button>
      </div>
    </form>
  </div>
</div>';
}