<?php
      // CONFIGURAÇÕES DO PROJETO
      require('includes/config.php');

      // CONEXÃO COM O SEVIDOR
      require('includes/conexao.php');

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

      // Load Composer's autoloader
      require 'vendor/autoload.php';

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);
      $mail->CharSet = "utf-8";

      // VALIDA SE OS CAMPOS NÃO VEM EM BRANCO // CASO VENHA EM BRANCO JOGA PARA O FORMULARIO
      if(!empty($_POST['nome']) AND !empty($_POST['sobrenome']) AND !empty($_POST['email']) AND !empty($_POST['telefone']) AND !empty($_POST['mensagem']))
      {
            $sNome = addslashes($_POST['nome']);
            $sSobrenome = addslashes($_POST['sobrenome']);
            $sEmail = addslashes($_POST['email']);
            $sTelefone = addslashes($_POST['telefone']);
            $sMensagem = addslashes($_POST['mensagem']);
            $dataEnvio = date('Y/m/d H:i:s');

            // INSERE OS DADOS DO USUÁRIO NO BANCO DE DADOS
            $oEnviaContato = $conn->prepare("INSERT INTO help_adocao SET nome = :sNome, sobrenome = :sSobrenome, email = :sEmail, telefone = :sTelefone, mensagem = :sMensagem, data_envio = :dDataEnvio");
            $oEnviaContato->execute([
                  ':sNome'          => $sNome,
                  ':sSobrenome'     => $sSobrenome,
                  ':sEmail'         => $sEmail,
                  ':sTelefone'      => $sTelefone,
                  ':sMensagem'      => $sMensagem,
                  ':dDataEnvio'     => $dataEnvio,
            ]);

            // $tabelaEmail = '
            //       <table border="0" cellspacing="0">
            //             <tr>
            //                   <th colspan="2" style="padding: 10px; color: #ffa623; text-align: center; font-size: 2em; border: 1px solid #ffa623;">Help a Dog - Contato</th>
            //             </tr>
            //             <tr>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;border-left: 1px solid #ffa623;">Nome: </td>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;">'.$sNome.'</td>
            //             </tr>
            //             <tr>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;border-left: 1px solid #ffa623;">Sobrenome: </td>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;">'.$sSobrenome.'</td>
            //             </tr>
            //             <tr>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;border-left: 1px solid #ffa623;">E-mail: </td>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;">'.$sEmail.'</td>
            //             </tr>
            //             <tr>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;border-left: 1px solid #ffa623;">Telefone: </td>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;">'.$sTelefone.'</td>
            //             </tr>
            //             <tr>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;border-left: 1px solid #ffa623;">Mensagem: </td>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;">'.$sMensagem.'</td>
            //             </tr>
            //             <tr>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;border-left: 1px solid #ffa623;">Data Envio: </td>
            //                   <td style="padding: 10px; border-right: 1px solid #ffa623;border-bottom: 1px solid #ffa623;">'.date('d/m/Y H:i:s', strtotime($dataEnvio)).'</td>
            //             </tr>
            //       </table>
            // ';


            // try {
            //       $mail->SMTPDebug = 0;
            //       $mail->isSMTP();
            //       $mail->Host       = 'smtp.hostinger.com.br';
            //       $mail->SMTPAuth   = true;
            //       $mail->Username   = 'contato@gabrielnakaoka.com';
            //       $mail->Password   = 'gabriel';
            //       $mail->SMTPSecure = 'tls';                                 
            //       $mail->Port       = 587;
              
            //       //Recipients
            //       $mail->setFrom('contato@gabrielnakaoka.com', 'Gabriel');
            //       $mail->addAddress('contato@gabrielnakaoka.com', 'help_a_dog');
              
            //       // Content
            //       $mail->isHTML(true);
            //       $mail->Subject = 'Adoção Help A Dog';
            //       $mail->Body    = $tabelaEmail;
            //       $mail->AltBody = 'Nome: '.$sNome.', Sobrenome: '.$sSobrenome.', E-mail: '.$sEmail.', Telefone: '.$sTelefone.', Mensagem: '.$sMensagem.', Data envio: '.$dataEnvio.'';
              
            //       $mail->send();
            //   } catch (Exception $e) {
            //       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //   }
              
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