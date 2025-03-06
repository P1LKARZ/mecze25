<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podsumowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styl_glowny.css">
</head>
<body>

<div class="container ">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Strona Główna</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a class="nav-link active" href="sedzia.php">Sędziowie</a>
        <a class="nav-link" href="druzyny.php">Drużyny</a>
        <a class="nav-link" href="podsumowanie.php">Podsumowanie</a>
      </div>
      <div class="navbar-nav ms-auto d-flex">
        <a class="nav-link nav-link-kasa" id="podmien_kasa" href="#kasa"></a>
        <a class="nav-link nav-link-podatek" id="podmien_podatek"  href="#podatek"></a>
      </div>
    </div>
  </div>
</nav>

<form method="post">
<main>
  <div class="container mt-4">
    <!-- Pierwszy wiersz z selektorami -->
    <div class="row mb-3">
      <div class="col-md-6">
        <select class="form-select" name="wybor_gospodarzy" id="wybor_gospodarzy">
          <option selected disabled>Wybierz gospodarza</option>
          <?php
            $conn = mysqli_connect('localhost', 'root', '', '2025mecze_wiosna');
            if ($conn) {
              $kw="SELECT nazwa,platnosc FROM druzyny ORDER BY nazwa ASC";
              $q1=mysqli_query($conn,$kw);
              while($druzyna=mysqli_fetch_array($q1)) {
                echo "<option value='$druzyna[0]'>$druzyna[0]</option>";
              }
            }
          ?>
        </select>
      </div>

      <div class="col-md-6">
        <select class="form-select" name="wybor_gosci" id="wybor_gosci">
          <option selected disabled>Wybierz gościa</option>
          <?php
            if ($conn) {
              $kw="SELECT nazwa FROM druzyny ORDER BY nazwa ASC";
              $q1=mysqli_query($conn,$kw);
              while($goscie=mysqli_fetch_array($q1)) {
                echo "<option value='$goscie[0]'>$goscie[0]</option>";
              }
            }
          ?>
        </select>
      </div>
    </div>

    <!-- Drugi wiersz z selektorami -->
    <div class="row mb-3">
      <div class="col-md-6">
        <select class="form-select" name="wybor_poziom" id="wybor_poziom">
          <option selected disabled>Poziom rozgrywkowy</option>
          <?php
            if ($conn) {
              $kw="SELECT nazwa FROM poziom";
              $q1=mysqli_query($conn,$kw);
              while($poziom=mysqli_fetch_array($q1)) {
                echo "<option value='$poziom[0]'>$poziom[0]</option>";
              }
            }
          ?>
        </select>
      </div>

      <div class="col-md-6">
        <select class="form-select" name="wybor_sedzia" id="wybor_sedzia">
          <option selected disabled>Sędzia Główny</option>
          <?php
            if ($conn) {
              $kw="SELECT imie FROM sedziowie ORDER BY imie ASC";
              $q1=mysqli_query($conn,$kw);
              while($sedzia=mysqli_fetch_array($q1)) {
                echo "<option value='$sedzia[0]'>$sedzia[0]</option>";
              }
            }
          ?>
        </select>
      </div>
    </div>

    <!-- Wiersz z datą -->
    <div class="row mb-3">
      <div class="col-md-6">
        <input type="date" name="data" id="data" class="form-control" value="<?php echo date('d-m-Y'); ?>">
      </div>
      <div class="col md-6">
        <input type="text" class="form-control" name="nr_meczu" id="nr_meczu" placeholder="Numer meczu" maxlength="7">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <select class="form-select" name="status_zaplacone" id="status_zaplacone">
          <option selected disabled>Wybierz status zapłaty</option>
          <option value="T">Zapłacone</option>
          <option value="N">Niezapłacone</option>
        </select>
      </div>
    </div>

    <div class="row mb-3">
      <input type="submit" class="btn btn-success" value="Szukaj">
    </div>

  </div>
</main>
</form>

