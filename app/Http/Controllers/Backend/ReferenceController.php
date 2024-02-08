<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ReferenceController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{

    public function create(Request $request)
    {
        $request->session()->put('newFolder', hexdec(uniqid()));
        $slug = $this->getSlug($request);
        
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        
        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));
        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
        
        event(new BreadDataAdded($dataType, $data));
        $url_directory = 'references/'.$request->session()->get('newFolder');
        
        if(Storage::exists($url_directory))
            Storage::move($url_directory, 'references/'.$data->id);

        return redirect()
        ->route("voyager.{$dataType->slug}.index")
        ->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }

   // POST BR(E)AD
   public function update(Request $request, $id)
   {
       $slug = $this->getSlug($request);

       $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

       // Compatibility with Model binding.
       $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

       $model = app($dataType->model_name);
       if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
           $model = $model->{$dataType->scope}();
       }
       if ($model && in_array(SoftDeletes::class, class_uses($model))) {
           $data = $model->withTrashed()->findOrFail($id);
       } else {
           $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
       }

       // Check permission
       $this->authorize('edit', $data);

       // Validate fields with ajax
       $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();
       $this->insertUpdateData($request, $slug, $dataType->editRows, $data);
       
       event(new BreadDataUpdated($dataType, $data));

       return redirect()
       ->route("voyager.{$dataType->slug}.index")
       ->with([
           'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
           'alert-type' => 'success',
       ]);
   }
}
