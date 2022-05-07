<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;

class UserService
{
    private $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create($request)
    {
        $payload = $request->validated();
        return $this->repository->create($payload);
    }

    public function update($id, $request)
    {
        $payload = $request->validated();
        return $this->repository->update($id, $payload);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
