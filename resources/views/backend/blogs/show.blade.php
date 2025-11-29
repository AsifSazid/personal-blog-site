<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">
                {{ $blog->title }} {{ __('Blog') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto">
        <div class="min-w-[300px] max-w-md mx-auto rounded-lg shadow-md overflow-hidden border border-gray-200">

            <!-- Header with Title & Status -->
            <div class="px-4 py-2 bg-gray-100 border-t text-sm text-gray-500 flex justify-between items-center">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Title: {{ $blog->title }}</h3>
                </div>
                <p><strong>Status:</strong>
                    @if ($blog->status == 1)
                        <span class="text-green-600 font-semibold">Active</span>
                    @else
                        <span class="text-red-600 font-semibold">Inactive</span>
                    @endif
                </p>
            </div>

            <!-- Blog Details -->
            <div class="p-4">
                @if ($blog->images->first())
                    <div class="mb-4">
                        <img src="{{ asset('storage/images/blogs/' . $blog->images->first()->url) }}" alt="{{ $blog->title }}"
                            class="h-32 w-auto rounded-md border">
                    </div>
                @endif

                <p class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Slug: </label> {{ $blog->slug }}
                </p>

                <p class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Category: </label> {{ $blog->category->title ?? 'N/A' }}
                </p>

                <p class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Tag: </label> {{ $blog->tag->title ?? 'N/A' }}
                </p>

                <div class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Description: </label>
                    <div>{{ $blog->description ?? 'No data Found' }}</div>
                </div>

                <div class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Content: </label>
                    <div class="whitespace-pre-line">{{ $blog->content ?? 'No data Found' }}</div>
                </div>

                <div class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Remarks: </label> {{ $blog->remarks ?? 'No data Found' }}
                </div>
            </div>

            <!-- Footer with timestamps and actions -->
            <div class="px-4 py-2 bg-gray-100 border-t text-sm text-gray-500 flex justify-between items-center">
                <div>
                    <span>Created on: {{ $blog->created_at->format('d-M-Y H:i') }}</span>
                    <span class="px-4">Updated on: {{ $blog->updated_at->format('d-M-Y H:i') }}</span>
                </div>
                <div>
                    <a href="{{ route('blogs.index') }}" class="inline-block text-blue-600 hover:underline px-2">← Back
                        to list</a>
                    <a href="{{ route('blogs.edit', $blog->uuid) }}"
                        class="text-blue-600 hover:underline px-2">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog->uuid) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-600 hover:underline px-2"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @push('js')
        <script></script>
    @endpush
</x-backend.layouts.master>
