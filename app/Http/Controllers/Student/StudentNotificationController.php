<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentNotificationResource;
use App\Models\StudentNotification;

class StudentNotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNotifications()
    {

        return StudentNotificationResource::collection(StudentNotification::read());

    }
}
