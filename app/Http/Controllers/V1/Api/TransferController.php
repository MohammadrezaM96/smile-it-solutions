<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Transfer\StoreTransferRequest;
use App\Http\Resources\V1\Api\Transfer\TransferResource;
use App\Models\Transfer;
use App\Repositories\Interfaces\TransferRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TransferController extends Controller
{
    private $repository;

    public function __construct(TransferRepositoryInterface $transferRepositoryInterface)
    {
        $this->repository = $transferRepositoryInterface;
    }

        /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return TransferResource::collection($this->repository->getAll($request));
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
