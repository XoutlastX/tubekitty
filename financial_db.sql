-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 07:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_receivable`
--

CREATE TABLE `account_receivable` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `total_amount_due` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `balance_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_receivable`
--

INSERT INTO `account_receivable` (`id`, `customer_name`, `invoice_number`, `invoice_date`, `due_date`, `total_amount_due`, `amount_paid`, `balance_due`) VALUES
(0000000002, 'James Philip Gomera ', 0, '2023-02-20', '2023-02-28', 4500, 4000, 500),
(0000000004, 'sad', 0, '2023-02-19', '2023-02-19', 4500, 123, 4377);

-- --------------------------------------------------------

--
-- Table structure for table `adjustedtrialbalance_db`
--

CREATE TABLE `adjustedtrialbalance_db` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `ref_code` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adjustedtrialbalance_db`
--

INSERT INTO `adjustedtrialbalance_db` (`id`, `description`, `ref_code`, `date`, `amount`) VALUES
(1, 'Hello, I\'m James', 123456, '2023-02-18', 500),
(2, 'Hello, I\'m Christian', 456789, '2023-02-18', 456),
(3, 'Hello, I\'m Gken', 654987, '2023-02-18', 654987),
(4, 'Hello, I\'m Daryl', 852369, '2023-02-18', 852369),
(5, 'Hello, I\'m Hans', 654987, '2023-02-18', 654987),
(6, 'Hello, I\'m Higoy', 852369, '2023-02-18', 852369),
(12, 'Hello, I\'m Gken Zapanta', 654987, '2023-02-18', 654987);

-- --------------------------------------------------------

--
-- Table structure for table `budget_request`
--

CREATE TABLE `budget_request` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Unit_Price` int(11) NOT NULL,
  `Total_Cost` int(11) NOT NULL,
  `Justification` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `status` text NOT NULL DEFAULT 'pending',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget_request`
--

