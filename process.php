<?php include_once 'chocolates.php'; ?>
<?php include_once 'algorithm.php'; ?>
<?php session_start(); ?>

<?php

    $one = generate_password($password);
    
    print_r($one);
?>
