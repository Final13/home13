<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function all();
    public function paginate();
    public function getSearchedUsers($search);
    public function getUsersByName();
    public function findUserById($id);
    public function createUser($inputs);
    public function updateUser($inputs);
    public function saveUser($inputs);
}