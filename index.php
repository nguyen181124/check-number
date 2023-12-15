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
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        Nhập 1 số từ 0 đến 9 <input type="text" name="number" value='<?php echo $number; ?>' />
        <input type="submit" name="Check" value="Check" /><br>
        <span class="error">
            <?php echo $enumber; ?>
            <?php echo $parity; ?><br><br>
            <?php if ($sol != "") {
                echo "Các số lẻ nhỏ hơn $number là: " . $sol;
            } ?><br><br>
            <?php if ($soc != "") {
                echo "Các số chẵn nhỏ hơn $number là: " . $soc;
            } ?><br><br>
            <?php if ($table != "") {
                echo "Bảng nhân $number" . "<br>";
                echo $table;
            } ?><br><br>
            <pre><?php echo $m ?></pre>

            <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
                <?php
                for ($row = 1; $row <= $number; $row++) {
                    echo "<tr>";
                    for ($col = 1; $col <= $number; $col++) {
                        $total = $row + $col;
                        if ($total % 2 == 0) {
                            echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
                        } else {
                            echo "<td height=30px width=30px bgcolor=#000000></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
    </form>

</body>

</html