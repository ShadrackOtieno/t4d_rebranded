<!-- filter courses -->
<div class="dropdown">
    <ul class="list-none bg[#00a651] w-max py-1 px-2 rounded-t-lg  relative">
        <a class="text-white hover:text-black" href="#" role="button" id="country-selector" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filter courses by:
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline size-6">
            <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z" clip-rule="evenodd" />
          </svg>

        </a>

        <li class="absolute left-0 top -full w-full">
            <ul class="list-none bg-[#1ea19d] divide-y *:p-2 *:text-center">

                    <a class="dropdown-item w-full block" href="{{ route('course.schedule', [

                        'sort' => 'title',
                        'category' => $category,

                    ]) }}">
                        Title
                    </a>
                    <a class="dropdown-item w-full block" href="{{ route('course.schedule', compact('category')) }}">
                    Month
                    </a>
                    <a class="dropdown-item w-full block" href="{{ route('course.schedule', [

                        'sort' => 'location',
                        'category' => $category,

                    ]) }}">
                        Location
                    </a>
                    <a class="dropdown-item w-full block" href="{{ route('course.schedule', [

                        'sort' => 'virtual',
                        'category' => $category,

                    ]) }}">
                        Virtual
                    </a>
                    <a class="dropdown-item w-full block" href="{{ route('course.schedule', [

                        'sort' => 'elearning',
                        'category' => $category,

                    ]) }}">
                        E-learning
                    </a>
            </ul>
        </li>
    </ul>
</div>
<!-- END filter courses -->

@push('style')
    <style>
        .dropdown ul{
            background-color: #1ea19d;
            li{
                display: none;
            }
            &:hover{
                li{
                    display: block;
                    ul a{
                        background-color: #51bbb7e5;
                        &:hover{
                            background-color: #00a651;
                            color: white;
                        }
                    }
                }
            }
        }
        /* dropdown */
    </style>
@endpush
