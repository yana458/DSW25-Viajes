<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['name', 'description', 'price', 'duration', 'destination_id'];

    // Relación: Una actividad pertenece a un Destino
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
