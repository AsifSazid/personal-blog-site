<x-frontend.layouts.master>
    <!-- Victory Day Animation -->
    <div class="victory-day-animation">
        <div class="bd-flag"></div>
        <div class="victory-text">বিজয় দিবস ১৬ ডিসেম্বর</div>
        <div class="victory-sun"></div>
        <div class="firework"></div>
        <div class="firework"></div>
        <div class="firework"></div>
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
                    <div class="practice-card">
                        <div class="practice-icon">
                            {!! $p_area->icon !!}
                        </div>
                        <h3 class="practice-title">{{ $p_area->title }}</h3>
                        <p class="practice-description">{{ $p_area->description }}</p>
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

    @push('css')
        <style>
            /* Victory Day Animation Container */
            .victory-day-animation {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
                width: 120px;
                height: 120px;
                pointer-events: none;
            }

            /* Bangladesh Flag */
            .bd-flag {
                position: absolute;
                width: 80px;
                height: 50px;
                background: linear-gradient(to right, #006a4e 50%, #f42a41 50%);
                border-radius: 2px;
                animation: flagWave 3s ease-in-out infinite alternate;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            }

            .bd-flag::before {
                content: '';
                position: absolute;
                width: 20px;
                height: 20px;
                background: #f42a41;
                border-radius: 50%;
                top: 50%;
                left: 30%;
                transform: translate(-50%, -50%);
            }

            /* Victory Day Text */
            .victory-text {
                position: absolute;
                bottom: 0;
                right: 0;
                background: rgba(0, 106, 78, 0.9);
                color: white;
                padding: 8px 12px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: bold;
                white-space: nowrap;
                animation: textSlide 10s ease-in-out infinite;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            }

            /* Rising Sun */
            .victory-sun {
                position: absolute;
                top: -40px;
                right: 40px;
                width: 40px;
                height: 40px;
                background: radial-gradient(circle, #FFD700, #FF8C00);
                border-radius: 50%;
                animation: sunRise 4s ease-in-out infinite;
                box-shadow: 0 0 20px rgba(255, 215, 0, 0.7);
            }

            /* Fireworks */
            .firework {
                position: absolute;
                width: 4px;
                height: 4px;
                background: #FFD700;
                border-radius: 50%;
                animation: fireworkExplode 2s ease-out infinite;
            }

            .firework:nth-child(1) {
                top: 20px;
                left: 30px;
                animation-delay: 0.5s;
            }

            .firework:nth-child(2) {
                top: 40px;
                left: 60px;
                animation-delay: 1s;
                background: #FF4500;
            }

            .firework:nth-child(3) {
                top: 10px;
                left: 70px;
                animation-delay: 1.5s;
                background: #32CD32;
            }

            /* Animations */
            @keyframes flagWave {
                0% {
                    transform: rotate(0deg) translateY(0);
                }

                100% {
                    transform: rotate(5deg) translateY(-5px);
                }
            }

            @keyframes textSlide {

                0%,
                40% {
                    transform: translateX(100%);
                    opacity: 0;
                }

                50%,
                90% {
                    transform: translateX(0);
                    opacity: 1;
                }

                100% {
                    transform: translateX(-100%);
                    opacity: 0;
                }
            }

            @keyframes sunRise {

                0%,
                100% {
                    transform: translateY(0) scale(1);
                    opacity: 0.8;
                }

                50% {
                    transform: translateY(-20px) scale(1.1);
                    opacity: 1;
                }
            }

            @keyframes fireworkExplode {
                0% {
                    transform: scale(1);
                    opacity: 1;
                    box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.7);
                }

                100% {
                    transform: scale(20);
                    opacity: 0;
                    box-shadow: 0 0 0 10px rgba(255, 215, 0, 0);
                }
            }

            /* Optional: Add animation to hero section */
            .hero-badges .hero-badge {
                animation: badgePulse 2s infinite;
            }

            .hero-badges .hero-badge:nth-child(1) {
                animation-delay: 0s;
            }

            .hero-badges .hero-badge:nth-child(2) {
                animation-delay: 0.5s;
            }

            .hero-badges .hero-badge:nth-child(3) {
                animation-delay: 1s;
            }

            @keyframes badgePulse {

                0%,
                100% {
                    transform: scale(1);
                    box-shadow: 0 2px 8px rgba(var(--primary-rgb), 0.3);
                }

                50% {
                    transform: scale(1.05);
                    box-shadow: 0 4px 15px rgba(var(--primary-rgb), 0.5);
                }
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .victory-day-animation {
                    width: 100px;
                    height: 100px;
                    bottom: 10px;
                    right: 10px;
                }

                .bd-flag {
                    width: 60px;
                    height: 40px;
                }

                .victory-text {
                    font-size: 10px;
                    padding: 6px 8px;
                }
            }

            @keyframes sparkExplode {
                0% {
                    transform: translate(0, 0) scale(1);
                    opacity: 1;
                }

                100% {
                    transform: translate(calc(var(--tx, 0) * 50px),
                            calc(var(--ty, 0) * 50px)) scale(0);
                    opacity: 0;
                }
            }

            /* Set random directions for sparks */
            .firework:nth-child(odd) {
                --tx: -1;
                --ty: -1;
            }

            .firework:nth-child(even) {
                --tx: 1;
                --ty: -0.5;
            }
        </style>
    @endpush

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Victory Day Animation Manager
                const victoryAnimation = {
                    init() {
                        this.createFireworks();
                        this.addPageEffects();
                        this.addVictoryDayMessage();
                    },

                    // Create dynamic fireworks
                    createFireworks() {
                        const animationContainer = document.querySelector('.victory-day-animation');

                        for (let i = 0; i < 5; i++) {
                            const firework = document.createElement('div');
                            firework.className = 'firework';
                            firework.style.left = Math.random() * 100 + 'px';
                            firework.style.top = Math.random() * 100 + 'px';
                            firework.style.animationDelay = Math.random() * 2 + 's';

                            // Random colors for fireworks
                            const colors = ['#FFD700', '#FF4500', '#32CD32', '#1E90FF', '#FF1493'];
                            firework.style.background = colors[Math.floor(Math.random() * colors.length)];

                            animationContainer.appendChild(firework);
                        }
                    },

                    // Add subtle page effects
                    addPageEffects() {
                        // Add subtle animation to hero title
                        const heroTitle = document.querySelector('.hero h1');
                        if (heroTitle) {
                            heroTitle.style.position = 'relative';
                            heroTitle.style.animation = 'none';

                            heroTitle.addEventListener('mouseenter', () => {
                                heroTitle.style.animation = 'flagWave 1s ease-in-out';
                            });

                            heroTitle.addEventListener('animationend', () => {
                                heroTitle.style.animation = 'none';
                            });
                        }

                        // Add click effect on practice area cards
                        const practiceCards = document.querySelectorAll('.practice-card');
                        practiceCards.forEach(card => {
                            card.addEventListener('click', () => {
                                this.createMiniFirework(card);
                            });
                        });
                    },

                    // Create mini firework effect
                    createMiniFirework(element) {
                        const rect = element.getBoundingClientRect();
                        const x = rect.left + rect.width / 2;
                        const y = rect.top + rect.height / 2;

                        for (let i = 0; i < 3; i++) {
                            const spark = document.createElement('div');
                            spark.style.cssText = `
                    position: fixed;
                    width: 4px;
                    height: 4px;
                    background: ${i === 0 ? '#FFD700' : i === 1 ? '#f42a41' : '#006a4e'};
                    border-radius: 50%;
                    left: ${x}px;
                    top: ${y}px;
                    pointer-events: none;
                    z-index: 9998;
                    animation: sparkExplode 0.8s ease-out forwards;
                `;

                            document.body.appendChild(spark);

                            // Remove spark after animation
                            setTimeout(() => spark.remove(), 800);
                        }
                    },

                    // Add Victory Day greeting
                    addVictoryDayMessage() {
                        const today = new Date();
                        const dec16 = new Date(today.getFullYear(), 11, 16); // December 16

                        // Check if today is Victory Day (Dec 16) or within 5 days before/after
                        const diffDays = Math.floor((today - dec16) / (1000 * 60 * 60 * 24));

                        if (Math.abs(diffDays) <= 5) {
                            const message = document.createElement('div');
                            message.className = 'victory-day-greeting';
                            message.innerHTML = `
                    <div style="
                        position: fixed;
                        top: 10px;
                        left: 50%;
                        transform: translateX(-50%);
                        background: linear-gradient(45deg, #006a4e, #f42a41);
                        color: white;
                        padding: 10px 20px;
                        border-radius: 4px;
                        font-weight: bold;
                        z-index: 9997;
                        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
                        animation: greetingPulse 2s infinite;
                        text-align: center;
                        max-width: 90%;
                    ">
                        <i class="fas fa-flag" style="margin-right: 8px;"></i>
                        ${diffDays === 0 ? 'শুভ বিজয় দিবস!' :
                          diffDays < 0 ? `বিজয় দিবস আসছে ${Math.abs(diffDays)} দিন বাকি` :
                          `বিজয় দিবস উদ্যাপন চলছে!`}
                    </div>
                `;

                            document.body.appendChild(message);

                            // Add CSS for greeting animation
                            const style = document.createElement('style');
                            style.textContent = `
                    @keyframes greetingPulse {
                        0%, 100% { transform: translateX(-50%) scale(1); }
                        50% { transform: translateX(-50%) scale(1.05); }
                    }
                `;
                            document.head.appendChild(style);
                        }
                    }
                };

                // Initialize animation
                victoryAnimation.init();

                // Add interactive flag click
                const bdFlag = document.querySelector('.bd-flag');
                if (bdFlag) {
                    bdFlag.style.cursor = 'pointer';
                    bdFlag.addEventListener('click', function() {
                        this.style.animation = 'flagWave 0.5s ease-in-out 3';

                        // Play victory sound if available
                        const audio = new Audio(
                            'https://assets.mixkit.co/sfx/preview/mixkit-winning-chimes-2015.mp3');
                        audio.volume = 0.3;
                        audio.play().catch(e => console.log('Audio play failed:', e));

                        setTimeout(() => {
                            this.style.animation = '';
                        }, 1500);
                    });
                }
            });
        </script>
    @endpush
</x-frontend.layouts.master>
