# 🚗🚦 Gestión de Movilidad

## 📜 Descripción
El Ayuntamiento de la ciudad ha implementado restricciones de tráfico durante el período navideño para mejorar la movilidad peatonal. Esta aplicación web en **PHP** permite gestionar permisos de circulación y detectar infractores que acceden a la zona restringida sin autorización. 📍

### 🌟 Características
✅ **Solicitud de permisos** para residentes y huéspedes de hoteles.  
✅ **Validación de vehículos autorizados** mediante distintos archivos de datos.  
✅ **Identificación de infractores** a partir de los registros de las cámaras de vigilancia.  
✅ **Restricción de horarios** para vehículos de logística.  
✅ **Registro de usuarios** para acceder a la funcionalidad de detección de infractores.  

## 🛠️ Instalación

1️⃣ **Clona este repositorio** en tu equipo local:
```bash
 git clone https://github.com/tu-usuario/gestionaMovilidad
```

2️⃣ **Configura un servidor local** con soporte para **PHP y MySQL** (XAMPP recomendado).  
3️⃣ **Coloca los archivos** en el directorio `htdocs` de tu servidor local.  
4️⃣ **Asegúrate de tener los archivos de datos** (`vehiculos.txt`, `taxis.txt`, etc.).  
5️⃣ **Accede a la aplicación** desde el navegador:
```
http://localhost/gestion-movilidad/movilidad.php
```

## 📌 Uso

🔹 **Solicitud de Permiso** 🏡🏨  
- Introducir la matrícula del vehículo y la dirección de residencia o el hotel.
- Especificar la fecha de inicio y fin del permiso.
- Confirmar los datos antes de enviarlos.

🔹 **Consulta de Infractores** 🚦  
- Debes estar **registrado** para acceder a esta función.
- Introducir un rango de fechas válido.
- La aplicación identificará los vehículos sin permiso y mostrará la lista de infractores.

## 🤝 Cómo Contribuir
Si quieres mejorar la aplicación:
1. Haz un **fork** del repositorio 🍴
2. Crea una nueva rama 📂:
   ```bash
   git checkout -b nueva-funcionalidad
   ```
3. Realiza los cambios y súbelos 📤:
   ```bash
   git commit -m "Mejora en validación de permisos"
   git push origin nueva-funcionalidad
   ```
4. Abre un **Pull Request** 🔄

## 📜 Licencia
Este proyecto es de código abierto y puede usarse con fines educativos y de desarrollo. 📚

## 📧 Contacto
Si tienes dudas o sugerencias, contáctanos:
📩 **alexmorena2002@gmail.com**  
💼 [LinkedIn](https://linkedin.com](https://www.linkedin.com/in/alejandro-morena-rodriguez/))  

🚀 ¡Gracias por colaborar y mejorar la movilidad en la ciudad! 🎉
