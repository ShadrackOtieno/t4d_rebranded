@extends('front.Projects.master')

@section('content')
<div class="main-body" id="tp">
    <!-- page breadcrumbs -->
        <!-- page breadcrumbs -->
        <div class="breadcrumbs mt16 py-3 pl-5 bg-[#0096FF] h-10 text-white" id="tp">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home"></a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"></svg>

            <span class="text-white">Become an Affiliate</span>
        </div>
        <!-- END page breadcrumbs -->

    <div class="lg:w-[1024px] mx-auto">

        {{-- @include('front/partials/alert') --}}

        <div class=" py-4">
            <div class="flex flex-wrap">
                <!-- Image Column -->
                <div class="w-full md:w-1/2 p-4">
                    <div class="rounded-lgoverflow-hidden">
                        <img class="w-full h-auto rounded-lg" src="{{ asset('images/Become an Affiliate.webp') }}" alt="">
                    </div>
                </div>
                <!-- Text Column -->
                <div class="w-full md:w-1/2 p-4">
                    <div class="py-2">
                        <h3 class="text-4xl font-semibold text-[#00a651]">Represent us in Your Country</h3>
                        <hr class="my-2 border-[#00a651]">
                        <p class="">Join our network of affiliates and become a vital part of our mission to help people, organizations, and communities excel. As an affiliate, you'll promote our training programs and services while earning attractive commissions. Whether you're an independent consultant, blogger, influencer, or business owner, partnering with us opens new revenue streams and collaboration opportunities.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Brief Section -->
        <div class=" text-[#00a651] py-8">
            <div class="container mx-auto">
                <h3 class="text-3xl font-semibold text-center">How Does It Work?</h3>
                <hr class="my-2 border-[#00a651]">
                <p class="text-center text-[#0096FF]">As an affiliate, you'll promote our training programs and services while earning attractive commissions.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6 px-7">
                    <div class="p-4 text-center bg-[#0096FF] rounded-lg">
                        <span class="text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto">1</span>
                        {{-- <span class="fas fa-pencil-alt text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto"></span> --}}
                        <h4 class="text-lg font-semibold mt-2 text-white">Register as an Affiliate</h4>
                        <p class="text-gray-300">Fill in your personal details in the form provided.</p>
                    </div>
                    <div class="p-4 text-center bg-[#0096FF] rounded-lg">
                        <span class="text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto">2</span>
                        {{-- <span class="fas fa-share-alt text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto"></span> --}}
                        <h4 class="text-lg font-semibold mt-2 text-white">Get Referral Code</h4>
                        <p class="text-gray-300">We assign you a referral code and guide you through onboarding.</p>
                    </div>
                    <div class="p-4 text-center bg-[#0096FF] rounded-lg">
                        <span class="text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto">3</span>
                        {{-- <span class="fas fa-bullhorn text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto"></span> --}}
                        <h4 class="text-lg font-semibold mt-2 text-white">Market our Courses</h4>
                        <p class="text-gray-300">Start marketing our courses and inform your audience.</p>
                    </div>
                    <div class="p-4 text-center bg-[#0096FF] rounded-lg">
                        <span class="text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto">4</span>
                        {{-- <span class="fas fa-users text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto"></span> --}}
                        <h4 class="text-lg font-semibold mt-2 text-white">Participant Registration</h4>
                        <p class="text-gray-300">Participants register using your referral code.</p>
                    </div>
                    <div class="p-4 text-center bg-[#0096FF] rounded-lg">
                        <span class="text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto">5</span>
                        {{-- <span class="fas fa-money-bill-alt text-3xl bg-white rounded-full w-12 h-12 flex items-center justify-center mx-auto"></span> --}}
                        <h4 class="text-lg font-semibold mt-2 text-white">Earn</h4>
                        <p class="text-gray-300">Earn 10% commission for participants who register with your referral code.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Affiliate Benefits -->
        <div class="container mx-auto py-10">
            <div class="flex flex-wrap justify-between">
                <div class="w-full sm:w-1/2 p-4">
                    <h3 class="text-3xl font-semibold text-[#00a651]">Benefits of being our Representative</h3>
                    <hr class="my-2 border-[#00a651]">
                    <ol class="list-decimal pl-6 text-gray-700">
                        <li>Earn competitive commissions for every referral.</li>
                        <li>Access to a wealth of marketing collaterals.</li>
                        <li>Receive dedicated support from our team.</li>
                        <li>Gain valuable experience and expand your network.</li>
                    </ol>
                    <p class="mt-4">For inquiries, contact us at <br>
                        <b>
                        Phone: +254 715 077 817 or <br>
                        Email: outreach@indepthresearch.org.
                        </b>
                    </p>
                    <button id="registerBtn" class="mt-4 ires-primary-btn">Register Now</button>
                </div>
                <div class="w-full md:w-1/2 p-4">
                    <div class="rounded-lg overflow-hidden">
                        <img class="w-full h-auto rounded-lg" src="{{ asset('images/an Affiliate.webp') }}" alt="an Affiliate">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Affiliate Modal -->
