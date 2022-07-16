<?php

namespace Tests\Feature;

use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new User();
    }

        /** @test  */
        public function users_database_has_expected_columns()
        {
            $this->assertTrue(
                Schema::hasColumns('users', [
                    'id', 'name'
                ]),
                1
            );
        }

    
    public function testUserRelationshipWithBankAccount()
    {
        $count = rand(1, 10);

        $user = User::factory()
            ->hasBankAccounts($count)
            ->create();

        $this->assertCount($count, $user->bankAccounts);
        $this->assertTrue($user->bankAccounts->first() instanceof BankAccount);
    }
}
