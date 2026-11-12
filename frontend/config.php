<?php
/**
 * APLAB — configuración y contenido del sitio.
 * Edita este archivo para cambiar textos, enlaces, datos y diagramas sin tocar el diseño.
 */

const SITE_NAME = 'APLAB';
const SITE_FULL = 'Amor Por Los Animales Bolivia';
const TAGLINE   = 'Amor por los animales y su biodiversidad';

// Muestra la etiqueta "Borrador por validar" en los apartados cuyo contenido es una propuesta.
const SHOW_DRAFT_BADGES = true;

// --- Datos de contacto -------------------------------------------------------
const ADDRESS        = 'Av. The Strongest #11, calle 49A (entre Achumani y Alto Irpavi)';
const CITY           = 'La Paz, Bolivia';
const LOCATION       = 'Achumani, La Paz, Bolivia';
const PHONE_LANDLINE = '2712004';
const PHONE_CELL     = '70143340';
const PHONE_ADOPTION = '60601166';
const TEL_LANDLINE   = 'tel:+59122712004';
const TEL_CELL       = 'tel:+59170143340';
const TEL_ADOPTION   = 'tel:+59160601166';
const WHATSAPP_URL   = 'https://wa.me/59170143340';
const CONTACT_EMAIL  = 'anitalsr@gmail.com';
const FB_VET         = 'https://www.facebook.com/aplabvet/';
const FB_ORG         = 'https://www.facebook.com/Aplabolivia.org/';
const HOURS          = 'Consulta el horario de atención por teléfono, WhatsApp o Facebook.';

// Botón "Visitar Veterinaria": abre la dirección en Google Maps.
const VET_URL      = 'https://www.google.com/maps/search/?api=1&query=Av.+The+Strongest+%2311+calle+49A+La+Paz+Bolivia';
const VET_EXTERNAL = true;

// --- Servicios principales ---------------------------------------------------
$servicios = [
    ['title' => 'Clínica veterinaria',
     'text'  => 'Consultas, tratamientos, esterilizaciones, vacunas y desparasitaciones, y limpieza dental. Atención médica con costos reducidos y ayuda social veterinaria.'],
    ['title' => 'Rescate y rehabilitación',
     'text'  => 'Ayuda a animales en situación de calle y rehabilitación de aves silvestres y rapaces urbanas.'],
    ['title' => 'Adopciones responsables',
     'text'  => 'Programas de búsqueda de hogar para perros y gatos rescatados.'],
    ['title' => 'Educación y campañas',
     'text'  => 'Capacitaciones, talleres educativos y campañas de bienestar animal.'],
];

// Proceso de adopción (según el sitio oficial de APLAB)
$pasos = ['Auxilio del animal', 'Hogar temporal', 'Rehabilitación', 'Esterilización quirúrgica', 'Registro con tatuaje', 'Adopción'];

// --- Sistema de Gestión APLAB: qué gestiona -----------------------------------
$areas = [
    ['Citas',               'Programación, reprogramación y cancelación de citas médicas y estéticas, con validación de horarios y recordatorios al cliente.'],
    ['Historiales clínicos', 'Consultas, diagnósticos, tratamientos, vacunas, cirugías, análisis, radiografías y recetas de cada mascota.'],
    ['Estética y spa',      'Cola de servicios, registro de lo realizado, observaciones antes y después, y descuento de insumos.'],
    ['Ventas',              'Venta de productos y servicios, cálculo del total, comprobante o factura y registro del pago.'],
    ['Inventario',          'Ingresos, devoluciones y ajustes de stock, proveedores y alertas de stock mínimo y vencimiento.'],
    ['Reportes',            'Reportes y estadísticas de citas, ventas, inventario, historial clínico y estética, exportables a PDF, Excel o CSV.'],
];

// --- Menú: Marco Teórico → Contenido -----------------------------------------
$marco = [
    ['id' => 'introduccion',    'title' => 'Introducción'],
    ['id' => 'antecedentes',    'title' => 'Antecedentes'],
    ['id' => 'planteamiento',   'title' => 'Planteamiento del Problema'],
    ['id' => 'arbol-problemas', 'title' => 'Árbol de Problemas'],
    ['id' => 'formulacion',     'title' => 'Formulación del Problema'],
    ['id' => 'proposito',       'title' => 'Propósito del Estudio'],
    ['id' => 'metodologia',     'title' => 'Metodología'],
    ['id' => 'gantt',           'title' => 'Planificación de Actividades (Gantt)'],
];

