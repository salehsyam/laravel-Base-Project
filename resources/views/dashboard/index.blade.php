@extends('layouts.admin.app')
@section('content')
   <h1>hello</h1> {{Auth()->user()->name}}
@endsection
