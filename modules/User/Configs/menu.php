<?php
return [
    'name' => 'Người dùng',
    'route' => route('get.user.list'),
    'sort' => 20,
    'active'=> TRUE,
    'id'=> 'user',
    'icon' => '<i class="fa fa-users"></i>',
    'middleware' => ['user'],
    'group' => []
];
