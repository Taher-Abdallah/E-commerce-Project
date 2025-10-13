@foreach ($attribute->attributeValues as $value) 

<div class="badge badge-primary badge-pill" style="margin: 2px;">{{ $value->value }}</div>
    
@endforeach