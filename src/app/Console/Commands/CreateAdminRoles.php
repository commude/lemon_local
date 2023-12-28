<?php

namespace App\Console\Commands;

use App\Enums\AdminType;
use Illuminate\Console\Command;

class CreateAdminRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin_roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert into roles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        collect(AdminType::getValues())->each(function ($role) {
            \Spatie\Permission\Models\Role::create(['name' => $role, 'guard_name' => 'admin']);
        });

        return 0;
    }
}
