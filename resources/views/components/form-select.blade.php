<!-- digunakan untuk membuat input select box pada form -->
@props(['size' => 4, 'field', 'label'])

<div class="input-group mb-1">
    <select class="form-select" id="{{ $field }}" wire:model="{{ $field }}">
        {{ $slot }}
    </select>
    <label class="input-group-text" for="{{ $field }}">{{ $label }}</label>
    @error($field)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
