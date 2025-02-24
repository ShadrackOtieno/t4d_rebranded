@extends('front.projects.master')

@section('content')
    <div class="main-body">
            <!-- page breadcrumbs -->
            <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
        
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"></svg>

                <span class="text-white">Join our team</span>
            </div>
            <!-- END page breadcrumbs -->

        <!-- Page Container -->
        <div class="container mx-auto px-4 py-6">


            <!-- Page Content -->
            <div class="ip-content">
                @if (session()->has('success'))
                    <div class="alert alert-success mb-4 p-4 bg-green-100 text-[#1ea19d] rounded">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <!-- Course Schedule -->
                <div class="mb-2">
                    <p class="text-lg md:text-lg">
                        Are you interested in joining the IRES team as a trainer? Fill in the form below and we shall get back to you ASAP.
                        All the best.
                    </p>
                </div>

                <!-- Registration Inputs -->
                <div class="container justify-center content-center bg-white border border-[#1ea19d]">
                    <form action="{{ route('trainer_application.store') }}" method="POST" id="trainers-registration" >
                        @csrf
                <div class="space-y-4 py-4">
                    
             
                        <!-- Personal Details -->
                        <div class="reg-sec space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-4 sm:px-6">
                                <div>
                                    <label class="block text-gray-700 text-sm">Full Name</label>
                                    <input type="text" class="mt-1 block w-full border border-[#1ea19d] rounded-md shadow-sm py-2 px-3 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]" placeholder="Your Full Name" name="name" required>
                                </div>
                                <div>
                                    <label class="block font-medium text-gray-700 text-sm">Phone Number</label>
                                    <input type="tel" class="mt-1 block w-full border border-[#1ea19d] rounded-md shadow-sm py-2 px-3 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]" placeholder="Phone Number" name="phone">
                                </div>
                            </div>
                
                            <div class="px-4 sm:px-6">
                                <div>
                                    <label class="block font-medium text-gray-700 text-sm">Email Address</label>
                                    <input type="email" class="mt-1 block w-full sm:w-1/2 border border-[#1ea19d] rounded-md shadow-sm py-2 px-3 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]" placeholder="Personal Email Address" name="email" required>
                                </div>
                            </div>
                
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-4 sm:px-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Country</label>
                                    <select class="mt-1 block w-full border border-[#1ea19d] rounded-md shadow-sm py-2 px-3 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]" name="country">
                                        @foreach ([
                                            "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", 
                                            // ... (other countries)
                                            "Zimbabwe"
                                        ] as $country)
                                            <option value="{{ $country }}" @if (old('country') == $country) selected @endif>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" class="mt-1 block w-full border border-[#1ea19d] rounded-md shadow-sm py-2 px-3 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]" placeholder="City" name="city" required>
                                </div>
                            </div>
                
                            <div class="px-4 sm:px-6">
                                <label class="block text-sm font-medium text-gray-700">Upload Cover Letter and CV</label>
                                <input type="file" name="document" class="mt-1 block w-full border border-[#1ea19d] rounded-md shadow-sm py-2 px-3 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]">
                            </div>
                
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-4 sm:px-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Area(s) of Specialization</label>
                                    <textarea class="mt-1 block w-full border border-[#1ea19d] rounded-md shadow-sm h-32 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]" rows="3" name="specialization" required></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Additional Information</label>
                                    <textarea class="mt-1 block w-full border border-[#1ea19d] rounded-md shadow-sm h-32 outline-none focus:ring-[#a11e22] focus:border-[#a11e22]" name="comment"></textarea>
                                </div>
                            </div>
                        </div>
                
                        <div class="flex items-center mb-4 px-4 sm:px-6">
                            <input type="checkbox" class="form-check-input" id="tocs" required>
                            <label class="ml-2 text-sm" for="tocs">By checking this you agree to our <a href="{{ route('terms-and-conditions') }}" class="text-[#1ea19d]">Terms and Conditions</a> and <a href="{{ route('privacy-policy') }}" class="text-[#1ea19d]">Privacy Policy</a></label>
                        </div>
                
                        <div class="reg-btn flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 px-6">
                            <button type="submit" class="btn btn-success  px-4 py-2 bg-[#1ea19d] text-white rounded-lg shadow hover:bg-[#a11e22]">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger px-4 py-2 text-white rounded-lg shadow bg-[#a11e22]">
                                <span class="fa fa-refresh">&nbsp;</span>Reset
                            </button>
                        </div>
                </div>
                    </form>
                </div>
                <!-- END Registration Inputs -->
            </div>
            <!-- END Page Content -->
        </div>
        <!-- END Page Container -->
    </div>
@endsection