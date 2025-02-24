<!-- registration inputs --> 
<div>
    <form action="{{ route('contact.submit') }}" method="post" id="inquiries">

        @csrf
        
        <input value="individual" type="hidden" name="type">

        <!-- personal details -->
        <div class="reg-sec">
            <div class="form-row text-left">
                <div class="form-group col-md-6">
                    <small class="form-text text-muted">Full Name<span class="red">(required)</span></small>
                    <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                </div>
                <div class="form-group col-md-6">
                    <small class="form-text text-muted">Email Address<span class="red">(required)</span></small>
                    <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                </div>
            </div>

            <div class="form-row text-left">

              <div class="form-group col-md-6">
                <small class="form-text text-muted">
                    Designation<span class="red">(required)</span>
                </small>
                <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ old('designation', @$customer->designation) }}" required>
            </div>
              <div class="form-group col-md-6">
                  <small class="form-text text-muted">Country</small>
                  <input type="text" class="form-control" placeholder="Country" name="country">
              </div>
              <div class="form-group col-md-6">
                  <small class="form-text text-muted">Phone Number</small>
                  <input type="tel" class="form-control" placeholder="Phone" name="phone">
              </div>
              <div class="form-group col-md-6">
                  <small class="form-text text-muted">Company Name</small>
                  <input type="text" class="form-control" placeholder="Company" name="company">
              </div>
            <div class="form-group col-md-6">
                <small class="form-text text-muted">How did you hear about us?</small>
                <select class="form-control" name="learn_about_us">
                    <option>
                        -- Select Option --
                    </option>
                    <option
                    @if ( old('learn_about_us') == 'Google' )
                    selected
                    @endif>
                    Google Search
                </option>
                <option
                @if ( old('learn_about_us') == 'Social Media' )
                selected
                @endif>
                Social Media
            </option>                                            
            <option
            @if ( old('learn_about_us') == 'Email' )
            selected
            @endif>
            Email
        </option>

        <option
        @if ( old('learn_about_us') == 'Event' )
        selected
        @endif>
        Event/ Expo
    </option>
    <option
    @if ( old('learn_about_us') == 'Referral' )
    selected
    @endif>
    Referral
</option>
</select>
</div>
            <div class="form-group col-md-12">
              <small class="form-text text-muted">How can we help you?</small>
              <textarea class="form-control" rows="4" name="message"></textarea>
          </div>
      </div>
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="tocs" required>
    <label class="form-check-label" for="tocs">By checking this you agree to our <a href="#" target="_blank">Terms and Conditions</a> and <a href="#" target="_blank">Privacy Policy</a></label>
</div>

<div class="reg-btn">
    <button class="btn btn-success rounded-pill px-5 fs-6 m-0" type="submit">Submit</button>
    <button class="btn btn-sm btn-danger rounded-pill px-5 fs-6 m-0" type="reset"><span class="fa fa-refresh">&nbsp;</span>Reset</button>
</div>

</form>
</div>
  <!-- END registration inputs -->