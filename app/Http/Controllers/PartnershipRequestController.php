<?php

namespace App\Http\Controllers;

use App\Models\PartnershipRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnershipRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = PartnershipRequest::get();
        return $requests;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = json_decode($request->all()[0], true);

        $validator = Validator::make($data, [
            // --- Company -------------------------------------------------
            'company_name' => ['required', 'string', 'max:255'],
            'ice' => ['required', 'string', 'max:20', 'unique:partnership_requests,ice'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'legal_form' => ['required', 'string', 'max:50'],
            'activity_field' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:5000'],

            // --- Contact -------------------------------------------------
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_phone_number' => ['required', 'string', 'max:30'],

            // --- Partnership details ------------------------------------
            'age_range' => ['nullable', 'string', 'max:20'],
            'number_of_users' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'type' => 'error',
                'title' => 'Invalid form',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $partnerRequest = PartnershipRequest::create($validator->validated());

        return response()->json([
            "type" => "success",
            "title" => "Request received",
            "message" => 'Your request has been received and is currently under review by our team.',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = PartnershipRequest::find($id);

        if ($request === null) {
            return [
                "type" => "error",
                "title" => "Partnership request doesn't exist",
                "message" => "Partnership reqeuest #$id doesn't seem to be available in the database.",
            ];
        }

        $request->delete();

        return [
            "type" => "success",
            "title" => "Deleted successfully",
            "message" => "Partnership reqeuest #$id has been deleted successfully.",
        ];

    }
}
