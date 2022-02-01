@extends('layouts.app')

@section('categories')
    <div id="collapsed-content">
    </div>
@endsection

@section('content')
    @if(Route::is('category.cat1'))
        <h1>Hello World</h1>
    @endif
@endsection
