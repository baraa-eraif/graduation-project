@extends('dash.layout.index')
@section('content')
    @php
        $getColumns = (new \App\Models\Semester())->getColumns();
    @endphp
    <div class="table-responsive">
        <table class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                @foreach($getColumns as $column => $type)
                    <th>{{trans("lang.$column")}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($collection as $resource)
                <tr id="row-{{get($resource,'id')}}">
                    @foreach($getColumns as  $column => $type)

                        @if($type == 'editable_input')
                            @if(in_array($column,array('start_date', 'end_date')))
                                <td>
                                    <div class="input-group">
                                        @include('dash.form.components.date',array('id' => get($resource,'id')."-id-$column",
                                        'input' => array('model' => $column),
                                        'placeholder' => trans("lang.$column"),
                                        $column => get($resource,$column),
                                        'disabled' => !is_null( get($resource,$column))
                                        ))
                                    </div>
                                </td>
                            @else
                                <td>
                                    <div class="input-group input-group-sm w-50">
                                        <input id="{{"editable_$column"}}" name="{{$column}}" type="text" maxlength="3"
                                               value="{{get($resource,$column)}}" class="form-control " @if(!is_null( get($resource,$column))) disabled @endif/>
                                    </div>
                                </td>
                            @endif
                        @elseif($type == 'status-label')
                            <td>
                                <span id="status-{{get($resource,'id')}}" class="badge py-3 px-4 fs-7 badge-light-{{get($resource,'status_class','primary')}}">{{get($resource,$column)}}</span>
                            </td>
{{--                            <td><span class="badge badge-light-{{get($resource,'status_class','primary')}} fs-7 m-1">{{get($resource,$column)}}</span></td>--}}
                        @else
                            <td>{{get($resource,$type)}}</td>
                        @endif

                    @endforeach
                    <td>
                        <button class="btn btn-primary btn-sm btn-id-{{get($resource,'id')}}" {{isset($resource['number_of_hour'],$resource['start_date'],$resource['end_date']) ? 'disabled' : ''}} data-row-id="{{get($resource,'id')}}"
                                id="accreditation">
                            اعتماد الفصل
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @push('script')
        <script>
            $(document).on('click', '#accreditation', function () {
                let row_id = $(this).data('row-id');
                let rowValues = [];
                let inputs = $(this).parent().parent().find('input');
                inputs.each(function () {
                    let value = $(this).val();
                    let name = $(this).attr('name');
                    rowValues[name] = value;
                    // rowValues.push( { value: value, name: name })
                });

                ajax_request(`admin/study-plan/accreditation`,{
                    'id' : row_id,

                    'study_plan_id' : '{{$study_plan_id ??''}}',
                    ...rowValues
                },function (response) {
                    inputs.each(function () {
                        $(this).attr('disabled',true)
                        $(`.btn-id-${row_id}`).attr('disabled',true)
                        $(`#status-${row_id}`).text('معتمد').removeClass('badge-light-danger').addClass('badge-light-success');
                    })
                })
            })
        </script>
    @endpush
@endsection
