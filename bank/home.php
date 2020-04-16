<?php
if(isset($_POST['submit'])){
   $cust_uname;
   $captcha;
   if(isset($_POST['cust_uname'])){
      $cust_uname = $_POST['cust_uname'];
   }
   if(isset($_POST['g-recaptcha-response'])){
      $captcha = $_POST['g-recaptcha-response'];
   }
   if(!$captcha){
      echo '<h2>Hay xac nhan CAPTCHA</h2>';
   }else{
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfJDeoUAAAAAEx_BIbMR75oMfxJMf8kA5EuS15L&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
      if($response.success == false){
         echo '<h2>SPAM!</h2>';
      }else{
         echo '<h2>'.$name.' Khong phai robot :)</h2>';
      }
   }
}
?>

<?php
    include "header.php";
    include "navbar.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
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
                <form action="customer_login_action.php" method="post">
                    <div class="flex-item-login" style="text-align: center;">
                        <h2>Chào mừng khách hàng</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="cust_uname" placeholder=" Tài khoản" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" name="cust_psw" placeholder=" Mật khẩu" required>
                    </div>

                    <div class="g-recaptcha" data-sitekey='6LfJDeoUAAAAAEssrVanyIBmz_0IHPwq1ldGsvmn'></div>

                    <div class="flex-item" style="display: flex;
                                                justify-content: center;"  >
                        <button type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php include "easter_egg.php"; ?>
