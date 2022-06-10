<?php
/**
 * Dependency Inversion Principle (DIP) in PHP (not working)
 */

class PayPal
{
	public function pay(int $amount): void
	{
		echo "Discussing with PayPal...\n";
	}
}

class Stripe
{
	public function pay(int $amount): void
	{
		echo "Discussing with Stripe...\n";
	}
}

class AliPay
{
	public function pay(int $amount): void
	{
		echo "Discussing with AliPay...\n";
	}
}

// So many providers exist...

class PaymentProvider
{
	public function goToPaymentPage( PayPal | AliPay | Stripe $paymentChoosen, int $amount ): void
	{
		// ❌ This fails here, how can you be sure that $paymentChoosen has a pay() method?
		$paymentChoosen->pay($amount);
	}
}

// Luckily, we had implemented the same method named pay() on all classes, but it was luck, nothing forces us to do so.
$paymentProvider = new PaymentProvider();
$paymentProvider->goToPaymentPage(new PayPal(), 100);
$paymentProvider->goToPaymentPage(new Stripe(), 100);
$paymentProvider->goToPaymentPage(new AliPay(), 100);