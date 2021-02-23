<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'preferences';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'event_id',
        'artist_id',
        'display_name',
        'artist',
        'venue',
        'location',
        'date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    /*protected $casts = [
        'date' => 'date:F j,Y',
    ];*/

    public function preference()
    {
        return $this->belongsTo(User::class);
    }
}
