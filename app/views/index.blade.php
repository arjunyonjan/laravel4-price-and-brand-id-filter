<form action="{{URL::current()}}">

	<label for="">Price</label>

	<br>
	min: <input type="text" name="min_price" value="{{Input::get('min_price')}}">

	<br>
	max: <input type="text" name="max_price" value="{{Input::get('max_price')}}">

	<?php $brands = Input::has('brands') ? Input::get('brands'): [] ?>

	<br>
	<input type="checkbox" name="brands[]" value="1" {{in_array(1, $brands ) ? 'checked' :'' }}>
	Brand one
	<input type="checkbox" name="brands[]" value="5" {{in_array(5, $brands ) ? 'checked' :'' }}>
	Brand Five

	<br>

	<button>Go</button>

</form>

<hr>

@foreach($products as $product)

	<ul>
		<li>{{$product->title}} - {{$product->price}} - brand = {{$product->brand_id}}</li>
	</ul>

@endforeach