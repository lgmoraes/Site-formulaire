<?php	
	/**
     * retourne une balise img contenant l'image cible encodé en base64
     * 
     * @param string $name
     * @return string
     */ 
	function addImgBase64($name) {
		return '<img src="' . file_get_contents("../img/base64/" . $name . ".b64") . '" />';
	}

	/**
	 * Retourne une représentation JSON indexé selon $key.
	 * Les instances envoyés en paramètre doivent implémenter la fonction jsonSerialize pour fonctionner
	 * 
	 * @param array $array_obj Tableau d'instances
	 * @param string $key Clé qui servira d'index
	 * @return string Représentation JSON
     */
	function serializeByKey($array_obj, $key = "id") {
		$json = "{";
		
		foreach ($array_obj as $o)
			$json .= $o->$key() . ':' . json_encode($o) . ',';
		
		$json = rtrim($json, ',');
		$json .= "}";

		return $json;
	}
	
?>
