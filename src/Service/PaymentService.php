<?php


namespace App\Service;


use App\Entity\PaymentProcessor;

class PaymentService
{
    public function __construct(private PaypalPaymentProcessor $paypalPaymentProcessor, private StripePaymentProcessor $stripePaymentProcessor)
    {
    }

    public function process(PaymentProcessor $paymentProcessor, int $price): bool
    {
        switch ($paymentProcessor->getTitle()) {
            case 'Paypal':
                $this->paypalPaymentProcessor->pay($price);
                break;
            case 'Stripe':
                if (!$this->stripePaymentProcessor->processPayment($price)) {
                    throw new \Exception('Stripe problem');
                }
                break;
            default:
                throw new \Exception('Payment problem');
        }

        return true;
    }
}