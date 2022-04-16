<?php

namespace Modules\ChiBo\Models;

use Modules\Base\Models\BaseModel;
use Modules\DangBo\Models\DangBo;
use Modules\Dgcb\Models\Dgcb;

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

    public function dgcb() {
        return $this->hasMany(Dgcb::class,'macb','macb');
    }
}
