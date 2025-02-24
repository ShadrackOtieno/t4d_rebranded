@extends('front.Projects.master')

@section('css')


@endsection

@section('content')
    <div class="">
        <!-- page breadcrumbs -->
        <div class="breadcrumbs mt16 pt-2 pb-3 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home"></a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"></svg>

            <span class="text-white">Corporate Packages</span>
        </div>
        <!-- END page breadcrumbs -->


       @include('front/partials/alert')

       <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#A11E22"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
       </div>
       

            <div class="lg:w5/6 container mx-auto mt-16 mb-10 px-8 lg:px-20">
                <div class="w-full lg:my-10 mx20 relative">
                    <h2 class="text-xl lg:text-3xl text-[#a11e22] font-bold">Group Packages</h2>
                    <hr class="w-24  mt-4 mb-10 border border-[#a11e22]">
                </div>
            
                <!-- Card Section -->
    
                <!-- Standard Card  -->
                <div class="border border-gray-800 bg-white shadow-lg rounded-lg px-10 pt-6 pb-16 mx-2 text-center">
                    <h3 class=" text-3xl text-[#a11e22] font-bold">Standard Package</h3>
                    <hr class="w-24 mx-auto mt-4 mb-6 border border-[#a11e22]">
                    <div id="" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                        <!-- Corporate Standard Package -->
                        <div class="w64 bg-white rounded-lg shadow-black shadow-md p-5">
                            <div class="text-blue-500 text-xl font-bold mb-2">Team of</div>
                            <div class="text-gray-700 text-base font-semibold">2-4 Members</div>
                            <div class="text-sm text-blue-400 mb-4">$ today save big</div>
                
                            <div class="border-t border-gray-300 pt-4 flex items-center justify-between">
                                <div class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">15% Discount</div>
                                {{-- <div class="text-gray-500 line-through">$14.65/yr</div>
                                <div class="text-xl font-bold text-gray-900">$10.99/yr</div> --}}
                            </div>
                        </div>
    
                        <div class="w64 bg-white rounded-lg shadow-black shadow-md p-5">
                            <div class="text-blue-500 text-xl font-bold mb-2">Team of</div>
                            <div class="text-gray-700 text-base font-semibold">5-8 Members</div>
                            <div class="text-sm text-blue-400 mb-4">$ today save big</div>
                
                            <div class="border-t border-gray-300 pt-4 flex items-center justify-between">
                                <div class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">20% Discount</div>
                                {{-- <div class="text-gray-500 line-through">$14.65/yr</div>
                                <div class="text-xl font-bold text-gray-900">$10.99/yr</div> --}}
                            </div>
                        </div>
    
                        <div class="w64 bg-white rounded-lg shadow-black shadow-md p-5">
                            <div class="text-blue-500 text-xl font-bold mb-2">Team of</div>
                            <div class="text-gray-700 text-base font-semibold">9-12 Members</div>
                            <div class="text-sm text-blue-400 mb-4">$ today save big</div>
                
                            <div class="border-t border-gray-300 pt-4 flex items-center justify-between">
                                <div class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">25% Discount</div>
                                {{-- <div class="text-gray-500 line-through">$14.65/yr</div>
                                <div class="text-xl font-bold text-gray-900">$10.99/yr</div> --}}
                            </div>
                        </div>
    
                        <div class="w64 bg-white rounded-lg shadow-black shadow-md p-5">
                            <div class="text-blue-500 text-xl font-bold mb-2">Team of</div>
                            <div class="text-gray-700 text-base font-semibold">13-20 Members</div>
                            <div class="text-sm text-blue-400 mb-4">$ today save big</div>
                
                            <div class="border-t border-gray-300 pt-4 flex items-center justify-between">
                                <div class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">30% Discount</div>
                                {{-- <div class="text-gray-500 line-through">$14.65/yr</div>
                                <div class="text-xl font-bold text-gray-900">$10.99/yr</div> --}}
                            </div>
                        </div>
    
                        <div class="w64 bg-white rounded-lg shadow-black shadow-md p-5">
                            <div class="text-blue-500 text-xl font-bold mb-2">Team of</div>
                            <div class="text-gray-700 text-base font-semibold">21+ Members</div>
                            <div class="text-sm text-blue-400 mb-4">$ today save big</div>
                
                            <div class="border-t border-gray-300 pt-4 flex items-center justify-between">
                                <div class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">35% Discount</div>
                                {{-- <div class="text-gray-500 line-through">$14.65/yr</div>
                                <div class="text-xl font-bold text-gray-900">$10.99/yr</div> --}}
                            </div>
                        </div>
                        <!-- Corporate BRONZE, GOLD, PLATINUM Packages with discounts for larger teams -->
                    
                    </div>
                    <div class="mt-14 items-center text-center">
                        <a href="/register" class="ires-primary-btn text-white font-bold py-4 px-8 rounded-full">Register</a>
                    </div>
                </div>

            </div>



            <div class="lg:w5/6 container mx-auto lg:my-10 lg:px-20">
                <div class="px10 pt-6  m20 text-center">
                    <h3 class="text-xl lg:text-3xl text-[#a11e22] font-bold">Premium Packages</h3>
                    <hr class="w-24 mx-auto my-4 border border-[#a11e22]">
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 p-6 mb-24 gap-8 px20">
                    <!-- Card 1 -->
                    <div class="max-w-lg bg-white border border-[#CD7F32] shadow-lg rounded-lg p-6 text-center">
                        
                        <h3 class="text-2xl font-bold text-gray-600 mb-4">Silver <span class=""></span></h3>
                        <p class="text-lg text-text-gray-500 font-semibold mb-4">(All Standard Inclusive)<span class="text-sm text-gray-500"></span></p>
                        <p class="text-lg font-semibold mb-4">Plus</p>
                        
                        <!-- Features -->
                        <ul class="list-none text-left lg:px-10 textwhite mb-4 space-y-2">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                Study Tours</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                Refreshments</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                NITA Certificate</li>
                        </ul>

                        <!-- Add to Basket Button -->
                        <button class="ires-primary-btn text-white font-bold py-2 px-4 rounded wfull ">
                            Register
                        </button>
                    </div>
                    
                    <div class="max-w-lg bg-[#D4af37] shadow-black shadow-lg rounded-lg p-6 text-center">
                        <div class=" relative">
                            <h3 class="text-xl lg:text-2xl  font-semibold mb-4 textleft lg:textcenter">Gold</h3>
                            <span class="absolute -top-5 right0 left-3 bg-[#a11e22] text-xs lg:text-sm px-2 py-3  my-3 rounded-md text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 20 20"><path fill="#1ea19d" d="M19.388.405a.605.605 0 0 0-1.141.399c.929 2.67-.915 4.664-2.321 5.732l-.568-.814c-.191-.273-.618-.5-.95-.504l-3.188.014a2.16 2.16 0 0 0-1.097.338L.729 12.157a1.01 1.01 0 0 0-.247 1.404l4.269 6.108c.32.455.831.4 1.287.082l9.394-6.588c.27-.191.582-.603.692-.918l.998-3.145c.11-.314.043-.793-.148-1.066l-.346-.496c1.888-1.447 3.848-4.004 2.76-7.133m-4.371 9.358a1.61 1.61 0 0 1-2.24-.396a1.614 1.614 0 0 1 .395-2.246a1.61 1.61 0 0 1 1.868.017c-.272.164-.459.26-.494.275a.606.606 0 0 0 .259 1.153q.13 0 .257-.059q.292-.137.619-.33a1.62 1.62 0 0 1-.664 1.586"/></svg>
                                Most sold
                            </span>
                        </div>
                        <p class="text-left lg:text-center text-lg text-white font-semibold mb-4">(All Silver Inclusive)<span class="text-sm text-gray-500"></span></p>
                        <p class="text-left lg:text-center text-lg font-semibold mb-4">Plus</p>

                        <ul class="list-none text-left lg:px-10 text-white mb-4 space-y-2">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                Study Tours</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                Refreshments</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                NITA Certificate</li>
                        </ul>
                        
                        <button class="wfull font-bold ires-primary-btn text-white py-2 px-4 mt-3 rounded-md">Register</button>

                    </div>

                    <!-- Card 3 -->
                    <div class="max-w-lg bg-white border border-[#7300AB] shadow-lg rounded-lg p-6 text-center">
                        <h3 class="text-2xl text-[#7300AB] font-bold mb-4">Platinum</h3>
                        <p class="text-lg textwhite font-semibold mb-4">(All Gold Inclusive)<span class="text-sm text-gray-500"></span></p>
                        <p class="text-lg font-semibold mb-4">Plus</p>
                        
                        <!-- Features -->
                        <ul class="list-none text-left lg:px-10 textwhite mb-4 space-y-2">
                            <li>
                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                10 GB Storage</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                Unlimited Bandwidth</li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                Free SSL Certificate</li>
                        </ul>

                        <!-- Add to Basket Button -->
                        <button class="ires-primary-btn text-white font-bold py-2 px-4 rounded wfull ">
                            Register
                        </button>
                    </div>
                    <div class="clearfix" id="customize-corporate"></div>
                
                </div>
                
            </div> 


            {{-- Customize Group --}}

            <div class=" lg:mx20 w-full lg:w-9/12 container  mx-auto lg:pt[60px] pb-20 dark:bg-secondary">
                <section
                class="  relative bg-[url('https://makecomponents.com/Image/call-to-action/001/001.webp')] h-[500px] sm:h-[370px] md:h-[400px] lg:h[300px] bg-no-repeat bg-cover bg-center "
                >
                    <div class="h-full relative">
                        
                        <div class="col-span2 h-full flex py-8 justify-center">
                            <div class="px-4">
                                <h3 class=" text-white  relative after:bg-[#fff] after:w-[10%] text-xl lg:text-4xl font-semibold   pb-4">
                                    Want to customize your Group Package?
                                </h3>
                                <p class="text-lg text-text-gray-500 font-semibold text-[#1ea19d] mb-4">(All Standard Discounts Inclusive)<span class="text-sm text-gray-500"></span></p>
                                <form action="/action_page.php" class="text-lg lg:text-2xl text-white *:mb-2 grid grid-cols-2 lg:grid-cols-3">
                                    <div>
                                        <input class="size-4" type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> I have a bike</label><br>
                                        <input class="size-4" type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                        <label for="vehicle2"> I have a car</label><br>
                                        <input class="size-4" type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                        <label for="vehicle3"> I have a boat</label><br><br>
                                    </div>

                                    <div>
                                        <input class="size-4" type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> I have a bike</label><br>
                                        <input class="size-4" type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                        <label for="vehicle2"> I have a car</label><br>
                                        <input class="size-4" type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                        <label for="vehicle3"> I have a boat</label><br><br>
                                    </div>

                                    <div>
                                        <input class="size-4" type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> I have a bike</label><br>
                                        <input class="size-4" type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                        <label for="vehicle2"> I have a car</label><br>
                                        <input class="size-4" type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                        <label for="vehicle3"> I have a boat</label><br><br>
                                    </div>
                                </form>
                            
                                <div class="lg:mt-14 items-center text-center">
                                    <a href="/register" class="ires-primary-btn text-white font-bold py-4 px-8 rounded-full">Register</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>


    </div>














@endsection
