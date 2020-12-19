@foreach ([ 'success', 'danger', 'warning', 'info' ] as $msg)
    @if ( session()->has($msg) )
        <div class="alert alert-{{ $msg }} alert-dismissible fade show">
            <a class="close" data-dismiss="alert" href="javascript:void(0);" title="">&times;</a>
            {{ session()->get($msg) }}
        </div>
    @endif
@endforeach
