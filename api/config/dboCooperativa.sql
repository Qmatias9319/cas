/*
 Navicat Premium Data Transfer

 Source Server         : local 26 wil
 Source Server Type    : SQL Server
 Source Server Version : 15002000
 Source Host           : 192.168.110.226:1433
 Source Catalog        : dbCooperativa
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 15002000
 File Encoding         : 65001

 Date: 21/10/2023 17:34:39
*/


-- ----------------------------
-- Table structure for tblArma
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblArma]') AND type IN ('U'))
	DROP TABLE [dbo].[tblArma]
GO

CREATE TABLE [dbo].[tblArma] (
  [idArma] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(200) COLLATE Modern_Spanish_CI_AS  NULL,
  [idFuerza] int  NULL
)
GO

ALTER TABLE [dbo].[tblArma] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblArma
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblArma] ON
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'1', N'Infantería', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'2', N'Caballería', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'3', N'Artillería', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'4', N'Ingeniería', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'5', N'Comunicaciones', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'6', N'Inteligencia', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'7', N'Logística', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'8', N'Motores ', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'9', N'Material Bélico', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'10', N'Sanidad', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'11', N'Intendencia', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'12', N'Técnico de Aviación ', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'13', N'Música', N'1')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'14', N'Aviación', N'2')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'15', N'Defensa Aérea', N'2')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'16', N'Apoyo Operativo', N'2')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'17', N'Técnico Aeronáutico ', N'2')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'18', N'Música', N'2')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'19', N'Máquinas', N'3')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'20', N'Mar y Cubierta', N'3')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'21', N'Administración', N'3')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'22', N'Electricidad', N'3')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'23', N'Comunicaciones', N'3')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'24', N'Infantería de Marina', N'3')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'25', N'Música', N'3')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'26', N'I', N'4')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'27', N'II', N'4')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'28', N'III', N'4')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'29', N'IV', N'4')
GO

INSERT INTO [dbo].[tblArma] ([idArma], [detalle], [idFuerza]) VALUES (N'30', N'V', N'4')
GO

SET IDENTITY_INSERT [dbo].[tblArma] OFF
GO


-- ----------------------------
-- Table structure for tblDepartamento
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblDepartamento]') AND type IN ('U'))
	DROP TABLE [dbo].[tblDepartamento]
GO

CREATE TABLE [dbo].[tblDepartamento] (
  [idDepartamento] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tblDepartamento] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblDepartamento
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblDepartamento] ON
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'1', N'CHUQUISACA')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'2', N'LA PAZ')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'3', N'COCHABAMBA')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'4', N'SANTA CRUZ')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'5', N'ORURO')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'6', N'POTOSI')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'7', N'TARIJA')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'8', N'PANDO')
GO

INSERT INTO [dbo].[tblDepartamento] ([idDepartamento], [detalle]) VALUES (N'9', N'BENI')
GO

SET IDENTITY_INSERT [dbo].[tblDepartamento] OFF
GO


-- ----------------------------
-- Table structure for tblDetalleMilitar
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblDetalleMilitar]') AND type IN ('U'))
	DROP TABLE [dbo].[tblDetalleMilitar]
GO

CREATE TABLE [dbo].[tblDetalleMilitar] (
  [idDetalleMilitar] int  IDENTITY(1,1) NOT NULL,
  [codigoBoleta] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [grado] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [carnetMilitar] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [carnetCossmil] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [idArma] int  NULL,
  [fechaIncorporacion] date  NULL,
  [destinoActual] int  NULL,
  [idFuerza] int  NULL,
  [idSocio] int  NULL
)
GO

ALTER TABLE [dbo].[tblDetalleMilitar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblDetalleMilitar
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblDetalleMilitar] ON
GO

INSERT INTO [dbo].[tblDetalleMilitar] ([idDetalleMilitar], [codigoBoleta], [grado], [carnetMilitar], [carnetCossmil], [idArma], [fechaIncorporacion], [destinoActual], [idFuerza], [idSocio]) VALUES (N'13', N'748596', N'5', N'123456', N'789456', N'7', N'2016-01-16', NULL, N'1', N'22')
GO

INSERT INTO [dbo].[tblDetalleMilitar] ([idDetalleMilitar], [codigoBoleta], [grado], [carnetMilitar], [carnetCossmil], [idArma], [fechaIncorporacion], [destinoActual], [idFuerza], [idSocio]) VALUES (N'14', N'336699', N'37', N'114477', N'225588', N'19', N'2000-04-12', NULL, N'3', N'23')
GO

INSERT INTO [dbo].[tblDetalleMilitar] ([idDetalleMilitar], [codigoBoleta], [grado], [carnetMilitar], [carnetCossmil], [idArma], [fechaIncorporacion], [destinoActual], [idFuerza], [idSocio]) VALUES (N'15', N'789456', N'37', N'789456', N'789456', N'19', N'2011-11-11', NULL, N'3', N'24')
GO

INSERT INTO [dbo].[tblDetalleMilitar] ([idDetalleMilitar], [codigoBoleta], [grado], [carnetMilitar], [carnetCossmil], [idArma], [fechaIncorporacion], [destinoActual], [idFuerza], [idSocio]) VALUES (N'16', N'478596', N'36', N'789456', N'415263', N'19', N'2000-11-11', NULL, N'3', N'25')
GO

INSERT INTO [dbo].[tblDetalleMilitar] ([idDetalleMilitar], [codigoBoleta], [grado], [carnetMilitar], [carnetCossmil], [idArma], [fechaIncorporacion], [destinoActual], [idFuerza], [idSocio]) VALUES (N'17', N'15896112', N'51', N'87987984', N'4546546', N'24', N'2025-12-11', NULL, N'3', N'26')
GO

