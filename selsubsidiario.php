<?php

include("tool.php");

SimpleAutentificacionAutomatica("visual-xulframe");

StartXul(_("Elige proveedor"));

switch($modo){
	case "subsidiariohab":
			
		echo "<groupbox flex='1'><caption label='" . _("FLETADOR:") . "'/>";		
                echo "<textbox id='buscaproveedor'  onkeyup='BuscaSubsidiario(); if (event.which == 13) agnadirDirecto();' />";
		$subsidiarios = genArraySubsidiarios();		
		echo "<script>\n";
		echo " subsidhav =new Object();\n";
		foreach ($subsidiarios as $key=>$value){
			echo "subsidhav[$key] = '$value';\n";			
		}
		echo "\n</script>";						
				
		echo "<listbox flex='1' id='Proveedor' rows='5' onclick='opener.changeSubsidHab(this,subsidhav[this.value]);window.close();return true;'>";
		echo  genXulComboSubsidiarios();				
		echo "</listbox>";
		echo "<button label='". _("Cerrar")."' oncommand='window.close()'/>";	
		echo "</groupbox>";
		
		break;				
	case "subsidiariopost":
			
		echo "<groupbox flex='1'><caption label='" . _("FLETADOR:") . "'/>";		
                echo "<textbox id='buscaproveedor'  onkeyup='BuscaSubsidiario(); if (event.which == 13) agnadirDirecto();' />";
		$subsidiarios = genArraySubsidiarios();		
		echo "<script>\n";
		echo " subsidhav =new Object();\n";
		foreach ($subsidiarios as $key=>$value){
			echo "subsidhav[$key] = '$value';\n";			
		}
		echo "\n</script>";						
				
		echo "<listbox flex='1' id='Proveedor' rows='5' onclick='opener.setSubsidPost(this,subsidhav[this.value]);window.close();return true;'>";
		echo  genXulComboSubsidiarios();				
		echo "</listbox>";
		echo "<button label='". _("Cerrar")."' oncommand='window.close()'/>";	
		echo "</groupbox>";
		
		break;				
	default:
		break;	
}
?>

<script>//<![CDATA[

function BuscaSubsidiario(){
    var elemento = document.getElementById("buscaproveedor");
    var ns = new String(elemento.value);
    ns = ns.toUpperCase();
    var lista = document.getElementById("Proveedor");
    var texto2  = document.getElementsByTagName('listitem');
    if(ns.length >0){
        for (var i=0;i<lista.itemCount;i++){
            var cadena = new String(texto2[i].attributes.getNamedItem('label').nodeValue);
            cadena = cadena.toUpperCase();
            if(cadena == ns){
                lista.ensureIndexIsVisible(i);
                lista.selectedIndex=i;
                lista.onclick();
                return;
            }
            if(cadena.indexOf(ns) != -1){
                lista.ensureIndexIsVisible(i);
                lista.selectedIndex=i;
            }
        }
    }
}

function agnadirDirecto(){
    var theList=document.getElementById('Proveedor');
    if(theList.selectedIndex == -1){
        return;
    }
    theList.onclick();
}
//]]></script>
<?php
EndXul();


?>

