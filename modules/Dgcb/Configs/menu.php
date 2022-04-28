<?php
return [
    'name' => 'Đánh giá chi bộ',
    'route' => route('get.dgcb.list'),
    'sort' => 8,
    'active'=> TRUE,
    'id'=> 'dgcb',
    'icon' => '<i class="fa fa-list-ol"></i>',
    'middleware' => ['dgcb'],
    'group' => []
];
