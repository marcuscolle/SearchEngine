<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Location
 *
 * @property int $__pk
 * @property string $location_name
 * @property HasMany $properties
 *
 */

class Location extends Model
{
    use HasFactory;

    protected $primaryKey = '__pk';

    protected $fillable = [
        'location_name'
    ];

    //added timestamps to false to avoid error on test as sql file provided does not have timestamps
    public $timestamps = false;

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, '_fk_location');
    }

}
