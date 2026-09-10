@props([
"rounded"=>'md',
"shadow"=>'none',
"border"=>'default',
"resize"=>'vertical',
"size"=>'md',
"rows"=>'1',
"type"=>'',
"placeholder"=>'',
"value"=>''
]);
<input {{ $attributes->merge(['class' => 'form-control', 'rows' => $rows, 'type' => $type, 'placeholder' => $placeholder, 'value' => $value]) }}>{{ $slot }}</input>
    