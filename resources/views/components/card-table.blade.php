@props([
    'title' => '',
    'columns' => [],
    'slot' => '[]'
   
])
<table class="table table-hover caption-top  table-bordered border-primary" style="width: 100%; margin: 15px  auto; border:1px solid primary ;background:#f8f9fa; padding: 20px 30px; border-radius: 10px;">
    <caption-top class="text-center h-2 text-secondary ">{{ $title }}</caption-top>
  <thead>
    <tr>
        @foreach($columns as $column)
            <th scope="col">{{ $column }}</th>
        @endforeach
    </tr>
  </thead>
  <tbody>       
    {{ $slot }} 
  </tbody>          

</table>