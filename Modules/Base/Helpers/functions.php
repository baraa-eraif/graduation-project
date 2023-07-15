<?php


use App\Models\StudyPlan;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

function load_resource_pagination(\Illuminate\Pagination\LengthAwarePaginator $paginator, $resourceClass = null)
{
    $data = $paginator->getCollection();
    if ($resourceClass != null) {
        $data = $resourceClass::collection($paginator->getCollection());
    }
    $result['data'] = $data;
    $temp = $paginator->toArray();
    unset($temp['data']);
    $result['paginator'] = $temp;

    return $result;
}

if (!function_exists('get_resource_name')) {

    function get_resource_name($classPath)
    {
        $pathPartials = explode('\\', $classPath);
        return strtolower(end($pathPartials));
    }
}
if (!function_exists('get_class_name')) {
    function get_class_name($classPath)
    {
        if (is_object($classPath))
            $classPath = get_class($classPath);
        $pathPartials = explode('\\', $classPath);
        return end($pathPartials);
    }
}
if (!function_exists('models_path')) {
    function models_path($model)
    {
        return "App\\Models\\$model";
    }
}
if (!function_exists('exports_path')) {

    function exports_path($export)
    {
        return "App\\Exports\\$export";
    }
}

if (!function_exists('getClassPath')) {

    function getClassPath($model)
    {
        $classPath = $model;

        if (is_object($model)) {
            $classPath = get_class($model);
        }
        $isExisted = class_exists($classPath);

        if (!$isExisted)
            throw new Exception("model is supported", $model);
        return $classPath;
    }
}
if (!function_exists('routeEndsWith')) {

    function routeEndsWith($needles)
    {
        return Str::endsWith(request()->route()->getName(), $needles);
    }
}
if (!function_exists('arrayGet')) {

    function arrayGet($array, $key)
    {
        return Arr::get($array, $key);
    }
}
if (!function_exists('createUniqueFilename')) {
    function createUniqueFilename($extension = "xlsx"): string
    {
        return 'file_' . time() . mt_rand() . '.' . $extension;
    }
}
function getNote($text, $cut = true)
{
    return $text;
}

function arrayExists($array, $value)
{
    if (array_search($value, $array))
        return Arr::exists($array, array_search($value, $array));
    else
        return false;
}

function routeContains($search)
{
    return Str::contains(request()->route()->getName(), $search);
}


function arrayExclude($array, array $excludeKeys)
{
    return array_diff($array, $excludeKeys);
}

