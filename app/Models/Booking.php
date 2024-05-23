<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\Booking
 *
 * @property int $__pk
 * @property int $_fk_property
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property BelongsTo $property
 *
 */



class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = '__pk';

    protected $fillable = [
        '_fk_property',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        '_fk_property' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    //added timestamps to false to avoid error on test as sql file provided does not have timestamps
    public $timestamps = false;

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, '_fk_property');
    }

}
