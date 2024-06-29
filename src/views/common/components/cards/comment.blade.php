<div class="m-2">
    <a href="{{ !empty($comment['url']) ? $comment['url'] : '' }}"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $comment['body'] ?? '' }}</p>
        <span class="mt-4 inline-block tracking-tight text-gray-900 dark:text-white">
            Posted by: {{ $comment['email'] ?? '' }}
        </span>
    </a>
</div>
