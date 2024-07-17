<?php
function isValid($s) {
    // スタックを初期化
    $stack = [];

    // 文字列の各文字を処理
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i]; // 現在の文字を取得

        if ($char == '(' || $char == '{' || $char == '[') {
            // 開き括弧をスタックに追加
            array_push($stack, $char);
        } else {
            // 閉じ括弧の場合
            if (empty($stack)) {
                return false; // スタックが空なら false
            }

            $topElement = array_pop($stack); // スタックから開き括弧を取り出す
            // 対応する開き括弧が正しいか確認
            if (($char == ')' && $topElement != '(') ||
                ($char == '}' && $topElement != '{') ||
                ($char == ']' && $topElement != '[')) {
                return false;
            }
        }
    }

    // 全ての括弧が対応し終えた後、スタックが空であることを確認
    return empty($stack);
}

// テストケース
$s1 = '()';
var_dump(isValid($s1)); // bool(true)

$s2 = '([]){}';
var_dump(isValid($s2)); // bool(true)

$s3 = '({)}';
var_dump(isValid($s3)); // bool(false)

$s4 = '((({})))';
var_dump(isValid($s4)); // bool(true)

$s5 = '((({)})))';
var_dump(isValid($s5)); // bool(false)

$s6 = '(({})))';
var_dump(isValid($s6)); // bool(false)
?>
