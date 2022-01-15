<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;
    protected $table = 'lines';
    protected $fillable = [ 'name', 'type', 'image_line', 'details', 'category_id'];
}
