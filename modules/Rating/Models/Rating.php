<?php

namespace Modules\Rating\Models;

use Modules\Base\Models\BaseModel;

class Rating extends BaseModel {

    protected $table = "xeploais";

    protected $primaryKey = "maxeploai";

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function getXeploai($maxeploai) {
        return Rating::query()->find($maxeploai)->tenxeploai ?? '';
    }
}
