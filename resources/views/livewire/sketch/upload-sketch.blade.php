<div>
    <div id="my-modal" class="modal {{ $modalOpen }} ">
        <div class="modal-box ">

            <button wire:click="$set('modalOpen', '')" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <h1 class="text-gray-700 my-5 text-center font-extrabold">ENVIAR MUESTRA</h1>
            <form wire:submit.prevent="saveSketchs">

                <div
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <div class="bg-white mt-5 mb-10">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                            <div class="md:flex">
                                <div class="w-full">
                                    <div class="relative border-dotted h-24 rounded-lg border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                        <div class="absolute">
                                            <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-blue-700"></i> <span class="block text-gray-400 font-normal">Subir tu Archivo - Click Aqui</span> </div>
                                        </div> 
                                        <input wire:model="sketchs" type="file" multiple class="h-full w-full opacity-0" name="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="text-md text-left font-semibold py-0">{{ $sketchs->getClientOriginalName() }}</div> --}}
                        @if ($sketchs)
                            <div class="font-bold text-lg mt-5">Archivos a enviar:</div>
                            @foreach ($sketchs as $sketch)
                                <div class="text-md text-left font-semibold">{{ $sketch->getClientOriginalName() }}</div>
                            @endforeach
                        @endif
                    </div>
                    @error('sketchs.*') 
                        @livewire('ui.alert', [ 'message' =>  $message, 'status' => 'error'])
                    @enderror

                
                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress class="progress progress-primary w-full" x-bind:value="progress" x-bind:max="progress"></progress>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit" class="btn btn-primary w-full">ENVIAR</button> 
                </div>
            </form>
        </div>
    </div>
</div>
