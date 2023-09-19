<?php

namespace App\Console\Commands;

use App\Models\Management\SpecialPrices;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ValidatePromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validatePromotions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'validate promotions every day';

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
     * @return mixed
     */
    public function handle()
    {
        $actualDate = Carbon::now();

        //Disabled
        SpecialPrices::where('startdate','>', $actualDate)
            ->update(['status'=>0]);

        //Enabled
        SpecialPrices::where('startdate','<', $actualDate)
            ->update(['status'=>1]);

        //Caducated
        SpecialPrices::where('enddate','<', $actualDate)
            ->update(['status'=>2]);

        //Message in logs
        Log::info("Validate promotions sucessfully ". Carbon::now());
    }
}
