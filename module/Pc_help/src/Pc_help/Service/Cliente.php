<?php

namespace Pc_help\Service;

use Doctrine\ORM\EntityManager;
use Pc_help\Entity\Cliente as clienteService;
use Pc_help\Entity\Configurator;

class Cliente  {
	
   /**
    * @var EntityManager
    */
	protected $em;
	
	public function __construct(EntityManager $em) {
		
		$this->em = $em;
	}

	
	
	public function insert (array $data){
		
		$entity = new clienteService($data);
				
		$this->em->persist($entity);
		$this->em->flush();
		return $entity;
	}
	
	
	
	public function update (array $data){
							//find
							// da set automaticamnete
		$entity = $this->em->getReference('Pc_help\Entity\Cliente', $data['id']);
		$entity = Configurator::configure($entity, $data);
		
		
		$this->em->persist($entity);
		$this->em->flush();
		
		return $entity;
	}
	
	
	public function delete (array $data){
		$entity = $this->em->getReference('Pc_help\Entity\Cliente', $id);
		if ($entity){
			$this->em->remove($entity);
			$this->em->flush();
			return $id;
		
		}
	}
	
	
	
}