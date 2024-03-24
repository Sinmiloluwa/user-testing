@extends('layouts.app')
@section('content')
    <x-header />
   <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="sm:text-center lg:text-left flex justify-between items-center">
                <div class="justify-start text-left w-80">
                    <h1 class="text-4xl font-bold text-black mb-4">Unleash the power of real users. See your website
                        through their eyes.</h1>
                    <p class="text-sm text-black-400 mb-8">Emphasizes the benefits of user testing, including
                        understanding user behavior, discovering usability issues, and increasing conversions</p>
                    <div class="actions">
                        <p>action</p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('img.png') }}" alt="svg-hero">
                </div>
            </div>

            <div class="flex justify-center lg:justify-start">
                <a href="#"
                    class="bg-white text-gray-900 font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-100 transition duration-300">Get
                    Started</a>
                <a href="#"
                    class="ml-4 bg-transparent border border-white text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition duration-300">Learn
                    More</a>
            </div>
        </div>
    </div>
    </div>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-center banner">
                <h3>Trusted by 5,000+ Companies Worldwide</h3>
            </div>
            <div class="flex flex-wrap justify-between items-center">
                <img src="Vector.png" alt="Brand 1" class="w-15 h-auto mx-4 my-2">
                <img src="Vector 2.png" alt="Brand 2" class="w-15 h-auto mx-4 my-2">
                <img src="Vector 3.png" alt="Brand 3" class="w-15 h-auto mx-4 my-2">
                <img src="Vector 4.png" alt="Brand 3" class="w-15 h-auto mx-4 my-2">
                <img src="Vector 5.png" alt="Brand 3" class="w-15 h-auto mx-4 my-2">
                <img src="Vector.jpg" alt="Brand 3" class="w-15 h-auto mx-4 my-2">
                <!-- Add more images as needed -->
            </div>
        </div>
    </div>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-center items-center">
                <p>Benefits</p>
            </div>
            <div class="flex justify-center flex-col items-center benefit-desc py-12">
                <h3 class="text-4xl font-bold text-black mb-4 text-center w-3/5">Unleash the power of real users. Test,
                    iterate, and win.</h3>
                <p class="text-center w-3/5 py-8">Highlight the Unique Selling Proposition (USP) with a short summary of
                    the main feature and how it benefits customers. The idea here is to keep it short and direct. If the
                    visitor wishes to learn more they will hit the button.</p>
            </div>
        </div>
    </div>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="sm:text-center lg:text-left flex justify-between items-center">
                <div class="justify-start text-left w-960">
                    <img src="{{ asset('User testing 1.png') }}" alt="graph">
                </div>
                <div class="w-2/5">
                    <ul class="list-none">
                        <li class="flex flex-col items-start mb-6">
                            <div class="flex items-center mb-2">
                                <img src="Icon.png" alt="Bullet" class="w-9 h-9 mr-2">
                                <h1 class="text-2xl font-bold text-black mb-2 w-full">Uncover Hidden Usability Issues
                                </h1>
                            </div>
                            <div>
                                <span class="text-gray-700 text-sm block ml-11">Blind spots exist in every website. User
                                    testing reveals confusing navigation, unclear buttons, and unexpected glitches
                                    before they frustrate real users and harm conversions.</span>
                            </div>
                        </li>
                        <li class="flex flex-col items-start mb-6">
                            <div class="flex items-center mb-2">
                                <img src="Icon.png" alt="Bullet" class="w-9 h-9 mr-2">
                                <h1 class="text-2xl font-bold text-black mb-2 w-full">Uncover Hidden Usability Issues
                                </h1>
                            </div>
                            <div>
                                <span class="text-gray-700 text-sm block ml-11">Don't guess what users want. See them
                                    interact with your website, observe their thought processes, and gain a deeper
                                    understanding of their needs, desires, and frustrations. This knowledge drives
                                    design decisions that truly resonate.</span>
                            </div>
                        </li>
                        <li class="flex flex-col items-start mb-6">
                            <div class="flex items-center mb-2">
                                <img src="Icon.png" alt="Bullet" class="w-9 h-9 mr-2">
                                <h1 class="text-2xl font-bold text-black mb-2 w-full">Uncover Hidden Usability Issues
                                </h1>
                            </div>
                            <div>
                                <span class="text-gray-700 text-sm block ml-11">Stay ahead of the curve by
                                    understanding user trends and evolving expectations. User testing reveals industry
                                    benchmarks and competitor insights, informing your design and putting you a step
                                    ahead.</span>
                            </div>
                        </li>
                        <!-- Add more list items as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="py-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-start py-16">
                <p>Features</p>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex flex-col w-2/5">
                    <h1 class="text-2xl font-bold text-black mb-2">Don't build blind; test and refine.</h1>
                    <div class="w-full">
                        <ul class="list-none">
                            <li class="flex flex-col items-start mb-6">
                                <div class="flex items-center mb-2">
                                    <img src="Icon.png" alt="Bullet" class="w-9 h-9 mr-2">
                                    <h2 class="text-xl font-bold text-black mb-2">Unleash the "Why"</h2>
                                </div>
                                <div>
                                    <p class="text-gray-700 text-sm ml-11">
                                        Go beyond surface-level click data and uncover the motivations,
                                        emotions, and thought processes behind user behavior. See first-hand how users
                                        interact with your website, what confuses them, and what delights them.
                                    </p>
                                </div>
                            </li>
                            <li class="flex flex-col items-start mb-6">
                                <div class="flex items-center mb-2">
                                    <img src="Icon.png" alt="Bullet" class="w-9 h-9 mr-2">
                                    <h2 class="text-xl font-bold text-black mb-2">Test Like a Pro, No Matter Your
                                        Expertise</h2>
                                </div>
                                <div>
                                    <p class="text-gray-700 text-sm ml-11">
                                        With a variety of user testing methods (moderated, unmoderated, remote) and
                                        flexible tools (screen recordings, heatmaps, surveys), our platform caters to
                                        your needs and level of experience. Get expert guidance or dive into DIY testing
                                        - the choice is yours.
                                    </p>
                                </div>
                            </li>
                            <li class="flex flex-col items-start mb-6">
                                <div class="flex items-center mb-2">
                                    <img src="Icon.png" alt="Bullet" class="w-9 h-9 mr-2">
                                    <h2 class="text-xl font-bold text-black mb-2">Actionable Insights Delivered Fast
                                    </h2>
                                </div>
                                <div>
                                    <p class="text-gray-700 text-sm ml-11">
                                        No more waiting weeks for reports. Get real-time feedback, analyze user
                                        sessions, and identify key themes instantly. Our intuitive platform delivers
                                        clear, actionable insights so you can prioritize what matters most and optimize
                                        your website quickly and efficiently.
                                    </p>
                                </div>
                            </li>
                            <!-- Add more list items as needed -->
                        </ul>
                        <div class="py-8">
                            <button class="bg-black hover:bg-opacity-75 text-white py-2 px-4 rounded-md">Start Testing
                                Now</button>
                        </div>
                    </div>
                </div>
                <div class="w-3/5 flex justify-end">
                    <img src="{{ asset('User testing (1) 1.png') }}" alt="graph">
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-start py-16">
                <p class="text-2xl font-bold">Customer testimonials</p>
            </div>
            <div class="flex flex-row justify-around">
                <div class="flex flex-col w-2/5">
                    <div class="stars py-4">
                        <img src="{{ asset('Stars.png') }}" alt="testimg">
                    </div>
                    <div class="testimonial py-2">
                        <p>Exceptional service! I couldn't be happier with the results. The team went above and beyond
                            to meet my needs and deliver outstanding outcomes.</p>
                    </div>
                    <div class="test-img py-4">
                        <img src="{{ asset('Avatar Image.png') }}" alt="testimg">
                    </div>
                    <span class="test-name">Wade Warren</span>
                    <span class="test-job font-light text-sm">Big Kahuna Burger Ltd.</span>
                </div>
                <div class="flex flex-col w-2/5">
                    <div class="stars py-4">
                        <img src="{{ asset('Stars.png') }}" alt="testimg">
                    </div>
                    <div class="testimonial py-2">
                        <p>Exceptional service! I couldn't be happier with the results. The team went above and beyond
                            to meet my needs and deliver outstanding outcomes.</p>
                    </div>
                    <div class="test-img py-4">
                        <img src="{{ asset('Avatar Image.png') }}" alt="testimg">
                    </div>
                    <span class="test-name">Darlene Robertson</span>
                    <span class="test-job font-light text-sm">Big Kahuna Burger Ltd.</span>
                </div>
                <div class="flex flex-col w-2/5">
                    <div class="stars py-4">
                        <img src="{{ asset('Stars.png') }}" alt="testimg">
                    </div>
                    <div class="testimonial py-2">
                        <p>Exceptional service! I couldn't be happier with the results. The team went above and beyond
                            to meet my needs and deliver outstanding outcomes.</p>
                    </div>
                    <div class="test-img py-4">
                        <img src="{{ asset('Avatar Image.png') }}" alt="testimg">
                    </div>
                    <span class="test-name">Jerome Bell</span>
                    <span class="test-job font-light text-sm">Big Kahuna Burger Ltd.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="py-16">
        <div class="flex justify-center bg-black p-32 rounded-md">
            <div class="flex flex-col items-center justify-center text-center">
                <h3 class="text-lg text-white mb-4 md:text-3xl lg:text-3xl footer-intro w-4/5 font-bold">Transform your
                    productivity in minutes. Start your free trial!</h3>
                <button class="bg-white hover:bg-opacity-75 text-black py-2 mt-8 px-4 rounded-md">Start Testing
                    Now</button>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-4">
            <div class="flex flex-row justify-between">
                <div class="flex flex-col">
                    <h1 class="text-xl font-bold text-black py-2">Logo</h1>
                    <div class="flex flex-wrap justify-between items-center py-4">
                        <p class="pr-2 font-light">Home</p>
                        <p class="pr-2 font-light">Benefits</p>
                        <p class="font-light">Features</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <h3 class="text-lg text-black py-2">Subscribe</h3>
                    <div class="flex flex-row justify-between items-center">
                        <input type="email" placeholder="Enter your email" class="border border-black rounded-md px-4 py-2 focus:outline-none focus:border-black mr-2">
                        <button class="bg-white hover:bg-gray-100 text-black py-2 px-4 border border-black rounded-md">Subscribe</button>
                    </div>
                    <h3 class="py-8 font-light text-sm">By subscribing you agree to with our Privacy Policy</h3>
                </div>
                
            </div>
        <hr>
    </div>

    <footer>
        <div class="max-w-7xl mx-auto px-4 sm:px-4">
        <div class="flex flex-row justify-between">
            <div class="flex flex-wrap justify-between items-center py-4">
                <p class="pr-2 font-light text-sm">Privacy Policy</p>
                <p class="pr-2 font-light text-sm">Terms of Service</p>
                <p class="font-light text-sm">Cookies Settings</p>
            </div>
            <div class="copyright py-4">
                <p class="text-sm font-light">&copy; 2024 User Testing. All rights reserved.</p>
            </div>
        </div>
        </div>
    </footer>
    </div>
    <x-forms.login :userTypes="$userTypes"/>
    <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 opacity-50 z-40"></div>

    <script>
        // Get the modal
        const modal = document.getElementById('myModal');
        const modalOverlay = document.getElementById('modalOverlay');
      
        // Get the button that opens the modal
        const btn = document.getElementById('openModal');
      
        // Get the <span> element that closes the modal
        const span = document.getElementById('closeModal');
      
        // When the user clicks on the button, open the modal
        btn.onclick = function() {
          modal.classList.remove('hidden');
          modal.classList.add('fixed');
          modalOverlay.classList.remove('hidden');
        }
      
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.classList.add('hidden');
          modal.classList.remove('fixed');
          modalOverlay.classList.add('hidden');
        }
      
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.classList.add('hidden');
            modal.classList.remove('fixed');
            modalOverlay.classList.add('hidden');
          }
        }
      </script>
      
@endsection