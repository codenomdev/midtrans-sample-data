<?php

namespace Codenom\MidtransSampleData\Controllers\Snap;

use CodeIgniter\Controller;

class Snap extends Controller
{
    protected $config;

    //load helper
    protected $helper = ['form'];

    //render property
    protected $render;

    //midtrans property
    protected $midtrans;

    public function __construct()
    {
        $this->config = config('Midtrans');
        $this->render = \Config\Services::renderer();
        $this->midtrans = service('Midtrans');
    }

    public function index()
    {
        return $this->render->render('Codenom\MidtransSampleData\Views\Snap\checkout');
    }

    public function token()
    {
        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 94000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 18000,
            'quantity' => 3,
            'name' => "Apple"
        );

        // Optional
        $item2_details = array(
            'id' => 'a2',
            'price' => 20000,
            'quantity' => 2,
            'name' => "Orange"
        );

        // Optional
        $item_details = array($item1_details, $item2_details);

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "085161612323",
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "085161612323",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'email'         => "codenomdev@gmail.com",
            'phone'         => "085161612323",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration'  => 2
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));

        $snapToken = $this->midtrans->getSnapToken($transaction_data);

        //response token
        echo $snapToken->token;
    }
}
