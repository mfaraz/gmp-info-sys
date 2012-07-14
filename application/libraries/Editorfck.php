<?php
require_once ('plugins/fckeditor/fckeditor.php');
class Editorfck
{
	public function load($name = null, $value = null, $width, $height)
    {        
		if(is_null($name) && is_null($value) && is_null($attribs)) { 
            return $this; 
        } 
         
        $editor = new FCKeditor($name); 
        // set variables
        $editor->BasePath   = 'http://explorersrilanka.indisil.com/plugins/fckeditor/' ;
        
        //$editor->ToolbarSet = empty($attribs['ToolbarSet']) ? 'Basic' : $attribs['ToolbarSet']; 
        $editor->ToolbarSet = 'Basic';
        
        $editor->Width      = empty($width) ? '95%' : $width; 
        $editor->Height     = empty($height) ? 250 : $height; 
        $editor->Value      = $value;
         
        // set Config         
        $editor->Config['BaseHref'] = $editor->BasePath;
        $editor->Config['CustomConfigurationsPath'] = $editor->BasePath.'editor/fckconfig.js'; 
        $editor->Config['SkinPath'] = $editor->BasePath.'editor/skins/silver/';         
        echo $editor->createHtml();
    }
}