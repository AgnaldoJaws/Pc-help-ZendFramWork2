<?php
namespace Pc_help\Entity;
use Pc_help\Entity\Configurator;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Entity
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="Pc_help\Entity\ClienteRepository")
 *
 */
class Cliente {
	
	public function __construct($options = null)
	{
	Configurator::configure($this, $options);
	
	}


	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
 	protected  $id;
 	
	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */	
    protected $nome;
    
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function setId($id)
    {
    	$this->id = $id;
    }
    
    public function getNome()
    {
    	return $this->nome;
    }
    
    public function setNome($nome)
    {
    	$this->nome = $nome;
    }

	
	
	public function __toString(){
		
		return $this->nome_cliente;
	}
	
	public function toArray (){

		return array(
				'id' => $this->getId(),
				'nome'=>$this->getNome()				
		);
	}
 	

	
}




