<?php

/**
 * Tipoinvestigador
 *  
 * @author Marcos
 * @since 20-11-2013
 */


class Tipoinvestigador  extends Entity{

    //variables de instancia.

    private $ds_tipoinvestigador;
    

    public function __construct(){
    	
    	$this->ds_tipoinvestigador = "";
    }
    
    
    public function getDs_tipoinvestigador()
    {
        return $this->ds_tipoinvestigador;
    }

    public function setDs_tipoinvestigador($ds_tipoinvestigador)
    {
        $this->ds_tipoinvestigador = $ds_tipoinvestigador;
    }

}
?>