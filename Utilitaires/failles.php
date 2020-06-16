<?php
	/**
	* Nettoie une valeur insérée dans une page HTML
	* Doit être utilisée à chaque insertion de données dynamique dans une page HTML
	* Permet d'éviter les problèmes d'exécution de code indésirable (XSS)
	* @param string $valeur Valeur à nettoyer
	* @return string Valeur nettoyée
	*/
	function escape($valeur)
	{
		// Convertit les caractères spéciaux en entités HTML
		return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
	}
?>