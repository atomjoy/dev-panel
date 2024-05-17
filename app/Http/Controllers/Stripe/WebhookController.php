<?php

namespace App\Http\Controllers\Stripe;

use App\Events\StripeWebhook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request)
	{
		try {
			$endpoint_secret = config('cashier.webhook.secret');

			if (empty($endpoint_secret)) {
				throw new \Exception('Empty endpoint webhook secret');
			}

			$payload = @file_get_contents('php://input');
			$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
			$event = null;

			$event = \Stripe\Webhook::constructEvent(
				$payload,
				$sig_header,
				$endpoint_secret
			);

			// Event
			StripeWebhook::dispatch($event);

			return response('Ok ' . $event->type, 200);
		} catch (\UnexpectedValueException $e) {
			// Invalid payload
			return response('Error payload', 400);
		} catch (\Stripe\Exception\SignatureVerificationException $e) {
			// Invalid signature
			return response('Error signature', 500);
		} catch (\Exception $e) {
			// Event error
			return response($e->getMessage(), 406);
		}
	}
}
