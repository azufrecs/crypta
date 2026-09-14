# Crypta

**Generación de Matrices y Encriptación de Contraseñas**

Aplicación web en PHP que permite generar matrices de números aleatorios y exportarlas directamente a un archivo Excel (`.xlsx`) mediante **PhpSpreadsheet**, además de encriptar contraseñas en tiempo real usando `HMAC-SHA256`.

Toda la aplicación (frontend, librerías y dependencias) está diseñada para funcionar **100 % offline**: no consume CDNs, no requiere conexión a Internet y las dependencias de Composer están incluidas en el repositorio.

![PHP](https://img.shields.io/badge/PHP-%3E%3D7.2-black)
![PhpSpreadsheet](https://img.shields.io/badge/PhpSpreadsheet-1.18.0-green)
![Offline](https://img.shields.io/badge/Offline-ready-brightgreen)

---

## ✨ Funcionalidades

- **Generar Matriz**: crea una matriz de 10×10 con números aleatorios (100–999) y la exporta a un archivo Excel `.xlsx` desde una plantilla predefinida (`template/matriz.xlsx`).
- **Encriptar Contraseña**: encripta una contraseña en tiempo real (mientras se escribe) mediante `hash_hmac('sha256', $password, $CLAVE_SECRETA)` y permite copiarla al portapapeles.
- **Trabajo totalmente offline**: CSS, JS, iconos y fuentes están en `assets/` (sin CDN) y las dependencias de Composer en `php-office/` (versionadas en el repositorio).

---

## 📋 Requisitos previos

Para ejecutar Crypta necesitas un servidor web con PHP. La forma más sencilla en Windows es **XAMPP**, pero cualquier entorno con las herramientas indicadas a continuación sirve.

### Servidor

- **Apache** u otro servidor web compatible con PHP.
- **PHP >= 7.2** (recomendado: PHP 8.x).

### Extensiones PHP (todas obligatorias)

PhpSpreadsheet 1.18.0 usa `ZipArchive`, `gd` y otras extensiones. **Debes asegurarte de que estén habilitadas** antes de ejecutar la aplicación:

| Extensión | Función |
|-----------|---------|
| `ctype` | Validación de tipos de caracteres |
| `dom` | Trabajo con documentos XML/HTML |
| `fileinfo` | MIME types de archivos |
| `gd` | Procesamiento de imágenes |
| `iconv` | Conversión de codificación de caracteres |
| `libxml` | Soporte XML |
| `mbstring` | Cadenas multibyte |
| `simplexml` | Lectura/escritura XML simple |
| `xml` | Analizador XML |
| `xmlreader` | Lectura XML |
| `xmlwriter` | Escritura XML |
| `zip` | Lectura/escritura de archivos `.xlsx` (formato ZIP). **Indispensable** |
| `zlib` | Compresión/descompresión |

> El error `Fatal error: Class "ZipArchive" not found` ocurre cuando la extensión `zip` no está habilitada.

### Verificar instalación

Ejecuta en tu servidor un script `phpinfo()` (o consulta `http://localhost/dashboard/phpinfo.php` en XAMPP) y comprueba que aparecen las extensiones `zip`, `gd`, `dom`, `mbstring`, `simplexml`, `fileinfo`, `iconv`, `xmlreader`, `xmlwriter` y `zlib`.

También puedes comprobar desde línea de comandos:

```bash
php -m
```

### Herramientas opcionales

- **Composer**: no es necesario para desplegar/ejecutar (el `vendor` ya viene en `php-office/`). Solo se usa si quieres regenerar o actualizar las dependencias.
- **MySQL**: el núcleo de Crypta no usa base de datos. En `assets/mysql/parte.sql` hay un respaldo opcional si lo necesitas.

---

## 🛠️ Instalación y preparación del entorno

### Paso 1 — Instalar XAMPP (si aún no lo tienes)

Descarga e instala la última versión de [XAMPP](https://www.apachefriends.org/). El instalador incluye Apache, PHP y las extensiones necesarias (puede que `zip` y `gd` vengan deshabilitadas por defecto; se activan en el Paso 2).

### Paso 2 — Habilitar las extensiones `zip` y `gd`

El lector/escritor de archivos `.xlsx` de PhpSpreadsheet requiere ambas (el archivo Excel es un contenedor ZIP).

1. Edita el archivo de configuración de PHP de XAMPP:
   ```
   C:\xampp\php\php.ini
   ```
2. Busca las líneas correspondientes y **descomenta** (quita el `;`):
   ```ini
   extension=zip
   extension=gd
   ```
3. Guarda el archivo.

### Paso 3 — Reiniciar Apache

Desde el Panel de Control de XAMPP: **Stop** → **Start** en el módulo Apache.

> Opcionalmente verifica con `php -m` que `zip` y `gd` ya aparecen en la lista.

### Paso 4 — Copiar el proyecto

Coloca la carpeta del proyecto en el directorio web:

```
C:\xampp\htdocs\crypta
```

No se requiere ningún paso adicional (ni `composer install`, ni descargas). Está listo para funcionar offline.

---

## 🚀 Uso

1. Inicia **Apache** desde el Panel de Control de XAMPP.
2. Abre en el navegador: `http://localhost/crypta`
3. En la pantalla principal tienes dos opciones:
   - **Generar Matriz** → llama a `exportar.php`, genera la matriz y descarga automáticamente el archivo `MATRIZ-<id>` (`.xlsx`).
   - **Encriptar Contraseña** → abre un modal donde la contraseña se encripta en tiempo real.

Los archivos generados se guardan de forma temporal en `exports/` (el directorio se limpia en cada generación).

---

## 🗂️ Estructura del proyecto

```
crypta/
├── index.php          → Página principal (interfaz + modal de encriptación)
├── encriptar.php      → Lógica de encriptación HMAC-SHA256 (AJAX)
├── exportar.php       → Generación de la matriz y exportación a Excel
├── php-office/        → PhpSpreadsheet y dependencias de Composer (vendor)
├── template/
│   └── matriz.xlsx    → Plantilla base del Excel de matrices
├── exports/           → Archivos Excel generados (temporales)
└── assets/
    ├── css/           → Bootstrap, ForkAwesome, Line Awesome, estilos propios
    ├── js/            → jQuery, Bootstrap, utilidades (offline)
    ├── fonts/         → Tipografías/iconos de Line Awesome
    ├── img/           → Imágenes y favicon
    ├── sound/         → Audios
    └── mysql/         → Respaldo opcional de base de datos (parte.sql)
```

---

## 🧩 Tecnologías

| Componente | Tecnología |
|-------------|------------|
| Backend | PHP 8.2 (compatible PHP >= 7.2) |
| Exportación Excel | PhpSpreadsheet 1.18.0 |
| Frontend | Bootstrap, jQuery 3.6.0, ForkAwesome, Line Awesome |
| Encriptación | HMAC-SHA256 (`hash_hmac`) |
| Servidor | Apache (XAMPP) |

---

## 🔧 Solución de problemas

| Síntoma | Causa | Solución |
|---------|-------|----------|
| `Fatal error: Class "ZipArchive" not found` | Extensión `zip` deshabilitada | Descomenta `extension=zip` en `php.ini` y reinicia Apache |
| Errores al leer/escribir Excel | Extensión `gd` deshabilitada | Descomenta `extension=gd` en `php.ini` y reinicia Apache |
| Mensaje de archivo no disponible | Falta la plantilla o no hay permisos de escritura | Verifica `template/matriz.xlsx` y que `exports/` exista y sea escribible |

---

## 📄 Licencia

Proyecto de **AZUfre, Computer Solutions** ([acs.nat.cu](https://www.acs.nat.cu)).