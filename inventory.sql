-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 05:05 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `idProduct` int(7) NOT NULL AUTO_INCREMENT,
  `nameProduct` varchar(25) NOT NULL,
  `priceProduct` int(8) NOT NULL,
  `stockProduct` int(4) NOT NULL,
  `imageProduct` varchar(11) NOT NULL DEFAULT 'default.png',
  `descriptionProduct` text NOT NULL,
  PRIMARY KEY (`idProduct`)
) ENGINE=MyISAM AUTO_INCREMENT=100007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `nameProduct`, `priceProduct`, `stockProduct`, `imageProduct`, `descriptionProduct`) VALUES
(100000, 'Natraj HB Pencil', 5, 9999, 'default.png', 'This is an all time famous Natraj Pencil. \r\nA red and black color body pencil. Body has  hexagonal shape for better grip. The pencil has right amount of graphite and clay to give you smoothest and darkest righting combination. \r\n\r\nWhat more?\r\nIt is a take away at a very cheap price.'),
(100001, 'Nokia 1100', 2000, 3, 'default.png', 'The Nokia 1100 is a basic GSM mobile phone produced by Nokia. 250 million 1100s have been sold since its launch in late 2003, making it the world''s best selling phone handset and the best selling consumer electronics device in the world at the time.'),
(100006, 'Samsung Galaxy K Zoom', 35000, 7, 'default.png', '\r\nNetwork\r\nTechnology \r\nâ–¼GSM / HSPA / LTEExpand \r\n\r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n\r\n\r\nLaunch\r\nAnnounced 2014, April \r\nStatus Available. Released 2014, June \r\n\r\n\r\nBody\r\nDimensions 137.5 x 70.8 x 16.6 mm (5.41 x 2.79 x 0.65 in) \r\nWeight 200 g (7.05 oz) \r\nSIM Micro-SIM \r\n\r\n\r\nDisplay\r\nType Super AMOLED capacitive touchscreen, 16M colors \r\nSize 4.8 inches (~65.2% screen-to-body ratio) \r\nResolution 720 x 1280 pixels (~306 ppi pixel density) \r\nMultitouch Yes \r\nProtection Corning Gorilla Glass 3 \r\n\r\n\r\nPlatform\r\nOS Android OS, v4.4.2 (KitKat) \r\nChipset Exynos 5260 Hexa \r\nCPU Quad-core 1.3 GHz Cortex A7 & dual-core 1.7 GHz Cortex A15 \r\nGPU Mali-T624 MP4 \r\n\r\n\r\nMemory\r\nCard slot microSD, up to 64 GB (dedicated slot) \r\nInternal 8 GB, 2 GB RAM \r\n\r\n\r\nCamera\r\nPrimary 20.7 MP, auto/manual focus, 10x optical zoom (24-240mm), OIS, Xenon & LED flash, check quality \r\nFeatures 1/2.3" sensor size, geo-tagging, touch focus, face/smile detection, HDR, panorama \r\nVideo 1080p@60fps, check quality \r\nSecondary 2 MP \r\n\r\n\r\nSound\r\nAlert types Vibration; MP3, WAV ringtones \r\nLoudspeaker  Yes \r\n3.5mm jack  Yes \r\n\r\n\r\nComms\r\nWLAN Wi-Fi 802.11 a/b/g/n, dual-band, Wi-Fi Direct, hotspot \r\nBluetooth v4.0, A2DP, LE \r\nGPS Yes, with A-GPS, GLONASS \r\nNFC Yes \r\nRadio No \r\nUSB microUSB v2.0 (MHL 1.3 TV-out), USB Host \r\n\r\n\r\nFeatures\r\nSensors Accelerometer, gyro, proximity, compass \r\nMessaging SMS(threaded view), MMS, Email, Push Mail, IM \r\nBrowser HTML5 \r\nJava No \r\n  - ANT+ support\r\n - S-Voice natural language commands and dictation\r\n - Dropbox (50 GB cloud storage)\r\n - Active noise cancellation with dedicated mic\r\n - MP4/DivX/XviD/WMV/H.264 player\r\n - MP3/WAV/eAAC+/FLAC player\r\n - Photo/video editor\r\n - Document viewer \r\n\r\n\r\nBattery\r\n  Removable Li-Ion 2430 mAh battery \r\nTalk time Up to 14 h (3G) \r\nMusic play Up to 47 h \r\n\r\n\r\nMisc\r\nColors Charcoal Black, Electric Blue, Shimmery White \r\nSAR US 0.51 W/kg (head)     1.07 W/kg (body)      \r\nSAR EU 0.40 W/kg (head)     0.37 W/kg (body)      \r\nPrice group 8/10  \r\n\r\n\r\nTests\r\nPerformance Basemark OS II: 630 / Basemark X: 4962 \r\nDisplay Contrast ratio: Infinite (nominal), 3.67(sunlight) \r\nCamera Photo / Video \r\nLoudspeaker Voice 70dB / Noise 64dB / Ring 69dB  \r\nAudio quality Noise -96.0dB / Crosstalk -85.6dB \r\nBattery life \r\nEndurance rating 67h\r\n  \r\n'),
(100005, 'Logitech Mouse', 450, 40, 'default.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(34) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `add1` varchar(40) DEFAULT NULL,
  `add2` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `pin` int(6) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=10002 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `password`, `mobile`, `add1`, `add2`, `city`, `state`, `pin`) VALUES
(10000, 'First Person', 'someone@mail.com', '32250170a0dca92d53ec9624f336ca24', '1234567890', NULL, NULL, NULL, NULL, NULL),
(10001, 'Utkarsh Kumra', 'kumra.utkarsh@yahoo.co.in', '32250170a0dca92d53ec9624f336ca24', '8287983838', '', '', 'dilli', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
