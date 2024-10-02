@props ([
    "name" => '',
    "id" => $name,
    "required" => false,
    "label" => '',
    "currency" => 'R$'
])

<label class="flex flex-col gap-2">
    <h3 class="font-medium text-slate-700 text-base">
        {{ $label }} 
        @if($required)
            <span class="text-red-500 opacity-75" aria-hidden="true">*</span>
        @endif
    </h3>
    <div class="relative">
        <div class="absolute top-0 bottom-0 left-0 pl-3 text-gray-600 flex items-center justify-center">
            {{ $currency }} 
        </div>
        <input
            x-data
            x-mask:dynamic="$money($input)"
            name="{{ $name }}"
            id = "{{ $id }}"
            type="text"
            {{ $attributes->class([
                'px-3 py-2 rounded-lg pl-8',
                'border border-slate-300' => $errors->missing($name),
                'border-2 border-red-500' => $errors->has($name)
            ]) }}
            @required($required)
        >
    </div>
    @error($name)
        <p class="text-sm text-red-500" aria-live="assertive">{{ $message }}</p>
    @enderror
</label>