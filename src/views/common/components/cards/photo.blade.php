<div class="m-2">
    <a href="{{ !empty($photo['url']) ? $photo['url'] : '' }}"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex align-center items-center flex-col gap-3">
            @if (!empty($photo['thumbnailUrl']))
                <img src="{{ $photo['thumbnailUrl'] }}" alt="{{ $photo['title'] ?? '' }}"
                    class="shadow rounded-full max-w-full h-auto align-middle border-none" />
            @endif
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $photo['title'] ?? '' }}</p>
        </div>
    </a>
</div>
