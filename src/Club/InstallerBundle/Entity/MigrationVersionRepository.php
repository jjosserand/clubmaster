<?php

namespace Club\InstallerBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MigrationVersionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MigrationVersionRepository extends EntityRepository
{
    public function getLatest()
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.version', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
