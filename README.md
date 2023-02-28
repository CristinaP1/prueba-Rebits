## Indicaciones para probar el sistema

- Configurar el .env, con esto me refiero a copiar el archivo .env.example y renombrar con .env. Luego agregar los datos de la base de datos
- Crear la base de datos de prueba que coincida con el nombre de la base de datos puesto en el .env
- Luego en la consola poner el comando composer install
- Para generar la clave en el archivo .env php artisan key:generate
- Para cargar las migraciones poner el comando php artisan migrate
- Por último, hacer un php artisan serve

Para probar las test se debe realizar lo siguiente:
- Poner el comando php artisan test (no es necesario que el servidor esté corriendo)
