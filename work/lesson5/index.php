<?php

#課題① foreach文をfor文に書き換える。
$names = ['太郎','次郎','三郎','四郎','五郎'];
for ($i = 0; $i < count($names); $i++) {
    echo $names [$i];
    echo '<br>';
}

#課題② 配列を繰り返し処理で全て表示。
$my_array = array ("key1" => "value1", "key2" => "value2", "key3" => "value3", "key4" => "value4", "key5" => "value5");
foreach ($my_array as $key => $val) {
    echo $key. '=>'. $val;
}

echo '<br>';

#課題③ １〜１０を表示する繰り返し処理で２で割り切れる場合は処理をスキップする。
for ($i = 1; $i < 11; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo $i;
}

?>