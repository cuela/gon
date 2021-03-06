<?php

namespace App\Models\Transparencia\GestionTraits;


trait GestionAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->hasAccion('editar-clasif-gestion'))
        return '<a href="' . route('admin.transparencia.gestion.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        else
            return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->hasAccion('eliminar-clasif-gestion'))
        
		return '<a href="' . route('admin.transparencia.gestion.destroy', $this) . '"
            data-method="delete"
            data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
            data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
            data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
            class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        else
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