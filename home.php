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
<?php require 'header.php'; ?>
<?php require 'footer.php'; ?>
<?php require 'styles.php'; ?>
<?php require 'scripts.php'; ?>

<html>

<head>
    <?php echo $s_main ?>
    <?php echo $sc_main ?>
</head>

<body>
    <?php echo $main ?>
    <center>
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-sm-6 col-md-10"><?php require 'content.php'; ?></div>
            </div>
        </div>
        <?php echo $f_main;?>
</body>

</html>