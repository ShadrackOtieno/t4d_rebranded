<nav>
    <div class="nav nav-tabs ip-pinfo-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link @if ( url()->current() == route('customer.account.profile.show') ) active @endif" id="nav-pinfo-tab" href="{{ route('customer.account.profile.show') }}" aria-controls="nav-pinfo" aria-selected="true">
            Personal Information
        </a>

        <a class="nav-item nav-link @if ( strpos(url()->current(), 'course') ) active @endif" id="nav-courses-tab" href="{{ route('customer.account.course.index') }}" aria-controls="nav-courses" aria-selected="false">
            Courses
        </a>

        <a class="nav-item nav-link @if ( strpos(url()->current(), 'certification') and !strpos(url()->current(), 'bundle') ) active @endif" id="nav-certifications-tab" href="{{ route('customer.account.certification.index') }}" aria-controls="nav-certifications" aria-selected="false">
            Certifications
        </a>

        <a class="nav-item nav-link @if ( strpos(url()->current(), 'certification_bundle') ) active @endif" id="nav-certifications-tab" href="{{ route('customer.account.certification_bundle.index') }}" aria-controls="nav-certifications" aria-selected="false">
            Certification Bundles
        </a>

        <a class="nav-item nav-link @if ( strpos(url()->current(), 'course/bundle') ) active @endif" id="nav-course-bundle-tab" href="{{ route('customer.account.course.bundle.index') }}" aria-controls="nav-course-bundle" aria-selected="false">
            Course Bundles
        </a>

        <a class="nav-item nav-link @if ( strpos(url()->current(), 'tour') ) active @endif" id="nav-tour-tab" href="{{ route('customer.account.tour.index') }}" aria-controls="nav-tour" aria-selected="false">
            Tours
        </a>

        <a class="nav-item nav-link @if ( strpos(url()->current(), 'software-quote') ) active @endif" id="nav-soft-tab" href="{{ route('customer.account.software_quote.index') }}" aria-controls="nav-soft" aria-selected="false">
            Software
        </a>

        <a class="nav-item nav-link @if ( strpos(url()->current(), 'reservation') ) active @endif" id="nav-soft-tab" href="{{ route('customer.account.reservation.index') }}" aria-controls="nav-soft" aria-selected="false">
            Hotel Reservations
        </a>

        <a class="nav-item nav-link @if ( url()->current() == route('customer.account.profile.edit') ) active @endif" id="nav-edit-tab" href="{{ route('customer.account.profile.edit') }}" aria-controls="nav-edit" aria-selected="false">
            Edit Account
        </a>

        <a class="nav-item nav-link @if ( url()->current() == route('customer.account.settings.edit') ) active @endif" id="nav-settings-tab" href="{{ route('customer.account.settings.edit') }}" aria-controls="nav-edit" aria-selected="false">
            Settings
        </a>
    </div>
</nav>