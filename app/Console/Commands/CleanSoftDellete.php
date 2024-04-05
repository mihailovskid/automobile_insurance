<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CleanSoftDellete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicles:cleanexpired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete soft-deleted records and vehicles with expired insurance.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Vehicle::onlyTrashed()->forceDelete();

        Vehicle::onlyTrashed()->where('insurance_date', '<', Carbon::now())->forceDelete();
    }
}