// --- Menú: Análisis Estructurado ---------------------------------------------
$ambiental = [
    ['id' => 'declaracion-propositos', 'n' => 1, 'title' => 'Declaración de Propósitos'],
    ['id' => 'dfd-n0',                 'n' => 2, 'title' => 'DFD N0 — Diagrama de Contexto'],
    ['id' => 'lista-acontecimientos',  'n' => 3, 'title' => 'Lista de Acontecimientos'],
];
$comportamiento = [
    ['id' => 'dfd-n1', 'n' => 4, 'title' => 'DFD Nivel 1'],
    ['id' => 'dfd-n2', 'n' => 5, 'title' => 'DFD Nivel 2'],
    ['id' => 'der',    'n' => 6, 'title' => 'DER — Entidad Relación'],
];

// --- Modelo ambiental ---------------------------------------------------------
$declaracion = 'El sistema tiene como objetivo gestionar, administrar y controlar las citas, los historiales clínicos, los servicios de estética y spa, las ventas, el inventario y los reportes de la clínica veterinaria APLAB, mediante una base de datos centralizada.';

$acontecimientos = [
    'Administrador' => [
        'Registra a los empleados y asigna sus roles y permisos.',
        'Define los turnos del personal.',
        'Define los precios de los servicios y productos, las promociones y la anticipación de los recordatorios de cita.',
        'Solicita reportes y estadísticas de citas, ventas, inventario, historial clínico y estética, y los exporta a PDF, Excel o CSV.',
        'Consulta la bitácora de auditoría, restablece claves de usuarios y genera copias de seguridad.',
        'Recibe una alerta del sistema cuando un producto alcanza su stock mínimo o se aproxima a su fecha de vencimiento.',
    ],
    'Empleado' => [
        'Registra a los clientes y a sus mascotas.',
        'Programa citas médicas y estéticas, y el sistema valida la disponibilidad de horarios.',
        'Reprograma o cancela citas, y el sistema libera el horario y notifica al cliente.',
        'Consulta el calendario de citas y el historial de ventas.',
        'Registra la venta de productos y servicios, y el sistema calcula el total y emite el comprobante o factura.',
        'Registra el pago (efectivo, transferencia, tarjeta o mixto), y el sistema actualiza el stock.',
        'Registra devoluciones e ingresos de productos al inventario y consulta el stock.',
    ],
    'Cliente' => [
        'Solicita su registro, inicia sesión y recupera su clave.',
        'Solicita, reprograma o cancela citas.',
        'Consulta el perfil de su mascota y sus próximas citas.',
        'Recibe la confirmación y el recordatorio de sus citas, y el aviso de servicio finalizado.',
    ],
    'Veterinario' => [
        'Consulta su agenda de citas.',
        'Consulta el historial clínico y las alertas médicas de la mascota.',
        'Registra la atención: diagnósticos, tratamientos, medicamentos, vacunas y cirugías.',
        'Adjunta análisis, radiografías y recetas al historial y emite reportes clínicos.',
    ],
    'Estilista' => [
        'Revisa la cola de servicios estéticos y consulta el historial estético de la mascota.',
        'Registra el servicio realizado y las observaciones antes y después.',
        'Marca el servicio como finalizado, y el sistema descuenta los insumos utilizados del inventario.',
    ],
    'Proveedor' => [
        'Entrega productos, y el empleado registra su ingreso y los datos de contacto del proveedor.',
        'Recibe del sistema la solicitud de reposición de los productos que alcanzan su stock mínimo.',
    ],
    'Entidad bancaria' => [
        'Recibe del sistema la solicitud de cobro de pagos con tarjeta o transferencia, y confirma o rechaza la operación.',
    ],
    'Servicio de correo' => [
        'Recibe del sistema los recordatorios de cita, enlaces de recuperación de clave y avisos para el cliente.',
        'Informa al sistema el estado de envío de los mensajes.',
    ],
];

// --- Modelo de comportamiento: DFD --------------------------------------------
$n1 = [
    [
        'id' => 'dfd-n1-a', 'file' => 'dfd-n1-a.jpg', 'module' => 'Módulo A',
        'title' => 'Usuarios, citas y estética/SPA',
        'caption' => 'DFD Nivel 1 — Módulo A: usuarios, citas y estética/SPA.',
        'text' => 'Divide la parte operativa del sistema en tres procesos principales. Maneja los almacenes de usuarios y roles, mascotas y clientes, y citas.',
        'procs' => ['1.0 Gestionar usuarios y autenticación', '2.0 Gestionar citas', '3.0 Gestionar estética/SPA'],
        'ext'   => 'Administrador, Cliente, Estilista, Recepcionista y Veterinario',
    ],
    [
        'id' => 'dfd-n1-b', 'file' => 'dfd-n1-b.jpg', 'module' => 'Módulo B',
        'title' => 'Historial clínico, inventario y reportes',
        'caption' => 'DFD Nivel 1 — Módulo B: historial clínico, inventario y reportes y alertas.',
        'text' => 'Cubre la parte clínica y de control. Usa los almacenes de historiales clínicos, mascotas y clientes, productos, movimientos de inventario, proveedores y bitácora de auditoría.',
        'procs' => ['1 Gestionar historial clínico', '2 Gestionar inventario', '3 Generar reportes y alertas'],
        'ext'   => 'Cliente (dueño), Veterinario, Administrador, Empleado (recepcionista), Estilista y Proveedor',
    ],
];

