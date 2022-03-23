<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeatherForecast extends BaseModel
{
    use SoftDeletes;

    public const MAX_HISTORIC_DAY_COUNT = 5;

    protected $casts = [
        'meta' => 'array',
        'forecast_date' => 'datetime:Y-m-d',
    ];
    protected $dates = ['forecast_date'];

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
           $model->forecast_date = Carbon::parse($model->dt)->format('Y-m-d');
        });
    }

    /**
     * @return BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
