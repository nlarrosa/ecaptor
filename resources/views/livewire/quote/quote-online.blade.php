
<div>
    <div class="row">
        <div class="overflow-x-auto grid grid-cols-5 gap-4">
            <div class="col-span-3">
                <div class="card shadow bg-white">
                    {{-- COTIZADOR --}}
                    <div class="card-body">
                        <div class="grid grid-cols-12">
                            <div class="col-span-1 my-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="col-span-11">
                                <div class="text-lg font-bold">COTIZADOR TAPETE A MEDIDA</div> 
                                <div class="text-sm text-gray-400">Cotiza tu tapete con logo a medida</div>
                            </div>
                        </div>
                    <div class="divider opacity-20"></div> 
                    
                        <div class="grid grid-cols-2 gap-4 mt-8">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Ancho en cm.</span> 
                                </label> 
                                <input type="text" placeholder="Ej. 210" class="input input-bordered"> 
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Alto en cm.</span> 
                                </label> 
                                <input type="text" placeholder="Ej. 95" class="input input-bordered"> 
                            </div>
                        </div>
                        <div class="form-control my-5">
                            <label class="label">
                                <span class="label-text">Cantidad</span> 
                            </label> 
                            <input type="number" min="1" max="500" value="1" class="input input-bordered"> 
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Tipo de Transito</span> 
                            </label>
                            <select class="select select-bordered w-full text-gray-500">
                                <option>Transito Medio</option> 
                                <option>Transito Pesado</option> 
                            </select>
                        </div>
                        
                    
                        <div class="divider mb-10">BORDES</div> 

                        <div class="grid grid-cols-2 gap-6">
                            <div class="avatar m-2 my-auto">
                                <div class="w-48 h-48 border border-primary">
                                    <div class="grid w-48 h-48 bg-base-300 place-items-center">content</div>
                                </div>
                            </div>
                            <div class="my-auto">
                                <div class="form-control w-full">
                                    <select class="select select-bordered w-full text-gray-500">
                                        <option disabled="disabled" selected="selected">Tapetes con Borde</option> 
                                        <option>NINGUNO</option> 
                                        <option>1</option> 
                                        <option>2</option>
                                    </select>
                                </div>
                                <div class="form-control w-full mt-4">
                                    <select class="select select-bordered w-full text-gray-500">
                                        <option disabled="disabled" selected="selected">Ubicacion del Borde</option> 
                                        <option>COMPLETOS</option> 
                                        <option>CABECERA</option> 
                                        <option>PIE</option> 
                                        <option>CABECERA / PIE</option> 
                                        <option>DRECHA / IZQUIERDA</option>
                                    </select>
                                </div>
                                <div class="form-control w-full mt-4">
                                    <select class="select select-bordered w-full text-gray-500">
                                        <option disabled="disabled" selected="selected">Tipo de Borde</option> 
                                        <option>ANTITROPIEZO</option> 
                                        <option>TERMOFUNDIDO</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-gray-900 hover:bg-500 p-2 mt-10"> COTIZAR AHORA</button>
                    </div>
                </div> 
            </div>
            {{-- Fin Cotizador --}}
            
            {{-- RESULTADO --}}
            <div class="col-span-2 col-start-4 ">
                <div class="card shadow-sm bg-gray-300">
                    <div class="card-body">
                        <div class="text-lg text-gray-900 font-bold text-center"> ¡TU COTIZACION!</div>
                        <div class="border-2 border-accent rounded-full grid grid-cols-12 p-3 my-3 mx-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 my-auto text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div class="col-span-11 text-gray-900 text-center text-5xl font-bold">$ 15.897</div>
                        </div>
                        <div class="text-sm text-gray-600 text-center">Impuesto incluido</div>

                        <div class="divider mb-8 mt-10">DETALLE</div>
                        <div class="grid mx-5 mb-3 text-center">
                            <div class="font-semibold">2 Unidades.</div>
                            <div >Tapete Captor Rulo - Transito Pesado</div>
                            <div >125 x 85 cm</div>
                        </div>

                        <div class="divider mb-10">VALOR</div>
                        <div class="grid grid-cols-2 mx-5 mb-3">
                            <div class="text-sm">SUBTOTAL</div>
                            <div class="text-right">$15.986</div>
                        </div>
                        <div class="grid grid-cols-2 mx-5 my-2">
                            <div class="text-sm">BORDES</div>
                            <div class="text-right">$15.986</div>
                        </div>
                        <div class="grid grid-cols-2 mx-5 my-2">
                            <div class="text-sm">IMPUESTOS</div>
                            <div class="text-right">$15.986</div>
                        </div>
                        <button class="btn btn-neutral p-2 bg-primary mx-10 mt-8 hover:bg-primary-focus">HACER PEDIDO</button>
                    </div>
                </div> 
            </div>
            {{-- Fin Resultado --}}
        </div>
    </div>
</div>