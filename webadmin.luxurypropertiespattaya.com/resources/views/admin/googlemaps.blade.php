<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id['lat']}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div>
      <div class="{{$viewClass['field']}} col-sm-10">

          @include('admin::form.error')
          
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon" id="span_lat">Latitude</span>
                <input type="text" class="form-control" id="label_{{$id['lat']}}" name="label_{{$name['lat']}}" value="{{ old($column['lat'], $value['lat']) }}" {!! $attributes !!} />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon" id="span_lng">Longitude</span>
                <input type="text" class="form-control" id="label_{{$id['lng']}}" name="label_{{$name['lng']}}" value="{{ old($column['lng'], $value['lng']) }}" {!! $attributes !!} />
              </div>
            </div>
          </div>
          
          <br>
          
          <div class="row">
            <div class="col-sm-12">
              <div id="map_{{$id['lat'].$id['lng']}}" style="width: 100%; height: 560px"></div>
            </div>
          </div>
          
          <input type="hidden" class="form-control" id="{{$id['lat']}}" name="{{$name['lat']}}" value="{{ old($column['lat'], $value['lat']) }}" {!! $attributes !!} />
          <input type="hidden" class="form-control" id="{{$id['lng']}}" name="{{$name['lng']}}" value="{{ old($column['lng'], $value['lng']) }}" {!! $attributes !!} />

          @include('admin::form.help-block')

      </div>
    </div>
</div>
