
<option value="">-- sub category --</option>
@foreach(App\Subcategory::orderBy('name')->where('category_id', $request->category)->get() AS $subcategory)
    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
@endforeach