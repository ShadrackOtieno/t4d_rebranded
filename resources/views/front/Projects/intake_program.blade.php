
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-2 lg:gap-6">
    @foreach(App\Program\Program::all() as $program)
    <div class="border box-content rounded-lg shadow-xl hover:shadow-[#a11e22] aspect-square overflow-hidden md:hover:scale-110 transition duration-500 relative">
        <div class="flex items-center">
            <img loading="lazy" src="{{ asset('images/Program_'.$program->id.'.webp') }}" alt="{{ $program->name }}" title="{{ $program->name }}" class="w-full h-full object-cover">
        </div>
        <div class="absolute top-0 z-60 w-full p-2">
            <div class="flex justify-end">
                <div class="bg-[#1EA19D] rounded-full cursor-pointer wishlist-button hover:bg[#1EA19D] group/wish group-hover:scale-110" data-toggle="modal" title="Add to Wishlist" data-target="#wishlist" data-course-id="{{ $program->id }}" data-course-name="{{ $program->name }}" onclick="wishListModal(this)">
                    <div class="rounded-full text-white  flex justify-center items-center p-1" >
                        <div class="w-max capitalize hidden group-hover/wish:inline px-1">wishlist</div>
                        <i class="inline group-hover/wish:scale-150 group-hover/wish:text-[#a11e22] transition-all ease-in duration-500  fa fa-heart p-1" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 h-1/3 w-full text-sm font-bold p-1 bg-white hover:underline capitalize">
            <a href="{{ route('programs.program', $program->slug) }}">{{ $program->name }}</a>
        </div>
    </div>
    @endforeach
</div>