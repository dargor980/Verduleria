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
_Asegúrese que Composer este en el PATH del sistema._

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

###  Iniciar VirtualHost
#### En Windows
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

#### En Linux (Distribuciones basadas en Ubuntu y Arch Linux)

 Abrimos una Teminal y ejecutamos lo siguiente para editar el archivo ```hosts```:
 
 ```
 >   sudo nano /etc/hosts
 ```
 Luego insertamos la siguiente línea al final del archivo ```127.0.0.1 verduleria.santagemita.com```
 
 Presionamos ``` CTRL+O``` y  ```ENTER``` para guardar los cambios.
 
 Luego debemos editar el archivo ```httpd.conf``` de xampp, para esto ejecutamos lo siguiente en la terminal:
 ```
 >   sudo nano /opt/lampp/etc/httpd.conf 
 ```
 
 Ubicándonos al final del archivo pegamos lo siguiente:
 ```
 <VirtualHost *:80>
   DocumentRoot /opt/lampp/htdocs    
   ServerName localhost
</VirtualHost>

<VirtualHost *:80>
	ServerName verduleria.santagemita.com
	DocumentRoot /opt/lampp/htdocs/Verduleria/public  
	ServerAlias verduleria.santagemita.com
    	<Directory /opt/lampp/htdocs/Verduleria/public>
    	Options Indexes FollowSymLinks
    	AllowOverride All
    	Require all granted
    	Allow from all
    	</Directory>
</VirtualHost>
 ```
 
 Presionamos ```CTRL+O ``` y ```ENTER``` para guardar los cambios.
 
 Finalmente debemos reiniciar xampp ejecutando lo siguiente en la Terminal:
 
 ```
 >   sudo /opt/lampp/lampp restart
 ```
 
Finalmente dirigirse al navegador web, donde accederemos a ```http://verduleria.santagemita.com``` para verificar si ya está funcionando.
 
###  Inicio automático de Xampp al encender

#### En Windows
Para comenzar, es necesario configurar el encendido automático de los servicios de Xampp, para ello lo ejecutaremos como administrador y nos dirigiremos a la configuración del mismo, en la cual seleccionaremos los servicios de MySql y Apache. Además, como método opcional podemos marcar la casilla 'iniciar minimizado', la cual provocará que al iniciar lo haga minimizado.
Nos ubicamos en la carpeta raíz de Xampp, la cual está en ```C:\XAMPP```, donde encontraremos el archivo ```XAMPP-control```, donde procederemos a crear un acceso directo del mismo para llevarlo a carpeta de inicio automático de windows.
Para llegar a esa carpeta, es necesario realizar un comando de teclado ```Windows + R``` que nos permitirá ejecutar lo siguiente ```shell:startup```. Esto nos llevará a la carpeta que buscábamos y pegamos el acceso directo que provocará que Xampp se inicie automaticamente al encender el computador.

#### En Linux (Distribuciones basadas en Ubuntu y Arch Linux)

Primero debemos abrir una terminar y ejecutar el comando:
```
>   sudo nano /etc/init.d/lampp
```

Luego añadimos el siguiente escript bash en el archivo generado:

```
#!/bin/bash
/opt/lampp/lampp start

```

Escrito esto presionamos ```CTRL+O ``` y ```ENTER ``` para guardar los cambios.

Seguido de esto último, le damos permisos de ejecución al script ejecutando lo siguiente en la terminal 

```
>   sudo chmod +x /etc/init.d/lampp
```
Finalmente se debe ejecutar el siguiente comando para instalar el script en todos los niveles de ejecución:

```
>   sudo update-rc.d lampp defaults
```
## Configuraciones adicionales

### Configurar backup automático de la base de datos.

Nos es sumamente necesario proteger los datos frente a posibles pérdidas. Para esto, debemos configurar la automatización del respaldo de la base de datos MySql.

#### En windows

Debemos crear un arhivo de ejecución por lotes  ``` .bat```, para esto abrimos el bloc de notas y escribimos lo siguiente:

```
echo off
C:\xampp\mysql\bin\mysqldump -hlocalhost -u[USER] -p[PASSWORD] verduleriadb > copia_seguridad_%Date:~6,4%%Date:~3,2%%Date:~0,2%_.sql
exit
```
Donde:
[USER]= usuario de mysql con el que se ingresa a la base de datos
[PASSWORD]= contrase del usuario mysql.

Luego ponemos en guardar como y lo guardamos con la extensión ```.bat```

Lo posicionamos en la carpeta del proyecto y posteriormente ejecutamos el programador de tareas de Windows. Generamos una nueva tarea y seleccionamos el archivo .bat generado. Configuramos la frecuencia en que se repite la tarea y el desencadenador de ésta.

#### En Linux (Distribuciones basadas en Ubuntu y Arch Linux)

Para la programación del backup debemos crear un script bash. para esto abrimos una Terminal y ejecutamos los siguientes comandos:
```
>   cd /opt/lampp/htdocs/Verduleria
>   mkdir backup
>   sudo nano /opt/lampp/htdocs/Verduleria/backup/mysqldump.sh
```

Hecho esto escribimos el siguiente script:

```
#!/bin/bash

# Credenciales de Base de datos (configurar de acuerdo a tus datos)
user=""         
password=""
host=""
db_name=""

# Otras opciones (backup_path es la ruta donde quedara nuestro backup)
backup_path="/path/to/your/home/_backup/mysql"  
date=$(date +"%d-%b-%Y")

# Set default file permissions
umask 177

# Dump database into SQL file
mysqldump --user=$user --password=$password --host=$host $db_name > $backup_path/$db_name-$date.sql

# Delete files older than 90 days
find $backup_path/* -mtime +90 -exec rm {} \;

```

Luego presionar ``` CTRL+O ``` y ``` ENTER ``` para guardar los cambios

Seguido de esto ejecutamos lo siguiente estando posicionados en la carpeta donde se encuantra el archivo que generamos:

```
> chmod +x mysqldump.sh
```

Finalmente, configuramos la hora en el cual se ejecute el script utilizando ```crontab```

```
>   sudo crontab -e
```

Y especificamos lo siguiente:

```
MAILTO=example@domain.com<br></br>
30 4 * * * sh /opt/lampp/htdocs/Verduleria/backup/mysqldump.sh
```

## Construido con 🛠️

* [Laravel 7.28.1](https://laravel.com/docs/8.x) - Framework web basado en PHP.
* [Xampp](https://www.apachefriends.org/es/download.html) - Servidor Local.
* [Npm](https://www.npmjs.com/get-npm) - Manejador de dependencias de Node Js.
* [Bootstrap](https://getbootstrap.com/docs/4.5/getting-started/download/) - Framework de CSS.
* [FontAwesome](https://fontawesome.com/) - Libreria de iconos.
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
