<?php

namespace App\Repositories;


interface ProjectRepositoryInterface
{
    public function all();
    public function paginate();
    public function getProjectsByUserId();
    public function getProjectsById($id);
    public function getProjectsByInputId($id);
    public function saveProject($inputs);
    public function updateProject($inputs);
}