<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden" id="affiliateModal" tabindex="-1" role="dialog" aria-labelledby="affiliateModalLabel" aria-hidden="true">
    <div class="bg-white rounded-lg overflow-hidden w-11/12 md:w-1/2 lg:w-1/3 shadow-lg relative">
        <div class="bg-[#00a651] flex justify-between items-center p-4">
            <h5 id="affiliateModalLabel" class="text-lg font-semibold text-white">Become an Affiliate</h5>
            <button id="closeModal" class="text-3xl text-white hover:text-gray-900">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ route('contact.submit') }}" method="POST" id="affiliates">
                @csrf
                <input type="hidden" name="type" value="enterprise">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-700">Your Full Name</label>
                        <input type="text" class="border border-gray-300 rounded w-full px-3 py-2" name="name" required>
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Your Personal Email</label>
                        <input type="email" class="border border-gray-300 rounded w-full px-3 py-2" name="email" required>
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Your Company Name</label>
                        <input type="text" class="border border-gray-300 rounded w-full px-3 py-2" name="company">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Your Company Email</label>
                        <input type="email" class="border border-gray-300 rounded w-full px-3 py-2" name="company_email">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Your Phone Number</label>
                        <input type="tel" class="border border-gray-300 rounded w-full px-3 py-2" name="phone">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Your Country</label>
                        <input type="text" class="border border-gray-300 rounded w-full px-3 py-2" name="country">
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-700">Your Website/Blog</label>
                        <input type="text" class="border border-gray-300 rounded w-full px-3 py-2" name="website">
                    </div>
                </div>
                <div class="my-2">
                    <input type="checkbox" id="tocs" required>
                    <label for="tocs" class="text-sm text-gray-700">By checking this box, you agree to our <a href="{{ route('terms-and-conditions') }}" target="_blank" class="text-blue-500">Terms and Conditions</a> and <a href="{{ route('privacy-policy') }}" target="_blank" class="text-blue-500">Privacy Policy</a>.</label>
                </div>
                <div class="flex space-x-4 mt-4">
                    <button type="submit" class="ires-pri-btn px-4 py-2 bg-[#328d8b] text-white rounded-md hover:bg-[#1e6d5d]">Submit</button>
                    <button type="button" id="closeModalBtn" class="ires-sec-btn px-4 py-2 bg-[#00a651] text-white rounded-md">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const registerBtn = document.getElementById('registerBtn');
        const affiliateModal = document.getElementById('affiliateModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const closeModal = document.getElementById('closeModal');

        // Show the modal when the register button is clicked
        registerBtn.addEventListener('click', () => {
            affiliateModal.classList.remove('hidden');
        });

        // Hide the modal when the close button is clicked
        closeModalBtn.addEventListener('click', () => {
            affiliateModal.classList.add('hidden');
        });

        // Hide the modal when clicking the X button
        closeModal.addEventListener('click', () => {
            affiliateModal.classList.add('hidden');
        });

        // Close the modal when clicking outside of the modal content
        affiliateModal.addEventListener('click', (e) => {
            if (e.target === affiliateModal) {
                affiliateModal.classList.add('hidden');
            }
        });
    });
</script>



@endsection
