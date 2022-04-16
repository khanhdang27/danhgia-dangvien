<?php
return [
    'name' => 'Xếp loại',
    'route' => route('get.rating.list'),
    'sort' => 2,
    'active'=> TRUE,
    'id'=> 'rating',
    'icon' => '<i class="fa fa-star-half-o"></i>',
    'middleware' => ['rating'],
    'group' => []
];
