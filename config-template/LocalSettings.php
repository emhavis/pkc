<?php
# This file was automatically generated by the MediaWiki 1.36.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "PKC Media Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "#YOUR_FQDN";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ '1x' => "$wgResourceBasePath/resources/assets/xlp.png" ];

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; # UPO

$wgEmergencyContact = "apache@🌻.invalid";
$wgPasswordSender = "apache@🌻.invalid";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "database";
$wgDBname = "my_wiki";
$wgDBuser = "wikiuser";
$wgDBpassword = "example";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

# Requires that a user be registered before they can edit.
$wgGroupPermissions['*']['edit'] = false;

# Prevent new user registrations except by sysops
$wgGroupPermissions['*']['createaccount'] = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale. This should ideally be set to an English
## language locale so that the behaviour of C library functions will
## be consistent with typical installations. Use $wgLanguageCode to
## localise the wiki.
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "11d3db72e2c28a4d365bc31a5396bd6e61946501a706b1f95c361ec805117873";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "a325836f3e0ee6d7";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );

# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtension( 'ExtensionName' );
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension( 'CategoryTree' );
wfLoadExtension( 'Cite' );
wfLoadExtension( 'CiteThisPage' );
wfLoadExtension( 'CodeEditor' );
#wfLoadExtension( 'ConfirmEdit' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'ImageMap' );
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'Interwiki' );
wfLoadExtension( 'LocalisationUpdate' );
wfLoadExtension( 'MultimediaViewer' );
wfLoadExtension( 'Nuke' );
wfLoadExtension( 'PageImages' );
wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'Poem' );
wfLoadExtension( 'Renameuser' );
wfLoadExtension( 'ReplaceText' );
wfLoadExtension( 'Scribunto' );
wfLoadExtension( 'SecureLinkFixer' );
#wfLoadExtension( 'SpamBlacklist' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TemplateData' );
wfLoadExtension( 'TextExtracts' );
wfLoadExtension( 'TitleBlacklist' );
# The following extension requires to instsallation of Parsoid server
# wfLoadExtension( 'VisualEditor' );
wfLoadExtension( 'WikiEditor' );
wfLoadExtension( 'DrawioEditor' );

# End of automatically generated settings.
# Add more configuration options below.
# The following extensions are added in the Dockerfile implemented for bkoo/mediawiki:1.35

wfLoadExtension( 'intersection' );

# Try to handle PDF uploaded files
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'PDFEmbed' );

// Default width for the PDF object container.
$wgPdfEmbed['width'] = 800;

// Default height for the PDF object container.
$wgPdfEmbed['height'] = 1090;

// Enable Media Playing
wfLoadExtension("EmbedVideo");
wfLoadExtension( 'MultimediaViewer' );

//Allow user the usage of the pdf tag
$wgGroupPermissions['*']['embed_pdf'] = true;
wfLoadExtension( '3D' );

$wg3dProcessor = [
    '/usr/bin/xvfb-run',
    '-a',
    '-s',
    '-ac -screen 0 1280x1024x24',
    '/var/www/html/extensions/3d2png/3d2png.js'
];

$wgUploadWizardConfig['patents'] = [
	'extensions' => [ 'stl' ],
	'template' => '3dpatent',
	'url' => [
		'legalcode' => '//wikimediafoundation.org/wiki/Wikimedia_3D_file_patent_license',
		'warranty' => '//meta.wikimedia.org/wiki/Wikilegal/3D_files_and_3D_printing',
		'license' => '//meta.wikimedia.org/wiki/Wikilegal/3D_files_and_3D_printing',
		'weapons' => '//meta.wikimedia.org/wiki/Wikilegal/3D_files_and_3D_printing#Weapons',
	],
];

$wgTrustedMediaFormats[] = "application/sla";
$wgTrustedMediaFormats[] = "application/octet-stream";

$wgMediaViewerExtensions['stl'] = 'mmv.3d';

wfLoadExtension( '3DAlloy' );

# Loading Math extension
wfLoadExtension( 'Math' );
wfLoadExtension( 'GeoData' );
wfLoadExtension( 'JsonConfig' );
wfLoadExtension( 'Kartographer' );
wfLoadExtension( 'EmbedSpotify' );
wfLoadExtension( 'PageForms' );
$egMapsGMaps3ApiKey = 'AIzaSyBQuxfm0meYxGrQfdVY1FeiINS0nAW3avo';
$egMapsDefaultService = 'leaflet';
wfLoadExtension( 'Maps' );
$wgShowExceptionDetails = true;
wfLoadExtension( 'Cargo' );
wfLoadExtension( 'Widgets' );
wfLoadExtension( 'GoogleDocs4MW' );
wfLoadExtension( 'TemplateWizard' );

# The following statements are for OATHAuth
wfLoadExtension( 'OATHAuth' );
$wgMWOAuthCentralWiki = false;
$wgOATHAuthWindowRadius = 4;
$wgOATHAuthDatabase = false;
$wgOATHAuthSecret=false;
$wgOATHAuthAccountPrefix=false;
$wgOATHExclusiveRights=[];
$wgGroupPermissions['user']['oathauth-enable'] = true;

# End of automatically generated settings.
# Add more configuration options below.
$wgAllowExternalImages=true;
$wgEditPageFrameOptions = "SAMEORIGIN";

$wgHooks['BeforePageDisplay'][] ='onBeforePageDisplay';

function onBeforePageDisplay( OutputPage &$out, Skin &$skin )
{
    $script = "<script>  var _paq = window._paq = window._paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u='#MTM_SUBDOMAIN';
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>";
    $out->addHeadItem("wowhead script", $script);
    return true;
};

