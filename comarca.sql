
CREATE TABLE `administrador` (

  `idAdmin` INT NOT NULL AUTO_INCREMENT COMMENT 'Esta es la identificación del administrador',
  `tipoIdentificacionA` varchar(10)  NOT NULL COMMENT 'Este es el tipo de identificación del administrador',
  `numIdentificacionA` int(11) NOT NULL COMMENT 'Este es el numero de identificación del cliente',
  `nombreAdmin` varchar(50) NOT NULL COMMENT'Este es el nombre del administrador',
  `correoAdmin` varchar(50) NOT NULL COMMENT 'Este es el correo del administrador',
  `telefonoAdmin` varchar(50) NOT NULL COMMENT 'Este es el telefono del administrador',
  `direccionAdmin` varchar(50) NOT NULL COMMENT 'Esta es la direccion del administrador',
  `passAdmin` varchar(50) NOT NULL COMMENT 'Esta es la contraseña del administrador',
   CONSTRAINT pk_admin PRIMARY KEY (idAdmin)
   
) COMMENT = 'Esta es la tabla de administradores';






CREATE TABLE `clientes` (

  `idCliente` INT NOT NULL AUTO_INCREMENT COMMENT 'Esta es la identificación del cliente',
  `tipoIdentificacion` varchar(10) NOT NULL COMMENT 'Este es el tipo de la identificacion del cliente',
  `numIdentificacionC` int(11) NOT NULL COMMENT 'Este es el numero de la identificacion del cliente',
  `nombreCliente` varchar(200) NOT NULL COMMENT 'Este el nombre completo del cliente',
  `correoCliente` varchar(100) NOT NULL COMMENT 'Este es el correo del cliente',
  `telefonoCliente` varchar(13) NOT NULL COMMENT 'Este es el telefono del cliente',
  `direccionCliente` varchar(100) NOT NULL COMMENT 'Esta es la direccion del cliente',
  `contraseñaCliente` varchar(50) NOT NULL COMMENT 'Esta es la contraseña del cliente ',
  `usuarioCliente` varchar(50) NOT NULL COMMENT 'Este es el usuario del cliente ',
  CONSTRAINT pk_cliente PRIMARY KEY (idCliente)

)COMMENT = 'Esta es la tabla de clientes';




CREATE TABLE `productos` (
  `idProductos` INT NOT NULL AUTO_INCREMENT COMMENT ' Esta es la identificacion del producto',
  `categoriaProducto` varchar(50) NOT NULL COMMENT 'Esta es la categoria a la cual pertenece el producto',
  `img` varchar(150) NOT NULL COMMENT 'Esta es la imagen del producto',
  `nombreProducto` varchar(50)  NOT NULL COMMENT 'Este es el nombre del producto',
  `descripcionProducto` varchar(50)  NOT NULL COMMENT 'Esta es la descripción del producto ',
  `cantidadProductos` int(11) NOT NULL COMMENT 'Esta es la cantidad del productos',
  `precioVenta` varchar(11) NOT NULL COMMENT 'Este es el precio de la venta a los clientes ',
  `precioCompra` varchar(25) NOT NULL COMMENT 'Este es el precio al que se compro el producto para su posterior venta',
  CONSTRAINT pk_producto PRIMARY KEY (idProductos)
) COMMENT = 'Estos son los productos ';






CREATE TABLE `compra` (
  `idCompra` INT NOT NULL AUTO_INCREMENT COMMENT ' Esta es la identificacion de la compra',
  `Cantidad` varchar(50) NOT NULL  COMMENT ' Esta es la cantidad de la compra',
  `id_producto` INTEGER NOT NULL COMMENT ' Este es el id del producto',
  `Precio` varchar(50) NOT NULL COMMENT ' Este es el precio del producto ',
  `total` varchar(50) NOT NULL COMMENT ' Esta es el total de el producto ',
   CONSTRAINT pk_compra PRIMARY KEY(idCompra),
   CONSTRAINT fk_productos foreign key(id_producto) references productos (idProductos)
)COMMENT = 'Estos son los productos ';







