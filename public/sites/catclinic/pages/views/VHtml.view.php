<?php
class VHtml extends VGlobal
{
    public function showHtml($_html)
    {
        (file_exists($_html)) ? include($_html) : include('../../public/html/unknown.html');
        return;
    }  // showHtml($_html)
} //Vhtml