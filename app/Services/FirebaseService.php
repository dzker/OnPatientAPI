<?php
namespace App\Services;

use Kreait\Firebase;

class FirebaseService
{
    protected $database;

    public function __construct()
    {
        $firebase = (new Firebase\Factory())
            ->withServiceAccount(__DIR__.'/onpatient-104e4-firebase-adminsdk-pzpiw-dbe8da16ab.json')
            
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $this->database = $firebase->createDatabase();
    }

    public function storePatient($data)
    {
        $this->database->getReference('patients')->push($data);
    }
}
