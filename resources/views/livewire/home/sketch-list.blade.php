<div>
    <div class="card lg:card-side bordered bg-white shadow">
        <div class="card-body">

            <div class="grid grid-cols-12">
                <div class="col-span-1 my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="col-span-9">
                    <div class="text-lg font-bold">MUESTRAS / BOCETOS</div> 
                    <div class="text-sm text-gray-400">Ultimas Muestras Recibidas</div>
                </div>
                {{-- <div class="col-span-2 text-right">
                    <button class="btn bg-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </button>
                </div> --}}
            </div>
            <div class="divider opacity-10"></div> 

            <table class="table w-full table-zebra">
                <thead>
                    
                </thead> 
                <tbody>
                    @foreach ($notificationsSketchs as $sketch)
                    <tr>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="text-sm opacity-75">
                                        {{ $sketch->data['file_name'] }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-{{ (is_null($sketch->read_at)) ? 'info' : 'success' }} border-{{ (is_null($sketch->read_at)) ? 'info' : 'success' }}">
                                {{ (is_null($sketch->read_at)) ? 'Sin Confirmar' : 'Leido' }} 
                            </div>
                        </td>
                        <td>
                            <button  wire:click="goToSketchConfirm('{{ $sketch->data['sketch_id'] }}', '{{ $sketch->id }}')" class="btn btn-square btn-outline btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                </svg>
                            </button>
                        </td>  
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>