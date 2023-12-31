<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    //single action controller
    public function __invoke(Offer $offer)
    {
        $listing =$offer->listing;
        $this->authorize('update',$listing);
        //accept selected offer 
        $offer->update(['accepted_at' => now()]);

        $listing->sold_at = now();
        $listing->save();

        //reject all other offers

        $listing->offers()->except($offer)->update(['rejected_at' => now()]);

        return redirect()->back()->with('Success',"Offer #{$offer->id} accepted, other offers rejected");
        
    }
}
