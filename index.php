<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styl_glowny.css">
  </head>
<body>
   
<div class="container-xxl-fluid ">

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
        <a class="nav-link" href="podsumowanie.php">Podusmowanie</a>
      </div>
      <div class="navbar-nav ms-auto d-flex">
        <a class="nav-link nav-link-kasa" id="podmien_kasa" href="#kasa"></a>
        <a class="nav-link nav-link-podatek" id="podmien_podatek"  href="#podatek"></a>
      </div>
    </div>
  </div>
</nav>

<form  method="post">
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
      <input type="text" class="form-control" name="nr_meczu" id="nr_meczu" placeholder="Numer meczu" maxlength="7" >


      </div>
    </div>


            <div class="row mb-3">
            <input type="submit" class="btn btn-success " value="Dodaj">
            
            </div>

  </div>
</main>

</form>
<!-- kontener -->
<!-- tabelka -->
<form action="index.php" method="post">
<div class="container text-center" id="tabelka">
<table class="table table-hover fluid">
  <tr>
    <th>id</th><th>Gospodarz</th><th>Gość</th><th>Liga</th><th>Kasa</th><th>Podatek</th><th>Data</th><th>Sędzia</th><th>Numer meczu</th><th>Płatność</th>
  </tr>
  <?php
if (!empty($_POST['wybor_gospodarzy']) && !empty($_POST['wybor_gosci']) && !empty($_POST['wybor_poziom']) && !empty($_POST['wybor_sedzia']) && !empty($_POST['nr_meczu']) && !empty($_POST['data']))
 {
    $gospodarz_ = $_POST['wybor_gospodarzy'];
    $gosc_ = $_POST['wybor_gosci'];
    $poziom_ = $_POST['wybor_poziom'];
    $sedzia_ = $_POST['wybor_sedzia'];
    $nr_meczu_ = $_POST['nr_meczu'];
    $data_ = $_POST['data'];
    
    // Łączenie z bazą danych
    $conn = mysqli_connect('localhost', 'root', '', '2025mecze_wiosna');
    
    // Sprawdzenie połączenia
   
        // Zapytanie o dane drużyny (gospodarz)
        $kw = "SELECT nazwa, platnosc FROM druzyny WHERE nazwa = '$gospodarz_'";
        $q1 = mysqli_query($conn, $kw);
        
        if ($druzyna = mysqli_fetch_array($q1)) {
            $platnosc = $druzyna[1]; // Sprawdzenie, czy druzyna ma przypisaną płatność
        } else {
            $platnosc = "Brak płatności"; // Jeśli brak danych, ustaw domyślny tekst
        }

        // Zapytanie o dane poziomu (kasa i podatek)
        $kw_kasa = "SELECT kasa, podatek FROM poziom WHERE nazwa = '$poziom_'";
        $q1_kasa = mysqli_query($conn, $kw_kasa);
        
        if ($kasa = mysqli_fetch_array($q1_kasa)) {
            $kwota = $kasa[0];
            $podatek = $kasa[1];
        } else {
            $kwota = "Brak informacji o kasie";
            $podatek = "Brak informacji o podatku";
        }
        if($platnosc=="delegacja")
    {
      $zaplacone="T";
    }
    else
    {
      $zaplacone="N";
    }
        // Wyświetlanie wyników
        // echo "Gospodarz: $gospodarz_<br>";
        // echo "Gość: $gosc_<br>";
        // echo "Poziom: $poziom_<br>";
        // echo "Sędzia: $sedzia_<br>";
        // echo "Numer Meczu: $nr_meczu_<br>";
        // echo "Data: $data_<br>";
        // echo "Płatność: $platnosc <br>";
        // echo "Kasa: $kwota <br>";
        // echo "Podatek: $podatek <br> Zaplacone $zaplacone";
$wstawianie="INSERT INTO mecz Values
(NULL,'$gospodarz_','$gosc_','$poziom_'
,'$kwota','$podatek','$data_','$sedzia_',
$nr_meczu_,'$platnosc','$zaplacone')";
$wstaw_query=mysqli_query($conn,$wstawianie);
       
    } 
  
 
    $wyswietl_tabela = 'SELECT id_mecz,gospodarz,gosc,liga,kasa,podatek,data,glowny,numer_meczu,delegacja,zaplacone FROM mecz ORDER BY data DESC';
    $kw_wyswietl_tabela = mysqli_query($conn, $wyswietl_tabela);
    $i = 1;
    
    while ($r = mysqli_fetch_array($kw_wyswietl_tabela)) {
      $class = ($r[10] == "N") ? 'table-danger' : 'table-success';
      $data = date('d-m-Y', strtotime($r[6]));
  
      echo "
      <tr class='$class'>
          <td>$i</td>
          <td>$r[1]</td>
          <td>$r[2]</td>
          <td>$r[3]</td>
          <td>$r[4]</td>
          <td>$r[5]</td>
          <td>$data</td>
          <td>$r[7]</td>
          <td>$r[8]</td>
          <td>$r[9]</td>";
          if($r[10]=="N")
          {
            echo "<form method='post' style='display:inline;'>
            <td>
            <input type='hidden' name='id_zaplacone' value='{$r['id_mecz']}'>
            <button type='submit' class='btn btn-success' name='zaplacone'>✅</button>
            </form>
            </td>";
          }
          else
          {
            echo "<td></td>";
          }
          
          
      echo"    <td>
              <form method='post' style='display:inline;'>
                  <input type='hidden' name='id_usun' value='{$r['id_mecz']}'>
                  <button type='submit' class='btn btn-danger btn-delete'>Usuń</button>
              </form>
          </td>
           <td>
              <form method='post' action='edytuj.php' style='display:inline;'>
                  <input type='hidden' name='id_edytuj' value='{$r['id_mecz']}'>
                  <button type='submit' class='btn btn-primary'>Edytuj</button>
              </form>
          </td>
          <td>
              <form method='post' action='PdfGenerator.js' style='display:inline;'>
                  <input type='hidden' name='id_pdf' value='{$r['id_mecz']}'>
                  <button type='submit' class='btn btn-secondary'>PDF</button>
              </form>
          </td>
      </tr>";
      $i++;
  }


    if (isset($_POST['id_usun'])) {
      $id_usun = intval($_POST['id_usun']); // Zabezpieczenie przed SQL Injection
      $usun_query = "DELETE FROM mecz WHERE id_mecz = $id_usun";
      $usun_result = mysqli_query($conn, $usun_query);
  
      if ($usun_result) {
          echo "<script>
                  alert('Rekord został pomyślnie usunięty!');
                  window.location.href = 'index.php';
                </script>";
      } else {
          echo "<script>
                  alert('Błąd podczas usuwania rekordu. Spróbuj ponownie.');
                </script>";
      }
  }
  if (isset($_POST['id_zaplacone'])) {
    $id_zaplacone = intval($_POST['id_zaplacone']); // Zabezpieczenie przed SQL Injection
    $zaplacone_query = "UPDATE mecz SET zaplacone='T' WHERE id_mecz = $id_zaplacone";
    $zaplacone_result = mysqli_query($conn, $zaplacone_query);

   
}
  

  
    
    ?>
    

   

