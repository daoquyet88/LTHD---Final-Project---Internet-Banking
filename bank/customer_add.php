<?php
    include "validate_admin.php";
    include "header.php";
    include "user_navbar.php";
    include "staff_sidebar.php";
    include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="customer_add_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Vui lòng điền vào các chi tiết sau đây</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Họ: </label><br>
                <input name="fname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Tên: </b></label><br>
                <input name="lname" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Giới tính: </label>
            </div>
            <div class="flex-container-radio">
                <div class="container">
                    <input type="radio" name="gender" value="Nam" id="male-radio" checked>
                    <label id="radio-label" for="male-radio"><span class="radio">Nam</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gender" value="Nữ" id="female-radio">
                    <label id="radio-label" for="female-radio"><span class="radio">Nữ</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gender" value="Khác" id="other-radio">
                    <label id="radio-label" for="other-radio"><span class="radio">Khác</span></label>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Ngày sinh: </label><br>
                <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số chứng minh thư: </label><br>
                <input name="aadhar" size="25" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email: </label><br>
                <input name="email" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Số điện thoại: </b></label><br>
                <input name="phno" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Địa chỉ: </label><br>
                <textarea name="address" required /></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Chi nhánh ngân hàng: </label>
            </div>
            <div  class=container>
                <select name="branch">
                    <option value="delhi" selected="selected">Delhi</option>
                    <option value="newyork">New York</option>
                    <option value="paris">Paris</option>
                    <option value="riyadh">Riyadh</option>
                    <option value="moscow">Moscow</option>
                </select>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số tài khoản: </label><br>
                <input name="acno" size="25" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Số dư đầu kỳ: </label><br>
                <input name="o_balance" size="20" type="text" required />
            </div>
            <div  class=container>
                <label>Mã PIN (4 số): </b></label><br>
                <input name="pin" size="15" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Tài khoản: </label><br>
                <input name="cus_uname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Mật khẩu: </b></label><br>
                <input name="cus_pwd" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
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
