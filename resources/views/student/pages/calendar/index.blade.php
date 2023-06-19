@extends('dash.layout.index')
@section('content')
    <x-calendar instance="student" :events="$events"/>
@endsection
