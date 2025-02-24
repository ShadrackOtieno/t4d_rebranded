@extends('front.Projects.master')

@section('title', 'Tech and Engineering')


@section('css')

    <style>
        .active {
                background-color: #00a651; /* Active background color */
                color: white; /* White text for active state */
            }
    </style>

@endsection


@section('content')

    <div class="main-body">



            @include('front/partials/alert')
<section
  class="relative bg-[url(https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80)] bg-cover bg-center bg-no-repeat"
>
  <div
    class="absolute inset-0 bg-black/75 sm:bg-transparent sm:from-black/95 sm:to-black/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"
  ></div>

  <div
    class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
  >
    <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
      <h1 class="text-3xl font-extrabold text-white sm:text-5xl">
        Let us find your
        <strong class="block font-extrabold text-rose-500"> Forever Home. </strong>
      </h1>

      <p class="mt-4 max-w-lg text-white sm:text-xl/relaxed">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus numquam ea!
      </p>

      <div class="mt-8 flex flex-wrap gap-4 text-center">
        <a
          href="#"
          class="block w-full rounded bg-rose-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-rose-700 focus:outline-none focus:ring active:bg-rose-500 sm:w-auto"
        >
          Get Started
        </a>

        <a
          href="#"
          class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-rose-600 shadow hover:text-rose-700 focus:outline-none focus:ring active:text-rose-500 sm:w-auto"
        >
          Learn More
        </a>
      </div>
    </div>
  </div>
</section>



<div class="relative overflow-hidden bg-gray-900 pt-16 pb-32 space-y-24">
    <div class="relative">
        <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8 ">
            <div class="mx-auto max-w-xl px-6 lg:mx-0 lg:max-w-none lg:py-16 lg:px-0 ">

                <div>
                    <div>
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-pink-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="h-8 w-8 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z">
                                </path>
                            </svg>
                        </span>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-3xl font-bold tracking-tight text-white">
                            Natural Language Processing (NLP):
                        </h2>
                        <p class="mt-4 text-lg text-gray-300">
                            The AI product utilizes advanced NLP algorithms to understand and interpret human language,
                            enabling it to accurately process and analyze text-based inputs.
                        </p>
                        <div class="mt-6">
                            <a class="inline-flex rounded-lg bg-pink-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-pink-600 hover:bg-pink-700 hover:ring-pink-700"
                                href="/login">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 sm:mt-16 lg:mt-0">
                <div class="-mr-48 pl-6 md:-mr-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                    <img loading="lazy" width="647" height="486"
                        class="w-full rounded-xl shadow-2xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                        style="color:transparent" src="https://images.unsplash.com/photo-1569144157591-c60f3f82f137">
                </div>
            </div>
        </div>
    </div>



    <div class="relative">
        <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8 ">
            <div class="mx-auto max-w-xl px-6 lg:mx-0 lg:max-w-none lg:py-16 lg:px-0 lg:col-start-2">
                <div>
                    <div>
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-pink-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="h-8 w-8 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z">
                                </path>
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h2 class="text-3xl font-bold tracking-tight text-white">
                            Sentiment Analysis:
                        </h2>
                        <p class="mt-4 text-lg text-gray-300">
                            The product has built-in sentiment analysis capabilities, allowing it to determine the
                            sentiment (positive, negative, or neutral) expressed in text or customer feedback.
                        </p>
                        <div class="mt-6">
                            <a class="inline-flex rounded-lg bg-pink-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-pink-600 hover:bg-pink-700 hover:ring-pink-700"
                                href="/login">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 sm:mt-16 lg:mt-0">
                <div class="-ml-48 pr-6 md:-ml-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                    <img alt="Inbox user interface" loading="lazy" width="647" height="486"
                        class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none"
                        style="color:transparent" src="https://images.unsplash.com/photo-1599134842279-fe807d23316e">
                </div>
            </div>
        </div>
    </div>



    <div class="relative">
        <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8 ">
            <div class="mx-auto max-w-xl px-6 lg:mx-0 lg:max-w-none lg:py-16 lg:px-0 ">
                <div>
                    <div>
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-pink-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="h-8 w-8 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z">
                                </path>
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h2 class="text-3xl font-bold tracking-tight text-white">
                            Natural Language Generation (NLG):
                        </h2>
                        <p class="mt-4 text-lg text-gray-300">
                            The AI product can generate human-like written content, summaries, or reports based on
                            structured data or analysis results.
                        </p>
                        <div class="mt-6">
                            <a class="inline-flex rounded-lg bg-pink-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-pink-600 hover:bg-pink-700 hover:ring-pink-700"
                                href="/login">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 sm:mt-16 lg:mt-0">
                <div class="-mr-48 pl-6 md:-mr-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                    <img loading="lazy" width="646" height="485"
                        class="w-full rounded-xl shadow-2xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                        style="color:transparent"
                        src="https://images.unsplash.com/photo-1483478550801-ceba5fe50e8e">
                </div>
            </div>
        </div>
    </div>
</div>



<section class="overflow-hidden bg-white py-8 sm:py-16">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
      <div class="lg:pr-8 lg:pt-4">
        <div class="lg:max-w-lg">
          <h2 class="text-base font-semibold leading-7 text-indigo-600">Produce faster</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">An Enterprise API</p>
          <p class="mt-6 text-lg leading-8 text-gray-600">We've built an API that allows you to scale your podcast
            production workflow.
          </p>
          <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
            <div class="relative pl-9">
              <dt class="inline font-semibold text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                  fill="currentColor" aria-hidden="true" class="absolute left-1 top-1 h-5 w-5 text-indigo-600">
                  <path
                    d="M3.196 12.87l-.825.483a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.758 0l7.25-4.25a.75.75 0 000-1.294l-.825-.484-5.666 3.322a2.25 2.25 0 01-2.276 0L3.196 12.87z">
                  </path>
                  <path
                    d="M3.196 8.87l-.825.483a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.758 0l7.25-4.25a.75.75 0 000-1.294l-.825-.484-5.666 3.322a2.25 2.25 0 01-2.276 0L3.196 8.87z">
                  </path>
                  <path
                    d="M10.38 1.103a.75.75 0 00-.76 0l-7.25 4.25a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.76 0l7.25-4.25a.75.75 0 000-1.294l-7.25-4.25z">
                  </path>
                </svg>Template driven
              </dt>
              <dd class="inline">Inspired by Sendgrid, Mailchimp, and Postmark, we allow you to create and apply
                templated content to your media.
              </dd>
            </div>
            <div class="relative pl-9">
              <dt class="inline font-semibold text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                  class="absolute left-1 top-1 h-5 w-5 text-indigo-600">
                  <path fill-rule="evenodd"
                    d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z"
                    clip-rule="evenodd"></path>
                </svg>
                Simple, REST
              </dt>
              <dd class="inline">A simple REST API that allows you to create, generate, and manage your content.</dd>
            </div>
            <div class="relative pl-9">
              <dt class="inline font-semibold text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                  fill="currentColor" aria-hidden="true" class="absolute left-1 top-1 h-5 w-5 text-indigo-600">
                  <path fill-rule="evenodd"
                    d="M14.5 10a4.5 4.5 0 004.284-5.882c-.105-.324-.51-.391-.752-.15L15.34 6.66a.454.454 0 01-.493.11 3.01 3.01 0 01-1.618-1.616.455.455 0 01.11-.494l2.694-2.692c.24-.241.174-.647-.15-.752a4.5 4.5 0 00-5.873 4.575c.055.873-.128 1.808-.8 2.368l-7.23 6.024a2.724 2.724 0 103.837 3.837l6.024-7.23c.56-.672 1.495-.855 2.368-.8.096.007.193.01.291.01zM5 16a1 1 0 11-2 0 1 1 0 012 0z"
                    clip-rule="evenodd"></path>
                  <path
                    d="M14.5 11.5c.173 0 .345-.007.514-.022l3.754 3.754a2.5 2.5 0 01-3.536 3.536l-4.41-4.41 2.172-2.607c.052-.063.147-.138.342-.196.202-.06.469-.087.777-.067.128.008.257.012.387.012zM6 4.586l2.33 2.33a.452.452 0 01-.08.09L6.8 8.214 4.586 6H3.309a.5.5 0 01-.447-.276l-1.7-3.402a.5.5 0 01.093-.577l.49-.49a.5.5 0 01.577-.094l3.402 1.7A.5.5 0 016 3.31v1.277z">
                  </path>
                </svg>Developer friendly </dt>
              <dd class="inline">Documented and easy to use, we make it easy to integrate with your existing workflow.
              </dd>
            </div>
          </dl>
        </div>
        <div class="mt-10 flex items-center gap-x-6">
          <a href="#"
            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Start
            for free
          </a>
          <a href="#" class="text-sm font-semibold leading-6 text-gray-700">Schedule a demo
            <span aria-hidden="true">→</span>
          </a>
        </div>
      </div><img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxjb21wdXRlcnxlbnwwfDB8fHwxNjkxODE2NjY3fDA&ixlib=rb-4.0.3&q=80&w=1080" alt="Product screenshot" class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0" width="2432" height="1442">
    </div>
  </div>
</section>


