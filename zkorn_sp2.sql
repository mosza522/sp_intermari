-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2018 at 09:39 AM
-- Server version: 5.5.31
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zkorn_sp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ck_alert`
--

CREATE TABLE `ck_alert` (
  `id` int(10) UNSIGNED NOT NULL,
  `sMode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sController` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sMethod` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sAction` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sMessages` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_alert`
--

INSERT INTO `ck_alert` (`id`, `sMode`, `sController`, `sMethod`, `sAction`, `sMessages`, `created_at`, `updated_at`) VALUES
(1, 'Success', 'FTS\\PrepareBuoyController', 'AjaxInsert', NULL, '', '2017-10-11 08:35:54', '2017-10-11 08:35:54'),
(2, 'Success', 'FTS\\OperationElectricityController', 'store', NULL, '', '2017-10-11 08:36:51', '2017-10-11 08:36:51'),
(3, 'Success', 'FTS\\OperationCraneController', 'store', NULL, '', '2017-10-11 08:37:28', '2017-10-11 08:37:28'),
(4, 'Success', 'FTS\\PrepareStaffController', 'update', NULL, '', '2017-10-11 08:38:45', '2017-10-11 08:38:45'),
(5, 'Warning', 'FTS\\PrepareStaffController', 'index', NULL, '', '2017-10-11 08:38:54', '2017-10-11 08:38:54'),
(6, 'Success', 'FTS\\PrepareMachineController', 'AjaxInsert', NULL, '', '2017-10-11 08:41:36', '2017-10-11 08:41:36'),
(7, 'Success', 'Master\\SMD\\BoatController', 'store', NULL, '', '2017-10-16 03:20:56', '2017-10-16 03:20:56'),
(8, 'Success', 'SMD\\SMDController', 'store', NULL, '', '2017-10-16 03:21:54', '2017-10-16 03:21:54'),
(9, 'Success', 'SMD\\SMDController', 'saveBuoy', NULL, '', '2017-10-16 03:23:20', '2017-10-16 03:23:20'),
(10, 'Success', 'SMD\\SMDController', 'saveShip', NULL, '', '2017-10-16 03:24:37', '2017-10-16 03:24:37'),
(11, 'Success', 'SMD\\SMDController', 'update', NULL, '', '2017-10-16 03:37:24', '2017-10-16 03:37:24'),
(12, 'Danger', 'FTS\\PrepareStaffController', 'index', NULL, '', '2017-10-16 03:37:32', '2017-10-16 03:37:32'),
(13, 'Success', 'SMD\\SMDController', 'ItemCopy', NULL, '', '2017-10-16 04:06:04', '2017-10-16 04:06:04'),
(14, 'Danger', 'SMD\\SMDController', 'BlackHole', NULL, '', '2017-10-16 04:06:05', '2017-10-16 04:06:05'),
(15, 'Success', 'FTS\\OperationStaffController', 'store', NULL, '', '2017-10-16 04:08:20', '2017-10-16 04:08:20'),
(16, 'Success', 'FTS\\PrepareSweepController', 'store', NULL, '', '2017-10-16 07:32:44', '2017-10-16 07:32:44'),
(17, 'Success', 'FTS\\PrepareForemanController', 'store', NULL, '', '2017-10-16 07:32:59', '2017-10-16 07:32:59'),
(18, 'Success', 'FTS\\PrepareBuoyController', 'AjaxUpdate', NULL, '', '2017-10-16 07:34:58', '2017-10-16 07:34:58'),
(19, 'Warning', 'FTS\\OperationElectricityController', 'store', 'Duplicate', '', '2017-10-17 02:45:16', '2017-10-17 02:45:16'),
(20, 'Success', 'Master\\FTS\\BuoyMachineController', 'update', NULL, '', '2017-10-17 03:58:29', '2017-10-17 03:58:29'),
(21, 'Success', 'Master\\FTS\\BuoyMachineController', 'destroy', NULL, '', '2017-10-17 03:59:03', '2017-10-17 03:59:03'),
(22, 'Danger', 'FTS\\OperationCraneController', 'show', NULL, '', '2017-10-18 10:04:21', '2017-10-18 10:04:21'),
(23, 'Success', 'FTS\\PrepareForemanController', 'update', NULL, '', '2017-10-18 11:01:32', '2017-10-18 11:01:32'),
(24, 'Success', 'SMD\\SMDController', 'saveBlackHole', NULL, '', '2017-10-19 03:26:21', '2017-10-19 03:26:21'),
(25, 'Warning', 'FTS\\PrepareBuoyController', 'AjaxInsert', NULL, '', '2017-10-19 03:50:07', '2017-10-19 03:50:07'),
(26, 'Success', 'FTS\\PrepareSweepController', 'AjaxInsert', NULL, '', '2017-10-26 17:54:33', '2017-10-26 17:54:33'),
(27, 'Warning', 'FTS\\PrepareSweepController', 'AjaxInsert', NULL, '', '2017-10-26 17:55:08', '2017-10-26 17:55:08'),
(28, 'Danger', 'FTS\\PrepareSweepController', 'AjaxDelete', NULL, '', '2017-10-26 17:56:31', '2017-10-26 17:56:31'),
(29, 'Danger', 'FTS\\PrepareSweepController', 'AjaxUpdate', NULL, '', '2017-10-26 18:02:38', '2017-10-26 18:02:38'),
(30, 'Success', 'FTS\\PrepareSweepController', 'AjaxUpdate', NULL, '', '2017-10-26 18:05:43', '2017-10-26 18:05:43'),
(31, 'Success', 'FTS\\PrepareSweepController', 'AjaxDelete', NULL, '', '2017-10-26 18:05:48', '2017-10-26 18:05:48'),
(32, 'Success', 'FTS\\PrepareForemanController', 'AjaxInsert', NULL, '', '2017-10-26 18:17:20', '2017-10-26 18:17:20'),
(33, 'Success', 'FTS\\PrepareForemanController', 'AjaxUpdate', NULL, '', '2017-10-26 18:18:28', '2017-10-26 18:18:28'),
(34, 'Success', 'SMD\\SMDController', 'saveThaSin', NULL, '', '2017-10-26 19:52:21', '2017-10-26 19:52:21'),
(35, 'Success', 'CLM\\PrepareSweepController', 'AjaxInsert', NULL, '', '2017-10-26 20:23:56', '2017-10-26 20:23:56'),
(36, 'Success', 'CLM\\PrepareSweepController', 'AjaxUpdate', NULL, '', '2017-10-26 20:25:58', '2017-10-26 20:25:58'),
(37, 'Success', 'CLM\\PrepareSweepController', 'AjaxDelete', NULL, '', '2017-10-26 20:26:04', '2017-10-26 20:26:04'),
(38, 'Success', 'CLM\\PrepareForemanController', 'AjaxInsert', NULL, '', '2017-10-26 20:26:39', '2017-10-26 20:26:39'),
(39, 'Success', 'CLM\\PrepareForemanController', 'AjaxUpdate', NULL, '', '2017-10-26 20:26:45', '2017-10-26 20:26:45'),
(40, 'Success', 'CLM\\PrepareForemanController', 'AjaxDelete', NULL, '', '2017-10-26 20:26:50', '2017-10-26 20:26:50'),
(41, 'Success', 'CLM\\PrepareMachineController', 'AjaxInsert', NULL, '', '2017-10-26 20:40:40', '2017-10-26 20:40:40'),
(42, 'Success', 'CLM\\PrepareMachineController', 'AjaxUpdate', NULL, '', '2017-10-26 20:41:22', '2017-10-26 20:41:22'),
(43, 'Success', 'CLM\\PrepareMachineController', 'AjaxDelete', NULL, '', '2017-10-26 20:41:35', '2017-10-26 20:41:35'),
(44, 'Success', 'CLM\\PrepareStaffController', 'AjaxInsert', NULL, '', '2017-10-26 21:02:26', '2017-10-26 21:02:26'),
(45, 'Success', 'CLM\\PrepareStaffController', 'AjaxUpdate', NULL, '', '2017-10-26 21:02:37', '2017-10-26 21:02:37'),
(46, 'Success', 'CLM\\PrepareStaffController', 'AjaxDelete', NULL, '', '2017-10-26 21:03:26', '2017-10-26 21:03:26'),
(47, 'Success', 'Master\\FTS\\MachineController', 'update', NULL, '', '2017-10-30 11:00:37', '2017-10-30 11:00:37'),
(48, 'Success', 'Master\\FTS\\MachineController', 'destroy', NULL, '', '2017-10-30 11:06:11', '2017-10-30 11:06:11'),
(49, 'Success', 'Master\\FTS\\MachineController', 'destroy', 'restore', '', '2017-10-30 16:07:50', '2017-10-30 16:07:50'),
(50, 'Success', 'Master\\SWP\\MachineController', 'store', NULL, '', '2017-10-30 16:57:17', '2017-10-30 16:57:17'),
(51, 'Success', 'Master\\SWP\\MachineController', 'update', NULL, '', '2017-10-30 16:57:31', '2017-10-30 16:57:31'),
(52, 'Success', 'Master\\SWP\\MachineController', 'destroy', NULL, '', '2017-10-30 16:58:28', '2017-10-30 16:58:28'),
(53, 'Success', 'Master\\SWP\\MachineController', 'destroy', 'restore', '', '2017-10-30 16:58:43', '2017-10-30 16:58:43'),
(54, 'Success', 'Machine\\GrabController', 'store', NULL, '', '2017-11-08 09:10:57', '2017-11-08 09:10:57'),
(55, 'Success', 'SMD\\SMDController', 'saveTruck', NULL, '', '2017-11-13 09:40:38', '2017-11-13 09:40:38'),
(56, 'Success', 'Master\\SMD\\HarborController', 'store', NULL, '', '2017-11-13 10:02:38', '2017-11-13 10:02:38'),
(57, 'Success', 'Fuel\\FuelController', 'create', NULL, '', '2017-11-15 06:40:32', '2017-11-15 06:40:32'),
(58, 'Success', 'Fuel\\FuelController', 'update', NULL, '', '2017-11-15 10:12:41', '2017-11-15 10:12:41'),
(59, 'Success', 'Fuel\\FuelController', 'del', NULL, '', '2017-11-16 03:49:42', '2017-11-16 03:49:42'),
(60, 'Success', 'Fuel\\FuelstockController', 'createForboat', NULL, '', '2017-11-17 07:44:49', '2017-11-17 07:44:49'),
(61, 'Success', 'SWP\\PrepareSweepController', 'AjaxInsert', NULL, '', '2017-11-17 09:05:52', '2017-11-17 09:05:52'),
(62, 'Success', 'SWP\\PrepareSweepController', 'AjaxUpdate', NULL, '', '2017-11-17 09:17:55', '2017-11-17 09:17:55'),
(63, 'Success', 'SWP\\PrepareSweepController', 'AjaxDelete', NULL, '', '2017-11-17 09:18:13', '2017-11-17 09:18:13'),
(64, 'Success', 'SWP\\PrepareForemanController', 'AjaxInsert', NULL, '', '2017-11-17 09:37:32', '2017-11-17 09:37:32'),
(65, 'Success', 'SWP\\PrepareForemanController', 'AjaxUpdate', NULL, '', '2017-11-17 09:37:53', '2017-11-17 09:37:53'),
(66, 'Warning', 'SWP\\PrepareForemanController', 'AjaxInsert', NULL, '', '2017-11-17 10:34:30', '2017-11-17 10:34:30'),
(67, 'Warning', 'SWP\\PrepareSweepController', 'AjaxInsert', NULL, '', '2017-11-17 10:36:30', '2017-11-17 10:36:30'),
(68, 'Success', 'SWP\\PrepareMachineController', 'AjaxInsert', NULL, '', '2017-11-19 19:28:20', '2017-11-19 19:28:20'),
(69, 'Success', 'SWP\\PrepareMachineController', 'AjaxUpdate', NULL, '', '2017-11-19 19:28:32', '2017-11-19 19:28:32'),
(70, 'Danger', 'SWP\\PrepareMachineController', 'AjaxInsert', NULL, '', '2017-11-19 19:29:29', '2017-11-19 19:29:29'),
(71, 'Success', 'SMD\\SMDController', 'ItemRemove', NULL, '', '2017-11-19 19:39:40', '2017-11-19 19:39:40'),
(72, 'Success', 'SWP\\PrepareStaffController', 'AjaxInsert', NULL, '', '2017-11-19 19:46:27', '2017-11-19 19:46:27'),
(73, 'Success', 'SWP\\PrepareStaffController', 'AjaxUpdate', NULL, '', '2017-11-19 19:49:22', '2017-11-19 19:49:22'),
(74, 'Success', 'Fuel\\FuelstockController', 'AddFuel', NULL, '', '2017-11-21 10:52:48', '2017-11-21 10:52:48'),
(75, 'Success', 'Fuel\\FuelstockController', 'ReduceFuel', NULL, '', '2017-11-22 03:52:33', '2017-11-22 03:52:33'),
(76, 'Success', 'Fuel\\FuelstockController', 'createReceive', NULL, '', '2017-11-22 08:39:42', '2017-11-22 08:39:42'),
(77, 'Success', 'Fuel\\FuelstockController', 'createForwork', NULL, '', '2017-11-22 10:54:08', '2017-11-22 10:54:08'),
(78, 'Success', 'Fuel\\FuelstockController', 'createForcompany', NULL, '', '2017-11-23 04:35:44', '2017-11-23 04:35:44'),
(79, 'Danger', 'SMD\\SMDController', 'Truck', NULL, '', '2017-11-23 07:47:02', '2017-11-23 07:47:02'),
(80, 'Success', 'SMD\\SMDController', 'saveStevieDore', NULL, '', '2017-11-24 03:50:52', '2017-11-24 03:50:52'),
(81, 'Success', 'Fuel\\FuelstockController', 'createForsell', NULL, '', '2017-11-24 08:47:45', '2017-11-24 08:47:45'),
(82, 'Success', 'Fuel\\FuelstockController', 'del', NULL, '', '2017-11-27 09:02:57', '2017-11-27 09:02:57'),
(83, 'Success', 'Fuel\\FuelApproveController', 'approved', NULL, '', '2017-11-28 09:07:01', '2017-11-28 09:07:01'),
(84, 'Success', 'Fuel\\FuelApproveController', 'notapproved', NULL, '', '2017-11-28 10:57:25', '2017-11-28 10:57:25'),
(85, 'Success', 'Machine\\MachineConditionController', 'store', NULL, '', '2017-11-29 08:47:16', '2017-11-29 08:47:16'),
(86, 'Success', 'Machine\\ElectricityController', 'store', NULL, '', '2017-12-01 07:07:33', '2017-12-01 07:07:33'),
(87, 'Success', 'FTS\\PrepareBuoyController', 'AjaxDelete', NULL, '', '2017-12-02 05:50:50', '2017-12-02 05:50:50'),
(88, 'Success', 'Machine\\CraneController', 'store', NULL, '', '2017-12-04 02:46:08', '2017-12-04 02:46:08'),
(89, 'Success', 'Machine\\ConveyorController', 'store', NULL, '', '2017-12-04 09:22:32', '2017-12-04 09:22:32'),
(90, 'Danger', 'SWP\\PrepareSweepController', 'AjaxInsert', NULL, '', '2017-12-04 10:47:47', '2017-12-04 10:47:47'),
(91, 'Success', 'SWP\\Operation\\FuelController', 'store', NULL, '', '2017-12-04 11:00:31', '2017-12-04 11:00:31'),
(92, 'Danger', 'SWP\\Operation\\FuelController', 'update', NULL, '', '2017-12-04 11:24:37', '2017-12-04 11:24:37'),
(93, 'Success', 'SWP\\Operation\\FuelController', 'update', NULL, '', '2017-12-04 11:26:04', '2017-12-04 11:26:04'),
(94, 'Success', 'SWP\\Operation\\FuelController', 'destroy', NULL, '', '2017-12-04 11:30:29', '2017-12-04 11:30:29'),
(95, 'Success', 'FTS\\PrepareMachineController', 'AjaxUpdate', NULL, '', '2017-12-06 07:52:48', '2017-12-06 07:52:48'),
(96, 'Success', 'FTS\\PrepareStaffController', 'AjaxInsert', NULL, '', '2017-12-06 07:54:42', '2017-12-06 07:54:42'),
(97, 'Warning', 'FTS\\PrepareController', 'show', NULL, '', '2017-12-21 08:51:52', '2017-12-21 08:51:52'),
(98, 'Success', 'Fuel\\FuelstockController', 'approve', NULL, '', '2017-12-24 06:07:08', '2017-12-24 06:07:08'),
(99, 'Success', 'Fuel\\FuelstockController', 'notapprove', NULL, '', '2017-12-24 06:15:05', '2017-12-24 06:15:05'),
(100, 'Success', 'SMD\\SMDController', 'destroy', NULL, '', '2017-12-25 04:05:42', '2017-12-25 04:05:42'),
(101, 'Success', 'Fuel\\FuelstockController', 'destroy', NULL, '', '2017-12-25 04:39:02', '2017-12-25 04:39:02'),
(102, 'Danger', 'FTS\\PrepareMachineController', 'AjaxInsert', NULL, '', '2017-12-25 05:01:23', '2017-12-25 05:01:23'),
(103, 'Warning', 'FTS\\OperationCraneController', 'store', 'Duplicate', '', '2017-12-25 06:57:55', '2017-12-25 06:57:55'),
(104, 'Success', 'FTS\\OperationMachineController', 'store', NULL, '', '2017-12-25 06:58:55', '2017-12-25 06:58:55'),
(105, 'Success', 'FTS\\OperationOilBuoyController', 'store', NULL, '', '2017-12-25 11:04:27', '2017-12-25 11:04:27'),
(106, 'Warning', 'FTS\\OperationOilBackhoeController', 'store', 'Duplicate', '', '2017-12-26 07:49:14', '2017-12-26 07:49:14'),
(107, 'Success', 'FTS\\OperationOilBackhoeController', 'store', NULL, '', '2017-12-26 07:53:43', '2017-12-26 07:53:43'),
(108, 'Success', 'FTS\\OperationDailyReportController', 'store', NULL, '', '2017-12-26 09:43:04', '2017-12-26 09:43:04'),
(109, 'Warning', 'FTS\\OperationDailyReportController', 'store', 'Duplicate', '', '2017-12-26 09:43:10', '2017-12-26 09:43:10'),
(110, 'Success', 'FTS\\OperationAlongsideController', 'store', NULL, '', '2017-12-26 20:14:56', '2017-12-26 20:14:56'),
(111, 'Success', 'FTS\\OperationDailyReportController', 'Alongside', NULL, '', '2017-12-26 21:40:17', '2017-12-26 21:40:17'),
(112, 'Success', 'FTS\\PrepareMachineController', 'AjaxDelete', NULL, '', '2017-12-27 06:10:35', '2017-12-27 06:10:35'),
(113, 'Success', 'Master\\FTS\\MachineController', 'store', NULL, '', '2017-12-27 08:01:46', '2017-12-27 08:01:46'),
(114, 'Danger', 'SMD\\SMDController', 'Ship', NULL, '', '2017-12-28 08:51:37', '2017-12-28 08:51:37'),
(115, 'Danger', 'FTS\\PrepareBuoyController', 'AjaxDelete', NULL, '', '2018-01-04 11:24:39', '2018-01-04 11:24:39'),
(116, 'Warning', 'FTS\\OperationDailyReportController', 'store', 'Transaction', '', '2018-01-04 15:24:57', '2018-01-04 15:24:57'),
(117, 'Warning', 'FTS\\PrepareForemanController', 'index', NULL, '', '2018-01-05 07:01:55', '2018-01-05 07:01:55'),
(118, 'Success', 'SWP\\Operation\\PlanController', 'store', NULL, '', '2018-01-11 00:52:29', '2018-01-11 00:52:29'),
(119, 'Danger', 'FTS\\PrepareStaffController', 'show', NULL, '', '2018-01-11 02:53:19', '2018-01-11 02:53:19'),
(120, 'Success', 'Machine\\MachineController', 'approve', NULL, '', '2018-01-11 04:41:16', '2018-01-11 04:41:16'),
(121, 'Success', 'Machine\\MachineController', 'notapprove', NULL, '', '2018-01-11 04:42:37', '2018-01-11 04:42:37'),
(122, 'Success', 'SWP\\PrepareMachineController', 'AjaxDelete', NULL, '', '2018-01-11 07:59:13', '2018-01-11 07:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Buoy_Product`
--

CREATE TABLE `ck_Item_Fts_Buoy_Product` (
  `DepartmentID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `WeightMonthly` double NOT NULL,
  `WeightYearly` double NOT NULL,
  `LastWork` timestamp NULL DEFAULT NULL,
  `LastJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ฝ่ายขนถ่ายสินค้าทางทะเล - ทุ่น';

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation`
--

CREATE TABLE `ck_Item_Fts_Operation` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) DEFAULT NULL,
  `DepartmentID` int(10) DEFAULT NULL,
  `work_type` enum('Buoy','StevieDore') COLLATE utf8_unicode_ci DEFAULT 'Buoy',
  `workNumber` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workNote` text COLLATE utf8_unicode_ci,
  `workStaff` int(11) DEFAULT '0' COMMENT 'จำนวนรายชื่อพนักงานปฏิบัติงานเรือใหญ่',
  `workStart` timestamp NULL DEFAULT NULL,
  `workForecast` timestamp NULL DEFAULT NULL,
  `workFinish` timestamp NULL DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1' COMMENT '0. ยกเลิก 1.รอดำเนินการ,2.กำลังดำเนินการ,3 เสร็จ',
  `Staff_01` int(10) DEFAULT NULL COMMENT 'หัวหน้าทุ่น',
  `Staff_02` int(10) DEFAULT NULL COMMENT 'รองหัวหน้าทุ่น',
  `Staff_03` int(10) DEFAULT NULL COMMENT 'จนท. ขับเครน',
  `Staff_04` int(10) DEFAULT NULL COMMENT 'พนักงานควบคุมเครื่องจักรกลหนัก		',
  `Staff_05` int(10) DEFAULT NULL COMMENT 'พนักงานปากเรือ',
  `Staff_06` int(10) DEFAULT NULL COMMENT 'พนง.บำรุงรักษาเครื่องจักรกลหนัก',
  `Staff_07` int(10) DEFAULT NULL COMMENT 'ช่างไฟฟ้า		',
  `Staff_08` int(10) DEFAULT NULL COMMENT 'ช่างเครื่อง		',
  `Staff_09` int(10) DEFAULT NULL COMMENT 'ช่างเชื่อม		',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Fts_Operation`
--

INSERT INTO `ck_Item_Fts_Operation` (`id`, `ItemID`, `DepartmentID`, `work_type`, `workNumber`, `workNote`, `workStaff`, `workStart`, `workForecast`, `workFinish`, `workStatus`, `Staff_01`, `Staff_02`, `Staff_03`, `Staff_04`, `Staff_05`, `Staff_06`, `Staff_07`, `Staff_08`, `Staff_09`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 70, NULL, 'StevieDore', 'FT11801001', NULL, 0, '2018-01-08 06:08:00', '2018-01-11 06:08:00', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-01-04 19:31:01', 2, '2018-01-04 19:31:01', NULL),
(2, 55, NULL, 'StevieDore', 'FT11801002', NULL, 0, '2017-10-18 08:00:00', '2017-10-21 08:00:00', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-01-04 19:31:27', 2, '2018-01-04 19:31:27', NULL),
(3, 2, NULL, 'StevieDore', 'FT11801003', NULL, 0, '2017-09-24 03:05:00', '2017-09-27 03:05:00', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-01-06 03:18:00', 2, '2018-01-06 03:18:00', NULL),
(4, 56, 22, 'Buoy', 'FT11801004', NULL, 0, '0000-00-00 00:00:00', '2018-01-19 02:05:00', '2018-01-11 01:41:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-01-10 10:54:04', 2, '2018-01-11 01:43:10', NULL),
(5, 56, 24, 'Buoy', 'FT11801005', NULL, 6, '0000-00-00 00:00:00', '2018-01-19 02:05:00', NULL, 2, 1, 1, 2, 2, 1, 1, 1, 1, 1, 2, '2018-01-11 02:57:37', 2, '2018-01-11 03:51:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Alongside`
--

CREATE TABLE `ck_Item_Fts_Operation_Alongside` (
  `id` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` date DEFAULT NULL,
  `Loading` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Fts_Operation_Alongside`
--

INSERT INTO `ck_Item_Fts_Operation_Alongside` (`id`, `OperationID`, `workNumber`, `workDate`, `Loading`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'FT11801004-A01', '2018-01-11', 5000, 2, '2018-01-11 03:54:17', 2, '2018-01-11 03:57:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Alongside_Lighter`
--

CREATE TABLE `ck_Item_Fts_Operation_Alongside_Lighter` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL DEFAULT '0',
  `OperationID` int(10) DEFAULT NULL,
  `AlongsideID` int(10) DEFAULT NULL,
  `LighterID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `Consignee` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KGS` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TONS` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Marks` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Alongside` datetime DEFAULT NULL,
  `Commenced` datetime DEFAULT NULL,
  `Completed` datetime DEFAULT NULL,
  `Hatch1` double DEFAULT NULL,
  `Hatch2` double DEFAULT NULL,
  `Hatch3` double DEFAULT NULL,
  `Hatch4` double DEFAULT NULL,
  `Hatch5` double DEFAULT NULL,
  `Hatch6` double DEFAULT NULL,
  `Hatch7` double DEFAULT NULL,
  `Minute` int(11) DEFAULT NULL,
  `MaxLoad` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Fts_Operation_Alongside_Lighter`
--

INSERT INTO `ck_Item_Fts_Operation_Alongside_Lighter` (`id`, `ItemID`, `OperationID`, `AlongsideID`, `LighterID`, `ProductID`, `Consignee`, `KGS`, `TONS`, `Marks`, `Alongside`, `Commenced`, `Completed`, `Hatch1`, `Hatch2`, `Hatch3`, `Hatch4`, `Hatch5`, `Hatch6`, `Hatch7`, `Minute`, `MaxLoad`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 56, 4, 1, 'QQ', 16, 'QQ', '11', '1,000', NULL, '2018-01-10 10:54:00', '2018-01-11 11:00:00', '2018-01-11 12:00:00', 1000, NULL, NULL, NULL, NULL, NULL, NULL, 60, NULL, 2, '2018-01-11 03:54:17', 2, '2018-01-11 04:18:31', NULL),
(2, 56, 4, 1, '1212', 16, '212', '11', '3,000', NULL, '2018-01-11 11:00:00', '2018-01-11 11:00:00', '2018-01-11 16:00:00', 1000, NULL, 1000, NULL, NULL, 1000, NULL, 300, NULL, 2, '2018-01-11 03:56:26', 2, '2018-01-11 04:18:31', NULL),
(3, 56, 4, 1, '342', 16, '434', '10', '1,000', 'qw', '2018-01-10 12:00:00', '2018-01-10 12:00:00', '2018-01-12 12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1000, 2880, NULL, 2, '2018-01-11 03:57:23', 2, '2018-01-11 04:18:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Crane`
--

CREATE TABLE `ck_Item_Fts_Operation_Crane` (
  `id` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Crane_Rebate`
--

CREATE TABLE `ck_Item_Fts_Operation_Crane_Rebate` (
  `CraneID` int(10) NOT NULL,
  `MachineID` int(10) NOT NULL,
  `RebateNo` int(10) NOT NULL,
  `Note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finish_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_use` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Crane_Use`
--

CREATE TABLE `ck_Item_Fts_Operation_Crane_Use` (
  `CraneID` int(10) NOT NULL,
  `MachineID` int(10) NOT NULL,
  `start_at` time DEFAULT NULL,
  `finish_at` time DEFAULT NULL,
  `time_use` int(10) DEFAULT NULL,
  `time_rebate` int(10) DEFAULT NULL,
  `time_remain` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Daily_Report`
--

CREATE TABLE `ck_Item_Fts_Operation_Daily_Report` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) DEFAULT NULL,
  `workNo` int(11) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` date DEFAULT NULL,
  `workDate1` date DEFAULT NULL,
  `workDateETC` datetime DEFAULT NULL,
  `minuteWork` int(11) DEFAULT NULL,
  `minuteStop` int(11) DEFAULT NULL,
  `totalWork` int(11) DEFAULT NULL,
  `totalStop` int(11) DEFAULT NULL,
  `totalTon` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Fts_Operation_Daily_Report`
--

INSERT INTO `ck_Item_Fts_Operation_Daily_Report` (`id`, `ItemID`, `workNo`, `workNumber`, `workDate`, `workDate1`, `workDateETC`, `minuteWork`, `minuteStop`, `totalWork`, `totalStop`, `totalTon`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 56, 1, 'FTS1712001-D01', '2018-01-11', '2018-01-11', '2018-01-11 10:54:00', 3240, 0, NULL, NULL, 4, 2, '2018-01-11 04:01:08', 2, '2018-01-11 04:01:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Daily_Report_List`
--

CREATE TABLE `ck_Item_Fts_Operation_Daily_Report_List` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `DailyReportID` int(10) NOT NULL,
  `Mode` enum('Cargo','Time1','Time2','Time3','Time4','Total','Previous','GrandTotal','Balance') COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hatch1` double DEFAULT NULL,
  `Hatch2` double DEFAULT NULL,
  `Hatch3` double DEFAULT NULL,
  `Hatch4` double DEFAULT NULL,
  `Hatch5` double DEFAULT NULL,
  `Hatch6` double DEFAULT NULL,
  `Hatch7` double DEFAULT NULL,
  `Total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Fts_Operation_Daily_Report_List`
--

INSERT INTO `ck_Item_Fts_Operation_Daily_Report_List` (`id`, `ItemID`, `DailyReportID`, `Mode`, `Hatch1`, `Hatch2`, `Hatch3`, `Hatch4`, `Hatch5`, `Hatch6`, `Hatch7`, `Total`) VALUES
(1, 56, 1, 'Cargo', 10000, 0, 10000, 0, 0, 10000, 10000, 40000),
(2, 56, 1, 'Time1', 0, 0, 0, 0, 0, 0, 125, 125),
(3, 56, 1, 'Time2', 1200, 0, 200, 0, 0, 200, 125, 1725),
(4, 56, 1, 'Time3', 800, 0, 800, 0, 0, 800, 125, 2525),
(5, 56, 1, 'Time4', 0, 0, 0, 0, 0, 0, 125, 125),
(6, 56, 1, 'Total', 2000, 0, 1000, 0, 0, 1000, 500, 4500),
(7, 56, 1, 'Previous', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 56, 1, 'GrandTotal', 2000, 0, 1000, 0, 0, 1000, 500, 4500),
(9, 56, 1, 'Balance', 8000, 0, 9000, 0, 0, 9000, 9500, 35500);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Daily_Report_Remark`
--

CREATE TABLE `ck_Item_Fts_Operation_Daily_Report_Remark` (
  `ItemID` int(10) NOT NULL,
  `DailyReportID` int(10) NOT NULL,
  `start_at` time DEFAULT NULL,
  `finish_at` time DEFAULT NULL,
  `time_note` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Daily_Report_Stop`
--

CREATE TABLE `ck_Item_Fts_Operation_Daily_Report_Stop` (
  `ItemID` int(10) NOT NULL,
  `DailyReportID` int(10) NOT NULL,
  `start_at` time DEFAULT NULL,
  `finish_at` time DEFAULT NULL,
  `time_use` int(10) DEFAULT NULL,
  `time_note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Electricity`
--

CREATE TABLE `ck_Item_Fts_Operation_Electricity` (
  `id` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Electricity_Rebate`
--

CREATE TABLE `ck_Item_Fts_Operation_Electricity_Rebate` (
  `ElectricityID` int(10) NOT NULL,
  `MachineID` int(10) NOT NULL,
  `RebateNo` int(10) NOT NULL,
  `Note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finish_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_use` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Electricity_Use`
--

CREATE TABLE `ck_Item_Fts_Operation_Electricity_Use` (
  `ElectricityID` int(10) NOT NULL,
  `MachineID` int(10) NOT NULL,
  `start_at` time DEFAULT NULL,
  `finish_at` time DEFAULT NULL,
  `time_use` int(10) DEFAULT NULL,
  `time_rebate` int(10) DEFAULT NULL,
  `time_remain` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Machine`
--

CREATE TABLE `ck_Item_Fts_Operation_Machine` (
  `id` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `MachineID` int(10) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` date DEFAULT NULL,
  `workSymptom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDetails` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workEdit` int(1) DEFAULT '0',
  `workStatus` int(1) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Oil_Backhoe`
--

CREATE TABLE `ck_Item_Fts_Operation_Oil_Backhoe` (
  `id` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Oil_Backhoe_Item`
--

CREATE TABLE `ck_Item_Fts_Operation_Oil_Backhoe_Item` (
  `OilBackhoeID` int(10) NOT NULL,
  `MachineID` int(10) NOT NULL,
  `level_start` double DEFAULT NULL,
  `volume_start` double DEFAULT NULL,
  `meter_start` double DEFAULT NULL,
  `oil_fill` double DEFAULT NULL,
  `level_end` double DEFAULT NULL,
  `volume_end` double DEFAULT NULL,
  `meter_end` double DEFAULT NULL,
  `oil_use` double DEFAULT NULL,
  `hour_use` int(10) DEFAULT NULL,
  `average_use` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Oil_Buoy`
--

CREATE TABLE `ck_Item_Fts_Operation_Oil_Buoy` (
  `id` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` date DEFAULT NULL,
  `sounding_before` double DEFAULT NULL,
  `sounding_after` double DEFAULT NULL,
  `sounding_amount` double DEFAULT NULL,
  `generator_before` double DEFAULT NULL,
  `generator_after` double DEFAULT NULL,
  `generator_amount` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Oil_Buoy_Fuel`
--

CREATE TABLE `ck_Item_Fts_Operation_Oil_Buoy_Fuel` (
  `OilBuoyID` int(10) NOT NULL,
  `time_at` time DEFAULT NULL,
  `bearer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter_before` double DEFAULT NULL,
  `meter_after` double DEFAULT NULL,
  `meter_amount` double DEFAULT NULL,
  `jobtype` int(1) DEFAULT NULL,
  `jobdetail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Oil_Buoy_Pick`
--

CREATE TABLE `ck_Item_Fts_Operation_Oil_Buoy_Pick` (
  `OilBuoyID` int(10) NOT NULL,
  `time_at` time DEFAULT NULL,
  `dispenser` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Operation_Staff`
--

CREATE TABLE `ck_Item_Fts_Operation_Staff` (
  `id` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `StaffID` int(10) DEFAULT NULL,
  `workNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workDate` datetime DEFAULT NULL,
  `workStatus` int(1) DEFAULT NULL,
  `workNote` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Prepare_Foreman`
--

CREATE TABLE `ck_Item_Fts_Prepare_Foreman` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `OperationID` int(10) NOT NULL,
  `ForemanID` int(10) DEFAULT NULL,
  `workStart` timestamp NULL DEFAULT NULL,
  `workForecast` timestamp NULL DEFAULT NULL,
  `workFinish` timestamp NULL DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workNote` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Prepare_Staff`
--

CREATE TABLE `ck_Item_Fts_Prepare_Staff` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) DEFAULT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `StaffID` int(10) DEFAULT NULL,
  `workNote` text COLLATE utf8_unicode_ci,
  `workStart_at` datetime DEFAULT NULL,
  `workFinish_at` datetime DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workPrepare` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Fts_Prepare_Staff`
--

INSERT INTO `ck_Item_Fts_Prepare_Staff` (`id`, `ItemID`, `OperationID`, `StaffID`, `workNote`, `workStart_at`, `workFinish_at`, `workStatus`, `workPrepare`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 56, 5, 247, NULL, NULL, NULL, 1, 1, 2, '2018-01-11 02:59:22', 2, '2018-01-11 02:59:22', NULL),
(2, 56, 5, 243, NULL, NULL, NULL, 1, 1, 2, '2018-01-11 02:59:22', 2, '2018-01-11 02:59:22', NULL),
(3, 56, 5, 244, NULL, NULL, NULL, 1, 1, 2, '2018-01-11 02:59:22', 2, '2018-01-11 02:59:22', NULL),
(4, 56, 5, 249, NULL, NULL, NULL, 1, 1, 2, '2018-01-11 02:59:22', 2, '2018-01-11 02:59:22', NULL),
(5, 56, 5, 250, NULL, NULL, NULL, 1, 1, 2, '2018-01-11 02:59:22', 2, '2018-01-11 02:59:22', NULL),
(6, 56, 5, 245, NULL, NULL, NULL, 1, 1, 2, '2018-01-11 02:59:22', 2, '2018-01-11 02:59:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Fts_Prepare_Sweep`
--

CREATE TABLE `ck_Item_Fts_Prepare_Sweep` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `OperationID` int(10) DEFAULT NULL,
  `SweepID` int(10) DEFAULT NULL,
  `workStart` timestamp NULL DEFAULT NULL,
  `workForecast` timestamp NULL DEFAULT NULL,
  `workFinish` timestamp NULL DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workNote` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Fts_Prepare_Sweep`
--

INSERT INTO `ck_Item_Fts_Prepare_Sweep` (`id`, `ItemID`, `OperationID`, `SweepID`, `workStart`, `workForecast`, `workFinish`, `workStatus`, `workNote`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 70, 1, 1, '2018-01-08 06:08:00', '2018-01-11 06:08:00', NULL, 1, NULL, 2, '2018-01-05 08:17:40', 2, '2018-01-05 08:17:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Prepare_Foreman`
--

CREATE TABLE `ck_Item_Prepare_Foreman` (
  `id` int(10) NOT NULL,
  `Division` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ItemID` int(10) NOT NULL,
  `ForemanID` int(10) DEFAULT NULL,
  `workStart` timestamp NULL DEFAULT NULL,
  `workForecast` timestamp NULL DEFAULT NULL,
  `workFinish` timestamp NULL DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workNote` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Prepare_Foreman`
--

INSERT INTO `ck_Item_Prepare_Foreman` (`id`, `Division`, `ItemID`, `ForemanID`, `workStart`, `workForecast`, `workFinish`, `workStatus`, `workNote`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 'SWP', 16, 9, '2017-10-18 08:00:00', '2017-10-21 08:00:00', NULL, 1, '1212', 2, '2017-11-17 09:37:32', 2, '2017-11-17 09:37:52', NULL),
(2, 'CLM', 15, 18, '2017-10-18 08:00:00', '2017-10-21 08:00:00', NULL, 1, '2121', 2, '2017-11-17 09:37:36', 2, '2017-11-17 09:38:01', NULL),
(3, 'CLM', 32, 14, '2017-07-26 03:34:00', '2017-07-29 03:34:00', NULL, 1, NULL, 2, '2017-11-17 09:51:42', 2, '2017-11-17 09:53:17', NULL),
(4, 'TRU', 44, 23, '2017-10-18 08:00:00', '2017-10-21 08:00:00', NULL, 1, NULL, 2, '2017-11-17 10:35:00', 2, '2017-11-17 10:35:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Prepare_Machine`
--

CREATE TABLE `ck_Item_Prepare_Machine` (
  `id` int(10) NOT NULL,
  `Division` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ItemID` int(10) NOT NULL,
  `MachineID` int(11) NOT NULL,
  `workNote` text COLLATE utf8_unicode_ci,
  `workStatus` int(1) DEFAULT '1',
  `InspectionType` enum('B','A','P') COLLATE utf8_unicode_ci DEFAULT 'B' COMMENT 'B ก่อนปฏิบัติงาน   A หลังปฏิบัติงาน P',
  `InspectionStatus` int(1) DEFAULT '0',
  `InspectionCode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InspectionCheck_at` datetime DEFAULT NULL,
  `InspectionApprove_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Prepare_Machine`
--

INSERT INTO `ck_Item_Prepare_Machine` (`id`, `Division`, `ItemID`, `MachineID`, `workNote`, `workStatus`, `InspectionType`, `InspectionStatus`, `InspectionCode`, `InspectionCheck_at`, `InspectionApprove_at`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 'CLM', 15, 133, NULL, 1, 'B', 0, NULL, NULL, NULL, 2, '2017-11-19 19:32:25', 2, '2017-11-19 19:32:25', NULL),
(2, 'CLM', 32, 135, '111', 1, 'B', 0, NULL, NULL, NULL, 2, '2017-11-19 19:35:03', 2, '2017-11-19 19:35:29', NULL),
(3, 'FTS', 70, 11, '111', 1, 'B', 1, 'M1801002', '2018-01-10 14:15:36', NULL, 2, '2018-01-04 19:37:03', 2, '2018-01-12 03:02:59', NULL),
(4, 'FTS', 70, 3, NULL, 1, 'B', 0, NULL, NULL, NULL, 2, '2018-01-06 03:49:29', 2, '2018-01-11 02:15:10', NULL),
(5, 'FTS', 70, 5, NULL, 1, 'B', 1, 'M1801001', '2018-01-10 13:48:33', NULL, 2, '2018-01-10 03:41:48', 2, '2018-01-11 09:29:30', NULL),
(8, 'CLM', 68, 135, NULL, 1, 'B', 0, NULL, NULL, NULL, 2, '2018-01-10 10:28:29', 2, '2018-01-10 10:28:29', NULL),
(9, 'SWP', 16, 134, NULL, 1, 'B', 0, 'M1801002', NULL, NULL, 2, '2018-01-11 00:10:17', 2, '2018-01-11 04:56:20', NULL),
(10, 'FTS', 56, 131, NULL, 1, 'B', 1, 'M1801002', '2018-01-11 17:38:13', NULL, 2, '2018-01-11 01:40:11', 2, '2018-01-12 03:01:29', NULL),
(12, 'FTS', 56, 131, NULL, 1, 'A', 0, NULL, NULL, NULL, 2, '2018-01-11 01:43:00', 2, '2018-01-11 02:09:50', NULL),
(13, 'FTS', 56, 5, NULL, 1, 'B', 0, 'M1801002', NULL, NULL, 2, '2018-01-11 01:43:36', 2, '2018-01-11 03:48:32', NULL),
(14, 'FTS', 56, 138, NULL, 1, 'B', 0, 'M1801002', NULL, NULL, 2, '2018-01-11 03:32:43', 2, '2018-01-11 04:56:31', NULL),
(15, 'CLM', 68, 133, NULL, 0, 'B', 0, NULL, NULL, NULL, 2, '2018-01-11 07:16:21', 2, '2018-01-11 07:59:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Prepare_Staff_Item`
--

CREATE TABLE `ck_Item_Prepare_Staff_Item` (
  `id` int(10) NOT NULL,
  `Division` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ItemID` int(10) DEFAULT NULL,
  `StaffID` int(10) DEFAULT NULL,
  `workNote` text COLLATE utf8_unicode_ci,
  `workStart_at` datetime DEFAULT NULL,
  `workFinish_at` datetime DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workPrepare` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Prepare_Staff_Item`
--

INSERT INTO `ck_Item_Prepare_Staff_Item` (`id`, `Division`, `ItemID`, `StaffID`, `workNote`, `workStart_at`, `workFinish_at`, `workStatus`, `workPrepare`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 'SWP', 16, 68, NULL, NULL, NULL, 1, 1, 2, '2017-11-19 19:48:28', 2, '2017-11-19 19:48:28', NULL),
(2, 'SWP', 16, 69, '1212', NULL, NULL, 1, 1, 2, '2017-11-19 19:48:28', 2, '2017-11-19 19:49:22', NULL),
(3, 'SWP', 16, 70, NULL, NULL, NULL, 1, 1, 2, '2017-11-19 19:48:29', 2, '2017-11-19 19:48:29', NULL),
(4, 'CLM', 32, 48, NULL, NULL, NULL, 1, 1, 2, '2017-11-19 19:53:07', 2, '2017-11-19 19:53:07', NULL),
(5, 'CLM', 32, 49, NULL, NULL, NULL, 1, 1, 2, '2017-11-19 19:53:08', 2, '2017-11-19 19:53:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Prepare_Sweep`
--

CREATE TABLE `ck_Item_Prepare_Sweep` (
  `id` int(10) NOT NULL,
  `Division` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ItemID` int(10) NOT NULL,
  `SweepID` int(10) DEFAULT NULL,
  `workStart` timestamp NULL DEFAULT NULL,
  `workForecast` timestamp NULL DEFAULT NULL,
  `workFinish` timestamp NULL DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workNote` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Prepare_Sweep`
--

INSERT INTO `ck_Item_Prepare_Sweep` (`id`, `Division`, `ItemID`, `SweepID`, `workStart`, `workForecast`, `workFinish`, `workStatus`, `workNote`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 'SWP', 16, 8, '2017-10-18 08:00:00', '2017-10-21 08:00:00', NULL, 0, '2121', 2, '2017-11-17 09:17:36', 2, '2017-11-17 09:18:12', NULL),
(2, 'CLM', 15, 12, '2017-10-18 08:00:00', '2017-10-21 08:00:00', NULL, 1, '1212', 2, '2017-11-17 09:17:48', 2, '2017-11-17 09:17:55', NULL),
(3, 'CLM', 32, 11, '2017-07-26 03:34:00', '2017-07-29 03:34:00', NULL, 1, NULL, 2, '2017-11-17 10:36:23', 2, '2017-11-17 10:36:23', NULL),
(4, 'CLM', 32, 9, '2017-07-26 03:34:00', '2017-07-29 03:34:00', NULL, 1, NULL, 2, '2017-11-17 10:37:20', 2, '2017-11-17 10:37:20', NULL),
(5, 'CLM', 10, 9, '2017-07-26 03:34:00', '2017-07-29 03:34:00', NULL, 1, NULL, 2, '2017-12-04 03:25:00', 2, '2017-12-04 03:25:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Swp_Operation_Fuel`
--

CREATE TABLE `ck_Item_Swp_Operation_Fuel` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) DEFAULT NULL,
  `MachineID` int(10) DEFAULT NULL,
  `FuelCode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขที่การเบิก',
  `FuelNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์',
  `FuelBefore` float DEFAULT '0' COMMENT 'ระดับน้ำมันก่อนเติม	',
  `FuelBalance` float DEFAULT '0' COMMENT 'จำนวนน้ำมันคงเหลือ	',
  `Objective` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วัตถุประสงค์	',
  `PickerName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้เบิก',
  `Status` int(11) DEFAULT '1' COMMENT '1.รอดำเนินการเบิก2. เบิกน้ำมันเรียบร้อย 3. ไม่อนุมัติการเบิก',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Swp_Operation_Plan`
--

CREATE TABLE `ck_Item_Swp_Operation_Plan` (
  `ItemID` int(10) NOT NULL DEFAULT '0',
  `workVolume` double DEFAULT NULL,
  `workMachines` int(11) DEFAULT NULL,
  `workGoal` double DEFAULT NULL COMMENT 'เป้าหมายการขนถ่ายสินค้าต่อวัน',
  `workDay` int(11) DEFAULT '0' COMMENT 'จำนวนรายชื่อพนักงานปฏิบัติงานเรือใหญ่',
  `workEnd` date DEFAULT NULL,
  `workStart` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Swp_Operation_Plan`
--

INSERT INTO `ck_Item_Swp_Operation_Plan` (`ItemID`, `workVolume`, `workMachines`, `workGoal`, `workDay`, `workEnd`, `workStart`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(16, 0, 1, 1200, 19, '2018-01-22', '2018-01-03', 2, '2018-01-11 00:51:42', 2, '2018-01-11 01:21:42', NULL),
(68, 0, 5, 6000, 0, '1970-01-01', '2018-01-11', 2, '2018-01-11 07:14:57', 2, '2018-01-11 07:14:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Swp_Prepare_Foreman`
--

CREATE TABLE `ck_Item_Swp_Prepare_Foreman` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `ForemanID` int(10) DEFAULT NULL,
  `workStart` timestamp NULL DEFAULT NULL,
  `workForecast` timestamp NULL DEFAULT NULL,
  `workFinish` timestamp NULL DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workNote` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Swp_Prepare_Foreman`
--

INSERT INTO `ck_Item_Swp_Prepare_Foreman` (`id`, `ItemID`, `ForemanID`, `workStart`, `workForecast`, `workFinish`, `workStatus`, `workNote`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '2017-09-30 03:28:00', '2017-10-03 03:28:00', NULL, 0, '12121', 2, '2017-10-26 20:26:39', 2, '2017-10-26 20:26:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Swp_Prepare_Machine`
--

CREATE TABLE `ck_Item_Swp_Prepare_Machine` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `MachineID` int(11) NOT NULL,
  `workNote` text COLLATE utf8_unicode_ci,
  `workStatus` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Swp_Prepare_Machine`
--

INSERT INTO `ck_Item_Swp_Prepare_Machine` (`id`, `ItemID`, `MachineID`, `workNote`, `workStatus`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 2, 24, '212', 0, 2, '2017-10-26 20:40:40', 2, '2017-10-26 20:41:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Swp_Prepare_Staff_Item`
--

CREATE TABLE `ck_Item_Swp_Prepare_Staff_Item` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) DEFAULT NULL,
  `StaffID` int(10) DEFAULT NULL,
  `workNote` text COLLATE utf8_unicode_ci,
  `workStart_at` datetime DEFAULT NULL,
  `workFinish_at` datetime DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workPrepare` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Swp_Prepare_Staff_Item`
--

INSERT INTO `ck_Item_Swp_Prepare_Staff_Item` (`id`, `ItemID`, `StaffID`, `workNote`, `workStart_at`, `workFinish_at`, `workStatus`, `workPrepare`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 2, 49, '5555', NULL, NULL, 0, 1, 2, '2017-10-26 21:02:26', 2, '2017-10-26 21:03:26', NULL),
(2, 2, 50, NULL, NULL, NULL, 1, 1, 2, '2017-10-26 21:02:26', 2, '2017-10-26 21:02:26', NULL),
(3, 8, 49, NULL, NULL, NULL, 1, 1, 2, '2017-10-27 03:32:48', 2, '2017-10-27 03:32:48', NULL),
(4, 8, 50, NULL, NULL, NULL, 1, 1, 2, '2017-10-27 03:32:48', 2, '2017-10-27 03:32:48', NULL),
(5, 8, 51, NULL, NULL, NULL, 1, 1, 2, '2017-10-27 03:32:48', 2, '2017-10-27 03:32:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Item_Swp_Prepare_Sweep`
--

CREATE TABLE `ck_Item_Swp_Prepare_Sweep` (
  `id` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `SweepID` int(10) DEFAULT NULL,
  `workStart` timestamp NULL DEFAULT NULL,
  `workForecast` timestamp NULL DEFAULT NULL,
  `workFinish` timestamp NULL DEFAULT NULL,
  `workStatus` int(11) DEFAULT '1',
  `workNote` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Item_Swp_Prepare_Sweep`
--

INSERT INTO `ck_Item_Swp_Prepare_Sweep` (`id`, `ItemID`, `SweepID`, `workStart`, `workForecast`, `workFinish`, `workStatus`, `workNote`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 2, 5, '2017-09-30 03:28:00', '2017-10-03 03:28:00', NULL, 0, '1212', 2, '2017-10-26 20:23:56', 2, '2017-10-26 20:26:04', NULL),
(2, 16, 5, '2017-10-18 08:00:00', '2017-10-21 08:00:00', NULL, 1, NULL, 2, '2017-11-17 09:05:52', 2, '2017-11-17 09:05:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Foreman`
--

CREATE TABLE `ck_Master_Foreman` (
  `id` int(11) NOT NULL,
  `Division` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ForemanType` enum('In House','Out Source') COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanNote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanStatus` int(11) DEFAULT '1',
  `WeightMonthly` double NOT NULL,
  `WeightYearly` double NOT NULL,
  `LastWork` timestamp NULL DEFAULT NULL,
  `LastEnd` timestamp NULL DEFAULT NULL,
  `LastJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueueJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueueStart` timestamp NULL DEFAULT NULL,
  `QueueFinish` timestamp NULL DEFAULT NULL,
  `check_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ฝ่ายขนถ่ายสินค้าทางทะเล - โฟร์แมน';

--
-- Dumping data for table `ck_Master_Foreman`
--

INSERT INTO `ck_Master_Foreman` (`id`, `Division`, `ForemanType`, `ForemanCode`, `ForemanName`, `ForemanNote`, `ForemanStatus`, `WeightMonthly`, `WeightYearly`, `LastWork`, `LastEnd`, `LastJob`, `QueueJob`, `QueueStart`, `QueueFinish`, `check_at`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'FTS', 'In House', NULL, 'นาย นรา  แก้วเก่า', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:17', 2, '2017-10-09 02:41:21', 2, NULL),
(2, 'FTS', 'In House', NULL, 'โฟร์แมน B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(3, 'FTS', 'In House', NULL, 'โฟร์แมน C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:45:53', 2, '2017-08-01 08:45:53', 2, NULL),
(4, 'FTS', 'Out Source', NULL, 'Foreman A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:14', 2, '2017-08-01 08:46:14', 2, NULL),
(5, 'FTS', 'Out Source', NULL, 'Foreman B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:21', 2, '2017-08-01 08:46:21', 2, NULL),
(6, 'FTS', 'Out Source', NULL, 'Foreman C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:28', 2, '2017-08-01 08:46:28', 2, NULL),
(7, 'SWP', 'In House', NULL, 'SWP โฟร์แมน A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(8, 'SWP', 'In House', NULL, 'SWP โฟร์แมน B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(9, 'SWP', 'In House', NULL, 'SWP โฟร์แมน C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:45:53', 2, '2017-08-01 08:45:53', 2, NULL),
(10, 'SWP', 'Out Source', NULL, 'SWP Foreman A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:14', 2, '2017-08-01 08:46:14', 2, NULL),
(11, 'SWP', 'Out Source', NULL, 'SWP Foreman B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:21', 2, '2017-08-01 08:46:21', 2, NULL),
(12, 'SWP', 'Out Source', NULL, ' SWP Foreman C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:28', 2, '2017-08-01 08:46:28', 2, NULL),
(13, 'CLM', 'In House', NULL, 'CLM โฟร์แมน A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(14, 'CLM', 'In House', NULL, 'CLM โฟร์แมน B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(15, 'CLM', 'In House', NULL, 'CLM โฟร์แมน C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:45:53', 2, '2017-08-01 08:45:53', 2, NULL),
(16, 'CLM', 'Out Source', NULL, 'CLM Foreman A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:14', 2, '2017-08-01 08:46:14', 2, NULL),
(17, 'CLM', 'Out Source', NULL, 'CLM Foreman B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:21', 2, '2017-08-01 08:46:21', 2, NULL),
(18, 'CLM', 'Out Source', NULL, ' CLM Foreman C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:28', 2, '2017-08-01 08:46:28', 2, NULL),
(19, 'TRU', 'In House', NULL, 'TRU โฟร์แมน A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(20, 'TRU', 'In House', NULL, 'TRU โฟร์แมน B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(21, 'TRU', 'In House', NULL, 'TRU โฟร์แมน C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:45:53', 2, '2017-08-01 08:45:53', 2, NULL),
(22, 'TRU', 'Out Source', NULL, 'TRU Foreman A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:14', 2, '2017-08-01 08:46:14', 2, NULL),
(23, 'TRU', 'Out Source', NULL, 'TRU Foreman B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:21', 2, '2017-08-01 08:46:21', 2, NULL),
(24, 'TRU', 'Out Source', NULL, ' TRU Foreman C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:28', 2, '2017-08-01 08:46:28', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Fts_Buoy`
--

CREATE TABLE `ck_Master_Fts_Buoy` (
  `id` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL DEFAULT '0',
  `BuoyCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BuoyName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BuoyStatus` int(11) DEFAULT '1' COMMENT '0. ไม่สามารถใช้งานได้ 1. ใช้งานได้ปกติ',
  `BuoyNote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WeightMonthly` double NOT NULL,
  `WeightYearly` double NOT NULL,
  `LastWork` timestamp NULL DEFAULT NULL,
  `LastEnd` timestamp NULL DEFAULT NULL,
  `LastJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueueJob` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Staff_1` int(11) DEFAULT '0',
  `Staff_2` int(11) DEFAULT '0',
  `Staff_3` int(11) DEFAULT '0',
  `Staff_4` int(11) DEFAULT '0',
  `Staff_5` int(11) DEFAULT '0',
  `Staff_6` int(11) DEFAULT '0',
  `Staff_7` int(11) DEFAULT '0',
  `Staff_8` int(11) DEFAULT '0',
  `Staff_9` int(11) DEFAULT '0',
  `Staff_10` int(11) DEFAULT '0',
  `check_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ฝ่ายขนถ่ายสินค้าทางทะเล - ทุ่น';

--
-- Dumping data for table `ck_Master_Fts_Buoy`
--

INSERT INTO `ck_Master_Fts_Buoy` (`id`, `DepartmentID`, `BuoyCode`, `BuoyName`, `BuoyStatus`, `BuoyNote`, `WeightMonthly`, `WeightYearly`, `LastWork`, `LastEnd`, `LastJob`, `QueueJob`, `Staff_1`, `Staff_2`, `Staff_3`, `Staff_4`, `Staff_5`, `Staff_6`, `Staff_7`, `Staff_8`, `Staff_9`, `Staff_10`, `check_at`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 22, NULL, 'กรรณิกา', 1, NULL, 1, 2, NULL, NULL, NULL, NULL, 1, 1, 4, 4, 6, 1, 1, 1, 1, 0, NULL, '2017-07-18 07:00:48', 2, '2017-10-02 05:07:55', 2, NULL),
(2, 24, NULL, 'การะเกด', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 4, 4, 6, 1, 1, 1, 1, 0, NULL, '2017-07-19 03:13:15', 2, '2017-10-02 08:09:36', 2, NULL),
(3, 25, NULL, 'แก่นตะวัน', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2017-07-19 03:13:22', 2, '2017-10-09 10:46:49', 2, NULL),
(4, 26, NULL, 'บุหงา', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2017-07-19 03:13:26', 2, '2017-07-19 04:12:16', 2, NULL),
(5, 23, NULL, 'ลดาวัลย์', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2017-07-19 03:13:33', 2, '2017-07-19 03:13:33', 2, NULL),
(6, 27, NULL, 'ศุภราช', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2017-07-19 03:13:39', 2, '2017-07-19 04:18:47', 2, NULL),
(7, 21, NULL, 'จามจุรี', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2017-07-28 09:16:06', 2, '2017-07-28 09:16:06', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Fts_Foreman`
--

CREATE TABLE `ck_Master_Fts_Foreman` (
  `id` int(11) NOT NULL,
  `ForemanType` enum('In House','Out Source') COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanNote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ForemanStatus` int(11) DEFAULT '1',
  `WeightMonthly` double NOT NULL,
  `WeightYearly` double NOT NULL,
  `LastWork` timestamp NULL DEFAULT NULL,
  `LastEnd` timestamp NULL DEFAULT NULL,
  `LastJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueueJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueueStart` timestamp NULL DEFAULT NULL,
  `QueueFinish` timestamp NULL DEFAULT NULL,
  `check_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ฝ่ายขนถ่ายสินค้าทางทะเล - โฟร์แมน';

--
-- Dumping data for table `ck_Master_Fts_Foreman`
--

INSERT INTO `ck_Master_Fts_Foreman` (`id`, `ForemanType`, `ForemanCode`, `ForemanName`, `ForemanNote`, `ForemanStatus`, `WeightMonthly`, `WeightYearly`, `LastWork`, `LastEnd`, `LastJob`, `QueueJob`, `QueueStart`, `QueueFinish`, `check_at`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'In House', NULL, 'นาย นรา  แก้วเก่า', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:17', 2, '2017-10-09 02:41:21', 2, NULL),
(2, 'In House', NULL, 'โฟร์แมน B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-19 03:27:30', 2, '2017-08-01 08:45:44', 2, NULL),
(3, 'In House', NULL, 'โฟร์แมน C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:45:53', 2, '2017-08-01 08:45:53', 2, NULL),
(4, 'Out Source', NULL, 'Foreman A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:14', 2, '2017-08-01 08:46:14', 2, NULL),
(5, 'Out Source', NULL, 'Foreman B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:21', 2, '2017-08-01 08:46:21', 2, NULL),
(6, 'Out Source', NULL, 'Foreman C', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 08:46:28', 2, '2017-08-01 08:46:28', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_FTS_Sweep`
--

CREATE TABLE `ck_Master_FTS_Sweep` (
  `id` int(11) NOT NULL,
  `Division` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `SweepCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SweepName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SweepNote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SweepStatus` int(11) DEFAULT '1',
  `WeightMonthly` double NOT NULL,
  `WeightYearly` double NOT NULL,
  `LastJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastEnd` timestamp NULL DEFAULT NULL,
  `LastWork` timestamp NULL DEFAULT NULL,
  `QueueJob` varbinary(10) DEFAULT NULL,
  `QueueStart` timestamp NULL DEFAULT NULL,
  `QueueFinish` timestamp NULL DEFAULT NULL,
  `check_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ฝ่ายขนถ่ายสินค้าทางทะเล - สายกวาด';

--
-- Dumping data for table `ck_Master_FTS_Sweep`
--

INSERT INTO `ck_Master_FTS_Sweep` (`id`, `Division`, `SweepCode`, `SweepName`, `SweepNote`, `SweepStatus`, `WeightMonthly`, `WeightYearly`, `LastJob`, `LastEnd`, `LastWork`, `QueueJob`, `QueueStart`, `QueueFinish`, `check_at`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'FTS', NULL, 'นาย สุทัศ  นครสวรรค์', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:23', 2, '2017-10-09 02:40:02', 2, NULL),
(2, 'FTS', NULL, 'สายกวาด B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:37', 2, '2017-07-18 06:17:37', NULL, NULL),
(3, 'FTS', NULL, 'สายกวาด C', NULL, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:01', 2, '2017-07-18 06:23:51', NULL, NULL),
(4, 'FTS', NULL, 'สายกวาด D', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:07', 2, '2017-07-19 03:18:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Fuel`
--

CREATE TABLE `ck_Master_Fuel` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `balance` float(11,2) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Master_Fuel`
--

INSERT INTO `ck_Master_Fuel` (`id`, `name`, `balance`, `type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(2, 'ถัง1', 4450.00, 'Blue Diesel', '2017-11-15 06:35:14', 2, '2017-11-23 07:32:22', 2, NULL),
(3, 'ถัง2', 7000.00, 'Blue Gasoline 95', '2017-11-15 06:35:36', 2, '2017-12-18 07:18:14', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Fuel_Stock`
--

CREATE TABLE `ck_Master_Fuel_Stock` (
  `id` int(11) NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` text NOT NULL,
  `tank_id` int(11) NOT NULL,
  `work_no` text,
  `machine_id` int(11) DEFAULT NULL,
  `objective` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `staff_id` int(11) DEFAULT NULL,
  `boat_id` int(11) DEFAULT NULL,
  `customer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tell` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `price_liter` float(13,2) DEFAULT NULL,
  `amount_price` float(13,2) DEFAULT NULL,
  `amount` float(13,2) DEFAULT NULL,
  `balance_before` float(13,2) DEFAULT NULL COMMENT 'จำนวนก่อนเติม',
  `balance_after` float(13,3) DEFAULT NULL COMMENT 'จำนวนหลังเติม',
  `approve_status` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `different` float(10,2) NOT NULL COMMENT 'ส่วนต่างของราคาน้ำมัน',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Master_Fuel_Stock`
--

INSERT INTO `ck_Master_Fuel_Stock` (`id`, `type`, `code`, `tank_id`, `work_no`, `machine_id`, `objective`, `staff_id`, `boat_id`, `customer`, `tell`, `payment_type`, `price_liter`, `amount_price`, `amount`, `balance_before`, `balance_after`, `approve_status`, `different`, `created_at`, `created_by`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(8, 'แก้ไขน้ำมัน(เพิ่ม)', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6000.00, NULL, NULL, NULL, 0.00, '2017-11-21 10:55:53', 2, NULL, NULL, NULL),
(9, 'แก้ไขน้ำมัน(ลด)', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200.00, NULL, NULL, NULL, 0.00, '2017-11-22 03:52:33', 2, NULL, '2017-11-27 09:05:35', NULL),
(14, 'รับน้ำมัน', 'FR171122000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300.50, NULL, NULL, NULL, 0.00, '2017-11-22 08:39:42', 2, NULL, NULL, NULL),
(15, 'จ่ายน้ำมันเรือยนต์', 'FB171122000', 3, NULL, NULL, 'xxx', 4, 3, NULL, NULL, NULL, NULL, NULL, 5001.00, NULL, NULL, 'ไม่อนุมัติ', 0.00, '2017-11-22 08:45:57', 2, 2, '2017-12-24 10:26:03', NULL),
(16, 'จ่ายน้ำมันในงาน', 'FW171122000', 2, 'SMD1709001', 10, '5555', 30, NULL, NULL, NULL, NULL, NULL, NULL, 300.00, NULL, NULL, NULL, 0.00, '2017-11-22 10:54:08', 2, NULL, NULL, NULL),
(17, 'จ่ายน้ำมันในงาน', 'FW171122001', 3, 'SMD1709002', 4, '55', 5, NULL, NULL, NULL, NULL, NULL, NULL, 123.00, 5000.00, 4877.000, 'อนุมัติ', 0.00, '2017-11-22 10:55:06', 2, 2, '2017-12-25 02:57:07', NULL),
(18, 'จ่ายน้ำมันในบริษัท', 'FC171123000', 2, NULL, 72, '5555', 112, NULL, NULL, NULL, NULL, NULL, NULL, 350.00, NULL, NULL, NULL, 0.00, '2017-11-23 04:35:44', 2, NULL, NULL, NULL),
(19, 'ขายน้ำมัน', 'FS171124000', 3, NULL, NULL, NULL, NULL, NULL, 'M.V.KIRAN AUSTRALIA', '0888888888', 'เงินสด', 35.86, 8965.00, 250.00, NULL, NULL, NULL, 0.00, '2017-11-24 08:47:45', 2, NULL, NULL, NULL),
(20, 'รับน้ำมัน', 'FR171204001', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, NULL, NULL, 0.00, '2017-12-04 06:52:54', 2, NULL, NULL, NULL),
(21, 'รับน้ำมัน', 'FR171204002', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, NULL, NULL, 0.00, '2017-12-04 06:53:14', 2, 2, '2017-12-25 02:35:49', NULL),
(22, 'แก้ไขน้ำมัน(เพิ่ม)', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2000.00, 5000.00, 7000.000, 'อนุมัติ', 0.00, '2017-12-18 07:20:10', 2, 2, '2017-12-25 07:54:12', NULL),
(23, 'แก้ไขน้ำมัน(เพิ่ม)', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500.00, NULL, NULL, NULL, 0.00, '2017-12-18 07:21:03', 2, NULL, NULL, NULL),
(24, 'แก้ไขน้ำมัน(เพิ่ม)', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200.00, NULL, NULL, NULL, 0.00, '2017-12-18 07:22:00', 2, NULL, NULL, NULL),
(25, 'แก้ไขน้ำมัน(ลด)', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5100.00, NULL, NULL, NULL, 0.00, '2017-12-18 07:22:14', 2, NULL, NULL, NULL),
(26, 'รับน้ำมัน', 'FR171219000', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500.00, NULL, NULL, NULL, 0.00, '2017-12-19 03:36:43', 2, 2, '2017-12-25 04:47:20', NULL),
(29, 'จ่ายน้ำมันในบริษัท', 'FC171219000', 2, NULL, 4, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, 20000.00, NULL, NULL, NULL, 0.00, '2017-12-19 06:06:15', 2, NULL, NULL, NULL),
(30, 'จ่ายน้ำมันในบริษัท', 'FC171219001', 2, NULL, 20, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, 200.00, 4750.00, 4550.000, 'อนุมัติ', 0.00, '2017-12-19 06:06:43', 2, 2, '2017-12-24 08:54:13', NULL),
(31, 'จ่ายน้ำมันในบริษัท', 'FC171219002', 2, NULL, 4, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, 230.00, NULL, NULL, NULL, 0.00, '2017-12-19 06:07:23', 2, NULL, NULL, NULL),
(32, 'จ่ายน้ำมันในงาน', 'FW171219000', 2, 'SMD1710005', 22, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, 150.00, NULL, NULL, NULL, 0.00, '2017-12-19 06:36:36', 2, NULL, NULL, NULL),
(33, 'จ่ายน้ำมันเรือยนต์', 'FB171219000', 3, NULL, NULL, NULL, 7, 3, NULL, NULL, NULL, NULL, NULL, 150.00, 4877.00, 4727.000, 'อนุมัติ', 0.00, '2017-12-19 07:09:20', 2, 2, '2017-12-24 09:20:48', NULL),
(34, 'จ่ายน้ำมันเรือยนต์', 'FB171219001', 3, NULL, NULL, NULL, 6, 5, NULL, NULL, NULL, NULL, NULL, 500.00, NULL, NULL, NULL, 0.00, '2017-12-19 07:10:44', 2, NULL, NULL, NULL),
(35, 'ขายน้ำมัน', 'FS171219000', 3, NULL, NULL, NULL, NULL, NULL, '16', '0889888878', 'เงินสด', 34.96, 1048.80, 30.00, NULL, NULL, NULL, 0.00, '2017-12-19 08:24:00', 2, 2, '2017-12-20 03:12:10', NULL),
(37, 'แก้ไขน้ำมัน(เพิ่ม)', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 273.00, NULL, NULL, 'อนุมัติ', 0.00, '2017-12-25 06:45:17', 2, NULL, '2017-12-25 06:45:17', NULL),
(38, 'แก้ไขน้ำมัน(ลด)', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50.00, 4500.00, 4450.000, 'อนุมัติ', 0.00, '2017-12-25 06:45:49', 2, 2, '2017-12-25 07:53:44', NULL),
(39, 'แก้ไขน้ำมัน(เพิ่ม)', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500.00, NULL, NULL, 'อนุมัติ', 0.00, '2017-12-25 06:47:18', 2, NULL, '2017-12-25 06:47:18', NULL),
(40, 'แก้ไขน้ำมัน(ลด)', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500.00, NULL, NULL, 'อนุมัติ', 0.00, '2017-12-25 06:49:17', 2, NULL, '2017-12-25 06:49:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Machine`
--

CREATE TABLE `ck_Master_Machine` (
  `id` int(11) NOT NULL,
  `DivisionID` int(11) NOT NULL DEFAULT '0',
  `DepartmentID` int(11) NOT NULL DEFAULT '0',
  `MachineType` enum('BackHoe','Tractor','BobCat','Gennerrator','Crane','Grab') COLLATE utf8_unicode_ci DEFAULT NULL,
  `MachineName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MachineNunber` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MachineBattery` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MachineHourMeter` int(11) DEFAULT '1' COMMENT 'มิตเตอร์ชั่วโมงการใช้งาน',
  `MachineStatus` int(11) UNSIGNED DEFAULT '1' COMMENT 'สถานะเครื่องจักร - ปกติ / เสีย',
  `MachineUsage` int(11) DEFAULT '0' COMMENT 'สถานะการใช้งาน - จอด / ใช้งาน',
  `MachineNote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ฝ่ายขนถ่ายสินค้าทางทะเล - เครื่องจักรกล';

--
-- Dumping data for table `ck_Master_Machine`
--

INSERT INTO `ck_Master_Machine` (`id`, `DivisionID`, `DepartmentID`, `MachineType`, `MachineName`, `MachineNunber`, `MachineBattery`, `MachineHourMeter`, `MachineStatus`, `MachineUsage`, `MachineNote`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 6, 22, 'BackHoe', 'CAT 320#1', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-12-27 08:25:06', 2, NULL),
(2, 6, 22, 'BackHoe', 'CAT 320#3', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-12-27 08:29:33', 2, NULL),
(3, 6, 22, 'BackHoe', 'CAT 320#4', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2018-01-09 09:22:04', 2, NULL),
(4, 6, 22, 'BackHoe', 'SK 300#3', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(5, 6, 22, 'Tractor', 'D5H #5', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2018-01-10 06:48:33', 2, NULL),
(6, 6, 22, 'Tractor', 'D5H #10', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(7, 6, 22, 'BobCat', 'CASE95XT #1', NULL, 'N 100', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(8, 6, 22, 'BobCat', 'CASE95XT #10', NULL, 'N 100', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(9, 6, 22, 'Gennerrator', 'CASE95XT #10', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-12-27 08:21:51', 2, '2017-12-27 08:21:51'),
(10, 6, 22, 'Gennerrator', 'CAT3412STA #51 (Power Crane)', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(11, 6, 22, 'Gennerrator', 'CAT3412STA #52 (Power Crane)', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 16:30:42', 2, NULL),
(12, 6, 22, 'Gennerrator', 'CAT3412STA #53 (Power Crane)', NULL, 'N 150', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(13, 6, 22, 'Gennerrator', 'HINO HO7C #48(Small)', NULL, 'N 150', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(14, 6, 22, 'Gennerrator', 'HINO HO7C #49(Big)', NULL, 'N 150', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(15, 6, 22, 'Gennerrator', 'YANMAR-TF160L #81', NULL, 'N 100', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(16, 6, 22, 'Crane', 'CR1 3030-4HD/62506057', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(17, 6, 22, 'Crane', 'CR2 3030-4HD/62506056', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(18, 6, 22, 'Grab', '1806', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(19, 6, 22, 'Grab', '1807', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(20, 6, 24, 'BackHoe', 'PC 300#1', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(21, 6, 24, 'BackHoe', 'PC 300#4', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(22, 6, 24, 'BackHoe', 'PC 300#8', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-12-27 07:57:16', 2, '2017-12-27 07:57:16'),
(23, 6, 24, 'BackHoe', 'PC 310#2', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(24, 6, 24, 'BackHoe', 'EX 300#1', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(25, 6, 24, 'Tractor', 'D5B #12', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(26, 6, 24, 'Tractor', 'D5H #7', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(27, 6, 24, 'Tractor', 'LD160S #14', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(28, 6, 24, 'Tractor', 'LD160S #17', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(29, 6, 24, 'BobCat', 'CDM312 #1', NULL, 'N 100', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(30, 6, 24, 'BobCat', 'CDM312 #5', NULL, 'N 100', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(31, 6, 24, 'Gennerrator', 'CAT3412STA #67 (Power Crane)', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(32, 6, 24, 'Gennerrator', 'CAT3412STA #68 (Power Crane)', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(33, 6, 24, 'Gennerrator', 'CAT3412STA #69 (Power Crane)', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(34, 6, 24, 'Gennerrator', 'CAT3412STA #70 (Power Crane)', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(35, 6, 24, 'Gennerrator', 'CAMMINS-NTA855G3 #19', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(36, 6, 24, 'Gennerrator', 'CAMMINS-NTA855G3 #41', NULL, 'N 200', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(37, 6, 24, 'Gennerrator', 'ISUZU #66', NULL, 'N 120', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(38, 6, 24, 'Gennerrator', 'YANMAR-TF160L #83', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(39, 6, 24, 'Crane', 'CR1 3030-4HD/62506569', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(40, 6, 24, 'Crane', 'CR2 3030-4HD/62506713', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(41, 6, 24, 'Crane', 'CR3 3030-4HD/62506568', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(42, 6, 24, 'Grab', '9633', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(43, 6, 24, 'Grab', '9635', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(44, 6, 25, 'BackHoe', 'CAT 330 #1', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(45, 6, 25, 'BackHoe', 'CAT 325 L#2', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(46, 6, 25, 'BackHoe', 'CAT 325 L#4', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(47, 6, 25, 'BackHoe', 'CAT 325 L#5', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(48, 6, 25, 'Tractor', 'D5B #1', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(49, 6, 25, 'Tractor', 'D5H #6', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(50, 6, 25, 'Tractor', 'LD160S #16', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(51, 6, 25, 'BobCat', 'CASE 440 #1', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(52, 6, 25, 'BobCat', 'CASE 440 #2', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(53, 6, 25, 'Gennerrator', 'CAT3508TA #87 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(54, 6, 25, 'Gennerrator', 'CUMMINS-KTA38 #99 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(55, 6, 25, 'Gennerrator', 'CUMMINS-KTA38 #104 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(56, 6, 25, 'Gennerrator', 'CUMMINS BIGCAM #92', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(57, 6, 25, 'Gennerrator', 'YANMAR-TF160L #95', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(58, 6, 25, 'Gennerrator', 'CUMMINS SALLCAM #94', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(59, 6, 25, 'Crane', 'CR1 3030-4HD/62513039', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(60, 6, 25, 'Crane', 'CR2 3030-4HD/62513038', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(61, 6, 25, 'Grab', '8888', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(62, 6, 25, 'Grab', '7777', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(63, 6, 26, 'BackHoe', 'ZX 200#1', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(64, 6, 26, 'BackHoe', 'ZX 200#2', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(65, 6, 26, 'BackHoe', 'ZX 200#4', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(66, 6, 26, 'BackHoe', 'ZX 200#5', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(67, 6, 26, 'Tractor', 'B160L #13', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(68, 6, 26, 'Tractor', 'LD160S #15', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(69, 6, 26, 'Tractor', 'D5H #4', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(70, 6, 26, 'BobCat', 'CDM312 #2', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(71, 6, 26, 'BobCat', 'CDM312 #3', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(72, 6, 26, 'Gennerrator', 'CUMMINS-KTA38 #101 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(73, 6, 26, 'Gennerrator', 'CUMMINS-KTA38 #102 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(74, 6, 26, 'Gennerrator', 'CUMMINS-KTA38 #103 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(75, 6, 26, 'Gennerrator', 'CUMMINS-KTA38 #105 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(76, 6, 26, 'Gennerrator', 'CUMMINS BIGCAM #89', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(77, 6, 26, 'Gennerrator', 'HINO-K13D #65', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 16:07:50', 2, NULL),
(78, 6, 26, 'Gennerrator', 'ISUZU-6BD1 #18', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(79, 6, 26, 'Gennerrator', 'YANMAR-TF160L #98', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(80, 6, 26, 'Crane', 'CR1 3030-4HD/62513823', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(81, 6, 26, 'Crane', 'CR2 3030-4HD/62513824', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(82, 6, 26, 'Crane', 'CR3 3030-4HD/62513825', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(83, 6, 26, 'Grab', '9443', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(84, 6, 26, 'Grab', '9444', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(85, 6, 26, 'Grab', '8805', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(86, 6, 26, 'Grab', '1805', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(87, 6, 26, 'Grab', '1804', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(88, 6, 23, 'BackHoe', 'CAT 320 #1', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(89, 6, 23, 'BackHoe', 'CAT 320 #4', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(90, 6, 23, 'BackHoe', 'CAT 320 #7', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(91, 6, 23, 'BackHoe', 'CAT 320 #8', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(92, 6, 23, 'BackHoe', 'CAT 320 #9', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(93, 6, 23, 'BackHoe', 'CAT 320 #10', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(94, 6, 23, 'BackHoe', 'CAT 320 #2', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(95, 6, 23, 'Tractor', 'D5B #11', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(96, 6, 23, 'Tractor', 'D3B #8', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(97, 6, 23, 'BobCat', 'CASE95XT #5', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(98, 6, 23, 'BobCat', 'CASE95XT #9', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(99, 6, 23, 'Gennerrator', 'CAT3412STA #55 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(100, 6, 23, 'Gennerrator', 'CAT3412STA #56 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(101, 6, 23, 'Gennerrator', 'CAT3412STA #93 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(102, 6, 23, 'Gennerrator', 'CAT3412STA #54 (Power Crane)', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(103, 6, 23, 'Gennerrator', 'HINO-EK100 #58', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(104, 6, 23, 'Gennerrator', 'CAT-3406B #33', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(105, 6, 23, 'Gennerrator', 'CUMMINS BIGCAM #90', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(106, 6, 23, 'Gennerrator', 'YANMAR-TF160L #97', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(107, 6, 23, 'Crane', 'CR1 GL4032-2/62505612', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(108, 6, 23, 'Crane', 'CR2 GL4032-2/62506870', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(109, 6, 23, 'Crane', 'CR3 GL4032-2/62506107', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(110, 6, 23, 'Grab', '9543', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(111, 6, 23, 'Grab', '9544', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(112, 6, 23, 'Grab', '9188', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(113, 6, 23, 'Grab', '9431', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(114, 6, 23, 'Grab', '9432', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(115, 6, 27, 'Grab', 'CAT 330#6', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(116, 6, 27, 'Grab', 'CAT 320#3', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(117, 6, 27, 'Tractor', 'D5B #3', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(118, 6, 27, 'Tractor', 'D5H #9', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(119, 6, 27, 'BobCat', 'CASE 465 #3', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(120, 6, 27, 'BobCat', 'CASE 465 #6', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(121, 6, 27, 'BobCat', 'CASE 465 #7', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(122, 6, 27, 'BobCat', 'CASE95XT #3', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(123, 6, 27, 'Gennerrator', 'YANMAR #75', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(124, 6, 27, 'Grab', '9177', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(125, 6, 27, 'Grab', '1281', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(126, 6, 27, 'Grab', '1280', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(127, 6, 27, 'Grab', '1282', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(128, 6, 21, 'BobCat', 'CASE 465 #8', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(129, 6, 21, 'BobCat', 'CAT 325 L#1', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(130, 6, 21, 'Grab', '9868', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(131, 6, 21, 'Grab', '9869', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(132, 5, 0, 'BackHoe', 'BackHoe 01', '121', NULL, 1, 1, 0, NULL, '2017-10-30 16:57:17', 2, '2017-10-30 16:59:58', 2, NULL),
(133, 7, 0, 'Grab', '9869', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(134, 5, 0, 'Grab', '9869', NULL, '', 1, 1, 0, NULL, '2017-10-01 09:30:15', 2, '2017-10-30 09:30:15', 2, NULL),
(135, 7, 0, 'BackHoe', 'BackHoe 01', '121', NULL, 1, 1, 0, NULL, '2017-10-30 16:57:17', 2, '2017-10-30 16:59:58', 2, NULL),
(136, 6, 21, 'BackHoe', 'PC 300#1', NULL, NULL, 1, 1, 0, NULL, '2017-12-27 08:01:46', 2, '2017-12-27 08:04:42', 2, '2017-12-27 08:04:42'),
(137, 6, 21, 'BackHoe', 'PC310#3', NULL, NULL, 1, 1, 0, NULL, '2017-12-27 08:03:00', 2, '2017-12-27 08:04:52', 2, '2017-12-27 08:04:52'),
(138, 6, 24, 'BackHoe', 'PC310#3', NULL, NULL, 1, 1, 0, NULL, '2017-12-27 08:06:05', 2, '2017-12-27 08:06:05', 2, NULL),
(139, 6, 24, 'Grab', '3634', NULL, NULL, 1, 1, 0, NULL, '2017-12-27 08:16:29', 2, '2017-12-27 08:16:29', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Machine_Conveyor`
--

CREATE TABLE `ck_Master_Machine_Conveyor` (
  `id` int(11) NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bigboat_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `boat_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 ชำรุด, 1 ปกติ',
  `check_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `winch_L` varchar(10) NOT NULL,
  `winch_C` varchar(10) NOT NULL,
  `winch_R` varchar(10) NOT NULL,
  `spring_head` varchar(10) NOT NULL,
  `spring_end` varchar(10) NOT NULL,
  `winch_end_L` varchar(10) NOT NULL,
  `winch_end_C` varchar(10) NOT NULL,
  `winch_end_R` varchar(10) NOT NULL,
  `shockproof_around` varchar(10) NOT NULL,
  `anchor` varchar(10) NOT NULL,
  `hoist_A` varchar(10) NOT NULL,
  `hoist_B` varchar(10) NOT NULL,
  `gear_swing_LR_A` varchar(10) NOT NULL,
  `gear_pull_A` varchar(10) NOT NULL,
  `belt_BC1_A` varchar(10) NOT NULL,
  `belt_BC2_A` varchar(10) NOT NULL,
  `roller_BC1_A` varchar(10) NOT NULL,
  `roller_BC2_A` varchar(10) NOT NULL,
  `sling_wire_A` varchar(10) NOT NULL,
  `check_sling_BC1_A` varchar(10) NOT NULL,
  `check_sling_pull_A` varchar(10) NOT NULL,
  `valve_hopper_A` varchar(10) NOT NULL,
  `cylinder_hopper_A` varchar(10) NOT NULL,
  `grille_hopper_A` varchar(10) NOT NULL,
  `gear_swing_LR_B` varchar(10) NOT NULL,
  `gear_pull_B` varchar(10) NOT NULL,
  `belt_BC1_B` varchar(10) NOT NULL,
  `belt_BC2_B` varchar(10) NOT NULL,
  `roller_BC1_B` varchar(10) NOT NULL,
  `roller_BC2_B` varchar(10) NOT NULL,
  `sling_wire_B` varchar(10) NOT NULL,
  `check_sling_BC1_B` varchar(10) NOT NULL,
  `check_sling_pull_B` varchar(10) NOT NULL,
  `valve_hopper_B` varchar(10) NOT NULL,
  `grille_hopper_B` varchar(10) NOT NULL,
  `bobcat` varchar(10) NOT NULL,
  `bachole` varchar(10) NOT NULL,
  `tractor` varchar(10) NOT NULL,
  `check_saken` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Master_Machine_Conveyor`
--

INSERT INTO `ck_Master_Machine_Conveyor` (`id`, `code`, `bigboat_name`, `boat_name`, `status`, `check_type`, `winch_L`, `winch_C`, `winch_R`, `spring_head`, `spring_end`, `winch_end_L`, `winch_end_C`, `winch_end_R`, `shockproof_around`, `anchor`, `hoist_A`, `hoist_B`, `gear_swing_LR_A`, `gear_pull_A`, `belt_BC1_A`, `belt_BC2_A`, `roller_BC1_A`, `roller_BC2_A`, `sling_wire_A`, `check_sling_BC1_A`, `check_sling_pull_A`, `valve_hopper_A`, `cylinder_hopper_A`, `grille_hopper_A`, `gear_swing_LR_B`, `gear_pull_B`, `belt_BC1_B`, `belt_BC2_B`, `roller_BC1_B`, `roller_BC2_B`, `sling_wire_B`, `check_sling_BC1_B`, `check_sling_pull_B`, `valve_hopper_B`, `grille_hopper_B`, `bobcat`, `bachole`, `tractor`, `check_saken`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`, `note`) VALUES
(1, 'T65912', '3', '5', 0, 'before,after,period', 'N', 'AB', 'I/F', 'R', 'C/O', 'R', 'I/F', 'AB', 'N', 'AB', 'I/F', 'R', 'C/O', 'N', 'AB', 'N', 'AB', 'AB', 'N', 'N', 'AB', 'AB', 'AB', 'AB', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 2, '2017-11-09 06:57:24', NULL, '2017-11-09 06:57:24', NULL, NULL),
(2, 'CV171204000', '3', '4', NULL, 'before,after', 'N', 'N', 'N', 'N', 'N', 'AB', 'AB', 'AB', 'AB', 'N', 'N', 'N', 'N', 'AB', 'AB', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'AB', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'I/F', 2, '2017-12-04 09:22:31', NULL, '2017-12-04 09:22:31', NULL, 'สามารถใช้งานได้'),
(3, NULL, '20', '4', NULL, 'before', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 2, '2018-01-10 04:23:07', NULL, '2018-01-10 04:23:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Machine_Crane`
--

CREATE TABLE `ck_Master_Machine_Crane` (
  `id` int(11) NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `boat_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 ชำรุด, 1 ปกติ',
  `crane_id` int(11) NOT NULL,
  `check_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bigboat_id` int(11) DEFAULT NULL,
  `crane_hook` varchar(11) NOT NULL,
  `sling` varchar(11) NOT NULL,
  `sling_bass` varchar(11) NOT NULL,
  `end_corner` varchar(11) NOT NULL,
  `head_crane` varchar(11) NOT NULL,
  `cctv` varchar(11) NOT NULL,
  `cooling_panel` varchar(11) NOT NULL,
  `leak_oli_sola` varchar(11) NOT NULL,
  `leak_hydrolic` varchar(11) NOT NULL,
  `clean_cooling` varchar(11) NOT NULL,
  `grease_wire` varchar(11) NOT NULL,
  `compress_grease` varchar(11) NOT NULL,
  `oli_hydrolic` varchar(11) NOT NULL,
  `oli_gear` varchar(11) NOT NULL,
  `oli_gear_corner` varchar(11) NOT NULL,
  `oli_gear_bass` varchar(11) NOT NULL,
  `leak_hy_pump` varchar(11) NOT NULL,
  `winch_mount` varchar(11) NOT NULL,
  `greas_hand_crane` varchar(11) NOT NULL,
  `position_device` varchar(11) NOT NULL,
  `display_mpc` varchar(11) NOT NULL,
  `control_panel` varchar(11) NOT NULL,
  `lighting` varchar(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Master_Machine_Crane`
--

INSERT INTO `ck_Master_Machine_Crane` (`id`, `code`, `boat_name`, `size`, `status`, `crane_id`, `check_type`, `bigboat_id`, `crane_hook`, `sling`, `sling_bass`, `end_corner`, `head_crane`, `cctv`, `cooling_panel`, `leak_oli_sola`, `leak_hydrolic`, `clean_cooling`, `grease_wire`, `compress_grease`, `oli_hydrolic`, `oli_gear`, `oli_gear_corner`, `oli_gear_bass`, `leak_hy_pump`, `winch_mount`, `greas_hand_crane`, `position_device`, `display_mpc`, `control_panel`, `lighting`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`, `note`) VALUES
(5, 'M1801001 ', '4', 50, NULL, 3, 'before', 20, 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 2, '2018-01-10 04:16:51', NULL, '2018-01-10 04:16:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Machine_Electricity`
--

CREATE TABLE `ck_Master_Machine_Electricity` (
  `id` int(11) NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `boat_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `machine_no` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 ชำรุด, 1 ปกติ',
  `approve_status` int(11) DEFAULT NULL COMMENT '0 ไม่อนุมัติ , 1 อนุมัติ',
  `check_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mitor_before` varchar(10) DEFAULT NULL,
  `mitor_after` varchar(10) DEFAULT NULL,
  `mitor_round` varchar(10) DEFAULT NULL,
  `bigboat_id` int(11) DEFAULT NULL,
  `boiler` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `engine` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `front_belt` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pipe_rubber` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `terminals_distilled` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_general` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wire_controller` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `leakage` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `motor_sea` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `leakage_water` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `leakage_sola` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `engine_noise` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `breaker` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `voltage` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `frequency` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `heat_gauge` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gauge_pressure` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ammitor` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hour_gauge` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `round_gauge` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_inside` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Master_Machine_Electricity`
--

INSERT INTO `ck_Master_Machine_Electricity` (`id`, `code`, `boat_name`, `type`, `machine_no`, `size`, `status`, `approve_status`, `check_type`, `mitor_before`, `mitor_after`, `mitor_round`, `bigboat_id`, `boiler`, `engine`, `front_belt`, `pipe_rubber`, `terminals_distilled`, `check_general`, `wire_controller`, `leakage`, `motor_sea`, `leakage_water`, `leakage_sola`, `engine_noise`, `breaker`, `voltage`, `frequency`, `heat_gauge`, `gauge_pressure`, `ammitor`, `hour_gauge`, `round_gauge`, `check_inside`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`, `note`) VALUES
(7, NULL, '3', 'แสงสว่าง', '3', 50, NULL, NULL, 'before', '200', NULL, NULL, 20, 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 2, '2018-01-10 03:59:49', NULL, '2018-01-10 03:59:49', NULL, '1234'),
(8, 'M1801002', '4', 'แสงสว่าง', '11', 250, NULL, 1, 'before', '120', NULL, NULL, 20, 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 2, '2018-01-10 07:15:35', NULL, '2018-01-10 07:15:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Machine_Grab`
--

CREATE TABLE `ck_Master_Machine_Grab` (
  `id` int(11) NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขที่ใบตรวจ',
  `boat_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อเรือทุ่ม',
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภท Grab',
  `grab_id` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเลข Grab',
  `size` int(11) NOT NULL COMMENT 'ขนาด Grab',
  `status` int(11) DEFAULT NULL COMMENT '0 ชำรุด, 1 ปกติ',
  `check_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ก่อนหรือหลังทำงาน',
  `bigboat_id` int(11) DEFAULT NULL,
  `crane_hook` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skirt` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sling` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydrolic_shock` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydrolic_shock_mid` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valve_hydraulic` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pule` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reel_hook` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_connect` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_skin` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `close_valve` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_wire` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_boot_bullet` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_nut` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_hydraulic` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_pad` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_grease` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `approve_status` int(11) DEFAULT NULL COMMENT '0 ไม่อนุมัติ , 1 อนุมัติ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Master_Machine_Grab`
--

INSERT INTO `ck_Master_Machine_Grab` (`id`, `code`, `boat_name`, `type`, `grab_id`, `size`, `status`, `check_type`, `bigboat_id`, `crane_hook`, `skirt`, `sling`, `hydrolic_shock`, `hydrolic_shock_mid`, `valve_hydraulic`, `pule`, `reel_hook`, `check_connect`, `check_skin`, `close_valve`, `check_wire`, `check_boot_bullet`, `check_nut`, `check_hydraulic`, `check_pad`, `check_grease`, `created_by`, `approve_status`, `created_at`, `updated_by`, `updated_at`, `deleted_at`, `note`) VALUES
(6, 'M1801002', '7', 'รีโมท', '131', 500, NULL, 'before', 19, 'N', 'AB', 'I/F', 'R', 'C', 'R', 'I/F', 'AB', 'N', 'N', 'AB', 'I/F', 'R', 'C', 'R', 'I/F', 'AB', 2, 1, '2018-01-11 10:38:13', NULL, '2018-01-11 10:38:13', NULL, 'xxxxxxxxxxxxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Machine_Inspection`
--

CREATE TABLE `ck_Master_Machine_Inspection` (
  `id` int(11) NOT NULL,
  `DivisionID` int(11) DEFAULT NULL,
  `MachineID` int(11) DEFAULT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `OperationID` int(11) DEFAULT NULL,
  `Code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขที่ใบตรวจ',
  `sMode` int(11) DEFAULT NULL COMMENT '1. ก่อนปฏิบัติงาน, 2.หลังปฏิบัติงาน 3. ตรวจตามรอบ',
  `sCheck` int(11) DEFAULT NULL COMMENT '0. ยังไม่ได้ตรวจ, 1. ตรวจสอบแล้ว',
  `sCheck_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Machine_MachineCondition`
--

CREATE TABLE `ck_Master_Machine_MachineCondition` (
  `id` int(11) NOT NULL,
  `oil` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oil_leak` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `filter` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pipe` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noise` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `smoke` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exhaust` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `water_level` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cooling` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `boiler_pipe` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `boiler_lid` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `boiler_condition` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_level` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_pipe` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_leak` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_servo` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_control` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_swingmotor` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `heart_backhole` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_motor` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_hand_control` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hand_control` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_noise` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_physical` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_boom` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_arm` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_bung` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_grease` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hydro_nipple` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `monitor` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `heat_gauge` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sola_gauge` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `charge_gauge` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hour_mitor` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wire` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `battery` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `distilled_water` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chain` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spokket` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tire` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hammer` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `key_lock` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `check_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `machine_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `hourMeter` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 ชำรุด, 1 ปกติ',
  `job_number` varchar(20) NOT NULL,
  `bigboat_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `approve_status` int(11) DEFAULT NULL COMMENT '0 ไม่อนุมัติ, 1 อนุมัติ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Master_Machine_MachineCondition`
--

INSERT INTO `ck_Master_Machine_MachineCondition` (`id`, `oil`, `oil_leak`, `filter`, `pipe`, `start`, `noise`, `smoke`, `exhaust`, `water_level`, `cooling`, `boiler_pipe`, `boiler_lid`, `boiler_condition`, `hydro_level`, `hydro_pipe`, `hydro_leak`, `hydro_servo`, `hydro_control`, `hydro_swingmotor`, `heart_backhole`, `hydro_motor`, `hydro_hand_control`, `hand_control`, `hydro_noise`, `hydro_physical`, `hydro_boom`, `hydro_arm`, `hydro_bung`, `hydro_grease`, `hydro_nipple`, `monitor`, `heat_gauge`, `sola_gauge`, `charge_gauge`, `hour_mitor`, `wire`, `battery`, `distilled_water`, `chain`, `spokket`, `tire`, `hammer`, `key_lock`, `body`, `check_type`, `code`, `machine_id`, `technician_id`, `hourMeter`, `status`, `job_number`, `bigboat_id`, `created_by`, `approve_status`, `created_at`, `updated_by`, `updated_at`, `deleted_at`, `note`) VALUES
(8, 'ปกติ', 'ไม่มี', 'ดี', 'ดี', 'ง่าย', 'มี', 'ดำ', 'ดี', 'ปกติ', 'มี', 'ดี', 'ดี', 'ดี', 'ปกติ', 'ดี', 'มี', 'มี', 'มี', 'มี', 'มี', 'มี', 'มี', 'เบา', 'มี', 'ดี', 'ดี', 'ดี', 'ดี', 'มี', 'ปกติ', 'ดี', 'ดี', 'ดี', 'ดี', 'ดี', 'ดี', 'ดี', 'ดี', 'ดี', 'ดี', 'ดี', 'มี', 'มี', 'ดี', 'before', 'M1801001', 5, 63, '1', NULL, 'FTS1712002', 20, 2, NULL, '2018-01-10 06:48:33', NULL, '2018-01-10 06:48:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Smd_Boat`
--

CREATE TABLE `ck_Master_Smd_Boat` (
  `id` int(11) NOT NULL,
  `BoatCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BoatName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ใบแจ้งงานหน้าท่า - เรือใหญ่';

--
-- Dumping data for table `ck_Master_Smd_Boat`
--

INSERT INTO `ck_Master_Smd_Boat` (`id`, `BoatCode`, `BoatName`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, NULL, 'M.V.THAI HORNITY', '2017-07-04 06:16:39', NULL, '2017-07-04 06:16:39', NULL, NULL),
(2, NULL, 'M.V.MANDARIN EAGLE', '2017-07-07 08:41:41', NULL, '2017-07-07 08:41:41', NULL, NULL),
(3, NULL, 'M.V.KIRAN AUSTRALIA', '2017-07-07 09:08:05', NULL, '2017-07-11 06:52:39', NULL, NULL),
(4, NULL, 'N/A', '2017-07-08 01:57:32', NULL, '2017-07-08 01:57:32', NULL, NULL),
(5, NULL, 'M.V.AURILIA', '2017-07-08 04:19:29', NULL, '2017-07-11 06:52:24', NULL, NULL),
(6, NULL, 'M.V.OCEAN GARNET', '2017-07-14 08:34:49', NULL, '2017-08-03 08:08:54', NULL, NULL),
(7, NULL, 'M.V.ROSCO POPLAR', '2017-07-14 10:11:36', NULL, '2017-07-14 10:11:54', NULL, NULL),
(8, NULL, 'M.V.BAO SUCCESS', '2017-07-26 04:25:11', NULL, '2017-07-26 04:25:11', NULL, NULL),
(9, NULL, 'M.V.VITAKOS MOS', '2017-08-03 07:49:06', NULL, '2017-08-03 07:49:06', NULL, NULL),
(10, NULL, 'M.V.SEIYO FORTUNE', '2017-08-03 08:55:51', NULL, '2017-08-03 08:55:51', NULL, NULL),
(11, NULL, 'M.V.ASIA ENERGY', '2017-08-03 09:01:07', NULL, '2017-08-03 09:01:07', NULL, NULL),
(12, NULL, 'M.V.JAG AARATI', '2017-08-17 02:44:17', NULL, '2017-08-17 02:44:17', NULL, NULL),
(13, NULL, 'M.V.INTUTION', '2017-09-23 02:58:38', NULL, '2017-09-23 02:58:38', NULL, NULL),
(14, NULL, 'M.V.TERN BULKER', '2017-09-23 02:58:38', NULL, '2017-10-05 07:24:02', 2, NULL),
(15, NULL, 'M.V.CHRISTINAB', '2017-09-23 02:58:38', NULL, '2017-10-05 07:06:37', 2, NULL),
(16, NULL, 'M.V.SEA VENUS', '2017-09-23 02:58:38', NULL, '2017-10-05 07:23:50', 2, NULL),
(17, NULL, 'M.V.NAUTICAL ALISABETH', '2017-10-16 03:20:56', 2, '2017-10-16 03:20:56', 2, NULL),
(18, NULL, 'M.V.KEY MISSION', '2017-10-19 03:16:48', 2, '2017-10-19 03:16:48', 2, NULL),
(19, NULL, 'M.V.ORIENT GENESIS', '2017-12-28 02:04:27', 2, '2017-12-28 02:04:27', 2, NULL),
(20, NULL, 'M.V.STH Kure', '2017-12-29 06:07:14', 2, '2017-12-29 06:07:14', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Smd_Harbor`
--

CREATE TABLE `ck_Master_Smd_Harbor` (
  `id` int(10) UNSIGNED NOT NULL,
  `HarborCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HarborName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HarborZone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Master_Smd_Harbor`
--

INSERT INTO `ck_Master_Smd_Harbor` (`id`, `HarborCode`, `HarborName`, `HarborZone`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '', 'ท่าสินวัฒนา', 'ท่าสินวัฒนา', '2017-11-13 10:02:37', 2, '2017-11-13 10:02:37', 2, NULL),
(2, '', 'ท่าสินวัฒนา โกดัง 1', 'ท่าสินวัฒนา', '2017-11-13 10:03:06', 2, '2017-11-13 10:03:06', 2, NULL),
(3, '', 'ท่าสินวัฒนา โกดัง 2', 'ท่าสินวัฒนา', '2017-11-13 10:03:16', 2, '2017-11-13 10:03:16', 2, NULL),
(4, '', 'ท่าสินวัฒนา โกดัง 4', 'ท่าสินวัฒนา', '2017-11-13 10:03:32', 2, '2017-11-13 10:03:32', 2, NULL),
(5, '', 'ท่าสินวัฒนา โกดัง 4', 'ท่าสินวัฒนา', '2017-11-13 10:03:33', 2, '2017-11-13 10:03:33', 2, NULL),
(6, '', 'ท่าสินวัฒนา โกดัง 5', 'ท่าสินวัฒนา', '2017-11-13 10:03:52', 2, '2017-11-13 10:03:52', 2, NULL),
(7, '', 'ท่าไทยรวมทุน', 'ท่าไทยรวมทุน', '2017-11-13 10:02:48', 2, '2017-11-13 10:02:48', 2, NULL),
(8, '', 'ไซโลใหม่ (วัดแค)', 'ไซโลใหม่ (วัดแค)', '2017-11-13 10:02:57', 2, '2017-11-13 10:02:57', 2, NULL),
(10, '10', 'แหลมทองบางปลากด', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(11, '11', 'แอลพีเอ็น', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(12, '12', 'ไทยเซ็นทรัลพระประแดง', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(13, '13', 'ไทยไซโล', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(14, '14', 'จุดจอดเรือบางหัวเสือ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(15, '15', 'ทรัพย์ศรีไทย', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(16, '16', 'โรงงานเหล็กเก่ากรุงเทพ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(17, '17', 'คลังน้ำมัน IRPC', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(18, '18', 'ยูไนเต็ด', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(19, '19', 'จุดจอดเรือวัดจากแดง', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(20, '20', 'วิริยะคลังสินค้า', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(21, '21', 'ไทยซูการ์', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(22, '22', 'นิสชิน', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(23, '23', 'จุดจอดเรือทุ่นทหารเรือ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(24, '24', 'จุดจอดเรือคลองเตย', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(25, '25', 'คลองเตย', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(26, '26', 'โค้งช่องนนทรี', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(27, '27', 'แหลมทองบางยอ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(28, '28', 'จุดจอดเรือคอนโดนก', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(29, '29', 'พีเอช บางยอ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(30, '30', 'ทรัพย์สถาพร', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(31, '31', 'จุดจอดเรือสาธุประดิษฐ์', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(32, '32', 'สะพานแขวนพระราม 9', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(33, '33', 'จุดจอดเรือสะพานแขวน', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(34, '34', 'วัดอินทร์บรรจง', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(35, '35', 'Big C ราษฎ์บูรณะ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(36, '36', 'คลังน้ำมัน SUSSO', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(37, '37', 'สะพานกรุงเทพ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(38, '38', 'สะพานสาธร', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(39, '39', 'สะพานพุทธ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(40, '40', 'สะพานปิ่นเกล้า', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(41, '41', 'สะพานพระราม 8', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(42, '42', 'สะพานสามเสน', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(43, '43', 'สะพานพระราม 7', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(44, '44', 'จุดจอดเรือสะพานพระราม 7', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(45, '1', 'สะพานพระราม 5', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(46, '2', 'จุดจอดเรือสะพานพระราม 5', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(47, '3', 'สะพานพระนั่งเกล้า', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(48, '4', 'จุดจอดเรือสะพานพระนั่งเกล้า', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(49, '5', 'ท้ายเกร็ด', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(50, '6', 'เหนือเกร็ด', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(51, '7', 'สะพานพระราม 4', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(52, '8', 'จุดจอดเรือสะพานรังสิต', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(53, '9', 'สะพานรังสิต(สะพานนนทบุรี)', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(54, '10', 'สะพานปทุมธานี', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(55, '11', 'จุดจอดเรือสะพานปทุม', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(56, '12', 'จุดจอดเรือสามโคก', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(57, '13', 'สะพานเชียงราก', 'นนทบุรี/ปทุมธานี', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(58, '1', 'ศูนย์ศิลปชีพบางไทร', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(59, '2', 'วัดช้างใหญ่', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(60, '3', 'ชัยยง บางไทร', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-07-12 09:59:19', NULL, NULL),
(61, '4', 'เคซี บางไทร', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(62, '5', 'เกษตรบางไทร', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(63, '6', 'วัดเชิงเลน', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(64, '7', 'พูนผลบางไทร', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(65, '8', 'ไทยเซ็นทรัลบางไทร', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-07-12 09:57:46', NULL, NULL),
(66, '9', 'ไต้ล้งบางไทร', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(67, '10', 'บางปะอินชัย', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(68, '11', 'วัดเชิงท่า', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(69, '12', 'ว โชคชัย', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(70, '13', 'พีแอนด์ เอส มิลลิ่ง', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(71, '14', 'บางปะอิน(อำเภอ)', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(72, '15', 'วัดบ้านพาสน์', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(73, '16', 'เทพาพรบางปะอิน', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-07-12 09:54:50', NULL, NULL),
(74, '17', 'จุดจอดเรือเกาะพระ', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(75, '18', 'จุดจอดเรือตลาดเกรียบ', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(76, '19', 'วัดทองบ่อ', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(77, '20', 'เพชรทองบ่อบางปะอิน', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(78, '21', 'วัดโปรดสัตว์', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(79, '22', 'จุดจอดเรือวัดไก่เตี้ย', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(80, '23', 'วัดช่างทอง', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(81, '24', 'จุดจอดเรือวัดทรงกุศล', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(82, '25', 'วัดทรงกุศล', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(83, '26', 'หมู่บ้านญี่ปุ่น', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(84, '24', 'สามแยกวัดพนัญเชิง', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(85, '28', 'สะพานปรีดี', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(86, '29', 'ตลาดเจ้าพรหม', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(87, '30', 'วัดปราสาท', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(88, '31', 'คลองเจ๊ก', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(89, '32', 'วัดป่าโค', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(90, '33', 'วัดใหม่โสมรินทร์', 'บางไทร/บางปะอิน', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(91, '1', 'วัดเกาะแก้ว', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(92, '2', 'จุดจอดเรือสะพานบ่อโพรง', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(93, '3', 'สะพานบ่อโพรง นครหลวง', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(94, '4', 'ปุ๋ยไทย NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(95, '5', 'นำสิน NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(96, '6', 'วัดโพธิ์ทอง', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(97, '7', 'จัมโบ้ NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(98, '8', 'วัดทองทรงธรรม', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(99, '9', 'ทุ่งทองNKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(100, '10', 'วัดเสด็จ', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(101, '11', 'โชคชัย NKLR', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(102, '12', 'เจริญกิจ NKLR', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(103, '13', 'TH NKLR', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(104, '14', 'ไทยเซ็นทรัล NKLR', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(105, '15', 'พีอาร์ NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(106, '16', 'สินวัฒนา NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(107, '17', 'ธนวัชNKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(108, '18', 'จุดจอดเรือวัดบันได', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(109, '19', 'จัมโบ้ใหม่ NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(110, '20', 'เจ๊หมวย NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(111, '21', 'วัดพร้าว', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(112, '22', 'นครหลวง(อำเภอ)', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(113, '23', 'วัดกลาง', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(114, '24', 'บางพระคู', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(115, '25', 'แพนด์ NKLR', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(116, '26', 'ภัทร NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(117, '27', 'ยู อี NKLL', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(118, '28', 'วัดปรีดาราม', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(119, '29', 'ปุ๋ยม้าบิน NKLR', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(120, '30', 'วัดแก้วนครหลวง', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(121, '31', 'วัดท่าช้างนครหลวง', 'นครหลวง/อยุธยา', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(122, '1', 'บิ๊กวอน', 'บิ๊กวอน/วัดบางม่วง', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(123, '2', 'วัดบางม่วง', 'บิ๊กวอน/วัดบางม่วง', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(124, '3', 'โพธิ์เอน', 'บิ๊กวอน/วัดบางม่วง', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(125, '4', 'วัดวังแดง', 'บิ๊กวอน/วัดบางม่วง', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(126, '5', 'วัดศักดิ์', 'บิ๊กวอน/วัดบางม่วง', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(127, '6', 'วัดศาลาลอย', 'บิ๊กวอน/วัดบางม่วง', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(128, '7', 'วัดสำมะกัน', 'บิ๊กวอน/วัดบางม่วง', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(129, '8', 'แม่กลองพานิชย์', 'แม่กลองพานิชย์', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(130, '1', 'ปากร่อง มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(131, '2', 'จร.วัดกำพร้า', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(132, '3', 'ทุ่น 10 มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(133, '4', 'มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(134, '5', 'วัดช่องลมมหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(135, '6', 'เสริมสิน มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(136, '7', 'รุ่งเจริญผล มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(137, '8', 'ปฐมรัตน์ มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(138, '9', 'เซ็นจูรี่ มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(139, '10', 'สะพานท่าจีน มหาชัย', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(140, '11', 'จร.ต้นไทร', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(141, '12', 'ส.อ่างทองท่าจีน', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(142, '13', 'วัดนางสาว', 'มหาชัย', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(143, '1', 'เกาะสีชัง', 'เกาะสีชัง-เรือใหญ่', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(144, '2', 'เรือใหญ่', 'เกาะสีชัง-เรือใหญ่', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(145, '1', 'บางปะอินไซโล', 'ท่าข้าม', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(146, '2', 'ฮะหลีท่าเรือ', 'ท่าข้าม', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(147, '3', 'ส.เทียนดัดท่าจีน', 'ท่าข้าม', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(148, '4', 'เอราวัณ สามพราน', 'ท่าข้าม', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(149, '5', 'แสงทองสามพราน', 'ท่าข้าม', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(150, '', 'ทรัพย์สถาพร NKL', 'นครหลวง/อยุธยา', '2017-07-12 09:50:30', NULL, '2017-07-12 09:51:15', NULL, NULL),
(151, '', 'บีดีเอส', 'กรุงเทพ ฯ', '2017-07-14 08:31:14', NULL, '2017-07-14 08:31:47', NULL, NULL),
(152, '', 'สยามคอมเมอร์เชียล', 'ชลบุรี', '2017-07-14 08:31:30', NULL, '2017-07-14 08:31:30', NULL, NULL),
(153, '', 'ซีอาร์ซี', 'กรุงเทพ ฯ', '2017-07-14 08:32:14', NULL, '2017-07-14 08:32:14', NULL, NULL),
(154, '', 'ไอพี5 บางปะกง', 'บางปะกง', '2017-07-14 08:33:31', NULL, '2017-07-14 09:37:05', NULL, NULL),
(155, '', 'บ้านโพธิ์ บางปะกง', 'บางปะกง', '2017-07-14 09:37:46', NULL, '2017-07-14 09:37:46', NULL, NULL),
(156, '', 'เวิล์ดเฟอท บางไทร', 'บางไทร', '2017-07-26 04:08:06', NULL, '2017-07-26 04:08:06', NULL, NULL),
(157, '', 'กระดาษ บางปะอิน', 'บางไทร/บางปะอิน', '2017-08-03 08:44:43', NULL, '2017-08-03 08:45:22', NULL, NULL),
(158, '2', 'โค้งบางปู', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(159, '3', 'ทุ่น 33 เจ้าพระยา', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(160, '4', 'อู่ซีเครส', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(161, '5', 'อู่อชิมา', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(162, '6', 'ปากน้ำ', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(163, '7', 'ธนากร', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(164, '8', 'ไทยรวมทุน', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(165, '9', 'มิตรผล', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:02:12', NULL, NULL),
(166, '1', 'ทุ่นขาวเจ้าพระยา', 'กรุงเทพ ฯ', '2017-05-24 09:02:07', NULL, '2017-05-24 09:16:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Smd_Owner`
--

CREATE TABLE `ck_Master_Smd_Owner` (
  `id` int(10) UNSIGNED NOT NULL,
  `OwnerCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `OwnerName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerNameBill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerNameEng` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerShortName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerAddress20` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerRoad20` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerTambon20` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerAmphoe20` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerProvince20` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerPostCode20` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerRoad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerTambon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerAmphoe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerProvince` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerPostCode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerTel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerFax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerMail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerHomepage` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerDate` date DEFAULT NULL,
  `OwenrIDcard` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwenrTax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwenrBranch` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwenrCreditLimit` double DEFAULT NULL,
  `OwenrDay` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Master_Smd_Owner`
--

INSERT INTO `ck_Master_Smd_Owner` (`id`, `OwnerCode`, `OwnerName`, `OwnerNameBill`, `OwnerNameEng`, `OwnerShortName`, `OwnerAddress20`, `OwnerRoad20`, `OwnerTambon20`, `OwnerAmphoe20`, `OwnerProvince20`, `OwnerPostCode20`, `OwnerAddress`, `OwnerRoad`, `OwnerTambon`, `OwnerAmphoe`, `OwnerProvince`, `OwnerPostCode`, `OwnerTel`, `OwnerFax`, `OwnerMail`, `OwnerHomepage`, `OwnerDate`, `OwenrIDcard`, `OwenrTax`, `OwenrBranch`, `OwenrCreditLimit`, `OwenrDay`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '', 'BUNGE ASIA PTE LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-04 04:27:24', NULL, '2017-07-11 01:28:13', NULL, NULL),
(2, '', 'บริษัท แสงเทียนขนส่ง', NULL, NULL, NULL, '34 ม.3', '-', 'ตำบลแม่ลา', 'อำเภอนครหลวง', 'จังหวัดพระนครศรีอยุธยา', '13260', '34 ม.3', '-', 'ตำบลแม่ลา', 'อำเภอนครหลวง', 'จังหวัดพระนครศรีอยุธยา', '13260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-04 06:10:10', NULL, '2017-07-07 08:32:19', NULL, NULL),
(3, '12A017', 'บริษัท อาร์.เอส.วี.ทาปิโอก้า จำกัด (สำนักงานใหญ่) 0105533007112', NULL, NULL, NULL, '670/63', 'ถนนพหลโยธิน', 'แขวงสามเสนใน', 'เขตพญาไท', 'กรุงเทพมหานคร', NULL, '670/63', 'ถนนพหลโยธิน', 'แขวงสามเสนใน', 'เขตพญาไท', 'กรุงเทพมหานคร', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105,533,007,112', 'สำนักงานใหญ่', 0, 30, '2017-07-07 08:45:25', NULL, '2017-09-13 03:54:07', NULL, NULL),
(4, '12K008', 'บริษัท เคอรี่ ฟลาวมิลล์ จำกัด (สำนักงานใหญ่) 0105532117534', NULL, NULL, NULL, '121 หมู่ที่ 2 ซ.วัดแค', 'ถ.สุขสวัสดิ์', 'ต.ปากคลองบางปลากด', 'อ.พระสมุทรเจดีย์', 'จ.สมุทรปราการ', '10290', '121 หมู่ที่ 2 ซ.วัดแค', 'ถ.สุขสวัสดิ์', 'ต.ปากคลองบางปลากด', 'อ.พระสมุทรเจดีย์', 'จ.สมุทรปราการ', '10290', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 09:07:21', NULL, '2017-07-07 09:07:21', NULL, NULL),
(5, '12K015', 'บริษัท โกลเด้นท์ซัน อินเตอร์เทรด จำกัด (สำนักงานใหญ่) 0105550123532', NULL, NULL, NULL, '9/5', 'ถนนเดโช', 'แขวงสุริยวงศ์', 'เขตบางรัก', 'กรุงเทพมหานคร', '10500', '9/5', 'ถนนเดโช', 'แขวงสุริยวงศ์', 'เขตบางรัก', 'กรุงเทพมหานคร', '10500', NULL, NULL, NULL, NULL, NULL, NULL, '0105550123532', 'สำนักงานใหญ่', 0, NULL, '2017-07-08 01:56:13', NULL, '2017-07-20 07:14:46', NULL, NULL),
(6, '12B006', 'บริษัท บางกอกแร้นช์ จำกัด (มหาชน) (สาขา00001) 0107556000493', NULL, NULL, NULL, '133  หมู่ 4', 'ถนนสายเอเชีย กม.119', 'ต.บ้านหม้อ', 'อ.พรหมบุรี', 'จ.สิงห์บุรี', '16120', '133  หมู่ 4', 'ถนนสายเอเชีย กม.119', 'ต.บ้านหม้อ', 'อ.พรหมบุรี', 'จ.สิงห์บุรี', '16120', '02-7520401', '02-3373293, 3373295', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 04:24:45', NULL, '2017-07-08 04:24:45', NULL, NULL),
(7, '12J009', 'บริษัท เจบีเอฟ จำกัด (สำนักงานใหญ่) 0125549005289', NULL, NULL, NULL, '333/13 ม.9', 'ถ.บางบัวทอง-สุพรรณบุรี', 'ตำบลละหาร', 'อำเภอบางบัวทอง', 'จังหวัดนนทบุรี', '11110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 04:29:50', NULL, '2017-07-08 04:29:50', NULL, NULL),
(8, '12L001', 'บริษัท ลีพัฒนาผลิตภัณฑ์ จำกัด (มหาชน) (สำนักงานใหญ่) 0107537000718', NULL, NULL, NULL, '33/137 ชั้น 28 อาคารวอลล์สตรีททาวเวอร์', 'ถนนสุรวงศ์', NULL, 'เขตบางรัก', 'กรุงเทพมหานคร', '10500', '33/137 ชั้น 28 อาคารวอลล์สตรีททาวเวอร์', 'ถนนสุรวงศ์', NULL, 'เขตบางรัก', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 04:48:58', NULL, '2017-07-08 04:48:58', NULL, NULL),
(9, '12L002', 'บริษัท ลีพัฒนาอาหารสัตว์ จำกัด (สำนักงานใหญ่) 0105527033514', NULL, 'Lee Pattana Feedmill Co., Ltd.', NULL, '33/137 ชั้น 28 อาคารวอลล์สตรีททาวเวอร์', 'ถนนสุรวงศ์', NULL, 'เขตบางรัก', 'กรุงเทพมหานคร', NULL, '33/137 ชั้น 28 อาคารวอลล์สตรีททาวเวอร์', 'ถนนสุรวงศ์', NULL, 'เขตบางรัก', 'กรุงเทพมหานคร', '10500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 05:00:39', NULL, '2017-07-08 05:00:54', NULL, NULL),
(10, '12M009', 'บริษัท วีพีเอฟ กรุ๊ป (1973) จำกัด (สำนักงานใหญ่) 0505539000248', 'บริษัท วีพีเอฟ กรุ๊ป (1973) จำกัด (สำนักงานใหญ่) 0505539000248', NULL, NULL, '29  หมู่ 6', NULL, 'ตำบล สันทรายน้อย', 'อำเภอ สันทราย', 'จังหวัด เชียงใหม่', '50210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 05:02:23', NULL, '2017-07-08 05:02:23', NULL, NULL),
(11, '12N007', 'บริษัท หนองบัว ฟีด มิลล์ จำกัด (สำนักงานใหญ่) 0705549000052', 'บริษัท หนองบัว ฟีด มิลล์ จำกัด (สำนักงานใหญ่) 0705549000052', NULL, NULL, '180 หมู่ 1', NULL, 'ตำบลบ่อกระดาน', 'อำเภอปากท่อ', 'จังหวัดราชบุรี', '70140', '180 หมู่ 1', NULL, 'ตำบลบ่อกระดาน', 'อำเภอปากท่อ', 'จังหวัดราชบุรี', '70140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 05:04:53', NULL, '2017-07-08 05:04:53', NULL, NULL),
(12, '12R007', 'บริษัท เหรียญทองฟีด (1992) จำกัด 0735535002295', NULL, 'Rianthong Feed (1992) Co., Ltd.', NULL, '1  หมู่ 10', 'ถนนพลดำริห์', 'ต.ดอนตูม', 'อ.บางเลน', 'จ.นครปฐม', NULL, NULL, '73130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:27:25', NULL, '2017-07-08 06:27:25', NULL, NULL),
(13, '12R013', 'บริษัท อาร์ที อะกริเทค จำกัด (สำนักงานใหญ่)  0735550002055', NULL, NULL, NULL, NULL, NULL, NULL, 'อำเภอกำแพงแสน', 'จังหวัดนครปฐม', '73140', NULL, NULL, NULL, 'อำเภอกำแพงแสน', 'จังหวัดนครปฐม', '73140', NULL, NULL, NULL, NULL, '2017-07-19', '11', '22', '33', 1, 2, '2017-07-08 06:29:21', NULL, '2017-07-11 07:55:15', NULL, NULL),
(14, '12A025', 'บริษัท อาหารสัตว์ไทยสวนหลวง จำกัด (สำนักงานใหญ่) 0745531000301', NULL, NULL, NULL, '72 ม.7', NULL, 'ตำบลสวนหลวง', 'อำเภอกระทุ่มแบน', 'จังหวัดสมุทรสาคร', '74110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:30:56', NULL, '2017-07-08 06:30:56', NULL, NULL),
(15, '12T016', 'บริษัท ไทยฟู้ดส์อาหารสัตว์ จำกัด ( สำนักงานใหญ่) 0145548002146', NULL, NULL, NULL, '119  หมู่ 3', 'ถนนมาลัยแมน', 'ตำบลสระพังลาน', 'อำเภออู่ทอง', 'จังหวัดสุพรรณบุรี', '72220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:33:08', NULL, '2017-07-08 06:33:08', NULL, NULL),
(16, '12T020', 'บริษัท ไทยลักซ์ เอ็นเตอร์ไพรส์ จำกัด (มหาชน) (สำนักงานใหญ่) 0107537000670', NULL, NULL, NULL, '69/5  หมู่ 5', 'ถนนพระราม 2', 'ตำบลบางขันแตก', 'อำเภอเมือง', 'จังหวัดสมุทรสงคราม', '75000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:35:05', NULL, '2017-07-08 06:35:05', NULL, NULL),
(17, '12S008', 'บริษัท ซันฟีด จำกัด (สำนักงานใหญ่) 0105531060369', NULL, NULL, NULL, '1/97-98  ซอยพหลโยธิน 40', 'ถนนพหลโยธิน', 'แขวงเสนานิคม', 'เขตจตุจักร', 'กรุงเทพมหานคร', '10900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:36:35', NULL, '2017-07-08 06:36:35', NULL, NULL),
(18, '12G001', 'บริษัท กรุงไทยอาหาร จำกัด (มหาชน) (สำนักงานใหญ่) 0107537001463', NULL, NULL, NULL, '312', 'ถนนพระรามที่ 2', 'แขวงบางมด', 'เขตจอมทอง', 'กรุงเทพมหานคร', '10150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:38:00', NULL, '2017-07-08 06:38:00', NULL, NULL),
(19, '12C001', 'บริษัท ผลิตภัณฑ์อาหารเซ็นทรัล จำกัด (สำนักงานใหญ่) 0105515003313', NULL, NULL, NULL, '7/3 หมู่ 1', 'ถนนพหลโยธิน', 'ตำบลคลองหนึ่ง', 'อำเภอคลองหลวง', 'จังหวัดปทุมธานี', '12120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:39:44', NULL, '2017-07-08 06:39:44', NULL, NULL),
(20, '12I003', 'บริษัท อินเทคค์ ฟีด จำกัด (สำนักงานใหญ่) 0105542045331', NULL, 'Inteqc Feed Co., Ltd.', NULL, '77/12  หมู่ 2', 'ถนนพระราม 2', 'ตำบลนาโคก', 'อำเภอเมืองสมุทรสาคร', 'จังหวัดสมุทรสาคร', '74000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:41:20', NULL, '2017-07-08 06:41:20', NULL, NULL),
(21, '12K005', 'บริษัท ก้าวหน้า อุตสาหกรรม อาหารสัตว์ จำกัด (สำนักงานใหญ่) 0345539000088', NULL, NULL, NULL, '87  หมู่ 8', 'ถ.วารินชำราบ - กันทรลักษ์', 'ต. สำโรง', 'อ.สำโรง', 'จ.อุบลราชธานี', '34360', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:43:05', NULL, '2017-07-08 06:43:05', NULL, NULL),
(22, '12L006', 'บริษัท แหลมทองสหการ จำกัด (สำนักงานใหญ่) 0105516000709', NULL, NULL, NULL, '1126/1', 'ถ.เพชรบุรีตัดใหม่', 'แขวงมักกะสัน', 'เขตราชเทวี', 'กรุงเทพมหานคร', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-08 06:44:15', NULL, '2017-07-08 06:44:15', NULL, NULL),
(23, '12P030', 'บริษัท พนัสโภคภัณฑ์ จำกัด(สำนักงานใหญ่) 0205559007275', NULL, 'Panus Pokphand Co., Ltd.', NULL, '123', NULL, 'ตำบลแสนสุข', 'อำเภอพนัสนิคม', 'จังหวัดชลบุรี', '20140', '123', NULL, 'ตำบลแสนสุข', 'อำเภอพนัสนิคม', 'จังหวัดชลบุรี', '20140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2017-07-08 07:30:56', NULL, '2017-07-12 08:41:50', NULL, NULL),
(24, '12C009', 'บริษัท ซี.เอส.พี.ชิปปิ้ง (2000) จำกัด (สำนักงานใหญ่) 0105543055624', NULL, NULL, NULL, '99 , 101 ซอยดำรงค์ลัทธพิพัฒน์', 'ถนนอาจณรงค์', 'แขวงคลองเตย', 'เขตคลองเตย', 'กรุงเทพมหานคร', '10110', '99 , 101 ซอยดำรงค์ลัทธพิพัฒน์', 'ถนนอาจณรงค์', 'แขวงคลองเตย', 'เขตคลองเตย', 'กรุงเทพมหานคร', '10110', NULL, NULL, NULL, NULL, NULL, NULL, '105,543,055,624', 'สำนักงานใหญ่', 0, 30, '2017-07-14 08:13:01', NULL, '2017-07-18 06:13:39', NULL, NULL),
(25, '12Y001', 'บริษัท ยิ่งวัฒนา ทาปิโอก้า จำกัด (สำนักงานใหญ่) 0275550000120', NULL, NULL, NULL, '261/2-3  หมู่ 1', NULL, 'ตำบลวังน้ำเย็น', 'อำเภอวังน้ำเย็น', 'จังหวัดสระแก้ว', '27210', '261/2-3  หมู่ 1', NULL, 'ตำบลวังน้ำเย็น', 'อำเภอวังน้ำเย็น', 'จังหวัดสระแก้ว', '27210', '037-251281-2', '037-251148', NULL, NULL, NULL, NULL, '275,550,000,120', 'สำนักงานใหญ่', 0, 30, '2017-07-18 06:22:49', NULL, '2017-07-18 06:23:28', NULL, NULL),
(26, '12B015', 'บริษัท บัลค์โปรส์ จำกัด สำนักงานใหญ่ 0105552032615', NULL, NULL, NULL, '142  ซอยพัฒนาการ 53', NULL, 'แขวงสวนหลวง', 'เขตสวนหลวง', 'กรุงเทพมหานคร', NULL, '142  ซอยพัฒนาการ 53', NULL, 'แขวงสวนหลวง', 'เขตสวนหลวง', 'กรุงเทพมหานคร', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0105552032615', NULL, 0, 30, '2017-07-26 04:03:25', NULL, '2017-07-26 04:04:00', NULL, NULL),
(27, '12T042', 'บริษัท ทาปิโอกา อินเตอร์ คอร์ปอเรชั่น จำกัด (สำนักงานใหญ่) 0145558000715', NULL, NULL, NULL, '11/11 ชั้นที่ 3', 'ถนนโรจนะ', 'ตำบลหอรัตนไชย', 'อำเภอพระนครศรีอยุธยา', 'จังหวัดพระนครศรีอยุธยา', '13000', '11/11 ชั้นที่ 3', 'ถนนโรจนะ', 'ตำบลหอรัตนไชย', 'อำเภอพระนครศรีอยุธยา', 'จังหวัดพระนครศรีอยุธยา', '13000', NULL, NULL, NULL, NULL, NULL, NULL, '0145558000715', 'สำนักงานใหญ่', 0, 30, '2017-07-26 04:24:05', NULL, '2017-07-26 04:24:05', NULL, NULL),
(28, '12T011', 'บริษัท ธนากรผลิตภัณฑ์น้ำมันพืช จำกัด (สำนักงานใหญ่) 0105517009831', NULL, NULL, NULL, '99 หมู่ 2 ซอยธนากร', 'ถนนพระสมุทรเจดีย์', 'ต.ปากคลองบางปลากด', 'อ.พระสมุทรเจดีย์', 'จ.สมุทรปราการ', '10290', '99 หมู่ 2 ซอยธนากร', 'ถนนพระสมุทรเจดีย์', 'ต.ปากคลองบางปลากด', 'อ.พระสมุทรเจดีย์', 'จ.สมุทรปราการ', '10290', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2017-08-03 07:51:01', NULL, '2017-08-03 07:51:01', NULL, NULL),
(29, '12B010', 'เบทาโกร จำกัด (มหาชน) (สำนักงานใหญ่) 0107539000022', 'เบทาโกร จำกัด (มหาชน) (สำนักงานใหญ่) 0107539000022', NULL, NULL, '323 หมู่ 6 ถนนวิภาวดีรังสิต', 'วิภาวดีรังสิต', NULL, 'เขตหลักสี่', 'กรุงเทพมหานคร', '10210', '323 หมู่ 6 ถนนวิภาวดีรังสิต', 'วิภาวดีรังสิต', NULL, 'เขตหลักสี่', 'กรุงเทพมหานคร', '10210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2017-09-23 02:57:49', NULL, '2017-09-23 02:57:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Smd_Owner_Client`
--

CREATE TABLE `ck_Master_Smd_Owner_Client` (
  `id` int(10) UNSIGNED NOT NULL,
  `OwnerID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ClientName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientTel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientPosition` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientResponsibility` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientRoad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientTambon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientAmphoe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientProvince` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientPostCode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientMail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientDefault` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Master_Smd_Owner_Client`
--

INSERT INTO `ck_Master_Smd_Owner_Client` (`id`, `OwnerID`, `ClientName`, `ClientTel`, `ClientPosition`, `ClientResponsibility`, `ClientAddress`, `ClientRoad`, `ClientTambon`, `ClientAmphoe`, `ClientProvince`, `ClientPostCode`, `ClientMail`, `ClientDefault`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 10, '1', '2', '7', '8', '3', '9', '4', '10', '5', '11', '6', NULL, '2017-07-13 11:09:37', NULL, '2017-07-13 11:11:07', NULL, '2017-07-13 11:11:07'),
(2, 10, '11', '22', '77', '88', '33', '99', '44', '10', '55', '11', '66', NULL, '2017-07-13 20:01:37', NULL, '2017-07-13 20:05:19', NULL, NULL),
(3, 24, 'คุณบ๊ะ', '086-7973982', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:12:02', NULL, '2017-07-18 06:12:02', NULL, NULL),
(4, 25, 'คุณรัชนี', '037-251-281-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:23:16', NULL, '2017-07-18 06:23:16', NULL, NULL),
(5, 5, 'เอ', '1111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-20 07:12:41', NULL, '2017-07-20 07:12:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Smd_Product`
--

CREATE TABLE `ck_Master_Smd_Product` (
  `id` int(10) UNSIGNED NOT NULL,
  `ProductCat` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ProductCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ProductName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Master_Smd_Product`
--

INSERT INTO `ck_Master_Smd_Product` (`id`, `ProductCat`, `ProductCode`, `ProductName`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, '', 'FERTILIZER / ปุ๋ย', '2017-07-04 06:17:06', NULL, '2017-07-05 02:25:39', NULL, NULL),
(2, 1, '', 'TAPIOCA CHIPS / มันเส้น', '2017-07-04 06:29:03', NULL, '2017-07-05 02:24:21', NULL, NULL),
(3, 1, '', 'ARG SB / ถั่วเหลือง', '2017-07-05 02:17:23', NULL, '2017-07-05 02:19:30', NULL, NULL),
(4, 1, '', 'BZL SB / ถั่วเหลือง', '2017-07-05 02:17:52', NULL, '2017-07-05 02:17:52', NULL, NULL),
(5, 1, '', 'ARG SBM / กากถั่วเหลือง', '2017-07-05 02:19:48', NULL, '2017-07-05 02:19:48', NULL, NULL),
(6, 1, '', 'BZL SBM / กากถั่วเหลือง', '2017-07-05 02:20:09', NULL, '2017-07-05 02:20:09', NULL, NULL),
(7, 1, '', 'WOOD CHIP / ไม้สับ', '2017-07-05 02:21:14', NULL, '2017-07-05 02:22:42', NULL, NULL),
(8, 1, '', 'CLINKER / ปูน', '2017-07-05 02:21:37', NULL, '2017-07-05 02:21:37', NULL, NULL),
(9, 1, '', 'COAL / ถ่านหิน', '2017-07-05 02:21:59', NULL, '2017-07-05 02:21:59', NULL, NULL),
(10, 3, '', 'STEEL PRODUCT / เหล็กเส้น', '2017-07-05 02:25:00', NULL, '2017-07-05 02:42:04', NULL, NULL),
(11, 1, '', 'AUS WHEAT / ข้าวสาลี www 10.50%', '2017-07-05 02:26:14', NULL, '2017-08-03 07:55:59', NULL, NULL),
(12, 1, '', 'US WHEAT / ข้าวสาลี', '2017-07-05 02:27:22', NULL, '2017-07-05 02:27:22', NULL, NULL),
(13, 1, '', 'BZL FEED WHEAT / ข้าวสาลี', '2017-07-05 02:30:02', NULL, '2017-07-05 02:30:02', NULL, NULL),
(14, 1, '', 'ARG FEED WHEAT / ข้าวสาลี', '2017-07-05 02:30:59', NULL, '2017-07-05 02:30:59', NULL, NULL),
(15, 1, '', 'CANOLA MEAL PELLET / กากองุ่น', '2017-07-05 02:35:37', NULL, '2017-07-05 02:35:37', NULL, NULL),
(16, 1, '', 'US SB / ถั่วเหลือง', '2017-07-05 02:36:47', NULL, '2017-07-05 02:36:47', NULL, NULL),
(17, 1, '', 'US SBM / กากถั่วเหลือง', '2017-07-05 02:37:03', NULL, '2017-07-05 02:37:03', NULL, NULL),
(18, 3, '', 'SLABS / เหล็กแผ่น', '2017-07-05 02:39:44', NULL, '2017-07-05 02:39:44', NULL, NULL),
(19, 1, '', 'RAW SUGAR / น้ำตาล', '2017-07-05 02:43:11', NULL, '2017-07-05 02:43:11', NULL, NULL),
(20, 1, '', 'SODA ASH / โซดาแอช', '2017-07-05 02:44:42', NULL, '2017-07-05 02:44:42', NULL, NULL),
(21, 3, '', 'COIL / เหล็กม้วน', '2017-07-05 02:46:13', NULL, '2017-07-05 02:46:13', NULL, NULL),
(22, 1, '', 'CORN / ข้าวโพด', '2017-07-05 02:47:42', NULL, '2017-07-05 02:47:42', NULL, NULL),
(23, 3, '', 'BILLETS / เหล็ก', '2017-07-05 02:51:32', NULL, '2017-07-05 02:51:32', NULL, NULL),
(24, 1, '', 'ข้าวนึ่ง', '2017-07-05 02:57:58', NULL, '2017-07-05 02:57:58', NULL, NULL),
(25, 1, '', 'GYPSUM / ยิปซัม', '2017-07-05 06:39:54', NULL, '2017-07-05 06:39:54', NULL, NULL),
(26, 1, '', 'กากมัน', '2017-07-18 06:25:05', NULL, '2017-07-18 06:25:05', NULL, NULL),
(27, 1, '', 'AUS WHEAT / ข้าวสาลี nsw 14.00%', '2017-08-03 07:56:37', NULL, '2017-08-03 07:56:37', NULL, NULL),
(28, 1, '', 'AUS WHEAT / ข้าวสาลี nsw 14.50%', '2017-08-03 07:57:18', NULL, '2017-08-03 07:57:18', NULL, NULL),
(29, 1, '', 'AUS WHEAT / ข้าวสาลี hrw 11.50%', '2017-08-03 07:57:59', NULL, '2017-08-03 07:57:59', NULL, NULL),
(30, 1, '', 'AUS WHEAT / ข้าวสาลี', '2017-08-03 07:59:24', NULL, '2017-08-03 07:59:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Smd_Route`
--

CREATE TABLE `ck_Master_Smd_Route` (
  `id` int(11) NOT NULL,
  `RouteCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RouteName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ใบแจ้งงานหน้าท่า - ข้อมูลต้นทาง-ปลายทาง';

--
-- Dumping data for table `ck_Master_Smd_Route`
--

INSERT INTO `ck_Master_Smd_Route` (`id`, `RouteCode`, `RouteName`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, NULL, 'ท่าสินวัฒนา', '2017-07-08 03:10:56', NULL, '2017-07-13 01:12:39', NULL, NULL),
(2, NULL, 'ท่าไทยรวมทุน', '2017-07-08 03:18:31', NULL, '2017-07-08 03:18:31', NULL, NULL),
(3, NULL, 'ไซโลใหม่ (วัดแค)', '2017-07-08 03:18:52', NULL, '2017-07-08 03:18:52', NULL, NULL),
(4, NULL, 'ท่าสินวัฒนา โกดัง 1', '2017-07-08 03:20:02', NULL, '2017-07-08 07:03:44', NULL, NULL),
(5, NULL, 'ท่าสินวัฒนา โกดัง 2', '2017-07-08 03:20:12', NULL, '2017-07-08 07:03:57', NULL, NULL),
(6, NULL, 'ท่าสินวัฒนา โกดัง 3', '2017-07-08 03:20:21', NULL, '2017-07-08 07:04:09', NULL, NULL),
(7, NULL, 'ท่าสินวัฒนา โกดัง 4', '2017-07-08 03:20:33', NULL, '2017-07-08 07:04:58', NULL, NULL),
(8, NULL, 'ท่าสินวัฒนา โกดัง 5', '2017-07-08 03:22:17', NULL, '2017-07-08 07:05:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Smd_Warehouse`
--

CREATE TABLE `ck_Master_Smd_Warehouse` (
  `id` int(11) NOT NULL,
  `WarehouseCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WarehouseName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ใบแจ้งงานหน้าท่า - หมายเลขโกดัง';

--
-- Dumping data for table `ck_Master_Smd_Warehouse`
--

INSERT INTO `ck_Master_Smd_Warehouse` (`id`, `WarehouseCode`, `WarehouseName`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(5, NULL, 'โกดัง 1', '2017-07-14 08:20:13', NULL, '2017-07-14 08:20:13', NULL, NULL),
(6, NULL, 'โกดัง 2', '2017-07-14 08:20:20', NULL, '2017-07-14 08:20:20', NULL, NULL),
(7, NULL, 'โกดัง 3', '2017-07-14 08:20:25', NULL, '2017-07-14 08:20:25', NULL, NULL),
(8, NULL, 'โกดัง 4', '2017-07-14 08:20:34', NULL, '2017-07-14 08:20:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Master_Sweep`
--

CREATE TABLE `ck_Master_Sweep` (
  `id` int(11) NOT NULL,
  `Division` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `SweepCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SweepName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SweepNote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SweepStatus` int(11) DEFAULT '1',
  `WeightMonthly` double NOT NULL,
  `WeightYearly` double NOT NULL,
  `LastJob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastEnd` timestamp NULL DEFAULT NULL,
  `LastWork` timestamp NULL DEFAULT NULL,
  `QueueJob` varbinary(10) DEFAULT NULL,
  `QueueStart` timestamp NULL DEFAULT NULL,
  `QueueFinish` timestamp NULL DEFAULT NULL,
  `check_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ฝ่ายขนถ่ายสินค้าทางทะเล - สายกวาด';

--
-- Dumping data for table `ck_Master_Sweep`
--

INSERT INTO `ck_Master_Sweep` (`id`, `Division`, `SweepCode`, `SweepName`, `SweepNote`, `SweepStatus`, `WeightMonthly`, `WeightYearly`, `LastJob`, `LastEnd`, `LastWork`, `QueueJob`, `QueueStart`, `QueueFinish`, `check_at`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'FTS', NULL, 'นาย สุทัศ  นครสวรรค์', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:23', 2, '2017-10-09 02:40:02', 2, NULL),
(2, 'FTS', NULL, 'FTS สายกวาด B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:37', 2, '2017-07-18 06:17:37', NULL, NULL),
(3, 'FTS', NULL, 'FTS สายกวาด C', NULL, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:01', 2, '2017-07-18 06:23:51', NULL, NULL),
(4, 'FTS', NULL, 'FTS สายกวาด D', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:07', 2, '2017-07-19 03:18:44', NULL, NULL),
(5, 'SWP', NULL, 'SWP สายกวาด D', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:07', 2, '2017-07-19 03:18:44', NULL, NULL),
(6, 'SWP', NULL, 'SWP สายกวาด C', NULL, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:01', 2, '2017-07-18 06:23:51', NULL, NULL),
(7, 'SWP', NULL, 'SWP สายกวาด B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:37', 2, '2017-07-18 06:17:37', NULL, NULL),
(8, 'SWP', NULL, 'SWP สายกวาด A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:37', 2, '2017-07-18 06:17:37', NULL, NULL),
(9, 'CLM', NULL, 'CLM สายกวาด D', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:07', 2, '2017-07-19 03:18:44', NULL, NULL),
(10, 'CLM', NULL, 'CLM สายกวาด C', NULL, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:18:01', 2, '2017-07-18 06:23:51', NULL, NULL),
(11, 'CLM', NULL, 'CLM สายกวาด B', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:37', 2, '2017-07-18 06:17:37', NULL, NULL),
(12, 'CLM', NULL, 'CLM สายกวาด A', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 06:17:37', 2, '2017-07-18 06:17:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_menu`
--

CREATE TABLE `ck_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_menu`
--

INSERT INTO `ck_menu` (`id`, `pid`, `menu_name`, `menu_link`, `menu_active`, `menu_icon`, `menu_sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(90, 0, 'ข้อมูลผู้ใช้งาน', 'admin/master/employee', 'Y', 'fa fa-users', 8, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(100, 0, 'ส่วนฝ่ายขายและการตลาด', '#', 'Y', 'fa fa-table', 1, '2017-02-09 21:15:05', '2017-02-09 21:15:05', NULL),
(101, 100, 'บันทึกใบสั่งขาย', 'smd/order', 'Y', 'fa fa-file-text-o', 1, '2017-02-09 21:15:05', '2017-02-09 21:15:05', NULL),
(109, 100, 'รายชื่อพนักงาน', 'smd/staff', 'Y', 'fa fa-file-text-o', 5, '2017-02-09 21:15:05', '2017-02-09 21:15:05', NULL),
(150, 0, 'ฝ่ายขนถ่ายสินค้าทางทะเล', '#', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(151, 150, 'เตรียมความพร้อม', 'fts/prepare', 'Y', 'fa fa-rebel', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(152, 150, 'การปฏิบัติงานเรือใหญ่', 'fts/operation', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(155, 150, 'ข้อมูลพนักงาน', 'fts/staff', 'Y', 'fa fa-rebel', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(157, 150, 'ข้อมูลเครื่องจักร', 'fts/machine/index', 'Y', 'fa fa-rebel', 7, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(158, 150, 'ตรวจเช็คเครื่องจักร', 'fts/machine/inspection-check', 'Y', 'fa fa-rebel', 8, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(159, 150, 'อนุมัติการตรวจเช็ค', 'fts/machine/inspection-approve', 'Y', 'fa fa-rebel', 9, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(200, 0, 'ฝ่ายท่าเรือสินวัฒนา', '#', 'Y', 'fa fa-paper-plane', 3, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(201, 200, 'เตรียมความพร้อม', 'swp/prepare', 'Y', 'fa fa-rebel', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(202, 200, 'การปฏิบัติงาน', 'swp/operation', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(205, 200, 'ข้อมูลพนักงาน', 'swp/staff', 'Y', 'fa fa-paper-plane', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(206, 200, 'เครื่องจักร', 'swp/machine/index', 'Y', 'fa fa-rebel', 6, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(207, 200, 'ซ่อมบำรุง', 'swp/machine/index', 'Y', 'fa fa-rebel', 7, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(209, 200, 'ต้นทุนและคลังสินค้า', 'swp/machine/inspection', 'Y', 'fa fa-rebel', 9, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(210, 209, 'ปริมาณน้ำมัน', 'swp/fuel/balance', 'Y', 'fa fa-rebel', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(211, 209, 'รับน้ำมันเข้าสต๊อก', 'swp/fuel/receive', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(212, 209, 'จ่ายน้ำมันในบริษัท', 'swp/fuel/company', 'Y', 'fa fa-rebel', 3, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(213, 209, 'จ่ายน้ำมันในงาน', 'swp/fuel/job', 'Y', 'fa fa-rebel', 4, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(214, 209, 'จ่ายน้ำมันเรือยนต์', 'swp/fuel/boats', 'Y', 'fa fa-rebel', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(215, 209, 'ขายน้ำมัน', 'swp/fuel/sell', 'Y', 'fa fa-rebel', 6, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(216, 206, 'ตรวจเช็คเครื่องจักร', 'swp/machine/inspection-check', 'Y', 'fa fa-rebel', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(217, 206, 'อนุมัติการตรวจเช็ค', 'swp/machine/inspection-approve', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(218, 206, 'ลงเวลาการทำงานประจำวัน', 'swp/machine/inspection', 'Y', 'fa fa-rebel', 3, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(219, 206, 'Logbook', 'swp/machine/inspection', 'Y', 'fa fa-rebel', 4, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(220, 207, 'ข้อมูลเครื่องจักร', 'swp/machine/index', 'Y', 'fa fa-rebel', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(221, 207, 'แผน PM เครื่องจักร', 'swp/machine/index', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(250, 0, 'ฝ่ายขนถ่ายสินค้าท่าเรือ', '#', 'Y', 'fa fa-paper-plane-o', 4, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(251, 250, 'เตรียมความพร้อม', 'clm/prepare', 'Y', 'fa fa-rebel', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(252, 250, 'การปฏิบัติงาน', 'clm/operation', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(255, 250, 'ข้อมูลพนักงาน', 'clm/staff', 'Y', 'fa fa-rebel', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(258, 250, 'ตรวจเช็คเครื่องจักร', 'clm/machine/inspection-check', 'Y', 'fa fa-rebel', 8, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(259, 250, 'อนุมัติการตรวจเช็ค', 'clm/machine/inspection-approve', 'Y', 'fa fa-rebel', 9, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(300, 0, 'ฝ่ายขนส่งสินค้าทางน้ำ', '#', 'Y', 'fa fa-reddit', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(301, 300, 'เตรียมความพร้อม', 'rtm/prepare', 'Y', 'fa fa-rebel', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(302, 300, 'การปฏิบัติงาน', 'rtm/operation', 'Y', 'fa fa-rebel', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(305, 300, 'ข้อมูลพนักงาน', 'rtm/staff', 'Y', 'fa fa-rebel', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(308, 300, 'ข้อมูลเครื่องจักร', 'rtm/machine/index', 'Y', 'fa fa-rebel', 8, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(309, 300, 'ตรวจเช็คเครื่องจักร', 'rtm/machine/inspection-check', 'Y', 'fa fa-rebel', 9, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(999, 0, 'Master Data', '', 'Y', 'fa fa-sliders', 9, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1000, 999, 'ส่วนฝ่ายขายและการตลาด', '#', 'Y', 'fa fa-align-left', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1001, 1000, 'ข้อมูลลูกค้า', 'admin/master/smd/owner', 'Y', 'fa fa-align-left', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1002, 1000, 'ข้อมูลเรือใหญ่', 'admin/master/smd/boat', 'Y', 'fa fa-align-left', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1003, 1000, 'ข้อมูลสินค้า', 'admin/master/smd/product', 'Y', 'fa fa-align-left', 3, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1004, 1000, 'ข้อมูลท่าขึ้น, ต้นทาง, ปลายทาง', 'admin/master/smd/harbor', 'Y', 'fa fa-align-left', 4, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1005, 1000, 'ข้อมูลโกดัง', 'admin/master/smd/warehouse', 'Y', 'fa fa-align-left', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1500, 999, 'ฝ่ายขนถ่ายสินค้าทางทะเล', '#', 'Y', 'fa fa-align-left', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1501, 1500, 'ทุ่น', 'admin/master/fts/buoy', 'Y', 'fa fa-align-left', 1, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1502, 1500, 'สายกวาด', 'admin/master/fts/sweep', 'Y', 'fa fa-align-left', 2, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1503, 1500, 'โฟร์แมน', 'admin/master/fts/foreman', 'Y', 'fa fa-align-left', 3, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(1505, 1500, 'เครื่องจักร', 'admin/master/fts/machine', 'Y', 'fa fa-align-left', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(2000, 999, 'ฝ่ายท่าเรือสินวัฒนา', '#', 'Y', 'fa fa-align-left', 3, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(2005, 2000, 'เครื่องจักร', 'admin/master/swp/machine', 'Y', 'fa fa-align-left', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(2500, 999, 'ฝ่ายขนถ่ายสินค้าท่าเรือ', '#', 'Y', 'fa fa-align-left', 4, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(3000, 999, 'ฝ่ายขนส่งสินค้าทางน้ำ', '#', 'Y', 'fa fa-align-left', 5, '2017-02-09 21:15:06', '2017-02-09 21:15:06', NULL),
(3001, 209, 'ประวัติ', 'swp/fuel/approve', 'Y', 'fa fa-rebel\r\n', 7, '2017-12-24 04:00:00', '2017-12-24 04:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_migrations`
--

CREATE TABLE `ck_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_migrations`
--

INSERT INTO `ck_migrations` (`id`, `migration`, `batch`) VALUES
(763, '2017_01_01_000001_create_employee_table', 1),
(764, '2017_01_01_000001_create_farm2employee_table', 1),
(765, '2017_01_01_000001_create_farm_houses_table', 1),
(766, '2017_01_01_000001_create_farm_table', 1),
(769, '2017_01_01_000001_create_master_aa_performance_table', 1),
(770, '2017_01_01_000001_create_master_department_table', 1),
(771, '2017_01_01_000001_create_master_history_performance_table', 1),
(772, '2017_01_01_000001_create_master_index_chickincondtion_table', 1),
(773, '2017_01_01_000001_create_master_index_gender_table', 1),
(774, '2017_01_01_000001_create_master_index_localtion_table', 1),
(775, '2017_01_01_000001_create_master_index_stockdensity_table', 1),
(776, '2017_01_01_000001_create_master_index_t01_table', 1),
(777, '2017_01_01_000001_create_master_index_t02_table', 1),
(778, '2017_01_01_000001_create_master_index_t03_table', 1),
(779, '2017_01_01_000001_create_master_index_t04_table', 1),
(780, '2017_01_01_000001_create_master_index_t05_table', 1),
(781, '2017_01_01_000001_create_master_index_t06_table', 1),
(782, '2017_01_01_000001_create_master_index_t07_table', 1),
(783, '2017_01_01_000001_create_master_index_t08_table', 1),
(784, '2017_01_01_000001_create_master_index_t09_table', 1),
(785, '2017_01_01_000001_create_master_index_t10_table', 1),
(786, '2017_01_01_000001_create_master_index_t11_table', 1),
(787, '2017_01_01_000001_create_master_index_t12_table', 1),
(788, '2017_01_01_000001_create_master_position_table', 1),
(789, '2017_01_01_000001_create_master_weekly_table', 1),
(792, '2017_01_01_000001_create_menu_table', 1),
(793, '2017_01_01_000001_create_report_broiler_farm_table', 1),
(794, '2017_01_01_000001_create_status_table', 1),
(795, '2017_01_20_100349_create_report_rg01_table', 1),
(796, '2017_01_20_100353_create_report_rg03_table', 1),
(797, '2017_01_20_100356_create_report_rg04_table', 1),
(798, '2017_03_01_000001_create_material_table', 1),
(799, '2017_03_01_000001_create_report_rg02_table', 1),
(800, '2017_01_20_100356_create_report_rg08_table', 1),
(801, '2017_01_01_000001_create_food_use_head_table', 1),
(802, '2017_03_01_000001_create_employee2commander_table', 1),
(803, '2017_03_01_000001_create_employee_auth_table', 1),
(810, '2017_01_01_000001_create_batch_table', 2),
(811, '2017_01_01_000001_create_chicken_received_head_table', 2),
(812, '2017_01_01_000001_create_chicken_received_item_table', 2),
(815, '2017_01_01_000001_create_medication_received_head_table', 2),
(816, '2017_01_01_000001_create_medication_received_item_table', 2),
(817, '2017_03_01_000001_create_alert_table', 1),
(820, '2017_01_01_000001_create_food_received_head_table', 3),
(821, '2017_01_01_000001_create_food_received_item_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd`
--

CREATE TABLE `ck_Smd` (
  `id` int(10) UNSIGNED NOT NULL,
  `BoatID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `OwnerID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ProductID` text COLLATE utf8_unicode_ci,
  `job_customer_type` int(11) NOT NULL,
  `job_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `job_date_eta` datetime DEFAULT NULL,
  `job_weight` double NOT NULL,
  `job_transport` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `job_category` int(11) NOT NULL,
  `job_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `job_note` text COLLATE utf8_unicode_ci,
  `StatusID` int(11) NOT NULL COMMENT 'c.	สถานะมี 1. เปิดใบแจ้งงาน,  2.เปิดใบแจ้งงานแล้ว, 3.ออกใบเรียกเก็บเงินแล้ว, 4.ยกเลิก',
  `ModeID` int(11) NOT NULL COMMENT 'd.	ประเภทใบสั่งขาย แยกเป็น Master, ค้างเกิน, เรือพ่วง',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd`
--

INSERT INTO `ck_Smd` (`id`, `BoatID`, `OwnerID`, `ProductID`, `job_customer_type`, `job_number`, `job_date_eta`, `job_weight`, `job_transport`, `job_category`, `job_unit`, `job_note`, `StatusID`, `ModeID`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 14, 4, '[\"31\"]', 1, 'SMD1709001', '2017-09-24 10:05:00', 7999.455, 'Discharge', 1, 'ตัน', 'ระวาง 4', 1, 1, 2, '2017-09-27 03:07:19', 2, '2017-12-25 04:05:42', NULL),
(2, 15, 3, '[\"2\"]', 2, 'SMD1709002', '2017-09-16 13:30:00', 41000, 'Load', 1, 'ตัน', NULL, 1, 1, 2, '2017-09-27 03:26:23', 2, '2017-10-09 02:36:31', NULL),
(3, 16, 1, '[\"17\"]', 2, 'SMD1709003', '2017-09-30 10:28:00', 61360.415, 'Discharge', 1, 'ตัน', NULL, 1, 1, 2, '2017-09-27 03:30:12', 2, '2017-09-27 03:30:12', NULL),
(4, 17, 3, '[\"2\"]', 2, 'SMD1710004', '2017-08-24 10:19:00', 42000, 'Load', 1, 'ตัน', NULL, 1, 1, 2, '2017-10-16 03:21:53', 2, '2017-10-16 03:21:53', NULL),
(5, 6, 24, '[\"6\",\"4\"]', 4, 'SMD1710005', '2017-07-26 10:34:00', 75209.73, 'Discharge', 1, 'ตัน', NULL, 1, 1, 2, '2017-10-16 03:36:29', 2, '2017-10-16 03:37:24', NULL),
(6, 18, 28, '[\"4\",\"3\"]', 1, 'SMD1710006', '2017-10-18 15:00:00', 81645, 'Discharge', 1, 'ตัน', NULL, 1, 1, 2, '2017-10-19 03:24:11', 2, '2017-11-24 03:49:16', NULL),
(7, 19, 28, '[\"16\"]', 1, 'SMD1712001', '2018-01-16 09:05:00', 65000, 'Discharge', 1, 'ตัน', NULL, 1, 1, 2, '2017-12-28 02:05:08', 2, '2017-12-28 08:26:34', NULL),
(10, 20, 4, '[\"30\"]', 1, 'SMD1712002', '2018-01-08 13:08:00', 6000, 'Discharge', 1, 'ตัน', NULL, 1, 1, 2, '2017-12-29 06:08:38', 2, '2017-12-29 06:08:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_2_Item`
--

CREATE TABLE `ck_Smd_2_Item` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `iCheck` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_2_Item`
--

INSERT INTO `ck_Smd_2_Item` (`id`, `SmdID`, `ProductID`, `Weight`, `iCheck`) VALUES
(1, 1, 30, 7999.455, 0),
(2, 2, 2, 41000, 0),
(3, 3, 17, 61360.415, 0),
(4, 4, 2, 42000, 0),
(5, 5, 6, 40466.915, 0),
(6, 5, 4, 34742.815, 0),
(7, 6, 4, 69300, 0),
(8, 6, 3, 12345, 0),
(11, 7, 16, 65000, 0),
(12, 10, 30, 6000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Item`
--

CREATE TABLE `ck_Smd_Item` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `HarborID` int(10) DEFAULT NULL COMMENT 'CLM/RTM',
  `work_mode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `work_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `work_type` enum('Buoy','StevieDore') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'FTS',
  `work_date_issue` datetime DEFAULT NULL COMMENT 'CLM/SWP/TRU',
  `work_load` double DEFAULT NULL COMMENT 'FTS',
  `work_grab` int(10) DEFAULT NULL COMMENT 'FTS',
  `work_buoy` int(2) DEFAULT '0' COMMENT 'FTS/Other',
  `work_sealine` int(10) DEFAULT NULL COMMENT 'FTS',
  `work_machine` int(10) DEFAULT NULL COMMENT 'FTS',
  `work_crane_number` int(2) DEFAULT NULL COMMENT 'FTS',
  `work_crane_weight` int(2) DEFAULT NULL COMMENT 'FTS',
  `work_bobcat` int(10) DEFAULT NULL COMMENT 'CLM',
  `work_backhoe` int(10) DEFAULT NULL COMMENT 'CLM',
  `work_sweep_line` int(10) DEFAULT NULL COMMENT 'CLM',
  `work_contractor` enum('SWP','CLM') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'CLM/TRU - ฝ่ายที่รับผิดชอบ',
  `work_baekho_warehouse` int(10) DEFAULT NULL COMMENT 'CLM/SWP',
  `work_scales` int(10) DEFAULT NULL COMMENT 'SWP',
  `work_leach` int(10) DEFAULT NULL COMMENT 'SWP',
  `work_leach_sweep` int(10) DEFAULT NULL COMMENT 'SWP',
  `work_warehouse` int(10) DEFAULT NULL COMMENT 'SWP',
  `work_pass` int(10) DEFAULT NULL COMMENT 'SWP',
  `work_pass_weight` double DEFAULT NULL COMMENT 'SWP',
  `work_motorboat` int(10) DEFAULT NULL COMMENT 'RTM',
  `work_tanker` int(10) DEFAULT NULL COMMENT 'RTM',
  `work_police` int(10) DEFAULT NULL COMMENT 'RTM',
  `work_source` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'TRU',
  `work_destination` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'TRU',
  `work_ship` int(1) DEFAULT NULL COMMENT 'Other',
  `work_blackhole` int(1) DEFAULT NULL COMMENT 'Other',
  `work_thasin` int(1) DEFAULT NULL COMMENT 'Other',
  `work_truck` int(1) DEFAULT NULL COMMENT 'Other',
  `work_price` double DEFAULT NULL COMMENT 'Other',
  `work_note` text COLLATE utf8_unicode_ci,
  `work_prepare` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `work_prepare_fts` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `work_prepare_swp` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `work_prepare_clm` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `work_status_swp` int(1) DEFAULT '0',
  `work_status_fts` int(1) DEFAULT '0',
  `work_status_clm` int(1) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `work_ref` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'CLM/SWP/TRU',
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Item`
--

INSERT INTO `ck_Smd_Item` (`id`, `SmdID`, `HarborID`, `work_mode`, `work_number`, `work_type`, `work_date_issue`, `work_load`, `work_grab`, `work_buoy`, `work_sealine`, `work_machine`, `work_crane_number`, `work_crane_weight`, `work_bobcat`, `work_backhoe`, `work_sweep_line`, `work_contractor`, `work_baekho_warehouse`, `work_scales`, `work_leach`, `work_leach_sweep`, `work_warehouse`, `work_pass`, `work_pass_weight`, `work_motorboat`, `work_tanker`, `work_police`, `work_source`, `work_destination`, `work_ship`, `work_blackhole`, `work_thasin`, `work_truck`, `work_price`, `work_note`, `work_prepare`, `work_prepare_fts`, `work_prepare_swp`, `work_prepare_clm`, `work_status_swp`, `work_status_fts`, `work_status_clm`, `created_by`, `created_at`, `work_ref`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'FTS', 'FTS1709001', 'Buoy', NULL, 0, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ระวาง 4', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:07:50', NULL, 2, '2017-09-27 03:08:13', '2017-09-27 03:08:13'),
(2, 1, NULL, 'FTS', 'FTS1709002', 'StevieDore', NULL, 0, 1, 0, 1, 1, 4, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ระวาง 4', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:08:49', NULL, 2, '2017-11-30 12:20:14', NULL),
(3, 2, NULL, 'FTS', 'FTS1709003', 'Buoy', NULL, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:26:34', NULL, 2, '2017-12-27 06:32:18', NULL),
(4, 3, NULL, 'FTS', 'FTS1709004', 'Buoy', NULL, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:30:26', NULL, 2, '2017-12-29 01:51:04', NULL),
(5, 4, NULL, 'FTS', 'FTS1710005', 'Buoy', NULL, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:23:20', NULL, 2, '2017-12-27 06:14:30', NULL),
(6, 5, NULL, 'FTS', 'FTS1710006', 'Buoy', NULL, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:38:07', NULL, 2, '2017-12-27 06:20:47', NULL),
(7, 6, NULL, 'FTS', 'FTS1710007', 'Buoy', NULL, 0, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-19 03:24:44', NULL, 2, '2018-01-04 05:50:10', NULL),
(8, 3, 106, 'CLM', 'CLM1709001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1709004\r\nผ่านท่าทั้งหมด', 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-09-27 03:31:47', 'RTM1709004', NULL, '2017-09-27 03:32:39', NULL),
(9, 3, 29, 'CLM', 'CLM1709002', NULL, '2017-12-04 15:24:00', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 'SWP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1709003', 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-09-27 03:32:49', 'RTM1709003', 2, '2017-12-04 08:25:57', NULL),
(10, 5, 151, 'CLM', 'CLM1710003', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 'CLM', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710007', 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-10-16 04:06:04', 'RTM1710007', 2, '2017-12-04 08:23:16', NULL),
(11, 5, 29, 'CLM', 'CLM1710004', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710008', 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-10-16 04:06:33', 'RTM1710008', NULL, '2017-10-16 04:06:33', NULL),
(12, 5, 153, 'CLM', 'CLM1710005', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710009', 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-10-16 04:06:47', 'RTM1710009', NULL, '2017-10-16 04:06:47', NULL),
(13, 5, 157, 'CLM', 'CLM1710006', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710012', 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-10-16 04:10:19', 'RTM1710012', NULL, '2017-10-16 04:10:19', NULL),
(14, 5, 64, 'CLM', 'CLM1710007', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710013', 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-10-16 04:10:43', 'RTM1710013', NULL, '2017-10-16 04:10:43', NULL),
(16, 6, NULL, 'SWP', 'SWP1710001', NULL, '2017-11-13 14:16:00', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SWP', 1, 1, 1, 1, 1, 1, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1234', 'N', 'N', 'Y', 'N', 1, 0, 0, NULL, '2017-10-26 19:52:21', NULL, 2, '2018-01-11 01:21:42', NULL),
(17, 1, 8, 'RTM', 'RTM1709001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:09:35', NULL, 2, '2017-09-27 03:09:35', NULL),
(18, 2, 105, 'RTM', 'RTM1709002', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:28:08', NULL, 2, '2017-09-27 03:28:08', NULL),
(19, 3, 29, 'RTM', 'RTM1709003', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:31:07', NULL, 2, '2017-09-27 03:31:07', NULL),
(20, 3, 106, 'RTM', 'RTM1709004', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-09-27 03:31:39', NULL, 2, '2017-09-27 03:31:39', NULL),
(21, 4, 105, 'RTM', 'RTM1710005', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:24:37', NULL, 2, '2017-10-16 03:25:44', NULL),
(22, 5, 152, 'RTM', 'RTM1710006', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:39:45', NULL, 2, '2017-10-16 03:39:45', NULL),
(23, 5, 151, 'RTM', 'RTM1710007', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:42:48', NULL, 2, '2017-10-16 03:42:48', NULL),
(24, 5, 29, 'RTM', 'RTM1710008', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:44:36', NULL, 2, '2017-10-16 03:44:36', NULL),
(25, 5, 153, 'RTM', 'RTM1710009', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:54:09', NULL, 2, '2017-10-16 03:54:09', NULL),
(26, 5, 154, 'RTM', 'RTM1710010', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:58:42', NULL, 2, '2017-10-16 03:58:42', NULL),
(27, 5, 155, 'RTM', 'RTM1710011', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 03:59:45', NULL, 2, '2017-10-16 03:59:45', NULL),
(28, 5, 157, 'RTM', 'RTM1710012', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 04:00:27', NULL, 2, '2017-10-16 04:00:27', NULL),
(29, 5, 64, 'RTM', 'RTM1710013', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-16 04:05:43', NULL, 2, '2017-10-16 04:05:43', NULL),
(30, 6, 7, 'RTM', 'RTM1710014', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-10-19 03:25:16', NULL, 2, '2017-10-19 03:25:16', NULL),
(31, 1, NULL, 'TRU', 'TRU1709001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SWP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, NULL, '2017-09-27 03:10:59', NULL, NULL, '2017-09-27 03:10:59', NULL),
(32, 5, 29, 'CLM', 'CLM1711001', NULL, '2017-11-02 16:40:00', NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'CLM', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710008', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-08 07:59:33', NULL, 2, '2017-11-19 19:35:04', NULL),
(33, 5, 29, 'CLM', 'CLM1711002', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710008', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-08 07:59:38', NULL, 2, '2017-11-08 07:59:38', NULL),
(34, 5, 29, 'CLM', 'CLM1711003', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'CLM', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710008', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-08 07:59:43', NULL, 2, '2017-11-19 19:39:40', '2017-11-19 19:39:40'),
(44, 6, NULL, 'TRU', 'TRU1711001', NULL, '2017-11-02 16:40:00', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '158', '161', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-13 09:40:38', NULL, 2, '2017-11-17 10:35:00', NULL),
(51, 6, 1, 'CLM', 'CLM1711004', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานท่าสิน : SWP1710001', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-23 08:06:43', 'SWP1710001', 2, '2017-11-23 08:06:43', NULL),
(52, 6, NULL, 'TRU', 'TRU1711002', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SWP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานท่าสิน : SWP1710001', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-23 08:06:51', 'SWP1710001', 2, '2017-11-23 08:06:51', NULL),
(53, 6, NULL, 'SWP', 'SWP1711001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1710014', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-23 08:26:54', 'RTM1710014', 2, '2017-11-23 08:26:54', NULL),
(55, 6, NULL, 'FTS', 'FTS1711001', 'StevieDore', NULL, NULL, 1, 0, 1, 1, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-11-24 03:50:52', NULL, 2, '2017-11-24 03:50:52', NULL),
(56, 7, NULL, 'FTS', 'FTS1712001', 'Buoy', NULL, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'Y', 'N', 'N', 0, 0, 0, 2, '2017-12-28 02:05:49', NULL, 2, '2018-01-11 03:32:43', NULL),
(57, 7, 163, 'RTM', 'RTM1712001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-12-28 08:27:19', NULL, 2, '2017-12-28 09:05:26', NULL),
(58, 7, 163, 'CLM', 'CLM1712001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'CLM', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1712001', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-12-28 08:30:38', 'RTM1712001', 2, '2017-12-28 09:06:14', NULL),
(68, 7, 2, 'CLM', 'CLM1712002', NULL, '2017-12-07 16:08:00', NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'SWP', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'N', 'Y', 'Y', 1, 0, 0, 2, '2017-12-28 09:08:38', NULL, 2, '2018-01-11 07:16:22', NULL),
(69, 7, NULL, 'SWP', 'SWP1712001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1712001', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-12-28 09:08:56', 'RTM1712001', 2, '2017-12-28 09:08:56', NULL),
(70, 10, NULL, 'FTS', 'FTS1712002', 'StevieDore', NULL, NULL, 1, 0, 1, 1, 4, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'Y', 'N', 'N', 0, 0, 0, 2, '2017-12-29 06:09:00', NULL, 2, '2018-01-10 03:41:48', NULL),
(71, 10, 7, 'RTM', 'RTM1712002', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-12-29 06:10:51', NULL, 2, '2017-12-29 06:10:51', NULL),
(72, 10, 7, 'CLM', 'CLM1712003', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, 1, 'CLM', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : RTM1712002', 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-12-29 06:10:56', 'RTM1712002', 2, '2017-12-29 06:12:20', NULL),
(73, 10, NULL, 'TRU', 'TRU1712001', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', '7', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 0, 0, 0, 2, '2017-12-29 06:13:08', NULL, 2, '2017-12-29 06:13:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Item_2_CLM`
--

CREATE TABLE `ck_Smd_Item_2_CLM` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `iCheck` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Item_2_CLM`
--

INSERT INTO `ck_Smd_Item_2_CLM` (`id`, `SmdID`, `ItemID`, `ProductID`, `Weight`, `iCheck`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 8, 17, 51360.415, NULL, NULL, NULL, NULL),
(2, 3, 9, 17, 10000, NULL, NULL, '2017-12-04 08:25:57', NULL),
(3, 5, 10, 6, 11241.167, NULL, NULL, '2017-12-04 08:23:16', NULL),
(4, 5, 11, 6, 9563.077, NULL, NULL, NULL, NULL),
(5, 5, 12, 4, 6521.73, NULL, NULL, NULL, NULL),
(6, 5, 13, 4, 3075, NULL, NULL, NULL, NULL),
(7, 5, 14, 6, 8053.117, NULL, NULL, NULL, NULL),
(8, 5, 14, 4, 1747.06, NULL, NULL, NULL, NULL),
(9, 6, 15, 4, 69300, NULL, NULL, '2017-11-13 09:27:58', NULL),
(10, 5, 32, 6, 9563.077, NULL, NULL, NULL, NULL),
(20, 6, 15, 3, 12345, NULL, '2017-11-13 09:21:07', '2017-11-13 09:27:58', NULL),
(21, 6, 45, 4, 10000, NULL, NULL, NULL, NULL),
(22, 6, 45, 3, 12345, NULL, NULL, NULL, NULL),
(23, 6, 47, 4, 10000, NULL, NULL, NULL, NULL),
(24, 6, 47, 3, 12345, NULL, NULL, NULL, NULL),
(25, 6, 48, 4, 10000, NULL, NULL, NULL, NULL),
(26, 6, 48, 3, 12345, NULL, NULL, NULL, NULL),
(27, 6, 50, 4, 10000, NULL, NULL, NULL, NULL),
(28, 6, 50, 3, 12345, NULL, NULL, NULL, NULL),
(29, 6, 51, 4, 10000, NULL, NULL, NULL, NULL),
(30, 6, 51, 3, 12345, NULL, NULL, NULL, NULL),
(31, 7, 58, 16, 65000, NULL, '2017-12-28 08:36:32', '2017-12-28 09:06:14', NULL),
(32, 7, 65, 16, 100, NULL, NULL, NULL, NULL),
(33, 7, 67, 16, 100, NULL, NULL, NULL, NULL),
(34, 7, 68, 16, 0, NULL, '2017-12-28 09:08:38', '2017-12-28 09:08:38', NULL),
(35, 10, 72, 30, 6000, NULL, NULL, '2017-12-29 06:12:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Item_2_RTM`
--

CREATE TABLE `ck_Smd_Item_2_RTM` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `DateIssue` datetime DEFAULT NULL COMMENT 'วันที่ขึ้นสินค้า',
  `DateArrive` datetime DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `iCheck` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bit(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Item_2_RTM`
--

INSERT INTO `ck_Smd_Item_2_RTM` (`id`, `SmdID`, `ItemID`, `ProductID`, `DateIssue`, `DateArrive`, `Weight`, `iCheck`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 1, 17, 31, NULL, NULL, 7999.455, NULL, NULL, '2017-09-27 03:09:35', NULL, '2017-09-27 03:09:35', NULL),
(2, 2, 18, 2, NULL, NULL, 41000, NULL, NULL, '2017-09-27 03:28:08', NULL, '2017-09-27 03:28:08', NULL),
(3, 3, 19, 17, NULL, NULL, 10000, NULL, NULL, '2017-09-27 03:31:07', NULL, '2017-09-27 03:31:07', NULL),
(4, 3, 20, 17, NULL, NULL, 51360.415, NULL, NULL, '2017-09-27 03:31:39', NULL, '2017-09-27 03:31:39', NULL),
(5, 4, 21, 2, '2017-10-11 13:00:00', NULL, 42000, NULL, NULL, '2017-10-16 03:24:37', NULL, '2017-10-16 03:25:44', NULL),
(6, 5, 22, 6, NULL, NULL, 7079.676, NULL, NULL, '2017-10-16 03:39:45', NULL, '2017-10-16 03:39:45', NULL),
(7, 5, 22, 4, NULL, NULL, 17371.435, NULL, NULL, '2017-10-16 03:39:45', NULL, '2017-10-16 03:39:45', NULL),
(8, 5, 23, 6, NULL, NULL, 11241.167, NULL, NULL, '2017-10-16 03:42:49', NULL, '2017-10-16 03:42:49', NULL),
(9, 5, 24, 6, NULL, NULL, 9563.077, NULL, NULL, '2017-10-16 03:44:36', NULL, '2017-10-16 03:44:36', NULL),
(10, 5, 25, 4, NULL, NULL, 6521.73, NULL, NULL, '2017-10-16 03:54:09', NULL, '2017-10-16 03:54:09', NULL),
(11, 5, 26, 6, NULL, NULL, 4529.878, NULL, NULL, '2017-10-16 03:58:42', NULL, '2017-10-16 03:58:42', NULL),
(12, 5, 26, 4, NULL, NULL, 3027.59, NULL, NULL, '2017-10-16 03:58:42', NULL, '2017-10-16 03:58:42', NULL),
(13, 5, 27, 4, NULL, NULL, 3000, NULL, NULL, '2017-10-16 03:59:45', NULL, '2017-10-16 03:59:45', NULL),
(14, 5, 28, 4, NULL, NULL, 3075, NULL, NULL, '2017-10-16 04:00:27', NULL, '2017-10-16 04:00:27', NULL),
(15, 5, 29, 6, NULL, NULL, 8053.117, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(16, 5, 29, 4, NULL, NULL, 1747.06, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(17, 6, 30, 4, NULL, NULL, 69300, NULL, NULL, '2017-10-19 03:25:16', NULL, '2017-10-19 03:25:16', NULL),
(21, 7, 57, 16, NULL, NULL, 65000, NULL, 2, '2017-12-28 08:53:14', b'1', '2017-12-28 09:05:26', NULL),
(22, 7, 66, 16, '2017-12-25 16:00:00', NULL, 5000, NULL, 2, '2017-12-28 09:01:08', b'1', '2017-12-28 09:01:08', NULL),
(23, 10, 71, 30, NULL, NULL, 6000, NULL, 2, '2017-12-29 06:10:51', b'1', '2017-12-29 06:10:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Item_2_RTM_Item`
--

CREATE TABLE `ck_Smd_Item_2_RTM_Item` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `CustomerID` int(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `iCheck` int(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Item_2_RTM_Item`
--

INSERT INTO `ck_Smd_Item_2_RTM_Item` (`id`, `SmdID`, `ItemID`, `ProductID`, `CustomerID`, `Weight`, `iCheck`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 1, 17, 31, 4, 7999.455, NULL, NULL, '2017-09-27 03:09:35', NULL, '2017-09-27 03:09:35', NULL),
(2, 2, 18, 2, 3, 41000, NULL, NULL, '2017-09-27 03:28:08', NULL, '2017-09-27 03:28:08', NULL),
(3, 3, 19, 17, 29, 10000, NULL, NULL, '2017-09-27 03:31:07', NULL, '2017-09-27 03:31:07', NULL),
(4, 3, 20, 17, 29, 51360.415, NULL, NULL, '2017-09-27 03:31:39', NULL, '2017-09-27 03:31:39', NULL),
(5, 4, 21, 2, 3, 42000, NULL, NULL, '2017-10-16 03:24:37', NULL, '2017-10-16 03:25:44', NULL),
(6, 5, 22, 6, 18, 7079.676, NULL, NULL, '2017-10-16 03:39:45', NULL, '2017-10-16 03:39:45', NULL),
(7, 5, 22, 4, 18, 17371.435, NULL, NULL, '2017-10-16 03:39:45', NULL, '2017-10-16 03:39:45', NULL),
(8, 5, 23, 6, 18, 5000, NULL, NULL, '2017-10-16 03:42:49', NULL, '2017-10-16 03:42:49', NULL),
(9, 5, 23, 6, 8, 1207.968, NULL, NULL, '2017-10-16 03:42:49', NULL, '2017-10-16 03:42:49', NULL),
(10, 5, 23, 6, 12, 2013.279, NULL, NULL, '2017-10-16 03:42:49', NULL, '2017-10-16 03:42:49', NULL),
(11, 5, 23, 6, 11, 1509.96, NULL, NULL, '2017-10-16 03:42:49', NULL, '2017-10-16 03:42:49', NULL),
(12, 5, 23, 6, 16, 1509.96, NULL, NULL, '2017-10-16 03:42:49', NULL, '2017-10-16 03:42:49', NULL),
(13, 5, 24, 6, 20, 4026.559, NULL, NULL, '2017-10-16 03:44:36', NULL, '2017-10-16 03:44:36', NULL),
(14, 5, 24, 6, 17, 3019.919, NULL, NULL, '2017-10-16 03:44:36', NULL, '2017-10-16 03:44:36', NULL),
(15, 5, 24, 6, 21, 2516.599, NULL, NULL, '2017-10-16 03:44:37', NULL, '2017-10-16 03:44:37', NULL),
(16, 5, 25, 4, 17, 1737.14, NULL, NULL, '2017-10-16 03:54:09', NULL, '2017-10-16 03:54:09', NULL),
(17, 5, 25, 4, 11, 873.53, NULL, NULL, '2017-10-16 03:54:09', NULL, '2017-10-16 03:54:09', NULL),
(18, 5, 25, 4, 14, 436.77, NULL, NULL, '2017-10-16 03:54:09', NULL, '2017-10-16 03:54:09', NULL),
(19, 5, 25, 4, 7, 3474.29, NULL, NULL, '2017-10-16 03:54:09', NULL, '2017-10-16 03:54:09', NULL),
(20, 5, 26, 6, 23, 4529.878, NULL, NULL, '2017-10-16 03:58:42', NULL, '2017-10-16 03:58:42', NULL),
(21, 5, 26, 4, 20, 1290.45, NULL, NULL, '2017-10-16 03:58:42', NULL, '2017-10-16 03:58:42', NULL),
(22, 5, 26, 4, 23, 1737.14, NULL, NULL, '2017-10-16 03:58:42', NULL, '2017-10-16 03:58:42', NULL),
(23, 5, 27, 4, 15, 3000, NULL, NULL, '2017-10-16 03:59:45', NULL, '2017-10-16 03:59:45', NULL),
(24, 5, 28, 4, 15, 3075, NULL, NULL, '2017-10-16 04:00:27', NULL, '2017-10-16 04:00:27', NULL),
(25, 5, 29, 6, 9, 1811.95, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(26, 5, 29, 6, 19, 3019.919, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(27, 5, 29, 6, 10, 1711.288, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(28, 5, 29, 6, 14, 1509.96, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(29, 5, 29, 4, 9, 873.53, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(30, 5, 29, 4, 10, 873.53, NULL, NULL, '2017-10-16 04:05:43', NULL, '2017-10-16 04:05:43', NULL),
(31, 6, 30, 4, 28, 69300, NULL, NULL, '2017-10-19 03:25:16', NULL, '2017-10-19 03:25:16', NULL),
(33, 7, 57, 16, 17, 100, 1, 2, '2017-12-28 08:53:14', 2, '2017-12-28 09:05:26', '2017-12-28 09:05:26'),
(34, 7, 66, 16, 28, 5000, NULL, 2, '2017-12-28 09:01:08', 2, '2017-12-28 09:01:08', NULL),
(35, 7, 57, 16, 28, 65000, NULL, 2, '2017-12-28 09:05:26', 2, '2017-12-28 09:05:26', NULL),
(36, 10, 71, 30, 4, 6000, NULL, 2, '2017-12-29 06:10:51', 2, '2017-12-29 06:10:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Item_2_SWP`
--

CREATE TABLE `ck_Smd_Item_2_SWP` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `iCheck` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Item_2_SWP`
--

INSERT INTO `ck_Smd_Item_2_SWP` (`id`, `SmdID`, `ItemID`, `ProductID`, `Weight`, `created_at`, `updated_at`, `deleted_at`, `iCheck`) VALUES
(1, 6, 16, 4, 10000, '2017-11-13 07:28:25', '2017-11-23 07:07:32', NULL, NULL),
(2, 6, 16, 3, 12345, '2017-11-13 07:30:05', '2017-11-23 07:07:32', NULL, NULL),
(3, 6, 53, 4, 69300, NULL, NULL, NULL, NULL),
(4, 7, 69, 16, 65000, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Item_2_SWP_Warehouse`
--

CREATE TABLE `ck_Smd_Item_2_SWP_Warehouse` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `WarehouseID` int(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `Sweep` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `iCheck` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Item_2_SWP_Warehouse`
--

INSERT INTO `ck_Smd_Item_2_SWP_Warehouse` (`id`, `SmdID`, `ItemID`, `WarehouseID`, `Weight`, `Sweep`, `created_at`, `updated_at`, `deleted_at`, `iCheck`) VALUES
(1, 6, 16, 5, 1000, 1, '2017-10-26 19:52:21', '2017-11-23 07:07:32', NULL, NULL),
(2, 6, 16, 6, 2000, 0, '2017-11-13 07:28:59', '2017-11-23 07:07:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Item_2_TRU`
--

CREATE TABLE `ck_Smd_Item_2_TRU` (
  `id` int(10) NOT NULL,
  `SmdID` int(10) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `Weight` double DEFAULT NULL,
  `iCheck` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Item_2_TRU`
--

INSERT INTO `ck_Smd_Item_2_TRU` (`id`, `SmdID`, `ItemID`, `ProductID`, `Weight`, `iCheck`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 31, 31, 7999.455, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(2, 6, 44, 4, 69300, 0, NULL, NULL, NULL),
(3, 6, 44, 3, 12345, 0, NULL, NULL, NULL),
(4, 6, 46, 4, 10000, NULL, NULL, NULL, NULL),
(5, 6, 46, 3, 12345, NULL, NULL, NULL, NULL),
(6, 6, 49, 4, 10000, NULL, NULL, NULL, NULL),
(7, 6, 49, 3, 12345, NULL, NULL, NULL, NULL),
(8, 6, 52, 4, 10000, NULL, NULL, NULL, NULL),
(9, 6, 52, 3, 12345, NULL, NULL, NULL, NULL),
(10, 6, 54, 4, 69300, NULL, NULL, NULL, NULL),
(11, 10, 73, 30, 6000, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Mode`
--

CREATE TABLE `ck_Smd_Mode` (
  `id` int(10) NOT NULL,
  `Mode_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Mode`
--

INSERT INTO `ck_Smd_Mode` (`id`, `Mode_Name`) VALUES
(1, 'Master'),
(2, 'ค้างเกิน'),
(3, 'เรือพ่วง');

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Notification`
--

CREATE TABLE `ck_Smd_Notification` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `SmdID` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ck_Smd_Status`
--

CREATE TABLE `ck_Smd_Status` (
  `id` int(10) NOT NULL,
  `Status_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Smd_Status`
--

INSERT INTO `ck_Smd_Status` (`id`, `Status_Name`) VALUES
(1, 'เปิดใบแจ้งงาน'),
(2, 'เปิดใบแจ้งงานแล้ว'),
(3, 'เรียกเก็บเงินแล้ว'),
(4, 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `ck_Staff`
--

CREATE TABLE `ck_Staff` (
  `id` int(11) UNSIGNED NOT NULL,
  `StaffCode` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `StaffPrefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StaffFirstName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StaffLastName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StaffStatus` int(1) DEFAULT NULL,
  `DivisionID` int(11) DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `PositionID` int(11) DEFAULT NULL,
  `StartingDate` date DEFAULT NULL,
  `lastlogin_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='พนักงาน';

--
-- Dumping data for table `ck_Staff`
--

INSERT INTO `ck_Staff` (`id`, `StaffCode`, `StaffPrefix`, `StaffFirstName`, `StaffLastName`, `StaffStatus`, `DivisionID`, `DepartmentID`, `PositionID`, `StartingDate`, `lastlogin_at`, `created_by`, `created_at`, `updated_by`, `updated_at`, `password`, `remember_token`, `deleted_at`) VALUES
(1, 'cueihzo', '', 'Administrator', '', NULL, 99, 99, 99, '2018-01-01', NULL, 2, '2017-09-28 07:09:14', 2, '2017-09-28 07:12:21', '$2y$10$HdG5M83qimSbG.On6f9P/uN8ERCv93.k7j.sw0SmKoelmzemQgasC', NULL, NULL),
(2, 'admin', '', 'Administrator', '', NULL, 99, 99, 99, '2018-01-01', '2018-01-15 17:29:43', 2, '2017-09-28 07:09:15', 2, '2018-01-15 10:29:43', '$2y$10$qk06BhjrnRF5fqt.Dz4G2.3Vzwfq8CGRz5SnMmeQBg9y4qt4Ro3RK', 'iWuTWCIIXx4dj2hk5sC0TJLg9ADg7WurVMrBTUGbdJjogxF9ba2c5ZSInX5s', NULL),
(3, '25001', 'นาง', 'วัฒนา', 'สุวจนกร', NULL, 11, 1, 1, '1982-01-01', NULL, 2, '2017-09-28 07:09:15', 2, '2017-09-28 07:12:22', '$2y$10$yetJABpvVpZUptYRod0MaOuKR2Fb5lP/Y0rKF2dyH53f6XFxa3bLO', NULL, NULL),
(4, '32002', 'นาย', 'วรเทพ', 'สุวจนกร', NULL, 11, 1, 2, '1989-06-01', NULL, 2, '2017-09-28 07:09:15', 2, '2017-09-28 07:12:22', '$2y$10$lhwbIBk9uknZA7q0NBolve6SULmw75DopsdEhUNBEDRFCnRCTbNwG', NULL, NULL),
(5, '32003', 'นางสาว', 'เกศริน', 'สุวจนกร', NULL, 11, 1, 2, '1989-06-21', NULL, 2, '2017-09-28 07:09:16', 2, '2017-09-28 07:12:22', '$2y$10$ZUTAPy7nzC1OqD4NfQJ/d.Tan20A7yKkoPwGsrZSzXJOW3tWIZBAq', NULL, NULL),
(6, '32004', 'นาย', 'ทนง', 'สุวจนกร', NULL, 11, 1, 3, '1989-06-21', NULL, 2, '2017-09-28 07:09:16', 2, '2017-09-28 07:12:23', '$2y$10$9eoMLxSW024Dc78mzD3qZu0Cp8DwK6.uSPoJymvOc2iLYXKc8W75i', NULL, NULL),
(7, '43002', 'นาย', 'ไกรเทพ', 'สุวจนกร', NULL, 11, 1, 2, '2000-01-03', NULL, 2, '2017-09-28 07:09:16', 2, '2017-09-28 07:12:23', '$2y$10$o1HzTUEH/4BrBKN2yDZ8gu3MjJM1KRrpEqC46r6alv7bfjhT7t2Gi', NULL, NULL),
(8, '37004', 'นางสาว', 'วารี', 'บุตรพรม', NULL, 2, 2, 4, '1994-05-03', NULL, 2, '2017-09-28 07:09:17', 2, '2017-09-28 07:12:23', '$2y$10$YaxhlhifbQsoW1xXGW1eruGz.udExkYWaCiXKfX27uzvDo0vtIf8.', NULL, NULL),
(9, '54056', 'นางสาว', 'กัลยามาล', 'ลีละน้อย', NULL, 2, 2, 5, '2011-05-05', NULL, 2, '2017-09-28 07:09:17', 2, '2017-09-28 07:12:24', '$2y$10$ZxgJ/8sI3jQ3YaxFR6KaxeMW32CqoFA9gNe4N4JqhVQj29JOydOV.', NULL, NULL),
(10, '60053', 'นางสาว', 'ฐิติมาภรณ์', 'พุกเจริญ', NULL, 2, 2, 5, '2017-06-19', NULL, 2, '2017-09-28 07:09:17', 2, '2017-09-28 07:12:24', '$2y$10$sEGP4vS9inNyLBB.OyEbi.ThlcTN9A.GIvAqDluRshWJV6WfL6E96', NULL, NULL),
(11, '49029', 'นาง', 'โสมสุนีย์', 'จันทร์สว่าง', NULL, 8, 3, 6, '2006-06-07', NULL, 2, '2017-09-28 07:09:18', 2, '2017-09-28 07:12:24', '$2y$10$ORbu.zaAad1f.bJm0fhoduPqkGPrbVUn4aj5ALg1exCkHwWsWRdKW', NULL, NULL),
(12, '55035', 'นาง', 'ปรียาภรณ์', 'แสงขุนทด', NULL, 8, 3, 7, '2012-05-10', NULL, 2, '2017-09-28 07:09:18', 2, '2017-09-28 07:12:24', '$2y$10$m3F9C4/Zm5SP2PFlknTlKupRctpjClZdTDINoQDStr5I3Q7CbIvIq', NULL, NULL),
(13, '57007', 'นางสาว', 'วันดี', 'พยัคคง', NULL, 8, 3, 8, '2014-02-03', NULL, 2, '2017-09-28 07:09:18', 2, '2017-09-28 07:12:25', '$2y$10$DtY8nScJ/EjhToO4hYvaQu9j3SvASI.CqfAtv6NdxTMIwXj2nwfmC', NULL, NULL),
(14, '58010', 'นางสาว', 'ดาราวรรณ', 'ฆารบุญ', NULL, 8, 3, 9, '2015-02-03', NULL, 2, '2017-09-28 07:09:18', 2, '2017-09-28 07:12:25', '$2y$10$xveI8W/reNKNPEhlGkfi6.lEzm.8K9fqHpLZk0WgcKEeRCMcsDRI6', NULL, NULL),
(15, '59070', 'นางสาว', 'ชริตา', 'ศรีละออน', NULL, 8, 3, 10, '2016-07-01', NULL, 2, '2017-09-28 07:09:19', 2, '2017-09-28 07:12:25', '$2y$10$1s6kZHosS8Y390KQu4ZSkupjhSUC9k.CZhRyeTp0CgdAh8uNWwQca', NULL, NULL),
(16, '59096', 'นาง', 'ปภาดา', 'เคหะนันท์', NULL, 8, 3, 9, '2016-09-16', NULL, 2, '2017-09-28 07:09:19', 2, '2017-09-28 07:12:26', '$2y$10$3FpqiPpLT/2M/wCSsxQCuembiiF5mBQkYwRI4IuDvmhbvFtuVjiPu', NULL, NULL),
(17, '60036', 'นาง', 'วรวรรณ', 'จรรยา', NULL, 8, 3, 11, '2017-05-02', NULL, 2, '2017-09-28 07:09:19', 2, '2017-09-28 07:12:26', '$2y$10$pXRzT8qSwANbzH8o0Wl9s.0Y0Qtv6gXtS5/4ec2kiXn6cfGpiMiyS', NULL, NULL),
(18, '60079', 'นางสาว', 'ดวงเดือน', 'เวฬุวนารักษ์', NULL, 8, 3, 10, '2017-08-07', NULL, 2, '2017-09-28 07:09:20', 2, '2017-09-28 07:12:27', '$2y$10$8kUweU6DM2JqiGnjSfL7ueiZG2cATAQQTCbTXMWmaCNvwJ0g0X.U2', NULL, NULL),
(19, '39014', 'นางสาว', 'บังอร', 'สุขรมย์', NULL, 8, 4, 12, '1996-12-02', NULL, 2, '2017-09-28 07:09:21', 2, '2017-09-28 07:12:27', '$2y$10$3SGNUi1nlXKqKYZr1BT.HOaIcymSXaJrhR0jMxCTvVExHooF2TGuO', NULL, NULL),
(20, '45018', 'นาย', 'สรรเสริญ', 'พงศ์พิศาลกุล', NULL, 8, 4, 13, '2002-09-02', NULL, 2, '2017-09-28 07:09:21', 2, '2017-09-28 07:12:27', '$2y$10$JMbYqQ5O/2MGwkUFaHEXsuTyCWQWkO1zosmAs1XIIgc3dgIpeIeVK', NULL, NULL),
(21, '59003', 'นางสาว', 'รัชฎาพร', 'พูลกสิวิทย์', NULL, 8, 4, 14, '2016-01-05', NULL, 2, '2017-09-28 07:09:21', 2, '2017-09-28 07:12:28', '$2y$10$Md5.X7gy6qTZpReOOMK6EeMpw3aobZfikMwOCJess3U9vYncqKU2i', NULL, NULL),
(22, '59032', 'นางสาว', 'ฐิติมา', 'รัตนห่วง', NULL, 8, 4, 15, '2016-05-05', NULL, 2, '2017-09-28 07:09:21', 2, '2017-09-28 07:12:28', '$2y$10$uw8aBKgIXyWizkBxPfd5MO6pzy.htATDwXvQsG8ONTAkkGPIU/6eu', NULL, NULL),
(23, '59090', 'นางสาว', 'ลลิตา', 'ปันต้น', NULL, 8, 5, 16, '2016-08-25', NULL, 2, '2017-09-28 07:09:22', 2, '2017-09-28 07:12:28', '$2y$10$CvnWHDBBTEvQQXo3ZJRfx.FFS078DlieVbYTsmaKWjeUDx8JvsSRy', NULL, NULL),
(24, '60056', 'นางสาว', 'ปรียาภรณ์', 'สมดี', NULL, 8, 5, 17, '2017-06-19', NULL, 2, '2017-09-28 07:09:22', 2, '2017-09-28 07:12:29', '$2y$10$C9plRJsWn0lwV1WNEdPgbO1qopmKOMfr/PzsOaHdq/ano/L497qnu', NULL, NULL),
(25, '48053', 'นางสาว', 'สวรส', 'ทัพซ้าย', NULL, 1, 6, 18, '2005-07-06', NULL, 2, '2017-09-28 07:09:22', 2, '2017-09-28 07:12:29', '$2y$10$wsPMrfCIHCMXev7eXo1ds.ookHCSOaoqTNAnJjdFgg62L98BhQLQu', NULL, NULL),
(26, '49018', 'นาย', 'เถลิงยศ', 'ศิริสุวรรณ', NULL, 1, 6, 19, '2006-04-01', NULL, 2, '2017-09-28 07:09:23', 2, '2017-09-28 07:12:29', '$2y$10$JcoXwpeJ1hUGZctqIZu1Wu0cuy5OK25g47nRg3D5LAup3OQl8Kgjq', NULL, NULL),
(27, '56042', 'นางสาว', 'กมลวรรณ', 'อินหาดกรวด', NULL, 1, 6, 20, '2013-06-01', NULL, 2, '2017-09-28 07:09:23', 2, '2017-09-28 07:12:30', '$2y$10$sYldIwIUviUz3G0pI0VE2efk6YePWCN8nesR37LJUMMy0YI5M5EqK', NULL, NULL),
(28, '59004', 'นางสาว', 'เพียงจิตร', 'เสาวภาคย์สัตสกุล', NULL, 1, 6, 21, '2016-01-05', NULL, 2, '2017-09-28 07:09:23', 2, '2017-09-28 07:12:30', '$2y$10$.GO02q0ldxHTLBosYIRE9OXPndDdOFWJoadShma3zFilsX.hlMI9.', NULL, NULL),
(29, '60021', 'นางสาว', 'ณัฐฐาพร', 'เชี่ยวชาญ', NULL, 1, 6, 22, '2017-03-01', NULL, 2, '2017-09-28 07:09:24', 2, '2017-09-28 07:12:30', '$2y$10$5QtY76MMgG5l5FiI631RAO2mQBuWvJhKilo/nRUOg4xgAHGNL0Vc2', NULL, NULL),
(30, '39006', 'นาง', 'จุฑามาศ', 'เขื่อนปา', NULL, 1, 7, 23, '1996-04-17', NULL, 2, '2017-09-28 07:09:24', 2, '2017-09-28 07:12:31', '$2y$10$e0MeZgvCdZO/K2YzTn.inOIl6MVlTwL9b8/D.lxhzCe9JsEqhQyOS', NULL, NULL),
(31, '40008', 'นาง', 'ยุพา', 'อาษาศึก', NULL, 1, 7, 24, '1997-07-01', NULL, 2, '2017-09-28 07:09:24', 2, '2017-09-28 07:12:31', '$2y$10$8SCpv.m/CAxtJ/ubXZXfHOdrfCPpJzzBVNUNK0bNY.CrurS8KuMaG', NULL, NULL),
(32, '42004', 'นาง', 'นิศานาถ', 'เชาว์ช่างเหล็ก', NULL, 1, 7, 24, '1999-03-01', NULL, 2, '2017-09-28 07:09:25', 2, '2017-09-28 07:12:31', '$2y$10$SMjUnJnrBw6h8L2j88LH8emqx5kG5OaPpHGJdItGTZidFigQhZgVy', NULL, NULL),
(33, '47002', 'นาง', 'นงลักษณ์', 'เอกมาตร์', NULL, 1, 7, 24, '2004-01-01', NULL, 2, '2017-09-28 07:09:25', 2, '2017-09-28 07:12:32', '$2y$10$taa0SCxn5whfa3kWD7nB2OfgSlhwk2cEpES340zrPKz9.Dh6Ln.TW', NULL, NULL),
(34, '48001', 'นาง', 'มะลิวรรณ', 'บุญกิจ', NULL, 1, 7, 24, '2005-01-01', NULL, 2, '2017-09-28 07:09:25', 2, '2017-09-28 07:12:32', '$2y$10$lLb40xr8H3qprbhieoWawupmQIQR3PfpXXVX/dE7ivDKC2TyEf.3y', NULL, NULL),
(35, '54009', 'นาย', 'สากล', 'นิติลาภ', NULL, 1, 7, 25, '2011-01-25', NULL, 2, '2017-09-28 07:09:25', 2, '2017-09-28 07:12:32', '$2y$10$VpTuf0JxV0wBZ94mPSv3wu6IUKRzEuwEwjwd4Iz0XkKg1OBGHeiR2', NULL, NULL),
(36, '57073', 'นาย', 'สุวิท', 'มิตรมานะ', NULL, 1, 7, 25, '2014-06-12', NULL, 2, '2017-09-28 07:09:26', 2, '2017-09-28 07:12:33', '$2y$10$TfaGIJSaHFe0Dyr4AzfKoOCERiVpGUWLfk908lZQZMKB4xqv8BRKq', NULL, NULL),
(37, '57089', 'นาย', 'ประพันธ์', 'ร่มแก้ว', NULL, 1, 7, 25, '2014-09-04', NULL, 2, '2017-09-28 07:09:26', 2, '2017-09-28 07:12:33', '$2y$10$WPWd68aLRW1XmtIdte0Dr.hOraTboiq9AjStNz1MlYx5InKpAuyvC', NULL, NULL),
(38, '53066', 'นาง', 'สว่างจิตร', 'อิศรภักดี', NULL, 9, 8, 26, '2010-11-16', '2017-09-28 14:34:57', 2, '2017-09-28 07:09:26', 2, '2017-09-28 07:34:57', '$2y$10$UWDGy6nC7Asgu72WbbErE.DE9.Cm4psc0/w7u7WwtO0vP748hyyde', 'xtmL2fE45ddAEjtmwkwpw8NHflbPEi2sLqLd22tRkqhsuuU3deFdO3oFMtP2', NULL),
(39, '54108', 'นางสาว', 'เพ็ญนิภา', 'นาอุดม', NULL, 9, 8, 27, '2011-08-29', NULL, 2, '2017-09-28 07:09:27', 2, '2017-09-28 07:12:34', '$2y$10$5khXFdWA8HCGT2IGc7RgROzEHaU7bfMKW1.20Ppw4xf.NKoIF3L.i', NULL, NULL),
(40, '55032', 'นาย', 'ธนพัฒน์', 'สายจันทร์', NULL, 9, 8, 28, '2012-05-25', NULL, 2, '2017-09-28 07:09:27', 2, '2017-09-28 07:12:34', '$2y$10$OIcZ21DP2Ip6fZy3RJSFy.DTqpUEfuhFlO2lLzruT5VcOq7hWKkFC', NULL, NULL),
(41, '60009', 'นางสาว', 'ชุติมา', 'บุญเกิด', NULL, 9, 8, 29, '2017-02-01', NULL, 2, '2017-09-28 07:09:27', 2, '2017-09-28 07:12:34', '$2y$10$kJYE1rAL8Zo6NKo/gTdH5uvLryByB1rCdkAG54SU7qRMbVZlZ7a3O', NULL, NULL),
(42, '58115', 'นาย', 'สมชาติ', 'บุญญานุสนธิ์', NULL, 9, 9, 30, '2015-10-26', NULL, 2, '2017-09-28 07:09:28', 2, '2017-09-28 07:12:35', '$2y$10$HVMbRLEfOU9OWDfpBQRSCueRSfUlw5bpIKQDJDP0/MlQTpC3JcJ/.', NULL, NULL),
(43, '58123', 'นาย', 'วศิน', 'พลอนันต์', NULL, 9, 9, 30, '2015-12-01', NULL, 2, '2017-09-28 07:09:28', 2, '2017-09-28 07:12:35', '$2y$10$A58LxVrxSKoLQO1PhLpFAO.3D/D4ZiyPuBvYDSmBbq7f0X3.KNJJ2', NULL, NULL),
(44, '59025', 'นาย', 'ทวี', 'สกุลธนยง', NULL, 9, 9, 31, '2016-04-01', NULL, 2, '2017-09-28 07:09:28', 2, '2017-09-28 07:12:35', '$2y$10$7rxJP4miY2zqm56JtTugQui6hoCBIWvZVvYm6vMGT8you1vNuwLiW', NULL, NULL),
(45, '60051', 'นาย', 'เกริกไกวัล', 'เกศแก้วรณฤทธิ์', NULL, 9, 9, 32, '2017-06-12', NULL, 2, '2017-09-28 07:09:28', 2, '2017-09-28 07:12:36', '$2y$10$Sxtu7Xr7AAh6fJRO0u0nlev8TUgxk3evXxAjQERbEAqzDnJboSeO.', NULL, NULL),
(46, '32001', 'นาย', 'ชำนาญ', 'อุไรศรี', NULL, 7, 10, 33, '1989-06-01', NULL, 2, '2017-09-28 07:09:29', 2, '2017-09-28 07:12:36', '$2y$10$1imnxb4C2LhjabTu9Z5sP.Nx9H6kUJOYrvoZ5kJv55KJxiyaxewGa', NULL, NULL),
(47, '40001', 'นาย', 'บุญเลิศ', 'ทิพบาง', NULL, 7, 10, 33, '1997-01-27', NULL, 2, '2017-09-28 07:09:29', 2, '2017-09-28 07:12:37', '$2y$10$gl.mg7aqvE/DOfflDLMTpuHi4P3Kh7cSrM6zFF3Z2hrmZ3/L5xBsu', NULL, NULL),
(48, '40003', 'นาย', 'ชุติพงศ์', 'ชูบางบ่อ', NULL, 7, 10, 34, '1997-04-16', NULL, 2, '2017-09-28 07:09:29', 2, '2017-09-28 07:12:37', '$2y$10$p2S4DwlI8a2Non9nkOO7OOSReE7VThLuz1u1txsDS51Uz.7RhKZBC', NULL, NULL),
(49, '41004', 'นาย', 'ประยูร', 'รับสันเทียะ', NULL, 7, 10, 33, '1998-04-21', NULL, 2, '2017-09-28 07:09:30', 2, '2017-09-28 07:12:37', '$2y$10$iHEBsg5trpswyZC627SjSutkLGMTMb6IgyUrD3f7b0H6X05tDHKc.', NULL, NULL),
(50, '41005', 'นาย', 'พนม', 'แสวงนอก', NULL, 7, 10, 33, '1998-04-21', NULL, 2, '2017-09-28 07:09:31', 2, '2017-09-28 07:12:38', '$2y$10$18P5WYOdwrm1x.CzPwXdoe6Q4p6Q5YfnBDnZUNAt1BLif1nJl.MFe', NULL, NULL),
(51, '41010', 'นาย', 'อนันต์', 'ทิพบาง', NULL, 7, 10, 33, '1998-06-29', NULL, 2, '2017-09-28 07:09:31', 2, '2017-09-28 07:12:38', '$2y$10$SZ3QCXWi5B1TMAcVuLiRP.5nhoyMWc3hoTFGjUnF9uCi07cKYN2Fm', NULL, NULL),
(52, '42016', 'นาย', 'วิชัย', 'งอกโพธิ์', NULL, 7, 10, 35, '1999-09-08', NULL, 2, '2017-09-28 07:09:31', 2, '2017-09-28 07:12:38', '$2y$10$qf7RhYkV2ybeB3AuJEfehuk/kewqrA/yqIVT1hsXNzP/K.QIFxTrK', NULL, NULL),
(53, '54014', 'นาย', 'ประทาน', 'ละอองทัพ', NULL, 7, 10, 36, '2011-01-25', NULL, 2, '2017-09-28 07:09:32', 2, '2017-09-28 07:12:39', '$2y$10$d3x3HN7e9/gf05NpUZnETOWTCSaI4KHHkddDqHUS4y6mw4CVZP61.', NULL, NULL),
(54, '54028', 'นาย', 'สมทรง', 'โกศลเวท', NULL, 7, 10, 34, '2011-03-01', NULL, 2, '2017-09-28 07:09:32', 2, '2017-09-28 07:12:39', '$2y$10$QJBrixlfbvt1BIjaQaTvDexx4oXb4MlG3LZOhsJEG92.0MJDFNwqS', NULL, NULL),
(55, '55098', 'นาย', 'วิเชียร', 'เสนารัตน์', NULL, 7, 10, 33, '2012-10-31', NULL, 2, '2017-09-28 07:09:32', 2, '2017-09-28 07:12:39', '$2y$10$gQERw/HIYFCfRJww6ioL1.j4gi1rlrYVOXGE/4pApldZDUlkdoZRm', NULL, NULL),
(56, '57103', 'นาย', 'รัชพล', 'ใจอินทร์', NULL, 7, 10, 33, '2014-10-01', NULL, 2, '2017-09-28 07:09:33', 2, '2017-09-28 07:12:39', '$2y$10$WPmcr/21NNLx.hKGh8NyXOTYhAj90saxGEKpzaVGqicSPgSJyv1n.', NULL, NULL),
(57, '60041', 'นาย', 'อำนวย', 'รวงงาม', NULL, 7, 10, 34, '2017-05-22', NULL, 2, '2017-09-28 07:09:33', 2, '2017-09-28 07:12:40', '$2y$10$6JFDI6rfKzarbviZoMzOROiqbR7glef38zV.fEObDMuBZnV2htq46', NULL, NULL),
(58, '60058', 'นาย', 'ศักดิ์', 'สุดใจ', NULL, 7, 10, 37, '2017-06-19', NULL, 2, '2017-09-28 07:09:33', 2, '2017-09-28 07:12:40', '$2y$10$b0wsom/0AOAfysJZdoFUk.ssk5/7//6JrtnepcP0FF0tO5xPhXw46', NULL, NULL),
(59, 'A46001', 'นาย', 'สมคิด', 'กองนอก', NULL, 7, 10, 33, '2003-05-02', NULL, 2, '2017-09-28 07:09:33', 2, '2017-09-28 07:12:40', '$2y$10$eOc3ZOmozoRV.FIZF4DgO.Vk45mBgDNnCcsYa3IRwBjLXt.BqaEBS', NULL, NULL),
(60, 'A50015', 'นาย', 'สกนธ์', 'จันทรางกูล', NULL, 7, 10, 33, '2007-06-07', NULL, 2, '2017-09-28 07:09:34', 2, '2017-09-28 07:12:41', '$2y$10$hCjuvP.RBqeIuRwcxcUTyenBYRvNS3lrfdCSu2khPcrcSxySvUSB.', NULL, NULL),
(61, '50024', 'นาย', 'ขวัญชัย', 'ศิริโวหาร', NULL, 4, 11, 38, '2007-02-21', NULL, 2, '2017-09-28 07:09:34', 2, '2017-09-28 07:12:41', '$2y$10$c3eNHDevkoaTMu5ue/4c9e5LZLsQ2RENxwg6p8hA7CBZ6dfZo9oF6', NULL, NULL),
(62, '54140', 'นาย', 'สมพงศ์', 'อพันโท', NULL, 4, 11, 39, '2011-11-18', NULL, 2, '2017-09-28 07:09:34', 2, '2017-09-28 07:12:41', '$2y$10$0hqG8i4afDw0N3V9sxi2duCMwJ.m0pWbWucLRqHdRacHWEzJu79U2', NULL, NULL),
(63, '55086', 'นาย', 'สะเป', 'ถิ่นสี', NULL, 4, 11, 40, '2012-09-26', NULL, 2, '2017-09-28 07:09:35', 2, '2017-09-28 07:12:42', '$2y$10$5bYEwYjEEpnV2Ej8yz4lZuSW6jMEsutNSBNAm09aTcJ2ACTvrrMxK', NULL, NULL),
(64, '56097', 'นาย', 'สุรศักดิ์', 'วงษ์ภักดี', NULL, 4, 11, 41, '2013-11-01', NULL, 2, '2017-09-28 07:09:35', 2, '2017-09-28 07:12:42', '$2y$10$4hh/mUwkVx2Y0D6h55UTreZoQ3xpSg/rhjG8C1wj.pBTepU4FCksC', NULL, NULL),
(65, '58049', 'นาย', 'เอกพจน์', 'มุ่งฝอยกลาง', NULL, 4, 11, 42, '2015-05-04', NULL, 2, '2017-09-28 07:09:35', 2, '2017-09-28 07:12:42', '$2y$10$Lxk7qf0MLgu5hSaFedI1ROfHILw4Hk8r24PqsREhAtyceYDpu5YIK', NULL, NULL),
(66, '58085', 'นาย', 'สุชาติ', 'วิบูลย์จิตร', NULL, 4, 11, 43, '2015-07-01', NULL, 2, '2017-09-28 07:09:36', 2, '2017-09-28 07:12:43', '$2y$10$vqhuCwAviye8HjpD2OkB/uKYvzg.gUE04vGCKSO6iavRLwoeZvFkO', NULL, NULL),
(67, '59050', 'นางสาว', 'นิชธิมา', 'ประยูรมหิศร', NULL, 4, 11, 44, '2016-06-02', NULL, 2, '2017-09-28 07:09:36', 2, '2017-09-28 07:12:43', '$2y$10$2E3HFjaFirHTwTpm/9XNdeMBkc7JPVqHjNzhtlKaeG.iK072yx3/e', NULL, NULL),
(68, '59112', 'นาย', 'ณัฐวัฒน์', 'กรรเชียง', NULL, 4, 11, 45, '2016-12-01', NULL, 2, '2017-09-28 07:09:36', 2, '2017-09-28 07:12:43', '$2y$10$.OmcrJYDW.zbzrhhPJbBNOGDOFAK1Wh8vX8HNOYX22OJAGcmlZ9xq', NULL, NULL),
(69, '60028', 'นาย', 'วีรชัย', 'ฤทธี', NULL, 4, 11, 46, '2017-04-01', NULL, 2, '2017-09-28 07:09:36', 2, '2017-09-28 07:12:43', '$2y$10$.7fE0nRH4HpemF3iGr5xzeCWVZA62MjMlmft1X15/gS8IvCkEQJE2', NULL, NULL),
(70, '60030', 'นาย', 'สามารถ', 'ฤทธี', NULL, 4, 11, 46, '2017-04-01', NULL, 2, '2017-09-28 07:09:37', 2, '2017-09-28 07:12:44', '$2y$10$2l7JFyXC2mk/Fh1GeIOU4u9NHRAgRhENPzZm9OXsAEKikQEIefm7u', NULL, NULL),
(71, '60031', 'นาย', 'วัชรินทร์', 'ชินแสน', NULL, 4, 11, 46, '2017-04-01', NULL, 2, '2017-09-28 07:09:37', 2, '2017-09-28 07:12:44', '$2y$10$lmwMSYLqyKDMkV.RY1BRVuQnG8Ph./42dcNbyiwozXBaxYegtxb.C', NULL, NULL),
(72, '60032', 'นาย', 'ภานุวัฒน์', 'มหานาม', NULL, 4, 11, 46, '2017-04-01', NULL, 2, '2017-09-28 07:09:37', 2, '2017-09-28 07:12:44', '$2y$10$ut.O0DqxI/TrgAU8R3LJruB6SaFH.VEqNYj7oJpSwpwjZRjoPdEcy', NULL, NULL),
(73, '60037', 'นาย', 'วริศ', 'คุณวัฒนสาร', NULL, 4, 11, 46, '2017-05-09', NULL, 2, '2017-09-28 07:09:38', 2, '2017-09-28 07:12:45', '$2y$10$KFpwAeX7Br./G0j2hFmjvuUv.sQ/8onS4vJTxegVOl9HVnfycThc.', NULL, NULL),
(74, '60054', 'นาย', 'ฉันท์ทัต', 'เหลืองอร่าม', NULL, 4, 11, 44, '2017-06-19', NULL, 2, '2017-09-28 07:09:38', 2, '2017-09-28 07:12:45', '$2y$10$8Rhu2vyamk6uVCCVvAs6v.hraAt2GXiZZcTJ3Un2dCZ.t7l.3OR3K', NULL, NULL),
(75, '60076', 'นาย', 'นพพล', 'เหรียญวิลาศ', NULL, 4, 11, 47, '2017-08-01', NULL, 2, '2017-09-28 07:09:38', 2, '2017-09-28 07:12:45', '$2y$10$DaHlYxtsP70KB1jeHyp2XORgc/XwBmy4fxDEGeBKCaq0k0L4.zgqO', NULL, NULL),
(76, '60077', 'นาย', 'อนุศักดิ์', 'ภิรักษา', NULL, 4, 11, 48, '2017-08-02', NULL, 2, '2017-09-28 07:09:38', 2, '2017-09-28 07:12:46', '$2y$10$KrD6X1ehmS/u5QQOzANyRuteQAZJUJggGyPAUf8OwGYuwUpEm8.hC', NULL, NULL),
(77, '54096', 'นาย', 'อิศราพงษ์', 'มหายศนันท์', NULL, 4, 12, 49, '2011-07-12', NULL, 2, '2017-09-28 07:09:39', 2, '2017-09-28 07:12:46', '$2y$10$YLiZfdBiFw/afgxQFGVLkOXTyTx5tdMyAQHrZHb8QxKDVE/TRTAXq', NULL, NULL),
(78, '58089', 'นาย', 'เตชินท์', 'คุ้มแห่ว', NULL, 4, 12, 50, '2015-07-27', NULL, 2, '2017-09-28 07:09:39', 2, '2017-09-28 07:12:46', '$2y$10$auoeIfOBDqUFjN2YeiiNqeVtkPfEecwQIvkDMwdTWJSB0oLQd7LzK', NULL, NULL),
(79, '59089', 'นาย', 'ธนพงษ์', 'ลักขณะ', NULL, 4, 12, 51, '2016-08-22', NULL, 2, '2017-09-28 07:09:39', 2, '2017-09-28 07:12:47', '$2y$10$jNSiOb3RpgtmQhyPZpCVtug.MHHabG.XYWhudbkKgYRSmkeSOMUIu', NULL, NULL),
(80, '60057', 'นางสาว', 'วิมลสิริ', 'ประภาติกุล', NULL, 4, 12, 52, '2017-06-19', NULL, 2, '2017-09-28 07:09:40', 2, '2017-09-28 07:12:47', '$2y$10$EGm9Dj0JFcCRPIUnSYsL2OnMAD/Duz4pM6c3UqAXIHumEL1sQtj3S', NULL, NULL),
(81, 'A43006', 'นาย', 'ทองเปลี่ยน', 'คุณทะวงษ์', NULL, 4, 12, 50, '2000-08-15', NULL, 2, '2017-09-28 07:09:40', 2, '2017-09-28 07:12:47', '$2y$10$Mxen8aE8nRkNF55KPBB6SuoAe31M.632rEbpLcycl8oCExrTmya4.', NULL, NULL),
(82, 'A60006', 'นาย', 'พิษณุ', 'ผลเกิด', NULL, 4, 12, 50, '2017-03-08', NULL, 2, '2017-09-28 07:09:40', 2, '2017-09-28 07:12:47', '$2y$10$7U3p7hHOeFf08BdhnRrWeeztW7wuzUhqPZc6IyXS32TFtxyJDB4UW', NULL, NULL),
(83, '40011', 'นาย', 'สุธิรัตน์', 'พิมพ์แป', NULL, 4, 13, 53, '1997-07-10', NULL, 2, '2017-09-28 07:09:41', 2, '2017-09-28 07:12:48', '$2y$10$E0/nOVWfc5asGQMuvsQ4nelNG5tWGoZziIhufFuweukSRWzzau5Lu', NULL, NULL),
(84, '43001', 'นาย', 'สุพิน', 'แสงหิม', NULL, 4, 13, 50, '2000-01-01', NULL, 2, '2017-09-28 07:09:41', 2, '2017-09-28 07:12:48', '$2y$10$Qzv4VWjHukIztlMEP2a2R.3E6qOBDuxhIaoxSfG0AuxmwNk6pjAaG', NULL, NULL),
(85, '47030', 'นาย', 'ชัชวาล', 'วงค์อินทร์อยู่', NULL, 4, 13, 39, '2004-05-17', NULL, 2, '2017-09-28 07:09:41', 2, '2017-09-28 07:12:48', '$2y$10$fgVwaG43qIb91STTau3f3./zsFZuLm9EwsNLr9JGHCtKh8stz4iMi', NULL, NULL),
(86, '55052', 'นาย', 'ดิษพงค์', 'สุขประเสริฐ', NULL, 4, 13, 54, '2012-07-02', NULL, 2, '2017-09-28 07:09:41', 2, '2017-09-28 07:12:49', '$2y$10$JdN5nE7E8AG0GOg1fgI46u/z.Nw6e2/BT6BsgyXHqMMqT/a0jcGMK', NULL, NULL),
(87, '58024', 'นาย', 'อนุสรณ์', 'ธ.น.ทอง', NULL, 4, 13, 45, '2015-03-16', NULL, 2, '2017-09-28 07:09:42', 2, '2017-09-28 07:12:49', '$2y$10$9CdsBsIgIj5pZLw5fbyq5upL4U4KXkbss1XhHr1LS.GnJn6swDS/G', NULL, NULL),
(88, '58053', 'นาย', 'วิษณุ', 'จิ้มจีน', NULL, 4, 13, 55, '2015-05-13', NULL, 2, '2017-09-28 07:09:42', 2, '2017-09-28 07:12:49', '$2y$10$qGa.znP657iMhhPMbeBrnuDFf5nOjbw7aSzK7tBYtCxqVoYlCa4HS', NULL, NULL),
(89, '58124', 'นาย', 'สงกรานต์', 'รอบคอบ', NULL, 4, 13, 50, '2015-12-01', NULL, 2, '2017-09-28 07:09:42', 2, '2017-09-28 07:12:49', '$2y$10$9mTQQxt397zkEv4Zkso9hO3idpUVY52g0sm1.4t1MqOt9FVfNEZr.', NULL, NULL),
(90, '59011', 'นาย', 'พิเชษฐ์', 'สังข์ศรี', NULL, 4, 13, 50, '2016-02-01', NULL, 2, '2017-09-28 07:09:42', 2, '2017-09-28 07:12:50', '$2y$10$z1sslQ.JFAvcqk49.p7VZuuIO3/tmcZxJDPL4mtZpywukIJ8bE96m', NULL, NULL),
(91, '59044', 'นาย', 'อลงกรณ์', 'ทองเรือง', NULL, 4, 13, 55, '2016-05-17', NULL, 2, '2017-09-28 07:09:43', 2, '2017-09-28 07:12:50', '$2y$10$GAnJ2DouW7Kcamd7KOFm3.Ba.kMzlqObNLLRXCp4GsGk4QnEC9rg6', NULL, NULL),
(92, '59049', 'นาย', 'รณชัย', 'เชื้อตาเคน', NULL, 4, 13, 45, '2016-06-01', NULL, 2, '2017-09-28 07:09:43', 2, '2017-09-28 07:12:50', '$2y$10$E.8KBohZ4r9NfW9JjCZlP.Isczw76RoQNIDvkstQdZsSf/OJld19O', NULL, NULL),
(93, '58131', 'นาย', 'วัชรพงษ์', 'ทิพสน', NULL, 3, 14, 56, '2015-12-17', NULL, 2, '2017-09-28 07:09:43', 2, '2017-09-28 07:12:51', '$2y$10$lB569VeXA8d1jyGhvfw1mu9UuSxB9iedU5rAWLsaemHdN0AeKmfgi', NULL, NULL),
(94, '60059', 'นางสาว', 'กานต์รวี', 'เจิดวรลาภ', NULL, 3, 14, 44, '2017-06-21', NULL, 2, '2017-09-28 07:09:44', 2, '2017-09-28 07:12:52', '$2y$10$Aj10UAtPkmp4BC5YXTB/k.q68DzED6.yn6Bbz0TPtGsMrWJiMavGq', NULL, NULL),
(95, '60062', 'นาย', 'สุพัด', 'โอ่งรัมย์', NULL, 3, 14, 57, '2017-07-03', NULL, 2, '2017-09-28 07:09:44', 2, '2017-09-28 07:12:52', '$2y$10$oInZLZeGHFpOeV13kJ.fbOy5lSv94/ppRM.Z7bdDzkBczl4oFq1uu', NULL, NULL),
(96, '60078', 'นางสาว', 'มาริสา', 'ผ่องใส', NULL, 3, 14, 44, '2017-08-04', NULL, 2, '2017-09-28 07:09:44', 2, '2017-09-28 07:12:52', '$2y$10$gFbkyFdBO.FCfCE9jmW5bO4hpWpPk7t9U6UASCJ/LtmFulbXTXbCi', NULL, NULL),
(97, '60084', 'นางสาว', 'จินตมัย', 'ศิริเวช', NULL, 3, 14, 56, '2017-08-14', NULL, 2, '2017-09-28 07:09:45', 2, '2017-09-28 07:12:53', '$2y$10$r5ivCGDMCbttB9Gm6Av/yeCLA0PVTpPcTYr5c7IF6UdXDfwhRYzyy', NULL, NULL),
(98, '54018', 'นาย', 'นิคม', 'พลอนันต์', NULL, 3, 15, 58, '2011-02-01', NULL, 2, '2017-09-28 07:09:45', 2, '2017-09-28 07:12:53', '$2y$10$esso.xHKbHrT.bVpqSq59OiBGhc4ciJZG8MJjpcMEpT929Wu8yXsu', NULL, NULL),
(99, '58008', 'นาย', 'อภิชาติ', 'เหล็กไหล', NULL, 3, 15, 58, '2015-01-23', NULL, 2, '2017-09-28 07:09:45', 2, '2017-09-28 07:12:53', '$2y$10$pgl2oM8x8SdnSotNPZx/I.1Xq6eNh49kQkJclTzXlV7Z5V7ih4PZq', NULL, NULL),
(100, '59091', 'นาง', 'ผกา', 'บุญเมือง', NULL, 3, 15, 44, '2016-09-01', NULL, 2, '2017-09-28 07:09:46', 2, '2017-09-28 07:12:54', '$2y$10$xSvjezKG36KI8zcwHoI0YOB2ezn4mQSHBfrKNfYGNJ9H9msWPjx4q', NULL, NULL),
(101, '42018', 'นาย', 'มานพ', 'ม่วงสีฟ้า', NULL, 3, 16, 59, '1999-10-06', NULL, 2, '2017-09-28 07:09:46', 2, '2017-09-28 07:12:54', '$2y$10$4Tq1XSCd5A5uE/5RGHMnRuMhM9pdDVY3xAgGw0x5spXRfckHV/Mum', NULL, NULL),
(102, '47058', 'นาย', 'สาโรจน์', 'จันทน์วัฒน์', NULL, 3, 16, 59, '2004-08-30', NULL, 2, '2017-09-28 07:09:46', 2, '2017-09-28 07:12:54', '$2y$10$XJp5ptqvB2pA.LWLRTRUu.gXpBPkC8ly72PpSVYpXnYdyGl4OFLtK', NULL, NULL),
(103, '47059', 'นาง', 'ประณี', 'จันทน์วัฒน์', NULL, 3, 16, 60, '2004-08-30', NULL, 2, '2017-09-28 07:09:47', 2, '2017-09-28 07:12:55', '$2y$10$k/PfaO9G2EvLaFO55bS7k.AltDiASA8TWrir2Nq27BEVF.CpzyLVi', NULL, NULL),
(104, '48059', 'นาย', 'บุญฤทธิ์', 'พลลา', NULL, 3, 16, 59, '2005-07-15', NULL, 2, '2017-09-28 07:09:47', 2, '2017-09-28 07:12:55', '$2y$10$wgTjuWauipGmyyOO5ZL7M.RypvhojMUHphr4Nfr1qvkPh4qTRkNSa', NULL, NULL),
(105, '48060', 'นาง', 'ราตรี', 'พลลา', NULL, 3, 16, 60, '2005-07-15', NULL, 2, '2017-09-28 07:09:47', 2, '2017-09-28 07:12:55', '$2y$10$FWzqb09L/59OF27K50uZg.q8G9mFK7tNE0.WUlcyv1GCv.c/G6orC', NULL, NULL),
(106, '50014', 'นาย', 'ภูมิพัฒน์', 'พลลา', NULL, 3, 16, 59, '2007-02-01', NULL, 2, '2017-09-28 07:09:47', 2, '2017-09-28 07:12:56', '$2y$10$2FHg5DvWdSbg7ZfvwFsAAuxDba/gynb3RdC6Nl9HA/5.6DeEGRUGC', NULL, NULL),
(107, '50033', 'นาย', 'วิชัย', 'มารศรี', NULL, 3, 16, 59, '2007-03-19', NULL, 2, '2017-09-28 07:09:48', 2, '2017-09-28 07:12:56', '$2y$10$oc81xsLDzSTo7KsAh1H/eu7D7Cq.Rj/VYTIoAPAZ9ihd2jGfYXdUe', NULL, NULL),
(108, '50034', 'นางสาว', 'อัมพร', 'เหว่าสำเนียง', NULL, 3, 16, 60, '2007-03-19', NULL, 2, '2017-09-28 07:09:48', 2, '2017-09-28 07:12:56', '$2y$10$xhEKYALU2tNF9SJMWjtz1O6SQ66Pqh4jYGh74cWlnF1DkCfHJuirW', NULL, NULL),
(109, '50042', 'นาย', 'วันชัย', 'พันธ์สิทธิ์', NULL, 3, 16, 59, '2007-05-05', NULL, 2, '2017-09-28 07:09:48', 2, '2017-09-28 07:12:57', '$2y$10$LDzol9WAb1ZNpzxM.Jb6b.nYrm6Vth1hyFyaffxWmGrgZaQ4WRjZC', NULL, NULL),
(110, '51028', 'นางสาว', 'วาสนา', 'ไกรสิงห์สม', NULL, 3, 16, 60, '2008-07-04', NULL, 2, '2017-09-28 07:09:49', 2, '2017-09-28 07:12:57', '$2y$10$4Xq.O.2nxdbqpQBuS1ukN.xQMskXGh4xzknTKX8XK.K1whXUfKWdK', NULL, NULL),
(111, '52010', 'นาย', 'นัฐพงษ์', 'พันธ์สิทธิ์', NULL, 3, 16, 60, '2009-04-01', NULL, 2, '2017-09-28 07:09:49', 2, '2017-09-28 07:12:57', '$2y$10$/kNHmaTz.m1s.Rog4FOtleG5cpAbdGci6REJylCfAzOnQWPPVMqOO', NULL, NULL),
(112, '52024', 'นาย', 'สุเทพ', 'พันสิทธิ์', NULL, 3, 16, 59, '2009-06-04', NULL, 2, '2017-09-28 07:09:49', 2, '2017-09-28 07:12:57', '$2y$10$bvT8Z3Vtf47eJU88Ds66bOYppARQuHiZR9PqvMI6y4AXJ7e4bVX6K', NULL, NULL),
(113, '52035', 'นาย', 'ณรงค์', 'ผดุงโภชน์', NULL, 3, 16, 59, '2009-08-26', NULL, 2, '2017-09-28 07:09:50', 2, '2017-09-28 07:12:58', '$2y$10$3AQz7rXGgY8Ndda7XLt36.vomJq3mvnIlAgkdHt734MJ2cMCqUQMW', NULL, NULL),
(114, '52036', 'นาง', 'นฤมล', 'ผดุงโภชน์', NULL, 3, 16, 60, '2009-08-26', NULL, 2, '2017-09-28 07:09:50', 2, '2017-09-28 07:12:58', '$2y$10$mqA8cwnW7UbetnxMbylbLeo1zQksccs85eiRBBHi3rgp2LemqBKie', NULL, NULL),
(115, '53048', 'นาย', 'สุเทพ', 'พวงงาม', NULL, 3, 16, 59, '2010-09-23', NULL, 2, '2017-09-28 07:09:50', 2, '2017-09-28 07:12:58', '$2y$10$LVyBf65a1MV5QB6cVV8EZeGnN6NdbITvwwh7yrNGRKD2wMR2CsQ4O', NULL, NULL),
(116, '53049', 'นางสาว', 'อรวรรณ', 'พานทอง', NULL, 3, 16, 60, '2010-09-23', NULL, 2, '2017-09-28 07:09:51', 2, '2017-09-28 07:12:59', '$2y$10$kODhHg.Ybs8cFkk8hny5W.GFIQPAwsOWAHgwKu2OZ9U9buz7Wyu7C', NULL, NULL),
(117, '53053', 'นาย', 'ธวัชชัย', 'บุษบา', NULL, 3, 16, 59, '2010-10-15', NULL, 2, '2017-09-28 07:09:51', 2, '2017-09-28 07:12:59', '$2y$10$ZydhChd12DrTjpDPn7Vwju1WD6MbDqxRGfowKbke8LLmSHJGkbEAa', NULL, NULL),
(118, '53054', 'นางสาว', 'สุนี', 'ดาศรี', NULL, 3, 16, 60, '2010-10-15', NULL, 2, '2017-09-28 07:09:51', 2, '2017-09-28 07:12:59', '$2y$10$ZZYGqOep3wTqXK2L5k4r7OxvgRMWLIxDxWPsiPh.nMbTMU2ggocLC', NULL, NULL),
(119, '54050', 'นางสาว', 'วรรณา', 'เรืองศรี', NULL, 3, 16, 60, '2011-04-08', NULL, 2, '2017-09-28 07:09:51', 2, '2017-09-28 07:12:59', '$2y$10$zeo/rLkl/6TwEIU5qe8VBeC6Ik7Ij3HGVcQcc50j11BuDsY8EINIa', NULL, NULL),
(120, '54144', 'นาย', 'สมศักดิ์', 'พันธ์สิทธิ์', NULL, 3, 16, 59, '2011-12-30', NULL, 2, '2017-09-28 07:09:52', 2, '2017-09-28 07:13:00', '$2y$10$yzZXSADnBIAlbdCCFn9YdO3RBpfREWO6XYOnGIlTazRE2qkYgAaRa', NULL, NULL),
(121, '54145', 'นาย', 'ประทีป', 'พันธ์สิทธิ์', NULL, 3, 16, 60, '2011-12-30', NULL, 2, '2017-09-28 07:09:52', 2, '2017-09-28 07:13:00', '$2y$10$kEKLX06blJ6ME9kqlCB41uWYF6lTg1OA32sYxBbq9OxCTTg5DZRW.', NULL, NULL),
(122, '55040', 'นาย', 'ธนโชติ', 'เบ็ญพาด', NULL, 3, 16, 59, '2012-06-02', NULL, 2, '2017-09-28 07:09:52', 2, '2017-09-28 07:13:00', '$2y$10$7sD1.BHdCBBQEloJSTWm3OWuVkIFtN0bGSrbgsoZ79KQ0Gpi84dPi', NULL, NULL),
(123, '55041', 'นางสาว', 'สุวภัทร', 'เบ็ญพาด', NULL, 3, 16, 60, '2012-06-02', NULL, 2, '2017-09-28 07:09:53', 2, '2017-09-28 07:13:01', '$2y$10$RJTqihdCwa5ZcJls8e.OjeKveZFQHpCVyaA4iVlQm9..7rMIlul/C', NULL, NULL),
(124, '56047', 'นาง', 'ภัทธนัน', 'พลลา', NULL, 3, 16, 60, '2013-06-07', NULL, 2, '2017-09-28 07:09:53', 2, '2017-09-28 07:13:01', '$2y$10$5Mzv/cB4czFmXo6CrtHZeeN2einZMwnQ2Q/0vPh01D2PXQi6hMT5K', NULL, NULL),
(125, '58059', 'นาย', 'สมชาย', 'สังขระชัฎ', NULL, 3, 16, 59, '2015-05-08', NULL, 2, '2017-09-28 07:09:53', 2, '2017-09-28 07:13:01', '$2y$10$ouN3GWy1MIjJIVgEBVTFve58iBspxTkkQjmTnt3.V8ZKIZufHYUw2', NULL, NULL),
(126, '58061', 'นาง', 'ไพรินทร์', 'พันธ์สิทธิ์', NULL, 3, 16, 60, '2015-05-13', NULL, 2, '2017-09-28 07:09:54', 2, '2017-09-28 07:13:02', '$2y$10$OWInqyGS8WyWpGB0dfGoQeucYYmMWt0UVvMt59l9tBG2f8uB3ay7S', NULL, NULL),
(127, '58092', 'นาย', 'นพดล', 'พลลา', NULL, 3, 16, 59, '2015-08-07', NULL, 2, '2017-09-28 07:09:54', 2, '2017-09-28 07:13:02', '$2y$10$vzZGg2GTD4Jh7jzRZVtzDeUwZ.bGo7brLha265JnICf.UxAUqaLcG', NULL, NULL),
(128, '58097', 'นางสาว', 'ขวัญนภา', 'งามบรรจง', NULL, 3, 16, 60, '2015-08-11', NULL, 2, '2017-09-28 07:09:54', 2, '2017-09-28 07:13:02', '$2y$10$ndqJVQ60CYxv6C0Pn.9VIe8wkUXQfKpvHet5EeD1qlWpDGLu6JO6u', NULL, NULL),
(129, '58116', 'นางสาว', 'สันทยา', 'ย่อมเที่ยงแท้', NULL, 3, 16, 60, '2015-11-01', NULL, 2, '2017-09-28 07:09:55', 2, '2017-09-28 07:13:02', '$2y$10$asgFFWD1BI119urxxdrl2OeGUFg/8GJroR5ui3LjGXqJlBj5vc7Bm', NULL, NULL),
(130, '59031', 'นาย', 'ษมาธัช', 'พลลา', NULL, 3, 16, 59, '2016-05-04', NULL, 2, '2017-09-28 07:09:55', 2, '2017-09-28 07:13:03', '$2y$10$lBv2tVaA/mV7SX5wSGUIV.PPX1SywTeNJ.gzbaSAxhLq.x4xDp6q6', NULL, NULL),
(131, '60045', 'นาย', 'กฤษณะ', 'ฟักขาว', NULL, 3, 16, 59, '2017-06-01', NULL, 2, '2017-09-28 07:09:56', 2, '2017-09-28 07:13:03', '$2y$10$Ai9ZS5PizCTN6YgTCxkn5OHQInNeDsppKSxoN.yKxtHKPXwAk3fXy', NULL, NULL),
(132, '60073', 'นาย', 'สมชาย', 'บ้านสร้าง', NULL, 3, 16, 59, '2017-07-11', NULL, 2, '2017-09-28 07:09:56', 2, '2017-09-28 07:13:03', '$2y$10$yloqmwQt123zkU9vpsZ9t.cS2X2za/mQGqWSsYce89qaywy/aJI7u', NULL, NULL),
(133, '60086', 'นาย', 'สายชล', 'บ้านสร้าง', NULL, 3, 16, 59, '2017-08-17', NULL, 2, '2017-09-28 07:09:56', 2, '2017-09-28 07:13:04', '$2y$10$wRDD.tkZA87LFN66zRC9KOqkc84i6.me67xsAQQz8PhmU7fIH0Qrq', NULL, NULL),
(134, '57020', 'นาง', 'นฤมล', 'รักษาจิตร์', NULL, 3, 17, 61, '2014-03-04', NULL, 2, '2017-09-28 07:09:57', 2, '2017-09-28 07:13:04', '$2y$10$.TY2Rb/uCIIz2O/JlgeuDuUyrtz1wt0WIWaJ4qD5TZxb4x3bMh6Oa', NULL, NULL),
(135, '57049', 'นาย', 'ดุรงค์', 'สมบุญ', NULL, 3, 17, 61, '2014-05-13', NULL, 2, '2017-09-28 07:09:57', 2, '2017-09-28 07:13:04', '$2y$10$2Qcq1SuBip9BOQBTzxPXcOdz3HcaS99ha2DdVQCELqCXu7g4AYYT6', NULL, NULL),
(136, '59007', 'นางสาว', 'พุ่มพวง', 'เชญชาญ', NULL, 3, 17, 61, '2016-01-15', NULL, 2, '2017-09-28 07:09:57', 2, '2017-09-28 07:13:04', '$2y$10$9gMMHBcdkQG6pzmrAmEej.7D2ZLCydgHLpCFD.kRswMSQKwKkaKMi', NULL, NULL),
(137, '59029', 'นาย', 'ถนอม', 'วิลาส', NULL, 3, 17, 61, '2016-04-25', NULL, 2, '2017-09-28 07:09:58', 2, '2017-09-28 07:13:05', '$2y$10$NjuW5A8bkQ2II8btMaZUYuz9ZAbAvEOiP6kwFthJ4AaDRTb32qPHG', NULL, NULL),
(138, '59066', 'นาย', 'กฤษณะ', 'ภู่อ่อง', NULL, 3, 17, 61, '2016-06-20', NULL, 2, '2017-09-28 07:09:58', 2, '2017-09-28 07:13:05', '$2y$10$L5WMvs/TIwA0I1f8KZcfnum/mapV1xcNiqfoiTx5RTa7aNSrDrhHu', NULL, NULL),
(139, '59083', 'นางสาว', 'นิภาพร', 'พิมพ์ชาย', NULL, 3, 17, 61, '2016-08-01', NULL, 2, '2017-09-28 07:09:58', 2, '2017-09-28 07:13:05', '$2y$10$UMm..xdxh4RmPVX1XJR/H.eJ3A8u7JXHmSMS6Qn0WjuM2Ds0PPsXS', NULL, NULL),
(140, '60068', 'นาย', 'แจ๊ก', 'พงษ์กองดี', NULL, 3, 17, 61, '2017-07-01', NULL, 2, '2017-09-28 07:09:59', 2, '2017-09-28 07:13:06', '$2y$10$lgA89OXnlUtMc2vMjSqBK.aw.9ZQl2cPMXoUCefQnWRIFGbVmGMRS', NULL, NULL),
(141, '60072', 'นาย', 'ชัยอนนท์', 'แซ่โค้ว', NULL, 3, 17, 61, '2017-07-11', NULL, 2, '2017-09-28 07:09:59', 2, '2017-09-28 07:13:06', '$2y$10$SBc3/uEg/SpcYMRxiHelp.RpQ6h9CUk43/yAv4j55g.hJPM69iyJK', NULL, NULL),
(142, '60085', 'นางสาว', 'ผกากรอง', 'ใจเที่ยง', NULL, 3, 17, 61, '2017-08-16', NULL, 2, '2017-09-28 07:09:59', 2, '2017-09-28 07:13:06', '$2y$10$IRzhArfu80adSSZsGm1BguHo8D/kZ5bLdQqHSsqlkhWWh9RI1YDWi', NULL, NULL),
(143, '33002', 'นาย', 'ประเทือง', 'สุพรรณโรจน์', NULL, 3, 18, 61, '1990-09-01', NULL, 2, '2017-09-28 07:09:59', 2, '2017-09-28 07:13:07', '$2y$10$1dBpGXCxk8fDoYJ9XO4zT.YdHTqhb8pmkpOF2b4tfNKrqtcDE.1xG', NULL, NULL),
(144, '39009', 'นาย', 'สมทรง', 'โชควลีพร', NULL, 3, 18, 61, '1996-07-10', NULL, 2, '2017-09-28 07:10:00', 2, '2017-09-28 07:13:07', '$2y$10$xeUFWbW2c9FQoXPzyapEZOqVb8N1zPEyx2wD1ydoQqB8hA.Hrj22K', NULL, NULL),
(145, '45006', 'นาย', 'พจน์', 'เยรัมย์', NULL, 3, 18, 61, '2002-04-23', NULL, 2, '2017-09-28 07:10:00', 2, '2017-09-28 07:13:07', '$2y$10$OPlEELyMDpXVZH299FvMl.TmzmX9dy9SrKB.q9xpz51RvJyeqEVdO', NULL, NULL),
(146, '46040', 'นาง', 'สายหยุด', 'ทองสำลีรัตน์', NULL, 3, 18, 61, '2003-11-01', NULL, 2, '2017-09-28 07:10:00', 2, '2017-09-28 07:13:08', '$2y$10$aGmgl/M5p5.2cHR2mODBGuaf2ga93tL1tHvow0g5ljISOif2lvfzS', NULL, NULL),
(147, '47027', 'นาย', 'ประกอบ', 'เพ็ชรจันทร์', NULL, 3, 18, 61, '2004-04-27', NULL, 2, '2017-09-28 07:10:01', 2, '2017-09-28 07:13:08', '$2y$10$KieyUlhyR5Qy14DHcS6WiOuhrK0NetaMOxOdW8fUo5Ohkoz21AsIO', NULL, NULL),
(148, '47034', 'นาง', 'ปทุมมาศ', 'ผึ้งเล็ก', NULL, 3, 18, 61, '2004-06-06', NULL, 2, '2017-09-28 07:10:01', 2, '2017-09-28 07:13:08', '$2y$10$0ON0Sgi.HY.QG4ETHLR0JOsrCMfWFD537p3KNYIOIlVHKWPLdOIy6', NULL, NULL),
(149, '50028', 'นางสาว', 'สัมฤทธิ์', 'แผลติตะ', NULL, 3, 18, 61, '2007-03-01', NULL, 2, '2017-09-28 07:10:01', 2, '2017-09-28 07:13:08', '$2y$10$XWWhiv29Sui2PY4fv8faXepiMekN1AjqLt4mAawT1VVo6l36qQWza', NULL, NULL),
(150, '50045', 'นาย', 'เอนก', 'สุวรรณจันรัสมี', NULL, 3, 18, 61, '2007-05-09', NULL, 2, '2017-09-28 07:10:01', 2, '2017-09-28 07:13:09', '$2y$10$utZeBWVbpn/uQn9Vxygco.iIHK5WG8RSG0.uytE2zpCnAWBkUpmPu', NULL, NULL),
(151, '50060', 'นาย', 'ประคลองคัด', 'สุขสถิตย์', NULL, 3, 18, 61, '2007-06-18', NULL, 2, '2017-09-28 07:10:02', 2, '2017-09-28 07:13:09', '$2y$10$2WaIv3AZ.Bvv7/wSaB3b5.dnufw2ZswYzvdAQ/1BJasfWDk/3UyQK', NULL, NULL),
(152, '50089', 'นาย', 'มานพ', 'บุญปลูก', NULL, 3, 18, 61, '2007-10-03', NULL, 2, '2017-09-28 07:10:02', 2, '2017-09-28 07:13:09', '$2y$10$LS4ARpAlKqfz/dbEo5YCTel7woZZ4qNcVl7uu/UaFlT4Qn4aGkBJi', NULL, NULL),
(153, '51036', 'นาย', 'มารวย', 'ภูมิโคกรักษ์', NULL, 3, 18, 61, '2008-08-16', NULL, 2, '2017-09-28 07:10:02', 2, '2017-09-28 07:13:10', '$2y$10$s09TDVeT/YopKTjl.WZBeenjwtbmxmZjwum5FEK2uMPBwMiZs.Tkm', NULL, NULL),
(154, '51046', 'นาง', 'สมหมาย', 'อ่อนชาลี', NULL, 3, 18, 61, '2008-09-10', NULL, 2, '2017-09-28 07:10:03', 2, '2017-09-28 07:13:10', '$2y$10$pcvu/Xtdykg77ppVsP1u3ep50DF8N8FGgMJO7E1Es9ojflVbCCQWe', NULL, NULL),
(155, '53052', 'นาย', 'ปวิช', 'สุโณวรรณ์', NULL, 3, 18, 61, '2010-10-11', NULL, 2, '2017-09-28 07:10:03', 2, '2017-09-28 07:13:10', '$2y$10$NjebKsw3EAGgQpHlzmSfi.lL8o691MjlBhprmRAijgzsEdvKm7GT6', NULL, NULL),
(156, '55019', 'นาย', 'ธีรเชษฐ์', 'พุ่มเจริญ', NULL, 3, 18, 61, '2012-02-14', NULL, 2, '2017-09-28 07:10:03', 2, '2017-09-28 07:13:11', '$2y$10$ZoimuAmr.HlFaIdJFN93OuWMGcoAlpCKrjvuCeVaIbZDcgpw0gHrO', NULL, NULL),
(157, '55021', 'นาง', 'พรพรรณ', 'เฉลิมพันธ์', NULL, 3, 18, 61, '2012-03-09', NULL, 2, '2017-09-28 07:10:04', 2, '2017-09-28 07:13:11', '$2y$10$2GaP9bwYnergDMfEuSw0.eQfom0Kr6CFxuVbOTV.0xPHMoRuVd.qa', NULL, NULL),
(158, '55028', 'นาย', 'วาที', 'มนตรี', NULL, 3, 18, 61, '2012-04-01', NULL, 2, '2017-09-28 07:10:04', 2, '2017-09-28 07:13:12', '$2y$10$/iuHSxaL/azh9smZll3eIuhTt.UFgxIBxbP.4tyduNQ5azU1uMaBK', NULL, NULL),
(159, '55034', 'นางสาว', 'กันยา', 'รุ่งเรือง', NULL, 3, 18, 61, '2012-05-04', NULL, 2, '2017-09-28 07:10:04', 2, '2017-09-28 07:13:12', '$2y$10$VGiQT2Zv8i10y4AXK/PXLePGNH39qVNrFbSRDbCN6MVfbuSSQJKbu', NULL, NULL),
(160, '55069', 'นาย', 'อภิเชฐ', 'รำพึง', NULL, 3, 18, 61, '2012-08-28', NULL, 2, '2017-09-28 07:10:05', 2, '2017-09-28 07:13:12', '$2y$10$P6F3Ni0gVQV6aFGM4XPZ3OfqfNaRmHkqHG0xVeo/GopdKat3ZSO.6', NULL, NULL),
(161, '55087', 'นาย', 'วรพจน์', 'แสวงดี', NULL, 3, 18, 61, '2012-09-24', NULL, 2, '2017-09-28 07:10:05', 2, '2017-09-28 07:13:12', '$2y$10$OKYZCRI9TNmKvyeco3iUWeud4xCXkEYIZeOVDyrIYSxcxVmx1HAda', NULL, NULL),
(162, '55088', 'นาย', 'ชำนาญ', 'แก้วทองคำ', NULL, 3, 18, 61, '2012-09-28', NULL, 2, '2017-09-28 07:10:05', 2, '2017-09-28 07:13:13', '$2y$10$dCa1Jr.WWrdPrTofx.d7T.NxWaFApTREiWcPuS95JRXitdIL1VQ3u', NULL, NULL),
(163, '55105', 'นาย', 'บุญเรือง', 'พงษ์เพชร', NULL, 3, 18, 61, '2012-11-26', NULL, 2, '2017-09-28 07:10:06', 2, '2017-09-28 07:13:13', '$2y$10$VhZOlS0XlnV6AbUtv0xHQuuggMu2zoPqci0l1UtC0kPniou4FEj2a', NULL, NULL),
(164, '55113', 'นาง', 'ภนาพร', 'โพธิ์จันทร์', NULL, 3, 18, 61, '2012-12-10', NULL, 2, '2017-09-28 07:10:06', 2, '2017-09-28 07:13:13', '$2y$10$30AU0pN82FS/kPwOHjMBMOWOT/C81sm6MZ/Lnd2tZlxIaEm1p8XaO', NULL, NULL),
(165, '56003', 'นาย', 'สมชาย', 'แสงทอง', NULL, 3, 18, 61, '2013-01-02', NULL, 2, '2017-09-28 07:10:06', 2, '2017-09-28 07:13:14', '$2y$10$h7WRsskyCxS6NoyIYIbsduKG5XMu8E19RtI09/bu0f3sPyaP6ed/m', NULL, NULL),
(166, '56016', 'นาย', 'บุญส่ง', 'แย้มแสง', NULL, 3, 18, 61, '2013-02-09', NULL, 2, '2017-09-28 07:10:06', 2, '2017-09-28 07:13:14', '$2y$10$WkcXrqMvrfha.XxPWvdCm.mcFOpsIE53lGU2xMSaECuqtI4yKVWES', NULL, NULL),
(167, '56067', 'นาย', 'จีรเดช', 'ไทยเฉลิมชาติ', NULL, 3, 18, 61, '2013-08-01', NULL, 2, '2017-09-28 07:10:07', 2, '2017-09-28 07:13:14', '$2y$10$lhpVHzOHiGFSEjivoD/vNOtG3syhP9ahupKbxjbXtlPVuOCqR34Yu', NULL, NULL),
(168, '56090', 'นาย', 'วันดี', 'ผึ้งเล็ก', NULL, 3, 18, 61, '2013-10-08', NULL, 2, '2017-09-28 07:10:07', 2, '2017-09-28 07:13:15', '$2y$10$2RqzgiBCOipTzqkpY1BEXO5sMMOpLqyKGqEhsStbfcpv92YYQ7KYi', NULL, NULL),
(169, '57041', 'นาย', 'สิทธิศักดิ์', 'คารศรี', NULL, 3, 18, 61, '2014-04-09', NULL, 2, '2017-09-28 07:10:07', 2, '2017-09-28 07:13:15', '$2y$10$g6fpjpduluiXDckBCIf.GOmwT.6WVgSPXlhmIkUWkcxIhSN.JgkjK', NULL, NULL),
(170, '57069', 'นาย', 'อาทิตย์', 'เกล็ดจีน', NULL, 3, 18, 61, '2014-06-01', NULL, 2, '2017-09-28 07:10:08', 2, '2017-09-28 07:13:15', '$2y$10$J6T1fhhdZK95e8K7NRbCTOnUJO3C6WDtXlZcFBftFiyK8rDR2EJZC', NULL, NULL),
(171, '57075', 'นาย', 'สุใฮนี', 'มุงอินทร์', NULL, 3, 18, 61, '2014-06-16', NULL, 2, '2017-09-28 07:10:08', 2, '2017-09-28 07:13:15', '$2y$10$Y80trevCR.Rh.UoTF3gg6OuxqkD/FqY7S/tUefd9E1KFtqak04EYi', NULL, NULL),
(172, '57078', 'นาย', 'ปรีชา', 'อยู่มั่น', NULL, 3, 18, 61, '2014-06-16', NULL, 2, '2017-09-28 07:10:08', 2, '2017-09-28 07:13:16', '$2y$10$VTvwTsWtf/hiANKl1fkGA.X/y73zhPwUN9lTdi9Lw9EF8tORk7n7.', NULL, NULL),
(173, '57111', 'นางสาว', 'สุรีย์ฉาย', 'ผึ้งเล็ก', NULL, 3, 18, 61, '2014-10-30', NULL, 2, '2017-09-28 07:10:08', 2, '2017-09-28 07:13:16', '$2y$10$e1ZILLgw4sfFx4OHy8fzZ.TZ8Y6xbw9i9v6.wO337Z5lbtLe6PhpG', NULL, NULL),
(174, '58014', 'นาย', 'สุวกรณ์', 'วิชัยวงค์', NULL, 3, 18, 61, '2015-02-13', NULL, 2, '2017-09-28 07:10:09', 2, '2017-09-28 07:13:16', '$2y$10$B8KixI3Bq2B/n9DbdY4.aupBQRU0ST7I4v9voWezOtkpuEnx2zJne', NULL, NULL),
(175, '58035', 'นางสาว', 'เอมมวรรณ', 'จันเลิศ', NULL, 3, 18, 61, '2015-04-04', NULL, 2, '2017-09-28 07:10:09', 2, '2017-09-28 07:13:17', '$2y$10$buCRWUH2Pv7hCHbdOoZZPeH.MoVeh1KDm8qv1BWtw6NHEUgmj/rm2', NULL, NULL),
(176, '58062', 'นางสาว', 'ยุภา', 'กาลเทพ', NULL, 3, 18, 61, '2015-05-14', NULL, 2, '2017-09-28 07:10:09', 2, '2017-09-28 07:13:17', '$2y$10$fLpToellls4tZW5kKsLOi.z3NcG1x7Bo2A8h8ffz5v/mTJn0wmAX2', NULL, NULL),
(177, '58120', 'นาย', 'วิชิต', 'เครือแก่นแก้ว', NULL, 3, 18, 61, '2015-12-01', NULL, 2, '2017-09-28 07:10:10', 2, '2017-09-28 07:13:17', '$2y$10$2V90qsl7dtBl9Fu1ulh/n.uKtnyXm0X4f/TJ5teRdteP1E7u/46Ci', NULL, NULL),
(178, '58133', 'นางสาว', 'สุวรรณา', 'เกลียวเจริญ', NULL, 3, 18, 61, '2015-12-23', NULL, 2, '2017-09-28 07:10:10', 2, '2017-09-28 07:13:18', '$2y$10$A.oHupEmRAhy2Zw1SixDUOmfOlpj9zFW2SxlObGLb6FygiCY8.nd2', NULL, NULL),
(179, '59015', 'นางสาว', 'สุนันทา', 'ปาละกวงศ์', NULL, 3, 18, 61, '2016-02-15', NULL, 2, '2017-09-28 07:10:10', 2, '2017-09-28 07:13:18', '$2y$10$jo2WtHB31djArd8Xrr49COBCFtAXov0e/T/HNUz9SpuiMTzXnttnG', NULL, NULL),
(180, '59016', 'นางสาว', 'ทองสุข', 'โพธิ์กลาง', NULL, 3, 18, 61, '2016-03-01', NULL, 2, '2017-09-28 07:10:10', 2, '2017-09-28 07:13:18', '$2y$10$V6cysZGuArSSi6fP7L21Ku7fknkxUmYy5SIYVzukHwJqN9S1oi1Gi', NULL, NULL),
(181, '59038', 'นาย', 'เสกสรร', 'เอื้อเฟื้อ', NULL, 3, 18, 61, '2016-05-14', NULL, 2, '2017-09-28 07:10:11', 2, '2017-09-28 07:13:18', '$2y$10$fSXTOF8h6vDyJ8ozetsK/u74e4Y2ZO3.nAjI.akEi3V7YzGI6H8J6', NULL, NULL),
(182, '59095', 'นาย', 'สมบัติ', 'ขุนศรี', NULL, 3, 18, 61, '2016-09-07', NULL, 2, '2017-09-28 07:10:11', 2, '2017-09-28 07:13:19', '$2y$10$zA27SKN9MAesJD7Kok00I.P7ffe6YeiRVtOWSbWufa79VrWn8kgDK', NULL, NULL),
(183, '60001', 'นาย', 'จักริน', 'คำพรม', NULL, 3, 18, 61, '2017-01-03', NULL, 2, '2017-09-28 07:10:11', 2, '2017-09-28 07:13:19', '$2y$10$y/wh9scq29nYZltpdKJVO.02RkqRrt4ESw.Dx83JbGq8iEVle0rYi', NULL, NULL),
(184, '60027', 'นาย', 'นิวัฒน์', 'อเนก', NULL, 3, 18, 61, '2017-04-01', NULL, 2, '2017-09-28 07:10:12', 2, '2017-09-28 07:13:19', '$2y$10$ranummEY0mWrzwYk/YwiR.NZTkNKztwfBc2owdJ0kBTLJlRXD2M9W', NULL, NULL),
(185, '60040', 'นาย', 'สุนทร', 'พรพฤฒิกานน', NULL, 3, 18, 61, '2017-05-22', NULL, 2, '2017-09-28 07:10:12', 2, '2017-09-28 07:13:20', '$2y$10$om0EEgATyw5AD32n1WVau.mfurSmz2eIrd6VnM6IC..kIofL/i3MK', NULL, NULL),
(186, '60044', 'นางสาว', 'กันยารัตน์', 'เทียนทอง', NULL, 3, 18, 61, '2017-06-01', NULL, 2, '2017-09-28 07:10:12', 2, '2017-09-28 07:13:20', '$2y$10$A6cv8BSvg.hYFItuL7FCDefEtsnBH761ne2Q2k3wfIZsqbXr1nsgS', NULL, NULL),
(187, '60047', 'นาย', 'ธงชัย', 'ใจเที่ยง', NULL, 3, 18, 61, '2017-06-07', NULL, 2, '2017-09-28 07:10:13', 2, '2017-09-28 07:13:20', '$2y$10$HeeNl/npN//J4ukM3SStS.NcuKnBedQ2LE1pcFfNmRAXRzuk47ZgG', NULL, NULL),
(188, '60048', 'นาย', 'นาม', 'เนตรลา', NULL, 3, 18, 61, '2017-06-09', NULL, 2, '2017-09-28 07:10:13', 2, '2017-09-28 07:13:20', '$2y$10$EfLa1DH/jHfUguOwhKvXruAN5f3rfQrE/o/TBixtItYkXQlTBM5ze', NULL, NULL),
(189, '60071', 'นาย', 'ศักรินทร', 'สมพรนิมิต', NULL, 3, 18, 61, '2017-07-11', NULL, 2, '2017-09-28 07:10:13', 2, '2017-09-28 07:13:21', '$2y$10$aalrnv0x/vemoFjg8SngAuGTR3.QFfLblajv/E5Oz3LWCNvCOQVt.', NULL, NULL),
(190, '60074', 'นาย', 'อาทร', 'ลบศรี', NULL, 3, 18, 61, '2017-07-12', NULL, 2, '2017-09-28 07:10:13', 2, '2017-09-28 07:13:21', '$2y$10$rQfQQSh8yzLbHguAF4y8jOgboozYg6JmcH445Jr1ojfIdLGbFdZue', NULL, NULL),
(191, '39002', 'นาย', 'เปรม', 'แจ้งทองหลาง', NULL, 3, 19, 61, '1996-02-06', NULL, 2, '2017-09-28 07:10:14', 2, '2017-09-28 07:13:21', '$2y$10$vB9oYZR.TOJKY9J9EUso1OvAJ6SPKgwrAPLKDdg/GGBQ8C9b34i0W', NULL, NULL),
(192, '39005', 'นาย', 'สมยศ', 'เจริญรัศมีเกียรติ', NULL, 3, 19, 61, '1996-03-02', NULL, 2, '2017-09-28 07:10:14', 2, '2017-09-28 07:13:22', '$2y$10$KWKlSoQe2SQZD5WNL8e0kelLBkNF532G.jcBdyVWy3gZAdBr2bH1O', NULL, NULL),
(193, '39012', 'นาย', 'สมบัติ', 'สุพรรณโรจน์', NULL, 3, 19, 61, '1996-08-16', NULL, 2, '2017-09-28 07:10:14', 2, '2017-09-28 07:13:22', '$2y$10$thXWw4ORp4SB0YLIQyefxe7iBgrp9rndIzhnd7LW0B4XschWIOTEK', NULL, NULL),
(194, '40013', 'นาย', 'สุชาติ', 'ผลงาม', NULL, 3, 19, 61, '1997-08-04', NULL, 2, '2017-09-28 07:10:14', 2, '2017-09-28 07:13:22', '$2y$10$lU2eK8y094YI9ddNjykPF.e/XcVIuRUMwPD/URI8dCeUFzckHa9lC', NULL, NULL),
(195, '40014', 'นาย', 'สายชน', 'บัวปั้น', NULL, 3, 19, 61, '1997-08-06', NULL, 2, '2017-09-28 07:10:15', 2, '2017-09-28 07:13:23', '$2y$10$5bICkP.kBg6z5OCQQ2dbv.UdQkUvIql4b8T7r6ZTNjhNJhGg8bY/u', NULL, NULL),
(196, '42002', 'นาย', 'แต้ม', 'ภูมิโคกรักษ์', NULL, 3, 19, 61, '1999-01-11', NULL, 2, '2017-09-28 07:10:15', 2, '2017-09-28 07:13:23', '$2y$10$eYvgY1HrS71qG4e4aJxKV.0kTuBNhPlYyR4XAzegIeedjPMbNhQ0m', NULL, NULL),
(197, '43012', 'นาย', 'สมเจต', 'ดาวัลย์', NULL, 3, 19, 61, '2000-06-24', NULL, 2, '2017-09-28 07:10:15', 2, '2017-09-28 07:13:23', '$2y$10$wR1o/AvokSyid0Mk3ddjYeHU9oGIoj3fGu4OOr4Gm78PO0zwjy0v2', NULL, NULL),
(198, '43022', 'นาย', 'ประสาท', 'ลาวัลย์', NULL, 3, 19, 61, '2000-11-08', NULL, 2, '2017-09-28 07:10:16', 2, '2017-09-28 07:13:24', '$2y$10$HFSXOgj0c.qUYta0.iiitO9IotqYz99ql1Tynef5R.J8pK87d.0D6', NULL, NULL),
(199, '43023', 'นาย', 'จรัญ', 'คล้ายนิ่ม', NULL, 3, 19, 61, '2000-12-06', NULL, 2, '2017-09-28 07:10:16', 2, '2017-09-28 07:13:24', '$2y$10$0qw7cAxp8CiiygQXwHdCWO2RuPpmcXHrlCGBiBcQmwLfqlu1QQ/Fu', NULL, NULL),
(200, '45003', 'นาย', 'ถวัลย์', 'สังข์ทอง', NULL, 3, 19, 61, '2002-04-04', NULL, 2, '2017-09-28 07:10:16', 2, '2017-09-28 07:13:24', '$2y$10$llcO6BfAnzaqot1ZM0Bi/eJf/23FPFXdrqGfqDkRp7heXGOJplp7i', NULL, NULL),
(201, '45016', 'นาย', 'ชาย', 'โสภา', NULL, 3, 19, 61, '2002-07-12', NULL, 2, '2017-09-28 07:10:17', 2, '2017-09-28 07:13:25', '$2y$10$ih6McmtuahhJiCfk2ruKEetO8doA2YB8vt1HALmJdxkeUrV86gS8S', NULL, NULL),
(202, '46045', 'นาย', 'นิพนธ์', 'ศรีสุข', NULL, 3, 19, 61, '2003-12-01', NULL, 2, '2017-09-28 07:10:17', 2, '2017-09-28 07:13:25', '$2y$10$ntiw8VB44T7lXPREwspkBOP/td7.ZJBC6dMua0RtUmoC1b6oO5cT6', NULL, NULL),
(203, '46046', 'นาย', 'ปเนต', 'เพิ่มโต', NULL, 3, 19, 61, '2003-12-11', NULL, 2, '2017-09-28 07:10:17', 2, '2017-09-28 07:13:25', '$2y$10$cX.HnCKHm2aFbUln7BplSuP.IpT6IDSK5DJbsxJZ58NIs64aRwBoS', NULL, NULL),
(204, '47084', 'นาย', 'ธวัชชัย', 'เทียนทอง', NULL, 3, 19, 61, '2004-12-28', NULL, 2, '2017-09-28 07:10:18', 2, '2017-09-28 07:13:26', '$2y$10$xAZX940E9gFcMl5YyOZaNOMgiVlwC3QEb.72y8izpnR8QbEPbCnFC', NULL, NULL),
(205, '48015', 'นาย', 'ทวีศักดิ์', 'เวฬุวะนาธร', NULL, 3, 19, 61, '2005-03-27', NULL, 2, '2017-09-28 07:10:18', 2, '2017-09-28 07:13:26', '$2y$10$/pircZyPNDenRSIw57T73OBSaEGY4gqhv68JzWnDQgIjZ1lLZ5/hm', NULL, NULL),
(206, '48040', 'นาย', 'วิรัตน์', 'ธนูทอง', NULL, 3, 19, 61, '2005-05-25', NULL, 2, '2017-09-28 07:10:18', 2, '2017-09-28 07:13:26', '$2y$10$BcgMQ3NJ/.g3Tzh7WNTylO12lKzeP8jLuoJaBPtO5HeKYXiO/1uia', NULL, NULL),
(207, '48089', 'นาย', 'ไพรศล', 'เอื้อเฟื้อ', NULL, 3, 19, 61, '2005-10-29', NULL, 2, '2017-09-28 07:10:19', 2, '2017-09-28 07:13:27', '$2y$10$coUM9MlI63WKiCYe4INH0Ox6MQJ7hIWjDrl9sNgPmOM/iWdSn2T0e', NULL, NULL),
(208, '48092', 'นาย', 'สมจิตร', 'พุกซื่อ', NULL, 3, 19, 61, '2005-11-20', NULL, 2, '2017-09-28 07:10:19', 2, '2017-09-28 07:13:27', '$2y$10$CdGzknzN6Rz12f1xsBL7kO8GBGt5RsZ9JawBlBuiaK.C8rV3CWAUW', NULL, NULL),
(209, '49005', 'นาย', 'ณชนันท์', 'พันธ์ประสิทธิกิจ', NULL, 3, 19, 61, '2006-02-01', NULL, 2, '2017-09-28 07:10:19', 2, '2017-09-28 07:13:27', '$2y$10$LhBiVVjdI6WtUAAKKOwQn.vOTpINNCPmvJc43s8O7qOQoCiYiAnOC', NULL, NULL),
(210, '50116', 'นาง', 'ลำใย', 'ชะลาสัย', NULL, 3, 19, 61, '2007-12-20', NULL, 2, '2017-09-28 07:10:19', 2, '2017-09-28 07:13:28', '$2y$10$FgF3vU6F9yOP6qIUcu3Th.PTPkCOUAP06SrAcImWLWMzG4z3UMriW', NULL, NULL),
(211, '52025', 'นาย', 'ชลอ', 'พุ่มเจริญ', NULL, 3, 19, 61, '2009-06-18', NULL, 2, '2017-09-28 07:10:20', 2, '2017-09-28 07:13:28', '$2y$10$pMiWpWFKZxP8S.Xjcjh2Q.pjSLfsKggirTG28sMPHbwN1MYzw.1F6', NULL, NULL),
(212, '53009', 'นาย', 'มนตรี', 'เหมือนพันธ์', NULL, 3, 19, 61, '2010-04-06', NULL, 2, '2017-09-28 07:10:20', 2, '2017-09-28 07:13:28', '$2y$10$fIbM2wmCWOSfcsFA6T.gvuGr9Fywk7HtX3BNMgEABZUmXEI1mx3F.', NULL, NULL),
(213, '53025', 'นาย', 'อุเทน', 'จันทกมล', NULL, 3, 19, 61, '2010-06-12', NULL, 2, '2017-09-28 07:10:20', 2, '2017-09-28 07:13:29', '$2y$10$GEASogdWHaGkijqfgqsoH.L8/qglbY0KezPPEC3ZdcVV1cu7Akq4u', NULL, NULL),
(214, '58016', 'นาย', 'มงคลรัตน์', 'ขำกรัด', NULL, 3, 19, 61, '2015-03-01', NULL, 2, '2017-09-28 07:10:21', 2, '2017-09-28 07:13:29', '$2y$10$693HSgrJ2o3zwqb7DJHaJ.SSZqzG9uOIJdj6b9XkDF.ga90A2zODu', NULL, NULL),
(215, '58091', 'นางสาว', 'นิตยา', 'แก้วนิยม', NULL, 3, 19, 61, '2015-08-07', NULL, 2, '2017-09-28 07:10:21', 2, '2017-09-28 07:13:29', '$2y$10$GLAT5HVnSWxjhV7atjrQbudKCSMPX1B10Pv/fUxrk6TuiuVd8hkV2', NULL, NULL),
(216, '58130', 'นาย', 'อนุรักษ์', 'บุญช่วย', NULL, 3, 19, 61, '2015-12-16', NULL, 2, '2017-09-28 07:10:21', 2, '2017-09-28 07:13:30', '$2y$10$BXWpV.7X0p3EtPXDpjiOluWwp4EOe6waXWvGQl9pyXlfCIRV.LzQC', NULL, NULL),
(217, '35001', 'นาย', 'เสวียน', 'เหมือนพันธ์', NULL, 3, 20, 61, '1992-03-21', NULL, 2, '2017-09-28 07:10:22', 2, '2017-09-28 07:13:30', '$2y$10$N4Drguju/wRaoVBEIhusTOMcy91js.ESm5UQMqbvZ.YLTFzBBQmNy', NULL, NULL),
(218, '48034', 'นาย', 'ประพันธ์', 'ใจเที่ยง', NULL, 3, 20, 61, '2005-05-08', NULL, 2, '2017-09-28 07:10:22', 2, '2017-09-28 07:13:30', '$2y$10$GAX0SpOwQNNzEMv6iCmiveNPOZOuOowy7GFh2oA4ACW1Swxcdzx96', NULL, NULL),
(219, '48066', 'นาง', 'จันทร์', 'สละบาป', NULL, 3, 20, 61, '2005-08-05', NULL, 2, '2017-09-28 07:10:22', 2, '2017-09-28 07:13:30', '$2y$10$4muRWJNABOQDWd8LHyBzuOAoXt4HujClik6fymK70/O8tVZ01YgGO', NULL, NULL),
(220, '50109', 'นาย', 'ทองคำ', 'คารศรี', NULL, 3, 20, 61, '2007-12-04', NULL, 2, '2017-09-28 07:10:22', 2, '2017-09-28 07:13:31', '$2y$10$uif2Z1PuSdWy0rwJ8TAJXeEFruY7A3qOKA7Ahk5FMUzQna/92Syx.', NULL, NULL),
(221, '52005', 'นาย', 'ไพโรจน์', 'ธนูทอง', NULL, 3, 20, 61, '2009-03-17', NULL, 2, '2017-09-28 07:10:23', 2, '2017-09-28 07:13:31', '$2y$10$V2uTHODTwWOfShZfdBqSdOmf.ROF9ViRIKEsU5VQvhuB6jnoWODf6', NULL, NULL),
(222, '57034', 'นาย', 'ประสาน', 'สละบาป', NULL, 3, 20, 61, '2014-04-17', NULL, 2, '2017-09-28 07:10:23', 2, '2017-09-28 07:13:31', '$2y$10$P2Z7kiAqeSIhy1OE4rxb/OeynvoJ86etb/Y7vn6C0QBppijkpxRXi', NULL, NULL),
(223, '58017', 'นาย', 'สรศักดิ์', 'แซมกระโทก', NULL, 3, 20, 61, '2015-03-01', NULL, 2, '2017-09-28 07:10:23', 2, '2017-09-28 07:13:32', '$2y$10$mL21YN44QSKeNyM7HHEGZOYe.3a3yMcI0dWuePc6115L2vbnNgBau', NULL, NULL),
(224, '40015', 'นาย', 'ศุภอรรถ', 'ชัยพงษ์', NULL, 6, 21, 62, '1997-08-11', NULL, 2, '2017-09-28 07:10:24', 2, '2017-09-28 07:13:32', '$2y$10$RTg/uT1..fYVz0khfNgvcOVhNvrpduGVT6CnbbTgXz08pdPwI/XUm', NULL, NULL),
(225, '45019', 'นาย', 'สงกรานต์', 'เสนารัตน์', NULL, 6, 21, 63, '2002-09-11', NULL, 2, '2017-09-28 07:10:24', 2, '2017-09-28 07:13:32', '$2y$10$7t0l6bHSNUMEakP7YqHlMOhRZi2KrDBWBv/rQ6k/IE4aQ/YdRJXq2', NULL, NULL),
(226, '47043', 'นาย', 'นรา', 'แก้วเก่า', NULL, 6, 21, 62, '2004-07-13', NULL, 2, '2017-09-28 07:10:24', 2, '2017-09-28 07:13:33', '$2y$10$e0GPHdNc5FuFqeuhfw27ru3jVp.Q9muA6KAbMPETKL1uNXR3vcnQu', NULL, NULL),
(227, '54033', 'นาย', 'ทวีศักดิ์', 'ลีละสมวงษ์', NULL, 6, 21, 64, '2011-03-01', NULL, 2, '2017-09-28 07:10:25', 2, '2017-09-28 07:13:33', '$2y$10$eNq0l/CMhEsDWqoRTcX3S.DGdQW1Flx0klVInUT3Zeusn/HL6JRC2', NULL, NULL),
(228, '57107', 'นางสาว', 'สิริอักษร', 'จำรูญ', NULL, 6, 21, 29, '2014-10-08', NULL, 2, '2017-09-28 07:10:25', 2, '2017-09-28 07:13:33', '$2y$10$gMe2OKpTG98eMzrcM5zD3OppglrkI.aEUSwGaBof4m258/THtqaU2', NULL, NULL),
(229, '58125', 'นางสาว', 'ดวงพร', 'สินธุ์เจริญ', NULL, 6, 21, 44, '2015-12-07', NULL, 2, '2017-09-28 07:10:25', 2, '2017-09-28 07:13:33', '$2y$10$EzQ5zN0M8JmdyNUZ.0B09.efojNsLCTetpdM/MXeq.qM/caaRkqX.', NULL, NULL),
(230, '59009', 'นางสาว', 'จุฑาทิพ', 'ตาดทอง', NULL, 6, 21, 29, '2016-01-22', NULL, 2, '2017-09-28 07:10:26', 2, '2017-09-28 07:13:34', '$2y$10$RYjFIlAxa3mROsxLjDXMVeBy9yLwD5.HULFfy3I5EMhnkHnDSt1Ky', NULL, NULL),
(231, '57104', 'นาย', 'กาญไพรสณฑ์', 'ทัศนะพงษ์', NULL, 6, 22, 65, '2014-10-01', NULL, 2, '2017-09-28 07:10:26', 2, '2017-09-28 07:13:34', '$2y$10$VJs0nVAHWfqgsBKOZhfhde.uQLpQB3fNFipQGmC.kv4kdf1HdNFli', NULL, NULL),
(232, '58069', 'นาย', 'สมบัติ', 'ผึ้งประสพ', NULL, 6, 22, 37, '2015-06-04', NULL, 2, '2017-09-28 07:10:27', 2, '2017-09-28 07:13:34', '$2y$10$zdrBHSi2NV5kkJvdJlD7dezgcZFtRshW.6zUSMHGeQSCYpEKfHA6u', NULL, NULL),
(233, '58079', 'นาย', 'สมชาย', 'น้อยวิไล', NULL, 6, 22, 66, '2015-07-14', NULL, 2, '2017-09-28 07:10:27', 2, '2017-09-28 07:13:35', '$2y$10$xAveUwnPxaNplhAqGDtutOSh02rd4JRmZHVN1nT8jw/amSUuavEEC', NULL, NULL),
(234, '59087', 'นาย', 'เพชรสยาม', 'ศรีทิน', NULL, 6, 22, 67, '2016-08-19', NULL, 2, '2017-09-28 07:10:27', 2, '2017-09-28 07:13:35', '$2y$10$C6R9O9ZLxk7FxYPQoNiywe/y8z8CJd1u0pdVQ/jlrhEQPoawVcEGW', NULL, NULL),
(235, '59104', 'นาย', 'ทรรศนะ', 'เกิดผล', NULL, 6, 22, 67, '2016-10-10', NULL, 2, '2017-09-28 07:10:27', 2, '2017-09-28 07:13:35', '$2y$10$EGJlsQKKJ0B0zOkrBPLnQORco1bviz2QzyutB3qBEL8yel3y3FZXG', NULL, NULL),
(236, '60024', 'นาย', 'สุริยา', 'ยุ้มจัตุรัส', NULL, 6, 22, 37, '2017-03-08', NULL, 2, '2017-09-28 07:10:28', 2, '2017-09-28 07:13:36', '$2y$10$gJ.ZMPA7N4PYQ3gdHj.if.Gw5gWQ/D9H4G9g/9yyN2MBezoQY3IaS', NULL, NULL),
(237, '45023', 'นาย', 'สุเทพ', 'นวลดี', NULL, 6, 23, 66, '2002-11-02', NULL, 2, '2017-09-28 07:10:28', 2, '2017-09-28 07:13:36', '$2y$10$wYgxOYfCAspGhIKdgByXruCIpdm.wN7eCprjevEDVeMCs8lzPp3ym', NULL, NULL);
INSERT INTO `ck_Staff` (`id`, `StaffCode`, `StaffPrefix`, `StaffFirstName`, `StaffLastName`, `StaffStatus`, `DivisionID`, `DepartmentID`, `PositionID`, `StartingDate`, `lastlogin_at`, `created_by`, `created_at`, `updated_by`, `updated_at`, `password`, `remember_token`, `deleted_at`) VALUES
(238, '47024', 'นาย', 'บุญโฮม', 'เสนาภักดิ์', NULL, 6, 23, 67, '2004-04-26', NULL, 2, '2017-09-28 07:10:28', 2, '2017-09-28 07:13:36', '$2y$10$4wM08wOi0kO2U92nrCL6Kut3ujrBk2DRGl7ubpRwdXfYM3UBXBPRi', NULL, NULL),
(239, '47080', 'นาย', 'ไพโรจน์', 'ผึกจันทร์', NULL, 6, 23, 66, '2004-12-20', NULL, 2, '2017-09-28 07:10:29', 2, '2017-09-28 07:13:37', '$2y$10$k6r04eN3K2PvrUmcXWJVmu2qAXlcNfSM7hWJbNkDiNc8bYoCfb7cq', NULL, NULL),
(240, '55010', 'นาย', 'เชิด', 'สูงพิมาย', NULL, 6, 23, 37, '2012-01-24', NULL, 2, '2017-09-28 07:10:29', 2, '2017-09-28 07:13:37', '$2y$10$9R08f/a4Fuxyf8sLU1/Rqupdivw0tYgzVsMOL0gfwP0HM9VO3sEyO', NULL, NULL),
(241, '58077', 'นาย', 'ภัทร์วัฒนชัย', 'ภูฆัง', NULL, 6, 23, 65, '2015-07-01', NULL, 2, '2017-09-28 07:10:29', 2, '2017-09-28 07:13:37', '$2y$10$CwL5DN1V0CUTTagp5L0PM.Hq3NHiepfUaTwwJUZCL6SilqfJVublu', NULL, NULL),
(242, '59102', 'นาย', 'คำแสน', 'ธรรมแสง', NULL, 6, 23, 37, '2016-10-05', NULL, 2, '2017-09-28 07:10:30', 2, '2017-09-28 07:13:38', '$2y$10$Dv95VUU8b.G/jJVFReQ8Xey2gU09cbj5l2QsAWpij.S0cfrK9/NfG', NULL, NULL),
(243, '43019', 'นาย', 'จรูญ', 'จันทร์ลาย', NULL, 6, 24, 66, '2000-09-01', NULL, 2, '2017-09-28 07:10:31', 2, '2017-09-28 07:13:38', '$2y$10$0rxz51vk8ZX2enXI1YVmf.kbawaZwhxY8TODEcO9.htpsyeOMtQD2', NULL, NULL),
(244, '45004', 'นาย', 'สุพจน์', 'โฉมสวรรค์', NULL, 6, 24, 66, '2002-04-18', NULL, 2, '2017-09-28 07:10:31', 2, '2017-09-28 07:13:38', '$2y$10$YUSCY4qPEGQpPRO22JCPTOfYPINFHGEtCz9z0O.sJcyJpm04OV7d.', NULL, NULL),
(245, '46044', 'นาย', 'สมชาย', 'ดิษฐสอน', NULL, 6, 24, 67, '2003-12-01', NULL, 2, '2017-09-28 07:10:31', 2, '2017-09-28 07:13:39', '$2y$10$XPLjf1QprfsxiBjZHUDjh.ZLLoqyHvJPZQNsXnRm32sRFLn66F/uS', NULL, NULL),
(246, '47020', 'นาย', 'สมชาติ', 'อบใข', NULL, 6, 24, 66, '2004-03-15', NULL, 2, '2017-09-28 07:10:31', 2, '2017-09-28 07:13:39', '$2y$10$/K3VEYuc1Nku3zdlta4pQOyWf8.YPBnwbB10moPpedTrrkBjkjoEi', NULL, NULL),
(247, '55036', 'นาย', 'ทูลทองใจ', 'สินธุกูต', NULL, 6, 24, 65, '2012-05-24', NULL, 2, '2017-09-28 07:10:32', 2, '2017-09-28 07:13:39', '$2y$10$4xpJ6u9Pl1MQaGRQVvVrruIpQpnJorzfQkRnWClzAV9S94adMJJza', NULL, NULL),
(248, '57070', 'นาย', 'ฉลองรัตน์', 'ขวัญซ้าย', NULL, 6, 24, 67, '2014-06-06', NULL, 2, '2017-09-28 07:10:32', 2, '2017-09-28 07:13:40', '$2y$10$iVhMZt4rCZhqmeDenNVeK.znDILVr/viHHDWDLWayqg7GzYpCWoyK', NULL, NULL),
(249, '58044', 'นาย', 'นิธิศ', 'สุทธิปิยภัทร', NULL, 6, 24, 37, '2015-05-04', NULL, 2, '2017-09-28 07:10:32', 2, '2017-09-28 07:13:40', '$2y$10$8ititiQwBTkkGCVE0eEgG.uX7i/WJlox/3k.IneSqLoJuzDfBDUIW', NULL, NULL),
(250, '58071', 'นาย', 'ไพวรรณ', 'เสนาชัย', NULL, 6, 24, 37, '2015-06-28', NULL, 2, '2017-09-28 07:10:33', 2, '2017-09-28 07:13:40', '$2y$10$586x9LPNkxR.jNAaTL5UIObo85mmE/PTtGEKmOo2/7ofmZTOiliAW', NULL, NULL),
(251, '59005', 'นาย', 'พนมพร', 'ขำใจ', NULL, 6, 24, 66, '2016-01-06', NULL, 2, '2017-09-28 07:10:33', 2, '2017-09-28 07:13:40', '$2y$10$jqs3pEtqYwTjJ9BYbirQ5ugO4jezsK9NXTR6qzPOaL9jldp4BEzjy', NULL, NULL),
(252, '59036', 'นาย', 'สุนทรชัย', 'วงศ์สุวรรณ์', NULL, 6, 24, 65, '2016-05-09', NULL, 2, '2017-09-28 07:10:33', 2, '2017-09-28 07:13:41', '$2y$10$bqwvFnyC7VxxfqxcsW4yQ.5lLbALKoBxLKd7rPKb4guikLNIrcckK', NULL, NULL),
(253, '59110', 'นาย', 'ธีระวัฒน์', 'ไชยา', NULL, 6, 24, 67, '2016-11-18', NULL, 2, '2017-09-28 07:10:33', 2, '2017-09-28 07:13:41', '$2y$10$Zs/q60PrIlS7Q5Jtkf2Mo...Zr73P7GmwzYIVMQDo8ifS3Ttutnvy', NULL, NULL),
(254, '59117', 'นาย', 'ศักดิ์สิทธิ์', 'หลินภู', NULL, 6, 24, 67, '2016-12-21', NULL, 2, '2017-09-28 07:10:34', 2, '2017-09-28 07:13:41', '$2y$10$RpwD4kHF25HzfrwdGtGdzu.cLgXUe62TCk.bXWgNjtCcsrXXj340m', NULL, NULL),
(255, '60005', 'นาย', 'วิชาญ', 'จันทรปรุง', NULL, 6, 24, 66, '2017-01-16', NULL, 2, '2017-09-28 07:10:34', 2, '2017-09-28 07:13:42', '$2y$10$I/4vlHORg7YL5EE0hBFe1u2G5e9Ys3pUY4TZZOr1eMKbOgr.AMI6u', NULL, NULL),
(256, '60007', 'นาย', 'สุระศักดิ์', 'จันทร์กล้า', NULL, 6, 24, 67, '2017-01-16', NULL, 2, '2017-09-28 07:10:34', 2, '2017-09-28 07:13:42', '$2y$10$uudCFMleKsei.WM7gFNcte.IagyntGz2APgS26h.YlZmWg2oWaDhO', NULL, NULL),
(257, '60039', 'นาย', 'วัจนรินทร์', 'จันทร์แดง', NULL, 6, 24, 67, '2017-05-22', NULL, 2, '2017-09-28 07:10:35', 2, '2017-09-28 07:13:43', '$2y$10$szif/9EOiSTMVB0T8hArJuZ6IZ.4wQ1zQYv7UIR16cI5RrY.VzJXa', NULL, NULL),
(258, '60042', 'นาย', 'สราวุธ', 'วันดี', NULL, 6, 24, 37, '2017-05-24', NULL, 2, '2017-09-28 07:10:35', 2, '2017-09-28 07:13:43', '$2y$10$QVEEy707UzTgblGvdXD.0.aUXywyp2XlCR0sOFc6iDGM4iT1m.Xde', NULL, NULL),
(259, '60055', 'นาย', 'ปรีดา', 'กาแก้ว', NULL, 6, 24, 37, '2017-06-19', NULL, 2, '2017-09-28 07:10:35', 2, '2017-09-28 07:13:44', '$2y$10$0SmXoyaQxyjx31FQtm.ErO9AuEsYDhGJMRR0vQYhytCmba4DIPn3O', NULL, NULL),
(260, '60060', 'นาย', 'ทัศนัย', 'หลิมตระกูล', NULL, 6, 24, 67, '2017-07-03', NULL, 2, '2017-09-28 07:10:36', 2, '2017-09-28 07:13:44', '$2y$10$EDm9.qgtEEmMIXNNCjNBiOnIFHtzi3qtJEDGc5lG1SzDSkrVLlFKe', NULL, NULL),
(261, '60083', 'นาย', 'ภูษิต', 'กาลมุล', NULL, 6, 24, 67, '2017-08-14', NULL, 2, '2017-09-28 07:10:36', 2, '2017-09-28 07:13:44', '$2y$10$EGnnpMK3phyFJTSas8JlSOTa0cNd54lmO0KOCGNjuB36DpsMuaPPK', NULL, NULL),
(262, '42003', 'นาย', 'ภิรมณ์', 'แพจันทร์', NULL, 6, 25, 68, '1999-02-01', NULL, 2, '2017-09-28 07:10:36', 2, '2017-09-28 07:13:44', '$2y$10$.KhjVspourVBBww834JNtOhGu7idQg6KGpcvBHgIu62mWOBPGo4w.', NULL, NULL),
(263, '42011', 'นาย', 'ไพบูรณ์', 'เจริญดี', NULL, 6, 25, 37, '1999-07-10', NULL, 2, '2017-09-28 07:10:37', 2, '2017-09-28 07:13:45', '$2y$10$tcvuEnq8nzq74usdY5u6zOTwr7uE9xqPpQdZGXNVZJobk/qlrkKXq', NULL, NULL),
(264, '46023', 'นาย', 'สุรศักดิ์', 'หาญสู้', NULL, 6, 25, 66, '2003-06-06', NULL, 2, '2017-09-28 07:10:37', 2, '2017-09-28 07:13:45', '$2y$10$Z8MVIMY7LsUvTfEt2dnVq.H1JrYl6/RIypqhZbRDrNaGIu/CWTZHe', NULL, NULL),
(265, '48029', 'นาย', 'วิษณุ', 'โถทอง', NULL, 6, 25, 67, '2005-04-22', NULL, 2, '2017-09-28 07:10:37', 2, '2017-09-28 07:13:46', '$2y$10$WOS1nLBl7OE3NnbhLcp8peTSCJiLP.39z6JOW..j3QMVuZkP1Ett6', NULL, NULL),
(266, '55101', 'นาย', 'ทรงเทพ', 'องอาจ', NULL, 6, 25, 66, '2012-11-15', NULL, 2, '2017-09-28 07:10:37', 2, '2017-09-28 07:13:46', '$2y$10$N/beolz3o/3ZR2SOEFdwWuSmvReZBqAPvugPDcqH383YwWk1EEQhe', NULL, NULL),
(267, '58118', 'นาย', 'ประเสริฐศรี', 'จันทร์กล้า', NULL, 6, 25, 66, '2015-11-02', NULL, 2, '2017-09-28 07:10:38', 2, '2017-09-28 07:13:46', '$2y$10$WfQ5XP6s7DExfsx7HCZB4e7.LJ9EpGk8ZJWsgHp19GUJIB2JdoNSy', NULL, NULL),
(268, '58126', 'นาย', 'สวัสดิ์', 'จันทร์ใส', NULL, 6, 25, 67, '2015-12-14', NULL, 2, '2017-09-28 07:10:38', 2, '2017-09-28 07:13:47', '$2y$10$lewONWk2RIcBS/L1VCkeJOPDimC88vF4z.S41EBYi9kS1JHI3xEMe', NULL, NULL),
(269, '59006', 'นาย', 'กิตติ', 'ทับทิม', NULL, 6, 25, 65, '2016-01-11', NULL, 2, '2017-09-28 07:10:38', 2, '2017-09-28 07:13:47', '$2y$10$JgqCQ/V4X3PUXgdE4zxp0OEKJzrS.AgdcHMbEGGTPfWoVtD0SVjE2', NULL, NULL),
(270, '59018', 'นาย', 'อาราม', 'อุดทา', NULL, 6, 25, 66, '2016-03-04', NULL, 2, '2017-09-28 07:10:39', 2, '2017-09-28 07:13:47', '$2y$10$IFmjDXtkVPiRWRrk1uuI/.Un5XnIMViUAQB3wPrv/QG6TKBZFi3Um', NULL, NULL),
(271, '59030', 'นาย', 'กิตติพงษ์', 'สุราศรี', NULL, 6, 25, 67, '2016-05-02', NULL, 2, '2017-09-28 07:10:39', 2, '2017-09-28 07:13:47', '$2y$10$kDD7onbUlC1/Kaoa6t16nOCiEZ/ynb9SQWajjcbE5aoYtoawc6aQm', NULL, NULL),
(272, '59059', 'นาย', 'อุทิศ', 'ยังเกิดผล', NULL, 6, 25, 66, '2016-06-17', NULL, 2, '2017-09-28 07:10:39', 2, '2017-09-28 07:13:48', '$2y$10$S3HgY3YVw4m2Dchp47KXIutlEskry8cmUqrR/CPOkamSerISyNFFu', NULL, NULL),
(273, '59064', 'นาย', 'สุชาติ', 'น้อยวิไล', NULL, 6, 25, 37, '2016-06-20', NULL, 2, '2017-09-28 07:10:40', 2, '2017-09-28 07:13:48', '$2y$10$o6LigDmBL.KwZaBrr50jmebuE1BZM4Gdre9tGSy8wCqdf29W3J.ua', NULL, NULL),
(274, '59111', 'นาย', 'มานพ', 'ไชยศรีโห', NULL, 6, 25, 69, '2016-11-21', NULL, 2, '2017-09-28 07:10:40', 2, '2017-09-28 07:13:48', '$2y$10$1dCb1JHIc91HjOB24bBbNuIxG4Rsd2KBWO//NV1Xm1FEiD1DzbtsS', NULL, NULL),
(275, '60013', 'นาย', 'วีรชัย', 'เรืองไกรศิลป์', NULL, 6, 25, 67, '2017-02-13', NULL, 2, '2017-09-28 07:10:40', 2, '2017-09-28 07:13:49', '$2y$10$loeeEjuOgpH.lwzbMhYlkepC54BWYul567/YceCNf3/X0TNOpBV0W', NULL, NULL),
(276, '60061', 'นาย', 'สุนิจถา', 'เทียมรันต์', NULL, 6, 25, 37, '2017-07-03', NULL, 2, '2017-09-28 07:10:40', 2, '2017-09-28 07:13:49', '$2y$10$GXTvZchRzltz6mnGTUl67eYZ7098G5gXWGlEpfjZm1e/R3hj/9/Ia', NULL, NULL),
(277, '37002', 'นาย', 'สำราญ', 'พิรักษา', NULL, 6, 26, 37, '1994-03-01', NULL, 2, '2017-09-28 07:10:41', 2, '2017-09-28 07:13:49', '$2y$10$4ACsA.7nyp.1TJstPyRTauGLZwLMdOvdSnwoEueST.ZV2D//jOM9K', NULL, NULL),
(278, '40004', 'นาย', 'ไพบูลย์', 'สมบูรณ์', NULL, 6, 26, 69, '1997-05-16', NULL, 2, '2017-09-28 07:10:41', 2, '2017-09-28 07:13:50', '$2y$10$egWUHqoYlR2hWUqGhE1FTOWmseIwk0CAo3dPEqpns/Yw5QgREWF2G', NULL, NULL),
(279, '45021', 'นาย', 'สายันต์', 'เยาวรา', NULL, 6, 26, 66, '2002-10-08', NULL, 2, '2017-09-28 07:10:41', 2, '2017-09-28 07:13:50', '$2y$10$zEigM7Vm6vaiU7dR1tdIxeiV8lJcVr6X98UI6X7sddG1atWeUdby2', NULL, NULL),
(280, '45022', 'นาย', 'สุเทพ', 'ไชยา', NULL, 6, 26, 67, '2002-11-02', NULL, 2, '2017-09-28 07:10:41', 2, '2017-09-28 07:13:50', '$2y$10$yylz5oB7/tGgNELjYYaFJOUOeFfBLnxNbH2UjsgTJpo7RuopaXPiC', NULL, NULL),
(281, '46017', 'นาย', 'วนิชศิลป์', 'มุขสาร', NULL, 6, 26, 68, '2003-05-07', NULL, 2, '2017-09-28 07:10:42', 2, '2017-09-28 07:13:51', '$2y$10$qoFA9E5ablfR228sLZ8toeAA3lqRV682xzRaMotYvh08bRXx9eqNe', NULL, NULL),
(282, '47007', 'นาย', 'ศักดิ์ชัย', 'ตะลุดตะกำ', NULL, 6, 26, 66, '2004-01-05', NULL, 2, '2017-09-28 07:10:42', 2, '2017-09-28 07:13:51', '$2y$10$yqy5Giyjx6pkb2goPEsSAu4tp/cPDncy2A97wMNoaszKDNGWsFmM2', NULL, NULL),
(283, '47026', 'นาย', 'ประมวล', 'มั่งสมบูรณ์', NULL, 6, 26, 67, '2004-04-26', NULL, 2, '2017-09-28 07:10:43', 2, '2017-09-28 07:13:51', '$2y$10$loZJanL4.lRNhyJBLcN2CerCqN/o0hwNOSiIQNelVuOxOpEui4bWS', NULL, NULL),
(284, '53039', 'นาย', 'ประสิทธิ์', 'ผสมสี', NULL, 6, 26, 67, '2010-08-14', NULL, 2, '2017-09-28 07:10:43', 2, '2017-09-28 07:13:51', '$2y$10$RtAgPWosewQwxXFVEleEWu9gtUuw7uX0mwGQFR7ykXzOSnsAEWrVK', NULL, NULL),
(285, '54005', 'นาย', 'ประยูร', 'พิรักษา', NULL, 6, 26, 37, '2011-01-12', NULL, 2, '2017-09-28 07:10:43', 2, '2017-09-28 07:13:52', '$2y$10$yD2kTJXvHvbr/nEwElA8SO/JldWLVAMPAi42svJdVf6jk8NSEYwLK', NULL, NULL),
(286, '54068', 'นาย', 'อำนาจ', 'ชัยสุมัง', NULL, 6, 26, 66, '2011-05-18', NULL, 2, '2017-09-28 07:10:44', 2, '2017-09-28 07:13:52', '$2y$10$RiqvATfeyYBErAiWOaKsW.X3kRwUQEfKVae0EJnA1a.F7PjDyYU6y', NULL, NULL),
(287, '55076', 'นาย', 'สุวิทย์', 'พิรักษา', NULL, 6, 26, 37, '2012-09-06', NULL, 2, '2017-09-28 07:10:44', 2, '2017-09-28 07:13:52', '$2y$10$bZJFymlB3iP9tlNRM0GaVOkAVaGuRXBILvSuRDLVI0vTLyz5oQcWa', NULL, NULL),
(288, '55077', 'นาย', 'สวาท', 'วิเศษนอก', NULL, 6, 26, 37, '2012-09-06', NULL, 2, '2017-09-28 07:10:44', 2, '2017-09-28 07:13:53', '$2y$10$gTmA/XJZirxixSBeHIT48ucC2rCxmd.0VX02wsa9HMrBkihvBlw5u', NULL, NULL),
(289, '55093', 'นาย', 'นัฐภูมิ', 'น้อยวิไล', NULL, 6, 26, 66, '2012-10-05', NULL, 2, '2017-09-28 07:10:45', 2, '2017-09-28 07:13:53', '$2y$10$VtCl5qTxRjZhvzflmAu5ZOdPkRJW9FU.SpMyYKHkPwNCeAfA8baey', NULL, NULL),
(290, '57063', 'นาย', 'สมลักษณ์', 'นุตะรัก', NULL, 6, 26, 66, '2014-05-28', NULL, 2, '2017-09-28 07:10:45', 2, '2017-09-28 07:13:53', '$2y$10$xheVfpCVoh5Scq.LANZc3O54iAJLpl8V1y6qe5/knOyUOWMBYzDMy', NULL, NULL),
(291, '57126', 'นาย', 'วิชิต', 'เหลารื่น', NULL, 6, 26, 67, '2014-11-25', NULL, 2, '2017-09-28 07:10:46', 2, '2017-09-28 07:13:53', '$2y$10$pzSRFPg7DHqqJwgyMhBs5.hrY36MPUrUGONhHugAKrhW/9TVyB0ny', NULL, NULL),
(292, '59027', 'นาย', 'สมชาย', 'นุตะระ', NULL, 6, 26, 66, '2016-04-04', NULL, 2, '2017-09-28 07:10:46', 2, '2017-09-28 07:13:54', '$2y$10$uA124npIJelKtMVtEF/HWO01bmVPfk5r0T3j8cOtHUvTjyZlZsg/C', NULL, NULL),
(293, '59116', 'นาย', 'วิศรุต', 'จูมสุพรรณ', NULL, 6, 26, 65, '2016-12-19', NULL, 2, '2017-09-28 07:10:46', 2, '2017-09-28 07:13:54', '$2y$10$Z7.K9R9SwwVMNosFktt.4O7YWon3Kgu12x.UJWtHsftaYfdHT6ZMi', NULL, NULL),
(294, '60006', 'นาย', 'วัจน์กร', 'ตะลุดตะกำ', NULL, 6, 26, 67, '2017-01-16', NULL, 2, '2017-09-28 07:10:47', 2, '2017-09-28 07:13:54', '$2y$10$vCVPK9ZVvOCzj6oczdWapeN3iRI3oqKNz4PYM55mcdwmeFLKrqmVS', NULL, NULL),
(295, '60067', 'นาย', 'ปรีชา', 'เผยกลิ่น', NULL, 6, 26, 66, '2017-07-05', NULL, 2, '2017-09-28 07:10:47', 2, '2017-09-28 07:13:55', '$2y$10$ZlaGh6qnxmhIgcnTy3K9muHfaUBIf97uqfpnhxeFlXOhVak3hk/QK', NULL, NULL),
(296, '42014', 'นาย', 'ประสาร', 'มนตรี', NULL, 6, 27, 67, '1999-09-01', NULL, 2, '2017-09-28 07:10:47', 2, '2017-09-28 07:13:55', '$2y$10$3TFmzEG/ASe0iYY40DdWheFhSDKUmYtj7903WVXeIh1Ux70gpHIlW', NULL, NULL),
(297, '49047', 'นาย', 'สุธรรม', 'คงพานิชย์', NULL, 6, 27, 68, '2006-09-01', NULL, 2, '2017-09-28 07:10:48', 2, '2017-09-28 07:13:55', '$2y$10$cJgfd1g852DEJKQGlHprXuScY8CXP4/LDtL6FBUxGDU8/SJCncCj6', NULL, NULL),
(298, '52037', 'นาย', 'ณรงค์กร', 'ชูบางบ่อ', NULL, 6, 27, 66, '2009-09-01', NULL, 2, '2017-09-28 07:10:48', 2, '2017-09-28 07:13:55', '$2y$10$NXOTw9w2sauSpjngjCRbkeEQTFnVabwODKGWX50S.1TYctaWxGg5u', NULL, NULL),
(299, '57082', 'นาย', 'สุชาติ', 'เนียมเกิด', NULL, 6, 27, 67, '2014-07-10', NULL, 2, '2017-09-28 07:10:48', 2, '2017-09-28 07:13:56', '$2y$10$lNFZLmLTF9TCxwN2e5u8C.jGvYn/Ql1jDEGLaSAG83RYU.lPkvQ3u', NULL, NULL),
(300, '59047', 'นาย', 'ชนะ', 'แสงสว่าง', NULL, 6, 27, 67, '2016-05-25', NULL, 2, '2017-09-28 07:10:48', 2, '2017-09-28 07:13:56', '$2y$10$E388PShZCExPuU464xYBvOfwfxT./Km8aptuodoehX5DK9jf61Fkq', NULL, NULL),
(301, '59058', 'นาย', 'บรรลุ', 'คณะสา', NULL, 6, 27, 67, '2016-06-17', NULL, 2, '2017-09-28 07:10:49', 2, '2017-09-28 07:13:56', '$2y$10$sKCAkRz1pNegT3MDZpBHU.t07crixTcGZK5lhp4OwCSSt1xl4u1yu', NULL, NULL),
(302, '59060', 'นาย', 'เทิดพงษ์', 'หลิมตระกูล', NULL, 6, 27, 66, '2016-06-17', NULL, 2, '2017-09-28 07:10:49', 2, '2017-09-28 07:13:57', '$2y$10$hpFhJlEf65kWJkp9oYKQWelNUQ7OxjuifJ9fwJZkXWkZpIi812jwi', NULL, NULL),
(303, '59061', 'นาย', 'อดุลย์', 'ศรีรักษา', NULL, 6, 27, 66, '2016-06-17', NULL, 2, '2017-09-28 07:10:49', 2, '2017-09-28 07:13:57', '$2y$10$ZDkkDbmcpTQCXSmtFpHYDukS8pANNQrgd/k70s4HewLnjmg2serQW', NULL, NULL),
(304, '59100', 'นาย', 'อุดร', 'ทองรอด', NULL, 6, 27, 66, '2016-10-01', NULL, 2, '2017-09-28 07:10:50', 2, '2017-09-28 07:13:58', '$2y$10$DTDrFS3AyPSpFG/GfRoyIuZFsa.7ZG2cjZ91UmuNxVmwxaS.Elcoq', NULL, NULL),
(305, '60017', 'นาย', 'พงษ์ศักดิ์', 'อินทนู', NULL, 6, 27, 67, '2017-03-01', NULL, 2, '2017-09-28 07:10:50', 2, '2017-09-28 07:13:58', '$2y$10$nSd8Rt13iP9tECTmi0lW0.6y/z9lUOKPHxIuBtT91JSmiW/TSYfa6', NULL, NULL),
(306, '60080', 'นาย', 'จิรภัทร', 'ร่วมโพธิ์รี', NULL, 6, 27, 69, '2017-08-14', NULL, 2, '2017-09-28 07:10:50', 2, '2017-09-28 07:13:58', '$2y$10$xfW0.sbCViqp6Mm/v0GafuZOgpntzyEKkh/7zEkYCT39KN2CCh4GW', NULL, NULL),
(307, '60082', 'นาย', 'วีระชัย', 'วิเศษนอก', NULL, 6, 27, 37, '2017-08-14', NULL, 2, '2017-09-28 07:10:50', 2, '2017-09-28 07:13:59', '$2y$10$Dys0OFLGhydhTYKjvLvscuv.Xt2hiApz9GFeOaaEsl8CC4bqqgCeC', NULL, NULL),
(308, 'A35001', 'นาย', 'สุทัศน์', 'เสนารัตน์', NULL, 5, 28, 64, '1992-01-04', NULL, 2, '2017-09-28 07:10:51', 2, '2017-09-28 07:13:59', '$2y$10$pIf0bpyzL9sS5IlijXxl4.gApS35x5h5bQPGHO783qjqnUwTgyaaG', NULL, NULL),
(309, 'A55009', 'นาย', 'จรัญ', 'ภิญเดช', NULL, 5, 28, 70, '2012-09-03', NULL, 2, '2017-09-28 07:10:51', 2, '2017-09-28 07:13:59', '$2y$10$8YQu3Sj42nUhQXgHdZjncOtDbc4joh.gZyXW9fcCvMzPkeL0ydh5a', NULL, NULL),
(310, 'A58009', 'นางสาว', 'กรทิพย์', 'วนะสิทธิ์', NULL, 5, 28, 71, '2015-07-06', NULL, 2, '2017-09-28 07:10:51', 2, '2017-09-28 07:14:00', '$2y$10$VkvzRbBN5Qm/pg.wmRdjQ.TSM60AqCu4jVztycpAzbwhsqwqUnzEe', NULL, NULL),
(311, 'A60008', 'นางสาว', 'กิตติมา', 'สิริสุขะ', NULL, 5, 28, 44, '2017-05-22', NULL, 2, '2017-09-28 07:10:52', 2, '2017-09-28 07:14:00', '$2y$10$jPl1jwPl5BT6WFGQzpkEvudrPtt2VJR/ubk7J3uHyPAgRJbT0IJBu', NULL, NULL),
(312, 'A46004', 'นาง', 'จันทรทนา', 'เสนารัตน์', NULL, 5, 29, 30, '2003-12-01', NULL, 2, '2017-09-28 07:10:52', 2, '2017-09-28 07:14:01', '$2y$10$3gUWybBABoQFO1CezMqKmuSXutVFE9JClOxvCToKwQfL3IBTFzmCy', NULL, NULL),
(313, 'A50029', 'นาย', 'วิระ', 'เสมอภาค', NULL, 5, 29, 25, '2007-09-17', NULL, 2, '2017-09-28 07:10:52', 2, '2017-09-28 07:14:01', '$2y$10$XDjayVYCeNN8.lKNVY8EYOMq38WFjEuSitZF8lAMwBbL88pDPNL1u', NULL, NULL),
(314, 'A56011', 'นาย', 'นพดล', 'วานิช', NULL, 5, 29, 16, '2013-12-23', NULL, 2, '2017-09-28 07:10:53', 2, '2017-09-28 07:14:02', '$2y$10$lGE7IPsjM1SRKS1jgevaZeFW3my7tAYt8cD7uFmFEeFI7Ow1DbLja', NULL, NULL),
(315, 'A57019', 'นาย', 'กิตติพัฒน์', 'ขจรวงษ์', NULL, 5, 29, 17, '2014-06-16', NULL, 2, '2017-09-28 07:10:53', 2, '2017-09-28 07:14:02', '$2y$10$81fFFINTK5oziDiUhr77nO0WK7dBFHVsjwruUhrSVoDUJyXX66qfG', NULL, NULL),
(316, '55084', 'นาย', 'สุวัฒน์', 'เสนารัตน์', NULL, 5, 30, 33, '2012-09-05', NULL, 2, '2017-09-28 07:10:53', 2, '2017-09-28 07:14:03', '$2y$10$y5zC.VjuJUx5bramKGTY/uMpum5wazTIKE6kjJpj3dDDDaMgdbINi', NULL, NULL),
(317, 'A50001', 'นาย', 'ประจักษ์', 'สุวรรณ์', NULL, 5, 30, 36, '2007-01-31', NULL, 2, '2017-09-28 07:10:53', 2, '2017-09-28 07:14:03', '$2y$10$X9qmwjn2sqNQ/bhbOVZStuXSVoXDKpKZO27dTX6ctEUQFpHiyuqhe', NULL, NULL),
(318, 'A50019', 'นาย', 'บรรหยัด', 'ธรรมใจ', NULL, 5, 30, 33, '2007-07-14', NULL, 2, '2017-09-28 07:10:54', 2, '2017-09-28 07:14:03', '$2y$10$pu.3aXe.5iudhmjHSNc/jummWqcHXesDpMhPz3GB1NdjqqG0eF6rS', NULL, NULL),
(319, 'A55011', 'นาย', 'สุรศักดิ์', 'ผาพิมูล', NULL, 5, 30, 33, '2012-09-03', NULL, 2, '2017-09-28 07:10:54', 2, '2017-09-28 07:14:04', '$2y$10$FeC6tfz9rKmTYbXiezad6ehH4Ag8XYXwZlacAcReocEN/elu7J1Yu', NULL, NULL),
(320, 'A57017', 'นาย', 'อดิศร', 'บุญไทย', NULL, 5, 30, 33, '2014-05-26', NULL, 2, '2017-09-28 07:10:54', 2, '2017-09-28 07:14:04', '$2y$10$6Q7s68fIiutlT4Sw.1QQtepBXTsW8ZLxrUIFZVgeRb.ZT/RCU1Wqq', NULL, NULL),
(321, 'A57020', 'นาย', 'สมเกียรติ', 'ส่างสาร', NULL, 5, 30, 34, '2014-06-25', NULL, 2, '2017-09-28 07:10:55', 2, '2017-09-28 07:14:04', '$2y$10$FZbGkMfjwyF3wBTeD/ZRKOCQVVZlLgbUeLouvBanp//PvFBo9pJ4S', NULL, NULL),
(322, 'A57024', 'นาย', 'ไกร', 'เลาหวิวัฒน์', NULL, 5, 30, 33, '2014-07-21', NULL, 2, '2017-09-28 07:10:55', 2, '2017-09-28 07:14:05', '$2y$10$GHSwx9e3Q3Hv1x0TSAM8bexLl/GWjummybHoRiPCAwuYBegMqhaDy', NULL, NULL),
(323, 'A59007', 'นาย', 'ทศพล', 'ทองพานิช', NULL, 5, 30, 37, '2016-06-01', NULL, 2, '2017-09-28 07:10:55', 2, '2017-09-28 07:14:05', '$2y$10$N4CSMhg3FQgzxh4yqwpw4uLl2Tv1zicpWo7TmAuUKPhqaHPUupCaO', NULL, NULL),
(324, 'A60002', 'นาย', 'เอกภพ', 'วงศ์พิมล', NULL, 5, 30, 37, '2017-01-16', NULL, 2, '2017-09-28 07:10:56', 2, '2017-09-28 07:14:05', '$2y$10$rzYiNJW7qxyO7YqEiRw.j.KpIhI2pGt9Z8j/tzhbk/zArOalOrSPa', NULL, NULL),
(325, 'A60003', 'นาย', 'เสริมศักดิ์', 'พลอยศรี', NULL, 5, 30, 37, '2017-01-23', NULL, 2, '2017-09-28 07:10:56', 2, '2017-09-28 07:14:06', '$2y$10$1/VNOja40YxWbnq40BQjEetc8OWosU/aEJALehg2m8kqoe3G8F0TG', NULL, NULL),
(326, 'A60009', 'นาย', 'ยงยุทธ', 'เต็มถุง', NULL, 5, 30, 37, '2017-06-06', NULL, 2, '2017-09-28 07:10:56', 2, '2017-09-28 07:14:06', '$2y$10$bWstz.tkzI./KpNVfBtqVOcg.qEhdkmE0pmrw/EiuB/29z/KYHfU6', NULL, NULL),
(327, 'A60010', 'นาย', 'พูลสวัสดิ์', 'วงศ์พิมล', NULL, 5, 30, 37, '2017-06-21', NULL, 2, '2017-09-28 07:10:56', 2, '2017-09-28 07:14:06', '$2y$10$giOgWbAg2sEjhxPFH45AqeQvFY6fjtxffSRz4UgsBIhXpubzCL5be', NULL, NULL),
(328, '35004', 'นาย', 'กมล', 'อินทมนต์', NULL, 5, 31, 72, '1992-11-02', NULL, 2, '2017-09-28 07:10:57', 2, '2017-09-28 07:14:07', '$2y$10$DlO22tZB3abJhi3/2AK4Mez0QQ6lWzFyzDWiF1a98IrnuA4.d9Oiy', NULL, NULL),
(329, '39007', 'นาย', 'สุบรรณ', 'เวชโต', NULL, 5, 31, 62, '1996-06-19', NULL, 2, '2017-09-28 07:10:57', 2, '2017-09-28 07:14:07', '$2y$10$KydU8yu8299TWJZXAARnquotZn2yOd1CQWlt.0716XGcmPYNHhdIe', NULL, NULL),
(330, 'A43005', 'นาย', 'พันแสง', 'มุริจันทร์', NULL, 5, 31, 72, '2000-06-18', NULL, 2, '2017-09-28 07:10:57', 2, '2017-09-28 07:14:07', '$2y$10$iGMsYXefYX1UNNLW3fGJMOGyTaGi54woWTk9uxYSJ17Q4eivkNVvu', NULL, NULL),
(331, 'A53073', 'นางสาว', 'ขวัญฤทัย', 'เกลี้ยงจิตต์แผ้ว', NULL, 5, 31, 44, '2010-12-16', NULL, 2, '2017-09-28 07:10:58', 2, '2017-09-28 07:14:07', '$2y$10$p6Du2jveBbvPMJcxt2I92eSKZEIlAOzCG5sCda6Hn/SGZjYwfbFS6', NULL, NULL),
(332, 'A56008', 'นางสาว', 'จิรภา', 'เกลี้ยงจิตต์แผ้ว', NULL, 5, 31, 44, '2013-08-01', NULL, 2, '2017-09-28 07:10:58', 2, '2017-09-28 07:14:08', '$2y$10$.fXiq/CF6zDgy42PHZgIsORw5a1a2.mbSSJNgzj/gklFgxtShOaqK', NULL, NULL),
(333, 'A56010', 'นาย', 'สุชาติ', 'อ้นชู', NULL, 5, 31, 72, '2013-10-30', NULL, 2, '2017-09-28 07:10:58', 2, '2017-09-28 07:14:08', '$2y$10$vg4tyH/Yyfsr/dpJiIdGAOCAqZ.qfDr8xqXWoHSAuHR2MgXdzxZ.u', NULL, NULL),
(334, 'A57022', 'ว่าที่ร.ต.', 'เกียรติโชค', 'อยู่สมบูรณ์', NULL, 5, 31, 72, '2014-06-25', NULL, 2, '2017-09-28 07:10:59', 2, '2017-09-28 07:14:08', '$2y$10$crlyYecFu6VS8CBMVg90xuNSWsYMhfPLvDoQznHf5c8Z8MQXNk2US', NULL, NULL),
(335, 'A57027', 'นาย', 'บุญเลิศ', 'หว่างคีรี', NULL, 5, 31, 73, '2014-08-05', NULL, 2, '2017-09-28 07:10:59', 2, '2017-09-28 07:14:09', '$2y$10$.cUAyYIpHDVwJDiRtvDe1eKSC6nOI9B3aE67izSmx0Fv/wcIxyAV.', NULL, NULL),
(336, 'A57032', 'นาย', 'สุวรรณ', 'วัฒนแสง', NULL, 5, 31, 72, '2014-10-02', NULL, 2, '2017-09-28 07:10:59', 2, '2017-09-28 07:14:09', '$2y$10$WAfwGW39.oIV.3ZfvFG/O.51mwthnwUdEOz9/iFFT5YmcjmxitB3W', NULL, NULL),
(337, 'A57033', 'นางสาว', 'อสมา', 'ทองคำสุข', NULL, 5, 31, 44, '2014-10-06', NULL, 2, '2017-09-28 07:11:00', 2, '2017-09-28 07:14:09', '$2y$10$h5bsNnu5ur0NItabau5VYOdZjM1CIh4V7Nb/KhSmMuIZ/MPt56AIq', NULL, NULL),
(338, 'A58004', 'นางสาว', 'วราภรณ์', 'ดุเหว่าดำ', NULL, 5, 31, 44, '2015-04-01', NULL, 2, '2017-09-28 07:11:00', 2, '2017-09-28 07:14:09', '$2y$10$Bv1xr1jyiL8eLMe.jwlLYO4LsaM7l/t/EyA4qn4vegIO4vo2ChIU.', NULL, NULL),
(339, 'A58008', 'นาย', 'เอกพจน์', 'ตรีหาญ', NULL, 5, 31, 72, '2015-06-15', NULL, 2, '2017-09-28 07:11:00', 2, '2017-09-28 07:14:10', '$2y$10$MUOfAdVUqs1t2qNOc30g9.BQ8H2Ax829gGqidmZjkZU58/mMzZYSS', NULL, NULL),
(340, 'A58010', 'นางสาว', 'ณัฐชยา', 'ทองคำสุข', NULL, 5, 31, 44, '2015-07-06', NULL, 2, '2017-09-28 07:11:01', 2, '2017-09-28 07:14:10', '$2y$10$325UxXeyX.CzifQDrlxJy.85hvBz52RbZ.fieG6mr/bCLxV3lzoxO', NULL, NULL),
(341, 'A59001', 'นาย', 'ชาติชัย', 'สิงห์คลี', NULL, 5, 31, 72, '2016-02-01', NULL, 2, '2017-09-28 07:11:01', 2, '2017-09-28 07:14:10', '$2y$10$IRDgJrtkM47/vvvWmUS7tucHUoAVqemxE0sQwch6LWKQYIOYRkjJa', NULL, NULL),
(342, 'A59004', 'นาย', 'กฤษฎา', 'ดีนุช', NULL, 5, 31, 73, '2016-05-02', NULL, 2, '2017-09-28 07:11:01', 2, '2017-09-28 07:14:11', '$2y$10$WBwqa80BPZwEr4Nc5.gMv.5jWCsf5HtrehSgcY2fDppsPtz5cbsku', NULL, NULL),
(343, 'A43001', 'นาย', 'ไพรศาล', 'กิ่งจันทร์', NULL, 5, 32, 50, '2000-03-10', NULL, 2, '2017-09-28 07:11:02', 2, '2017-09-28 07:14:11', '$2y$10$h5lt1ePtHakNKvqyBBNHVOHRvylshqnZ/WlAHnf.I18KuTTapHFJW', NULL, NULL),
(344, 'A48003', 'นาย', 'อมร', 'พรมทา', NULL, 5, 32, 50, '2005-06-01', NULL, 2, '2017-09-28 07:11:02', 2, '2017-09-28 07:14:11', '$2y$10$3Q7uDT3T2..jNoNk9ejMNe2PlFwkOEzs4MfQHuCrn0EZga8XTUNce', NULL, NULL),
(345, 'A56003', 'นาย', 'สาคร', 'ดีนุช', NULL, 5, 32, 50, '2013-03-21', NULL, 2, '2017-09-28 07:11:02', 2, '2017-09-28 07:14:12', '$2y$10$RoVUZhUILSMyD1FJ/kkthOZwpgRUk3y.At.SHeGrxxHEHJNCjO6ge', NULL, NULL),
(346, 'A57012', 'นาย', 'สุนทร', 'จันทร์ทา', NULL, 5, 32, 50, '2014-03-25', NULL, 2, '2017-09-28 07:11:03', 2, '2017-09-28 07:14:12', '$2y$10$mrAE7bj5JYj4oiGk9YNqV.SV2Vc7VwMyJgje5bkwBAKJ/xNBhJ5uK', NULL, NULL),
(347, 'A57034', 'นางสาว', 'ลดาวัลย์', 'ภาคาหาญ', NULL, 5, 32, 44, '2014-10-28', NULL, 2, '2017-09-28 07:11:03', 2, '2017-09-28 07:14:12', '$2y$10$kHeKZgZQO3OgGrSocanlY.ZgQLPp1cCFpJMyWzcl7Ode9M9wYHwva', NULL, NULL),
(348, 'A58001', 'นาย', 'ธานินทร์', 'เจริญวงษ์', NULL, 5, 32, 74, '2015-01-23', NULL, 2, '2017-09-28 07:11:03', 2, '2017-09-28 07:14:12', '$2y$10$OJF9jhk2p96u46biqHZIRO7EXyWmQtdS33d5bstbPnGBQ3M/as2S6', NULL, NULL),
(349, 'A59008', 'นาย', 'อนุชิต', 'โจมทอง', NULL, 5, 32, 50, '2016-06-13', NULL, 2, '2017-09-28 07:11:04', 2, '2017-09-28 07:14:13', '$2y$10$g5fokoW77OTX5EQtOmn9qOFIzhR6VfRKGi6zM168VAXVk0kAfghEG', NULL, NULL),
(350, 'A59009', 'นาย', 'ศักดิ์ชัย', 'เอี่ยมโพธิ์ทอง', NULL, 5, 32, 50, '2016-06-13', NULL, 2, '2017-09-28 07:11:04', 2, '2017-09-28 07:14:13', '$2y$10$sXty0y6gVKrOKszTpPi5uumRvNEFe1Hxp7Q56Ui8Vp.sFIcblPlle', NULL, NULL),
(351, 'A59015', 'นาย', 'วัชระ', 'บุบผาลา', NULL, 5, 32, 74, '2016-11-08', NULL, 2, '2017-09-28 07:11:04', 2, '2017-09-28 07:14:13', '$2y$10$eqiFaioNzUURBzFy1fTzcOBmktZ3hRIYyxXlUZ3d.zolFZXGthwRO', NULL, NULL),
(352, 'A60001', 'นาย', 'คำรณ', 'แจ้งสว่าง', NULL, 5, 32, 50, '2017-01-03', NULL, 2, '2017-09-28 07:11:04', 2, '2017-09-28 07:14:14', '$2y$10$DcX19UoPWPr.zd009P93AexJl2JSDT26wwpyIrUYI3s1qPrhNgrgu', NULL, NULL),
(353, 'A34001', 'นาย', 'ชวนชัย', 'สุทธิประภา', NULL, 12, 33, 64, '1991-02-27', NULL, 2, '2017-09-28 07:11:05', 2, '2017-09-28 07:14:14', '$2y$10$uutLVUHMSUuuxvE4ZarFguWb5iKYRiT/m/amCHnYeJte6ikydyfBe', NULL, NULL),
(354, 'A58014', 'นาง', 'ฐิติมา', 'สวนเถื่อน', NULL, 12, 33, 30, '2015-08-18', NULL, 2, '2017-09-28 07:11:05', 2, '2017-09-28 07:14:14', '$2y$10$8JWkwWEdyGTi9o8TY7b2dezHXXLAZ.Nag0pK7yOh5L0jFM5BZahQC', NULL, NULL),
(355, 'A59016', 'นางสาว', 'เบญจวรรณ', 'กลิ่นจำปา', NULL, 12, 33, 44, '2016-12-01', NULL, 2, '2017-09-28 07:11:06', 2, '2017-09-28 07:14:14', '$2y$10$xVeGf7lvCtA6e/CmUtP0e.56U51NQTip97gcxrcSJdY2z.eaNH6qi', NULL, NULL),
(356, 'A30001', 'นาย', 'อุดม', 'ช่วยนา', NULL, 10, 34, 75, '1987-12-22', NULL, 2, '2017-09-28 07:11:06', 2, '2017-09-28 07:14:15', '$2y$10$VGIomvBdxEAECo5Emb6ni.XIW5.Zdw8SgkPU9IcDfrEbtmtPRMtfe', NULL, NULL),
(357, 'A41001', 'นาย', 'มานิตย์', 'ภูวนาถ', NULL, 10, 34, 75, '1998-01-06', NULL, 2, '2017-09-28 07:11:06', 2, '2017-09-28 07:14:15', '$2y$10$gZU02npz2QHQr.n91jqo4uXYeojFlKvbl1mws80fwaoHE0/6wpcei', NULL, NULL),
(358, 'A43004', 'นาย', 'วันชัย', 'สวนเถื่อน', NULL, 10, 34, 50, '2000-06-17', NULL, 2, '2017-09-28 07:11:07', 2, '2017-09-28 07:14:15', '$2y$10$6Ze.V0.vbJtrWMEmXk7Kp.eki1ZWGJ1vcso.9l1PcMNUlFRJs/BD.', NULL, NULL),
(359, 'A45002', 'นาย', 'เอี่ยม', 'โจกกลาง', NULL, 10, 34, 50, '2002-06-13', NULL, 2, '2017-09-28 07:11:07', 2, '2017-09-28 07:14:16', '$2y$10$ooZK7BfluYzWfRTAe75Yru9dF5a4eW.QBzeV/tDD6mFa793cRE4uG', NULL, NULL),
(360, 'A46003', 'นาย', 'ขันชัย', 'มุริจันทร์', NULL, 10, 34, 50, '2003-09-15', NULL, 2, '2017-09-28 07:11:07', 2, '2017-09-28 07:14:16', '$2y$10$/6qoDbFzzhccDkanRrlRf.ZjJXUIRjRdGybl9J/XNtOJKaADRk1BK', NULL, NULL),
(361, 'A47004', 'นาย', 'ชาตรี', 'โลหะชาติ', NULL, 10, 34, 50, '2004-05-10', NULL, 2, '2017-09-28 07:11:08', 2, '2017-09-28 07:14:16', '$2y$10$bkZHtMrhb1eGSI/qSI.nQ.PU9xZImbc02akCfKtp1bAkPcVR9UDta', NULL, NULL),
(362, 'A49001', 'นาย', 'ระเด่น', 'เจนจบ', NULL, 10, 34, 50, '2006-01-11', NULL, 2, '2017-09-28 07:11:08', 2, '2017-09-28 07:14:17', '$2y$10$iATBnUE6RNNWIKV5uvwVheWp3fCo2wx0uqSighZxrskVal1vIQYXu', NULL, NULL),
(363, 'A52002', 'นาย', 'อเนก', 'เอกกลาง', NULL, 10, 34, 50, '2009-05-05', NULL, 2, '2017-09-28 07:11:09', 2, '2017-09-28 07:14:17', '$2y$10$YGwucuIGb6rq481pQ1IDtuhaj.tVzJlQWHL61g8FEnEbV6nZzQ4fm', NULL, NULL),
(364, 'A54020', 'นาย', 'สุวัฒชัย', 'อินทร์แสง', NULL, 10, 34, 50, '2011-09-01', NULL, 2, '2017-09-28 07:11:09', 2, '2017-09-28 07:14:17', '$2y$10$fdJ9fwfsjD1mvJjjreMy0uM25gvV0qLWIlrR9XS07M7t9N3v.lDTe', NULL, NULL),
(365, 'A58016', 'นาย', 'มนตรี', 'สำราญรื่น', NULL, 10, 34, 50, '2015-11-16', NULL, 2, '2017-09-28 07:11:09', 2, '2017-09-28 07:14:18', '$2y$10$tUj6vnTfxIFEEyQ1GeWNNeHRjInQNe5P4GBrzcidF1ftInqiUb9I2', NULL, NULL),
(366, 'A59010', 'นาย', 'สุรพงษ์', 'พ่อค้า', NULL, 10, 34, 50, '2016-07-01', NULL, 2, '2017-09-28 07:11:10', 2, '2017-09-28 07:14:18', '$2y$10$yWIzjY85UykgtDcuORcKKe4ObbkHfAsgYvV5S81KCQhECQjO8oBFS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Staff_Department`
--

CREATE TABLE `ck_Staff_Department` (
  `id` int(10) UNSIGNED NOT NULL,
  `DivisionID` int(11) DEFAULT NULL,
  `DepartmentCode` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DepartmentName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DepartmentDesc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='แผนก';

--
-- Dumping data for table `ck_Staff_Department`
--

INSERT INTO `ck_Staff_Department` (`id`, `DivisionID`, `DepartmentCode`, `DepartmentName`, `DepartmentDesc`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 11, '', 'แผนกบริหาร', NULL, NULL, NULL, NULL, '2017-09-28 07:12:22', NULL),
(2, 2, '', 'แผนกขายและการตลาด', NULL, NULL, NULL, NULL, '2017-09-28 07:12:23', NULL),
(3, 8, '', 'แผนกบัญชี', NULL, NULL, NULL, NULL, '2017-09-28 07:12:24', NULL),
(4, 8, '', 'แผนกการเงิน', NULL, NULL, NULL, NULL, '2017-09-28 07:12:27', NULL),
(5, 8, '', 'แผนกควบคุมต้นทุน', NULL, NULL, NULL, NULL, '2017-09-28 07:12:28', NULL),
(6, 1, '', 'แผนกบริหารงานบุคคล', NULL, NULL, NULL, NULL, '2017-09-28 07:12:29', NULL),
(7, 1, '', 'แผนกธุรการ', NULL, NULL, NULL, NULL, '2017-09-28 07:12:31', NULL),
(8, 9, '', 'แผนกจัดซื้อ', NULL, NULL, NULL, NULL, '2017-09-28 07:12:33', NULL),
(9, 9, '', 'แผนกคลังสินค้า', NULL, NULL, NULL, NULL, '2017-09-28 07:12:34', NULL),
(10, 7, '', 'แผนกเครื่องจักรกลหนัก(เทพารักษ์)', NULL, NULL, NULL, NULL, '2017-09-28 07:12:36', NULL),
(11, 4, '', 'แผนกวิศวกรรมและซ่อมบำรุง', NULL, NULL, NULL, NULL, '2017-09-28 07:12:41', NULL),
(12, 4, '', 'แผนกต่อเรือ (สำนักงาน)', NULL, NULL, NULL, NULL, '2017-09-28 07:12:46', NULL),
(13, 4, '', 'แผนกซ่อมบำรุงทุ่น', NULL, NULL, NULL, NULL, '2017-09-28 07:12:48', NULL),
(14, 3, '', 'แผนกวางแผน', NULL, NULL, NULL, NULL, '2017-09-28 07:12:51', NULL),
(15, 3, '', 'แผนกสนับสนุนขนส่งทางน้ำ', NULL, NULL, NULL, NULL, '2017-09-28 07:12:53', NULL),
(16, 3, '', 'แผนกเรือยนต์', NULL, NULL, NULL, NULL, '2017-09-28 07:12:54', NULL),
(17, 3, '', 'แผนกเรือเอสพี', NULL, NULL, NULL, NULL, '2017-09-28 07:13:04', NULL),
(18, 3, '', 'แผนกเรือจากัวร์', NULL, NULL, NULL, NULL, '2017-09-28 07:13:06', NULL),
(19, 3, '', 'แผนกเรือปอร์เช่', NULL, NULL, NULL, NULL, '2017-09-28 07:13:21', NULL),
(20, 3, '', 'แผนกเรือเอาดี้', NULL, NULL, NULL, NULL, '2017-09-28 07:13:30', NULL),
(21, 6, '', 'แผนกสำนักงานทุ่น', NULL, NULL, NULL, NULL, '2017-09-28 07:13:32', NULL),
(22, 6, '', 'แผนกทุ่นกรรณิกา', NULL, NULL, NULL, NULL, '2017-09-28 07:13:34', NULL),
(23, 6, '', 'แผนกทุ่นลดาวัลย์', NULL, NULL, NULL, NULL, '2017-09-28 07:13:36', NULL),
(24, 6, '', 'แผนกทุ่นการะเกด', NULL, NULL, NULL, NULL, '2017-09-28 07:13:38', NULL),
(25, 6, '', 'แผนกทุ่นแก่นตะวัน', NULL, NULL, NULL, NULL, '2017-09-28 07:13:44', NULL),
(26, 6, '', 'แผนกทุ่นบุหงา', NULL, NULL, NULL, NULL, '2017-09-28 07:13:49', NULL),
(27, 6, '', 'แผนกทุ่นศุภราช', NULL, NULL, NULL, NULL, '2017-09-28 07:13:55', NULL),
(28, 5, '', 'แผนกสำนักงานท่าเรือสินวัฒนา', NULL, NULL, NULL, NULL, '2017-09-28 07:13:59', NULL),
(29, 5, '', 'แผนกควบคุมต้นทุนและคลังสินค้า', NULL, NULL, NULL, NULL, '2017-09-28 07:14:00', NULL),
(30, 5, '', 'แผนกเครื่องจักรกลหนัก (ท่าสิน)', NULL, NULL, NULL, NULL, '2017-09-28 07:14:02', NULL),
(31, 5, '', 'แผนกปฏิบัติการ', NULL, NULL, NULL, NULL, '2017-09-28 07:14:06', NULL),
(32, 5, '', 'แผนกซ่อมบำรุง', NULL, NULL, NULL, NULL, '2017-09-28 07:14:11', NULL),
(33, 12, '', 'แผนกสำนักงานอู่ต่อเรือ', NULL, NULL, NULL, NULL, '2017-09-28 07:14:14', NULL),
(34, 10, '', 'แผนกต่อเรือ', NULL, NULL, NULL, NULL, '2017-09-28 07:14:15', NULL),
(99, 99, '', 'Administrator', NULL, NULL, NULL, NULL, '2017-09-28 07:12:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Staff_Department_2_Position`
--

CREATE TABLE `ck_Staff_Department_2_Position` (
  `DepartmentID` int(10) NOT NULL,
  `PositionID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck_Staff_Department_2_Position`
--

INSERT INTO `ck_Staff_Department_2_Position` (`DepartmentID`, `PositionID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(5, 16),
(5, 17),
(6, 18),
(6, 19),
(6, 20),
(6, 21),
(6, 22),
(7, 23),
(7, 24),
(7, 25),
(8, 26),
(8, 27),
(8, 28),
(8, 29),
(9, 30),
(9, 31),
(9, 32),
(10, 33),
(10, 34),
(10, 35),
(10, 36),
(10, 37),
(11, 38),
(11, 39),
(11, 40),
(11, 41),
(11, 42),
(11, 43),
(11, 44),
(11, 45),
(11, 46),
(11, 47),
(11, 48),
(12, 49),
(12, 50),
(12, 51),
(12, 52),
(13, 39),
(13, 45),
(13, 50),
(13, 53),
(13, 54),
(13, 55),
(14, 44),
(14, 56),
(14, 57),
(15, 44),
(15, 58),
(16, 59),
(16, 60),
(17, 61),
(18, 61),
(19, 61),
(20, 61),
(21, 29),
(21, 44),
(21, 62),
(21, 63),
(21, 64),
(22, 37),
(22, 65),
(22, 66),
(22, 67),
(23, 37),
(23, 65),
(23, 66),
(23, 67),
(24, 37),
(24, 65),
(24, 66),
(24, 67),
(25, 37),
(25, 65),
(25, 66),
(25, 67),
(25, 68),
(25, 69),
(26, 37),
(26, 65),
(26, 66),
(26, 67),
(26, 68),
(26, 69),
(27, 37),
(27, 66),
(27, 67),
(27, 68),
(27, 69),
(28, 44),
(28, 64),
(28, 70),
(28, 71),
(29, 16),
(29, 17),
(29, 25),
(29, 30),
(30, 33),
(30, 34),
(30, 36),
(30, 37),
(31, 44),
(31, 62),
(31, 72),
(31, 73),
(32, 44),
(32, 50),
(32, 74),
(33, 30),
(33, 44),
(33, 64),
(34, 50),
(34, 75),
(99, 99);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Staff_Division`
--

CREATE TABLE `ck_Staff_Division` (
  `id` int(10) UNSIGNED NOT NULL,
  `Code` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `DivisionCode` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DivisionName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DivisionDesc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ck_Staff_Division`
--

INSERT INTO `ck_Staff_Division` (`id`, `Code`, `DivisionCode`, `DivisionName`, `DivisionDesc`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, '0', 'HRMD', 'ฝ่ายบริหารและพัฒนาทรัพยากรบุคล', NULL, NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(2, 'smd', 'SMD', 'ฝ่ายขายและการตลาด', 'Sale Order', NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(3, 'rtm', 'RTM', 'ฝ่ายขนส่งสินค้าทางน้ำ', 'ใบแจ้งงานเรือ', NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(4, 'mme', 'MME', 'ฝ่ายวิศวกรรมและซ่อมบำรุง', NULL, NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(5, 'swp', 'SWP', 'ฝ่ายท่าเรือสินวัฒนา', 'งานท่าสิน', NULL, '2017-02-01 03:07:48', NULL, '2017-07-14 02:54:44', NULL),
(6, 'fts', 'FTS', 'ฝ่ายขนถ่ายสินค้าทางทะเล', 'สตีวีโดร์ - ทุ่น', NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(7, 'clm', 'CLM', 'ฝ่ายขนถ่ายสินค้าท่าเรือ', 'ใบแจ้งงานแบคโฮ', NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(8, 'afm', 'AFM', 'ฝ่ายบัญชีและการเงิน', NULL, NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(9, 'pwm', 'PWM', 'ฝ่ายจัดซื้อและคลังสินค้า', NULL, NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(10, 'sbr', 'SBR', 'ฝ่ายอู่ต่อเรือบางไทร', NULL, NULL, '2017-02-01 03:07:48', NULL, '2017-02-01 03:07:48', NULL),
(11, '0', 'QSHE', 'ฝ่ายบริหาร', NULL, NULL, '2017-02-01 03:07:49', NULL, '2017-02-01 03:07:49', NULL),
(12, '0', '', 'ฝ่ายอู่ต่อเรือ', NULL, NULL, '2017-02-01 03:07:49', NULL, '2017-02-01 03:07:49', NULL),
(99, '0', 'ADMIN', 'Administrator', NULL, NULL, '2017-02-01 03:07:49', NULL, '2017-07-04 03:14:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ck_Staff_Position`
--

CREATE TABLE `ck_Staff_Position` (
  `id` int(10) UNSIGNED NOT NULL,
  `PositionCode` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `PositionName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PositionDesc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตำแหน่ง';

--
-- Dumping data for table `ck_Staff_Position`
--

INSERT INTO `ck_Staff_Position` (`id`, `PositionCode`, `PositionName`, `PositionDesc`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, '', 'รองประธานกรรมการอาวุโส', NULL, NULL, '2017-09-28 05:17:51', NULL, '2017-09-28 05:17:51', NULL),
(2, '', 'รองประธานกรรมการ', NULL, NULL, '2017-09-28 05:17:51', NULL, '2017-09-28 05:17:51', NULL),
(3, '', 'ประธานกรรมการบริษัท', NULL, NULL, '2017-09-28 05:17:52', NULL, '2017-09-28 05:17:52', NULL),
(4, '', 'ผู้จัดการฝ่ายขายและการตลาด', NULL, NULL, '2017-09-28 05:17:52', NULL, '2017-09-28 05:17:52', NULL),
(5, '', 'เจ้าหน้าที่ขายและการตลาด', NULL, NULL, '2017-09-28 05:17:52', NULL, '2017-09-28 05:17:52', NULL),
(6, '', 'หัวหน้าส่วนงานบัญชีเจ้าหนี้', NULL, NULL, '2017-09-28 05:17:53', NULL, '2017-09-28 05:17:53', NULL),
(7, '', 'ผู้จัดการแผนกบัญชี', NULL, NULL, '2017-09-28 05:17:53', NULL, '2017-09-28 05:17:53', NULL),
(8, '', 'หัวหน้าส่วนงานบัญชีลูกหนี้', NULL, NULL, '2017-09-28 05:17:53', NULL, '2017-09-28 05:17:53', NULL),
(9, '', 'เจ้าหน้าที่บัญชึลูกหนี้', NULL, NULL, '2017-09-28 05:17:53', NULL, '2017-09-28 05:17:53', NULL),
(10, '', 'เจ้าหน้าที่บัญชีเจ้าหนี้', NULL, NULL, '2017-09-28 05:17:54', NULL, '2017-09-28 05:17:54', NULL),
(11, '', 'ผช.ผจก.แผนกบัญชี', NULL, NULL, '2017-09-28 05:17:54', NULL, '2017-09-28 05:17:54', NULL),
(12, '', 'ผู้จัดการแแผนกการเงิน', NULL, NULL, '2017-09-28 05:17:54', NULL, '2017-09-28 05:17:54', NULL),
(13, '', 'พนักงานส่งเอกสาร', NULL, NULL, '2017-09-28 05:17:54', NULL, '2017-09-28 05:17:54', NULL),
(14, '', 'หัวหน้าส่วนงานการเงิน', NULL, NULL, '2017-09-28 05:17:54', NULL, '2017-09-28 05:17:54', NULL),
(15, '', 'เจ้าหน้าที่การเงิน', NULL, NULL, '2017-09-28 05:17:55', NULL, '2017-09-28 05:17:55', NULL),
(16, '', 'พนักงานควบคุมต้นทุน', NULL, NULL, '2017-09-28 05:17:55', NULL, '2017-09-28 05:17:55', NULL),
(17, '', 'เจ้าหน้าที่ควบคุมต้นทุน', NULL, NULL, '2017-09-28 05:17:55', NULL, '2017-09-28 05:17:55', NULL),
(18, '', 'หัวหน้าส่วนงานบริหารค่าตอบแทน', NULL, NULL, '2017-09-28 05:17:55', NULL, '2017-09-28 05:17:55', NULL),
(19, '', 'เจ้าหน้าที่สารสนเทศ', NULL, NULL, '2017-09-28 05:17:56', NULL, '2017-09-28 05:17:56', NULL),
(20, '', 'เจ้าหน้าที่บริหารค่าตอบแทน', NULL, NULL, '2017-09-28 05:17:56', NULL, '2017-09-28 05:17:56', NULL),
(21, '', 'เจ้าหน้าที่สรรหาว่าจ้าง', NULL, NULL, '2017-09-28 05:17:56', NULL, '2017-09-28 05:17:56', NULL),
(22, '', 'เจ้าหน้าที่พัฒนาและฝึกอบรม', NULL, NULL, '2017-09-28 05:17:56', NULL, '2017-09-28 05:17:56', NULL),
(23, '', 'หัวหน้าส่วนงานธุรการสำนักงาน', NULL, NULL, '2017-09-28 05:17:56', NULL, '2017-09-28 05:17:56', NULL),
(24, '', 'แม่บ้าน', NULL, NULL, '2017-09-28 05:17:56', NULL, '2017-09-28 05:17:56', NULL),
(25, '', 'พนักงานขับรถ', NULL, NULL, '2017-09-28 05:17:57', NULL, '2017-09-28 05:17:57', NULL),
(26, '', 'หัวหน้าส่วนงานจัดซื้อ', NULL, NULL, '2017-09-28 05:17:58', NULL, '2017-09-28 05:17:58', NULL),
(27, '', 'เจ้าหน้าที่จัดซื้อ', NULL, NULL, '2017-09-28 05:17:58', NULL, '2017-09-28 05:17:58', NULL),
(28, '', 'พนักงานจัดซื้อ', NULL, NULL, '2017-09-28 05:17:58', NULL, '2017-09-28 05:17:58', NULL),
(29, '', 'พนักงานธุรการ', NULL, NULL, '2017-09-28 05:17:58', NULL, '2017-09-28 05:17:58', NULL),
(30, '', 'พนักงานคลังสินค้า', NULL, NULL, '2017-09-28 05:17:58', NULL, '2017-09-28 05:17:58', NULL),
(31, '', 'หัวหน้าส่วนงานคลังสินค้า', NULL, NULL, '2017-09-28 05:17:59', NULL, '2017-09-28 05:17:59', NULL),
(32, '', 'เจ้าหน้าที่คลังสินค้า', NULL, NULL, '2017-09-28 05:17:59', NULL, '2017-09-28 05:17:59', NULL),
(33, '', 'เจ้าหน้าที่ควบคุมเครื่องจักรกลหนัก', NULL, NULL, '2017-09-28 05:17:59', NULL, '2017-09-28 05:17:59', NULL),
(34, '', 'พนง.ขับรถบรรทุก', NULL, NULL, '2017-09-28 05:17:59', NULL, '2017-09-28 05:17:59', NULL),
(35, '', 'ผจก.ฝ่ายขนถ่ายสินค้าท่าเรือ', NULL, NULL, '2017-09-28 05:18:00', NULL, '2017-09-28 05:18:00', NULL),
(36, '', 'หัวหน้าส่วนงานเครื่องจักรกลหนัก', NULL, NULL, '2017-09-28 05:18:00', NULL, '2017-09-28 05:18:00', NULL),
(37, '', 'พนง.ควบคุมเครื่องจักรกลหนัก', NULL, NULL, '2017-09-28 05:18:01', NULL, '2017-09-28 05:18:01', NULL),
(38, '', 'หัวหน้าส่วนงานไฮดรอริก', NULL, NULL, '2017-09-28 05:18:01', NULL, '2017-09-28 05:18:01', NULL),
(39, '', 'หัวหน้าส่วนงานไฟฟ้า', NULL, NULL, '2017-09-28 05:18:01', NULL, '2017-09-28 05:18:01', NULL),
(40, '', 'หัวหน้าส่วนงานเครื่องยนต์', NULL, NULL, '2017-09-28 05:18:02', NULL, '2017-09-28 05:18:02', NULL),
(41, '', 'หัวหน้าส่วนงานบำรุงรักษาเครื่องจักรกลหนัก', NULL, NULL, '2017-09-28 05:18:02', NULL, '2017-09-28 05:18:02', NULL),
(42, '', 'ช่างไฮดรอริก', NULL, NULL, '2017-09-28 05:18:02', NULL, '2017-09-28 05:18:02', NULL),
(43, '', 'หัวหน้าส่วนงานกลึง', NULL, NULL, '2017-09-28 05:18:02', NULL, '2017-09-28 05:18:02', NULL),
(44, '', 'เจ้าหน้าที่ธุรการ', NULL, NULL, '2017-09-28 05:18:02', NULL, '2017-09-28 05:18:02', NULL),
(45, '', 'ช่างเครื่องยนต์', NULL, NULL, '2017-09-28 05:18:02', NULL, '2017-09-28 05:18:02', NULL),
(46, '', 'ผู้ช่วยช่าง', NULL, NULL, '2017-09-28 05:18:03', NULL, '2017-09-28 05:18:03', NULL),
(47, '', 'วิศวกรซ่อมบำรุง', NULL, NULL, '2017-09-28 05:18:04', NULL, '2017-09-28 05:18:04', NULL),
(48, '', 'ผู้ช่วยช่างไฮดรอริก', NULL, NULL, '2017-09-28 05:18:04', NULL, '2017-09-28 05:18:04', NULL),
(49, '', 'หัวหน้าส่วนงานต่อเรือสำนักงาน', NULL, NULL, '2017-09-28 05:18:04', NULL, '2017-09-28 05:18:04', NULL),
(50, '', 'ช่างเชื่อม', NULL, NULL, '2017-09-28 05:18:04', NULL, '2017-09-28 05:18:04', NULL),
(51, '', 'ช่าง CNC', NULL, NULL, '2017-09-28 05:18:05', NULL, '2017-09-28 05:18:05', NULL),
(52, '', 'เจ้าหน้าที่เขียนแบบ', NULL, NULL, '2017-09-28 05:18:05', NULL, '2017-09-28 05:18:05', NULL),
(53, '', 'ผจก.แผนกซ่อมบำรุงทุ่น', NULL, NULL, '2017-09-28 05:18:05', NULL, '2017-09-28 05:18:05', NULL),
(54, '', 'ช่างไฟฟ้า', NULL, NULL, '2017-09-28 05:18:06', NULL, '2017-09-28 05:18:06', NULL),
(55, '', 'ผู้ช่วยช่างไฟฟ้า', NULL, NULL, '2017-09-28 05:18:06', NULL, '2017-09-28 05:18:06', NULL),
(56, '', 'เจ้าหน้าที่วางแผน', NULL, NULL, '2017-09-28 05:18:07', NULL, '2017-09-28 05:18:07', NULL),
(57, '', 'ผู้จัดการแผนกวางแผน', NULL, NULL, '2017-09-28 05:18:07', NULL, '2017-09-28 05:18:07', NULL),
(58, '', 'เจ้าหน้าที่ตรวจเรือ', NULL, NULL, '2017-09-28 05:18:08', NULL, '2017-09-28 05:18:08', NULL),
(59, '', 'กัปตันเรือ', NULL, NULL, '2017-09-28 05:18:08', NULL, '2017-09-28 05:18:08', NULL),
(60, '', 'ช่างเครื่อง', NULL, NULL, '2017-09-28 05:18:08', NULL, '2017-09-28 05:18:08', NULL),
(61, '', 'พนง.ควบคุมเรือลำเลียง', NULL, NULL, '2017-09-28 05:18:14', NULL, '2017-09-28 05:18:14', NULL),
(62, '', 'ผู้จัดการแผนกปฏิบัติการ', NULL, NULL, '2017-09-28 05:18:28', NULL, '2017-09-28 05:18:28', NULL),
(63, '', 'หัวหน้าส่วนงานสำนักงานทุ่น', NULL, NULL, '2017-09-28 05:18:28', NULL, '2017-09-28 05:18:28', NULL),
(64, '', 'ที่ปรึกษา', NULL, NULL, '2017-09-28 05:18:29', NULL, '2017-09-28 05:18:29', NULL),
(65, '', 'รองหัวหน้าทุ่น', NULL, NULL, '2017-09-28 05:18:29', NULL, '2017-09-28 05:18:29', NULL),
(66, '', 'เจ้าหน้าที่ขับเครน', NULL, NULL, '2017-09-28 05:18:29', NULL, '2017-09-28 05:18:29', NULL),
(67, '', 'พนักงานปากเรือ', NULL, NULL, '2017-09-28 05:18:30', NULL, '2017-09-28 05:18:30', NULL),
(68, '', 'หัวหน้าทุ่น', NULL, NULL, '2017-09-28 05:18:34', NULL, '2017-09-28 05:18:34', NULL),
(69, '', 'พนง.บำรุงรักษาเครื่องจักรกลหนัก', NULL, NULL, '2017-09-28 05:18:36', NULL, '2017-09-28 05:18:36', NULL),
(70, '', 'ผช.ผจก.ฝ่ายท่าเรือสินวัฒนา', NULL, NULL, '2017-09-28 05:18:42', NULL, '2017-09-28 05:18:42', NULL),
(71, '', 'เจ้าหน้าที่ควบคุมเอกสาร', NULL, NULL, '2017-09-28 05:18:42', NULL, '2017-09-28 05:18:42', NULL),
(72, '', 'พนักงานปฏิบัติการหน้าท่า', NULL, NULL, '2017-09-28 05:18:45', NULL, '2017-09-28 05:18:45', NULL),
(73, '', 'พนักงานควบคุมการขนถ่ายสินค้า', NULL, NULL, '2017-09-28 05:18:46', NULL, '2017-09-28 05:18:46', NULL),
(74, '', 'ช่างซ่อมบำรุง', NULL, NULL, '2017-09-28 05:18:48', NULL, '2017-09-28 05:18:48', NULL),
(75, '', 'หัวหน้าส่วนงานเชื่อม', NULL, NULL, '2017-09-28 05:18:50', NULL, '2017-09-28 05:18:50', NULL),
(99, '', 'Administrator', NULL, NULL, '2017-09-28 05:18:50', NULL, '2017-09-28 05:18:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ck_alert`
--
ALTER TABLE `ck_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Buoy_Product`
--
ALTER TABLE `ck_Item_Fts_Buoy_Product`
  ADD KEY `BuoyID_ProductID` (`DepartmentID`,`ProductID`);

--
-- Indexes for table `ck_Item_Fts_Operation`
--
ALTER TABLE `ck_Item_Fts_Operation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_BuoyID` (`ItemID`,`DepartmentID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Alongside`
--
ALTER TABLE `ck_Item_Fts_Operation_Alongside`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Alongside_Lighter`
--
ALTER TABLE `ck_Item_Fts_Operation_Alongside_Lighter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Crane`
--
ALTER TABLE `ck_Item_Fts_Operation_Crane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Crane_Rebate`
--
ALTER TABLE `ck_Item_Fts_Operation_Crane_Rebate`
  ADD KEY `CraneID_MachineID_RebateNo` (`CraneID`,`MachineID`,`RebateNo`);

--
-- Indexes for table `ck_Item_Fts_Operation_Crane_Use`
--
ALTER TABLE `ck_Item_Fts_Operation_Crane_Use`
  ADD PRIMARY KEY (`CraneID`,`MachineID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Daily_Report`
--
ALTER TABLE `ck_Item_Fts_Operation_Daily_Report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Daily_Report_List`
--
ALTER TABLE `ck_Item_Fts_Operation_Daily_Report_List`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OperationID_DailyReportID` (`ItemID`,`DailyReportID`,`Mode`);

--
-- Indexes for table `ck_Item_Fts_Operation_Daily_Report_Remark`
--
ALTER TABLE `ck_Item_Fts_Operation_Daily_Report_Remark`
  ADD KEY `OperationID_DailyReportID` (`ItemID`,`DailyReportID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Daily_Report_Stop`
--
ALTER TABLE `ck_Item_Fts_Operation_Daily_Report_Stop`
  ADD KEY `OperationID_DailyReportID` (`ItemID`,`DailyReportID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Electricity`
--
ALTER TABLE `ck_Item_Fts_Operation_Electricity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Electricity_Rebate`
--
ALTER TABLE `ck_Item_Fts_Operation_Electricity_Rebate`
  ADD KEY `ElectricityID_MachineID_RebateNo` (`ElectricityID`,`MachineID`,`RebateNo`);

--
-- Indexes for table `ck_Item_Fts_Operation_Electricity_Use`
--
ALTER TABLE `ck_Item_Fts_Operation_Electricity_Use`
  ADD PRIMARY KEY (`ElectricityID`,`MachineID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Machine`
--
ALTER TABLE `ck_Item_Fts_Operation_Machine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Oil_Backhoe`
--
ALTER TABLE `ck_Item_Fts_Operation_Oil_Backhoe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Oil_Backhoe_Item`
--
ALTER TABLE `ck_Item_Fts_Operation_Oil_Backhoe_Item`
  ADD PRIMARY KEY (`OilBackhoeID`,`MachineID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Oil_Buoy`
--
ALTER TABLE `ck_Item_Fts_Operation_Oil_Buoy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Operation_Oil_Buoy_Fuel`
--
ALTER TABLE `ck_Item_Fts_Operation_Oil_Buoy_Fuel`
  ADD KEY `OilBuoyID` (`OilBuoyID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Oil_Buoy_Pick`
--
ALTER TABLE `ck_Item_Fts_Operation_Oil_Buoy_Pick`
  ADD KEY `OilBuoyID` (`OilBuoyID`);

--
-- Indexes for table `ck_Item_Fts_Operation_Staff`
--
ALTER TABLE `ck_Item_Fts_Operation_Staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Fts_Prepare_Foreman`
--
ALTER TABLE `ck_Item_Fts_Prepare_Foreman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_OperationID_ForemanID` (`ItemID`,`OperationID`,`ForemanID`);

--
-- Indexes for table `ck_Item_Fts_Prepare_Staff`
--
ALTER TABLE `ck_Item_Fts_Prepare_Staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_BuoyID_StaffID` (`ItemID`,`OperationID`,`StaffID`);

--
-- Indexes for table `ck_Item_Fts_Prepare_Sweep`
--
ALTER TABLE `ck_Item_Fts_Prepare_Sweep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_OperationID_SweepID` (`ItemID`,`OperationID`,`SweepID`);

--
-- Indexes for table `ck_Item_Prepare_Foreman`
--
ALTER TABLE `ck_Item_Prepare_Foreman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `ck_Item_Prepare_Machine`
--
ALTER TABLE `ck_Item_Prepare_Machine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_BuoyID_MachineID` (`ItemID`,`MachineID`);

--
-- Indexes for table `ck_Item_Prepare_Staff_Item`
--
ALTER TABLE `ck_Item_Prepare_Staff_Item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_BuoyID_StaffID` (`ItemID`,`StaffID`);

--
-- Indexes for table `ck_Item_Prepare_Sweep`
--
ALTER TABLE `ck_Item_Prepare_Sweep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `ck_Item_Swp_Operation_Fuel`
--
ALTER TABLE `ck_Item_Swp_Operation_Fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Item_Swp_Operation_Plan`
--
ALTER TABLE `ck_Item_Swp_Operation_Plan`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `ck_Item_Swp_Prepare_Foreman`
--
ALTER TABLE `ck_Item_Swp_Prepare_Foreman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `ck_Item_Swp_Prepare_Machine`
--
ALTER TABLE `ck_Item_Swp_Prepare_Machine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_BuoyID_MachineID` (`ItemID`,`MachineID`);

--
-- Indexes for table `ck_Item_Swp_Prepare_Staff_Item`
--
ALTER TABLE `ck_Item_Swp_Prepare_Staff_Item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID_BuoyID_StaffID` (`ItemID`,`StaffID`);

--
-- Indexes for table `ck_Item_Swp_Prepare_Sweep`
--
ALTER TABLE `ck_Item_Swp_Prepare_Sweep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `ck_Master_Foreman`
--
ALTER TABLE `ck_Master_Foreman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Fts_Buoy`
--
ALTER TABLE `ck_Master_Fts_Buoy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Fts_Foreman`
--
ALTER TABLE `ck_Master_Fts_Foreman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_FTS_Sweep`
--
ALTER TABLE `ck_Master_FTS_Sweep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Fuel`
--
ALTER TABLE `ck_Master_Fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Fuel_Stock`
--
ALTER TABLE `ck_Master_Fuel_Stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Machine`
--
ALTER TABLE `ck_Master_Machine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DivisionID_DepartmentID` (`DivisionID`,`DepartmentID`);

--
-- Indexes for table `ck_Master_Machine_Conveyor`
--
ALTER TABLE `ck_Master_Machine_Conveyor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Machine_Crane`
--
ALTER TABLE `ck_Master_Machine_Crane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Machine_Electricity`
--
ALTER TABLE `ck_Master_Machine_Electricity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Machine_Grab`
--
ALTER TABLE `ck_Master_Machine_Grab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Machine_Inspection`
--
ALTER TABLE `ck_Master_Machine_Inspection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DivisionID_MachineID_ItemID_OperationID` (`DivisionID`,`MachineID`,`ItemID`,`OperationID`);

--
-- Indexes for table `ck_Master_Machine_MachineCondition`
--
ALTER TABLE `ck_Master_Machine_MachineCondition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Smd_Boat`
--
ALTER TABLE `ck_Master_Smd_Boat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Smd_Harbor`
--
ALTER TABLE `ck_Master_Smd_Harbor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Smd_Owner`
--
ALTER TABLE `ck_Master_Smd_Owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Smd_Owner_Client`
--
ALTER TABLE `ck_Master_Smd_Owner_Client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Smd_Product`
--
ALTER TABLE `ck_Master_Smd_Product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Smd_Route`
--
ALTER TABLE `ck_Master_Smd_Route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Smd_Warehouse`
--
ALTER TABLE `ck_Master_Smd_Warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Master_Sweep`
--
ALTER TABLE `ck_Master_Sweep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_menu`
--
ALTER TABLE `ck_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_migrations`
--
ALTER TABLE `ck_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Smd`
--
ALTER TABLE `ck_Smd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BoatID` (`BoatID`);

--
-- Indexes for table `ck_Smd_2_Item`
--
ALTER TABLE `ck_Smd_2_Item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`SmdID`);

--
-- Indexes for table `ck_Smd_Item`
--
ALTER TABLE `ck_Smd_Item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SmdID_HarborID` (`SmdID`,`HarborID`);

--
-- Indexes for table `ck_Smd_Item_2_CLM`
--
ALTER TABLE `ck_Smd_Item_2_CLM`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`SmdID`,`ItemID`);

--
-- Indexes for table `ck_Smd_Item_2_RTM`
--
ALTER TABLE `ck_Smd_Item_2_RTM`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Smd_Item_2_RTM_Item`
--
ALTER TABLE `ck_Smd_Item_2_RTM_Item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`SmdID`,`ItemID`,`ProductID`);

--
-- Indexes for table `ck_Smd_Item_2_SWP`
--
ALTER TABLE `ck_Smd_Item_2_SWP`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`SmdID`,`ItemID`);

--
-- Indexes for table `ck_Smd_Item_2_SWP_Warehouse`
--
ALTER TABLE `ck_Smd_Item_2_SWP_Warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`SmdID`,`ItemID`);

--
-- Indexes for table `ck_Smd_Item_2_TRU`
--
ALTER TABLE `ck_Smd_Item_2_TRU`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`SmdID`,`ItemID`);

--
-- Indexes for table `ck_Smd_Mode`
--
ALTER TABLE `ck_Smd_Mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Smd_Notification`
--
ALTER TABLE `ck_Smd_Notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`SmdID`);

--
-- Indexes for table `ck_Smd_Status`
--
ALTER TABLE `ck_Smd_Status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Staff`
--
ALTER TABLE `ck_Staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Staff_Department`
--
ALTER TABLE `ck_Staff_Department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Staff_Department_2_Position`
--
ALTER TABLE `ck_Staff_Department_2_Position`
  ADD PRIMARY KEY (`DepartmentID`,`PositionID`);

--
-- Indexes for table `ck_Staff_Division`
--
ALTER TABLE `ck_Staff_Division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ck_Staff_Position`
--
ALTER TABLE `ck_Staff_Position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ck_alert`
--
ALTER TABLE `ck_alert`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation`
--
ALTER TABLE `ck_Item_Fts_Operation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Alongside`
--
ALTER TABLE `ck_Item_Fts_Operation_Alongside`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Alongside_Lighter`
--
ALTER TABLE `ck_Item_Fts_Operation_Alongside_Lighter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Crane`
--
ALTER TABLE `ck_Item_Fts_Operation_Crane`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Daily_Report`
--
ALTER TABLE `ck_Item_Fts_Operation_Daily_Report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Daily_Report_List`
--
ALTER TABLE `ck_Item_Fts_Operation_Daily_Report_List`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Electricity`
--
ALTER TABLE `ck_Item_Fts_Operation_Electricity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Machine`
--
ALTER TABLE `ck_Item_Fts_Operation_Machine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Oil_Backhoe`
--
ALTER TABLE `ck_Item_Fts_Operation_Oil_Backhoe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Oil_Buoy`
--
ALTER TABLE `ck_Item_Fts_Operation_Oil_Buoy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Operation_Staff`
--
ALTER TABLE `ck_Item_Fts_Operation_Staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Prepare_Foreman`
--
ALTER TABLE `ck_Item_Fts_Prepare_Foreman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Prepare_Staff`
--
ALTER TABLE `ck_Item_Fts_Prepare_Staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ck_Item_Fts_Prepare_Sweep`
--
ALTER TABLE `ck_Item_Fts_Prepare_Sweep`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ck_Item_Prepare_Foreman`
--
ALTER TABLE `ck_Item_Prepare_Foreman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ck_Item_Prepare_Machine`
--
ALTER TABLE `ck_Item_Prepare_Machine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ck_Item_Prepare_Staff_Item`
--
ALTER TABLE `ck_Item_Prepare_Staff_Item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ck_Item_Prepare_Sweep`
--
ALTER TABLE `ck_Item_Prepare_Sweep`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ck_Item_Swp_Operation_Fuel`
--
ALTER TABLE `ck_Item_Swp_Operation_Fuel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Item_Swp_Prepare_Foreman`
--
ALTER TABLE `ck_Item_Swp_Prepare_Foreman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ck_Item_Swp_Prepare_Machine`
--
ALTER TABLE `ck_Item_Swp_Prepare_Machine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ck_Item_Swp_Prepare_Staff_Item`
--
ALTER TABLE `ck_Item_Swp_Prepare_Staff_Item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ck_Item_Swp_Prepare_Sweep`
--
ALTER TABLE `ck_Item_Swp_Prepare_Sweep`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ck_Master_Foreman`
--
ALTER TABLE `ck_Master_Foreman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ck_Master_Fts_Buoy`
--
ALTER TABLE `ck_Master_Fts_Buoy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ck_Master_Fts_Foreman`
--
ALTER TABLE `ck_Master_Fts_Foreman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ck_Master_FTS_Sweep`
--
ALTER TABLE `ck_Master_FTS_Sweep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ck_Master_Fuel`
--
ALTER TABLE `ck_Master_Fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ck_Master_Fuel_Stock`
--
ALTER TABLE `ck_Master_Fuel_Stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `ck_Master_Machine`
--
ALTER TABLE `ck_Master_Machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `ck_Master_Machine_Conveyor`
--
ALTER TABLE `ck_Master_Machine_Conveyor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ck_Master_Machine_Crane`
--
ALTER TABLE `ck_Master_Machine_Crane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ck_Master_Machine_Electricity`
--
ALTER TABLE `ck_Master_Machine_Electricity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ck_Master_Machine_Grab`
--
ALTER TABLE `ck_Master_Machine_Grab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ck_Master_Machine_Inspection`
--
ALTER TABLE `ck_Master_Machine_Inspection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Master_Machine_MachineCondition`
--
ALTER TABLE `ck_Master_Machine_MachineCondition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ck_Master_Smd_Boat`
--
ALTER TABLE `ck_Master_Smd_Boat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ck_Master_Smd_Harbor`
--
ALTER TABLE `ck_Master_Smd_Harbor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `ck_Master_Smd_Owner`
--
ALTER TABLE `ck_Master_Smd_Owner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ck_Master_Smd_Owner_Client`
--
ALTER TABLE `ck_Master_Smd_Owner_Client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ck_Master_Smd_Product`
--
ALTER TABLE `ck_Master_Smd_Product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ck_Master_Smd_Route`
--
ALTER TABLE `ck_Master_Smd_Route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ck_Master_Smd_Warehouse`
--
ALTER TABLE `ck_Master_Smd_Warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ck_Master_Sweep`
--
ALTER TABLE `ck_Master_Sweep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ck_menu`
--
ALTER TABLE `ck_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;
--
-- AUTO_INCREMENT for table `ck_migrations`
--
ALTER TABLE `ck_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=822;
--
-- AUTO_INCREMENT for table `ck_Smd`
--
ALTER TABLE `ck_Smd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ck_Smd_2_Item`
--
ALTER TABLE `ck_Smd_2_Item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ck_Smd_Item`
--
ALTER TABLE `ck_Smd_Item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `ck_Smd_Item_2_CLM`
--
ALTER TABLE `ck_Smd_Item_2_CLM`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ck_Smd_Item_2_RTM`
--
ALTER TABLE `ck_Smd_Item_2_RTM`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `ck_Smd_Item_2_RTM_Item`
--
ALTER TABLE `ck_Smd_Item_2_RTM_Item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ck_Smd_Item_2_SWP`
--
ALTER TABLE `ck_Smd_Item_2_SWP`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ck_Smd_Item_2_SWP_Warehouse`
--
ALTER TABLE `ck_Smd_Item_2_SWP_Warehouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ck_Smd_Item_2_TRU`
--
ALTER TABLE `ck_Smd_Item_2_TRU`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ck_Smd_Mode`
--
ALTER TABLE `ck_Smd_Mode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ck_Smd_Notification`
--
ALTER TABLE `ck_Smd_Notification`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ck_Smd_Status`
--
ALTER TABLE `ck_Smd_Status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ck_Staff`
--
ALTER TABLE `ck_Staff`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;
--
-- AUTO_INCREMENT for table `ck_Staff_Department`
--
ALTER TABLE `ck_Staff_Department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `ck_Staff_Division`
--
ALTER TABLE `ck_Staff_Division`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `ck_Staff_Position`
--
ALTER TABLE `ck_Staff_Position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
