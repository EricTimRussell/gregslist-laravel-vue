<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        // load related images to listing
        $listing->load(['images']);

        return inertia(
            'Listing/ListingImage/Create',
            ['listing' => $listing]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        if ($request->hasFile('images')) {
            // validate each image add custom message if there is an error
            $request->validate([
                'images.*' => 'mimes:png,jpg,jpeg|max:5000'
            ], [
                'images.*.mimes' => 'Files should be in png, jpg, or jpeg format'
            ]);

            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }
        return redirect()->back()->with('success', 'Images Uploaded');
    }

    public function destroy($listing, ListingImage $image)
    {
        // access image from public/local disk
        Storage::disk('public')->delete($image->filename);
        // delete image from db
        $image->delete();

        return redirect()->back()->with('success', 'Image was Deleted');
    }
}
