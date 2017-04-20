<?php

namespace App\Models\Contenido\Traits;


trait Attribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        /*if (access()->hasPermissions(['editar-todos-contenido'])){
            return '<a href="' . route('admin.contenido.contenido.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'  . trans('buttons.general.crud.edit') . '"></i></a> ';
        }
        if (access()->hasPermissions(['editar-propio-contenido'])){
            if($this->usuario_id == \Auth::user()->id){
                if($this->estado == 3){
                    return '<a href="' . route('admin.contenido.contenido.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'  . trans('buttons.general.crud.edit') . '"></i></a> ';
                }
            }
        }*/
        if (access()->hasAccion('publicar-articulo') || access()->hasAccion('publicar-individual')){
            return '<a href="' . route('admin.contenido.contenido.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'  . trans('buttons.general.crud.edit') . '"></i></a> ';
        }
        if($this->categoria_id=='post'){
            if (access()->hasAccion('editar-articulo')){
                if($this->estado ==1)
                    return '<a href="' . route('admin.contenido.contenido.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'  . trans('  buttons.general.crud.edit') . '"></i></a> ';
            }
        }
        if($this->categoria_id=='page'){
            if (access()->hasAccion('editar-individual')){
                if($this->estado ==1)
                    return '<a href="' . route('admin.contenido.contenido.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'  . trans('  buttons.general.crud.edit') . '"></i></a> ';
            }
        }
        


        return '';

    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        /*if (access()->hasPermissions(['editar-todos-contenido'])){
            return '<a href="' . route('admin.contenido.contenido.destroy', $this) . '"
                    data-method="delete"
                    data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                    data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                    data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                    class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }
        
        if (access()->hasPermissions(['editar-propio-contenido'])){
            if($this->usuario_id == \Auth::user()->id){
                if($this->estado == 3){
		          return '<a href="' . route('admin.contenido.contenido.destroy', $this) . '"
                    data-method="delete"
                    data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                    data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                    data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                    class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
                }
		   }
        }*/
        if($this->categoria_id=='post'){
            if (access()->hasAccion('eliminar-articulo'))
                if($this->estado ==1)
                    return '<a href="' . route('admin.contenido.contenido.destroy', $this) . '"
                        data-method="delete"
                        data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                        data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                        data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                        class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
            else
                return '';
        }
        if($this->categoria_id=='page'){
            if (access()->hasAccion('eliminar-individual'))
                if($this->estado ==1)
                    return '<a href="' . route('admin.contenido.contenido.destroy', $this) . '"
                        data-method="delete"
                        data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                        data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                        data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                        class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
            else
                return '';
        }

        return '';

    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}