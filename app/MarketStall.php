<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketStall extends Model
{
    protected $guarded = [];

    public function stores()
    {
        return $this->hasMany(MarketStore::class, 'stall_id', 'id');
    }
}
