<!-- resources/views/includes/home.blade.php -->
@extends('layouts.app')

@section('content')
<h3 class='page-title text-truncate text-dark font-weight-medium mb-1'>
    {{ $welcome_string }} {{ $username }}!
</h3>

   
@endsection
