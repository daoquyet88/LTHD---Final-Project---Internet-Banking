<?php
    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    if (isset($_SESSION['loggedIn_cust_id'])) {
        $id = $_SESSION['loggedIn_cust_id'];
        $account_no = $_SESSION['loggedIn_account_no'];
    }

    $sql = "SELECT * FROM indebt WHERE creditor='".$account_no."' OR debtor='".$account_no."'";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/manage_customers_style.css">
</head>

<body>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">
                <a class="add-button" href="./add_indebt.php">Tạo nhắc nợ</a>
            </div>
        </div>
    </div>

    <div class="flex-container">
        <p id="info">Tạo, thanh toán và hủy nhắc nợ.</p>
        <?php
            $result = $conn->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $i++;
                ?>
                    <div class="flex-item">
                        <div class="flex-item-1">
                            <p id="id"><?php echo $i . "."; ?></p>
                        </div>

                        <div class="flex-item-2">
                            <?php if($row["creditor"] == $account_no) {?>
                                <p id="name"><?php echo "Tài khoản: " .$row["debtor"]. " nợ bạn."; ?></p>
                            <?php } else if($row["debtor"] == $account_no) {?>
                                <p id="name"><?php echo "Bạn nợ tài khoản: " .$row["creditor"]. "."; ?></p>
                            <?php } ?>
                            <p id="acno"><?php echo "Số tiền: " .number_format($row["balance"]). "VND"; ?></p>
                        </div>

                        <div class="flex-item-1">
                            <div class="dropdown">
                                <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                                <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                                    <?php if($row["creditor"] == $account_no) {?>
                                        <a href="./delete_indebt.php ?> " onclick="return confirm('Bạn chắc chứ?')">Hủy nhắc nợ</a>
                                    <?php } else if($row["debtor"] == $account_no) {?>
                                        <a href="./pay_indebt.php ?> " >Thanh toán</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }}

            if ($i == 0) { ?>
                <p id="none">Không có nhắc nợ.</p>
            <?php }
            $conn->close(); ?>
    </div>

    <script>
    function dropdown_func(i) {
        var doc_id = "dropdown".concat(i.toString());

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        // Close any menus, if opened, before opening a new one
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
        }

        document.getElementById(doc_id).classList.toggle("show");
        return false;
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>
</body>
</html>