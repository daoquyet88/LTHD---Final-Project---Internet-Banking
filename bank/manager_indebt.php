<?php
    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    if (isset($_SESSION['loggedIn_cust_id'])) {
        $id = $_SESSION['loggedIn_cust_id'];
    }

    $sql = "SELECT * FROM indebt".$id;
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

            if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++;
                ?>
                    <div class="flex-item">
                        <div class="flex-item-1">
                            <p id="id"><?php echo $i . "."; ?></p>
                        </div>

                        <div class="flex-item-2">
                            <?php if($row["owner"] == 1) {?>
                                <p id="name"><?php echo "Tài khoản: " .$row["account_no"]. " nợ bạn."; ?></p>
                            <?php } else if($row["owner"] == 0) {?>
                                <p id="name"><?php echo "Bạn nợ tài khoản: " .$row["account_no"]. "."; ?></p>
                            <?php } ?>
                            <p id="acno"><?php echo "Số tiền: " .number_format($row["balance"]). "VND"; ?></p>
                        </div>

                        <div class="flex-item-1">
                            <div class="dropdown">
                                <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                                <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                                    <!--Pass the customer trans_id as a get variable in the link-->
                                    <a href="./send_funds.php?cust_id=<?php echo $row1["cust_id"] ?>">Gửi</a>
                                    <a href="./delete_beneficiary.php?cust_id=<?php echo $row1["cust_id"] ?>"
                                        onclick="return confirm('Bạn chắc chứ?')">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }}

            if ($i == 0) { ?>
                <p id="none">Không tìm thấy người thụ hưởng</p>
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