{{--
            <section class="py-16 bggray-100" id="badges_of_quality">
                <div class="w-full lg:w-2/3 lg:mx56 container mx-auto px-6 text-center">
                     <div class="mx-auto relative">
                            <hr
                                class="absolute top-1/2 w-2/3 left-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full" />
                            <h3 class="text-center text-[#00a651] text-3xl sm:text-3xl capitalize font-bold relative z-10 bg-white w-max mx-auto p-4 rounded-5xl"
                                id='testimonial'>Why Us</h3>
                        </div>
                    <div class="mx-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="p-6 bg-white  rounded-lg shadow-md w-full text-center">
                            <p class="text-[#0096FF] mb-4 text-lg font-bold">Courses</p>
                            <div class="counter inline mb-4 text-3xl text-[#00a651] font-bold" id="Courses_counter">0</div>
                            <div class="inline text-3xl mb-4 text-[#00a651] font-bold ">+</div>
                            <p class="my-4">Access a diverse marketplace of global talent.</p>

                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-md w-full text-center">
                            <p class="text-[#0096FF] mb-4 text-lg font-bold">Learners</p>
                            <div class="counter inline mb-4 text-3xl text-[#00a651] font-bold" id="Learners_counter">0</div>
                            <div class="inline text-3xl mb-4 text-[#00a651] font-bold ">+</div>
                            <p class="my-4">Access a diverse marketplace of global talent.</p>

                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-md w-full text-center">
                            <p class="text-[#0096FF] mb-4 text-lg font-bold">Organizations</p>
                            <div class="counter inline mb-4 text-3xl text-[#00a651] font-bold" id="Companies_counter">0</div>
                            <div class="inline text-3xl mb-4 text-[#00a651] font-bold ">+</div>
                            <p class="my-4">Access a diverse marketplace of global talent.</p>

                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-md w-full text-center">
                            <p class="text-[#0096FF] mb-4 text-lg font-bold">Sectors</p>
                            <div class="counter inline mb-4 text-3xl text-[#00a651] font-bold" id="Sectors_counter">0</div>
                            <div class="inline text-3xl mb-4 text-[#00a651] font-bold ">+</div>
                            <p class="my-4">Access a diverse marketplace of global talent.</p>

                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-md w-full text-center">
                            <p class="text-[#0096FF] mb-4 text-lg">Training Venues</p>
                            <div class="counter inline mb-4 text-3xl text-[#00a651] font-bold" id="Venues_counter">0</div>
                            <div class="inline text-3xl mb-4 text-[#00a651] font-bold ">+</div>
                            <p class="my-4">Access a diverse marketplace of global talent.</p>

                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-md w-full text-center">
                            <p class="text-[#0096FF] mb-4 text-lg font-bold">Consultancy Areas</p>
                            <div class="counter inline mb-4 text-3xl text-[#00a651] font-bold" id="Services_counter">0</div>
                            <div class="inline text-3xl mb-4 text-[#00a651] font-bold ">+</div>
                            <p class="my-4">Access a diverse marketplace of global talent.</p>

                        </div>
                    </div>
                </div>
            </section> --}}


            <section class="py-12 bg-gray-900 text-gray-100 sm:py-12 lg:py-16">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-xl mx-auto text-center xl:max-w-2xl">
            <h2 class="text-3xl font-bold leading-tight text-gray-50 sm:text-4xl xl:text-5xl mb-6">We are just
                getting started!</h2>
            <p class="mb-4">We are creating a tool that helps you be more productive and efficient when building
                websites and webapps</p>

        </div>
        <div
            class="grid max-w-4xl lg:max-w-6xl grid-cols-1 mx-auto mt-8 text-center gap-y-4 sm:gap-x-8 sm:grid-cols-2 lg:grid-cols-3 sm:mt-12 lg:mt-20 sm:text-left">
            <div class="relative">
                <div class="absolute -inset-1">
                    <div
                        class="w-full h-full rotate-180 opacity-30 blur-lg filter bg-gradient-to-r from-yellow-400 via-pink-500 to-green-600">
                    </div>
                </div>
                <div class="relative overflow-hidden bg-white shadow-md rounded-xl h-full">
                    <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 8L20 8" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M4 16L14 16" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                            <ellipse cx="7" cy="8" rx="3" ry="3" transform="rotate(90 7 8)" stroke="#111827"
                                stroke-width="2" stroke-linecap="round"></ellipse>
                            <ellipse cx="17" cy="16" rx="3" ry="3" transform="rotate(90 17 16)" stroke="#111827"
                                stroke-width="2" stroke-linecap="round"></ellipse>
                        </svg>
                        <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Realtime Collaboration</h3>
                        <p class="mt-6 text-base text-gray-600">Collaborate in realtime with other editors in a
                            project. See what othe editors are doing and edit even a simple text together</p>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white shadow-md rounded-xl">
                <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="13" y="14" width="2" height="2" rx="1" fill="#111827"></rect>
                        <rect x="7" y="11" width="2" height="6" rx="1" fill="#111827"></rect>
                        <rect x="11" y="13" width="2" height="6" rx="1" transform="rotate(90 11 13)" fill="#111827">
                        </rect>
                        <rect x="16" y="12" width="2" height="2" rx="1" fill="#111827"></rect>
                        <path
                            d="M14 8V8C14 7.58326 14 7.37488 13.9655 7.19144C13.8455 6.5546 13.4245 6.01534 12.8358 5.74455C12.6662 5.66654 12.464 5.616 12.0597 5.51493L12 5.5C11.5388 5.3847 11.3082 5.32706 11.1171 5.233C10.5686 4.96315 10.1737 4.45731 10.0449 3.85979C10 3.65151 10 3.41382 10 2.93845V2"
                            stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                        <path
                            d="M3 14C3 11.4412 3 10.1618 3.61994 9.28042C3.77954 9.05351 3.96572 8.85041 4.17372 8.6763C4.98164 8 6.15442 8 8.5 8H15.5C17.8456 8 19.0184 8 19.8263 8.6763C20.0343 8.85041 20.2205 9.05351 20.3801 9.28042C21 10.1618 21 11.4412 21 14C21 16.5588 21 17.8382 20.3801 18.7196C20.2205 18.9465 20.0343 19.1496 19.8263 19.3237C19.0184 20 17.8456 20 15.5 20H8.5C6.15442 20 4.98164 20 4.17372 19.3237C3.96572 19.1496 3.77954 18.9465 3.61994 18.7196C3 17.8382 3 16.5588 3 14Z"
                            stroke="#111827" stroke-width="2"></path>
                    </svg>
                    <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">History of Edits</h3>
                    <p class="mt-6 text-base text-gray-600">Go back and forth your history of changes and
                        restore your designs to any point in time</p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-1">
                    <div
                        class="w-full h-full rotate-180 opacity-30 blur-lg filter bg-gradient-to-r from-yellow-400 via-pink-500 to-green-600">
                    </div>
                </div>
                <div class="relative overflow-hidden bg-white shadow-md rounded-xl h-full">
                    <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 8L20 8" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M4 16L14 16" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                            <ellipse cx="7" cy="8" rx="3" ry="3" transform="rotate(90 7 8)" stroke="#111827"
                                stroke-width="2" stroke-linecap="round"></ellipse>
                            <ellipse cx="17" cy="16" rx="3" ry="3" transform="rotate(90 17 16)" stroke="#111827"
                                stroke-width="2" stroke-linecap="round"></ellipse>
                        </svg>
                        <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Integrations</h3>
                        <p class="mt-6 text-base text-gray-600">Step up your designs and workflow with
                            integrations with your favourite tools such as mailchimp, slack, jira etc</p>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white shadow-md rounded-xl">
                <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="13" y="14" width="2" height="2" rx="1" fill="#111827"></rect>
                        <rect x="7" y="11" width="2" height="6" rx="1" fill="#111827"></rect>
                        <rect x="11" y="13" width="2" height="6" rx="1" transform="rotate(90 11 13)" fill="#111827">
                        </rect>
                        <rect x="16" y="12" width="2" height="2" rx="1" fill="#111827"></rect>
                        <path
                            d="M14 8V8C14 7.58326 14 7.37488 13.9655 7.19144C13.8455 6.5546 13.4245 6.01534 12.8358 5.74455C12.6662 5.66654 12.464 5.616 12.0597 5.51493L12 5.5C11.5388 5.3847 11.3082 5.32706 11.1171 5.233C10.5686 4.96315 10.1737 4.45731 10.0449 3.85979C10 3.65151 10 3.41382 10 2.93845V2"
                            stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                        <path
                            d="M3 14C3 11.4412 3 10.1618 3.61994 9.28042C3.77954 9.05351 3.96572 8.85041 4.17372 8.6763C4.98164 8 6.15442 8 8.5 8H15.5C17.8456 8 19.0184 8 19.8263 8.6763C20.0343 8.85041 20.2205 9.05351 20.3801 9.28042C21 10.1618 21 11.4412 21 14C21 16.5588 21 17.8382 20.3801 18.7196C20.2205 18.9465 20.0343 19.1496 19.8263 19.3237C19.0184 20 17.8456 20 15.5 20H8.5C6.15442 20 4.98164 20 4.17372 19.3237C3.96572 19.1496 3.77954 18.9465 3.61994 18.7196C3 17.8382 3 16.5588 3 14Z"
                            stroke="#111827" stroke-width="2"></path>
                    </svg>
                    <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Publish webpage online</h3>
                    <p class="mt-6 text-base text-gray-600">Effortlessly publish your webpages online and make
                        it available to the world with a click of a button</p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-1">
                    <div
                        class="w-full h-full rotate-180 opacity-30 blur-lg filter bg-gradient-to-r from-yellow-400 via-pink-500 to-green-600">
                    </div>
                </div>
                <div class="relative overflow-hidden bg-white shadow-md rounded-xl h-full">
                    <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 8L20 8" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M4 16L14 16" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                            <ellipse cx="7" cy="8" rx="3" ry="3" transform="rotate(90 7 8)" stroke="#111827"
                                stroke-width="2" stroke-linecap="round"></ellipse>
                            <ellipse cx="17" cy="16" rx="3" ry="3" transform="rotate(90 17 16)" stroke="#111827"
                                stroke-width="2" stroke-linecap="round"></ellipse>
                        </svg>
                        <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Forms and Data Collection
                        </h3>
                        <p class="mt-6 text-base text-gray-600">Collect data and information from users with
                            forms built on windframe and sort through them in a nice interface</p>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden bg-white shadow-md rounded-xl">
                <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="13" y="14" width="2" height="2" rx="1" fill="#111827"></rect>
                        <rect x="7" y="11" width="2" height="6" rx="1" fill="#111827"></rect>
                        <rect x="11" y="13" width="2" height="6" rx="1" transform="rotate(90 11 13)" fill="#111827">
                        </rect>
                        <rect x="16" y="12" width="2" height="2" rx="1" fill="#111827"></rect>
                        <path
                            d="M14 8V8C14 7.58326 14 7.37488 13.9655 7.19144C13.8455 6.5546 13.4245 6.01534 12.8358 5.74455C12.6662 5.66654 12.464 5.616 12.0597 5.51493L12 5.5C11.5388 5.3847 11.3082 5.32706 11.1171 5.233C10.5686 4.96315 10.1737 4.45731 10.0449 3.85979C10 3.65151 10 3.41382 10 2.93845V2"
                            stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                        <path
                            d="M3 14C3 11.4412 3 10.1618 3.61994 9.28042C3.77954 9.05351 3.96572 8.85041 4.17372 8.6763C4.98164 8 6.15442 8 8.5 8H15.5C17.8456 8 19.0184 8 19.8263 8.6763C20.0343 8.85041 20.2205 9.05351 20.3801 9.28042C21 10.1618 21 11.4412 21 14C21 16.5588 21 17.8382 20.3801 18.7196C20.2205 18.9465 20.0343 19.1496 19.8263 19.3237C19.0184 20 17.8456 20 15.5 20H8.5C6.15442 20 4.98164 20 4.17372 19.3237C3.96572 19.1496 3.77954 18.9465 3.61994 18.7196C3 17.8382 3 16.5588 3 14Z"
                            stroke="#111827" stroke-width="2"></path>
                    </svg>
                    <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Custom Domains</h3>
                    <p class="mt-6 text-base text-gray-600">Attach your own custom domain to your published
                        projects or website on windframe</p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="">
  <div class="container max-w-xl p-6 mx-auto space-y-12 lg:px-8 lg:max-w-7xl">
    <div>
      <h2 class="text-3xl font-bold text-center sm:text-5xl">New Features</h2>
      <p class="max-w-3xl mx-auto mt-4 text-xl text-center ">Explore the latest features that enhance your learning experience and make it even more exciting.</p>
    </div>

    <div class="grid lg:gap-8 lg:grid-cols-2 lg:items-center">

         <div aria-hidden="true" class="mt-10 lg:mt-0">
        <img width="600" height="600" src="https://images.unsplash.com/photo-1516542076529-1ea3854896f2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxNHx8Y29tcHV0ZXJ8ZW58MHwwfHx8MTY5OTE3MDk1N3ww&ixlib=rb-4.0.3&q=80&w=1080" class="mx-auto rounded-lg shadow-lg dark-bg-gray-500" style="color:transparent">
      </div>
      <div>
        <div class="mt-4 space-y-12">
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center w-12 h-12 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-rocket">
                  <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z">
                  </path>
                  <path
                    d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z">
                  </path>
                  <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                  <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                </svg></div>
            </div>
            <div class="ml-4">
              <h4 class="text-lg font-medium leadi ">Advanced Learning Algorithms</h4>
              <p class="mt-2 ">Discover our improved learning algorithms that adapt to your preferences and provide even more personalized learning suggestions.</p>
            </div>
          </div>
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center w-12 h-12 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-bookmark-plus">
                  <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"></path>
                  <line x1="12" x2="12" y1="7" y2="13"></line>
                  <line x1="15" x2="9" y1="10" y2="10"></line>
                </svg></div>
            </div>
            <div class="ml-4">
              <h4 class="text-lg font-medium leadi ">Interactive Learning Resources</h4>
              <p class="mt-2 ">Access an extensive library of interactive resources that make your learning journey engaging and interactive.</p>
            </div>
          </div>
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center w-12 h-12 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-video">
                  <path d="m22 8-6 4 6 4V8Z"></path>
                  <rect width="14" height="12" x="2" y="6" rx="2" ry="2"></rect>
                </svg></div>
            </div>
            <div class="ml-4">
              <h4 class="text-lg font-medium leadi ">Enhanced Video Streaming</h4>
              <p class="mt-2 ">Experience seamless video integration with enhanced streaming capabilities, providing a better and more uninterrupted learning experience.</p>
            </div>
          </div>
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center w-12 h-12 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-file-question">
                  <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                  <path d="M10 10.3c.2-.4.5-.8.9-1a2.1 2.1 0 0 1 2.6.4c.3.4.5.8.5 1.3 0 1.3-2 2-2 2"></path>
                  <path d="M12 17h.01"></path>
                </svg></div>
            </div>
            <div class="ml-4">
              <h4 class="text-lg font-medium leadi ">Advanced Quiz Generation </h4>
              <p class="mt-2 ">Take your knowledge testing to the next level with advanced quiz generation, providing more customization options for your quizzes.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>




