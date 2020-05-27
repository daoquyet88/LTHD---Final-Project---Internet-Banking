<?php
    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $success = 0;

    $indebt_id = $_GET['indebt_id'];
    $my_id = $_GET['my_id'];
    $acc_id = $_GET['acc_id'];

    echo $indebt_id;
    echo $my_id;
    echo $acc_id;
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
                <p id="info"><?php echo "Hủy nhắc nợ thành công!\n"; ?></p>
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