INSERT INTO [dbo].[tblDetalleMilitar] ([idDetalleMilitar], [codigoBoleta], [grado], [carnetMilitar], [carnetCossmil], [idArma], [fechaIncorporacion], [destinoActual], [idFuerza], [idSocio]) VALUES (N'18', N'654654', N'87', N'554654', N'654654', N'29', N'1999-12-12', NULL, N'4', N'27')
GO

SET IDENTITY_INSERT [dbo].[tblDetalleMilitar] OFF
GO


-- ----------------------------
-- Table structure for tblEstadoCivil
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblEstadoCivil]') AND type IN ('U'))
	DROP TABLE [dbo].[tblEstadoCivil]
GO

CREATE TABLE [dbo].[tblEstadoCivil] (
  [idEstadoCivil] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tblEstadoCivil] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblEstadoCivil
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblEstadoCivil] ON
GO

INSERT INTO [dbo].[tblEstadoCivil] ([idEstadoCivil], [detalle]) VALUES (N'1', N'SOLTERO (A)')
GO

INSERT INTO [dbo].[tblEstadoCivil] ([idEstadoCivil], [detalle]) VALUES (N'2', N'CASADO (A)')
GO

INSERT INTO [dbo].[tblEstadoCivil] ([idEstadoCivil], [detalle]) VALUES (N'3', N'VIUDO (A)')
GO

INSERT INTO [dbo].[tblEstadoCivil] ([idEstadoCivil], [detalle]) VALUES (N'4', N'DIVORCIADO (A)')
GO

SET IDENTITY_INSERT [dbo].[tblEstadoCivil] OFF
GO


-- ----------------------------
-- Table structure for tblExpedicion
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblExpedicion]') AND type IN ('U'))
	DROP TABLE [dbo].[tblExpedicion]
GO

CREATE TABLE [dbo].[tblExpedicion] (
  [idExpedicion] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(5) COLLATE Modern_Spanish_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tblExpedicion] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblExpedicion
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblExpedicion] ON
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'1', N'CHU')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'2', N'LP')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'3', N'CBB')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'4', N'SCZ')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'5', N'OR')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'6', N'PT')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'7', N'TJ')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'8', N'PT')
GO

INSERT INTO [dbo].[tblExpedicion] ([idExpedicion], [detalle]) VALUES (N'9', N'BN')
GO

SET IDENTITY_INSERT [dbo].[tblExpedicion] OFF
GO


-- ----------------------------
-- Table structure for tblFuerza
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblFuerza]') AND type IN ('U'))
	DROP TABLE [dbo].[tblFuerza]
GO

CREATE TABLE [dbo].[tblFuerza] (
  [idFuerza] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(30) COLLATE Modern_Spanish_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tblFuerza] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblFuerza
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblFuerza] ON
GO

INSERT INTO [dbo].[tblFuerza] ([idFuerza], [detalle]) VALUES (N'1', N'EJÉRCITO DE BOLIVIA')
GO

INSERT INTO [dbo].[tblFuerza] ([idFuerza], [detalle]) VALUES (N'2', N'FUERZA AÉREA BOLIVIANA')
GO

INSERT INTO [dbo].[tblFuerza] ([idFuerza], [detalle]) VALUES (N'3', N'ARMADA BOLIVIANA')
GO

INSERT INTO [dbo].[tblFuerza] ([idFuerza], [detalle]) VALUES (N'4', N'EE.CC.')
GO

SET IDENTITY_INSERT [dbo].[tblFuerza] OFF
GO


-- ----------------------------
-- Table structure for tblGarante
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblGarante]') AND type IN ('U'))
	DROP TABLE [dbo].[tblGarante]
GO

CREATE TABLE [dbo].[tblGarante] (
  [idGarante] int  IDENTITY(1,1) NOT NULL,
  [idSocio] int  NULL,
  [idPrestamo] int  NULL
)
GO

ALTER TABLE [dbo].[tblGarante] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblGarante
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblGarante] ON
GO

INSERT INTO [dbo].[tblGarante] ([idGarante], [idSocio], [idPrestamo]) VALUES (N'1', N'23', N'13')
GO

INSERT INTO [dbo].[tblGarante] ([idGarante], [idSocio], [idPrestamo]) VALUES (N'2', N'24', N'13')
GO

SET IDENTITY_INSERT [dbo].[tblGarante] OFF
GO


-- ----------------------------
-- Table structure for tblGrado
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblGrado]') AND type IN ('U'))
	DROP TABLE [dbo].[tblGrado]
GO

CREATE TABLE [dbo].[tblGrado] (
  [idGrado] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(30) COLLATE Modern_Spanish_CI_AS  NULL,
  [sigla] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [idFuerza] int  NULL
)
GO

