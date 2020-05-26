<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_admin.php";
    include "connect.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";

    $sql0 = "SELECT * FROM staff";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/transactions_style.css">
</head>

<body>
    <div class="flex-container">
        <?php
            $result = $conn->query($sql0);
            if ($result->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                    </tr>
        <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row["first_name"] ?>&nbsp<?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td>
                        <?php
                            $time = strtotime($row["dob"]);
                            $sanitized_time = date("d/m/Y", $time);
                            echo $sanitized_time;
                            ?>
                    </td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone_no"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                </tr>
            <?php } ?>
                </table>
            <?php } else { ?>
                <p id="none">Không có kết quả tìm kiếm</p>
            <?php }
            $conn->close(); ?>
    </div>
</body>
</html>
