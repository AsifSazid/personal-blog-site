<x-frontend.layouts.master>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badges">
                        <span class="hero-badge">৭+ বছরের অভিজ্ঞতা</span>
                        <span class="hero-badge">সিনিয়র অ্যাডভোকেট</span>
                        <span class="hero-badge">সুপ্রিম কোর্ট</span>
                    </div>
                    <h1>আইন, রাজনীতি এবং অধিকার</h1>
                    <p>কর্পোরেট আইন এবং দেওয়ানি মামলা-মোকদ্দমায় সততা, নিষ্ঠা এবং প্রমাণিত ফলাফলের সাথে বিশেষজ্ঞ আইনি পরামর্শ এবং প্রতিনিধিত্ব প্রদান।</p>
                    <div class="hero-actions">
                        <a href="/contact" class="btn">
                            <i class="fas fa-calendar-check"></i>
                            পরামর্শের জন্য সময় বুক করুন
                        </a>
                        <a href="/cases" class="btn btn-outline">
                            <i class="fas fa-gavel"></i>
                            ব্লগ দেখুন
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=400&h=500&fit=crop"
                        alt="Advocate Nazmul Hossain" class="hero-avatar">
                </div>
            </div>
        </div>
    </section>

    <!-- Practice Areas -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">এক্সপার্টাইস</span>
                <h2 class="section-title">আইনি সেবাসমূহ</h2>
                <p class="section-subtitle">আপনার নির্দিষ্ট চাহিদা এবং উদ্দেশ্য অনুসারে তৈরি বিস্তৃত আইনি পরিষেবা</p>
            </div>
            <div class="practice-grid">
                @foreach ($p_areas as $key => $p_area)
                    <div class="practice-card">
                        <div class="practice-icon">
                            {!! $p_area->icon !!}
                        </div>
                        <h3 class="practice-title">{{$p_area->title}}</h3>
                        <p class="practice-description">{{$p_area->description}}</p>
                        <a href="/corporate-law" class="btn-secondary">আরো জানুন</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Blogs/Blog Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">ব্লগ</span>
                <h2 class="section-title">সর্বশেষ আইনি প্রবন্ধ</h2>
                <p class="section-subtitle">আইন সংক্রান্ত সাম্প্রতিক খবর, বিশ্লেষণ ও পরামর্শ</p>
            </div>
            <div class="blog-grid">
                <!-- Blog Card 1 -->
                <article class="blog-card">
                    <div class="blog-card-content">
                        <span class="blog-category">Corporate Law</span>
                        <h3 class="blog-title">New Amendments in Corporate Governance</h3>
                        <p class="blog-excerpt">Understanding the latest changes in corporate compliance requirements
                            and how they affect your business...</p>
                        <div class="blog-meta">
                            <span class="blog-date">May 15, 2023</span>
                            <span class="blog-readtime">5 min read</span>
                        </div>
                    </div>
                </article>
                <!-- More blog cards... -->
            </div>
        </div>
    </section>

    <!-- Case Studies -->
    <section class="section" style="background: var(--surface);">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">সফলতার গল্প</span>
                <h2 class="section-title">সফল মামলা ও অভিজ্ঞতা</h2>
                <p class="section-subtitle">আইনগত সাফল্যে আমাদের দক্ষতার প্রতিফলন</p>
            </div>
            <div class="cases-grid">
                <div class="case-card">
                    <div class="case-content">
                        <span class="case-category">Corporate Law</span>
                        <h3 class="case-title">Multi-Million Dollar Merger Success</h3>
                        <p class="case-description">Represented a leading technology firm in a complex merger agreement
                            valued at $50 million.</p>
                        <div class="case-result">
                            <strong>Result:</strong> Successful merger completion with favorable terms for our client.
                        </div>
                    </div>
                </div>

                <div class="case-card">
                    <div class="case-content">
                        <span class="case-category">Real Estate</span>
                        <h3 class="case-title">Commercial Property Dispute Resolution</h3>
                        <p class="case-description">Handled a high-stakes commercial property dispute involving
                            multiple stakeholders.</p>
                        <div class="case-result">
                            <strong>Result:</strong> Settled favorably, saving client over $2 million in potential
                            losses.
                        </div>
                    </div>
                </div>

                <div class="case-card">
                    <div class="case-content">
                        <span class="case-category">Employment Law</span>
                        <h3 class="case-title">Wrongful Termination Defense</h3>
                        <p class="case-description">Defended a major corporation against wrongful termination
                            allegations.</p>
                        <div class="case-result">
                            <strong>Result:</strong> Case dismissed with prejudice in favor of our client.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend.layouts.master>
