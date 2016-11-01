@extends('layouts.app')

@section('content')
    {{\Auth::user()->profile}}
    {{\Session::get('roles')}}
@stop