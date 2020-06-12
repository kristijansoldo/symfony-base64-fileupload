<?php


namespace App\Factory;

use App\Dto\DamageReport\DamageReportResponseDto;
use App\Entity\DamageReport;

/**
 * Interface DamageReportResponseDtoFactoryInterface
 *
 * @package App\Factory
 */
interface DamageReportResponseDtoFactoryInterface
{
    /**
     * Creates dto from entity model.
     *
     * @param DamageReport $damageReport
     * @return DamageReportResponseDto
     */
    public function create(DamageReport $damageReport): DamageReportResponseDto;
}
