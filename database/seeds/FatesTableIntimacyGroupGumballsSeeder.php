<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class FatesTableNormalGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fates = [
            [
                'name' => 'Gladiator Competition',
                'key' => 'IN-GC',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-GLAD',
                    'AB-SPAR'
                ]
            ],
            [
                'name' => 'Jungle Guardian',
                'key' => 'IN-JG',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    null,
                    'AR-CLAW'
                ]
            ],
            [
                'name' => 'Mysterious Plant I',
                'key' => 'IN-MP1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-WOTR',
                    'CE-SUFL'
                ]
            ],
            [
                'name' => 'Mysterious Plant II',
                'key' => 'IN-MP2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-WOTR',
                    'CE-CACT'
                ]
            ],
            [
                'name' => 'Voyager I',
                'key' => 'IN-V1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-PIRA',
                    'RS-KRCA'
                ]
            ],
            [
                'name' => 'Voyager II',
                'key' => 'IN-V2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-PIRA',
                    'RS-GHCA'
                ]
            ],
            [
                'name' => 'Godfather I',
                'key' => 'IN-GF1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-NO1M',
                    null
                ]
            ],
            [
                'name' => 'Godfather II',
                'key' => 'IN-GF2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-NO2M',
                    null
                ]
            ],
			[
                'name' => 'Godfather III',
                'key' => 'IN-GF3',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-NO3M',
                    null
                ]
            ],
			[
                'name' => 'Godfather IV',
                'key' => 'IN-GF4',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-NO4M',
                    null
                ]
            ],
			[
                'name' => 'Godfather V',
                'key' => 'IN-GF5',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-NO5M',
                    null
                ]
            ],
			
            [
                'name' => 'Soldier',
                'key' => 'IN-S',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-GUAR',
                    'AR-COMM'
                ]
            ],
            [
                'name' => 'Special Troops',
                'key' => 'IN-ST',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-COMM',
                    'AR-COMM'
                ]
            ],
            [
                'name' => 'King Kong',
                'key' => 'IN-KK',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-MOKI',
                    'RS-PETE'
                ]
            ],
            [
                'name' => 'Father and Son I',
                'key' => 'IN-FAS1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-KING',
                    'CE-PRIN'
                ]
            ],
            [
                'name' => 'Lead Actor and Director',
                'key' => 'IN-LAAD',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-ADVE',
                    'RS-PETE'
                ]
            ],
            [
                'name' => 'Honor Among Thieves',
                'key' => 'IN-HAT',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-BAND',
                    'RS-KAIT'
                ]
            ],
            [
                'name' => 'Flame Affinity',
                'key' => 'IN-FA',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-HELL',
                    'CE-FIEL'
                ]
            ],
            [
                'name' => 'Father and Son II',
                'key' => 'IN-FAS2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-HEKI',
                    'RS-NALA'
                ]
            ],
            [
                'name' => 'Allegiance',
                'key' => 'IN-A',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-HADE',
                    'AR-SKLO'
                ]
            ],
            [
                'name' => 'Gods Gift',
                'key' => 'IN-GG',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-ATHE',
                    null
                ]
            ],
            [
                'name' => 'Love like Fish to Water',
                'key' => 'IN-LLFTW',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-WAEL',
                    'RS-MERM'
                ]
            ],
            [
                'name' => 'Affinity Like Snow',
                'key' => 'IN-ALS',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-SNOW',
                    'AR-FRQU'
                ]
            ],
            [
                'name' => 'Best Partners',
                'key' => 'IN-BP',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-BUTC',
                    null
                ]
            ],
            
        ];
        foreach ($fates as $fate) {
            $gumballs = $fate['gumballs'];
            unset($fate['gumballs']);
            DB::table('fates')
                ->updateOrInsert(
                    $fate,
                    array_merge(
                        $fate,
                        [
                            'group_id' => DB::table('groups')->where('key', '=', 'NO')->first()->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]
                    )
                );
            FateGumballsTableSeeder::runExternally($fate['key'], $gumballs);
        }
    }
}
