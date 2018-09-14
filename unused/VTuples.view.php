<?php
class VTuples extends VGlobal{

    //TODO Ancienne version de la classe présence de code noir
    public function showAllTuples($_data)
    {
        // Boucle sur les tuples racines de la table passée en paramètre du lors de l'instanciation d'un objet sur une classe de type Mod
        $tr = '';
        foreach ($_data as $val)
        {
            ($val['ID'] != NULL) ? $lessonNumber = '<span class="pure-lesson-button"> '.$val['LESSON_NUMBER'].'</span>   ' : $lessonNumber = "";
            ($val['LESSON_NAME'] != NULL) ? $lessonName = '<a class="pure-link" href="javascript:toggle' .$val['ID'].'()">' .$val['LESSON_NAME'].'</a>' : $lessonName = '';

            ($val['ID'] != NULL) ? $divStart = '<div id="toggleText'.$val['ID'].'" style="display: none">' : $divStart = '';
            ($val['ID'] != NULL) ? $divEnd = '</div>' : $divEnd = '';

            ($val['LESSON_ANCHOR'] != NULL) ? $lessonAnchor = 'id="'.$val['LESSON_ANCHOR'].'"' : $lessonAnchor = '';
            ($val['LESSON_COLOR'] != NULL) ? $lessonColor = 'class="'.$val['LESSON_COLOR'].'"' : $lessonColor = "";
            ($val['LESSON_CHAPTER'] != NULL) ? $lessonChapter = $val['LESSON_CHAPTER'] : $lessonChapter = "";
            ($val['LESSON_TABLE'] != NULL) ? $lessonLink = '<a class="pure-lesson-link" href="main.php?EX=select&amp;ID='.$val['ID'].'&amp;TABLE='.$val['LESSON_TABLE'].'">&#10140;</a>' : $lessonChapter = "";

            ($val['LESSON_FILE_VIDEOLINK'] != NULL) ? $lessonVideoLink = '
            <p>
				<div class="wrapper">
					<div class="youtube" data-embed="'.$val['LESSON_FILE_VIDEOLINK'].'">
						<div class="play-button"></div>
					</div>
				</div>
			</p>
			' : $lessonVideoLink = '' ;

            ($val['LESSON_DETAILS'] != NULL) ? $lessonDetails = '<div>'.$val['LESSON_DETAILS'].'</div>' : $lessonDetails = "";
            ($val['LESSON_KEYWORDS'] != NULL) ? $lessonKeywords = '<p><span class="pure-lesson-cap">Mots-clés</span></p><p>'.$val['LESSON_KEYWORDS'].'</p>' : $lessonKeywords = "";

            ($val['LESSON_FILE_PREVIEW'] != NULL) ? $linkFileLinkPreview = '<p><a href="../../public/files/'.$val['LESSON_FILE_LINK'].'"><div style="text-align:center;"><img src="../../public/img/'.$val['LESSON_FILE_PREVIEW'].'" alt="'.$val['LESSON_FILE_PREVIEW'].'" /></div></a></p>' : $linkFileLinkPreview = '';

            (($val['LESSON_FILE_LINK'] != NULL) || ($val['LESSON_FILE_PROJECT_ZIP'] != NULL)/* || ($val['LESSON_FILE_DBTABLES'] != NULL) || ($val['LESSON_FILE_DEMO'] != NULL) || ($val['LESSON_FILE_SOFTWARE'] != NULL)*/) ? $lessonFileLink = '<p><span class="pure-lesson-cap">Fichiers</span></p>' : $lessonFileLink = '';
            ($val['LESSON_FILE_LINK'] != NULL) ? $logoPdf = '<img src="../../public/img/icon_pdf.png"/>' : $logoPdf = "";
            ($val['LESSON_FILE_LINK'] != NULL) ? $linkFile = '<a href="../../public/files/'.$val['LESSON_FILE_LINK'].'">' : $linkFile = "";
            ($val['LESSON_FILE_LINK'] != NULL) ? $linkFileNamed = basename($val['LESSON_FILE_LINK'], "../../public/files/") : $linkFileNamed = "";
            ($val['LESSON_FILE_LINK'] != NULL) ? $linkFileEnd = '</a><br />' : $linkFileEnd = "";

            ($val['LESSON_FILE_PROJECT_ZIP'] != NULL) ? $logoZip = '<img src="../../public/img/icon_zip.gif"/>' : $logoZip = "";
            ($val['LESSON_FILE_PROJECT_ZIP'] != NULL) ? $linkZip = '<a href="../../public/files/'.$val['LESSON_FILE_PROJECT_ZIP'].'">' : $linkZip = "";
            ($val['LESSON_FILE_PROJECT_ZIP'] != NULL) ? $linkZipNamed = ' '.basename($val['LESSON_FILE_PROJECT_ZIP'], ".7z").' ' : $linkZipNamed = "";
            ($val['LESSON_FILE_PROJECT_ZIP'] != NULL) ? $linkZipEnd = '</a><br />' : $linkZipEnd = "";

			/* Attributs SQL pour l'instant inutilisés ci-dessous
            ($val['LESSON_FILE_DBTABLES'] != NULL) ? $logoDBTable = '<img src="../../public/img/icon_zip.gif"/>' : $logoDBTable = "";
            ($val['LESSON_FILE_DBTABLES'] != NULL) ? $linkDBTable = '<a href="../../public/files/'.$val['LESSON_FILE_DBTABLES'].'">' : $linkDBTable = "";
            ($val['LESSON_FILE_DBTABLES'] != NULL) ? $linkDBTableNamed = ' Tables SQL nécessaires' : $linkDBTableNamed = "";
            ($val['LESSON_FILE_DBTABLES'] != NULL) ? $linkDBTableEnd = '</a><br />' : $linkDBTableEnd = "";

            ($val['LESSON_FILE_DEMO'] != NULL) ? $logoDemo = '<img src="../../public/img/icon_zip.gif"/>' : $logoDemo = "";
            ($val['LESSON_FILE_DEMO'] != NULL) ? $linkDemo = '<a href="../../public/files/'.$val['LESSON_FILE_DEMO'].'">' : $linkDemo = "";
            ($val['LESSON_FILE_DEMO'] != NULL) ? $linkDemoNamed = ' Tables SQL nécessaires' : $linkDemoNamed = "";
            ($val['LESSON_FILE_DEMO'] != NULL) ? $linkDemoEnd = '</a><br />' : $linkDemoEnd = "";

            ($val['LESSON_SOFTWARE'] != NULL) ? $logoSoftware = '<img src="../../public/img/icon_zip.gif"/>' : $logoSoftware = "";
            ($val['LESSON_SOFTWARE'] != NULL) ? $linkSoftware = '<a href="../../public/files/'.$val['LESSON_FILE_SOFTWARE'].'">' : $linkSoftware = "";
            ($val['LESSON_SOFTWARE'] != NULL) ? $linkSoftwareNamed = ' Tables SQL nécessaires' : $linkSoftwareNamed = "";
            ($val['LESSON_SOFTWARE'] != NULL) ? $linkSoftwareEnd = '</a><br />' : $linkSoftwareEnd = "";
			*/

            ($val['LESSON_CODE'] != NULL) ? $lessonCode = '<p><span class="pure-lesson-cap">Code source</span></p><div>'.$val['LESSON_CODE'].'</div>' : $lessonCode='';

            // Concaténation avec l'ancre et le titre de la catégorie
            $tr .= '
        <h2>'.$lessonNumber.''.$lessonName.'</h2>                                       				<!-- Titre avec un conteneur pour le numero de la lesson suivi du titre de la lesson -->
        '.$divStart.'                                                                   				<!-- Balise contenant un attribut javascript -->
        <div '.$lessonAnchor.'><aside '.$lessonColor.'>'.$lessonChapter.' '.$lessonLink.'</aside></div>   	<!-- Titre de couleur avec en contenu le chapitre (ancre et couleur tout les 2 un attribut) -->
          '.$lessonVideoLink.''.$linkFileLinkPreview.'                                  				<!-- Image ou video (selon le contenu du tuple) -->

        '.wordwrap($lessonDetails, 100, "\n").'                             							<!-- Détails de la lesson (dans un div) -->
        '.$lessonKeywords.'                                                             				<!-- Mots-clés (dans un div) -->
        '.$lessonCode.'                                                                 				<!-- Exemples de code source (dans un div) -->

        '.$lessonFileLink.'                                                             				<!-- Fichiers (le mot seulement encadré) -->
        '.$logoPdf.''.$linkFile.' '.$linkFileNamed.''.$linkFileEnd.'                     				<!-- Fichier pdf -->
        '.$logoZip.''.$linkZip.''.$linkZipNamed.''.$linkZipEnd./*'                        				<!-- Archive compressée -->
        '.$logoDBTable.''.$linkDBTable.''.$linkDBTable.''.$linkDBTable.'                				<!-- Tables SQL -->
        '.$logoDemo.''.$linkDemo.''.$linkDemo.''.$linkDemo.'                            				<!-- Démonstration -->
        '.$logoSoftware.''.$linkSoftware.''.$linkSoftware.''.$linkSoftware.'            				<!-- Logiciels nécessaires -->

        '.*/$divEnd.'';
        }

        echo <<<HERE
            $tr
HERE;

    }

