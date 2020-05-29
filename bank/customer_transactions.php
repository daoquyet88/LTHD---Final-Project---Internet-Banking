<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";

    if (isset($_SESSION['loggedIn_cust_id'])) {
        $sql0 = "SELECT * FROM passbook".$_SESSION['loggedIn_cust_id'];
    }

    // Recive sort variables as $_GET
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    }

    // Recieve filter variables as session variables
    if (isset($_POST['search_term'])) {
        $_SESSION['search_term'] = $_POST['search_term'];
    }
    if (isset($_POST['date_from'])) {
        $_SESSION['date_from'] = $_POST['date_from'];
    }
    if (isset($_POST['date_to'])) {
        $_SESSION['date_to'] = $_POST['date_to'];
    }

    // Filter indicator variable
    $filter_indicator = "Không có";

    // Queries when search is set
    if (!empty($_SESSION['search_term'])) {
        $sql0 .= " WHERE remarks COLLATE latin1_GENERAL_CI LIKE '%".$_SESSION['search_term']."%'";
        $filter_indicator = "Ghi chú";

        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to'])) {
            $sql0 .= " AND trans_date > '".$_SESSION['date_from']." 00:00:00'";
            $filter_indicator = "Ghi chú và từ ngày";
        }
        if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .= " AND trans_date < '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Ghi chú và đến ngày";
        }
        if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .=  " AND trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Ghi chú, từ ngày và đến ngày";
        }
    }

    // Queries when search is not set
    if (empty($_SESSION['search_term'])) {
        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to'])) {
            $sql0 .= " WHERE trans_date > '".$_SESSION['date_from']." 00:00:00'";
            $filter_indicator = "Từ ngày";
        }
        if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .= " WHERE trans_date < '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Đến ngày";
        }
        if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .=  " WHERE trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Từ ngày và đến ngày";
        }
    }

    // Sort Queries
    // Sort acts independent of the filter
    if (isset($_GET['sort'])) {
        if ($sort == 'tid_down') {
            $sql0 .= " ORDER BY trans_id ASC";
        }
        if ($sort == 'tid_up') {
            $sql0 .= " ORDER BY trans_id DESC";
        }
        if ($sort == 'date_down') {
            $sql0 .= " ORDER BY trans_date ASC";
        }
        if ($sort == 'date_up') {
            $sql0 .= " ORDER BY trans_date DESC";
        }
    }

    // Sort all or 30 days
    if (isset($_POST['filter'])) {
        $filter = $_POST['filter'];
        if ($filter == 0) {
            $sql0 .= " WHERE DATEDIFF(CURRENT_TIMESTAMP,trans_date) < 30";
            $filter_indicator = "30 ngày gần nhất";
        }
        if ($filter == 1) {
            $sql0 .= "";
            $filter_indicator = "Tất cả giao dịch";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/transactions_style.css">
</head>

<body>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">
                <button id="search" onclick="document.getElementById('id01').style.display='block'">Bộ lọc</button>

                <div class="flex-item-by">
                    <label id="sort">Sắp xếp: </label>
                </div>

                <div class="flex-item-search-by">
                    <select name="by" onChange="window.location.href=this.value">
                        <option selected disabled hidden>
                            <?php if (empty($_GET['sort'])) {?>STT &darr;<?php } else { ?>
                                <?php if ($sort == 'tid_down') {?>STT &darr;<?php } ?>
                                <?php if ($sort == 'tid_up') {?>STT &uarr;<?php } ?>
                                <?php if ($sort == 'date_down') {?>Thời gian giao dịch &darr;<?php } ?>
                                <?php if ($sort == 'date_up') {?>Thời gian giao dịch &uarr;<?php } ?>
                            <?php } ?>
                        </option>
                        <option value="customer_transactions.php?sort=tid_down">STT &darr;</option>
                        <option value="customer_transactions.php?sort=tid_up">STT &uarr;</option>
                        <option value="customer_transactions.php?sort=date_down">Thời gian giao dịch &darr;</option>
                        <option value="customer_transactions.php?sort=date_up">Thời gian giao dịch &uarr;</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div id="id01" class="modal">
        <form class="modal-content animate" action="" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Filter">&times;</span>
            </div>

            <div class="container">
                <h1 id="filter">Bộ lọc</h1>
                <p id="filter">(Để trống để xóa bộ lọc)</p>
                <label>Ghi chú giao dịch: </label>
                <input type="text" placeholder="Nhập ghi chú" name="search_term">

                <label>Ngày giao dịch (yyyy-mm-dd): </label>
                <div class="duration-container">
                    <div class="date-container">
                        <input id="date" type="text" placeholder="Từ ngày" name="date_from">
                    </div>
                    <p id="minus">&minus;<b</p>
                    <div class="date-container">
                        <input id="date" type="text" placeholder="Đến ngày" name="date_to">
                    </div>
                </div>

                <label>Lọc ngày: </label>
                <div class="duration-container">
                    <div class="container">
                        <input type="radio" name="filter" value="1" id="debit-radio" checked>
                        <label id="radio-label" for="debit-radio"><span class="radio">Tất cả giao dịch</span></label>
                    </div>
                    <div class="container">
                        <input type="radio" name="filter" value="0" id="credit-radio">
                        <label id="radio-label" for="credit-radio"><span class="radio">30 ngày gần nhất</span></label>
                    </div>
                </div>

                <button id="submit" type="submit">Đồng ý</button>
            </div>
        </form>
    </div>

    <div class="flex-container">
        <p id="none">Bộ lọc: <?php echo $filter_indicator ?></p>
    </div>

    <div class="flex-container">
        <?php
            $result = $conn->query($sql0);
            if ($result->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
                        <th>STT</th>
                        <th>Thời gian giao dịch</th>
                        <th>Ghi chú</th>
                        <th>Ghi nợ (VND)</th>
                        <th>Tín dụng (VND)</th>
                        <th>Số dư (VND)</th>
                    </tr>
        <?php
            // output data of each row
            $id = 0;
            while($row = $result->fetch_assoc()) { $id++; ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td>
                        <?php
                            $time = strtotime($row["trans_date"]);
                            $sanitized_time = date("d/m/Y, H:i", $time);
                            echo $sanitized_time;
                            ?>
                    </td>
                    <td><?php echo $row["remarks"]; ?></td>
                    <td><?php echo number_format($row["debit"]); ?></td>
                    <td><?php echo number_format($row["credit"]); ?></td>
                    <td><?php echo number_format($row["balance"]); ?></td>
                </tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none">Không có kết quả tìm kiếm</p>
            <?php }
            $conn->close(); ?>

    </div>

    <script>
    // Sticky search-bar
    $(document).ready(function() {
        var curr_scroll;

        $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

            if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
              }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

        $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

            if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

            if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });

        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>

</body>
</html>
