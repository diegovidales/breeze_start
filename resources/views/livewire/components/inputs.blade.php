<?php

use Livewire\Volt\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Attributes\Validate;

new class extends Component {
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $input_image;
    #[Validate('required|min:3')]
    public $input_text;
    #[Validate('required|numeric')]
    public $input_money;
    #[Validate('required')]
    public $input_select;

    public function save()
    {
        $this->validate();
        $this->input_image->store(path: 'public/images');
    }
}; ?>

<div>
    <h2>Inputs</h2>
    <form wire:submit='save'>
        <x-misc.separator class="mb-2"/>
        <div class="mb-3">
            <x-inputs.image wire:model.blur="input_image" name="input_image" label="{{ __('Image input') }}" :image="$input_image" required/>
        </div>
        <div class="mb-3">
            <x-inputs.text wire:model.blur="input_text" name="input_text" label="{{ __('Text input') }}" required/>
        </div>
        <div class="mb-3">
            <x-inputs.money wire:model.blur="input_money" name="input_money" label="{{ __('Money input') }}" required/>
        </div>
        <div class="mb-3">
            <x-inputs.select wire:model.blur="input_select" name="input_select" label="{{ __('Select input') }}" required>
                <option value="">-- {{ __('Choice one') }} --</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </x-inputs.select>
        </div>
        <x-buttons.primary wire:click="save">Save</x-buttons.primary>
    </form>

</div>
