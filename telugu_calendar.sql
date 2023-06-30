-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 09:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telugu_calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `lyrics` text DEFAULT NULL,
  `audio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audios`
--

INSERT INTO `audios` (`id`, `title`, `image`, `lyrics`, `audio`) VALUES
(1, 'Hara Hara Mahadev', 'upload/audio/1764-2023-01-13.jpg', '	Abhilipsa Panda, Jeetu Sharma,', 'upload/mp3/6469-2023-01-13.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `balli_sasthram`
--

CREATE TABLE `balli_sasthram` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balli_sasthram`
--

INSERT INTO `balli_sasthram` (`id`, `title`, `description`) VALUES
(1, 'బల్లి శాస్త్రం స్త్రీలకు', 'స్త్రీలు ఎక్కువగా వంటగదిలోనే ఉంటారు, బల్లులు కూడా అక్కడే ఎక్కువగా ఉంటాయి. దీని ఆధారంగా స్త్రీలపైనే బల్లి ఎక్కువగా పడే అవకాశం ఉంది. స్త్రీల శరీరం పై ఎక్కడ పడితే లాభం ఎక్కడ పడితే లాభం లాంటి విషయాలను తెలుసుకుందాం.');

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `festival` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`id`, `date`, `festival`) VALUES
(1, '2023-01-17', 'Pongal'),
(2, '2022-11-24', 'Diwali');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `muhurtham`
--

CREATE TABLE `muhurtham` (
  `id` int(11) NOT NULL,
  `muhurtham` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muhurtham`
--

INSERT INTO `muhurtham` (`id`, `muhurtham`) VALUES
(1, 'Marriage Muhurtham'),
(2, 'Kids Name Muhurtham'),
(3, 'Home Muhurtham'),
(4, 'Vehicle Muhurtham');

-- --------------------------------------------------------

--
-- Table structure for table `muhurtham_tab`
--

CREATE TABLE `muhurtham_tab` (
  `id` int(11) NOT NULL,
  `muhurtham_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muhurtham_tab`
--

INSERT INTO `muhurtham_tab` (`id`, `muhurtham_id`, `title`, `description`) VALUES
(4, 3, 'Hello Everyone', 'This is the sample');

-- --------------------------------------------------------

--
-- Table structure for table `namakaram`
--

CREATE TABLE `namakaram` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `namakaram`
--

INSERT INTO `namakaram` (`id`, `title`, `description`) VALUES
(1, 'కాకి శాస్త్రం', 'కాకి తన్నితే అశుభం అంటారు. కాకి ఇంటి ముందు వచ్చి అరుస్తే చుట్టాలు వస్తారని అంటారు. ఇలా కాకి మన దగ్గరికి వచ్చి చేసే పనుల వల్ల శుభాలు, అశుభాలు జరుగుతాయని శాస్త్రం చెబుతుంది.\r\nఇలాంటి కాకి శాస్త్రాన్ని గతంలో మన పూర్వీకులు, పెద్దలు చదివేవారు. ప్రస్తుతం ఈ కాకి శాస్త్రాన్ని ఎవరూ పట్టించుకోవడం లేదు. అయితే ముందుజాగ్రత్తగా కాకి శాస్త్రం గురించి తెలుసుకోవడం ఎంతకైనా మంచిదే.');

-- --------------------------------------------------------

--
-- Table structure for table `panchangam`
--

CREATE TABLE `panchangam` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `sunrise` text DEFAULT NULL,
  `sunset` text DEFAULT NULL,
  `moonrise` text DEFAULT NULL,
  `moonset` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panchangam`
--

INSERT INTO `panchangam` (`id`, `date`, `sunrise`, `sunset`, `moonrise`, `moonset`) VALUES
(1, '2022-09-17', '06:07', '06:15', '23:22', '12:09'),
(2, '2022-09-22', '21:36', '21:36', '21:36', '21:36'),
(3, '2022-09-18', '23:54', '23:54', '23:54', '23:54'),
(4, '2022-09-23', '06:08', '18:06', '03:42', '16:48'),
(5, '0000-00-00', 'sunrise', 'sunset', 'moonrise', 'moonset'),
(6, '2022-09-07', '13:25', '14:05', '11:48', '22:50'),
(7, '2023-01-01', '12:05', '12:04', '13:06', '10:07');

-- --------------------------------------------------------

--
-- Table structure for table `panchangam_variant`
--

CREATE TABLE `panchangam_variant` (
  `id` int(11) NOT NULL,
  `panchangam_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panchangam_variant`
--

INSERT INTO `panchangam_variant` (`id`, `panchangam_id`, `title`, `description`) VALUES
(1, 1, '01-01-2022', 'Diwali ugadi'),
(19, 1, 'వారము ', '                                                                                                                                                                                                                                                                          శనివారము'),
(20, 1, 'నక్షత్రం', '                              రోహిణి  : సెప్టెంబర్ 16 09:55 AM - సెప్టెంబర్ 17 12:21PM మృగశిర    : సెప్టెంబర్ 17 12:21 PM - సెప్టెంబర్ 18 03:11 PM'),
(21, 1, 'యోగం ', '                                  వజ్రము 05:50 AM'),
(22, 1, 'కరణం ', '                       భధ్ర 01:03 AM, భవ 02:14 PM'),
(24, 1, 'యమగండము ', '                               02:00 PM - 03:41 PM'),
(25, 1, 'వర్జ్యం  ', '                               06:37 PM - 08:24 PM'),
(26, 1, 'గుళికా ', '                          ఉ. 10:30 - సా. 2:00, అష్టమి '),
(28, 3, 'Test', 'Test'),
(29, 4, '23 - భాద్రపద - శుభకృతు - దక్షిణాయనం', 'ప్రదోష వ్రతం - మాఘ స్మారక'),
(30, 4, 'వారపు రోజు', 'శుక్రవారం'),
(31, 4, 'తిథి', 'త్రయోదశి : Sep 23 1:17 am to Sep 24 2:31 am \r\nతుర్దశి : Sep 24 2:31 am to Sep 25 3:12 am'),
(32, 4, 'నక్షత్రం', 'మఖ: Sep 23 2:03 am to Sep 24 3:50 am\r\nపుబ్బ: Sep 24 3:50 am to Sep 25 5:07 am'),
(33, 4, 'యోగం', 'సిద్ధ: Sep 22 9:44 am to Sep 23 9:55 am\r\nసాధ్య: Sep 23 9:55 am to Sep 24 9:42 am'),
(34, 4, 'కరణం', 'గరజ: Sep 23 1:18 am to Sep 23 1:58 pm\r\nవనిజ: Sep 23 1:58 pm to Sep 24 2:31 am\r\nవిష్టి: Sep 24 2:31 am to Sep 24 2:55 pm'),
(35, 4, 'అభిజిత్ ముహుర్తాలు', '11:44 am to 12:32 pm'),
(36, 4, 'అమృతకాలము', '1:16 AM to 2:59 am'),
(37, 4, 'బ్రహ్మ ముహూర్తం', '4:32 am to 5:20 am'),
(38, 4, 'రాహు', '10:38 am to 12:08 pm'),
(39, 4, 'యమగండం', '3:08 pm to 4:38 pm'),
(40, 4, 'గుళికా', '7:38 am to 9:08 am'),
(41, 4, 'దుర్ముహూర్తం', '8:32 am to 9:20 am\r\n12:32 pm to 1:20 pm'),
(42, 4, 'వర్జ్యం', '12:16 pm – 1:57 pm'),
(43, 7, 'నక్షత్రం', 'Karanam');

-- --------------------------------------------------------

--
-- Table structure for table `rashi`
--

CREATE TABLE `rashi` (
  `id` int(11) NOT NULL,
  `rashi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rashi`
--

INSERT INTO `rashi` (`id`, `rashi`) VALUES
(1, 'Mesham');

-- --------------------------------------------------------

--
-- Table structure for table `rashi_tab`
--

CREATE TABLE `rashi_tab` (
  `id` int(11) NOT NULL,
  `rashi_id` int(11) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rashi_tab`
--

INSERT INTO `rashi_tab` (`id`, `rashi_id`, `year`, `month`, `title`, `description`) VALUES
(1, 1, '2023', 'March', 'This is My rashi', 'మిమ్మల్ని ప్రశాంతంగా, కూల్ గా ఉంచగల పనులలో నిమగ్నమవండి. చిరకాలంగా వసూలవని బాకీలు వసూలు కావడం వలన ఆర్థిక పరిస్థితి మెరుగుపడుతుంది. మిత్రులతో గడిపే సాయంత్రాలు, లేదా షాపింగ్ ఎక్కువ సంతోషదాయకమే కాక ఉద్వేగభరిత ఉత్సాహాన్ని ఇస్తాయి. ప్రతిరోజూ ప్రేమలో పడడం అనే స్వభావాన్ని మార్చుకొండి. మీరూపురేఖలను, వ్యక్తిత్వాన్ని, మెరుగు పరుచుకోవడానికి, చేసిన పరిశ్రమ మీకు సంతృప్తిని కలిగిస్తుంది. వైవాహిక జీవితంలో క్లిష్టతరమైన దశ తర్వాత ఈ రోజు మీకు కాస్త ఉపశమనాన్ని కలిగిస్తుంది. మీరు ఈరోజు అన్నిభాదలను మర్చిపోతారు,సృజనాత్మకంగా ఆలోచించటానికి ప్రయత్నిస్తారు.');

-- --------------------------------------------------------

--
-- Table structure for table `sissu_janma`
--

CREATE TABLE `sissu_janma` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sissu_janma`
--

INSERT INTO `sissu_janma` (`id`, `title`, `description`) VALUES
(1, 'లక్ష్మీ అనుగ్రహం ఉంటుంది ', 'ఎవరి ఇంట్లోనైనా నీటితో ఉన్న కుండపో వాలితే ఆ ఇంటికి త్వరలోనే లక్ష్మీదేవి రాబోతోందని, అంటే సంపద మెండుగా లభించనుందని అర్ధం.');

-- --------------------------------------------------------

--
-- Table structure for table `temples`
--

CREATE TABLE `temples` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temples`
--

INSERT INTO `temples` (`id`, `name`, `description`, `location`, `image`) VALUES
(1, 'Yaganti Temple', 'Sri Yaganti Uma Maheswara Temple or Yaganti is a temple of Shiva in Nandyal district in the India state of Andhra Pradesh. It was built according to Vaishnavaite traditions.', 'Yaganti, Andhra Pradesh', 'upload/temples/6112-2023-01-18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `year` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`) VALUES
(1, '2021'),
(2, '2022'),
(3, '2023'),
(4, '2024'),
(5, '2025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balli_sasthram`
--
ALTER TABLE `balli_sasthram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muhurtham`
--
ALTER TABLE `muhurtham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muhurtham_tab`
--
ALTER TABLE `muhurtham_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `namakaram`
--
ALTER TABLE `namakaram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panchangam`
--
ALTER TABLE `panchangam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panchangam_variant`
--
ALTER TABLE `panchangam_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rashi`
--
ALTER TABLE `rashi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rashi_tab`
--
ALTER TABLE `rashi_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sissu_janma`
--
ALTER TABLE `sissu_janma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temples`
--
ALTER TABLE `temples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balli_sasthram`
--
ALTER TABLE `balli_sasthram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `muhurtham`
--
ALTER TABLE `muhurtham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `muhurtham_tab`
--
ALTER TABLE `muhurtham_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `namakaram`
--
ALTER TABLE `namakaram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panchangam`
--
ALTER TABLE `panchangam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `panchangam_variant`
--
ALTER TABLE `panchangam_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rashi`
--
ALTER TABLE `rashi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rashi_tab`
--
ALTER TABLE `rashi_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sissu_janma`
--
ALTER TABLE `sissu_janma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temples`
--
ALTER TABLE `temples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
