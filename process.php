<!DOCTYPE html>
<!--
Copyright (C) 2012  Rob Stewart <robstewart57@gmail.com>, SerenA <http://www.serena.ac.uk>

This file is part of Discover-me-Semantically.

 Discover-me-Semantically is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
-->

<html>

    <head>
        <title>Discover Me Semantically</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.ez-pinned-footer.js"></script>

        <link href='css/prettify.css' type='text/css' rel='stylesheet' />
        <script type="text/javascript" src="js/prettify.js"></script>

        <script>
            $(window).resize(function() {
                $("#footer").pinFooter("relative");
            });

            $(document).ready(function() {
                $("#footer").pinFooter();
            });

        </script>

    </head>


    <?php
    include("downloadFile.php");
    include ("generateRDF.php");
    saveToFile($rawRDF,$fileName); // variables created in `generateRDF'
    ?>

    <body>

<div class="thankYouPage">
<a href="https://github.com/robstewart57/discover-me-semantically" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>

        <img class="topLogo" src="img/logo.png"/>

        <div class="centerDiv">

            <h2>What now?</h2>

      Thanks for signing up! We will soon use the data you have provided, and at some stage produce a report suggesting...
<br><br>
<li> Heriot Watt researchers you might like to speak with
<li> Papers written by Heriot Watt academics that might relate to your PhD research
<li> Ideas or knowledge that relates to your PhD research and interests                                                          

<br><br>
Expect an email from us in the coming weeks.

<br><br>

<center>
      <B>This is the end of the sign-up procedure. The information below is not part of the study, but may be of interest to you.</B>
</center>

<br><br><br><br>
            <h2>What Else?</h2>

      The evaluation of this study will continue when we have analysed the data from each participant. We will get in touch with you at a late date about this. In the meantime...

<li> Download your RDF file and add a link to it on your webpage. This provides search engines with a machine-readable information source that describes you and your research, and makes you more visible on the <i>semantic</i> web. Instructions are <a style="font-size: 11pt;" target="_blank" href="http://wiki.foaf-project.org/w/FAQ">here</a> on how to do so.

<li> To demonstrate the benefit of semantics in your new RDF file, you can visualize your research with respect to the surrounding concepts to your interests and expertise that you have just specified on the previous page.

<br><br>
<center>
<table valign="top" style="text-align: center;">
<tr>
<td valign="top">
<form name="input" action="download-me.php" method="post" >
<input type="hidden" name="fileName" id="fileName" value="<?php echo $fileName; ?>">
<input type="hidden" name="fileLoc" id="fileLoc" value="<?php echo "rdf/" . $fileName; ?>">
<input type="hidden" name="rawRDF" id="rawRDF" value="<?php echo urlencode($rawRDF); ?>">
<button type="submit" id="btnDownload">Download RDF</button>
</form>
<img src="img/rdf_logo.png" />
</td>

<td valign="top">
<form name="input" target="_blank" action="visualize.php" method="post" >
<input type="hidden" name="fileName" id="fileName" value="<?php echo $fileName; ?>">
<input type="hidden" name="fileLoc" id="fileLoc" value="<?php echo $userURI; ?>">
<input type="hidden" name="rawRDF" id="rawRDF" value="<?php echo urlencode($rawRDF); ?>">
<button type="submit" id="btnLodLive">Visualize!</button>
</form>
<img src="img/logoLodLive.jpg" />
</td>
</tr>
</table>
</center>

</div>

<!--
            <h2>RDF Representation</h2>

            <table class="inputTable">
                <tr class="centerRow">
                    <td class="rdfOutputCell">

                        <div id="rdfPrettyPrint">
                            <pre class="prettyprint">
                                <?php
                                echo $serializedRDF;
                                ?>
                            </pre>
                        </div>
                        <script src="prettify.js"></script>
                        <script>prettyPrint();</script>

                    </td>


                        </table>
-->


            </table>

        </div>

<?php
   include("footer.php");
?>


    </body>

</html>