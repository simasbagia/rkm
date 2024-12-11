<!-- digunakan untuk membuat input dengan datepicke -->
@props(['size' => 4, 'field', 'label'])
<div class="input-group mb-1" x-data x-init="new Pikaday({
    field: $refs.input,
    toString(date, format) {
        const day = '0' + date.getDate();
        const month = '0' + (date.getMonth() + 1);
        const year = date.getFullYear();
        return `${year}-${month.substr(-2)}-${day.substr(-2)}`;
    },
})">


    <div class="col">
        <input type="text" x-ref="input" class="form-control" id="{{ $field }}" name="{{ $field }}"
            wire:model.lazy="{{ $field }}" autocomplete="off">
        @error($field)
            <small class="text-danger">{{ $message }}</small>
        @enderror

        {{ $slot }}
    </div>
    <span class="input-group-text" id="{{ $field }}">{{ $label }}</span>

</div>
