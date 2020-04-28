@extends('admin.layouts.base')

@section('title', 'Title Page')

@section('sidebar')
    @include('admin.layouts.slidebar')
@endsection

@section('content')
<div >
    <div class="card cs-card card-accent-primary">
        <div class="card-header">
            <i class="icon-list"></i> Danh sach
            {{-- @include('admin.components.pagination') --}}
        </div>
        <div class="card-body">
        <div style="overflow: auto">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        @foreach ($data['header'] as $option)
                            @if(isset($option['view']))
                            <th>
                                {!! isset($option['title']) ? $option['title'] : '' !!}
                            </th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                @foreach ($data['tableData'] as $item)
                <tr>
                    @foreach ($data['header'] as $option)
                        @if(isset($option['view']))
                            @if(is_callable($option['view']))
                            <td>
                                {!! call_user_func($option['view'], $item) !!}
                            </td>
                            {{-- type --}}
                            @elseif(isset($option['view']['type']))
                            <td {!! isset($option['view']['attrs']) ? generateAtribute($option['view']['attrs']): '' !!}>
                                @switch($option['view']['type'])
                                    @case('checkbox')
                                        {{-- @include('admin.components.checkbox') --}}
                                        @include('admin.components.toggle')
                                        @break
                                    @case('action')
                                        @include('admin.components.action')
                                        @break
                                    @case('image')
                                        @include('admin.components.image')
                                        @break
                                    @default
                                @endswitch
                            </td>
                            @else
                                <td {!! isset($option['view']['attrs']) ? generateAtribute($option['view']['attrs']): '' !!}>
                                    {!! $item[$option['key']] !!}
                                </td>
                            @endif
                        @endif
                    @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer">
        @include('admin.components.pagination')
        </div>
    </div>
</div>
<!-- /.col-->
@endsection