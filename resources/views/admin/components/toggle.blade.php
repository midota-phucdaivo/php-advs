
<div class="cs-toggle {!!  $item[$option['key']] == 1 ? 'checked' : '' !!}"
    cs-request="{{url()->action($data['controller'].'@active', $item['id'])}}"
></div>