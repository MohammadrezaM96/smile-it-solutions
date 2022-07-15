<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\BankAccount\StoreBankAccountRequest;
use App\Repositories\Interfaces\BankAccountRepositoryInterface;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreBankAccountRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankAccountRequest $request)
    {
        return $this->repository->create($request->validated());
    }
}
