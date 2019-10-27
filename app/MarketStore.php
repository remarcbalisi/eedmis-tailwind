<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketStore extends Model
{
    protected $guarded = [];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function department()
    {
        return $this->belongsTo(MarketDepartment::class, 'market_department_id');
    }

    public function stall()
    {
        return $this->belongsTo(MarketStall::class, 'stall_id');
    }
}