</table>


<div id="kasa" class="alert alert-success" role="alert">
  <?php
  $ilosc_kasy_kwerenda = "SELECT SUM(kasa) AS total_kasa FROM mecz";
  $query_ilosc_kasy = mysqli_query($conn, $ilosc_kasy_kwerenda);

  if ($query_ilosc_kasy) {
      $row = mysqli_fetch_assoc($query_ilosc_kasy);
      $total_kasa = $row['total_kasa'] ?? 0; // Default to 0 if no value is returned
      echo "Męczyłeś się za: " . $total_kasa . " PLN";
  } else {
      echo "Wystąpił błąd podczas pobierania danych.";
  }
  ?>
</div>
<div id="podatek" class="alert alert-danger" role="alert">
  <?php
  $ilosc_podatku = "SELECT SUM(podatek) AS podatek FROM mecz;";
  $query_ilosc_podatku = mysqli_query($conn, $ilosc_podatku);

  $row_podatek = 0; // Default value
  if ($query_ilosc_podatku) {
      $result = mysqli_fetch_assoc($query_ilosc_podatku);
      $row_podatek = $result['podatek'] ?? 0; // Get the tax value or default to 0
      echo "Tyle ci zabrali: " . $row_podatek . " PLN";
  } else {
      echo "Wystąpił błąd podczas pobierania danych.";
  }
  mysqli_close($conn);
  ?>
</div>

<script>
    // Przypisz zmienną PHP $row_podatek do zmiennej JS jako 'podatek'
    const podatek = <?php echo json_encode($row_podatek); ?>;
    const kasa = <?php echo json_encode($total_kasa); ?>;

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




</div>










</body>

</html>
