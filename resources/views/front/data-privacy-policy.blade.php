@extends('front.Projects.master')

@section('content')
    <div class="main-body bg-white">

        <!-- page container -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs text-white bg-[#0096FF] p-1">
                <!-- home -->
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                <!-- current page -->
                <span class="bc-current-page"> Data Privacy and Policy </span>
            </div>
            <!-- END page breadcrumbs -->
            {{-- @include('front/partials/alert') --}}

            <!-- about brief -->
            <div class="w-full lg:w-[1024px] mx-auto">
                <div class="mx-auto py-6 px-3">
                    <div>
                        <span class="block">
                            <h1 class="text-3xl font-semibold text-[#00a651]">Introduction</h1>
                            <hr class="my-4 border-4  border-[#0096FF] w-24"/>
                        </span>
                        <p class="mb-4">
                            Your privacy is important to us and we value it. This privacy statement explains the personal
                            data Tech For Development(IRES) collects, how IRES processes it, and for what purposes.
                        </p>
                        <p class="mb-4">
                            This statement should be read together with the Terms and Conditions of Use for other IRES
                            products and services. Where there is a conflict, this statement will prevail.
                        </p>
                        <p class="mb-4">
                            This statement applies to all customers, suppliers, agents, merchants, dealers, and all visitors
                            using any of IRES products and services.
                        </p>
                    </div>

                    <div>
                        <span class="block">
                            <h2 class="text-2xl font-medium text-[#00a651]">Information Collected</h2>
                            <hr class="my-4 border-4  border-[#0096FF] w-24"/>
                        </span>
                        <p class="mb-4">
                            We collect personal information that you voluntarily provide to us when you register for the
                            services, express an interest in obtaining information about us or our products and services
                            when you participate in activities on the services, or otherwise when you contact us.
                        </p>
                        <p class="mb-4">
                            This may include your name, email address, contact information, and job designation.
                            We do not process sensitive information like personally identifiable numbers.
                        </p>
                        <p class="mb-4">
                            All personal information that you provide must be true, complete, and accurate, and you must
                            notify us of any changes to such personal information. Some information such as your internet
                            protocol (IP) address or browser and device characteristics is collected automatically when you
                            visit our web services.
                        </p>
                    </div>

                    <div>
                        <span class="block">
                            <h2 class="text-2xl font-medium text-[#00a651]">How Information is Collected</h2>
                            <hr class="my-4 border-4  border-[#0096FF] w-24"/>
                        </span>
                        <p class="mb-4">
                            We automatically collect information when you visit, use, or navigate our services. This
                            information does not reveal your specific identity (like your name or contact information) but
                            may include device and usage information such as your IP address, operating system,
                            language preferences, and location.
                        </p>
                        <p class="mb-4">
                            This information is primarily needed to maintain the security and operation of our services
                            and for our internal analytics and reporting purposes.
                        </p>
                        <p class="mb-4">
                            We may also collect information from third-party sources for the express purpose of
                            providing, administering, or marketing our services.
                        </p>
                    </div>

                    <div>
                        <span class="block">
                            <h2 class="text-2xl font-medium text-[#00a651]">Use of Information</h2>
                            <hr class="my-4 border-4  border-[#0096FF] w-24"/>
                        </span>
                        <p class="mb-4">
                            We process your information to provide, improve, and administer our services,
                            communicate with you for security and fraud prevention, for marketing purposes, and to
                            comply with the law.
                        </p>
                        <p class="mb-4">
                            We may also process your information for other purposes with your consent. We process
                            your information only when we have a valid legal reason to do so.
                        </p>
                    </div>

                    <div>
                        <span class="block">
                            <h2 class="text-2xl font-medium text-[#00a651]">Third-Party Sharing</h2>
                            <hr class="my-4 border-4  border-[#0096FF] w-24"/>
                        </span>
                        <p class="mb-4">
                            We may share or transfer your information in connection with or during negotiations of any
                            merger, sale of company assets, financing, or acquisition of all or a portion of our business
                            to another company.
                        </p>
                        <p class="mb-4">
                            We may share your information with our affiliates, in which case we will require those
                            affiliates to honor this privacy notice. Affiliates include any subsidiaries, joint venture
                            partners, or other companies that we control or that are under common control with us.
                        </p>
                        <p class="mb-4">
                            We may share your information with our business partners to offer you certain products,
                            services, or promotions.
                        </p>
                    </div>

                    <div>
                        <span class="block">
                            <h2 class="text-2xl font-medium text-[#00a651]">User Rights</h2>
                            <hr class="my-4 border-4  border-[#0096FF] w-24"/>
                        </span>
                        <p class="mb-4">
                            Depending on where you are located geographically, the applicable privacy law may mean
                            you have certain rights regarding your personal information. These are:
                        </p>
                        <ol class="list-decimal ml-6 mb-4">
                            <li>Right to be informed that we are collecting personal data about you;</li>
                            <li>Right to access personal data that we hold about you and request information about how we process it;</li>
                            <li>Right to request that we correct your personal data where it is inaccurate or incomplete;</li>
                            <li>Right to request that we erase your personal data noting that we may continue to retain your information if obligated by the law or entitled to do so;</li>
                            <li>Right to object and withdraw your consent to the processing of your personal data. We may continue to process if we have a legitimate or legal reason to do so;</li>
                            <li>Right to request restricted processing of your personal data noting that we may be entitled or legally obligated to continue processing your data and refuse your request.</li>
                        </ol>
                    </div>

                    <!-- Repeat similar structure for other sections like "Data Security", "Retention of Data", etc. -->

                </div>
            </div>

            <!-- END about brief -->

        </div>
        <!-- END page container -->

    </div>
@endsection
