<?php
      // CONFIGURAÇÕES DO PROJETO
      require('includes/config.php');

      // CONEXÃO COM O SEVIDOR
      require('includes/conexao.php');

      // VALIDA SE OS CAMPOS NÃO VEM EM BRANCO // CASO VENHA EM BRANCO JOGA PARA O FORMULARIO
      if(!empty($_POST['nome']) AND !empty($_POST['sobrenome']) AND !empty($_POST['email']) AND !empty($_POST['telefone']) AND !empty($_POST['mensagem']))
      {
            $sNome = addslashes($_POST['nome']);
            $sSobrenome = addslashes($_POST['sobrenome']);
            $sEmail = addslashes($_POST['email']);
            $sTelefone = addslashes($_POST['telefone']);
            $sMensagem = addslashes($_POST['mensagem']);

            // INSERE OS DADOS DO USUÁRIO NO BANCO DE DADOS
            $oEnviaContato = $conn->prepare("INSERT INTO help_contato SET nome = :sNome, sobrenome = :sSobrenome, email = :sEmail, telefone = :sTelefone, mensagem = :sMensagem, data_envio = :dDataEnvio");
            $oEnviaContato->execute([
                  ':sNome' => $sNome,
                  ':sSobrenome' => $sSobrenome,
                  ':sEmail' => $sEmail,
                  ':sTelefone' => $sTelefone,
                  ':sMensagem' => $sMensagem,
                  ':dDataEnvio' => date('Y/m/d H:i:s'),
            ]);
            $jsonResposta = array('Resposta' => 'ok');
            echo json_encode($jsonResposta);
            exit;
      }
      else
      {
            header("Location: ./#contact");
            exit;
      }
?>