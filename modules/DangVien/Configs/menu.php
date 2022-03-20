<?php
return [
    'name' => 'Đảng viên',
    'route' => route('get.dangvien.list'),
    'sort' => 3,
    'active'=> TRUE,
    'id'=> 'dangvien',
    'icon' => '<i class="icon-people"></i>',
    'middleware' => ['dangvien'],
    'group' => []
];
