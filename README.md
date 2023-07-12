# Ejemplo de formulario con validaciones hecha con PHP, Ajax y JQuery

## Requisitos del sistema:
Base de datos utilizada: MySQL 8.0.33

Versión de PHP: 8.1.2

![image](https://github.com/JaimeGDH/desis/assets/13523127/54205a53-960b-465e-a985-b5f23976db1d)

## Instrucciones
Ejecuta el script SQL DB/Dump20230630.sql en tu base de datos.

Nombre de la base de datos: desis.
En el archivo conexion.php especificar el usuario y password de la cuenta en uso con MySQL.

Asegúrate de que tu servidor web local esté en funcionamiento.

Abre un navegador web y visita http://localhost (o http://localhost:8080 si has configurado un puerto diferente) para acceder al proyecto PHP.

## Validaciones contenidas

• Nombre y Apellido: No debe quedar en Blanco.

• Alias: Validar que la cantidad de caracteres sea mayor a 5 y que contenga letras y
números.

• RUT: Deberá Validar el RUT (Formato Chile).

• Email: Deberá validar el correo según estándar.

• Los Combo Box Región y Comuna deben cargar los datos desde Base de Datos.

• No deberán quedar en blanco y entre los combos debe existir relación Región->Comuna.

• El Combo Box Candidato debe cargar los datos desde Base de Datos.

• Checkbox “Como se enteró de Nosotros”: Debe elegir al menos dos opciones.

• Se debe validar la duplicación de votos por RUT.
