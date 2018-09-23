<?php

class VAdvices extends VGlobal
{
    public function showList($_data)
    {
        //Boucle sur tuples
        $tr = '';

        //Création de contenu dynamique
        foreach ($_data as $val) {
            ($val['ID_ADVICE'] != NULL) ? $adviceId = $val['ID_ADVICE'] : $adviceId = NULL;
            ($val['TYPES'] != NULL) ? $adviceTypes = $val['TYPES'] : $adviceTypes = NULL;
            ($val['SHOWED'] != NULL) ? $adviceShowed = $val['SHOWED'] : $adviceShowed = NULL;

            $tr .= '<article><header><h2 id="'.$adviceId.'">'.$adviceId.' : '.$adviceTypes.'</h2></header><section>'.$adviceShowed.'</section></article>';
            //Ajout dans la balise de titre de l'id pour les ancres html
        }

        echo <<<HERE
        <br/>
            $tr
HERE;
    }
}