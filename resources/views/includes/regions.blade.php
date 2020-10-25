<option value="">{{ __('Choose Region') }}</option>
@foreach ($regions as $data)
    <option value="{{ $data->name }}" data-price="{{ $data->price * $kilos }}">{{ $data->name }}</option>
@endforeach
