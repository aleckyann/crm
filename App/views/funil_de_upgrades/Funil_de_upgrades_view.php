<div class="main-container">

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">App</a></li>
                <li class="breadcrumb-item active" aria-current="page">Funis de upgrades</li>
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
                    <h1>Funis de upgrades</h1>
                    <p class="lead">Aqui estão agrupados os funis de upgrades de nossos leads por localidade</p>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="teams" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
                        <div class="row content-list-head">
                            <form class="col-12">
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
                                        <a href="<?=base_url('funil-de-upgrades/'.$l['localidade_id']) ?>" class="btn btn-secondary float-right">Acessar</a>
                                        <div class="card-title">
                                            <h5 data-filter-by="text"><?=$l['localidade_nome']?></h5>
                                            <span><?=$l['leads']?> leads</span>
                                        </div>
                                        <ul class="avatars">
                                            <!-- engajamentos start -->
                                            <?php ultimos_engajamentos($leads, $l['localidade_id']) ?>
                                            <!-- engajamentos end -->
                                        </ul>
                                        <small>Últimos engajamentos</small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        </div>
                        <!--end of content-list-body-->
                    </div>

                </div>

            </div>
        </div>
    </div>


</div>
