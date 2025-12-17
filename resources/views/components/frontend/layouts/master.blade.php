<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Advocate Nazmul Hossain | Senior Legal Consultant & Corporate Lawyer</title> --}}
    <title>Advocate Nazmul Hossain | Lawyer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('ui/frontend/style.css') }}">

    @stack('css')
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo"
                    style="display:flex; align-items:center; gap:10px; text-decoration:none;">
                    <i class="fas fa-balance-scale logo-icon"></i>

                    <span style="display:flex; flex-direction:column;">
                        <strong>গাজী নাজমুল হোসেন</strong>
                        <span style="font-size:12px; color:#666;">
                            আইনজীবী, বাংলাদেশ সুপ্রিম কোর্ট
                        </span>
                    </span>
                </a>
                <div class="nav-links">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">হোম</a>
                    <a href="{{ route('practice-areas') }}"
                        class="{{ request()->routeIs('practice-areas') ? 'active' : '' }}">আইনি সেবাসমূহ</a>
                    <a href="{{ route('about-me') }}"
                        class="{{ request()->routeIs('about-me') ? 'active' : '' }}">পরিচিতি</a>
                    <a href="{{ route('blogs') }}" class="{{ request()->routeIs('blogs') ? 'active' : '' }}">ব্লগ</a>
                    <a href="{{ route('contact') }}"
                        class="contact-cta {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-phone"></i>
                        বিনামূল্যে পরামর্শ
                    </a>
                </div>
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>


    {{ $slot }}


    <!-- Testimonials -->
    {{-- <section class="section testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">ক্লায়েন্টের মতামত</span>
                <h2 class="section-title">আমাদের ক্লায়েন্টরা কী বলেন</h2>
                <p class="section-subtitle">বিশ্বস্ত আইনি প্রতিনিধিত্বের জন্য ব্যবসা ও ব্যক্তিদের আস্থা</p>
            </div>

            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "জনের কর্পোরেট আইনের দক্ষতা আমাদের ব্যবসা একটি গুরুত্বপূর্ণ মার্জারের সময় বাঁচিয়েছে। তার
                        সূক্ষ্ম নজর এবং কৌশলগত দৃষ্টিভঙ্গি অমূল্য।"
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face"
                            alt="Sarah Chen" class="author-avatar">
                        <div class="author-info">
                            <h4>সারা চেন</h4>
                            <div class="author-role">সিইও, টেক ইনোভেশনস ইনক.</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "পেশাদার, জ্ঞানসম্পন্ন এবং সর্বোত্তম ফলাফল অর্জনে সত্যিই নিবেদিত। যেকোনো জটিল আইনি বিষয়ে
                        আমি অ্যাডভোকেট ডোকে দৃঢ়ভাবে সুপারিশ করি।"
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face"
                            alt="Michael Rodriguez" class="author-avatar">
                        <div class="author-info">
                            <h4>মাইকেল রোড্রিগেজ</h4>
                            <div class="author-role">রিয়েল এস্টেট ডেভেলপার</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- CTA Section -->
    <section class="section">
        <div class="container">
            <div class="cta-section">
                <h2>আপনার অধিকার রক্ষার জন্য প্রস্তুত?</h2>
                <p>আপনার আইনি প্রয়োজনগুলি আলোচনা করতে একটি গোপন পরামর্শের সময় নির্ধারণ করুন এবং দেখুন আমরা কীভাবে আপনাকে
                    লক্ষ্য অর্জনে সাহায্য করতে পারি।</p>
                <a href="tel:+8801926560841" class="btn btn-outline">
                    <i class="fas fa-phone"></i>
                    এখন কল করুন: +৮৮০ ১৯২৬ ৫৬০ ৮৪১
                </a>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="/" class="logo"
                        style="display:flex; align-items:center; gap:10px; text-decoration:none;">
                        <i class="fas fa-balance-scale logo-icon"></i>

                        <span style="display:flex; flex-direction:column;">
                            <strong>গাজী নাজমুল হোসেন</strong>
                            <span style="font-size:12px; color:#666;">
                                আইনজীবী, বাংলাদেশ সুপ্রিম কোর্ট
                            </span>
                        </span>
                    </a>
                    <p class="footer-description">২০১৮ সাল থেকে সততা, দক্ষতা ও মক্কেলদের সাফল্যের প্রতি নিবেদিত থেকে
                        মানসম্মত আইনি সেবা প্রদান করে আসছি।</p>

                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>ঠিকানাঃ ঊত্তরা, ঢাকা, বাংলাদেশ</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+৮৮০ ১৯২৬ ৫৬০ ৮৪১</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>nazmul.hossain.lawcu@gmail.com</span>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>Practice Areas</h3>
                    <ul class="footer-links">
                        @if (!empty($practice_areas) && count($practice_areas) > 0)
                            @foreach ($practice_areas as $practice_area)
                                <li>
                                    <a href="{{ url('/practice-area/' . $practice_area->slug) }}">
                                        {{ $practice_area->title }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="/corporate-law">Corporate Law</a></li>
                            <li><a href="/real-estate-law">Real Estate Law</a></li>
                            <li><a href="/employment-law">Employment Law</a></li>
                            <li><a href="/contract-law">Contract Law</a></li>
                            <li><a href="/intellectual-property">IP Law</a></li>
                        @endif

                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="{{route('home')}}">হোম</a></li>
                        <li><a href="{{route('about-me')}}">পরিচিতি</a></li>
                        <li><a href="{{route('blogs')}}">ব্লগস</a></li>
                        <li><a href="{{route('contact')}}">যোগাযোগ</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>আইনগত তথ্য</h3>
                    <ul class="footer-links">
                        <li><a href="{{route('privacy')}}">গোপনীয়তা নীতি</a></li>
                        <li><a href="{{route('terms')}}">সেবার শর্তাবলী</a></li>
                        <li><a href="{{route('disclaimer')}}">দায়মুক্তি ঘোষণা</a></li>
                    </ul>
                </div>

            </div>

            <div class="footer-bottom">
                <p>&copy; 2023 অ্যাডভোকেট নাজমুল হোসেন। সর্বস্বত্ব সংরক্ষিত। এই ওয়েবসাইটের তথ্য শুধুমাত্র সাধারণ তথ্যের
                    উদ্দেশ্যে প্রদান করা হয়েছে।</p>
                <span>Developed and Designed By: <a href="sazumme.com"
                        style="text-decoration: none; color: #b55409">SazUmme Technology</a></span>
            </div>
        </div>
    </footer>

    @stack('js')

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const navLinks = document.querySelector('.nav-links');
            const menuIcon = mobileMenuBtn.querySelector('i');

            // Toggle mobile menu
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                navLinks.classList.toggle('active');

                // Toggle menu icon between bars and times
                if (navLinks.classList.contains('active')) {
                    menuIcon.className = 'fas fa-times';
                    mobileMenuBtn.style.background = 'var(--surface)';
                } else {
                    menuIcon.className = 'fas fa-bars';
                    mobileMenuBtn.style.background = 'transparent';
                }
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (navLinks.classList.contains('active') &&
                    !navLinks.contains(e.target) &&
                    !mobileMenuBtn.contains(e.target)) {
                    navLinks.classList.remove('active');
                    menuIcon.className = 'fas fa-bars';
                    mobileMenuBtn.style.background = 'transparent';
                }
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', function() {
                    if (navLinks.classList.contains('active')) {
                        navLinks.classList.remove('active');
                        menuIcon.className = 'fas fa-bars';
                        mobileMenuBtn.style.background = 'transparent';
                    }
                });
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    navLinks.classList.remove('active');
                    menuIcon.className = 'fas fa-bars';
                    mobileMenuBtn.style.background = 'transparent';
                }
            });
        });

        // Header scroll effect (if you want to keep it)
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.boxShadow = 'var(--shadow-md)';
            } else {
                header.style.boxShadow = 'none';
            }
        });
    </script>
</body>

</html>