CREATE TABLE `envio` (
  `idenvio` INT NOT NULL AUTO_INCREMENT COMMENT ' Esta es la identificacion del envio',
  `Direccion` varchar(50) NOT NULL COMMENT ' Esta es la direccion a la cual entregar el envio',
  `Localidad` varchar(50) NOT NULL COMMENT ' Esta es la localidad de entrega del envio',
  `Telefono` varchar(50) NOT NULL COMMENT ' Este es el telefono para comunicarse con el cliente',
  `Barrio` varchar(50) NOT NULL COMMENT ' Este es el barrio de entrega del envio',
   CONSTRAINT pk_envio PRIMARY KEY (idenvio)

) COMMENT = ' Este es el envio del producto';


CREATE TABLE `factura` (
  `idFactura` INT NOT NULL AUTO_INCREMENT COMMENT ' Esta es la identificacion de la factura',
  `numeroFact` float NOT NULL COMMENT ' Este es el numero de la factura',
  `numeroPed` float NOT NULL COMMENT ' Este es el numero del pedido',
  `fechaCre` date NOT NULL COMMENT ' Esta es la fecha de creacion de la factura',
  `fechaVen` date NOT NULL COMMENT ' Esta es la fecha de vencimiento de la factura',
  `idCliente` INT NOT NULL COMMENT ' Este es el id del cliente quien realizo la factura',
  `idAdmin` INT NOT NULL COMMENT ' Esta es el id del administrador de la factura',
  `idCompra` INT NOT NULL COMMENT ' Este es el id de la compra realizada',
   CONSTRAINT pk_factura primary key (idFactura),
   CONSTRAINT fk_compra foreign key(idCompra) references compra (idCompra),
   CONSTRAINT fk_admin foreign key(idAdmin) references administrador (idAdmin),
   CONSTRAINT fk_cliente foreign key(idCliente) references clientes (idCliente)
)COMMENT = 'Esta es la factura' ;


















INSERT INTO `administrador` (`tipoIdentificacionA`, `numIdentificacionA`, `nombreAdmin`, `correoAdmin`, `telefonoAdmin`, `direccionAdmin`, `passAdmin`) VALUES
('CC', 1025877788, 'Maicol', 'mai@gmail.com', '544151', 'carrera 4', '$2y$10$qFGWyqOhNTpQR.1gE.6uIuOYmSakzf2AUhrCipPq4vE');


INSERT INTO `clientes` (`tipoIdentificacion`, `numIdentificacionC`, `nombreCliente`, `correoCliente`, `telefonoCliente`, `direccionCliente`, `contraseñaCliente`, `usuarioCliente`) VALUES
( 'T.I', 1061697131, 'Jeffrey Ceron', 'ceronarandia@gmail.com', '3228492068', 'call 65 sur N77 M04', '$2y$10$QHNv16lf2wAGRI1kWNsR1.6.1VT5gjVTR3UXeKKgvO/', 'Jeffer126'),
( 'C.C', 2489546, 'Carlitos Lucresio', 'carlitos1@gmail.com', '3214854862', 'call 78 Norte N77 M04', '$2y$10$OIbMuRJj0n6MYGmMctuLGOMYrH7gADS/KEYv.6i7Jhr', 'Carlitos16'),
('controls', 1061697131, 'Jeffrey', 'ceronarandia@gmail.com', '3228492068', ' calle 62', '$2y$10$6AJPG2byUmxzujI1.X1.AuDc2aUVRKgbhMmrRnySLKy', 'Jeffer1'),
('controls', 1061697131, 'Jeffrey', 'ceronarandia@gmail.com', '3228492068', ' calle 62', '$2y$10$yPccEPoIBte7JAsssdOK7uqJ1Pdrp1HuAspWeB1wueD', 'Jeffer1'),
('controls', 1061697131, 'Jeffrey Ceron', 'jjceron13@misena.edu.co', '3228492068', ' calle 65 sur n77 M04', '$2y$10$badrEfvCGhehmQOW57LcOeI.x6tD6DQmm2G9eIv2uIW', 'Jeffer126');



