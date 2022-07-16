<?php

namespace Tests\Feature;

use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BankAccountTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new BankAccount();
    }

    /** @test  */
    public function transfers_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('bank_accounts', [
                'id', 'user_id', 'amount'
            ]),
            1
        );
    }


    public function testBankAccountRelationshipWithUser()
    {
        $count = rand(1, 10);

        $account = BankAccount::factory()
            ->for(User::factory())
            ->create();

        $this->assertTrue(isset($account->user->id));
        $this->assertTrue($account->user instanceof User);
    }
}
