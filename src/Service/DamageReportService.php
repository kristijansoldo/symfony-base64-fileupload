<?php


namespace App\Service;


use App\Dto\DamageReport\DamageReportRequestDto;
use App\Dto\DamageReport\DamageReportResponseDto;
use App\Entity\DamageReport;
use App\Factory\DamageReportResponseDtoFactoryInterface;
use App\Repository\DamageReportRepository;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;

/**
 * Class DamageReportService
 *
 * @package App\Service
 */
class DamageReportService implements DamageReportServiceInterface
{
    /**
     * @var DamageReportResponseDtoFactoryInterface
     */
    private $damageReportResponseDtoFactory;

    /**
     * @var DamageReportRepository
     */
    private $damageReportRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * DamageReportService constructor.
     *
     * @param DamageReportResponseDtoFactoryInterface $damageReportResponseDtoFactory
     * @param DamageReportRepository $damageReportRepository
     */
    public function __construct(DamageReportResponseDtoFactoryInterface $damageReportResponseDtoFactory, DamageReportRepository $damageReportRepository, LoggerInterface $logger)
    {
        $this->damageReportResponseDtoFactory = $damageReportResponseDtoFactory;
        $this->damageReportRepository = $damageReportRepository;
        $this->logger = $logger;
    }

    /**
     * Creates damage report.
     *
     * @param DamageReportRequestDto $damageReportRequestDto
     * @return DamageReportResponseDto
     */
    public function create(DamageReportRequestDto $damageReportRequestDto): DamageReportResponseDto
    {
        // Initialize damage report model
        $damageReport = new DamageReport();

        // Fills with data
        $damageReport->setFirstName($damageReportRequestDto->vorname);
        $damageReport->setSurName($damageReportRequestDto->nachname);
        $damageReport->setAdress($damageReportRequestDto->anschrift);
        $damageReport->setTelephone($damageReportRequestDto->telefonnummer);
        $damageReport->setEmail($damageReportRequestDto->email);
        $damageReport->setKfzInsurance($damageReportRequestDto->kfz_versicherung);
        $damageReport->setPartnerId($damageReportRequestDto->partner_id);
        $damageReport->setPhotoPath($damageReportRequestDto->bild_location);

        try {
            // Create damage report
            $createdDamageReport = $this->damageReportRepository->create($damageReport);

            // Returns damage report response dto
            return $this->damageReportResponseDtoFactory->create($createdDamageReport);

        } catch (ORMException $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * Get all damage reports.
     *
     * @return array|DamageReportResponseDto[]
     */
    public function getAll(): array
    {
        // Gets all damage reports from db
        $damageReports = $this->damageReportRepository->findAll();

        // Defines empty damage report response dtos
        $damageReportResponseDtos = [];

        // Foreach through damage reports and create dto
        foreach ($damageReports as $damageReport) {
            $damageReportResponseDtos[] = $this->damageReportResponseDtoFactory->create($damageReport);
        }

        // Returns damage report response dtos
        return $damageReportResponseDtos;
    }
}
