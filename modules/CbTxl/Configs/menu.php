<?php
return [
    'name' => 'Chi bộ tự xếp loại',
    'route' => route('get.cbtxl.list'),
    'sort' => 5,
    'active'=> TRUE,
    'id'=> 'cbtxl',
    'icon' => '<i class="icon-people"></i>',
    'middleware' => ['cbtxl'],
    'group' => []
];
