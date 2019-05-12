<?php

use Illuminate\Database\Seeder;

class NeighborhoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('neighborhoods')->insert([
            //Comuna 1
            0 => [
                'name' => 'El Centro',
                'latitude' => '10.476118',
                'longitude' => '-73.246684'
            ],
            1 => [
                'name' => 'Loperena',
                'latitude' => '10.473494',
                'longitude' => '-73.248994'
            ],
            2 => [
                'name' => 'Altagracia',
                'latitude' => '10.478004',
                'longitude' => '-73.242942'
            ],
            3 => [
                'name' => 'La Garita',
                'latitude' => '10.476085',
                'longitude' => '-73.242944'
            ],
            4 => [
                'name' => 'El Cerezo',
                'latitude' => '10.476085',
                'longitude' => '-73.242944'
            ],
            5 => [
                'name' => 'El Carmen',
                'latitude' => '10.473403',
                'longitude' => '-73.241283'
            ],
            6 => [
                'name' => 'Gaitán',
                'latitude' => '10.470566',
                'longitude' => '-73.245772'
            ],
            7 => [
                'name' => 'Kennedy',
                'latitude' => '10.470273',
                'longitude' => '-73.241496'
            ],
            8 => [
                'name' => 'La Granja',
                'latitude' => '10.466620',
                'longitude' => '-73.248216'
            ],
            9 => [
                'name' => 'San Jorge',
                'latitude' => '10.466298',
                'longitude' => '-73.241793'
            ],
            10 => [
                'name' => 'Sicarare',
                'latitude' => '10.467760',
                'longitude' => '-73.238999'
            ],
            11 => [
                'name' => 'Santo Domingo',
                'latitude' => '10.470553',
                'longitude' => '-73.236912'
            ],
            12 => [
                'name' => 'San Antonio',
                'latitude' => '10.466494',
                'longitude' => '-73.236321'
            ],
            13 => [
                'name' => 'Las Palmas',
                'latitude' => '10.465781',
                'longitude' => '-73.234211'
            ],
            14 => [
                'name' => 'Pabo VI',
                'latitude' => '10.464452',
                'longitude' => '-73.250803'
            ],
            15 => [
                'name' => 'Gutapurí',
                'latitude' => '10.464955',
                'longitude' => '-73.251869'
            ],
            16 => [
                'name' => 'Santa Ana',
                'latitude' => '10.470577',
                'longitude' => '-73.252478'
            ],
            17 => [
                'name' => 'Las Delicias',
                'latitude' => '10.465276',
                'longitude' => '-73.254397'
            ],
            18 => [
                'name' => 'Zona Hospital',
                'latitude' => '10.471714',
                'longitude' => '-73.252420'
            ],
            19 => [
                'name' => 'San Vicente',
                'latitude' => '10.471536',
                'longitude' => '-73.256769'
            ],
            20 => [
                'name' => 'Alfonso López',
                'latitude' => '10.474576',
                'longitude' => '-73.255273'
            ],
            //Comuna 2
            21 => [
                'name' => 'Villa Castro',
                'latitude' => '10.467443',
                'longitude' => '-73.233070'
            ],
            22 => [
                'name' => 'Versalles',
                'latitude' => '10.463287',
                'longitude' => '-73.233131'
            ],
            23 => [
                'name' => 'Candelaria Sur',
                'latitude' => '10.463287',
                'longitude' => '-73.233131'
            ],
            24 => [
                'name' => 'Villa del Rosario',
                'latitude' => '10.460580',
                'longitude' => '-73.231636'
            ],
            25 => [
                'name' => 'Villa Clara',
                'latitude' => '10.463096',
                'longitude' => '-73.238324'
            ],
            26 => [
                'name' => 'Santa Rita',
                'latitude' => '10.461446',
                'longitude' => '-73.237332'
            ],
            27 => [
                'name' => 'Cinco de Noviembre',
                'latitude' => '10.461336',
                'longitude' => '-73.241117'
            ],
            28 => [
                'name' => 'Santa Rosa',
                'latitude' => '10.459361',
                'longitude' => '-73.239855'
            ],
            29 => [
                'name' => '12 de Octubre',
                'latitude' => '10.455939',
                'longitude' => '-73.244943'
            ],
            30 => [
                'name' => 'Simón Bolívar',
                'latitude' => '10.459278',
                'longitude' => '-73.248273'
            ],
            31 => [
                'name' => 'Mayales etapa I',
                'latitude' => '10.457500',
                'longitude' => '-73.230670'
            ],
            32 => [
                'name' => 'Mayales etapa II',
                'latitude' => '10.454466',
                'longitude' => '-73.236182'
            ],
            33 => [
                'name' => 'Mayales etapa III',
                'latitude' => '10.456201',
                'longitude' => '-73.239298'
            ],
            34 => [
                'name' => 'Los Cocos',
                'latitude' => '10.455857',
                'longitude' => '-73.228617'
            ],
            35 => [
                'name' => 'Los Milagros',
                'latitude' => '10.450277',
                'longitude' => '-73.232200'
            ],
            36 => [
                'name' => 'Panamá',
                'latitude' => '10.449166',
                'longitude' => '-73.239408'
            ],
            37 => [
                'name' => 'San Fernando',
                'latitude' => '10.445654',
                'longitude' => '-73.238530'
            ],
            38 => [
                'name' => 'Galán Sarmiento',
                'latitude' => '10.449166',
                'longitude' => '-73.239408'
            ],
            39 => [
                'name' => 'María Elena',
                'latitude' => '10.445654',
                'longitude' => '-73.238530'
            ],
            40 => [
                'name' => 'Casa Campo',
                'latitude' => '10.449166',
                'longitude' => '-73.239408'
            ],
            41 => [
                'name' => 'Bosques de Rancho mío',
                'latitude' => '10.445654',
                'longitude' => '-73.238530'
            ],
            42 => [
                'name' => 'Amaneceres del Valle',
                'latitude' => '10.453801',
                'longitude' => '-73.226779'
            ],
            //Comuna 3
            43 => [
                'name' => 'Primero de Mayo',
                'latitude' => '10.45715',
                'longitude' => '-73.25243'
            ],
            44 => [
                'name' => 'San Martín',
                'latitude' => '10.451665',
                'longitude' => '-73.249542'
            ],
            45 => [
                'name' => 'Villa Leonor',
                'latitude' => '10.448225',
                'longitude' => '-73.247659'
            ],
            46 => [
                'name' => 'Valle Meza',
                'latitude' => '10.447782',
                'longitude' => '-73.245274'
            ],
            47 => [
                'name' => '7 de Agosto',
                'latitude' => '10.451804',
                'longitude' => '-73.256817'
            ],
            48 => [
                'name' => 'Los Álamos I',
                'latitude' => '10.449094',
                'longitude' => '-73.259383'
            ],
            49 => [
                'name' => 'Villa Olga',
                'latitude' => '10.449226',
                'longitude' => '-73.257813'
            ],
            50 => [
                'name' => 'San Francisco',
                'latitude' => '10.447660',
                'longitude' => '-73.258376'
            ],
            51 => [
                'name' => 'El Prado',
                'latitude' => '10.448223',
                'longitude' => '-73.255595'
            ],
            52 => [
                'name' => 'Rueda',
                'latitude' => '10.447037',
                'longitude' => '-73.254899'
            ],
            53 => [
                'name' => 'La Manuelita',
                'latitude' => '10.449023',
                'longitude' => '-73.253130'
            ],
            54 => [
                'name' => 'La Felicidad',
                'latitude' => '10.448392',
                'longitude' => '-73.251555'
            ],
            55 => [
                'name' => 'Villa Fuentes',
                'latitude' => '10.444352',
                'longitude' => '-73.253539'
            ],
            56 => [
                'name' => 'El Oasis',
                'latitude' => '10.444281',
                'longitude' => '-73.255428'
            ],
            57 => [
                'name' => 'Don Carmelo',
                'latitude' => '10.441795',
                'longitude' => '-73.260636'
            ],
            58 => [
                'name' => 'Mareigua',
                'latitude' => '10.436106',
                'longitude' => '-73.252831'
            ],
            59 => [
                'name' => 'Rincón de Ziruma',
                'latitude' => '10.434714',
                'longitude' => '-73.254496'
            ],
            60 => [
                'name' => 'Altos de Ziruma',
                'latitude' => '10.440977',
                'longitude' => '-73.257805'
            ],
            61 => [
                'name' => '25 de Diciemnre',
                'latitude' => '10.438428',
                'longitude' => '-73.245866'
            ],
            62 => [
                'name' => 'Conjunto OGB',
                'latitude' => '10.441042',
                'longitude' => '-73.243547'
            ],
            63 => [
                'name' => 'Mayales Aeropuerto',
                'latitude' => '10.441042',
                'longitude' => '-73.243547'
            ],
            64 => [
                'name' => 'La Primavera',
                'latitude' => '10.428632',
                'longitude' => '-73.253093'
            ],
            65 => [
                'name' => 'Nuevo Milenio',
                'latitude' => '10.439449',
                'longitude' => '-73.251746'
            ],
            66 => [
                'name' => 'El Páramo',
                'latitude' => '10.431311',
                'longitude' => '-73.251337'
            ],
            67 => [
                'name' => 'Villa Haidith',
                'latitude' => '10.429266',
                'longitude' => '-73.259180'
            ],
            68 => [
                'name' => 'Nando Marín',
                'latitude' => '10.434588',
                'longitude' => '-73.260660'
            ],
            69 => [
                'name' => 'Lorenzo Morales',
                'latitude' => '10.424131',
                'longitude' => '-73.256427'
            ],
            70 => [
                'name' => 'Parques de Bolívar',
                'latitude' => '10.435770',
                'longitude' => '-73.263838'
            ],
            71 => [
                'name' => 'Leandro Díaz I II III',
                'latitude' => '10.435770',
                'longitude' => '-73.263838'
            ],
            //Comuna 4
            72 => [
                'name' => 'Dangond',
                'latitude' => '10.465907',
                'longitude' => '-73.261150'
            ],
            73 => [
                'name' => 'Los Caciques',
                'latitude' => '10.461997',
                'longitude' => '-73.257998'
            ],
            74 => [
                'name' => 'Los fundadores',
                'latitude' => '10.458036',
                'longitude' => '-73.262384'
            ],
            75 => [
                'name' => 'Sabanas del Valle',
                'latitude' => '10.452411',
                'longitude' => '-73.263392'
            ],
            76 => [
                'name' => 'Casimiro Maestre',
                'latitude' => '10.451868',
                'longitude' => '-73.265471'
            ],
            77 => [
                'name' => 'Manantial',
                'latitude' => '10.454648',
                'longitude' => '-73.267498'
            ],
            78 => [
                'name' => 'Enrique Pupo',
                'latitude' => '10.456393',
                'longitude' => '-73.268357'
            ],
            79 => [
                'name' => 'Villa Corelca',
                'latitude' => '10.460581',
                'longitude' => '-73.269036'
            ],
            80 => [
                'name' => 'El Cerrito',
                'latitude' => '10.462336',
                'longitude' => '-73.267313'
            ],
            81 => [
                'name' => 'Álamnos II',
                'latitude' => '10.448757',
                'longitude' => '-73.267315'
            ],
            82 => [
                'name' => 'Álamos III',
                'latitude' => '10.447972',
                'longitude' => '-73.264864'
            ],
            83 => [
                'name' => 'Álamos IV',
                'latitude' => '10.447972',
                'longitude' => '-73.264864'
            ],
            84 => [
                'name' => 'Conjunto la Fontana',
                'latitude' => '10.446220',
                'longitude' => '-73.266566'
            ],
            85 => [
                'name' => 'María Camila',
                'latitude' => '10.447937',
                'longitude' => '-73.268669'
            ],
            86 => [
                'name' => 'Villa Miriam',
                'latitude' => '10.452137',
                'longitude' => '-73.269378'
            ],
            87 => [
                'name' => 'Francisco de Paula Santander',
                'latitude' => '10.451626',
                'longitude' => '-73.272692'
            ],
            88 => [
                'name' => 'Villa Luz',
                'latitude' => '10.448621',
                'longitude' => '-73.274862'
            ],
            89 => [
                'name' => 'El Hogar',
                'latitude' => '10.450215',
                'longitude' => '-73.274736'
            ],
            90 => [
                'name' => 'Villa Taxi',
                'latitude' => '10.450515',
                'longitude' => '-73.277383'
            ],
            91 => [
                'name' => 'La Victoria',
                'latitude' => '10.453489',
                'longitude' => '-73.275321'
            ],
            92 => [
                'name' => 'El Progreso',
                'latitude' => '10.454201',
                'longitude' => '-73.272325'
            ],
            93 => [
                'name' => 'Cicerón Maestre',
                'latitude' => '10.455783',
                'longitude' => '-73.272125'
            ],
            94 => [
                'name' => 'Buena Vista',
                'latitude' => '10.456468',
                'longitude' => '-73.274931'
            ],
            95 => [
                'name' => 'Jose Antonio Galán',
                'latitude' => '10.456156',
                'longitude' => '-73.277161'
            ],
            96 => [
                'name' => 'Tobias Daza',
                'latitude' => '10.456156',
                'longitude' => '-73.277161'
            ],
            97 => [
                'name' => 'Villa Algenia',
                'latitude' => '10.458954',
                'longitude' => '-73.274876'
            ],
            98 => [
                'name' => 'Limonar',
                'latitude' => '10.458954',
                'longitude' => '-73.274876'
            ],
            99 => [
                'name' => 'Maruamake',
                'latitude' => '10.459145',
                'longitude' => '-73.273377'
            ],
            100 => [
                'name' => 'La Floresta',
                'latitude' => '10.459145',
                'longitude' => '-73.273377'
            ],
            101 => [
                'name' => 'Valle Hermoso',
                'latitude' => '10.459145',
                'longitude' => '-73.273377'
            ],
            102 => [
                'name' => 'San Marino',
                'latitude' => '10.459145',
                'longitude' => '-73.273377'
            ],
            103 => [
                'name' => 'Ciudadela 450 años I',
                'latitude' => '10.446304',
                'longitude' => '-73.275280'
            ],
            104 => [
                'name' => 'Ciudadela 450 años II',
                'latitude' => '10.443018',
                'longitude' => '-73.279445'
            ],
            105 => [
                'name' => 'Ciudadela 450 años III',
                'latitude' => '10.445577',
                'longitude' => '-73.280299'
            ],
            106 => [
                'name' => '8 de Diciembre',
                'latitude' => '10.445577',
                'longitude' => '-73.280299'
            ],
            107 => [
                'name' => 'Villa Magdala',
                'latitude' => '10.445577',
                'longitude' => '-73.280299'
            ],
            108 => [
                'name' => 'Lindaraja',
                'latitude' => '10.445577',
                'longitude' => '-73.280299'
            ],
            109 => [
                'name' => 'Las Acacias',
                'latitude' => '10.445577',
                'longitude' => '-73.280299'
            ],
            110 => [
                'name' => 'Gerizin',
                'latitude' => '10.451553',
                'longitude' => '-73.284203'
            ],
            111 => [
                'name' => 'Populandia',
                'latitude' => '10.447505',
                'longitude' => '-73.281009'
            ],
            112 => [
                'name' => 'San Jerónimo',
                'latitude' => '10.450540',
                'longitude' => '-73.283971'
            ],
            113 => [
                'name' => 'Girasoles',
                'latitude' => '10.450540',
                'longitude' => '-73.283971'
            ],
            114 => [
                'name' => 'Mercabastos',
                'latitude' => '10.450540',
                'longitude' => '-73.283971'
            ],
        ]);
    }
}
