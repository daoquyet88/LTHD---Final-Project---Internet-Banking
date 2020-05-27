<?php
    include "validate_admin.php";
    include "connect.php";
    include "header.php";
    include "user_navbar.php";
    include "staff_sidebar.php";
    include "session_timeout.php";

    if (isset($_GET['cust_id'])) {
        $id = $_GET['cust_id'];
    }

    $sql = "SELECT * FROM customer WHERE cust_id=".$id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
        SELECT MAX(trans_id) FROM passbook".$id.")";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer_add_style.css">
</head>

<body>
<form class="add_customer_form" action="deposit_account_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Nạp tiền tài khoản</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Họ: <label id="info_label"><?php echo $row["first_name"] ?></label></label>
            </div>
            <div class=container>
                <label>Tên: <label id="info_label"><?php echo $row["last_name"] ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số tài khoản: <label id="info_label"><?php echo $row["account_no"] ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số dư (VND): <label id="info_label"><?php echo number_format($row1["balance"]) ?></label></label>
            </div>
        </div>

        <input type='hidden' name='id' value='<?php echo $id ?>' />
        <input type='hidden' name='balance' value='<?php echo $row1["balance"] ?>' />

        <div class="flex-container">
            <div class=container>
                <label>Nhập số tiền muốn nạp (VND): </label><br>
                <input name="credit" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <button type="submit">Nạp tiền</button>
            </div>
        </div>

    </form>
</body>
</html>
