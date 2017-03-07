<?php

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('debug', true);



/*

---------------------------------------
Widgets (on Panel Dashboard)
---------------------------------------

*/
c::set('panel.widgets', array(
  'account'  => true,
  'history'  => true,
  'pages'    => false,
  'pages2'    => true,
  'site'     => false,
));



/*

---------------------------------------
Routing
Old URLs, for SEO purposes
---------------------------------------

*/
c::set('routes', array(
  array(  
    'pattern' => '/',
    'action' => function() {

      // variables/fallbacks
      $target = 'home';
      $get = get('page');

      // check if 'pages' parameter is present
      if(strlen($get) > 0) {

        // connect old page numbers to target pages
        if( $get == '01' ) { $target = 'medewerkers'; }
        if( $get == '02' ) { $target = 'het-gebouw'; }
        if( $get == '03' ) { $target = 'fotos'; }
        if( $get == '04' ) { $target = 'bekkenfysiotherapie'; }
        if( $get == '05' ) { $target = 'sportfysiotherapie'; }
        if( $get == '06' ) { $target = 'revalidatie'; }
        if( $get == '07' ) { $target = 'mckenzietherapie'; }
        if( $get == '08' ) { $target = 'handtherapie'; }
        if( $get == '09' ) { $target = 'zwangerfit'; }
        if( $get == '10' ) { $target = 'oefengroep-medische-fitness'; }
        if( $get == '11' ) { $target = 'bevallen-doe-je-zo'; }
        if( $get == '12' ) { $target = 'diabetes-programma'; }
        // if( $get == '13' ) { $target = ''; }
        if( $get == '14' ) { $target = 'bekkenpijn'; }
        if( $get == '15' ) { $target = 'diversen'; }
        if( $get == '16' ) { $target = 'ckr'; }
        if( $get == '17' ) { $target = 'dtf'; }
        if( $get == '18' ) { $target = 'tarieven'; }
        if( $get == '19' ) { $target = 'vergoedingen'; }
        if( $get == '20' ) { $target = 'links'; }
        if( $get == '21' ) { $target = 'contact'; }
        // if( $get == '22' ) { $target = 'colofon'; }
        if( $get == '23' ) { $target = 'klachtenregeling'; }
        if( $get == '24' ) { $target = 'wgbo'; }

        // go to targeted page
        return go($target);

      } else {

        // go to homepage
        return site()->visit('');

      }

    }),
));

