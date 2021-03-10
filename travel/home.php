<?php require '../header.php'; ?>
<?php require '../styles.php'; ?>
<?php require '../footer.php'; ?>
<html>

<head>
    <?php
    echo $s_sub;
    ?>
</head>

<body>
    <?php echo $sub; ?>
    <center>
        <div class="container">
            <div class="row no-gutters">
                <div><?php require 'articles.php';?></div>

            </div>
        </div>
    </center>
    <div><?php echo $f_sub ?></div>
</body>

</html>