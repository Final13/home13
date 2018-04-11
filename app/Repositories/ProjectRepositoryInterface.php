<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProjectRepositoryInterface
{
    public function all();
    public function paginate();
    public function getProjectsByUserId();
    public function getProjectsById(Request $request);
    public function getProjectsByInputId(Request $request);
    public function saveProject(Request $request);
    public function updateProject(Request $request);
}