<?php
return [
    'name' => 'Đảng viên chưa kiểm điểm, đánh giá',
    'route' => route('get.chuadg.list'),
    'sort' => 2,
    'active'=> TRUE,
    'id'=> 'chuadg',
    'icon' => '<i class="icon-people"></i>',
    'middleware' => ['chuadg'],
    'group' => []
];
