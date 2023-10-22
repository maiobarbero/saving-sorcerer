<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use App\Models\BankAccount;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();
        Category::factory(5)->create();

        $admin = User::find(1);
        $user = User::find(2);

        BankAccount::factory(2)->create([
            'user_id' => 1
        ]);
        BankAccount::factory()->create([
            'user_id' => 2
        ]);


        Transaction::factory(20)->create([
            'user_id' => 1,
            'bank_account_id' => $admin->bank_accounts()->first()
        ]);

        Transaction::factory(10)->create([
            'user_id' => 2,
            'bank_account_id' => $admin->bank_accounts()->first()
        ]);

        // $admin->setTotalBalace(1000);
        // $user->setTotalBalace(2000000);

    }
}