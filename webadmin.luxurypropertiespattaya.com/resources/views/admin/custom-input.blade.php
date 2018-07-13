<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    
    <div class="col-sm-{{ $columnSize }}">

        @include('admin::form.error')
        
        <input type="{{ $type }}" class="form-control {{ $class }}" id="{{ $id }}" name="{{ $name }}" placeholder="{{ $holdertext }}" {!! $attributes !!} value="{{ old($column, $value) }}">

        @include('admin::form.help-block')

    </div>
</div>
