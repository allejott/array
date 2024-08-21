<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Arreglos Dinámicos en PHP</title>
</head>
<body>
    <h1>Definir Tamaño de los Arreglos</h1>

    <!-- Formulario para ingresar el tamaño de los arreglos -->
    <form method="post" action="">
        <h2>Arreglo Unidimensional</h2>
        <label for="size1">Número de elementos:</label>
        <input type="number" id="size1" name="size1" min="1" required>
        <br><br>

        <h2>Arreglo Bidimensional</h2>
        <label for="rows">Número de filas:</label>
        <input type="number" id="rows" name="rows" min="1" required>
        <br>
        <label for="cols">Número de columnas:</label>
        <input type="number" id="cols" name="cols" min="1" required>
        <br><br>

        <h2>Arreglo Multidimensional</h2>
        <label for="dim1">Número de dimensiones 1:</label>
        <input type="number" id="dim1" name="dim1" min="1" required>
        <br>
        <label for="dim2">Número de dimensiones 2:</label>
        <input type="number" id="dim2" name="dim2" min="1" required>
        <br>
        <label for="dim3">Número de dimensiones 3:</label>
        <input type="number" id="dim3" name="dim3" min="1" required>
        <br><br>

        <input type="submit" value="Generar Arreglos">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $size1 = intval($_POST['size1']);
        $rows = intval($_POST['rows']);
        $cols = intval($_POST['cols']);
        $dim1 = intval($_POST['dim1']);
        $dim2 = intval($_POST['dim2']);
        $dim3 = intval($_POST['dim3']);

        // Función para llenar un array con valores aleatorios
        function fillArrayWithRandomValues($array) {
            foreach ($array as &$value) {
                if (is_array($value)) {
                    $value = fillArrayWithRandomValues($value);
                } else {
                    $value = rand(1, 100); // Valores aleatorios entre 1 y 100
                }
            }
            return $array;
        }

        // Arreglo Unidimensional
        $array1D = array_fill(0, $size1, 0);
        $array1D = fillArrayWithRandomValues($array1D);

        // Arreglo Bidimensional
        $array2D = array_fill(0, $rows, array_fill(0, $cols, 0));
        $array2D = fillArrayWithRandomValues($array2D);

        // Arreglo Multidimensional
        $array3D = array_fill(0, $dim1, array_fill(0, $dim2, array_fill(0, $dim3, 0)));
        $array3D = fillArrayWithRandomValues($array3D);

        // Mostrar arreglos
        echo '<h2>Arreglo Unidimensional</h2>';
        echo '<pre>';
        print_r($array1D);
        echo '</pre>';

        echo '<h2>Arreglo Bidimensional</h2>';
        echo '<pre>';
        print_r($array2D);
        echo '</pre>';

        echo '<h2>Arreglo Multidimensional</h2>';
        echo '<pre>';
        print_r($array3D);
        echo '</pre>';
    }
    ?>
</body>
</html>
