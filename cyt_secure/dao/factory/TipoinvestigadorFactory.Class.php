<?php

/**
 * Factory para Tipoinvestigador
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoinvestigadorFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Tipoinvestigador');
        $tipoinvestigador = parent::build($next);
        if(array_key_exists('cd_tipoinvestigador',$next)){
        	$tipoinvestigador->setOid( $next["cd_tipoinvestigador"] );
        }

        return $tipoinvestigador;
    }

}
?>
