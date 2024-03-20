<?php

namespace App\Entities;

use Database\Factories\RoomFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomEntity extends Model
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
    public $table = 'rooms';

    /** The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id',
        'name',
        'description',
    ];

    protected static function newFactory(): Factory
    {
        return RoomFactory::new();
    }

    public function hotel()
    {
        return $this->belongsTo(HotelEntity::class, 'hotel_id', 'id');
    }
}
