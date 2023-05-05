<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Client0',
            'email' => 'client0@gmail.com',
            'phone' => 998949289094,
            'subject' => 'Client0 add some mindset',
            'role_id' => Role::ROLE_PENDING
        ]);
        Contact::create([
            'name' => 'Client1',
            'email' => 'client1@gmail.com',
            'phone' => 998949289094,
            'subject' => 'Client1 add some mindset',
            'role_id' => Role::ROLE_PROCESSING
        ]);
        Contact::create([
            'name' => 'Client3',
            'email' => 'client3@gmail.com',
            'phone' => 998949289094,
            'subject' => 'Client3 add some mindset',
            'role_id' => Role::ROLE_CLOSED
        ]);
    }
}
