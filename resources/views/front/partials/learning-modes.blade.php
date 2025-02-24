<div class="row">
{{-- <div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="card py-3" id="myDiv">
      <img class="card-img" src="{{asset('front/landing-page/images/modes-image3.jpg')}}" alt="IRES">
      <div class="card-img-overlay text-white d-flex flex-column justify-content-left" style="background-color: #1EA19D;">
        <h4 class="card-title text-left">Enroll for a Face-to-Face (In-Person) Class</h4>
        <p class="card-text text-left">We use the highest quality learning facilities to make sure your experience is as comfortable as possible.</p>
        @isset($course)
        <span class="bc-btn btn-danger text-center">
          <a class="btn" href="{{ route('course.course-schedules', [$course->slug,'physical-classess']) }}" style="color: white;">
            Register Here
          </a>
        </span>
        @endisset
      </div>
    </div>
  </div> --}}
  <div class="col-12 col-sm-8 col-md-6 col-lg-6">
    <div class="card" id="myDiv1">
      <img class="card-img" src="{{asset('front/landing-page/images/modes-image3.jpg')}}" alt="IRES">
      <div class="card-img-overlay text-white d-flex flex-column justify-content-left" style="background-color: #1EA19D;">
        <h4 class="card-title text-left">Enroll for a Virtual (Zoom) Class</h4>
        <p class="card-text text-left">Join a scheduled class with a live instructor and other delegates.</p>
        @isset($course)
        <span class="bc-btn btn-danger text-center">
          <a class="btn" href="{{ route('course.course-schedules', [$course->slug,'virtual-classess']) }}" style="color: white;">
            Register Here
          </a>
        </span>
        @endisset
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-8 col-md-6 col-lg-6">
    <div class="card" id="myDiv2">
      <img class="card-img" src="{{asset('front/landing-page/images/modes-image3.jpg')}}" alt="IRES">
      <div class="card-img-overlay text-white d-flex flex-column justify-content-left" style="background-color: #1EA19D;">
        <h4 class="card-title text-left">Enroll for an Online Self-Paced Class</h4>
        <p class="card-text text-left">Keep track of your own progression throughout your course and ensure continuous improvement.</p>
        @isset($course)
        <span class="bc-btn btn-danger text-center">
          <a class="btn" href="{{ route('course.course-schedules', [$course->slug,'self-paced']) }}" style="color: white;">
            Register Here
          </a>
        </span>
        @endisset
      </div>
    </div>
  </div>
</div>

<script>
  // Get the div element by its id
  var myDiv = document.getElementById("myDiv");
  // Add a click event listener to the div
  myDiv.addEventListener("click", function() {
  // Open a new window with the desired link
  location.href = "{{ route('course.course-schedules', [$course->slug,'physical-classess']) }}";
  });
</script>

<script>
  // Get the div element by its id
  var myDiv = document.getElementById("myDiv1");
  // Add a click event listener to the div
  myDiv.addEventListener("click", function() {
  // Open a new window with the desired link
  location.href = "{{ route('course.course-schedules', [$course->slug,'virtual-classess']) }}";
  });
</script>

<script>
  // Get the div element by its id
  var myDiv = document.getElementById("myDiv2");
  // Add a click event listener to the div
  myDiv.addEventListener("click", function() {
  // Open a new window with the desired link
  location.href = "{{ route('course.course-schedules', [$course->slug,'self-paced']) }}";
  });
</script>