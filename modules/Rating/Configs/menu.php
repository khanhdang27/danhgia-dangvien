<?php
return [
    'name' => 'Xếp loại',
    'route' => route('get.rating.list'),
    'sort' => 9,
    'active'=> TRUE,
    'id'=> 'rating',
    'icon' => '<i class="fa fa-users"></i>',
    'middleware' => ['rating'],
    'group' => []
];
