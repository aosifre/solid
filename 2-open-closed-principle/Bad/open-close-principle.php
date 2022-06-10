<?php
/**
 * Open/Closed principle in PHP (not working)
 */

class User
{
    public $name;
    public $firstname;

    public function __construct(string $firstname, string $name)
    {
        $this->firstname = $firstname;
        $this->name = $name;
    }
}

class Customer
{
    public $fullname;

    public function __construct(string $fullname)
    {
        $this->fullname = $fullname;
    }
}

class AccountDisplayerService
{
    public function displayWelcomeMessage(User | Customer $entity): void
    {
        if ($entity instanceof User) {
            printf("Hello, %s %s", strtoupper($entity->name), $entity->firstname);
        } elseif ($entity instanceof Customer) {
            printf("Welcome again, dear %s\n", $entity->fullname);
        }
    }
}

$user = new User('Lucien', 'Bramard');
$customer = new Customer('Mr Elliot Alderson');

$accountDisplayer = new AccountDisplayerService();

$accountDisplayer->displayWelcomeMessage($user);
$accountDisplayer->displayWelcomeMessage($customer);