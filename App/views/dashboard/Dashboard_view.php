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
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
                <div class="page-header">
                    <?=$this->ui->alert_flashdata()?>
                    <h1>Dashboard</h1>
                    <p class="lead">Uma visão analítica dos nossos resultados e relacionamentos</p>
                </div>
                <hr>

                <div class="card">
                    <div class="card-header">
                        <h4>Aquisição de leads</h4>
                        <small>Como etá a aquisição de novos leads em <?= date('Y') ?></small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($leads_por_mes as $lpm): ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <h6 class="text-center"><?=$lpm[0]?></h6>
                                    <canvas id="leads-por-mes-<?=crc32($lpm[0])?>"></canvas>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="card">
                    <div class="card-header">
                        <h4>Funis de vendas</h4>
                        <small>Estes gráficos monstram como está a situação dos leads no funil de vendas.</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($funil_vendas as $fv): ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <h6 class="text-center"><?=$fv['localidade_nome']?></h6>
                                    <canvas id="funil-vendas-<?=crc32($fv['localidade_nome'])?>"></canvas>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="card">
                    <div class="card-header">
                        <h4>Funis de upgrades</h4>
                        <small>Estes gráficos monstram como está a situação dos leads no funil de upgrades.</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($funil_upgrades as $fu): ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <h6 class="text-center"><?=$fu['localidade_nome']?></h6>
                                    <canvas id="funil-upgrades-<?=crc32($fu['localidade_nome'])?>"></canvas>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="card">
                    <div class="card-header">
                        <h4>Qualidade dos leads</h4>
                        <small>Estes gráficos mostram a qualidade de nossos leads.</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($leads_classificados as $lp): ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <h6 class="text-center"><?=$lp['localidade_nome']?></h6>
                                    <canvas id="leads-<?=crc32($lp['localidade_nome'])?>"></canvas>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>


<script type="text/javascript">
// And for a doughnut chart

window.onload = initGraphs;
function initGraphs() {
    <?php foreach ($leads_por_mes as $lpm): ?>
        new Chart(document.getElementById("leads-por-mes-<?=crc32($lpm[0])?>").getContext("2d"), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    data: [
                        <?=$lpm[1] ?>, <?=$lpm[2] ?>, <?=$lpm[3] ?>, <?=$lpm[4] ?>,
                        <?=$lpm[5] ?>, <?=$lpm[6] ?>, <?=$lpm[7] ?>, <?=$lpm[8] ?>,
                        <?=$lpm[9] ?>, <?=$lpm[10] ?>, <?=$lpm[11] ?>, <?=$lpm[12] ?>]
                }]
            },
            options: {
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fixedStepSize: 1
                        }
                    }]
                }
            }
        });
    <?php endforeach; ?>


    <?php foreach ($funil_vendas as $fv): ?>
        new Chart(document.getElementById("funil-vendas-<?=crc32($fv['localidade_nome'])?>").getContext("2d"), {
            type: 'doughnut',
            data: {
                labels: ["Interessados", "Negociando", "Comprando", "Pós-venda"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?=$fv['etapa1'] ?>, <?=$fv['etapa2'] ?>, <?=$fv['etapa3'] ?>, <?=$fv['etapa4'] ?>],
                    backgroundColor: [
                        'rgba(225, 0, 45, 0.8)',
                        'rgba(252, 208, 0, 0.8)',
                        'rgba(0, 185, 74, 0.8)',
                        'rgba(75, 192, 192, 0.8)'
                    ]
                }]
            },
            options: {
                legend: {
                    display: false,
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
    <?php endforeach; ?>



    <?php foreach ($funil_upgrades as $fu): ?>
        new Chart(document.getElementById("funil-upgrades-<?=crc32($fu['localidade_nome'])?>").getContext("2d"), {
            type: 'doughnut',
            data: {
                labels: ["Interessados", "Negociando", "Comprando", "Pós-venda"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?=$fu['etapa1'] ?>, <?=$fu['etapa2'] ?>, <?=$fu['etapa3'] ?>, <?=$fu['etapa4'] ?>],
                    backgroundColor: [
                        'rgba(225, 0, 45, 0.8)',
                        'rgba(252, 208, 0, 0.8)',
                        'rgba(0, 185, 74, 0.8)',
                        'rgba(75, 192, 192, 0.8)'
                    ]
                }]
            },
            options: {
                legend: {
                    display: false,
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
    <?php endforeach; ?>


    <?php foreach ($leads_classificados as $lp): ?>
        new Chart(document.getElementById("leads-<?=crc32($lp['localidade_nome'])?>").getContext("2d"), {
            type: 'bar',
            data: {
              labels: ["Em perigo", "Arriscados", "Favoráveis"],
              datasets: [
                {
                  label: "Qtd",
                  backgroundColor: ["rgba(225, 0, 45, 0.8)", "rgba(252, 208, 0, 0.8)","rgba(0, 185, 74, 0.8)"],
                  data: [<?=$lp['perigosos'] ?>,<?=$lp['arriscados'] ?>,<?=$lp['favoraveis'] ?>]
                }
              ]
            },
            options: {
              legend: { display: false }
            },
            ticks: {
                  beginAtZero:true,
            }
        });
    <?php endforeach; ?>
}
</script>
