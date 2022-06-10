<?php
/**
 * Dependency Inversion Principle (DIP) in PHP
 */

interface PaymentInterface
{
    public function pay(int $amount): void;
}

class PayPal implements PaymentInterface
{
	public function pay(int $amount): void
	{
		echo "Discussing with PayPal...\n";
	}
}

class Stripe implements PaymentInterface
{
	public function pay(int $amount): void
	{
		echo "Discussing with Stripe...\n";
	}
}

class AliPay implements PaymentInterface
{
	public function pay(int $amount): void
	{
		echo "Discussing with AliPay...\n";
	}
}

// So many providers exist...

class PaymentProvider
{
	public function goToPaymentPage( PaymentInterface $paymentChoosen, int $amount ): void
	{
		$paymentChoosen->pay($amount);
	}
}

$paymentProvider = new PaymentProvider();
$paymentProvider->goToPaymentPage(new PayPal(), 100);
$paymentProvider->goToPaymentPage(new Stripe(), 100);
$paymentProvider->goToPaymentPage(new AliPay(), 100);