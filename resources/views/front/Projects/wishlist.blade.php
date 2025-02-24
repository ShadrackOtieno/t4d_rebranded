<!-- Wishlist Modal -->
<div class="fixed inset-0 z-[999] overflow-y-auto bg[#000] backdrop-blur-md hidden" id="wishlist" tabindex="-1" role="dialog" aria-labelledby="wishlist" aria-hidden="true">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="inline-block overflow-hidden text-left align-bottom bg-white rounded-lg shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full translate-y-1/4">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:justify-between">
                    <div class="mt-3 text-center sm:mt-0 ml-4 sm:ml-0 sm:text-left">
                        <h5 class="text-lg leading-6 font-medium text-gray-900">Fill this form to add course to wishlist.</h5>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-right hover:bg-red-500 px-2" onclick="closePopupForm()">
                        <button type="button" class="text-gray-400 hover:text-gray-500" data-dismiss="modal" aria-label="Close">
                            <span class="text-2xl">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="{{ route('contact.submit') }}" method="POST" id="wishlist">
                @csrf
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                    <input type="hidden" name="course_id" id="course-id">
                    
                    <div class="w-full mb-4">
                        {{-- <small class="block text-gray-500">Course Name</small> --}}
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md" name="course_name" id="course-name-input" readonly>
                    </div>
                    
                    <div class="w-full mb-4">
                        <small class="block text-gray-500">Your Full Name <span class="text-red-600">(required*)</span></small>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="Your Full Name" name="full_name" value="{{ old('full_name', @$customer->name) }}" required>
                    </div>
                    <div class="w-full mb-4">
                        <small class="block text-gray-500">Your Email Address <span class="text-red-600">(required*)</span></small>
                        <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="Your Email Address" name="email" value="{{ old('email', @$customer->account->email) }}" required>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 flex justify-end">

                <button type="submit" class="mt-3 mx-3 w-full inline-flex justify-center rounded-full border border-transparent shadow-sm px-5 py-2 bg-[#0096FF] text-base leading-6 font-medium text-white hover:bg-[#b14a4d] focus:outline-none focus:border-#0096FF] focus:shadow-outline-blue transition ease-in-out duration-150 sm:w-auto sm:text-sm">Add</button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-full border border-transparent shadow-sm px-5 py-2 bg-[#b14a4d] text-base leading-6 font-medium text-white hover:bg-[#0096FF] focus:outline-none focus:border-[#b14a4d] focus:shadow-outline-gray transition ease-in-out duration-150 sm:w-auto sm:text-sm" data-dismiss="modal" onclick="closePopupForm()">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<!-- Script to handle add to wishlist -->

<script>
    var form = document.getElementById('wishlist')

    function wishListModal(button) {
        var courseName = button.getAttribute('data-course-name');

        form.classList.toggle('hidden')

        document.getElementById('course-name-input').value = courseName;
    }

    function closePopupForm() {
        form.classList.toggle('hidden')
    }
</script>

@endpush
