<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{

    public function index(Request $request)
    {
        // retrieve listings created by the user
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia(
            'Account/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()
                    ->listings()
                    ->filter($filters)
                    // withCount adds total number of images as a property to the listing object
                    ->withCount('images')
                    ->withCount('offers')
                    ->paginate(5)
                    ->withQueryString()
            ]
        );
    }

    public function show(Listing $listing)
    {
        return inertia(
            'Account/Show',
            [
                'listing' => $listing->load('offers')
            ]
        );
    }

    // Register a user
    public function create()
    {
        return inertia('UserAccount/Create');
    }
    // Save and validate the registered user to the db
    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]));
        Auth::login($user);
        // TODO Change to home page rather than listing page
        return redirect()->route('listing.index')
            ->with('success', 'Account Created');
    }
}
