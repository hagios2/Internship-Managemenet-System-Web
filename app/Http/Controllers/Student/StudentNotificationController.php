<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentNotification;
use App\Http\Resources\StudentNotificationResource;

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
