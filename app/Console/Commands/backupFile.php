<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class backupFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backupdata:file {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'backup database to file ';

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
        
        // $products=DB::table('products')->limit(10)->get();
        
        $products=DB::table('products')->orderBy('id')->get()->chunk(10);
         $number=$products->count();
            $name=$this->argument('name');
         for($i=0;$i < $number ;$i++){
             $filename= fopen('storage/'.$name.$i.'.csv','w');
            foreach($products[$i]  as $product){
               fputcsv($filename,(array)$product);
            }
            fclose($filename);
         }
           
           
               
            echo 'success';
         
        
        return 0;
    }
}
