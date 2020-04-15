<?php
    include "validate_admin.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_home_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">
                Welcome Admin !
            </h1>
            <p id="customer" style="max-width:800px">
                Từ đây bạn có thể quản lý tất cả các cài đặt Internet Banking cốt lõi.  Bạn có thể thêm / quản lý khách hàng, xem giao dịch của họ, chỉnh sửa chi tiết của họ và thậm chí xóa họ.  Bạn cũng có thể đăng tin tức trên trang web. 
                <br> Hãy nhớ rằng với sức mạnh lớn đi kèm trách nhiệm lớn.  Do đó, vui lòng không sử dụng sai quyền kiểm soát quản trị viên của bạn để tạo rắc rối.
            </p>
        </div>
    </div>

</body>
</html>

<?php include "easter_egg.php"; ?>
