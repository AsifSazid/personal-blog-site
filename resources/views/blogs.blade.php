<x-frontend.layouts.master>
    <!-- Blog Page Body -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Legal Insights & Articles</h1>
                    <p>Expert analysis, legal updates, and practical advice on various legal matters</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="blog-filters">
                <button class="filter-btn active">সকল আর্টিক্যাল</button>
                @foreach ($practice_areas as $practice_area)
                    <button class="filter-btn" data-practice-id={{$practice_area->uuid}}>
                        {{ preg_replace('/\s*\(.*\)$/', '', $practice_area->title) }}
                    </button>
                @endforeach
            </div>

            <div class="blog-grid">
                <!-- Blog Card 1 -->
                <article class="blog-card">
                    <div class="blog-card-content">
                        <span class="blog-category">Corporate Law</span>
                        <h3 class="blog-title">Understanding New Corporate Compliance Regulations 2023</h3>
                        <p class="blog-excerpt">Recent changes in corporate governance requirements and how they impact
                            businesses of all sizes. Learn about compliance deadlines and best practices...</p>
                        <div class="blog-meta">
                            <span class="blog-date">May 15, 2023</span>
                            <span class="blog-readtime">5 min read</span>
                        </div>
                    </div>
                </article>

                <!-- Blog Card 2 -->
                <article class="blog-card">
                    <div class="blog-card-content">
                        <span class="blog-category">Real Estate</span>
                        <h3 class="blog-title">Legal Checklist for Property Purchase in 2023</h3>
                        <p class="blog-excerpt">Essential legal considerations and documentation required for safe
                            property transactions. Avoid common pitfalls in real estate deals...</p>
                        <div class="blog-meta">
                            <span class="blog-date">May 12, 2023</span>
                            <span class="blog-readtime">6 min read</span>
                        </div>
                    </div>
                </article>

                <!-- Blog Card 3 -->
                <article class="blog-card">
                    <div class="blog-card-content">
                        <span class="blog-category">Employment Law</span>
                        <h3 class="blog-title">Remote Work Policies: Legal Requirements</h3>
                        <p class="blog-excerpt">With the rise of remote work, understand the legal obligations for
                            employers and rights of employees in hybrid work environments...</p>
                        <div class="blog-meta">
                            <span class="blog-date">May 8, 2023</span>
                            <span class="blog-readtime">4 min read</span>
                        </div>
                    </div>
                </article>

                <!-- Blog Card 4 -->
                <article class="blog-card">
                    <div class="blog-card-content">
                        <span class="blog-category">Legal Updates</span>
                        <h3 class="blog-title">Supreme Court Recent Judgment Analysis</h3>
                        <p class="blog-excerpt">Breaking down the implications of recent Supreme Court decisions on
                            business contracts and commercial disputes...</p>
                        <div class="blog-meta">
                            <span class="blog-date">May 5, 2023</span>
                            <span class="blog-readtime">8 min read</span>
                        </div>
                    </div>
                </article>

                <!-- Blog Card 5 -->
                <article class="blog-card">
                    <div class="blog-card-content">
                        <span class="blog-category">Corporate Law</span>
                        <h3 class="blog-title">Merger & Acquisition Due Diligence Guide</h3>
                        <p class="blog-excerpt">Comprehensive guide to legal due diligence process in business mergers
                            and acquisitions. Key documents and risk assessment...</p>
                        <div class="blog-meta">
                            <span class="blog-date">May 1, 2023</span>
                            <span class="blog-readtime">7 min read</span>
                        </div>
                    </div>
                </article>

                <!-- Blog Card 6 -->
                <article class="blog-card">
                    <div class="blog-card-content">
                        <span class="blog-category">Intellectual Property</span>
                        <h3 class="blog-title">Protecting Your Brand: Trademark Basics</h3>
                        <p class="blog-excerpt">Essential information about trademark registration, protection, and
                            enforcement for businesses and entrepreneurs...</p>
                        <div class="blog-meta">
                            <span class="blog-date">April 28, 2023</span>
                            <span class="blog-readtime">5 min read</span>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">Next</a>
            </div>
        </div>
    </section>
</x-frontend.layouts.master>
