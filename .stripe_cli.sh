# Get keys
STRIPE_KEY=pk_test_68L2V...
STRIPE_SECRET=sk_test_68L2V...

# Create webhook (public online)
php artisan cashier:webhook
php artisan cashier:webhook --url "https://example.com/stripe/webhook"

# Disable laravel csrf protection on url
/stripe/webhook

# Download stripe for windows and add path to windows PATH environment variables
https://docs.stripe.com/stripe-cli

# Webhook docs
https://docs.stripe.com/webhooks

# Create webhook (local host)
stripe login

# Get STRIPE_WEBHOOK_SECRET locally
stripe listen

# Catch all events locally
stripe listen --forward-to http://your-app.test/stripe/webhook

# Catch only required events
stripe listen --forward-to http://your-app.test/stripe/webhook --events payment_intent.created,customer.created,payment_intent.succeeded,checkout.session.completed,payment_intent.payment_failed

# Forward from public webhook to local
stripe listen --load-from-webhooks-api --forward-to http://your-app.test/stripe/webhook

# Add secret for local
STRIPE_WEBHOOK_SECRET=whsec_7fd249...

# Or for online webhook from stripe deweloper dashboard
STRIPE_WEBHOOK_SECRET=we_1a2t5...

# Trigger event from terminal
stripe trigger invoice.payment_succeeded

# Laravel Cashier events
# Make strip event listener (optional)
# php artisan make:listener StripeEventListener

# Make event service provider add listining for event (optional)
# use Laravel\Cashier\Events\WebhookReceived;