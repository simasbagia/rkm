<!-- digunakan untuk membuat textarea pada form -->
@props(['size' => 9, 'field', 'label'])
<div class="input-group mb-2">
    <textarea class="form-control" id="{{$field}}" name="{{$field}}" wire:model="{{$field}}"></textarea>
    <span for="{{$field}}" class="input-group-text">{{$label}}</span>
    @error($field) <small class="text-danger">{{ $message }}</small> @enderror

    {{$slot}}
</div>