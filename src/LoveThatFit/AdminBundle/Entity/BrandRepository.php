<?php

namespace LoveThatFit\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BrandRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BrandRepository extends EntityRepository {
    /* -----------------------------------------------------------------
      Written:Suresh
      Description: Find all Brands with limit and sort
      param:limit, page_number,limit,sort
      ------------------------------------------------------------------ */

    public function findAllBrand($page_number = 0, $limit = 0, $sort = 'id') {


        if ($page_number <= 0 || $limit <= 0) {
            $query = $this->getEntityManager()
                    ->createQuery('SELECT b.id,b.name,b.image FROM LoveThatFitAdminBundle:Brand b ORDER BY b.' . $sort . ' ASC');
        } else {
            $query = $this->getEntityManager()
                    ->createQuery('SELECT b.id,b.name,b.image FROM LoveThatFitAdminBundle:Brand b ORDER BY b.' . $sort . ' ASC')
                    ->setFirstResult($limit * ($page_number - 1))
                    ->setMaxResults($limit);
        }
        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return "null";
        }
    }

    /* -----End Of Function----------------- */

    /* -----------------------------------------------------------------
      Written:Suresh
      Description:Count all Records
      param:limit:
     * ------------------------------------------------------------------ */

    public function countAllRecord() {
        $total_record = $this->getEntityManager()
                ->createQuery('SELECT b FROM LoveThatFitAdminBundle:Brand b');
        try {
            return $total_record->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

//duplicate method	 
    public function findBrandBy($name) {
        $total_record = $this->getEntityManager()
                        ->createQuery("SELECT b FROM LoveThatFitAdminBundle:Brand b     
        WHERE
        b.name = :name"
                        )->setParameters(array('name' => $name));
        try {
            return $total_record->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    //--------------------------------------------------------------------------

    public function findOneByName($name) {
        $record = $this->getEntityManager()
                        ->createQuery("SELECT b FROM LoveThatFitAdminBundle:Brand b     
                                WHERE b.name = :name")
                        ->setParameters(array('name' => $name));
        try {
            return $record->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    //---------------------------------------------------------------------------


    public function listAllBrand($page_number = 0, $limit = 0, $sort = 'id') {


        if ($page_number <= 0 || $limit <= 0) {
            $query = $this->getEntityManager()
                    ->createQuery('SELECT b FROM LoveThatFitAdminBundle:Brand b ORDER BY b.' . $sort . ' ASC');
        } else {
            $query = $this->getEntityManager()
                    ->createQuery('SELECT b FROM LoveThatFitAdminBundle:Brand b ORDER BY b.' . $sort . ' ASC')
                    ->setFirstResult($limit * ($page_number - 1))
                    ->setMaxResults($limit);
        }
        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return "null";
        }
    }

    #---------------------------Brand List For Web Service-----------------------------------#

    public function findAllBrandWebService() {

        $query = $this->getEntityManager()->createQuery("SELECT b.id as id, b.name as name,'brand' AS type,b.image as image FROM LoveThatFitAdminBundle:Brand b
            WHERE b.disabled=0 ORDER BY name asc");
        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

}
