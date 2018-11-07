<?php 
                // for($i = 1; $i <= $qnt; $i++){
                    $usu = $usuarioDAO->pegarInfos($retorno["$i"]['com_us_cod']);
                    $dataComent = date("d/m/Y", strtotime($retorno["$i"]['com_data']));
                    $horaComent = date("H:i", strtotime($retorno["$i"]['com_hora']));
                    ?>
                    <div class="form-row justify-content-center">
                        <div class="bg-white text-dark"><?= //$usu['us_nome']; ?></div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="bg-white text-dark"><?= //$dataComent . ' às ' . $horaComent; ?></div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="mb-3 bg-white text-dark"><?= //$retorno["$i"]['com_texto']; ?></div>
                    </div>
                    <div class="form-row justify-content-center">
                        <?php // if($retorno["$i"]['com_us_cod'] === $usu['us_cod'] || $_SESSION['logado'] == 3){ ?>
                            <form action="" method="post">
                                <button name="excluirComentario" class="btn btn-danger mb-4"><i class="far fa-trash-alt float-right text-dark"></i></button>
                            <?php // if(isset($_POST['excluirComentario'])){ ?>
                                <div class="alert alert-danger justify-content-center" role="alert">
                                <label>Você realmente deseja excluir o comentário?</label><br/>
                                <input type="submit" value="Sim" name="excluirComentarioSIM" class="btn btn-outline-danger mb-4">
                                <input type="submit" value="Cancelar" name="excluirComentarioNAO" class="btn btn-outline-dark mb-4"> 
                                </div>
                            </form>
                            <?php // }
                            //     if(isset($_POST['excluirComentarioSIM'])){
                            //         $comentario->setCom_cod($retorno["$i"]['com_cod']);
                                    
                            //         if ($comentarioDAO->excluirComentario($comentario)) {
                            //             ?>
                            //             <script type="text/javascript">
                            //                 alert("Comentário excluido com sucesso!");
                            //                 document.location.href = "#";
                            //             </script>
                            //             <?php
                            //         } else {
                            //             ?>
                            //             <script type="text/javascript">
                            //                 alert("Desculpe, houve algum erro ao excluido seu comentário.");
                            //             </script>
                            //             <?php
                            //         }
                            //     }
                            // }
                            ?>
                    </div>
                <?php //} ?>