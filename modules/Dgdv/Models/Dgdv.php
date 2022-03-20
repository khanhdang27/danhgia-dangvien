<?php

namespace Modules\Dgdv\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Modules\Base\Models\BaseModel;
use Modules\DangVien\Models\DangVien;
use Modules\Rating\Models\Rating;

class Dgdv extends BaseModel {
    use HasCompositePrimaryKey;

    protected $table = "dgdvs";

    protected $primaryKey = ['madv', 'nam'];

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';

    public function dangvien() {
        return $this->belongsTo(DangVien::class, 'madv', 'madv');
    }

    public function tuxeploai() {
        return $this->belongsTo(Rating::class, 'txl', 'maxeploai');
    }
}
