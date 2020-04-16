<?php
    include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/session_expired_style.css">
</head>


<body>
    <div class="flex-container">
        <div class="flex-item">
            <img id="session" src="./images/hourglass.png">
        </div>
        <div class="flex-item-message">
            <h1 id="session">Phiên đăng nhập hết hạn!</h1>
            <p id="session">
                Vì lý do bảo mật nếu tài khoản của bạn không hoạt động để biết thêm
                hơn 5 phút, bạn sẽ tự động đăng xuất.<br><br>
                Vui lòng đăng nhập lại.
            </p>
        </div>
        <div class="flex-item">
            <a href="./home.php" class="button">Trang chủ</a>
        </div>
    </div>

</body>
</html>
