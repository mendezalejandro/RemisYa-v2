<?php
class TipoUsuario
  {
      const Administrador = 1;
      const Recepcionista = 2;
      const Chofer = 3;
      const Cliente = 4;
  }
  class TipoViaje
  {
      const Web = 0;
      const Personal = 1;
      const Telefonico = 2;
  }
  class ViajeEstado
  {
      const En_viaje = 0;
      const Solicitado = 1;
      const Cancelado = 2;
      const Finalizado = 3;
  }
  class PersonaEstado
  {
      const Habilitado = 0;
      const Deshabilitado = 1;
  }
  class VehiculoEstado
  {
      const Habilitado = 0;
      const Deshabilitado = 1;
  }
  class TarifaEstado
  {
      const Habilitada = 0;
      const Deshabilitada = 1;
  }