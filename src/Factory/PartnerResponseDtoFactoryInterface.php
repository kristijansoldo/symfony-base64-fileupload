<?php


namespace App\Factory;

use App\Dto\Partner\PartnerResponseDto;
use App\Entity\Partner;

/**
 * Interface PartnerResponseDtoFactoryInterface
 *
 * @package App\Factory
 */
interface PartnerResponseDtoFactoryInterface
{
    /**
     * Creates dto from entity model.
     *
     * @param Partner $partner
     * @return PartnerResponseDto
     */
    public function create(Partner $partner): PartnerResponseDto;
}
