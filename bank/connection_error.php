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
            <img id="session" src="/images/error.png">
        </div>
        <div class="flex-item-message">
            <h1 id="session-sub">Uh-Oh !</h1>
            <p id="session-sub">
                Lỗi kết nối dữ liệu!<br>
            </p>
            <p id="session">
                <b>Lỗi: </b>
                <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                ?><br><br>
                Đảm bảo rằng thông tin đăng nhập cơ sở dữ liệu là chính xác
                và / hoặc máy chủ được thiết lập đúng / phản hồi.<br><br>
                Vui lòng thử lại sau một thời gian.
            </p>
        </div>
        <div class="flex-item">
            <a href="./home.php" class="button">Trang chủ</a>
        </div>
    </div>

</body>
</html>
