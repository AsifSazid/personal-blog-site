<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">
                {{ __('Create Tag') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto">
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('practice_areas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Slug / Alias -->
            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" readonly
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4"></textarea>
            </div>

            <!-- Remarks -->
            <div class="mb-4">
                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea name="remarks" id="remarks" rows="2"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4"></textarea>
            </div>

            <!-- Status -->
            <div class="mb-4 flex items-center gap-2">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div id="statusToggle" class="relative w-10 h-5 rounded-full bg-gray-300 cursor-pointer transition-colors">
                    <div id="toggleKnob" class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-md transition-all"></div>
                </div>
                <span id="statusText" class="text-xs font-medium text-gray-700">Active</span>
                <input type="hidden" name="status" id="status" value="1">
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="flex items-center justify-center px-4 py-2 text-sm text-white rounded-md bg-primary border border-gray-300 hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1">
                    Create Practice Area
                </button>
            </div>
        </form>
    </div>

    @push('js')
        <script>
            // Auto-generate alias
            document.getElementById('title').addEventListener('input', function() {
                const title = this.value;
                const slug = title.toLowerCase().replace(/\s+/g, '_').replace(/[^\w_]/g, '');
                document.getElementById('slug').value = slug;
            });

            // Status toggle
            const toggle = document.getElementById('statusToggle');
            const knob = document.getElementById('toggleKnob');
            const statusInput = document.getElementById('status');
            const statusText = document.getElementById('statusText');

            toggle.addEventListener('click', () => {
                if (statusInput.value === '1') {
                    statusInput.value = '0';
                    statusText.textContent = 'Inactive';
                    knob.style.transform = 'translateX(0)';
                    toggle.style.backgroundColor = '#6b7280';
                } else {
                    statusInput.value = '1';
                    statusText.textContent = 'Active';
                    knob.style.transform = 'translateX(24px)';
                    toggle.style.backgroundColor = '#22c55e';
                }
            });
        </script>
    @endpush
</x-backend.layouts.master>
