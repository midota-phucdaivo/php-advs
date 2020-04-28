{{-- name: $option['key'] --}}
{{-- value:  $data['form'][$option['key']] --}}
<div class="col-md-9">
    <div class="input-group">
        <div class="input-group-prepend" style="flex: 1">
        <span class="input-group-text">
            <i class="icon-camera"></i>
        </span>
        <div id="{{$option['key']}}" style="width: 100%" init-controll="upload" cs-name="{{$option['key']}}" class="cs-form-upload one">

        </div>
        </div>
    </div>
    @if($errors->has($option['key']))
        <div class="help-block"> {{$errors->first($option['key'])}}</div>
    @endif
</div>