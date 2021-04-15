
            <div class="main-container">

                <div class="breadcrumb-bar navbar bg-white sticky-top">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">App</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=ucfirst($this->uri->segment(1))?></li>
                        </ol>
                    </nav>
                    <div class="dropdown">
                        <a class="btn btn-round" href="<?=base_url('logout')?>">
                            <i class="material-icons text-danger"> exit_to_app </i>
                        </a>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-3 mb-3">
                            <ul class="nav nav-tabs flex-lg-column">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Dados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Senha</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-8 col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                                            <form action="<?=base_url('conta/update') ?>" method="post">
                                                <?= $csrf_input ?>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Nome</label>
                                                    <div class="col">
                                                        <input type="text" placeholder="Nome completo" value="<?=$usuario['usuario_nome'] ?>" name="usuario_nome" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Email</label>
                                                    <div class="col">
                                                        <input type="email" placeholder="Email para login" value="<?=$usuario['usuario_email'] ?>" name="usuario_email" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" id="password" aria-labelledby="password-tab">
                                            <form action="<?=base_url('conta/update-senha') ?>" method="post">
                                                <?= $csrf_input ?>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Nova senha</label>
                                                    <div class="col">
                                                        <input type="text" placeholder="Nova senha de acesso" name="usuario_senha" class="form-control" />
                                                        <small>Escolha sempre por senhas seguras!</small>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Alterar senha</button>
                                                </div>
                                            </form>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <?=$this->ui->alert_flashdata()?>
                        </div>
                    </div>
                </div>

            </div>