<div class="bg-gray-700 p-4 min-h-screen">
  <div class="max-w-7xl mx-auto h-max px-6 md:px-12 xl:px-6">
    <div class="md:w-2/3 lg:w-1/2">

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-gray-100">
        <path fill-rule="evenodd"
          d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z"
          clip-rule="evenodd"></path>
      </svg>
      <h2 class="my-8 text-2xl font-bold text-white md:text-4xl">How we work?</h2>
      <p class="text-gray-300">We follow our process to get you started as quickly as possible</p>
    </div>
    <div
      class="mt-16 grid divide-x divide-y  divide-gray-700 overflow-hidden rounded-3xl border text-gray-600 border-gray-700 sm:grid-cols-2 lg:grid-cols-4  lg:divide-y-0 xl:grid-cols-4">
      <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
        <div class="relative space-y-8 py-12 p-8">
          <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
            stroke-linejoin="round" color="white" style="color:white" height="50" width="50"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path
              d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z">
            </path>
            <path d="M10 10l2 -2v8"></path>
          </svg>
          <div class="space-y-2">
            <h5 class="text-xl font-semibold text-white transition">Initial Discussion</h5>
            <p class="text-gray-300">We will have discussions on the requirements to ensure your MVP (Minimum Viable
              Product) is ready for the initial launch</p>
          </div>
        </div>
      </div>
      <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
        <div class="relative space-y-8 py-12 p-8">
          <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
            stroke-linejoin="round" color="white" style="color:white" height="50" width="50"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path
              d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z">
            </path>
            <path d="M10 8h3a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 0 -1 1v2a1 1 0 0 0 1 1h3"></path>
          </svg>
          <div class="space-y-2">
            <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary">Deal Finalized</h5>
            <p class="text-gray-300">Once we agree on what to build, We will start working on it right away.</p>
          </div>
        </div>
      </div>
      <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
        <div class="relative space-y-8 py-12 p-8">
          <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
            stroke-linejoin="round" color="white" style="color:white" height="50" width="50"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path
              d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z">
            </path>
            <path
              d="M10 9a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1">
            </path>
          </svg>
          <div class="space-y-2">
            <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary">Product Delivery</h5>
            <p class="text-gray-300">We will develop your product MVP in 15 days (more time required depending on the
              complexity of the project)</p>
          </div>
        </div>
      </div>
      <div class="group relative bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
        <div class="relative space-y-8 py-12 p-8">
          <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
            stroke-linejoin="round" color="white" style="color:white" height="50" width="50"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path
              d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z">
            </path>
            <path d="M10 8v3a1 1 0 0 0 1 1h3"></path>
            <path d="M14 8v8"></path>
          </svg>
          <div class="space-y-2">
            <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary">Celebrate your Launch
            </h5>
            <p class="text-gray-300">We love Celebrations. We will celebrate your launch on our Social Profiles.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="h-screen dark:bg-gray-800">

	<div
		class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
		<div class="col-span-2 mb-8">
			<p class="text-lg font-medium text-purple-500 dark:text-purple-500">Trusted Worldwide</p>
			<h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">
				Trusted
				by over 600 million users and 10,000 teams</h2>
			<p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Our rigorous security and compliance
				standards
				are at the heart of all we do. We work tirelessly to protect you and your customers.</p>
			<div class="pt-6 mt-6 space-y-4 border-t border-gray-200 dark:border-gray-700">
				<div>
					<a href="#"
						class="inline-flex items-center text-base font-medium text-purple-500 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
						Explore Legality Guide
						<svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
								clip-rule="evenodd"></path>
						</svg>
					</a>
				</div>
				<div>
					<a href="#"
						class="inline-flex items-center text-base font-medium text-purple-500 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
						Visit the Trust Center
						<svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
								clip-rule="evenodd"></path>
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
			<div>
				<svg class="w-10 h-10 mb-2 text-purple-500 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor"
					viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z"
						clip-rule="evenodd"></path>
				</svg>
				<h3 class="mb-2 text-2xl font-bold dark:text-white">99.99% uptime</h3>
				<p class="font-light text-gray-500 dark:text-gray-400">For Landwind, with zero maintenance downtime</p>
			</div>
			<div>
				<svg class="w-10 h-10 mb-2 text-purple-500 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor"
					viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
					</path>
				</svg>
				<h3 class="mb-2 text-2xl font-bold dark:text-white">600M+ Users</h3>
				<p class="font-light text-gray-500 dark:text-gray-400">Trusted by over 600 milion users around the world
				</p>
			</div>
			<div>
				<svg class="w-10 h-10 mb-2 text-purple-500 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor"
					viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
						clip-rule="evenodd"></path>
				</svg>
				<h3 class="mb-2 text-2xl font-bold dark:text-white">100+ countries</h3>
				<p class="font-light text-gray-500 dark:text-gray-400">Have used Landwind to create functional websites
				</p>
			</div>
			<div>
				<svg class="w-10 h-10 mb-2 text-purple-500 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor"
					viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
					</path>
				</svg>
				<h3 class="mb-2 text-2xl font-bold dark:text-white">5+ Million</h3>
				<p class="font-light text-gray-500 dark:text-gray-400">Transactions per day</p>
			</div>
		</div>
	</div>
