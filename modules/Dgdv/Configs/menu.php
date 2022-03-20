<?php
return [
    'name' => 'Đánh giá đảng viên',
    'route' => route('get.dgdv.list'),
    'sort' => 5,
    'active'=> TRUE,
    'id'=> 'dgdv',
    'icon' => '<i class="icon-people"></i>',
    'middleware' => ['dgdv'],
    'group' => []
];
