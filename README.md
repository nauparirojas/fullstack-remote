# Laboratorio 09: Sistema de Registro de Contacto (PHP vs JSP)

## 1. Integrantes del Equipo
* **Estudiante 1:** Naupari Rojas Jhosep Amed

---

## 2. Diagrama de Flujo del Ciclo HTTP (Request / Response)

```text
[ Cliente (Navegador) ]
        │
        │  1. Resolución DNS (Domain Name Resolution)
        ▼
[ Servidor DNS ]  ──▶ Devuelve Dirección IP (ej. 127.0.0.1)
        │
        │  2. Handshake TCP/IP (Establecimiento de conexión en puerto 80 / 8080)
        ▼
[ HTTP Request (POST /procesar.php o /procesar.jsp) ]
        │  • Headers: Content-Type, Cookie (PHPSESSID / JSESSIONID)
        │  • Body: nombre=Daniel&correo=daniel@example.com
        ▼
[ Servidor Web / Application Container (Apache HTTP / Apache Tomcat) ]
        │
        │  3. Evaluación de Rutas y Ejecución del Engine Backend
        ▼
[ Engine Backend (PHP / Servlet Container JSP) ]
        │  • Validar Método POST (405 Method Not Allowed si es GET)
        │  • Sanitizar entradas (Prevención XSS)
        │  • Almacenar en sesión (array acumulativo en $_SESSION / HttpSession)
        ▼
[ HTTP Response (200 OK / 400 Bad Request) ]
        │  • Content-Type: text/html; charset=UTF-8
        │  • Body: Documento HTML generado con la tabla acumulativa
        ▼
[ Renderizado en Cliente (DOM Parsing, Layout & Paint) ]
