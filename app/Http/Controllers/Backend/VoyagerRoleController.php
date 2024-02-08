<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class VoyagerRoleController extends VoyagerBaseController
{
    public function index(Request $request) {
        if (!\Auth::user()->hasRole('admin')) return abort(403);
        return parent::index($request);
    }
    public function show(Request $request, $id) {
        if (!\Auth::user()->hasRole('admin')) return abort(403);
        return parent::show($request, $id);
    }
    public function edit(Request $request, $id) {
        if (!\Auth::user()->hasRole('admin')) return abort(403);
        return parent::edit($request, $id);
    }

    public function create(Request $request) {
        if (!\Auth::user()->hasRole('admin')) return abort(403);
        return parent::create($request);
    }

    public function destroy(Request $request, $id) {
        if (!\Auth::user()->hasRole('admin')) return abort(403);
        return parent::destroy($request, $id);
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        if (!\Auth::user()->hasRole('admin')) return abort(403);
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        //Validate fields
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

        $data->permissions()->sync($request->input('permissions', []));

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_updated')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
    }

    // POST BRE(A)D
    public function store(Request $request)
    {
        if (!\Auth::user()->hasRole('admin')) return abort(403);
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        //Validate fields
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();

        $data = new $dataType->model_name();
        $this->insertUpdateData($request, $slug, $dataType->addRows, $data);

        $data->permissions()->sync($request->input('permissions', []));

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
    }
}
