<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lab 09 - Registro JSP</title>
    </head>
    <body>
        <h2>Formulario de Contacto (JSP)</h2>
        <form action="procesar.jsp" method="POST">
            <label>Nombre: <input type="text" name="nombre" required></label><br><br>
            <label>Correo: <input type="email" name="correo" required></label><br><br>
            <button type="submit">Enviar Registro (JSP)</button>
        </form>
    </body>
</html>