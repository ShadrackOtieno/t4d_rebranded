@extends('front.Projects.master')

@section('title', 'Contact Us')

@section('css')

    <!-- Tailwind CSS Custom Classes (for demonstration) -->
    <style>
        input, textarea {
            &:focus{
                outline: 1px solid #0096FF;
            }
        }
    </style>

@endsection

@section('content')
        <!-- page breadcrumbs -->
        <div class="flex items-center space-x-2 text-sm text-gray-600 bg-[#0096FF]">
            <a href="{{ route('home') }}" class="text-[#00a651] "><i class="fa fa-home"></i></a>
            <span>/</span>
            <span class="text-white">About Us</span>
        </div>
        <!-- END page breadcrumbs -->
<section class="">
    <div id="map" class="relative h-[350px] overflow-hidden bg-cover bg-[50%] bg-no-repeat">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8969789117027!2d36.83540597436076!3d-1.2313449355672674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1130733e284b%3A0xcb18023e46ff25a8!2sIndepth%20Research%20Institute%20(IRES)!5e0!3m2!1sen!2ske!4v1706173824798!5m2!1sen!2ske"
        width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class=" flex justify-center items-center flex-grow px-4 py-6">
      <div
        class="lg:w-[1020px] mx-auto block rounded-lg  shadow-lg shadow-gray-400 md:py-16 px-4 py-6 -mt-[100px] backdrop-blur-[30px] mb-32">
        <div class="w-full flex flex-wrap justify-center  py-4 flex-auto">
            
            <!-- contacts -->
            <div class=" max-sm:w-full sm:w-11/12 max-lg:mx-auto lg:w-5/12 max-lg:px-12 px-2 max-lg:mt-10 basis-auto flex flex-auto flex-col space-y-4 mb-10 order-2 lg:order-1">
                <div class="">
                    <div class="py-2 xl:py-0">
                      <div class="ip-tagline">
                        <h1 class="text-2xl font-bold text-[#00a651]">Contact Us</h1>
                      </div>
                      <p class="text-gray-700">We love hearing from all of you. <br>Have a quick question, inquiry or just want to say hello? Drop us a line.</p>
                    </div>
                  </div>
                <div class="">
                <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:w-10/12">
                    <div class="flex items-start">
                    <div class="shrink-0">
                        <div class="inline-block rounded-md bg-[#0096FF] p-4 text-white hover:bg-[#00a651]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                        </svg>
                        </div>
                    </div>
                    <div class="ml-6 grow">
                        <p class="mb-2 font-bold text-[#00a651]">
                        Customer support
                        </p>
                        <p class="text-sm text-neutral-500">
                            outreach@indepthresearch.org
                        </p>
                    
                    </div>
                    </div>
                </div>
                <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:w-10/12 ">
                    <div class="flex items-start">
                    <div class="shrink-0">
                        <div class="inline-block rounded-md bg-[#0096FF] p-4 text-white hover:bg-[#00a651]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                        </div>
                    </div>
                    <div class="ml-6">
                        <p class="mb-2 font-bold text-[#00a651] ">
                        Address
                        </p>
                        <p class="text-sm text-neutral-500 w-full ">Tala Road, Off Kiambu Road, Runda - Nairobi.
                    
                        </p>
                    </div>
                    </div>
                </div>
                <div
                    class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:mb-12 lg:w-full lg:px-6 xl:w-12/12">
                    <div class="align-start flex">
                    <div class="shrink-0">
                        <div class="inline-block rounded-md bg-[#0096FF] p-4 text-white hover:bg-[#00a651]">
                          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.283 8h-4.285m3.85 3h-3.85m4.061-6H11v11h8.27l1.715-9.847A.983.983 0 0 0 20.059 5ZM6.581 13.23h-.838A13.752 13.752 0 0 1 5.622 11c-.02-.745.02-1.49.12-2.23h1.04c.252 0 .496-.088.683-.245a.927.927 0 0 0 .329-.61l.2-1.872a.888.888 0 0 0-.045-.39.936.936 0 0 0-.212-.34 1.017 1.017 0 0 0-.341-.231A1.08 1.08 0 0 0 6.983 5h-2.06a1.27 1.27 0 0 0-.699.204 1.135 1.135 0 0 0-.442.543A15.066 15.066 0 0 0 3.007 11a15.656 15.656 0 0 0 .795 5.229c.165.462 1.342.771 1.864.771h1.116c.142 0 .283-.028.413-.082.13-.053.246-.132.341-.23a.936.936 0 0 0 .212-.34.889.889 0 0 0 .046-.391l-.201-1.873a.927.927 0 0 0-.33-.609 1.059 1.059 0 0 0-.682-.245ZM10 18v1h10v-1a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2Z"/>
                          </svg>
                          
    
                        </div>
                    </div>
                    <div class="ml-6 grow">
                        <p class="mb-2 font-bold text-[#00a651]">Land Line</p>
                        <p class="text-neutral-500">
                        (+254) 792 516 000
                        </p>
                    </div>
                    </div>
                </div>
                <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:mb-12 xl:w-12/12">
                    <div class="align-start flex">
                    <div class="shrink-0">
                        <div class="inline-block rounded-md bg-[#0096FF] p-4 text-white hover:bg-[#00a651]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        </div>
                    </div>
                    <div class="ml-6 grow">
                        <p class="mb-2 font-bold text-[#00a651]">Mobile</p>
                        <p class="text-neutral-500 ">(+254) 715 077 817
                        </p>
                    </div>
                    </div>
                </div>

                <div class="w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:mb-12 xl:w-12/12">
                    <div class="align-start flex">
                    <div class="shrink-0">
                        <div class="inline-block rounded-md bg-[#0096FF] p-4 text-white hover:bg-[#00a651]">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                              </svg>
                              
                        </div>
                    </div>
                    <div class="ml-6 grow">
                        <p class="mb-2 font-bold text-[#00a651]">WhatsApp</p>
                        <p class="text-neutral-500 ">(+254) 792 516 105
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!--end of contact-->

            <!-- registration inputs -->
           

            <!-- form options -->
            <div class="max-sm:w-full sm:w-11/12 max-lg:mx-auto lg:w-7/12 px2 bg-white rounded shadow-lg  overflow-hidden transform transition-transform hover:-translate-y-2 order-1 lg:order-2 ">
                <div class="w-full text-white">
                    @forelse($errors->all() as $message)
                        <p class="text-center bg-red-700 p-1">
                            {{ $message }}
                        </p>
                    @empty
                    @endforelse
                    @if(session('success'))
                        <p class="bg-green-600 text-center p-1">
                            {{ session('success') }}
                        </p>
                    @endif
                </div>
                <form action="{{ route('contact.submit') }}" method="post" id="inquiries" >
                    @csrf
                    <div class="space-y-0">

                    
                    <!-- Form toggle buttons -->
                    <div class=" flex-auto bg-[#d1d5db] py-5 px-5">
                      <ul class="flex flex-col sm:flex-row justify-center sm:space-x-4 mb-6 space-y-4 sm:space-y-0 list-none">
                          <li>
                              <button type="button" onclick="showForm('individual')" class="button bg-[#0096FF] block py-4 px-6 font-semibold text-white rounded-md	focus:bg-[#00a651]">
                                  <i class="fa fa-user"></i> Individuals
                              </button>
                          </li>
                          <li>
                              <button type="button" onclick="showForm('organization')" class="button bg-[#0096FF] block py-4 px-6 font-semibold text-white rounded-md focus:bg-[#00a651]">
                                  <i class="fa fa-shopping-cart"></i> Organizations
                              </button>
                          </li>
                          {{-- <li>
                              <button type="button" onclick="#" class="button btn-blue block py-4 px-6 font-semibold text-white rounded-md	bg-gray-700">
                                  <i class="fa fa-building"></i> Enterprise
                              </button>
                          </li> --}}
                      </ul>
                  
                  
                    </div>
                
                    <!-- Form fields -->
                    <div id="organization-form" class="p-6">
                        <input value="organization" type="hidden" name="type">
                        <p class="text-center text-gray-600 hidden" id="organization">Companies with 2+ employees or up to <br>75 learners.</p>
                        <p class="text-center text-gray-600" id="individual">Explore IRES as your individual professional or personal <br>development partner.</p>
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-600">Full Name <span class="text-red-500">(required)</span></label>
                                    <input type="text" class="w-full border 
                                    @error('name')
                                        {{ 'border-red-700' }}
                                    @else
                                        {{ 'border-gray-300' }}
                                    @enderror
                                    p-2 rounded-lg" placeholder="Full Name" name="name" value="{{ old('name') }}" required>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600">Email Address <span class="text-red-500">(required)</span></label>
                                    <input type="email" class="w-full border 
                                    @error('email')
                                        {{ 'border-red-700' }}
                                    @else
                                        {{ 'border-gray-300' }}
                                    @enderror
                                    p-2 rounded-lg" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-600">country <span class="text-red-500">(required)</span></label>
                                    <input type="text" class="w-full border 
                                    @error('country')
                                        {{ 'border-red-700' }}
                                    @else
                                        {{ 'border-gray-300' }}
                                    @enderror
                                    p-2 rounded-lg" placeholder="country" name="country" value="{{ old('country') }}" required>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600">phone number <span class="text-red-500">(required)</span></label>
                                    <input type="number" class="w-full border 
                                    @error('Phone')
                                        {{ 'border-red-700' }}
                                    @else
                                        {{ 'border-gray-300' }}
                                    @enderror
                                    p-2 rounded-lg" placeholder="Phone" name="Phone" value="{{ old('Phone') }}" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-600">company <span class="text-red-500">(required)</span></label>
                                    <input type="text" class="w-full border 
                                    @error('company')
                                        {{ 'border-red-700' }}
                                    @else
                                        {{ 'border-gray-300' }}
                                    @enderror
                                    p-2 rounded-lg" placeholder="company name" name="company" value="{{ old('company') }}" required>
                                </div>
                                <div class="hidden" id="numberOfEmployees">
                                    <label class="block text-sm text-gray-600">Number of Employees <span class="text-red-500">(required)</span></label>
                                    <input type="text" class="w-full border 
                                    @error('employees')
                                        {{ 'border-red-700' }}
                                    @else
                                        {{ 'border-gray-300' }}
                                    @enderror
                                    p-2 rounded-lg" placeholder="No. of employees" name="employees" value="{{ old('employees') }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-600">How can we help you?</label>
                                    <textarea class=" mt-1 block w-full border 
                                    @error('message')
                                        {{ 'border-red-700' }}
                                    @else
                                        {{ 'border-gray-300' }}
                                    @enderror
                                    p-2 rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-red500 focus:border-[#0096FF]" rows="4" name="message" value="{{ old('message') }}"></textarea>
                                </div>
                            </div>
                            <!-- Additional organization-specific fields -->
                            <div class="flex justify-start space-x-4">
                                <button class="ires-pri-btn py-2 px-6 " type="submit">Submit</button>
                                <button class="ires-sec-btn py-2 px-6 " type="reset"><span class="fa fa-refresh"></span> Reset</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </form>
            </div>

            </div>
            <!-- END registration inputs -->

        </div>
      </div>
    </div>
  </section>
@endsection

@section('js_content')

<script>
      function showForm(formType) {            
          // Show the selected form
          if (formType === 'individual') {
              // Title Message
              document.querySelector('#individual').classList.remove('hidden')
              document.querySelector('#organization').classList.remove('hidden')
              document.querySelector('#organization').classList.add('hidden')

              // The extra field for number of employees
              document.getElementById('numberOfEmployees').classList.remove('hidden');
              document.getElementById('numberOfEmployees').classList.add('hidden');
          } else if (formType === 'organization') {
              // Title Message
              hideSeek(document.querySelector('#organization'), document.querySelector('#individual'))
              document.querySelector('#organization').classList.remove('hidden')
              document.querySelector('#individual').classList.remove('hidden')
              document.querySelector('#individual').classList.add('hidden')

              // The extra field for number of employees
              document.getElementById('numberOfEmployees').classList.remove('hidden');
          }
      }
</script>

@endsection