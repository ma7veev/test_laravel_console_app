<?php

namespace App\Console\Commands;

use App\Services\Employee\DutiesHandler;
use App\Services\Employee\EmployeeInterface;
use Illuminate\Console\Command;

class EmployeeCan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:can {name} {duty}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if employee can do work';
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
        $this->info($this->handler->getCan($this->argument('duty')));
        return 0;
    }
}