</div>


<div class="bg-black">

    <section id="features"
        class="relative block px-6 py-10 md:py-20 md:px-10  border-t border-b border-neutral-900 bg-neutral-900/30">


        <div class="relative mx-auto max-w-5xl text-center">
            <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
            Why choose us
            </span>
            <h2
                class="block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
                Build a Website That Your Customers Love
            </h2>
            <p
                class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
                Our templates allow for maximum customization. No technical skills required – our intuitive design tools
                let
                you get the job done easily.
            </p>
        </div>


        <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border "
                    style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-color-swatch" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19 3h-4a2 2 0 0 0 -2 2v12a4 4 0 0 0 8 0v-12a2 2 0 0 0 -2 -2"></path>
                        <path d="M13 7.35l-2 -2a2 2 0 0 0 -2.828 0l-2.828 2.828a2 2 0 0 0 0 2.828l9 9"></path>
                        <path d="M7.3 13h-2.3a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h12"></path>
                        <line x1="17" y1="17" x2="17" y2="17.01"></line>
                    </svg>
                </div>
                <h3 class="mt-6 text-gray-400">Customizable</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">Tailor your landing page's
                    look
                    and feel, from the color scheme to the font size, to the design of the page.
                </p>
            </div>


            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border "
                    style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bolt" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="13 3 13 10 19 10 11 21 11 14 5 14 13 3"></polyline>
                    </svg>
                </div>
                <h3 class="mt-6 text-gray-400">Fast Performance</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">We build our templates for
                    speed in mind, for super-fast load times so your customers never waver.
                </p>
            </div>


            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border "
                    style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4"></path>
                        <line x1="14.5" y1="5.5" x2="18.5" y2="9.5"></line>
                        <polyline points="12 8 7 3 3 7 8 12"></polyline>
                        <line x1="7" y1="8" x2="5.5" y2="9.5"></line>
                        <polyline points="16 12 21 17 17 21 12 16"></polyline>
                        <line x1="16" y1="17" x2="14.5" y2="18.5"></line>
                    </svg>
                </div>
                <h3 class="mt-6 text-gray-400">Fully Featured</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                    Everything you need to
                    succeed
                    and launch your landing page, right out of the box. No need to install anything else.
                </p>
            </div>


        </div>

        <div class="absolute bottom-0 left-0 z-0 h-1/3 w-full border-b"
            style="background-image: linear-gradient(to right top, rgba(79, 70, 229, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);">
        </div>
        <div class="absolute bottom-0 right-0 z-0 h-1/3 w-full"
            style="background-image: linear-gradient(to left top, rgba(220, 38, 38, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);">
        </div>

    </section>
</div>



<!-- Contact Us -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="max-w-2xl lg:max-w-5xl mx-auto">
    <div class="text-center">
      <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
        Contact us
      </h1>
      <p class="mt-1 text-gray-600 dark:text-neutral-400">
        We'd love to talk about how we can help you.
      </p>
    </div>

    <div class="mt-12 grid items-center lg:grid-cols-2 gap-6 lg:gap-16">
      <!-- Card -->
      <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700">
        <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-neutral-200">
          Fill in the form
        </h2>

        <form>
          <div class="grid gap-4">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="hs-firstname-contacts-1" class="sr-only">First Name</label>
                <input type="text" name="hs-firstname-contacts-1" id="hs-firstname-contacts-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="First Name">
              </div>

              <div>
                <label for="hs-lastname-contacts-1" class="sr-only">Last Name</label>
                <input type="text" name="hs-lastname-contacts-1" id="hs-lastname-contacts-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Last Name">
              </div>
            </div>
            <!-- End Grid -->

            <div>
              <label for="hs-email-contacts-1" class="sr-only">Email</label>
              <input type="email" name="hs-email-contacts-1" id="hs-email-contacts-1" autocomplete="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Email">
            </div>

            <div>
              <label for="hs-phone-number-1" class="sr-only">Phone Number</label>
              <input type="text" name="hs-phone-number-1" id="hs-phone-number-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Phone Number">
            </div>

            <div>
              <label for="hs-about-contacts-1" class="sr-only">Details</label>
              <textarea id="hs-about-contacts-1" name="hs-about-contacts-1" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Details"></textarea>
            </div>
          </div>
          <!-- End Grid -->

          <div class="mt-4 grid">
            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Send inquiry</button>
          </div>

          <div class="mt-3 text-center">
            <p class="text-sm text-gray-500 dark:text-neutral-500">
              We'll get back to you in 1-2 business days.
            </p>
          </div>
        </form>
      </div>
      <!-- End Card -->

      <div class="divide-y divide-gray-200 dark:divide-neutral-800">
        <!-- Icon Block -->
        <div class="flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Knowledgebase</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">We're here to help with any questions or code.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              Contact support
              <svg class="shrink-0 size-2.5 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.975821 6.92249C0.43689 6.92249 -3.50468e-07 7.34222 -3.27835e-07 7.85999C-3.05203e-07 8.37775 0.43689 8.79749 0.975821 8.79749L12.7694 8.79748L7.60447 13.7596C7.22339 14.1257 7.22339 14.7193 7.60447 15.0854C7.98555 15.4515 8.60341 15.4515 8.98449 15.0854L15.6427 8.68862C16.1191 8.23098 16.1191 7.48899 15.6427 7.03134L8.98449 0.634573C8.60341 0.268455 7.98555 0.268456 7.60447 0.634573C7.22339 1.00069 7.22339 1.59428 7.60447 1.9604L12.7694 6.92248L0.975821 6.92249Z" fill="currentColor"/>
              </svg>
            </a>
          </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">FAQ</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Search our FAQ for answers to anything you might ask.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              Visit FAQ
              <svg class="shrink-0 size-2.5 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.975821 6.92249C0.43689 6.92249 -3.50468e-07 7.34222 -3.27835e-07 7.85999C-3.05203e-07 8.37775 0.43689 8.79749 0.975821 8.79749L12.7694 8.79748L7.60447 13.7596C7.22339 14.1257 7.22339 14.7193 7.60447 15.0854C7.98555 15.4515 8.60341 15.4515 8.98449 15.0854L15.6427 8.68862C16.1191 8.23098 16.1191 7.48899 15.6427 7.03134L8.98449 0.634573C8.60341 0.268455 7.98555 0.268456 7.60447 0.634573C7.22339 1.00069 7.22339 1.59428 7.60447 1.9604L12.7694 6.92248L0.975821 6.92249Z" fill="currentColor"/>
              </svg>
            </a>
          </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class=" flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 11 2-2-2-2"/><path d="M11 13h4"/><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Developer APIs</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Check out our development quickstart guide.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              Contact sales
              <svg class="shrink-0 size-2.5 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.975821 6.92249C0.43689 6.92249 -3.50468e-07 7.34222 -3.27835e-07 7.85999C-3.05203e-07 8.37775 0.43689 8.79749 0.975821 8.79749L12.7694 8.79748L7.60447 13.7596C7.22339 14.1257 7.22339 14.7193 7.60447 15.0854C7.98555 15.4515 8.60341 15.4515 8.98449 15.0854L15.6427 8.68862C16.1191 8.23098 16.1191 7.48899 15.6427 7.03134L8.98449 0.634573C8.60341 0.268455 7.98555 0.268456 7.60447 0.634573C7.22339 1.00069 7.22339 1.59428 7.60447 1.9604L12.7694 6.92248L0.975821 6.92249Z" fill="currentColor"/>
              </svg>
            </a>
          </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class=" flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"/><path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Contact us by email</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">If you wish to write us an email instead please use</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              example@site.com
            </a>
          </div>
        </div>
        <!-- End Icon Block -->
      </div>
    </div>
  </div>