    public function showTuple($_data) {
        if ($_data) {
            $lessonNumber    	= $_data['LESSON_NUMBER'];
            $lessonChapter   	= $_data['LESSON_CHAPTER'];
            $lessonDetails  	= $_data['LESSON_DETAILS'];
            $lessonKeywords 	= $_data['LESSON_KEYWORDS'];
            
            ($_data['LESSON_FILE_PREVIEW'] != NULL) ? $lessonFilePreview = '<a href="../../public/files/'.$_data['LESSON_FILE_LINK'].'"><div style="text-align:center;"><img src="../../public/img/'.$_data['LESSON_FILE_PREVIEW'].'" alt="'.$_data['LESSON_FILE_PREVIEW'].'" /></div></a>' : $lessonFilePreview = NULL ;
            ($_data['LESSON_FILE_LINK'] != NULL) ? $lessonFileLink = '<img src="../../public/img/icon_pdf.png"/> <a href="../../public/files/'.$_data['LESSON_FILE_LINK'].'">'.basename($_data['LESSON_FILE_LINK'], "../../public/files/").'</a>' : $lessonFileLink = NULL ;
            ($_data['LESSON_FILE_VIDEOLINK'] != NULL) ? $lessonVideoLink = '<p><div class="wrapper"><div class="youtube" data-embed="'.$_data['LESSON_FILE_VIDEOLINK'].'"><div class="play-button"></div></div></div></p>' : $lessonVideoLink = '' ;
            ($_data['LESSON_CODE'] != NULL) ? $lessonCode ='<div><h3><span class="pure-lesson-cap">Code source de la leçon</span></h3>'.$_data['LESSON_CODE'].'</div>' : $lessonCode = '' ;
            
        } else {
            $lessonNumber    	= '';
            $lessonChapter   	= '';
            $lessonDetails  	= '';
            $lessonKeywords 	= '';
            $lessonFilePreview	= '';
            $lessonFileLink    	= '';
            $lessonVideoLink	= '';
        }

        echo <<<HERE
    <div class="pure-lesson-file-preview">$lessonFilePreview $lessonVideoLink</div>
    <div>$lessonDetails</div>
    <div>$lessonKeywords</div>
    <div class="pure-lesson-link-preview">$lessonFileLink</div>
    $lessonCode
HERE;
}

}
