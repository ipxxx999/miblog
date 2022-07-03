-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-07-2022 a las 13:39:44
-- Versión del servidor: 10.3.28-MariaDB
-- Versión de PHP: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `C_ID` int(11) NOT NULL,
  `content` varchar(400) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `author` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  `Post_ID` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`C_ID`, `content`, `author`, `date`, `Post_ID`) VALUES
(20, '\0Esto me gusto mucho', 'guest@gmail.com', '2018-09-27 23:33:54', '28'),
(21, '\0Interesante tu articulo', 'guest@gmail.com', '2018-09-27 23:35:37', '29'),
(25, 'Nos paso igual', 'guest@gmail.com', '2018-09-28 22:32:48', '28'),
(26, '\0Exelente articulo', 'guest@gmail.com', '2018-09-30 13:28:59', '26'),
(27, 'superbueno', 'guest@gmail.com', '2022-03-23 16:59:06', '26'),
(28, 'esta exhibiciÃ³n me gusto mucho', 'guest@gmail.com', '2022-03-25 00:41:38', '28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `Post_ID` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `featured` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `category` varchar(30) NOT NULL,
  `author` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `visitors` int(5) NOT NULL,
  `scheduledate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`Post_ID`, `title`, `description`, `featured`, `category`, `author`, `date`, `status`, `visitors`, `scheduledate`) VALUES
(24, 'Â¿QuÃ© hacer con Deadbolt?', '</p>\r\n<span style=\"color:#F01616;text-align:center;\"> Compruebe su dispositivo TNAS </span></p>\r\n<span style=\"color:#663300;text-align:center;\"> Compruebe si su dispositivo TNAS estÃ¡ bajo ataque inmediatamente. </p><br>Si su dispositivo no ha sido atacado, consulte las <a href=\"https://forum.terra-master.com/en/viewtopic.php?f=6&t=2877\" target=\"_blank\" style=\"text-decoration: none; color: #0066ff;\">pautas</a> para mejorar su seguridad TNAS;<br> Si lamentablemente su dispositivo ha sido atacado, consulte las siguientes contramedidas. </span></p>\r\n\r\n\r\n <span style=\"color:#F01616;text-align:center;\"> Â¿QuÃ© hacer con Deadbolt? </span></p>\r\n <span style=\"color:#F01616;text-align:center;\"> Â¿QuÃ© hacer si su TNAS ha sido atacado por el ransomware Deadbolt?. </span><span style=\"color:#663300;text-align:center;\"> <br><br>1-Apague el dispositivo TNAS; x.86 modelos: presione brevemente el botÃ³n de encendido; Modelos ARM: mantenga presionado el botÃ³n de encendido durante 3 segundos; \r\n\r\n\r\n<br><br> 2- Se recomienda volver a instalar el sistema TOS mÃ¡s reciente (4.2.30 o una versiÃ³n posterior) para evitar que se cifren archivos sin cifrar; <br><br> \r\n\r\n3- Si sus archivos han sido encriptados, reinstalar el sistema TOS no lo ayudarÃ¡ a recuperar los archivos encriptados, pero solo le permitirÃ¡ reutilizar el dispositivo con mÃ¡s confianza;\r\n<br><br>\r\n\r\n4- DespuÃ©s de reinstalar el sistema TOS, es posible que no se ingrese la clave Deadbolt para descifrar. Si necesita realizar otras operaciones de rescate, considere detenidamente si desea reinstalar el sistema TOS.<br><br> \r\n\r\n5- <a href=\"https://forum.terra-master.com/en/viewtopic.php?f=76&t=423\" target=\"_blank\" style=\"text-decoration: none; color: #0066ff;\"> Â¿CÃ³mo reinstalar el sistema TOS? </a> <br><br> \r\n6- por favor refiÃ©rase a las <a href=\"https://forum.terra-master.com/en/viewtopic.php?f=6&t=2877\" target=\"_blank\" style=\"text-decoration: none; color: #0066ff;\">pautas</a> para mejorar su seguridad TNAS. \r\n</span></p>\r\n', 'terramaster.jpg', 'Technology', 'guest@gmail.com', '2018-09-27 01:25:26', 'publish', 113, '0000-00-00'),
(25, 'Ataques a SynologyÂ® ataques de fuerza bruta y Botnet', '</p>\r\n<span style=\"color:#F01616;text-align:center;\"> SynologyÂ® investiga los ataques de fuerza bruta en curso de Botnet</span></p>\r\n\r\n<span style=\"color:#F01616;text-align:center;\">Taipei, TaiwÃ¡n, 4 de agosto de 2021: Synology PSIRT </span><span style=\"color:#663300;text-align:center;\"> (Equipo de respuesta a incidentes de seguridad de productos) ha visto y recibido recientemente informes sobre un aumento en los ataques de fuerza bruta contra dispositivos de Synology. Los investigadores de seguridad de Synology creen que la botnet estÃ¡ impulsada principalmente por una familia de malware llamada \"StealthWorker\". En la actualidad, Synology PSIRT no ha visto indicios de que el malware aproveche las vulnerabilidades del software.\r\n\r\n</p>Estos ataques aprovechan una serie de dispositivos ya infectados para intentar adivinar las credenciales administrativas comunes y, si tienen Ã©xito, accederÃ¡n al sistema para instalar su carga Ãºtil maliciosa, que puede incluir ransomware. Los dispositivos infectados pueden realizar ataques adicionales en otros dispositivos basados ??en Linux, incluido Synology NAS.\r\n\r\n</p>Synology PSIRT estÃ¡ trabajando con organizaciones CERT relevantes para obtener mÃ¡s informaciÃ³n y cerrar los servidores C&C (comando y control) conocidos detrÃ¡s del malware. Synology estÃ¡ notificando simultÃ¡neamente a los clientes potencialmente afectados.\r\n\r\n</p>Synology recomienda encarecidamente a todos los administradores de sistemas que examinen sus sistemas en busca de credenciales administrativas dÃ©biles, para habilitar el bloqueo automÃ¡tico y la protecciÃ³n de cuentas, y configurar la autenticaciÃ³n de varios pasos cuando corresponda.\r\n\r\n</p>Los administradores del sistema que hayan encontrado actividad sospechosa en sus dispositivos deben comunicarse con el soporte tÃ©cnico de Synology de inmediato.</span></p>\r\n', 'synology.png', 'Sports', 'guest@gmail.com', '2018-09-27 12:19:27', 'publish', 107, '0000-00-00'),
(26, 'Ransomware vuelve a apuntar a los dispositivos NAS de QNAP en todo el mundo', '<span style=\"color:#F01616;text-align:center;\">Los actores de amenazas detrÃ¡s del ransomware </span></p> \r\n\r\nQlocker estÃ¡n apuntando una vez mÃ¡s a los dispositivos QNAP Network Attached Storage (NAS) expuestos a Internet en todo el mundo.\r\n\r\n<span style=\"color:#F01616;text-align:center;\">Qlocker se ha dirigido previamente a los clientes de QNAP </span><span style=\"color:#663300;text-align:center;\"> en una campaÃ±a masiva de ransomware que comenzÃ³ durante la semana del 19 de abril, moviendo los archivos de las vÃ­ctimas dentro de archivos 7-zip protegidos con contraseÃ±a con la extensiÃ³n .7z despuÃ©s de violar sus dispositivos NAS.\r\n\r\n</p>QNAP advirtiÃ³ que los atacantes estaban explotando la vulnerabilidad de credenciales codificadas de forma rÃ­gida CVE-2021-28799 en la aplicaciÃ³n HBS 3 Hybrid Backup Sync para piratear los dispositivos de los usuarios y bloquear sus archivos.\r\n\r\n</p>Sin embargo, para algunos clientes de QNAP objetivo de la campaÃ±a de ransomware Qlocker del aÃ±o pasado, la advertencia llegÃ³ demasiado tarde despuÃ©s de que los atacantes extorsionaran a cientos de usuarios de QNAP.\r\n\r\n</p>En total, los usuarios afectados de QNAP perdieron aproximadamente $350 000 en un solo mes despuÃ©s de pagar un rescate de 0,01 bitcoins (con un valor aproximado de $500 en ese momento) para obtener la contraseÃ±a necesaria para recuperar sus datos.\r\n\r\n</p>Qlocker regresa en nueva campaÃ±a 2022 La nueva campaÃ±a de ransomware Qlocker comenzÃ³ el 6 de enero y arroja notas de rescate llamadas !!!READ_ME.txt en dispositivos comprometidos.\r\n</span></p>\r\n', 'qnap-logo-black.svg', 'Health', 'guest@gmail.com', '2018-09-27 12:39:09', 'publish', 93, '0000-00-00'),
(27, 'Â¿CÃ³mo protegerse del Ransomware Deadbolt?', '</p> </b>\r\n<span style=\"color:#F01616;text-align:center;\">El PROBLEMA CON LA MAYORÃA DE LOS DISPOSITIVOS NAS HOY</span></p> \r\n\r\nLa mayorÃ­a de los dispositivos NAS estÃ¡n equipados con algÃºn tipo de software de \"acceso remoto\" como una forma de proporcionar a los usuarios externos una forma de acceder a los datos del NAS. En la mayorÃ­a de los casos, la mayorÃ­a de estas formas han sido explotadas por piratas informÃ¡ticos que intentan sin descanso obtener acceso a sus datos. Los siguientes son solo algunos de los NAS populares y el software que proporcionan para brindarle acceso remoto al NAS.\r\n \r\n</p> \r\nAsustor - EZ Connect (comprometido en febrero de 2022) WD MyBookLive NAS: acceso remoto (comprometido en junio de 2021)\r\n \r\n</p> \r\nQNAP: enlace myQNAPcloud (comprometido (enero de 2022)) Synology NAS - QuickConnect de acceso externo (comprometido en julio de 2019)\r\n \r\n</p> \r\nLos piratas informÃ¡ticos buscan continuamente formas de acceder a estos populares dispositivos NAS. Por lo tanto, no recomendamos utilizar ninguna de estas herramientas y \"servicios\" de \"Acceso remoto\" que se ofrecen hoy. Le recomendamos que bloquee todos los \"reenvÃ­os de puertos\" y \"accesos de cortafuegos\" a sus dispositivos NAS. La forma correcta de conectarse a su NAS de forma remota es usar una VPN.\r\n </p> \r\n\r\nCÃ“MO PROTEGER SU NAS\r\n</p> \r\n\r\nUna forma de asegurar su NAS es eliminar todos los puertos abiertos en su firewall a su NAS. Solo se debe poder acceder a su NAS desde el interior de su red. Si su NAS tiene un firewall, asegÃºrese de que estÃ© encendido y que su red interna sea segura. Estos son algunos consejos adicionales que debe consultar para ayudar a proteger su NAS.\r\n</p> \r\n\r\n1- Bloquee todos los puertos desde el Firewall hasta el NAS y solo permita conexiones desde dentro de la red. (Deshabilitar el reenvÃ­o de puertos)\r\n</p> \r\n\r\n2- Cambie el nombre de usuario y la contraseÃ±a de administrador predeterminados.\r\n</p> \r\n\r\n3- Habilitar SSL. (Deshabilitar conexiones no SSL)\r\n</p> \r\n\r\n4- Habilite la autenticaciÃ³n de dos factores. (Especialmente para acceso de administrador)\r\n</p> \r\n\r\n5- Habilite el Firewall en su NAS. (Si tiene uno)\r\n</p> \r\n\r\n6- Desactive todos los servicios que no usa. (esto incluye aplicaciones)\r\n</p> \r\n\r\n7- Cambie los puertos de inicio de sesiÃ³n predeterminados.\r\n</p> \r\n\r\n8- Mantenga el software NAS actualizado regularmente.\r\n</p> \r\n\r\n9- AsegÃºrese de que su red local sea segura.\r\n</p> \r\n\r\n10- Practique copias de seguridad 3-2-1 (3 copias de sus datos, 2 copias en la red local, 1 copia fuera del sitio)\r\n</p> \r\n', 'ransomware.jpg', 'Entertainment', 'guest@gmail.com', '2018-09-27 12:42:48', 'publish', 184, '0000-00-00'),
(28, 'Â¿ESTÃ MI ALMACENAMIENTO EN LA NUBE A SALVO DEL RANSOMWARE?', '</p>\r\n<span style=\"color:#F01616;text-align:center;\">El equipo de investigaciÃ³n de seguridad de Comparitech </span></p> descubriÃ³ que mÃ¡s de 80 000 dispositivos de almacenamiento conectado a la red (NAS) de Western Digital estÃ¡n conectados a la Internet pÃºblica y podrÃ­an ser vulnerables. Las vulnerabilidades permitirÃ­an a los atacantes realizar varios ataques de ejecuciÃ³n remota de cÃ³digo. Estos ataques podrÃ­an comprometer los datos y archivos almacenados en el dispositivo, o permitir que un atacante coloque malware en el dispositivo, incluidos ransomware, cryptominers y botnets.\r\n\r\n</p>Los propietarios de dispositivos NAS de Western Digital deben actualizar su firmware lo antes posible. Nuestros investigadores informaron sobre las vulnerabilidades a Western Digital a principios de septiembre de 2020 y la empresa publicÃ³ una actualizaciÃ³n que las reparÃ³ el 27 de octubre de 2020. La actualizaciÃ³n no es automÃ¡tica. Los usuarios deben iniciarlo manualmente a travÃ©s de la interfaz de administraciÃ³n del dispositivo.\r\n\r\n</p>CÃ³mo afecta el ransomware a sus datos en la nube Hemos discutido anteriormente cÃ³mo funciona el ransomware, encriptando archivos de datos y manteniÃ©ndolos como rehenes hasta que se pague un rescate. Ese ransomware generalmente ingresa a su red a travÃ©s del correo electrÃ³nico. Algunas formas en que el ransomware puede acceder a su red son a travÃ©s de la descarga de un archivo adjunto de correo electrÃ³nico, un enlace malicioso en el que un usuario hace clic o una unidad extraÃ­ble.\r\n\r\n</p>Entonces, ahora la computadora de su usuario tiene este ransomware y estÃ¡ comenzando a cifrar los archivos en la computadora. A medida que cifra los archivos, la sincronizaciÃ³n en la nube lo ve como un archivo modificado y lo sincroniza con sus datos en la nube. Otras computadoras que estÃ¡n sincronizadas con esos datos en la nube ven los datos modificados y los bajan para sincronizarlos en sus computadoras. De esta manera, el malware se propaga como un reguero de pÃ³lvora y, antes de que te des cuenta, tus datos en la nube estÃ¡n cifrados y no estÃ¡n disponibles para ti. La nube no te ha salvado.</span></p>\r\n', 'mycloud.png', 'Travel', 'guest@gmail.com', '2018-09-27 12:45:53', 'publish', 308, '0000-00-00'),
(30, 'Hackers en la puerta, pero no hay nadie en casa', '</p></br><span style= color:#F01616;text-align:center; > Lo sentimos piratas informÃ¡ticos no hay nadie en casa para responder.</span></p>\r\n\r\n</p> Los sitios son a menudo el objetivo de los piratas informÃ¡ticos que quieren secuestrarlos. A veces sus intenciones son evidentes como cuando desfiguran el sitio.?[1] Otras veces ingresan sin dejar rastro y usan el sitio para actividades nefastas. Cualquiera que sea el caso los administradores de sitios web deben permanecer alerta.\r\n\r\n</p> No quiero ser alarmista pero su sitio no necesita ser grande y famoso como Amazon o Facebook para ser un objetivo. Los piratas informÃ¡ticos son increÃ­blemente rÃ¡pidos para poner sus sucias manos en cualquier sitio que puedan. Por lo general mucho antes de que los motores de bÃºsqueda descubran sitios reciÃ©n lanzados los bots maliciosos (programados por piratas informÃ¡ticos) los descubren y trabajan incesantemente para obtener acceso ilegal.\r\n\r\n</p> Entonces Â¿cÃ³mo frustran los administradores de sitios web los bots de los piratas informÃ¡ticos? La forma mÃ¡s simple y efectiva es tener la menor cantidad posible de software que pueda ser pirateado en primer lugar. AquÃ­ es donde los sitios estÃ¡ticos tienen una ventaja significativa. Este es un sitio estÃ¡tico.?[2] Solo ejecuta el software mÃ­nimo necesario para servir pÃ¡ginas HTML sin formato. Por el contrario un sitio dinÃ¡mico debe ejecutar un software adicional para permitir que los usuarios interactÃºen con las pÃ¡ginas. Dicho software adicional siempre ha sido el objetivo de los bots maliciosos. Por supuesto estos bots no saben realmente quÃ© estÃ¡ ejecutando un sitio o si es estÃ¡tico o dinÃ¡mico. Simplemente conocen una lista de vulnerabilidades en varios software (generalmente utilizados por sitios dinÃ¡micos) y prueban su suerte para explotarlos en cada sitio al que pueden acceder.\r\n\r\n</p> Por lo tanto uno de los aspectos mÃ¡s atractivos de tener un sitio estÃ¡tico es no tener que preocuparse por los hackeos de bajo esfuerzo. No obstante por curiosidad tomÃ© nota de los intentos mÃ¡s frecuentes de estos bots para obtener acceso ilegal a mi sitio. La siguiente es una pequeÃ±a muestra de sus valientes intentos.\r\n\r\n</p><span style= color:#F01616;text-align:center; > Intentos de acceder a un panel de administraciÃ³n</span></p>\r\n\r\n</p> \r\n/solr/admin/info/system?wt=json\r\n/admin//config.php\r\n/phpMyAdmin-2.6.2-rc1/\r\n/phpMyAdmin-2.6.3/\r\n/phpmyadmin/\r\n/wp-login.php\r\n/axis2/axis2-admin/login\r\n\r\n</p> <span style= color:#F01616;text-align:center; >Accesos maliciosos a URL</span></p>\r\n</p> \r\n\\x03\\x00\\x00/*\\xE0\\x00\\x00\\x00\\x00\\x00Cookie: mstshash=Administr\r\n/?XDEBUG_SESSION_START=phpstorm\r\n/?a=fetch&content=<php>die(@md5(HelloThinkCMF))</php>\r\n</p>\r\n/index.php? s=/Index/\\x5Cthink\\x5Capp/invokefunction&function=call_user_func_array&vars[0] =md5&vars[1] \r\n[]=HelloThinkPHP21\r\n/system_api.php\r\n/c/version.js\r\n/owa/auth/logon.aspx?url=https://1/ecp/\r\n//level/15/exec/-/sh/run/CR\r\n\r\n</p> <span style= color:#F01616;text-align:center; >Otros accesos cuestionables</span></p>\r\n</p> \r\n/streaming/clients_live.php\r\n/api/jsonws/invoke\r\n/vendor/phpunit/phpunit/src/Util/PHP/eval-stdin.php\r\n\r\n\r\n</p> No tengo que molestarme en proteger un panel de administraciÃ³n. No tengo que preocuparme por las vulnerabilidades que se han descubierto hoy en PHP o WordPress.?[3] No pierdo el sueÃ±o por los ataques de inyecciÃ³n SQL reciÃ©n descubiertos.?[4] Puedo estar seguro de que mis cookies no son siendo mal usado porque no hay cookies.?[5] Todo esto porque mi sitio es estÃ¡tico.\r\n\r\n</p>Sin embargo no todo son rosas y sol. Los sitios estÃ¡ticos tienen sus limitaciones y no todos los sitios pueden volverse estÃ¡ticos. Pero a menos que necesite funciones que requieran un sitio dinÃ¡mico le recomiendo probar primero el enfoque estÃ¡tico. Anula por completo toda una clase de ataques.\r\n\r\n</p> Contrapeso\r\n\r\n</p> A pesar de que WordPress ha sido el objetivo de los piratas informÃ¡ticos durante la Ãºltima dÃ©cada las posibilidades de que su sitio de WordPress sea pirateado hoy en dÃ­a son minÃºsculas. WordPress impulsa millones de sitios y se ha vuelto sustancialmente resistente a la piraterÃ­a. La mayorÃ­a de las veces las vulnerabilidades no estÃ¡n realmente en WordPress sino en algÃºn software que utiliza. Desafortunadamente los sensacionalistas del periodismo tecnolÃ³gico han hecho mella en la reputaciÃ³n de WordPress. Mientras mantenga sus complementos al mÃ­nimo e instale actualizaciones regularmente deberÃ­a estar bien.\r\n\r\n</p> De todos modos vale la pena considerar seriamente la tranquilidad que proviene de tener un sitio estÃ¡tico y su facilidad de mantenimiento.\r\n</span></p>\r\n', 'hackers-at-the-door.jpg', 'Entertainment', 'guest@gmail.com', '2022-03-24 20:11:33', 'publish', 67, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`UID`, `Name`, `Email`, `Password`, `Created`) VALUES
(1, 'Admin Javier', 'guest@gmail.com', '97792ce269f4b93e51c9dfb7a6fc3657', '2018-09-23'),
(2, 'lazaro', 'guest@gmail.com', '97792ce269f4b93e51c9dfb7a6fc3657', '2018-09-24'),
(3, 'armando', 'guest@gmail.com', '97792ce269f4b93e51c9dfb7a6fc3657', '2018-09-27'),
(4, 'guest', 'guest@gmail.com', '97792ce269f4b93e51c9dfb7a6fc3657', '2022-03-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
