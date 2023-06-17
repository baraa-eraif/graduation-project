<?php

namespace Modules\Base\Traits;

use App\Models\Company;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
use Modules\Base\Http\Exports\ModuleExport;

trait SheetManger
{

    public $filename;

    public function __construct()
    {
        $this->filename = explode('.', Route::currentRouteName())[0] . '.pdf';
    }

    public function pdf($collection, $model)
    {
        @ini_set('max_execution_time', 300);
        @ini_set('memory_limit', '512M');
        $data['collection'] = $collection;
        $data['model'] = $model;
        $pdf = LaravelMpdf::loadView('dash.export.file', $data,[], ['title' => 'Certificate','format' => 'A4-L','orientation' => 'L']);
        return $pdf->download(createUniqueFilename('pdf'));
    }


    public function excel($collection, $model)
    {
        @ini_set('max_execution_time', 300);
        @ini_set('memory_limit', '512M');
        $filename = createUniqueFilename();
        return Excel::download(new $this->export($collection, $model, $filename), $filename);
    }

    public function getExcelCollection($date)
    {
        $model = $this->getQueryForSheet($date);
        $_model = $model ?? $this->model->all();
        return $this->getResource()::Collection($_model)->toArray(request());
    }

    public function genrateImport(Request $request)
    {
        @ini_set('max_execution_time', 300);
        @ini_set('memory_limit', '512M');
        if ($this->import)
            Excel::import(new $this->import($this->model, $this), $request->file('file'));
        return back();
    }

    public function ImportExample(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        if ($this->import)
            return Excel::download(new $this->import($this->getModel(), $this), "example.xlsx");
    }

    public function getQueryForSheet($date)
    {
        if (isset($date) && count($date) > 1) {
            $startDate = Carbon::parse($date[0])->format('Y-m-d');
            $endDate = Carbon::parse($date[1])->format('Y-m-d');
            return $this->model->ordered()->whereDate('created_at_alternative', '>=', $startDate)->whereDate('created_at_alternative', '<=', $endDate)->get();
        } else
            return $this->model->get();
    }

//    public function genrate_export()
//    {
//        @ini_set('max_execution_time', 300);
//        @ini_set('memory_limit', '512M');
//        if (request()->has('type') && request()->has('daterange'))
//            if (request()->get('type') == 'excel')
//                return $this->excel();
//            else {
//                return $this->pdf();
//            }
//    }
}
