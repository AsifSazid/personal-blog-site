<x-frontend.layouts.master>
    <!-- Victory Day Animation -->
    <div id="firework-container" class="firework-canvas"></div>

    <div class="victory-day-widget">
        <div class="bd-flag"></div>
        <div class="victory-text">বিজয়ের মাস ডিসেম্বর</div>
        <div id="launch-point"
            style="position: absolute; bottom: 80px; left: 50%; transform: translateX(-50%); width: 1px; height: 1px;">
        </div>
    </div>

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
                    <p>কর্পোরেট আইন এবং দেওয়ানি মামলা-মোকদ্দমায় সততা, নিষ্ঠা এবং প্রমাণিত ফলাফলের সাথে বিশেষজ্ঞ আইনি
                        পরামর্শ এবং প্রতিনিধিত্ব প্রদান।</p>
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
                    <a href="/blogs?uuid={{ $p_area->uuid }}" style="text-decoration: none;">
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
                @foreach ($blogs as $blog)
                    <a href="{{ route('blogs.show', $blog->uuid) }}" style="text-decoration: none;">
                        <article class="blog-card">
                            <div class="blog-card-content">
                                <span class="blog-category">{{ $blog->practiceArea->title }}</span>
                                <h3 class="blog-title">{{ $blog->title }}</h3>
                                <p class="blog-excerpt">{{ shortContent($blog->content) }}...</p>
                                <div class="blog-meta">
                                    <span class="blog-date">{{ banglaDate($blog->created_at) }}</span>
                                    <span class="blog-readtime">{{ readingTime($blog->content) }}</span>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach
                <!-- More blog cards... -->
            </div>
        </div>
    </section>

    <!-- Case Studies -->
    {{-- <section class="section" style="background: var(--surface);">
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
    </section> --}}

    @push('css')
        <style>
            /* ১. কমন এবং পতাকা স্টাইল (আপনার দেওয়া স্টাইল) */
            .firework-canvas {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 9998;
                pointer-events: none;
                overflow: hidden;
            }

            .victory-day-widget {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
                pointer-events: none;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .bd-flag {
                position: relative;
                width: 80px;
                height: 50px;
                background: #006a4e;
                border-radius: 4px;
                overflow: hidden;
                animation: flagWave 3s ease-in-out infinite alternate;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                z-index: 10;
                pointer-events: auto;
            }

            .bd-flag::before {
                content: '';
                position: absolute;
                width: 24px;
                height: 24px;
                background: #f42a41;
                border-radius: 50%;
                top: 50%;
                left: 45%;
                transform: translate(-50%, -50%);
            }

            .victory-text {
                margin-top: 10px;
                background: rgba(0, 106, 78, 0.9);
                color: white;
                padding: 5px 12px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: bold;
                text-align: center;
                white-space: nowrap;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }

            @keyframes flagWave {
                from {
                    transform: rotate(-5deg) skewX(-5deg);
                }

                to {
                    transform: rotate(5deg) skewX(5deg);
                }
            }

            /* ২. ফুলকি বা Launch Trail - চূড়ান্ত গ্লো এবং ট্রেল */
            .firework-trail {
                position: absolute;
                width: 3px;
                height: 3px;
                background: white;
                border-radius: 50%;
                opacity: 1;
                box-shadow: 0 0 10px white, 0 0 15px var(--trail-color);
                /* উজ্জ্বলতা */
                animation: launchTravel linear forwards;
                z-index: 10000;

                /* ট্রেইল (লেজ) ইফেক্ট */
                overflow: visible;
            }

            .firework-trail::after {
                content: '';
                position: absolute;
                width: 100%;
                height: 30px;
                /* লেজের দৈর্ঘ্য */
                background: linear-gradient(to top, var(--trail-color) 0%, transparent 100%);
                top: 0;
                left: 50%;
                transform: translateX(-50%) translateY(-100%);
                filter: blur(2px);
                opacity: 0.8;
            }

            /* ৩. ডাইনামিক ট্র্যাভেল এনিমেশন */
            @keyframes launchTravel {
                from {
                    transform: translate(0, 0);
                    opacity: 1;
                }

                to {
                    transform: translate(var(--dx), var(--dy));
                    opacity: 0;
                    /* গন্তব্যে পৌঁছে ট্রেইল গায়েব */
                }
            }

            /* ৪. কণা বা পার্টিকেল এনিমেশন - গ্র্যাভিটি এবং গ্লো */
            .particle {
                position: absolute;
                width: 5px;
                height: 5px;
                border-radius: 50%;
                animation: particleFly 1.8s ease-out forwards;
            }

            @keyframes particleFly {
                0% {
                    transform: translate(0, 0) scale(1);
                    opacity: 1;
                }

                70% {
                    opacity: 1;
                }

                100% {
                    /* গ্র্যাভিটি ইফেক্ট */
                    transform: translate(var(--tx), var(--ty));
                    opacity: 0;
                    scale: 0.3;
                }
            }
        </style>
    @endpush

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fireworkContainer = document.getElementById('firework-container');
                const launchPoint = document.getElementById('launch-point');
                const flagElement = document.querySelector('.bd-flag');
                const colors = ['#FFD700', '#FF3131', '#39FF14', '#00FFFF', '#FF00FF', '#FFFFFF', '#f42a41'];

                function getLaunchPosition() {
                    const rect = launchPoint.getBoundingClientRect();
                    return {
                        x: rect.left + rect.width / 2,
                        y: rect.top + rect.height / 2
                    };
                }

                // বিস্ফোরণ তৈরি ফাংশন - কণার সংখ্যা ও এনিমেশন সময় বৃদ্ধি করা হলো
                function createExplosion(left, top, color) {
                    const randomColor = color || colors[Math.floor(Math.random() * colors.length)];
                    const particleCount = 75; // <<-- কণার সংখ্যা বৃদ্ধি করা হলো

                    for (let i = 0; i < particleCount; i++) {
                        const particle = document.createElement('div');
                        particle.className = 'particle';

                        particle.style.backgroundColor = randomColor;
                        particle.style.boxShadow = `0 0 10px ${randomColor}, 0 0 20px ${randomColor}`;

                        const angle = Math.random() * Math.PI * 2;
                        const distance = 80 + Math.random() * 180; // ছড়ানোর দূরত্ব সামান্য বৃদ্ধি
                        const tx = Math.cos(angle) * distance;
                        const ty = Math.sin(angle) * distance + 80; // গ্র্যাভিটি আরও বেশি (ঝরে পড়ার ভাব)

                        particle.style.setProperty('--tx', `${tx}px`);
                        particle.style.setProperty('--ty', `${ty}px`);

                        particle.style.animationDuration = '3.0s'; // <<-- এনিমেশনের সময় বৃদ্ধি করা হলো

                        // কণাগুলো বিস্ফোরণ পয়েন্টে শুরু হবে
                        particle.style.left = left + 'px';
                        particle.style.top = top + 'px';

                        fireworkContainer.appendChild(particle);

                        particle.addEventListener('animationend', () => {
                            particle.remove();
                        });
                    }
                }

                // ডিরেকশনাল ফুলকি লঞ্চ করা (অপরিবর্তিত)
                function launchTrail() {
                    const startPos = getLaunchPosition();

                    const explodeX = Math.random() * window.innerWidth * 0.9 + window.innerWidth * 0.05;
                    const explodeY = window.innerHeight * (0.1 + Math.random() * 0.6);

                    const trail = document.createElement('div');
                    const trailColor = colors[Math.floor(Math.random() * colors.length)];

                    trail.className = 'firework-trail';
                    trail.style.setProperty('--trail-color', trailColor);

                    trail.style.left = startPos.x + 'px';
                    trail.style.top = startPos.y + 'px';

                    const dx = explodeX - startPos.x;
                    const dy = explodeY - startPos.y;

                    trail.style.setProperty('--dx', `${dx}px`);
                    trail.style.setProperty('--dy', `${dy}px`);

                    const travelDistance = Math.sqrt(dx * dx + dy * dy);
                    const duration = Math.max(0.7, Math.min(1.5, travelDistance / 800));

                    trail.style.animationDuration = duration + 's';

                    fireworkContainer.appendChild(trail);

                    // বিস্ফোরণ ঘটানো
                    setTimeout(() => {
                        createExplosion(explodeX, explodeY, trailColor);
                        trail.remove();
                    }, duration * 1000);
                }

                // ব্যাচ লঞ্চ লজিক (অপরিবর্তিত)
                function launchBatch() {
                    const batchSize = Math.floor(Math.random() * 2) + 2; // ২ বা ৩
                    for (let i = 0; i < batchSize; i++) {
                        // সামান্য দেরিতে লঞ্চ
                        setTimeout(() => {
                            launchTrail();
                        }, i * 200);
                    }
                }

                // প্রতি ২ সেকেন্ড পর পর ব্যাচ লঞ্চ হবে
                setInterval(launchBatch, 2000);

                // পতাকায় ক্লিক করলে বিশেষ ব্যাচ লঞ্চ হবে
                flagElement.addEventListener('click', function() {
                    for (let i = 0; i < 3; i++) {
                        setTimeout(() => {
                            launchBatch();
                        }, i * 400);
                    }
                });

                // শুরুতেই একবার লঞ্চ
                launchBatch();
            });
        </script>
    @endpush
</x-frontend.layouts.master>