<!-- Kontener tabeli -->
<form action="index.php" method="post">
  <div class="container text-center" id="tabelka">
    <table class="table table-hover">
      <tr>
        <th>id</th>
        <th>Gospodarz</th>
        <th>Gość</th>
        <th>Liga</th>
        <th>Kasa</th>
        <th>Podatek</th>
        <th>Data</th>
        <th>Sędzia</th>
        <th>Numer meczu</th>
        <th>Płatność</th>
        <th>Zapłacone</th>
      </tr>

      <?php
      // Połączenie z bazą danych
      $conn = mysqli_connect('localhost', 'root', '', '2025mecze_wiosna');
      if (!$conn) {
        die("Połączenie z bazą danych nie powiodło się: " . mysqli_connect_error());
      }

      $wyniki = []; // Tablica na wyniki wyszukiwania
      $suma_kasa = 0; // Inicjalizacja sumy Kasa
      $suma_podatek = 0; // Inicjalizacja sumy Podatek

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $warunki = []; // Tablica warunków do zapytania

        // Pobranie danych z formularza i dodanie warunków
        if (!empty($_POST['wybor_gospodarzy'])) {
          $wybor_gospodarzy = mysqli_real_escape_string($conn, $_POST['wybor_gospodarzy']);
          $warunki[] = "gospodarz = '$wybor_gospodarzy'";
        }

        if (!empty($_POST['wybor_gosci'])) {
          $wybor_gosci = mysqli_real_escape_string($conn, $_POST['wybor_gosci']);
          $warunki[] = "gosc = '$wybor_gosci'";
        }

        if (!empty($_POST['wybor_poziom'])) {
          $wybor_poziom = mysqli_real_escape_string($conn, $_POST['wybor_poziom']);
          $warunki[] = "liga = '$wybor_poziom'";
        }

        if (!empty($_POST['wybor_sedzia'])) {
          $wybor_sedzia = mysqli_real_escape_string($conn, $_POST['wybor_sedzia']);
          $warunki[] = "glowny = '$wybor_sedzia'";
        }

        if (!empty($_POST['data'])) {
          $data = mysqli_real_escape_string($conn, $_POST['data']);
          $warunki[] = "data = '$data'";
        }

        if (!empty($_POST['nr_meczu'])) {
          $nr_meczu = mysqli_real_escape_string($conn, $_POST['nr_meczu']);
          $warunki[] = "numer_meczu = '$nr_meczu'";
        }

        if (!empty($_POST['status_zaplacone'])) {
          $status_zaplacone = mysqli_real_escape_string($conn, $_POST['status_zaplacone']);
          $warunki[] = "zaplacone = '$status_zaplacone'";
        }

        // Tworzenie dynamicznego zapytania SQL
        $zapytanie = "SELECT * FROM mecz";
        if (count($warunki) > 0) {
          $zapytanie .= " WHERE " . implode(' AND ', $warunki);
        }
        $zapytanie .= " ORDER BY data DESC";

        // Wykonanie zapytania
        $result = mysqli_query($conn, $zapytanie);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $wyniki[] = $row;
            $suma_kasa += $row['kasa']; // Dodanie wartości Kasa do sumy
            $suma_podatek += $row['podatek']; // Dodanie wartości Podatek do sumy
          }
        } else {
          echo "Błąd zapytania: " . mysqli_error($conn);
        }
      }
      ?>

      <?php if (count($wyniki) > 0): ?>
        <?php $iterator = 1; ?>
        <?php foreach ($wyniki as $rekord): 
          if($rekord['zaplacone'] == "N") {
            $class = 'table-danger';
          } else {
            $class = 'table-success';
          }
          $data = date('d-m-Y', strtotime($rekord['data']));
        ?>
        <tr class="<?php echo $class; ?>">
          <td><?php echo $iterator++; ?></td>
          <td><?php echo $rekord['gospodarz']; ?></td>
          <td><?php echo $rekord['gosc']; ?></td>
          <td><?php echo $rekord['liga']; ?></td>
          <td><?php echo $rekord['kasa']; ?></td>
          <td><?php echo $rekord['podatek']; ?></td>
          <td><?php echo $data; ?></td>
          <td><?php echo $rekord['glowny']; ?></td>
          <td><?php echo $rekord['numer_meczu']; ?></td>
          <td><?php echo $rekord['delegacja']; ?></td>
          <td><?php echo $rekord['zaplacone']; ?></td>
          <td>
            <button type="button" class="btn btn-primary">Edytuj</button>
          </td>
          <td>
            <button type="button" class="btn btn-danger btn-delete">Usuń</button>
          </td>
        </tr>
        <?php endforeach; ?>
        <!-- Wyświetlanie sumy -->
        <tr>
          <td colspan="4"><strong>Suma:</strong></td>
          <td><strong><?php echo $suma_kasa; ?></strong></td>
          <td><strong><?php echo $suma_podatek; ?></strong></td>
          <td colspan="7"></td>
        </tr>
      <?php else: ?>
        <tr>
          <td colspan="11">Brak wyników dla wybranych filtrów.</td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</form>

</body>
<script>
    // Przypisz zmienną PHP $row_podatek do zmiennej JS jako 'podatek'
    const podatek = <?php echo json_encode($suma_podatek); ?>;
    const kasa = <?php echo json_encode($suma_kasa); ?>;

    console.log("Podatek: " + podatek + ", Kasa: " + kasa); // Wyświetli wartości w konsoli

    // Znajdź elementy HTML
    const elementKasa = document.getElementById('podmien_kasa');
    const elementPodatek = document.getElementById('podmien_podatek');

    // Ustaw tekst wewnętrzny elementów
    if (elementKasa) {
        elementKasa.textContent =  kasa + " PLN";
    }
    if (elementPodatek) {
        elementPodatek.textContent =  podatek + " PLN";
    }
</script>

</html>
