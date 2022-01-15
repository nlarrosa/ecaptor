<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusSketch extends Model
{
    use HasFactory;
    protected $table = 'status_sketch';
    protected $fillable = ['name', 'color'];
}
