<?php

$routes->group('midtrans', function ($routes) {

    /**
     * ROUTES GROUP SNAP
     */
    $routes->group('snap', ['namespace' => 'Codenom\MidtransSampleData\Controllers\Snap'], function ($subroutes) {

        //route to: http://<base_url>/midtrans/snap
        $subroutes->get('', 'Snap::index', ['namespace' => 'Codenom\MidtransSampleData\Controllers\Snap']);
        $subroutes->get('token', 'Snap::token', ['namespace' => 'Codenom\MidtransSampleData\Controllers\Snap']);
    });
});
