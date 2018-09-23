<?php

class VDays extends VGlobal
{
    public function showTable($_data){

        //Boucle sur tuples
        $tr = '';

        foreach ($_data as $val){
            ($val['LASTNAME'] != NULL) ? $doctorLastName = $val['LASTNAME'] : $doctorLastName = NULL;
            ($val['PHONENUMBER'] != NULL) ? $doctorPhoneNumber = $val['PHONENUMBER'] : $doctorPhoneNumber = NULL;
            ($val['MAIL'] != NULL) ? $doctorMail = $val['MAIL'] : $doctorMail = NULL;
            ($val['HOURS'] != NULL) ? $doctorHours = $val['HOURS'] : $doctorHours = NULL;
            ($val['DAYNAME'] != NULL) ? $doctorDayName = $val['DAYNAME'] : $doctorDayName = NULL;

            $tr .= '<tr><td class="data-label">'.$doctorDayName.'</td><td class="data-label">'.$doctorLastName.'</td><td class="data-label"><a href="mailto:'.$doctorMail.'">'.$doctorMail.'</a></td><td class="data-label"><a href="tel:(+33)'.$doctorPhoneNumber.'">'.$doctorPhoneNumber.'</a></td><td class="data-label">'.$doctorHours.'</td></tr>';
        }

        echo <<<HERE
        <p>
<table id="table_id" class="display">
    <thead>
    <tr>
        <th class="data-label">Jour de la semaine</th>
        <th class="data-label">Praticien disponible</th>
        <th class="data-label">Mail</th>
        <th class="data-label">Téléphone</th>
        <th class="data-label">Heure d'ouverture</th>
    </tr>
    <tbody>
    $tr
    </tbody>
    </thead>
</table>
</p>
HERE;
    }
}