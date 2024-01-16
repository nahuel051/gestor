<div id="contenedor-index">
<nav id="nav-index">
<input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
<div class="logo">
<p>
<i class="fa-solid fa-chart-simple"></i>
    System</p>
</div>
<ul>
<li><a href="index.php"><i class="fa-solid fa-house-chimney"></i>Inicio</a></li>
<?php if ($rolAdministrador == 1):?>
    <li>
    <a href="usuarios.php"><i class="fa-solid fa-user"></i>Usuarios</a>
    </li>
    <?php endif; ?>
<li><a href="cliente.php"><i class="fa-solid fa-users"></i>Clientes</a></li>
<li><a href="proveedores.php"><i class="fa-solid fa-building"></i>Proveedores</a></li>
<li><a href="producto.php"><i class="fa-solid fa-box"></i>Productos</a></li>
<li><a href="venta.php"><i class="fa-solid fa-cart-shopping"></i>Ventas</a></li>
<li><a href="cerrar.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a></li>
</ul>
</nav>
