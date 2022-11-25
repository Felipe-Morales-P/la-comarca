-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2022 a las 07:30:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comarca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `tipo_usuarios` (
  `id` int(11) NOT NULL,
  `Tipo` varchar(10) COLLATE latin1_general_ci NOT NULL COMMENT  'Este es el tipo de identificación del usuario'
  )ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT = 'Esta es la tabla con los tipos de usuarios';

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `tipo_usuarios` (`id`, `Tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `tipoIdentificacion` varchar(10) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Este es el tipo de la identificacion del cliente',
  `numIdentificacionC` int(11) NOT NULL COMMENT 'Este es el numero de la identificacion del cliente',
  `nombreCliente` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Este es el nombre completo del cliente',
  `correoCliente` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Este es el correo del cliente',
  `telefonoCliente` varchar(13) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Este es el telefono del cliente',
  `direccionCliente` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Esta es la direccion del cliente',
  `contraseñaCliente` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Esta es la contraseña del cliente ',
  `usuarioCliente` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Este es el usuario del cliente',
  `last_sesion` datetime COLLATE latin1_general_ci NULL COMMENT 'Este es el token del cliente para recuperar contraseña',
  `token` varchar(40) COLLATE latin1_general_ci NOT NULL COMMENT 'Esta es la fecha de la ultima sesion del cliente',
  `activacion` int(10) COLLATE latin1_general_ci NOT NULL COMMENT 'Esta es la activación del cliente',
  `token_password` varchar(100) COLLATE latin1_general_ci NULL COMMENT 'Este es token de la contraseña del cliente',
  `password_request` int(10) COLLATE latin1_general_ci NULL COMMENT 'Esta es la solicitud de la contraseña del cliente',
  `id_tipo` int(10) COLLATE latin1_general_ci NOT NULL COMMENT 'Este es el tipo de id del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT = 'Estos son los productos ';


--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `tipoIdentificacion`, `numIdentificacionC`, `nombreCliente`, `correoCliente`, `telefonoCliente`, `direccionCliente`, `contraseñaCliente`, `usuarioCliente`) VALUES
(1, 'T.I', 1061697131, 'Jeffrey Ceron', 'ceronarandia@gmail.com', '3228492068', 'call 65 sur N77 M04', '$2y$10$QHNv16lf2wAGRI1kWNsR1.6.1VT5gjVTR3UXeKKgvO/CYEhbijSZ2', 'Jeffer126'),
(2, 'C.C', 54822585, 'Juanito Fonseca', 'fonseca@gmail.com', '3214594862', 'call 65 sur N87 M05', '$2y$10$lTk5QzyDGsrrdVco3cAFL.K6XM.k8IuGhKphKMRERdLYGdf4JgYyO', 'Juanito'),
(3, 'C.C', 2489546, 'Carlitos Lucresio', 'carlitos1@gmail.com', '3214854862', 'call 78 Norte N77 M04', '$2y$10$OIbMuRJj0n6MYGmMctuLGOMYrH7gADS/KEYv.6i7Jhr8E7mitNmli', 'Carlitos16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `Cantidad` varchar(50) NOT NULL COMMENT ' Esta es la cantidad de la compra',
  `Producto` varchar(11) NOT NULL COMMENT ' Este es el id del producto comprado',
  `Precio` varchar(50) NOT NULL COMMENT ' Este es el precio del producto comprado',
  `total` varchar(50) NOT NULL COMMENT' Esta es el total de el producto '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  COMMENT = 'Estos son los productos ';

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `Cantidad`, `Producto`, `Precio`, `total`) VALUES
(1, '1', 'Aretes', '3000', '3000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `numeroFact` float NOT NULL COMMENT ' Este es el numero de la factura',
  `numeroPed` float NOT NULL COMMENT ' Este es el numero del pedido',
  `fechaCre` date NOT NULL COMMENT ' Esta es la fecha de creacion de la factura',
  `fechaVen` date NOT NULL COMMENT ' Esta es la fecha de vencimiento de la factura'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT = 'Esta es la factura del producto comprado';

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `numeroFact`, `numeroPed`, `fechaCre`, `fechaVen`) VALUES
(1, 55151, 234346, '2022-02-01', '2022-09-09'),
(2, 1654, 51541, '2022-05-17', '2022-07-14'),
(3, 25451, 2687, '2022-06-01', '2022-06-30'),
(4, 3567340, 3345460, '2022-04-10', '2022-06-30'),
(5, 541564, 651561, '2021-06-14', '2023-02-21');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `idenvio` int(11) NOT NULL,
  `uname` varchar(35) NOT NULL COMMENT ' Este es el nombre de usuario', 
  `Direccion` varchar(50) NOT NULL COMMENT ' Esta es la direccion a la cual entregar el envio',
  `Localidad` varchar(50) NOT NULL COMMENT ' Esta es la localidad de entrega del envio',
  `Barrio` varchar(50) NOT NULL COMMENT ' Este es el barrio de entrega del envio',
  `fechaCompra` datetime NOT NULL COMMENT ' Esta es la fecha en la cual se realizo la compra',
  `Nombre` varchar(50) NOT NULL COMMENT ' Este es el nombre del destinatario del envio',
  `Correo` varchar(50) NOT NULL COMMENT 'Este es el correo al cual se le informara el envio',
  `Telefono` varchar(50) NOT NULL COMMENT ' Este es el telefono para comunicarse con el cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT = 'Esta es la descripción del envio del producto';

--
-- Volcado de datos para la tabla `envio`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `categoriaProducto` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'Esta es la categoria a la cual pertenece el producto',
  `img` varchar(150) COLLATE latin1_general_ci NOT NULL COMMENT 'Esta es la imagen del producto',
  `nombreProducto` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Este es el nombre del producto',
  `descripcionProducto` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Esta es la descripción del producto ',
  `cantidadProductos` int(11) NOT NULL COMMENT 'Esta es la cantidad del productos',
  `precioVenta` varchar(11) COLLATE latin1_general_ci NOT NULL COMMENT 'Este es el precio de la venta a los clientes ',
  `precioCompra` varchar(25) COLLATE latin1_general_ci NOT NULL  COMMENT 'Este es el precio al que se compro el producto para su posterior venta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Estos son los productos ';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `categoriaProducto`, `img`, `nombreProducto`, `descripcionProducto`, `cantidadProductos`, `precioVenta`, `precioCompra`) VALUES
(1, 'papeleria', 'lap.jpg', 'Lapiz', 'B2 - HB2 - BIG', 1, '1000', '1000'),
(2, 'papeleria', 'alfi.jpg', 'Alfiler Caja', 'Alfiler en caja', 1, '2000', '2000'),
(3, 'papeleria', 'blo.jpg', 'Block Cuadriculado', 'Tamaño Oficio - Carta', 1, '2300', '2300'),
(4, 'papeleria', 'borpe.jpg', 'Borrador', 'Nata - Marfil', 1, '500', '500'),
(5, 'papeleria', 'clip.jpg', 'Clips', 'Clips de colores y clips mariposa - caja', 1, '1800', '1800'),
(6, 'papeleria', 'forro.jpg', 'Forro Cuadernos', 'Para cuadernos grandes y pequeños', 1, '500', '500'),
(7, 'papeleria', 'color.jpg', 'Colores ', 'Doble punta - Kores', 1, '7000', '7000'),
(8, 'papeleria', 'resaltadores.jpg', 'Resaltador', 'Pelikan', 1, '1500', '1500'),
(9, 'papeleria', 'ace.jpg', 'Acetato', 'Grueso y Delgado, tamaño Oficio - Carta', 1, '1000', '1000'),
(10, 'papeleria', 'cal.jpg', 'Calculadora', 'Calculadora', 1, '3500', '3500'),
(11, 'papeleria', 'lupa.jpg', 'Lupa', 'Lupa', 1, '2500', '2500'),
(12, 'papeleria', 'iris.jpg', 'Block Iris', 'Econo  Tamaño Oficio - Carta', 1, '2300', '2300'),
(13, 'belleza', 'are.jpg', 'Aretes', 'Aretes Par', 1, '3000', '3000'),
(14, 'belleza', 'base.jpg', 'Base', 'Base Crema Correctora', 1, '13000', '13000'),
(15, 'belleza', 'espe.jpg', 'Espejo', 'Espejos Distinto tamaño', 1, '1200', '1200'),
(16, 'belleza', 'ganc.jpg', 'Gancho', 'Ganchos para cabello', 1, '1500', '1500'),
(17, 'belleza', 'lap.jpg', 'Lápiz de Ojos ', 'Lápiz de colores para Ojos', 1, '1000', '1000'),
(18, 'belleza', 'permu.jpg', 'Perfume', 'Perfume para mujer', 1, '90000', '90000'),
(19, 'belleza', 'pesta.png', 'Pestañina', 'Pestañina', 1, '22000', '22000'),
(20, 'belleza', 'Pinc.jpg', 'Pinzas', 'Pinzar para cabello por par y colores', 1, '1000', '1000'),
(21, 'belleza', 'pinl.jpg', 'Pinzas', 'Pinzas laso para cabello por par', 1, '1000', '1000'),
(22, 'belleza', 'smal.jpg', 'Esmalte', 'Esmalte por colores', 1, '3000', '3000'),
(23, 'belleza', 'spra.jpg', 'Spray', 'Spray Fragancia Tropical', 1, '28000', '28000'),
(24, 'belleza', 'spray.jpg', 'Spray', 'Aplicaor en Spray', 1, '10000', '10000'),
(25, 'dulce', '100.jpg', 'Dulces', 'Dulces de 100', 1, '100', '100'),
(26, 'dulce', 'boca.jpg', 'Bocadillo', 'Bocadillo de Guayaba', 1, '500', '500'),
(27, 'dulce', 'chi.jpg', 'Cheetos', 'Cheetos - Natural - Picante - Limón y Caramelo', 1, '5000', '5000'),
(28, 'dulce', 'fruun.jpg', 'Frunas', 'Frunas', 1, '500', '500'),
(29, 'dulce', 'gomi.jpeg', 'Gomitas', 'Gomitas', 1, '1500', '1500'),
(30, 'dulce', 'papa.jpg', 'Papas', 'Papas - Naturales - Picantes - Pollo', 1, '5000', '5000'),
(31, 'dulce', 'pin.png', 'Dulces', 'Dulces PinPop', 1, '400', '400'),
(32, 'dulce', 'sna.jpg', 'Barritas de Chocolate', 'Snickers y Milkyway', 1, '2500', '2500'),
(33, 'dulce', 'todo.jpg', 'Todo Rico', 'Todo Rico', 1, '1800', '1800'),
(34, 'dulce', 'troci.jpg', 'Tricipollos', 'Trocipollos', 1, '800', '800'),
(35, 'dulce', 'yo.jpg', 'Yogue Pops', 'Yogue Pops', 1, '500', '500');














--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);


--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`);


--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `envio`
--

ALTER TABLE `envio`
  ADD PRIMARY KEY (`idenvio`);

--
--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`);









--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int NOT NULL AUTO_INCREMENT COMMENT 'Esta es la forma de al identificar del cliente en la tabla';


--
-- AUTO_INCREMENT de la tabla `compra`
--

ALTER TABLE `compra`
  MODIFY `idCompra` int NOT NULL AUTO_INCREMENT COMMENT 'Esta es la identificación de la compra en la tabla';


--
-- AUTO_INCREMENT de la tabla `factura`
--

ALTER TABLE `factura`
  MODIFY `idFactura` int NOT NULL AUTO_INCREMENT COMMENT 'Esta es la identificación de la factura en la tabla';


--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `idenvio` int NOT NULL AUTO_INCREMENT COMMENT 'Esta es la identificación de el envio en la tabla';

-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int NOT NULL AUTO_INCREMENT COMMENT ' Esta es la identificacion de el producto';
COMMIT;





-- FORANEAS de la tabla factura `productos`
--














/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
