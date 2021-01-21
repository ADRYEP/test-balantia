# Ejericicio 1 Test-Balantia

## Por qué el ejericicio 1?

​	Preferí hacer el ejercicio 1 ya que creo que era una manera más completa de demostrar mis conocimientos y habilidades a nivel técnico en el back.

## Despliegue de proyecto:

- Clonar el siguiente repositorio de gitlab: https://gitlab.com/adr27yepez/test-balantia.git

- Exportar el archivo **balantia.sql** en el manejador de base de datos de su preferencia, en mi caso, usé phpmyadmin

  ![image-20210121142925604](C:\Users\liugu\AppData\Roaming\Typora\typora-user-images\image-20210121142925604.png) 

- Crear un archivo llamado **.env** y usar de referencia el almacenado en el proyecto (**.env.example**) para configurar las variables de entorno

  - **IMPORTANTE:** Colocar como nombre de la base de datos: **balantia** tal y como se muestra en la siguiente imagen:

    ![image-20210121142332800](C:\Users\liugu\AppData\Roaming\Typora\typora-user-images\image-20210121142332800.png)

- Ejecutar las migraciones con comando artisan: **php artisan migrate**

  Una vez hecho esto, el proyecto ya está listo para probar y las tablas en la base de datos estarían creadas.

## Archivos importantes

### 	\test-balantia\database\migrations

- **2014_10_12_000000_create_users_table:**

  Creación de la tabla users en la base de datos

- **2021_01_20_174021_create_rols_table:**

  Creación de la tabla rols en la base de datos

- **2021_01_20_174137_create_cities_table:**

  Creación de la tabla cities en la base de datos

- **2021_01_20_181139_add_foreign_keys:**

  Creación de claves foráneas y relaciones en cada tabla anteriormente creada

  

### database\factories\UserFactory.php

​	Permite crear objetos user con valores random mientras se ejecutan los tests

### tests\Feature\UserModuleTest.php

​	Contiene distintos test que verifican que la ejecución de las instrucciones en UserController sea la que se busca.

### app (MODELS)

- **User** 

  ​	Almacena las instrucciones CRUD, relaciones con otros modelos y demás instrucciones importantes del modelo user

### app\Http\Controllers\UserController.php

​	Aquí se encuentran las "conexiones"  entre las rutas web y las instrucciones del modelo user.

### routes\web.php

​	Este archivo almacena todas las rutas web usadas en el proyecto

## NOTA

​	 Para una programación más limpia, prefiero realizar todas las instrucciones y acciones en el archivo del model y dejar el archivo del controlador para los ruteos al modelo.