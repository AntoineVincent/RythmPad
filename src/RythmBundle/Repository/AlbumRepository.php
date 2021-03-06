<?php

namespace RythmBundle\Repository;

/**
 * AlbumRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AlbumRepository extends \Doctrine\ORM\EntityRepository
{
	public function myFind($string, $limit)

	{
	  	return $this->getEntityManager()->createQuery('SELECT a FROM RythmBundle:Album a  
                WHERE a.titre LIKE :string OR a.artiste LIKE :string')
                ->setParameter('string','%'.$string.'%')
                ->setMaxResults($limit)
                ->getResult();
	}
}
