<?php
//require "toast.php";
require '../header.php';
require '../footer.php';
require '../styles.php';
require '../scripts.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <?php echo $s_sub ?>
    <?php echo $sc_sub ?>
</head>

<body class="text-center">
    <?php echo $sub ?>

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
        //$BTitle = $_POST['BTitle'];
        //$BCategory = $_POST['BCategory'];
        //$BDesc = $_POST['BDesc'];
        $BUrl = $_POST['url-input'] . '.php';
        //$insert = $_POST['Insert'];
        $form = $_POST['edit-form'];


        /* function purify($insert) {
        $insert = trim($insert);
        $insert = stripslashes($insert);
        $insert = htmlspecialchars($insert);
        return $insert;
    } */

        //$sql = "insert into blog (BTitle,BCategory,BDesc,BUrl) VALUES ('$BTitle','$BCategory','$BDesc','$BUrl')";

        if (mysqli_query($conn, $sql)) {
            $file = fopen($fileurl . '.php', "w") or die('Error');
            fwrite($file, $form);
            fclose($file);
            header('Location:' . $_SERVER['PHP_SELF'] . '');
            exit();
        }
        mysqli_close($conn);
    }

?>

<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
        class="form-signin justify-content-center">
        <input type="text" name="url-input" id="" placeholder="name Of the article to be edited">
        <div id="editor" name="edit-form"></div>
        <input type="submit" value="Submit" name="Insert" />
    </form> -->

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
        class="form-signin justify-content-center">
        <input type="text" name="url-input" id="" placeholder="Name of the article" class="form-control-md" >
        <hr />
        <div id="editor" name="edit-form"></div>
        <input type="submit" value="Submit" name="Insert" />
    </form>

    <script src="ckeditor.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
    </script>
    <?php echo $f_sub ?>
</body>

</html>