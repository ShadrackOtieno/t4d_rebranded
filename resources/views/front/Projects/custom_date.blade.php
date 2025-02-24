<div id="customizeDates" class="">
    <div class="bg-gray-100 rounded-lg shadow-lg max-w-lg w-full">
        <form action="{{ route('custom-course-booking', $course) }}" method="POST" class="custom-date p-6" id="custom-date">
            <div class="flex justify-between items-center border-b pb-3">
                <h5 class="text-lg font-semibold">Customize your Dates of Attendance</h5>
                <button type="button" class="text-gray-500 hover:text-gray-700" onclick="document.getElementById('custom-date').close()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="mt-4">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">

                <div class="mb-4">
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-600">(required*)</span></label>
                    <input type="text" id="full_name" name="full_name" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Your Full Name" value="{{ old('full_name', @$customer->name) }}" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number <span class="text-red-600">(required*)</span></label>
                        <input type="tel" id="phone_number" name="phone_number" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Your Phone Number" value="{{ old('phone_number', @$customer->phone) }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-red-600">(required*)</span></label>
                        <input type="email" id="email" name="email" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Your Email Address" value="{{ old('email', @$customer->account->email) }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="organization" class="block text-sm font-medium text-gray-700">Organization <span class="text-red-600">(required*)</span></label>
                        <input type="text" id="organization" name="organization" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Your Organization" value="{{ old('organization', @$customer->company->name) }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-sm font-medium text-gray-700">Location <span class="text-red-600">(required*)</span></label>
                        <select id="city" name="city" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="submitForm()">
                            <option value="" selected>Select a City</option>
                            @foreach (App\City::all() as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="number_of_participants" class="block text-sm font-medium text-gray-700">Number of Participants <span class="text-red-600">(required*)</span></label>
                    <input type="text" id="number_of_participants" name="number_of_participants" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="1" value="{{ old('number_of_participants') }}" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date <span class="text-red-600">(required*)</span></label>
                        <input type="date" id="start_date" name="start_date" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('start_date') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="duration" class="block text-sm font-medium text-gray-700">Duration in Days <span class="text-red-600">(required*)</span></label>
                        <input type="number" id="duration" name="duration" class="mt-1 px-2 py-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="5" value="{{ old('duration') }}" required>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="submit" class="ires-primary-btn">Submit Dates</button>
                <button type="button" class="ires-sec-btn px-6 py-2" onclick="document.getElementById('custom-date').close()">Close</button>
            </div>
        </form>
    </div>
</div>