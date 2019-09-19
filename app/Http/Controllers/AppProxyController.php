<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class AppProxyController extends Controller
{
	public function index($customer_id, $tax_status) {

		error_log('PROXY!!');

    $shop = ShopifyApp::shop();

		$query = 'mutation {
		  customerUpdate(input: {
		    id: "gid://shopify/Customer/'.$customer_id.'", 
		    taxExempt:'.$tax_status.'
		  }) {
		    customer {
		      id,
		      firstName
		    }
		  }
		}';
		$shop->api()->graph($query);		
	}
}

// https://swanky-plus-sandbox.myshopify.com/apps/proxy_test/1722878984281/false
