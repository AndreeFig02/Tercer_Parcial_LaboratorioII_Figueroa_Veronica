# Tercer Parcial - Laboratorio de Programación II

**Estudiante:** Verónica Andrea Figueroa  
**Carrera:** Tecnicatura Superior en Desarrollo de Software (ISFD Alvear)  
**Materia:** Laboratorio de Programación II  
**Año:** 2026  

---

## Descripción del Proyecto
Este repositorio contiene la entrega completa del sitio solicitado **base_evaluaciones_avanzado**, correspondiente a la Unidad 3 (PHP y MySQL Avanzado). Integra las 8 partes desarrolladas durante la cursada con sus respectivas funcionalidades, la integración con base de datos, programación orientada a objetos (POO), manejo de imágenes, archivos de texto, validación de CAPTCHA y seguridad.

---

## Contenido del Proyecto (8 Partes)

1. **Unidad 1 - Base de datos y ABM de clases:** Alta de clases en MySQL e inclusión del listado dinámico (`unidad1.php`, `insertar_clases.php`, `ver_clases.php`).
2. **Unidad 2 - Cálculo de fechas:** Procesamiento y cálculo de diferencia de días (`unidad2.php`, `calculo_fecha.php`).
3. **Unidad 3 - Comentarios con archivos de texto:** Acumulación de comentarios persistentes con fecha y hora (`unidad3.php`, `comentarios.php`, `comentarios.txt`).
4. **Unidad 4 - Manejo de imágenes:** Procesamiento mediante librería GD para aplicar marca de agua y generar miniatura de 150x150 px (`unidad4.php`, `marca.png`, `unidad4.png`).
5. **Unidad 5 - Formulario con CAPTCHA propio:** Generación y validación de código CAPTCHA en sesión (`unidad5.php`, `cargar.php`).
6. **Unidad 6 - POO con Encapsulamiento:** Clase `Usuario` con visibilidad privada en sus propiedades y cálculo de edad encapsulado (`unidad6.php`, `usuarios.php`, `caract_usuarios.php`).
7. **Unidad 7 - POO Administrador de Productos:** Clase `Producto` para alta, listado y eliminación desde la base de datos (`unidad7.php`, `clases/Producto.php`).
8. **Unidad 8 - POO Registro e Ingreso de Usuarios:** Formularios de registro e inicio de sesión con encriptación de contraseñas mediante `password_hash()` y sentencias preparadas (`unidad8.php`, `usuario.php`, `cargarusuario.php`, `verificarusuario.php`).

---

## Requisitos de Software
- Servidor web local (XAMPP).
- PHP 8.0 o superior con la extensión `GD` habilitada.
- MySQL.

---

## Pasos para la Instalación y Prueba en Entorno Limpio

1. **Copiar el repositorio:**
   Copiar la carpeta `base_evaluaciones_avanzado` en el directorio de publicaciones de tu servidor local (ejemplo: `C:\xampp\htdocs\base_evaluaciones_avanzado`).

2. **Importar la Base de Datos:**
   - Abrir **phpMyAdmin** (`http://localhost/phpmyadmin`).
   - Crear una base de datos llamada `phpavanzado`.
   - Importar el archivo SQL ubicado en la ruta `db/phpavanzado.sql`.

3. **Verificación de la Conexión:**
   - La conexión centralizada se encuentra configurada en el archivo `conexion.php`.

4. **Ejecución en el navegador:**
   - Ingresar a: `http://localhost/base_evaluaciones_avanzado/index.php`.