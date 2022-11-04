-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2022 a las 16:49:35
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
(14, 'C.C', 54822585, 'Juanito Fonseca', 'fonseca@gmail.com', '3214594862', 'call 65 sur N87 M05', '$2y$10$lTk5QzyDGsrrdVco3cAFL.K6XM.k8IuGhKphKMRERdL', 'Juanito'),
(15, 'C.C', 2489546, 'Carlitos Lucresio', 'carlitos1@gmail.com', '3214854862', 'call 78 Norte N77 M04', '$2y$10$OIbMuRJj0n6MYGmMctuLGOMYrH7gADS/KEYv.6i7Jhr', 'Carlitos16'),
(0, 'controls', 15081055, 'Jose', 'jos@gmail.com', '3214877859', 'calle 45 b sur', '123', ''),
(0, 'Cedula de ', 1515151, 'E', 'e@gmail.com', '215554', 'da4', '123', '');

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
(4, '1', 'Lapiz', '1000', '1000'),
(0, '', '', '', ''),
(0, '1', 'Lapiz', '1000', '1000'),
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
(1, 'calle 3', 'kannedy', '122454', 'bor'),
(5, 'g', 'g', 'g', 'g');

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
  `nombreProducto` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'este es el nombre del producto',
  `descripcionProducto` varchar(50) CHARACTER SET latin1 NOT NULL,
  `cantidadProductos` int(11) NOT NULL,
  `precioVenta` varchar(11) COLLATE latin1_general_ci NOT NULL COMMENT 'este es el precio de la venta a los clientes ',
  `precioCompra` varchar(25) COLLATE latin1_general_ci NOT NULL COMMENT 'estes es el precio al que se compro el producto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='estos son los productos ';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `categoriaProducto`, `nombreProducto`, `descripcionProducto`, `cantidadProductos`, `precioVenta`, `precioCompra`) VALUES
(1, 'papeleria', 'Lapiz', 'B2 - HB2 - BIG', 1, '1000', '1000'),
(2, 'papeleria', 'Alfiler Caja', 'Alfiler en caja', 1, '2000', '2000'),
(3, 'papeleria', 'Block Cuadriculado', 'Tamaño Oficio - Carta', 1, '2300', '2300'),
(4, 'papeleria', 'Borrador', 'Nata - Marfil', 1, '500', '500'),
(5, 'papeleria', 'Clips', 'Clips de colores y clips mariposa - caja', 1, '1800', '1800'),
(6, 'papeleria', 'Forro Cuadernos', 'Para cuadernos grandes y pequeños', 1, '500', '500'),
(7, 'papeleria', 'Colores ', 'Doble punta - Kores', 1, '7000', '7000'),
(8, 'papeleria', 'Resaltador', 'Pelikan', 1, '1500', '1500'),
(9, 'papeleria', 'Acetato', 'Grueso y Delgado, tamaño Oficio - Carta', 1, '1000', '1000'),
(10, 'papeleria', 'Calculadora', 'Calculadora', 1, '3500', '3500'),
(11, 'papeleria', 'Lupa', 'Lupa', 1, '2500', '2500'),
(12, 'papeleria', 'Block Iris', 'Econo  Tamaño Oficio - Carta', 1, '2300', '2300');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`idenvio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `idenvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