ALTER TABLE [dbo].[tblGrado] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblGrado
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblGrado] ON
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'1', N'Gral. Ejto.', N'GRAL. EJTO.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'2', N'Gral. Div.', N'GRAL. DIV.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'3', N'Gral. Brig.', N'GRAL. BRIG.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'4', N'Cnl.', N'CNL.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'5', N'Tcnl.', N'TCNL.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'6', N'My.', N'MY.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'7', N'Cap.', N'CAP.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'8', N'Tte.', N'TTE.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'9', N'Sbtte.', N'SBTTE.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'10', N'Sof. Mtre.', N'SOF. MTRE.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'11', N'Sof. My.', N'SOF. MY.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'12', N'Sof. 1ro.', N'SOF. 1ro.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'13', N'Sof. 2do.', N'SOF. 2do.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'14', N'Sof. Incl.', N'SOF. Incl.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'15', N'Sgto. 1ro.', N'SGTO. 1ro.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'16', N'Sgto. 2do.', N'SGTO. 2do.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'17', N'Sgto. Incl.', N'SGTO. Incl.', N'1')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'18', N'Gral. FAB.
', N'Gral. FAB.', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'19', N'Gral. Div. Ae.
', N'Gral. Div. Ae.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'20', N'Gral. Brig. Ae.
', N'Gral. Brig. Ae.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'21', N'Cnl.
', N'Cnl.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'22', N'Tcnl.
', N'Tcnl.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'23', N'My. 
', N'My. 
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'24', N'Cap.
', N'Cap.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'25', N'Tte.
', N'Tte.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'26', N'Sbtte.
', N'Sbtte.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'28', N'Sof. Mtre.
', N'Sof. Mtre.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'29', N'Sof. My.
', N'Sof. My.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'30', N'Sof. 1ro.
', N'Sof. 1ro.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'31', N'Sof. 2do.
', N'Sof. 2do.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'32', N'Sof. Incl.
', N'Sof. Incl.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'33', N'Sgto. 1ro.
', N'Sgto. 1ro.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'34', N'Sgto. 2do.
', N'Sgto. 2do.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'35', N'Sgto. Incl.
', N'Sgto. Incl.
', N'2')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'36', N'Almte.
', N'Almte.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'37', N'V. Almte.
', N'V. Almte.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'38', N'C. Almte.
', N'C. Almte.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'39', N'CN.
', N'CN.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'40', N'CF.
', N'CF.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'41', N'CC.
', N'CC.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'42', N'TN.
', N'TN.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'43', N'TF.
', N'TF.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'44', N'Alf.
', N'Alf.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'45', N'Sof. Mtre.
', N'Sof. Mtre.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'46', N'Sof. My.
', N'Sof. My.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'47', N'Sof. 1ro.
', N'Sof. 1ro.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'48', N'Sof. 2do.
', N'Sof. 2do.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'49', N'Sof. Incl.
', N'Sof. Incl.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'50', N'Sgto. 1ro.
', N'Sgto. 1ro.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'51', N'Sgto. 2do.
', N'Sgto. 2do.
', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'52', N'Sgto. Incl.', N'Sgto. Incl.', N'3')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'87', N'Apad.', N'Apad.', N'4')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'88', N'Adm.', N'Adm.', N'4')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'89', N'Tec.', N'Tec.', N'4')
GO

INSERT INTO [dbo].[tblGrado] ([idGrado], [detalle], [sigla], [idFuerza]) VALUES (N'90', N'Prof.', N'Prof.', N'4')
GO

SET IDENTITY_INSERT [dbo].[tblGrado] OFF
GO


-- ----------------------------
-- Table structure for tblLocalidad
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblLocalidad]') AND type IN ('U'))
	DROP TABLE [dbo].[tblLocalidad]
GO

CREATE TABLE [dbo].[tblLocalidad] (
  [idLocalidad] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [idMunicipio] int  NULL
)
GO

ALTER TABLE [dbo].[tblLocalidad] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblLocalidad
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblLocalidad] ON
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'1', N'Cotahuma', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'2', N'Max Paredes', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'3', N'Periférica', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'4', N'San Antonio', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'5', N'SDur', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'6', N'Mallasa', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'7', N'Centro', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'8', N'Hampaturi', N'1')
GO

INSERT INTO [dbo].[tblLocalidad] ([idLocalidad], [detalle], [idMunicipio]) VALUES (N'9', N'Zongo', N'1')
GO

SET IDENTITY_INSERT [dbo].[tblLocalidad] OFF
GO


-- ----------------------------
-- Table structure for tblMunicipio
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblMunicipio]') AND type IN ('U'))
	DROP TABLE [dbo].[tblMunicipio]
GO

CREATE TABLE [dbo].[tblMunicipio] (
  [idMunicipio] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(30) COLLATE Modern_Spanish_CI_AS  NULL,
  [idProvincia] int  NULL
)
GO

ALTER TABLE [dbo].[tblMunicipio] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblMunicipio
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblMunicipio] ON
GO

INSERT INTO [dbo].[tblMunicipio] ([idMunicipio], [detalle], [idProvincia]) VALUES (N'1', N'Nuestra Señora de La Paz', N'20')
GO

INSERT INTO [dbo].[tblMunicipio] ([idMunicipio], [detalle], [idProvincia]) VALUES (N'2', N'El Alto', N'20')
GO

INSERT INTO [dbo].[tblMunicipio] ([idMunicipio], [detalle], [idProvincia]) VALUES (N'3', N'Mecapaca', N'20')
GO

INSERT INTO [dbo].[tblMunicipio] ([idMunicipio], [detalle], [idProvincia]) VALUES (N'4', N'Achocalla', N'20')
GO

INSERT INTO [dbo].[tblMunicipio] ([idMunicipio], [detalle], [idProvincia]) VALUES (N'5', N'Palca', N'20')
GO

SET IDENTITY_INSERT [dbo].[tblMunicipio] OFF
GO


-- ----------------------------
-- Table structure for tblPrestamo
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblPrestamo]') AND type IN ('U'))
	DROP TABLE [dbo].[tblPrestamo]
GO

CREATE TABLE [dbo].[tblPrestamo] (
  [idPrestamo] int  IDENTITY(1,1) NOT NULL,
  [idSocio] int  NOT NULL,
  [tipo] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [monto] decimal(18,2)  NULL,
  [motivo] varchar(255) COLLATE Modern_Spanish_CI_AS  NULL,
  [plazo] int  NULL,
  [numeroCuenta] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [estado] varchar(20) COLLATE Modern_Spanish_CI_AS DEFAULT 'SOLICITUD' NULL,
  [fechaSolicitud] date DEFAULT sysdatetime() NULL,
  [fechaPrestamo] date  NULL
)
GO

ALTER TABLE [dbo].[tblPrestamo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblPrestamo
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblPrestamo] ON
GO

