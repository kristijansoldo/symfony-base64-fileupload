<?php


namespace App\Factory;


use App\Dto\DamageReport\DamageReportRequestDto;

/**
 * Interface DamageReportRequestDtoFactoryInterface
 *
 * @package App\Factory
 */
interface DamageReportRequestDtoFactoryInterface
{
    /**
     * @return DamageReportRequestDto
     */
    public function create(): DamageReportRequestDto;
}
