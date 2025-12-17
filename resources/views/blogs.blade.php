<x-frontend.layouts.master>
    <!-- Blog Page Body -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>আইনি অন্তর্দৃষ্টি এবং প্রবন্ধ</h1>
                    <p>বিভিন্ন আইনি বিষয়ে বিশেষজ্ঞ বিশ্লেষণ, আইনি আপডেট এবং ব্যবহারিক পরামর্শ</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="blog-filters">
                <button class="filter-btn active">সকল আর্টিক্যাল</button>
                @foreach ($practice_areas as $practice_area)
                    <button class="filter-btn" data-practice-id={{ $practice_area->uuid }}>
                        {{ preg_replace('/\s*\(.*\)$/', '', $practice_area->title) }}
                    </button>
                @endforeach
            </div>

            <div class="blog-grid" id="blog-container">
                @include('components.frontend.layouts.partials.blog_list', ['blogs' => $blogs])
            </div>

            <div class="text-center mt-4">
                <button id="load-more-btn" class="btn btn-primary" style="{{ $totalBlogs > 12 ? '' : 'display:none;' }}"
                    data-offset="12">
                    আরো দেখুন (Load More)
                </button>
            </div>
        </div>
    </section>

    @push('js')
        @push('js')
            <script>
                const blogContainer = document.getElementById('blog-container');
                const loadMoreBtn = document.getElementById('load-more-btn');
                let currentUuid = new URLSearchParams(window.location.search).get('uuid') || '';

                // ১. ফিল্টার বাটন হ্যান্ডলিং
                document.querySelectorAll('.filter-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        currentUuid = this.getAttribute('data-practice-id') || '';

                        // UI Update
                        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');

                        // রিসেট এবং নতুন ডাটা ফেচ
                        fetchBlogs(0, true);
                    });
                });

                // ২. লোড মোর বাটন হ্যান্ডলিং
                loadMoreBtn.addEventListener('click', function() {
                    const offset = this.getAttribute('data-offset');
                    fetchBlogs(offset, false);
                });

                function fetchBlogs(offset, isFilter = false) {
                    loadMoreBtn.innerText = 'লোড হচ্ছে...';

                    const url = `/blogs?uuid=${currentUuid}&offset=${offset}`;

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (isFilter) {
                                blogContainer.innerHTML = data.html; // ফিল্টার করলে আগেরগুলো মুছে যাবে
                                loadMoreBtn.setAttribute('data-offset', 12);
                            } else {
                                blogContainer.insertAdjacentHTML('beforeend', data.html); // লোড মোর করলে নিচে যুক্ত হবে
                                loadMoreBtn.setAttribute('data-offset', parseInt(offset) + 6);
                            }

                            // বাটন দেখানো বা লুকানো
                            loadMoreBtn.style.display = data.hasMore ? 'inline-block' : 'none';
                            loadMoreBtn.innerText = 'আরো দেখুন (Load More)';

                            // URL আপডেট (রিলোড ছাড়াই)
                            const newUrl = currentUuid ? `/blogs?uuid=${currentUuid}` : '/blogs';
                            window.history.pushState({}, '', newUrl);
                        });
                }

                document.querySelectorAll('.filter-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const uuid = this.getAttribute('data-practice-id');

                        // নতুন URL তৈরি করা
                        let url = new URL(window.location.href);

                        if (uuid) {
                            // যদি uuid থাকে তবে সেটা সেট করো
                            url.searchParams.set('uuid', uuid);
                        } else {
                            // "সকল আর্টিক্যাল" বাটনের জন্য uuid রিমুভ করো
                            url.searchParams.delete('uuid');
                        }

                        // পেজ রিডাইরেক্ট করা
                        window.location.href = url.toString();
                    });
                });

                // বর্তমান সিলেক্টেড বাটনে 'active' ক্লাস ধরে রাখার লজিক
                const currentUrlParams = new URLSearchParams(window.location.search);
                const activeUuid = currentUrlParams.get('uuid');

                if (activeUuid) {
                    document.querySelectorAll('.filter-btn').forEach(btn => {
                        btn.classList.remove('active');
                        if (btn.getAttribute('data-practice-id') === activeUuid) {
                            btn.classList.add('active');
                        }
                    });
                }
            </script>
        @endpush
    @endpush
</x-frontend.layouts.master>
