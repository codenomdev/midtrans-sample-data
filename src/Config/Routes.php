<?php

$routes->group('midtrans', function ($routes) {

    /**
     * ROUTES GROUP SNAP
     */
    $routes->group('snap', ['namespace' => 'Codenom\MidtransSampleData\Controllers\Snap'], function ($subroutes) {

        //route to: http://<base_url>/midtrans/snap
        $subroutes->get('', 'Snap::index');
        $subroutes->get('token', 'Snap::token');
        //can't access with method Get URL, only method Post submit from checkout page
        $subroutes->post('finish', 'Snap::attemptOrder');
    });

    /**
     * ROUTES GROUP TRANSACTION
     */
    $routes->group('transaction', ['namespace' => 'Codenom\MidtransSampleData\Controllers\Transaction'], function ($subroutes) {

        //route to: http:<base_url>/midtrans/transaction
        $subroutes->get('', 'Transaction::index');
        //can't access with method Get URL, only method Post submit from transaction page
        $subroutes->post('', 'Transaction::attemptTransaction');
    });

    /**
     * ROUTES GROUP VTDIRECT
     */
    $routes->group('vtdirect', ['namespace' => 'Codenom\MidtransSampleData\Controllers\Vtdirect'], function ($subroutes) {

        //route to: http:<base_url>/midtrans/vtdirect
        $subroutes->get('', 'Vtdirect::index');
        //can't access with method Get URL, only method Post submit from vtdirect page
        $subroutes->post('token', 'Vtdirect::token');
    });

    /**
     * ROUTES GROUP VTWEB
     */

    $routes->group('vtweb', ['namespace' => 'Codenom\MidtransSampleData\Controllers\Vtweb'], function ($subroutes) {
        $subroutes->get('', 'Vtweb::index');
        $subroutes->post('redirected', 'Vtweb::redirected');
    });
});
