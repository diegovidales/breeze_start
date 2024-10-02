@props ([
    "name" => '',
    "id" => $name,
    "required" => false,
    "label" => ''
])
<!-- Card com Formulário -->
 <label class="flex flex-col gap-2">
    <h3 class="font-medium text-slate-700 text-base">
        {{ $label }} 
        @if($required)
            <span class="text-red-500 opacity-75" aria-hidden="true">*</span>
        @endif
    </h3>

    <input
        name = {{ $name }}
        id = {{ $id }}
        {{ $attributes->class([
            'px-3 py-2 rounded-lg',
            'border border-slate-300' => $errors->missing($name),
            'border-2 border-red-500' => $errors->has($name)
        ]) }}
        @error($name)
            aria-invalid="true"
            aria-description="{{ $message }}"
        @enderror
        @required($required)
    >
    @error($name)
        <p class="text-sm text-red-500" aria-live="assertive">{{ $message }}</p>
    @enderror
</label>