</div>
<!-- End Contact Us -->

            <div class="bg-[#edf5eb] rounded-lg p-8 max-w-7xl  lg:mx56 container w-full lg:w-2/3 lg:mx-auto my-12">
                <div class="mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <!-- Left section with title -->
                    <div class="flex items-center">
                        <h2 class="text-3xl font-bold text-[#00a651]">Explore More</h2>
                    </div>

                    <!-- Right section with cards -->
                    <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-3 gap-8">
                        <!-- Card 1 -->
                        <div class="border-l border-gray-300 pl-4">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 128 128"><defs><path id="notoBriefcase0" fill="#00a651" d="M117.38 124H10.57c-3.8 0-4.61-4.61-4.61-4.61c-4.42-31.69 0-78.55 0-78.55c0-3.87 3.14-7.01 7.01-7.01h101.99c3.87 0 7.01 3.14 7.01 7.01c0 0 4.52 54.1 0 78.55c.02 0-1.38 4.61-4.59 4.61"/></defs><path fill="#00a651" d="M46.34 27.25h3.79v8.04h-3.79zm35.33 0h3.79v8.04h-3.79z"/><use href="#notoBriefcase0"/><use href="#notoBriefcase0"/><path fill="#00a651" d="M121.02 46.99c-.51-3.68.39-8.16-2.73-10.85a6.8 6.8 0 0 0-4.54-1.73H14.21c-6.98.18-7.07 7.06-7.32 12.58h.32c.07 21.6 3.2 34.4 56.89 34.4c56.77 0 56.9-11.37 56.9-34.4z"/><path fill="#00a651" d="M12.98 33.83c-8.25.58-5.47 8.38-5.75 12.09c0 0 1.71-4.76 5.49-4.76h103.09c3.81 0 5.12 4.76 5.12 4.76c-.26-3.69 2.63-11.25-5.96-12.09z"/><path fill="#a06841" d="M121.92 39.89a5 5 0 0 0-.09-.53c-.01-.07-.04-.14-.05-.21c-.04-.17-.09-.34-.14-.5l-.06-.18c-.06-.17-.13-.34-.2-.51a.5.5 0 0 0-.07-.13c-.08-.18-.17-.35-.27-.52l-.06-.09a6 6 0 0 0-.35-.52c-.01-.02-.03-.04-.04-.05c-.14-.18-.28-.35-.43-.52l-.02-.02c-.16-.17-.33-.34-.51-.5c.44 2.27.72 4.34.72 5.64v5.48h2.06v-.24l-.03-.44l-.06-.78l-.03-.4c-.02-.24-.03-.48-.05-.7l-.03-.43c-.01-.2-.03-.4-.04-.58c-.01-.09-.01-.16-.02-.24c-.01-.19-.03-.39-.04-.56c-.01-.16-.02-.29-.03-.43c-.01-.07-.01-.15-.02-.22c-.02-.29-.04-.49-.05-.63s-.02-.24-.02-.24c0-.25-.01-.5-.04-.75zM5.91 41.42c-.01.11-.02.23-.03.37a2 2 0 0 0-.02.28c-.01.13-.02.27-.04.42c0 .04-.01.08-.01.12v4.12h2.06v-5.48c0-1.34.31-3.54.78-5.91c-.61.48-1.13 1.05-1.55 1.7c-.02.03-.03.05-.05.08c-.11.18-.22.36-.32.55c-.03.06-.06.12-.08.17c-.08.16-.15.33-.21.5c-.03.07-.06.15-.08.22c-.06.16-.1.33-.15.49c-.02.08-.05.16-.06.25c-.04.17-.07.35-.09.53c-.01.08-.03.16-.04.23c-.03.26-.05.51-.05.78c0 0-.01.15-.04.43c-.01.04-.01.1-.02.15"/><path fill="#3e2723" d="M121.21 52.31c-.01 10.55-1.53 15.76-7.78 20.81c-7.15 5.78-22.49 8.36-49.72 8.36c-25.64 0-41.13-2.89-48.75-9.1C8.47 67.1 7.09 61.74 7 52.31H5.82c.2 21.4 4.28 34.04 58.29 34.04c57.17 0 58.28-11.25 58.3-34.04z"/><path fill="#a06841" d="M122.3 46.48c-.25-3.54-.42-5.64-.42-5.64c0-2.09-.92-3.95-2.36-5.24c.44 2.27.72 4.34.72 5.64v5.32c0 11.45 0 19.73-6.52 25c-7.15 5.78-22.49 8.36-49.72 8.36c-25.64 0-41.13-2.89-48.75-9.1c-6.94-5.65-7.49-14.27-7.49-24.95v-4.62c0-1.34.31-3.54.78-5.91a6.99 6.99 0 0 0-2.68 5.51s-.06.62-.15 1.76v3.26c0 22.65 2.57 36.11 58.3 36.11c58.36 0 58.3-11.73 58.29-35.5"/><path fill="#0096FF" d="M4.77 107.9c.25 2.69.85 8.96 1.2 11.49c0 0 .8 4.61 4.61 4.61h106.81c3.21 0 4.61-4.61 4.61-4.61c.44-2.37 1.05-8.22 1.37-11.35c0 0-1.75 2.52-10.43 4.48c-8.67 1.95-25.89.53-43.87.51c-23.92-.03-49.04.74-55.76-.96c-5.69-1.43-8.54-4.17-8.54-4.17"/><path fill="#00a651" d="M66.24 25.88c4.07.03 7.93.73 11 1.75c1.08.36 5.54 3.15 7.12 2.82c.84-.2 2.66-.9 2.23-3.2c-.48-2.58-4.23-2.85-7.11-3.91c-4.07-1.49-8.76-2.03-13.24-2.03c-4.31 0-8.78.5-12.73 1.84c-2.94 1-8.53 2.43-7.95 5.13c.55 2.59 3.53 2.35 4.26 1.99c2.12-1.04 3.81-1.92 6.18-2.78c3.05-1.11 6.78-1.63 10.24-1.61"/><path fill="#00a651" d="M66.12 22.38c9.12 0 12.97 2.76 15.07 4.23c5.12 3.58 5.47 1.54 5.4.64c-.27-3.53-3.87-6.16-6.82-7.59c-4.16-2.02-8.97-2.74-13.56-2.74c-4.41 0-8.98.67-13.03 2.5c-3.01 1.35-8.33 4.74-7.73 8.43c.48 2.9 4.29.08 5.03-.41c2.18-1.4 6.16-5.06 15.64-5.06"/><path fill="#0096FF" d="M46.65 27.25c-.8-1.48.97-3.36 1.74-4c1.54-1.27 3.28-2.36 5.13-3.11c.95-.38 3.72-.96 3.86.53c.14 1.51-3.67 3.01-4.63 3.48c-3.42 1.67-5.34 4.52-6.1 3.1" opacity="0.68"/><path fill="#3e2723" d="M70.06 95.07H57.94c-.78 0-1.42-.63-1.42-1.42v-7.78c0-.78.63-1.42 1.42-1.42h12.11c.78 0 1.42.63 1.42 1.42v7.78c0 .79-.63 1.42-1.41 1.42"/><path fill="#0096FF" d="M70.96 82.01H57.04c-.59 0-1.07-.48-1.07-1.07v-4.21c0-.59.48-1.07 1.07-1.07h13.93c.59 0 1.07.48 1.07 1.07v4.21c-.01.59-.49 1.07-1.08 1.07m-.89 11.04H57.93c-.56 0-1.02-.46-1.02-1.02v-6.77c0-.56.46-1.02 1.02-1.02h12.15c.56 0 1.02.46 1.02 1.02v6.77c-.01.56-.46 1.02-1.03 1.02"/><path fill="#fff59d" d="M58.77 78.83c0 2.3-.35 2.55-1.11 2.55s-.88-.74-.88-2.57s.13-2.46.94-2.46s1.05.18 1.05 2.48m1.28 9.63c0 2.2.04 3.5-1.02 3.5c-1.07 0-1.17-1.24-1.17-3.56c0-1.67 0-3.04 1.11-3.04c1.1-.01 1.08.89 1.08 3.1"/></svg>
                        </div>
                        <h3 class="text-xl mb-6 font-semibold">Careers</h3>
                        <p class="text-gray-600 mt-2 lg:min-h-[150px] lg:max-h-[200px]">
                            Join a team that's out to change the way the world works.
                        </p>
                        <a href="{{route ('careers')}}" class="text-[#00a651] font-semibold mt-4 inline-block">Learn More →</a>
                        </div>

                        <!-- Card 2 -->
                        <div class="border-l border-gray-300 pl-4">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="2.6em" viewBox="0 0 256 256"><path fill="#00a651" d="M29.251 254.992c-4.79-1.262-8.924-3.12-12.737-5.722c-3.218-2.197-7.922-6.739-9.711-9.376c-2.185-3.222-4.696-8.738-5.72-12.564c-1.044-3.903-1.06-5.457-1.08-99.134c-.018-93.203.003-95.253 1.026-99.258C4.648 14.773 15.853 3.996 30.305.78C34.46-.144 220.08-.305 224.562.61c12.135 2.483 21.673 9.78 27.192 20.805c4.388 8.765 3.996-.88 4.197 103.185c.128 66.212.01 94.01-.412 97.473c-1.976 16.205-13.134 28.775-29.19 32.882c-4.108 1.05-5.537 1.066-98.789 1.037c-90.164-.027-94.794-.074-98.309-1"/><path fill="#0096FF" d="M164.338 206.474c11.47-1.564 20.458-6.162 28.89-14.776c6.1-6.232 9.918-12.977 12.414-21.93c1.036-3.719 1.123-5.53 1.313-27.365c.144-16.481.024-24.2-.405-26.148c-.622-2.825-2.385-5.448-4.397-6.541c-.62-.337-4.586-.766-8.815-.953c-7.087-.315-7.88-.453-10.116-1.764c-3.548-2.08-4.525-4.324-4.535-10.42c-.019-11.647-4.866-22.46-14.442-32.22c-6.823-6.952-14.434-11.658-23.12-14.295c-2.08-.632-6.737-.847-22.333-1.03c-24.472-.29-29.904.212-38.236 3.53c-15.36 6.118-26.395 19.011-30.421 35.541c-.756 3.105-.903 8.08-1.082 36.663c-.223 35.808.023 41.066 2.26 48.162c1.85 5.863 3.715 9.456 7.557 14.555c7.32 9.715 18.29 16.73 29.258 18.712c5.22.943 69.615 1.179 76.21.28"/><path fill="#00a651" d="M162.317 150.441c4.233 3.953 3.34 10.99-1.761 13.88l-5.243.853l-30.939.358c-20.86.195-27.128-.216-28.409-.724l-.04-.017c-2.518-1.097-4.862-4.143-5.267-6.845c-.386-2.573.908-6.11 2.89-7.905l.441-.384c1.954-1.605 4.202-1.893 22.635-1.958l21.317-.022c21.549.016 21.738.301 24.376 2.764M131.944 92.09c3.286 1.66 4.714 4 4.714 7.727c0 3.236-1.24 5.54-3.994 7.398l-.534.341c-1.34.8-2.654.939-13.041 1.02l-6.703.038c-8.309.017-14.705-.157-15.727-.439c-5.864-1.616-8.055-10.029-3.745-14.38l.401-.398c2.307-2.235 3.775-2.466 17.292-2.487l10.186.008c8.608.04 9.295.235 11.151 1.172"/></svg>
                        </div>
                        <h3 class="text-xl mb-6 font-semibold">Blog</h3>
                        <p class="text-gray-600 mt-2 lg:min-h-[150px] lg:max-h-[200px]">
                            Learn about digital transformation, borderless hiring, and more.
                        </p>
                        <a href="https://blog.indepthresearch.org/" class="text-[#00a651] font-semibold mt-4 inline-block">Learn More →</a>
                        </div>

                        <!-- Card 3 -->
                        <div class="border-l border-gray-300 pl-4">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 128 128"><path fill="#00a651" d="M115.3 111.46H12.7c-5.52 0-10-4.48-10-10v-72c0-5.52 4.48-10 10-10h102.6c5.52 0 10 4.48 10 10v72c0 5.53-4.48 10-10 10"/><g fill="#0096FF"><path d="m63.96 59.81l-.03.01c-.24.09-.31.39-.15.59l1 1.21l.68-.58l-1.09-1.14a.39.39 0 0 0-.41-.09M47.73 78.96l-2.63-1.37c-.23-.12-.5-.19-.76-.19h-.76a.29.29 0 0 1-.28-.25c-.08-.84-.79-1.49-1.63-1.49h-.24c-.51 0-.99-.24-1.3-.65l-.36-.48c-.28-.37-.7-.6-1.16-.64l-1.96-.17a.2.2 0 0 1-.13-.05l-.32-.22c-.09-.06-.2-.07-.29-.01l-1.4.79q-.375.21-.81.21h-1.44c-.05 0-.09-.01-.13-.03c-.16-.09-.53-.37-.53-.99v-.83a.28.28 0 0 0-.28-.28h-.91a.28.28 0 0 1-.24-.42l.43-.75c.02-.04.04-.09.04-.14v-.66a.28.28 0 0 0-.28-.28h-.5c-.09 0-.18.05-.23.13l-.28.44c-.3.47-.82.75-1.38.75h-.4s-.65-.12-.65-.81v-2.51c.01-.08.07-.33.34-.5c.24-.15.8-.45 1.08-.6c.1-.05.23-.04.32.04l.53.49c.05.05.11.07.18.07c.17 0 .48.01.54-.02c.08-.04-.12-.4.36-.55c.49-.14.81.3.81.3l1.24 1.47c.09.11.25.13.37.05l.18-.12c.12-.08.16-.24.09-.37l-.02-.04c-.4-.69-.25-1.57.36-2.08l1.03-.87s.12-.08.18-.53c.04-.27.11-.67.16-.95c.11-.18.2-.35.31-.53l2.22-1.87c.13-.11.32-.08.41.06c.11.16.29.34.52.33c.35-.02 1.22-.49 1.56-.69a.27.27 0 0 0 .14-.24v-.35l-1.07.22c-.15.03-.3-.07-.33-.23l-.12-.7a.28.28 0 0 0-.27-.23l-1.07.12l.13-.32c.04-.11.14-.18.26-.2l2.64-.28c.24-.1.6-.24.84-.34l.53-.41c.13-.1.14-.29.03-.41l-2.97-3.04a.29.29 0 0 0-.32-.06l-.89.42c-.09.04-.2.03-.28-.02l-2.46-1.73a.27.27 0 0 0-.38.06l-.38.52c-.03.04-.05.09-.05.15l-.07 1.29c0 .08.02.15.08.21l.36.37c.12.12.1.32-.04.42l-.53.38a.28.28 0 0 1-.25.04l-1.2.2c-.17-.45-.54-.8-1-.96l-.6-.21c-1.09-.37-1.46-1.72-.73-2.6l1.17-1.41a.31.31 0 0 0 .05-.28l-.33-.85l-.06-.09l-1.32-1.41c-.52-.55-1.45-.27-1.57.48l-.01.08c-.07.44-.46.77-.9.77h-3.93c-.22-.05-.44-.09-.67-.14l-2.69-1.2c-.19-.05-.37-.09-.56-.14l-2.47-.16c-.23.04-.46.07-.69.11l-1.11.43c-.3.11-.62.14-.93.07l-5.49-1.17c-.33-.07-.68-.04-.99.1L4.6 49.52c-.19.08-.23.33-.07.47l.68.57c.19.16.08.48-.17.49l-1.02.02c-.15 0-.27.13-.27.28v.14c0 .15.12.27.27.28l.88.01c.3.01.38.41.11.53l-.76.34c-.11.05-.17.16-.16.28l.07.76c.07.75.63 1.35 1.38 1.47l.54.09c.26.04.32.38.1.51l-.17.1c-.18.11-.18.37 0 .47l.09.05c.08.05.17.05.26.02l4.63-2.09c.6-.27 1.3-.16 1.78.29l4.41 4.03c.32.29.51.7.53 1.13l.15 3.08c.02.35.14.68.36.95l4.34 5.4c.08.1.22.13.34.07c.15-.08.2-.27.1-.41c0 0 2.74 2.84 3 2.96l2.22 1.1c.23.11.47.17.73.17h1.1c.11 0 .21.06.25.16l.37.8c0 .01.01.01.01.02c.07.11.64 1.08 1.25 1.12c.65.04 1.82 0 1.82 0s.42-.01.42.45v.7c0 .1-.05.19-.14.24c-.36.2-1.29.79-1.29 1.46v1.57q0 .105.06.18c.12.14.38.44.6.62c.24.19.66.68.83.87q.06.075.06.18v.9c.01.03.01.07.02.1c.05.12.18.42.41.53c.14.07.49.35.81.63c.4.34.61.85.57 1.38l-.2 2.56c-.02.1-.03.2-.05.3l-.89 3.34c-.02.2-.03.39-.05.59l.09 1.37c.02.24 0 .48-.08.71l-.33.93c-.1.3-.12.62-.05.93l.42 1.73c.05.2.16.38.33.51l.43.34c.16.13.4.31.57.19c.83-.57 1.13-2.87 1.49-3.73c.18-.44 2.84-3.91 2.83-4.38l-.02-.67c0-.16.12-.28.28-.28h.85c.08 0 .15-.03.2-.09l1.99-2.18c.05-.05.07-.12.07-.19v-.89c0-.16.13-.28.29-.28c.34.02.9.02 1.09-.14c.24-.2.96-1.04 1.19-1.3c.04-.05.07-.11.07-.18v-1.41c0-.41.15-.8.43-1.11l1-1.1c.28-.3.35-.75.15-1.15c-.1-.19-.27-.35-.47-.45"/><path d="M116.75 47.35h-2.8c-.14 0-.26-.09-.3-.22l-2.68-.51c-.23 0-.46-.07-.66-.2l-.61-.41c-.2-.13-.43-.2-.66-.2c0 0-6.24-3.19-14.41-2.88c-3.07.12-5.77 1.65-5.77 1.65c-.08.03-.14.11-.15.19l-.03.25c-.02.12-.12.21-.25.21l-1.23-.03c-.14 0-.25.11-.25.24l-3.44.12c-.3 0-.58.15-.75.39l-.31.45c-.23.33-3.31.44-3.31.44a.45.45 0 0 1-.27-.41v-.36q0-.195.15-.33l1.64-1.48c.18-.16.41-.27.65-.3l1.02-.13a.45.45 0 0 0 .3-.18l.12-.18c.17-.24.06-.57-.21-.67l-.07-.03a.45.45 0 0 0-.36.03l-.78.45c-.07.04-.14.06-.22.06h-.76c-.32 0-.62.13-.85.36l-1.83 1.87c-.16.16-.27.37-.32.59l-.17.82l.12.35l-.72 1l-.65.65h-.61v-.65h-.73l-.21.82c-.1.38-.37.68-.73.82l-.61.23c-.39.15-.84.08-1.17-.19l-.79-.64l2.13.11l.24-.46s-2.23-1.03-3.52-1.76c-1.05-.59-2.43-.09-2.91.12c-.12.05-.22.12-.31.2l-4.65 4.19c-.5.45-.53 1.24-.05 1.72l.44.45l.62-.51c.17-.14.41-.13.57.02l1.16 1.08h.3l1.1-1.3c.13-.16.14-.38.01-.54l-.14-.19a.44.44 0 0 1-.03-.49l1.53-2.48c.08-.13.25-.18.39-.12l.27.13c.16.07.22.26.14.42l-1.05 1.99c-.13.24-.15.52-.07.77l.17.53c.08.38.01.78-.22 1.08l-.66.89c-.23.31-.61.49-1 .48l-1.91-.07a.35.35 0 0 1-.33-.34v-.31c0-.19-.15-.34-.34-.34c-.17 0-.32.13-.34.31l-.05.55c-.02.17-.16.31-.34.31h-.18c-.09 0-.17.03-.23.09l-3.1 2.86l.45.65v.69c0 .23-.19.42-.42.42h-.99c-.53 0-.95.45-.92.98l.01.13c.03.47.41.84.89.86l1.06.03c.4.01.77-.17 1.01-.5l.76-1.07c.22-.31.58-.5.97-.5h.73c.24 0 .48.07.68.21l1.17.82c.23.16.25.5.03.68l-.66.57c-.22.19-.49.29-.78.29h-4.12c-.37 0-.73.18-.95.48l-3.18 4.25c-.15.21-.24.46-.24.71v2.82c0 .26.08.51.24.72l1.11 1.47c.09.12.15.27.2.41c.07.24.27.59.75.59h5.14s1.29.04 1.29.89c0 .3-.01.6-.02.86c-.02.46.22.87.62 1.1c.36.21.74.57.74 1.15V80c0 .12-.02.24-.05.36c-.09.29-.3.88-.59 1.32c-.27.4.11 1 .39 1.35c.17.22.26.49.26.76v1.55s.12.57.66.81s.73.38.73.38v.62c0 .66.53 1.19 1.19 1.19h1.56s.7.05 1.16-.65s2.1-3.24 2.1-3.24s.3-.32 0-.89s-.16-1.08-.16-1.08l1.43-.82s.67-.11.67-1.04v-1.01c0-.16-.04-.32-.13-.46l-.25-.42c-.27-.46-.2-1.03.16-1.42l2.96-3.14s.78-1.16.78-1.75h-2.27c-.42 0-.8-.22-1.02-.57l-2.59-4.27a.64.64 0 0 1 .25-.9c.3-.16.67-.05.84.23L74.88 71l-.01.37c0 .12.09.21.21.21c.62 0 2.45-.07 3.47-.96c.54-.47.87-.95 1.07-1.35c.24-.48.12-1.06-.28-1.41l-.64-.56l-.83.18l-1.47-1.47c-.22-.22-.16-.6.12-.74a.46.46 0 0 1 .49.05l2.3 1.76s.47.42.95.42h1.35c.42 0 .81.22 1.02.58l3.01 5.06s.45.42.71.4s.61-1.11.61-1.11c0-1.01.49-1.97 1.32-2.55l1.04-.73c.47-.33 1.1-.28 1.51.11l.64.62v.66c0 .11.09.21.21.21h.28l.27-.27h.32v2.66c0 .3.11.59.32.81l2 2.14v-.77c0-.27-.09-.53-.26-.74l-.94-1.17c-.17-.21-.26-.47-.26-.74v-.81c0-.13.16-.19.25-.1L94.87 73l.03.78c.01.15.19.22.29.11l1.71-1.85s.5-.62 0-1.13c-.36-.37-.86-.84-1.18-1.14a.375.375 0 0 1 .02-.57l.33-.28l1.34.02s.88.01 1.54-.67c.81-.83 2-2.14 2-2.14s.24-.93-.32-1.42c-.57-.49-.32-1.09-.32-1.09l.7-.61v-.43h-1.83s.16-.97 1.46-1.03c.17-.01.33-.01.46-.02a.995.995 0 0 1 1.02 1v1.8l.27.03s.51.05.7-.62c0 0 .34-.1.34-.51v-.49l-.49-.59l.8-1.02c.14-.18.34-.3.56-.34l.41-.08a.94.94 0 0 0 .6-.39l1.85-2.77c.13-.2.2-.43.2-.66v-.76a.37.37 0 0 0-.37-.37h-1.08s-.45-.53.16-.89c.43-.26 1.27-.95 1.74-1.34c.21-.18.48-.28.76-.28h2.18c.25 0 .49-.08.69-.22l1.43-1.02a.3.3 0 0 1 .18-.06c.62 0 .94.74.52 1.2l-1.48 1.59c-.2.21-.32.5-.32.79l-.02 1.28c0 .24.19.44.44.44h.36l1.94-1.98c.13-.13.22-.31.25-.49l.07-.42c.1-.57.59-.99 1.17-.99h.85c.29 0 .57-.1.78-.29l1.19-1.04c.06-.05.13-.08.21-.08h.62c.18 0 .32-.14.32-.32v-.6c0-.09.04-.17.1-.23l.46-.43c.37-.34.91-.42 1.36-.18l.78.41c.19.1.43.05.57-.12l.38-.48a.46.46 0 0 0-.16-.7l-3.77-1.85c-.2-.07-2.74-.11-2.92-.11M63.93 59.83l.03-.01a.37.37 0 0 1 .41.09l1.09 1.14l-.68.58l-1-1.21c-.16-.2-.09-.5.15-.59m6.51 5.45h-.61q-.12 0-.24-.03c-.66-.18-3.96-1.1-4.57-1.38a.463.463 0 0 1-.15-.74l.82-.87c.28-.25.72-.23.98.04l.75.79l.65-.12l-.18-.47s-.08-.22-.16-.42s.36-.45.36-.45s.45-.04.45.65s.73 1.21.73 1.21h2.49c.16 0 .26.17.18.3l-.44.84c-.21.4-.62.65-1.06.65m3.13-3.73h-.85l-.62-.48a.43.43 0 0 0-.24-.08h-.81c-.12 0-.24.05-.33.13l-.59.52l-.58.09a.404.404 0 0 1-.47-.35l-.08-.64c-.02-.19.04-.37.16-.51l.96-1.08l.43-.03l-.02.19c-.03.23.15.43.38.43h.21c.21 0 .4-.12.48-.31l.2-.43l.89.15l.08.64c.02.14.09.27.2.36l.99.83v.18c0 .22-.17.39-.39.39m4.3.69v.73h-1.54l-.13-.73c-.02-.1 0-.21.06-.29l.08-.11c.11-.16.09-.38-.06-.51l-.72-.66v-1.21l1.05-.45h.54c.21 0 .39.14.45.34l.01.03c.04.15 0 .3-.1.42a.45.45 0 0 0-.11.23l-.1.63l.85.78l-.61.4z"/><path d="m100.35 78.31l-3.64-.42a.9.9 0 0 1-.27-.07l-.88-.36c-.13-.05-.26-.14-.36-.24l-2.93-3.07a.4.4 0 0 0-.31-.11c-.28.04-.4.37-.21.58l3.08 3.45c.13.14.29.24.47.3l1.74.52c.1.03.19.04.29.04h2.98zm7.24 1.94l-.15.42c-.3.84-1.14 1.37-2.03 1.26a.37.37 0 0 1-.28-.55l.75-1.38l-1.95.07c-.26.01-.52.07-.75.18l-.73.34c-.19.09-.37.21-.52.36l-1.36 1.32c-.16.16-.35.29-.56.38l-.92.41c-.69.31-1.14.99-1.14 1.75v.14q0 .39.15.75l.72 1.69c.02.04.03.07.04.11c.12.46.62.73 1.07.57l1.84-.65c.26-.09.54-.13.81-.1l2.2.2c.6.05 1.13.38 1.45.89l.15.23c.35.56.96.9 1.63.9h.89c.51 0 1-.2 1.36-.56l.98-.98c.36-.36.56-.85.56-1.36v-1.28c0-.54-.23-1.05-.62-1.41l-2.01-1.84c-.19-.17-.34-.38-.44-.61l-.6-1.3c-.13-.2-.46-.19-.54.05"/><path d="m98.86 76.83l.55-.99c.1-.18.14-.38.13-.58l-.09-1.05c-.02-.25-.32-.38-.51-.21l-1.54 1.3a.4.4 0 0 1-.14.07l-.69.13c-.18.03-.29.21-.25.38l.14.57a1 1 0 0 0 .7.72l.53.15c.46.13.94-.07 1.17-.49m8.34 2.33c.15 0 .3-.03.44-.1l1.06-.51c.01 0 .01 0 .02.01l.78.96c.04.05.1.08.17.08h.52c.18 0 .28-.2.17-.34l-.81-1.05l-.35-.29l-2.86-1.42h-.01l-.68.27h-.52c-.01 0-.01 0-.01-.01l-.19-.62a.2.2 0 0 0-.19-.14h-.7a.2.2 0 0 0-.2.2v.61h.45v.18c0 .22.17.41.39.44l1.02.12s.01 0 .01.01l.55.68c.17.21.14.72-.04.93l-.01.01h.99zm.59-19.39l-.36.32c-.4.36-.64.85-.7 1.39c-.05.5-.27.96-.62 1.32c-.51.51-1.15.86-1.84 1.01l-.14.03l-.57.46s-.16.81 0 1c.07.09.37.07.46 0c.12-.09.13-.59.13-.59l1.81-.65s.45.59.67.62c.1.01.32-.1.38-.19c.24-.33.51-1.54.51-1.54c.09-.27.15-.56.18-.84l.1-1.06l.81-.05l.32-.65l-.84-.08zM74.42 84.58s.27.53.92.53s.92-.53.92-.53v-2.47c0-.72-.79-1.16-1.4-.78c-.27.17-.44.46-.44.78zM53.96 41.53l1.08-.63l.02-.04a.475.475 0 0 0-.43-.69h-2.46l-.26-.28c-.3-.34-.73-.54-1.18-.55l-3.66-.15c-.24.04-.48.09-.72.13l-2.17.91c-.18.08-.37.12-.57.13l-3.48.17c-.26.01-.51.09-.74.21l-1.95 1.1a.22.22 0 0 0-.02.37c.15.11.1.35-.08.39l-1.52.38c-.15.04-.21.21-.14.33l.51.83c.03.05.09.09.15.1l2.73.47c.42.07.79.3 1.05.64L42 47.82l.55.75c.2.27.17.64-.05.88l-.42.44c-.2.21-.24.52-.11.78l1.37 2.74c.12.25.35.43.61.51c.85.25 1.75-.21 2.05-1.05l.36-1.02c.05-.15.16-.28.3-.37l1.53-1.3c.19-.16.41-.27.64-.34l2.4-.65c.51-.14.92-.5 1.11-.99l1.13-2.8c.17-.41.16-.87-.01-1.28l-.22-.52c-.31-.75-.01-1.64.72-2.07m-20 2.43l.46-.81c.16-.28.38-.5.66-.65l3.78-2.09l-.43-.49l-4.29-.26c-.12-.01-.25 0-.37.02l-4.18.67c-.25.04-.49.13-.7.28c-.84.57-.99 1.75-.33 2.52l.94 1.09c.32.38.8.59 1.29.59h1.68c.62 0 1.19-.33 1.49-.87m4.77 7.63l.39-.45c.1-.12.08-.3-.05-.38l-1.22-.86l-4.26-3.15c-.18-.13-.39-.2-.61-.2H31.3c-.27 0-.52.1-.71.29l-.89.86a.25.25 0 0 0-.02.35l.5.63c.05.07.14.11.23.1l.48-.04c.15-.01.27.1.28.24l.02.28c0 .04 0 .08-.02.12l-.22.54c-.04.09-.02.2.04.27l.53.62c.05.06.13.1.21.09l.51-.02c.14-.01.25-.12.25-.26v-1.09c0-.14.11-.25.24-.26l.71-.05c.06 0 .13.01.18.05l1.3.99c.1.08.13.21.08.32l-.43.86c-.04.08-.12.14-.22.14l-.41.03c-.12.01-.21.09-.24.2c-.03.16.08.31.24.32l.88.07c.18.01.36.08.51.18l1.55 1.08c.1.07.23.06.32-.02l.49-.41c.04-.03.07-.08.08-.13l.16-.62c.02-.07.01-.15-.03-.21l-.53-.82l.17-.03c.06-.01.13 0 .18.03l.68.4c.1.06.24.04.33-.06m-19.39-3.08v-.89h.53l.78 1.09c.1.13.22.24.37.32l1.02.51c.14.07.3.11.46.11h3.16V48.6l-1.17-.41l-1.35-.72c-.18 0-.35-.05-.5-.13l-2.16-1.23a1 1 0 0 0-.5-.13h-1.3c-.44 0-.83.28-.97.7l-.11.35c-.12.36-.02.77.25 1.04l.46.46h1.03zm4.49-1.74l.83-.43c.14-.07.3-.11.47-.11h.45c.39 0 .75.22.92.58l.33.68v.7h-1.5v-.89l-.63-.32l-.75.02zm2.87-.54l.75 1.22l.59.35h.87l.87-.92l-.66-.86l-1.69.21zm-4.85-1.86l1.18.42c.08.03.15.06.22.11l.82.54c.14.09.29.15.46.16l1.49.15l-.18-.92l-1.78-.98c-.15-.08-.32-.13-.49-.13h-.91zm37.83 7.52l.43.68c.04.06.04.15-.01.21l-.33.45c-.03.05-.05.11-.03.16l.13.45q.015.06.06.09l.69.53c.47.36.53 1.05.13 1.49l-.01.01c-.19.21-.47.34-.76.34h-.82c-.12 0-.21-.11-.18-.23l.21-.82c.01-.05.05-.1.1-.12l.37-.18c.07-.03.11-.11.1-.19l-.02-.22a.19.19 0 0 0-.15-.16l-.53-.11a.18.18 0 0 0-.2.1l-.12.26c0 .01-.01.02-.01.03l-.26.88c-.02.08-.1.13-.18.13l-.83-.02a.18.18 0 0 1-.18-.18v-.94c0-.1.08-.18.18-.18l.43-.01c.06 0 .11-.03.15-.08l.4-.58c.02-.03.03-.07.03-.11v-.88c0-.06.03-.11.07-.14l.87-.7c.08-.07.21-.05.27.04"/><path d="M50.28 50.47h-.67l-.42.49l1.15.9c.21.17.48.24.75.21l1.31-.16v-.85l-.25-.6l-1.36.35zm12.62-7.19h1.73c.21 0 .41.06.58.18L67 44.71l-.24.36l-1.51-.77l-.62 1.13h-.67l-1.48-1.86zm3.17-1.33h2.24l.57.43l-.57.59h-1.2c-.22 0-.43-.07-.6-.2l-.65-.48zm-40.99.6l1.48-.55l.87.45l.43.81l-.54.1l-1.62.51l-2.05-.96zm3.63 2.43h.64l.33.36h3.42l.28.41l-.18.38l-3.18.1l-.36-.4l-.53-.08l-.08-.33l-.34-.12zm-2.49.06l.25.71l.65.05l.53-.61l-.23-.21l-.95-.08zm1.76-.87l-.12.4l.5.16l.35-.28h.22v-.18l-.43-.18l-.26-.1zm3.97 25.67l.62-.27h1.66l1.29.97s.61.08.61.24s-.61.24-.61.24h-.89l-1.25-.85l-.77.12l-.66-.27c-.08-.02-.08-.14 0-.18m4.3 1.53c-.07-.16.49-.49.49-.49s.9-.23 1.03 0c.07.13-.32.49-.32.49s-1.08.28-1.2 0m71.57 19.22h2.1l-1.05 1.22h-.49z"/></g></svg>
                        </div>
                        <h3 class="text-xl mb-6 font-semibold">Services</h3>
                        <p class="text-gray-600 mt-2 lg:min-h-[150px] lg:max-h-[200px]">
                            Discover the exensive services Tech For Development is associated with.
                        </p>
                        <a href="{{route('our-venues')}}" class="text-[#00a651] font-semibold mt-4 inline-block">Learn More →</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class=" lg:mx20 w-full lg:w-9/12 container mx-auto lg:pt-[250px] pb-20 dark:bg-secondary">
                <section
                class="  relative bg-[url('https://makecomponents.com/Image/call-to-action/001/001.webp')] h-[500px] sm:h-[370px] md:h-[400px] lg:h-[300px] bg-no-repeat bg-cover bg-center "
                >
                    <div class="h-full lg:grid lg:grid-cols-3 relative">
                        <div class="hidden lg:block col-span-1 h-full">
                            <div class="h-full relative ">
                                <img
                                    src="{{asset ('images/program-cta1.webp')}}"
                                    alt="person "
                                    class="absolute bottom-0 h-[500px] w-full"
                                />
                            </div>
                        </div>
                        <div class="col-span-2 h-full flex items-center">
                            <div class="px-4">
                                <h3 class=" text-white  relative after:bg-[#fff] after:w-[10%] text-4xl font-semibold   pb-4">
                                    Ready to get started?
                                </h3>
                                <h4 class=" text-[#fff]  text-[20px] ">
                                    Curious about Tech For Development and how we can help you reach your goals? To get started, just click the button below to make an inquiry, or reach out to us at  <span class=" text-[#328d8b]  underline underline-[#fff] underline-offset-2 "> <a href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a>  </span> or call us at  <span class=" text-[#328d8b]  underline underline-[#fff] underline-offset-2 "> <a href="tel:+254 715 077 817">+254 715 077 817</a></span>
                                </h4>

                                <div class="mt-10">
                                    <a href="/contact" class="bg-[#328d8b] text-white rounded-3xl py-3 px-5 hover:bg-[rgb(161,30,34)]">Contact Us</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div> --}}


    </div>

