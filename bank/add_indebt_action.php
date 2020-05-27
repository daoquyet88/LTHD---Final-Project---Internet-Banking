<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $acno = mysqli_real_escape_string($conn, $_POST["acno"]);

    $id = $_SESSION['loggedIn_cust_id'];
    $sql0 = "SELECT cust_id FROM customer WHERE account_no='".$acno."'";
    $result = $conn->query($sql0);

    $success = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $indebt_id = $row["cust_id"];
        $comment = $row["comment"]; 
        $balance = $row["balance"];

        if ($id != $indebt_id) {
            $sql1 = "INSERT INTO indebt".$id." VALUES(
                        NULL,
                        '$indebt_id',
                        '$acno',
                        '$comment',
                        '$balance'
                        
                    )";

            if (($conn->query($sql1) === TRUE)) {
                $success = 1;
            }
        }
        else {
            $success = -1;
        }
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
                <p id="info"><?php echo "thêm thành công!\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Không tìm thấy !\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Không thể tự thêm mình !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./add_indebt.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>
