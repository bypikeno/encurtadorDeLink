<?php
function findLinkById($id) {
    $data = json_decode(file_get_contents('links.json'), true);
    foreach ($data as $entry) {
        if ($entry['id'] === $id) {
            return $entry;
        }
    }
    return false;
}

if (isset($_GET['id'])) {
    $shortId = $_GET['id'];
    $stats = findLinkById($shortId);
    if ($stats) {
        echo "Link encurtado: <a href='" . $stats['link'] . "' target='_blank'>" . $stats['link'] . "</a><br>";
        echo "ID: " . $stats['id'] . "<br>";
        echo "Data de criação: " . date('Y-m-d H:i:s', $stats['created_at']) . "<br>";
        echo "Número de cliques: " . $stats['clicks'] . "<br>";
    } else {
        // ID não encontrada ou inválida
        echo "ID não encontrada ou inválida.";
    }
} else {
    // Se não houver ID na URL, exibir mensagem de erro
    echo "ID não especificada. Por favor, forneça uma ID válida.";
}
?>
