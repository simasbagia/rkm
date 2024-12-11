<!-- digunakan untuk membuat input teks pada form -->
@props(['type' => 'text', 'size' => 4, 'length' => 255, 'field', 'label'])
{{-- <div class="input-group mb-1">
    <input type="{{ $type }}" class="form-control" wire:model.lazy="{{ $field }}">
    <span class="input-group-text" id="{{ $field }}">{{ $label }}</span>
</div> --}}
<div class="input-group mb-1">
    <input type="{{ $type }}" class="form-control" wire:model.lazy="{{ $field }}"placeholder="{{ $field }}" aria-label="{{ $field }}" >
    <button class="btn btn-outline-secondary" type="button" wire:click="{{ $field }}">{{ $label }}</button>
  </div>