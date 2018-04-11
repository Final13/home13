<?php

namespace App\Repositories;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

interface EventsRepositoryInterface
{
    public function all();
    public function paginate();
    public function findProjectById(Request $request);
    public function findProjectByInputId(EventRequest $request);
    public function getFutureEvents();
    public function getFutureEventsByUserId();
    public function getEventsForAdmin();
    public function getEventsForUser();
    public function saveEvent(EventRequest $request);
    public function updateEvent(EventRequest $request);
}