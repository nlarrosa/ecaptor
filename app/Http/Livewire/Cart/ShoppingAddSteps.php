<?php

namespace App\Http\Livewire\Cart;

use App\Models\Border;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductFormat;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Services\PayUService\Exception;
use Exception as GlobalException;

class ShoppingAddSteps extends Component
{

    use WithFileUploads;

    public  $modalOpen;
    public  $cantidad;
    public  $formato;
    public  $productId;
    public  $product;
    public  $border;
    public  $borderLados;
    public  $borderType;
    public  $step;
    public  $arrCartSetting;
    public  $typeLogo;
    public  $borderCss;
    public  $buttonStatus;
    public  $buttonName;
    public  $msgFileUpload;
    public  $textLogo;
    public  $comentLogo;
    public  $sector;
    public  $logo;
    public  $arrColors;
    public  $arrCart;
    public  $customProduct;
    public  $arrFormato;
    public  $typeProduct;
    public  $borderInclude;
    public  $typeDesignLiso;
    public  $width;
    public  $height;
    public  $widthRight;
    public  $widthLeft;
    public  $heightHeader;
    public  $heightFoot;
    public  $diametro;
    public  $borderRounded;


    public   $arrColorBase;
    public   $arrColorLogo;
    public   $arrColorLetras;
    public   $arrColorBordes;



    protected $listeners = [
        'openModalSteps' => 'openModalSettingCart',
        'selctedColor'   => 'selectedColor'
    ];



    protected $messages = [
        'borderType.required_unless' => 'Seleccione un tipo de borde.',
        'borderLados.required_if' => 'Seleccione la ubicacion de los bordes',
        'logo.mimes' => 'Solo acepta formato .ai - .pdf - .cdr',
        'logo.max' => 'El peso maximo del archivo puede ser de 20 mb.',
        'logo.required' => 'Debe subir un archivo con el logo o verifique el formato del archivo. Solo acepta .ai - .cdr - .pdf',
        'textLogo.required' => 'Debe ingresar un texto para el diseño.',
        'textLogo.min' => 'El texto del diseño debe tener mínimo 2 caracteres',
        'arrColorBase.required' => 'Debe Seleccionar al menos un color.',
        'arrColorLogo.required' => 'Debe Seleccionar al menos un color.',
        'arrColorLetras.required' => 'Debe Seleccionar al menos un color.',
        'arrColorBordes.required' => 'Debe Seleccionar al menos un color.',
        'diametro.required' => 'Ingrese la Medida del tapete',
    ];



    public function mount()
    {
        
        $this->modalOpen    = '';
        $this->cantidad     = 1;
        $this->formato      = 'APAISADO';
        $this->border       = 0;
        $this->borderLados  = '';
        $this->borderType   = '';
        $this->step         = 1;
        $this->productId    = 0;
        $this->arrCartSetting = [];
        $this->typeLogo      = 'File';
        $this->borderCss     = '';
        $this->logo          = '';
        $this->buttonStatus  = 'disabled';
        $this->buttonName    = 'SIGUIENTE';
        $this->msgFileUpload = '';
        $this->textLogo      = '';
        $this->comentLogo    = '';
        $this->sector        = '';
        $this->arrColorsBase   = [];
        $this->arrColorsLogo   = [];
        $this->arrColorsLetras = [];
        $this->arrColorsBordes = [];
        $this->arrColors       = Color::all();
        $this->arrCart         = [];
        $this->width           = '';
        $this->height          = '';
        $this->widthRight      = '';
        $this->widthLeft       = '';
        $this->heightHeader    = '';
        $this->heightFoot      = '';
        $this->borderRounded   = '';
        
    }
    
    
    /** Abrimos el modal y recibimos el producto id
     * que vamos a generar el  setting para cargar
     */
    public function openModalSettingCart($productId): void
    {
        // session()->forget('cart');
        // dd(session()->get('cart'));
        $this->modalOpen      = 'modal-open';
        $this->productId      = $productId;
        $this->product        = Product::findOrFail($productId);
        $this->typeProduct    = $this->product->type_product_id;
        $this->borderInclude  = $this->product->Line->border_include;
        $this->typeDesignLiso = ($this->product->Line->design == 'Liso') ? true : false;
        

        ($this->typeProduct == config('ecaptor.product.type.medida'))
        ? $this->arrFormato = ProductFormat::all()
        : $this->arrFormato = ProductFormat::getByTypeProductId(config('ecaptor.product.type.estandar'));

    }




