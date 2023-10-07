<?php
if (!isset($_SESSION['validarIngreso'])) {
    echo
        '
            <script>
                window.location = "index.php?pagina=login";
            </script>
        ';
    return;
} else {
    if ($_SESSION['validarIngreso'] != "ok") {
        echo
            '
                <script>
                    window.location = "index.php?pagina=login";
                </script>
            ';
        return;
    }
}

$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
?>
<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<section class="breadcumd__banner">
    <div class="container">
        <div class="breadcumd__wrapper center">
            <h1 class="left__content">
                Registros
            </h1>
            <ul class="right__content">
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
                <li>
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li>
                    registros
                </li>
            </ul>
        </div>
    </div>
</section>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $key => $value): ?>
            <tr>
                <td>
                    <?php echo ($key + 1); ?>
                </td>
                <td>
                    <?php echo $value['nombre']; ?>
                </td>
                <td>
                    <?php echo $value['email']; ?>
                </td>
                <td>
                    <?php echo $value['f']; ?>
                </td>
                <td>
                    <div class="btn-group">
                        <div class="px-1">
                            <a href="index.php?pagina=update&id=<?php echo $value['id']; ?>" class="btn btn-warning"><i
                                    class="fas fa-pencil-alt"></i></a>
                        </div>
                        <form method="post">
                            <input type="hidden" value="<?php echo $value['id']; ?>" name="eliminarRegistro">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar -> ctrEliminarRegistro();
                            ?>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>