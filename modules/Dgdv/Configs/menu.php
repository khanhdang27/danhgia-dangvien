<?php
return [
    'name' => 'Đánh giá đảng viên',
    'route' => route('get.dgdv.list'),
    'sort' => 9,
    'active'=> TRUE,
    'id'=> 'dgdv',
    'icon' => '<i class="fa fa-list-ol"></i>',
    'middleware' => ['dgdv'],
    'group' => []
];
