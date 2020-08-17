<?php
require "extra_return.php";
// カッコ内を抽出した string を作りたい
$extra = "";
$switch = False;
$extract = "";
$calc = filter_input(INPUT_POST, 'calc');
if (isset($calc)) {
// $num = 0;
// $cal = '+';
for ($i = 0; $i < strlen($calc); $i++) {
    $j = substr($calc, $i, 1);
    if($j === '('){
        $switch = True;
    }elseif($j === ')'){
        $switch = False;
    }

    if($switch){
        if (!($j === '(')){
            $extract = $extract.$j;
        }
    }elseif($j === ')'){
        // function
        $return = extra_return($extract);
        $extra = $extra.$return;
        $extract ="";
    }else{
        $extra = $extra.$j;
    }
}
}
// print($str);



/*
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
}*/



/*
$str1 = '文字列1'; $str2 = '文字列2';
$strInt = 12;
$str3 = $str1.$str2.$strInt.$str2.$strInt.$strInt;//結合
echo $str3;*/
?>
