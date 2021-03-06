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

    $id = $_SESSION['loggedIn_cust_id'];

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.")";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        // output data of each row
        while($row = $result0->fetch_assoc()) {
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $gender = $row["gender"];
            $dob = $row["dob"];
            $aadhar = $row["aadhar_no"];
            $email = $row["email"];
            $phno = $row["phone_no"];
            $address = $row["address"];
            $branch = $row["branch"];
            $acno = $row["account_no"];
            $pin = $row["pin"];
            $cus_uname = $row["uname"];
            $cus_pwd = $row["pwd"];
            $acc_status = $row["acc_status"];
        }
    }

    if ($result1->num_rows > 0) {
        // output data of each row
        while($row = $result1->fetch_assoc()) {
            $balance = $row["balance"];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="customer_profile_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Thông tin tài khoản</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Họ: <label id="info_label"><?php echo $fname ?></label></label>
            </div>
            <div class=container>
                <label>Tên: <label id="info_label"><?php echo $lname ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số tài khoản: <label id="info_label"><?php echo $acno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số dư (VND): <label id="info_label"><?php echo number_format($balance) ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Giới tính: <label id="info_label">
                    <?php
                        if ($gender == "Nam") {echo "Nam";}
                        elseif ($gender == "Nữ") {echo "Nữ";}
                        else {echo "Khác";}
                    ?>
                    <label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Ngày sinh: <label id="info_label"><?php echo $dob ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số chứng minh thư: <label id="info_label"><?php echo $aadhar ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email: </label><br>
                <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div class=container>
                <label>Tên tài khoản: </label><br>
                <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Số điện thoại: <label id="info_label"><?php echo $phno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Địa chỉ: </label><br>
                <textarea name="address" required /><?php echo $address ?></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Chi nhánh ngân hàng: <label id="info_label">
                        <?php
                            if ($branch == "delhi") {echo "Delhi";}
                            elseif ($branch == "newyork") {echo "New York";}
                            elseif ($branch == "paris") {echo "Paris";}
                            elseif ($branch == "riyadh") {echo "Riyadh";}
                            elseif ($branch == "moscow") {echo "Moscow";}
                        ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Trạng thái tài khoản: </label>
            </div>
            <div class="flex-container-radio">
                <?php if ($acc_status == 1) { ?>
                    <div class="container">
                        <input type="radio" name="acc_status" value="1" id="active" checked>
                        <label id="radio-label" for="active"><span class="radio">Hoạt động</span></label>
                    </div>
                    <div class="container">
                        <input type="radio" name="acc_status" value="0" id="inactive">
                        <label id="radio-label" for="inactive"><span class="radio">Đóng</span></label>
                    </div>
                <?php } else { ?>
                    <div class="container">
                        <input type="radio" name="acc_status" value="1" id="active">
                        <label id="radio-label" for="active"><span class="radio">Hoạt động</span></label>
                    </div>
                    <div class="container">
                        <input type="radio" name="acc_status" value="0" id="inactive" checked>
                        <label id="radio-label" for="inactive"><span class="radio">Đóng</span></label>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="./customer_home.php" class="button">Trang chủ</a>
            </div>
            <div class="container">
                <button type="submit">Cập nhật</button>
            </div>
            <div class="container">
                <a href="./pass_change.php" class="password-button">Đổi mật khẩu / mã PIN</a>
            </div>
        </div>

    </form>

</body>
</html>
