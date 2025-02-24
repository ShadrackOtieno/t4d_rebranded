
<option value="">-- topic --</option>
@foreach(App\Topic::orderBy('name')->where('subcategory_id', $request->sub_category)->get() AS $topic)
    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
@endforeach