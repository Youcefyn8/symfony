<?php

namespace App\Repository;

use App\Entity\Writer;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Writer>
 *
 * @method Writer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Writer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Writer[]    findAll()
 * @method Writer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WriterRepository extends ServiceEntityRepository
{
    use ProfileTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Writer::class);
    }

    public function add(Writer $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Writer $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByUser(User $user): ?Writer
    {
        return $this->__findByUser($user);
    }

//    /**
//     * @return Writer[] Returns an array of Writer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Writer
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}