<?php

namespace App\Repository;

use App\Entity\ResultLoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResultLoto>
 *
 * @method ResultLoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResultLoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResultLoto[]    findAll()
 * @method ResultLoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultLotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResultLoto::class);
    }

    public function save(ResultLoto $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResultLoto $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ResultLoto[] Returns an array of ResultLoto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ResultLoto
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findAll() {
        return $this->createQueryBuilder("r")
            ->getQuery()
            ->getResult();
    }

}
