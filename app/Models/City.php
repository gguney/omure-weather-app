<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends BaseModel
{
    use SoftDeletes;

    /**
     * @return HasOne
     */
    public function locations(): HasOne
    {
        return $this->hasOne(Location::class);
    }
}
