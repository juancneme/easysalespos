<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- If you delete this tag, the sky will fall on your head -->
    <meta name="viewport" content="width=device-width" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PDVI</title>




    <style type="text/css">

        /* -------------------------------------
                GLOBAL
        ------------------------------------- */
        * {
            margin:0;
            padding:0;
        }
        * { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

        img {
            max-width: 20%;
            min-width: 90px;

        }
        .collapse {
            margin:0;
            padding:0;
        }
        body {
            -webkit-font-smoothing:antialiased;
            -webkit-text-size-adjust:none;
            width: 100%!important;
            height: 100%;
        }


        /* -------------------------------------
                ELEMENTS
        ------------------------------------- */
        a { color: #2BA6CB;}

        .btn {
            text-decoration:none;
            color: #FFF;
            background-color: #666;
            padding:10px 16px;
            font-weight:bold;
            margin-right:10px;
            text-align:center;
            cursor:pointer;
            display: inline-block;
        }

        p.callout {
            padding:15px;
            background-color:#ECF8FF;
            margin-bottom: 15px;

        }
        .callout a {
            font-weight:bold;
            color: #2BA6CB;
        }

        table.social {
            /* 	padding:15px; */
            background-color: #ebebeb;

        }
        .social .soc-btn {
            padding: 3px 7px;
            font-size:12px;
            margin-bottom:10px;
            text-decoration:none;
            color: #FFF;font-weight:bold;
            display:block;
            text-align:center;
        }
        a.fb { background-color: #3B5998!important; }
        a.tw { background-color: #1daced!important; }
        a.gp { background-color: #DB4A39!important; }
        a.ms { background-color: #000!important; }

        .sidebar .soc-btn {
            display:block;
            width:100%;
        }

        /* -------------------------------------
                HEADER
        ------------------------------------- */
        table.head-wrap { width: 100%;}

        .header.container table td.logo { padding: 15px; }
        .header.container table td.label { padding: 15px; padding-left:0px;}


        /* -------------------------------------
                BODY
        ------------------------------------- */
        table.body-wrap { width: 100%;}


        /* -------------------------------------
                FOOTER
        ------------------------------------- */
        table.footer-wrap { width: 100%;	clear:both!important;
        }
        .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
        .footer-wrap .container td.content p {
            font-size:10px;
            font-weight: bold;

        }


        /* -------------------------------------
                TYPOGRAPHY
        ------------------------------------- */
        h1,h2,h3,h4,h5,h6 {
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
        }
        h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

        h1 { font-weight:200; font-size: 44px;}
        h2 { font-weight:200; font-size: 37px;}
        h3 { font-weight:500; font-size: 27px;}
        h4 { font-weight:500; font-size: 23px;}
        h5 { font-weight:900; font-size: 17px;}
        h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

        .collapse { margin:0!important;}

        p, ul {
            margin-bottom: 10px;
            font-weight: normal;
            font-size:14px;
            line-height:1.6;
        }
        p.lead { font-size:17px; }
        p.last { margin-bottom:0px;}

        ul li {
            margin-left:5px;
            list-style-position: inside;
        }

        /* ---------------------------------------------------
                RESPONSIVENESS
                Nuke it from orbit. It's the only way to be sure.
        ------------------------------------------------------ */

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display:block!important;
            max-width:600px!important;
            margin:0 auto!important; /* makes it centered */
            clear:both!important;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            padding:15px;
            max-width:600px;
            margin:0 auto;
            display:block;
        }

        /* Let's make sure tables in the content area are 100% wide */
        .content table { width: 100%; }


        /* Odds and ends */
        .column {
            width: 300px;
            float:left;
        }
        .column tr td { padding: 15px; }
        .column-wrap {
            padding:0!important;
            margin:0 auto;
            max-width:600px!important;
        }
        .column table { width:100%;}
        .social .column {
            width: 280px;
            min-width: 279px;
            float:left;
        }


    </style>
</head>

<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#4980B5">
    <tr>
        <td></td>
        <td class="header container">

            <div class="content">
                <table bgcolor="#4980B5">
                    <tr>
                        <td><img src="http://des.salespoint/support/pictures/config/logos/logo000003.png" style="max-width:45%" /></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">
            <div class="content">
                <table>
                    <tr>
                        <td>
                            <h3>Hola </h3> <!--<Nombre de persona completo>-->
                            <h3>Acabas de realizar una compra en linea</h3>
                            <p>Correo del comprador: </p> <p>{{ $emailClient }}</p>
                            <p class="lead"> <strong> A continuación se adjunta el comprobante </strong></p>
                            <!-- Contacto -->
                            <table class="social" width="100%">
                                <tr>
                                    <td>
                                        <table align="left">
                                            <tr>
                                                <td>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>

<!-- FOOTER -->
<table class="footer-wrap">
    <tr>
        <td></td>
        <td class="container">
            <!-- content -->

        </td>
    </tr>
</table><!-- /FOOTER -->

</body>
</html>