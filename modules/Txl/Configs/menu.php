<?php
return [
    'name' => 'Đảng viên tự xếp loại',
    'route' => route('get.txl.list'),
    'sort' => 2,
    'active'=> TRUE,
    'id'=> 'txl',
    'icon' => '<i class="fa fa-list-ol"></i>',
    'middleware' => ['txl'],
    'group' => []
];
