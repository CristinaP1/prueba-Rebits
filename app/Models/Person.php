<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    /* Relacion uno es a muchos */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
