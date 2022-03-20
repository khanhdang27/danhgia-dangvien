<?php

namespace Modules\ChuaDg\Models;

use Modules\Base\Models\BaseModel;

class Nam extends BaseModel {

    protected $table = "nams";

    protected $primaryKey = 'nam';

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';
}
