<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        return inertia(
            'Listing/ListingImage/Create',
            ['listing' => $listing]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        dd('Works');
    }
}
