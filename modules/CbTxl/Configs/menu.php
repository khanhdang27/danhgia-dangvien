<?php
return [
    'name' => 'Chi bộ tự xếp loại',
    'route' => route('get.cbtxl.list'),
    'sort' => 6,
    'active'=> TRUE,
    'id'=> 'cbtxl',
    'icon' => '<i class="fa fa-list-ol"></i>',
    'middleware' => ['cbtxl'],
    'group' => []
];
