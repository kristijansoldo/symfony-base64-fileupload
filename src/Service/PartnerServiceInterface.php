<?php


namespace App\Service;

use App\Dto\Partner\PartnerRequestDto;
use App\Dto\Partner\PartnerResponseDto;

/**
 * Interface PartnerServiceInterface
 *
 * @package App\Service
 */
interface PartnerServiceInterface
{
    /**
     * Creates partner.
     *
     * @param PartnerRequestDto $partnerRequestDto
     * @return PartnerResponseDto
     */
    public function create(PartnerRequestDto $partnerRequestDto): PartnerResponseDto;

    /**
     * Get all partners.
     *
     * @return array|PartnerResponseDto[]
     */
    public function getAll(): array;
}
