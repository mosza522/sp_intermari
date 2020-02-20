<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
		DB::table('ck_Master_Buoy')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_Buoy')->insert([
	            'BuoyName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_BuoySweep')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_BuoySweep')->insert([
	            'BuoySweepName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_Smd_HarborBackhoe')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_Smd_HarborBackhoe')->insert([
	            'HarborBackhoeName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_Smd_HarborSweep')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_Smd_HarborSweep')->insert([
	            'HarborSweepName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_Smd_HarborTruck')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_Smd_HarborTruck')->insert([
	            'HarborTruckName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_Leach')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_Leach')->insert([
	            'LeachName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_LeachSweep')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_LeachSweep')->insert([
	            'LeachSweepName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_Ship')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_Ship')->insert([
	            'ShipName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_ShipPolice')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_ShipPolice')->insert([
	            'ShipPoliceName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_StevieDore')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_StevieDore')->insert([
	            'StevieDoreName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_StevieDoreSweep')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_StevieDoreSweep')->insert([
	            'StevieDoreSweepName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_StoreBackhoe')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_StoreBackhoe')->insert([
	            'StoreBackhoeName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_StoreScales')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_StoreScales')->insert([
	            'StoreScalesName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		DB::table('ck_Master_StoreSweep')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_StoreSweep')->insert([
	            'StoreSweepName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		
		DB::table('ck_Master_Smd_Owner')->truncate();
		DB::table('ck_Master_Smd_Owner')->insert([
			'OwnerName' => 'N/A',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_Smd_Owner')->insert([
	            'OwnerName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
		
		DB::table('ck_Master_BuoyForeman')->truncate();
    	foreach (range(1,20) as $index) {
	        DB::table('ck_Master_BuoyForeman')->insert([
	            'BuoyForemanName' => $faker->name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
	        ]);
        }
    }
}
