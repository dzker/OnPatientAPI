<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Services\FirebaseService;

class PatientController extends Controller
{
    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function store(Request $request)
    {
        
        //LOGIC
        $alertInterval = 10;
        $is_fall= 0;

    
        //MODEL
        $patient_data =  new Patient([
            "patient_id"=>"123456789",
            "name"=>"Siti Kassim",
            "angle"=>$request->angle,
            "on_seat"=>$request->on_seat,
            "is_fall"=>$is_fall,
        ]);
        $this->firebaseService->storePatient($patient_data);
        return response()->json(['message' => 'Patient data stored successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        // Logic to update patient data
    }

     
}
