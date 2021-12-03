<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Border extends Model
{
    use HasFactory;



    
    /** METHODS */

    public static function getCssUbicacionBorde($value)
    {
        switch ($value) {
         
            case config('ecaptor.border.ubicacion.completos'):
                return 'border-8 border-neutral';
            break;

            case config('ecaptor.border.ubicacion.cabecera'):
                return 'border-t-8 border-neutral';
            break;

            case config('ecaptor.border.ubicacion.pie'):
                return 'border-b-8 border-neutral';
            break;

            case config('ecaptor.border.ubicacion.cabepie'):
                return 'border-b-8 border-t-8 border-neutral';
            break;

            case config('ecaptor.border.ubicacion.izqder'):
                return 'border-r-8 border-l-8 border-neutral';
            break;
            
            default:
                return '';
            break;
        }
    }
}
