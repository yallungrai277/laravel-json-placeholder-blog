@extends('laravel-json-placeholder::blade.layouts.main')

@section('content')
    <main class="flex items-center justify-center h-screen bg-indigo-400">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                Json place-holder resources
            </h5>
            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Connect with one of our available resources.</p>
            <ul class="my-4 space-y-3">
                @foreach ($resources as $resource => $setting)
                    <li>
                        <a href="{{ $setting['uri'] }}"
                            class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            {!! $setting['svg_icon'] ?? '' !!}
                            <span class="flex-1 ms-3 whitespace-nowrap">{{ ucfirst($resource) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
@endsection
