@extends('layouts.app')

@section('title', 'Wanderly — AI Travel Planner')

@section('content')

{{-- =============================================
     HERO SECTION
============================================= --}}
<section class="hero" id="hero">
    {{-- Animated floating elements --}}
    <div class="hero-bg">
        <div class="floating-element el-1">✈️</div>
        <div class="floating-element el-2">🌍</div>
        <div class="floating-element el-3">🎈</div>
        <div class="floating-element el-4">🗺️</div>
        <div class="floating-element el-5">⛵</div>
        <div class="floating-element el-6">🏔️</div>
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="hero-container">
        <div class="hero-badge">
            <span class="badge-dot"></span>
            AI-Powered Trip Planning
        </div>

        <h1 class="hero-title">
            Your Trip, Your Vibe —<br>
            <em>Our AI's on It</em>
        </h1>

        <p class="hero-subtitle">
            Solo? Couple? Group? We Plan Like It's Just for You — Because It Is
        </p>

        <div class="hero-cta">
            <a href="{{ route('register') }}" class="btn-hero-primary">
                <i class="bi bi-stars"></i>
                Plan &amp; Book My Trip with AI
            </a>
            <a href="#how-it-works" class="btn-hero-outline">
                See how it works
                <i class="bi bi-arrow-down"></i>
            </a>
        </div>

        {{-- Social Proof --}}
        <div class="hero-stats">
            <div class="stat">
                <strong>12K+</strong>
                <span>Trips Planned</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <strong>98%</strong>
                <span>Happy Travelers</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <strong>150+</strong>
                <span>Countries Covered</span>
            </div>
        </div>
    </div>

    {{-- Hero Illustration --}}
    <div class="hero-illustration">
        <div class="glass-card floating-card card-1">
            <div class="fc-icon">🗼</div>
            <div class="fc-info">
                <strong>Paris, France</strong>
                <span>3 nights · 2 travelers</span>
            </div>
            <span class="fc-badge">Planned ✓</span>
        </div>
        <div class="glass-card floating-card card-2">
            <div class="fc-icon">🏖️</div>
            <div class="fc-info">
                <strong>Bali, Indonesia</strong>
                <span>7 nights · Solo</span>
            </div>
            <span class="fc-badge fc-badge-active">Active</span>
        </div>
        <div class="glass-card floating-card card-3">
            <div class="fc-icon">🗽</div>
            <div class="fc-info">
                <strong>New York, USA</strong>
                <span>5 nights · Family</span>
            </div>
            <span class="fc-badge fc-badge-upcoming">Upcoming</span>
        </div>
    </div>
</section>

{{-- =============================================
     FEATURES SECTION
============================================= --}}
<section class="features-section" id="features">
    <div class="section-container">
        <div class="section-header">
            <span class="section-tag">Everything You Need</span>
            <h2 class="section-title">Plan Smarter, Travel Better</h2>
            <p class="section-subtitle">From first idea to last day — we've got every detail covered.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card" data-delay="0">
                <div class="feature-icon-wrap" style="--icon-color: #4361ee;">
                    <span class="feature-icon">🗺️</span>
                </div>
                <h3>Smart Trip Planning</h3>
                <p>Create comprehensive trip plans with destinations, dates, budgets and traveler details in minutes.</p>
            </div>

            <div class="feature-card" data-delay="100">
                <div class="feature-icon-wrap" style="--icon-color: #f72585;">
                    <span class="feature-icon">📅</span>
                </div>
                <h3>Day-by-Day Itinerary</h3>
                <p>Visualize your entire trip on a beautiful timeline. Every activity, meal and sightseeing stop organized perfectly.</p>
            </div>

            <div class="feature-card" data-delay="200">
                <div class="feature-icon-wrap" style="--icon-color: #7209b7;">
                    <span class="feature-icon">🏨</span>
                </div>
                <h3>Accommodation Tracker</h3>
                <p>Track all your hotels, booking references and check-in/out times in one place. Never lose a reservation.</p>
            </div>

            <div class="feature-card" data-delay="300">
                <div class="feature-icon-wrap" style="--icon-color: #06d6a0;">
                    <span class="feature-icon">🎯</span>
                </div>
                <h3>Activity Management</h3>
                <p>From sightseeing to food tours — categorize, schedule and budget every activity with ease.</p>
            </div>

            <div class="feature-card" data-delay="400">
                <div class="feature-icon-wrap" style="--icon-color: #f77f00;">
                    <span class="feature-icon">💰</span>
                </div>
                <h3>Budget Tracking</h3>
                <p>Monitor your travel budget across accommodation, activities and experiences with real-time totals.</p>
            </div>

            <div class="feature-card" data-delay="500">
                <div class="feature-icon-wrap" style="--icon-color: #4cc9f0;">
                    <span class="feature-icon">📍</span>
                </div>
                <h3>Multi-Destination</h3>
                <p>Planning a multi-city adventure? Manage multiple destinations within a single trip seamlessly.</p>
            </div>
        </div>
    </div>
