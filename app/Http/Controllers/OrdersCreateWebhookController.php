<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class OrdersCreateWebhookController extends Controller
{
	public function index() {
	}

  public function handle()
  {
    // Get the job class and dispatch
    // $jobClass = '\\App\\Jobs\\'.str_replace('-', '', ucwords($type, '-')).'Job';
    // $jobData = json_decode(Request::getContent());
		error_log('success');

    \App\Jobs\OrdersCreateJob::dispatch(
      Request::header('x-shopify-shop-domain'),
      json_decode(Request::getContent())
    );

    return Response::make('', 201);
  }	
}
