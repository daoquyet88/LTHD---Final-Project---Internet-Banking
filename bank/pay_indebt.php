<?php
    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $success = 0;
    $id = $_SESSION['loggedIn_cust_id'];

    $indebt_id = $_GET['indebt_id'];
    $creditor = $_GET['creditor'];
    $balance = $_GET['balance'];

    $sql = "DELETE FROM indebt WHERE indebt_id='".$indebt_id."'";

    // get his cust_id
    $sql1 = "SELECT cust_id FROM customer WHERE account_no='".$creditor."'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $creditor_id = $row1["cust_id"];

    // get my last balance
    $sql2 = "SELECT balance FROM passbook".$id." WHERE trans_id=(
        SELECT MAX(trans_id) FROM passbook".$id.")";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $my_balance = $row2["balance"] - $balance;

    if ($my_balance > 0) {
        // get his last balance
        $sql3 = "SELECT balance FROM passbook".$creditor_id." WHERE trans_id=(
            SELECT MAX(trans_id) FROM passbook".$creditor_id.")";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();
        $his_balance = $row3["balance"] + $balance;

        // insert my passbook
        $sql4 = "INSERT INTO passbook".$id." VALUES(
                NULL,
                NOW(),
                'Thanh toán nhắc nợ cho tài khoản ".$creditor.".',
                '$balance',
                '0',
                '$my_balance'
            )";

        // insert his passbook
        $sql5 = "INSERT INTO passbook".$creditor_id." VALUES(
                NULL,
                NOW(),
                'Tài khoản ".$_SESSION['loggedIn_account_no']." trả nợ.',
                '0',
                '$balance',
                '$his_balance'
            )";
        
        
        if ((($conn->query($sql) === TRUE)) && (($conn->query($sql4) === TRUE)) && (($conn->query($sql5) === TRUE)))  {
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
                <p id="info"><?php echo "Thanh toán nhắc nợ thành công!\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Xảy ra lỗi vui lòng thử lại!\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Tài khoản không đủ tiền. Vui lòng nạp thêm để thực hiện giao dịch!\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./manager_indebt.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>