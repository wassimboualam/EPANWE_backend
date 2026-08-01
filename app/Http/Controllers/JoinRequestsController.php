<?php

namespace App\Http\Controllers;

use App\Mail\AcceptedMail;
use App\Models\JoinRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class JoinRequestsController extends Controller
{

    public function index(Request $request) {
        $requests =  JoinRequest::with(["user"])->get();
        return $requests;
    }

    public function store(Request $request) {
        // Validate input
        $validator = Validator::make($request->all(), [
            "userId" => "required|integer"
        ]);
        if ($validator->fails()) {
            return response(
                content: [
                    "type" => "error",
                    // "message" => $validator->errors()->messages()["userId"][0],
                    "message" => "I don't know how you did it but you managed to mess this site up. Well done, hacker.",
                ],
                status: 400,
            );
        }

        // Verify if the user doesn't already have a request
        $user = User::find($request->userId);

        if ($user->request !== NULL) {
            return response([
                "message" => "It seems this user has already made a request to join the back-office",
                "type" => "error",
                ],
                400
            );
        }

        // Create request
        JoinRequest::create([
            "user_id" => $user["id"],
            "status" => "pending",
        ]);
        

        return [
            // "message" => 'Congratulations, your request has been accepted. Please check out your e-mail to access the link to the service.',
            "message" => 'Your application has been received and is currently under review by our team.',
            "type" => "success"
        ];
    }

    public function show($id) {
        try {
            $request = User::find($id)->request;

            if($request === NULL) {
                return [
                    "status" => "not done yet",
                    "message" => "This user has yet to do a request"
                ];
            }
            switch ($request["status"]) {
                case 'pending':
                    $request["message"] = "Your application has been received and is currently under review by our team.";
                    break;

                case 'approved':
                    $request["message"] = "Congratulations, your application has been approved by our team. Please head to you e-mail to access our EPANWE platform.";
                    break;

                case 'rejected':
                    $request["message"] = "Womp womp. Better luck next time";
                    break;

                case "not done yet":
                default:
                    return "";
                    break;
            }
        } catch (\Throwable $th) {
            $request["code"] = $th->getCode();
            $request["message"] = $th->getMessage();
        }

        return $request;
    }

    public function setApproval(Request $request) {
        $r = JoinRequest::where("user_id", $request["user_id"])->first();

        // If request is already decided
        if ($r["status"] != "pending") {
            return [
                "type" => "error",
                "message" => "This request has already been decided."
            ];
        }


        switch ($request["type"]) {
            case 'approved':
                $r->status = $request["type"];
                Mail::to($r->user->email)->send(new AcceptedMail());
                $message = [
                    "type" => "info",
                    "message" => "Request successfully approved.",
                ];
                break;
            
            case 'rejected':
                $r->status = $request["type"];
                $message = [
                    "type" => "info",
                    "message" => "Request successfully rejected.",
                ];
                break;

            default:
                $message = [
                    "type" => "error",
                    "message" => "I don't even know how but you managed to breach all the way to here.",
                ];
                break;
        }
        
        $r->save();

        return $message;
    }
}
