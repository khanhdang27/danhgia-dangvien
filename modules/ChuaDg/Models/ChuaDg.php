<?php

namespace Modules\ChuaDg\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Modules\Base\Models\BaseModel;
use Modules\DangVien\Models\DangVien;

class ChuaDg extends BaseModel {

    use HasCompositePrimaryKey;

    protected $table = "chua_kddgs";

    protected $primaryKey = ['madv', 'nam'];

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';

    public function dangvien() {
        return $this->belongsTo(DangVien::class, 'madv', 'madv');
    }

    public static function getDangVien($year) {
        $chuadg   = ChuaDg::query()->where('nam', $year)->pluck('madv');
        $dangvien = DangVien::query()->whereNotIn('madv', $chuadg)->pluck('hoten', 'madv');
        return $chuadg;
    }
}
