@props ([
    "name" => '',
    "id" => $name,
    "required" => false,
    "label" => '',
    "image" => null
])

<label class="flex flex-col gap-2">
    <h3 class="font-medium text-slate-700 text-base">
        {{ $label }} 
        @if($required)
            <span class="text-red-500 opacity-75" aria-hidden="true">*</span>
        @endif
    </h3>
    <div 
        x-data="{ isDropping: false }" 
        x-on:dragover.prevent="isDropping = true" 
        x-on:dragleave.prevent="isDropping = false" 
        x-on:drop.prevent="isDropping = false; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'))"
        x-on:click="$refs.fileInput.click()"
        @class([
            'flex items-center justify-center p-4 border-dashed rounded-lg cursor-pointer',
            'border border-slate-300' => $errors->missing($name),
            'border-2 border-red-500' => $errors->has($name),
        ])
        :class="{'border-blue-500': isDropping, 'border-gray-300': !isDropping}">
        
        <input type="file" {{ $attributes->merge(['class' => 'hidden']) }} x-ref="fileInput" name="{{ $name }}" id="{{ $id }}" @required($required)>

        <div class="text-center">
            @if ($image)
                <p class="mt-2"> 
                    <img class="h-48" src="{{  $image->temporaryUrl() }}">
                </p>
            @else
                <p class="text-gray-500">{{ __("Drag the image here or click to select") }}</p>
            @endif
        </div>    
    </div>
    @error($name)
        <p class="text-sm text-red-500" aria-live="assertive">{{ $message }}</p>
    @enderror
    @if($image)
        <div class="flex justify-center space-x-4">
            <button type="button" wire:click="$set('{{ $name }}',null)" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">{{ __("Clear Image") }}</button>
        </div>
    @endif
</label>