<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class ShopifyController extends Controller
{

	/**
	 * @param
	 *
	 * @return array
	 */	
  public function index() {

    $shop = ShopifyApp::shop();

    // $request = $shop->api()->rest('GET', '/admin/api/'.ShopifyApp::api()->getVersion().'/products.json');
    // return view('shopify', ['products' => $request->body->products]);

    $query = '{
		  customers(first: 2) {
		    edges {
		      node {
		        id
		        email
		        lastOrder {
		          name
		        }
		      }
		    }
		  }
		}';
    $request = $shop->api()->graph($query);
    // echo $request->body->shop->products->edges[0]->node->title;

    // $this->test_insert($request->body->customers->edges);

    return view('shopify', [
    	'customers' => $request->body->customers->edges
    ]);

  }

  public function test() {
    $shop = ShopifyApp::shop();
    $query = '{
		  customers(first: 2) {
		    edges {
		      node {
		        id
		        email
		      }
		    }
		  }
		}';
    $request = $shop->api()->graph($query);

    return view('test', [
    	'customers' => $request->body->customers->edges
    ]);    
  }


  public function refer_to_test_customer_update($customer_id) {
  	header("Location: /test_customer_update/1722878984281");
  	// $this->test_customer_update($customer_id);
  }
  
  public function test_customer_update($customer_id) {

  	error_log($customer_id);
  	\Log::debug($customer_id);

    $shop = ShopifyApp::shop();

		$query = 'mutation {
		  customerUpdate(input: {
		    id: "gid://shopify/Customer/'.$customer_id.'", 
		    firstName: "Dirk",
		    taxExempt: false
		  }) {
		    customer {
		      id,
		      firstName
		    }
		  }
		}';
		$shop->api()->graph($query);
		// error_log('message');
		// \Log::debug('foofoo');
  }

  public function test_insert($customers) {
  	// var_dump($request);
  	foreach($customers as $customer) {
	  	$customer_record = Customer::updateOrCreate(
	  		[
	  			'shopify_id'	=> $customer->node->id,
	  			'email' 			=> $customer->node->email,
	  			'order' 			=> $customer->node->lastOrder->name
	  		]
	  	);
  	}
  	// $customer->shopify_id = $request->node->id;
  	// $customer->email = $request->node->email;
  	// $customer->order = $request->node->lastOrder->name;

  	// $customer->save();

  }
}
