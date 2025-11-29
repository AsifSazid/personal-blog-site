<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">
                {{ $tag->title }} {{ __('Tag') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto">
        <div class="min-w-[300px] max-w-md mx-auto rounded-lg shadow-md overflow-hidden border border-gray-200">
            <div class="px-4 py-2 bg-gray-100 border-t text-sm text-gray-500 flex justify-between items-center">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Title: {{ $tag->title }}</h3>
                </div>
                <p><strong>Status:</strong>
                    @if ($tag->status === 'active')
                        <span class="text-green-600 font-semibold">Active</span>
                    @else
                        <span class="text-red-600 font-semibold">Inactive</span>
                    @endif
                </p>
            </div>
            <div class="p-4">
                <p class="text-gray-600 mt-2 mb-4">
                    <label for="alias" class="font-semibold">Slug: </label> {{ $tag->slug }}
                </p>
                <div class="text-gray-600 mt-2 mb-4">
                    <label for="alias" class="font-semibold">Description: </label>
                    <div>{{ $tag->description ?? 'No data Found' }}</div>
                </div>
                <div class="text-gray-600 mt-2 mb-4">
                    <label for="alias" class="font-semibold">Remarks: </label> {{ $tag->remarks ?? 'No data Found' }}
                </div>
            </div>
            <div class="px-4 py-2 bg-gray-100 border-t text-sm text-gray-500 flex justify-between items-center">
                <div>
                    <span class="">Created on: {{ $tag->created_at->format('d-M-Y H:i') }}</span>
                    <span class="px-4">Updated on: {{ $tag->updated_at->format('d-M-Y H:i') }}</span>
                </div>
                <div>
                    <a href="{{ route('tags.index') }}" class="inline-block text-blue-600 hover:underline px-2">← Back
                        to list</a>
                    <a href="{{ route('tags.edit', $tag->uuid) }}" class="text-blue-600 hover:underline px-2">Edit</a>
                    <button class="text-blue-600 hover:underline px-2">Delete</button>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script></script>
    @endpush
</x-backend.layouts.master>
