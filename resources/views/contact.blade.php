<x-frontend.layouts.master>
    <!-- Contact Page Body -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Contact Us</h1>
                    <p>Get in touch for expert legal consultation and personalized legal solutions</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="contact-content">
                <div class="contact-info">
                    <h2>Get In Touch</h2>
                    <p>Schedule a consultation to discuss your legal needs. We're here to provide expert guidance and
                        representation.</p>

                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Office Address</h4>
                                <p>123 Legal Avenue, Suite 500<br>New York, NY 10001</p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Phone Number</h4>
                                <p>(555) 123-4567</p>
                                <small>Available Mon-Fri, 9AM-6PM</small>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email Address</h4>
                                <p>john.doe@legalcounsel.com</p>
                                <small>We respond within 24 hours</small>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Office Hours</h4>
                                <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 2:00 PM<br>Sunday: Closed
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="emergency-contact">
                        <h4>Emergency Legal Assistance</h4>
                        <p>For urgent legal matters outside office hours, call our emergency line:</p>
                        <div class="emergency-number">
                            <i class="fas fa-phone-alt"></i>
                            (555) 987-6543
                        </div>
                    </div>
                </div>

                <div class="contact-form-container">
                    <div class="contact-form">
                        <h3>Schedule a Consultation</h3>
                        <p>Fill out the form below and we'll get back to you within 24 hours.</p>

                        <form id="consultation-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="firstName">First Name *</label>
                                    <input type="text" id="firstName" name="firstName" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name *</label>
                                    <input type="text" id="lastName" name="lastName" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number *</label>
                                    <input type="tel" id="phone" name="phone" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="practiceArea">Practice Area of Interest</label>
                                <select id="practiceArea" name="practiceArea">
                                    <option value="">Select a practice area</option>
                                    <option value="corporate">Corporate Law</option>
                                    <option value="real-estate">Real Estate Law</option>
                                    <option value="employment">Employment Law</option>
                                    <option value="intellectual-property">Intellectual Property</option>
                                    <option value="family">Family Law</option>
                                    <option value="criminal">Criminal Law</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="caseType">Case Type</label>
                                <select id="caseType" name="caseType">
                                    <option value="">Select case type</option>
                                    <option value="consultation">General Consultation</option>
                                    <option value="document-review">Document Review</option>
                                    <option value="legal-representation">Legal Representation</option>
                                    <option value="case-evaluation">Case Evaluation</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="message">Case Details *</label>
                                <textarea id="message" name="message" rows="5" placeholder="Please describe your legal matter in detail..."
                                    required></textarea>
                            </div>

                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="privacy" required>
                                    <span>I agree to the privacy policy and terms of service</span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-full">
                                <i class="fas fa-paper-plane"></i>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Location Section -->
    <section class="section" style="background: var(--surface);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Office Location</h2>
                <p class="section-subtitle">Visit our conveniently located office in downtown New York</p>
            </div>

            <div class="office-location">
                <div class="map-container">
                    <!-- Google Map Placeholder -->
                    <div class="map-placeholder">
                        <i class="fas fa-map-marked-alt"></i>
                        <p>Interactive Map Location</p>
                        <small>123 Legal Avenue, Suite 500, New York, NY 10001</small>
                    </div>
                </div>

                <div class="location-details">
                    <h3>Getting Here</h3>
                    <div class="transport-options">
                        <div class="transport-option">
                            <i class="fas fa-subway"></i>
                            <div>
                                <strong>Subway</strong>
                                <p>Take Line 1, 2, 3 to Times Square Station (5 min walk)</p>
                            </div>
                        </div>
                        <div class="transport-option">
                            <i class="fas fa-bus"></i>
                            <div>
                                <strong>Bus</strong>
                                <p>Routes M5, M7, M20 to 7th Avenue (3 min walk)</p>
                            </div>
                        </div>
                        <div class="transport-option">
                            <i class="fas fa-parking"></i>
                            <div>
                                <strong>Parking</strong>
                                <p>Several parking garages available within 2 blocks</p>
                            </div>
                        </div>
                    </div>

                    <div class="office-features">
                        <h4>Office Facilities</h4>
                        <div class="features-list">
                            <span class="feature-tag">Wheelchair Accessible</span>
                            <span class="feature-tag">Free WiFi</span>
                            <span class="feature-tag">Conference Rooms</span>
                            <span class="feature-tag">Client Parking</span>
                            <span class="feature-tag">Waiting Area</span>
                            <span class="feature-tag">Document Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Common questions about our legal services and consultation process</p>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What is the cost for initial consultation?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We offer a complimentary 30-minute initial consultation to understand your legal needs and
                            determine how we can assist you. This allows us to evaluate your case and provide an
                            overview of potential legal strategies.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>How quickly can you respond to urgent legal matters?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>For urgent legal matters, we prioritize emergency cases and typically respond within 2-4
                            hours during business hours. We also provide an emergency contact number for after-hours
                            urgent legal assistance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Do you offer virtual consultations?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer virtual consultations via video conference for clients who prefer remote
                            meetings or are located outside New York. All virtual consultations maintain the same level
                            of confidentiality as in-person meetings.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What documents should I bring to my first consultation?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Please bring any relevant documents related to your case, including contracts, court
                            documents, correspondence, identification, and any other materials that help us understand
                            your legal situation. If you're unsure, just bring what you have - we'll guide you from
                            there.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend.layouts.master>
