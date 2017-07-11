<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
        <title>Asic</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <?= $this->Html->meta('icon'); ?> 
        <style>
            *,*:before,*:after {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
            /* ! normalize.css v2.1.3 | MIT License | git.io/normalize */
            article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary { display: block }
            audio, canvas, video { display: inline-block }
            audio:not([controls]) { display: none; height: 0; }
            [hidden], template { display: none }
            html { font-family: sans-serif; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; }
            body { margin: 0 }
            a { background: transparent }
            a:focus { outline: thin dotted }
            a:active, a:hover { outline: 0 }
            h1 { font-size: 2em; margin: 0.67em 0; }
            abbr[title] { border-bottom: 1px dotted }
            b, strong { font-weight: bold }
            dfn { font-style: italic }
            hr { -moz-box-sizing: content-box; box-sizing: content-box; height: 0; }
            mark { background: #ff0; color: #000; }
            code, kbd, pre, samp { font-family: monospace, serif; font-size: 1em; }
            pre { white-space: pre-wrap }
            q { quotes: "\201C" "\201D" "\2018" "\2019" }
            small { font-size: 80% }
            sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
            sup { top: -0.5em }
            sub { bottom: -0.25em }
            img { border: 0 }
            svg:not(:root) { overflow: hidden }
            figure { margin: 0 }
            fieldset { border: 1px solid #c0c0c0; margin: 0 2px; padding: 0.35em 0.625em 0.75em; }
            legend { border: 0; padding: 0; }
            button, input, select, textarea { font-family: inherit; font-size: 100%; margin: 0; }
            button, input { line-height: normal }
            button, select { text-transform: none }
            button, html input[type="button"],
            input[type="reset"], input[type="submit"] { -webkit-appearance: button; cursor: pointer; }
            button[disabled], html input[disabled] { cursor: default }
            input[type="checkbox"], input[type="radio"] { box-sizing: border-box; padding: 0; }
            input[type="search"] { -webkit-appearance: textfield; -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box; }
            input[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration { -webkit-appearance: none }
            button::-moz-focus-inner, input::-moz-focus-inner { border: 0; padding: 0; }
            textarea { overflow: auto; vertical-align: top; }
            table { border-collapse: collapse; border-spacing: 0; }

            body {padding:20px 0}
            a {color:#2992c8;text-decoration:none}
            a:hover,a:focus {color:#056495}
            h1 {font:normal 26px/30px "Roboto",Arial,sans-serif;margin-bottom:14px;padding-left:10px;border-left: 4px solid #c80002}
            p {font:normal 16px/24px "Roboto",Arial,sans-serif;margin:0 0 5px}
            .error_container {width:40%;margin:0 auto}

            @media (max-width: 1199px) {
                .error_container {width:100%;padding:0 20px}
            }
        </style>
        <link href='http://fonts.googleapis.com/css?family=Roboto:300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="error_container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <p>
                De click en <?=$this->Html->link('Regresar al sistema',['controller' => 'Mains', 'action' => 'configuracion_views']);?>
            </p>
        </div>
    </body>
</html>
