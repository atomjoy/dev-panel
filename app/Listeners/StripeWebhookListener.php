<?php

namespace App\Listeners;

use App\Events\StripeWebhook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StripeWebhookListener
{
	/**
	 * Create the event listener.
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 */
	public function handle(StripeWebhook $event): void
	{
		// Stripe client
		$stripe = new \Stripe\StripeClient(config('cashier.secret'));

		['type' => $type, 'data' => $data] = $event->payload;

		// Handle the incoming event...
		switch ($type) {
			case 'payment_link.created':
				// $paymentLink = $data->object; // contains a \Stripe\PaymentLink
				$this->log($data);
				break;
			case 'payment_intent.succeeded':
				// $paymentIntent = $data->object; // contains a \Stripe\PaymentIntent
				$this->log($data);
				break;
			case 'payment_method.attached':
				// $paymentMethod = $data->object; // contains a \Stripe\PaymentMethod
				$this->log($data);
				break;
			case 'checkout.session.completed':
				$this->log($data);
				// Payment is successful and the subscription is created.
				// You should provision the subscription and save the customer ID to your database.
				break;
			case 'invoice.payment_succeeded':
				// $paymentIntent = $data->object; // contains a \Stripe\PaymentIntent
				$this->log($data);
				break;
			case 'invoice.paid':
				$this->log($data);
				// Continue to provision the subscription as payments continue to be made.
				// Store the status in your database and check when a user accesses your service.
				// This approach helps you avoid hitting rate limits.
				break;
			case 'invoice.payment_failed':
				$this->log($data);
				// The payment failed or the customer does not have a valid payment method.
				// The subscription becomes past_due. Notify your customer and send them to the
				// customer portal to update their payment information.
				break;
			case 'charge.dispute.created':
				$this->log($data);
				break;
			default:
				// Log not supported events
				$this->log('Not supported ' . $type);
		}

		// Events
		// customer.subscription.created
		// customer.subscription.updated
		// customer.subscription.deleted
		// customer.updated
		// customer.deleted
		// payment_method.automatically_updated
		// invoice.payment_action_required
		// invoice.payment_succeeded
	}

	/**
	 * Log webhook event.
	 */
	function log(string|array $data): void
	{
		Log::build([
			'driver' => 'single',
			'path' => storage_path('logs/stripe/webhook.log'),
		])->info('Webhook event', array('context' => $data));
	}
}
