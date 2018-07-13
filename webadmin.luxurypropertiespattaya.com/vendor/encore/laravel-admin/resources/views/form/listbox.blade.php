<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')
        
        @php
          $select_size = '';
          if (count($options) > 0) {
            $select_size = 'size="'. count($options) .'"';
          }
        @endphp

        <select class="form-control {{$class}}" style="width: 100%;" name="{{$name}}[]" multiple="multiple" data-placeholder="{{ $placeholder }}" {!! $attributes !!} {!! $select_size !!} >
            @foreach($options as $select => $option)
                <option value="{{$select}}" {{ in_array($select, (array) old($column, $value)) ? 'selected' : '' }}>{{$option}}</option>
            @endforeach
        </select>
        <input type="hidden" name="{{$name}}[]" />

        @include('admin::form.help-block')

    </div>
</div>
