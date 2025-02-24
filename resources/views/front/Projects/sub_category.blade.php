
<div class="w-full gap-2 items-center " >
                        
    @foreach (App\Category::course()->with('subcategories')->whereNotIn('id', [10])->latest()->get() as $category)
    <div class="p-5">
        <div class="text-md font-bold text-[#a11e22] flex flex-nowrap items-center my-2">
            <div class="min-w-max">
                <a href="{{ route('course.category.subcategory.index', $category) }}">
                    {{ $category->name }}
                </a>
            </div>
            <div class="ml-6 pt-[2px] bg-[#1EA19D] w-full"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-2">
        @foreach ($category->subcategories as $subcategory)
        <div class="border box-content rounded-lg shadow-xl hover:shadow-[#a11e22] aspect-square overflow-hidden relative group">
            <div class="absolute bottom-0 h-1/2 w-full bg-[#1EA19D] bg-opacity-80 hover:bg-opacity-100 text-white hover:text-[#a11e22] flex items-center treansition duration-700">
                <a class="hover:underline font-bold" href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                    <h5 class="p-3">{{ $subcategory->name }}</h5>
                </a>
            </div>
            <img loading="lazy" src="{{ asset('storage/'.$subcategory->cover) }}" alt="{{ $subcategory->name }}" title="{{ $subcategory->name }}" class="w-full h-full object-cover">
        </div>
        @endforeach
        </div>
    </div>
    @endforeach

</div>