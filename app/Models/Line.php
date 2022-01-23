<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Line extends Model
{
    use HasFactory;
    protected $table = 'lines';
    protected $fillable = [ 'name', 'type', 'design','image_line', 'details', 'category_id', 'border_include'];


    /** RELATIONS */

    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
