<?php

include("../../tool.php");

SimpleAutentificacionAutomatica("visual-xulframe");

StartXul(_("Elige familia"));

switch($modo){
	case "salvafamilia":
		$nombre = CleanText($_GET["familia"]);
		
		if (strlen($nombre)>1)					
			CrearFamilia($nombre);		
		
		// ....continua....
			
	case "familia":
		echo "<groupbox flex='1'> <caption class='box' label='" . _("Familia") . "'/>";
		
		$familias = genArrayFamilias();
		
		echo "<script>\n";
		echo " fam =new Object();\n";
		foreach ($familias as $key=>$value){
			echo "fam[$key] = '$value';\n";			
		}
		echo "
		function UsarNuevo() {
              
			var url;
			var familia = document.getElementById('nuevafamilia').value;			

            if (!familia || familia == '')
                 return;
            
			url = 'selfamilia.php';
			url = url +'?';
            url = url + 'modo';
            url = url + '=salvafamilia';
            url = url + '&amp;'+'familia=' + familia;
			document.location.href = url			
		}
		";
		echo "\n</script>";						
						
		echo "<listbox id='Familia' flex='1'  onclick='parent.change(this,fam[this.value]);parent.closepopup();return true;'>";
		echo  genXulComboFamilias();				
		echo "</listbox>";
		echo "</groupbox>";
		echo "<groupbox>"."<caption class='box' label='" . _("Nueva familia") . "'/>";		
		echo "<textbox id='nuevafamilia'/>";
		echo "<button class='btn' label='"._("Nuevo")."' oncommand='UsarNuevo()'/>";
		echo "</groupbox>";		
		break;		
	case "subfamilia":
		$idfamilia = CleanID($_GET["IdFamilia"]);

		echo "<groupbox  flex='1'> <caption class='box' label='" . _("Sub familias") . "'/>";
		$subfamilias = genArraySubFamilias($idfamilia);
		
		echo "<script>\n";
		echo " fam =new Object();\n";
		foreach ($subfamilias as $key=>$value){
			echo "fam[$key] = '$value';\n";			
		}
		echo "\n</script>";		
				
		//echo "Mostrando sub familia de familia id '$idfamilia'<p>"; 	
		echo "<listbox id='Subfamilia' flex='1' rows='7' onclick='parent.changeSub(this,fam[this.value]);parent.closepopup();return true;'>";
		echo  genXulComboSubFamilias(false,$idfamilia);				
		echo "</listbox>";
		echo "</groupbox>";
		

		
		break;		
	default:
		break;	
}

EndXul();

?>