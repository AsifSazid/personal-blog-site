<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">
                {{ $gallery->title }} {{ __('Gallery') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto">
        <div class="min-w-[300px] max-w-md mx-auto rounded-lg shadow-md overflow-hidden border border-gray-200">

            <!-- Header: Title & Status -->
            <div class="px-4 py-2 bg-gray-100 border-t text-sm text-gray-500 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $gallery->title }}</h3>
                <p><strong>Status:</strong>
                    @if ($gallery->status)
                        <span class="text-green-600 font-semibold">Active</span>
                    @else
                        <span class="text-red-600 font-semibold">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="p-4">
                <p class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Type: </label> {{ ucfirst($gallery->type ?? 'N/A') }}
                </p>

                <p class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Parent: </label>
                    {{ $gallery->parent ? $gallery->parent->title : 'None' }}
                </p>

                <p class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Target: </label> {{ $gallery->target ?? 'N/A' }}
                </p>

                <!-- Image -->
                @if($gallery->images->first())
                    <div class="text-gray-600 mt-2 mb-4">
                        <label class="font-semibold">Image: </label>
                        <img src="{{ asset('storage/images/galleries/' . $gallery->images->first()->url) }}"
                            alt="Gallery Image" class="h-32 w-auto rounded-md border mt-1">
                    </div>
                @endif

                <p class="text-gray-600 mt-2 mb-4">
                    <label class="font-semibold">Remarks: </label> {{ $gallery->remarks ?? 'No data found' }}
                </p>
            </div>

            <!-- Footer: timestamps & actions -->
            <div class="px-4 py-2 bg-gray-100 border-t text-sm text-gray-500 flex justify-between items-center">
                <div>
                    <span>Created on: {{ $gallery->created_at->format('d-M-Y H:i') }}</span>
                    <span class="px-4">Updated on: {{ $gallery->updated_at->format('d-M-Y H:i') }}</span>
                </div>
                <div>
                    <a href="{{ route('galleries.index') }}" class="inline-block text-blue-600 hover:underline px-2">← Back to list</a>
                    <a href="{{ route('galleries.edit', $gallery->uuid) }}" class="text-blue-600 hover:underline px-2">Edit</a>
                    <form action="{{ route('galleries.destroy', $gallery->uuid) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline px-2"
                                onclick="return confirm('Are you sure you want to delete this gallery?');">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @push('js')
        <script></script>
    @endpush
</x-backend.layouts.master>
