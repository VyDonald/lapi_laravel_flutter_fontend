<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