INSERT INTO [dbo].[tblPrestamo] ([idPrestamo], [idSocio], [tipo], [monto], [motivo], [plazo], [numeroCuenta], [estado], [fechaSolicitud], [fechaPrestamo]) VALUES (N'9', N'22', N'CONSUMO', N'120000.00', N'Prestamo de garantias', N'24', N'10100000025256', N'SOLICITUD', N'2023-10-09', NULL)
GO

INSERT INTO [dbo].[tblPrestamo] ([idPrestamo], [idSocio], [tipo], [monto], [motivo], [plazo], [numeroCuenta], [estado], [fechaSolicitud], [fechaPrestamo]) VALUES (N'10', N'22', N'CONSUMO', N'2000.80', N'adsafsdadsffsd', N'36', N'10101010102', N'SOLICITUD', N'2023-10-10', NULL)
GO

INSERT INTO [dbo].[tblPrestamo] ([idPrestamo], [idSocio], [tipo], [monto], [motivo], [plazo], [numeroCuenta], [estado], [fechaSolicitud], [fechaPrestamo]) VALUES (N'11', N'22', N'REGULAR', N'120.00', N'motivo', N'1', N'10000025254', N'SOLICITUD', N'2023-10-10', NULL)
GO

INSERT INTO [dbo].[tblPrestamo] ([idPrestamo], [idSocio], [tipo], [monto], [motivo], [plazo], [numeroCuenta], [estado], [fechaSolicitud], [fechaPrestamo]) VALUES (N'12', N'22', N'REGULAR', N'12000.00', N'Prestamo prueba validacion', N'23', N'100025698', N'SOLICITUD', N'2023-10-21', NULL)
GO

INSERT INTO [dbo].[tblPrestamo] ([idPrestamo], [idSocio], [tipo], [monto], [motivo], [plazo], [numeroCuenta], [estado], [fechaSolicitud], [fechaPrestamo]) VALUES (N'13', N'22', N'REGULAR', N'7855.00', N'Prueba garantes', N'32', N'1000000252525', N'SOLICITUD', N'2023-10-21', NULL)
GO

SET IDENTITY_INSERT [dbo].[tblPrestamo] OFF
GO


-- ----------------------------
-- Table structure for tblProvincia
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblProvincia]') AND type IN ('U'))
	DROP TABLE [dbo].[tblProvincia]
GO

CREATE TABLE [dbo].[tblProvincia] (
  [idProvincia] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(30) COLLATE Modern_Spanish_CI_AS  NULL,
  [idDepartamento] int  NULL
)
GO

ALTER TABLE [dbo].[tblProvincia] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblProvincia
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblProvincia] ON
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'1', N'Abel Iturralde', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'2', N'Aroma', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'3', N'Bautista Saavedra', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'4', N'Caranavi', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'5', N'Eliodoro', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'6', N'Franz Tamayo', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'8', N'General José Manuel ', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'9', N'Gualberto Villaroel', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'10', N'Ingavi', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'11', N'Inquisivi', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'12', N'José Ramón Loayza', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'13', N'Larecaja', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'14', N'Los Andes', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'15', N'Manco Kapac', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'16', N'Muñecas', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'17', N'Nor Yungas', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'18', N'Omasuyos', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'19', N'Pacajes', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'20', N'Pedro Domingo Murillo', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'21', N'Sud Yungas', N'2')
GO

INSERT INTO [dbo].[tblProvincia] ([idProvincia], [detalle], [idDepartamento]) VALUES (N'22', N'Carangas', N'5')
GO

SET IDENTITY_INSERT [dbo].[tblProvincia] OFF
GO


-- ----------------------------
-- Table structure for tblRegistro
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblRegistro]') AND type IN ('U'))
	DROP TABLE [dbo].[tblRegistro]
GO

CREATE TABLE [dbo].[tblRegistro] (
  [idRegistro] int  IDENTITY(1,1) NOT NULL,
  [estado] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [fechaAceptacion] date  NULL,
  [observacion] varchar(255) COLLATE Modern_Spanish_CI_AS  NULL,
  [idSocio] int  NULL
)
GO

ALTER TABLE [dbo].[tblRegistro] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblRegistro
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblRegistro] ON
GO

INSERT INTO [dbo].[tblRegistro] ([idRegistro], [estado], [fechaAceptacion], [observacion], [idSocio]) VALUES (N'12', N'ACEPTADO', N'2020-10-09', N'Cedula de identidad poco visible', N'22')
GO

INSERT INTO [dbo].[tblRegistro] ([idRegistro], [estado], [fechaAceptacion], [observacion], [idSocio]) VALUES (N'13', N'ACEPTADO', N'2023-10-20', N'', N'23')
GO

INSERT INTO [dbo].[tblRegistro] ([idRegistro], [estado], [fechaAceptacion], [observacion], [idSocio]) VALUES (N'14', N'ACEPTADO', N'2023-10-10', N'', N'24')
GO

INSERT INTO [dbo].[tblRegistro] ([idRegistro], [estado], [fechaAceptacion], [observacion], [idSocio]) VALUES (N'15', N'ACEPTADO', N'2023-10-10', N'', N'25')
GO

INSERT INTO [dbo].[tblRegistro] ([idRegistro], [estado], [fechaAceptacion], [observacion], [idSocio]) VALUES (N'16', N'PENDIENTE', NULL, NULL, N'26')
GO

INSERT INTO [dbo].[tblRegistro] ([idRegistro], [estado], [fechaAceptacion], [observacion], [idSocio]) VALUES (N'17', N'PENDIENTE', NULL, NULL, N'27')
GO

SET IDENTITY_INSERT [dbo].[tblRegistro] OFF
GO


-- ----------------------------
-- Table structure for tblRestriccion
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblRestriccion]') AND type IN ('U'))
	DROP TABLE [dbo].[tblRestriccion]
GO

