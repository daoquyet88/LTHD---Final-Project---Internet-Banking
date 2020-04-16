<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    /*  Set appropriate error number if errors are encountered.
        Key (for err_no) :
        -1 = Connection Error.
         0 = Successful Change.
         1 = Old password is incorrect.
         2 = Passwords do not match.
         3 = Old and new passwords are same. */
    $err_no = -1;

    $id = $_SESSION['loggedIn_cust_id'];
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $old_pwd = mysqli_real_escape_string($conn, $_POST["old_pwd"]);
    $new_pwd = mysqli_real_escape_string($conn, $_POST["new_pwd"]);
    $check_pwd = mysqli_real_escape_string($conn, $_POST["check_pwd"]);

    if ($type == "password") {
        $sql0 = "SELECT * FROM customer WHERE cust_id=".$id." AND pwd='".$old_pwd."'";
        $info_string = "Password";
    }

    if ($type == "pin") {
        $sql0 = "SELECT * FROM customer WHERE cust_id=".$id." AND pin='".$old_pwd."'";
        $info_string = "PIN";
    }

    $result0 = $conn->query($sql0);
    if (($result0->num_rows) > 0) {
        if ($new_pwd == $check_pwd) {
            if ($new_pwd != $old_pwd) {
                if ($type == "password") {
                    $sql1 = "UPDATE customer SET pwd = '$new_pwd' WHERE cust_id=".$id;
                }
                if ($type == "pin") {
                    $sql1 = "UPDATE customer SET pin = '$new_pwd' WHERE cust_id=".$id;
                }
                if (($conn->query($sql1) === TRUE)) {
                    $err_no = 0;
                }
            }
            else {
                $err_no = 3;
            }
        }
        else {
            $err_no = 2;
        }
    }
    else {
        $err_no = 1;
    }
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
            <?php
            if ($err_no == -1) { ?>
                <p id="info"><?php echo "Lỗi kết nối! Vui lòng thử lại. \n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 0) { ?>
                <p id="info"><?php echo $info_string."Thay đổi thành công!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info"><?php echo "Mật khẩu cũ không chính xác !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 2) { ?>
                <p id="info"><?php echo "Mật khẩu không trùng khớp!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 3) { ?>
                <p id="info"><?php echo "Mật khẩu cũ và mới giống nhau!\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./customer_profile.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>
