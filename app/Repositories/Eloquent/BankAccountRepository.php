<?php

namespace App\Repositories\Eloquent;

use App\Models\BankAccount;
use App\Repositories\Interfaces\BankAccountRepositoryInterface;

class BankAccountRepository implements BankAccountRepositoryInterface
{

    public function find($id)
    {
        return BankAccount::find($id);
    }

    public function getAll()
    {
        return BankAccount::all();
    }

    public function create($data)
    {
        return BankAccount::create($data);
    }
}