$n2 = [
    'A' => [
        ['id' => 'n2-a1', 'file' => 'dfd-n2-a1-usuarios.jpg', 'title' => 'Proceso 1.0 Gestionar usuarios y autenticación',
         'procs' => ['1.1 Registrar usuario', '1.2 Autenticar usuario', '1.3 Recuperar contraseña', '1.4 Administrar roles y permisos', '1.5 Actualizar datos y credenciales']],
        ['id' => 'n2-a2', 'file' => 'dfd-n2-a2-citas.jpg', 'title' => 'Proceso 2.0 Gestionar citas',
         'procs' => ['2.1 Registrar cita', '2.2 Validar disponibilidad', '2.3 Reprogramar cita', '2.4 Cancelar cita', '2.5 Consultar calendario e historial', '2.6 Enviar recordatorios']],
        ['id' => 'n2-a3', 'file' => 'dfd-n2-a3-estetica.jpg', 'title' => 'Proceso 3.0 Gestionar estética/SPA',
         'procs' => ['3.1 Administrar catálogo de servicios', '3.2 Programar cita de estética', '3.3 Registrar atención estética', '3.4 Controlar estado y notificar', '3.5 Calcular costo del servicio', '3.6 Registrar insumos utilizados']],
    ],
    'B' => [
        ['id' => 'n2-b1', 'file' => 'dfd-n2-b1-historial.jpg', 'title' => 'Proceso 1 Gestionar historial clínico',
         'procs' => ['1.1 Abrir historial clínico', '1.2 Registrar consulta médica', '1.3 Registrar vacunación y desparasitación', '1.4 Agregar nota aclaratoria', '1.5 Buscar expedientes', '1.6 Visualizar timeline y alertas']],
        ['id' => 'n2-b2', 'file' => 'dfd-n2-b2-inventario.jpg', 'title' => 'Proceso 2 Gestionar inventario',
         'procs' => ['2.1 Registrar y actualizar producto', '2.2 Registrar ingreso de mercadería', '2.3 Actualizar stock por venta, devolución o consumo', '2.4 Ajustar stock manualmente', '2.5 Gestionar proveedores', '2.6 Consultar y filtrar inventario']],
        ['id' => 'n2-b3', 'file' => 'dfd-n2-b3-reportes.jpg', 'title' => 'Proceso 3 Generar reportes y alertas',
         'procs' => ['3.1 Generar reporte clínico', '3.2 Generar reporte de inventario', '3.3 Evaluar alertas de stock y vencimiento', '3.4 Generar recordatorios de refuerzo']],
    ],
];

$n3 = [
    'A' => [
        ['id' => 'n3-a12', 'file' => 'dfd-n3-a12-autenticar.jpg', 'title' => 'Proceso 1.2 Autenticar usuario',
         'procs' => ['1.2.1 Validar formato de credenciales', '1.2.2 Verificar credenciales', '1.2.3 Controlar intentos fallidos', '1.2.4 Asignar rol y habilitar acceso']],
        ['id' => 'n3-a22', 'file' => 'dfd-n3-a22-disponibilidad.jpg', 'title' => 'Proceso 2.2 Validar disponibilidad',
         'procs' => ['2.2.1 Verificar horario del profesional', '2.2.2 Buscar citas en conflicto', '2.2.3 Emitir resultado']],
        ['id' => 'n3-a35', 'file' => 'dfd-n3-a35-costo.jpg', 'title' => 'Proceso 3.5 Calcular costo del servicio',
         'procs' => ['3.5.1 Obtener servicios y precios', '3.5.2 Aplicar promociones y descuentos', '3.5.3 Calcular total y emitir detalle']],
    ],
    'B' => [
        ['id' => 'n3-b12', 'file' => 'dfd-n3-b12-consulta.jpg', 'title' => 'Proceso 1.2 Registrar consulta médica',
         'procs' => ['1.2.1 Validar motivo, síntomas y constantes', '1.2.2 Registrar diagnóstico', '1.2.3 Prescribir receta médica', '1.2.4 Guardar consulta (transacción)']],
        ['id' => 'n3-b14', 'file' => 'dfd-n3-b14-notas.jpg', 'title' => 'Proceso 1.4 Agregar nota aclaratoria',
         'procs' => ['1.4.1 Validar rol y tipo de operación', '1.4.2 Registrar nota aclaratoria', '1.4.3 Auditar transacción']],
        ['id' => 'n3-b23', 'file' => 'dfd-n3-b23-stock.jpg', 'title' => 'Proceso 2.3 Actualizar stock por venta, devolución o consumo',
         'procs' => ['2.3.1 Validar producto y cantidad', '2.3.2 Actualizar stock', '2.3.3 Registrar movimiento']],
    ],
];

