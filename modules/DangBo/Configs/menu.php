<?php
return [
    'name' => 'Đảng bộ',
    'route' => route('get.dangbo.list'),
    'sort' => 1,
    'active'=> TRUE,
    'id'=> 'dangbo',
    'icon' => '<i class="mdi mdi-account-key"></i>',
    'middleware' => ['dangbo'],
    'group' => []
];
