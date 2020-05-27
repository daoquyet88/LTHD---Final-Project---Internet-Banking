<?php
    include "validate_admin.php";
    include "connect.php";
    include "header.php";
    include "user_navbar.php";
    include "staff_sidebar.php";
    include "session_timeout.php";

    $err_no = 0;
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $balance = mysqli_real_escape_string($conn, $_POST["balance"]);
    $credit = mysqli_real_escape_string($conn, $_POST["credit"]);
    $newBalance = $balance + $credit;

    $sql1 = "INSERT INTO passbook".$id." VALUES(
                NULL,
                NOW(),
            'Nạp tiền',
            '0',
            '$credit',
            '$newBalance'
    )";
    if (($conn->query($sql1) === TRUE)) {
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
            if ($err_no == 0) { ?>
                <p id="info"><?php echo "Xảy ra lỗi vui lòng thử lại!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info"><?php echo "Giao dịch thành công!\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./manage_customers.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>