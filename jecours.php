<?php
/*
 *.php
 *
 *
 * auteur:		https://github.com/freezed <contact at freezed dot me>
 * version:	0.1
 * MaJ:
 * Changelog:
 *
 * [TODO]
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */

/*
 * Config
 */

$target		= 'http://www.jecours.fr/content.php?page=';
$targetRoot	= 'www.jecours.fr';
$start		= '<div id="carrousel_content">';
$html		= array();
$needles	= array(
	$start,
	'</div>',
	'</html>',
	'</body>',
	' class="police_content_titre_paragraphe"',
	' class="police_content_titre"',
	' class="attention"',
	'class="police_content_paragraphe"',
	'		<div id="content_1">',
	'		<div id="content_2">',
	'		<div id="content_3">',
	'		<div id="content_4">',
	'		<div id="content_5">',
	' class="padd1"',
	'<img class="puce" src="images/divers/wpt_symbol_chapitre.png" alt="" />&#160;'
);

$pages = array(
	"presentation"	=> "Présentation",
	"trail"			=> "Le trail, c'est quoi ?",
	"parcours"		=> "Parcours",
	"dates"			=> "Dates",
	"a_voir"		=> "A voir sur le trajet",
	"preparation"	=> "Préparation",
	"materiel"		=> "Matériel",
	"conseils"		=> "Conseils",
	"participants"	=> "Participants",
	"galerie"		=> "Galerie",
	"petits_bobos_gros_pepins"	=> "Petits bobos et gros pépins",
	"orientation"		=> "S'orienter",
	"logiciels"		=> "Logiciels",
	"liens"			=> "Liens",
	"qui_suis_je"	=> "Qui suis-je ?",
	"livre_or"		=> "Livre d'or",
	"contact"		=> "Contact",
	"avertissements"=> "Avertissements",
	"informations"	=> "Informations"
);



/*
 * get distant page content
 */
foreach($pages as $name => $title) {

	$webPage = file_get_contents($target.$name);
	$webText = strstr($webPage, $start);

	$result	= str_replace($needles, '', $webText);

	$html['menu']		.= "<li><a href='#$name' title='$title'>$title</a></li>";
	$html['content']	.= "<h3 id='$name'>$title</h3>".$result."<hr />";

}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Partageons ensemble notre passion de la course à pied</title>
		<meta charset="utf-8" />
		<meta name="keywords" content="courir"/>
		<meta name="description" content="La passion de la course à pied"/>
		<meta name="Author" content="Yann Seurat"/>
		<link rel="shortcut icon" href="<? echo $targetRoot; ?>images/divers/favicon.ico" />
	</head>

	<body>

	<h1>Je cours (page alternative)</h1>
	<p>Cette page est une remise en forme des textes du site <a href="http://<? echo $targetRoot; ?>" title="<? echo $targetRoot; ?>"><? echo $targetRoot; ?></a>.</p>
	<ol>
<?php echo $html['menu']; ?>
	</ol>

<?php echo $html['content']; ?>


	</body>
</html>
