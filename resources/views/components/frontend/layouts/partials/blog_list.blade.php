@foreach ($blogs as $blog)
    <a href="{{ route('blogs.show', $blog->uuid) }}" class="blog-item" style="text-decoration: none;">
        <article class="blog-card">
            <div class="blog-card-content">
                <span class="blog-category">{{ $blog->practiceArea->title }}</span>
                <h3 class="blog-title">{{ $blog->title }}</h3>
                <p class="blog-excerpt">{{ shortContent($blog->content) }}......</p>
                <div class="blog-meta">
                    <span class="blog-date">{{ \App\Helpers\BanglaDateHelper::shortBanglaDate($blog->created_at) }}</span>
                    <span class="blog-readtime">{{ readingTime($blog->content) }}</span>
                </div>
            </div>
        </article>
    </a>
@endforeach
