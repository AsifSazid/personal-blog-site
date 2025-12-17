<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">
                {{ __('Create Blog') }}
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

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">
                        Category
                    </label>
                    <select name="category_id" id="category_id"
                        class="mt-1 px-4 md:px-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->uuid }}">
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Practice Area -->
                <div>
                    <label for="practice_id" class="block text-sm font-medium text-gray-700">
                        Practice Area
                    </label>
                    <select name="practice_id" id="practice_id"
                        class="mt-1 px-4 md:px-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Select Area --</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->uuid }}">
                                {{ $area->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Main Content</label>

                <!-- Hidden textarea for form submission -->
                <textarea name="content" id="content" hidden>{{ old('content') }}</textarea>

                <!-- Quill editor container -->
                <div class="quill-editor border rounded p-2" data-target-textarea="content" style="min-height: 200px;">
                    {!! old('content') !!}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Short Description (Max. 255
                        Words)</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4"></textarea>
                </div>

                <!-- Remarks -->
                <div>
                    <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                    <textarea name="remarks" id="remarks" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4"></textarea>
                </div>
            </div>


            <!-- Tag -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Tags
                </label>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    @foreach ($tags as $tag)
                        <label
                            class="flex items-center gap-2 bg-gray-50 border rounded px-3 py-2 cursor-pointer hover:bg-gray-100">
                            <input type="checkbox" name="tag_id[]" value="{{ $tag->uuid }}"
                                class="text-blue-600 focus:ring-blue-500 rounded">
                            <span class="text-sm text-gray-700">
                                {{ $tag->title }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                {{-- Image Upload --}}
                <div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Blog Image</label>
                        <input type="file" name="image" id="image" onchange="previewImage(event)"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Image Preview with Close Button --}}
                    <div class="mb-4 relative w-64">
                        <img id="image-preview" src="#" alt="Image Preview"
                            class="hidden w-full h-auto rounded-md shadow-md">
                        <button type="button" id="remove-image"
                            class="absolute top-0 right-0 mt-2 mr-2 bg-white text-red-500 rounded-full w-6 h-6 flex items-center justify-center text-sm hidden"
                            onclick="removeImage()">&times;</button>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4 flex items-center gap-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <div id="statusToggle"
                        class="relative w-10 h-5 rounded-full bg-green-500 cursor-pointer transition-colors">
                        <div id="toggleKnob"
                            class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-md transition-all"
                            style="transform: translateX(24px);">
                        </div>
                    </div>
                    <span id="statusText" class="text-xs font-medium text-gray-700">Active</span>
                    <input type="hidden" name="status" id="status" value="1">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="flex items-center justify-center px-4 py-2 text-sm text-white rounded-md bg-primary border border-gray-300 hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1">
                    Create Blog
                </button>
            </div>
        </form>
    </div>

    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                document.querySelectorAll('.quill-editor').forEach(editorDiv => {
                    const targetTextareaId = editorDiv.dataset.targetTextarea;
                    const hiddenTextarea = document.getElementById(targetTextareaId);

                    // Initialize Quill
                    const quill = new Quill(editorDiv, {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{
                                    'font': []
                                }, {
                                    'size': []
                                }],

                                ['bold', 'italic', 'underline', 'strike'],

                                [{
                                    'color': []
                                }, {
                                    'background': []
                                }],

                                [{
                                    'script': 'sub'
                                }, {
                                    'script': 'super'
                                }],

                                [{
                                    'header': 1
                                }, {
                                    'header': 2
                                }, 'blockquote', 'code-block'],

                                [{
                                    'list': 'ordered'
                                }, {
                                    'list': 'bullet'
                                }, {
                                    'indent': '-1'
                                }, {
                                    'indent': '+1'
                                }],

                                [{
                                    'direction': 'rtl'
                                }, {
                                    'align': []
                                }],

                                ['link', 'image', 'video'],

                                ['clean']
                            ]
                        }
                    });

                    // Set initial content from hidden textarea if available
                    if (hiddenTextarea.value) {
                        quill.root.innerHTML = hiddenTextarea.value;
                    }

                    // On form submit: copy Quill content to hidden textarea
                    const form = editorDiv.closest('form');
                    if (form) {
                        form.addEventListener('submit', () => {
                            hiddenTextarea.value = quill.root.innerHTML;
                        });
                    }
                });
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

            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('image-preview');
                const removeBtn = document.getElementById('remove-image');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden'); // Show image
                        removeBtn.classList.remove('hidden'); // Show cross button
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    removeImage();
                }
            }

            function removeImage() {
                const input = document.getElementById('image');
                const preview = document.getElementById('image-preview');
                const removeBtn = document.getElementById('remove-image');

                input.value = "";
                preview.src = "#";
                preview.classList.add('hidden');
                removeBtn.classList.add('hidden');
            }
        </script>
    @endpush
</x-backend.layouts.master>
