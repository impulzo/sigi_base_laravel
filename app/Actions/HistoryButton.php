<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class HistoryButton extends AbstractAction
{
    public function getTitle()
    {
        return 'Historial';
    }

    public function getIcon()
    {
        return 'voyager-book';
    }

    public function getDefaultRoute()
    {
        return route('inventories.history', $this->data->id);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'inventories';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
            'style' => 'margin-right: 5px',
        ];
    }
}
