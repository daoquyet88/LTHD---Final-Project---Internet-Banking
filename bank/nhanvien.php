
<?php
    include "header.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Thông tin không hợp lệ! Vui lòng thử lại.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/admin_login_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <form action="admin_login_action.php" method="post">
        <div class="flex-container-1">
            <div class="flex-item">
                <h2>Đăng nhập quản trị viên</h2>
            </div>

            <label><b>Tài khoản</b></label>
            <div class="flex-item">
                <input type="text" name="admin_uname" required>
            </div>

            <label><b>Mật khẩu</b></label>
            <div class="flex-item">
                <input type="password" name="admin_psw" required>
            </div>
        </div>

       
    </form>
</body>
</html>
