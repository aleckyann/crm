<div class="main-container">

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">App</a></li>
                <li class="breadcrumb-item active" aria-current="page">Localidades</li>
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
                    <h1>Localidades</h1>
                    <p class="lead">Aqui estão todas as localidades onde atendemos</p>
                    <button class="btn float-right" data-toggle="modal" data-target="#team-add-modal">
                        Inserir nova localidade
                    </button>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="teams" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
                        <div class="row content-list-head">
                            <form class="col-md-auto">
                                <div class="input-group input-group-round">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">filter_list</i>
                                        </span>
                                    </div>
                                    <input type="search" class="form-control filter-list-input" placeholder="Procurar localidade" aria-label="procurar localidades" aria-describedby="filter-teams">
                                </div>
                            </form>
                        </div>
                        <!--end of content list head-->
                        <div class="content-list-body row">
                            <?php foreach($localidades as $l): ?>
                            <div class="col-md-6">
                                <div class="card card-team">
                                    <div class="card-body">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle float-right" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Opções
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?=base_url('funil-de-vendas/'.$l['localidade_id']) ?>" data-toggle="tooltip" title="Acessar funil de vendas">Funil de vendas</a>
                                                <a class="dropdown-item" href="<?=base_url('funil-de-upgrades/'.$l['localidade_id']) ?>" data-toggle="tooltip" title="Acessar funil de upgrades">Funil de upgrades</a>
                                                <a class="dropdown-item" href="<?=base_url('leads/'.$l['localidade_id']) ?>" data-toggle="tooltip" title="Acessar lista de leads">Lista de leads</a>
                                            </div>
                                        </div>
                                        <div class="card-title">
                                            <h5 data-filter-by="text"><?=$l['localidade_nome']?></h5>
                                            <span><?=$l['leads']?> leads</span>
                                        </div>
                                        <ul class="avatars">
                                            <!-- engajamentos start -->
                                            <?php ultimos_engajamentos($leads, $l['localidade_id']) ?>
                                            <!-- engajamentos end -->
                                        </ul>
                                        <small>Últimos engajamentos nesta localidade</small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        </div>
                        <!--end of content-list-body-->
                    </div>

                </div>


                <form class="modal fade" id="team-add-modal" action="<?=base_url('localidades/create') ?>" method="post" tabindex="-1" role="dialog" aria-labelledby="team-add-modal" aria-hidden="true">
                    <?=$csrf_input?>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Cadastrar uma nova localidade</h5>
                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <!--end of modal head-->
                            <div class="modal-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="team-add-details" role="tabpanel" aria-labelledby="team-add-details-tab">
                                        <h6 class="small">O cadastro de novas localidades é sinal que estamos crescendo!</h6>
                                        <div class="form-group row align-items-center">
                                            <label class="col-3">Nome</label>
                                            <input class="form-control col" type="text" placeholder="Nome do local/cidade" name="localidade_nome" required />
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Descrição</label>
                                            <textarea class="form-control col" rows="3" placeholder="Descições sobre o local/cidade" name="localidade_descricao"></textarea>
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
