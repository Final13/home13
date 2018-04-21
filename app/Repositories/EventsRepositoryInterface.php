<?php

namespace App\Repositories;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

interface EventsRepositoryInterface
{
    public function all();
    public function paginate();
    public function findProjectById($id);
    public function findProjectByInputId($id);
    public function getFutureEvents();
    public function getFutureEventsByUserId();
    public function getEventsForAdmin();
    public function getEventsForUser();
    public function saveEvent($inputs);
    public function updateEvent($inputs);
}