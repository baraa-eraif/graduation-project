@extends('dash.layout.index')
@section('content')
    <x-calendar instance="teacher" :events="$events"/>
@endsection