CREATE TABLE [dbo].[tblRestriccion] (
  [idRestriccion] int  IDENTITY(1,1) NOT NULL,
  [tipo] varchar(50) COLLATE Modern_Spanish_CI_AS  NULL,
  [idTipoPrestamo] int  NOT NULL
)
GO

ALTER TABLE [dbo].[tblRestriccion] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'ANTIGUEDAD | GRADO',
'SCHEMA', N'dbo',
'TABLE', N'tblRestriccion',
'COLUMN', N'tipo'
GO


-- ----------------------------
-- Records of tblRestriccion
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblRestriccion] ON
GO

INSERT INTO [dbo].[tblRestriccion] ([idRestriccion], [tipo], [idTipoPrestamo]) VALUES (N'1', N'GRADO', N'1')
GO

INSERT INTO [dbo].[tblRestriccion] ([idRestriccion], [tipo], [idTipoPrestamo]) VALUES (N'2', N'ANTIGUEDAD', N'2')
GO

INSERT INTO [dbo].[tblRestriccion] ([idRestriccion], [tipo], [idTipoPrestamo]) VALUES (N'3', N'COMUN', N'3')
GO

INSERT INTO [dbo].[tblRestriccion] ([idRestriccion], [tipo], [idTipoPrestamo]) VALUES (N'4', N'COMUN', N'4')
GO

SET IDENTITY_INSERT [dbo].[tblRestriccion] OFF
GO


-- ----------------------------
-- Table structure for tblSocio
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblSocio]') AND type IN ('U'))
	DROP TABLE [dbo].[tblSocio]
GO

CREATE TABLE [dbo].[tblSocio] (
  [idSocio] int  IDENTITY(1,1) NOT NULL,
  [nombre] varchar(30) COLLATE Modern_Spanish_CI_AS  NULL,
  [paterno] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [materno] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [ci] varchar(10) COLLATE Modern_Spanish_CI_AS  NULL,
  [idExpedicion] int  NULL,
  [fechaNacimiento] date  NULL,
  [idEstadoCivil] int  NULL,
  [celular] varchar(10) COLLATE Modern_Spanish_CI_AS  NULL,
  [correo] varchar(50) COLLATE Modern_Spanish_CI_AS  NULL,
  [password] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [idMunicipio] int  NULL
)
GO

ALTER TABLE [dbo].[tblSocio] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblSocio
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblSocio] ON
GO

INSERT INTO [dbo].[tblSocio] ([idSocio], [nombre], [paterno], [materno], [ci], [idExpedicion], [fechaNacimiento], [idEstadoCivil], [celular], [correo], [password], [idMunicipio]) VALUES (N'22', N'Roberto Carlos', N'Chambi', N'Calizaya', N'13312521', N'2', N'1998-06-27', N'1', N'79656767', N'betocarlis11@gmail.com', N'qwer1234', N'2')
GO

INSERT INTO [dbo].[tblSocio] ([idSocio], [nombre], [paterno], [materno], [ci], [idExpedicion], [fechaNacimiento], [idEstadoCivil], [celular], [correo], [password], [idMunicipio]) VALUES (N'23', N'Esmeralda', N'Palermo', N'Copa', N'15454512', N'4', N'1997-08-12', N'1', N'78785478', N'm1@mail.com', N'qwer1234', N'5')
GO

INSERT INTO [dbo].[tblSocio] ([idSocio], [nombre], [paterno], [materno], [ci], [idExpedicion], [fechaNacimiento], [idEstadoCivil], [celular], [correo], [password], [idMunicipio]) VALUES (N'24', N'Alberto', N'Coro', N'Bueno', N'7845896', N'2', N'1998-12-12', N'2', N'7859658', N'q@mail.com', N'qwer1234', N'5')
GO

INSERT INTO [dbo].[tblSocio] ([idSocio], [nombre], [paterno], [materno], [ci], [idExpedicion], [fechaNacimiento], [idEstadoCivil], [celular], [correo], [password], [idMunicipio]) VALUES (N'25', N'Fernando Horacio', N'mpmomom', N'qwertyu', N'909090', N'5', N'1990-09-08', N'3', N'789456', N'qw@mail.com', N'qwer1234', N'3')
GO

INSERT INTO [dbo].[tblSocio] ([idSocio], [nombre], [paterno], [materno], [ci], [idExpedicion], [fechaNacimiento], [idEstadoCivil], [celular], [correo], [password], [idMunicipio]) VALUES (N'26', N'Rigoberto', N'Jasqui', N'Corominas', N'1331278', N'3', N'1990-12-12', N'3', N'79656767', N'betomarlin@gmail.com', N'qwer1234', NULL)
GO

INSERT INTO [dbo].[tblSocio] ([idSocio], [nombre], [paterno], [materno], [ci], [idExpedicion], [fechaNacimiento], [idEstadoCivil], [celular], [correo], [password], [idMunicipio]) VALUES (N'27', N'Carlos', N'ASdasdasd', N'Conmoasn', N'789879', N'4', N'1990-09-08', N'3', N'79656868', N'rcchambi4@gmail.com', N'654654654w', NULL)
GO

SET IDENTITY_INSERT [dbo].[tblSocio] OFF
GO


-- ----------------------------
-- Table structure for tblTipoPrestamo
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblTipoPrestamo]') AND type IN ('U'))
	DROP TABLE [dbo].[tblTipoPrestamo]
GO

CREATE TABLE [dbo].[tblTipoPrestamo] (
  [idTipoPrestamo] int  IDENTITY(1,1) NOT NULL,
  [detalle] varchar(50) COLLATE Modern_Spanish_CI_AS  NULL,
  [mesMin] int  NULL,
  [mesMax] int  NULL
)
GO

ALTER TABLE [dbo].[tblTipoPrestamo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblTipoPrestamo
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblTipoPrestamo] ON
GO

INSERT INTO [dbo].[tblTipoPrestamo] ([idTipoPrestamo], [detalle], [mesMin], [mesMax]) VALUES (N'1', N'REGULAR', N'12', N'120')
GO

