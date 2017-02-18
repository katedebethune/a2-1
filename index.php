<?php require_once('phpfiles/Tools.php'); ?>
<?php require_once('phpfiles/Form.php'); ?>
<?php require_once('phpfiles/WorldCountries.php'); ?>
<?php
    use DWA\Tools;
    use DWA\Form;
    use DWA\WorldCountries;
    if($_GET) {
        // Tools::dump($_GET); # Output from logic, only for debugging purposes to see the contents of POST
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- Head: meta, title, link, script statements -->
        <!-- require_once("phpfiles/includes/headTags.php") -->
        <?php require_once("phpfiles/includes/headTags.php"); ?>

    </head>

    <body>

        <header>

            <!-- Header: Top Home Page, allways the same -->
            <!-- require_once("phpfiles/includes/siteHeader.php") -->
            <?php require_once("phpfiles/includes/siteHeader.php"); ?>

        </header>

        <div id="rowID" class="row myInfoPage">

            <!-- Flag Selection Module -->
            <!-- require_once("phpfiles/includes/myInfoModule.php") -->
            <?php require_once("phpfiles/includes/myInfoModule.php"); ?>

        </div>
        <!-- End of row -->

    </body>

</html>
