<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

    // for policy default settings
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index','show']);
    // } -> another way of applying middleware

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        
        return inertia(
            'Listing/Index',
            [

                'filters' => $filters,
                'listings' => Listing::mostRecent()
                   ->filter($filters)
                    ->paginate(10) //returns a object
                    ->withQueryString() //carries url filters to next pages
            ]
        );
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {

        //    if(Auth::user()->cannot('view',$listing)){
        //     abort(403);
        //    }
        // more consise way of above statement
        // $this->authorize('view',$listing);

        $listing->load(['images']);
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

  
}
