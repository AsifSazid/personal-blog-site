<x-backend.layouts.master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h2 class="text-2xl font-semibold">Dashboard</h2>
        </div>
    </x-slot>

    <div class="p-4 overflow-hidden">
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2 lg:grid-cols-4">
            <div
                class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker border dark:border-primary-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Total Blogs
                    </h6>
                    <span class="text-2xl font-semibold">{{ $totalBlogs }}</span>
                </div>
                <div class="p-3 bg-blue-100 rounded-md dark:bg-primary-darker">
                    <svg class="w-8 h-8 text-blue-600 dark:text-primary-light" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>

            <div
                class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker border dark:border-primary-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Categories
                    </h6>
                    <span class="text-2xl font-semibold">{{ $totalCategories }}</span>
                </div>
                <div class="p-3 bg-green-100 rounded-md dark:bg-primary-darker">
                    <svg class="w-8 h-8 text-green-600 dark:text-primary-light" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                </div>
            </div>

            <div
                class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker border dark:border-primary-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Total Tags
                    </h6>
                    <span class="text-2xl font-semibold">{{ $totalTags }}</span>
                </div>
                <div class="p-3 bg-yellow-100 rounded-md dark:bg-primary-darker">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-primary-light" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                </div>
            </div>

            <div
                class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker border dark:border-primary-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Practice Areas
                    </h6>
                    <span class="text-2xl font-semibold">{{ $totalPracticeAreas }}</span>
                </div>
                <div class="p-3 bg-purple-100 rounded-md dark:bg-primary-darker">
                    <svg class="w-8 h-8 text-purple-600 dark:text-primary-light" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 p-4 bg-white rounded-md dark:bg-darker border dark:border-primary-darker">
            <h3 class="text-lg font-semibold mb-4">Total Website Hits (Last 7 Days)</h3>
            <div class="relative h-80">
                <canvas id="hitsChart"></canvas>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('hitsChart').getContext('2d');

            // Gradient তৈরি (ঐচ্ছিক, সুন্দর দেখানোর জন্য)
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.4)');
            gradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Unique Visitors',
                        data: {!! json_encode($counts) !!},
                        borderColor: '#3B82F6',
                        borderWidth: 3,
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.4, // কার্ভ লাইন
                        pointBackgroundColor: '#3B82F6',
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        } // লিজেন্ড হাইড করা
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(156, 163, 175, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
</x-backend.layouts.master>
