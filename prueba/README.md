Este proyecto se trata de el manejo de ciertas tareas, se visualiza el estado en que se encuentra

Para instalar este proyecto de forma local es necesario tener instalado un servidor local como Xampp, laragon, etc, cualquiera de esto servira, también se debe tener instalado el manejador de paquetes de php COMPOSER para poder realizar la instalación.

Después de tener instalado estas herramientas, se debe copiar el proyecto a la carpeta de ejecución del servidor, por ejemplo:

Si el servidor es Xampp el proyecto se debe copiar a la carpeta htdocs "C:\xampp\htdocs\"
Si el servidor es Laragon el proyecto se debe copiar a la carpeta www "C:\laragon\www"

Después de copiar el proyecto en la carpeta del servidor, se procede a abrir una consola, cmd o simbolo del sistema y que sea ejecutado desde la ruta donde esta el proyecto en el servidor local.

Luego se debe ejecutar el siguiente comando para instalar todos los recursos del proyecto "composer install" se ejecuta sin las comillas.

Luego de que termine esa ejecución se procede a ejecutar otro comando para instalar la base de datos "php artisan migrate:fresh --seed",este comando ejecuta tanto la base de datos, como los registros de prueba que tiene el sistema, pero para que funcione se debe tener una base de datos ya creada y configuarada en el proyecto, en el archivo .env donde se solicita el nombre de la base de datos se pone el nombre que se configuro debe quedar asi "DB_DATABASE=prueba".

Y listo el sistema ya quedo funcionado.

Ahora para ejecutar el proyecto se debe realizar una serie de pasos dependiendo el servidor que se utiliza, por ejemplo:

En el servidor Xampp se debe ejecutar un comando desde el proyecto a traves de la consola, cmd o simbolo del sistema, que es "php artisan serve" y luego mostrará el enlace de ejecución.

En el servidor Laragon simplemente de click derecho en cualquier parte de la ventana de laragon y se despliega una lista de opciones, se da click en la opción "www" y luego buscamos el nombre del proyecto.

Luego se ejecutara automaticamente el navegador que se tenga como predeterminado en el PC y mostrara la interfaz que tiene el sistema.

Y ya puede empezar a usar el sistema.