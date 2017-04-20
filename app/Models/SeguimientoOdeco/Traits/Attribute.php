<?php

namespace App\Models\SeguimientoOdeco\Traits;


trait Attribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->hasAccion('editar-odeco'))
            return '<a href="' . route('admin.odeco.odecoSeguimiento.edit', $this) . '" class="btn btn-xs btn-success"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Editar"></i></a> ';
        else
            return ''; 
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
            if (access()->hasAccion('eliminar-odeco'))
                return '<a href="' . route('admin.odeco.odecoSeguimiento.destroy', $this) . '"
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