function excelToDateTimeObject($row, $fillable, $column = 'created_at')
{
    $date = $row[array_search($column, $fillable)];
    return date(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y-m-d H:i:s'));
}

function validateDate($date, $format = 'd/m/Y')
{
    $d = DateTime::createFromFormat($format, $date);
    if ($d)
        return $d->format($format);
    else
        throw new Exception('تنسيق التاريخ غير صحيح', 500);
}

function getChangeLocal()
{
    return app()->getLocale() == 'en' ? 'اللغة العربية' : 'English';
}

function getLocale()
{
    return app()->getLocale() == 'ar' ? 'en' : 'ar';
}

function getdir()
{
    return app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
}

function arrayAdd($array, $key, $value): array
{
    return Arr::add($array, $key, $value);
}

function checkGuard($name): bool
{
    return Auth::guard($name)->check();
}

function genrate_menu_item($type = 'index', $merge = [])
{
    $current_route = explode('.', current_route());
    return collect(Route::getRoutes()->getRoutesByName())->keys()->filter(function ($value) use ($type, $current_route) {
        $route = explode('.', $value);
        if (count($route) > 2 && $route[0] === $current_route[0] && routeContains($route[0]) && $route[2] == $type)
            return $value;
    })->merge($merge)->toArray();
}

function activeGuard()
{

    foreach (array_keys(config('auth.guards')) as $guard) {

        if (auth()->guard($guard)->check()) return $guard;

    }
    return null;
}

function moduleTitle()
{
    return current_route() ? Str::before(current_route(), '.') . '_dashboard' : 'root_title';
}

function supportModel($model, $model_name)
{
    if (array_key_exists($model_name, $model) && $model_name)
        return $model[$model_name];
    return [];
}

function routeContain($model)
{
    return str_contains(Route::currentRouteName(), substr($model, 0, 5));
}

function current_route()
{
    $route = explode('.', Route::currentRouteName());
    return isset($route[0],$route[1]) ? "$route[0].$route[1]" : null;
}

function model_name($model)
{
    return strtolower(class_basename($model));
}

function get_inputs($model)
{
    return $model->getInputs();
}

function get_columns($model)
{
    return $model->getColumns();
}

function sumColumn($model, $column)
{
    return $model && $column ? (float)array_sum($model->pluck($column)->toArray()) : [];
}

//function getSeller($model)
//{
//    return  Seller::find($model->seller_id) ? Seller::find($model->seller_id)->name : 'تم حذف الإسم';
//}
function get($array, $key, $default = null)
{
    return Arr::get($array, $key, $default);
}

function guardName()
{
    foreach (array_keys(config('auth.guards')) as $guard) {
        if (auth()->guard($guard)->check()) return $guard;
    }
    return null;
}

function arrayExceptByValue($array, array $keys)
{
    $response = [];
    foreach ($keys as $index => $key)
        $response[$index] = Arr::except($array, array_search($key, $array));
    return $response;
//    foreach ($keys as $key) {
//        dd(Arr::exists($array,'main'));
////       if (Arr::exists($array))
//    }
}

function oldValue($name, $value)
{
    if (isset($name) && is_array($value) && array_key_exists($name, $value))
        return old($name, $value[$name]);
    return null;
}

function getImage($image): string
{
    return $image ? url('image/' . $image) : asset('app/assets/media/image.jpg');
}

function get_user_data($col)
{
    return auth()->user() ? auth()->user()->$col : null;
}

function __genrateLabel($input): string
{
    return trans('lang.' . get($input,'label',$input['model'] ?? null));
//    return isset($input['label']) ? trans('lang.' . $input['label']) : trans('lang.' . $input['model']);
}

function genrate_time($time, $format)
{
    return isset($time, $format) ? Carbon::parse($time)->format($format) : null;
}

function arraySumCollection($args, $column)
{
    return isset($args) && count($args) ? collect($args)->sum($column) : 0;
}

function pluckArrays(...$arrays)
{
    $result = [];
    for ($x = 0; $x < count($arrays[0]); $x++)
        $result[$x] = collect($arrays)->pluck($x)->toArray();
    return $result;
}

function formatDates($dates, $format = 'Y-m-d H:i')
{
    if (!$dates)
        return $dates;
//    return $dates;
    return Carbon::parse($dates)->format($format);
}

function response_for_list($collection, $model, $paginate, $action_buttons, $addBtn = false, $exportBtn = false, $importBtn = false)
{
    return ['collection' => $collection, '_model' => $model, 'paginate' => $paginate, 'action_buttons' => $action_buttons, 'addBtn' => $addBtn, 'exportBtn' => $exportBtn, 'importBtn' => $importBtn,];
}

function title()
{
    return routeContains('create') ? trans('lang.create') : trans('lang.edit');
}

function remove_string($search, $subject)
{
    return Str::remove($search, $subject);
}

function image_url($img, $size = '')
{
    return $img ? url($img) : null;
//    return (!empty($size)) ? url('image/' . $size . '/' . $img) : url('image/' . $img);
}

function pluck_columns($column_model, $column_value = 'id', $column_title = 'name', $optional_collection = [])
{
    $model_name = str_contains($column_model, '_id') ? (str_contains(trim($column_model, '_id'), '_') ? explode('_', trim($column_model, '_id')) : trim($column_model, '_id'))
        : (str_contains($column_model, '_') ? explode('_', $column_model) : $column_model);
    $str = '';
    if (is_array($model_name))
        foreach ($model_name as $value)
            $str .= ucfirst($value);
    if (!empty($str) || isset($model_name)) {
//        dd($column_value, $column_title);
        $model_path = $str ? models_path($str) : models_path(ucfirst(Str::singular($model_name)));
        if (!class_exists($model_path))
            return;
        $model = new $model_path;
        return $model->pluck($column_value, $column_title)->toArray();
    } else {
        if (is_array($optional_collection) && count($optional_collection) > 0) {
            $data = [];
            foreach ($optional_collection as $value)
                $data[$value[$column_title]] = $value[$column_value];

            return $data;
        }
    }
}


function student_id_prefix()
{
    return '1' . now()->format('Y');
}

function get_columns_data($columns_arg)
{
    $columns = [];
    foreach (array_merge([''], $columns_arg) as $column) {
        $columns[$column] = ['data' => $column];
    }
    return $columns;
}


function get_data_table_source($_model, $columns, $others = [])
{
    return array_merge([
        'model' => $_model,
        'data_table' => get_columns_data($columns),
        'trashActions' => get($others, 'trashActions'),
        'additinal' => get($others, 'additinal'),
        'config' => get($others, 'config'),
        'appended_actions' => get($others, 'appended_actions'),
        'columns_args' => $columns
    ], $others);
}

// Helper function to map grades to grade points (based on 100-point scale)
function getGradePoints($grade)
{
    if ($grade >= 90) {
        return 4.0;
    } elseif ($grade >= 80) {
        return 3.0;
    } elseif ($grade >= 70) {
        return 2.0;
    } elseif ($grade >= 60) {
        return 1.0;
    } else {
        return 0.0;
    }
}


function send_notification_for_models($text, $model)
{
    if ($model) {
        \App\Models\Notification::create(array(
            'sourceable_id' => get($model, 'id'),
            'sourceable_model' => get_class($model),
            'text' => $text
        ));
    }
}

function current_semester()
{
    $studyPlan = StudyPlan::find(get(auth()->user(),'specialization_id'));
    return \App\Models\Semester::where('start_date', '<', now())->where('end_date', '>', now())->where('study_plan_id',$studyPlan->id ?? null)->first();
}

function current_semester_hours_count($student)
{
    if (!$student)
        return null;
        return $student->registrationCourses()->where('status', 'passed')->sum('course_data->hour_number') ?? 0;
}