INSERT INTO `productos` (`categoriaProducto`, `img`, `nombreProducto`, `descripcionProducto`, `cantidadProductos`, `precioVenta`, `precioCompra`) VALUES
('papeleria', 'lap.jpg', 'Lapiz', 'B2 - HB2 - BIG', 1, '1000', '1000'),
('papeleria', 'alfi.jpg', 'Alfiler Caja', 'Alfiler en caja', 1, '2000', '2000'),
('papeleria', 'blo.jpg', 'Block Cuadriculado', 'Tamaño Oficio - Carta', 1, '2300', '2300'),
('papeleria', 'borpe.jpg', 'Borrador', 'Nata - Marfil', 1, '500', '500'),
('papeleria', 'clip.jpg', 'Clips', 'Clips de colores y clips mariposa - caja', 1, '1800', '1800'),
('papeleria', 'forro.jpg', 'Forro Cuadernos', 'Para cuadernos grandes y pequeños', 1, '500', '500'),
('papeleria', 'color.jpg', 'Colores ', 'Doble punta - Kores', 1, '7000', '7000'),
('papeleria', 'resaltadores.jpg', 'Resaltador', 'Pelikan', 1, '1500', '1500'),
('papeleria', 'ace.jpg', 'Acetato', 'Grueso y Delgado, tamaño Oficio - Carta', 1, '1000', '1000'),
('papeleria', 'cal.jpg', 'Calculadora', 'Calculadora', 1, '3500', '3500'),
('papeleria', 'lupa.jpg', 'Lupa', 'Lupa', 1, '2500', '2500'),
('papeleria', 'iris.jpg', 'Block Iris', 'Econo  Tamaño Oficio - Carta', 1, '2300', '2300'),
('belleza', 'espe.jpg', 'Espejo', 'Espejos Distinto tamaño', 1, '1200', '1200'),
('belleza', 'ganc.jpg', 'Gancho', 'Ganchos para cabello', 1, '1500', '1500'),
('belleza', 'lap.jpg', 'Lápiz de Ojos ', 'Lápiz de colores para Ojos', 1, '1000', '1000'),
('belleza', 'permu.jpg', 'Perfume', 'Perfume para mujer', 1, '90000', '90000'),
('belleza', 'pesta.png', 'Pestañina', 'Pestañina', 1, '22000', '22000'),
('belleza', 'Pinc.jpg', 'Pinzas', 'Pinzar para cabello por par y colores', 1, '1000', '1000'),
('belleza', 'pinl.jpg', 'Pinzas', 'Pinzas laso para cabello por par', 1, '1000', '1000'),
('belleza', 'smal.jpg', 'Esmalte', 'Esmalte por colores', 1, '3000', '3000'),
('belleza', 'spra.jpg', 'Spray', 'Spray Fragancia Tropical', 1, '28000', '28000'),
('belleza', 'spray.jpg', 'Spray', 'Aplicaor en Spray', 1, '10000', '10000'),
('dulce', '100.jpg', 'Dulces', 'Dulces de 100', 1, '100', '100'),
('dulce', 'boca.jpg', 'Bocadillo', 'Bocadillo de Guayaba', 1, '500', '500'),
('dulce', 'chi.jpg', 'Cheetos', 'Cheetos - Natural - Picante - Limón y Caramelo', 1, '5000', '5000'),
('dulce', 'fruun.jpg', 'Frunas', 'Frunas', 1, '500', '500'),
('dulce', 'gomi.jpeg', 'Gomitas', 'Gomitas', 1, '1500', '1500'),
('dulce', 'papa.jpg', 'Papas', 'Papas - Naturales - Picantes - Pollo', 1, '5000', '5000'),
('dulce', 'pin.png', 'Dulces', 'Dulces PinPop', 1, '400', '400'),
('dulce', 'sna.jpg', 'Barritas de Chocolate', 'Snickers y Milkyway', 1, '2500', '2500'),
('dulce', 'todo.jpg', 'Todo Rico', 'Todo Rico', 1, '1800', '1800'),
('dulce', 'troci.jpg', 'Tricipollos', 'Trocipollos', 1, '800', '800'),
('dulce', 'yo.jpg', 'Yogue Pops', 'Yogue Pops', 1, '500', '500');


INSERT INTO `compra` ( `Cantidad`, `id_producto`, `Precio`, `total`) VALUES
('1',22 , '3000', '3000'),
('1',22 , '3000', '3000'),
('1',18, '90000', '90000');


INSERT INTO `envio` (`Direccion`, `Localidad`, `Telefono`, `Barrio`) VALUES
('calle 8 avenida 66', 'soacha', '3135892653', 'La esperanza');


INSERT INTO `factura` (`numeroFact`, `numeroPed`, `fechaCre`, `fechaVen`, `idCliente`, `idAdmin`, `idCompra`) VALUES
(55151, 234346, '2022-02-01', '2022-09-09', 1, 1, 1),
(1654, 51541, '2022-05-17', '2022-07-14', 2, 1, 2),
(25451, 2687, '2022-06-01', '2022-06-30', 1, 1, 3);