INSERT INTO `budget_request` (`id`, `category`, `Description`, `Quantity`, `Unit_Price`, `Total_Cost`, `Justification`, `Notes`, `status`, `date`) VALUES
(1, 'office supplies', 'pens, paper, and printer ink', 5, 10000, 50000, 'This column would explain why each item or expense is necessary. For example, if you are requesting funds for a software license, you might explain how this software will help you complete your work more efficiently.', 'In this column, you can include any additional information or comments that might be relevant to the budget request.', 'denied', '2023-02-18'),
(2, 'software licenses', 'premium Account ', 2, 1500, 3000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis totam dolores atque adipisci minima exercitationem consectetur id ut, quia saepe quae error veritatis esse recusandae a perferendis repellat explicabo suscipit.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis totam dolores atque adipisci minima exercitationem consectetur id ut, quia saepe quae error veritatis esse recusandae a perferendis repellat explicabo suscipit.', 'approved', '2023-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `chartofaccount_db`
--

CREATE TABLE `chartofaccount_db` (
  `id` int(11) NOT NULL,
  `account_number` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_category` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chartofaccount_db`
--

INSERT INTO `chartofaccount_db` (`id`, `account_number`, `account_name`, `account_category`, `date_added`) VALUES
(1, 123456789, 'Christian Capitle', '12345', '2023-02-17 19:09:25'),
(2, 456789123, 'Gken Zapanta', '456789', '2023-02-17 19:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `collection_db`
--

CREATE TABLE `collection_db` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `account_number` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `ref_number` int(20) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mode_of_payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_db`
--

INSERT INTO `collection_db` (`id`, `name`, `image`, `account_number`, `description`, `particular`, `ref_number`, `date_received`, `mode_of_payment`) VALUES
(1, 'James Philip Gomera', '19cdd73911e95c8e1f61a0f682573472.jpg', 123564798, 'Hello, I\'m James Philip', 'Particular', 123, '2023-02-17 22:07:05', 'Gcash'),
(2, 'Christian Capitle', '2c02debd83afa1789b742279687d377a.jpg', 123456789, 'Hello, I\'m Gken Zapanta', 'Particular', 465, '2023-02-17 22:08:40', 'Paymaya'),
(4, 'Mema', '800wm.jpg', 123654, 'Test', 'Particular', 123456789, '2023-02-27 16:00:00', 'Gcash'),
(5, 'Old Woman', '301533071_1050082949034837_4907851051447303502_n.jpg', 1991912, 'Hello, I\'m Old Woman', 'Particulars', 1234562, '2023-02-24 16:00:00', 'Paymaya');

-- --------------------------------------------------------

--
-- Table structure for table `disbursement_db`
--

CREATE TABLE `disbursement_db` (
  `id` int(11) NOT NULL,
  `payee_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `reference_method` varchar(30) NOT NULL,
  `date_incurred` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disbursement_db`
--

INSERT INTO `disbursement_db` (`id`, `payee_name`, `description`, `payment_type`, `amount`, `payment_method`, `reference_method`, `date_incurred`) VALUES
(1, 'James Philip Gomera', 'I already paid my debt', 'online payment', 5000, 'gcash', 'K78PW8', '2023-02-09'),
(2, 'Christian Capitle', 'I already paid my miscellaneuos fee', 'cash', 4975, 'cashier', 'T8R5SY6', '2023-02-04'),
(3, 'Gken Zapanta', 'I\'m Gken Joy, masarap kahit walang manok', 'online payment', 5000, 'paymaya', 'K78PW8', '2023-02-27'),
(4, 'Victor Higoy', 'Higoy', 'online payment', 10000, 'gcash', 'K78PW8', '2023-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `incomestatement_db`
--

CREATE TABLE `incomestatement_db` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `salary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incomestatement_db`
--

INSERT INTO `incomestatement_db` (`id`, `name`, `position`, `office`, `age`, `start_date`, `salary`) VALUES
(1, 'Airi Satou	', 'Accountant', 'Tokyo', 33, '2008-11-28', '$162,700\r\n'),
(2, 'Angelica Ramos	', 'Chief Executive Officer (CEO)	', 'London', 47, '2009-10-09', '$1,200,000\r\n'),
(3, 'Christian Capitle', 'Manager', 'Manila', 22, '2023-02-18', '$500,000');

-- --------------------------------------------------------

--
-- Table structure for table `journalentry_db`
--

CREATE TABLE `journalentry_db` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `account_name` varchar(255) NOT NULL,
  `journals` int(30) NOT NULL,
  `debit` int(30) NOT NULL,
  `credit` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journalentry_db`
--

INSERT INTO `journalentry_db` (`id`, `date`, `account_name`, `journals`, `debit`, `credit`) VALUES
(1, '2023-02-18', 'Gken Zapanta', 6545484, 9123456, 98765432),
(2, '2023-02-18', 'Victor Higoy', 12345678, 9123456, 98765432);

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE `sales_report` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fund_source` varchar(50) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `date_and_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `status2` text NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_report`
--

INSERT INTO `sales_report` (`id`, `name`, `fund_source`, `total_amount`, `date_and_time`, `status`, `status2`) VALUES
(1, 'System Architect	', 'Payroll', 40000, '2023-02-18 05:01:11', 'Active', 'Approved'),
(2, 'System Architect	', 'Payroll', 40000, '2023-02-18 05:01:11', 'Inactive', 'Denied');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `email`, `password`, `date`) VALUES
(1, 'capitle@gmail.com', 'a66abb5684c45962d887564f08346e8d', '2023-02-20 17:45:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_receivable`
--
ALTER TABLE `account_receivable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjustedtrialbalance_db`
--
ALTER TABLE `adjustedtrialbalance_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_request`
--
ALTER TABLE `budget_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chartofaccount_db`
--
ALTER TABLE `chartofaccount_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_db`
--
ALTER TABLE `collection_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disbursement_db`
--
ALTER TABLE `disbursement_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomestatement_db`
--
ALTER TABLE `incomestatement_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journalentry_db`
--
ALTER TABLE `journalentry_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_receivable`
--
ALTER TABLE `account_receivable`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adjustedtrialbalance_db`
--
ALTER TABLE `adjustedtrialbalance_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `budget_request`
--
ALTER TABLE `budget_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chartofaccount_db`
--
ALTER TABLE `chartofaccount_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collection_db`
--
ALTER TABLE `collection_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `disbursement_db`
--
ALTER TABLE `disbursement_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incomestatement_db`
--
ALTER TABLE `incomestatement_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `journalentry_db`
--
ALTER TABLE `journalentry_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
