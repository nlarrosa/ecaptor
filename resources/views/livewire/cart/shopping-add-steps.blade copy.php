<div>
    <div id="my-modal" class="modal {{ $modalOpen }}">
        <div class="modal-box">

            {{-- Setting Bordes --}}
            <form wire:submit.prevent="cartSetting">
                @if($step == 1)
                <h1 class="text-gray-700 my-5 text-center font-extrabold text-xl">SELECCIONAR CANTIDAD TAPETES</h1>
                <div class="form-control">
                    <input wire:model="cantidad" type="number" min="1" max="500" value="1" class="input input-primary input- mx-20 my-3">
                </div> 
                <div class="divider text-gray-700 my-8 text-center font-extrabold">TAPETES CON BORDES</div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="avatar  my-auto">
                        <div class="w-48 h-48 ">
                            <div class="grid w-48 h-48 bg-base-300 mx-auto my-auto place-items-center {{ $borderCss }}">
                                {{ (!empty($borderLados) ? $borderLados : 'SIN BORDES') }}
                            </div>
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="form-control ">
                            <select wire:model="border" class="select select-bordered  text-gray-500">
                                <option value="">NINGUNO</option>
                                @for($i = 1; $i <= $cantidad; $i++) 
                                    <option>{{ $i }}</option> 
                                @endfor
                            </select>
                        </div>
                        <div class="form-control  mt-4">
                            <select wire:model="borderType" 
                                class="select select-bordered  text-gray-500" 
                                {{ ($border < 1 ) ? 'disabled': '' }}>

                                <option value="" disabled="disabled" >--- TIPO DE BORDE ---</option> 
                                <option value="TERMOFUNDIDO">TERMOFUNDIDO</option> 
                                <option value="ANTITROPIEZO">ANTITROPIEZO</option> 
                            </select>
                        </div>
                        <div class="form-control  mt-4">
                            <select wire:model="borderLados" 
                                class="select select-bordered  text-gray-500" 
                                {{ ($borderType == 'ANTITROPIEZO' ) ? '': 'disabled' }}>

                                <option value="" disabled="disabled">--- UBICACION ---</option> 
                                <option value="COMPLETOS">COMPLETOS</option> 
                                <option value="CABECERA">CABECERA</option> 
                                <option value="PIE">PIE</option> 
                                <option value="CABECERA-PIE">CABECERA / PIE</option> 
                                <option value="IZQUIERDA-DERECHA">IZQUIERDA / DERECHA</option>
                            </select>
                        </div>
                    </div>
                </div>

                @error('borderType') 
                    @livewire('ui.alert', [ 'message' =>  $message, 'status' => 'error'])
                @enderror

                @error('borderLados') 
                    @livewire('ui.alert', [ 'message' =>  $message, 'status' => 'error'])
                @enderror

                <div class="mt-8 text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button type="submit"  class="btn btn-primary w-full">SIGUIENTE</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Bordes --}}

            {{-- Setting Logo --}}
            @if($step == 2)
            <form wire:submit.prevent="cartSetting">
                <h1 class="text-gray-700 my-5 text-center text-xl font-extrabold">SUBIR ARCHIVO / DISEÑO</h1>
                <select wire:model="typeLogo" class="select select-bordered w-full mb-5">
                    <option value="File" >Subir Archivo</option> 
                    <option value="Texto">Diseño de Texto</option> 
                </select>

                @if($typeLogo == 'Texto')
                    <div class="grid grid-cols-1 mt-5 mb-10">
                        <div class="my-auto">
                            <div class="form-control w-full border">
                                <textarea wire:model="textLogo" class="text-center textarea h-32 bg-gray-100 border-2 text-lg border-gray-700" placeholder="Tu Texto del diseño aqui..."></textarea>
                            </div>
                        </div>
                        @error('textLogo') 
                            @livewire('ui.alert', [ 'message' =>  $message, 'status' => 'error'])
                        @enderror
                    </div>
                    <div class="divider text-gray-700 my-8 text-center font-extrabold">COMENTARIO SOBRE EL DISEÑO</div>
                    <div class="grid grid-cols-1 mt-5 mb-10">
                        <div class="my-auto">
                            <div class="form-control w-full border">
                                <textarea wire:model="comentLogo" class="textarea text-center h-24 border-2 border-gray-300 text-md" placeholder="Tu comentario del diseño aqui..."></textarea>
                            </div>
                        </div>
                    </div>
                @endif

                @if($typeLogo == 'File')
                    <div class="bg-white mt-5 mb-10">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                            <div class="md:flex">
                                <div class="w-full">
                                    <div class="relative border-dotted h-24 rounded-lg border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                        <div class="absolute">
                                            <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-blue-700"></i> <span class="block text-gray-400 font-normal">Subir tu Archivo - Click Aqui</span> </div>
                                        </div> 
                                        <input wire:model="logo" type="file" class="h-full w-full opacity-0" name="">
                                    </div>
                                    @error('logo') 
                                        @livewire('ui.alert', [ 'message' =>  $message, 'status' => 'error'])
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mb-10">
                    @if(!empty($msgFileUpload))
                            @livewire('ui.alert', [ 'message' =>  $msgFileUpload, 'status' => 'success'])
                     @endif
                </div>
                <div wire:loading wire:target="logo" class="mt-8 mb-12 ml-52">
                    @livewire('ui.loading')
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button {{ $buttonStatus }}  type="submit" class="btn btn-primary w-full">SIGUIENTE</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Logo --}}

            {{-- Setting Colores --}}
            @if($step == 3)
            <form wire:submit.prevent="colorSetting">
                <h1 class="text-gray-700 my-5 text-center font-extrabold">SELECCIONAR COLORES DE LA BASE</h1>
                <div class="row">
                    <div class="grid grid-cols-2 gap-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-36 border-gray-400 border" ondrop="drop(event)" ondragover="allowDrop(event)">
                                <div class="grid w-full h-36 bg-gray-100 place-items-center cursor-pointer" id="base">
                                    <div class="grid grid-cols-5 my-8 gap-x-1 gap-y-2 mx-7" id="baseColor">

                                        {{-- Aca hace copy de los colores --}}

                                    </div>
                                    <div class="text-sm text-gray-500">BASE</div>
                                </div>
                        |   </div>
                        </div>
                        <div class="avatar my-auto">
                            <div class="w-full h-36 border border-gray-400"  ondrop="drop(event)" ondragover="allowDrop(event)">
                                <div class="grid w-full h-36 bg-gray-100 select-primary place-items-center cursor-pointer" id="logo">
                                    <div class="grid grid-cols-5 my-8 gap-x-1 gap-y-2 mx-7" id="logoColor">

                                        {{-- Aca hace copy de los colores --}}
                                        
                                    </div>
                                    <div class="text-sm font-semibold text-gray-500">LOGO</div>
                                </div>
                            </div>
                        </div>
                        <div class="avatar my-auto">
                            <div class="w-full h-36 border border-gray-400"  ondrop="drop(event)" ondragover="allowDrop(event)">
                                <div class="grid w-full h-36 bg-gray-100 select-primary place-items-center cursor-pointer" id="letras">
                                    <div class="grid grid-cols-5 my-8 gap-x-1 gap-y-2 mx-7" id="letraColor">
                                        
                                        {{-- Aca hace copy de los colores --}}
                                        
                                    </div>
                                    <div class="text-sm font-semibold text-gray-500">LETRAS</div>
                                </div>
                            </div>
                        </div>
                        <div class="avatar my-auto">
                            <div class="w-full h-36 border border-gray-400"  ondrop="drop(event)" ondragover="allowDrop(event)">
                                <div class="grid w-full h-36 bg-gray-100 select-primary place-items-center cursor-pointer" id="bordes">
                                    <div class="grid grid-cols-5 my-8 gap-x-1 gap-y-2 mx-7" id="bordeColor">

                                        {{-- Aca hace copy de los colores --}}
                                        
                                    </div>
                                    <div class="text-sm font-semibold text-gray-500">BORDES</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        @for($i = 1; $i <= 27; $i++)
                            <div  draggable="true" ondragstart="drag(event)"  data-tip="color_{{ $i }}" class="tooltip cursor-pointer">
                                <img id="{{ $i }}" src="{{ asset('img/rubercolors/color_'.$i.'.png') }}" alt="color_violeta" class="w-10 h-10 rounded-lg colors">
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <button type="submit" class="btn btn-primary w-full">AGREAR AL CARRITO</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Colores --}}
        </div>
    </div>
