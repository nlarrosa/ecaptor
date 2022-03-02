<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class rol extends Model
{
    use HasFactory;

    protected $table = 'rols';
    protected $fillable = ['type', 'abbreviation', 'color'];


    public function User(): HasMany
    {
        return $this->hasMany(rol::class);
    }
}
