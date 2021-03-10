<?php

/** 
 * @author David Gold <opensc306@gmail.com>
 * 
 * @version 1.0
 * 
 * @link http://opensc.cf
 * 
 */
?>
<?php
require "toast.php";
require 'header.php';
require 'footer.php';
require 'styles.php';
require 'scripts.php';
?>
<?php
$hostname = "localhost";
$dbname = "blogdb";
$username = "blogcntroot";
$password = "2118312904444";




$conn = mysqli_connect("$hostname", "$username", "$password", "$dbname");

if (!$conn) {
    die("$c_err");
}

if (isset($_POST['Insert'])) {
    $BTitle = $_POST['BTitle'];
    $BCategory = $_POST['BCategory'];
    $BDesc = $_POST['BDesc'];
    $BUrl = $_POST['BUrl'] . '.php';
    $fileurl = $_POST['BUrl'];
    //$insert = $_POST['Insert'];

    /* function purify($insert) {
        $insert = trim($insert);
        $insert = stripslashes($insert);
        $insert = htmlspecialchars($insert);
        return $insert;
    } */

    $sql = "insert into blog (BTitle,BCategory,BDesc,BUrl) VALUES ('$BTitle','$BCategory','$BDesc','$BUrl')";

    if (mysqli_query($conn, $sql)) {
        $file = fopen($fileurl . '.php', "w") or die('Error');
        fwrite($file, $fileurl);
        fclose($file);
        header('Location:' . $_SERVER['PHP_SELF'] . '');
        exit();
    }
    mysqli_close($conn);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php echo $s_main ?>
    <?php echo $sc_main ?>
</head>

<body>
    <?php echo $main ?>
    <form method="POST" class="form-control">
        <center>
            <h3>Admin Panel..</h3><br>
            <h1>Post Blog Details</h1>
            <hr />
            <table border="1" class="table table-hover table-responsive">
                <tr>
                    <td>Categories</td>
                    <td><select name="BCategory" required>
                            <option value="" selected disabled>-- Select Categories --</option>
                            <option value="food">food</option>
                            <option value="movies">movies</option>
                            <option value="travel">travel</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Blog Title</td>
                    <td><input type="text" placeholder="Blog Title ..." name="BTitle" id="" required></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="BDesc" placeholder="Blog Description ... " cols="30" rows="10" class=""
                            required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Url</td>
                    <td>
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">/articles/</div>
                                </div>
                                <input type="text" name="BUrl" placeholder="Article Url"
                                    title="Only Numbers and Letters Allowed" required>
                            </div>
                    </td>

                </tr>
            </table>
            <input type="submit" value="Submit" name="Insert" />
        </center>
    </form>
    <?php echo $f_main ?>
</body>

</html>