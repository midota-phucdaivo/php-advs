
<div
    cs-num="5"
    cs-record="10"
    cs-cur="{{$data['tableData']->currentPage()}}"
    cs-total="{{$data['tableData']->total()}}"
    cs-request="{{$data['tableData']->getOptions()['path']}}"
    cs-query="magic"
    init-controll="pagination"
    >
</div>