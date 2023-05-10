<?php

namespace Tests;

// use Laravel\Lumen\Testing\DatabaseMigrations;
// use Laravel\Lumen\Testing\DatabaseTransactions;

class FreshInstallTest extends TestCase
{
    /**
     * Test to see if the database is migrated and seeded.
     *
     * @return void
     */
    public function test_command_fresh_intall()
    {
        $this->artisan('fresh:install');
        $this->seeInDatabase('migrations', ['migration' => '2023_05_10_033034_create_users_table']);
    }
}
