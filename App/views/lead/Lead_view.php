
            <div class="main-container">

                <div class="breadcrumb-bar navbar bg-white sticky-top">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">App</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url('localidades')?>">Localidades</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url('leads/'.$lead['localidade_id'])?>">Leads</a></li>
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
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="page-header ml-lg-4">
                                <?=$this->ui->alert_flashdata()?>
                                <h1>Dados de <?=ucfirst($lead['lead_nome'])?></h1>
                                <p class="lead">Aqui está tudo o que nós sabemos sobre <?=ucfirst($lead['lead_nome'])?></p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <ul class="nav nav-tabs flex-lg-column">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Dados Pessoais</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="comercial-tab" data-toggle="tab" href="#comercial" role="tab" aria-controls="comercial" aria-selected="false">Dados Comerciais</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="comportamento-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">Comportamento</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="redes-sociais-tab" data-toggle="tab" href="#comunicacao" role="tab" aria-controls="comunicacao" aria-selected="false">Canais de comunicação</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-8 col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?=base_url('lead/update') ?>" method="post">
                                        <?=$csrf_input?>
                                        <input type="hidden" name="lead_id" value="<?=$lead['lead_id'] ?>">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Nome completo</label>
                                                    <div class="col">
                                                        <input type="text" placeholder="Nome completo" value="<?=$lead['lead_nome']?>" name="lead_nome" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Email</label>
                                                    <div class="col">
                                                        <input type="email" placeholder="Email para contato" value="<?=$lead['lead_email']?>" name="lead_email" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Celular/Whatsapp</label>
                                                    <div class="col">
                                                        <input class="form-control" type="number" name="lead_whatsapp" value="<?=$lead['lead_whatsapp'] ?>" placeholder="Exemplo: 38999885533">
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label class="col-3" for="lead_instagram">Instagram</label>
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text form-control-sm">@</div>
                                                            </div>
                                                            <input class="form-control form-control-sm" type="text" name="lead_instagram" id="lead_instagram" value="<?=$lead['lead_instagram'] ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label class="col-3" for="lead_facebook">Facebook</label>
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text form-control-sm">@</div>
                                                            </div>
                                                            <input class="form-control form-control-sm" type="text" name="lead_facebook" value="<?=$lead['lead_facebook'] ?>">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Endereço</label>
                                                    <div class="col">
                                                        <input type="text" placeholder="Endereço" value="<?=$lead['lead_endereco']?>" name="lead_endereco" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-3">Sobre</label>
                                                    <div class="col">
                                                        <textarea type="text" value="<?=$lead['lead_sobre']?>" name="lead_sobre" placeholder="Fale um pouco sobre esta lead, detalhes como: opção sexual, humor, descolado ou reservado, etc" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </div>


                                            <div class="tab-pane fade" role="tabpanel" id="comercial" aria-labelledby="comercial-tab">
                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Plano de acesso</label>
                                                    <div class="col">
                                                        <select class="form-control form-control-sm" name="lead_plano">
                                                            <option value="0" <?=select($lead['lead_plano'], 0)?>>Não informado</option>
                                                            <option value="2" <?=select($lead['lead_plano'], 2)?>>2 Mb</option>
                                                            <option value="3" <?=select($lead['lead_plano'], 3)?>>3 Mb</option>
                                                            <option value="4" <?=select($lead['lead_plano'], 4)?>>4 Mb</option>
                                                            <option value="5" <?=select($lead['lead_plano'], 5)?>>5 Mb</option>
                                                            <option value="6" <?=select($lead['lead_plano'], 6)?>>6 Mb</option>
                                                            <option value="10" <?=select($lead['lead_plano'], 10)?>>10 Mb</option>
                                                            <option value="30" <?=select($lead['lead_plano'], 30)?>>30 Mb</option>
                                                            <option value="60" <?=select($lead['lead_plano'], 60)?>>60 Mb</option>
                                                            <option value="100" <?=select($lead['lead_plano'], 100)?>>100 Mb</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label class="col-3">Valor pago</label>
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text form-control-sm">R$</div>
                                                            </div>
                                                            <input type="number" step="any" placeholder="Valor pago pelo plano" value="<?=@$lead['lead_valor']?>" name="lead_valor" class="form-control form-control-sm" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </div>



                                            <div class="tab-pane fade" role="tabpanel" id="notifications" aria-labelledby="comportamento-tab">
                                                <h6>Perfil comportamental</h6>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_reclama_facebook" value="off">
                                                        <input type="checkbox" name="lead_reclama_facebook" class="custom-control-input" id="notify-1" <?= check($lead['lead_reclama_facebook']) ?>>
                                                        <label class="custom-control-label" for="notify-1">Já se manifestou negativamente no facebook</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_reclama_telefone" value="off">
                                                        <input type="checkbox" name="lead_reclama_telefone" class="custom-control-input" id="notify-2" <?= check($lead['lead_reclama_telefone']) ?>>
                                                        <label class="custom-control-label" for="notify-2">Já fez reclamações por <i>Telefone, Whatsapp ou Loja</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_curte_facebook" value="off">
                                                        <input type="checkbox" name="lead_curte_facebook" class="custom-control-input" id="notify-3" <?= check($lead['lead_curte_facebook']) ?>>
                                                        <label class="custom-control-label" for="notify-3">Curtiu nossa página do facebook</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_recomenda_facebook" value="off">
                                                        <input type="checkbox" name="lead_recomenda_facebook" class="custom-control-input" id="notify-4" <?= check($lead['lead_recomenda_facebook']) ?>>
                                                        <label class="custom-control-label" for="notify-4">Recomendou nossa empresa no Facebook</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_segue_instagram" value="off">
                                                        <input type="checkbox" name="lead_segue_instagram" class="custom-control-input" id="notify-5" <?= check($lead['lead_segue_instagram']) ?>>
                                                        <label class="custom-control-label" for="notify-5">Segue nossa empresa no instagram</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_reclama_google" value="off">
                                                        <input type="checkbox" name="lead_reclama_google" class="custom-control-input" id="notify-6" <?= check($lead['lead_reclama_google']) ?>>
                                                        <label class="custom-control-label" for="notify-6">Se manifestou negativamente no Google Guides</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_boa_pagadora" value="off">
                                                        <input type="checkbox" name="lead_boa_pagadora" class="custom-control-input" id="notify-7" <?= check($lead['lead_boa_pagadora']) ?>>
                                                        <label class="custom-control-label" for="notify-7">Esta lead é uma bom pagadora</label>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-md-4">
                                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                                        <input type="hidden" name="lead_familiar" value="off">
                                                        <input type="checkbox" name="lead_familiar" class="custom-control-input" id="notify-8" <?= check($lead['lead_familiar']) ?>>
                                                        <label class="custom-control-label" for="notify-8">É familiar de algum de nossos colaboradores?</label>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" role="tabpanel" id="comunicacao" aria-labelledby="redes-sociais-tab">
                                                <h6>Canais de comunicação</h6>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="media align-items-center">
                                                                    <img alt="Image" src="<?=base_url()?>public/assets/img/whatsapp.png" height="40px" />
                                                                    <div class="media-body ml-2">
                                                                        <span class="h6 mb-0 d-block">Whatsapp</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button type="button" onclick="openWhatsapp()" class="btn btn-sm btn-success">
                                                                    Iniciar conversa
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="media align-items-center">
                                                                    <img alt="Image" src="<?=base_url()?>public/assets/img/instagram.svg" height="40px" />
                                                                    <div class="media-body ml-2">
                                                                        <span class="h6 mb-0 d-block">Instagram</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button  type="button" onclick="openInstagram()" class="btn btn-sm btn-success">
                                                                    Visitar o perfil
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="media align-items-center">
                                                                    <img alt="Image" src="<?=base_url()?>public/assets/img/facebook.png" height="40px" />
                                                                    <div class="media-body ml-2">
                                                                        <span class="h6 mb-0 d-block">Facebook</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button type="button" onclick="openFacebook()" class="btn btn-sm btn-success">
                                                                    Visitar o perfil
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="media align-items-center">
                                                                    <img alt="Image" src="<?=base_url()?>public/assets/img/email.png" height="40px" />
                                                                    <div class="media-body ml-2">
                                                                        <span class="h6 mb-0 d-block">E-mail</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button type="button" data-toggle="modal" data-target="#modalEmail" class="btn btn-sm btn-success">
                                                                    Enviar email
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="media align-items-center">
                                                                    <img alt="Image" src="<?=base_url()?>public/assets/img/sms.png" height="40px" />
                                                                    <div class="media-body ml-2">
                                                                        <span class="h6 mb-0 d-block">E-mail</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <button type="button" data-toggle="modal" data-target="#modalSMS" class="btn btn-sm btn-success">
                                                                    Enviar sms
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Modal SMS-->
            <div class="modal fade" id="modalSMS" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Enviar SMS</h5>
                            <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <!--end of modal head-->
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="team-add-details" role="tabpanel" aria-labelledby="team-add-details-tab">
                                    <h6 class="small">Mensagens SMS são sempre uma boa forma de comunicação com leads</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Número</label>
                                        <input class="form-control col" type="text" id="smsNumber" value="<?=$lead['lead_whatsapp']?>" readonly/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Mensagem <small class="text-danger ml-2" id="countSMS">150</small></label>
                                        <textarea class="form-control col" id="smsMessage" rows="3" placeholder="Sua mensagem pode conter até 150 caracteres" maxlength="150" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="button" id="btn_enviar_sms" onclick="enviar_sms()">
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal EMAIL-->
            <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Enviar Email</h5>
                            <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <!--end of modal head-->
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="team-add-details" role="tabpanel" aria-labelledby="team-add-details-tab">
                                    <h6 class="small">E-mails são excelentes para medir o engajamento de nossos leads</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Email</label>
                                        <input class="form-control col" type="text" id="emailEmail" value="<?=$lead['lead_email']?>" readonly/>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Assunto</label>
                                        <input class="form-control col" type="text" id="emailAssunto" placeholder="Assunto do email" required/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Mensagem</label>
                                        <textarea class="form-control col" rows="3" id="emailMessage" placeholder="Escreva aqui sua mensagem" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="button" id="btn_enviar_email" onclick="enviar_email()">
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function openInstagram() {
                    let instagram = 'https://www.instagram.com/'+$("input[name=lead_instagram]").val()
                    window.open(instagram, '_blank');
                }

                function openFacebook() {
                    let facebook = 'https://www.facebook.com/'+$("input[name=lead_facebook]").val()
                    window.open(facebook, '_blank');
                }

                function openWhatsapp() {
                    let whatsapp = 'https://api.whatsapp.com/send?phone=55'+$("input[name=lead_whatsapp]").val()
                    window.open(whatsapp, '_blank');
                }

                function enviar_sms() {
                    $('#btn_enviar_sms').addClass('disabled').text('Enviando SMS, aguarde...')
                    $.ajax({
                      method: "POST",
                      url: "<?=base_url('lead/sms') ?>",
                      data: {
                          lead_id: "<?=$this->uri->segment(2)?>",
                          lead_sms_text: $('#smsMessage').val(),
                          <?=$this->security->get_csrf_token_name()?>: "<?=$this->security->get_csrf_hash()?>"
                      }
                    })
                    .done(function(resultado) {
                        resultado = JSON.parse(resultado);
                        $('#smsMessage').val('');
                        $('#modalSMS').modal('hide');
                        if(resultado.responseCode == '000') {
                            Swal.fire({
                              title: 'SMS enviado!',
                              text: 'Nosso lead recebeu esta mensagem!',
                              type: 'success',
                              confirmButtonText: 'OK'
                            })
                        }
                    });
                }

                function enviar_email() {
                    $('#btn_enviar_email').addClass('disabled').text('Enviando Email, aguarde...')
                    $.ajax({
                      method: "POST",
                      url: "<?=base_url('lead/email') ?>",
                      data: {
                          lead_email_text: $('#emailMessage').val(),
                          lead_email_assunto: $('#emailAssunto').val(),
                          lead_email: $('#emailEmail').val(),
                          <?=$this->security->get_csrf_token_name()?>: "<?=$this->security->get_csrf_hash()?>"
                      }
                    })
                    .done(function(resultado) {
                        $('#emailMessage').val('');
                        $('#modalEmail').modal('hide');
                        if(resultado == 'TRUE') {
                            Swal.fire({
                              title: 'E-mail enviado!',
                              text: 'Nosso lead recebeu este email!',
                              type: 'success',
                              confirmButtonText: 'OK'
                            })
                        }
                    });
                }

                window.onload = function(){
                    $("#smsMessage").on("change paste keyup", function() {
                        let valor = 150 - $(this).val().length
                        $('#countSMS').text(valor);
                    });
                }
            </script>
