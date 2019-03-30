# Trabajo sistemas operativos
Se crea un archivo form.php y se pone en la carpeta del servidor apache que ya viene con el Issabel en la ruta /var/www/html/,
este archivo contiene el formulario donde se ingresarán los datos 'message' y 'phone', además de el código para hacer la petición tipo POST con php-curl.

En Asterisk se crea un contexto en el archivo extensions_custom.conf con el nombre [callfestival], de esta manera
        
        [callfestival]
        exten => 150, 1, Answer()
        exten => 150, n, Festival(${message})
        exten => 150, n, Hangup()

También es necesario activar el Festival desde la interfaz gráfica del Issabel

Se crea la RESTAPI con Flask, un framework de python, con la intención de recibir la petición generada desde el archivo form.php

Para poner en funcionamiento la aplicación de app, vamos a la ruta /var/www/html/interface/restapi e ingresamos los siguientes comandos

        . venv/bin/activate #activa el virtualenv para python
        export FLASK_APP=server.py #le indicamos al sistema que nuestra aplicación de Flask se encuentra en el archivo server.py
        python -m flask run --host=0.0.0.0 #ejecutamos el servidor!
  
Hecho esto tenemos nuestra aplicación funcionando, en el navegador del anfitrión podemos acceder a 'http://<serverip>/form.php'
e ingresar los datos para realizar la llamada.
        
El enlace con asterisk se hace en el archivo server.py, en el que con llamadas a la consola del sistema se ejecutan comandos de asterisk para realizar llamadas siguiendo un contexto.

Hecho por Sergio Andrés Arboleda Zuluaga y Mateo Zuluaga Giraldo
