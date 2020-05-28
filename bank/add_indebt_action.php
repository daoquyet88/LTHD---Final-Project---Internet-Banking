<?php
    include "validate_customer.php";
    include "header.php";
    include "connect.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $success = 0;
    $owner = mysqli_real_escape_string($conn, $_POST["owner"]);
    $account_no = mysqli_real_escape_string($conn, $_POST["account_no"]);
    $sql = "SELECT cust_id FROM customer WHERE account_no='".$account_no."'";
    $result = $conn->query($sql);
    if (($result->num_rows) > 0) {
        if ($owner == 1) {
            $creditor = $_SESSION['loggedIn_account_no'];
            $debtor = $account_no;
        } else if ($owner == 0) {
            $creditor = $account_no;
            $debtor = $_SESSION['loggedIn_account_no'];
        }
        $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
        $balance = mysqli_real_escape_string($conn, $_POST["balance"]);
    
        $id = $_SESSION['loggedIn_cust_id'];
    
        $sql1 = "INSERT INTO indebt VALUES(
            NULL,
            '$creditor',
            '$debtor',
            '$comment',
            '$balance'
        )";
        
        if (($conn->query($sql1) === TRUE)) {
            $success = 1;
        }
    } else {
        $success = -1;
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
            if ($success == 1) { ?>
                <p id="info"><?php echo "Tạo nhắc nợ thành công!\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Xảy ra lỗi vui lòng thử lại!\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Số tài khoản không tồn tại!\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./manager_indebt.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>