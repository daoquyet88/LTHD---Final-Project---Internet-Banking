<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $_SESSION['auto_delete_benef'] = false;
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <p id="info" style="font-size:36px;">
                <b>Một hoặc nhiều người thụ hưởng của bạn đã bị xóa!</b><br>
            </p>
        </div>

        <div class="flex-item">
            <p id="info" style="margin-top:-40px;">
                <br>Vì lý do bảo mật nếu chi tiết nhạy cảm của người thụ hưởng của bạn như
                Số điện thoại, số tài khoản, ID email, v.v. đã được thay đổi <b> hoặc </b> nếu
                người thụ hưởng không còn tồn tại, họ sẽ bị xóa khỏi danh sách của bạn
                người thụ hưởng tự động.<br><br>
                Vui lòng thêm chi tiết thụ hưởng một lần nữa.
            </p>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Đi đến chuyển tiền</a>
        </div>

    </div>

</body>
</html>
