<?php
/**
 *  Open/Closed Principle in PHP
 */

interface NameableInterface {
    public function theName(): void;
}

class User implements NameableInterface
{
    public $name;
    public $firstname;

    public function __construct(string $firstname, string $name)
    {
        $this->firstname = $firstname;
        $this->name = $name;
    }

    public function theName(): void
    {
        printf("Hello, %s %s", strtoupper($this->name), $this->firstname);
    }
}

class Customer implements NameableInterface
{
    public $fullname;

    public function __construct(string $fullname)
    {
        $this->fullname = $fullname;
    }

    public function theName(): void
    {
        printf("Welcome again, dear %s\n", $this->fullname);
    }
}

class AccountDisplayerService
{
    public function displayWelcomeMessage(NameableInterface $entity): void
    {
        $entity->theName();
    }
}

$user = new User('Lucien', 'Bramard');
$customer = new Customer('Mr Elliot Alderson');

$accountDisplayer = new AccountDisplayerService();

$accountDisplayer->displayWelcomeMessage($user);
$accountDisplayer->displayWelcomeMessage($customer);