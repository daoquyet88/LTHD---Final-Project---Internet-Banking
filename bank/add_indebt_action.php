<?php
    include "validate_customer.php";
    include "header.php";
    include "connect.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $owner = mysqli_real_escape_string($conn, $_POST["owner"]);
    $account_no = mysqli_real_escape_string($conn, $_POST["account_no"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $balance = mysqli_real_escape_string($conn, $_POST["balance"]);

    $id = $_SESSION['loggedIn_cust_id'];

    $success = 0;
    $sql1 = "INSERT INTO indebt".$id." VALUES(
        NULL,
        '$owner',
        '$account_no',
        '$comment',
        '$balance'
    )";
    if (($conn->query($sql1) === TRUE)) {
        $success = 1;
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
        </div>

        <div class="flex-item">
            <a href="./manager_indebt.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>