INSERT INTO [dbo].[tblTipoPrestamo] ([idTipoPrestamo], [detalle], [mesMin], [mesMax]) VALUES (N'2', N'AUXILIO', N'1', N'5')
GO

INSERT INTO [dbo].[tblTipoPrestamo] ([idTipoPrestamo], [detalle], [mesMin], [mesMax]) VALUES (N'3', N'EMERGENCIA', N'2', N'30')
GO

INSERT INTO [dbo].[tblTipoPrestamo] ([idTipoPrestamo], [detalle], [mesMin], [mesMax]) VALUES (N'4', N'CONSUMO', N'2', N'30')
GO

SET IDENTITY_INSERT [dbo].[tblTipoPrestamo] OFF
GO


-- ----------------------------
-- Table structure for tblToken
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblToken]') AND type IN ('U'))
	DROP TABLE [dbo].[tblToken]
GO

CREATE TABLE [dbo].[tblToken] (
  [idToken] int  IDENTITY(1,1) NOT NULL,
  [email] varchar(100) COLLATE Modern_Spanish_CI_AS  NULL,
  [token] varchar(10) COLLATE Modern_Spanish_CI_AS  NULL,
  [created_at] date DEFAULT sysdatetime() NULL,
  [confirmed_at] date  NULL,
  [confirmed] char(1) COLLATE Modern_Spanish_CI_AS DEFAULT 'N' NULL
)
GO

ALTER TABLE [dbo].[tblToken] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblToken
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblToken] ON
GO

INSERT INTO [dbo].[tblToken] ([idToken], [email], [token], [created_at], [confirmed_at], [confirmed]) VALUES (N'2', N'admin@gmail.com', N'0375', N'2023-10-12', NULL, N'N')
GO

INSERT INTO [dbo].[tblToken] ([idToken], [email], [token], [created_at], [confirmed_at], [confirmed]) VALUES (N'3', N'carlos@mail.com', N'1304', N'2023-10-12', N'2023-10-12', N'Y')
GO

INSERT INTO [dbo].[tblToken] ([idToken], [email], [token], [created_at], [confirmed_at], [confirmed]) VALUES (N'11', N'nikibar750@mugadget.com', N'0757', N'2023-10-13', NULL, N'N')
GO

INSERT INTO [dbo].[tblToken] ([idToken], [email], [token], [created_at], [confirmed_at], [confirmed]) VALUES (N'14', N'rcchambi4@gmail.com', N'1693', N'2023-10-21', N'2023-10-21', N'Y')
GO

SET IDENTITY_INSERT [dbo].[tblToken] OFF
GO


-- ----------------------------
-- Table structure for tblUsuario
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblUsuario]') AND type IN ('U'))
	DROP TABLE [dbo].[tblUsuario]
GO

CREATE TABLE [dbo].[tblUsuario] (
  [idUsuario] int  IDENTITY(1,1) NOT NULL,
  [usuario] varchar(50) COLLATE Modern_Spanish_CI_AS  NOT NULL,
  [password] varchar(50) COLLATE Modern_Spanish_CI_AS  NOT NULL,
  [nombres] varchar(100) COLLATE Modern_Spanish_CI_AS  NULL,
  [rol] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tblUsuario] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblUsuario
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblUsuario] ON
GO

INSERT INTO [dbo].[tblUsuario] ([idUsuario], [usuario], [password], [nombres], [rol]) VALUES (N'1', N'admin', N'admin', N'ADMINISTRADOR', N'ADMIN')
GO

SET IDENTITY_INSERT [dbo].[tblUsuario] OFF
GO


-- ----------------------------
-- Table structure for tblValoresRestriccion
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblValoresRestriccion]') AND type IN ('U'))
	DROP TABLE [dbo].[tblValoresRestriccion]
GO

CREATE TABLE [dbo].[tblValoresRestriccion] (
  [idValoresRestriccion] int  IDENTITY(1,1) NOT NULL,
  [montoMax] float(53)  NULL,
  [idGrado] int  NULL,
  [antiguedad] int  NULL,
  [idRestriccion] int  NULL
)
GO

ALTER TABLE [dbo].[tblValoresRestriccion] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'MESES DE ANTIGUEDAD',
'SCHEMA', N'dbo',
'TABLE', N'tblValoresRestriccion',
'COLUMN', N'antiguedad'
GO


-- ----------------------------
-- Records of tblValoresRestriccion
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblValoresRestriccion] ON
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'1', N'27000', N'1', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'2', N'27000', N'2', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'3', N'27000', N'3', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'4', N'27000', N'4', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'5', N'25000', N'5', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'6', N'27000', N'18', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'7', N'27000', N'19', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'8', N'27000', N'20', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'9', N'27000', N'21', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'10', N'27000', N'36', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'11', N'27000', N'37', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'12', N'27000', N'38', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'13', N'27000', N'39', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'14', N'25000', N'22', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'15', N'25000', N'40', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'16', N'23000', N'6', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'17', N'23000', N'23', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'18', N'23000', N'41', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'19', N'20000', N'7', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'20', N'20000', N'10', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'21', N'20000', N'11', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'22', N'20000', N'12', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'23', N'20000', N'13', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'24', N'20000', N'24', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'25', N'20000', N'28', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'26', N'20000', N'29', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'27', N'20000', N'30', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'28', N'20000', N'31', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'29', N'20000', N'42', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'30', N'20000', N'90', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'31', N'18000', N'8', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'32', N'18000', N'25', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'33', N'18000', N'43', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'34', N'16000', N'9', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'35', N'16000', N'26', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'36', N'16000', N'44', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'37', N'16000', N'14', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'38', N'16000', N'32', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'39', N'16000', N'49', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'40', N'14000', N'15', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'41', N'14000', N'16', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'42', N'14000', N'33', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'43', N'14000', N'34', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'44', N'14000', N'50', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'45', N'14000', N'51', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'46', N'14000', N'89', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'47', N'12000', N'17', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'48', N'12000', N'35', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'49', N'12000', N'52', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'50', N'12000', N'87', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'51', N'12000', N'88', NULL, N'1')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'52', N'1700', NULL, N'120', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'53', N'1600', NULL, N'108', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'54', N'1500', NULL, N'96', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'55', N'1400', NULL, N'84', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'56', N'1300', NULL, N'72', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'57', N'1200', NULL, N'60', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'58', N'1100', NULL, N'48', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'59', N'1000', NULL, N'36', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'60', N'900', NULL, N'24', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'61', N'800', NULL, N'12', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'62', N'700', NULL, N'6', N'2')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'63', N'3000', NULL, NULL, N'3')
GO

