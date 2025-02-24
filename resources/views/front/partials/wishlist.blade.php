<!-- Wishlist Modal -->
<div class="modal fade" id="wishlist" tabindex="-1" role="dialog" aria-labelledby="wishlist" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fill this form to add the course to your wishlist.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('contact.submit') }}" method="POST" id="wishlist">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="course_id" id="course-id">
                    
                    <div class="form-group col-md-12">
                        <small class="form-text text-muted">Course Name</small>
                        <input type="text" class="form-control" name="course_name" id="course-name-input" readonly>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <small class="form-text text-muted">Your Full Name <span style="color: #a11e22">(required*)</span></small>
                        <input type="text" class="form-control" placeholder="Your Full Name" name="full_name" value="{{ old('full_name', @$customer->name) }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <small class="form-text text-muted">Your Email Address <span style="color: #a11e22">(required*)</span></small>
                        <input type="email" class="form-control" placeholder="Your Email Address" name="email" value="{{ old('email', @$customer->account->email) }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-5 fs-6 m-0" data-dismiss="modal">Close</button>&nbsp;
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fs-6 m-0">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script to handle add to wishlist --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var wishlistButtons = document.querySelectorAll('.wishlist-button');
    
        wishlistButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var courseId = button.getAttribute('data-course-id');
                var courseName = button.getAttribute('data-course-name');
    
                document.getElementById('course-id').value = courseId;
                document.getElementById('course-name-input').value = courseName;
            });
        });
    });
</script>