<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Clima</title>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Escudo_CUCEI.svg" rel="icon">
</head>

<style>
    .mb-extra {
        margin-bottom: 80px;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card" style="background-image: url('background.jpeg'); background-size: cover;">
                    <div class="card-body">
                        <h1 class="card-title mb-5">Clima en Guadalajara</h1>
                        <?php
                        // Configuración
                        $api_key = 'd417484a4fe8d0ab7af29d22c6a2e7b4';
                        $lat = "20.6";
                        $long = "-103.3";
                        $units = "metric";

                        // URL de la API
                        $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$long&appid=$api_key&units=$units&lang=es";

                        //echo $url;

                        // Realizar la solicitud HTTP
                        $response = file_get_contents($url);

                        // Procesar la respuesta JSON
                        $data = json_decode($response);

                        // Verificar si se recibió una respuesta válida
                        if ($data && $data->cod == 200) {
                            // Acceder a los datos
                            $temperatura = $data->main->temp;
                            $descripcion = $data->weather[0]->description;
                            $sensacion = $data->main->feels_like;
                            $humedad = $data->main->humidity;
                            $viento = $data->wind->speed;
                            $presion = $data->main->pressure;

                            echo "<div class='row'>";
                            echo "<div class=col><h5 class=mb-3>Ahora</h5>";
                            echo "<h4>$temperatura °C<img src='clear-sky.png' style='width:46px; height:46; margin-left: 10px' ></h4>";
                            echo "<h6>Sensación térmica: $sensacion °C</h6>";
                            echo "<div class=mb-extra></div>";
                            echo "</div>";

                            echo "<div class='col'><h6 class=mb-3>" . ucfirst($descripcion) . "</h6>";
                            echo "<h6 class=mb-3>Humedad: $humedad %</h6>";
                            echo "<h6 class=mb-3>Viento: $viento Kh/h</h6>";
                            echo "<h6 class=mb-3>Presión atmosferica: $presion mb</h6>";
                            echo "</div>";

                        } else {
                            echo "Error al obtener datos del clima.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>