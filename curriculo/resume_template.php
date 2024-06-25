<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Currículo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1{
            text-align: center;
        }

        .container {
            width: 600px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

       
        

        section {
            margin-bottom: 20px;
        }

        section:last-child {
            margin-bottom: 0;
        }

        /* Estilo para ocultar o botão durante a impressão */
        .print-button
         {  height: 40px;
            width: 200px;
            background-color: rgb(104, 104, 242);
            border-color: rgb(16, 16, 123);
            color: #fff; 
            border-radius: 5px; 
            cursor: pointer; 
            margin-top: 20px;
            text-align: center;
            display: block; 
            font-size: 15px;
        }
        

        /* Oculta o botão durante a impressão */
        @media print {
            .print-button{
                display: none;
            }
          
           

            /* Estilo para impressão */
            body {
                
                padding: 0;
                
            }
            h1{
                text-align: center;
                ;

            }

            .container {
                width: 100%; 
                margin: 0;
                padding: 0;
                box-shadow: none; 
                border-radius: 0; 
                position: fixed;
                top: 0;
                
            }
            
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Informações Pessoais -->
        <section>
            <h1><strong></strong> <?php echo $name; ?></h1>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Telefone:</strong> <?php echo $phone; ?></p>
            <p><strong>Data de Nascimento:</strong> <?php echo date('d/m/Y', strtotime($dob)); ?></p>
            <p><strong>Endereço:</strong> <?php echo $address; ?></p>
        </section>

        <!-- Objetivo -->
        <section>
            <h2>Objetivo</h2>
            <p><?php echo $objective; ?></p>
        </section>

        <!-- Habilidades -->
        <section>
            <h2>Habilidades</h2>
            <p><?php echo $skills; ?></p>
        </section>

        <!-- Formação Acadêmica -->
        <?php if (!empty($education)): ?>
            <section>
                <h2>Formação Acadêmica</h2>
                <ul>
                    <?php foreach ($education as $edu): ?>
                        <li>
                            <strong>Curso:</strong> <?php echo $edu['course']; ?><br>
                            <strong>Instituição:</strong> <?php echo $edu['institution']; ?><br>
                            <strong>Grau:</strong> <?php echo $edu['degree']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <!-- Experiências Profissionais -->
        <section>
    <h2>Experiência Profissional</h2>
        <ul>
            <?php foreach ($experiences as $exp): ?>
                <li>
                    <strong>Cargo:</strong> <?php echo $exp['position']; ?><br>
                    <strong>Empresa:</strong> <?php echo $exp['company']; ?><br>
                    <strong>Período:</strong> <?php echo date('d/m/Y', strtotime($exp['from'])); ?> a <?php echo date('d/m/Y', strtotime($exp['to'])); ?><br>
                    <strong>Descrição:</strong> <?php echo $exp['description']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

        
        <!-- Botão para atualizar para impressão -->
        <button class="print-button" style="background-color: green;" onclick="window.print();">Atualizar para Impressão</button>

        <button class="print-button" onclick="goBack()">Voltar</button>
        
        
       
    </div>
    <script>
        function goBack() {
            window.history.back();
            
        }
    </script>
    
</body>
</html>
