<?php

namespace App\Entities;

use Database\Factories\HotelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelEntity extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'hotels';

    /** The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'city',
        'state',
        'zip_code',
        'website',
    ];

    protected static function newFactory(): Factory
    {
        return HotelFactory::new();
    }

    public function rooms()
    {
        return $this->hasMany(RoomEntity::class, 'hotel_id', 'id');
    }
}
