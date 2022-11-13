-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 03:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `AdminPassword` varchar(50) NOT NULL,
  `AdminAvatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminPassword`, `AdminAvatar`) VALUES
(1, 'admin', 'admin123', 'pf34.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adopter`
--

CREATE TABLE `adopter` (
  `AdopterID` int(11) NOT NULL,
  `PetID` int(11) NOT NULL,
  `AdoptTime` datetime(6) NOT NULL,
  `Notification` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopter`
--

INSERT INTO `adopter` (`AdopterID`, `PetID`, `AdoptTime`, `Notification`) VALUES
(1, 1, '2022-08-16 12:00:48.000000', 'Unread'),
(3, 3, '2022-08-09 21:16:35.000000', 'Unread'),
(4, 5, '2022-08-08 21:16:35.000000', 'Unread'),
(10, 6, '2022-08-08 21:21:49.000000', 'Unread'),
(2, 8, '2022-08-04 21:17:39.000000', 'Unread'),
(11, 12, '2022-08-17 21:17:39.000000', 'Unread'),
(3, 19, '2022-08-15 06:56:52.000000', 'Read'),
(1, 20, '2022-08-08 06:00:47.000000', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `AnnouncementID` int(11) NOT NULL,
  `AnnTitle` varchar(100) NOT NULL,
  `AnnContent` varchar(100) NOT NULL,
  `AnnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`AnnouncementID`, `AnnTitle`, `AnnContent`, `AnnDate`) VALUES
(1, 'Issued fixed', 'The bug #105 is fixed', '2022-07-18'),
(2, 'Maintenance', 'Maintenance will be conducted on this Friday, 22 July at 01:00AM.', '2022-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DonorID` int(11) NOT NULL,
  `PetID` int(11) NOT NULL,
  `DonateTIme` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DonorID`, `PetID`, `DonateTIme`) VALUES
(3, 1, '2022-08-09 15:10:31'),
(5, 2, '2022-08-09 15:10:52'),
(10, 3, '2022-08-09 15:10:52'),
(7, 4, '2022-08-09 15:11:15'),
(9, 5, '2022-08-09 15:11:15'),
(9, 6, '2022-08-09 15:11:15'),
(15, 7, '2022-08-09 15:11:15'),
(12, 8, '2022-08-09 15:11:15'),
(5, 9, '2022-08-09 15:11:15'),
(14, 10, '2022-08-09 15:11:15'),
(10, 11, '2022-08-09 15:11:15'),
(13, 12, '2022-08-09 15:11:15'),
(3, 13, '2022-08-09 15:11:15'),
(15, 14, '2022-08-09 15:12:47'),
(20, 15, '2022-08-09 15:12:47'),
(1, 16, '2022-07-22 15:09:07'),
(1, 17, '2022-07-23 10:12:59'),
(1, 18, '2022-07-23 10:13:36'),
(1, 19, '2022-08-01 12:03:16'),
(2, 20, '2022-08-08 04:54:40'),
(2, 21, '2022-08-08 06:08:07'),
(1, 22, '2022-08-08 06:12:52'),
(1, 34, '2022-08-10 05:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `FeedbackTitle` varchar(100) NOT NULL,
  `FeedbackContent` varchar(100) NOT NULL,
  `FeedbackDate` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `FeedbackTitle`, `FeedbackContent`, `FeedbackDate`, `UserID`) VALUES
(1, 'Good system', 'I have adopt a cute pet from KL friend!', '2022-08-22', 22),
(2, 'So nice', 'I love the developer', '2022-08-23', 3),
(3, 'So Cute!!!!', 'It is perfect function for me to edit profile picture! \r\nI love TikDog System!', '2022-08-24', 18),
(4, 'Great System', 'TikDog is the most creative web page I never seen before. The pop-up graphic so beautiful!! I like i', '2022-08-26', 14),
(5, 'Best Web ever', 'I love the layout and there is easy for me to switch identity!', '2022-08-29', 26);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `PetsID` int(11) NOT NULL,
  `PetName` varchar(100) NOT NULL,
  `PetBody` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Vaccinated` varchar(20) NOT NULL,
  `Spayed` varchar(20) NOT NULL,
  `Species` varchar(100) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `PetCondition` varchar(100) NOT NULL,
  `Dewormed` varchar(20) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `PetAge` int(20) NOT NULL,
  `PetStatus` varchar(100) NOT NULL,
  `DonorID` int(11) NOT NULL,
  `AdopterID` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`PetsID`, `PetName`, `PetBody`, `Color`, `Vaccinated`, `Spayed`, `Species`, `Gender`, `PetCondition`, `Dewormed`, `Image`, `PetAge`, `PetStatus`, `DonorID`, `AdopterID`, `Description`) VALUES
(1, 'Cookie', 'Skinny ', 'Gold', 'Yes', 'Yes', 'Golden Retirever', 'Female', 'Healthy ', 'No', 'goldretriever.jpg', 4, 'Adopted', 3, 1, 'Hi I\'m Cookie. I\'m looking for a family to take me home. I\'m active but very lovable & easy going. I know how to walk on a harness and leash.\r\n'),
(2, 'Bosco', 'Medium Size', 'Black, White', 'Yes', 'Yes', 'Mixed Breed', 'Male', 'Healthy', 'No', 'Bosco.jpg', 3, 'Available', 5, 0, 'Hey! I\'m Bosco. I was abandoned at R&R Serdang by my cruel and heartless owner. So, I\'m looking for a family to take me home now.'),
(3, 'BB', 'Small Size, Medium Fur', 'Cream', 'Yes', 'No', 'Poodle', 'Female', 'Healthy', 'Yes', 'bb.jpg', 8, 'Adopted', 10, 3, 'I\'m BB, and I willing to become part of your family.'),
(4, 'Goldie', 'Medium Size, Long Fur', 'Golden', 'Yes', 'Yes', 'Golden Retriever', 'Male', 'Healthy', 'Yes', 'goldie.jpg', 1, 'Available', 7, 0, 'I\'m a with Gentle soul, Love outdoor, and Mr. Nice Guy.'),
(5, 'Mobit', 'Medium Size, Medium Fur', 'Golden', 'No', 'No', 'Domestic Medium Hair', 'Female', 'Healthy', 'No', 'mobit.jpg', 2, 'Adopted', 9, 4, 'Mobit is an active outdoor female cat.'),
(6, 'Soya', 'Medium Size, Short Fur', 'White', 'Yes', 'Yes', 'Domestic Short Hair', 'Male', 'Minor Injury', 'Yes', 'soya.jpg', 1, 'Adopted', 9, 10, 'My name is Soya. I am almost a year old. I think you can officially call me a cat, not a kitten anymore. I love to play and run around.'),
(7, 'Maya', 'Medium Size, Medium Fur', 'Black', 'Yes', 'Yes', 'Mixed Breed', 'Female', 'Healthy', 'Yes', 'maya.jpg', 2, 'Available', 15, 0, 'Maya is fully vaccinated, spayed, healthy, active and get along with other dogs.\r\nCheeky and has unique characteristic'),
(8, 'Gracie', 'Small Size, Short Fur', 'Golden, Yellow, White', 'Yes', 'Yes', 'Domestic Short Hair', 'Male', 'Healthy', 'Yes', 'gracie.jpg', 2, 'Adopted', 12, 2, 'Gracie is like his name, very graceful and gentle cat. He loves to snuggle with human caretaker, loves company.'),
(9, 'Misty', 'Medium Size, Short Fur\r\n', 'White', 'Yes', 'Yes', 'Mixed Breed\r\n', 'Female', 'Healthy', 'Yes', 'misty.jpg', 9, 'Available', 5, 0, 'Misty is an energetic, friendly pup. She was found dumped by a river and has learnt to trust humans once again.'),
(10, 'Yoyo', 'Medium Size, Medium Fur\r\n', 'Cream, White\r\n', 'Yes', 'Yes', 'Poodle', 'Male', 'Healthy', 'No', 'yoyo.jpg', 3, 'Available', 14, 0, 'Take care of home, bark at strangers, playful & happy, cheerful and loyal, pure breed poodle. Looking for those who really love dogs and experienced with poodle.'),
(11, 'Hero', 'Medium Size, Short Fur\r\n', 'Cream', 'Yes', 'Yes', 'Mixed Breed\r\n', 'Female', 'Healthy', 'Yes', 'hero.jpg', 4, 'Available', 10, 0, 'Looking a good environment for him & get new owner who can continuously love him.'),
(12, 'Susi', 'Small Size, Short Fur\r\n', 'Black, Yellow\r\n', 'No', 'No', 'Domestic Short Hair\r\n', 'Female', 'Healthy', 'No', 'susi.jpg', 1, 'Adopted', 13, 11, 'Lovely black boy for adoption in Terengganu. Please give him a forever home sweet home. Need to be collected by Terengganu. TQ for saving the stray.'),
(13, 'TaoZi', 'Medium Size, Short Fur\r\n', 'Yellow, White\r\n', 'Yes', 'No', 'Domestic Short Hair\r\n', 'Male', 'Healthy', 'Yes', 'taozi.jpg', 1, 'Available', 3, 0, 'TaoZi, a 1-year-old male cat finding forever home\r\nAlready vaccinated and dewormed.'),
(14, 'Tommy', 'Large Size, Long Fur\r\n', 'Black, White\r\n', 'No', 'Yes', 'Domestic Long Hair\r\n', 'Male', 'Healthy', 'Yes', 'tommy.jpg', 3, 'Available', 15, 0, 'He is cuddly, playful and kind.'),
(15, 'Bear', 'Small Size, Medium Fur\r\n', 'Black, Brown, Gray\r\n', 'No', 'No', 'Mixed Breed\r\n', 'Male', 'Healthy', 'No', 'bear.jpg', 1, 'Available', 20, 0, 'He is very healthy but dirty. I am looking for serious adopter who can provide him a forever home and.'),
(16, 'Happy', '5KG', 'Brown', 'Yes', 'Yes', 'Shiba Inu', 'Male', 'Healthy', 'Yes', 'goldretriever.jpg', 2, 'Requesting', 1, 2, 'Testing\r\n'),
(17, 'TSK', '5KG', 'Brown', 'Yes', 'Yes', 'French Bulldog', 'Male', 'Healthy', 'Yes', 'soya.jpg', 1, 'Available', 1, 0, 'Testing'),
(18, 'Black', '3Kg', 'Black', 'Yes', 'Yes', 'Golden Retriever', 'Female', 'Weak', 'No', 'susi.jpg', 1, 'Available', 1, 0, 'Testing'),
(19, 'Testing', '5kg', 'Light Brown', 'Yes', 'Yes', 'Shiba Inu', 'Male', 'Good', 'Yes', 'maya.jpg', 1, 'Adopted', 1, 3, 'Good dog'),
(20, 'Cutie', '5kg', 'Light Brown', 'Yes', 'Yes', 'Shiba Inu', 'Male', 'Good', 'Yes', 'bb.jpg', 3, 'Adopted', 2, 1, 'Cute'),
(21, 'Soul', '5kg', 'Light Brown', 'Yes', 'Yes', 'Shiba Inu', 'Male', 'Good', 'Yes', 'soya.jpg', 2, 'Requesting', 2, 1, 'Hi'),
(22, 'Inoue Takina', '5kg', 'Light Brown', 'Yes', 'Yes', 'Shiba Inu', 'Female', 'Good', 'Yes', 'Bosco.jpg', 2, 'Requesting', 1, 3, 'Takina'),
(34, 'Testing', '5kg', 'Light Brown', 'Yes', 'Yes', 'Shiba Inu', 'Male', 'Good', 'Yes', 'taozi.jpg', 3, 'Available', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Avatar` varchar(100) NOT NULL,
  `SocialMedia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `DOB`, `Gender`, `ContactNumber`, `Email`, `Address`, `Location`, `Avatar`, `SocialMedia`) VALUES
(1, 'shadow', '12345', 'Thomas', 'Tan', '1999-02-23', 'Male', '012-3456789', 'zhong15@homtail.com', 'Adda Height', 'Kuala Lumpur', 'takina.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(2, 'testing', '12345', 'James', 'Chong', '2022-07-13', 'Male', '012-3456789', 'testing@hotmail.com', 'No 123, Jalan Abc, Taman ABC', 'Selangor', 'pf34.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(3, 'mpink2', '12345', 'Minta', 'Pink', '2021-12-10', 'Female', '012-3456789', 'mpink2@cbslocal.com', '29 Garrison Way', 'Pahang', 'pf1.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(4, 'nbrimilcome3', 'Eaqs0WX1pASc', 'Noelyn', 'Brimilcome', '2022-03-16', 'Female', '012-3456789', 'nbrimilcome3@hostgator.com', '216 Loftsgordon Way', 'Sabah', 'pf2.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(5, 'jblabber4', '9AS9XihZebG', 'Joana', 'Blabber', '2022-07-04', 'Female', '012-3456789', 'jblabber4@wired.com', '92 Kinsman Lane', 'Sabah', 'pf3.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(6, 'edrewry5', 'f6Eyc35aULq', 'Errick', 'Drewry', '2022-01-14', 'Male', '012-3456789', 'edrewry5@soup.io', '7 Butternut Court', 'Kuala Lumpur', 'pf4.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(7, 'gplayfair6', 'T6eldbaE', 'Gena', 'Playfair', '2021-12-08', 'Female', '012-3456789', 'gplayfair6@deviantart.com', '86667 Vermont Junction', 'Pahang', 'pf5.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(8, 'kshilston7', 'LMNrgYe9JOUN', 'Kathye', 'Shilston', '2021-10-06', 'Female', '012-3456789', 'kshilston7@virginia.edu', '71 Park Meadow Alley', 'Sarawak', 'pf6.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(9, 'cfehner8', 'E5gEGfY6zps', 'Cathe', 'Fehner', '2022-05-16', 'Female', '012-3456789', 'cfehner8@dedecms.com', '920 Mitchell Road', 'Kuala Lumpur', 'pf7.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(10, 'sbedford9', 'FkkMmXy', 'Sawyere', 'Bedford', '2021-12-10', 'Male', '012-3456789', 'sbedford9@amazon.com', '25328 Schurz Trail', 'Sarawak', 'pf8.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(11, 'csydera', 'jDIXdrbmh', 'Cordy', 'Syder', '2021-09-01', 'Female', '012-3456789', 'csydera@zdnet.com', '87 Stang Way', 'Melaka', 'pf9.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(12, 'hkennettb', 'cyyjrW0VuuoV', 'Hollie', 'Kennett', '2022-05-19', 'Female', '012-3456789', 'hkennettb@theglobeandmail.com', '8 Waywood Circle', 'Pahang', 'pf10.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(13, 'ibearc', 'UPuYG6C41g', 'Iago', 'Bear', '2022-01-20', 'Male', '012-3456789', 'ibearc@macromedia.com', '8 Arkansas Court', 'Pahang', 'pf11.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(14, 'lmacgillicuddyd', 'RdAmplKoQ9MW', 'Lou', 'MacGillicuddy', '2022-02-01', 'Female', '012-3456789', 'lmacgillicuddyd@edublogs.org', '91954 Oak Valley Drive', 'Pahang', 'pf12.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(15, 'cpetcheye', 'eJmYrdAkq7T', 'Cathe', 'Petchey', '2021-10-24', 'Female', '012-3456789', 'cpetcheye@unesco.org', '3836 Mcbride Terrace', 'Pulau Pinang', 'pf13.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(16, 'aeadenf', 'itxuW6', 'Agosto', 'Eaden', '2021-09-17', 'Male', '012-3456789', 'aeadenf@list-manage.com', '5 Bobwhite Crossing', 'Pahang', 'pf14.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(17, 'froydeng', '5WSGGsSX8xK', 'Felizio', 'Royden', '2022-05-08', 'Male', '012-3456789', 'froydeng@clickbank.net', '0288 Larry Street', 'Sabah', 'pf15.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(18, 'hscotneyh', 'Vh6vt6u', 'Hank', 'Scotney', '2021-11-27', 'Male', '012-3456789', 'hscotneyh@cpanel.net', '185 Shopko Trail', 'Kuala Lumpur', 'pf16.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(19, 'rkensetti', '2zVcgwBLU', 'Reina', 'Kensett', '2022-05-08', 'Female', '012-3456789', 'rkensetti@constantcontact.com', '617 Monument Center', 'Kuala Lumpur', 'pf17.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(20, 'hricksj', 'YZXhVlxQq', 'Heriberto', 'Ricks', '2022-01-03', 'Male', '012-3456789', 'hricksj@google.com.au', '78 Swallow Terrace', 'Sabah', 'pf18.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(21, 'ccecerek', 'Vr9sjSb42', 'Carmel', 'Cecere', '2022-02-25', 'Female', '012-3456789', 'ccecerek@microsoft.com', '584 Manley Trail', 'Kelantan', 'pf19.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(22, 'cdandyl', 'EgVTVeq', 'Cosmo', 'Dandy', '2022-01-13', 'Male', '012-3456789', 'cdandyl@blogs.com', '9 Hovde Court', 'Negeri Sembilan', 'pf20.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(23, 'csaunierm', 'u1cEW4s', 'Calli', 'Saunier', '2022-04-23', 'Female', '012-3456789', 'csaunierm@google.com.au', '336 Evergreen Way', 'Perlis', 'jp21.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(24, 'swildtn', 'Xgx53rZG00X1', 'Sadella', 'Wildt', '2022-03-13', 'Female', '012-3456789', 'swildtn@wix.com', '23775 Schlimgen Lane', 'Melaka', 'pf22.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(25, 'cmccorkindaleo', '5ftNLZ6O', 'Calley', 'McCorkindale', '2022-06-28', 'Female', '012-3456789', 'cmccorkindaleo@google.pl', '324 Graedel Crossing', 'Selangor', 'pf23.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(26, 'ajoselevitchp', 'i9zkOz4j', 'Aron', 'Joselevitch', '2022-06-23', 'Male', '012-3456789', 'ajoselevitchp@photobucket.com', '7 Cody Terrace', 'Perak', 'pf24.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(27, 'lperfordq', '3fhG0hgl0SgW', 'Lisetta', 'Perford', '2022-07-28', 'Female', '012-3456789', 'lperfordq@elpais.com', '725 Luster Crossing', 'Selangor', 'pf25.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(28, 'eshowlr', 'IJugTynXMVLM', 'Edvard', 'Showl', '2022-06-29', 'Non-bi', '012-3456789', 'eshowlr@usa.gov', '878 Merry Way', 'Perak', 'pf26.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(29, 'ashavels', 'OXRLeh410r', 'Arin', 'Shavel', '2022-04-17', 'Male', '012-3456789', 'ashavels@seesaa.net', '510 Lien Alley', 'Kuala Lumpur', 'pf27.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(30, 'gchatenett', 'WLooqdZzg', 'Giusto', 'Chatenet', '2022-03-01', 'Male', '012-3456789', 'gchatenett@netvibes.com', '6 Leroy Avenue', 'Kuala Lumpur', 'pf28.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(31, 'ecorkishu', 'x7pWQCEAPT6X', 'Edy', 'Corkish', '2021-09-04', 'Female', '012-3456789', 'ecorkishu@php.net', '6 Little Fleur Junction', 'Sabah', 'pf29.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(32, 'jkiosselv', 'ffP68l0tU7nL', 'Joeann', 'Kiossel', '2022-03-09', 'Female', '012-3456789', 'jkiosselv@fema.gov', '250 Springs Place', 'Kelantan', 'pf30.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(33, 'lpeltzw', '4O50nmmklsn', 'Lyndsay', 'Peltz', '2022-02-22', 'Female', '012-3456789', 'lpeltzw@deliciousdays.com', '44 Killdeer Circle', 'Selangor', 'pf31.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(34, 'jdemogex', 'Ct1WSFT1G', 'Jaquelin', 'Demoge', '2022-06-29', 'Female', '012-3456789', 'jdemogex@free.fr', '65 Blue Bill Park Avenue', 'Melaka', 'pf32.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(35, 'cwibrowy', 'qHJ8rIWw5m', 'Cecelia', 'Wibrow', '2021-08-18', 'Female', '012-3456789', 'cwibrowy@reddit.com', '80443 Logan Circle', 'Perak', 'pf33.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(36, 'pbotterellz', 'M4mmvZEp', 'Piotr', 'Botterell', '2022-06-18', 'Male', '012-3456789', 'pbotterellz@sohu.com', '9564 Springview Circle', 'Selangor', 'pf34.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(37, 'dkenewel10', 'plY7Eo6VAUkd', 'Darya', 'Kenewel', '2021-08-04', 'Female', '012-3456789', 'dkenewel10@webmd.com', '549 Glendale Drive', 'Terengganu', 'pf35.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(38, 'aschimann11', 'TCDm2ARDJGlL', 'Amery', 'Schimann', '2022-05-09', 'Male', '012-3456789', 'aschimann11@pinterest.com', '09 Dapin Plaza', 'Melaka', 'pf36.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(39, 'lrammell12', 'DBvLhYKozjKd', 'Latashia', 'Rammell', '2022-04-29', 'Female', '012-3456789', 'lrammell12@addthis.com', '48165 Basil Alley', 'Pahang', 'pf37.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(40, 'rwalthew13', 'HHmVI6', 'Ronalda', 'Walthew', '2021-09-18', 'Female', '012-3456789', 'rwalthew13@un.org', '39 Tennyson Parkway', 'Selangor', 'pf38.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(41, 'civachyov14', 'ExQdOcugBj', 'Charles', 'Ivachyov', '2021-10-15', 'Male', '012-3456789', 'civachyov14@yahoo.com', '5967 Lien Trail', 'Selangor', 'pf39.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(42, 'sconry15', 'Yh1SyrJSWL', 'Sanford', 'Conry', '2022-01-25', 'Male', '012-3456789', 'sconry15@booking.com', '5159 Heath Center', 'Selangor', 'pf40.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(43, 'vmccree16', '3SHW9GAJ', 'Veronike', 'McCree', '2022-05-20', 'Female', '012-3456789', 'vmccree16@archive.org', '4 Dixon Lane', 'Sabah', 'pf41.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(44, 'rlathwood17', 'gw1LoGsi', 'Rubi', 'Lathwood', '2021-11-08', 'Female', '012-3456789', 'rlathwood17@psu.edu', '48015 Heath Trail', 'Sabah', 'pf42.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(45, 'lmcgrory18', 'Rrp2x5sc', 'Lexy', 'McGrory', '2022-04-23', 'Female', '012-3456789', 'lmcgrory18@cloudflare.com', '4298 Grayhawk Center', 'Kedah', 'pf43.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(46, 'bdahler19', 'dnOSV4nBtE', 'Byrann', 'Dahler', '2022-02-27', 'Male', '012-3456789', 'bdahler19@adobe.com', '843 New Castle Terrace', 'Perak', 'pf44.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(47, 'delam1a', 'nTplkWOL4C', 'Devlin', 'Elam', '2022-02-22', 'Male', '012-3456789', 'delam1a@pagesperso-orange.fr', '13187 Transport Way', 'Selangor', 'pf45.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(48, 'kizod1b', 'RojlaukP5WqV', 'Karlene', 'Izod', '2021-08-17', 'Female', '012-3456789', 'kizod1b@arizona.edu', '32921 Darwin Court', 'Perak', 'pf46.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(49, 'npolye1c', 'RTm4OKc1a1Wf', 'Neal', 'Polye', '2021-10-04', 'Male', '012-3456789', 'npolye1c@auda.org.au', '77 Hazelcrest Trail', 'Sabah', 'profile.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(50, 'hvanzon1d', 'a0ChZ9OmFZHe', 'Henrik', 'Van Zon', '2021-12-02', 'Male', '012-3456789', 'hvanzon1d@samsung.com', '950 Burning Wood Crossing', 'Sabah', 'profile.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(51, 'tofallone1e', 'GF1CjxegPT', 'Travers', 'O\'Fallone', '2022-05-05', 'Male', '012-3456789', 'tofallone1e@pagesperso-orange.fr', '7661 Columbus Hill', 'Terengganu', 'profile.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(52, 'etregien1f', 'q5VET670t', 'Esmeralda', 'Tregien', '2022-07-05', 'Female', '012-3456789', 'etregien1f@intel.com', '55258 Calypso Plaza', 'Kedah', 'profile.jpg', 'https://www.linkedin.com/in/zhong-tan-9961401ba/'),
(74, 'hdfh345', '1234', 'Asdf', 'Asdf', '1932-10-14', 'Male', '012-3456789', 'zhong15@hotmail.com', 'hello world123', 'Location', '', 'www.facebook.com'),
(77, 'sadf2314', '1234', 'Asdf', 'Asdf', '1935-10-16', 'Male', '012-3456789', 'hello123@gmail.com', 'hello world123', 'Location', 'pf16.jpg', 'www.facebook.com'),
(78, 'fdsaf123', '1234', 'Asdf', 'Asdf', '1933-09-15', 'Male', '012-3456789', 'hello123@gmail.com', 'hello world123', 'Location', 'nino.png', 'www.facebook.com'),
(79, 'sdaf45', '1234', 'Sarf', 'Asdf', '1934-10-14', 'Male', '012-3456789', 'hello123@gmail.com', 'hello world123', 'Location', 'takina.jpg', 'www.facebook.com'),
(80, 'asdf5456', '1234', 'Asdf', 'Asdf', '1933-09-15', 'Male', '012-3456789', 'hello123@gmail.com', 'hello world123', 'Location', 'pf26.jpg', 'www.facebook.com'),
(81, 'sadf45', '1234', 'Asfd', 'Sdfa', '1932-08-15', 'Male', '012-3456789', 'hello123@gmail.com', 'hello world123', 'Location', 'pf16.jpg', 'www.facebook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `adopter`
--
ALTER TABLE `adopter`
  ADD PRIMARY KEY (`PetID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`AnnouncementID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`PetID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`PetsID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `AnnouncementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `PetsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
