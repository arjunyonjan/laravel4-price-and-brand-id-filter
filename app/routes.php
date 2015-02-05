<?php

Route::get('/', function()
{
	$products = Product::where(function($query){

		$min_price = Input::has('min_price') ?  Input::get('min_price') : null;
		$max_price = Input::has('max_price') ? Input::get('max_price') : $max_price = null;
		$brands = Input::has('brands') ? Input::get('brands') : null;

		if(isset($min_price) && isset($max_price)){

			if(isset($brands)){
				foreach ($brands as $brand) {
					$query-> orWhere('price','>=',$min_price);
					$query-> where('price','<=',$max_price);
					$query->where('brand_id','=', $brand);
				}
			}

			$query-> where('price','>=',$min_price);
			$query-> where('price','<=',$max_price);
		}

	})->get();
	return View::make('index', compact(['products']));
});


DB::listen( function($sql){
	var_dump($sql);
});