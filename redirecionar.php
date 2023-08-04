<?php
function findLinkById($id) {
    $data = json_decode(file_get_contents('links.json'), true);
    foreach ($data as $entry) {
        if ($entry['id'] === $id) {
            return $entry['link'];
        }
    }
    return false;
}

if (isset($_GET['id'])) {
    $shortId = $_GET['id'];
    if (strpos($shortId, '+') !== false) {
        // Se o ID contém "+", redirecionar para a página de estatísticas
        header('Location: estatisticas.php?id=' . urlencode($shortId));
        exit;
    } else {
        $redirectUrl = findLinkById($shortId);
        if ($redirectUrl) {
            // Redirecionar para o link correspondente
            header('Location: ' . $redirectUrl);
            exit;
        } else {
            // ID não encontrada ou inválida
            echo "ID não encontrada ou inválida.";
            exit;
        }
    }
}

// Se não houver ID na URL, exibir mensagem de erro
echo "ID não especificada. Por favor, forneça uma ID válida.";
?>
