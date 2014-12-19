<?php if (!isset($_GET['id']) or $_GET != 0) {
    header('location: index.php');
}
require('Components/config.php');
$id = $_GET['id'];
$query = "DELETE FROM subjects where id= {$id}";
$result = mysqli_query($connection, $query);

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2; url=index.php/">
        <title>Document</title>
        <style>
            .notice {
                color:green;
            }
            .error {
                color: red;
            }
        </style>
    </head>

    <body>
    <?php if ($result && mysqli_affected_rows($connection)) { ?>
        <p class="notice"><?php echo "kust"; ?></p>
    <?php } else { ?>
        <p class="error"><?php echo "ei ole"; ?></p>
    <?php } ?>

    </body>
    </html>

<?php mysqli_close($connection);?>