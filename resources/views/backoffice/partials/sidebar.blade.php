<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <!--  <li class="header">MAIN NAVIGATION</li>  -->
                <li class="active">
                    <a href="{{ route('backoffice.home') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                @can('view_courses')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">class</i>
                            <span>Courses</span>
                        </a>
                        <ul class="ml-menu">
                            @can('create_edit_course')
                                <li>
                                    <a href="{{ route('backoffice.course.category.index') }}">
                                        Categories
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('backoffice.course.create') }}">
                                        Add Course
                                    </a>
                                </li>
                            @endcan
                            <li>
                                <a href="{{ route('backoffice.course.index') }}">
                                    View Courses
                                </a>
                            </li>
                            @can('create_edit_course')
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        Course Bundles
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="{{ route('backoffice.course.bundle.create') }}">Add Bundle</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('backoffice.course.bundle.index') }}">View Course Bundles</a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    Training Calendar
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ route('backoffice.course.calendar.create') }}">Add Calendar</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backoffice.course.calendar.index') }}">View Calendar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endcan
                
                @can('view_courses')
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">class</i>
                        <span>Sectors</span>
                    </a>
                    <ul class="ml-menu">
                        @can('create_edit_course')
                            <li>
                                <a href="{{ route('backoffice.course.category.index') }}">
                                    Sectors
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.course.create') }}">
                                    Add Sector
                                </a>
                            </li>
                        @endcan
                        <li>
                            <a href="{{ route('backoffice.course.index') }}">
                                View Sectors
                            </a>
                        </li>
                        @can('create_edit_course')
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    Course Bundles
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ route('backoffice.course.bundle.create') }}">Add Bundle</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backoffice.course.bundle.index') }}">View Course Bundles</a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                Training Calendar
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('backoffice.course.calendar.create') }}">Add Calendar</a>
                                </li>
                                <li>
                                    <a href="{{ route('backoffice.course.calendar.index') }}">View Calendar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('view_programs')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">school</i>
                            <span>Programs</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('backoffice.programs.programs.index') }}">Programs</a>
                            </li>
                            @can('create_edit_programs')
                                <li>
                                    <a href="{{ route('backoffice.programs.modules.index') }}">Module Levels</a>
                                </li>
                                <li>
                                    <a href="{{ route('backoffice.programs.brochures') }}">Brochure Download Contacts</a>
                                </li>
                                <li>
                                    <a href="{{ route('backoffice.programs.techStack') }}">Tech Stacks</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('backoffice.career-modules.index') }}" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.75em" height="1.75em" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6h-6V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H2v15h20zm-8 0h-4V4h4z"/></svg>
                        <span>Careers Module</span>
                    </a>
                </li>
                @can('view_programs')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">feed</i>
                            <span>Services</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('backoffice.services.index') }}">Services</a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.service_industries.index') }}">Industries</a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.capabilities.index') }}">Capabilities</a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.enquiries') }}">Enquiries</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_certifications')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance</i>
                            <span>Professional Certifications</span>
                        </a>
                        <ul class="ml-menu">

                            @can('create_edit_certifications')
                                <li>
                                    <a href="{{ route('backoffice.certification.category.index') }}">
                                        Categories
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('backoffice.certification.certifying_body.index') }}">
                                        Certifying Bodies
                                    </a>
                                </li>
                            @endcan

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    Certifications
                                </a>
                                <ul class="ml-menu">

                                    @can('create_edit_certifications')
                                        <li>
                                            <a href="{{ route('backoffice.certification.create') }}">Add Certification</a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a href="{{ route('backoffice.certification.index') }}">View Certifications</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    Certification Bundles
                                </a>
                                <ul class="ml-menu">

                                    @can('create_edit_certifications')
                                        <li>
                                            <a href="{{ route('backoffice.certification_bundle.create') }}">Add Certification Bundle</a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a href="{{ route('backoffice.certification_bundle.index') }}">View Certification Bundles</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_tours')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">beach_access</i>
                            <span>Tours</span>
                        </a>
                        <ul class="ml-menu">
                            @can('create_edit_tours')
                                <li>
                                    <a href="{{ route('backoffice.tour.category.index') }}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{ route('backoffice.tour.create') }}">Add Tour</a>
                                </li>
                            @endcan
                            <li>
                                <a href="{{ route('backoffice.tour.index') }}">View Tours</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_e_systems')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">cloud_circle</i>
                            <span>Enterprise Systems</span>
                        </a>
                        <ul class="ml-menu">
                            @can('create_edit_e_systems')
                                <li>
                                    <a href="{{ route('backoffice.software.category.index') }}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{ route('backoffice.software.create') }}">Add Enterprise System</a>
                                </li>
                            @endcan
                            <li>
                                <a href="{{ route('backoffice.software.index') }}">View Enterprise Systems</a>
                            </li>
                            @can('view_leads')
                                <li>
                                    <a href="{{ route('backoffice.software.quote.index') }}">View Orders</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('view_faqs')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">question_mark</i>
                            <span>FAQs</span>
                        </a>
                        <ul class="ml-menu">
                            @can('create_edit_faqs')
                                <li>
                                    <a href="{{ route('backoffice.faqs.create') }}">Add FAQ</a>
                                </li>
                            @endcan
                            <li>
                                <a href="{{ route('backoffice.faqs.index') }}">Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.faqs.index') }}">View FAQs</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_h_reservations')
                    <li>
                        <a href="{{ route('backoffice.hotel_reservation.index') }}">
                            <i class="material-icons">hotel</i>
                            <span>Hotel Reservations</span>
                        </a>
                    </li>
                @endcan

                @can('view_downloads')
                    <li>
                        <a href="{{ route('backoffice.download.index') }}">
                            <i class="material-icons">file_download</i>
                            <span>Downloads</span>
                        </a>
                    </li>
                @endcan

                @can('view_location')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">place</i>
                            <span>Location</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('backoffice.venue.create') }}">Add Location</a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.venue.index') }}">All Locations</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_users')
                    <li>
                        <a href="{{ route('backoffice.customer.index') }}">
                            <i class="material-icons">person_pin</i>
                            <span>Registered Customers</span>
                        </a>
                    </li>
                @endcan

                @can('view_companies')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">business</i>
                            <span>Companies</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('backoffice.segments.index') }}">
                                    <span>Segments</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.company.create') }}">
                                    <span>New Company</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.company.index') }}">
                                    <span>From Registrations</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.company.confirmed') }}">
                                    <span>Approved Companies</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li>
                    <a href="{{ route('backoffice.landing-pages.index') }}">
                        <i class="material-icons">list</i>
                        <span>Landing Pages</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('backoffice.project-pages.index') }}">
                        <i class="material-icons">list</i>
                        <span>Project Pages</span>
                    </a>
                </li>

                @can('view_invoices')
                    <li>
                        <a href="{{ route('backoffice.invoice.index') }}">
                            <i class="material-icons">library_books</i>
                            <span>Manage Invoices</span>
                        </a>
                    </li>
                @endcan

                @can('view_leads')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">shopping_cart</i>
                            <span>
                        Sales Leads
                    </span>
                        </a>

                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('backoffice.course.booking.index') }}">
                                    <span>Course Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.custom-course-bookings') }}">
                                    <span>Custom Dates Course Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.programs.bookings.index') }}">
                                    <span>Program Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.certification.booking.index') }}">
                                    <span>Certification Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.certification_bundle.booking.index') }}">
                                    <span>Certification Bundle Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.custom-bookings') }}">
                                    <span>GDPR Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.enquiry.index') }}">
                                    <span>Enquiries</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.referral.index') }}">
                                    <span>Referrals</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.contact.index') }}">
                                    <span>Contacts</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_feedback')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">question_answer</i>
                            <span>
                        User Feedback
                    </span>
                        </a>

                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    Reviews
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ route('backoffice.review.course.index') }}">
                                            Courses
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backoffice.review.certification.index') }}">
                                            Certfications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backoffice.review.tour.index') }}">
                                            Tours
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.trainer_issue.index') }}">
                                    <span>Trainer Issues</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_trainers')
                    <li>
                        <a href="{{ route('backoffice.trainer_application.index') }}">
                            <i class="material-icons">assignment_ind</i>
                            <span>Trainer Applications</span>
                        </a>
                    </li>
                @endcan

                @can('manage_users')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Staff</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('backoffice.staff.create') }}">Add Staff</a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.staff.index') }}">View Staff</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('view_settings')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>

                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    Product Configurations
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{route('backoffice.product-types.index')}}">
                                            Product Types
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.skill-types.index')}}">
                                            Skill Types
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.skill-levels.index')}}">
                                            Skill Levels
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.target-staff.index')}}">
                                            Target Staff Levels
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.pdc-stages.index')}}">
                                            PDC Stages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.bcg-levels.index')}}">
                                            BCG Levels
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    About Us Page
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{route('backoffice.about.sections')}}">
                                            Page Sections
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.about.history.index')}}">
                                            Company History
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.about.values.index')}}">
                                            Core Values
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.virtual_venue.create') }}">
                                    Virtual Currencies
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backoffice.season.edit') }}">
                                    Season
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    User Roles & Permissions
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{route('backoffice.roles.index')}}">
                                            Roles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('backoffice.permissions.index')}}">
                                            Permissions
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endcan

                @can('view_logs')
                    <li>
                        <a href="#">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <a href="javascript:void(0);">{{ config('app.name') }}</a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
