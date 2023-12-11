<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Get all listings.
    public function index() {
        // dd($request);        // need parameter Request $request
        // Can also use the request() helper function.
        // dd(request()->tag);
        // dd(request('tag'));

        return view('listings/index', [                          // Can also use "listings.index", see next method in class.
            "listings" => Listing::latest()->filter(request(['tag', 'search']))->get()              // Sorted, filter using scopeFilter in Listing Model.
        ]);
    }

    // Show a single listing.
    public function show(Listing $listing) {
        return view("listings.show", [
            "listing" => $listing
        ]);
    }

    // Show create form.
    public function create() {
        return view("listings.create");
    }

    // Store a listing.
    public function store(Request $request) {                   // Can also use dependency injection like this.
        // dd($request->all());
        
        // Validation.      (See documentation for available rules).
        $formFields = $request->validate([
            "title" => "required",
            "companyName" => ["required", Rule::unique('listings', 'companyName')],     // Can also use class Rule::rule(<table_name>, <field_name>).
            "location" => "required",
            "website" => "required",
            "email" => ["required", "email"],        // Formatted as email. 
            "tags" => "required",
            "description" => "required"
        ]);

        // An error is sent back to the view if validation fails.
        
        // Create entry in DB.
        Listing::create($formFields);

        // Flash messages (stored in memory (session) for one reload/page load)

        // Message is fired, view needs to display it.
        return redirect("/")->with("message", "Listing created successfully!");
    }
}
