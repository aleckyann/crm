<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Wult - CRM for ISP's</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A project management Bootstrap theme by Medium Rare">
        <link href="<?=base_url()?>public/assets/img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="<?=base_url()?>public/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
        <div class="main-container fullscreen">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-7">
                        <?=$this->ui->alert_flashdata()?>
                        <div class="text-center">
                            <h1 class="h2">Perdi minha senha &#x1f62B;</h1>
                            <p class="lead">Informe seu e-mail para recuperar o acesso</p>
                            <form action="<?=base_url('recuperar/senha')?>" method="post">
                                <?=$csrf_input?>
                                <input type="hidden" name="id" value="<?=$this->input->get('id')?>">
                                <input type="hidden" name="hash" value="<?=$this->input->get('hash')?>">
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Nova senha de acesso" name="senha" required />
                                </div>
                                <button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
                                    Recuperar senha por email . . .
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/autosize@4.0.2/dist/autosize.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.10.0/prism.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.7/lib/draggable.bundle.legacy.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.7/lib/plugins/swap-animation.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>public/assets/js/theme.js"></script>


        <style type="text/css">
            .layout-switcher{ position: fixed; bottom: 0; left: 50%; transform: translateX(-50%) translateY(73px); color: #fff; transition: all .35s ease; background: #343a40; border-radius: .25rem .25rem 0 0; padding: .75rem; z-index: 999; }
            .layout-switcher:not(:hover){ opacity: .95; }
            .layout-switcher:not(:focus){ cursor: pointer; }
            .layout-switcher-head{ font-size: .75rem; font-weight: 600; text-transform: uppercase; }
            .layout-switcher-head i{ font-size: 1.25rem; transition: all .35s ease; }
            .layout-switcher-body{ transition: all .55s ease; opacity: 0; padding-top: .75rem; transform: translateY(24px); text-align: center; }
            .layout-switcher:focus{ opacity: 1; outline: none; transform: translateX(-50%) translateY(0); }
            .layout-switcher:focus .layout-switcher-head i{ transform: rotateZ(180deg); opacity: 0; }
            .layout-switcher:focus .layout-switcher-body{ opacity: 1; transform: translateY(0); }
            .layout-switcher-option{ width: 72px; padding: .25rem; border: 2px solid rgba(255,255,255,0); display: inline-block; border-radius: 4px; transition: all .35s ease; }
            .layout-switcher-option.active{ border-color: #007bff; }
            .layout-switcher-icon{ width: 100%; border-radius: 4px; }
            .layout-switcher-body:hover .layout-switcher-option:not(:hover){ opacity: .5; transform: scale(0.9); }
            @media all and (max-width: 990px){ .layout-switcher{ min-width: 250px; } }
            @media all and (max-width: 767px){ .layout-switcher{ display: none; } }
        </style>
        <div class="layout-switcher" tabindex="1">
            <div class="layout-switcher-head d-flex justify-content-between">
                <span>Select Layout</span>
                <i class="material-icons">arrow_drop_up</i>
            </div>
            <div class="layout-switcher-body">


            </div>
        </div>

    </body>

</html>
