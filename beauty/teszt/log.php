<?php

session_start();
include('./header.php');
checkSession();
$logs = $DB->getLog();
?>

<div class="ui centered grid">
    <div class="row">
        <div class="eleven wide computer only fourteen wide mobile tablet only column">
            <h2>Log</h2>
            <table class="ui celled stripped table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Event</th>
                        <th>Datetime</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logs as $log) :  ?>

                    <tr>

                        <td> <?php echo ($log["costumer"]); ?> </td>
                        <td> <?php echo ($log["event"]); ?> </td>
                        <td> <?php echo ($log["dt"]); ?> </td>
                        <td> <?php echo ($log["comment"]); ?> </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>