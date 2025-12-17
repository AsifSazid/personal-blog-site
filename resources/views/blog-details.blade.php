<x-frontend.layouts.master>
    <!-- Practice Area Details Page Body -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <span class="hero-badge">{{ $blog->practiceArea->title }}</span>
                    <h1 class="mt-2">{{ $blog->title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="practice-detail-content">
                <div class="detail-main">
                    <!-- Blog Description -->
                    @isset($blog->description)
                        <div class="blog-description">
                            <p class="description-text">{{ $blog->description }}</p>
                        </div>
                    @endisset

                    <!-- Blog Meta Info (Date & Time) -->
                    <div class="blog-meta mb-4">
                        <div class="blog-date-time">
                            <!-- পূর্ণ বাংলা তারিখ -->
                            <div class="bangla-date">
                                <i class="far fa-calendar-alt me-2"></i>
                                <span class="date-text">
                                    {{ \App\Helpers\BanglaDateHelper::toBanglaDate($blog->created_at, true, true) }}
                                </span>
                            </div>

                            <!-- অথবা সংক্ষিপ্ত ভার্সন -->
                            <div class="bangla-short-date mt-2">
                                <i class="far fa-clock me-2"></i>
                                <span class="date-text">
                                    প্রকাশিত: {{ \App\Helpers\BanglaDateHelper::shortBanglaDate($blog->created_at) }}
                                </span>
                            </div>

                            <!-- রিলেটিভ টাইম -->
                            <div class="bangla-relative-time mt-2 text-muted">
                                <small>
                                    <i class="fas fa-history me-1"></i>
                                    {{ \App\Helpers\BanglaDateHelper::toBanglaRelativeTime($blog->created_at) }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Content -->
                    <div class="service-details">
                        <div class="service-grid content-wrapper">
                            {!! $blog->content !!}
                        </div>
                    </div>

                    <!-- Case Highlight -->
                    @isset($blog->remarks)
                        <div class="case-highlight">
                            <div class="case-study">
                                <span class="result-detail"> {!! $blog->remarks !!}</span>
                            </div>
                        </div>
                    @endisset

                    &nbsp;
                    &nbsp;
                    &nbsp;

                    <!-- Blog Meta Info (Date & Time) -->
                    <div class="blog-meta">
                        <div class="blog-date-time">
                            <!-- পূর্ণ বাংলা তারিখ -->
                            <div class="bangla-date">
                                <i class="far fa-calendar-alt me-2"></i>
                                <span class="date-text">
                                    {{ \App\Helpers\BanglaDateHelper::toBanglaDate($blog->created_at, true, true) }}
                                </span>
                            </div>

                            <!-- অথবা সংক্ষিপ্ত ভার্সন -->
                            <div class="bangla-short-date mt-2">
                                <i class="far fa-clock me-2"></i>
                                <span class="date-text">
                                    প্রকাশিত: {{ \App\Helpers\BanglaDateHelper::shortBanglaDate($blog->created_at) }}
                                </span>
                            </div>

                            <!-- রিলেটিভ টাইম -->
                            <div class="bangla-relative-time mt-2 text-muted">
                                <small>
                                    <i class="fas fa-history me-1"></i>
                                    {{ \App\Helpers\BanglaDateHelper::toBanglaRelativeTime($blog->created_at) }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Blogs Section -->
    <section class="section" style="background: var(--surface);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('এ সম্পর্কিত আরো ব্লগ দেখুন') }}</h2>
                <p class="section-subtitle">{{ __('সংশ্লিষ্ট বিষয়ের সাম্প্রতিক প্রবন্ধ ও নিবন্ধসমূহ') }}</p>
            </div>

            <div class="blog-grid">
                @foreach ($relatedBlogs as $relatedBlog)
                    <!-- Blog Card 1 -->
                    <a href="{{ route('blogs.show', $relatedBlog->uuid) }}" style="text-decoration: none;">
                        <article class="blog-card">
                            <div class="blog-card-content">
                                <span class="blog-category">{{ $relatedBlog->practiceArea->title }}</span>
                                <h3 class="blog-title">{{ $relatedBlog->title }}</h3>
                                <p class="blog-excerpt">{{ shortContent($relatedBlog->content) }}......</p>
                                <div class="blog-meta">
                                    <span
                                        class="blog-date">{{ \App\Helpers\BanglaDateHelper::shortBanglaDate($blog->created_at) }}</span>
                                    <span class="blog-readtime">{{ readingTime($blog->content) }}</span>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend.layouts.master>
