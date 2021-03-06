<?php
// src/Acme/TaskBundle/Entity/Task.php
namespace Acme\TaskBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TaskBundle\Entity\Task
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class Task
{
     
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    protected $id;

    /**
     * @var string $task
     *
     * @ORM\Column(name="task", type="string", length=255)
     */
        
    protected $task;

    /**
     * @var string $dueDate
     *
     * @ORM\Column(name="dueDate", type="string", length=255)
     */
    
    protected $dueDate;

     /**
     * Get task
     *
     * @return string 
     */
    public function getTask()
    {
        return $this->task;
    }
    
     /**
     * Set task
     *
     * @param string $task
     * @return task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}