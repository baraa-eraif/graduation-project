<!--begin::Row-->
<div class="row row-cols-lg-12 g-10">
    @foreach(get($input,'data',[]) as $title => $group)
        <!--begin::Col-->
        <div class="col">
            <!--begin::Card-->
            <div class="card card-bordered">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{$title}}</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row row-cols-1 g-10 min-h-200px draggable-zone">
                        @foreach($group as  $checkBox)
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Card-->
                                <div class="form-check">
                                    <input class="form-check-input" name="{{$checkBox}}" type="checkbox" value=""
                                           id="{{$checkBox}}"/>
                                    <label class="form-check-label" for="{{$checkBox}}">
                                        {{$checkBox}}
                                    </label>
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                        @endforeach
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    @endforeach

</div>
<!--end::Row-->
