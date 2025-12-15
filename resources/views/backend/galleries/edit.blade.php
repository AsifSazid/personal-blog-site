<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">
                {{ __('Edit Gallery') }}
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

        <form action="{{ route('admin.galleries.update', $gallery->uuid) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select name="type" id="type" required
                    class="mt-1 px-4 md:px-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="single" {{ $gallery->type == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="group" {{ $gallery->type == 'group' ? 'selected' : '' }}>Group</option>
                </select>
            </div>

            <!-- Parent Gallery -->
            <div class="mb-4">
                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Gallery</label>
                <select name="parent_id" id="parent_id"
                    class="mt-1 px-4 md:px-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">None</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ $gallery->parent_id == $parent->id ? 'selected' : '' }}>
                            {{ $parent->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Target -->
            <div class="mb-4">
                <label for="target" class="block text-sm font-medium text-gray-700">Target</label>
                <input type="text" name="target" id="target" value="{{ old('target', $gallery->target) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Current Image Preview -->
            @if($gallery->images->first())
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Current Image</label>
                    <img src="{{ asset('storage/images/galleries/' . $gallery->images->first()->url) }}"
                        alt="Gallery Image" class="h-32 w-auto rounded-md border mt-1">
                </div>
            @endif

            <!-- New Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Change Image</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Remarks -->
            <div class="mb-4">
                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea name="remarks" id="remarks" rows="2"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4">{{ old('remarks', $gallery->remarks) }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4 flex items-center gap-2">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <div id="statusToggle" class="relative w-10 h-5 rounded-full cursor-pointer transition-colors">
                    <div id="toggleKnob" class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-md transition-all"></div>
                </div>
                <span id="statusText" class="text-xs font-medium text-gray-700">
                    {{ $gallery->status ? 'Active' : 'Inactive' }}
                </span>
                <input type="hidden" name="status" id="status" value="{{ $gallery->status ? '1' : '0' }}">
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="flex items-center justify-center px-4 py-2 text-sm text-white rounded-md bg-primary border border-gray-300 hover:bg-primary-dark">
                    Update Gallery
                </button>
            </div>
        </form>
    </div>

    @push('js')
        <script>
            // Status toggle
            const toggle = document.getElementById('statusToggle');
            const knob = document.getElementById('toggleKnob');
            const statusInput = document.getElementById('status');
            const statusText = document.getElementById('statusText');

            // Initialize toggle
            if(statusInput.value === '1'){
                knob.style.transform = 'translateX(24px)';
                toggle.style.backgroundColor = '#22c55e';
            } else {
                knob.style.transform = 'translateX(0)';
                toggle.style.backgroundColor = '#6b7280';
            }

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
