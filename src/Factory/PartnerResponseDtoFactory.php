<?php


namespace App\Factory;


use App\Dto\Partner\PartnerResponseDto;
use App\Entity\Partner;


/**
 * Class PartnerResponseDtoFactory
 *
 * @package App\Factory
 */
class PartnerResponseDtoFactory implements PartnerResponseDtoFactoryInterface
{
    /**
     * Creates damage report dto from entity model.
     *
     * @param Partner $partner
     * @return PartnerResponseDto
     */
    public function create(Partner $partner): PartnerResponseDto
    {
        // Initialize damage report response dto
        $partnerResponseDto = new PartnerResponseDto();

        // Fills with data
        $partnerResponseDto->id = $partner->getId();
        $partnerResponseDto->firmenname = $partner->getCompanyName();
        $partnerResponseDto->anschrift = $partner->getAdress();
        $partnerResponseDto->telefonnummer = $partner->getTelephone();
        $partnerResponseDto->email = $partner->getEmail();

        // Returns damage report response dto
        return $partnerResponseDto;
    }
}
