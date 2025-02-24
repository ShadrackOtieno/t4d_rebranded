<!-- registration inputs --> 
<div>
    <form action="{{ route('contact.submit') }}" method="post">
  
        @csrf
        
        <input value="individual" type="hidden" name="type">
  
        <!-- personal details -->
        <div class="reg-sec">
            <div class="form-row text-left">
                <div class="form-group col-md-6">
                    <small class="form-text text-muted">Full Name</small>
                    <input type="text" class="form-control" placeholder="Full Name" name="name">
                </div>
                <div class="form-group col-md-6">
                    <small class="form-text text-muted">Email Address</small>
                    <input type="email" class="form-control" placeholder="Email Address" name="email">
                </div>
            </div>
  
            <div class="form-row text-left">
              <div class="form-group col-md-6">
                  <small class="form-text text-muted">Phone Number</small>
                  <input type="tel" class="form-control" placeholder="Phone" name="phone">
              </div>
              <div class="form-group col-md-6">
                  <small class="form-text text-muted">Opportunity</small>
                  <select class="form-control">
                    <option>Careers</option>
                    <option>Internship</option>
                    <option>Trainer</option>
                  </select>
                  {{-- <input type="text" class="form-control" placeholder="Company" name="company"> --}}
              </div> 
              <small class="form-text text-muted">Attach your CV/ Resume</small>
              <div class="custom-file">               
                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Upload Failed</div>
              </div>
              <div class="form-group col-md-12">
                  <small class="form-text text-muted">Tell us a bit about yourself</small>
                  <textarea class="form-control" rows="4" name="message"></textarea>
              </div>
            </div>
        </div>
        
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="tocs" required>
            <label class="form-check-label" for="tocs">By checking this box, you agree to our <a href="{{ route('terms-and-conditions') }}" target="_blank">Terms and Conditions</a> and <a href="{{ route('privacy-policy') }}" target="_blank">Privacy Policy</a></label>
        </div>
  
        <div class="reg-btn">
            <button class="btn btn-success rounded-pill px-5 fs-6 m-0" type="submit">Submit</button>
            <button class="btn btn-sm btn-danger rounded-pill px-5 fs-6 m-0" type="reset"><span class="fa fa-refresh">&nbsp;</span>Reset</button>
        </div>
        
    </form>
  </div>
  <!-- END registration inputs -->