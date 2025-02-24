@extends('front.projects.master')

@section('css')
<style>
    .btn-blue { background-color: #1ea19d; }
    .btn-green { background-color: #a11e22; }
    .hidden { display: none; }
    @keyframes slide-image {
        0% {
            background-position: 100% 0;
        }
        100% {
            background-position: -100% 0;
        }
    }

    @keyframes slide-text {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(0);
        }
    }

    .bg-cover {
        background-size: cover;
    }

    .absolute {
        position: absolute;
    }

    .inset-0 {
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .animate-slide-text {
        animation: slide-text 1s ease-out forwards;
    }

    .w-full {
        width: 100%;
    }

    .h-full {
        height: 100%;
    }

</style>
@endsection

@section('content')
 <!-- page breadcrumbs -->
 <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
     <span>
         <a href="{{ route('home') }}" class="fa fa-home"></a>
     </span>
        
     <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"></svg>

     <span class="text-white">About Us</span>
 </div>
 <!-- END page breadcrumbs 

<!-- Main Content Section -->
<div class="relative flex flex-wrap h-[80vh] sm:h-[60vh] md:h-auto overflow-hidden" style="height: 800px;">
    <!-- Content Section with Background Image -->
    <div class="w-full bg-cover h-full bg-fixed" style="background-image: url('{{ asset('images/trainer.webp') }}'); animation: slide-image 10s infinite;">
        <!-- Full Width Grid Container -->
        <div class="flex flex-wrap h-full">
            <!-- Content Section -->
            <div class="w-full sm:w-2/12 md:w-6/12 bg-red-300 bg-opacity-70 p-4 flex flex-col justify-center items-center animate-slide-text" style="min-height: 300px; overflow: visible;">
                <!-- Header Section -->
                <header class="text-center px-4">
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-[#1ea19d]">
                        Become an <span class="text-green-700">IRES Trainer</span>
                    </h1>
                    <div class="w-16 sm:w-20 h-2 bg-green-700 my-4 mx-auto"></div>
                    <p class="text-xl sm:text-2xl mb-6 sm:mb-10 text-gray-700">
                        IRES is experiencing rapid growth, and the demand for additional trainers is increasing significantly. Currently, we operate in over seven training stations globally, spanning more than fifteen sectors. Our culture fosters innovation, collaboration, and forward thinking, empowering professionals to excel.
                    </p>
                    <a href="{{ route('trainer_application.create') }}" class="bg-[#1ea19d] text-white text-xl sm:text-2xl font-medium px-4 py-2 rounded shadow hover:bg-[#a11e22]">
                        Apply Now
                    </a>
                </header>
            </div>
        </div>
    </div>
</div>


</div>


<!-- Trainer Responsibilities Section -->
<div class="relative flex flex-col min-h-[60vh] overflow-auto">
    <!-- First Section: Trainer Information -->
    <div class="px-4 py-4">
        <h3 class="text-3xl font-semibold text-[#a11e22]">What Our Trainers Do</h3>
        <div class="w-12 h-1 bg-[#a11e22] my-4"></div>
        <p class="text-2xl text-gray-700">
            As a Corporate Trainer at IRES, your role will focus on designing and delivering top-tier in-person and virtual training programs, empowering professionals in their career growth.
        </p>
    </div>

    <!-- Second Section: Tabs and Content -->
    <div class="px-4 py-4">
        <!-- Tabs Section -->
        <nav>
            <ul class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 text-lg justify-center">
                <li>
                    <button type="button" onclick="showForm('development', this)" class="tab-button bg-[#1ea19d] hover:bg-[#a11e22] transition duration-300 block py-3 px-4 font-semibold text-white rounded-md w-full sm:w-auto">
                        Training Program Development
                    </button>
                </li>
                <li>
                    <button type="button" onclick="showForm('coordination', this)" class="tab-button bg-[#1ea19d] hover:bg-[#a11e22] transition duration-300 block py-3 px-4 font-semibold text-white rounded-md w-full sm:w-auto">
                        Training Coordination
                    </button>
                </li>
                <li>
                    <button type="button" onclick="showForm('sessions', this)" class="tab-button bg-[#1ea19d] hover:bg-[#a11e22] transition duration-300 block py-3 px-4 font-semibold text-white rounded-md w-full sm:w-auto">
                        Conduct Training Sessions
                    </button>
                </li>
                <li>
                    <button type="button" onclick="showForm('requirements', this)" class="tab-button bg-[#1ea19d] hover:bg-[#a11e22] transition duration-300 block py-3 px-4 font-semibold text-white rounded-md w-full sm:w-auto">
                        Requirements
                    </button>
                </li>
            </ul>
        </nav>

        <!-- Tab Content -->
        <div class="container tab-content mt-6">
            <div class="tab-pane" id="development-list">
                <h3 class="text-3xl font-semibold text-[#a11e22]">Training Program Development</h3>
                <hr class="my-2 border-t-2 border-gray-300" />
                <ul class="list-disc list-inside text-gray-700  text-2xl">
                    <li>Assess client needs and create innovative training programs to meet them.</li>
                    <li>Utilize a range of teaching strategies and tools to enhance learning.</li>
                </ul>
            </div>
            <div class="tab-pane hidden" id="coordination-list">
                <h3 class="text-3xl font-semibold text-[#a11e22]">Training Coordination</h3>
                <hr class="my-2 border-t-2 border-gray-300" />
                <ul class="list-disc list-inside text-gray-700  text-2xl">
                    <li>Collaborate with the training department for seamless delivery.</li>
                </ul>
            </div>
            <div class="tab-pane hidden" id="sessions-list">
                <h3 class="text-3xl font-semibold text-[#a11e22]">Conduct Training Sessions</h3>
                <hr class="my-2 border-t-2 border-gray-300" />
                <ul class="list-disc list-inside text-gray-700 text-2xl">
                    <li>Lead engaging training sessions for our diverse clients.</li>
                    <li>Evaluate and improve training effectiveness continuously.</li>
                </ul>
            </div>
            <div class="tab-pane hidden" id="requirements-list">
                <h3 class="text-3xl font-semibold text-[#a11e22]">Requirements</h3>
                <hr class="my-2 border-t-2 border-gray-300" />
                <ul class="list-disc list-inside text-gray-700  text-2xl">
                    <li>Bachelor's degree or higher with at least 5 years of experience.</li>
                    <li>Expertise as a corporate trainer in a relevant field.</li>
                    <li>Strong communication and presentation skills.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js_content')

<!-- JavaScript to control tabs -->
<script>
    function showForm(formType, clickedButton) {
        document.getElementById('development-list').classList.add('hidden');
        document.getElementById('coordination-list').classList.add('hidden');
        document.getElementById('sessions-list').classList.add('hidden');
        document.getElementById('requirements-list').classList.add('hidden');

        document.getElementById(formType + '-list').classList.remove('hidden');

        document.querySelectorAll('.button').forEach(btn => {
            btn.classList.remove('btn-green');
            btn.classList.add('btn-blue');
        });

        clickedButton.classList.remove('btn-blue');
        clickedButton.classList.add('btn-green');
    }

    window.onload = function() {
        showForm('development', document.querySelector('ul button'));
    };
    function showForm(tabId, btn) {
        // Hide all tab panes
        document.querySelectorAll('.tab-pane').forEach(tabPane => {
            tabPane.classList.add('hidden');
        });

        // Remove active state from all buttons
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('bg-[#a11e22]');
            button.classList.add('bg-[#1ea19d]');
        });

        // Show selected tab pane
        document.getElementById(tabId + '-list').classList.remove('hidden');

        // Highlight the selected button
        btn.classList.remove('bg-[#1ea19d]');
        btn.classList.add('bg-[#a11e22]');
    }
</script>

@endsection

{{--@extends('front.projects.master')

@section('content')
<div class="main-body">
    <!-- page container -->
    <div>
        <!-- page breadcrumbs -->
        <div class="flex items-center space-x-2 text-sm breadcrumbs bg-[#1ea19d]">
            <a href="{{ route('home') }}" class="text-[#a11e22] hover:text-gray-900">
                <i class="fa fa-home"></i>
            </a>
            <span class="text-gray-500">/</span>
            <span class="text-[#a11e22]">Become a Trainer</span>
        </div>
        <!-- END page breadcrumbs -->

        @include('front/partials/alert')

        <div class="container mx-auto py-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="second-column">
                    <img class="w-full object-cover rounded-lg shadow-lg transform transition-transform duration-700 ease-out animate-slide-down hover:scale-105" src="{{ asset('images/trainer.webp') }}" alt="ires trainer">
                </div>
                <div class="first-column">
                    <div class="py-2">
                        <div class="ip-tagline">
                            <h3 class="text-2xl font-semibold text-[#a11e22]">Become a Trainer</h3>
                            <hr class="my-2 border-t-2 border-gray-300" />
                        </div>
                        <p class="p-4">IRES is experiencing rapid growth, and the demand for additional trainers is increasing significantly. 
                            Currently, we operate in over seven training stations globally, spanning more than fifteen sectors. 
                            Our culture fosters innovation, collaboration, and forward thinking, empowering professionals to excel.
                            If you're interested in joining our dynamic team, we'd love to hear from you! 
                            In this dynamic role, you'll collaborate with our training department to devise and implement innovative training strategies tailored to address our clients' diverse challenges.</p>
                    </div>
                </div>
            </div>

            <div class="ip-course-desc">
                <!-- Tabs Section -->
                <div>
                    <h3 class="text-xl font-semibold text-[#a11e22]">What Our Trainers Do</h3>
                    <hr class="my-2 border-t-2 border-gray-300" />
                    <p class="text-gray-700">As the Corporate Trainer, your primary focus will be on designing and delivering top-notch In-person and Zoom training programs, ensuring our participants feel empowered and satisfied with their learning experience.</p>
                    <nav>
                        <ul class="flex flex-col sm:flex-row justify-center sm:space-x-4 mb-6 space-y-4 sm:space-y-0">
                            <li>
                                <button type="button" onclick="showForm('development', this)" class="button btn-blue block py-4 px-6 font-semibold text-white bg-[#1ea19d] rounded-md">
                                    Training Program Development
                                </button>
                            </li>
                            <li>
                                <button type="button" onclick="showForm('coordination', this)" class="button btn-blue block py-4 px-6 font-semibold text-white bg-[#1ea19d] rounded-md">
                                    Training Coordination
                                </button>
                            </li>
                            <li>
                                <button type="button" onclick="showForm('sessions', this)" class="button btn-blue block py-4 px-6 font-semibold text-white bg-[#1ea19d] rounded-md">
                                    Conduct Training Sessions
                                </button>
                            </li>
                            <li>
                                <button type="button" onclick="showForm('requirements', this)" class="button btn-blue block py-4 px-6 font-semibold text-white bg-[#1ea19d] rounded-md">
                                    Requirements
                                </button>
                            </li>
                        </ul>
                    </nav>
                    <div class="tab-content">
                        <div class="tab-pane" id="development-list">
                            <h3 class="text-xl font-semibold text-[#a11e22]">Training Program Development</h3>
                            <hr class="my-2 border-t-2 border-gray-300" />
                            <ul class="list-disc list-inside text-gray-700">
                                <li>Assess the training requirements of our clients and create innovative training materials to meet their specific challenges.</li>
                                <li>Employ a variety of techniques, concepts, strategies, and tools to deliver effective training programs.</li>
                            </ul>
                        </div>
                        <div class="tab-pane hidden" id="coordination-list">
                            <h3 class="text-xl font-semibold text-[#a11e22]">Training Coordination</h3>
                            <hr class="my-2 border-t-2 border-gray-300" />
                            <ul class="list-disc list-inside text-gray-700">
                                <li>Work closely with our training department to ensure seamless delivery of scheduled training sessions.</li>
                            </ul>
                        </div>
                        <div class="tab-pane hidden" id="sessions-list">
                            <h3 class="text-xl font-semibold text-[#a11e22]">Conduct Training Sessions</h3>
                            <hr class="my-2 border-t-2 border-gray-300" />
                            <ul class="list-disc list-inside text-gray-700">
                                <li>Lead engaging training programs for our diverse client base.</li>
                                <li>Evaluate Training Effectiveness.</li>
                                <li>Assess the success of training initiatives by measuring achievement of learning objectives and knowledge transfer.</li>
                                <li>Continuously improve training solutions based on feedback and performance metrics.</li>
                            </ul>
                        </div>
                        <div class="tab-pane hidden" id="requirements-list">
                            <h3 class="text-xl font-semibold text-[#a11e22]">Requirements</h3>
                            <hr class="my-2 border-t-2 border-gray-300" />
                            <ul class="list-disc list-inside text-gray-700">
                                <li>Bachelor's degree or higher with a minimum of 5 years' experience in the relevant training field.</li>
                                <li>Demonstrated expertise as a Corporate Trainer within the industry.</li>
                                <li>Strong communication and presentation abilities.</li>
                                <li>Adaptability in tailoring training methods to different learning styles.</li>
                                <li>Analytical mindset for assessing training needs and gauging effectiveness.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-full text-center">
                    <a class="bg-[#1ea19d] hover:bg-[#a11e22] text-white font-bold py-3 px-6 rounded-lg mb-5 inline-block transform transition-transform duration-300 hover:scale-105" href="{{ route('trainer_application.create') }}">
                        Click to Apply as a Trainer
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function showForm(formType, clickedButton) {
            // Hide all forms
            document.getElementById('development-list').classList.add('hidden');
            document.getElementById('coordination-list').classList.add('hidden');
            document.getElementById('sessions-list').classList.add('hidden');
            document.getElementById('requirements-list').classList.add('hidden');

            // Show the selected form
            document.getElementById(formType + '-list').classList.remove('hidden');

            // Reset the button colors
            document.querySelectorAll('.button').forEach(btn => {
                btn.classList.remove('btn-green');
                btn.classList.add('btn-blue');
            });

            // Change clicked button to green
            clickedButton.classList.remove('btn-blue');
            clickedButton.classList.add('btn-green');
        }

        window.onload = function() {
            showForm('development', document.querySelector('ul button'));
        };
    </script>

    <style>
        .btn-blue { background-color: #1ea19d; }
        .btn-green { background-color: #a11e22; }
        @keyframes slideDown {
            0% {
                transform: translateY(-50%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-down {
            animation: slideDown 1s ease-out forwards;
        }
    </style>
@endsection --}}