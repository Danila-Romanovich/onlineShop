<?php
    require('connection.php');
    require('orderFacade.php');
    
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $facade->addToCart($id);
        header('Location: index.php');
    } 

    header('Location: index.php');

?>