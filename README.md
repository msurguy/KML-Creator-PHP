# KML_class is a PHP class to create a KML file used by Google Earth
and other Geographic tools #

Author : 
                    Ken LE PRADO
Contributors : 
                    Francois HETU
                    Alexander LUCKING
Port to Github : 	Maks Surguy

## INSTALL ##
   - Copy kml.class.php in your tree
   - In your PHP include kml.class.php
      Ex : include_once('kml.class.php');
   - Start using it (see manual and example)
   
## UPGRADE ##
   - Copy kml.class.php in place of the old file
   - start using it (see manual and example)


## CHANGELOG ##

v0.3  
   - implement correctly KMLGroundOverlay (line 1274)
   - remove "#" for internal links (line 235) 
   - correct error (lines 568 + 574)

v0.2
   - Better suppor for "<name>" value
   - removed utf8_encode() for descriptions
   - added setIconStyle() : added hotspot
   - added class KMLAnimation
   - added class KMLTourPrimitive
   - added class KMLFlyTo
   - added class KMLWait
   - added class KMLAbstractView
   - added class KMLOverlay
   - added class KMLPhotoOverlay
   - added class KMLGroundOverlay
   - added class KMLScreenOverlay

v0.1
   - KML class creation

