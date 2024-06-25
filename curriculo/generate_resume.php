<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Função para escapar dados
    function escape_data($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    // Função para validar se o campo não está vazio
    function is_filled($value) {
        return isset($value) && !empty($value);
    }

    // Coleta os dados do formulário
    $name = escape_data($_POST["name"]);
    $email = escape_data($_POST["email"]);
    $phone = escape_data($_POST["phone"]);
    $dob = escape_data($_POST["dob"]);
    $address = escape_data($_POST["address"]);
    $objective = escape_data($_POST["objective"]);
    $skills = escape_data($_POST["skills"]);
    $education = [];
    $experiences = [];

    // Coleta a formação acadêmica do formulário
    if (isset($_POST["courses"], $_POST["institutions"], $_POST["degrees"])) {
        $courses = $_POST["courses"];
        $institutions = $_POST["institutions"];
        $degrees = $_POST["degrees"];

        // Itera sobre os arrays para coletar dados de formação acadêmica
        for ($i = 0; $i < count($courses); $i++) {
            // Verifica se os campos estão preenchidos antes de adicionar ao array de education
            if (is_filled($courses[$i]) && is_filled($institutions[$i]) && is_filled($degrees[$i])) {
                $education[] = [
                    "course" => escape_data($courses[$i]),
                    "institution" => escape_data($institutions[$i]),
                    "degree" => escape_data($degrees[$i])
                ];
            }
        }
    }

    // Coleta as experiências profissionais do formulário
    $i = 1;
    while (isset($_POST["position$i"])) {
        // Verifica se os campos estão preenchidos antes de adicionar ao array de experiences
        if (is_filled($_POST["position$i"]) && is_filled($_POST["company$i"]) && is_filled($_POST["from$i"]) && is_filled($_POST["to$i"])) {
            $position = escape_data($_POST["position$i"]);
            $company = escape_data($_POST["company$i"]);
            $from = escape_data($_POST["from$i"]);
            $to = escape_data($_POST["to$i"]);
            $description = isset($_POST["description$i"]) ? escape_data($_POST["description$i"]) : '';

            $experiences[] = [
                "position" => $position,
                "company" => $company,
                "from" => $from,
                "to" => $to,
                "description" => $description
            ];
        }
        $i++;
    }

    // Incluir o arquivo de template do currículo para apresentação
    include('resume_template.php');
}

