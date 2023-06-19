@extends('dash.layout.index')
@section('content')
    <x-calendar instance="admin" :events="$events"/>
@endsection
