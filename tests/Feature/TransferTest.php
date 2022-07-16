<?php

namespace Tests\Feature;

use App\Models\BankAccount;
use App\Models\Transfer;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TransferTest extends TestCase
{
    use RefreshDatabase,
        ModelHelperTesting;

    protected function model(): Model
    {
        return new Transfer();
    }

    /** @test  */
    public function transfers_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('transfers', [
                'id', 'origin_id', 'destination_id', 'amount', 'status'
            ]),
            1
        );
    }

    /** @test */
    public function testTransferRelationshipWithOriginAccount()
    {
        $account = BankAccount::factory()->create();

        $transfer = Transfer::factory()->create([
            'origin_id' => $account->id,
        ]);

        $this->assertTrue(isset($transfer->originAccount->id));
        $this->assertTrue($transfer->originAccount instanceof BankAccount);
    }

    /** @test */
    public function testTransferRelationshipWithDestinationAccount()
    {
        $account = BankAccount::factory()->create();

        $transfer = Transfer::factory()->create([
            'destination_id' => $account->id,
        ]);

        $this->assertTrue(isset($transfer->destinationAccount->id));
        $this->assertTrue($transfer->destinationAccount instanceof BankAccount);
    }
}
