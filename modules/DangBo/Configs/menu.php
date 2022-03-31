<?php
return [
    'name' => 'Đảng bộ',
    'route' => route('get.dangbo.list'),
    'sort' => 2,
    'active'=> TRUE,
    'id'=> 'dangbo',
    'icon' => '<i class="mdi mdi-account-key"></i>',
    'middleware' => ['dangbo'],
    'group' => []
];
