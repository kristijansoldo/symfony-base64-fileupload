<?php


namespace App\Factory;


use App\Dto\DamageReport\DamageReportResponseDto;
use App\Entity\DamageReport;


/**
 * Class DamageReportResponseDtoFactory
 *
 * @package App\Factory
 */
class DamageReportResponseDtoFactory implements DamageReportResponseDtoFactoryInterface
{
    /**
     * Creates damage report dto from entity model.
     *
     * @param DamageReport $damageReport
     * @return DamageReportResponseDto
     */
    public function create(DamageReport $damageReport): DamageReportResponseDto
    {
        // Initialize damage report response dto
        $damageReportResponseDto = new DamageReportResponseDto();

        // Fills with data
        $damageReportResponseDto->id = $damageReport->getId();
        $damageReportResponseDto->vorname = $damageReport->getFirstName();
        $damageReportResponseDto->nachname = $damageReport->getSurName();
        $damageReportResponseDto->anschrift = $damageReport->getAdress();
        $damageReportResponseDto->telefonnummer = $damageReport->getTelephone();
        $damageReportResponseDto->email = $damageReport->getEmail();
        $damageReportResponseDto->kfz_versicherung = $damageReport->getKfzInsurance();
        $damageReportResponseDto->partner_id = $damageReport->getPartnerId();
        $damageReportResponseDto->bild_location = $damageReport->getPhotoPath();

        // Returns damage report response dto
        return $damageReportResponseDto;
    }
}
