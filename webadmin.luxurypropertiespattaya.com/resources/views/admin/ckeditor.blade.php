<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-10">

        @include('admin::form.error')

        <textarea class="form-control {{$class}}" id="{{$id}}" name="{{$name}}" placeholder="{{ $placeholder }}" {!! $attributes !!} >{{ old($column, $value) }}</textarea>

        @include('admin::form.help-block')

    </div>
</div>

<script src="{{ asset('packages/ckeditor/ckeditor.js') }}" crossorigin="anonymous"></script>
<script>
CKEDITOR.replace('{{ $id }}', {
  customConfig : '{{ asset('packages/ckeditor/standard-config.js') }}',
  filebrowserBrowseUrl : '{{ asset('packages/ckfinder/ckfinder.html') }}',
  filebrowserImageBrowseUrl : '{{ asset('packages/ckfinder/ckfinder.html?type=Images') }}',
  // filebrowserFlashBrowseUrl : '{{ asset('packages/ckfinder/ckfinder.html?type=Flash') }}',
  filebrowserUploadUrl : '{{ asset('packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
  filebrowserImageUploadUrl : '{{ asset('packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
  // filebrowserFlashUploadUrl : '{{ asset('packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
  width: '100%',
  height: '400px',
  // colorButton_colors: 'FontColor1/FF9900,FontColor2/0066CC,FontColor3/F00',
});
</script>
