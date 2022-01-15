<div>
    <div class="row mb-10">
        <div class="grid grid-cols-6 gap-5">
            <select wire:model="categoryFilter" class="select select-bordered w-full max-w-xs col-span-1">
                <option value="" selected="selected">Todos</option> 
                @foreach($categories as $category)
                    <option value={{ $category->id }}>{{ $category->name }}</option> 
                @endforeach
            </select>
            <div class="form-control col-span-2">
                <div class="flex space-x-2">
                    <input wire:model="search" type="text" placeholder="Buscar" class="w-full input input-bordered"> 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="grid grid-cols-2 gap-6">
            @foreach($lines as $line)
            <div key={{ $line->id }} class="card shadow-2xl lg:card-side bg-white text-primary-content">
                <div class="card-body">
                    <a href="{{ route('cart.add', ['id' => $line->id]) }}">
                        <div class="grid grid-cols-2">
                            <div class="indicator">
                                <div class="indicator-item indicator-bottom indicator-center badge badge-outline font-bold">New</div> 
                                <img src="" alt="Image Lines Captor" class="h-36 w-48 border p-4">
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 text-lg">{{ $line->name }}</div>
                                <div class="font-semibold text-primary text-md mb-10">{{ $line->type }}</div>
                                <div class="text-neutral text-sm opacity-75 mt-1">{{ $line->details }}</div>
                                <button class="btn btn-gray-900 btn-sm mt-5">COMPRAR</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</div>