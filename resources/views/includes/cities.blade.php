<option value="">{{ $langg->lang158 }}</option>
@foreach (DB::table('cities')->get() as $data)
    <option value="{{ $data->name }}" data-id="{{ $data->id }}">{{ $data->name }}</option>
@endforeach
