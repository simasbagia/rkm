<!-- digunakan untuk membuat input teks hidden pada form -->
@props(['type' => 'hidden', 'size' => 4, 'length' => 255, 'field', 'label'])
    <input type="{{ $type }}" class="form-control" wire:model.lazy="{{ $field }}">
