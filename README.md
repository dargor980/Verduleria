# Verduleria Santa Gemita

La Verduleria Santa Gemita es un local de barrio de la comuna de Ñuñoa, Santiago de Chile; la cual funciona con un gran flujo de pedidos y ventas presenciales lo que provoca falencias en los procesos de logística del local, además de situaciones de no pago de los pedidos. 
Nuestro proyecto consta de una aplicación web, la cual abarca las principales problemáticas del cliente mediante las siguientes funcionalidades:
* Generar Pedido.
* Exportar Pedido como pdf.
* Generar estadísticas de ventas.
* Control stock.
* Control de pagos.
* Listado de clientes y proveedores.
* Entre otras.

## Comenzando 🚀

Para obtener el proyecto en tu repositorio local deberás realizar la clonación de éste, para ello tenemos las siguientes dos opciones:

1) Abrir el repositorio y en la opción "clone" de github descargar el proyecto en formato zip.
2) Clonación por medio de comandos git:
```
git clone https://github.com/dargor980/Verduleria.git
```


### Pre-requisitos 📋

Para el entorno de desarrollo del proyecto se requiere de las siguientes herramientas:

* [Laravel 7.28.1](https://laravel.com/docs/8.x) - Framework basado en PHP.
* [Vue Js](https://vuejs.org/v2/guide/) - Framework basado en Javascript.
* [Xampp](https://www.apachefriends.org/es/download.html) - Servidor Local.
* [Npm](https://www.npmjs.com/get-npm) - Manejador de dependencias de Node Js.
* [Composer](https://rometools.github.io/rome/) - Manejador de dependencias de PHP Laravel.

### Instalación 🔧

Pasos a seguir para poder ejecutar en un entorno de desarrollo:

#### Windows
Ubicarse en la carpeta del proyecto y ejecutar el siguiente comando:
```
Composer update
```
_Asegurese que Composer este en el PATH del sistema._

Luego, deberá ejecutar xampp y realizar la creación de una base de datos, mediante PHPMyAdmin.
Una vez creada la Base de Datos dirigase al archivo .envexample ubicada en la carpeta raíz del proyecto y configure la conexión a su base de datos, como en el siguiente ejemplo:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=namedb
DB_USERNAME=username
DB_PASSWORD=password
```
Posteriormente, deberá cambiar la extensión del archivo de ".envexample" a ".env"

Finalmente realizada la conexión con la base de datos, se procede a realizar las migraciones correspondientes a los modelos del proyecto, lo cual se hace mediante el siguiente comando:
```
php artisan migrate
```
Es necesario que realizada las migraciones importen la tabla usuario ubicada en la carpeta DB del repositorio para poder ingresar a la aplicación web.
Credenciales de administrador ubicado en la tabla usuario:
_Usuario: websantagemita@gmail.com
Contraseña: admin2020_

Si desea realizar cambios en las vistas, es necesario ejecutar el siguiente comando de npm:
```
npm run watch
```

## Despliegue 📦
Para el despliegue del proyecto de forma local realizamos los siguientes procedimientos:

### * Iniciar VirtualHost
Nos dirigimos a la ruta ```c: windows/system32/drivers/etc/``` para ubicar el archivo ```hosts```, en el cual agregaremos en la última linea lo siguiente:
_Se recomienda generar una copia y realizar las ediciones en ella, para así evitar conflictos de privilegios de administrador_
```
127.0.0.1 verduleria.santagemita.com
```
_Guardar cambios y sobreescribir el archivo en la misma ruta base_

Luego, nos dirigimos al archivo ```httpd-vhosts``` ubicado en ```c:\xampp\apache\conf\extra\```, donde agregaremos lo siguiente al final del archivo:
```
<VirtualHost *:80>
   DocumentRoot C:/xampp/htdocs/
   ServerName localhost
</VirtualHost>

<VirtualHost *:80>
	ServerName verduleria.santagemita.com
	DocumentRoot C:\xampp\htdocs\xampp\Proyectos\Verduleria\public
	ServerAlias verduleria.santagemita.com
    	<Directory C:\xampp\htdocs\xampp\Proyectos\Verduleria\public>
    	Options Indexes FollowSymLinks
    	AllowOverride All
    	Require all granted
    	Allow from all
    	</Directory>
</VirtualHost>
```
Guardar cambios y dirigirse al navegador web, donde accederemos a ```http://verduleria.santagemita.com``` para verificar si ya está funcionando.
_En caso de no funcionar, verifique que Xampp está activo, tanto Apache como MySql._

### * Inicio automático de Xampp al encender
Para comenzar, es necesario configurar el encendido automático de los servicios de Xampp, para ello lo ejecutaremos como administrador y nos dirigiremos a la configuración del mismo, en la cual seleccionaremos los servicios de MySql y Apache. Además, como método opcional podemos marcar la casilla 'iniciar minimizado', la cual provocará que al iniciar lo haga minimizado.
Nos ubicamos en la carpeta raíz de Xampp, la cual está en ```C:\XAMPP```, donde encontraremos el archivo ```XAMPP-control```, donde procederemos a crear un acceso directo del mismo para llevarlo a carpeta de inicio automático de windows.
Para llegar a esa carpeta, es necesario realizar un comando de teclado ```Windows + R``` que nos permitirá ejecutar lo siguiente ```shell:startup```. Esto nos llevará a la carpeta que buscábamos y pegamos el acceso directo que provocará que Xampp se inicie automaticamente al encender el computador.

## Construido con 🛠️

* [Laravel 7.28.1](https://laravel.com/docs/8.x) - Framework web basado en PHP.
* [Xampp](https://www.apachefriends.org/es/download.html) - Servidor Local.
* [Npm](https://www.npmjs.com/get-npm) - Manejador de dependencias de Node Js.
* [Bootstrap](https://getbootstrap.com/docs/4.5/getting-started/download/) - Framework de CSS.
* [FontAwesome]https://fontawesome.com/) - Libreria de iconos.
* [Vue Js](https://vuejs.org/v2/guide/) - Framework basado en Javascript
* [Dbeaver](https://dbeaver.io/download/) - Free Universal Database Tool.
* [Visual Studio Code](https://code.visualstudio.com/) - Edición de código.
* [Git Kraken](https://www.gitkraken.com/) - Cliente Git para Windows, Mac y Linux.
* [PDF Dom](https://github.com/barryvdh/laravel-dompdf) - Libreria de renderizado de PDF.
* [Chart js](https://www.chartjs.org/) - Gráficos de JavaScript.

## Autores ✒️

* **Braulio Argandoña Carrasco** - [braulioargandonac](https://github.com/braulioargandonac)
* **Germán Contreras Améstica** - [dargor980](https://github.com/dargor980) 

## Licencia 📄

Este proyecto está bajo la Licencia MIT.
