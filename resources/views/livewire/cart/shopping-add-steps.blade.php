<div>
    <div id="my-modal" class="modal {{ $modalOpen }}">
        <div class="modal-box px-10">

            <h1 class="text-gray-900 my-5 text-center font-extrabold text-xl">AGREGAR PRODUCTO</h1>
            {{-- Setting Cantidad --}}
            @if($step == 1)
            <form wire:submit.prevent="cartSetting">
                <div class="form-control grid grid-cols-1 w-full">
                    <label class="label"><span class="label-text font-semibold">Cantidad</span></label>
                    <input wire:model="cantidad" type="number" min="1" max="500" value="1" class="input input-primary">
                </div>

                <div class="text-center grid grid-cols-1 w-full my-4">
                    <label class="label"><span class="label-text font-semibold">Formato</span></label>
                    <select wire:model="formato" class="select select-bordered  text-gray-500">
                        @if($arrFormato)
                            @foreach($arrFormato as $format)
                            <option value="{{ $format->type }}">{{ $format->type }}</option> 
                            @endforeach
                        @endIf
                    </select>
                </div>
                
                @if($typeProduct == Config::get('ecaptor.product.type.medida'))
                    <div class="text-center grid grid-cols-2 w-full my-6 gap-5">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">Ancho  - (Izquierda)</span></label> 
                            <input type="text" placeholder="Ancho en cm." class="input input-bordered">
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">Alto  - (Cabecera)</span></label>
                            <input type="text" placeholder="Alto en cm." class="input input-bordered">
                        </div>
                    </div>
                    <div class="text-center grid grid-cols-2 w-full my-6 gap-5">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">Ancho  - (Derecha)</span></label>
                            <input type="text" placeholder="Ancho en cm." class="input input-bordered">
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">Alto  - (Pie)</span></label>
                            <input type="text" placeholder="Alto en cm." class="input input-bordered">
                        </div>
                    </div>
                @endif
                
                <div class="mt-8 text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button type="submit"  class="btn btn-primary w-full">{{ $buttonName }}</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Cantidad --}}

            {{-- Setting Bordes --}}
            @if($step == 2)
            <h1 class="divider text-gray-400 mb-12 text-center font-semibold">BORDES DEL TAPETE</h1>
            <form wire:submit.prevent="cartSetting">
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
                            <label class="label"><span class="label-text font-semibold">Tapetes con Borde</span></label>
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
                    <button type="submit"  class="btn btn-primary w-full">{{ $buttonName }}</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Bordes --}}

            {{-- Setting Logo --}}
            @if($step == 3)
            <h1 class="divider text-gray-400 mb-12 text-center font-semibold">ARCHIVO O DISEÑO DE TEXTO</h1>
            <form wire:submit.prevent="cartSetting">
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
                    <button {{ $buttonStatus }}  type="submit" class="btn btn-primary w-full">{{ $buttonName }}</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Logo --}}

            {{-- Setting Colores Base --}}
            @if($step == 4)
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLOR DE LA BASE</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer" id="base">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">BASE</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        @if($arrColorBase)
                                            @foreach($arrColorBase as $i => $name)
                                            
                                            <div  wire:click="deleteColor('base', {{ $i }})" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="{{ asset('img/rubercolors/color_'.$i.'.png') }}" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorBase.base." value="{{ $i }}">
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @error('arrColorBase') 
                                    @livewire('ui.alert', [ 'message' =>  $message, 'status' => 'error'])
                                @enderror
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        @foreach($arrColors as $color)
                            <div data-tip="{{ $color->name }}" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'base',  {{ $color->code }} , '{{ $color->name }}'  )" src="{{ asset('img/rubercolors/color_'.$color->code.'.png') }}" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full">{{ $buttonName }}</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Colores base --}}

            {{-- Setting Colores Logo --}}
            @if($step == 5)
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLORES DEL LOGO</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">LOGO</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        @if($arrColorLogo)
                                            @foreach($arrColorLogo as $i => $name)
                                            
                                            <div  wire:click="deleteColor('logo', {{ $i }})" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="{{ asset('img/rubercolors/color_'.$i.'.png') }}" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorLogo.Logo." value="{{ $i }}">
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        @foreach($arrColors as $color)
                            <div data-tip="{{ $color->name }}" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'logo',  {{ $color->code }} , '{{ $color->name }}'  )" src="{{ asset('img/rubercolors/color_'.$color->code.'.png') }}" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full">{{ $buttonName }}</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Colores Logo --}}


            {{-- Setting Colores Letras --}}
            @if($step == 6)
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLORES DE LAS LETRAS</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">LETRAS</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        @if($arrColorLetras)
                                            @foreach($arrColorLetras as $i => $name)
                                            
                                            <div  wire:click="deleteColor('letras', {{ $i }})" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="{{ asset('img/rubercolors/color_'.$i.'.png') }}" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorLetras.Letras." value="{{ $i }}">
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        @foreach($arrColors as $color)
                            <div data-tip="{{ $color->name }}" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'letras',  {{ $color->code }} , '{{ $color->name }}'  )" src="{{ asset('img/rubercolors/color_'.$color->code.'.png') }}" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full">{{ $buttonName }}</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Colores Letras --}}


            {{-- Setting Colores Bordes --}}
            @if($step == 7)
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLORES DEL BORDE</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">BORDE</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        @if($arrColorBordes)
                                            @foreach($arrColorBordes as $i => $name)
                                            
                                            <div  wire:click="deleteColor('bordes', {{ $i }})" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="{{ asset('img/rubercolors/color_'.$i.'.png') }}" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorBordes.Bordes." value="{{ $i }}">
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        @foreach($arrColors as $color)
                            <div data-tip="{{ $color->name }}" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'bordes', {{ $color->code }} , '{{ $color->name }}' )" src="{{ asset('img/rubercolors/color_'.$color->code.'.png') }}" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full">{{ $buttonName }}</button> 
                </div>
            </form>
            @endif
            {{-- End Setting Colores bordes --}}
        </div>
    </div>
</div>

