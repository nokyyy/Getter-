<?php
$str = "";
$num = 0;
$cal = '+';
for ($i = 0; $i < strlen($extra); $i++) {
    $j = substr($extra, $i, 1);

    if (($j >= '0')and($j <= '9')) {
    $num = $num * 10 + $j;
    // 数値は先に
    } else {
        // 前の更新演算子を使うよ
        switch ($cal) {
        case '+':
        // +の時は文字列に数値を連結して、初期化したintに値を入れる
        $int = 0;
            if(($j === '*')or($j === "/")) {
                // ぶつかった 「$j」 がかけ算、割り算だった場合は文字列連結しないで持ち越し
                $int = $int + $num;
            }else{
                if ($j === '+'){
                    $str = $str.$num."+";
                }else{
                    $str = $str.$num."-";
                }
            }
        break;
        case '-':
        $int = 0;
            if(($j === '*')or($j === '/')) {
                $int = $int - $num;
            }else{
                if ($j === '+'){
                    $str = $str.$num."+";
                }else{
                    $str = $str.$num."-";
                }
            }
        break;
        case '*':
            if (($j === "*")or($j === "/")) {
                $int = $int * $num;
            }else{
                $int = $int * $num;
                if ($j === '+'){
                    $str = $str.$int."+";
                }else{
                    $str = $str.$int."-";
                }
            }
        break;
        case '/':
            if (($j === "*")or($j === "/")) {
                $int = $int / $num;
            }else{
                $int = $int / $num;
                if ($j === '+'){
                    $str = $str.$int."+";
                }else{
                    $str = $str.$int."-";
                }
            }
        break;
        }

        $num = 0;
        if (($j === '+')or($j === '-')or($j === '*')or($j === '/')) {
        $cal = $j;
        } else {
        $errmsg = 'illegal char ' . $j;
        break;
        }
    }
}
// for回しが終わった後
// 最後(「$j」の演算子がない状態) - 演算子なし
switch ($cal) {
        case '+':
        $str = $str.$num;
        break;
        case '-':
        $str = $str.$num;
        break;
        case '*':
        $int = $int * $num;
        $str = $str.$int;
        break;
        case '/':
        $int = $int / $num;
        $str = $str.$int;
        break;
}
?>
