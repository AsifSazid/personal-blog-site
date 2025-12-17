<x-frontend.layouts.master>
    @push('css')
        <style>
            .under-construction-section {
                min-height: 70vh;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                background: #f8f9fa;
                padding: 40px 20px;
            }

            .construction-content {
                max-width: 600px;
            }

            .construction-icon {
                font-size: 80px;
                color: #e67e22;
                /* Warning color */
                margin-bottom: 20px;
                animation: bounce 2s infinite;
            }

            .construction-content h1 {
                font-size: 2.5rem;
                color: var(--primary);
                margin-bottom: 15px;
                font-weight: 700;
            }

            .construction-content p {
                font-size: 1.1rem;
                color: #7f8c8d;
                margin-bottom: 30px;
                line-height: 1.6;
            }

            .btn-home {
                display: inline-block;
                padding: 12px 30px;
                background-color: var(--primary);
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: 0.3s;
                font-weight: 600;
            }

            .btn-home:hover {
                background-color: var(--primary-dark);
                color: #fff;
            }

            @keyframes bounce {

                0%,
                20%,
                50%,
                80%,
                100% {
                    transform: translateY(0);
                }

                40% {
                    transform: translateY(-20px);
                }

                60% {
                    transform: translateY(-10px);
                }
            }

            /* SVG Icon Style */
            .icon-svg {
                width: 120px;
                height: 120px;
                fill: #e67e22;
                margin-bottom: 20px;
            }
        </style>
    @endpush

    <section class="under-construction-section">
        <div class="construction-content">
            <div class="construction-icon">
                <svg class="icon-svg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L1 21h22L12 2zm0 3.45l8.1 14.05H3.9L12 5.45zM11 16h2v2h-2v-2zm0-7h2v5h-2V9z" />
                </svg>
            </div>

            <h1>কাজ চলছে...</h1>
            <p>
                এই পাতাটি বর্তমানে সংস্কার করা হচ্ছে। আমরা আপনাদের জন্য আরও উন্নত অভিজ্ঞতা নিশ্চিত করতে কাজ করছি। খুব
                শীঘ্রই আমরা ফিরে আসছি!
            </p>

            <a href="{{ url('/') }}" class="btn-home">
                হোম পেজে ফিরে যান
            </a>
        </div>
    </section>
</x-frontend.layouts.master>
