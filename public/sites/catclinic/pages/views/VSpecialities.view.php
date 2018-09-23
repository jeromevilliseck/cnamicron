<?php

class VSpecialities extends VGlobal{

    public function showList($_data){

        //Boucle sur tuples
        $tr = '';

        foreach ($_data as $val){
            ($val['ID_SPECIALITY'] != NULL) ? $specialityId = '<span>'.$val['ID_SPECIALITY'].'</span>' : $specialityId = NULL;
            ($val['SPECIALITY'] != NULL) ? $specialityName = '<span>'.$val['SPECIALITY'].'</span>' : $specialityName = NULL;
            ($val['SPECIALITY_DESCRIPTION'] != NULL) ? $specialityDescription = '<span>'.$val['SPECIALITY_DESCRIPTION'].'</span>' : $specialityDescription = NULL;

            $tr .= '<article>
                        <header>
                            <h3>Spécialité n°'.$specialityId.'</h3></header>
                        <section>
                            <h4>'.$specialityName.'</h4>
                            '.$specialityDescription.' 
                        </section>
                    </article>
            '; /*Attention ne pas englober $specialityDescription dans des balises <p>, car les listes et autres elements de type block inline block
            doivent être au même niveau que les paragraphes en imbrication, placer les balises de ce type directement dans l'occurence SQL*/
        }

        echo <<<HERE
        <br/>
            $tr
HERE;
    }


    //Affichage de la vue en mode administrateur
    public function showListAdmin($_data){
        //Boucle sur tuples
        $tr = '';

        foreach ($_data as $val){
            ($val['ID_SPECIALITY'] != NULL) ? $specialityId = '<span>'.$val['ID_SPECIALITY'].'</span>' : $specialityId = NULL;
            ($val['SPECIALITY'] != NULL) ? $specialityName = '<span>'.$val['SPECIALITY'].'</span>' : $specialityName = NULL;
            ($val['SPECIALITY_DESCRIPTION'] != NULL) ? $specialityDescription = '<span>'.$val['SPECIALITY_DESCRIPTION'].'</span>' : $specialityDescription = NULL;

            //Variable spécifique à l'administrateur
            ($val['ID_SPECIALITY'] != NULL) ? $adminId = $val['ID_SPECIALITY'] : $adminId = NULL;

            $tr .= '<article>
                        <header>
                            <h3>Spécialité n°'.$specialityId.'</h3></header>
                        <section>
                            <h4>'.$specialityName.'</h4>
                            '.$specialityDescription.' 
                        </section>
                        <footer>
                            <a href="../controllers/index.php?EX=spec_ins&amp;ID_SPECIALITY='.$adminId.'" class="button">Modifier</a>
                        </footer>
                    </article>
            '; /*Attention ne pas englober $specialityDescription dans des balises <p>, car les listes et autres elements de type block inline block
            doivent être au même niveau que les paragraphes en imbrication, placer les balises de ce type directement dans l'occurence SQL*/
        }

        echo <<<HERE
        <br/>
            <a href="../controllers/index.php?EX=spec_ins" class="success button">Insérer</a>
        
            $tr
HERE;
    }


    //Formulaire de modification en mode administrateur
    public function showFormAdmin($_data){
        if ($_data){
            $ex = 'upd_ok';
            $id_speciality = $_data['ID_SPECIALITY'];
            $speciality = $_data['SPECIALITY'];
            $speciality_description = $_data['SPECIALITY_DESCRIPTION'];
        }
        else
        {
            $ex = 'ins_ok';
            $id_speciality = '';
            $speciality = '';
            $speciality_description = '';
        }

        echo <<<HERE
    <br/>
<form action="../controllers/index.php?EX=spec_$ex" method="post">
<input type="hidden" name="ID_SPECIALITY" value="$id_speciality" />
 <p>
  <label for="specialite">Spécialité</label>
  <input type="text" id="specialite" name="SPECIALITY" value="$speciality" autofocus required />
 </p>
 <p>
  <label for="description">Description</label>
  <textarea id="description" name="SPECIALITY_DESCRIPTION" rows="10" required>$speciality_description</textarea>
 </p>
 <p><input type="submit" value="Enregistrer" class="success button"/></p>
</form>
<p><a href="../controllers/index.php?EX=spec_del&amp;ID_SPECIALITY=$id_speciality" class="alert button">Supprimer</a></p>
HERE;

        return;

    }
}