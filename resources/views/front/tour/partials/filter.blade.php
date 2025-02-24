<div class="clearfix">
    <!-- filter courses -->
    <div class="ires-tb-filter dropdown float-left">
        <a class="btn dropdown-toggle" href="#" role="button" id="country-selector" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter by Category
        </a>

        <div class="dropdown-menu" aria-labelledby="country-selector">
            @foreach (App\Category::tour()->get() as $category)
                <a class="dropdown-item" href="{{ route('tour.index', ['category' => $category->id]) }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="ires-tb-filter dropdown float-left">
        <a class="btn dropdown-toggle" href="#" role="button" id="country-selector" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter by Subcategory
        </a>

        <div class="dropdown-menu" aria-labelledby="country-selector">
            @foreach (App\Subcategory::whereHas('category', function ($query) {

                return $query->where('type', 'tour');

            })->when( request()->category, function($query, $category) {

                $query->where('category_id', $category);

            })->get() as $subcategory)

                <a class="dropdown-item" href="{{ route('tour.index', [

                    'category' => $subcategory->category_id,
                    'subcategory' => $subcategory->id
                    
                ]) }}">
                    {{ $subcategory->name }}
                </a>

            @endforeach
        </div>
    </div>
    <!-- END filter courses -->
</div>