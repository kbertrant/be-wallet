<html>
<head>
    <style type="text/CSS">
        /* for Yahoo Beta, AOL */
        body, #body_style {background: #ffffff; min-height: 200px; color: #fff; font-family: Arial, Helvetica, sans-serif; font-size: 12px;}

        /* for Hotmail */
        .ExternalClass {width: 100%;}

        /* for Yahoo Classic and New */
        .yshortcuts {color: #F00;}

        /* some css reset for Gmail, Hotmail */
        p {margin: 0; padding: 0; margin-bottom: 0;}
        a, a:link, a:visited {color: #2A5DB0;}
        table tr td a.link{
            width: 100%; display:inline-block; background-color: #222d32; color: #fff !important; text-decoration: none; font-size: 20pt; text-align: center;
            padding-top: 15px; padding-bottom: 15px; border-radius: 5px; margin-top: 30px;
        }
    </style>
</head>

<body style="background: #ffffff; min-height: 500px; color: #000; font-family: Arial, Helvetica, sans-serif; font-size: 13px" alink="#FF0000" link="#FF0000" bgcolor="#f5f5f5" text="#000000">

<span id="body_style" style="display: block">
        <table bgcolor="#ffffff" width="600" align="center">
            <tr>
                <td>
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                        <tr>
                            <td><h1 style="color:#222d32">Confirmation de votre compte Bewallet</h1></td>
                        </tr>
                        <tr style="height: 20px;"></tr>
                    </table>
                    <!-- CONTENT - BEGIN -->
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                        <tr>
                            <td style="color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12pt; width: 600px; padding: 0px;">
                                <div style="margin-left: 10px; margin-right: 10px;">
                                    <p>
                                        Bienvenue sur Bewallet <b>{{ $name }}</b> !
                                        <br/>
                                        Afin de valider votre adresse email et confirmer votre compte, veuillez cliquez sur le lien ci-dessous
                                    </p>
                                    <p style="text-align: left;">
                                        <a class="link" style="color: #fff !important;" href="{{ $url }}">
                                            Confirmer mon compte
                                        </a>
                                    </p>
                                </div>
                                <br/>
                                <div>
                                    <p style="font-size: 12px; margin-top:15px;">
                                        Pour tout problème ou précoccupation, n'hésitez pas à nous contacter à l'adresse
                                        <a href="mailto:contact@drive-u-safe.com">contact@bewallet.com</a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr style="height: 40px;"></tr>
                    </table>
                    <!-- CONTENT - END -->
                </td>
            </tr>
        </table>
    </span>
</body>
</html>