<!DOCTYPE html>
<html>
      <head>
            <title>Car rental</title>
      </head>
      <script>
            function toggleFAQ(element) {
                  const answer = element.nextElementSibling;
                  const icon = element.querySelector('img');

                  if (answer.style.display === "none") {
                        answer.style.display = "block";
                        icon.src = "{{ asset('icons/minus.svg') }}";
                  } else {
                        answer.style.display = "none";  
                        icon.src = "{{ asset('icons/plus.svg') }}";                      
                  }
            };

            function scrollReviews(direction) {
                  const container = document.getElementById('reviewsContainer');
                  const scrollAmount = 300;

                  if (direction === 'left') {
                        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                  } else {
                        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                  }
            };
      </script>
      <style>
            h1, h2 {
                  font-style: helvetica;
                  font-size: 2em;
            }

            /* Hide scrollbar (Chrome, Safari) */
            #reviewsContainer::-webkit-scrollbar {
                  display: none;
            }

            /* Hide scrollbar (Firefox) */
            #reviewsContainer {
                  scrollbar-width: none;
            }

            /* Hide scrollbar (IE/Edge old) */
            #reviewsContainer {
                  -ms-overflow-style: none;
            }

            #reviewsContainer {
                  mask-image: linear-gradient(to right, black 0%, black calc(100% - 40px), transparent 100%);
            }
      </style>
      <body style="margin:0; padding:0;">
            @include('header')

            <!-- Landing page -->
            <section style="
                  background-color: #f9f9f9;
                  height: 80vh;
                  display: flex;
                  flex-direction: flex;
                  justify-content: flex-end;
                  position: relative;
                  ">
                  <div style="width: 40%; height: 80vh; padding-left: 4em;">
                        <h1 style="margin: 0; margin-top: 3.2em; font-size: 3em; color: black;">Your Perfect Drive is One Click Away</h1>
                        <div style="width: 60%; margin-top: 2em;">
                              <span style="font-size: 1.4em; font-weight: 600; color: #343434; margin-top: 24px;">Comfort. Reliable. Affordable.</span>
                              <p>Choose from a wide range of vehicles, enjoy transparent pricing, and hit the road with confidence.<p>
                        </div>
                        <button style="
                              padding: 12px 20px;
                              background-color: #ffde59;
                              color: black;
                              border: none;
                              border-radius: 5px;
                              cursor: pointer;
                              font-size: 1.1em;
                              font-weight: 550;
                              margin-top: 20px;
                              " onclick="window.location.href='/cars'">
                              Browse Cars
                        </button>
                  </div>
                  <div style="
                        width: 60%;
                        height: 80vh;
                  ">
                        <img src="{{ asset('images/320i.png')}}" style="width: 100%; height: 100%; object-fit: cover; "/>
                  </div>
            </section>

            <div style="height: 60px; width: 100%; display: flex; flex-direction: row;">
                  <div style="width: 50%; height: 100%; background-color: #D6AB00;"></div>
                  <div style="width: 50%; height: 100%; background-color: #043D74;"></div>
            </div>
            <!-- Featured cars -->
            <section style="background-color: #FFF; padding: 4em 20px;">
                  <!-- Wrapper to align text with cards -->
                  <div style="padding: 0 4em;">
                        <h2 style="margin-bottom: 6px;">
                              Top Picks For You
                        </h2>
                        <p style="font-size: 1em;">
                              Handpicked cars that combine comfort, style, and performance.
                        </p>
                  </div>
                  <div style="
                        padding: 4em;
                        display: flex;
                        gap: 16px;
                        margin-top: 16px;
                        justify-content: center;
                        flex-wrap: wrap;
                  ">
                        {{-- Loop through the featured cars and display them --}}
                        @foreach($cars as $car) 
                        <div style="
                              flex: 1;
                              gap: 16px;
                              width: 20em;
                              background-color: white;
                              border-radius: 12px;
                              box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                        ">
                              @if($car->primaryImage)
                                    <img src="{{ asset('storage/' . $car->primaryImage->image_path) }}" alt="{{ $car->model }}" style="width:100%; height:200px; object-fit: cover;">
                              @else
                                    <div style="background-color: #f0f0f0; width:100%; height:200px; display: flex; align-items: center; justify-content: center;">
                                          <span>No Image Available</span>
                                    </div>
                              @endif
                              <div style="padding: 16px 20px;">
                                    <h3 style="margin-top: 10px; text-align: center;">{{ $car->make }} {{ $car->model }}</h3>
                                    <div style="
                                          display: flex;
                                          justify-content: center;
                                          gap: 16px;
                                          align-items: center;
                                          margin-top: 10px;
                                    ">
                                          <div>
                                                <img src="{{ asset('icons/gas-station.svg') }}" alt="Fuel Type" style="width: 1em; height: 1em; margin-right: 5px;">
                                                <span style="font-size: 0.9em; color: #555;">{{ $car->fuel }}</span>
                                          </div>
                                          <div>
                                                <img src="{{ asset('icons/seat.svg') }}" alt="Seats" style="width: 1em; height: 1em; margin-right: 5px;">
                                                <span style="font-size: 0.9em; color: #555;">{{ $car->seats }}</span>
                                          </div>
                                          <div>
                                                <img src="{{ asset('icons/gearbox.svg') }}" alt="Transmission" style="width: 1em; height: 1em; margin-right: 5px;">
                                                <span style="font-size: 0.9em; color: #555;">{{ $car->transmission }}</span>
                                          </div>
                                    </div>
                                    <p style="text-align: right; margin-top: 40px;">
                                          RM{{ $car->price_per_day }} /day
                                    </p>
                                    <button style="
                                          width: 100%;
                                          padding: 10px 20px;
                                          background-color: #043D74;
                                          color: white;
                                          border: none;
                                          border-radius: 5px;
                                          cursor: pointer;
                                          font-size: 1em;
                                          font-weight: 400;" 
                                          onclick="window.location.href='/cars/{{ $car->id }}'">
                                          View Details
                                    </button>                              
                              </div>
                        </div>
                        @endforeach
                  </div>
            </section>

            <!-- Reviews -->
            <section style="padding: 4em; background-color: #f9f9f9;">
                  <div style="margin: auto 0; display: flex; flex-direction: row; justify-content: space-between;">
                        <h2 style="text-align: left; margin-bottom: 30px;">Experiences Shared by Our Clients</h2>
                        <div style="margin: auto 0; display: flex; justify-content: center; gap: 16px;">
                              {{-- Previous Button --}}
                              <button onclick="scrollReviews('left')" style="
                                    width:44px;
                                    height:44px;
                                    border:none;
                                    border-radius:12px;
                                    background:#D6AB00;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    cursor:pointer;
                                    z-index:10;
                                    box-shadow:0 2px 8px rgba(0,0,0,0.2);
                              ">
                                    <img src="{{ asset('icons/angle-left.svg') }}" style="width:16px; height:16px;">
                              </button>

                              {{-- Next Button --}}
                              <button onclick="scrollReviews('right')" style="
                                    width:44px;
                                    height:44px;
                                    border:none;
                                    border-radius:12px;
                                    background:#D6AB00;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    cursor:pointer;
                              ">
                                    <img src="{{ asset('icons/angle-left.svg') }}" style="width:16px; height:16px; transform: scaleX(-1);">
                              </button>
                        </div>
                  </div>
                  <div 
                  id="reviewsContainer"
                  style="
                        display: flex;
                        gap: 16px;
                        margin-top: 20px;
                        padding: 8px;
                        overflow-x:auto;
                        scroll-behavior:smooth;
                  ">
                        {{-- Loop through reviews and displays 10 of them --}}
                        @foreach($reviews as $review)
                        <div style="min-width: 250px; height: 300px; padding: 16px; display: flex; flex-direction: column; justify-content: space-between; background-color: white; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                              <p style="font-size: 0.9em; color: #555; text-align: right;">{{ $review->created_at->format('d M Y') }}</p>
                              <div style="gap: 8px; display: flex; flex-direction: column; align-items: flex-start;">
                                    <div style="display:flex; gap:2px;">
                                          <x-rating-stars :rating="$review->rating" />
                                    </div>
                                    <span style="font-size: 1em; margin-top: 12px; display: block;">{{ $review->comment }}</span>
                              </div>
                              <p style="font-size: 1em; font-weight: bold; margin-top: 36px;">{{ $review->user->name ?? 'Anonymous' }}</p>
                        </div>
                        @endforeach    
                  </div>
            </section>

            <!-- Promotions -->
            <section style="padding: 2.4em 4em; background-color: #043D74; color: black;">
                  <h2 style="color: white; text-align: left; margin-bottom: 40px;">News & Promotions</h2>
                  <div style="
                        display: flex;
                        gap: 16px;
                        margin-top: 20px;
                        justify-content: center;
                        flex-wrap: wrap;
                  ">
                        {{-- Loop through promotions and display them all --}}
                        @foreach($promotions as $promo)
                        <div style="
                              width: 280px;  
                              padding: 12px 16px; 
                              background-color: white; 
                              border-radius: 12px; 
                              box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                              display: flex;
                              flex-direction: column;
                              justify-content: space-between;
                              gap: 12px;
                        ">
                              @if($promo->image)
                              <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->title }}" style="width:100%; height:380px; object-fit: cover;">
                              @else
                              <div style="background-color: #f0f0f0; width:100%; height:300px; display: flex; align-items: center; justify-content: center;">
                                    <span>No Image Available</span>
                              </div>
                              @endif
                              <span style="font-size: 1em; display: block;">{{ $promo->description }}</span>
                              <p style="font-size: 0.9em; color: #555;">{{ $promo->created_at->format('d M Y')}}</p>
                        </div>
                        @endforeach
                  </div>
            </section>

            <!-- FAQ -->
            <section style="padding: 4em; background-color: #f9f9f9;">
                  <div style="display: flex; flex-direction: column; align-items: left;">
                        <h2>Frequently Asked Questions</h2>
                        <p style="font-size: 1em; color: #555; margin-top: 12px;">Find answers to common questions about our car rental service</p>
                  </div>   
                  <div style="margin-top: 20px; background-color: white; padding: 0 16px; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <!-- FAQ Item -->
                        {{-- Loop through FAQs and display them all --}}
                        @foreach($faqs as $faq)
                        <div style="border-bottom: 1px solid #ddd; padding: 16px 0;">
                              <div onclick="toggleFAQ(this)" style="display:flex; justify-content: space-between; padding: 16px; cursor:pointer;">
                                    <div style="width: 32px; height: 32px; margin: auto 12px; background-color: #D6AB00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                          <span style="font-weight: bold; ">{{ $loop->iteration }}</span>
                                    </div>
                                    <span style="font-weight: bold; margin: auto 12px; flex: 1;">{{ $faq->question }}</span>
                                    <img src="{{ asset('icons/plus.svg') }}" alt="Toggle Answer" style="width: 1em; height: 1em;" />
                              </div>
                              <div style="display: none;">
                                    <p style="color:#555; margin: auto 12px; margin-left: 84px;">{{ $faq->answer }}</p> 
                              </div>
                        </div>
                        @endforeach
                  </div>
            </section>
            @include('footer')
      </body>
</html>