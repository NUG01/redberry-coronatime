<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch api for countries and statistics';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function fetchApi()
    {
        
            $countriesUrl='https://devtest.ge/countries';
        
        $response= Http::get($countriesUrl);
        $data=json_decode($response->body());
        foreach($data as $countryData){
            $langEn=   $countryData->setTranslation('name','en',$countryData['name']->en);
         $langKa=  $countryData->setTranslation('name','ka',$countryData['name']->ka);
            $countryData=(array)$countryData;
            Country::updateOrCreate([
                ['code'=>$countryData['code']],
                ['name'=>['en'=>$langEn,'ka'=>$langKa]]
            ]);
            // $country['code']=$countryData['code']
            
        };
        // return redirect()->back();
    }
    
}
