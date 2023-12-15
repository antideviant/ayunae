-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 06:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `billingAddress` varchar(255) DEFAULT NULL,
  `biilingCity` varchar(150) DEFAULT NULL,
  `billingState` varchar(100) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `billingCountry` varchar(100) DEFAULT NULL,
  `shippingAddress` varchar(300) DEFAULT NULL,
  `shippingCity` varchar(150) DEFAULT NULL,
  `shippingState` varchar(100) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `shippingCountry` varchar(100) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `userId`, `billingAddress`, `biilingCity`, `billingState`, `billingPincode`, `billingCountry`, `shippingAddress`, `shippingCity`, `shippingState`, `shippingPincode`, `shippingCountry`, `postingDate`) VALUES
(6, 10, 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', '2023-06-20 10:50:44'),
(7, 12, '96-11-12kampung limau jalan pantai dalam', 'w.p', 'Kuala Lumpur', 59200, 'Malaysia', '96-11-12kampung limau jalan pantai dalam', 'w.p', 'Kuala Lumpur', 59200, 'Malaysia', '2023-06-27 14:05:39'),
(8, 15, 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', '2023-07-11 15:45:37'),
(9, 16, 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', '2023-07-11 18:39:16'),
(10, 18, 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', '2023-07-12 06:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productsize` varchar(255) DEFAULT NULL,
  `productId` int(11) NOT NULL,
  `productQty` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `productsize`, `productId`, `productQty`, `postingDate`) VALUES
(36, 13, 'XS', 60, 1, '2023-07-06 00:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `CatPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `createdBy`, `CatPhoto`) VALUES
(12, 'Moments Collection', 'Ayunae Collection', '2023-06-20 10:36:51', NULL, 1, 'admin/productimages/377e4b9c53756f6b8bfef3d92da5862a.png'),
(13, 'Raya Collection', 'Ayunae Collection ', '2023-06-20 12:47:28', '2023-07-06 00:54:20', 1, 'admin/productimages/0385ccc4ad35683bec80e11a981e3046.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `txnType` varchar(200) DEFAULT NULL,
  `txnNumber` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(120) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNumber`, `userId`, `addressId`, `totalAmount`, `txnType`, `txnNumber`, `orderStatus`, `orderDate`) VALUES
(15, 620360262, 10, 6, 159.00, 'Internet Banking', '12345', 'Packed', '2023-07-06 11:01:53'),
(16, 313301026, 10, 6, 507.00, 'Internet Banking', '12345', 'Cancelled', '2023-07-11 15:09:44'),
(17, 266043138, 15, 8, 318.00, 'Internet Banking', '12345', NULL, '2023-07-11 15:46:53'),
(18, 906985747, 16, 9, 338.00, 'e-Wallet', '12345', NULL, '2023-07-11 18:40:13'),
(19, 609226359, 18, 10, 338.00, 'Internet Banking', '12345', NULL, '2023-07-12 06:23:35'),
(20, 866068000, 10, 6, 169.00, 'Internet Banking', '12345', NULL, '2023-07-12 07:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `orderNumber`, `userId`, `productId`, `quantity`, `orderDate`, `orderStatus`) VALUES
(18, 885553287, 10, 30, 1, '2023-06-20 10:51:59', NULL),
(19, 620360262, 10, 61, 1, '2023-07-06 11:01:53', NULL),
(20, 313301026, 10, 59, 3, '2023-07-11 15:09:44', NULL),
(21, 266043138, 15, 61, 2, '2023-07-11 15:46:53', NULL),
(22, 906985747, 16, 60, 2, '2023-07-11 18:40:13', NULL),
(23, 609226359, 18, 60, 2, '2023-07-12 06:23:35', NULL),
(24, 866068000, 10, 60, 1, '2023-07-12 07:47:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `actionBy` int(3) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `canceledBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `actionBy`, `postingDate`, `canceledBy`) VALUES
(15, 14, 'Packed', 'test', 1, '2023-07-06 11:19:26', NULL),
(16, 14, 'Dispatched', 'test', 1, '2023-07-06 11:20:37', NULL),
(17, 15, 'Packed', 'test', 1, '2023-07-06 11:22:05', NULL),
(18, 16, 'Cancelled', 'wrong adress\r\n', NULL, '2023-07-11 15:14:00', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productsize` varchar(255) DEFAULT NULL,
  `productPrice` decimal(10,2) DEFAULT NULL,
  `productPriceBeforeDiscount` decimal(10,2) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` decimal(10,2) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `addedBy` int(11) DEFAULT NULL,
  `lastUpdatedBy` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productsize`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`, `addedBy`, `lastUpdatedBy`) VALUES
(34, 12, 23, 'Jasmin Dress - Maroon', 'Ayunae', 'XS, S, M, L,XL', 159.00, 179.00, 'Material - Korean Satin Volle\r\nEasy to iron & least crumple\r\nCooling & soft to skin\r\nDress with pocket\r\n', '377e4b9c53756f6b8bfef3d92da5862a.png', '38687ce35456d0c61e60835256768a34.png', '60da91bdb151d09cbfd21ad17d4d5833.png', 5.00, 'In Stock', '2023-06-27 12:45:24', '2023-06-27 18:17:13', 1, NULL),
(35, 12, 15, 'Jasmin Dress - Brown', 'Ayunae', 'XS, S, M, L,XL', 159.00, 179.00, 'Material - Korean Satin Volle\r\nEasy to iron & least crumple\r\nCooling & soft to skin\r\nDress with pocket\r\n', 'd971615f83e1cd5564cb5fb55021f0e1.png', 'd9ba4b65226c01235722fc1b7f05c0a2.png', 'fe43af174d6f56c02c5d903e713a0a3c.png', 5.00, 'In Stock', '2023-06-27 12:46:24', '2023-06-27 18:17:16', 1, NULL),
(36, 12, 23, 'Cleo Dress - Mint', 'Ayunae', 'XS, S, M, L,XL', 159.00, 179.00, 'Material - Matte Satin\r\nEasy to iron\r\nIncludes belt\r\nDress with pocket\r\n', '5ab8354d9e112935bd788f0a3317ce2a.png', 'f2623cd3757541c5856d8bccccf98065.png', '7744a68af6d3e4a2ad825f64eab1b1ea.png', 5.00, 'In Stock', '2023-06-27 12:47:35', '2023-06-27 18:17:18', 1, NULL),
(37, 12, 23, 'Cleo Dress - Mauve', 'Ayunae', 'XS, S, M, L,XL', 159.00, 179.00, 'Material - Matte Satin\r\nEasy to iron\r\nIncludes belt\r\nDress with pocket\r\n', 'c1583728eece0fd4ce62e629ebce8319.png', 'eee07bfbc059f53cae673cc62569eccc.png', 'e8d28298b2c1fc3a3434458becdd6414.png', 5.00, 'In Stock', '2023-06-27 12:48:21', '2023-06-27 18:17:20', 1, NULL),
(38, 12, 23, 'Cleo Dress - Fuschia', 'Ayunae', 'XS, S, M, L,XL', 159.00, 179.00, 'Material - Matte Satin\r\nEasy to iron\r\nIncludes belt\r\nDress with pocket\r\n', 'f4e2b1edcdd290ea81e183b02c86e237.png', '8f6adb5f879f6e8a61ada9a06daea26c.png', 'daeb9b8c2c852d9a6cbdbec0e4c583ed.png', 5.00, 'In Stock', '2023-06-27 12:49:17', '2023-06-27 18:17:22', 1, NULL),
(39, 13, 19, 'Anna Kurung - Black', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Cotton Linen Fabric\r\n\r\n', 'b3300c38d52de7dcc2d6cc252db2358c.png', 'ffe1aa99ff4e506af56dbce0ebf5f5ee.png', '84346b57e739ce80e27cc73c69c2813b.png', 5.00, 'In Stock', '2023-06-27 12:51:01', '2023-06-27 18:17:24', 1, NULL),
(40, 13, 19, 'Anna Kurung - Lime Blue', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Cotton Linen Fabric', 'f7ba5d1809ea905ceaa7c13ae9763256.png', '56d3bd8c91dc5076758a7855f3433df8.png', '', 5.00, 'In Stock', '2023-06-27 12:51:57', '2023-06-27 18:17:26', 1, NULL),
(41, 13, 19, 'Anna Kurung - Lime Cream', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Cotton Linen Fabric\r\n\r\n', 'c561ec9b15b8a63a2849f2041582e3c1.png', '0ae397362d0d5a05fb6aee86cb1f709e.png', '2f62794e4777c3257c07aabb5ae5ace2.png', 5.00, 'In Stock', '2023-06-27 12:53:08', '2023-06-27 18:17:27', 1, NULL),
(42, 13, 19, 'Anna Kurung - Maroon', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Cotton Linen Fabric\r\n\r\n', '0e081d28d156f68a480a5f47886bf851.png', 'f49d936321eba73db065b3ccca00c2cc.png', 'ea0608e4f32872179eb15d2a876745bb.png', 5.00, 'In Stock', '2023-06-27 12:53:52', '2023-06-27 18:17:29', 1, NULL),
(43, 13, 19, 'Anna Kurung - Salmon Blue', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Cotton Linen Fabric\r\n\r\n', '86ca5d3a7c6863e6c84112e1cc548437.png', 'ee4a2c0d3a54e842b42dce87417c2950.png', '4eff2674ebaaa401bfdd04fc2c970788.png', 5.00, 'In Stock', '2023-06-27 12:54:52', '2023-06-27 18:17:31', 1, NULL),
(44, 13, 19, 'Anna Kurung - Dusty Pink', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Cotton Linen Fabric\r\n\r\n', '5b9a86e098241f1b8ef25b90ed612ea1.png', 'f97ceefa3548896a06499fffcfbf2497.png', '709df714969dbd0ebbf7ca6cddfc3b35.png', 5.00, 'In Stock', '2023-06-27 12:55:33', '2023-06-27 18:17:33', 1, NULL),
(45, 13, 18, 'Kurung Riau Twist - Black', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Pearl Linen\r\nComes with detachable belt\r\nSkirt self tie pareo\r\n', '03c5756b6d0785d3f768feccd103b58f.jpg', '5f03c28f4d416b0725c7f3488df3a5d6.jpg', '459f95a8447a7a73d80b3dbbdc673504.png', 5.00, 'In Stock', '2023-06-27 12:58:34', '2023-06-27 18:17:35', 1, NULL),
(46, 13, 18, 'Kurung Riau Twist - Black Leaves', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Pearl Linen\r\nComes with detachable belt\r\nSkirt self tie pareo\r\n', 'd70a8fbf744be01b81794b5bf980184e.jpg', '2a83c6d9e4c702de234cf27a2606caff.jpg', '92409bbe3d314e00bbd27cf18e4f0eb9.jpg', 5.00, 'In Stock', '2023-06-27 12:59:31', '2023-06-27 18:17:36', 1, NULL),
(47, 13, 18, 'Kurung Riau Twist - Blue White', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Pearl Linen\r\nComes with detachable belt\r\nSkirt self tie pareo\r\n', 'ed75d7a6fc976e5c24e2bc99051c62aa.jpg', 'f5d762e62bb0cae0282316e8f7614b99.jpg', '582a9a233a15e5fa58cab15d3fbe485a.jpg', 5.00, 'In Stock', '2023-06-27 13:00:14', '2023-06-27 18:17:38', 1, NULL),
(48, 13, 18, 'Kurung Riau Twist - White Blue', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Pearl Linen\r\nComes with detachable belt\r\nSkirt self tie pareo\r\n', 'df619e22798b378329a9132db778a460.jpg', 'e2593fdb899ecc59b485fe08e895a7d9.jpg', '283b3c2801bf6fbe0cf8fb1c365c5a1b.jpg', 5.00, 'In Stock', '2023-06-27 13:01:02', '2023-06-27 18:17:40', 1, NULL),
(49, 13, 18, 'Kurung Riau Twist - Green', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Pearl Linen\r\nComes with detachable belt\r\nSkirt self tie pareo\r\n', 'be578844cf9cd97a80c4d5f5231a458a.jpg', '10a258f43e39ca644d62a119b3e24eff.jpg', '3184b3d43047fcd379019be00fb8c831.jpg', 5.00, 'In Stock', '2023-06-27 13:01:59', '2023-06-27 18:17:41', 1, NULL),
(50, 13, 18, 'Kurung Riau Twist - Orange', 'Ayunae', 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Pearl Linen\r\nComes with detachable belt\r\nSkirt self tie pareo\r\n', 'd9bbe8acf2554c502b4a60f29bdebf82.jpg', '774f4be0e360518523c9c40a25f6f748.jpg', 'd7a7f3e62bd9af3ec4e1cd766421d979.jpg', 5.00, 'In Stock', '2023-06-27 13:03:46', '2023-06-27 18:17:44', 1, 1),
(52, 13, 18, 'Kurung Riau Twist - White', NULL, 'XS, S, M, L,XL', 199.00, 219.00, 'Material - Pearl Linen\r\nComes with detachable belt\r\nSkirt self tie pareo\r\n', 'bedc3a09bd8c350a55441fdb2da2c7f3.jpg', '5e1f2090f728dd50bbcab2f76b4f2ed2.jpg', 'bedc3a09bd8c350a55441fdb2da2c7f3.jpg', 5.00, 'In Stock', '2023-06-27 18:42:46', NULL, 1, NULL),
(53, 13, 22, 'Kurung Pesak Twist - Black & Orange', NULL, 'XS, S, M, L,XL', 179.00, 199.00, 'Material - Printed Crepe + Como crepe (skirt)\r\nSkirt - Adjustable Pario Skirt\r\n', '73c4cd01d98f2e90105bd74b4ba683c9.jpg', '9cf947a564f1a5706321da62906f1f31.png', '73c4cd01d98f2e90105bd74b4ba683c9.jpg', 5.00, 'In Stock', '2023-06-27 18:46:02', NULL, 1, NULL),
(54, 13, 22, 'Kurung Pesak Twist - Peach', NULL, 'XS, S, M, L,XL', 179.00, 199.00, 'Material - Printed Crepe + Como crepe (skirt)\r\nSkirt - Adjustable Pario Skirt\r\n', 'e4f7855e577980b5241ffc73b483affc.jpg', '178a37aff68e0a349a4777c5becba2a2.png', 'e4f7855e577980b5241ffc73b483affc.jpg', 5.00, 'In Stock', '2023-06-27 18:46:53', NULL, 1, NULL),
(55, 13, 22, 'Kurung Pesak Twist - White Blue', NULL, 'XS, S, M, L,XL', 179.00, 199.00, 'Material - Printed Crepe + Como crepe (skirt)\r\nSkirt - Adjustable Pario Skirt\r\n', '45a137cb631d7291ade5ed3a8dfe6c82.jpg', '1c4db0f4dabe73f5c5109eb5af2e4aa6.png', '45a137cb631d7291ade5ed3a8dfe6c82.jpg', 5.00, 'In Stock', '2023-06-27 18:47:27', NULL, 1, NULL),
(56, 13, 21, 'Kimono Kurung - Artic', NULL, 'XS, S, M, L,XL', 169.00, 189.00, 'Material - Cotton, easy to iron. Hard to get wrinkles\r\n\r\n', 'c12c4679bddca3687d95681043f9265c.jpg', '743660b1fe2f8a158132e673fa86021e.png', 'c12c4679bddca3687d95681043f9265c.jpg', 5.00, 'In Stock', '2023-06-27 18:52:03', NULL, 1, NULL),
(57, 13, 21, 'Kimono Kurung - Black', NULL, 'XS, S, M, L,XL', 169.00, 189.00, 'Material - Cotton, easy to iron. Hard to get wrinkles', '92b64c96352f75e51cf5ee93f509ffa4.jpg', 'f847a223b508d1c5f2ebb08424bcc379.png', '92b64c96352f75e51cf5ee93f509ffa4.jpg', 5.00, 'In Stock', '2023-06-27 18:52:46', NULL, 1, NULL),
(58, 13, 21, 'Kimono Kurung - Fuschia', NULL, 'XS, S, M, L,XL', 169.00, 189.00, 'Material - Cotton, easy to iron. Hard to get wrinkles\r\n\r\n', '2f59c3e54d285514715d457d42be945c.jpg', 'b3fb90fd50c17a93ae08266ca891dc3b.png', '2f59c3e54d285514715d457d42be945c.jpg', 5.00, 'In Stock', '2023-06-27 18:53:27', NULL, 1, NULL),
(59, 13, 21, 'Kimono Kurung - Lavender', NULL, 'XS, S, M, L,XL', 169.00, 189.00, 'Material - Cotton, easy to iron. Hard to get wrinkles\r\n\r\n', 'e45aa98a9a1ea3227711eafcf32e95d6.jpg', '0ecbfaafe5047a5ae42ef8731eaf718a.png', 'e45aa98a9a1ea3227711eafcf32e95d6.jpg', 5.00, 'In Stock', '2023-06-27 18:54:05', NULL, 1, NULL),
(60, 13, 21, 'Kimono Kurung - Turquoise', NULL, 'XS, S, M, L,XL', 169.00, 189.00, 'Material - Cotton, easy to iron. Hard to get wrinkles\r\n\r\n', '2129fe42dd47ef17b172ebb259ed0e21.jpg', '22c65d09ab4fe9c568f24ebf3bd5b5b8.png', '2129fe42dd47ef17b172ebb259ed0e21.jpg', 5.00, 'In Stock', '2023-06-27 18:54:43', NULL, 1, NULL),
(61, 13, 20, 'Lily Kurung - Baby Blue', NULL, 'XS, S, M, L,XL', 159.00, 179.00, 'Material - Poly mix\r\nSkirt full lining\r\n', '0e23547f6ac5f445b351127dab0cffec.jpg', '5a6c77ee84d94e03b8c4afc2ab91d042.png', '0e23547f6ac5f445b351127dab0cffec.jpg', 5.00, 'In Stock', '2023-06-27 18:55:47', NULL, 1, NULL),
(62, 13, 20, 'Lily Kurung - Soft Pink', NULL, 'XS, S, M, L,XL', 159.00, 179.00, 'Material - Poly mix\r\nSkirt full lining\r\n', 'b23fb1670c6420fa46affe915fe0496b.jpg', '6048873b2f4c83531a1c20146168d5ed.png', 'b23fb1670c6420fa46affe915fe0496b.jpg', 5.00, 'Out of Stock', '2023-06-27 18:56:28', '2023-07-11 15:38:55', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategoryName` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategoryName`, `creationDate`, `updationDate`, `createdBy`) VALUES
(15, 12, 'Jasmine Dress', '2023-06-20 10:37:57', NULL, 1),
(17, 14, 'ayunae test collection', '2023-06-20 12:51:58', NULL, 1),
(18, 13, 'Kurung Riau Twist', '2023-06-21 05:09:52', NULL, 1),
(19, 13, 'Anna Kurung', '2023-06-21 05:16:18', NULL, 1),
(20, 13, 'Lily Kurung', '2023-06-27 12:39:35', '2023-06-27 12:42:06', 1),
(21, 13, 'Kimono Kurung', '2023-06-27 12:40:19', '2023-06-27 12:41:59', 1),
(22, 13, 'Kurung Pesak Twist', '2023-06-27 12:40:52', '2023-06-27 12:41:54', 1),
(23, 12, 'Cleo Dress', '2023-06-27 12:41:33', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactNumber` bigint(12) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `contactNumber`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 45231025890, '2022-01-24 16:21:18', '2023-06-20 10:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `regDate`, `updationDate`) VALUES
(10, 'Syaza Yusof', 'syaza123@gmail.com', 123456789, 'abbabf1a907ec8f2773e2ef79ef81e47', '2023-06-20 10:31:11', NULL),
(11, 'Aiman Daniel', 'aimandaniel545@gmail.com', 43743247367, '24775f4c046499d6494654258352495a', '2023-06-21 07:13:00', NULL),
(12, 'muhammad izzuddin bin saidan', 'izzuddin@gmail.com', 1121234371, 'd8578edf8458ce06fbc5bb76a58c5ca4', '2023-06-27 13:15:04', NULL),
(13, 'NURUL HUDA BINTI ABDUL RAHIM', 'shahril@gmail.com', 1234567890, 'd8578edf8458ce06fbc5bb76a58c5ca4', '2023-07-06 00:25:01', NULL),
(18, 'Sara Maya', 'saramaya@gmail.com', 123456789, '827ccb0eea8a706c4c34a16891f84e7b', '2023-07-12 06:20:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(11, 10, 33, '2023-06-21 07:54:53'),
(19, 15, 61, '2023-07-11 15:39:35'),
(27, 16, 61, '2023-07-11 18:38:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userrrid` (`userId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uiid` (`userID`),
  ADD KEY `piddd` (`productId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uidddd` (`userId`),
  ADD KEY `addressid` (`addressId`),
  ADD KEY `orderNumber` (`orderNumber`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidd` (`orderNumber`),
  ADD KEY `useridd` (`userId`),
  ADD KEY `productiddd` (`productId`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidddddd` (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catidddd` (`category`),
  ADD KEY `subCategory` (`subCategory`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catid` (`categoryid`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usseridddd` (`userId`),
  ADD KEY `ppiidd` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