@endsection

@section('js_content')

    <!-- JavaScript for Interactivity -->
    {{-- <script>
        const historyData = {
            '2003': "Tech For Development was established as a consultancy firm in Kenya to support graduates with research work.",
            '2007': "Tech For Development expanded its services to include GIS and remote sensing, and its geographical reach to East Africa.",
            '2010': "By 2010, Tech For Development was incorporated as a limited liability company and expanded its portfolio of services to reach East Africa.",
            '2013': "In 2013, Tech For Development introduced program management, M & E software and database development services. ",
            '2016': "Tech For Development was then established as a consultancy firm in Kenya to support graduate students in research work.",
            '2017': "Tech For Development established a branch office in Uganda ",
            '2020': "2020 saw our strongest year yet. Tech For Development launched a 10-year strategic plan as a management and strategy consulting firm.",
            '2024': "Now, Tech For Development has expanded its training locations globally. Tech For Development portfolio covers professional services across all sectors."
        };

        const years = ['2003', '2007', '2010', '2013', '2016', '2017', '2020', '2024'];
        let currentYearIndex = 0;

        function showContent(year, index) {
            document.getElementById('year-content').innerHTML = historyData[year];

            const yearButtons = document.querySelectorAll('.year-btn');
            yearButtons.forEach((button, idx) => {
                button.classList.remove('bg-[#00a651]', 'text-white');
                if (idx === index) {
                    button.classList.add('bg-[#00a651]', 'text-white');
                }
            });

            currentYearIndex = index;
            scrollToYear(index);
        }

        function scrollToYear(index) {
            const yearButtons = document.querySelectorAll('.year-btn');
            const targetButton = yearButtons[index];
            document.getElementById('timeline').scrollTo({
                left: targetButton.offsetLeft - (document.getElementById('timeline').offsetWidth / 2 - targetButton.offsetWidth / 2),
                behavior: 'smooth'
            });
        }

        window.onload = function() {
            showContent('2003', 0);
        };

        function prevYear() {
            if (currentYearIndex > 0) {
                currentYearIndex--;
                showContent(years[currentYearIndex], currentYearIndex);
            }
        }

        function nextYear() {
            if (currentYearIndex < years.length - 1) {
                currentYearIndex++;
                showContent(years[currentYearIndex], currentYearIndex);
            }
        }
    </script> --}}


    <script>
        // Counter js section

        function runCounter(counterElement, targetNumber, duration = 1000, frameRate = 60, count = 0) {

            let increment = targetNumber / (duration / (1000 / frameRate));
            let startTime = null;

            function updateCounter(timestamp) {
                if (!startTime) startTime = timestamp;
                const elapsed = timestamp - startTime;

                if (elapsed < duration) {
                    count += increment;
                    counterElement.textContent = Math.floor(count).toLocaleString();
                    requestAnimationFrame(updateCounter);
                } else {
                    counterElement.textContent = targetNumber.toLocaleString();
                }
            }

            requestAnimationFrame(updateCounter);
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    //Course Counter
                    runCounter(document.getElementById('Courses_counter'), 1500, 3000)

                    //Learners Counter
                    runCounter(document.getElementById('Learners_counter'), 5000000, 3000)

                    //Companies Counter
                    runCounter(document.getElementById('Companies_counter'), 876, 3000)

                    //Venues
                    runCounter(document.getElementById('Venues_counter'), 20, 3000)

                    //Sectors
                    runCounter(document.getElementById('Sectors_counter'), 17, 3000)

                    //Services
                    runCounter(document.getElementById('Services_counter'), 1000, 3000)
                }
            });
        });

        const badges = document.querySelector('#badges_of_quality')
        observer.observe(badges)
    </script>


@endsection
