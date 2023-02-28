
## Instalación

Instalación del proyecto en Laravel

Primeramente se debe ejecutar el comando composer install para instalar todas las dependencias solicitadas
```bash
composer install
```
Una vez hecho la instalacion de composer, en el archivo .env vienen las credenciales a utilizar para la conexión a la Base de datos, en este caso se usó MySQL, usar las credenciales correspondientes a su instalación de MySQL.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=examen_prueba_tecnica
DB_USERNAME=root
DB_PASSWORD=
```
Ya teniendo las credenciales correctas, se ejecutará el siguiente comando para tener los 100 registros de prueba y asi mismo poder tener informacion Dummy.
```bash
php artisan migrate:fresh --seed
```
El comando anterior ejecutara un seeder el cual a traves de un factory creara los 100 registros que se van a usar como prueba, el proyecto backend como el frontend funcionan perfectamente sin estos registros.

------------------------------------------------------------
Para levantar el servidor se recomienda ejecutar el siguiente comando para que el proyecto hecho en Vue Js pueda consumir la Api correspondiente
```bash
php artisan serve --port=9000
```
El proyecto de Vue JS traer los datos de http://127.0.0.1:9000/ es por eso que se especifica que correra en el puerto 9000.

------------------------------------------------------------
## Exámen de Patrones de Diseño 

**Problema 1**: Un cliente requiere utilizar sendgrid para envíos de email, pero otro cliente requiere enviarlos por mandril. Se quiere evitar el uso de IF, y realizar un diseño en donde podamos utilizar más servicios en caso de que un cliente requiera alguno en específico.

¿Qué patrón de diseño utilizarías y por qué?

**Opción 1**: Strategy

**Opción 2**: Factory Method

**Opción 3**: Adapter 

Realmente no se mucho sobre patrones de diseño, pero haciendo una investigación sobre estos diseños pude entender que Strategy es el patrón de diseño que mas se adecua a lo que el problema dice ya que este patrón nos permite poder encapsular distintos algoritmos o en este caso estrategias en clases separadas que se pueden implementar en una misma interfaz o bien una clase abstracta común.

Entonces en resumen usaría este patrón de diseño por el ejemplo siguiente y es que en el caso de enviar correos electrónicos, lo que podemos hacer es tener distintas implementaciones de la interfaz para cada proveedor de correo electrónico, por ejemplo, una para Sendgrid y otra para Mandril. En lugar de tener un bloque de código condicional que seleccione el proveedor que se quiere utilizar, el código simplemente lo que hará es seleccionar la estrategia o algoritmo que es la más adecuada para enviar el correo y la utiliza, de esta forma por lo que entendí el código se puede volver más mantenible y escalable, ya que no se requiere modificar el código existente cada vez que se quiera agregar un nuevo proveedor de correo electrónico.

------------------------------------------------------------


**Problema 2**: Explica en tus propias palabras la diferencia entre Factory Method y Abstract Factory. Y proporciona un caso de uso.


Nunca he utilizado ningún patron de diseño, he escuchado lo eficientes que son para un escalado y mantenimiento optimo de algún proyecto, me di a la tarea de investigar un poco sobre los patrones de diseño que mencionan en el problema anterior y en este y puedo decir con mis propias palabras a lo que entendí es que factory method y abstract Factory son patrones de diseño creacionales con los que se busca encapsular la creación de objetos.

Factory Method, por ejemplo, se enfoca en el que se puedan crear objetos de una sola clase, asi pudiendo delegando la creación de objetos específicos a las subclases.
Podría decirse que factory method lo que hace es definir una interfaz común para que se puedan crear objetos, pero las subclases serán las encargadas de implementarla para crear los objetos específicos.

Por lo tanto, se utiliza este patrón cuando se quiere que una clase delegue la creación de objetos a sus subclases, de manera que pueda trabajar con objetos de una clase sin conocer exactamente cuál es la subclase concreta que se está utilizando.

Un ejemplo de un caso de uso para factory method es crear una clase abstracta llamada Paquetería que tiene un método llamado entregar. Las subclases de Paquetería podrían ser, por ejemplo, Camión, Vagoneta y Avión y asi estos mismos van a implementar el método entregar de diferentes maneras, pero todas las subclases pertenecen a una sola clase abstracta. Si se necesita agregar un nuevo tipo de paquetería, se puede crear una nueva subclase de " Paquetería " sin afectar a las otras subclases.

------------------------------------------------------------
Ahora abstract factory, lo que hace es que se enfoca en la creación de familias o grupos de objetos que están relacionados entre sí, se puede decir que, son un conjunto de objetos que funcionan juntos. En este patrón, lo que entendí es que se define una interfaz común para crear una familia o grupos de objetos que están relacionados, y las subclases que son concretas implementarán esta interfaz para poder crear objetos que estén relacionados entre sí.

Un ejemplo para el caso de uso de abstract factory podría ser un sistema de creación de juegos. Por ejemplo, necesitamos crear un juego de carreras de coches en el que todos los jugadores van a poder personalizar sus coches eligiendo diferentes opciones de diseño, como el color, la carrocería, los neumáticos, etc. En este caso, se puede utilizar el patrón abstract factory para crear una fábrica abstracta que genere diferentes objetos relacionados entre sí, como la carrocería, los neumáticos y la pintura. 
