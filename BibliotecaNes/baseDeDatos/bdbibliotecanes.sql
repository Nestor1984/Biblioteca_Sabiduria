-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 00:14:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdbibliotecanes`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerEjemplares` ()   BEGIN
            SELECT e.idEjemplar, e.idLibro, e.estado, l.titulo FROM Ejemplares e INNER JOIN libros l ON e.idLibro = l.idLibro ORDER BY e.idEjemplar DESC;         
            END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerLibros` ()   BEGIN
SELECT l.idLibro, l.titulo, l.cantidadPaginas, l.fechaPublicacion, l.descripcion, l.genero, l.idioma, l.isbn, l.idFormato, f.nombre FROM libros l INNER JOIN formatos f ON l.idFormato = f.idFormatos ORDER BY l.idLibro DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL,
  `nombresYApellidos` varchar(60) NOT NULL,
  `sitioWeb` varchar(45) NOT NULL,
  `nacionalidad` varchar(15) NOT NULL,
  `anioNacimiento` date NOT NULL,
  `anioFallecimiento` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `nombresYApellidos`, `sitioWeb`, `nacionalidad`, `anioNacimiento`, `anioFallecimiento`, `genero`) VALUES
(1, 'Juan Perez', 'http://www.juanperez.com', 'Mexicano', '1980-05-15', NULL, 'M'),
(2, 'Maria Rodriguez', 'http://www.mariarodriguez.com', 'Española', '1975-08-22', NULL, 'F'),
(3, 'Carlos Gomez', 'http://www.carlosgomez.com', 'Argentino', '1992-11-10', NULL, 'M'),
(4, 'Ana Martinez', 'http://www.anamartinez.com', 'Colombiana', '1988-03-03', '2010-12-18', 'F'),
(5, 'Raul Hernandez', 'http://www.raulhernandez.com', 'Chileno', '1972-09-28', NULL, 'M'),
(6, 'Elena Sanchez', 'http://www.elenasanchez.com', 'Peruana', '1985-06-07', NULL, 'F'),
(7, 'Luis Garcia', 'http://www.luisgarcia.com', 'Venezolano', '1990-02-14', NULL, 'M'),
(8, 'Isabel Torres', 'http://www.isabeltorres.com', 'Ecuatoriana', '1983-12-01', '2015-07-10', 'F'),
(9, 'Jorge Fernandez', 'http://www.jorgefernandez.com', 'Uruguayo', '1978-04-20', NULL, 'M'),
(10, 'Carmen Diaz', 'http://www.carmendiaz.com', 'Paraguaya', '1987-10-05', NULL, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliotecario`
--

