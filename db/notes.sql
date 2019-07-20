SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE 'uploads' (
  'file_id' int(11) NOT NULL,
  'file_name' varchar(225) NOT NULL,
  'file_description' text NOT NULL,
  'file_type' varchar(225) NOT NULL,
  'file_uploader' varchar(225) NOT NULL,
  'file_uploaded_on' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  'file_uploaded_to' varchar(225) NOT NULL,
  'file' varchar(225) NOT NULL,
  'status' varchar(225) NOT NULL DEFAULT 'not approved yet'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Inserting data for table 'uploads'
--


-- --------------------------------------------------------


-- Table structure for table 'users'


CREATE TABLE 'users' (
  'id' int(11) NOT NULL,
  'username' varchar(225) NOT NULL,
  'name' varchar(225) NOT NULL,
  'about' varchar(300) NOT NULL DEFAULT 'N/A',
  'role' varchar(225) NOT NULL,
  'email' varchar(225) NOT NULL,
  'token' varchar(225) NOT NULL,
  'gender' varchar(225) NOT NULL,
  'password' varchar(225) NOT NULL,
  'course' varchar(225) NOT NULL,
  'image' varchar(225) NOT NULL DEFAULT 'profile.jpg',
  'joindate' varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--
-- Indexes for table 'uploads'
--
ALTER TABLE 'uploads'
  ADD PRIMARY KEY ('file_id');

--
-- Indexes for table 'users'
--
ALTER TABLE 'users'
  ADD PRIMARY KEY ('id');

--
-- AUTO_INCREMENT for inserted tables
--

--
-- AUTO_INCREMENT for table 'uploads'
--
ALTER TABLE 'uploads'
  MODIFY 'file_id' int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table 'users'
--
ALTER TABLE 'users'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
