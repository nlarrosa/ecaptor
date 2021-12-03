<div id="my-modal" class="modal ">
    <div class="modal-box">

        
        {{-- <h1 class="text-gray-700 my-5 text-center font-extrabold">SELECCIONAR BORDES</h1>
        <form class="px-6 pt-6 pb-8 mb-4 bg-white rounded">
            <div class="grid grid-cols-2 gap-6">
                <div class="avatar  my-auto">
                    <div class="w-48 h-48 border border-primary">
                        <div class="grid w-48 h-48 bg-base-300 place-items-center">content</div>
                    </div>
                </div>
                <div class="my-auto">
                    <div class="form-control w-full max-w-xs">
                        <select class="select select-bordered w-full max-w-xs text-gray-500">
                            <option disabled="disabled" selected="selected">Tapetes con Borde</option> 
                            <option>0</option> 
                            <option>1</option> 
                            <option>2</option>
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs mt-4">
                        <select class="select select-bordered w-full max-w-xs text-gray-500">
                            <option disabled="disabled" selected="selected">Ubicacion del Borde</option> 
                            <option>COMPLETOS</option> 
                            <option>CABECERA</option> 
                            <option>PIE</option> 
                            <option>CABECERA / PIE</option> 
                            <option>DRECHA / IZQUIERDA</option>
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs mt-4">
                        <select class="select select-bordered w-full max-w-xs text-gray-500">
                            <option disabled="disabled" selected="selected">Tipo de Borde</option> 
                            <option>TERMOFUNDIDO</option> 
                            <option>ANTITROPIEZO</option> 
                        </select>
                    </div>
                </div>
            </div>
        </form> --}}





        {{-- <h1 class="text-gray-700 my-5 text-center font-extrabold">SUBIR ARCHIVO / DISEÑO</h1>
        <form class="px-6 pt-6 pb-8 mb-4 bg-white">
            <select class="select select-bordered w-full mb-5">
                <option>Subir Archivo</option> 
                <option>Diseño de Texto</option> 
            </select> --}}

            {{-- <div class="grid grid-cols-1">
                <div class="my-auto">
                    <div class="form-control w-full border">
                        <textarea class="textarea h-24 textarea-bordered" placeholder="Tu Texto Aqui"></textarea>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="bg-white">
                <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                    <div class="md:flex">
                        <div class="w-full">
                            <div class="relative border-dotted h-24 rounded-lg border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                <div class="absolute">
                                    <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-blue-700"></i> <span class="block text-gray-400 font-normal">Subir tu Archivo - Click Aqui</span> </div>
                                </div> <input type="file" class="h-full w-full opacity-0" name="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="grid grid-cols-2 my-4 ">
                <div class="m-auto indicator mr-8">
                    <img src="{{ asset('img/file_design.svg') }}" alt="file-logo" class="w-32 h-32 border p-4 shadow-sm">
                </div>
                <div class="my-auto">
                    <h1 class="text-md text-gray-700 font-bold">CasaThames.ai</h1>
                    <div class="text-sm text-gray-600">20-12-2021</div>
                    <div class="indicator-item indicator-bottom indicator-center badge-lg badge badge-accent mt-2">Archivo Correcto !</div> 
                </div>
            </div> --}}

            <h1 class="text-gray-700 my-5 text-center font-extrabold">SELECCIONAR COLORES</h1>
            <div class="row">
                <div class="grid grid-cols-4 gap-1">
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">BASE</div>
                            </div>
                        </div>
                    </div>
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">LOGO</div>
                            </div>
                        </div>
                    </div>
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">LETRAS</div>
                            </div>
                        </div>
                    </div>
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">BORDES</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid grid-cols-8 my-8 gap-x-1 gap-y-1 mx-5">
                    @for($i = 1; $i <= 27; $i++)
                    <div data-tip="color_{{ $i }}" class="tooltip">
                        <img src="{{ asset('img/rubercolors/color_'.$i.'.png') }}" alt="color_violeta" class="w-10 h-10 rounded-lg">
                    </div>
                    @endfor
                </div>
            </div>
        </form>
        <div class="mt-6 text-center">
            <a href="" class="btn btn-primary w-full">SIGUIENTE</a> 
        </div>
    </div>
</div>