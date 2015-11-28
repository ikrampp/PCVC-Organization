-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2015 at 12:13 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcvc`
--
CREATE DATABASE IF NOT EXISTS `pcvc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pcvc`;

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `client_id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` varchar(25) NOT NULL,
  `enrolled_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`client_id`, `name`, `address`, `phonenumber`, `enrolled_by`, `status`) VALUES
(1000, 'testname', 'address_column', '1234567890', 'enrolledby_value', 'status value'),
(1001, 'myname', '', '9943623486', 'socialworker1', 'INTAKE');

-- --------------------------------------------------------

--
-- Table structure for table `client_form_details`
--

CREATE TABLE `client_form_details` (
  `id` int(25) NOT NULL,
  `client_id` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `timestamp` date NOT NULL,
  `form_json_data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_form_details`
--

INSERT INTO `client_form_details` (`id`, `client_id`, `status`, `timestamp`, `form_json_data`) VALUES
(500, 1000, 'status values', '2015-11-28', '{"markers": [\r\n		{\r\n			"point":new GLatLng(40.266044,-74.718479), \r\n			"homeTeam":"Lawrence Library",\r\n			"awayTeam":"LUGip",\r\n			"markerImage":"images/red.png",\r\n			"information": "Linux users group meets second Wednesday of each month.",\r\n			"fixture":"Wednesday 7pm",\r\n			"capacity":"",\r\n			"previousScore":""\r\n		},\r\n		{\r\n			"point":new GLatLng(40.211600,-74.695702),\r\n			"homeTeam":"Hamilton Library",\r\n			"awayTeam":"LUGip HW SIG",\r\n			"markerImage":"images/white.png",\r\n			"information": "Linux users can meet the first Tuesday of the month to work out harward and configuration issues.",\r\n			"fixture":"Tuesday 7pm",\r\n			"capacity":"",\r\n			"tv":""\r\n		},\r\n		{\r\n			"point":new GLatLng(40.294535,-74.682012),\r\n			"homeTeam":"Applebees",\r\n			"awayTeam":"After LUPip Mtg Spot",\r\n			"markerImage":"images/newcastle.png",\r\n			"information": "Some of us go there after the main LUGip meeting, drink brews, and talk.",\r\n			"fixture":"Wednesday whenever",\r\n			"capacity":"2 to 4 pints",\r\n			"tv":""\r\n		},\r\n] }'),
(501, 1001, 'INTAKE', '2015-11-29', '{"client_id":"1001","client_name":"myname","client_date_of_admission":"","client_phonenumber":"9943623486","client_old_address":"","client_new_address":"","client_dob_mm":"","client_dob_dd":"","client_dob_yyyy":"","client_qualifiaction":"Uneducated","client_occupation":"Student","client_marital_status":"Married","client_relationship_period":"","client_children":"","client_religion":"Hindu","client_caretaker":"Spouse","client_caretaker_name":"","client_caretaker_occupation":"Student","client_incident_date_mm":"","client_incident_date_dd":"","client_incident_date_yyyy":"","client_causative_reason":"Kerosene","client_incident_cause":"Accident","client_offender_relationship":"","client_dv_reason":"Physical","client_admitted_person":"Police","client_enrolled_by":"socialworker1","submit":"Submit"}');

-- --------------------------------------------------------

--
-- Table structure for table `social_worker_details`
--

CREATE TABLE `social_worker_details` (
  `id` int(25) NOT NULL,
  `login_username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `pincode` int(25) DEFAULT NULL,
  `phonenumber` varchar(25) DEFAULT NULL,
  `role` varchar(25) NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_worker_details`
--

INSERT INTO `social_worker_details` (`id`, `login_username`, `password`, `name`, `address`, `city`, `pincode`, `phonenumber`, `role`, `timestamp`) VALUES
(3000, 'socialworkerusername', 'password', 'socialworker1', 'address_socialworker', 'chennai', 600001, '1234567890', 'role1', '2015-11-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_form_details`
--
ALTER TABLE `client_form_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_worker_details`
--
ALTER TABLE `social_worker_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_form_details`
--
ALTER TABLE `client_form_details`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
