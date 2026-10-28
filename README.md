<div align="center">

# Hotel Miranda · PHP

**Diez ejercicios progresivos en PHP puro: de un array en memoria a una clase con MySQL y plantillas BladeOne.**

Proyecto del bootcamp Full Stack de OXYGEN Academy · Sprint 10 (PHP)

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![BladeOne](https://img.shields.io/badge/BladeOne-F05340?style=flat-square&logo=laravel&logoColor=white)
![JSON](https://img.shields.io/badge/JSON-000000?style=flat-square&logo=json&logoColor=white)

</div>

---

## Qué es

Primer contacto con el backend en el proyecto *Hotel Miranda*. Sin frameworks: cada archivo `indexN.php` es un ejercicio que añade una pieza nueva para mostrar, buscar y crear **habitaciones** del hotel. Se empieza leyendo datos de un array y de un JSON, se pasa a **MySQL** con `mysqli` y consultas preparadas, y se termina con una clase `Room` y vistas renderizadas con **BladeOne** (el motor de plantillas Blade sin Laravel).

## Los ejercicios

| Archivo | Qué hace | Concepto clave |
| --- | --- | --- |
| `index1.php` | Define tres habitaciones en un array asociativo y las imprime con `print_r`. | Arrays asociativos |
| `index2.php` | Lee `roomsData.json` y vuelca su contenido. | `file_get_contents` + `json_decode` |
| `index3.php` | Lista las habitaciones del JSON en HTML (nombre, número, precio y oferta). | Mezclar PHP y HTML con `foreach` |
| `index4.php` | Busca una habitación del JSON por el `id` recibido en la URL. | Parámetros `$_GET` |
| `index5.php` | Lista las habitaciones desde la tabla `habitaciones` de MySQL. | Conexión con `mysqli` |
| `index6.php` | Muestra una habitación de la base de datos por `id`. | Consultas preparadas (`bind_param`) |
| `index7.php` | Buscador por nombre con un formulario y `LIKE`. | Formularios GET + búsqueda |
| `index8.php` | Formulario que crea una habitación y la muestra (sin guardarla). | Formularios POST |
| `index9.php` | Igual que el anterior, pero la inserta en MySQL. | `INSERT` con consulta preparada |
| `index10.php` | Usa la clase `Room` para cargar habitaciones de MySQL y del JSON y las pinta con la misma plantilla Blade. | POO + plantillas BladeOne |

## Piezas de apoyo

- **`Room.php`**: clase con las propiedades `name`, `number`, `price` y `offerPrice`, y dos métodos estáticos: `getAllFromDB()` y `getAllFromJSON()`, que devuelven arrays de objetos `Room`.
- **`setup.php`**: inicializa BladeOne con la carpeta `views/` y la caché en `cache/`.
- **`views/rooms.blade.php`**: plantilla que recorre las habitaciones con `@foreach` y las muestra con `{{ }}`.
- **`roomsData.json`**: datos de ejemplo de habitaciones, compartidos con el resto de sprints del proyecto.
- **`BladeOne.php`**: la librería [BladeOne](https://github.com/EFTEC/BladeOne) incluida en un solo archivo.

## Stack

- PHP 8 sin framework
- MySQL con la extensión `mysqli`
- BladeOne para las plantillas
- JSON como fuente de datos alternativa

## Estructura

```
.
├── index1.php ... index10.php   Ejercicios
├── Room.php                     Clase Room (JSON y MySQL)
├── setup.php                    Configuración de BladeOne
├── BladeOne.php                 Librería de plantillas
├── views/rooms.blade.php        Plantilla del listado
├── cache/                       Plantillas compiladas
└── roomsData.json               Datos de ejemplo
```

## Puesta en marcha

Requisitos: PHP 8 con la extensión `mysqli` y un servidor MySQL local (los ejercicios 1 a 4 y 8 funcionan sin base de datos).

```bash
git clone https://github.com/albertocalerocastillo/OXYGEN_PHP.git
cd OXYGEN_PHP
php -S localhost:8000
```

Abre `http://localhost:8000/index1.php` y avanza hasta `index10.php`.

Para los ejercicios con MySQL, crea la base de datos `habitaciones` con una tabla del mismo nombre que tenga, al menos, las columnas `id`, `name`, `number`, `price` y `offerPrice`. Los datos de conexión (servidor, usuario, contraseña y base de datos) están definidos al principio de cada archivo y en `Room.php`; ajústalos a tu entorno local.

Ejemplos de URL con parámetros:

- `index4.php?id=%230001234` (los `id` del JSON empiezan por `#`, que en la URL se escribe `%23`)
- `index6.php?id=1`
- `index7.php?search=Deluxe`

## Qué aprendí

- Cómo PHP genera HTML en el servidor y cómo leer datos de la petición con `$_GET` y `$_POST`.
- Leer y decodificar JSON, y conectar con MySQL usando **consultas preparadas** para evitar inyección SQL.
- Organizar el código con una clase y métodos estáticos que abstraen de dónde vienen los datos.
- Separar la lógica de la presentación con plantillas **Blade**, la base de lo que después usé en Laravel.

---

<div align="center">

Hecho por **Alberto Calero** · [github.com/albertocalerocastillo](https://github.com/albertocalerocastillo)

</div>
