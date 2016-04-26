<?php
	//
	class WebApplicationBehavior extends CBehavior 
	{
	    private $name;
	 
	    public function getName()
	    {
	        return $this -> name;
	    }
	 
	    public function runEnd($name)
	    {
	        $this -> name = $name;
	 
	        $this -> onModuleCreate = array($this, 'changeModulePaths');
	        $this -> onModuleCreate(new CEvent($this -> owner));
	 
	        $this -> owner -> run();
	    }
	 
	    public function onModuleCreate($event)
	    {
	        $this -> raiseEvent('onModuleCreate', $event);
	    }
	 
	    protected function changeModulePaths($event)
	    {
	        $event -> sender -> controllerPath .= '/' . $this -> name;
	        $event -> sender -> viewPath .= '/' . $this -> name;
	    }
	}
