
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

        <div class="flex-container-2">
            <div class="flex-item">
                <button type="submit">Đăng nhập</button>
            </div>

            <div class="flex-item">
                <button type="button" class="cancelbtn" onclick="location.href='./home.php'">Quay về trang chủ</button>
            </div>
        </div>
        <div class="flex-container-2">
            <div class="flex-item">
                <button type="submit">Đăng nhập</button>
            </div>

            <div class="flex-item">
                <button type="button" class="cancelbtn" onclick="location.href='./home.php'">Quay về trang chủ</button>
            </div>
        </div>
        <?php
        $uname = mysqli_real_escape_string($conn, $_POST["admin_uname"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["admin_psw"]);

    $sql0 =  "SELECT * FROM admin WHERE uname='".$uname."' AND pwd='".$pwd."'";
    $result = $conn->query($sql0);

    if (($result->num_rows) > 0) {
        $_SESSION['isAdminValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("location:admin_home.php");
    } else {
        session_destroy();
        die(header("location:admin_login.php?loginFailed=true"));
    }?>
    </form>
    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">
                Xin chào, <?php echo $row0["first_name"] ?>&nbsp<?php echo $row0["last_name"] ?>!
                <br>Số tài khoản: <?php echo $row0["account_no"]; ?>
            </h1>
            <p id="customer">
                &#9656 Số dư (VND): <?php echo number_format($row1["balance"]); ?><br>
                &#9656 Bạn có <?php echo $row2["COUNT(*)"]; ?> thụ hưởng.<br>
                &#9656 Giao dịch cuối cùng của bạn:<br>
                &emsp;<?php echo $type; ?>: <?php echo number_format($transaction); ?> VND<br>
                &emsp;Thời gian: <?php echo $sanitized_time; ?><br>
                &emsp;<?php echo $row1["remarks"]; ?>.
            </p><?php
            if (($result->num_rows) > 0) {
        $_SESSION['isAdminValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("location:admin_home.php");
    } else {
        session_destroy();
        die(header("location:admin_login.php?loginFailed=true"));
    }?>
            <p id="customer">
                &#9656 Số dư (VND): <?php echo number_format($row1["balance"]); ?><br>
                &#9656 Bạn có <?php echo $row2["COUNT(*)"]; ?> thụ hưởng.<br>
                &#9656 Giao dịch cuối cùng của bạn:<br>
                &emsp;<?php echo $type; ?>: <?php echo number_format($transaction); ?> VND<br>
                &emsp;Thời gian: <?php echo $sanitized_time; ?><br>
                &emsp;<?php echo $row1["remarks"]; ?>.
            </p>
            <p id="customer">
                &#9656 Số dư (VND): <?php echo number_format($row1["balance"]); ?><br>
                &#9656 Bạn có <?php echo $row2["COUNT(*)"]; ?> thụ hưởng.<br>
                &#9656 Giao dịch cuối cùng của bạn:<br>
                &emsp;<?php echo $type; ?>: <?php echo number_format($transaction); ?> VND<br>
                &emsp;Thời gian: <?php echo $sanitized_time; ?><br>
                &emsp;<?php echo $row1["remarks"]; ?>.
            </p><?php
        </div>
    </div>
</body>
</html>
