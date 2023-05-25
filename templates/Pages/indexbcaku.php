  
<div class="container py-4">
    <h2 class="font-weight-light text-center py-3">Planejamento Viagem 2023</h2>
    <div class="row">
    <div class="col-md-6">
        <b>Velocidade:</b>
        <div class="input-group mb-3 border-dark">
        <input type="number" value="<?=$dados->velocidade?>" class="form-control border-dark" placeholder="Velocidade" id="velocidade" aria-label="Velocidade" aria-describedby="Velocidade">
        <button class="btn btn-outline-secondary border-dark" type="button"  onclick="velocidade()">Alterar</button>
        </div>
    </div>

     <div class="col-md-6">
         <b>Hora da Saída:</b>
        <div class="input-group mb-3">
        <input type="datetime-local" value="<?=$dados->horasaida?>" class="form-control border-dark" id="horasaida"placeholder="Saida" aria-label="Saida" aria-describedby="Saida">
        <button class="btn btn-outline-secondary border-dark" type="button" onclick="hora()" >Alterar</button>
        </div>
    </div>
</div>
<?php
function convertHoras($horasInteiras) {
    // Define o formato de saida
    $formato = '%02d:%02d';
    // Converte para minutos
    $minutos = $horasInteiras * 60;

    // Converte para o formato hora
    $horas = floor($minutos / 60);
    $minutos = ($minutos % 60);

    // Retorna o valor
    return sprintf($formato, $horas, $minutos);
}

function soma_hora($data, $duracao){
    //$data = $horasaida[$counter-1];
    $duracao = convertHoras($duracao);
    $v = explode(':', $duracao);
    $resposta = date('Y-d-m H:i:s', strtotime("{$data} + {$v[0]} hours {$v[1]} minutes"));
    return $resposta;                           
}
function soma_saida($data, $duracao){
    //$data = $horasaida[$counter-1];
    //$duracao = convertHoras($duracao);
    $v = explode(':', $duracao);
    $resposta = date('Y-d-m H:i:s', strtotime("{$data} + {$v[0]} hours {$v[1]} minutes"));
    return $resposta;                           
}
$counter = 0;
$horasaida = array();
$horachegada  = array();
foreach($cidades as $cidade){
$duracao = $cidade->kmdaanterior / $dados->velocidade;      
        ?>
<!-- timeline item 1 -->
    <div class="row">
        <!-- timeline item 1 left dot -->
        <div class="col-auto text-center flex-column  d-sm-flex">
            <div class="row h-50">
                <div class="col <?= $counter ===0 ? '' : 'border-end border-dark'?>">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge border-dark rounded-pill <?= (count($cidade->tempoparados)) > 0 ? 'bg-success' : 'bg-dark'?> border">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col <?= $counter === 22 ? '' : 'border-end border-dark'?>">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <!-- timeline item 1 event content -->
        <div class="col py-2">
            <div class="card <?= (count($cidade->tempoparados)) > 0 ? 'border-success shadow' : 'border-dark'?>">
                <div class="card-body">
                   <h4 class="card-title"><?=$cidade->nome?></h4>
                        <div class="row ">
                            <div class="col-md-4">
                                <b>Distância: </b><span><?=$cidade->kmdaanterior;?></span>
                            </div>
                            <div class="col-md-4">
                                <b>Distância Percorrida: </b><span><?=$cidade->kmacumulado;?></span>
                            </div>
                            <div class="col-md-4">
                                <b>Chegada: </b><span>
                                 <?php
                                if ($counter === 0) {
                                    //$horachegada[$counter] = $dados->horasaida;
                                    // $resposta = date('Y-m-d H:i:s', strtotime("{$data} + {$v[0]} hours {$v[1]} minutes"));
                                    $horachegada[$counter] =  date('Y-d-m H:i:s', strtotime($dados->horasaida));

                                     echo $horachegada[$counter];
                                    //echo  date('d/m/Y H:i:s', strtotime($dados->horasaida));
                                }
                                if($counter === 1 ){
                                    $horachegada[$counter] = soma_hora(date('Y-d-m H:i:s', strtotime($dados->horasaida)), $duracao);
                                    //echo date('d/m/Y H:i:s', strtotime($horachegada[$counter]));
                                    echo $horachegada[$counter];   
                                  // echo $horachegada[$counter];
                                }if($counter > 1){
                                    $data = $horasaida[$counter-1];
                                    $horachegada[$counter] = soma_hora($data, $duracao);
                                   echo $horachegada[$counter];
                                   // echo $horachegada[$counter];
                                }
                                ?>    

                                </span>
                            </div>
                            <div class="col-md-4">
                                <b>Duração: </b><span>
                                <?php
                                echo convertHoras($duracao);
                                ?>
                                </span>
                            </div>
                             <div class="col-md-4">
                                <b>Saída: </b><span>
                                <?php
                                if ($counter === 0) {
                                    //$horasaida[$counter] = $dados->horasaida;
                                    $horasaida[$counter] =  date('Y-d-m H:i:s', strtotime($dados->horasaida));
                                    echo date('d', strtotime($horasaida[$counter]));
                                    //echo $horasaida[$counter];
                                }
                                if($counter === 1){
                                        $tempo_parado = "";
                                    if ((count($cidade->tempoparados)) > 0) {
                                        $tempo_parado = $cidade->tempoparados['0']->tempo;
                                        $horasaida[$counter] = soma_saida($horachegada[$counter], $tempo_parado);
                                    } else{
                                        $horasaida[$counter] = $horachegada[$counter];
                                    }
                                    //$horasaida[$counter] = soma_hora($dados->horasaida, $duracao);
                                  //echo $horasaida[$counter];
                                    echo date('d', strtotime($horasaida[$counter]));
                                    //echo $horasaida[$counter];   
                                }
                                if($counter > 1){
                                    $tempo_parado = "";
                                    if ((count($cidade->tempoparados)) > 0) {
                                        $tempo_parado = $cidade->tempoparados['0']->tempo;
                                        $horasaida[$counter] = soma_saida($horachegada[$counter], $tempo_parado);
                                    } else{
                                        $horasaida[$counter] = $horachegada[$counter];
                                    }
                                    //$horasaida[$counter] = soma_hora($dados->horasaida, $duracao);
                                    
                                    echo $horasaida[$counter];   
                                }
                               /* if($counter > 1){
                                    $data = $horasaida[$counter-1];
                                    $horasaida[$counter] = soma_hora($data, $duracao);
                                    echo $horasaida[$counter];
                                }*/
                                ?>
                                </span>
                            </div>
                             <div class="col-md-4">
                                <b>Tempo Parado: </b>
<?php
if((count($cidade->tempoparados)) >0){
$id_tempoparado = $cidade->tempoparados['0']->id;
    ?>
 <button type="button" class="btn btn-success btn-sm" onclick="editar('<?=$cidade->nome?>','<?=$id_tempoparado?>','<?=$cidade->tempoparados['0']->tempo?>','<?=$cidade->id?>')" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?=$cidade->tempoparados['0']->tempo?></button>
 <button type="button" class="btn btn-danger btn-sm" onclick="excluir('<?=$cidade->tempoparados['0']->id?>')" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">EXCLUIR</button>
    <?php
}else{
    ?>
    <button type="button" class="btn btn-secondary btn-sm" onclick="adicionar('<?=$cidade->id?>','<?=$cidade->nome?>')" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">ADICIONAR</button>
    <?php
}
?>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
<?php
        $counter ++;
}
?>
</div>
<!--container-->
<!-- Modal -->
<div class="modal fade" id="editartempoparado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tempo Parado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    Informe tempo parado em: <span id="cidade_editar"></span>   
    <input type="time" class="form-control" id="tempo_editar" name="tempo">
    <input type="text" class="form-control" id="id_editar" name="id" hidden >
    <input type="text" class="form-control" id="cidadeid_editar" name="id" hidden >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="editartempo()"class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tempoparado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tempo Parado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    Informe tempo parado em: <span id="cidade"></span>   
    <input type="time" class="form-control" id="tempo" name="tempo">
    <input type="text" class="form-control" id="id" name="id" hidden >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="salvartempo()"class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>


