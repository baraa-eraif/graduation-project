<textarea placeholder="{{$placeholder}}"  id="kt_docs_ckeditor_classic" name="{{ $input['model'] }}">{{ ${$input['model']} ?? null }}</textarea>

@push('script')
    <!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-inline.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-balloon.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-balloon-block.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-document.bundle.js')}}"></script>
@endpush
