<?php

namespace Modules\Dgcb\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Modules\Base\Models\BaseModel;
use Modules\ChiBo\Models\ChiBo;
use Modules\Rating\Models\Rating;

class Dgcb extends BaseModel {
    use HasCompositePrimaryKey;

    protected $table = "dgcbs";

    protected $primaryKey = ['macb', 'nam'];

    protected $guarded = [];

    public $timestamps = true;

    public $incrementing = false;

    protected $keyType = 'string';

    public function chibo() {
        return $this->belongsTo(ChiBo::class, 'macb', 'macb');
    }

    public function tuxeploai() {
        return $this->belongsTo(Rating::class, 'txl', 'maxeploai');
    }
}
