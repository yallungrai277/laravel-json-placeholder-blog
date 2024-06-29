@extends('laravel-json-placeholder::blade.layouts.main')

@section('content')
    <x-laravel-json-placeholder::page.resource-show>
        <x-laravel-json-placeholder::cards.comment :comment="$item" />
    </x-laravel-json-placeholder::page.resource-show>
@endsection
