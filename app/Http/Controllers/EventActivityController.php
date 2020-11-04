<?php

namespace App\Http\Controllers;

use App\event_activities;
use Illuminate\Http\Request;

class EventActivityController extends Controller
{

    public function getAllEventData() {
        // logic to get all events goes here
        $eventslog = event_activities::get()->toJson(JSON_PRETTY_PRINT);
        return response($eventslog, 200);

    }

    public function getEventByEmail($email) {
        // logic to get a user event record goes here
    }
}
