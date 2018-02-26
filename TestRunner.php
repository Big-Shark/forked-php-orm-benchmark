<?php
echo "|-------------------------------------------------------------------------------------------------------|\n";
echo "| Library                          | Insert | findPk | complex| hydrate|  with  | memory usage |  time  |\n";
echo "| --------------------------------:| ------:| ------:| ------:| ------:| ------:| ------------:| ------:|\n";

$separator = "|                                  |        |        |        |        |        |              |        |\n";

passthru('php raw_pdo/TestRunner.php');
echo $separator;
passthru('php maghead/TestRunner.php');
echo $separator;
passthru('php lessql/TestRunner.php');
echo $separator;
passthru('php atlas_21/TestRunner.php');
echo $separator;
passthru('php yii1_m/TestRunner.php');
echo $separator;
passthru('php yii2_m/TestRunner.php');
echo $separator;
passthru('php php_activerecord/TestRunner.php');
echo $separator;
passthru('php fuel_18/TestRunner.php');
echo $separator;
// phpixie is broken - "Fatal error: Uncaught exception 'PHPixie\ORM\Exception\Plan' with message 'Result used as update source must contain a single item.' in /repo/phpixie/vendor/phpixie/orm/src/PHPixie/ORM/Steps/Step/Update/Map.php:21"
#passthru('php phpixie/TestRunner.php');
#echo $separator;
//passthru('php propel_14/TestRunner.php');
//echo $separator;
//passthru('php propel_15/TestRunner.php');
//echo $separator;
//passthru('php propel_15_with_cache/TestRunner.php');
//echo $separator;
//passthru('php propel_16/TestRunner.php');
//echo $separator;
//passthru('php propel_16_with_cache/TestRunner.php');
//echo $separator;
//passthru('php propel_17/TestRunner.php');
//echo $separator;
//passthru('php propel_17_with_cache/TestRunner.php');
passthru('php propel_20/TestRunner.php');
echo $separator;
// Propel dm is broken - "Fatal error: Class undefined: Propel\Runtime\Configuration in /repo/propel_dm/generated-conf/config.php on line 4"
//passthru('php propel_dm/TestRunner.php');
//echo $separator;
//passthru('php doctrine_12/TestRunner.php');
//echo $separator;
//passthru('php doctrine_2/TestRunner.php');
//echo $separator;
//passthru('php doctrine_21/TestRunner.php');
//echo $separator;
//passthru('php doctrine_22/TestRunner.php');
//echo $separator;
//passthru('php doctrine_23/TestRunner.php');
//echo $separator;
//passthru('php doctrine_24/TestRunner.php');
//echo $separator;
passthru('php doctrine_m/TestRunner.php');
echo $separator;
if (version_compare(PHP_VERSION, '5.5.9', '>=')) { 
	passthru('php eloquent/TestRunner.php');
}
echo "|-------------------------------------------------------------------------------------------------------|\n";
