<?php

#1〜10までをランダム生成し偶数か奇数か判定。
$rand = rand(1,10);

if($rand % 2 == 0){ #２で割って余りがない。
    $res = '偶数';
}else{
    $res = '奇数'; #それ以外は奇数。
}

echo "乱数は{$rand}で判定は{$res}です。";


#テストの点数をランダム生成して点数に応じて成績を表示。
$rand = rand(1,100);

if($rand > 0 && $rand < 49){
    $res = '不可';
}elseif($rand > 50 && $rand < 69){
    $res = '可';
}elseif($rand >70 && $rand < 79){
    $res = '良';
}elseif($rand > 80 && $rand < 99){
    $res = '優';
}elseif($rand == 100){
    $res = '満点';
}

echo "乱数は{$rand}で結果は{$res}です。";


#2教科のテストの点数をランダム生成し条件に応じて合格/不合格を表示。
$score1 = rand(0,100);
$score2 = rand(0,100); # $score1,2で教科を分ける。
$sum = $score1 + $score2; #合計の条件もある為、$sumを使用。

if($score1 >= 60 && $score2 >= 60){
    $res = '合格';
}elseif($sum >= 130){
    $res = '合格';
}elseif($sum >= 100 && ($score1 >= 90 || $score2 >= 90)){ #「AND > OR」のためOR条件式をカッコで括る。
    $res = '合格';
}
else{
    $res = '不合格';
}

echo "教科１は{$score1}点、教科２は{$score2}点、結果{$res}です。";

?>