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
                'name' => 'Royal Romantic History I',
                'key' => 'LO-RRH1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-KING',
                    'CE-REHO'
                ]
            ],
            [
                'name' => 'Royal Romantic History I',
                'key' => 'LO-RRH2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-PRIN',
                    'CE-REHO'
                ]
            ],
            [
                'name' => 'Cursed Love',
                'key' => 'LO-CL',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-MEDU',
                    'CE-POSI'
                ]
            ],
            [
                'name' => 'Bodyguard: Holy Warrior/Athena	',
                'key' => 'LO-BG',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-HOWA',
                    'AB-ATHE'
                ]
            ],
            [
                'name' => 'Love of Nagas',
                'key' => 'LO-LON',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-HODR',
                    'CE-FADR'
                ]
            ],
            [
                'name' => 'Emperor and Queen',
                'key' => 'LO-EAQ',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-CHEC',
                    'AR-BLWQ'
                ]
            ],
            [
                'name' => 'Summer Sunshine',
                'key' => 'LO-SS',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-SUFL',
                    'CE-CACT'
                ]
            ],
            [
                'name' => 'Old Affection',
                'key' => 'LO-OA',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-COMM',
                    'AB-ZEQU'
                ]
            ],
            [
                'name' => 'Oriental Romance I',
                'key' => 'LO-OR1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-NOBU',
                    'AR-GUMI'
                ]
            ],
            [
                'name' => 'Oriental Romance II',
                'key' => 'LO-OR2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-MASA',
                    'null'
                ]
            ],
            [
                'name' => '??????: Hades/Pandora (not released)	',
                'key' => 'LO-???',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-HADE',
                    'null'
                ]
            ],
            [
                'name' => 'Childhood Friend',
                'key' => 'LO-CF',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-ADVE',
                    'AB-LIMA'
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
