<?php


namespace App\Service;

use App\Dto\DamageReport\DamageReportRequestDto;
use App\Dto\DamageReport\DamageReportResponseDto;

/**
 * Interface DamageReportServiceInterface
 *
 * @package App\Service
 */
interface DamageReportServiceInterface
{
    /**
     * Creates damage report.
     *
     * @param DamageReportRequestDto $damageReportRequestDto
     * @return DamageReportResponseDto
     */
    public function create(DamageReportRequestDto $damageReportRequestDto): DamageReportResponseDto;

    /**
     * Get all damage reports.
     *
     * @return array|DamageReportResponseDto[]
     */
    public function getAll(): array;
}
