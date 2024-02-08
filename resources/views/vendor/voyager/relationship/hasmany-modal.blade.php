
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ $data_relation['modalKey'] }}">
    {{ $data_relation['nom'] }}
</button>
<div class="modal fade modal-primary" id="{{ $data_relation['modalKey'] }}">
    <div class="modal-dialog modal-lg modal-80-right">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <a type="button" class="close btn btn-primary" id="{{ $data_relation['modalKey'].'iframe_loader' }}" style="margin-right: 50px; margin-bottom: 0px;" href="{{ route("voyager.".$data_relation['route'].".index", $data_relation['param']) }}"> <i class="voyager-refresh"></i> </a>
                <h4 class="modal-title"> <i class="voyager-list"></i> {{ __('Bloc du page') }}</h4>
            </div>

            <div class="modal-body">
                <iframe id="{{ $data_relation['modalKey'].'iframe_elem' }}" width="100%" height="100%" src="{{ route("voyager.".$data_relation['route'].".index", $data_relation['param']) }}"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    var iframe_loader{{$data_relation['modalKey']}} = document.getElementById("{{ $data_relation['modalKey'].'iframe_loader' }}");
    var $iframe{{$data_relation['modalKey']}} = document.getElementById("{{ $data_relation['modalKey'].'iframe_elem' }}");
    iframe_loader{{$data_relation['modalKey']}}.addEventListener('click', function (e) {
        e.preventDefault();
        $iframe{{$data_relation['modalKey']}}.src = iframe_loader{{$data_relation['modalKey']}}.href;
    })
</script>
