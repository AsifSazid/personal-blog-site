<x-frontend.layouts.master>
    <!-- Practice Areas Page Body -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>আইনি কার্যক্ষেত্রসমূহ</h1>
                    <p>আপনার অধিকার রক্ষা এবং লক্ষ্য অর্জনে মানানসই বিস্তৃত আইনি সেবা</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">আমাদের দক্ষতা</span>
                <h2 class="section-title">বিশেষায়িত আইনি সেবা</h2>
                <p class="section-subtitle">২০ বছরেরও বেশি অভিজ্ঞতার সঙ্গে, আমরা বিভিন্ন আইনি কার্যক্ষেত্রে
                    বিশেষজ্ঞ পরামর্শ প্রদান করি</p>
            </div>

            <div class="practice-grid">
                @foreach ($practice_areas as $key => $p_area)
                    <a href="/blogs?uuid={{$p_area->uuid}}" style="text-decoration: none;">
                        <div class="practice-card">
                            <div class="practice-icon">
                                <i class="{!! $p_area->icon !!}"></i>
                            </div>
                            <h3 class="practice-title">{{ $p_area->title }}</h3>
                            <p class="practice-description">{{ $p_area->description }}</p>
                            {{ __('ব্লগ দেখুন') }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend.layouts.master>
