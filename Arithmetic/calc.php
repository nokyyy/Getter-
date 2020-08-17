<?php
// かけ算、割り算を先に計算する
/*
かけ算、割り算の結果を計算して「文字列」に戻す
*/

require_once('extra.php');
print($extra)."<br>";

// 文字列を表示させる
require_once('mul_div.php');
print($str);

// 簡単化した式を「＋ー」する
$ans = 0;
$num = 0;
$cal = '+';
for ($i = 0; $i < strlen($str); $i++) {
    $j = substr($str, $i, 1);
    if (($j >= '0')and($j <= '9')) {
    $num = $num * 10 + $j;
    } else {
        switch ($cal) {
        case '+':
        $ans = $ans + $num;
        break;
        case '-':
        $ans = $ans - $num;
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


// 最後 - 演算子なし
    switch ($cal) {
    case '+':
    $ans = $ans + $num;
    break;
    case '-':
    $ans = $ans - $num;
    break;
    case '*':
    $ans = $ans * $num;
    break;
    case '/':
    $ans = $ans / $num;
    break;
    }

?>
<form action="" method="post">
<input type="text" name="calc" value="<?= isset($calc) ? $calc : ''; ?>">
<input type="submit">
<?= isset($errmsg) ? $errmsg : $ans; ?>
</form>
