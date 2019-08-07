<html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instituto Alliqua - Blog </title>

        <meta property="og:url" content="https://goo.gl/KogxQp"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="Aprenda elaborar ótimos Relatórios Descritivos"/>
        <meta property="og:description" content="Para se escrever um bom relatório escolar é preciso organização da prática docente. 
              Organização quanto a documentação e registro do dia a dia. Registrar é preciso para desvelar a prática docente. E por que falar de registros reflexivos? 
              Porque serão eles que nos darão base e norte para elaborar bons relatórios. "/>
        <meta property="og:image" content="http://alliqua.com.br/courses/C0017/images/RD_540x320.png "/>


        <!-- CSS External Files -->
        <link href="../Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../CoursesStyle.css" rel="stylesheet" type="text/css"/>

        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '222351688319261');
            fbq('track', 'PageView');
        </script>

    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=222351688319261&ev=PageView&noscript=1"
                   /></noscript>
    <!-- End Facebook Pixel Code -->

    <script>
        fbq('track', 'ViewContent');
    </script>

    <style>
        p {
            display: block; /* or inline-block */
            text-overflow: ellipsis;
            word-wrap: break-word;
            white-space: normal;
            overflow: hidden;
            max-height: 7.5em;
            line-height: 1.5em;

        }

        
    </style>

</head>


<body>

    <?php include_once("../analyticstracking.php") ?>

    <div id="fb-root"></div>


    <div id="" class="container">

        <div class="row">
            <div id="menuBar" class="col-lg-12">
                <a href="http://alliqua.com.br"><img src="../img/Logo_174x25.png"></a>
            </div>
        </div>

        <!-- ****************************************************************************************************************************
        ********************************************************INICIO DO POST***********************************************************
        ******************************************************************************************************************************-->

        <?php include 'posts.php'; ?>

        <!--**************************************************************************************************************************-->

    </div>


</body>
</html>