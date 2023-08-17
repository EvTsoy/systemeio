<?php

namespace App\Service;


use App\Entity\Tax;
use App\Repository\TaxRepository;

class TaxNumberValidator
{
    public function __construct(private TaxRepository $taxRepository) {}

    public function validate(string $taxNumber): Tax | bool {
        $countryCode = strtoupper(substr($taxNumber, 0, 2));
        $country = $this->taxRepository->findOneBy([
            'countryCode' => $countryCode
        ]);

        if (!$country) {
            return false;
        }
        return $country;
    }
}