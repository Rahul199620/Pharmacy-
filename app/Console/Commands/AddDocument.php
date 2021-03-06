<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Document;
class AddDocument extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'document:check';

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
     * @return mixed
     */
    public function handle()
    {
        //$this->addDocument(['doc_name' => 'RC', 'option_name' => 'GATEINSCRAP', 'carry_forward' => 'Y', 'value_dependent' => 'N', 'min_value' => 0]);
    
        $doc_name='RC';
        $option_name='GATEINSCRAP';
        $carry_forward='Y';
        $value_dependent='N';
        $min_value=0;

        $document =new Document();
        $document->doc_name=$doc_name;
        $document->option_name=$option_name;
        $document->carry_forward=$carry_forward;
        $document->value_dependent=$value_dependent;
        $document->min_value=$min_value;
        $document->save();
        $this->info("Saved.");
    
    
    }




    
}
