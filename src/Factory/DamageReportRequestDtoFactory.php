<?php


namespace App\Factory;

use App\Dto\DamageReport\DamageReportRequestDto;

/**
 * Class DamageReportRequestDtoFactory
 *
 * @package App\Factory
 */
class DamageReportRequestDtoFactory extends RequestDtoFactory implements DamageReportRequestDtoFactoryInterface
{
    /**
     * Creates request dto.
     *
     * @return DamageReportRequestDto
     */
    public function create(): DamageReportRequestDto
    {
        // Initialize dto
        $fileUploadRequestDto = new DamageReportRequestDto();

        // Returns populated object properties
        return $this->populateObjectProperties($fileUploadRequestDto);
    }
}
