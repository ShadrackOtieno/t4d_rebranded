<!-- course filter -->
<div class="hero-search">
    <div class="container hs-form">
        <div>
            <!-- <h2 class="text-center">Transforming people and organizations in Africa since 2003</h2> -->
            <p style="text-align: center;">Time to upskill! Search for the training course that's right for you or your organisation.</p>
        </div>
        <form action="{{ route('course.search') }}" method="get" class="form-row">
            <div class="form-group col-md-2">
                <select class="form-control" name="subcategory">
                    <option value="">Select Subcategory</option>
                    @foreach (App\Subcategory::whereHas('category', function ($query) {

                        $query->where('type', 'course');

                    })->get() as $subcategory)
                        <option value="{{ $subcategory->id }}"
                         @if ( request()->query('subcategory') == $subcategory->id )
                              selected
                         @endif>
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <select class="form-control" id="location" name="location">
                    <option value="">- Choose Location -</option>
                    @foreach (App\City::with('venue')->get() as $city)

                         <option value="{{ $city->name }}"
                         @if ( request()->query('location') == $city->name )
                              selected 
                         @endif>

                              {{ "$city->name, {$city->venue->country}" }}

                         </option>

                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <select class="form-control" name="month">
                    <option value="">- Select Month -</option>
                    @for ($month = 1; $month <= 12; $month++)
                        <option value="{{ $month }}"
                         @if ( request()->query('month') == $month )
                              selected
                         @endif>
                            {{ date('F', mktime(0, 0, 0, $month)) }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="name" placeholder="Enter course name" value="{{ request()->query('name') }}">
            </div>
            <div class="form-group col-md-1">
                <div class="ires-hs-btn">
                    <button class="btn btn-success" type="submit">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END course filter -->