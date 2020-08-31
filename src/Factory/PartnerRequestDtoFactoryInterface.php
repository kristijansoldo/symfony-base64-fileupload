<?php


namespace App\Factory;


use App\Dto\Partner\PartnerRequestDto;

/**
 * Interface PartnerRequestDtoFactoryInterface
 *
 * @package App\Factory
 */
interface PartnerRequestDtoFactoryInterface
{
    /**
     * @return PartnerRequestDto
     */
    public function create(): PartnerRequestDto;
}