<script>
    function adicionar(id, nome){
        $('#tempoparado').modal('show');
        $("#cidade").html(nome);
        $("#id").val(id);
       
///alert(nome);
    }
     function editar(nome, id, tempo, cidade_id){
        $('#editartempoparado').modal('show');
        $("#cidade_editar").html(nome);
        $("#tempo_editar").val(tempo);
        $("#id_editar").val(id);
         $("#cidadeid_editar").val(cidade_id);
       
///alert(nome);
    }
    function salvartempo(){
        var tempo = $("#tempo").val();
        var id = $("#id").val();
        if(!tempo){
        alert('Necessário informar um valor ou clique em cancelar!'+ id);
        }else{
            var url = "<?= $this->Url->build(['controller' => 'Tempoparados', 'action' => 'add']); ?>";
            $.post(url, { cidade_id: id, tempo: tempo })
            
            .done(function( data ) {
                 $('#tempoparado').modal('hide');
                 location.reload(true)
               // alert( "Data Loaded: " + data );
            });
        }
    }

    function editartempo(){
        var tempo = $("#tempo_editar").val();
        var id_ = $("#id_editar").val();
        var cidade_id = $("#cidadeid_editar").val();
        if(!tempo){
        alert('Necessário informar um valor ou clique em cancelar!'+ id);
        }else{
            var url = "<?= $this->Url->build(['controller' => 'Tempoparados', 'action' => 'edit']); ?>"+'/'+id_;
            $.post(url, { cidade_id: cidade_id, tempo: tempo })
            
            .done(function( data ) {
                 $('#editartempoparado').modal('hide');
                 location.reload(true)
               // alert( "Data Loaded: " + data );
            });
        }
    }
    function excluir(id){
         var url = "<?= $this->Url->build(['controller' => 'Tempoparados', 'action' => 'delete']); ?>"+'/'+id;
         
 $.post(url, { id: id})
            
            .done(function( data ) {
               //  $('#editartempoparado').modal('hide');
                 location.reload(true)
               // alert( "Data Loaded: " + data );
            });
    }
    function velocidade(){
         var velocidade = $("#velocidade").val();
          var url = "<?= $this->Url->build(['controller' => 'Configuracoes', 'action' => 'edit','1']); ?>";
            $.post(url, { velocidade: velocidade })
            
            .done(function( data ) {
                // $('#editartempoparado').modal('hide');
                 location.reload(true)
               // alert( "Data Loaded: " + data );
            });
    }
    function hora(){
         var horasaida = $("#horasaida").val();
          var url = "<?= $this->Url->build(['controller' => 'Configuracoes', 'action' => 'edit','1']); ?>";
            $.post(url, { horasaida: horasaida })
            
            .done(function( data ) {
                // $('#editartempoparado').modal('hide');
                 location.reload(true)
               // alert( "Data Loaded: " + data );
            });
    }
</script>