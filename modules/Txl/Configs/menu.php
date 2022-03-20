<?php
return [
    'name' => 'Đảng viên tự xếp loại',
    'route' => route('get.txl.list'),
    'sort' => 5,
    'active'=> TRUE,
    'id'=> 'txl',
    'icon' => '<i class="icon-people"></i>',
    'middleware' => ['txl'],
    'group' => []
];
