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