@extends('front.Projects.master')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
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
                <span class="bc-current-page"> Terms and Conditions </span>
            </div>
            <!-- END page breadcrumbs -->

            {{-- @include('front/partials/alert') --}}

            <!-- about brief -->
            <div class="">
                <div class="lg:w-[1024px] mx-auto my-10 p-3">
                    <div class="my-10">
                        <span class="block py-2">
                          <h1 class="text-3xl text-[#00a651] font-semibold">Introduction</h1>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          The following constitute the terms and conditions to which applicants agree when booking any InDepth Research Institute (IRES) training courses (Terms and Conditions). Throughout the terms and conditions, (IRES) stands for Indepth Research Institute. Tech For Development(IRES) reserves the right to review and update these periodically.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Parties: These Terms and Conditions ("Agreement") are entered into between:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          Tech For Development(IRES), hereinafter referred to as the "Service Provider" or "IRES," whose
                          principal place of business is located at [Tara Road Runda, Off Kiambu Road, Nairobi].
                        </p>
                        <p class="text-base ">
                          The User or Customer, hereinafter referred to as the "User" or "Customer," who is the individual or entity
                          booking any Tech For Development(IRES) training courses and agrees to the terms and conditions
                          outlined in this Agreement.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h3 class="text-xl text-[#00a651] font-semibold">
                            Acceptance of Terms:
                          </h3>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          By accessing, using, making a purchase, or booking any Tech For Development(IRES) training courses,
                          the User acknowledges and agrees to be bound by these Terms and Conditions. If the User does not agree
                          with any part of these terms, they should not proceed further with the booking or use of the services.
                        </p>
                        <p class="text-base ">
                          The User acknowledges the importance of carefully reading and fully understanding these Terms and
                          Conditions before using any services provided by Tech For Development(IRES).
                        </p>
                        <p class="text-base ">
                          These terms govern the relationship between the User and Tech For Development(IRES) and outline
                          important rights, obligations, and responsibilities. If the User has any questions or concerns about these
                          terms, they should seek clarification from Tech For Development(IRES) before proceeding.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                            <h2 class="text-xl text-[#00a651] font-semibold">
                                Key Terms and Definitions:
                            </h2>
                            <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base">
                            <b class="font-semibold">Tech For Development(IRES):</b> Refers to the corporate training organization providing training courses and services as described in these Terms and Conditions.
                        </p>
                        <p class="text-base">
                            <b class="font-semibold">User or Customer:</b> Refers to the individual or entity booking any Tech For Development(IRES) training courses and agreeing to the terms and conditions outlined in this Agreement.
                        </p>
                        <p class="text-base">
                            <b class="font-semibold">Training Courses:</b> Refers to the educational programs, courses, or services offered by Tech For Development(IRES) for which the User may register and participate.
                        </p>
                        <p class="text-base">
                            <b class="font-semibold">GDPR:</b> The General Data Protection Regulation, a regulation in EU law on data protection and privacy concerning the processing of personal data.
                        </p>
                        <p class="text-base">
                            <b class="font-semibold">VAT:</b> Value Added Tax, a consumption tax levied on the value added to goods and services at each stage of production or distribution.
                        </p>
                        <p class="text-base">
                            <b class="font-semibold">Face-to-Face Training:</b> Refers to training courses conducted in physical locations where participants attend in person.
                        </p>
                        <p class="text-base">
                            <b class="font-semibold">Online Course:</b> Refers to training courses conducted over the internet, which participants can access remotely.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Services or Products Offered:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          Tech For Development(IRES) offers a range of professional training courses and educational services
                          designed to enhance the skills, knowledge, and competencies of participants. These services include:
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Training Courses:</b> Tech For Development(IRES) provides training courses covering various topics and
                          disciplines. These courses may be delivered through face-to-face sessions, online platforms, webinars, or
                          other suitable mediums.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Educational Materials:</b> Participants in Tech For Development(IRES) training courses receive relevant
                          course materials, which may include but are not limited to course outlines, study materials, and reference
                          resources.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Support and Communication:</b> Tech For Development(IRES) offers support to participants throughout
                          the training process. This support may include communication through email, messaging platforms, or
                          other means to address inquiries, provide updates, and facilitate a smooth learning experience.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Face-to-Face Training:</b> For face-to-face training courses, Tech For Development(IRES) may provide
                          refreshments and lunch during the training day(s), as specified in the course details.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Limitations, Restrictions, and Exclusions:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Availability and Changes:</b> Tech For Development(IRES) reserves the right to modify, suspend, or
                          discontinue any training course or service at any time without prior notice. The availability of specific
                          courses, trainers, or materials may vary, and Tech For Development(IRES) does not guarantee the
                          continuous availability of any particular offering.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Cancellation and Refunds:</b> Cancellation and refund policies vary based on the timing of the cancellation
                          and the specific training course. Users should review the cancellation and refund policies outlined for each
                          course before making a booking. Tech For Development(IRES) may charge an admin fee for
                          cancellations or substitutions, as detailed in the respective policies.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Intellectual Property Rights:</b> Users are granted a non-exclusive, non-transferable, revocable license to use
                          Tech For Development(IRES) materials for the purpose of the training courses. However, users are
                          strictly prohibited from copying, reproducing, uploading, posting, displaying, or linking to Indepth
                          Research Institute (IRES) content without prior permission.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Non-Attendance:</b> Failure to attend a booked training course without prior notice to Indepth Research
                          Institute (IRES) will result in the forfeiture of course fees and the absence of the option to transfer to
                          another course.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Technology:</b> Tech For Development(IRES) does not guarantee uninterrupted, error-free, or secure
                          access to online course content. Users are responsible for ensuring their devices meet technical
                          requirements and should seek support if they encounter technical issues.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Liability:</b> Tech For Development(IRES) is not liable for any actions or decisions made by users based
                          on information provided during training courses, including course materials. Opinions expressed by
                          trainers are their own and not necessarily those of Tech For Development(IRES). Users should seek
                          professional advice for specific situations.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Changes by Tech For Development(IRES):</b> Tech For Development(IRES) reserves the right to alter
                          or cancel training courses in extreme circumstances. If a course is canceled, Indepth Research Institute
                          (IRES) will provide alternatives or refunds as specified in the cancellation policy.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Travel Costs:</b> Users are responsible for any travel costs incurred in attending face-to-face training courses.
                          Tech For Development(IRES) does not accept liability for the reimbursement of travel expenses.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Responsibilities and Obligations of the User or Customer:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          By booking any Tech For Development(IRES) training courses and using the services provided, the User
                          or Customer agrees to the following responsibilities and obligations:
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Accurate Information:</b> The User is responsible for providing accurate, current, and complete information
                          during the registration and booking process. This includes personal details, contact information, and
                          payment details.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Compliance with Terms:</b> The User must comply with all the terms and conditions outlined in this
                          Agreement and any specific terms associated with the selected training course. Failure to adhere to these
                          terms may result in cancellation or removal from the course without a refund.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Payment:</b> The User agrees to pay the course fees as specified in the booking process. Payment must be
                          made before the training is offered. The User is responsible for any applicable sales taxes (VAT) based on
                          the product and/or customer type.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Cancellation and Substitution:</b> If the User needs to cancel a training course or substitute their place, they
                          must follow the procedures and deadlines specified in the cancellation and substitution policies for the
                          specific course. The User acknowledges that certain fees may apply for cancellations or substitutions.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Technology and Access:</b> For online courses, the User is responsible for ensuring that their devices meet
                          the technical requirements for accessing the course content. If technical issues arise, the User should seek
                          appropriate support.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Non-Attendance:</b> The User understands that failure to attend a booked training course without prior
                          notice to Tech For Development(IRES) will result in the forfeiture of course fees and the absence of
                          the option to transfer to another course.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Behavior:</b> The User agrees to conduct themselves appropriately during training courses, whether face-to-face or online. Inappropriate behavior, as deemed by Tech For Development(IRES) or its trainers, may
                          result in removal from the course without a refund.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Intellectual Property:</b> The User acknowledges that all materials provided by Indepth Research Institute
                          (IRES), including course materials, are protected by intellectual property rights. The User agrees not to
                          copy, reproduce, upload, post, display, or link to Tech For Development(IRES) content without prior
                          permission.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Professional Advice:</b> The User understands that opinions expressed during training courses are those of
                          individual trainers and not necessarily those of Tech For Development(IRES). For specific situations,
                          the User should seek professional advice.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Data Sharing:</b> The User acknowledges that their personal data, including their full name, job title, and
                          employer, may be shared with trainers in advance of the course for administrative purposes and course
                          delivery.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Feedback:</b> The User is encouraged to provide feedback on the training courses and services to help Indepth
                          Research Institute (IRES) improve its offerings.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Rules for Acceptable Conduct, Account Creation, and Password Protection:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Acceptable Conduct:</b><br>
                          The User agrees to conduct themselves in a respectful and professional manner during all training courses,
                          whether they are face-to-face or online. Inappropriate conduct, including but not limited to harassment,
                          discrimination, or disruptive behavior, will not be tolerated.
                        </p>
                        <p class="text-base ">
                          The User shall not engage in any behavior that may hinder the learning experience of other participants,
                          including excessive interruptions, use of offensive language, or any activity that violates applicable laws or
                          regulations.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) reserves the right to remove any participant from a training course if
                          their conduct is deemed inappropriate, disruptive, or in violation of these terms and conditions. In such
                          cases, no refunds or reimbursements will be provided.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Account Creation:</b><br>
                          To access certain training courses and materials, the User may be required to create an account on the
                          Tech For Development(IRES) platform. The User is responsible for maintaining the confidentiality of
                          their account credentials.
                        </p>
                        <p class="text-base ">
                          The User agrees to provide accurate and complete information when creating an account and to update
                          their account information as necessary to keep it current.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) reserves the right to suspend or terminate User accounts if any
                          information provided is found to be inaccurate, or misleading, or if the User violates these terms and
                          conditions.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Password Protection:</b><br>
                          The User is responsible for the security of their account password. Passwords should be kept confidential
                          and not shared with others.
                        </p>
                        <p class="text-base ">
                          If the User suspects that their account has been compromised or accessed without authorization, they
                          should immediately notify Tech For Development(IRES) to take appropriate action.
                          Tech For Development(IRES) will not be liable for any loss or damage resulting from unauthorized
                          access to the User's account due to the User's failure to protect their password adequately.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            User Data Collection, Use, Storage, and Protection:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Data Collection:</b><br>
                          When booking a training course with Tech For Development(IRES), the User is required to provide
                          certain personal information, including but not limited to their full name, contact information, job title,
                          and employer. This data is collected via the booking process.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) may also collect data related to the User's course progress, performance,
                          and interactions within online training platforms for the purpose of improving the learning experience.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Data Use:</b><br>
                          User data is primarily used for the purpose of delivering the training course and facilitating
                          communication related to the course.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) may use User data to inform Users about upcoming courses, educational
                          materials, and relevant updates.
                        </p>
                        <p class="text-base ">
                          User data may be shared with trainers to facilitate course administration and delivery.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Data Storage:</b><br>
                          User data is stored securely and in accordance with applicable data protection laws and regulations,
                          including the General Data Protection Regulation (GDPR).
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) takes measures to protect User data from unauthorized access,
                          disclosure, alteration, and destruction.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Data Protection:</b><br>
                          Tech For Development(IRES) is committed to protecting User data and takes steps to ensure data
                          security. However, it is important to note that no method of data transmission or storage is entirely secure,
                          and Tech For Development(IRES) cannot guarantee the security of User data.
                        </p>
                        <p class="text-base ">
                          Users are encouraged to create strong passwords and take precautions to safeguard their account
                          credentials.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Data Sharing:</b><br>
                          Tech For Development(IRES) may share User data with trainers and instructors for the purpose of
                          course administration and delivery. Trainers are expected to handle User data with care and in accordance
                          with applicable data protection laws.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) does not share User data with third parties for marketing purposes
                          without User consent.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Data Retention:</b><br>
                          User data will be retained for as long as necessary to fulfill the purposes outlined in these terms and
                          conditions, as well as to comply with legal and regulatory requirements.
                        </p>
                        <p class="text-base ">
                          Users have the right to request access to, correction of, or deletion of their personal data in accordance
                          with applicable data protection laws.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Company's Privacy Policy and Data Handling Practices:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Privacy Policy:</b><br>
                          Tech For Development(IRES) maintains a comprehensive Privacy Policy that outlines how User data is
                          collected, used, stored, and protected.
                        </p>
                        <p class="text-base ">
                          Users are encouraged to review the Privacy Policy, which is accessible on the Indepth Research Institute
                          (IRES) website, to gain a full understanding of our data handling practices.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Data Handling Practices:</b><br>
                          Tech For Development(IRES) is committed to protecting User data and follows industry best practices
                          and legal requirements for data handling.
                        </p>
                        <p class="text-base ">
                          Data collected from Users is used solely for the purpose of delivering training courses and facilitating
                          communication related to the courses.
                        </p>
                        <p class="text-base ">
                          User data is stored securely and is subject to stringent security measures to prevent unauthorized access,
                          disclosure, or alteration.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) does not share User data with third parties for marketing purposes
                          without User consent.
                        </p>
                        <p class="text-base ">
                          Users have the right to request access to, correction of, or deletion of their personal data in accordance
                          with applicable data protection laws.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Ownership of Content, Trademarks, Copyrights, and Intellectual Property:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Content Ownership:</b><br>
                          All training course materials, including but not limited to course content, curriculum, presentations,
                          handouts, videos, and any other instructional materials, provided by Tech For Development(IRES), are
                          owned by Tech For Development(IRES).
                        </p>
                        <p class="text-base ">
                          Users are granted a non-exclusive, non-transferable, revocable license to use the training course materials
                          for personal and educational purposes during their participation in the course.
                        </p>
                        <p class="text-base ">
                          No part of the training course content may be copied, reproduced, uploaded, posted, displayed, or linked
                          to in any way, in whole or in part, without the prior written permission of Tech For Development(IRES).
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Trademarks:</b><br>
                          All trademarks, service marks, logos, and trade names used by Tech For Development(IRES) are the
                          property of Tech For Development(IRES).
                        </p>
                        <p class="text-base ">
                          Users are not authorized to use any Tech For Development(IRES) trademarks, service marks, logos, or
                          trade names without the express written consent of Tech For Development(IRES).
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Copyrights:</b><br>
                          All intellectual property rights in all materials available from Tech For Development(IRES), including
                          the design, graphics, and text of all printed materials and the audio of all webinars and podcasts, are
                          owned by Tech For Development(IRES).
                        </p>
                        <p class="text-base ">
                          Users are prohibited from reproducing, distributing, or otherwise using any copyrighted materials
                          provided by Tech For Development(IRES) without prior written permission.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">User-Generated Content:</b><br>
                          Users may be allowed to submit user-generated content, such as discussion forum posts or comments, as
                          part of their participation in training courses.
                        </p>
                        <p class="text-base ">
                          By submitting user-generated content, Users grant Tech For Development(IRES) a non-exclusive,
                          royalty-free, worldwide, perpetual license to use, display, modify, and distribute such content for
                          educational and promotional purposes related to Tech For Development(IRES) training courses.
                        </p>
                        <p class="text-base ">
                          Users retain ownership of their user-generated content but grant Tech For Development(IRES) the
                          rights specified above.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Dispute Resolution, Jurisdiction, and Venue:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Dispute Resolution Methods:</b><br>
                          In the event of a dispute between the User and Tech For Development(IRES) arising from these terms
                          and conditions or the training courses, the parties agree to first attempt to resolve the dispute through
                          good-faith negotiations and discussions.
                        </p>
                        <p class="text-base ">
                          If the dispute remains unresolved through negotiations, the parties may pursue alternative dispute
                          resolution methods, such as arbitration or mediation, as agreed upon by both parties.
                        </p>
                        <p class="text-base ">
                          If alternative dispute resolution methods do not result in a resolution, either party may choose to pursue
                          litigation in accordance with the terms specified herein.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Arbitration:</b><br>
                          If the parties agree to resolve the dispute through arbitration, arbitration proceedings will be conducted
                          in accordance with the rules and regulations of the chosen arbitration provider, and the decision of the
                          arbitrator(s) will be binding and enforceable by law.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Mediation:</b><br>
                          If the parties agree to resolve the dispute through mediation, they will engage in the mediation process
                          with a neutral third party. Mediation is a non-binding process aimed at reaching a mutually acceptable
                          resolution.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Litigation:</b><br>
                          If the dispute remains unresolved through negotiations, arbitration, or mediation, the parties may choose
                          to pursue litigation. Any legal action will be conducted in the appropriate court of law.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Jurisdiction and Venue:</b><br>
                          Any legal disputes, claims, or actions arising from these terms and conditions or related to Indepth Research
                          Institute (IRES) training courses shall be subject to the exclusive jurisdiction of the courts in Kenya, and the
                          venue for any legal proceedings shall be in Kenya.
                        </p>
                        <p class="text-base ">
                          The parties agree to submit to the jurisdiction of the Kenyan courts and waive any objections based on the
                          convenience or inappropriateness of the chosen jurisdiction and venue.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Termination of Agreement or Service:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Breach of Terms:</b><br>
                          Tech For Development(IRES) reserves the right to terminate this agreement and/or the provision of
                          training courses in the event of a user’s breach of any terms and conditions outlined herein.
                        </p>
                        <p class="text-base ">
                          A breach of terms includes but is not limited to unauthorized use or reproduction of training course
                          materials, violation of intellectual property rights, disruptive behavior during training courses, or any other
                          actions that are contrary to the agreed-upon terms.
                        </p>
                        <p class="text-base ">
                          In the event of a breach, Tech For Development(IRES) may terminate the agreement and access to
                          training courses with immediate effect, without issuing a refund.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Non-Payment:</b><br>
                          Failure to make full payment for training courses in accordance with the specified payment terms may
                          result in the termination of the User's access to the course.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) may provide a grace period for payment, but if payment is not received
                          within the specified time frame, the User's access to the course may be terminated.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Disruptive Behavior:</b><br>
                          Tech For Development(IRES) reserves the right to terminate a user’s access to a training course in the
                          event of disruptive behavior, harassment, or any conduct that interferes with the learning experience of
                          other participants.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Other Termination Circumstances:</b><br>
                          Tech For Development(IRES) may terminate the provision of training courses in the event of
                          unforeseen circumstances, including but not limited to technical issues, or circumstances beyond the
                          control of Tech For Development(IRES).
                        </p>
                        <p class="text-base ">
                          In such cases, Tech For Development(IRES) will make reasonable efforts to provide alternative
                          solutions or reschedule affected training courses.
                        </p>
                    </div>

                    <div class="my-10">
                        <span class="block py-2">
                          <h2 class="text-xl text-[#00a651] font-semibold">
                            Limitation of Liability and Disclaimer:
                          </h2>
                          <hr class="w-24 my-2 border-t-4 border-[#0096FF]"/>
                        </span>
                        <p class="text-base ">
                          <b class="font-semibold">Limitation of Liability:</b><br>
                          Tech For Development(IRES) shall not be liable for any direct, indirect, incidental, special,
                          consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or
                          indirectly, arising from or in connection with the use or inability to use our training courses or services.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) shall not be liable for any disruptions, interruptions, delays, or technical
                          issues that may affect the delivery or availability of training courses, whether caused by our systems or
                          external factors.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) shall not be liable for any damages or losses resulting from User actions
                          or decisions, including but not limited to the use or reliance on the content provided in training courses.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Disclaimer - "As Is" Service:</b><br>
                          Tech For Development(IRES) provides its training courses and services "as is" and makes no
                          representations or warranties of any kind, whether express or implied.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) disclaims all warranties, including but not limited to warranties of
                          merchantability, fitness for a particular purpose, and non-infringement.
                        </p>
                        <p class="text-base ">
                          Tech For Development(IRES) does not warrant that the training courses will be error-free,
                          uninterrupted, or free from viruses, bugs, or other harmful components.
                        </p>
                        <p class="text-base ">
                          Users acknowledge that they use Tech For Development(IRES) training courses and services at their
                          own risk and discretion.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Indemnification:</b><br>
                          Users agree to indemnify and hold harmless Tech For Development(IRES) and its affiliates, employees,
                          and agents from any claims, liabilities, damages, losses, or expenses, including legal fees, arising out of or
                          in connection with their use of our training courses or services, breach of these terms and conditions, or
                          violation of any applicable laws or regulations.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Governing Law:</b><br>
                          These terms and conditions, and any disputes arising from or related to them or the training courses
                          provided by Tech For Development(IRES), shall be governed by and construed in accordance with the
                          laws of Kenya.
                        </p>
                        <p class="text-base ">
                          The parties agree that any legal proceedings related to these terms and conditions shall be subject to the
                          exclusive jurisdiction of the courts in Kenya, as specified in the jurisdiction and venue section.
                        </p>
                        <p class="text-base ">
                          <b class="font-semibold">Entire Agreement:</b><br>
                          These terms and conditions, along with any additional policies, guidelines, or documents referenced
                          herein, constitute the entire agreement between the User and Tech For Development(IRES) regarding
                          the subject matter herein.
                        </p>
                        <p class="text-base ">
                          Any prior agreements, understandings, or representations, whether written or oral, are superseded by this
                          agreement.
                        </p>
                    </div>

                </div>
            </div>
            <!-- END about brief -->

        </div>
        <!-- END page container -->

    </div>
@endsection
