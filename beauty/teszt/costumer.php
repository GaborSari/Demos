<?php
session_start();
include('./header.php');
include('./models/costumer.php');
checkSession();
if (isset($_POST['edit'])) {
    $jsonUser = json_decode($_POST['costumer']);
    $costumer = new Costumer($DB, $jsonUser->id, $jsonUser->name, $jsonUser->email, $jsonUser->password, $jsonUser->tax_number);
?>
<div class="ui centered grid">
    <div class="row">
        <div class="eleven wide computer only fourteen wide mobile tablet only column">
            <?php if ($costumer->defaultAddressesSet == false) echo '<div class="ui floating error message">
            <p>Please set default addresses!</p>
          </div>'; ?>
            <h2>Info</h2>
            <form class="ui form" action="" method="POST">
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name" value="<?php echo ($costumer->name); ?>">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email" value="<?php echo ($costumer->email); ?>">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="text" name="password" placeholder="Enter new password">
                </div>
                <div class="field">
                    <label>Tax number</label>
                    <input type="number" name="tax_number" placeholder="0000"
                        value="<?php echo ($costumer->tax_number); ?>">
                </div>
                <input hidden value='<?php echo json_encode($costumer); ?>' name="costumer">
                <button class="ui button" type="submit" name="save">Save</button>
            </form>
            <h2>Address</h2>
            <table class="ui celled stripped table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Default</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Hnumber</th>
                        <th>Postal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($costumer->addresses as $address) : ?>

                    <tr>
                        <form action="address.php" method="POST">
                            <td> <?php echo ($address["type"]); ?> </td>
                            <td> <?php echo ($address["def"]); ?> </td>
                            <td> <?php echo ($address["country"]); ?> </td>
                            <td> <?php echo ($address["city"]); ?> </td>
                            <td> <?php echo ($address["street"]); ?> </td>
                            <td> <?php echo ($address["hnumber"]); ?> </td>
                            <td> <?php echo ($address["postal"]); ?> </td>
                            <td>
                                <button class="ui red icon button" type="submit" name="delete">
                                    <i class="trash icon"></i></button>
                                <?php if ($address["def"] == 0) echo '<button class="ui icon yellow button" type="submit" name="default">
                                    <i class="star icon"></i>' ?>
                                </button>
                                <input hidden value='<?php echo json_encode($costumer); ?>' name="costumer">
                                <input hidden value='<?php echo $address["id"]; ?>' name="addressId">
                                <input hidden value='<?php echo $address["typeId"]; ?>' name="addressType">
                            </td>

                        </form>
                    </tr>

                    <?php endforeach; ?>
                    <tr>
                        <form action="address.php" method="POST">
                            <td>
                                <select name="type">
                                    <option value="">Type</option>
                                    <?php foreach ($DB->getTypes() as $type) : ?>
                                    <option value="<?php echo ($type["id"]); ?>"><?php echo ($type["name"]); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td style="width:5%">
                                0
                            </td>
                            <td>
                                <div class="ui input">
                                    <input style="width: 70%;" type="text" name="country" placeholder="Country"
                                        value="">
                                </div>
                            </td>
                            <td>
                                <div class="ui input">
                                    <input style="width: 70%;" type="text" name="city" placeholder="City" value="">
                                </div>
                            </td>
                            <td>
                                <div class="ui input">
                                    <input style="width: 70%;" type="text" name="street" placeholder="Street" value="">
                                </div>
                            </td>
                            <td>
                                <div class="ui input">
                                    <input style="width: 50%;" type="number" min="0" name="hnumber" placeholder="0"
                                        value="">
                                </div>
                            </td>
                            <td>
                                <div class="ui input">
                                    <input style="width: 50%;" type="number" min="0" name="postal" placeholder="0"
                                        value="">
                                </div>
                            </td>
                            <td>
                                <input hidden value='<?php echo json_encode($costumer); ?>' name="costumer">
                                <button class="ui blue icon button" type="submit" name="add">
                                    <i class="plus icon"></i></button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
} else if (isset($_POST['save'])) {
    checkLevel(editLevel);
    $jsonUser = json_decode($_POST['costumer']);
    $costumer = new Costumer($DB, $jsonUser->id, $jsonUser->name, $jsonUser->email, $jsonUser->password, $jsonUser->tax_number);
    $result = $costumer->update($_POST["name"], $_POST["email"], $_POST["password"], $_POST["tax_number"]);
    echo '<div class="ui floating message mcenter">
            <p>Done!</p>
          </div>';
} else if (isset($_POST['delete'])) {
    checkLevel(deleteLevel);
    $jsonUser = json_decode($_POST['costumer']);
    $costumer = new Costumer($DB, $jsonUser->id, $jsonUser->name, $jsonUser->email, $jsonUser->password, $jsonUser->tax_number);
    $result = $costumer->delete();
    echo '<div class="ui floating message mcenter">
            <p>Done!</p>
          </div>';
} else {
    header("Location: costumers.php");
}