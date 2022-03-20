<?php

namespace Modules\ChiBo\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;
use Modules\DangBo\Models\DangBo;

class ChiBo extends BaseModel {

    protected $table = "chibos";

    protected $primaryKey = "macb";

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';

    public function dangbo() {
        return $this->belongsTo(DangBo::class, 'madb','madb');
    }
}
