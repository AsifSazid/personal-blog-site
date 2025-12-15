<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">
                {{ __('Edit Practice Area') }}
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

        <form action="{{ route('admin.practice_areas.update', $practiceArea->uuid) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $practiceArea->title) }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Slug -->
            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Alias</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $practiceArea->slug) }}"
                    readonly
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Icon -->
            <div class="mb-4">
                <label for="icon" class="block text-sm font-medium text-gray-700">Icon</label>
                <input type="text" name="icon" id="icon" value="{{ old('icon', $practiceArea->icon) }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4">{{ old('description', $practiceArea->description) }}</textarea>
            </div>

            <!-- Remarks -->
            <div class="mb-4">
                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea name="remarks" id="remarks" rows="2"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4">{{ old('remarks', $practiceArea->remarks) }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4 flex items-center gap-2">
                <label class="block text-sm font-medium text-gray-700">Status</label>

                <div id="statusToggle" class="relative w-10 h-5 rounded-full cursor-pointer transition-colors">
                    <div id="statusToggleKnob"
                        class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-md transition-all"></div>
                </div>

                <span id="statusText" class="text-xs font-medium text-gray-700">
                    {{ $practiceArea->status ? 'Active' : 'Inactive' }}
                </span>

                <input type="hidden" name="status" id="status" value="{{ $practiceArea->status ? '1' : '0' }}">
            </div>


            <!-- Showing At -->
            <div class="mb-4 flex items-center gap-2">
                <label class="block text-sm font-medium text-gray-700">Showing At</label>

                <div id="showingAtToggle" class="relative w-10 h-5 rounded-full cursor-pointer transition-colors">
                    <div id="showingAtToggleKnob"
                        class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-md transition-all"></div>
                </div>

                <span id="showingAtText" class="text-xs font-medium text-gray-700">
                    {{ $practiceArea->showing_at ? 'Active on First Page' : 'Inactive on First Page' }}
                </span>

                <input type="hidden" name="showingAt" id="showingAt"
                    value="{{ $practiceArea->showing_at ? '1' : '0' }}">
            </div>


            <div class="mt-6">
                <button type="submit"
                    class="flex items-center justify-center px-4 py-2 text-sm text-white rounded-md bg-primary border border-gray-300 hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1">
                    Update Practice Area
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
            const statusToggle = document.getElementById('statusToggle');
            const statusKnob = document.getElementById('statusToggleKnob');
            const statusInput = document.getElementById('status');
            const statusText = document.getElementById('statusText');

            // Init
            if (statusInput.value === '1') {
                statusKnob.style.transform = 'translateX(24px)';
                statusToggle.style.backgroundColor = '#22c55e';
            } else {
                statusKnob.style.transform = 'translateX(0)';
                statusToggle.style.backgroundColor = '#6b7280';
            }

            statusToggle.addEventListener('click', () => {
                const active = statusInput.value === '1';
                statusInput.value = active ? '0' : '1';
                statusText.textContent = active ? 'Inactive' : 'Active';
                statusKnob.style.transform = active ? 'translateX(0)' : 'translateX(24px)';
                statusToggle.style.backgroundColor = active ? '#6b7280' : '#22c55e';
            });


            /* ========== SHOWING AT TOGGLE ========== */
            const showingAtToggle = document.getElementById('showingAtToggle');
            const showingAtKnob = document.getElementById('showingAtToggleKnob');
            const showingAtInput = document.getElementById('showingAt');
            const showingAtText = document.getElementById('showingAtText');

            // Init
            if (showingAtInput.value === '1') {
                showingAtKnob.style.transform = 'translateX(24px)';
                showingAtToggle.style.backgroundColor = '#22c55e';
            } else {
                showingAtKnob.style.transform = 'translateX(0)';
                showingAtToggle.style.backgroundColor = '#6b7280';
            }

            showingAtToggle.addEventListener('click', () => {
                const active = showingAtInput.value === '1';
                showingAtInput.value = active ? '0' : '1';
                showingAtText.textContent = active ?
                    'Inactive on First Page' :
                    'Active on First Page';
                showingAtKnob.style.transform = active ? 'translateX(0)' : 'translateX(24px)';
                showingAtToggle.style.backgroundColor = active ? '#6b7280' : '#22c55e';
            });
        </script>
    @endpush
</x-backend.layouts.master>
