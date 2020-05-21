<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    if (isset($_GET['cust_id'])) {
        $id = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
?>

<?php
    $url = 'http://118.69.190.28:5000/send-email';
    $email = $row["email"];
    $data = array('to_email' => $email);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="send_funds_action.php?cust_id=<?php echo $id ?>" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Chuyển khoản</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>
                    Tới: <label id="info_label">
                        <?php echo $row0["first_name"]." ".$row0["last_name"] ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số tài khoản: <label id="info_label"><?php echo $row0["account_no"] ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Nhập số tiền (VND): </label><br>
                <input name="amt" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Nhập mật khẩu: </b></label><br>
                <input name="password" size="24" type="password" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Nhập mã OTP (Kiểm tra email): </b></label><br>
                <input name="OTP" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="./beneficiary.php" class="button">Trở về</a>
            </div>

            <div class="container">
                <button type="submit">Đồng ý</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Đặt lại</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Bạn thực sự muốn đặt lại?')
    }
    </script>

</body>
</html>
