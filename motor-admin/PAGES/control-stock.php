<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handsontable - Hoja de Cálculo Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
    <style>

        #handsontable-container {
            width: 80%; /* Ocupa el 80% del ancho del padre */
            height: 1000px; /* **Altura fija para el contenedor** */
            margin: 50px auto; /* Centra horizontalmente y añade margen vertical */
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Opcional: Sombra sutil */
            /* Para que el scroll interno de Handsontable funcione, el contenedor no debe tener overflow: hidden; si no lo tiene por defecto */
            overflow: hidden; /* Asegura que no haya barras de desplazamiento externas si Handsontable tiene sus propias */
        }
    </style>
</head>
<body>
    <?php
      include("../UTILS/header-pages.php");
    ?>
    <section class="container text-center my-5">
        <h2 class="text-center mb-5">Mi Hoja de Cálculo Web</h2>
    </section>
    
    <div id="handsontable-container"></div>
    
    <?php
      include("../UTILS/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('handsontable-container');
            let hot;

            const initialData = [
                ['ID', 'Producto', 'Descripcion', 'Marca', 'Cantidad', 'Precio Unitario', 'Total'],
                [1, 'Laptop', 'Lorem ipsum', 'MotorAdmin', 2, 1200, '=E2*F2'],
                [2, 'Teclado', 'Lorem ipsum', 'MotorAdmin', 5, 75, '=E3*F3'],
                [3, 'Mouse', 'Lorem ipsum', 'MotorAdmin', 10, 25, '=E4*F4'],
                [4, 'Monitor', 'Lorem ipsum', 'MotorAdmin', 1, 300, '=E5*F5'],
                [null, 'Total General', null, null, null, null, '=SUM(G2:G16)'] // Ajustar el rango de la suma si añades más filas
            ];

            // Obtenemos la altura del contenedor DIV directamente del CSS
            // Este es el truco para que Handsontable sepa cuánto espacio llenar
            const containerHeight = container.clientHeight; // Obtiene la altura calculada del div

            hot = new Handsontable(container, {
                data: initialData,
                rowHeaders: true,
                colHeaders: true,
                width: '100%', // El 100% del contenedor (#handsontable-container)
                height: containerHeight, // **Aquí le pasamos la altura numérica del contenedor**
                licenseKey: 'non-commercial-and-evaluation',
                formulas: true,
                filters: true,
                columnSorting: true,
                contextMenu: true,
                undoRedo: true,

                columns: [
                    { type: 'numeric', readOnly: true }, // ID (Columna A)
                    { type: 'text' }, // Producto (Columna B)
                    { type: 'text' }, // Descripcion (Columna C)
                    { type: 'text' }, // Marca (Columna D)
                    { type: 'numeric', validator: (value, callback) => {
                        if (value === null || value === '') callback(true);
                        else callback(typeof value === 'number' && value >= 0 && Number.isInteger(value));
                    }, allowInvalid: false }, // Cantidad (Columna E)
                    { type: 'numeric', format: '0.00', validator: (value, callback) => {
                        if (value === null || value === '') callback(true);
                        else callback(typeof value === 'number' && value >= 0);
                    }, allowInvalid: false }, // Precio Unitario (Columna F)
                    { type: 'numeric', format: '0.00', readOnly: true } // Total (Columna G)
                ],
                
                afterChange: function(changes, source) {
                    if (source === 'loadData') {
                        return;
                    }
                    const allTableData = hot.getData();
                    console.log('Datos a guardar (simulado):', allTableData);
                    // fetch('/api/saveData', { ... })
                }
            });

            // Opcional: Si el tamaño de la ventana cambia, asegúrate de que Handsontable se ajuste.
            // Esto es importante para la responsividad.
            window.addEventListener('resize', () => {
                const newContainerHeight = container.clientHeight;
                hot.updateSettings({
                    height: newContainerHeight,
                    width: container.clientWidth // También para el ancho si el contenedor cambia de tamaño
                });
            });
        });
    </script>

</body>
</html>