INSERT INTO [dbo].[tblValoresRestriccion] ([idValoresRestriccion], [montoMax], [idGrado], [antiguedad], [idRestriccion]) VALUES (N'64', N'2500', NULL, NULL, N'4')
GO

SET IDENTITY_INSERT [dbo].[tblValoresRestriccion] OFF
GO


-- ----------------------------
-- Table structure for tblVivienda
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblVivienda]') AND type IN ('U'))
	DROP TABLE [dbo].[tblVivienda]
GO

CREATE TABLE [dbo].[tblVivienda] (
  [idVivienda] int  IDENTITY(1,1) NOT NULL,
  [calle] varchar(50) COLLATE Modern_Spanish_CI_AS  NULL,
  [avenida] varchar(50) COLLATE Modern_Spanish_CI_AS  NULL,
  [zona] varchar(50) COLLATE Modern_Spanish_CI_AS  NULL,
  [numero] varchar(10) COLLATE Modern_Spanish_CI_AS  NULL,
  [detalle] varchar(255) COLLATE Modern_Spanish_CI_AS  NULL,
  [localidad] varchar(100) COLLATE Modern_Spanish_CI_AS  NULL,
  [idSocio] int  NULL,
  [idDepartamento] int  NULL
)
GO

ALTER TABLE [dbo].[tblVivienda] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of tblVivienda
-- ----------------------------
SET IDENTITY_INSERT [dbo].[tblVivienda] ON
GO

INSERT INTO [dbo].[tblVivienda] ([idVivienda], [calle], [avenida], [zona], [numero], [detalle], [localidad], [idSocio], [idDepartamento]) VALUES (N'16', N'Coripata', NULL, N'Nuevos Horizontes II', N'7085', NULL, N'Distrito 2', N'22', N'2')
GO

INSERT INTO [dbo].[tblVivienda] ([idVivienda], [calle], [avenida], [zona], [numero], [detalle], [localidad], [idSocio], [idDepartamento]) VALUES (N'17', N'Av. Mexico', NULL, N'Cooperativa', N'99', NULL, N'Tercer anillo', N'23', N'4')
GO

INSERT INTO [dbo].[tblVivienda] ([idVivienda], [calle], [avenida], [zona], [numero], [detalle], [localidad], [idSocio], [idDepartamento]) VALUES (N'18', N'Av Mexico', NULL, N'Corazon', N'989', NULL, N'La Costella', N'24', N'4')
GO

INSERT INTO [dbo].[tblVivienda] ([idVivienda], [calle], [avenida], [zona], [numero], [detalle], [localidad], [idSocio], [idDepartamento]) VALUES (N'19', N'Verde', NULL, N'Costa', N'28-A', NULL, N'Lacoste', N'25', N'9')
GO

INSERT INTO [dbo].[tblVivienda] ([idVivienda], [calle], [avenida], [zona], [numero], [detalle], [localidad], [idSocio], [idDepartamento]) VALUES (N'20', N'Calle', NULL, N'Comodidad', N'909090', NULL, N'Paralelo', N'26', N'3')
GO

INSERT INTO [dbo].[tblVivienda] ([idVivienda], [calle], [avenida], [zona], [numero], [detalle], [localidad], [idSocio], [idDepartamento]) VALUES (N'21', N'Coripata', NULL, N'La Paz', N'898', NULL, N'Oruro', N'27', N'1')
GO

SET IDENTITY_INSERT [dbo].[tblVivienda] OFF
GO


-- ----------------------------
-- Auto increment value for tblArma
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblArma]', RESEED, 30)
GO


-- ----------------------------
-- Primary Key structure for table tblArma
-- ----------------------------
ALTER TABLE [dbo].[tblArma] ADD CONSTRAINT [PK__tblArma__750E0BBA3CD5BC07] PRIMARY KEY CLUSTERED ([idArma])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblDepartamento
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblDepartamento]', RESEED, 9)
GO


-- ----------------------------
-- Primary Key structure for table tblDepartamento
-- ----------------------------
ALTER TABLE [dbo].[tblDepartamento] ADD CONSTRAINT [PK__tblDepar__C225F98D844623FB] PRIMARY KEY CLUSTERED ([idDepartamento])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblDetalleMilitar
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblDetalleMilitar]', RESEED, 18)
GO


-- ----------------------------
-- Primary Key structure for table tblDetalleMilitar
-- ----------------------------
ALTER TABLE [dbo].[tblDetalleMilitar] ADD CONSTRAINT [PK__tblDetal__1248F2BF61426DE6] PRIMARY KEY CLUSTERED ([idDetalleMilitar])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblEstadoCivil
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblEstadoCivil]', RESEED, 4)
GO


-- ----------------------------
-- Primary Key structure for table tblEstadoCivil
-- ----------------------------
ALTER TABLE [dbo].[tblEstadoCivil] ADD CONSTRAINT [PK__tblEstad__CEA7E7F15D25BBC0] PRIMARY KEY CLUSTERED ([idEstadoCivil])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblExpedicion
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblExpedicion]', RESEED, 9)
GO


