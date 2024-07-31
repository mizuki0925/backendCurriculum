<?php

#①変数の文字列の長さを関数を使って取得し表示
function string(){
    echo 'ABCDEFGHI';
}
string();



/*②３の倍数のみを表示する関数を作成
引数はランダムな数値を関数に使い定義（乱数の最大値は100）*/

$rand = rand(1, 100);
echo $rand; #乱数表示

function calculation($num){
    if ($num % 3 == 0){
        echo $num; #３の倍数の時は表示
    } else {
        echo ''; #それ以外の場合は非表示
    }
}
calculation($rand);


?>