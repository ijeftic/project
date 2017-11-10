<html>
    <head>
        <meta charset="windows-1252">
        <title>Project</title>
        <!-- Latest compiled and minified CSS -->
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- style.css -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include_once('includes/navigation.php') ?>
<?php

require_once('models/User.php');
require_once('backend/db_connection.php');

session_start();

$user = array_key_exists('user', $_SESSION);

if(!$user) {
    include('login.php');
    die();
} else {
    $user = $_SESSION['user'];
    $term = $_GET['term'];
    if($term!="") {
        $query = "SELECT * FROM users WHERE name LIKE '%$term%' OR email LIKE '%$term%'";
        $result = mysqli_query($mysqli, $query);
        
        if(mysqli_num_rows($result) == 0) {
            ?>
                <div class="container">
                    <div class="row">
                        <h3 class="col-md-12">No search results found for: <?= $term; ?></h3>
                    </div>
                </div>
            <?php
                } else {
            ?>
                <div class="container">
                    <div class="row">
                        <h3 class="col-md-12">Search results for: <?= $term; ?></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <table class="table table-responsive table-bordered" border="1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($user = mysqli_fetch_object($result)) { ?>
                                    <tr>
                                        <td><?= $user->name; ?></td>
                                        <td><?= $user->email; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
}
?>
    </body>
</html>