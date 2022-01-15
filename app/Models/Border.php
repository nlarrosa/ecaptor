<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Border extends Model
{
    use HasFactory;

    protected $table = 'borders';
    protected $fillable = ['name', 'price'];

    /** RELATIONS */
    


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


    
    /** Devuleve el valor de los bordes de un tapete segun la cantoidad
     * de metros lineales que tenga el mismo
     */
    public static function getBorderPriceByMtsLineal(array $arrDataBorder): array
    {
        $borderType = $arrDataBorder['borderType'];
        $borderCant = $arrDataBorder['borderCant'];
        $ubicacion  = $arrDataBorder['ubicacion'];
        $width      = $arrDataBorder['width'];
        $height     = $arrDataBorder['height'];
        $formato    = config('ecaptor.tapetes.formato.apaisado');
        $price      = 0;
        $mtsLineal  = self::getMtsLinealBorderUbicacion($ubicacion, $width, $height, $formato);

        
        if($borderType != config('ecaptor.border.tipos.antitropiezo'))
        {
            return [
                'unitePrice' => 0,
                'totalPrice' => 0,
                'mts' => 0,
            ];
        }


       $border = Border::where('name', $borderType)->first();
       $price = $mtsLineal * $border->price;

       return [
           'unitePrice' => $border->price,
           'totalPrice' => $price,
           'mts' => $mtsLineal,
       ];
    }



    /** Devuelve el valor en mts lineales de un producto
     * tapete segin la cantidad de bordes que tenga y 
     * la ubicacion de los lados
     */
    public static function getMtsLinealBorderUbicacion(string $ubicacion, int $width, int $height, string $formato ): float
    {
        $mtslLineal = 0;

        switch ($ubicacion) 
        {
            case config('ecaptor.border.ubicacion.completos'):
                $mtsLineal = ($width * 2) + ($height * 2);
                $mtsLineal = $mtsLineal / 100;
            break;

            case config('ecaptor.border.ubicacion.cabecera'):
            case config('ecaptor.border.ubicacion.pie'):

                if($formato == config('ecaptor.tapetes.formato.apaisado'))
                $mtsLineal = $width / 100;

                if($formato == config('ecaptor.tapetes.formato.camino'))
                $mtsLineal = $height / 100;
                
            break;

            case config('ecaptor.border.ubicacion.cabepie'):

                if($formato == config('ecaptor.tapetes.formato.apaisado'))
                $mtsLineal = ($width * 2) / 100;

                if($formato == config('ecaptor.tapetes.formato.camino'))
                $mtsLineal = ($height * 2) / 100;
            break;

            case config('ecaptor.border.ubicacion.izqder'):

                if($formato == config('ecaptor.tapetes.formato.apaisado'))
                $mtsLineal = ($height * 2) / 100;

                if($formato == config('ecaptor.tapetes.formato.camino'))
                $mtsLineal = ($width * 2) / 100;
            break;
            
            default:
                $mtsLineal = 0;
            break;
        }

        return $mtsLineal;
    }
}
