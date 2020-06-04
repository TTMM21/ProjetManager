
<?php
    //disconncet session
    session_start();
    session_destroy();
    header('Location: ..\Vue\login.php');
    exit();
?>