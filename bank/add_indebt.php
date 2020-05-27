<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="add_indebt_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Tạo nhắc nợ</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Chủ nợ:</label>
            </div>
            <div class="flex-container-radio">
                <div class="container">
                    <input type="radio" name="owner" value="1" id="debit-radio" checked>
                    <label id="radio-label" for="debit-radio"><span class="radio">Bản thân</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="owner" value="0" id="credit-radio">
                    <label id="radio-label" for="credit-radio"><span class="radio">Người khác</span></label>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số tài khoản:</label><br>
                <input name="account_no" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Nhập số tiền (VND):</label><br>
                <input name="balance" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Ghi chú:</label><br>
                <input name="comment" size="24" type="text" />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="./manager_indebt.php" class="button">Trở về</a>
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
