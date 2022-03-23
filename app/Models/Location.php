<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends BaseModel
{
    use SoftDeletes;

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return HasMany
     */
    public function weatherForecasts(): HasMany
    {
        return $this->hasMany(WeatherForecast::class);
    }

    /**
     * @return HasOne
     */
    public function currentWeatherForecast(): HasOne
    {
        return $this->hasOne(WeatherForecast::class, 'location_id')->latest();
    }
}
