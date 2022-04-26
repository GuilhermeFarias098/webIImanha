<?php
namespace APP\Model;

class Ticket
{
    // Attributes
    private int $id;
    private float $price;
    private string $seat;
    private bool $free;

    // Methods
    public function __construct(int $id, float $price, string $seat)
    {
        $this->id = $id;
        $this->price = $price;
        $this->seat = $seat;
        $this->free = true;
    }

    public function saleTicket(string $seat, int $typeOfUser): string
    {
        if (!$this->free) {
            return "Assento não disponível";
        }
        $salePrice = $this->price - self::calculateDiscount($typeOfUser);

        $this->free = false;

        return "Obrigado por adquirir o assento $this->seat. O total do ingresso é R$ $salePrice";
    }

    public function calculateDiscount(int $typeOfUser): float
    {
        switch ($typeOfUser) {
            case 1: // Standard User
                return $this->price;
            case 2: // Student User
                return $this->price * 0.5;
            case 3: // VIP User
                return $this->price * 0.7;
            default:
                return 0;
        }
    }
}
