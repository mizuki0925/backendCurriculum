<?php

$array = [
    '0' => [
      'info' => [
        'name' => '田中',
        'division' => '1',
        'age' => '25'
      ],
      'skill' => [
        'lang' => [
          '0' => 'PHP',
          '1' => 'Ruby'
        ],
        'fw' => [
          '0' => 'Laravel',
          '1' => 'CakePHP',
          '2' => 'Rails'
        ]
      ],
      'description' => 'バックエンドエンジニア'
    ],

    '1' => [
      'info' => [
        'name' => '山田',
        'division' => '2',
        'age' => '23'
      ],
      'skill' => [
        'lang' => [
          '0' => 'HTML',
          '1' => 'CSS',
          '2' => 'JS'
        ],
        'fw' => [
          '0' => 'Vue.js'
        ]
      ],
      'description' => 'フロントエンジニア'
    ],

    '2' => [
      'info' => [
        'name' => '佐藤',
        'division' => '2',
        'age' => '20'
      ],
      'skill' => [
        'lang' => [
          '0' => 'PHP'
        ],
        'fw' => [
        ]
      ],
      'description' => 'PHP初学者'
    ]
  ];

 var_dump($array);

/*
個人的メモ
配列１ 0~2の3種類 （大分類）
配列２ [info],[skill],[description]（中分類）
配列３ [info] = name,division,age（小分類）
      [skill] = lang,fw
      [description]
*/

?>