<?php
require __DIR__ . '/config.php';
$pageId    = 'marco';
$pageTitle = 'Marco Teórico';
$pageDesc  = 'Marco teórico del Sistema de Gestión APLAB: introducción, antecedentes, problema, propósito, metodología y cronograma.';
require __DIR__ . '/includes/header.php';
echo page_title('Marco Teórico', 'Base conceptual y planificación del Sistema de Gestión APLAB.');
?>
<main>
  <div class="container report">
    <aside class="report-side">
      <?php
      $items = [];
      foreach ($marco as $i => $m) { $items[] = [$m['id'], ($i + 1) . '. ' . $m['title']]; }
      echo toc($items);
      ?>
    </aside>

    <div class="report-body">

      <section id="introduccion" class="rsec">
        <h2><span class="rn">1</span> Introducción</h2>
        <p>APLAB (Amor Por Los Animales Bolivia) es una fundación sin fines de lucro que atiende la salud de los animales en La Paz. Su centro de salud animal y veterinaria, ubicado en Achumani, ofrece consultas, tratamientos, esterilizaciones, vacunas, desparasitaciones y limpieza dental con costos reducidos, además de programas de rescate, rehabilitación de fauna silvestre, adopciones y educación.</p>
        <p>Una clínica de este tipo maneja a diario mucha información: citas médicas y estéticas, historiales clínicos, ventas, productos en inventario y reportes. Cuando esa información está organizada y disponible en un solo lugar, el personal atiende mejor, los dueños reciben un servicio más claro y la fundación puede tomar decisiones con datos.</p>
        <p>Este informe presenta el análisis y diseño del <strong>Sistema de Gestión APLAB</strong>, una propuesta de sistema con base de datos centralizada para administrar citas, historiales clínicos, servicios de estética y spa, ventas, inventario y reportes. El documento sigue el análisis estructurado (modelo ambiental y modelo de comportamiento) y se complementa con el modelo orientado a objetos.</p>
      </section>

      <section id="antecedentes" class="rsec">
        <h2><span class="rn">2</span> Antecedentes</h2>
        <h3>La institución</h3>
        <p>APLAB trabaja por el respeto y la compasión hacia los animales a través de la educación, el voluntariado y la participación ciudadana. Promueve los hogares temporales como alternativa a los albergues y desarrolla un programa de adopciones que sigue un proceso definido: auxilio del animal, hogar temporal, rehabilitación, esterilización quirúrgica, registro con tatuaje y adopción.</p>
        <p>Según su sitio oficial, la fundación ha logrado más de 500 adopciones y cerca de 1000 esterilizaciones quirúrgicas de perros y gatos. Su centro de salud animal funciona en la Av. The Strongest #11, calle 49A, entre Achumani y Alto Irpavi, en La Paz.</p>
        <h3>Sistemas de gestión veterinaria</h3>
        <p>Las clínicas veterinarias suelen apoyarse en sistemas que integran agenda de citas, historia clínica del paciente, control de inventario, facturación y reportes. Este proyecto toma esa idea y la adapta a la realidad de APLAB, que además de la atención veterinaria incluye servicios de estética y spa y una fuerte componente de ayuda social.</p>
      </section>

      <section id="planteamiento" class="rsec">
        <h2><span class="rn">3</span> Planteamiento del Problema </h2>
        <p>Una clínica veterinaria que atiende a muchos animales debe controlar al mismo tiempo la agenda de sus profesionales, el historial de cada mascota, los servicios de estética, las ventas y el stock de medicamentos e insumos. Cuando estos registros se llevan de forma manual o en herramientas separadas, aparecen problemas conocidos:</p>
        <ul class="plain">
          <li>Citas superpuestas, olvidadas o difíciles de reprogramar.</li>
          <li>Historiales clínicos incompletos o lentos de consultar, lo que dificulta conocer alergias, vacunas y tratamientos previos.</li>
          <li>Productos que se agotan o se vencen sin aviso.</li>
          <li>Ventas y pagos sin un registro único que permita emitir comprobantes y reportes.</li>
          <li>Poco control sobre quién accede o modifica la información.</li>
        </ul>
        <p>Para una fundación que combina servicios privados con ayuda social, estas dificultades se traducen en tiempo perdido y en menos recursos para los animales que más lo necesitan.</p>
      </section>

      <section id="arbol-problemas" class="rsec">
        <h2><span class="rn">4</span> Árbol de Problemas </h2>
        <p>El árbol de problemas relaciona la situación central con sus causas (abajo) y sus efectos (arriba).</p>
        <div class="tree" role="group" aria-label="Árbol de problemas">
          <div class="tree-tier effects">
            <h3>Efectos</h3>
            <ul>
              <li>Tiempo perdido en la atención al cliente</li>
              <li>Historiales difíciles de consultar</li>
              <li>Citas superpuestas u olvidadas</li>
              <li>Productos agotados o vencidos</li>
              <li>Reportes lentos o inexistentes para decidir</li>
            </ul>
          </div>
          <div class="tree-core">
            <span>Problema central</span>
            <strong>Gestión ineficiente de la información de la clínica veterinaria</strong>
          </div>
          <div class="tree-tier causes">
            <h3>Causas</h3>
            <ul>
              <li>Registros manuales o en archivos separados</li>
              <li>Ausencia de una base de datos centralizada</li>
              <li>Agenda sin validación de horarios ni recordatorios</li>
              <li>Inventario sin alertas de stock mínimo ni de vencimiento</li>
              <li>Sin control de accesos ni bitácora de auditoría</li>
            </ul>
          </div>
        </div>
      </section>

      <section id="formulacion" class="rsec">
        <h2><span class="rn">5</span> Formulación del Problema </h2>
        <blockquote class="formulation">
          ¿De qué manera un sistema de gestión con base de datos centralizada puede mejorar el control de las citas, los historiales clínicos, los servicios de estética y spa, las ventas, el inventario y los reportes de la clínica veterinaria APLAB?
        </blockquote>
      </section>

      <section id="proposito" class="rsec">
        <h2><span class="rn">6</span> Propósito del Estudio </h2>
        <h3>Objetivo general</h3>
        <p>Analizar y diseñar un sistema de gestión para la clínica veterinaria APLAB que permita administrar y controlar citas, historiales clínicos, servicios de estética y spa, ventas, inventario y reportes mediante una base de datos centralizada.</p>
        <h3>Objetivos específicos</h3>
        <ol class="plain">
          <li>Definir el alcance del sistema mediante el modelo ambiental: declaración de propósitos, diagrama de contexto y lista de acontecimientos.</li>
          <li>Modelar el comportamiento del sistema con diagramas de flujo de datos de nivel 1, 2 y 3.</li>
          <li>Diseñar el diagrama entidad-relación de los datos principales.</li>
          <li>Elaborar el modelo orientado a objetos: actores, casos de uso y diagrama de clases.</li>
          <li>Documentar el análisis y diseño de forma clara para su revisión y futura implementación.</li>
        </ol>
      </section>

      <section id="metodologia" class="rsec">
        <h2><span class="rn">7</span> Metodología </h2>
        <div class="method">
          <article>
            <h3>Tipo de estudio</h3>
            <p>Aplicado y descriptivo: se describe la operación de la clínica y se propone un sistema que responde a sus necesidades.</p>
          </article>
          <article>
            <h3>Levantamiento de información</h3>
            <p>Observación y consulta de los procesos de la clínica para identificar actores, acontecimientos, datos y reglas del negocio.</p>
          </article>
          <article>
            <h3>Análisis estructurado</h3>
            <p>Modelo ambiental (propósitos, contexto y acontecimientos) y modelo de comportamiento con DFD por niveles y DER.</p>
          </article>
          <article>
            <h3>Análisis orientado a objetos</h3>
            <p>Identificación de actores, casos de uso y clases con sus atributos y relaciones.</p>
          </article>
          <article>
            <h3>Gestión del trabajo</h3>
            <p>Avance por etapas con revisión al final de cada una, según el cronograma del siguiente apartado.</p>
          </article>
        </div>
      </section>

      <section id="gantt" class="rsec">
        <h2><span class="rn">8</span> Planificación de Actividades (Gantt) </h2>
        <p>Cronograma propuesto en <?= $gantt_weeks ?> semanas.</p>
        <div class="gantt-wrap">
          <table class="gantt">
            <thead>
              <tr>
                <th scope="col">Actividad</th>
                <?php for ($w = 1; $w <= $gantt_weeks; $w++): ?><th scope="col">S<?= $w ?></th><?php endfor; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($gantt as $r => [$act, $weeks]): ?>
                <tr>
                  <th scope="row"><?= e($act) ?></th>
                  <?php for ($w = 1; $w <= $gantt_weeks; $w++): ?>
                    <td><?php if (in_array($w, $weeks, true)): ?><span class="gbar b<?= ($r % 3) + 1 ?>"><span class="sr-only">Semana <?= $w ?></span></span><?php endif; ?></td>
                  <?php endfor; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>

    </div>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
