<?php

namespace App\Repositories;


interface EventsRepositoryInterface
{
    public function all();
    public function paginate();
}