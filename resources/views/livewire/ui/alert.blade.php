<div>
    <div class="alert alert-{{ $status }} mt-7  border border-{{ $color }}-600">
        <div class="flex-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">    
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>                      
            </svg> 
            <label>{{ $message }}</label>
        </div>
    </div>
</div>
