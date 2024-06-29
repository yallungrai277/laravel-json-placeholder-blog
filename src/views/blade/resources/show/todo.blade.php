@extends('laravel-json-placeholder::blade.layouts.main')

@section('content')
    <x-laravel-json-placeholder::page.resource-show>
        <x-laravel-json-placeholder::cards.todo :todo="$item" />
    </x-laravel-json-placeholder::page.resource-show>
@endsection
