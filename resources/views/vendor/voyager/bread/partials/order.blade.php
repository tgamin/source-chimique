@if(isset($edit) || isset($add) )
    @php
        $dataTypeContent->order = $dataTypeContent->order ? $dataTypeContent->order : intval($dataTypeContent->max('order')) + 1;
    @endphp
    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
@else
    {{ $content }}
@endif
