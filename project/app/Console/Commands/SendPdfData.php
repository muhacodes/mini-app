<?php

namespace App\Console\Commands;
use App\Models\data;
use Illuminate\Console\Command;

class SendPdfData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        data::create([
        'name' => 'salman',
        'email' => 'salman@gmail.com',
        'phone' => '0797341670',
        'dob' => '2017-02-01',
        ]);

        // print("it is working");
    }
}
