<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BaseModel extends Authenticatable
{
    use HasFactory;

    protected $observerKey;
    protected $observerFunction;
    protected $showAction;
    protected $cards = false;
    protected $inputs;
    protected $columns;
    protected $columnsForExcel;
    protected $columnsForImportExcel;
    protected $trashEnabled = true;
    protected $enable_fast_sale = false;
    protected $filterInputs;
    protected $filterColumns;

    public function scopeSearch($query, Request $request)
    {
        $requestValue = explode(',', $request->get('search')['value']);
        if (isset($requestValue[0], $requestValue[1])) {
            $query->where(function ($q) use ($requestValue) {
                foreach (explode('&', $requestValue[0]) as $column) {
                    if (is_numeric($requestValue[1]))
                        $q->orWhere($column, $requestValue[1]);
                    else
                        $q->orWhere($column, 'like', '%' . strtolower($requestValue[1]) . '%');
                }
            });
        }
        return $query;
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function getMenu(&$data)
    {
        return $data;
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function setCards($cards)
    {
        return $this->cards;
    }

    public function scopeDateBetween($q, $from, $to)
    {
        return isset($from) && $to ? $q->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to) : $q;
    }


    public function setInput(array $inputs)
    {
        $this->inputs = $inputs;
    }

    public function getInputs()
    {
        return $this->inputs;
    }

    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function setTrashEnabeld($enabled)
    {
        $this->trashEnabled = $enabled;
    }

    public function getTrashEnabled()
    {
        return $this->trashEnabled;
    }

    public function setColumnsForExcel($columnsForExcel)
    {
        $this->columnsForExcel = $columnsForExcel;
    }

    public function getColumnsForExcel()
    {
        return $this->columnsForExcel ?? $this->getFillable();
    }


    public function setColumnsForImportExcel($columnsForImportExcel)
    {
        $this->columnsForImportExcel = $columnsForImportExcel;
    }

    public function getColumnsForImportExcel()
    {
        return $this->columnsForImportExcel ?? $this->getFillable();
    }

    public function setShowAction(bool $bool)
    {
        $this->showAction = $bool;
    }

    public function getShowAction()
    {
        return $this->showAction;
    }

    public function setFilterInput($inputs)
    {
        $this->filterInputs = $inputs;
    }

    public function getFilterInput()
    {
        return $this->filterInputs;
    }

    public function setFilterColumns($columns)
    {
        $this->filterColumns = $columns;
    }

    public function getFilterColumns()
    {
        return $this->filterColumns ?? $this->getFillable();
    }

    public function scopeOrdered($builder)
    {
        return $builder->orderBy('created_at','desc');
    }
}