    public function cartSetting():void
    {
        switch ($this->step) {

            case '1':
                $this->cantidadSetting();
            break;

            case '2':
                $this->borderSetting();
            break;

            case '3':
                $this->designSetting();
            break;

            case '4':
                $this->colorBaseSetting();
            break;

            case '5':
                $this->colorLogoSetting();
            break;

            case '6':
                $this->colorLetrasSetting();
            break;

            case '7':
                $this->colorBordesSetting();
            break;
        }
    }


    /**
     * Agrega al array de carrito los datos seleccionados
     * referido al producto yla cantidad
     */
    public function cantidadSetting(): void
    {

        if(config('ecaptor.product.type.medida') == $this->typeProduct)
        {

            switch ($this->formato) 
            {
    
                case config('ecaptor.tapetes.formato.redondo'):
                    
                    $this->width   = $this->diametro;
                    $this->height  = $this->diametro;
                    $mtsCuadrado   = Product::getMtsCuadradoByProduct($this->diametro, $this->diametro);
                    $price         = Product::getPriceProductByMtsCuadrardo($mtsCuadrado, $this->productId);
                    $this->borderRounded = 'rounded-full';
    
                    $this->validate([
                        'diametro' => 'required',
                    ]);
    
                break;
                
                case config('ecaptor.tapetes.formato.asimetrico'):
                    dd('asimetrico');
                break;
                
                default:
                    $mtsCuadrado  = Product::getMtsCuadradoByProduct($this->width, $this->height);
                    $price        = Product::getPriceProductByMtsCuadrardo($mtsCuadrado, $this->productId);
                break;
            }

        } else {

            $this->width  = $this->product->width;
            $this->height = $this->product->height;
            $price  = $this->product->price;
        }

       


        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'cantidad',       $this->cantidad);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'formato',        $this->formato);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.id',     $this->productId);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.design', $this->product->Line->design);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.line',   $this->product->Line->type);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.name',   $this->product->name);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.width',  $this->width);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.height', $this->height);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.price',  $price);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product.priceTotal',  ($price * $this->cantidad));

        
        if($this->borderInclude)
        {
            $this->borderType  = 'TERMOFUNDIDO';
            $this->border      = $this->cantidad;
            $this->borderLados = 'COMPLETOS';
            $this->borderSetting();
            
        }
        
        $this->step = $this->step + 1; 
    }


    /**
     * Agrega al array de carrito los datos seleccionados
     * referido a los bordes
     * En este punto Evaluo si el diseño del tapete
     * es liso o con logo
     */
    public function borderSetting(): void
    {

        $this->validate([

            'borderType' => 'required_unless:border,>,0',
            'borderLados' => 'required_if:borderType,=,ANTITROPIEZO',
        ]);

        $arrBordes = [
            'borderType' => $this->borderType,
            'borderCant' => $this->border,
            'ubicacion'  => $this->borderLados,
            'width'      => $this->width,
            'height'     => $this->height,
            'formato'    => $this->formato,
        ];

        $borderPrice = Border::getBorderPriceByMtsLineal($arrBordes);

        
        if($this->border == 0)
        {
            $this->borderType  = config('ecaptor.border.tipos.sinborde');
            $this->borderLados = config('ecaptor.border.tipos.sinborde');
        }

        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.cant',  $this->border);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.lados', $this->borderLados);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.tipo',  $this->borderType);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.unitePrice',  $borderPrice['unitePrice']);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.totalPrice',  $borderPrice['totalPrice']);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.mts',         $borderPrice['mts']);
        
        if($this->typeDesignLiso)
        {
            $this->arrCartSetting = Arr::add($this->arrCartSetting, 'design.type',  config('ecaptor.design.type.liso'));
            $this->step = $this->step + 2;
        } else {

            $this->step = $this->step + 1;
        }
    
        $this->buttonStatus = 'disabled';

    }
    

    

    /**
     * Guardamos el archivo del logo y la data
     * la agregamos en el array
     */
    public function designSetting(): void
    {

        if($this->typeLogo == 'File')
        {
            $this->validate([
                'logo' => 'required|mimes:ai,cdr,pdf|max:20480',
            ]);

            $fileName = $this->logo->getClientOriginalName();
            $extension = $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('/logos', $fileName, 'public');
            Storage::disk('local')->delete('/livewire-temp/'.$this->logo->getFilename());
            $this->arrCartSetting = Arr::add($this->arrCartSetting, 'design.content',  $fileName);
            $this->arrCartSetting = Arr::add($this->arrCartSetting, 'design.type',  config('ecaptor.design.type.archivo'));

        }else{

            $this->validate([
                'textLogo' => 'required|min:2',
            ]);

            $this->arrCartSetting = Arr::add($this->arrCartSetting, 'design.content',   $this->textLogo);
            $this->arrCartSetting = Arr::add($this->arrCartSetting, 'design.comment',   $this->comentLogo);
            $this->arrCartSetting = Arr::add($this->arrCartSetting, 'design.type',  config('ecaptor.design.type.texto'));
        }
        
        // dd($this->arrCartSetting);
        $this->step = $this->step + 1;
    }




    /**
     * Agrega al array e cart los valores del 
     * color de la base de tapete, Considero si es un tapete
     * liso o con diseño y tambien si tiene el borde incluido
     */
    public function colorBaseSetting(): void
    {
        $this->validate([
            'arrColorBase' => 'required',
        ]);


        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'color.base',   $this->arrColorBase);

        if($this->typeDesignLiso)
        {
            if(!$this->borderInclude)
            {
                if($this->validateExistBorder())
                {
                    $this->step = $this->step + 3;

                } else {

                    $this->addToCart();
                }
            } else {

                $this->addToCart();
            }
        } else {

            $this->step = $this->step + 1;
        }
    }




    /**
     * Agrega al array e cart los valores del 
     * color del logo de tapete
     */
    public function colorLogoSetting(): void
    {
        $this->validate([
            'arrColorLogo' => 'required',
        ]);

        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'color.logo',   $this->arrColorLogo);


        if(!$this->borderInclude)
        {
            if(!$this->validateExistBorder())
                $this->buttonName = 'AGREGAR AL CARRITO';
        }
        
        $this->step = $this->step + 1;
    }

    



    /**
     * Agrega al array e cart los valores del 
     * color de las letras del tapete
     */
    public function colorLetrasSetting(): void
    {
        $this->validate([
            'arrColorLetras' => 'required',
        ]);

        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'color.letras',   $this->arrColorLetras);

        if(!$this->borderInclude)
        {
            if($this->validateExistBorder())
            {
                $this->buttonName = 'AGREGAR AL CARRITO';
                $this->step = $this->step + 1;
    
            } else {
               
                $this->addToCart();
            }
        } else {
            $this->addToCart();
        }
    }




    /**
     * Agrega al array e cart los valores del 
     * color del borde del tapete
     */
    public function colorBordesSetting(): void
    {
        $this->validate([
            'arrColorBordes' => 'required',
        ]);

        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'color.bordes',   $this->arrColorBordes);
        $this->addToCart();
    }




    /**
     * Valida si se selecciono borde o no, o si el borde es
     * del tipo termofundido, para saber si agregamos el paso 
     * color de borde
     */
    private function validateExistBorder(): bool
    {
        $cantBordes = $this->arrCartSetting['bordes']['cant'];
        $tipoBorde  = $this->arrCartSetting['bordes']['tipo'];

        if( $cantBordes > 0  &&  $tipoBorde != config('ecaptor.border.tipos.termofundido'))
            return true;

        return false;
    }




    private function addToCart(): void 
    {
        

        try {
            
            $cart = session()->get('cart');

            (!empty(session()->get('cart')))
            ? $idCart = count($cart)
            : $idCart = 0;

            $cart = [ $this->arrCartSetting ];
            session()->put('cart.'.$idCart, $cart);
            redirect()->route('cart');

        } catch (GlobalException $e) {
            
            dd($e->getMessage());
        }
    }




    /**
     * Carga los colores en un array segun el sector para 
     * mostrar en el setting y para guaradr luego en la db
     */
    public function selectedColor(string $sector, int $color, string $name): void
    {
        switch ($sector) 
        {
            case 'base':
                $this->arrColorBase = Arr::add($this->arrColorBase, $color, $name);
            break;
            case 'logo':
                $this->arrColorLogo = Arr::add($this->arrColorLogo, $color, $name);
            break;
            case 'letras':
                $this->arrColorLetras = Arr::add($this->arrColorLetras, $color, $name);
            break;
            case 'bordes':
                $this->arrColorBordes = Arr::add($this->arrColorBordes, $color, $name);
            break;
            
            default:
            break;
        }
    }



    /**
     * Elimina los colores del array cuando el usuario 
     * quiere borrar lo que agrego segun el sector
     */
    public function deleteColor(string $sector, int $color): void
    {
        switch ($sector) 
        {
            case 'base':
                Arr::pull($this->arrColorBase, $color);
            break;
            case 'logo':
                Arr::pull($this->arrColorLogo, $color);
            break;
            case 'letras':
                Arr::pull($this->arrColorLetras, $color);
            break;
            case 'bordes':
                Arr::pull($this->arrColorBordes, $color);
            break;
            
            default:
            break;
        }
    }


    
    /**
     * Validamos la subida del archivo y cambiamos
     * el mensaje cuando esta ok para subirlo
     */
    public function updatedLogo()
    {
        $this->msgFileUpload = '';
        $this->buttonStatus = 'disabled';

        $this->validate([
            'logo' => 'required|mimes:ai,cdr,pdf|max:20480',
        ]);

        $this->msgFileUpload = 'Su archivo '.$this->logo->getClientOriginalName().' se subio correctamente';
        $this->buttonStatus = '';
    }



    /**
     * Elimina el archivo que se subio 
     * y resetea la variable
     */
    public function deleteTemporalLogo()
    {
        if(!empty($this->logo))
        {
            Storage::disk('local')->delete('/livewire-temp/'.$this->logo->getFilename());
            $this->reset(['logo']);
        }
    }



    /** Actualizo los select de bordes segun la cantidad
     * mayor a 1 unidad
     */
    public function updatingBorder($value)
    {
        if($value == 0)
        {
            $this->borderLados = '';
            $this->borderType  = '';
            $this->borderCss = Border::getCssUbicacionBorde('');
        }
    }



    /** Actualizo los select de bordes Ubicacion
     *  segun si seleccione o no antitropiezo
     */
    public function updatingBorderType($value)
    {
        
        if($value == 'TERMOFUNDIDO')
        {
            $this->borderLados = 'COMPLETOS';
            $this->borderCss = Border::getCssUbicacionBorde('COMPLETOS');
        }else{
            $this->borderLados = '';
            $this->borderCss = Border::getCssUbicacionBorde('');
        }
    }



    /**
     * Retorna los estilos que generan la vista del 
     * borde en la seleccion
     */
    public function updatingBorderLados($value)
    {
        $this->borderCss = Border::getCssUbicacionBorde($value);
    }
    


    public function updatingtypeLogo($value)
    {
        if($value == 'File')
        {
            $this->buttonStatus = 'disabled';

        } else {

            $this->buttonStatus = '';
            $this->msgFileUpload = '';
            $this->deleteTemporalLogo();
        }
    }

    



    /**
     * Inicializamos todas las variables
     * en un reset
     */
    public function cartReset()
    {
        $this->modalOpen = '';
        $this->step = 1;
        $this->cantidad    = 1;
        $this->border      = 0;
        $this->borderLados = '';
        $this->borderType  = '';
        $this->productId   = 0;
        $this->arrCartSetting = [];
        $this->typeLogo       = 'File';
        $this->borderCss      = '';
        $this->msgFileUpload  = '';
        $this->textLogo = '';
        $this->comentLogo = '';
        $this->arrColorBase  = [];
        $this->arrColorLogo  = [];
        $this->arrColorLetras  = [];
        $this->arrColorBordes  = [];
        $this->width           = '';
        $this->height          = '';
        $this->widthRight      = '';
        $this->widthLeft       = '';
        $this->heightHeader    = '';
        $this->heightFoot      = '';
        $this->borderRounded   = '';
        $this->formato         = 'APAISADO';
        $this->diametro        = '';


    }



    /**
     * actualiza el componente y las variables
     */
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }



    public function render()
    {
        return view('livewire.cart.shopping-add-steps');
    }
}