CREATE TABLE `bibliotecario` (
  `idBibliotecario` int(11) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `ci` varchar(15) DEFAULT NULL,
  `turno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bibliotecario`
--

INSERT INTO `bibliotecario` (`idBibliotecario`, `nombres`, `apellidos`, `direccion`, `email`, `telefono`, `genero`, `ci`, `turno`) VALUES
(1, 'Juan', 'Perez', 'Calle Principal 123', 'juan.perez@email.com', '555-123-456', 'M', '123456789', 'Mañana'),
(2, 'Maria', 'Gomez', 'Avenida Central 456', 'maria.gomez@email.com', '555-789-123', 'F', '987654321', 'Tarde'),
(3, 'Carlos', 'Rodriguez', 'Calle Secundaria 789', 'carlos.rodriguez@email.com', '555-456-789', 'M', '456789123', 'Noche'),
(4, 'Ana', 'Hernandez', 'Avenida Norte 567', 'ana.hernandez@email.com', '555-234-567', 'F', '234567890', 'Mañana'),
(5, 'Raul', 'Torres', 'Calle Este 890', 'raul.torres@email.com', '555-678-901', 'M', '678901234', 'Tarde'),
(6, 'Elena', 'Diaz', 'Avenida Sur 234', 'elena.diaz@email.com', '555-901-234', 'F', '890123456', 'Noche'),
(7, 'Luis', 'Garcia', 'Calle Oeste 678', 'luis.garcia@email.com', '555-345-678', 'M', '345678901', 'Mañana'),
(8, 'Isabel', 'Martinez', 'Avenida Principal 123', 'isabel.martinez@email.com', '555-012-345', 'F', '012345678', 'Tarde'),
(9, 'Jorge', 'Fernandez', 'Calle Central 567', 'jorge.fernandez@email.com', '555-789-012', 'M', '789012345', 'Noche'),
(10, 'Carmen', 'Lopez', 'Avenida Secundaria 890', 'carmen.lopez@email.com', '555-234-567', 'F', '234567890', 'Mañana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosvaloraciones`
--

CREATE TABLE `comentariosvaloraciones` (
  `idComentarioValoracion` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idLibro` int(11) DEFAULT NULL,
  `valoracion` varchar(20) DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentariosvaloraciones`
--

INSERT INTO `comentariosvaloraciones` (`idComentarioValoracion`, `idUsuario`, `idLibro`, `valoracion`, `comentario`) VALUES
(1, 1, 1, '5 estrellas', 'muy buena'),
(2, 4, 6, '3 estrellas', 'espectacular'),
(3, 3, 7, '5 estrellas', 'extraordinaria'),
(4, 7, 20, '2 estrellas', 'desastroso'),
(5, 8, 3, '5 estrellas', 'extraordinaria'),
(6, 7, 17, '4 estrellas', 'muy buena'),
(7, 5, 28, '0 estrellas', 'mu mala'),
(8, 9, 17, '1 estrellas', 'simple'),
(9, 6, 20, '5 estrellas', 'estupenda'),
(10, 2, 3, '5 estrellas', 'extraordinario'),
(11, 10, 4, '5 estrellas', 'extraordinaria'),
(12, 6, 25, '4 estrellas', 'muy buena'),
(13, 1, 10, '5 estrellas', 'estupenda'),
(14, 1, 17, '0 estrellas', 'muy mala'),
(15, 5, 14, '5 estrellas', 'estupenda'),
(16, 7, 22, '5 estrellas', 'estupenda'),
(17, 8, 18, '1 estrellas', 'simple'),
(18, 4, 4, '4 estrellas', 'muy buena'),
(19, 9, 8, '3 estrellas', 'buena'),
(20, 5, 2, '5 estrellas', 'espectacular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `idDevolucion` int(11) NOT NULL,
  `fechaDevolucion` datetime DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `multa` decimal(3,2) DEFAULT NULL,
  `idPrestamo` int(11) DEFAULT NULL,
  `comentarios` varchar(165) DEFAULT NULL,
  `idBibliotecario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`idDevolucion`, `fechaDevolucion`, `estado`, `multa`, `idPrestamo`, `comentarios`, `idBibliotecario`) VALUES
(1, '2023-03-15 09:30:00', NULL, NULL, 1, NULL, 1),
(2, '2023-03-17 15:00:00', NULL, NULL, 2, NULL, 2),
(3, '2023-03-20 10:45:00', NULL, NULL, 3, NULL, 3),
(4, '2023-03-22 12:15:00', NULL, NULL, 4, NULL, 1),
(5, '2023-03-25 17:30:00', NULL, NULL, 5, NULL, 2),
(6, '2023-03-28 14:20:00', NULL, NULL, 6, NULL, 3),
(7, '2023-03-30 11:00:00', NULL, NULL, 7, NULL, 1),
(8, '2023-04-02 13:15:00', NULL, NULL, 8, NULL, 2),
(9, '2023-04-05 15:30:00', NULL, NULL, 9, NULL, 3),
(10, '2023-04-08 09:45:00', NULL, NULL, 10, NULL, 1),
(11, '2023-04-08 09:45:00', 'Prestado', '3.00', 1, 'Sin comentarios', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `idEditorial` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `anioFundacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`idEditorial`, `nombre`, `pais`, `ciudad`, `telefono`, `anioFundacion`) VALUES
(1, 'Editorial Aurora', 'España', 'Madrid', '123-456-789', '1990-01-15'),
(2, 'Libros del Horizonte', 'México', 'Ciudad de México', '555-123-456', '1985-07-22'),
(3, 'Ediciones Estelares', 'Argentina', 'Buenos Aires', '789-321-654', '1995-03-10'),
(4, 'Editorial Páginas Doradas', 'Colombia', 'Bogotá', '987-654-321', '1980-11-28'),
(5, 'Mundo de Libros', 'Chile', 'Santiago', '456-789-123', '2000-06-07'),
(6, 'Libros del Sur', 'Perú', 'Lima', '321-987-654', '1992-09-18'),
(7, 'Editorial AlfaLibros', 'Venezuela', 'Caracas', '654-321-987', '1988-04-25'),
(8, 'Ediciones del Sol', 'Ecuador', 'Quito', '789-123-456', '1998-12-03'),
(9, 'Editorial Línea Creativa', 'Uruguay', 'Montevideo', '234-567-890', '1983-08-20'),
(10, 'Libros del Universo', 'Paraguay', 'Asunción', '876-543-210', '1996-05-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE `ejemplares` (
  `idEjemplar` int(11) NOT NULL,
  `idLibro` int(11) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejemplares`
--

INSERT INTO `ejemplares` (`idEjemplar`, `idLibro`, `estado`) VALUES
(1, 6, 'Disponible'),
(2, 10, 'No Disponible'),
(3, 7, 'Usado'),
(4, 2, 'Disponible'),
(5, 8, 'No Disponible'),
(6, 1, 'Disponible'),
(7, 5, 'No Disponible'),
(8, 9, 'Disponible'),
(9, 3, 'Usado'),
(10, 4, 'Usado'),
(11, 11, 'Disponible'),
(12, 17, 'Disponible'),
(13, 20, 'Disponible'),
(14, 13, 'No Disponible'),
(15, 19, 'No Disponible'),
(16, 12, 'Disponible'),
(17, 16, 'No Disponible'),
(18, 15, 'Usado'),
(19, 18, 'Disponible'),
(20, 14, 'Usado'),
(21, 29, 'Disponible'),
(22, 25, 'No Disponible'),
(23, 22, 'Usado'),
(24, 24, 'Disponible'),
(25, 26, 'Usado'),
(26, 28, 'Usado'),
(27, 21, 'Disponible'),
(28, 27, 'No Disponible'),
(29, 3, 'Disponible'),
(30, 23, 'No Disponible'),
(31, 4, 'Disponible'),
(32, 3, 'Usado'),
(33, 3, 'Disponible'),
(34, 3, 'No Disponible'),
(35, 7, 'Usado'),
(36, 3, 'Disponible'),
(37, 3, 'Disponible'),
(38, 9, 'No Disponible'),
(39, 2, 'No Disponible'),
(40, 6, 'Usado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos`
--

CREATE TABLE `formatos` (
  `idFormatos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formatos`
--

INSERT INTO `formatos` (`idFormatos`, `nombre`, `descripcion`) VALUES
(1, 'XLSX', 'Microsoft Excel'),
(2, 'ODS', 'OpenDocument Spreadsheat'),
(3, 'ZIP', 'Formato de archivo comprimido'),
(4, 'RAR', 'Formato de archivo RAR'),
(5, 'SQL', 'Structured Query Language'),
(6, 'CSV', 'Valores separados por comas para datos de bas'),
(7, 'EPUB', 'Electronic Publication'),
(8, 'PDF', 'Tambien se usa para libros electronicos'),
(9, 'JPEG', 'Joint Photographic Experts Group'),
(10, 'Wav', 'Multimedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `cantidadPaginas` int(11) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `idioma` varchar(40) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `idFormato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `titulo`, `cantidadPaginas`, `fechaPublicacion`, `descripcion`, `genero`, `idioma`, `isbn`, `idFormato`) VALUES
(1, 'Cien años de soledad', 400, '1909-09-04', 'Buen libro', 'Aventura', 'Español', '12543243', 4),
(2, '1984', 800, '1990-02-12', 'Mas o menos', 'Tristeza', 'Ingles', '34123454', 7),
(3, 'El señor de los anillos', 1200, '1980-12-05', 'buen libro', 'Aventura', 'Ingles', '8597234', 1),
(4, 'Harry Potter y la piedra filosofal', 920, '0000-00-00', 'buen libro', 'Fantasia', 'Ingles', '2731823', 2),
(5, 'Matar a un ruiseñor', 690, '1999-09-12', 'mal libro', 'Gore', 'Ingl', '534123', 5),
(6, 'Orgullo y prejuicio', 321, '1992-08-02', 'Buen libro', 'Comedia', 'Ingles', '5345345', 10),
(7, 'Cronicas marcianas', 900, '1969-09-05', 'Buen libro', 'Fantasia', 'Ingles', '86786', 3),
(8, 'Crimen y castigo', 600, '2012-12-12', 'Buen libro', 'Gore', 'Español', '321321', 8),
(9, 'El Gran Gatsby', 500, '1987-04-04', 'Pesimo libro', 'Aventura', 'Ingles', '75675543', 6),
(10, 'El codigo Da Vinci', 599, '1987-03-07', 'Mas o menos libro', 'Oculto', 'Ingles', '97854654', 9),
(11, 'Las hijas de la criada', 900, '2023-09-04', 'Bien', 'Aventura', 'Ingles', '2323154', 10),
(12, 'El problema final', 500, '2021-05-05', 'Mal', 'Gore', 'Espaniol', '2312312', 6),
(13, 'Alas de sangre', 300, '2011-12-01', 'Bien', 'Fantasia', 'Ingles', '21323', 5),
(14, 'Maldita Roma', 1000, '2010-05-09', 'Bien', 'Historia', 'Latin', '3212452', 3),
(15, 'La armadura de la luz', 2000, '1989-11-04', 'Muy Bien', 'Ciencia', 'Ingles', '23141243', 2),
(16, 'La sangre del padre', 700, '2020-07-08', 'Bien Mal', 'Ficcion', 'Espaniol', '312341312', 8),
(17, 'Todo vuelve', 600, '2019-07-04', 'Bien', 'Romance', 'Ingles', '3123213', 2),
(18, 'El abismo del olvido', 978, '1999-03-23', 'Mal', 'Historia', 'Ingles', '3121323', 1),
(19, 'Habitos atomicos', 589, '2020-10-03', 'Bien', 'Ficcion', 'Ingles', '2312342', 10),
(20, 'El barco de teseo', 700, '2019-09-09', 'Mal', 'Aventura', 'Espaniol', '3213213', 7),
(21, 'El lirio blanco', 900, '2017-09-05', 'Bien', 'Aventura', 'Ingles', '2312312', 7),
(22, 'El infierno', 700, '1900-09-12', 'Bien', 'Terror', 'Espaniol', '2312313', 8),
(23, 'Las luces de febrero', 689, '1809-08-21', 'Bien', 'Romance', 'Ingles', '4324232', 6),
(24, 'Tierra firme', 560, '0000-00-00', 'Mal', 'Romance', 'Latin', '5676567', 3),
(25, 'Acontece que no es poco', 324, '2000-06-06', 'Bien', 'Fantasia', 'Ingles', '435324', 2),
(26, 'Holly', 432, '0000-00-00', '1969-09-25', 'Mal', 'Drama', 'Ingles', 5),
(27, 'Dios', 654, '2001-05-28', 'Bien', 'Drama', 'Inlges', '233234', 4),
(28, 'No te vere', 352, '2009-12-06', 'Bien', 'Comedia', 'Espaniol', '848583', 3),
(29, 'El sutil arte de que', 456, '2002-12-31', 'Bien Mal', 'Comedia', 'Ingles', '8347438', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_autores`
--

CREATE TABLE `libros_autores` (
  `idLibro` int(11) DEFAULT NULL,
  `idAutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros_autores`
--

INSERT INTO `libros_autores` (`idLibro`, `idAutor`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 8),
(7, 9),
(8, 3),
(9, 1),
(10, 5),
(11, 7),
(12, 8),
(13, 3),
(14, 5),
(15, 10),
(16, 4),
(17, 2),
(18, 1),
(19, 8),
(20, 6),
(21, 1),
(22, 9),
(23, 1),
(24, 10),
(25, 1),
(26, 4),
(27, 5),
(28, 6),
(29, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_editoriales`
--

CREATE TABLE `libros_editoriales` (
  `idLibro` int(11) DEFAULT NULL,
  `idEditorial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros_editoriales`
--

INSERT INTO `libros_editoriales` (`idLibro`, `idEditorial`) VALUES
(1, 5),
(2, 2),
(3, 1),
(4, 5),
(5, 6),
(6, 7),
(7, 9),
(8, 10),
(9, 1),
(10, 1),
(11, 1),
(12, 7),
(13, 5),
(14, 2),
(15, 1),
(16, 3),
(17, 8),
(18, 6),
(19, 5),
(20, 9),
(21, 8),
(22, 8),
(23, 1),
(24, 2),
(25, 3),
(26, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamo` int(11) NOT NULL,
  `fechaDePrestamo` datetime DEFAULT NULL,
  `plazo` date DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idBibliotecario` int(11) DEFAULT NULL,
  `idEjemplar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `fechaDePrestamo`, `plazo`, `idUsuario`, `idBibliotecario`, `idEjemplar`) VALUES
(1, '2023-03-01 10:00:00', '2023-03-15', 1, 1, 1),
(2, '2023-03-02 14:30:00', '2023-03-17', 2, 2, 3),
(3, '2023-03-05 09:15:00', '2023-03-20', 3, 3, 5),
(4, '2023-03-08 11:45:00', '2023-03-22', 4, 1, 7),
(5, '2023-03-10 16:20:00', '2023-03-25', 5, 2, 9),
(6, '2023-03-12 13:10:00', '2023-03-28', 6, 3, 11),
(7, '2023-03-15 10:30:00', '2023-03-30', 7, 1, 13),
(8, '2023-03-18 12:45:00', '2023-04-02', 8, 2, 15),
(9, '2023-03-20 15:00:00', '2023-04-05', 9, 3, 17),
(10, '2023-03-22 09:00:00', '2023-04-08', 10, 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombres` varchar(35) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `genero` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombres`, `apellidos`, `ci`, `direccion`, `telefono`, `email`, `genero`) VALUES
(1, 'Roberto', 'Flores Perez', '2345123', 'Av Santos', '2131432', 'Flor@gmail.com', 'M'),
(2, 'Luis', 'Espejo Mamani', '21321543', 'Av Perez', '234223', 'Luis@gmail.com', 'M'),
(3, 'Maria', 'Cama Cama', '213532', 'Av Garcia', '2323234', 'Maria@gmail.com', 'F'),
(4, 'Helena', 'Gonzales Jimenez', '2132144', 'Av Mendoza', '231424', 'Helen@gmail.com', 'F'),
(5, 'Mario', 'Bross', '12324', 'Av Game', '4213213', 'Mario@gmail.com', 'M'),
(6, 'Peach', 'Princess', '21352133', 'Av Sega', '231245123', 'Peach@gmail.com', 'F'),
(7, 'Luigui', 'Bross', '2312131', 'Av Game', '1231232', 'Luigui@gmail.com', 'M'),
(8, 'Gonzalo', 'Gonzales Pietro', '2312321', 'Av Sucre', '3123233', 'Gon@gmail.com', 'M'),
(9, 'Jose', 'Mamani Mamani', '213213', 'Av Arce', '23123213', 'Jose@gmail.com', 'M'),
(10, 'Daniel', 'Eminem', '23123', 'Av EEUU', '3123213', 'Daniel@gmail.com', 'M');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD PRIMARY KEY (`idBibliotecario`);

--
-- Indices de la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  ADD PRIMARY KEY (`idComentarioValoracion`),
  ADD KEY `fk_cv_Usuarios` (`idUsuario`),
  ADD KEY `fk_cv_libro` (`idLibro`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`idDevolucion`),
  ADD KEY `fk_devolucion_bibliotecario` (`idBibliotecario`),
  ADD KEY `fk_devolucion_prestamos` (`idPrestamo`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD PRIMARY KEY (`idEjemplar`),
  ADD KEY `fk_ejemplares_libros` (`idLibro`);

--
-- Indices de la tabla `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`idFormatos`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `fk_libros_formatos` (`idFormato`);

--
-- Indices de la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  ADD KEY `fk_librosAutores_libros` (`idLibro`),
  ADD KEY `fk_librosAutores_Autores` (`idAutor`);

--
-- Indices de la tabla `libros_editoriales`
--
ALTER TABLE `libros_editoriales`
  ADD KEY `fk_librosEditoriales_libros` (`idLibro`),
  ADD KEY `fk_librosEditoriales_editoriales` (`idEditorial`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `fk_prestamos_visitantes` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  MODIFY `idBibliotecario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  MODIFY `idComentarioValoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