-- ----------------------------
-- Primary Key structure for table tblExpedicion
-- ----------------------------
ALTER TABLE [dbo].[tblExpedicion] ADD CONSTRAINT [PK__tblExped__31A712ABA7C551A3] PRIMARY KEY CLUSTERED ([idExpedicion])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblFuerza
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblFuerza]', RESEED, 4)
GO


-- ----------------------------
-- Primary Key structure for table tblFuerza
-- ----------------------------
ALTER TABLE [dbo].[tblFuerza] ADD CONSTRAINT [PK__tblFuerz__4B44251FEF4E8AFD] PRIMARY KEY CLUSTERED ([idFuerza])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblGarante
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblGarante]', RESEED, 2)
GO


-- ----------------------------
-- Primary Key structure for table tblGarante
-- ----------------------------
ALTER TABLE [dbo].[tblGarante] ADD CONSTRAINT [PK__tblGaran__071AE8B6B7CAEA31] PRIMARY KEY CLUSTERED ([idGarante])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblGrado
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblGrado]', RESEED, 91)
GO


-- ----------------------------
-- Primary Key structure for table tblGrado
-- ----------------------------
ALTER TABLE [dbo].[tblGrado] ADD CONSTRAINT [PK__tblGrado__7AD7DF273C9AEDFE] PRIMARY KEY CLUSTERED ([idGrado])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblLocalidad
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblLocalidad]', RESEED, 9)
GO


-- ----------------------------
-- Primary Key structure for table tblLocalidad
-- ----------------------------
ALTER TABLE [dbo].[tblLocalidad] ADD CONSTRAINT [PK__tblLocal__548E364EBF541B10] PRIMARY KEY CLUSTERED ([idLocalidad])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblMunicipio
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblMunicipio]', RESEED, 5)
GO


-- ----------------------------
-- Primary Key structure for table tblMunicipio
-- ----------------------------
ALTER TABLE [dbo].[tblMunicipio] ADD CONSTRAINT [PK__tblMunic__FD10E400187CE597] PRIMARY KEY CLUSTERED ([idMunicipio])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblPrestamo
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblPrestamo]', RESEED, 13)
GO


-- ----------------------------
-- Primary Key structure for table tblPrestamo
-- ----------------------------
ALTER TABLE [dbo].[tblPrestamo] ADD CONSTRAINT [PK__tblPrest__A4876C135E6CA069] PRIMARY KEY CLUSTERED ([idPrestamo])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblProvincia
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblProvincia]', RESEED, 22)
GO


-- ----------------------------
-- Primary Key structure for table tblProvincia
-- ----------------------------
ALTER TABLE [dbo].[tblProvincia] ADD CONSTRAINT [PK__tblProvi__5F9F113CC3C8C395] PRIMARY KEY CLUSTERED ([idProvincia])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblRegistro
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblRegistro]', RESEED, 17)
GO


-- ----------------------------
-- Primary Key structure for table tblRegistro
-- ----------------------------
ALTER TABLE [dbo].[tblRegistro] ADD CONSTRAINT [PK__tblRegis__62FC8F588573C0AA] PRIMARY KEY CLUSTERED ([idRegistro])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblRestriccion
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblRestriccion]', RESEED, 4)
GO


-- ----------------------------
-- Primary Key structure for table tblRestriccion
-- ----------------------------
ALTER TABLE [dbo].[tblRestriccion] ADD CONSTRAINT [PK__tblRestr__E77BDD42CE8F9933] PRIMARY KEY CLUSTERED ([idRestriccion])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblSocio
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblSocio]', RESEED, 27)
GO


-- ----------------------------
-- Primary Key structure for table tblSocio
-- ----------------------------
ALTER TABLE [dbo].[tblSocio] ADD CONSTRAINT [PK__tblSocio__4D95C75234BBB2AD] PRIMARY KEY CLUSTERED ([idSocio])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblTipoPrestamo
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblTipoPrestamo]', RESEED, 4)
GO


-- ----------------------------
-- Primary Key structure for table tblTipoPrestamo
-- ----------------------------
ALTER TABLE [dbo].[tblTipoPrestamo] ADD CONSTRAINT [PK__tblTipoP__3BB2EDD787217EA4] PRIMARY KEY CLUSTERED ([idTipoPrestamo])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblToken
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblToken]', RESEED, 14)
GO


-- ----------------------------
-- Primary Key structure for table tblToken
-- ----------------------------
ALTER TABLE [dbo].[tblToken] ADD CONSTRAINT [PK__tblToken__FEFE350D662E07A8] PRIMARY KEY CLUSTERED ([idToken])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblUsuario
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblUsuario]', RESEED, 1)
GO


-- ----------------------------
-- Primary Key structure for table tblUsuario
-- ----------------------------
ALTER TABLE [dbo].[tblUsuario] ADD CONSTRAINT [PK__tblUsuar__645723A69D3973C9] PRIMARY KEY CLUSTERED ([idUsuario])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblValoresRestriccion
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblValoresRestriccion]', RESEED, 64)
GO


-- ----------------------------
-- Primary Key structure for table tblValoresRestriccion
-- ----------------------------
ALTER TABLE [dbo].[tblValoresRestriccion] ADD CONSTRAINT [PK__tblValor__B7B0BC4E91B84ECB] PRIMARY KEY CLUSTERED ([idValoresRestriccion])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for tblVivienda
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblVivienda]', RESEED, 21)
GO


-- ----------------------------
-- Primary Key structure for table tblVivienda
-- ----------------------------
ALTER TABLE [dbo].[tblVivienda] ADD CONSTRAINT [PK__tblVivie__42C575FCCB4AF664] PRIMARY KEY CLUSTERED ([idVivienda])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

