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
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <p class="text-center text-5xl text-cyan-700 mt-20">Kiểm tra số</>
    <form class="text-center" action="" method="post">
        <div class="input_number flex gap-4 justify-center mt-12">
            Nhập 1 số từ 0 đến 9 <input class="border-2 border-cyan-500" type="text" name="number" value='<?php echo $number; ?>' />
            <input class="border-2 border-cyan-500 bg-cyan-400" type="submit" name="Check" value="Check" />
        </div>
        <br>
        <span class="error text-red-600">
            <?php echo $enumber; ?>
        </span>
        <?php echo $parity; ?><br><br>
        <?php if ($sol != "") {
            echo "Các số lẻ nhỏ hơn $number là: " . $sol;
        } ?><br><br>
        <?php if ($soc != "") {
            echo "Các số chẵn nhỏ hơn $number là: " . $soc;
        } ?><br><br>
        <div class="more_inf lg:flex gap-5 justify-center">
            <?php if ($table != "") {
                echo "Bảng nhân $number" . "<br>";
                echo $table;
            } ?>
            <pre style="font-family: auto"><?php echo $m ?></pre>

            <table class="flex justify-center mt-3">
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