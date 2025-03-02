<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drużyny</title>
    <link rel="stylesheet" href="styl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="post">
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Nazwa Drużyny" name="druzyny" required>
                    <label for="floatingInputGrid">Nazwa Drużyny</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectGrid" name="wybor" required>
                        <option  value="delegacja">Delegacja</option>
                        <option selected value="edelegacja">Edelegacja</option>
                    </select>
                    <label for="floatingSelectGrid">Płatność</label>
                </div>
            </div>
        </div>
        <div class="button-group mt-3">
            <button type="submit" class="btn btn-outline-success" name="dodaj" id="dodaj">Dodaj</button>
            <button type="button" class="btn btn-outline-secondary" name="wroc" id="wroc" onclick="window.location.href='index.php'">Wróć na stronę główną</button>
        </div>
    </form>

    <?php
    // Konfiguracja bazy danych
    $conn = mysqli_connect('localhost', 'root', '', '2025mecze_wiosna');
    if ($conn) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['wybor']) && !empty($_POST['druzyny'])) {
            $dele = mysqli_real_escape_string($conn, $_POST['wybor']);
            $druzyny = mysqli_real_escape_string($conn, $_POST['druzyny']);
            
            $dodaj = "INSERT INTO druzyny VALUES (NULL, '$druzyny', '$dele')";
            $q1 = mysqli_query($conn, $dodaj);
            
            if ($q1) {
                echo "<div class='alert alert-success mt-3'>Drużyna $druzyny została dodana!</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Błąd podczas dodawania drużyny: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger mt-3'>Nie udało się połączyć z bazą danych.</div>";
    }
    ?>
</div>
</body>
</html>
