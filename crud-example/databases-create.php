<?php
require('Components/config.php');
if (isset($_POST['submit'])) {
    $menu_name = $_POST['menu_name'];
    $position = $_POST['position'];
    $visible = $_POST['visible'];
    $query = "INSERT INTO subjects (menu_name, position, visible)
            VALUES ('{$menu_name}', {$position}, {$visible})";
    $result = mysqli_query($connection, $query);
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php if (isset($_POST['submit'])) { ?>
            <meta http-equiv="refresh" content="2; url=index.php/">
        <?php  } ?>
        <title>Document</title>
        <style>
            .form-field {
                margin-top: 25px;
            }
            .form-label {
                display: block;
            }
        </style>
    </head>
    <body>
    <?php
    if (isset($_POST['submit'])){
        if ($result) {
            echo "ok";
        } else {
            echo "not";
        }
    }
    ?>
    <?php if (!isset($_POST['submit'])) { ?>
        <form action="databases-create.php" method="post">
            <div class="form-field">
                <label for="menu_name" class="form-label">Title</label>
                <input id="menu_name" name="menu_name">
            </div>
            <div class="form-field">
                <label for="position" class="form-label">Position</label>
                <select id="position" name="position">
                    <?php for($i = 1; $i < 16; $i++){ ?>
                        <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-field">
                <label for="visible" class="form-label">Visibility</label>
                <select id="visible" name="visible">
                    <option value="1">Visible</option>
                    <option value="0">Hidden</option>
                </select>
            </div>
            <div class="form-field">
                <input name="submit" type="submit">
            </div>
        </form>
        <a href="index.php">Back</a>
    <?php } ?>
    </body>
    </html>

<?php mysqli_close($connection);?>