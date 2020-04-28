{{-- name: $option['key'] --}}
{{-- value:  $data['form'][$option['key']] --}}
<div class="col-md-9">
    <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="cui-calendar"></i>
        </span>
        </div>
        {{ Form::text($option['key'], null, ['id'=> $option['key'], 'data-init-plugin'=>'datepicker', 'class' => 'form-control', 'placeholder'=> isset($option['edit']['placeholder']) ? $option['edit']['placeholder'] : '' ]) }}
    </div>
    @if($errors->has($option['key']))
        <div class="help-block"> {{$errors->first($option['key'])}}</div>
    @endif
</div>