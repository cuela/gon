<?php

namespace App\Models\Menu\MenuTraits;


trait MenuAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->hasAccion('editar-menu'))
        return '<a href="' . route('admin.menu.menu.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        else
            return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
		if ($this->id != 1) {
            if (access()->hasAccion('eliminar-menu'))
			return '<a href="' . route('admin.menu.menu.destroy', $this) . '"
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