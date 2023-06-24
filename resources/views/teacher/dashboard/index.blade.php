@extends('dash.layout.index')
@section('content')
    <div class="mb-15">
        <x-newsBar :notifications="$notifications" />
    </div>
    <x-calendar instance="teacher" :events="$events"/>
@endsection
