<?php

namespace Modules\DangVien\Models;

use Modules\Base\Models\BaseModel;
use Modules\ChiBo\Models\ChiBo;
use Modules\Dgdv\Models\Dgdv;

class DangVien extends BaseModel {
    protected $table = "dangviens";

    protected $primaryKey = "madv";

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function getSex($sex) {
        if ($sex == 0)
            return 'Nữ';
        return 'Nam';
    }

    public function chibo() {
        return $this->belongsTo(ChiBo::class, 'macb', 'macb');
    }

    public function dgdv() {
        return $this->hasMany(Dgdv::class,'madv','madv');
    }
}
