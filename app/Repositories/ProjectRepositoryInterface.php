<?php

namespace App\Repositories;


interface ProjectRepositoryInterface
{
    public function all();
    public function paginate();
    public function projectsWhereUserIdGet();
}