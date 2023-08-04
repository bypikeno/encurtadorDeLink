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

function generateRandomId($length = 4) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomId = '';
    for ($i = 0; $i < $length; $i++) {
        $randomId .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomId;
}

function addLinkToJSON($link) {
    $data = json_decode(file_get_contents('links.json'), true);
    if (!$data) {
        $data = array();
    }
    $id = generateRandomId();
    $entry = array(
        "link" => $link,
        "id" => $id
    );
    $data[] = $entry;
    file_put_contents('links.json', json_encode($data, JSON_PRETTY_PRINT));
    return $id;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['url'])) {
        $newLink = $_POST['url'];
        $id = addLinkToJSON($newLink);
        echo "Link encurtado: <a href='localhost/encurtador/redirecionar.php?id=" . $id . "' target='_blank'>localhost/encurtador/redirecionar.php?id=" . $id . "</a>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Encurtador de Links</title>
</head>
<body>
    <form method="post" action="">
        <label for="url">Cole o link aqui:</label>
        <input type="text" name="url" id="url" required>
        <input type="submit" value="Encurtar">
    </form>
</body>
</html>
