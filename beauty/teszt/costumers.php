<?php
session_start();
include('./header.php');
checkSession();
if (isset($_POST['add'])) {
    checkLevel(addLevel);
    $result = $DB->runPreparedQuery(Queries::$addCostumer, [$_POST["name"], $_POST["email"], md5(defaultCostumerPassword), $_POST["tax_number"]], false);
    $admin = unserialize($_SESSION['admin']);
    $admin->addLog($_POST["name"], 1, "Add User");
    echo '<div class="ui floating message mcenter">
            <p>Done!</p>
          </div>';
}

$result = $DB->runPreparedQuery(Queries::$getCostumers, []);
echo '<div class="ui centered grid">
<div class="row">
<div class="ten wide computer only sixteen wide mobile tablet only column">
<table class="ui celled stripped table">
<thead>
  <tr><th>Name</th>
  <th>Email</th>
  <th>Tax num</th>
  <th>Actions</th>
</tr></thead>
    <tbody>
'; ?>
<?php foreach ($result as $costumer) : ?>

<tr>
    <form action="costumer.php" method="POST">
        <td><?php echo $costumer["name"]; ?></td>
        <td><?php echo $costumer["email"]; ?></td>
        <td><?php echo $costumer["tax_number"]; ?></td>
        <td>
            <button class="ui yellow icon button" type="submit" name="edit"><i class="edit icon"></i></button>
            <button class="ui red icon button" type="submit" name="delete"><i class="trash icon"></i></button>
            <input hidden value='<?php echo json_encode($costumer); ?>' name="costumer">
        </td>

    </form>
</tr>

<?php endforeach;
echo '<tr>
        <form action="costumers.php" method="POST">
            <td>
                <div class="ui input">
                    <input type="text" name="name" placeholder="Name" value="">
                </div>
            </td>
            <td>
                <div class="ui input">
                    <input type="text" name="email" placeholder="Email" value="">
                </div>
            </td>
            <td>
                <div class="ui input">
                    <input type="number" min="0" name="tax_number" placeholder="0" value="">
                </div>
            </td>
            <td>
                <button class="ui blue icon button" type="submit" name="add">
                    <i class="plus icon"></i></button>
            </td>
        </form>
    </tr>
</tbody>
</table>
</div>
</div>
</div>';