</div>


<script>

    let arrBaseColor   = [];
    let arrLogoColor   = [];
    let arrLetrasColor = [];
    let arrBordesColor = [];

    const allowDrop = (e) => {
        e.preventDefault();
    } 
    

    const drag = (e) => {
        e.dataTransfer.setData('color', e.target.id);
    }

    const drop = (e) => {

        let data = e.dataTransfer.getData("color");
        let copyColor = document.getElementById(data).cloneNode(true);
        // @this.arrColorsBase = e.dataTransfer.getData('color');

        switch (e.target.id) {

            case 'base':
                if(!arrBaseColor.includes(data)) {
                    document.getElementById('baseColor').appendChild(copyColor);
                    arrBaseColor.push(data);
                    console.log('base ' + arrBaseColor);
                }
            break;

            case 'logo':
                if(!arrLogoColor.includes(data)) {
                    document.getElementById('logoColor').appendChild(copyColor);
                    arrLogoColor.push(data);
                    console.log('logo ' + arrLogoColor);
                }
            break;
            
            case 'letras':
                if(!arrLetrasColor.includes(data)) {
                    document.getElementById('letraColor').appendChild(copyColor);
                    arrLetrasColor.push(data);
                    console.log('letras ' + arrLetrasColor);
                }
            break;

            case 'bordes':
                if(!arrBordesColor.includes(data)) {
                    document.getElementById('bordeColor').appendChild(copyColor);
                    arrBordesColor.push(data);
                    console.log('bordes ' +arrBordesColor);
                }
            break;
        
            default:
                break;
        }
    }

</script>