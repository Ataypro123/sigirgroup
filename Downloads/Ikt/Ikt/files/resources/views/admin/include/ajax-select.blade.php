@if(!empty($chartContents))
    <option value="">Выберите пункт</option>
    @foreach($chartContents as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif
