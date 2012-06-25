<?php defined('_JEXEC') or die;
/* =====================================================================
 * Template:		kwd-j-bootstrap :: for Joomla! 2.5
 * Author: 			Chris Jones-Gill - KISS Web Design
 * Version: 		0.1
 * Created: 		June 2012
 * This Version:	June 2012
 * Copyright:		KISS Web Design - (C) 2012 - All rights reserved
 * License:	GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * Sources:	Forked from https://github.com/nternetinspired/OneWeb 12/3/2012
 * 			http://construct-framework.com/
 * 			https://github.com/MattWilcox/Adaptive-Images
/* ===================================================================== */

// Define shortcuts for template parameters
$loadMoo 				= $this->params->get('loadMoo');
$jQuery 				= $this->params->get('jQuery');
$adaptiveImages			= $this->params->get('adaptiveImages');
$setGeneratorTag		= $this->params->get('setGeneratorTag');
$analytics 				= $this->params->get('analytics');
// Get the site logo filename
$SiteLogo				= $this->params->get('SiteLogo');

//-----------------------------Lets get the info we need for the grid-----------------------------
// Check for modules in columns
// from http://groups.google.com/group/joomla-dev-general/bse_thread/thread/b54f3f131dd173d

$navTop = (int) ($this->countModules('nav-top') > 0);
$navR1 = (int) ($this->countModules('nav-r1') > 0);

$sectionR2a = (int) ($this->countModules('section-r2-1') > 0);
$sectionR2b = (int) ($this->countModules('section-r2-2') > 0);
$sectionR2c = (int) ($this->countModules('section-r2-3') > 0);
$sectionR2d = (int) ($this->countModules('section-r2-4') > 0);

$navR3 = (int) ($this->countModules('nav-r3') > 0);

$sectionR4 = (int) ($this->countModules('section-r4') > 0);

$navR5 = (int) ($this->countModules('nav-r5') > 0);

$sectionR6a = (int) ($this->countModules('section-r6-1') > 0);
$sectionR6b = (int) ($this->countModules('section-r6-2') > 0);
$sectionR6c = (int) ($this->countModules('section-r6-3') > 0);
$sectionR6d = (int) ($this->countModules('section-r6-4') > 0);

$sectionR7a = (int) ($this->countModules('section-r7-1') > 0);
$sectionR7b = (int) ($this->countModules('section-r7-2') > 0);
$sectionR7c = (int) ($this->countModules('section-r7-3') > 0);
$sectionR7d = (int) ($this->countModules('section-r7-4') > 0);

$navR8 = (int) ($this->countModules('nav-r8') > 0);

$sectionMainLeft = (int) ($this->countModules('section-main-left') > 0);
$sectionMainRight = (int) ($this->countModules('section-main-right') > 0);

$sectionR10a = (int) ($this->countModules('section-r10-1') > 0);
$sectionR10b = (int) ($this->countModules('section-r10-2') > 0);
$sectionR10c = (int) ($this->countModules('section-r10-3') > 0);
$sectionR10d = (int) ($this->countModules('section-r10-4') > 0);

$sectionR11a = (int) ($this->countModules('section-r10-1') > 0);
$sectionR11b = (int) ($this->countModules('section-r10-2') > 0);
$sectionR11c = (int) ($this->countModules('section-r10-3') > 0);
$sectionR11d = (int) ($this->countModules('section-r10-4') > 0);

$section12 = (int) ($this->countModules('section-r12') > 0);

$sectionR13a = (int) ($this->countModules('section-r13-1') > 0);
$sectionR13b = (int) ($this->countModules('section-r13-2') > 0);
$sectionR13c = (int) ($this->countModules('section-r13-3') > 0);
$sectionR13d = (int) ($this->countModules('section-r13-4') > 0);

$navR14 = (int) ($this->countModules('nav-r14') > 0);
$navBottom = (int) ($this->countModules('nav-bottom') > 0);

// Calculate if a row has active modules in it, when there are multiple module positions in a row
// Used in template index.php file to activate (>0) or ignore (=0) the row
$row2Active = $sectionR2a + $sectionR2b + $sectionR2c + $sectionR2d;
$row6Active = $sectionR6a + $sectionR6b + $sectionR6c + $sectionR6d;
$row7Active = $sectionR7a + $sectionR7b + $sectionR7c + $sectionR7d;
$row10Active = $sectionR10a + $sectionR10b + $sectionR10c + $sectionR10d;
$row11Active = $sectionR11a + $sectionR11b + $sectionR11c + $sectionR11d;
$row13Active = $sectionR13a + $sectionR13b + $sectionR13c + $sectionR13d;

/* =====================================================================
 * Get the column widths and navigation row info.
/* ===================================================================== */

$activateTopNav = $this->params->get('topnav');
$activateNavR1 = $this->params->get('navr1');

$logoCols = $this->params->get('logo');			// section-r2-1
$taglineCols = $this->params->get('tagline');	// section-r2-2
$searchCols = $this->params->get('search');		// section-r2-3

$activateNavR3 = $this->params->get('navr3');

$sectionColsR4 = $this->params->get('section-r4');

$activateNavR5 = $this->params->get('navr5');

if ($this->params->get('CalculateR6')) {
	// Divide the total columns by the number of active modules
	// Ensures the modules always fill the available width
	// Overrides the values specified in the template style
	if(($sectionR6a + $sectionR6b + $sectionR6c + $sectionR6d) != 0) {$sectionR6cols = int_to_words(12/($sectionR6a + $sectionR6b + $sectionR6c + $sectionR6d));} else {$sectionR6cols = 0;}
	$sectionColsR6a = $this->params->set('section-r6-1', $sectionR6cols);
	$sectionColsR6b = $this->params->set('section-r6-2', $sectionR6cols);
	$sectionColsR6c = $this->params->set('section-r6-3', $sectionR6cols);
	$sectionColsR6d = $this->params->set('section-r6-4', $sectionR6cols);
}
else {
	// Use the values specified in the template style
	$sectionColsR6a = $this->params->get('section-r6-1');
	$sectionColsR6b = $this->params->get('section-r6-2');
	$sectionColsR6c = $this->params->get('section-r6-3');
	$sectionColsR6d = $this->params->get('section-r6-4');
}
	
if ($this->params->get('CalculateR7')) {
	// Divide the total columns by the number of active modules
	// Ensures the modules always fill the available width
	// Overrides the values specified in the template style
	if(($sectionR7a + $sectionR7b + $sectionR7c + $sectionR7d) != 0) {$sectionR7cols = int_to_words(12/($sectionR7a + $sectionR7b + $sectionR7c + $sectionR7d));} else {$sectionR7cols = 0;}
	$sectionColsR7a = $this->params->set('section-r7-1', $sectionR7cols);
	$sectionColsR7b = $this->params->set('section-r7-2', $sectionR7cols);
	$sectionColsR7c = $this->params->set('section-r7-3', $sectionR7cols);
	$sectionColsR7d = $this->params->set('section-r7-4', $sectionR7cols);
}
else {
	// Use the values specified in the template style
	$sectionColsR7a = $this->params->get('section-R7-1');
	$sectionColsR7b = $this->params->get('section-R7-2');
	$sectionColsR7c = $this->params->get('section-R7-3');
	$sectionColsR7d = $this->params->get('section-R7-4');
}

$activateNavR8 = $this->params->get('navr8');

if ($this->params->get('CalculateMain')) {
	$mainLeftCols = $this->params->set('mainleft', 'three');
	$mainRightCols = $this->params->set('mainright', 'three');
	if (($sectionMainRight == "0") && ($sectionMainLeft == "0")) {
		$mainContentCols = $this->params->set('maincontent', 'twelve');
	}
	else if (($sectionMainRight != "0") && ($sectionMainLeft !="0")){
		$mainContentCols = $this->params->set('maincontent', 'six');
	}
	else if (($sectionMainRight == "0") || ($sectionMainLeft == "0")) {
		$mainContentCols = $this->params->set('maincontent', 'nine');
	}
}
else {
	// Use the values specified in the template style
	$mainLeftCols = $this->params->get('mainleft');
	$mainContentCols = $this->params->get('maincontent');
	$mainRightCols = $this->params->get('mainright');
}

if ($this->params->get('CalculateR10')) {
	// Divide the total columns by the number of active modules
	// Ensures the modules always fill the available width
	// Overrides the values specified in the template style
	if(($sectionR10a + $sectionR10b + $sectionR10c + $sectionR10d) != 0) {$sectionR10cols = int_to_words(12/($sectionR10a + $sectionR10b + $sectionR10c + $sectionR10d));} else {$sectionR10cols = 0;}
	$sectionColsR10a = $this->params->set('section-R10-1', $sectionR10cols);
	$sectionColsR10b = $this->params->set('section-R10-2', $sectionR10cols);
	$sectionColsR10c = $this->params->set('section-R10-3', $sectionR10cols);
	$sectionColsR10d = $this->params->set('section-R10-4', $sectionR10cols);
}
else {
	// Use the values specified in the template style
	$sectionColsR10a = $this->params->get('section-R10-1');
	$sectionColsR10b = $this->params->get('section-R10-2');
	$sectionColsR10c = $this->params->get('section-R10-3');
	$sectionColsR10d = $this->params->get('section-R10-4');
}
	
if ($this->params->get('CalculateR11')) {
	// Divide the total columns by the number of active modules
	// Ensures the modules always fill the available width
	// Overrides the values specified in the template style
	if(($sectionR11a + $sectionR11b + $sectionR11c + $sectionR11d) != 0) {$sectionR11cols = int_to_words(12/($sectionR11a + $sectionR11b + $sectionR11c + $sectionR11d));} else {$sectionR11cols = 0;}
	$sectionColsR11a = $this->params->set('section-R11-1', $sectionR11cols);
	$sectionColsR11b = $this->params->set('section-R11-2', $sectionR11cols);
	$sectionColsR11c = $this->params->set('section-R11-3', $sectionR11cols);
	$sectionColsR11d = $this->params->set('section-R11-4', $sectionR11cols);
}
else {
	// Use the values specified in the template style
	$sectionColsR11a = $this->params->get('section-R11-1');
	$sectionColsR11b = $this->params->get('section-R11-2');
	$sectionColsR11c = $this->params->get('section-R11-3');
	$sectionColsR11d = $this->params->get('section-R11-4');
}

$sectionColsR12 = $this->params->get('section-r12');

if ($this->params->get('CalculateR13')) {
	// Divide the total columns by the number of active modules
	// Ensures the modules always fill the available width
	// Overrides the values specified in the template style
	if(($sectionR13a + $sectionR13b + $sectionR13c + $sectionR13d) != 0) {$sectionR13cols = int_to_words(12/($sectionR13a + $sectionR13b + $sectionR13c + $sectionR13d));} else {$sectionR13cols = 0;}
	$sectionColsR13a = $this->params->set('section-R13-1', $sectionR13cols);
	$sectionColsR13b = $this->params->set('section-R13-2', $sectionR13cols);
	$sectionColsR13c = $this->params->set('section-R13-3', $sectionR13cols);
	$sectionColsR13d = $this->params->set('section-R13-4', $sectionR13cols);
}
else {
	// Use the values specified in the template style
	$sectionColsR13a = $this->params->get('section-R13-1');
	$sectionColsR13b = $this->params->get('section-R13-2');
	$sectionColsR13c = $this->params->get('section-R13-3');
	$sectionColsR13d = $this->params->get('section-R13-4');
}

$activateNavR14 = $this->params->get('navr14');
$activateTopNav = $this->params->get('bottomnav');

/* =====================================================================
 * 	End of column width settings
/* ===================================================================== */

//-----------------------------See if we are on the homepage-----------------------------
// from Anthony Olsen of Joomla Bamboo, http://www.joomlabamboo.com

