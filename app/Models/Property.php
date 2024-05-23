<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * App\Models\Property
 *
 * @property int $__pk
 * @property int $_fk_location
 * @property string $property_name
 * @property bool $near_beach
 * @property bool $accepts_pets
 * @property int $sleeps
 * @property int $beds
 * @property BelongsTo $location
 * @property HasMany $bookings
 *
 */

class Property extends Model
{
    use HasFactory;

    protected $primaryKey = '__pk';

    protected $fillable = [
        '_fk_location',
        'property_name',
        'near_beach',
        'accepts_pets',
        'sleeps',
        'beds'
    ];

    protected $casts = [
        '_fk_location' => 'integer',
        'near_beach' => 'boolean',
        'accepts_pets' => 'boolean',
        'sleeps' => 'integer',
        'beds' => 'integer'
    ];

    //added timestamps to false to avoid error on test as sql file provided does not have timestamps
    public $timestamps = false;


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, '_fk_location');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, '_fk_property');
    }

}
