<?php
return [
    'name' => 'Đánh giá chi bộ',
    'route' => route('get.dgcb.list'),
    'sort' => 5,
    'active'=> TRUE,
    'id'=> 'dgcb',
    'icon' => '<i class="icon-people"></i>',
    'middleware' => ['dgcb'],
    'group' => []
];
