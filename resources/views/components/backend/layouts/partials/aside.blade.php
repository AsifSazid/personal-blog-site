<aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
    <div class="flex flex-col h-full">

        <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">

            <a href="{{ route('dashboard') }}"
                class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11v10a1 1 0 001 1h3m-9 0h-2M9 21h6" />
                </svg>
                <span class="ml-2 text-sm">{{ __('ড্যাশবোর্ড') }}</span>
            </a>


            <div x-data="{ open: false }">
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': open }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 12h14M5 16h14" />
                    </svg>
                    <span class="ml-2 text-sm">{{ __('ব্লগ ক্যাটেগরি') }}</span>
                    <svg class="w-4 h-4 ml-auto transition-transform transform" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>

                <div x-show="open" class="space-y-2 px-7 mt-2">
                    <a href="{{ route('admin.categories.index') }}"
                        class="block p-2 text-sm hover:text-gray-700 dark:hover:text-light">
                        {{ __('সকল ক্যাটেগরি') }}
                    </a>
                    <a href="{{ route('admin.categories.create') }}"
                        class="block p-2 text-sm hover:text-gray-700 dark:hover:text-light">
                        {{ __('নতুন ক্যাটেগরি বানান') }}
                    </a>
                </div>
            </div>


            <div x-data="{ open: false }">
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': open }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h10a4 4 0 014 4v10a4 4 0 01-4 4H7a4 4 0 01-4-4V7a4 4 0 014-4z" />
                    </svg>
                    <span class="ml-2 text-sm">{{ __('ব্লগ ট্যাগ') }}</span>
                    <svg class="w-4 h-4 ml-auto transition-transform transform" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>

                <div x-show="open" class="space-y-2 px-7 mt-2">
                    <a href="{{ route('admin.tags.index') }}"
                        class="block p-2 text-sm hover:text-gray-700 dark:hover:text-light">
                        {{ __('সকল ট্যাগ') }}
                    </a>
                    <a href="{{ route('admin.tags.create') }}"
                        class="block p-2 text-sm hover:text-gray-700 dark:hover:text-light">
                        {{ __('নতুন ট্যাগ বানান') }}
                    </a>
                </div>
            </div>


            <div x-data="{ open: false }">
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': open }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2-8H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V8a2 2 0 00-2-2z" />
                    </svg>
                    <span class="ml-2 text-sm">{{ __('ব্লগ') }}</span>
                    <svg class="w-4 h-4 ml-auto transition-transform transform" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>

                <div x-show="open" class="space-y-2 px-7 mt-2">
                    <a href="{{ route('admin.blogs.index') }}"
                        class="block p-2 text-sm hover:text-gray-700 dark:hover:text-light">
                        {{ __('সকল ব্লগ') }}
                    </a>
                    <a href="{{ route('admin.blogs.create') }}"
                        class="block p-2 text-sm hover:text-gray-700 dark:hover:text-light">
                        {{ __('নতুন ব্লগ বানান') }}
                    </a>
                </div>
            </div>


            <a href="{{ route('admin.practice_areas.index') }}"
                class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="ml-2 text-sm">{{ __('সকল আইনি সেবা') }}</span>
            </a>

            <a href="{{ route('admin.galleries.index') }}"
                class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-12 5h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="ml-2 text-sm">{{ __('গ্যালারি') }}</span>
            </a>


            <a href="{{ route('admin.timelines.index') }}"
                class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                </svg>
                <span class="ml-2 text-sm">{{ __('টাইমলাইন') }}</span>
            </a>

        </nav>


        <div class="flex-shrink-0 px-2 py-4 space-y-2">
            {{-- <p>Logged In As: {{ Auth::user()->first_name }}</p> --}}
            <a href="{{ route('home') }}"
                class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark">
                <span>{{__('হোম পেইজ')}}</span>
            </a>
        </div>

    </div>
</aside>
