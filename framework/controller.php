<?php
namespace F3il;
if(!defined('F3IL')) {throw new Error('Erreur Controller.PHP');}
abstract class Controller
{
    protected $defaultActionName ;
    
    /**
     * 
     * @param type $actionName 
     * @throws ControllerError
     */
    public function setDefaultActionName($actionName)
    {
        if(method_exists($this, $actionName.'Action'))
        {
            $this->defaultActionName = $actionName.'Action';
        }
        else 
        {
            throw new ControllerError('La méthode n\'existe pas !',get_class($this),$actionName);
        }
    }
    public function getDefaultActionName()
    {
        return $this->defaultActionName;
    }
}