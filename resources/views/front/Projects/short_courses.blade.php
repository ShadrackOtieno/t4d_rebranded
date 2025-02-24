
<div class="w-full mb-4">

    <div class="grid grid-cols-2 sm:grid-col-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-col-6 gap-3">
        @foreach ($courses as $course)
        <div class="border box-content rounded-lg shadow-xl hover:shadow-[#00a651] aspect-square overflow-hidden relative group">
            <div class="absolute bottom-0  bg-[#00a651] bg-opacity-60 text-white w-full h-full group-hover:bg-opacity-100 flex items-center transition duration-500">
                <a class="hover:underline" href="{{ route('course.show', $course->slug) }}">
                    <h5 class="p-3">{{ $course->name }}</h5>
                </a>
            </div>
            <img loading="lazy" src="{{ asset('storage/'.$course->cover) }}" alt="{{ $course->name }}" title="{{ $course->name }}" class="w-full h-full object-cover">
            <div class="absolute top-0 z-60 w-full p-2 ">
                <div class="flex justify-end">
                    <div class="bg-[#00a651] rounded-full cursor-pointer wishlist-button hover:bg[#1EA19D] group/wish group-hover:scale-110" data-toggle="modal" title="Add to Wishlist" data-target="#wishlist" data-course-id="{{ $course->id }}" data-course-name="{{ $course->name }}" onclick="wishListModal(this)">
                        <a class="rounded-full text-white  flex justify-center items-center p-1" >
                            <div class="w-max capitalize hidden group-hover/wish:inline px-1">wishlist</div>
                            <i class="inline group-hover/wish:scale-150 group-hover/wish:text-[#0096FF] transition-all ease-in duration-500  fa fa-heart p-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        @isset($pos)
        <div class="w-full p-4 flex justify-end space-x-2">
            @if($pos <= 0)
            <div class="ires-secondary-btn" hx-get="{{ route('filter') }}"
                                                hx-vals='{"direction": "-1" }'
                                                hx-trigger="click"
                                                hx-target="#explorer1"
                                                hx-swap="innerHTML">
                                                Previous </div>
            @endif
            @if($pos >= 0)
            <div class="ires-primary-btn" hx-get="{{ route('filter') }}"
                                                hx-vals='{"direction": "+1" }'
                                                hx-trigger="click"
                                                hx-target="#explorer1"
                                                hx-swap="innerHTML">
                                                show More</div>
            @endif

        </div>
        @endif
</div>
