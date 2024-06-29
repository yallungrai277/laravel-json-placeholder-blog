@extends('laravel-json-placeholder::blade.layouts.main')

@section('content')
    <x-laravel-json-placeholder::page.resource-index :items="$items" resource-title="Posts">
        @foreach ($items['data'] as $item)
            <x-laravel-json-placeholder::cards.post :post="$item" />
        @endforeach
    </x-laravel-json-placeholder::page.resource-index>
@endsection
