@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @content
  <x-loading-spinner />
@endsection
