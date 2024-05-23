@props(['id', 'type', 'placeholder', 'label', 'floatingLabel' => true, 'required' => false, 'disabled' => false, 'slugValue' => '', 'value' => '', 'class' => '', 'min' => 0 ])

<div class="{{ $floatingLabel ? 'form-floating' : 'form-group' }} mb-3">
    <input
        type="{{ $type }}"
        class="form-control{{ $errors->has($id) ? ' is-invalid' : '' }} {{ $floatingLabel ? ' mb-3' : '' }} {{ isset($class) ? $class : '' }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder ?? $label }}"
        name="{{ $name ?? $id }}"
        value="{{ old($id ?? $name, $value) }}"
        autocomplete="{{ $name ?? $id }}"
        min="{{ $min ?? $value }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
    >
    @if($floatingLabel)
        <label for="{{ $id }}">{{ $label }}</label>
    @endif

    @if($errors->has($id))
        <div class="invalid-feedback">
            {{ $errors->first($id) }}
        </div>
    @endif
</div>
