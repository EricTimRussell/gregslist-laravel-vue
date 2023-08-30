<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Listing::create(
            // add validation constraints for data validation and handleInertiaRequests middleware will handle any errors that occur
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:250|max:10000',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:9999',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return to_route('listing.index')
            ->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            // add validation constraints for data validation and handleInertiaRequests middleware will handle any errors that occur
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:250|max:10000',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:9999',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return to_route('listing.index')
            ->with('success', 'Listing was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
