<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Advocate Nazmul Hossain | Senior Legal Consultant & Corporate Lawyer</title> --}}
    <title>Advocate Nazmul Hossain | Lawyer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('ui/frontend/style.css') }}">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo">
                    <i class="fas fa-balance-scale logo-icon"></i>
                    Advocate Nazmul Hossain
                </a>
                <div class="nav-links">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('practice-areas') }}"
                        class="{{ request()->routeIs('practice-areas') ? 'active' : '' }}">Practice Areas</a>
                    <a href="{{ route('about-me') }}"
                        class="{{ request()->routeIs('about-me') ? 'active' : '' }}">About</a>
                    <a href="{{ route('fn-blogs') }}"
                        class="{{ request()->routeIs('fn-blogs') ? 'active' : '' }}">Blogs</a>
                    <a href="{{ route('contact') }}"
                        class="contact-cta {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-phone"></i>
                        Free Consultation
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
    <section class="section testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Client Reviews</span>
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-subtitle">Trusted by businesses and individuals for reliable legal representation</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "John's expertise in corporate law saved our business during a critical merger. His attention to
                        detail and strategic approach were invaluable."
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face"
                            alt="Sarah Chen" class="author-avatar">
                        <div class="author-info">
                            <h4>Sarah Chen</h4>
                            <div class="author-role">CEO, Tech Innovations Inc.</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Professional, knowledgeable, and truly dedicated to achieving the best outcome. I highly
                        recommend Advocate Doe for any complex legal matter."
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face"
                            alt="Michael Rodriguez" class="author-avatar">
                        <div class="author-info">
                            <h4>Michael Rodriguez</h4>
                            <div class="author-role">Real Estate Developer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section">
        <div class="container">
            <div class="cta-section">
                <h2>Ready to Protect Your Rights?</h2>
                <p>Schedule a confidential consultation to discuss your legal needs and explore how we can help you
                    achieve your objectives.</p>
                <a href="/contact" class="btn btn-outline">
                    <i class="fas fa-phone"></i>
                    Call Now: (555) 123-4567
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="/" class="logo">
                        <i class="fas fa-balance-scale logo-icon"></i>
                        Advocate Nazmul Hossain
                    </a>
                    <p class="footer-description">Providing exceptional legal services with integrity, expertise, and
                        dedication to client success since 2003.</p>

                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Legal Avenue, Suite 500, New York, NY 10001</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>(555) 123-4567</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>john.doe@legalcounsel.com</span>
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
                        <li><a href="/corporate-law">Corporate Law</a></li>
                        <li><a href="/real-estate-law">Real Estate Law</a></li>
                        <li><a href="/employment-law">Employment Law</a></li>
                        <li><a href="/contract-law">Contract Law</a></li>
                        <li><a href="/intellectual-property">IP Law</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/cases">Case Studies</a></li>
                        <li><a href="/blog">Blogs</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Legal</h3>
                    <ul class="footer-links">
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/terms">Terms of Service</a></li>
                        <li><a href="/disclaimer">Disclaimer</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2023 Advocate Nazmul Hossain. All rights reserved. The information on this website is for
                    general
                    information purposes only.</p>
            </div>
        </div>
    </footer>

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
