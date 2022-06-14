--
-- Database: `darms`
--
DROP database darms;
create database darms;
use darms;
-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `allocation_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `createdat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(10) NOT NULL,
  `doctorid` int(10) NOT NULL,
  `patientid` int(10) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `createdat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `doctorid`, `patientid`, `appointment_date`, `appointment_time`, `createdat`) VALUES
(1, 1, 4, '2022-06-09', '20:00:00', '2022-06-09'),
(2, 2, 2, '2022-06-10', '14:30:00', '2022-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(10) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_email` varchar(100) DEFAULT NULL,
  `patient_mobile` varchar(100) DEFAULT NULL,
  `patient_gender` varchar(50) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `guardian` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `createdat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_email`, `patient_mobile`, `patient_gender`, `Date_of_birth`, `guardian`, `patient_address`, `createdat`) VALUES
(1, 'Phylice Buari', 'buari@gmail.com', '0756453423', 'Female', '1982-08-03', 'Phyl Peters', 'Mlolongo, Nairobi', '2022-06-09'),
(2, 'Tiberius Peter', 'peter@gmail.com', '0722334455', 'Male', '2000-11-21', 'Phyl Peters', 'Nairobi', '2022-06-09'),
(3, 'Viona Bernard', 'bernard@gmail.com', '0732433454', 'Female', '2006-05-17', 'Vee vee', 'Andei', '2022-06-09'),
(4, 'Yvonne Kiama', 'kiama@gmail.com', '0786453243', 'Female', '2002-07-08', 'Kiama Kandai', 'Athi', '2022-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `pid` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `pdate` date NOT NULL,
  `diagnosis` varchar(150) NOT NULL,
  `rehab` varchar(150) NOT NULL,
  `instructions` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`pid`, `patient_id`, `pdate`, `diagnosis`, `rehab`, `instructions`) VALUES
(1, 0, '2009-06-22', '6t4e839iw0-pq=[wpeoiuryoiup9e[0owpq[y', 'rgtfdhyusioqp[wpoeidrufhyduwiqooweiru', 'tryeuwioqpoweiruewiqopwoeiur'),
(2, 0, '2010-06-22', 'fetwyhqASGD', 'HEWJIQLSA', 'HREU3KWJEHJW'),
(3, 0, '2010-06-22', 'JHGFDFRTYUIOP', 'IUYTREWQWERTYUI', 'TREW2Q1');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progress_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `therapist_id` int(10) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_status` varchar(50) NOT NULL,
  `no_of_beds` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE `timings` (
  `timing_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `dayavailable` varchar(30) DEFAULT NULL,
  `d_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`timing_id`, `doctor_id`, `start_time`, `end_time`, `dayavailable`, `d_status`) VALUES
(1, 0, '00:10:00', '00:02:00', 'monday', 'Active'),
(2, 0, '14:00:00', '16:00:00', 'thursday', 'Active'),
(3, 2, '09:00:00', '16:00:00', 'monday', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `t_timings`
--

CREATE TABLE `t_timings` (
  `timing_id` int(10) NOT NULL,
  `therapist_id` int(10) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `dayavailable` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_timings`
--

INSERT INTO `t_timings` (`timing_id`, `therapist_id`, `start_time`, `end_time`, `dayavailable`, `status`) VALUES
(1, 0, '10:30:00', '15:30:00', 'friday', 'Active'),
(2, 6, '09:30:00', '16:00:00', 'friday', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_mobile` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `createdat` date DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `user_name`, `user_mobile`, `user_email`, `user_password`, `createdat`, `user_role`, `gender`, `status`) VALUES
(1, 'Valerian Moraa', 'moraa', '0742526862', 'moraa@gmail.com', '5d7faa4f3269fd01a933e2783b959403', '2022-06-10', '', '', 'active'),
(2, 'Ryan Andrews', 'ryan', '0798786754', 'ryan@gmail.com', 'c5aa5eb3d973208cc09e091cf1f9c53b', '2022-06-09', 'doctor', 'male', 'active'),
(3, 'Valerian Moraa', 'moraa', '0723546763', 'moraa@gmail.com', '5d7faa4f3269fd01a933e2783b959403', '2022-06-09', 'receptionist', 'female', 'active'),
(4, 'Steph Raro', 'raro', '0789897676', 'raro@gmail.com', '4504bcf5be1dc2da1d6ac16e4cae9285', '2022-06-09', 'receptionist', 'male', 'active'),
(5, 'Valerian Moraa', 'moraa', '0712398735', 'moraa@gmail.com', '5d7faa4f3269fd01a933e2783b959403', '2022-06-09', 'therapist', 'female', 'active'),
(6, 'Robert Keske', 'keske', '0748665935', 'keske@gmail.com', '76a8777960d49fe67e0b58e9e5f88343', '2022-06-09', 'therapist', 'male', 'active'),
(7, 'admin', 'admin', '0700000000', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-06-09', NULL, 'male', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `doctorid` (`doctorid`),
  ADD KEY `patientid` (`patientid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `timings`
--
ALTER TABLE `timings`
  ADD PRIMARY KEY (`timing_id`);

--
-- Indexes for table `t_timings`
--
ALTER TABLE `t_timings`
  ADD PRIMARY KEY (`timing_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `allocation_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progress_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timings`
--
ALTER TABLE `timings`
  MODIFY `timing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_timings`
--
ALTER TABLE `t_timings`
  MODIFY `timing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `allocation_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patientid`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`therapist_id`) REFERENCES `users` (`user_id`);
COMMIT;


