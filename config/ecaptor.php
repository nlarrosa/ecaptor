<?php

return [

    'rol' => [
        'admin'      => 'ADMIN',
        'proveedor'  => 'PROV',
        'cliente'    => 'CLI',
        'produccion' => 'PROD',
    ],

    'border' => [
        'ubicacion' => [
            'completos' => 'COMPLETOS',
            'cabecera'  => 'CABECERA',
            'pie'       => 'PIE',
            'cabepie'   => 'CABECERA-PIE',
            'izqder'    => 'IZQUIERDA-DERECHA'
        ],

        'tipos' => [
            'sinborde'      => 'SIN BORDE',
            'termofundido'  => 'TERMOFUNDIDO',
            'antitropiezo'  => 'ANTITROPIEZO',
        ]
    ],


    'saleStatus' => [
        'nuevo'       => '1',
        'preparacion' => '2',
        'produccion'  => '3',
        'finalizado'  => '4',
        'anulado'     => '5',
        'modificar'   => '6',
    ],


    'sketchStatus' => [

        'status' => [
            'sinenviar' => 'SIN ENVIAR',
            'enviado'   => 'ENVIADO',
            'aprobado'  => 'APROBADO',
            'modificar' => 'MODIFICAR',
            'anulado'   => 'ANULADO',
        ],

        'id' => [
            'sinenviar' => 1,
            'enviado'   => 2,
            'aprobado'  => 3,
            'modificar' => 4,
            'anulado'   => 5,
        ]
    ],


    'tapetes' => [
        'formato' => [
            'apaisado'    => 'APAISADO',
            'camino'      => 'CAMINO',
            'redondo'     => 'REDONDO',
            'asimetrico'  => 'ASIMETRICO',
        ]
    ],


    'design' => [
        'type' => [
            'archivo' => 'ARCHIVO',
            'texto'   => 'TEXTO',
            'liso'    => 'LISO',
        ]
    ],

    'product' => [
        'type' => [
            'estandar' => 2,
            'medida'   => 1,
        ]
    ],
];