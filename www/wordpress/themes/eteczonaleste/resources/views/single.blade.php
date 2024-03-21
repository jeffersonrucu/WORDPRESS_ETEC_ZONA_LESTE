@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @content
  <x-loading-spinner data-js="loading-spinner-main"/>
@endsection
