<?php 


	function users()
	{
		$users = App\User::all();

		return $users;
	}
	function product($id)
	{
		$product = App\Product::where('id', $id)->first();

		return $product;
	}

	function categories()
	{
		 $categories = App\Categories::all();

		 return $categories;
	}

	function Latest($id = null)
		{
			$post = App\Product::orderBy('id', 'desc')->take(5)->get()->except($id);
			return $post;
		}

	function LoggedUser()
	{
		$user = \Auth::user();
		return $user;
	}
	
	function settings()
	{
		$setting = App\Setting::first();
		return $setting;
	}


	function contacts()
	{
		return $contacts = App\Contact::where('read_unread', 1)->take(5)->get();

	}

	function scopeMightAlsoLike()
    {
    	$product = App\Product::inRandomOrder()->take(4);

        return $product;
    }
