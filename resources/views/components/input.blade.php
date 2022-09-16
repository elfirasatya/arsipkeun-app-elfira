<div class="form-group row">
    @isset($label)
    <label for="" class="col-md-3 col-form-label">{{$label}}</label>
    @endisset
    <div class="col-md-9">
        <input id="{{$field}}" type="{{$type}}" name="{{$field}}" @isset($value)
            value="{{ old($field) ? old($field) : $value }}" @else value="{{ old($field) }}"
            placeholder="{{ $placeholder ?? '' }}" @endisset class="form-control @error($field) is-invalid @enderror" />
        @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>