$activeMenu = & JSite::getMenu();
if ($activeMenu->getActive() == $activeMenu->getDefault()) {$siteHome = 'home';}else{$siteHome = 'sub';}

//----------------------------- Construct Code Snippets -----------------------------
// GPL code taken from Construct template framework by Matt Thomas http://construct-framework.com/

// To enable use of site configuration
$app 					= JFactory::getApplication();

// Returns a reference to the global document object
$doc 					= JFactory::getDocument();

// Define relative path to the  current template directory
$template 				= 'templates/'.$this->template;

// Define shortcuts for template parameters
$bodyFontFamily 		= $this->params->get('bodyFontFamily');
$googleWebFont 			= $this->params->get('googleWebFont');
$googleWebFontSize		= $this->params->get('googleWebFontSize');
$googleWebFontTargets	= $this->params->get('googleWebFontTargets');
$googleWebFont2			= $this->params->get('googleWebFont2');
$googleWebFontSize2		= $this->params->get('googleWebFontSize2');
$googleWebFontTargets2	= $this->params->get('googleWebFontTargets2');
$googleWebFont3			= $this->params->get('googleWebFont3');
$googleWebFontSize3		= $this->params->get('googleWebFontSize3');
$googleWebFontTargets3	= $this->params->get('googleWebFontTargets3');

// Change generator tag
$this->setGenerator($setGeneratorTag);

// Remove MooTools if set to no.
if ( !$loadMoo ) {
	$head=$this->getHeadData();
	reset($head['scripts']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/mootools.js']);
	unset($head['scripts'][$this->baseurl . '/plugins/system/mtupgrade/mootools.js']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/mootools-core.js']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/mootools-more.js']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/caption.js']);	// We may as well remove caption.js too - Seth Warburton @ http://internet-inspired.com	
	$this->setHeadData($head);
}

// Fix Google Web Font name for CSS
$googleWebFontFamily 	= str_replace(array('+',':bold',':italic')," ",$googleWebFont);
$googleWebFontFamily2 	= str_replace(array('+',':bold',':italic')," ",$googleWebFont2);
$googleWebFontFamily3 	= str_replace(array('+',':bold',':italic')," ",$googleWebFont3);

// Typography --- font size params removed by Seth Warburton @ http://internet-inspired.com
if ($googleWebFont) {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleWebFont.'');
	$doc->addStyleDeclaration('  '.$googleWebFontTargets.' {font-family:'.$googleWebFontFamily.';}');
}
if ($googleWebFont2) {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleWebFont2.'');
	$doc->addStyleDeclaration('  '.$googleWebFontTargets2.' {font-family:'.$googleWebFontFamily2.';}');
}
if ($googleWebFont3) {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleWebFont3.'');
	$doc->addStyleDeclaration('  '.$googleWebFontTargets3.' {font-family:'.$googleWebFontFamily3.';}');
}
//----------------------------- End Construct Code Snippets -----------------------------


//----------------------------- Inject extras into the head -----------------------------
// Musthave JS
if ($jQuery) {
  $doc->addCustomTag('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
}

// Metas
$doc->setMetaData( 'HandheldFriendly', 'True' );
$doc->setMetaData( 'MobileOptimized', '320' );
$doc->setMetaData( 'viewport', 'width=device-width, target-densitydpi=160dpi, initial-scale=1.0' );
$doc->setMetaData( 'apple-mobile-web-app-capable', 'True' );
$doc->setMetaData( 'apple-mobile-web-app-status-bar-style', 'black-translucent' );
$doc->setMetaData( 'cleartype', 'on', true );
$doc->setMetaData( 'X-UA-Compatible', 'IE=edge,chrome=1', true );

// If (polyfill) JS
$doc->addCustomTag('<!--[if (lt IE 9) & (!IEMobile)]>');
$doc->addCustomTag('<script src="'.$template.'/js/libs/selectivizr-min.js"></script>');
$doc->addCustomTag('<![endif]-->');
//----------------------------- End head code -----------------------------