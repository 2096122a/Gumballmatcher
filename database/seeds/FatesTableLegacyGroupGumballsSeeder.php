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
                'name' => 'Sorcery Legacy',
                'key' => 'LE-SL',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-WITC',
                    'AB-SORC'
                ]
            ],
            [
                'name' => 'Demon Hunter',
                'key' => 'LE-DH',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-DEHU',
                    'AR-VAHU'
                ]
            ],
            [
                'name' => 'Legacy of the Sea I',
                'key' => 'LE-LOTS1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-KRCA',
                    'CE-POSI'
                ]
            ],
            [
                'name' => 'Heritage of the sea II',
                'key' => 'LE-HOTS2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-GHCA',
                    'CE-POSI'
                ]
            ],
            [
                'name' => 'Heritage of the sea III',
                'key' => 'LE-HOTS3',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-PIRA',
                    'CE-POSI'
                ]
            ],
            [
                'name' => 'Toxin Research',
                'key' => 'LE-TR',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-PHAR',
                    'CE-CYBO'
                ]
            ],
            [
                'name' => 'Commander',
                'key' => 'LE-C',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-CRUS',
                    'RS-LIKI'
                ]
            ],
            [
                'name' => 'Heart of Warrior',
                'key' => 'LE-HOW',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-MUSA',
                    'RS-PAND'
                ]
            ],
            [
                'name' => 'Killer',
                'key' => 'LE-K',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-SHAS',
                    'CE-BLWO'
                ]
            ],
            [
                'name' => 'Light Faith I',
                'key' => 'LE-LF1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-PRIE',
                    'RS-APOL'
                ]
            ],
            [
                'name' => 'Light Faith II',
                'key' => 'LE-LF2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-SAGE',
                    'RS-APOL'
                ]
            ],
            [
                'name' => 'Flame Legacy',
                'key' => 'LE-FL',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-FIEL',
                    'CE-PHOE'
                ]
            ],
            [
                'name' => 'Lord of Underworld',
                'key' => 'LE-LOU',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-SORE',
                    'AR-HADE'
                ]
            ],
            [
                'name' => 'Champions Legacy',
                'key' => 'LE-CL',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-ADVE',
                    'AB-WARR'
                ]
            ],
            [
                'name' => 'Magic Legacy',
                'key' => 'LE-ML',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-MAGE',
                    'CE-MABO'
                ]
            ],
            [
                'name' => 'Fighting Gods Legacy I',
                'key' => 'LE-FGL1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-GLAD',
                    'AB-HERC'
                ]
            ],
            [
                'name' => 'Lurker',
                'key' => 'LE-L',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-SPY',
                    'AR-SHAS'
                ]
            ],
            [
                'name' => 'Soul of Undead',
                'key' => 'LE-SOU',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-DEKN',
                    'AR-LIKI'
                ]
            ],
            [
                'name' => 'God of Fights Inheritance',
                'key' => 'LE-GOFI',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-HERC',
                    'AB-SPAR'
                ]
            ],
            [
                'name' => 'Sky Guardian',
                'key' => 'LE-SG',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-CAPT',
                    'RS-NELS'
                ]
            ],
            [
                'name' => 'Divination of Life',
                'key' => 'LE-DOL',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-TARO',
                    'AB-HIPR'
                ]
            ],
            [
                'name' => 'Road of Music',
                'key' => 'LE-ROM',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-MINS',
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
