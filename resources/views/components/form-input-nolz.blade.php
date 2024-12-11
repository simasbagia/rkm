<!-- digunakan untuk membuat input teks pada form -->
@props(['type' => 'text', 'size' => 4, 'length' => 255, 'field', 'label'])
<div class="input-group mb-2">
    <input type="{{ $type }}" class="form-control" wire:model="{{ $field }}">
    <span class="input-group-text" id="{{ $field }}">{{ $label }}</span>
</div>
