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

    if (isset($_GET['cust_id'])) {
        $sql0 = "DELETE FROM indebt".$_SESSION['loggedIn_cust_id'].
                " WHERE owner=".$_GET['cust_id'];
    }

    $success = 0;
    if (($conn->query($sql0) === TRUE)) {
        $sql0 = "SELECT MAX(indebt_id) FROM indebt".$_SESSION['loggedIn_cust_id'];
        $result = $conn->query($sql0);
        $row = $result->fetch_assoc();

        $id = $row["MAX(indebt_id)"] + 1;
        $sql1 = "ALTER TABLE indebt".$_SESSION['loggedIn_cust_id']." AUTO_INCREMENT=".$id;

        $conn->query($sql1);
        $success = 1;
    }

    if (isset($_GET['redirect'])) {
        $_SESSION['auto_delete_benef'] = true;
        header("location:./manager_indebt.php");
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
                    if ($success = 1) { ?>
                        <p id="info"><?php echo "Xóa nhắc nợ thành công!"; ?></p>
                    <?php
                    }
                    else { ?>
                        <p id="info"><?php echo "Lỗi: " . $conn->error . "<br>"; ?></p>
                    <?php
                    }
                ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./manager_indebt.php" class="button">Trở về</a>
        </div>

    </div>

</body>
</html>
