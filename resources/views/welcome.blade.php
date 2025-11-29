<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advocate John Doe | Senior Legal Consultant & Corporate Lawyer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Professional Legal Color Scheme */
        :root {
            --primary: #1E40AF;
            --primary-dark: #1E3A8A;
            --primary-light: #3B82F6;
            --secondary: #374151;
            --accent: #B45309;
            --accent-dark: #92400E;
            --background: #FFFFFF;
            --surface: #F9FAFB;
            --text-primary: #111827;
            --text-secondary: #4B5563;
            --text-muted: #6B7280;
            --border: #E5E7EB;
            --border-light: #F3F4F6;
            --gold: #B45309;
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius: 8px;
            --radius-sm: 6px;
            --radius-lg: 12px;
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            background-color: var(--background);
            color: var(--text-primary);
            line-height: 1.7;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Typography */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }

        h1 {
            font-size: 3rem;
        }

        h2 {
            font-size: 2.25rem;
        }

        h3 {
            font-size: 1.75rem;
        }

        h4 {
            font-size: 1.5rem;
        }

        h5 {
            font-size: 1.25rem;
        }

        h6 {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.25rem;
            }

            h2 {
                font-size: 1.875rem;
            }

            h3 {
                font-size: 1.5rem;
            }
        }

        /* Header & Navigation */
        header {
            background: var(--background);
            border-bottom: 2px solid var(--border);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-icon {
            color: var(--gold);
            font-size: 1.75rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a.active {
            color: var(--primary);
            font-weight: 600;
        }

        .nav-links a.active::after {
            width: 100%;
        }

        .contact-cta {
            background: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .contact-cta:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            padding: 10rem 0 6rem;
            background: linear-gradient(135deg, #1E3A8A 0%, #1E40AF 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            color: white;
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
        }

        .hero-text p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-badges {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .hero-image {
            text-align: center;
        }

        .hero-avatar {
            width: 300px;
            height: 400px;
            object-fit: cover;
            border-radius: var(--radius-lg);
            border: 4px solid white;
            box-shadow: var(--shadow-lg);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-outline:hover {
            background: white;
            color: var(--primary);
        }

        .btn-secondary {
            background: var(--surface);
            color: var(--text-primary);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--border-light);
        }

        /* Section Styles */
        .section {
            padding: 5rem 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-tag {
            display: inline-block;
            background: var(--gold);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-title {
            margin-bottom: 1rem;
        }

        .section-subtitle {
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.125rem;
        }

        /* Practice Areas */
        .practice-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .practice-card {
            background: var(--background);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .practice-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }

        .practice-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .practice-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .practice-description {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        /* Case Studies */
        .cases-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .case-card {
            background: var(--background);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .case-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .case-content {
            padding: 2rem;
        }

        .case-category {
            background: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .case-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .case-description {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        .case-result {
            background: var(--surface);
            padding: 1rem;
            border-radius: var(--radius);
            border-left: 4px solid var(--gold);
        }

        .case-result strong {
            color: var(--gold);
        }

        /* Testimonials */
        .testimonials {
            background: var(--surface);
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: var(--background);
            padding: 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            border-left: 4px solid var(--primary);
        }

        .testimonial-text {
            font-style: italic;
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-info h4 {
            margin-bottom: 0.25rem;
        }

        .author-role {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
            padding: 4rem 2rem;
            border-radius: var(--radius-lg);
        }

        .cta-section h2 {
            color: white;
            margin-bottom: 1rem;
        }

        .cta-section p {
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        footer {
            background: var(--text-primary);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand .logo {
            color: white;
            margin-bottom: 1rem;
        }

        .footer-description {
            color: #D1D5DB;
            margin-bottom: 1.5rem;
        }

        .contact-info {
            margin-bottom: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            color: #D1D5DB;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        .footer-column h3 {
            color: white;
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #D1D5DB;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #374151;
            color: #9CA3AF;
            font-size: 0.875rem;
        }

        /* Mobile Responsive */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-primary);
        }

        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero {
                padding: 8rem 0 4rem;
            }

            .practice-grid,
            .cases-grid,
            .testimonial-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        /* Utility Classes */
        .text-center {
            text-align: center;
        }

        .mt-1 {
            margin-top: 1rem;
        }

        .mt-2 {
            margin-top: 2rem;
        }

        .mt-3 {
            margin-top: 3rem;
        }

        .mb-1 {
            margin-bottom: 1rem;
        }

        .mb-2 {
            margin-bottom: 2rem;
        }

        .mb-3 {
            margin-bottom: 3rem;
        }

        /* Blog Section Styles */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .blog-card {
            background: var(--background);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 2rem;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }

        .blog-category {
            background: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .blog-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .blog-excerpt {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            color: var(--text-muted);
            font-size: 0.875rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-light);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo">
                    <i class="fas fa-balance-scale logo-icon"></i>
                    Advocate John Doe
                </a>
                <div class="nav-links">
                    <a href="/" class="active">Home</a>
                    <a href="/practice-areas">Practice Areas</a>
                    <a href="/cases">Case Studies</a>
                    <a href="/about">About</a>
                    <a href="/blog">Blogs</a>
                    <a href="/contact" class="contact-cta">
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badges">
                        <span class="hero-badge">20+ Years Experience</span>
                        <span class="hero-badge">Senior Advocate</span>
                        <span class="hero-badge">Supreme Court</span>
                    </div>
                    <h1>Your Trusted Legal Partner for Complex Cases</h1>
                    <p>Providing expert legal counsel and representation with integrity, dedication, and proven results
                        in corporate law and civil litigation.</p>
                    <div class="hero-actions">
                        <a href="/contact" class="btn">
                            <i class="fas fa-calendar-check"></i>
                            Schedule Consultation
                        </a>
                        <a href="/cases" class="btn btn-outline">
                            <i class="fas fa-gavel"></i>
                            View Case Studies
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=400&h=500&fit=crop"
                        alt="Advocate John Doe" class="hero-avatar">
                </div>
            </div>
        </div>
    </section>

    <!-- Practice Areas -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Expertise</span>
                <h2 class="section-title">Practice Areas</h2>
                <p class="section-subtitle">Comprehensive legal services tailored to your specific needs and objectives
                </p>
            </div>
            <div class="practice-grid">
                <div class="practice-card">
                    <div class="practice-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="practice-title">Corporate Law</h3>
                    <p class="practice-description">Business formation, contracts, mergers & acquisitions, compliance,
                        and corporate governance.</p>
                    <a href="/corporate-law" class="btn-secondary">Learn More</a>
                </div>

                <div class="practice-card">
                    <div class="practice-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="practice-title">Real Estate Law</h3>
                    <p class="practice-description">Property transactions, leasing agreements, land disputes, and real
                        estate development.</p>
                    <a href="/real-estate-law" class="btn-secondary">Learn More</a>
                </div>

                <div class="practice-card">
                    <div class="practice-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="practice-title">Employment Law</h3>
                    <p class="practice-description">Labor disputes, employment contracts, workplace policies, and
                        compliance matters.</p>
                    <a href="/employment-law" class="btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Blogs/Blog Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Blogs</span>
                <h2 class="section-title">Latest Legal Articles</h2>
                <p class="section-subtitle">Stay updated with recent legal developments, case analysis, and legal advice
                </p>
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
                <span class="section-tag">Success Stories</span>
                <h2 class="section-title">Notable Case Studies</h2>
                <p class="section-subtitle">Demonstrated excellence in achieving favorable outcomes for our clients</p>
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
                        Advocate John Doe
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
                <p>&copy; 2023 Advocate John Doe. All rights reserved. The information on this website is for general
                    information purposes only.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.boxShadow = 'var(--shadow-md)';
            } else {
                header.style.boxShadow = 'none';
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
