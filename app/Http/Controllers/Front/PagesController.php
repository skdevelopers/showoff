<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OperatingHours;
use App\Models\VendorModel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // ALL PAGES CONTROLLER

    public function index()
    {
        return view('front.pages.index');
    }
    public function about()
    {
        return view('front.pages.about');
    }
        public function packages()
    {
        return view('front.pages.packages');
    }
    public function shopListings(Request $request)
    {
        $query = VendorModel::query();

        // Apply role and deleted condition
        $query->where('role', '4')->where('deleted', '0');

        // Filter by category if selected
        if ($request->has('category')) {
            $categories = (array) $request->category; // Handle multiple categories if sent as array
            $query->whereIn('business_type', $categories);
        }

        // Apply sorting based on 'sort_by' parameter
        if ($request->has('sort_by')) {
            $sortBy = $request->sort_by;

            switch ($sortBy) {
                case '1':
                    $query->orderBy('id', 'desc'); // Latest
                    break;
                case '2':
                    // Assuming 'distance' is a calculated field based on the user's location
                    $query->orderBy('distance', 'asc'); // Nearby
                    break;
                case '3':
                    $query->orderBy('rating', 'desc'); // Top rated
                    break;
                case '4':
                    $query->inRandomOrder(); // Random
                    break;
                case '5':
                    $query->orderBy('name', 'asc'); // A-Z based on name
                    break;
                default:
                    $query->orderBy('id', 'desc'); // Default to latest
                    break;
            }
        } else {
            $query->orderBy('id', 'desc'); // Default sorting
        }

        // Eager load the services relationship
        $query->with('services'); // 'services' is the name of the relationship in VendorModel

        // Get filtered outlets
        $outlets = $query->get();

        // Retrieve categories from the database or any other source
        $categories = VendorModel::distinct('business_type')->pluck('business_type')->all();

        // Pass $outlets and $categories to the view
        return view('front.pages.shop-listings', compact('outlets', 'categories'));
    }

    public function listingDetails(Request $request, $id)
    {
        // Fetch the specific vendor listing by ID along with its services
        $listing = VendorModel::with('services')->findOrFail($id);

        
        // Retrieve operating hours for the vendor
        $operatingHours = [];
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day) {
            $operatingHour = OperatingHours::where('vendor_id', $listing->id)
                ->where('day_of_week', ucfirst($day))
                ->first();

            // Append operating hour data to the array
            if ($operatingHour) {
                $operatingHours[$day] = [
                    'open_time' => $operatingHour->open_time,
                    'close_time' => $operatingHour->close_time,
                ];
            } else {
                $operatingHours[$day] = [
                    'open_time' => '',
                    'close_time' => '',
                ];
            }
        }

        // Pass the necessary data to the view
        return view('front.pages.listing-details', compact('listing', 'galleryImages', 'operatingHours'));
    }
}
