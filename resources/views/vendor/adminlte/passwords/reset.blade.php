@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    @yield('reset-forms')
@stop

@section('adminlte_js')
    @yield('js')
@stop
