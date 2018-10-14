CONSIDERACIONES SOBRE EL SISTEMA

    INSTALACION
    1 - CREAR base de datos con el nombre "zeycom"
    2 - EJECUTAR [ php artisan migrate:refresh ]
    3 - CREAR cuenta root [ http://127.0.0.1:8000/user/create ] [ NOTA ES SOLO ES APLICABLE DURANTE DESARROLLO, SE DEBE AGREGAR UN MIDDELWARE EN EL CONTROLADOR DE USER AL REALIZAR EL DESPLIEGUE DE LA APLICACION]

-- A CONTINUACION SE MUESTRAN LOS REQUERIMIENTOS DEL SISTEMA
-- SE HAN REALIZADO LOS QUE SE ECUENTRAN CON "X", EN GENERAL EL MODULO DE RENTAS ESTA COMPLETO.


RENTAMOS, VENDEMOS Y CONTAMOS CON SERVICIO PARA MAQUINARIA TANTO INTERNA COMO EXTERNA


RENTAS:

[x] *Tenemos actualmente 19 tipos de  maquinas en renta y de cada maquina tengo varias de esas.
    Por ejemplo 
    la maquina revolvedora para concreto de un saco, tengo 4 revolvedoras de esas de las cuales a cada una le he dado un número económico es decir una se llama R1, otra R2, R3 y la R4. 

[x] *Cada una se puede rentar : 1 día, 2 días, 3 días, 4 dias, 7 días (semana), 15 dias (quincena ), 30 días (mes) 
    - Cada tiempo tiene un precio diferente

[X] *De estos precios, pueden llegar a tener descuento el cliente.

[x] *Contabilizar el número de dias de renta, se le llegan a dar días al cliente sin cobro extra. 

[X] *Saber el nombre del cliente que tiene cada maquina
    - dirección y el teléfono del mismo como una especie de agenda de el mismo.

[x] *En cada renta saber si paga con iva o sin iva y en caso de pagar con iva que factura se generó

[x] *Saber si el cliente ya pago, o si dio dinero a cuenta y debe algo

[x] *Los pagos de los clientes pueden ser con iva o sin iva. 

[x] *saber cuando se vence una maquina de renta y aveces el cliente llega a renovar el tiempo de renta 

[x] *Hay ocasiones en que cobramos flete y esté siempre varía 

[x] *Cada maquina necesito saber si esta rentada, si esta en piso o esta desabilitada por alguna falla

[x] *Las maquinas de renta a veces se entregan con mas aditamentos 
    Por ejemplo
    extensiones, discos etc que haya un apartado para ello.

        Te voy a poner un ejemplo de lo que necesitaría dijera en la renta:

        La empresa Orvi construcciones 
        Contacto  ing Moises Orea Sanchez 
        En la dirección 14 norte #206 col centro en Izucar de matamoros puebla
        Teléfono 243 43 64646 y cel 243 43 122
        Rentó la R2 (Revolvedora marca Vecker con motor kohler 14hp de un saco)
        Renta por 10 días 
        De la fecha 23 de noviembre al 2 de diciembre
        Su cobro sería:
        7 días semana $1,800
        3 días extras cada día $400 por los tres días extras = $1,200
        Cobro de flete $100
        TOTAL DE LA RENTA  $2,300
        Pagó con IVA $2,668
        Factura si
        Factura #1003
        Dío a cuenta $2,000
        Restan $668
        Dias de regalo No aplica
        Estado de la maquina: Trabajando 


[x] *De la maquinaria nos informe si esta trabajando, desabilitada, disponible o se le esta realizando el servicio . 
    
    Por ejemplo:

    REVOLVEDORA PARA CONCRETO MARCA VECKER MOTOR KOHLER DE UN SACO 
    R1 Maquina desabilitada para trabajar
    R2 Maquina trabajando
    R3 Maquina disponible
    R4 Maquina en servicio

CAJA

*Necesito también controle el dinero es decir que diga:

    Dia 23 noviembre se rento :

    Martillo    M2      $450     1  DÍA DE RENTA  
    Revolvedora R4      $1,800   7  DÍAS DE RENTA 
    Bailarina   B12     $3,000   15 DÍAS DE RENTA 
    Bailarina   B10     $2,300   20 DÍAS DE RENTA 

    TOTAL DÍA 23 DE NOV $7,550

    - Esto por día, por semana, mes etc. 

VENTAS 

[-] * Al momento como te comenté no tenemos mucha venta. Solo llegamos a tener piezas como discos o esmeriles en venta. 
    Pero que tenga la opcion para decir Equipo, precio de venta y cuantos hay en existencia y cuantos quedan

[-] * Solo colocar de alguna manera  o como listado
    Nombre de la maquina, el costo para mi, el costo para cliente, si tiene descuento y que proveedor me lo vende


SERVICIO

Tenemos nuestra maquinaria propia y maquinaria que le damos servicio. 
Necesitan tener organización de lo siguiente :

[-] *Nuestra maquinaria de renta, despúes de un tiemmpo de trabajo, necesita servicio que nos avise el sistema

[-] *De la maquinaria de servicio que entra :
    Tener de quien es la maquina, que se le va a realizar, refacciones que ocupa, fecha de ingreso y de salida, si el cliente paga en efectivo, con factura o sin factura.

[-] *De las refacciones tener el numero de refacciones que hay, y que se vayan descontando.
    Decir por ejemplo 5 filtros de aire. Se ocuparón 3 , saber para que maquinas y que coloque que hay dos en sistema  

Mas adelante sería agregar que en el momento que el cliente pida su factura de le pueda entregar al cliente. 
Espero no te haya hecho bolas!!! Gracias!!! :)