<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom','numero', 'email', 'groupe_id'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}
