<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $acno = mysqli_real_escape_string($conn, $_POST["acno"]);

    $id = $_SESSION['loggedIn_cust_id'];
    $sql0 = "SELECT cust_id, email, phone_no FROM customer WHERE account_no='".$acno."'";
    $result = $conn->query($sql0);

    $success = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $beneficiary_id = $row["cust_id"];
        $email = $row["email"]; 
        $phno = $row["phone_no"];

        if ($id != $beneficiary_id) {
            $sql1 = "INSERT INTO beneficiary".$id." VALUES(
                        NULL,
                        '$beneficiary_id',
                        '$email',
                        '$phno',
                        '$acno'
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
                <p id="info"><?php echo "Người thụ hưởng thêm thành công!\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Không tìm thấy người thụ hưởng!\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Không thể tự thêm mình là người thụ hưởng!\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./add_beneficiary.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>
