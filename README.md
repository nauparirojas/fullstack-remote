# Laboratorio 09: Sistema de Registro de Contacto Fullstack (PHP & JSP)

**Asignatura:** Desarrollo de Aplicaciones Web (IS093A)  
**Institución:** Universidad Nacional del Centro del Perú - Facultad de Ingeniería de Sistemas  
**Estudiante:** Naupari Rojas Jhosep Amed  
**Repositorio:** `fullstack-remote`  

---

## 1. Diagrama de Flujo del Ciclo HTTP (Request / Response)

El siguiente flujo describe de manera detallada el ciclo completo de procesamiento HTTP desde el cliente hasta la respuesta y renderizado final en el navegador:

```text
[ CLIENTE: Navegador Web ]
       │
       │  1. Resolución DNS
       ▼
[ Servidor DNS ] ─────────────────▶ Devuelve IP (ej. 127.0.0.1)
       │
       │  2. Handshake TCP/IP (Establece conexión en puerto 80 para Apache o 8080 para Tomcat)
       ▼
[ HTTP Request (POST /procesar.php o /procesar.jsp) ]
       │  • Headers: Content-Type: application/x-www-form-urlencoded
       │  • Cookies: PHPSESSID (PHP) / JSESSIONID (JSP)
       │  • Body: nombre=Daniel&correo=daniel@example.com
       ▼
[ SERVIDOR WEB / CONTENEDOR (Apache HTTP Server / Apache Tomcat) ]
       │
       │  3. Verificación de Métodos HTTP y Manejo de Rutas
       ▼
[ ENGINE BACKEND (PHP Engine / Servlet Container JVM) ]
       │  • Validar Método POST (Si es GET ──▶ Retorna HTTP 405 Method Not Allowed)
       │  • Sanitización e Inmunización XSS (htmlspecialchars / Reemplazo de caracteres HTML)
       │  • Validación de datos de entrada (Si son nulos ──▶ Retorna HTTP 400 Bad Request)
       │  • Persistencia temporal: Almacenar objeto en $_SESSION (PHP) / HttpSession (JSP)
       ▼
[ HTTP Response (200 OK) ]
       │  • Headers: Content-Type: text/html; charset=UTF-8
       │  • Body: Estructura HTML procesada con la tabla acumulativa de registros
       ▼
[ RENDERIZADO EN CLIENTE ] ──────▶ El navegador procesa el HTML y muestra la tabla al usuario
