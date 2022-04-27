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
    /**
     * Construtor de objetos Ingresso
     *
     * @param integer $id Código único do ingresso
     * @param float $price Valor sem desconto
     * @param string $seat Número do assento
     */
    public function __construct(int $id, float $price, string $seat)
    {
        $this->id = $id;
        $this->price = $price;
        $this->seat = $seat;
        $this->free = true;
    }

    // Getter
    public function __get($attribute)
    {
        return $this->$attribute;
    }

    // Setter
    public function __set($attribute, $value)
    {
        if (!empty($value)) {
            $this->$attribute = $value;
        }
    }

    // Getter controlado
    public function getPrice()
    {
        return $this->price;
    }

    // Seeter controlado
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function saleTicket(int $typeOfUser): string
    {
        if (!$this->free) {
            return "Assento não disponível";
        }
        $salePrice = $this->price - self::calculateDiscount($typeOfUser);

        $this->free = false;

        return "Obrigado por adquirir o assento $this->seat. O total do ingresso é R$ $salePrice";
    }

    private function calculateDiscount(int $typeOfUser): float
    {
        switch ($typeOfUser) {
            case 2: // Student User
                return $this->price * 0.5;
            case 3: // VIP User
                return $this->price * 0.7;
            default: // Qualquer outra coisa
                return 0;
        }
    }
}
