@isset($total_profitable)
<div class="row g-5 g-xl-8">
    @include('dash.custom.compounds.card',['title'=>'مربح راس المال','value'=> $total_profitable / 2,'present'=>'50'])
    @foreach($sellers as $seller)
        @include('dash.custom.compounds.card',['title'=>$seller['name'],'value'=>$seller['balance'],'present'=>'25'])
    @endforeach
</div>
@endisset