## Add new file types that allows for more File Types to be uploaded.
$wgFileExtensions = array( 'png', 'gif', 'jpg', 'jpeg', 'doc',
    'xls', 'mpp', 'pdf', 'ppt', 'tiff', 'bmp', 'docx', 'xlsx',
    'pptx', 'ps', 'odt', 'ods', 'odp', 'odg', 'mp4', 'zip',
    'stl', 'sla', 'svg'
);

$wgFileExtensions = array_merge(
    $wgFileExtensions, array(
        'json', '3dj', '3djson', 'three',
        'buff', 'buffjson',
        'obj',
        'stl', 'stlb'
    )
  );

enableSemantics();
$wgEnableUploads = true;

// wfLoadExtension( 'MW-OAuth2Client' );
# The following two lines contains information on Github's OAuth service. You will have to apply for your own information to get things to work.
// $wgOAuth2Client['client']['id'] = "588891bd88bff5e1576b";
// $wgOAuth2Client['client']['secret'] = "fb049711254297b6293c96afb3bba8ad5754ce1d";

// $wgOAuth2Client['configuration']['authorize_endpoint']     = 'https://github.com/login/oauth/authorize'; // Authorization URL
// $wgOAuth2Client['configuration']['access_token_endpoint']  = 'https://github.com/login/oauth/access_token'; // Token URL
// $wgOAuth2Client['configuration']['api_endpoint']           = 'https://api.github.com/user'; // URL to fetch user JSON
// $wgOAuth2Client['configuration']['redirect_uri'] = "#YOUR_FQDN/index.php/Special:OAuth2Client/callback";
// $wgOAuth2Client['configuration']['username'] = 'login'; // JSON path to username
// $wgOAuth2Client['configuration']['email'] = 'email'; // JSON path to email
// $wgOAuth2Client['configuration']['scopes'] = 'openid email profile'; //Permissions
// $wgOAuth2Client['configuration']['service_name'] = 'Oauth Registry'; // the name of your service
// $wgOAuth2Client['configuration']['service_login_link_text'] = 'Login through Github'; // the text of the login link

// remove login and logout buttons for all users
function StripLogin(&$personal_urls, &$wgTitle) {
    unset( $personal_urls["login"] );
    # unset( $personal_urls["logout"] );
    unset( $personal_urls['anonlogin'] );
    return true;
}

$wgHooks['PersonalUrls'][] = 'StripLogin';

// Keycloak Configuration
wfLoadExtension( 'OpenIDConnect' );
wfLoadExtension( 'PluggableAuth' );
// // http://localhost:32060/auth/realms/pkc-realm/.well-known/openid-configuration --> check here
$wgOpenIDConnect_Config['#KCK_SUBDOMAIN/auth/realms/pkc-realm/'] = [
  'clientID' => 'pkc-client',
  'clientsecret' => 'd9ecdca8-ad69-4322-9452-ff725898eb03',
  'scope' => [ 'openid', 'profile', 'email' ]
];
#
$wgGroupPermissions['*']['autocreateaccount'] = true;

// Semantic Result Format
wfLoadExtension( 'SemanticResultFormats' );

$srfgFormats = [
  'icalendar', 
  'vcard', 'bibtex', 'calendar', 
  'eventcalendar', 'eventline', 'timeline', 
  'outline', 'gallery', 'jqplotchart', 'jqplotseries', 
  'sum', 'average', 'min', 'max', 'median', 'product', 
  'tagcloud', 'valuerank', 'array', 
  'tree', 'ultree', 'oltree', 'd3chart', 'latest', 'earliest', 'filtered', 'slideshow', 'timeseries', 'sparkline', 
  'listwidget', 'pagewidget', 'dygraphs', 'media', 'datatables'
];
#
$wgAllowCiteGroups = true; 
$wgCiteBookReferencing = true;

# Matomo for mediawiki configuration
wfLoadExtension( 'MatomoAnalytics' );
$wgMatomoAnalyticsServerURL = '#MTM_SUBDOMAIN/';
$wgMatomoAnalyticsTokenAuth = '7524544b78e7242433ab5a72fcd3101d';
$wgMatomoAnalyticsSiteID = 1;

# Multilingual Pack Configurations
wfLoadExtension( 'Babel' );
wfLoadExtension( 'cldr' );
wfLoadExtension( 'CleanChanges' );
$wgCCTrailerFilter = true;
$wgCCUserFilter = false;
$wgDefaultUserOptions['usenewrc'] = 1;
wfLoadExtension( 'LocalisationUpdate' );
$wgLocalisationUpdateDirectory = "$IP/cache";
wfLoadExtension( 'Translate' );
$wgGroupPermissions['user']['translate'] = true;
$wgGroupPermissions['user']['translate-messagereview'] = true;
$wgGroupPermissions['user']['translate-groupreview'] = true;
$wgGroupPermissions['user']['translate-import'] = true;
$wgGroupPermissions['sysop']['pagetranslation'] = true;
$wgGroupPermissions['sysop']['translate-manage'] = true;
$wgTranslateDocumentationLanguageCode = 'qqq';
$wgExtraLanguageNames['qqq'] = 'Message documentation'; # No linguistic content. Used for documenting messages
wfLoadExtension( 'UniversalLanguageSelector' );

// # debug enable below this
// $wgShowExceptionDetails = true;
// $wgDebugToolbar = true;
// $wgDevelopmentWarnings = true;