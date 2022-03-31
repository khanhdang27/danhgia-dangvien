<?php
return [
    'name' => 'Chi bộ',
    'route' => route('get.chibo.list'),
    'sort' => 3,
    'active'=> TRUE,
    'id'=> 'chibo',
    'icon' => '<i class="mdi mdi-account-key"></i>',
    'middleware' => ['chibo'],
    'group' => []
];
