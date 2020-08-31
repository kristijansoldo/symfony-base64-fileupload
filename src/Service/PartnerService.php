<?php


namespace App\Service;


use App\Dto\Partner\PartnerRequestDto;
use App\Dto\Partner\PartnerResponseDto;
use App\Entity\Partner;
use App\Factory\PartnerResponseDtoFactoryInterface;
use App\Repository\PartnerRepository;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;

/**
 * Class PartnerService
 *
 * @package App\Service
 */
class PartnerService implements PartnerServiceInterface
{
    /**
     * @var PartnerResponseDtoFactoryInterface
     */
    private $partnerResponseDtoFactory;

    /**
     * @var PartnerRepository
     */
    private $partnerRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * PartnerService constructor.
     *
     * @param PartnerResponseDtoFactoryInterface $partnerResponseDtoFactory
     * @param PartnerRepository $partnerRepository
     * @param LoggerInterface $logger
     */
    public function __construct(PartnerResponseDtoFactoryInterface $partnerResponseDtoFactory, PartnerRepository $partnerRepository, LoggerInterface $logger)
    {
        $this->partnerResponseDtoFactory = $partnerResponseDtoFactory;
        $this->partnerRepository = $partnerRepository;
        $this->logger = $logger;
    }

    /**
     * Creates partner.
     *
     * @param PartnerRequestDto $partnerRequestDto
     * @return PartnerResponseDto
     */
    public function create(PartnerRequestDto $partnerRequestDto): PartnerResponseDto
    {
        // Initialize partner model
        $partner = new Partner();

        // Fills with data
        $partner->setCompanyName($partnerRequestDto->firmenname);
        $partner->setAdress($partnerRequestDto->anschrift);
        $partner->setTelephone($partnerRequestDto->telefonnummer);
        $partner->setEmail($partnerRequestDto->email);

        try {
            // Create partner
            $createdPartner = $this->partnerRepository->create($partner);

            // Returns partner response dto
            return $this->partnerResponseDtoFactory->create($createdPartner);

        } catch (ORMException $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * Get all partners.
     *
     * @return array|PartnerResponseDto[]
     */
    public function getAll(): array
    {
        // Gets all partners from db
        $partners = $this->partnerRepository->findAll();

        // Defines empty partner response dtos
        $partnerResponseDtos = [];

        // Foreach through partners and create dto
        foreach ($partners as $partner) {
            $partnerResponseDtos[] = $this->partnerResponseDtoFactory->create($partner);
        }

        // Returns partner response dtos
        return $partnerResponseDtos;
    }
}
