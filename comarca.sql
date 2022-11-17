-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 17:07:35
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

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `tipoIdentificacionA` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `numIdentificacionA` int(11) NOT NULL,
  `nombreAdmin` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `correoAdmin` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telefonoAdmin` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `direccionAdmin` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `passAdmin` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `tipoIdentificacionA`, `numIdentificacionA`, `nombreAdmin`, `correoAdmin`, `telefonoAdmin`, `direccionAdmin`, `passAdmin`) VALUES
(1, 'CC', 1025877788, 'Maicol', 'mai@gmail.com', '544151', 'carrera 4', '$2y$10$qFGWyqOhNTpQR.1gE.6uIuOYmSakzf2AUhrCipPq4vE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL COMMENT 'esta es la forma de al identificar del cliente en la tabla',
  `tipoIdentificacion` varchar(10) CHARACTER SET utf8mb4 NOT NULL COMMENT 'el tipo de la identificacion del cliente',
  `numIdentificacionC` int(11) NOT NULL COMMENT 'el numero de la identificacion del cliente',
  `nombreCliente` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'este el nombre completo del cliente',
  `correoCliente` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'el correo del cliente',
  `telefonoCliente` varchar(13) CHARACTER SET utf8mb4 NOT NULL COMMENT 'el telefono del cliente',
  `direccionCliente` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'esta es la direccion del cliente',
  `contraseñaCliente` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'la contraseña del cliente ',
  `usuarioCliente` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `tipoIdentificacion`, `numIdentificacionC`, `nombreCliente`, `correoCliente`, `telefonoCliente`, `direccionCliente`, `contraseñaCliente`, `usuarioCliente`) VALUES
(13, 'T.I', 1061697131, 'Jeffrey Ceron', 'ceronarandia@gmail.com', '3228492068', 'call 65 sur N77 M04', '$2y$10$QHNv16lf2wAGRI1kWNsR1.6.1VT5gjVTR3UXeKKgvO/', 'Jeffer126'),
(15, 'C.C', 2489546, 'Carlitos Lucresio', 'carlitos1@gmail.com', '3214854862', 'call 78 Norte N77 M04', '$2y$10$OIbMuRJj0n6MYGmMctuLGOMYrH7gADS/KEYv.6i7Jhr', 'Carlitos16'),
(0, 'controls', 1061697131, 'Jeffrey', 'ceronarandia@gmail.com', '3228492068', ' calle 62', '$2y$10$6AJPG2byUmxzujI1.X1.AuDc2aUVRKgbhMmrRnySLKy', 'Jeffer1'),
(0, 'controls', 1061697131, 'Jeffrey', 'ceronarandia@gmail.com', '3228492068', ' calle 62', '$2y$10$yPccEPoIBte7JAsssdOK7uqJ1Pdrp1HuAspWeB1wueD', 'Jeffer1'),
(0, 'controls', 1061697131, 'Jeffrey Ceron', 'jjceron13@misena.edu.co', '3228492068', ' calle 65 sur n77 M04', '$2y$10$badrEfvCGhehmQOW57LcOeI.x6tD6DQmm2G9eIv2uIW', 'Jeffer126');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `Cantidad` varchar(50) NOT NULL,
  `Producto` varchar(11) NOT NULL,
  `Precio` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `Cantidad`, `Producto`, `Precio`, `total`) VALUES
(0, '1', 'Aretes', '3000', '3000'),
(0, '1', 'Aretes', '3000', '3000'),
(0, '1', 'Perfume', '90000', '90000'),
(0, '1', 'Cheetos', '5000', '5000'),
(0, '1', 'Frunas', '500', '500'),
(0, '1', 'Barritas de', '2500', '2500'),
(0, '', '', '', ''),
(0, '1', 'Alfiler Caj', '2000', '2000'),
(0, '1', 'Lapiz', '1000', '1000'),
(0, 'wfeY', 'Falta de pa', 'Tarjeta bancaria', '3000'),
(0, '', '', '', ''),
(0, '1', 'Lapiz', '1000', '1000'),
(0, 'Xxd4s', 'Falta de pa', 'Tarjeta bancaria', '1000'),
(0, '', '', '', ''),
(0, 'Usj7', 'Falta de pa', 'Tarjeta bancaria', '0'),
(0, '', '', '', ''),
(0, '1', 'Lapiz', '1000', '1000'),
(0, '1', 'Lapiz', '1000', '1000'),
(0, 'rDP7g', 'Falta de pa', 'Tarjeta bancaria', '2000'),
(0, '', '', '', ''),
(0, '1', 'Forro Cuade', '500', '500'),
(0, '1', 'Lapiz', '1000', '1000'),
(0, '1', 'Alfiler Caj', '2000', '2000'),
(0, '1', 'Block Cuadr', '2300', '2300'),
(0, 'ZReA', 'Falta de pa', 'Tarjeta bancaria', '5800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `idenvio` int(11) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Localidad` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Barrio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`idenvio`, `Direccion`, `Localidad`, `Telefono`, `Barrio`) VALUES
(9, 'soacha', 'soacha', 'aja nose', 'nose'),
(10, 'calle 48 A sur', 'a', 't', 't'),
(11, 'dr 12', 'san da', '12312', 'villa'),
(12, 'Calle 65', 'Bosa', '3228492068', 'La estacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `numeroFact` float NOT NULL,
  `numeroPed` float NOT NULL,
  `fechaCre` date NOT NULL,
  `fechaVen` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `numeroFact`, `numeroPed`, `fechaCre`, `fechaVen`, `idCliente`, `idAdmin`, `idCompra`) VALUES
(6, 55151, 234346, '2022-02-01', '2022-09-09', 1, 3, 0),
(7, 1654, 51541, '2022-05-17', '2022-07-14', 2, 3, 0),
(8, 25451, 2687, '2022-06-01', '2022-06-30', 3, 3, 0),
(9, 3567340, 3345460, '2022-04-10', '2022-06-30', 4, 3, 0),
(10, 541564, 651561, '2021-06-14', '2023-02-21', 5, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL COMMENT ' Esta es la identificacion de l producto',
  `categoriaProducto` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `img` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `nombreProducto` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'este es el nombre del producto',
  `descripcionProducto` varchar(50) CHARACTER SET latin1 NOT NULL,
  `cantidadProductos` int(11) NOT NULL,
  `precioVenta` varchar(11) COLLATE latin1_general_ci NOT NULL COMMENT 'este es el precio de la venta a los clientes ',
  `precioCompra` varchar(25) COLLATE latin1_general_ci NOT NULL COMMENT 'estes es el precio al que se compro el producto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='estos son los productos ';

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
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`idenvio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `idenvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT COMMENT ' Esta es la identificacion de l producto', AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
