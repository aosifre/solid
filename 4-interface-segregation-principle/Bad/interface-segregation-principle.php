<?php
/**
 * Interface Segregation Principle (ISP) in PHP (not working)
 */

// ❌ We have only 1 interface for 2 different needs.
interface EntityInterface
{
    public function getId(): int;
    public function getName(): string;
    public function serializeToApi(): string;
}

/**
 * Class User
 *
 * The class should be displayed in front-end, so getId() and getName() are mandatory.
 * The class should be sent to a web service, the function serializeToApi() is mandatory.
 */
class User implements EntityInterface
{
    private int $id;
    private int $name;

    public function serializeToApi(): string
    {
        return json_encode($this);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): int
    {
        return $this->name;
    }

    public function setName(int $name): void
    {
        $this->name = $name;
    }
}

/**
 * Class Order
 *
 * The class order is only used to display orders from the user, no modification allowed.
 * The class DOES NOT need serializeToApi().
 */
class Order implements EntityInterface
{
    private int $id;
    private int $name;

    // ❌ The function is not needed, but since it is in our interface, we have to implement it.
    public function serializeToApi(): string
    {
        return "";
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): int
    {
        return $this->name;
    }
}