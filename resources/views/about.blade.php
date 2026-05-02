<html>
    <head>
        <title>Car rental</title>
    </head>
    <style>
    @media (max-width: 768px) {
        .about-section {
            flex-direction: column;
            height: auto;
        }

        .about-img,
        .about-text {
            width: 100% !important;
            padding: 0 !important;
        }
    }
    </style>
    <body>
        <header>
            @include('header')
        </header>
        <!-- About Us -->
        <section class="about-section" style="display: flex; height: 400px; gap: 12px; padding: 24px; flex-wrap: wrap; align-items: center;">
            <div class="about-img" style="width: 40%; height: 100%;">
                <img src="{{ asset('images/nastuh-abootalebi-eHD8Y1Znfpk-unsplash.jpg') }}" alt="Photo by Nastuh Abootalebi on Unsplash" style="width: 100%; height: 100%; object-fit: cover;">
                <!-- Attribution -->
                <p style="font-size: 0.8em; color: gray; margin-top: 2px;">
                Photo by <a href="https://unsplash.com/@sunday_digital" target="_blank" style="color: inherit; text-decoration: none;">
                    Nastuh Abootalebi
                </a> on <a href="https://unsplash.com" target="_blank" style="color: inherit; text-decoration: none;">
                    Unsplash
                </a>
                </p>
            </div>
            <div class="about-text" style="width: 50%; padding: 12px 4em; justify-content: center;">
                <h2>About Us</h2>
                <p style="text-align: justify; font-size: 1em; line-height: 1.5em;">
                    Founded in 2004 by Yusuf Ahmad, our Kuching‑based car rental company has steadily evolved from a small local business into a trusted provider of quality vehicles across Sarawak. Over the years, we have built a reputation for reliability, affordability, and attentive customer service, ensuring that every client enjoys a smooth and stress‑free driving experience. Our fleet currently consists of 15 well‑maintained cars representing five respected makes—Perodua, Audi, Honda, BMW, and Toyota—giving customers a wide range of choices to suit different travel needs, preferences, and budgets. Whether you are a local resident seeking convenient mobility or a visitor exploring the cultural and natural beauty of Kuching, we are committed to offering dependable solutions tailored to your journey. With a strong focus on professionalism, safety, and customer satisfaction, we continue to serve our community with dedication, striving to make every rental experience both enjoyable and memorable.
                </p>
            </div>
        </section>

        <!-- Mission -->
        <section style="background-color: #043D74; color: white; padding: 24px; text-align: center;">
            <h2>Our Mission</h2>
            <p style="font-size: 1.2em; line-height: 1.6em; max-width: 800px; margin: 0 auto;">
                Our mission is to provide reliable, affordable, and high‑quality vehicles that empower both locals and travelers to explore Kuching and beyond with confidence. We are committed to exceptional customer service, transparent rental processes, and maintaining a diverse fleet that balances comfort, safety, and style. Guided by integrity and innovation, we strive to make every journey seamless and memorable.
            <p>
            <div style="
                display: flex; 
                flex-direction: row; 
                justify-content: center; 
                gap: 4em; 
                flex-wrap: wrap; 
                text-align: center;
                padding: 24px;
                color: #FFF;
                ">
                <div>
                    <h3 style="font-size: 1.1em; margin-bottom: 6px;">Established Year</h3>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('icons/calendar.svg') }}" alt="Calendar Icon" style="width: 1em; height: 1em; vertical-align: middle; margin-right: 8px;">
                        <span style="font-size: 1em; font-weight: 400;">2004</span>
                    </div>
                </div>
                <div>
                    <h3 style="font-size: 1.1em; margin-bottom: 6px;">Number of Cars</h3>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 1em; font-weight: 400;">{{ $numOfCars }}</span>
                    </div>
                </div>
                <div>
                    <h3 style="font-size: 1.1em; margin-bottom: 6px;">Average Rating</h3>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('icons/star.svg') }}" alt="Star Icon" style="width: 1em; height: 1em; vertical-align: middle; margin-right: 8px;">
                        <span style="font-size: 1em; font-weight: 400;">{{ number_format($avgRating, 2) }}</span>
                    </div>
                </div>
            </div>
        </section>


        <!-- Location --> 
        <section style="
            display: flex; 
            gap: 12px; 
            padding: 24px; 
            flex-wrap: wrap; 
            align-items: center;
            background-color: #EFEFEF;
            height: 400px;
            ">
            <div style="width: 40%; padding: 12px 4em; justify-content: center;">
                <h3>Our Locations</h3>
                <p>We have multiple locations throughout Kuching to serve our customers conveniently.</p>
                <ul style="list-style: none; padding: 0; font-size: 1em; line-height: 1.5em;">
                    <li style="margin-bottom: 8px;">
                        <img src="{{ asset('icons/location.svg') }}" alt="Location Icon" style="width: 1.2em; height: 1.2em; vertical-align: middle; margin-right: 8px;">
                        Main Branch - Jalan Satok, Kuching
                    </li>
                    <li style="margin-bottom: 8px;">
                        <img src="{{ asset('icons/location.svg') }}" alt="Location Icon" style="width: 1.2em; height: 1.2em; vertical-align: middle; margin-right: 8px;">
                        Airport Branch - Kuching International Airport
                    </li>
                    <li style="margin-bottom: 8px;">
                        <img src="{{ asset('icons/location.svg') }}" alt="Location Icon" style="width: 1.2em; height: 1.2em; vertical-align: middle; margin-right: 8px;">
                        Waterfront Branch - Kuching Waterfront
                    </li>
            </div>
            <div style="width: 40%; height: 100%; padding: 12px 4em; justify-content: center;">
                <h2>Visit Us</h2>
                {{-- Google Map --}}
                <iframe
                    src="https://www.google.com/maps?q=Kuching,Sarawak,Malaysia&output=embed"
                    width="100%"
                    height="260"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    </body>
    @include('footer')
</html>