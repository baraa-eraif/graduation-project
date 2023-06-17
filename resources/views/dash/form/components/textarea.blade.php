<div class="form-floating">
    <textarea class="form-control" placeholder="Leave a comment here" name="{{ $input['model'] }}" id="floatingTextarea2" style="height: 100px">{{ ${$input['model']}  ?? null  }}</textarea>
    <label for="floatingTextarea2">{{ trans('lang.'.$input['model']) }}</label>
</div>
