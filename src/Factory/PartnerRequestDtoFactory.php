<?php


namespace App\Factory;

use App\Dto\Partner\PartnerRequestDto;

/**
 * Class PartnerRequestDtoFactory
 *
 * @package App\Factory
 */
class PartnerRequestDtoFactory extends RequestDtoFactory implements PartnerRequestDtoFactoryInterface
{
    /**
     * Creates request dto.
     *
     * @return PartnerRequestDto
     */
    public function create(): PartnerRequestDto
    {
        // Initialize dto
        $requestDto = new PartnerRequestDto();

        // Returns populated object properties
        return $this->populateObjectProperties($requestDto);
    }
}