</section>

{{-- =============================================
     HOW IT WORKS
============================================= --}}
<section class="how-it-works" id="how-it-works">
    <div class="section-container">
        <div class="section-header">
            <span class="section-tag">Simple & Fast</span>
            <h2 class="section-title">Three Steps to Your Dream Trip</h2>
        </div>

        <div class="steps-container">
            <div class="step-card">
                <div class="step-number">01</div>
                <div class="step-icon">✍️</div>
                <h3>Create Your Trip</h3>
                <p>Tell us where you're going, when, with whom, and what's your budget. We set the stage.</p>
            </div>
            <div class="step-connector">
                <div class="connector-line"></div>
                <div class="connector-plane">✈</div>
            </div>
            <div class="step-card">
                <div class="step-number">02</div>
                <div class="step-icon">🏗️</div>
                <h3>Build Your Itinerary</h3>
                <p>Add destinations, hotels and activities. Watch your perfect trip come to life day by day.</p>
            </div>
            <div class="step-connector">
                <div class="connector-line"></div>
                <div class="connector-plane">✈</div>
            </div>
            <div class="step-card">
                <div class="step-number">03</div>
                <div class="step-icon">🌟</div>
                <h3>Travel & Enjoy</h3>
                <p>Access your full itinerary on any device. Everything you need, right when you need it.</p>
            </div>
        </div>
    </div>
</section>

{{-- =============================================
     TRIP TYPES SECTION
============================================= --}}
<section class="trip-types-section">
    <div class="section-container">
        <div class="section-header">
            <h2 class="section-title">For Every Kind of Traveler</h2>
        </div>

        <div class="trip-types-grid">
            <div class="trip-type-card" style="--type-color: #4361ee;">
                <span class="type-emoji">🧳</span>
                <h3>Solo Travel</h3>
                <p>Your pace, your rules. Plan adventures built entirely around you.</p>
            </div>
            <div class="trip-type-card" style="--type-color: #f72585;">
                <span class="type-emoji">💑</span>
                <h3>Couples Getaway</h3>
                <p>Romantic escapes with every detail crafted for two.</p>
            </div>
            <div class="trip-type-card" style="--type-color: #7209b7;">
                <span class="type-emoji">👨‍👩‍👧</span>
                <h3>Family Trips</h3>
                <p>Fun for all ages, with activities everyone will love.</p>
            </div>
            <div class="trip-type-card" style="--type-color: #06d6a0;">
                <span class="type-emoji">👥</span>
                <h3>Group Adventures</h3>
                <p>Coordinate large groups without the chaos. Easy.</p>
            </div>
        </div>
    </div>
</section>

{{-- =============================================
     CTA SECTION
============================================= --}}
<section class="cta-section">
    <div class="cta-container">
        <div class="cta-bg">
            <div class="cta-blob cta-blob-1"></div>
            <div class="cta-blob cta-blob-2"></div>
        </div>
        <div class="cta-content">
            <span class="cta-tag">Ready to Explore?</span>
            <h2>Your Next Adventure<br>Starts Here</h2>
            <p>Join thousands of travelers who plan smarter with Wanderly.</p>
            <a href="{{ route('register') }}" class="btn-hero-primary">
                <i class="bi bi-stars"></i>
                Start Planning for Free
            </a>
        </div>
    </div>
</section>

@endsection
