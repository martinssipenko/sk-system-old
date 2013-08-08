<?php date_default_timezone_set('Europe/Riga'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
    <head>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <title> Šķūnenieku Kauss - Rezultātu sistēma </title>
    </head>
    <body>
        <center>
            <table class="container" style="width:904px" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table width="890" border="0" cellpadding="0" cellspacing="0" style="margin-top:4px;background-color:#606060;border-bottom:1px solid black">
                            <tr>
                                <td width="15" height="50">
                                    &nbsp;
                                </td>
                                <td width="500" valign="top" style="height:50px;text-align:left">
                                    <a href="?action="><img style="margin-top:6px" border="0" src="images/h_logo.jpg" width="200" height="40" alt="ŠK" title="Šķūnenieku Kauss"></a>
                                </td>
                                <td align="right" valign="bottom" style="color:white;font-size:10px;font-weight:bold">
                                    <form style="margin:0px;padding:0px;" method="post" name="search" action="searchResults.php" target="mainFrame">
                                        <table cellpadding="0" cellspacing="0" border="0" style="padding-bottom:10px">
                                            <tr>
                                                <td>
                                                    Meklēt : &nbsp;
                                                </td>
                                                <td>
                                                    <input style="margin:0px;height:12px;width:128px;" alt="search" type="text" name="searchform" size="20" value="" onfocus="clearForm()">
                                                </td>
                                                <td>
                                                    <input style="margin:0px" type="image" align="middle" src="images/search.gif">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                        <table width="890px" border="0" cellpadding="0" cellspacing="0" style="background-color:#606060">
                            <tr>
                                <td width="80px" height="23" class="blacknav" style="border-left:none">
                                    <a class="m_item" href="registracijaForm.php" target="mainFrame">Reģistrācija</a>
                                </td>
                                <td class="blacknav" width="45px">
                                    <a class="m_item" href="startsForm.php" target="mainFrame">Starts</a>
                                </td>
                                <td class="blacknav" width="45px">
                                    <a class="m_item" href="finissForm.php" target="mainFrame">Finišs</a>
                                </td>
                                <td class="blacknav" width="80px">
                                    <a class="m_item" href="komentetajsForm.php" target="mainFrame">Komentētājs</a>
                                </td>
                                <td class="blacknav">
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                        <table style="margin-top:2px" width="890px" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="700" valign="top">
                                    <iframe name="mainFrame" width="700" height="500" frameborder="0" src="" scrolling="auto" style="padding-top:5px;"></iframe>
                                </td>
                                <td width="10">
                                    &nbsp;
                                </td>
                                <td width="181" align="center" valign="top">
                                    <br/>
                                    <table width="177" height="50" style="margin-bottom:5px;margin-top:1px;background-color:#f1f1f1;border:1px solid #c3c3c3" border="0" cellpadding="10" cellspacing="0">
                                        <tr>
                                            <td valign="top" align="left" width="177">
                                                <div style="font-size:32px; text-align:center;">
                                                    <div name="hronometrs" id="hronometrs"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="177" height="70" style="margin-bottom:5px;margin-top:1px;background-color:#f1f1f1;border:1px solid #c3c3c3" border="0" cellpadding="10" cellspacing="0">
                                        <tr>
                                            <td valign="top" align="left" width="177">
                                                <div style="font-size:12px; line-height: 150%;">
                                                    <div>Reģistrēti: <div id="registreti" style="display: inline;">0</div></div>
                                                    <div>Startējuši: <div id="startejusi" style="display: inline;">0</div></div>
                                                    <div>Finišējuši: <div id="finisejusi" style="display: inline;">0</div></div>
                                                    <br/>
                                                    <div id="reggrp"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="890px" style="margin-bottom:5px;margin-top:1px;background-color:#f1f1f1;border:1px solid #c3c3c3" border="0" cellpadding="10" cellspacing="0">
                            <tr>
                                <td valign="top" align="left" width="300">
                                    <div style="font-size:9px;"></div>
                                </td>
                                <td valign="top" align="left">
                                    <div style="font-size:9px;"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </center>

        <script src="javascript/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="javascript/vendor/jintervals.js" type="text/javascript"></script>
        <script type="text/javascript">
            var watchInterval;

            function update() {
                var t = new Date().getTime();

                $.ajax({
                    url: 'rightInfoData.php',
                    data: { t: t },
                    dataType: 'json'
                }).done(function(data) {
                    clearInterval(watchInterval);
                    var watch = data.watch;

                    $('#hronometrs').html(jintervals(Math.abs(watch), "{HH}:{mm}:{ss}"));
                    watchInterval = setInterval(function() {
                        watch++;
                        $('#hronometrs').html(jintervals(Math.abs(watch), "{HH}:{mm}:{ss}"));
                    }, 1000);


                    $('#registreti').html(data.reg);
                    $('#startejusi').html(data.sta);
                    $('#finisejusi').html(data.fin);
                    $('#reggrp').html('');
                    $.each(data.reggrp, function(index, value) {
                        $('#reggrp').append('<div>' + index + ': ' + value + '</div>');
                    });
                });
            }

            var updateInterval = setInterval(function() {
                update();
            }, 10000);
            update();

            //refreshdiv_hronometrs();
            // refreshdiv_registreti();
            // refreshdiv_startejusi();
            // refreshdiv_finisejusi();

            function clearForm() {
                document.search.searchform.value = "";
            }
        </script>
    </body>
</html>