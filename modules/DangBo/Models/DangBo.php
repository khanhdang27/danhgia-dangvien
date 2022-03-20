<?php

namespace Modules\DangBo\Models;

use Modules\Base\Models\BaseModel;

class DangBo extends BaseModel {

    protected $table = "dangbos";

    protected $primaryKey = "madb";

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';
}
