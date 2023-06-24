@extends('errors.layout')


@section('title', 'Error')

@section('message')
    {{ $errorMessage }}
@endsection

@section('code', '404')

