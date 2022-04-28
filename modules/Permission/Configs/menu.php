<?php
return [
    'name' => trans('Access Control'),
    'route' => route('get.permission.list'),
    'sort' => 1,
    'active'=> TRUE,
    'id'=> 'permission',
    'icon' => '<i class="fa fa-delicious"></i>',
    'middleware' => ['permission'],
    'group' => []
];