// --- DER ----------------------------------------------------------------------
$der_relaciones = [
    ['Cliente',       'posee',    'Mascota',     '1:N'],
    ['Mascota',       'tiene',    'Cita',        '1:N'],
    ['Cliente',       'solicita', 'Cita',        '1:N'],
    ['Veterinario',   'atiende',  'Cita',        '1:N'],
    ['Recepcionista', 'registra', 'Cita',        '1:N'],
    ['Cita',          'genera',   'Estética',    '1:1'],
    ['Estilista',     'realiza',  'Estética',    '1:N'],
    ['Servicio (catálogo)', 'incluye', 'Estética', 'N:M'],
];

// --- Orientada a objetos ------------------------------------------------------
$casos_uso = [
    'Administrador' => ['Gestionar empleados, roles y permisos', 'Definir turnos del personal', 'Definir precios, promociones y recordatorios', 'Solicitar y exportar reportes (PDF, Excel, CSV)', 'Consultar la bitácora, restablecer claves y generar copias de seguridad', 'Recibir alertas de stock y vencimiento'],
    'Empleado'      => ['Registrar clientes y mascotas', 'Programar, reprogramar y cancelar citas', 'Consultar calendario e historial de ventas', 'Registrar ventas y pagos', 'Registrar devoluciones e ingresos de productos'],
    'Cliente'       => ['Registrarse, iniciar sesión y recuperar la clave', 'Solicitar, reprogramar o cancelar citas', 'Consultar el perfil de su mascota y sus próximas citas', 'Recibir confirmaciones, recordatorios y avisos'],
    'Veterinario'   => ['Consultar la agenda de citas', 'Consultar historial clínico y alertas médicas', 'Registrar la atención (diagnósticos, tratamientos, vacunas, cirugías)', 'Adjuntar análisis, radiografías y recetas', 'Emitir reportes clínicos'],
    'Estilista'     => ['Revisar la cola de servicios y el historial estético', 'Registrar el servicio y las observaciones', 'Finalizar el servicio y descontar insumos'],
];

$clases = [
    ['Usuario',       'id, nombre, correo, clave, rol',        'Clase base. Iniciar sesión, recuperar clave, actualizar datos.'],
    ['Administrador', 'Hereda de Usuario',                     'Gestionar roles y permisos, turnos, precios y reportes.'],
    ['Cliente',       'teléfono, dirección',                   'Solicitar citas y consultar el perfil de su mascota.'],
    ['Empleado',      'turno, cargo',                          'Clase base del personal. Veterinario, Recepcionista y Estilista heredan de ella.'],
    ['Veterinario',   'especialidad',                          'Atender citas y registrar consultas, vacunas y recetas.'],
    ['Recepcionista', 'caja',                                  'Registrar citas, clientes, ventas y pagos.'],
    ['Estilista',     'especialidad',                          'Realizar servicios estéticos y registrar insumos.'],
    ['Mascota',       'nombre, especie, raza, edad, alergias', 'Mantener su perfil y su historial clínico.'],
    ['Cita',          'fecha, hora, estado, motivo',           'Registrar, reprogramar y cancelar; validar disponibilidad.'],
    ['Estética',      'observaciones, estado',                 'Registrar el servicio realizado y su estado.'],
    ['Servicio',      'nombre, precio, promoción',             'Catálogo de servicios con precios y promociones.'],
];

// --- Marco teórico: cronograma (Gantt) ----------------------------------------
$gantt_weeks = 8;
$gantt = [
    ['Levantamiento de información',            [1, 2]],
    ['Marco teórico y planteamiento',           [1, 2, 3]],
    ['Modelo ambiental',                        [3, 4]],
    ['Modelo de comportamiento (DFD N1 a N3)',  [4, 5, 6]],
    ['Diagrama entidad-relación',               [5, 6]],
    ['Modelo orientado a objetos',              [6, 7]],
    ['Revisión y documentación final',          [7, 8]],
];

// Videos: pega el ID de YouTube (lo que va después de "v=") en cada uno.
$videos = [
    ['title' => 'Video 1', 'youtube_id' => ''],
    ['title' => 'Video 2', 'youtube_id' => ''],
];

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
