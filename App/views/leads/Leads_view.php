<div class="main-container">

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">App</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('localidades') ?>">Localidades</a></li>
                <li class="breadcrumb-item active" aria-current="page">Leads</li>
            </ol>
        </nav>
        <div class="dropdown">
            <a class="btn btn-round" href="<?=base_url('logout')?>">
                <i class="material-icons text-danger"> exit_to_app </i>
            </a>
        </div>

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
                <div class="page-header">
                    <?=$this->ui->alert_flashdata()?>
                    <h1>Leads de <?=$localidade['localidade_nome'] ?></h1>
                    <p class="lead">Aqui estão todas as leads que mantemos relacionamentos em <?=$localidade['localidade_nome'] ?></p>
                    <small class="mr-2"><span class="badge bg-danger text-danger">!!</span> Melhore este relacionamento</small>
                    <small class="mr-2"><span class="badge bg-warning text-warning">!!</span> Mantenha-se atento</small>
                    <small><span class="badge bg-success text-success">!!</span> Parece estar tudo bem</small>
                    <hr>
                    <button class="btn float-right" data-toggle="modal" data-target="#user-invite-modal">
                        Adicionar lead
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="members-tab" data-filter-list="content-list-body">
                        <div class="content-list">
                            <div class="row content-list-head">
                                <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Procurar lead" aria-label="Procurar lead" aria-describedby="filter-members">
                                    </div>
                                </form>
                            </div>
                            <!--end of content list head-->
                            <div class="content-list-body row">

                                <?php foreach($leads as $p): ?>
                                <div class="col-6">
                                    <a class="card card-project" href="<?=base_url('lead/'.$p['lead_id'])?>">
                                        <div class="progress">
                                            <div class="progress-bar <?= bg_comportamental($p) ?>" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="mb-0" data-filter-by="text"><?=$p['lead_nome']?></h6>
                                            <span data-filter-by="text" class="text-body small">Estamos nos relacionando desde <?=data_normal($p['created_at'])?></span>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>

                            </div>
                        </div>
                        <!--end of content list-->
                    </div>
                </div>


                <form class="modal fade" id="user-invite-modal" action="<?=base_url('leads/create') ?>" method="post" tabindex="-1" role="dialog" aria-labelledby="user-invite-modal" aria-hidden="true">
                    <?=$csrf_input?>
                    <input type="hidden" name="localidade_id" value="<?=$this->uri->segment(2)?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Cadastro de novo lead</h5>
                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <!--end of modal head-->
                            <div class="modal-body">
                                <h6 class="small">Cadastro de novas leads nos deixa motivados!</h6>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Nome</label>
                                    <input class="form-control col" type="text" placeholder="Nome completo  " name="lead_nome" required />
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Email</label>
                                    <input class="form-control col" type="email" placeholder="Email para contato" name="lead_email" required />
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Whatsapp</label>
                                    <input class="form-control col" type="number" placeholder="Celular / whatsapp" name="lead_whatsapp" placeholder="Exemplo: 38999885533" required />
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Localidade</label>
                                    <input class="form-control col" type="tel" value="<?=$localidade['localidade_nome']?>" readonly />
                                </div>
                                <hr>
                                <div class="container">
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_reclama_facebook" class="custom-control-input" id="notify-1">
                                            <label class="custom-control-label" for="notify-1">Já se manifestou negativamente no facebook</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_reclama_telefone" class="custom-control-input" id="notify-2">
                                            <label class="custom-control-label" for="notify-2">Já fez reclamações por <i>Telefone, Whatsapp ou Loja</i></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_curte_facebook" class="custom-control-input" id="notify-3">
                                            <label class="custom-control-label" for="notify-3">Curtiu nossa página do facebook</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_recomenda_facebook" class="custom-control-input" id="notify-4">
                                            <label class="custom-control-label" for="notify-4">Recomendou nossa empresa no Facebook</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_segue_instagram" class="custom-control-input" id="notify-5">
                                            <label class="custom-control-label" for="notify-5">Segue nossa empresa no instagram</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_reclama_google" class="custom-control-input" id="notify-6">
                                            <label class="custom-control-label" for="notify-6">Se manifestou negativamente no Google Guides</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_boa_pagadora" class="custom-control-input" id="notify-7">
                                            <label class="custom-control-label" for="notify-7">Esta lead é uma bom pagadora</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                                            <input type="checkbox" name="lead_familiar" class="custom-control-input" id="notify-">
                                            <label class="custom-control-label" for="notify-">É familiar de algum de nossos colaboradores?</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end of modal body-->
                            <div class="modal-footer">
                                <button role="button" class="btn btn-primary" type="submit">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
