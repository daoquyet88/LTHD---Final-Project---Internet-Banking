<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $url = 'http://118.69.190.28:5000/authorize';
    $email = $row["email"];
    $data = array('email' => $email , 'Authorize' => $_POST["OTP"]);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        )
    );
    $context  = stream_context_create($options);
    $verifiedOTP = file_get_contents($url, false, $context);

    /*  Set appropriate error number if errors are encountered.
        Key (for err_no) :
        -1 = Connection Error.
         0 = Successful Transaction.
         1 = Insufficient Funds.
         2 = Wrong password entered. */
    if ($verifiedOTP == "1") {
        $err_no = -1;

        if (isset($_GET['cust_id'])) {
            $receiver_id = $_GET['cust_id'];
        }

        $sender_id = $_SESSION['loggedIn_cust_id'];
        $amt = mysqli_real_escape_string($conn, $_POST["amt"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $sql0 = "SELECT * FROM customer WHERE cust_id=".$sender_id." AND pwd='".$password."'";
        $result0 = $conn->query($sql0);
        $row0 = $result0->fetch_assoc();

        $sql5 = "SELECT * FROM customer WHERE cust_id=".$receiver_id;
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        if (($result0->num_rows) > 0) {
            $sql1 = "SELECT balance FROM passbook".$sender_id." ORDER BY trans_id DESC LIMIT 1";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            $sender_balance = $row1["balance"];

            $updated_sender_balance = $sender_balance - $amt;
            if($updated_sender_balance >= 0) {
                $sql2 = "SELECT balance FROM passbook".$receiver_id." ORDER BY trans_id DESC LIMIT 1";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $receiver_balance = $row2["balance"];

                $updated_receiver_balance = $receiver_balance + $amt;

                $sql3 = "INSERT INTO passbook".$sender_id." VALUES(
                            NULL,
                            NOW(),
                            'Gửi tới: ".$row5["first_name"]." ".$row5["last_name"].", Số tài khoản: ".$row5["account_no"]."',
                            '$amt',
                            '0',
                            '$updated_sender_balance'
                        )";

                $sql4 = "INSERT INTO passbook".$receiver_id." VALUES(
                            NULL,
                            NOW(),
                            'Nhận từ: ".$row0["first_name"]." ".$row0["last_name"].", Số tài khoản: ".$row0["account_no"]."',
                            '0',
                            '$amt',
                            '$updated_receiver_balance'
                        )";

                if (($conn->query($sql3) === TRUE) && ($conn->query($sql4) === TRUE)) {
                    $err_no = 0;
                }
            }
            else {
                $err_no = 1;
            }
        }
        else {
            $err_no = 2;
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
            <?php if ($verifiedOTP == "1") {?>
                <?php if ($err_no == -1) { ?>
                    <p id="info"><?php echo "Lỗi kết nối! Vui lòng thử lại.\n"; ?></p>
                <?php } ?>

                <?php if ($err_no == 0) { ?>
                    <p id="info"><?php echo "Chuyển khoản thành công!\n"; ?></p>
                <?php } ?>

                <?php if ($err_no == 1) { ?>
                    <p id="info"><?php echo "Tài khoản không đủ!\n"; ?></p>
                <?php } ?>

                <?php if ($err_no == 2) { ?>
                    <p id="info"><?php echo "Nhập sai mật khẩu!\n"; ?></p>
                <?php } ?>
            <?php } else if ($verifiedOTP == "0") {?>
                <p id="info"><?php echo "Nhập sai mã OTP sai!\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Trở về</a>
        </div>
    </div>

</body>
</html>
