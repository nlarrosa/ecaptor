<div>
    <div class="row">
        <div class="overflow-x-auto grid grid-cols-5 gap-4">
            <div class="col-span-3 col-start-2">
                <div class="card shadow bg-white">
                    {{-- COTIZADOR --}}
                    <div class="card-body">
                        <div class="grid grid-cols-12">
                            <div class="col-span-1 my-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="col-span-9">
                                <div class="text-lg font-bold">CONFIRMAR MUESTRA!</div> 
                                <div class="text-sm text-gray-400">Aprueba o rechaza la muestra de tu tapete</div>
                            </div>
                            <div class="col-span-2 text-right">
                                {{-- <button class="btn bg-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                    </svg>
                                </button> --}}
                                <div class="grid w-32 h-10 rounded bg-{{ $saleSketchStatus['color']}} text-primary-content place-content-center">{{ $saleSketchStatus['status'] }}</div> 
                            </div>
                        </div>
                        <div class="divider opacity-10"></div> 

                        <div class="avatar m-2 my-auto">
                            <div class="border border-primary w-full">
                                <div class="grid w-full h-full bg-base-300 place-items-center">
                                    <img src="{{ $imagePath }}" alt="" >
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 mt-5">
                            <button wire:click="confirmSketch" class="btn bg-success hover:bg-accent-focus p-3 m-4" {{ $btnDisabledConfirm }}>APROBAR</button>
                            <button wire:click="rechazarSketch" class="btn bg-error hover:bg-error p-3 m-4" {{ $btnDisabledModify }}>MODIFICAR</button>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

        {{-- <x-modal-sketch-coment /> --}}

    </div>
</div>
