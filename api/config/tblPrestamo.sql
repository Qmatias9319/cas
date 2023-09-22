/*
 Navicat Premium Data Transfer

 Source Server         : local 26 wil
 Source Server Type    : SQL Server
 Source Server Version : 15002000
 Source Host           : 192.168.10.26:1433
 Source Catalog        : cooperativa
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 15002000
 File Encoding         : 65001

 Date: 22/09/2023 12:11:41
*/


-- ----------------------------
-- Table structure for tblPrestamo
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[tblPrestamo]') AND type IN ('U'))
	DROP TABLE [dbo].[tblPrestamo]
GO

CREATE TABLE [dbo].[tblPrestamo] (
  [idPrestamo] int  IDENTITY(1,1) NOT NULL,
  [idCliente] int  NULL,
  [tipoPrestamo] varchar(50) COLLATE Modern_Spanish_CI_AS  NULL,
  [monto] float(53)  NULL,
  [motivo] varchar(120) COLLATE Modern_Spanish_CI_AS  NULL,
  [plazo] int  NULL,
  [nroCuenta] varchar(35) COLLATE Modern_Spanish_CI_AS  NULL,
  [garante1] int  NULL,
  [garante2] int  NULL,
  [estado] varchar(20) COLLATE Modern_Spanish_CI_AS  NULL,
  [fechaSolicitud] date DEFAULT getdate() NULL,
  [fechaPrestamo] date  NULL
)
GO

ALTER TABLE [dbo].[tblPrestamo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Auto increment value for tblPrestamo
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[tblPrestamo]', RESEED, 12)
GO


-- ----------------------------
-- Primary Key structure for table tblPrestamo
-- ----------------------------
ALTER TABLE [dbo].[tblPrestamo] ADD CONSTRAINT [PK__tblPrest__A4876C13F08735BB] PRIMARY KEY CLUSTERED ([idPrestamo])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

