<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\BankAccount\StoreBankAccountRequest;
use App\Http\Resources\V1\Api\BankAccount\BankAccountResource;
use App\Repositories\Interfaces\BankAccountRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BankAccountController extends Controller
{

    private $repository;
    public function __construct(BankAccountRepositoryInterface $bankAccountRepositoryInterface)
    {
        $this->repository = $bankAccountRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return BankAccountResource::collection($this->repository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreBankAccountRequest $request
     * @return BankAccountResource
     */
    public function store(StoreBankAccountRequest $request): BankAccountResource
    {
        $account = $this->repository->create($request->validated());
        return new BankAccountResource($account);
    }
}
