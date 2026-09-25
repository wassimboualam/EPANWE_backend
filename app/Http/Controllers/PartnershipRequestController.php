<?php

namespace App\Http\Controllers;

use App\Models\PartnershipRequest;
use Illuminate\Http\Request;

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
        //
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
