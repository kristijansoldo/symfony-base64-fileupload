<?php

namespace App\Repository;

use App\Entity\DamageReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DamageReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method DamageReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method DamageReport[]    findAll()
 * @method DamageReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DamageReportRepository extends ServiceEntityRepository
{
    /**
     * DamageReportRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DamageReport::class);
    }

    /**
     * Creates damage report.
     *
     * @param DamageReport $damageReport
     * @return DamageReport
     * @throws ORMException
     */
    public function create(DamageReport $damageReport): DamageReport
    {
        // Persists
        $this->getEntityManager()->persist($damageReport);

        // Flush
        $this->getEntityManager()->flush();

        // Returns entity model
        return $damageReport;
    }

}
