<?php
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

include("../../connection.php");

if (!isset($_GET['id'])) {
    die("Factura no especificada.");
}

$id_factura = intval($_GET['id']);

// Obtener datos de la factura, trabajo y cliente
$query = "SELECT f.*, t.descripcion AS trabajo_desc, u.nombre AS cliente
          FROM facturas f
          JOIN trabajos t ON f.id_trabajo = t.id
          JOIN usuarios u ON t.id_usuario = u.id
          WHERE f.id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id_factura);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Factura no encontrada.");
}

$factura = $result->fetch_assoc();

// Crear el HTML del PDF
$html = '
    <style>
        body { font-family: Arial, sans-serif; }
        h1, h2 { text-align: center; }
        .info { margin-bottom: 20px; }
        .info p { margin: 0; }
        .total { font-size: 18px; font-weight: bold; margin-top: 15px; }
    </style>

    <h1>Factura #' . $factura['id'] . '</h1>
    <hr>
    <div class="info">
        <p><strong>Cliente:</strong> ' . htmlspecialchars($factura['cliente']) . '</p>
        <p><strong>Trabajo:</strong> ' . htmlspecialchars($factura['trabajo_desc']) . '</p>
        <p><strong>Fecha de emisión:</strong> ' . $factura['fecha_emision'] . '</p>
    </div>
    <hr>
    <div class="info">
        <p><strong>Subtotal:</strong> $' . number_format($factura['subtotal'], 2) . '</p>
        <p><strong>IVA (21%):</strong> $' . number_format($factura['iva'], 2) . '</p>
        <p class="total"><strong>Total:</strong> $' . number_format($factura['total'], 2) . '</p>
        <p><strong>Estado de pago:</strong> ' . $factura['estado_pago'] . '</p>
    </div>
    <hr>
    <p style="text-align:center;">Gracias por confiar en nuestro taller.</p>
';

// Configuración de Dompdf
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Guardar el PDF
$filename = "factura_" . $factura['id'] . ".pdf";
$filepath = "../../facturas/" . $filename;
file_put_contents($filepath, $dompdf->output());

// Guardar nombre en la base de datos
$update = $connection->prepare("UPDATE facturas SET archivo_pdf = ? WHERE id = ?");
$update->bind_param("si", $filename, $id_factura);
$update->execute();

// Redirigir al listado de facturación
header("Location: ../../ADMINISTRADOR/facturacion.php?pdf_generado=1");
exit();