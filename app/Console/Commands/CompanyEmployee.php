<?php

namespace App\Console\Commands;

use App\Services\Employee\DutiesHandler;
use App\Services\Employee\EmployeeInterface;
use Illuminate\Console\Command;

class CompanyEmployee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:employee {name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get duties list';
    /**
     *
     * @var DutiesHandler
     */
    private $handler;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EmployeeInterface $employee)
    {
        $this->handler = new DutiesHandler($employee);
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info($this->handler->getDutiesList());
        return 0;
    }
}
