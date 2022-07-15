<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Transfer\StoreTransferRequest;
use App\Http\Resources\V1\Api\Transfer\TransferResource;
use App\Repositories\Interfaces\TransferRepositoryInterface;

class TransferController extends Controller
{
    private $repository;

    public function __construct(TransferRepositoryInterface $transferRepositoryInterface)
    {
        $this->repository = $transferRepositoryInterface;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTransferRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransferRequest $request)
    {
        $transfer = $this->repository->create($request->validated());
        return new TransferResource($transfer);
    }
}
