<?php

namespace App\Repositories\Eloquent;

use App\Models\BankAccount;
use App\Models\Transfer;
use App\Repositories\Interfaces\TransferRepositoryInterface;
use Exception;

class TransferRepository implements TransferRepositoryInterface
{

    public function find($id)
    {
        return Transfer::find($id);
    }

    public function getAll($data)
    {
        return Transfer::OfBankAccountId($data->bankAccountId)->paginate();
    }

    public function create($data)
    {
        try {
            $bankAccountRepository = new BankAccountRepository();
            $origin = $bankAccountRepository->find($data['origin_id']);
            $destination = $bankAccountRepository->find($data['destination_id']);

            $originAmount = $origin->amount - $data['amount'];
            $destinationAmount = $destination->amount + $data['amount'];

            throw_if($originAmount < 0, false);

            $bankAccountRepository->update($data['origin_id'], ['amount' => $originAmount]);
            $bankAccountRepository->update($data['destination_id'], ['amount' => $destinationAmount]);

            return Transfer::create($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
