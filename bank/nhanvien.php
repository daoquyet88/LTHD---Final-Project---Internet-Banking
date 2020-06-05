
<?php
    include "header.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Thông tin không hợp lệ! Vui lòng thử lại.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>