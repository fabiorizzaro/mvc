<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author QZ54GL
 */
interface intefaceDAO {
  
    function inserir($objectDTO);
    
    function deletar ($key, $field);
    
    function update ($objectDTO);
            
    function quickSearch ($SQL);
}

