<?php
/**
  * Example File
  *
  * @package kmlInstaller
  */

/**
  * KML definition file inclusion
  */
include_once('kml.class.php');
$kml = new KML('TETRIS');

$document = new KMLDocument('tetris', 'TETRIS');

/**
  * Style definitions
  */

$style = new KMLStyle('boatStyle');
$style->setIconStyle('images/fish.png', 'ffffffff', 'normal', 1);
$style->setLineStyle('ffffffff', 'normal', 2);
$document->addStyle($style);

$style = new KMLStyle('navintStyle');
$style->setIconStyle('images/navint.png', 'ffffffff', 'normal', 1);
$style->setLineStyle('ff0000ff', 'normal', 3);
$document->addStyle($style);

$style = new KMLStyle('plotStyle');
$style->setIconStyle('images/small.png', 'ff00ff00', 'normal', 0.2);
$document->addStyle($style);

$style = new KMLStyle('portStyle');
$style->setIconStyle('images/port.png');
$document->addStyle($style);

$style = new KMLStyle('polyStyle');
$style->setPolyStyle('660000ff');
$document->addStyle($style);



$boatListFolder = new KMLFolder('', 'Navires');

/**
  * File adds
  */
$kml->addFile('images/navint.png', 'images/navint.png');
$kml->addFile('images/icone.png', 'images/icone.png');
$kml->addFile('images/small.png', 'images/small.png');
$kml->addFile('images/fish.png', 'images/fish.png');
$kml->addFile('images/port.png', 'images/port.png');


/**
  * Boat adds
  */
$boatFolder = new KMLFolder('', 'ESPERANZA');

//Ajout Infos sur le bateau
$boatDetail = new KMLPlaceMark('', 'ESPERANZA', 'Un bateau de greenpeace', true);
$boatDetail->setGeometry(new KMLPoint(-1, 2, 0));
$boatDetail->setStyleUrl('#boatStyle');

$style = new KMLStyle();
$style->setBalloonStyle ('Bateau suspecté de piraterie...');
$boatDetail->addStyle($style);
$boatFolder->addFeature($boatDetail);



//Ajout des pistes
$boatTrace = new KMLPlaceMark(null, 'Suivi de piste', '', true);
$boatTrace->setGeometry (new KMLLineString( Array (
                           array ( 4, 3,0),
                           array ( 2, 4,0),
                           array (-1, 3,0),
                           array (-1, 2,0)
                        ), true, '', true)
                     );
$boatTrace->setTimePrimitive(new KMLTimeStamp('','2008-05-01','2008-05-25'));
$boatTrace->setStyleUrl('#boatStyle');
$boatFolder->addFeature($boatTrace);

//Ajout de l'historique des positions
$boatHistoFolder = new KMLFolder('', 'Historique des positions');


$boatFollow = new KMLPlaceMark('', '1', '', true);
$boatFollow->setGeometry(new KMLPoint( 4, 3, 0));
$boatFollow->setStyleUrl('#plotStyle');
$boatFollow->setTimePrimitive(new KMLTimeStamp('','2008-05-01'));
$boatHistoFolder->addFeature($boatFollow);

$boatFollow = new KMLPlaceMark('', '2', '', true);
$boatFollow->setGeometry(new KMLPoint( 2, 4, 0));
$boatFollow->setStyleUrl('#plotStyle');
$boatFollow->setTimePrimitive(new KMLTimeStamp('','2008-05-05'));
$boatHistoFolder->addFeature($boatFollow);

$boatFollow = new KMLPlaceMark('', '3', '', true);
$boatFollow->setGeometry(new KMLPoint(-1, 3, 0));
$boatFollow->setStyleUrl('#plotStyle');
$boatFollow->setTimePrimitive(new KMLTimeStamp('','2008-05-15'));
$boatHistoFolder->addFeature($boatFollow);

$boatFollow = new KMLPlaceMark('', '4', '', true);
$boatFollow->setGeometry(new KMLPoint(-1, 2, 0));
$boatFollow->setStyleUrl('#plotStyle');
$boatFollow->setTimePrimitive(new KMLTimeStamp('','2008-05-25'));
$boatHistoFolder->addFeature($boatFollow);


$boatFolder->addFeature($boatHistoFolder);

//Ajout du bateau à la liste
$boatListFolder->addFeature($boatFolder);

/**
  * Ajout d'un port
  */

$portFolder = new KMLFolder('', 'Ports');


$port = new KMLPlaceMark('', 'Brest');
$port->setGeometry(new KMLPoint(-1.5, 5,0));
$port->setStyleUrl('#portStyle');
$portFolder->addFeature($port);

$port = new KMLPlaceMark('', 'Le Havre');
$port->setGeometry(new KMLPoint(5, 5,0));
$port->setStyleUrl('#portStyle');
$portFolder->addFeature($port);




/**
  * Ajout d'une zone
  */
$areaFolder = new KMLFolder('', 'Zones');

$mediterranee = new KMLPlaceMark('', 'Mediterranee');
$mediterranee->setGeometry (new KMLPolygon( Array (
                           array ( 2, 0,0),
                           array (-4, 0,0),
                           array (-5, 5,100),
                           array ( 1, 5,0),
                           array ( 2, 0,0)                           
                        ), true, '', true)
                     );
                     
$mediterranee->setStyleUrl('#polyStyle');

$areaFolder->addFeature($mediterranee);

$document->addFeature($boatListFolder);
$document->addFeature($portFolder);
$document->addFeature($areaFolder);

/**
  * Ajout du répertoire
  */
$kml->setFeature($document);




/**
  * Output result
  */

//echo '<pre>';
//echo htmlspecialchars($kml->output('S'));
//echo '</pre>';

//echo $kml->output('S');


$kml->output('F', 'output/test.kml');
$kml->output('Z', 'output/test.kmz');

?>
