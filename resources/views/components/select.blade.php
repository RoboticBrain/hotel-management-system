@props([
    'name',           // name attribute of the select
    'options' => [],  // array of options
    'selected' => null // selected value (for edit)
])


    <select name="{{ $name }}" class="form-control" style="height:50px;">
        @foreach($options as  $option)
            <option value="{{ $option }}" {{ $selected == $option ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>

