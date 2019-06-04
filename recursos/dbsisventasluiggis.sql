SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `RestLuiggis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `RestLuiggis` ;

-- -----------------------------------------------------
-- Table `RestLuiggis`.`Persona`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Persona` (
  `ci` INT NOT NULL ,
  `nombre` VARCHAR(50) NOT NULL ,
  `telefono` INT NOT NULL ,
  `correo` VARCHAR(50) NULL ,
  `direccion` VARCHAR(100) NULL ,
  `estado` CHAR NOT NULL ,
  PRIMARY KEY (`ci`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Sucursal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Sucursal` (
  `idSucursal` VARCHAR(3) NOT NULL ,
  `direccion` VARCHAR(50) NOT NULL ,
  `telefono` INT NOT NULL ,
  PRIMARY KEY (`idSucursal`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`usuario` (
  `id` INT NOT NULL ,
  `usuario` VARCHAR(50) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `nombre` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Empleado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Empleado` (
  `ciEmpleado` INT NOT NULL ,
  `cargo` VARCHAR(50) NOT NULL ,
  `fechaIngreso` DATE NOT NULL ,
  `idSucursal` VARCHAR(3) NOT NULL ,
  `idUsuario` INT NOT NULL ,
  PRIMARY KEY (`ciEmpleado`) ,
  INDEX `idSucursal_idx` (`idSucursal` ASC) ,
  INDEX `fk_usuario_id-empleado_idusuario_idx` (`idUsuario` ASC) ,
  CONSTRAINT `fk_cipersona_empleado`
    FOREIGN KEY (`ciEmpleado` )
    REFERENCES `RestLuiggis`.`Persona` (`ci` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_idsucursal_empleado`
    FOREIGN KEY (`idSucursal` )
    REFERENCES `RestLuiggis`.`Sucursal` (`idSucursal` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_id-empleado_idusuario`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `RestLuiggis`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Proveedor` (
  `ciProveedor` INT NOT NULL ,
  `nombreEmpresa` VARCHAR(30) NOT NULL ,
  INDEX `ciProveedor_idx` (`ciProveedor` ASC) ,
  PRIMARY KEY (`ciProveedor`) ,
  CONSTRAINT `fk_ciProveedor_proveedor`
    FOREIGN KEY (`ciProveedor` )
    REFERENCES `RestLuiggis`.`Persona` (`ci` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Cliente` (
  `ci` INT NOT NULL ,
  `nombre` VARCHAR(50) NOT NULL ,
  `correo` VARCHAR(50) NULL ,
  `telefono` INT NULL ,
  PRIMARY KEY (`ci`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Pedido_Proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Pedido_Proveedor` (
  `idPedido_Proveedor` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `montoTotal` DECIMAL(12,2) NULL ,
  `CIEmpleado` INT NOT NULL ,
  `CIProveedor` INT NOT NULL ,
  PRIMARY KEY (`idPedido_Proveedor`) ,
  INDEX `ciEmpleado_idx` (`CIEmpleado` ASC) ,
  INDEX `ciProveedor_idx` (`CIProveedor` ASC) ,
  CONSTRAINT `fk_ciempleado_pedidoproveedor`
    FOREIGN KEY (`CIEmpleado` )
    REFERENCES `RestLuiggis`.`Empleado` (`ciEmpleado` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ciproveedor_pedidoproveedor`
    FOREIGN KEY (`CIProveedor` )
    REFERENCES `RestLuiggis`.`Proveedor` (`ciProveedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Tipo_Pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Tipo_Pedido` (
  `idTipo_Pedido` INT NOT NULL ,
  `descripcion` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`idTipo_Pedido`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Unidad_Medida`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Unidad_Medida` (
  `idUnidad_Medida` INT NOT NULL ,
  `descripcion` VARCHAR(4) NULL ,
  PRIMARY KEY (`idUnidad_Medida`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Almacen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Almacen` (
  `codAlmacen` INT NOT NULL ,
  `descripcion` VARCHAR(50) NULL ,
  `idSucursal` VARCHAR(3) NULL ,
  PRIMARY KEY (`codAlmacen`) ,
  INDEX `idSucursal_idx` (`idSucursal` ASC) ,
  CONSTRAINT `fk_idsucursal_almacen`
    FOREIGN KEY (`idSucursal` )
    REFERENCES `RestLuiggis`.`Sucursal` (`idSucursal` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Nota_Egreso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Nota_Egreso` (
  `idNotaEgreso` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `descripcion` VARCHAR(100) NOT NULL ,
  `CODAlmacen` INT NULL ,
  `Nota_Egresocol` VARCHAR(50) NULL ,
  PRIMARY KEY (`idNotaEgreso`) ,
  INDEX `codAlmacen_idx` (`CODAlmacen` ASC) ,
  CONSTRAINT `fk_codalmacen_notaegreso`
    FOREIGN KEY (`CODAlmacen` )
    REFERENCES `RestLuiggis`.`Almacen` (`codAlmacen` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Detalle_Egreso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Detalle_Egreso` (
  `idDetalleEgreso` INT NOT NULL ,
  `cantidad` DECIMAL(12,2) NOT NULL ,
  `detalle` VARCHAR(50) NOT NULL ,
  `IDNotaEgreso` INT NOT NULL ,
  PRIMARY KEY (`idDetalleEgreso`) ,
  INDEX `IDNotaEgreso_idx` (`IDNotaEgreso` ASC) ,
  CONSTRAINT `fk_idnotaegreso_detalleegreso`
    FOREIGN KEY (`IDNotaEgreso` )
    REFERENCES `RestLuiggis`.`Nota_Egreso` (`idNotaEgreso` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Insumo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Insumo` (
  `idInsumo` VARCHAR(5) NOT NULL ,
  `nombre` VARCHAR(50) NOT NULL ,
  `tipoInsumo` CHAR NOT NULL ,
  `IDUMedida` INT NOT NULL ,
  PRIMARY KEY (`idInsumo`) ,
  INDEX `IDUMedida_idx` (`IDUMedida` ASC) ,
  CONSTRAINT `fk_idunidadmedida_insumo`
    FOREIGN KEY (`IDUMedida` )
    REFERENCES `RestLuiggis`.`Unidad_Medida` (`idUnidad_Medida` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Cant_Insumo_Almacen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Cant_Insumo_Almacen` (
  `Almacen_codAlmacen` INT NOT NULL ,
  `Insumo_idInsumo` VARCHAR(5) NOT NULL ,
  `stock` FLOAT NULL ,
  PRIMARY KEY (`Almacen_codAlmacen`, `Insumo_idInsumo`) ,
  INDEX `fk_Almacen_has_Insumo_Insumo1_idx` (`Insumo_idInsumo` ASC) ,
  INDEX `fk_Almacen_has_Insumo_Almacen1_idx` (`Almacen_codAlmacen` ASC) ,
  CONSTRAINT `fk_codalmacen_cantinsumoalmacen`
    FOREIGN KEY (`Almacen_codAlmacen` )
    REFERENCES `RestLuiggis`.`Almacen` (`codAlmacen` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idinsumo_cantinsumoalmacen`
    FOREIGN KEY (`Insumo_idInsumo` )
    REFERENCES `RestLuiggis`.`Insumo` (`idInsumo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Detalle_Pedido_Proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Detalle_Pedido_Proveedor` (
  `idPedido_Proveedor` INT NOT NULL ,
  `idInsumo` VARCHAR(5) NOT NULL ,
  `cantidad` INT NOT NULL ,
  `precio` FLOAT NOT NULL ,
  PRIMARY KEY (`idPedido_Proveedor`, `idInsumo`) ,
  INDEX `fk_Pedido_Proveedor_has_Insumo_Insumo2_idx` (`idInsumo` ASC) ,
  INDEX `fk_Pedido_Proveedor_has_Insumo_Pedido_Proveedor2_idx` (`idPedido_Proveedor` ASC) ,
  CONSTRAINT `fk_idpedidoproveedor_detallepedidoproveedor`
    FOREIGN KEY (`idPedido_Proveedor` )
    REFERENCES `RestLuiggis`.`Pedido_Proveedor` (`idPedido_Proveedor` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_idinsumo_detallepedidoproveedor`
    FOREIGN KEY (`idInsumo` )
    REFERENCES `RestLuiggis`.`Insumo` (`idInsumo` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Nota_Ingreso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Nota_Ingreso` (
  `idNota_Ingreso` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `ciProveedor` INT NOT NULL ,
  `codAlmacen` INT NOT NULL ,
  PRIMARY KEY (`idNota_Ingreso`) ,
  INDEX `CODAlmacen_idx` (`codAlmacen` ASC) ,
  INDEX `CIProveedor_idx` (`ciProveedor` ASC) ,
  CONSTRAINT `fk_ciproveedor_notaingreso`
    FOREIGN KEY (`ciProveedor` )
    REFERENCES `RestLuiggis`.`Proveedor` (`ciProveedor` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_codalmacen_notaingreso`
    FOREIGN KEY (`codAlmacen` )
    REFERENCES `RestLuiggis`.`Almacen` (`codAlmacen` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Pedido_Cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Pedido_Cliente` (
  `codPedido_Cliente` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `totalVenta` DECIMAL(12,2) NOT NULL ,
  `CICliente` INT NOT NULL ,
  `CIEmpleado` INT NOT NULL ,
  PRIMARY KEY (`codPedido_Cliente`) ,
  INDEX `fk_Pedido_Cliente_Cliente1_idx` (`CICliente` ASC) ,
  INDEX `CIEMPLEADO_idx` (`CIEmpleado` ASC) ,
  CONSTRAINT `fk_cicliente_pedidocliente`
    FOREIGN KEY (`CICliente` )
    REFERENCES `RestLuiggis`.`Cliente` (`ci` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ciempleado_pedidocliente`
    FOREIGN KEY (`CIEmpleado` )
    REFERENCES `RestLuiggis`.`Empleado` (`ciEmpleado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Factura`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Factura` (
  `nroFactura` INT NOT NULL ,
  `nit` INT NULL ,
  `nombreNit` VARCHAR(50) NULL ,
  `fecha` DATE NULL ,
  `totalImporte` FLOAT NOT NULL ,
  `valorRecibido` FLOAT NOT NULL ,
  `cambio` FLOAT NOT NULL ,
  `tipoPago` CHAR NOT NULL ,
  `codPedidoCliente` INT NOT NULL ,
  `Empleado_ciEmpleado` INT NOT NULL ,
  PRIMARY KEY (`nroFactura`) ,
  INDEX `codPedidoCliente_idx` (`codPedidoCliente` ASC) ,
  INDEX `fk_Factura_Empleado1_idx` (`Empleado_ciEmpleado` ASC) ,
  CONSTRAINT `fk_codpedidocliente_factura`
    FOREIGN KEY (`codPedidoCliente` )
    REFERENCES `RestLuiggis`.`Pedido_Cliente` (`codPedido_Cliente` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ciempleado_factura`
    FOREIGN KEY (`Empleado_ciEmpleado` )
    REFERENCES `RestLuiggis`.`Empleado` (`ciEmpleado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Producto_Terminado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Producto_Terminado` (
  `codProductoTerminado` VARCHAR(4) NOT NULL ,
  `nombre` VARCHAR(30) NOT NULL ,
  `precioUnitario` DECIMAL(12,2) NOT NULL ,
  PRIMARY KEY (`codProductoTerminado`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Combo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Combo` (
  `codProductoCombo` VARCHAR(4) NOT NULL ,
  `codProducto` VARCHAR(4) NOT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`codProductoCombo`, `codProducto`) ,
  INDEX `fk_Producto_Terminado_has_Producto_Terminado_Producto_Termi_idx` (`codProducto` ASC) ,
  INDEX `fk_Producto_Terminado_has_Producto_Terminado_Producto_Termi_idx1` (`codProductoCombo` ASC) ,
  CONSTRAINT `fk_productoterminado_combo`
    FOREIGN KEY (`codProductoCombo` )
    REFERENCES `RestLuiggis`.`Producto_Terminado` (`codProductoTerminado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_codproductotermindo_combo`
    FOREIGN KEY (`codProducto` )
    REFERENCES `RestLuiggis`.`Producto_Terminado` (`codProductoTerminado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Detalla_Pedido_Cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Detalla_Pedido_Cliente` (
  `codPedido_Cliente` INT NOT NULL ,
  `codProductoTerminado` VARCHAR(4) NOT NULL ,
  `cantidad` INT NOT NULL ,
  `idTipoPedido` INT NOT NULL ,
  PRIMARY KEY (`codPedido_Cliente`, `codProductoTerminado`, `idTipoPedido`) ,
  INDEX `fk_Pedido_Cliente_has_Producto_Terminado_Producto_Terminado_idx` (`codProductoTerminado` ASC) ,
  INDEX `fk_Pedido_Cliente_has_Producto_Terminado_Pedido_Cliente1_idx` (`codPedido_Cliente` ASC) ,
  INDEX `IDTIPOPEDIDO_idx` (`idTipoPedido` ASC) ,
  CONSTRAINT `fk_codpedidoCliente_detallapedidocliente`
    FOREIGN KEY (`codPedido_Cliente` )
    REFERENCES `RestLuiggis`.`Pedido_Cliente` (`codPedido_Cliente` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_codproductoterminado_detallepedidocliente`
    FOREIGN KEY (`codProductoTerminado` )
    REFERENCES `RestLuiggis`.`Producto_Terminado` (`codProductoTerminado` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tipopedidoidtipopedido_detallepedidocliente`
    FOREIGN KEY (`idTipoPedido` )
    REFERENCES `RestLuiggis`.`Tipo_Pedido` (`idTipo_Pedido` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Ingrediente_Producto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Ingrediente_Producto` (
  `codProductoTerminado` VARCHAR(4) NOT NULL ,
  `idInsumo` VARCHAR(5) NOT NULL ,
  `cantInsumo` INT NULL ,
  PRIMARY KEY (`codProductoTerminado`, `idInsumo`) ,
  INDEX `fk_Producto_Terminado_has_Insumo_Insumo1_idx` (`idInsumo` ASC) ,
  INDEX `fk_Producto_Terminado_has_Insumo_Producto_Terminado1_idx` (`codProductoTerminado` ASC) ,
  CONSTRAINT `fk_codproductoterminado_ingredienteproducto`
    FOREIGN KEY (`codProductoTerminado` )
    REFERENCES `RestLuiggis`.`Producto_Terminado` (`codProductoTerminado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idinsumo_ingredienteproducto`
    FOREIGN KEY (`idInsumo` )
    REFERENCES `RestLuiggis`.`Insumo` (`idInsumo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Promocion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Promocion` (
  `idPromocion` VARCHAR(4) NOT NULL ,
  `nombrePromocion` VARCHAR(50) NOT NULL ,
  `precioPromocion` DECIMAL(12,2) NOT NULL ,
  `fechaInicio` DATE NOT NULL ,
  `fechaFin` DATE NULL ,
  PRIMARY KEY (`idPromocion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Detalle_Nota_Ingreso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Detalle_Nota_Ingreso` (
  `idDetalleNotaIngreso` INT NOT NULL ,
  `idNotaIngreso` INT NOT NULL ,
  `detalle` VARCHAR(50) NOT NULL ,
  `cantidad` DECIMAL(12,2) NOT NULL ,
  `fechaVencimiento` DATE NOT NULL ,
  `precioInsumo` DECIMAL(12,2) NOT NULL ,
  `idInsumo` VARCHAR(5) NOT NULL ,
  PRIMARY KEY (`idDetalleNotaIngreso`, `idNotaIngreso`) ,
  INDEX `IDINSUMO_idx` (`idInsumo` ASC) ,
  INDEX `IDNOTAINGRESO_idx` (`idNotaIngreso` ASC) ,
  CONSTRAINT `fk_idinsumo_detallenotaingreso`
    FOREIGN KEY (`idInsumo` )
    REFERENCES `RestLuiggis`.`Insumo` (`idInsumo` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_idnotaingreso__detallenotaingreso`
    FOREIGN KEY (`idNotaIngreso` )
    REFERENCES `RestLuiggis`.`Nota_Ingreso` (`idNota_Ingreso` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Detalle_Promocion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Detalle_Promocion` (
  `codProductoTerminado` VARCHAR(4) NOT NULL ,
  `idPromocion` VARCHAR(4) NOT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`codProductoTerminado`, `idPromocion`) ,
  INDEX `fk_Producto_Terminado_has_Promocion_Promocion1_idx` (`idPromocion` ASC) ,
  INDEX `fk_Producto_Terminado_has_Promocion_Producto_Terminado1_idx` (`codProductoTerminado` ASC) ,
  CONSTRAINT `fk_codproductoterminado_detallepromocion`
    FOREIGN KEY (`codProductoTerminado` )
    REFERENCES `RestLuiggis`.`Producto_Terminado` (`codProductoTerminado` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_idpromocion_detallepromocion`
    FOREIGN KEY (`idPromocion` )
    REFERENCES `RestLuiggis`.`Promocion` (`idPromocion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Detalla_Pedido_Promo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Detalla_Pedido_Promo` (
  `idDetallaPromocion` VARCHAR(4) NOT NULL ,
  `codPedidoCliente` INT NOT NULL ,
  `idTipoPedido` INT NOT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`idDetallaPromocion`, `codPedidoCliente`, `idTipoPedido`, `cantidad`) ,
  INDEX `IDPROMOCION_idx` (`idDetallaPromocion` ASC) ,
  INDEX `IDTIPOPEDIDO_idx` (`idTipoPedido` ASC) ,
  INDEX `CODPEDIDOCLIENTE_idx` (`codPedidoCliente` ASC) ,
  CONSTRAINT `fk_idpromocion_detallapedidopromo`
    FOREIGN KEY (`idDetallaPromocion` )
    REFERENCES `RestLuiggis`.`Promocion` (`idPromocion` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_idtipopedido_detallapedidopromo`
    FOREIGN KEY (`idTipoPedido` )
    REFERENCES `RestLuiggis`.`Tipo_Pedido` (`idTipo_Pedido` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_codpedidocliente_detallapedidopromo`
    FOREIGN KEY (`codPedidoCliente` )
    REFERENCES `RestLuiggis`.`Pedido_Cliente` (`codPedido_Cliente` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`Bitacora`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`Bitacora` (
  `idBitacora` INT NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(50) NOT NULL ,
  `horaFechaInicio` DATETIME NOT NULL ,
  `horaFechaFinal` DATETIME NOT NULL ,
  PRIMARY KEY (`idBitacora`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`DetalleBitacora`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`DetalleBitacora` (
  `idDetalleBitacora` INT NOT NULL ,
  `idBitacoracol` INT NOT NULL ,
  `fechaHora` DATETIME NOT NULL ,
  `descripcion` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`idDetalleBitacora`, `idBitacoracol`) ,
  INDEX `IDBITACORA_idx` (`idBitacoracol` ASC) ,
  CONSTRAINT `fk_edbitacora_detallebitacora`
    FOREIGN KEY (`idBitacoracol` )
    REFERENCES `RestLuiggis`.`Bitacora` (`idBitacora` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`rol`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`rol` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`usuario_rol`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`usuario_rol` (
  `id` INT NOT NULL ,
  `rol_id` INT NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `estado` TINYINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuario_id_idx` (`usuario_id` ASC) ,
  INDEX `fk_rol_id_idx` (`rol_id` ASC) ,
  CONSTRAINT `fk_usuario_id`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `RestLuiggis`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol_id`
    FOREIGN KEY (`rol_id` )
    REFERENCES `RestLuiggis`.`rol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`permiso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`permiso` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(50) NOT NULL ,
  `slug` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestLuiggis`.`permiso_rol`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `RestLuiggis`.`permiso_rol` (
  `id` INT NOT NULL ,
  `rol_id` INT NOT NULL ,
  `permiso_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_rol_id-permiso_rol_idx` (`rol_id` ASC) ,
  INDEX `fk_permiso_id-permiso_rol-permiso_id_idx` (`permiso_id` ASC) ,
  CONSTRAINT `fk_rol_id-permiso_rol`
    FOREIGN KEY (`rol_id` )
    REFERENCES `RestLuiggis`.`rol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_id-permiso_rol-permiso_id`
    FOREIGN KEY (`permiso_id` )
    REFERENCES `RestLuiggis`.`permiso` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `RestLuiggis` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
