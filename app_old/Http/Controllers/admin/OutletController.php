<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\CountryModel;
use App\Models\OperatingHours;
use App\Models\Service;
use App\Models\States;
use App\Models\VendorDetailsModel;
use App\Models\VendorModel;
use App\Models\Categories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

use Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (!check_permission('vendor', 'View')) {
            abort(404);
        }
        $page_heading = "Provider";
        $datamain = VendorModel::select('*', 'users.name as name', 'users.active as active', 'users.id as id', 'users.updated_at as updated_at')
            ->where(['role' => '4', 'users.deleted' => '0'])
            //->with('vendordata')
            ->orderBy('users.id', 'desc')->get();

        return view('admin.outlet.list', compact('page_heading', 'datamain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if (!check_permission('vendor', 'Create')) {
            abort(404);
        }
        $page_heading = "Provider";
        $mode = "create";
        $id = "";
        $prefix = "";
        $name = "";
        $dial_code = "";
        $image = "";
        $active = "1";
        $states = [];
        $cities = [];
        $countries = CountryModel::orderBy('name', 'asc')->where(['deleted' => 0])->get();
        
        $states = States::where(['deleted' => 0, 'active' => 1])->orderBy('name', 'asc')->get();
        $categories = Categories::where(['deleted' => 0])->orderBy('sort_order', 'asc')->get();
        // Assuming you're passing the vendor ID through the request or session
        $vendorId = $request->input('vendor_id'); // Adjust this based on your actual logic
        // Initialize $operatingHours array with empty entries for each day of the week
        $operatingHours = [
            'Monday' => ['open_time' => null, 'close_time' => null],
            'Tuesday' => ['open_time' => null, 'close_time' => null],
            'Wednesday' => ['open_time' => null, 'close_time' => null],
            'Thursday' => ['open_time' => null, 'close_time' => null],
            'Friday' => ['open_time' => null, 'close_time' => null],
            'Saturday' => ['open_time' => null, 'close_time' => null],
            'Sunday' => ['open_time' => null, 'close_time' => null],
        ];
        // Load operating hours data for the specified vendor
        $operatingHoursData = OperatingHours::where('vendor_id', $vendorId)->get()->toArray();

        // Merge operating hours data into the initialized array
        foreach ($operatingHoursData as $data) {
            $dayOfWeek = $data['day_of_week']; // Assuming 'day_of_week' is the column name in the OperatingHours model
            if (array_key_exists($dayOfWeek, $operatingHours)) {
                $operatingHours[$dayOfWeek]['open_time'] = $data['open_time'];
                $operatingHours[$dayOfWeek]['close_time'] = $data['close_time'];
            }
        }
        return view("admin.outlet.create", compact('page_heading', 'id', 'name', 'dial_code', 'active', 'prefix', 'countries', 'categories', 'cities','states', 'operatingHours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $status = "0";
        $message = "";
        $errors = [];
        $redirectUrl = '';

        // Define validation rules and messages
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'business_type' => 'required|in:saloon,car wash',
            'password' => $request->id ? '' : 'required', // Only require password for new vendor
            'confirm_password' => $request->id ? '' : 'required|same:password', // Only require confirmation for new vendor
            'gallery_images.*' => 'image|mimes:jpg,png,gif,jpeg|max:5120', // Validate each image in the array
        ];

        $messages = [
            'name.required' => 'Name is required',
            'phone.required' => 'Phone number is required',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'business_type.required' => 'Business type is required',
            'business_type.in' => 'Invalid business type',
            'password.required' => 'Password is required',
            'confirm_password.required' => 'Confirm password is required',
            'confirm_password.same' => 'Passwords do not match',
            'gallery_images.*.image' => 'The file must be an image',
            'gallery_images.*.mimes' => 'Only JPG, PNG, GIF, and JPEG formats are supported',
            'gallery_images.*.max' => 'Maximum file size should be 5MB',
        ];


        // Create validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => $status,
                'message' => 'Validation error occurred',
                'errors' => $validator->messages(),
            ]);
        }

        // Validations passed, proceed with data insertion
        $input = $request->all();
        $email = strtolower($request->email);

        // Check for unique email
        $existingEmail = VendorModel::where('email', $email)->where('id', '!=', $request->id)->first();
        if ($existingEmail) {
            return response()->json([
                'status' => $status,
                'message' => 'Email should be unique',
                'errors' => ['email' => 'Email already exists'],
            ]);
        }

        // Check for unique phone number
        $existingPhone = VendorModel::where('phone', $request->phone)->where('id', '!=', $request->id)->first();
        if ($existingPhone) {
            return response()->json([
                'status' => $status,
                'message' => 'Phone number should be unique',
                'errors' => ['phone' => 'Phone number already exists'],
            ]);
        }

        // Prepare vendor data
        $vendorData = [
            'name' => $input['name'],
            'email' => $email,
            'dial_code' => $input['dial_code'],
            'phone' => $input['phone'],
            'role' => '4', // Provider
            'first_name' => $input['first_name'] ?? '', // Ensure to handle if first_name is missing
            'last_name' => $input['last_name'] ?? '', // Ensure to handle if last_name is missing
            'user_name' => $input['name'],
            'business_name' =>  $input['business_name'],
            'business_type' => $input['business_type'],
            'phone_verified' => '1',
            'location' => $input['txt_location'] ?? '',
            'about_me' => $input['about_me'] ?? '',
            'website' => $input['website'] ?? '',
            'state_id' => (int)$input['state_id'],
            'city_id' => (int)$input['city_id'],
            'country_id' => $input['country_id'],
            'active' => 1, // Active by default
        ];

        // Set latitude and longitude from location coordinates
        if (isset($input['location'])) {
            $location = explode(",", $input['location']);
            $vendorData['latitude'] = $location[0] ?? '';
            $vendorData['longitude'] = $location[1] ?? '';
        }

        // Hash and store password if provided
        if (!empty($input['password'])) {
            $vendorData['password'] = bcrypt($input['password']);
        }

        // Handle image uploads (logo and trade license)
        foreach (['user_image', 'trade_license'] as $fileField) {
            if ($file = $request->file($fileField)) {
                $filePath = config('global.user_image_upload_dir') . '/' . time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->storeAs(config('global.user_image_upload_dir'), $filePath, config('global.upload_bucket'));
                $vendorData[$fileField] = $filePath;
            }
        }

        // Handle gallery images uploads
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImagePath = $this->uploadImage($galleryImage);
                $galleryImages[] = $galleryImagePath;
            }
            $vendorData['gallery_images'] = $galleryImages;
        }

        // Create or update vendor
        if ($request->id) {
            // Update existing vendor
            $vendor = VendorModel::findOrFail($request->id);
            $vendor->update($vendorData);
            $message = "Provider details updated successfully";
        } else {
            // Create new vendor
            $vendor = VendorModel::create($vendorData);
            $message = "Provider details added successfully";
        }

        // Save operating hours for each day
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day) {
            $operatingHoursData = [
                'vendor_id' => $vendor->id,
                'day_of_week' => ucfirst($day),
                'open_time' => $input[$day . '_open'] ?? '',
                'close_time' => $input[$day . '_close'] ?? '',
            ];

            OperatingHours::updateOrCreate(
                ['vendor_id' => $vendor->id, 'day_of_week' => ucfirst($day)],
                $operatingHoursData
            );
        }

        $status = "1";
        $redirectUrl = ''; // Set your desired redirect URL upon successful save

        // Return JSON response
        return response()->json([
            'status' => $status,
            'message' => $message,
            'redirect_url' => $redirectUrl,
        ]);
    }

    /**
     * Show the form to add a new service for the specified vendor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $vendor_id
     * @return \Illuminate\View\View
     */
    public function showServices($vendor_id)
    {
        // Fetch services related to the vendor_id
        $page_heading = "Services";
        $datamain = Service::where('vendor_id', $vendor_id)->get();
        // Pass the services data to the Blade template
        return view('admin.outlet.services', compact('datamain','page_heading', 'vendor_id'));
    }
    /**
     * Show the form to add a new service for the specified vendor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $vendor_id
     * @return \Illuminate\View\View
     */
    public function showServiceForm(Request $request, int $vendor_id, $service_id = null)
    {
        $vendor = VendorModel::findOrFail($vendor_id);
        $service = null;

        if ($service_id) {
            // Retrieve service data for editing
            $service = Service::findOrFail($service_id);
        }

        return view('admin.outlet.add_service', compact('vendor', 'service'));
    }
    /**
     * Store a new service for the specified outlet.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    // Store a new service for the specified outlet
    public function storeOrUpdateService(Request $request, $vendor_id, $service_id = null)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'vendor_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg|max:5120', // Validate the uploaded image
        ]);

        // Handle file upload and store the image path
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('services', 'public');
            $validatedData['image'] = $filePath; // Assign to 'image' column in the database
        }

        // Create or update the service
        if ($service_id) {
            // Update existing service
            $service = Service::findOrFail($service_id);
            $service->update($validatedData);
            $message = "Service updated successfully";
        } else {
            // Create new service
            $service = Service::create($validatedData);
            $message = "Service added successfully";
        }

        // Redirect back with success message
        return redirect()->back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        if (!check_permission('vendor', 'Edit')) {
            abort(404);
        }

        $page_heading = "Edit Provider";
        $datamain = VendorModel::find($id);
        if (!$datamain) {
            abort(404);
        }

        $countries = CountryModel::orderBy('name', 'asc')->where(['deleted' => 0])->get();
        $states = States::where(['deleted' => 0, 'active' => 1, 'country_id' => $datamain->country_id])->orderBy('name', 'asc')->get();
        $cities = Cities::where(['deleted' => 0, 'active' => 1, 'state_id' => $datamain->state_id])->orderBy('name', 'asc')->get();
        $categories = Categories::where(['deleted' => 0])->orderBy('sort_order', 'asc')->get();
        $user_image = asset($datamain->user_image);

        // Fetch existing operating hours for the vendor
        $operatingHours = [];
        foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day) {
            $dayOfWeek = ucfirst(strtolower($day));
            $operatingHour = OperatingHours::where('vendor_id', $id)
                ->where('day_of_week', $dayOfWeek)
                ->first();

            $operatingHours[$dayOfWeek] = $operatingHour ?? null;
        }

        return view("admin.outlet.create", compact(
            'page_heading',
            'datamain',
            'id',
            'countries',
            'user_image',
            'categories',
            'states',
            'cities',
            'operatingHours' // Pass the operating hours data to the view
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function change_status(Request $request)
    {
        $status = "0";
        $message = "";
        if (VendorModel::where('id', $request->id)->update(['active' => $request->status,'verified'=>1,'verified_date'=>gmdate('Y-m-d H:i:s')])) {
            $status = "1";
            $msg = "Successfully activated";
            if (!$request->status) {
                $msg = "Successfully deactivated";
            }
            $message = $msg;
        } else {
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    public function verify(Request $request)
    {
        $status = "0";
        $message = "";
        if (VendorModel::where('id', $request->id)->update(['verified' => $request->status])) {
            $status = "1";
            $msg = "Successfully verified";
            if (!$request->status) {
                $msg = "Successfully updated";
            }
            $message = $msg;
        } else {
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    public function destroy($id)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $datatb = VendorModel::find($id);
        if ($datatb) {
            $datatb->deleted = 1;
            $datatb->active = 0;
            $datatb->email = $datatb->email."_d_".$datatb->id;
            $datatb->phone = $datatb->phone."00".$datatb->id;
            $datatb->save();
            $status = "1";
            $message = "Provider removed successfully";
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }

    /**
     * Upload image and return file path.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string|null
     */
    private function uploadImage($file)
    {
        if (!$file) {
            return null;
        }

        $filePath = config('global.user_image_upload_dir') . '/' . time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs(config('global.user_image_upload_dir'), $filePath, config('global.upload_bucket'));
        return $filePath;
    }
}