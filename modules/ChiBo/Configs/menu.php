<?php
return [
    'name' => 'Chi bộ',
    'route' => route('get.chibo.list'),
    'sort' => 2,
    'active'=> TRUE,
    'id'=> 'chibo',
    'icon' => '<i class="icon-people"></i>',
    'middleware' => ['chibo'],
    'group' => []
];
