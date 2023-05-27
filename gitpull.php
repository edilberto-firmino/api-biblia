<?php
exec('git pull', $output, $return_var);

// Verifica o status de retorno
if ($return_var === 0) {
    echo "Comando git pull executado com sucesso.";
} else {
    echo "Ocorreu um erro ao executar o comando git pull.";
}

// Exibe a saída do comando
echo implode("\n", $output);
?>
