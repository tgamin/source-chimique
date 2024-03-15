@php
    $edit = !is_null($dataTypeContent->getKey());
    $add = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height: 100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }

        .bg-tran img {
            background-image: url("{{ asset('adm/trans.svg') }}");
        }

        /* .modal-body {
                    height: 500px;
                } */
    </style>
@stop

@section('page_title', __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>

    @if (isset($dataTypeContent->id))
        @include('voyager::relationship.hasmany-modal', [
            'data_relation' => [
                'nom' => 'Sections',
                'route' => 'sections',
                'modalKey' => uniqid(),
                'param' => [
                    'page_id' => $dataTypeContent->id,
                ],
            ],
        ])
        {{-- 
        @include('voyager::relationship.hasmany-modal', [
            'data_relation' => [
                'nom' => 'Sellers',
                'route' => 'sellers',
                'modalKey' => uniqid(),
                'param' => [
                    'marque_id' => $dataTypeContent->id,
                ],
            ]
        ])
        @include('voyager::relationship.hasmany-modal', [
            'data_relation' => [
                'nom' => 'Points de vente',
                'route' => 'points',
                'modalKey' => uniqid(),
                'param' => [
                    'marque_id' => $dataTypeContent->id,
                ],
            ]
        ]) --}}
    @endif

    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
            action="@if ($edit) {{ route('voyager.' . $dataType->name . '.update', $dataTypeContent->id) }}@else{{ route('voyager.' . $dataType->name . '.store') }} @endif"
            method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if ($edit)
                {{ method_field('PUT') }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <!-- ### TITLE ### -->
                    <div class="panel">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">{{ __('Titre') }} </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                    aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('voyager::multilingual.input-hidden', [
                                '_field_name' => 'title',
                                '_field_trans' => get_field_translations($dataTypeContent, 'title'),
                            ])
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="{{ __('voyager::generic.title') }}"
                                value="{{ $dataTypeContent->title ?? '' }}">
                        </div>
                    </div>

                    {{--
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ __('Contenu') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                @php
                                    $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                    $row_order = $dataTypeRows->where('field', 'order')->first();
                                @endphp
                                @if ($row_content)
                                {!! app('voyager')->formField($row_order, $dataType, $dataTypeContent) !!}
                                @foreach (app('voyager')->afterFormFields($row_order, $dataType, $dataTypeContent) as $after)
                                    {!! $after->handle($row_content, $dataType, $dataTypeContent) !!}
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div> --}}

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ __('Contenu') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                    aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @php
                                $dataTypeRows = $dataType->{$edit ? 'editRows' : 'addRows'};
                                $exclude = [
                                    'title',
                                    'slug',
                                    'type',
                                    'parent_id',
                                    'status',
                                    'seo_description',
                                    'seo_title',
                                    'order',
                                ];
                            @endphp
                            @foreach ($dataTypeRows as $row)
                                @if (!in_array($row->field, $exclude))
                                    @php
                                        $display_options = $row->details->display ?? null;
                                    @endphp
                                    @if (isset($row->details->formfields_custom))
                                        @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                                    @else
                                        <div class="form-group @if ($row->type == 'hidden') hidden @endif @if (isset($display_options->width)) {{ 'col-md-' . $display_options->width }} @endif"
                                            @if (isset($display_options->id)) {{ "id=$display_options->id" }} @endif>
                                            {{ $row->slugify }}
                                            <label
                                                for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if ($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', [
                                                    'options' => $row->details,
                                                ])
                                            @else
                                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            @endif

                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> {{ __('Details') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                    aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group" id="typePage">
                                <label for="Type">{{ __('Type') }}</label>
                                @php
                                    $dataTypeRows = $dataType->{$edit ? 'editRows' : 'addRows'};
                                    $row_type = $dataTypeRows->where('field', 'type')->first();
                                @endphp
                                @if ($row_type)
                                    {!! app('voyager')->formField($row_type, $dataType, $dataTypeContent) !!}
                                    @foreach (app('voyager')->afterFormFields($row_type, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row_type, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group  @if ($dataTypeContent->type != 'filiale') hidden @endif" id="parentPage">
                                <label for="parent_id">{{ __('Métiers') }}</label>
                                <select class="select2" name="parent_id" id="parent_id">
                                    @foreach (getMetiers() as $metier)
                                        <option value="{{ $metier->id }}"
                                            @if ($dataTypeContent->parent_id == $metier->id) selected @endif> {{ $metier->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="slug">{{ __('voyager::post.slug') }}</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name' => 'slug',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'slug'),
                                ])
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                                    {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, 'slug') !!} value="{{ $dataTypeContent->slug ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="status">{{ __('voyager::post.status') }}</label>
                                <select class="form-control" name="status">
                                    <option value="published"@if (isset($dataTypeContent->status) && $dataTypeContent->status == 'published') selected="selected" @endif>
                                        {{ __('voyager::post.status_published') }}</option>
                                    <option value="draft"@if (isset($dataTypeContent->status) && $dataTypeContent->status == 'draft') selected="selected" @endif>
                                        {{ __('voyager::post.status_draft') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="order">{{ __('Order') }}</label>
                                @php
                                    $dataTypeRows = $dataType->{$edit ? 'editRows' : 'addRows'};
                                    $row_order = $dataTypeRows->where('field', 'order')->first();
                                @endphp
                                @if ($row_order)
                                    {!! app('voyager')->formField($row_order, $dataType, $dataTypeContent) !!}
                                    @foreach (app('voyager')->afterFormFields($row_order, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row_order, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- ### Active IMAGE ### -->
                    {{-- <div class="panel panel-bordered panel-primary" id="active_image">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Active Image</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (isset($dataTypeContent->active_image))
                                <img src="{{ filter_var($dataTypeContent->activite_image, FILTER_VALIDATE_URL) ? $dataTypeContent->activite_image : Voyager::image( $dataTypeContent->activite_image ) }}" style="width:100%" />
                            @endif
                            <input type="file" name="activite_image">
                        </div>
                    </div> --}}


                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i> {{ __('voyager::post.seo_content') }}
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                    aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="seo_title">{{ __('voyager::post.seo_title') }}</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name' => 'seo_title',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'seo_title'),
                                ])
                                <input type="text" class="form-control" name="seo_title" placeholder="SEO Title"
                                    value="{{ $dataTypeContent->seo_title ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="seo_description">{{ __('voyager::post.meta_description') }}</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name' => 'seo_description',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'seo_description'),
                                ])
                                <textarea class="form-control" name="seo_description">{{ $dataTypeContent->seo_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="admin-section-title">
                        <h3><i class="voyager-images"></i> {{ __('Images') }}</h3>
                    </div>

                    <div class="clear"></div>
                    <div id="filemanager">
                        @php
                            $config_path = config('voyager.pages.path');
                        @endphp
                        <media-manager
                            base-path="@if (isset($dataTypeContent->id)) {{ $config_path.$dataTypeContent->id.'/' }} @else {{ $config_path.request()->session()->get('newFolder').'/' }} @endif"
                            :show-folders="{{ config('voyager.pages.show_folders', false) ? 'true' : 'false' }}"
                            :allow-upload="{{ config('voyager.allow_upload', true) ? 'true' : 'false' }}"
                            :allow-move="{{ config('voyager.pages.allow_move', false) ? 'true' : 'false' }}"
                            :allow-delete="{{ config('voyager.pages.allow_delete', true) ? 'true' : 'false' }}"
                            :allow-create-folder="{{ config('voyager.pages.allow_create_folder', false) ? 'true' : 'false' }}"
                            :allow-rename="{{ config('voyager.pages.allow_rename', true) ? 'true' : 'false' }}"
                            :allow-crop="{{ config('voyager.pages.allow_crop', false) ? 'true' : 'false' }}"
                            :details="{{ json_encode(['thumbnails' => config( 'voyager.pages.thumbnails' , [['type'  => 'fit','name'  => 'thumb','width' => 249,'height'=> 225]]), 'allowed_mimetypes' => [ 'image/png', 'image/jpeg', 'image/bmp'], 'watermark' => config('voyager.media.watermark', (object)[])]) }}"
                            ></media-manager>
                    </div>
                </div>
            </div> --}}

            {{-- media manager --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="admin-section-title">
                        <h3><i class="voyager-images"></i> {{ __('Images') }}</h3>
                    </div>

                    <div class="clear"></div>
                    <div id="filemanager">
                        @php
                            $config_path = config('voyager.pages.path');
                        @endphp
                        <media-manager
                            base-path="@if (isset($dataTypeContent->id)) {{ $config_path . $dataTypeContent->id . '/' }} @else {{ $config_path . request()->session()->get('newFolder') . '/' }} @endif"
                            :show-folders="{{ config('voyager.pages.show_folders', false) ? 'true' : 'false' }}"
                            :allow-upload="{{ config('voyager.allow_upload', true) ? 'true' : 'false' }}"
                            :allow-move="{{ config('voyager.pages.allow_move', false) ? 'true' : 'false' }}"
                            :allow-delete="{{ config('voyager.pages.allow_delete', true) ? 'true' : 'false' }}"
                            :allow-create-folder="{{ config('voyager.pages.allow_create_folder', false) ? 'true' : 'false' }}"
                            :allow-rename="{{ config('voyager.pages.allow_rename', true) ? 'true' : 'false' }}"
                            :allow-crop="{{ config('voyager.pages.allow_crop', false) ? 'true' : 'false' }}"
                            {{-- :details="{{ json_encode(['thumbnails' => config('voyager.pages.thumbnails', [['type' => 'fit', 'name' => 'thumb', 'width' => 249, 'height' => 225]]), 'allowed_mimetypes' => ['image/png', 'image/jpeg', 'image/bmp'], 'watermark' => config('voyager.media.watermark', (object) [])]) }}" --}}>
                        </media-manager>
                    </div>
                </div>
            </div>
        @section('submit-buttons')
            <button type="submit" class="btn btn-primary pull-right">
                @if ($edit)
                    {{ __('Sauvegarder') }}
                @else
                    <i class="icon wb-plus-circle"></i> {{ __('Sauvegarder') }}
                @endif
            </button>
        @stop
        @yield('submit-buttons')
    </form>


    <iframe id="form_target" name="form_target" style="display:none"></iframe>
    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
        enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
        <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        {{ csrf_field() }}
    </form>
</div>

<div class="modal fade modal-danger" id="confirm_delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                </h4>
            </div>

            <div class="modal-body">
                <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger"
                    id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- End Delete File Modal -->
@stop

@section('javascript')
<script>
    if ($('#filemanager').length) {
        new Vue({
            el: '#filemanager'
        });
    }

    var params = {};
    var $file;

    function deleteHandler(tag, isMulti) {
        return function() {
            $file = $(this).siblings(tag);

            params = {
                slug: '{{ $dataType->slug }}',
                filename: $file.data('file-name'),
                id: $file.data('id'),
                field: $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
        };
    }

    $('document').ready(function() {
        $('#slug').slugify();

        $('.toggleswitch').bootstrapToggle();

        //Init datepicker for date fields if data-datepicker attribute defined
        //or if browser does not handle date inputs
        $('.form-group input[type=date]').each(function(idx, elt) {
            if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                elt.type = 'text';
                $(elt).datetimepicker($(elt).data('datepicker'));
            }
        });

        @if ($isModelTranslatable)
            $('.side-body').multilingual({
                "editing": true
            });
        @endif

        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });

        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

        $('#confirm_delete').on('click', function() {
            $.post('{{ route('voyager.' . $dataType->slug . '.media.remove') }}', params, function(
                response) {
                if (response &&
                    response.data &&
                    response.data.status &&
                    response.data.status == 200) {

                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() {
                        $(this).remove();
                    })
                } else {
                    toastr.error("Error removing file.");
                }
            });

            $('#confirm_delete_modal').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();

        $('#typePage select').on('change', function() {
            if ($(this).val() == 'filiale') $('#parentPage').removeClass('hidden')
            else $('#parentPage').addClass('hidden')
        })
    });
</script>
@stop
