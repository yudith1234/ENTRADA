<?php
include 'header.php'; // Incluye el header


// Código PHP para definir variables predeterminadas, si es necesario
$codigo = $codigo ?? ''; // Define $codigo como vacío si no está definido
$stock = $stock ?? '0'; // Define $stock como '0' si no está definido
$ingresos = $ingresos ?? []; // Define $ingresos como array vacío si no está definido
$proveedores = $proveedores ?? []; // Define $proveedores como array vacío si no está definido
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Combustible</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Ingreso de Combustible</h2>



        <form action="index.php?action=guardarIngreso" method="POST">
            <div class="form-group">
                <label for="codigo">Código Autogenerado</label>
                <input type="text" class="form-control" id="codigo" name="codigo"
                    value="<?php echo htmlspecialchars($codigo); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="guia_remision">Guía de Remisión</label>
                <input type="text" class="form-control" id="guia_remision" name="guia_remision" required>
            </div>
            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <select class="form-control" id="proveedor" name="proveedor" required>
                    <option value="">Seleccione un proveedor</option>
                    <?php foreach ($proveedores as $proveedor): ?>
                        <option value="<?php echo htmlspecialchars($proveedor['id']); ?>">
                            <?php echo htmlspecialchars($proveedor['nombre']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="producto">Producto</label>
                <select class="form-control" id="producto" name="producto" required>
                    <option value="">Seleccione un producto</option>
                    <option value="Gasolina">Gasolina</option>
                    <option value="Diesel">Diesel</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unidad">Unidad</label>
                <select class="form-control" id="unidad" name="unidad" required>
                    <option value="Galón">Galón</option>
                    <option value="Litro">Litro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="form-group">
                <label for="observacion">Observación</label>
                <input type="text" class="form-control" id="observacion" name="observacion" maxlength="50">
            </div>
            <div class="form-group">
                <label for="stock_actual">Stock Actual</label>
                <input type="text" class="form-control" id="stock_actual"
                    value="<?php echo htmlspecialchars($stock); ?>" readonly>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-secondary">Buscar Doc</button>
                <button type="submit" class="btn btn-terciario">Limpiar</button>
                <button type="reset" class="btn btn-cuaternario">Borrar</button>
                <button type="reset" class="btn btn-cuaternario">Modificar</button>
                <a href="index.php" class="btn btn-danger">Salir</a>
            </div>

            <style>
                .btn-terciario {
                    background-color: #ffcc00;
                    /* Color amarillo */
                    color: white;
                }

                .btn-cuaternario {
                    background-color: #33cc33;
                    /* Color verde */
                    color: white;
                }
            </style>



        </form>


        <!-- Tabla de registros de ingreso de combustible -->
        <!-- Tabla de registros de ingreso de combustible -->
        <div class="mt-5">
            <h3>Registros de Ingreso de Combustible</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ingresos as $ingreso): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ingreso['codigo']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['producto']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['unidad']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['cantidad']); ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <!-- Fila adicional al final de la tabla -->
                    <tr>
                        <td colspan="4" class="text-center font-weight-bold">Nueva Fila Agregada</td>
                    </tr>
                </tbody>
            </table>
        </div>






    </div>
</body>

</html>
<?php
include 'footer.php'; // Incluye el footer


