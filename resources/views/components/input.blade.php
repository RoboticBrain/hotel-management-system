@props(['value' => null])
<input {{ $attributes->merge(['class' => 'form-control']) }} style="height:50px;" value={{$value }}>
