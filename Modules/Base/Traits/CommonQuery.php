<?php

namespace Modules\Base\Traits;

trait CommonQuery
{

    public $custom_relation = 'authorPerson';
    public function getQuery()
    {
        $query = $this->model->query();
        $this->queryLength($query);
        if (request()->get('search')['value']) {
            $this->setQuery($query->whereHas($this->custom_relation, function ($inner) {
                $inner->where('name', 'LIKE', '%' . request()->get('search')['value'] . '%');
            }));
        }
        if (request()->has(['start', 'length']))
            $this->setQuery($query->skip(request()->get('start'))->take(request()->get('length')));

        return $query->ordered();
    }
}
