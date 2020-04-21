<?php
    include "header.php";
    include "navbar.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Thông tin không hợp lệ! Vui lòng thử lại.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html>
<script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home_style.css">
</head>

<body>
    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">Ngân hàng của bạn.</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
                <form action="customer_login_action.php" method="post" onsubmit="return CheckingCaptcha()">
                    <div class="flex-item-login" style="text-align: center;">
                        <h2>Chào mừng khách hàng</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="cust_uname" placeholder=" Tài khoản" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" name="cust_psw" placeholder=" Mật khẩu" required>
                    </div>

                    <div class="g-recaptcha" data-sitekey='6LfJDeoUAAAAAEssrVanyIBmz_0IHPwq1ldGsvmn' style="display: flex; justify-content: center;"></div>

                    <div class="flex-item" style="display: flex; justify-content: center;">
                        <button type="submit">Đăng nhập</button>
                    </div>
                </form>

                <script type="text/javascript">
                    function CheckingCaptcha() {
                        if(grecaptcha && grecaptcha.getResponse().length > 0) {
                            return true;
                        } else {
                            alert('Bạn chưa xác minh recaptcha.');
                            return false;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html>

<?php include "easter_egg.php"; ?>
