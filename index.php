<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (($_POST["number"]) == null) {
        $enumber = "Hãy nhập số";
    } elseif (!is_numeric($_POST["number"])) {
        $enumber = "Số không hợp lệ";
    } elseif (($_POST["number"]) > 9 || ($_POST["number"]) < 0) {
        $enumber = "Chỉ nhập số trong khoảng từ 0 đến 9";
    } else {
        $number = $_POST['number'];
    }
}


if (isset($_POST['Check'])) {
    if ($enumber == "") {
        if ($number % 2 == 0) {
            $parity = $number . " là số chẵn";
        } else {
            $parity = $number . " là số lẻ";
        }
    }

    if ($enumber == "") {
        for ($i = 0; $i < $number; $i++) {
            if ($i % 2 != 0 && $i >= 0) {
                $sol .= $i . ', ';
            }
        }
    }

    if ($enumber == "") {
        for ($j = 0; $j < $number; $j++) {
            if ($j % 2 == 0) {
                $soc .= $j . ', ';
            }
        }
    }

    if ($enumber == "") {
        for ($q = 0; $q <= 10; $q++) {
            $multiply = $number * $q;
            $table .= $number . " x " . $q . " = " . $multiply . "<br>";
        }
    }

    $m = "";
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $number - $i; $j++) {
            $m .= " ";
        }

        for ($j = 1; $j <= $i; $j++) {
            $m .= $j;
        }

        for ($j = $i - 1; $j >= 1; $j--) {
            $m .= $j;
        }

        $m .= "<br>";
    }


}
?>
<!DOCTYPE HTML>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="responsive.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <p class="text-center fs-1">Kiểm tra số</>
    <form class="text-center" action="" method="post">
        <div class="input_number">
            Nhập 1 số từ 0 đến 9 <input type="text" name="number" value='<?php echo $number; ?>' />
            <input type="submit" name="Check" value="Check" />
        </div>
        <br>
        <span class="error text-danger">
            <?php echo $enumber; ?>
        </span>
        <?php echo $parity; ?><br><br>
        <?php if ($sol != "") {
            echo "Các số lẻ nhỏ hơn $number là: " . $sol;
        } ?><br><br>
        <?php if ($soc != "") {
            echo "Các số chẵn nhỏ hơn $number là: " . $soc;
        } ?><br><br>
        <div class="more_inf d-lg-flex justify-content-center gap-5">
            <?php if ($table != "") {
                echo "Bảng nhân $number" . "<br>";
                echo $table;
            } ?><br><br>
            <pre style="font-family: auto"><?php echo $m ?></pre>

            <table style="width: 336px" class="d-md-flex">
                <?php
                for ($row = 1; $row <= $number; $row++) {
                    echo "<tr>";
                    for ($col = 1; $col <= $number; $col++) {
                        $total = $row + $col;
                        if ($total % 2 == 0) {
                            echo "<td width: 30px height=30px bgcolor=#FFFFFF></td>";
                        } else {
                            echo "<td width=30px height=30px bgcolor=#000000></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </form>

</body>

</html