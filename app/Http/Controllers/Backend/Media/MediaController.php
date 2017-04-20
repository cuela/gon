<?php

namespace App\Http\Controllers\Backend\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Media\Media;
use App\Http\Requests\Backend\Media\ManageRequest;
use App\Http\Requests\Backend\Media\StoreRequest;

class MediaController extends Controller
{
    

    public function index()
    {
        
        return view('backend.media.index');
    }

    
    public function create()
    {
        return view('backend.media.create');
    }

    
    public function store(StoreRequest $request)
    {
        Media::create($request->all());
        return redirect()->route('admin.media.media.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $media = Media::find($id);
        return view('backend.media.edit',[
                'media'=>$media
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
        $media = Media::find($id);
        $media->update($request->all());
        return redirect()->route('admin.media.media.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();
        return redirect()->route('admin.media.media.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(Media::all())
            ->addColumn('actions', function($media) {
                return $media->action_buttons;
            })
            ->make(true);
    }
}
