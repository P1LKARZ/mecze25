<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sędzia</title>
    <link rel="stylesheet" href="styl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="post">
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Sędzia" name="sedzia" required>
                    <label for="floatingInputGrid">Sędzia</label>
                </div>
            </div>
        </div>
        <div class="button-group mt-3">
            <button type="submit" class="btn btn-outline-success" name="dodaj" id="dodaj">Dodaj</button>
            <button type="button" class="btn btn-outline-secondary" name="wroc" id="wroc" onclick="window.location.href='index.php'">Wróć na stronę główną</button>
        </div>
    </form>

    <?php
    // Połączenie z bazą danych
    $conn = mysqli_connect('localhost', 'root', '', '2025mecze_wiosna');
    
    // Sprawdzenie połączenia
    if ($conn) {
        // Sprawdzamy, czy formularz został wysłany
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['sedzia'])) {
            // Czyszczenie danych wejściowych
            $sedzia = mysqli_real_escape_string($conn, $_POST['sedzia']);
            
            // Zapytanie do bazy danych, upewnij się, że tabela 'sedzia' ma kolumny 'id' i 'sedzia'
            $dodaj = "INSERT INTO sedzia (sedzia) VALUES ('$sedzia')";
            $q1 = mysqli_query($conn, $dodaj);

            // Sprawdzanie, czy zapytanie się powiodło
            if ($q1) {
                echo "<div class='alert alert-success mt-3'>Sędzia $sedzia został dodany!</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Błąd podczas dodawania sędziego: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger mt-3'>Nie udało się połączyć z bazą danych.</div>";
        
    }
    mysqli_close($conn);
    ?>
</div>
</body> 
</html>
