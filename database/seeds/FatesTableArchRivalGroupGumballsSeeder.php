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
                'name' => 'Nemesis I',
                'key' => 'AR-N1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-VAMP',
                    'AR-VAHU'
                ]
            ],
            [
                'name' => 'Natural Enemy II',
                'key' => 'AR-NE2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-DEMO',
                    'CE-DEHU'
                ]
            ],
            [
                'name' => 'Light and Dark 1',
                'key' => 'AR-LAD1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'null',
                    'AB-ANDE'
                ]
            ],
            [
                'name' => 'Dragon Slayer',
                'key' => 'AR-DS',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-WARR',
                    'AR-DADR'
                ]
            ],
            [
                'name' => 'Dawn of Justice',
                'key' => 'AR-DOJ',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-NIKN',
                    'CE-JUHE'
                ]
            ],
            [
                'name' => 'Civil War',
                'key' => 'LO-EAQ',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-ARMO',
                    'AB-GUAR'
                ]
            ],
            [
                'name' => 'Battle of Twilight',
                'key' => 'AR-BOT',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-DUEL',
                    'AB-ANDE'
                ]
            ],
            [
                'name' => 'Slaughter House',
                'key' => 'AR-SH',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-MAMM',
                    'AB-BUTC'
                ]
            ],
            [
                'name' => 'Eastern Holy War',
                'key' => 'AR-EHW',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-LIKI',
                    'RS-SALA'
                ]
            ],
            [
                'name' => 'Creation and Destruction',
                'key' => 'AR-CAD',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-DEST',
                    'AR-CREA'
                ]
            ],
            [
                'name' => 'Song of Ice and Fire',
                'key' => 'AR-SOIAF',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-FIEL',
                    'AB-SNOW'
                ]
            ],
            [
                'name' => 'Soul Reaping',
                'key' => 'AR-SR',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-SORE',
                    'RS-GHCA'
                ]
            ],
            [
                'name' => 'Arch Rival',
                'key' => 'AR-AR',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-NIKN',
                    null
                ]
            ],
            [
                'name' => 'Exploiter',
                'key' => 'AR-E',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-PRIN',
                    'RS-SLAV'
                ]
            ],
            [
                'name' => 'Undercover Affair',
                'key' => 'AR-UA',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-BLSH',
                    'CE-BLWO'
                ]
            ],
            [
                'name' => 'Light and Dark 2',
                'key' => 'AR-LAD2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-APOL',
                    'AR-HADE'
                ]
            ],
            [
                'name' => 'Plunder: Bandit/Merchant	',
                'key' => 'AR-P',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-BAND',
                    'CE-MERC'
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
