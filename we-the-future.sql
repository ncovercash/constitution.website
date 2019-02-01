-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 01 fév. 2019 à 14:57
-- Version du serveur :  10.3.12-MariaDB-log
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `we-the-future`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `ID` int(10) UNSIGNED NOT NULL,
  `QUESTION_ID` int(10) UNSIGNED NOT NULL,
  `CORRECT` tinyint(1) NOT NULL DEFAULT 0,
  `TEXT` mediumtext NOT NULL,
  `EXPLANATION` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`ID`, `QUESTION_ID`, `CORRECT`, `TEXT`, `EXPLANATION`) VALUES
(1, 1, 1, 'True', 'these acts limited trade between British colonies in order to make them more dependent.'),
(2, 1, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(3, 2, 1, 'True', 'this act used Britain\'s supply advantage to charge taxes on sugar.'),
(4, 2, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(5, 3, 1, 'True', 'this act was used to tax papers and documents.'),
(6, 3, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(7, 4, 1, 'True', 'this act, although it repealed the Stamp Act, stated that Britain held full authority to declare any laws in its colonies without colonial approval.'),
(8, 4, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(9, 5, 1, 'True', 'these taxes increased the cost of many goods, including glass, paint, tea, lead, and paper.'),
(10, 5, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(11, 6, 1, 'True', 'these acts caused a multitude of effects: closing the Boston port until the ruined tea was paid for, placing Massachusetts under military rule, forcing the quartering of troops, and allowing the escape of British officials who wounded colonists while enforcing the law.'),
(12, 6, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(13, 7, 1, 'True', 'this act required colonists to house and feed British troops.'),
(14, 7, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(15, 8, 1, 'True', 'this prevented colonists from settling newly won land in the Ohio River Valley.'),
(16, 8, 0, 'False', 'this/these act(s)/law(s) is/are British and led in some way to the American Revolution.'),
(17, 9, 0, 'True', 'this/these is/are not British law(s)/act(s) and did not lead to the American Revolution'),
(18, 9, 1, 'False', 'this is not the name of a British act which affected the colonists.'),
(19, 10, 0, 'True', 'this/these is/are not British law(s)/act(s) and did not lead to the American Revolution'),
(20, 10, 1, 'False', 'this is not the name of a British act which affected the colonists.'),
(21, 11, 0, 'True', 'this/these is/are not British law(s)/act(s) and did not lead to the American Revolution'),
(22, 11, 1, 'False', 'this is not the name of a British act which affected the colonists.'),
(23, 12, 0, 'True', 'this/these is/are not British law(s)/act(s) and did not lead to the American Revolution'),
(24, 12, 1, 'False', 'this is not the name of a British act which affected the colonists.'),
(25, 13, 0, 'True', 'this/these is/are not British law(s)/act(s) and did not lead to the American Revolution'),
(26, 13, 1, 'False', 'this is not the name of a British act which affected the colonists.'),
(27, 14, 1, 'The Constitutional Convention', 'this convention, held in 1787, is where delegates met to plan our new government.'),
(28, 14, 0, 'Second Constitutional Congress', 'this congress was held to respond to revolutionary violence at Lexington and Concord.'),
(29, 14, 0, 'First Constitutional Congress', 'this congress was held to respond to Britain\'s \"Intolerable Acts,\" which placed high taxes on many common goods.'),
(30, 15, 1, 'The Articles of Confederation', 'this set of documents was initially drafted in 1781, however, were quite weak and ineffective, leading to the Constitution we know today.'),
(31, 15, 0, 'The Constitution we know today', 'the constitution we know today was drafted in 1787 and ratified by 1789, almost a decade after the Articles of Confederation'),
(32, 15, 0, 'The Bill of Rights', 'the Bill of Rights is the name of the first ten amendments to the Constitution.'),
(33, 15, 0, 'The Magna Carta', 'this document is part of the British government, not the United States.'),
(34, 17, 1, 'Inability to collect sufficient taxes', 'Congress held no power to tax.'),
(35, 17, 1, 'Inability to raise an army', 'state militias could be formed, however, the federal government could not form a national army.'),
(36, 17, 1, 'Lack of a court or judicial system', 'the Articles only described a legislative branch, and said nothing about executive or judicial branches.'),
(37, 17, 1, 'Unregulated commerce regulation between countries and states', 'Congress could not regulate trade.'),
(38, 17, 0, 'A poor educational system', 'the Articles did not dictate standards for any governmental bureaucracies.'),
(39, 18, 1, 'True', 'they laid the \"frame\" for the Constitution.'),
(40, 18, 0, 'False', 'the original drafters were called framers.'),
(41, 20, 1, 'Article 1', 'article 1 is the longest, with ten lengthy sections.'),
(42, 20, 0, 'Article 2', 'article 2 is not the longest, with only four sections.'),
(43, 20, 0, 'Article 3', 'article 3 is not the longest, with only three sections.'),
(44, 20, 0, 'Article 4', 'article 4 is not the longest, with only four sections.'),
(45, 20, 0, 'Article 5', 'article 5 is not the longest, as it has no defined sections.'),
(46, 20, 0, 'Article 6', 'article 6 is not the longest, as it has no defined sections.'),
(47, 20, 0, 'Article 7', 'article 7 is not the longest, as it has no defined sections.'),
(48, 21, 1, 'True', 'articles 1-3 describe the branches: article 1 describes the legislature, article 2 the executive, and article 3 the judical.'),
(49, 21, 0, 'False', 'there are three articles which each distinctly describe one branch of government each.'),
(50, 22, 0, 'Article 1', 'article 1 does not discuss the process of amending the Constitution.'),
(51, 22, 0, 'Article 2', 'article 2 does not discuss the process of amending the Constitution.'),
(52, 22, 0, 'Article 3', 'article 3 does not discuss the process of amending the Constitution.'),
(53, 22, 0, 'Article 4', 'article 4 does not discuss the process of amending the Constitution.'),
(54, 22, 1, 'Article 5', 'article 5 does discuss the process of amending the Constitution.'),
(55, 22, 0, 'Article 6', 'article 6 does not discuss the process of amending the Constitution.'),
(56, 22, 0, 'Article 7', 'article 7 does not discuss the process of amending the Constitution.'),
(57, 23, 0, 'Article 1', 'article 1 does not discuss the process of ratifying the Constitution.'),
(58, 23, 0, 'Article 2', 'article 2 does not discuss the process of ratifying the Constitution.'),
(59, 23, 0, 'Article 3', 'article 3 does not discuss the process of ratifying the Constitution.'),
(60, 23, 0, 'Article 4', 'article 4 does not discuss the process of ratifying the Constitution.'),
(61, 23, 0, 'Article 5', 'article 5 does not discuss the process of ratifying the Constitution.'),
(62, 23, 0, 'Article 6', 'article 6 does not discuss the process of ratifying the Constitution.'),
(63, 23, 1, 'Article 7', 'article 7 does discuss the process of ratifying the Constitution.'),
(64, 25, 1, 'Form a more perfect union', 'this is specifically stated in the preamble'),
(65, 25, 1, 'Establish justice', 'this is specifically stated in the preamble'),
(66, 25, 1, 'Insure domestric tranquility', 'this is specifically stated in the preamble'),
(67, 25, 1, 'Promote the general welfare', 'this is specifically stated in the preamble'),
(68, 25, 1, 'Secure the blessings of liberty', 'this is specifically stated in the preamble'),
(69, 25, 0, 'Expand America to both oceans', 'this is not specifically stated in the preamble'),
(70, 25, 0, 'Protect foreign freedoms', 'this is not specifically stated in the preamble'),
(71, 25, 0, 'Create a true democracy', 'this is not specifically stated in the preamble'),
(72, 26, 1, 'The bicameral structure of Congress', 'this is the first and only item discussed in section one of this article.'),
(73, 26, 0, 'The election process of Congress', 'this is discussed in section four of this article.'),
(74, 26, 0, 'The definition of a bill', 'this is not discussed within the Constitution.'),
(75, 26, 0, 'The types of committees within Congress', 'this is not discussed within the Constitution.'),
(76, 27, 1, '25 years of age', 'this is a requirement, as listed in article 1 section 2.'),
(77, 27, 1, 'Be a citizen of the United States for at least seven years', 'this is a requirement, as listed in article 1 section 2.'),
(78, 27, 1, 'Live in the state which they are representing', 'this is a requirement, as listed in article 1 section 2.'),
(79, 27, 0, 'Be a lifetime citizen of the United States', 'this is not a requirement of representatives as listed in article 1 section 2.'),
(80, 27, 0, '30 years of age', 'this is not a requirement of representatives as listed in article 1 section 2.'),
(81, 27, 0, 'Be born in the state which they are representing', 'this is not a requirement of representatives as listed in article 1 section 2.'),
(82, 28, 1, '30 years of age', 'this is a requirement, as listed in article 1 section 3.'),
(83, 28, 1, 'Be a citizen of the United States for at least nine years', 'this is a requirement, as listed in article 1 section 3.'),
(84, 28, 1, 'Live in the state which they are representing', 'this is a requirement, as listed in article 1 section 3.'),
(85, 28, 0, 'Be a lifetime citizen of the United States', 'this is not a requirement of representatives as listed in article 1 section 3.'),
(86, 28, 0, '25 years of age', 'this is not a requirement of representatives as listed in article 1 section 3.'),
(87, 28, 0, 'Be born in the state which they are representing', 'this is not a requirement of representatives as listed in article 1 section 3.'),
(88, 29, 0, 'They are elected from the senate body every two-years', 'this is not true of the President of the Senate, as outlined in Article 1 Section 3'),
(89, 29, 0, 'They vote in every decision', 'this is not true of the President of the Senate, as outlined in Article 1 Section 3'),
(90, 29, 1, 'They are the Vice President of the United States', 'this is true of the President of the Senate, as outlined in Article 1 Section 3'),
(91, 30, 0, 'Hold congressional elections', 'a state is allowed to do this, per section 10 of article 1.'),
(92, 30, 1, 'Enter into an alliance or treaty', 'a state can not do this, regardless of congressional approval.'),
(93, 30, 1, 'Enter a Confederation', 'a state can not do this, regardless of congressional approval.'),
(94, 30, 1, 'Coin money', 'a state can not do this, regardless of congressional approval.'),
(95, 30, 1, 'Pay debts in forms other than Gold or Silver', 'a state can not do this, regardless of congressional approval.'),
(96, 30, 0, 'Create their own voting identification laws', 'a state is allowed to do this, per section 10 of article 1.'),
(97, 30, 0, 'Accept a governors resignation', 'a state is allowed to do this, per section 10 of article 1.'),
(98, 30, 0, 'Move their capital city', 'a state is allowed to do this, per section 10 of article 1.'),
(99, 30, 0, 'Engage in war after an invasion', 'a state is allowed to do this, per section 10 of article 1.'),
(100, 31, 1, 'True', 'the oath is written in section 1, clause 8 of article 2.'),
(101, 31, 0, 'False', 'the oath is written in this article.'),
(102, 32, 1, 'True', 'section 2 of article 2 states that the president can fill vacant offices during recess by granting commissions until the end of the next Senate session.'),
(103, 32, 0, 'False', 'the article states that the president may fill vacancies on a commission basis while Congress is in recess.'),
(104, 33, 0, 'Once a year', 'article 2 states that the President should give this address \"from time to time\".'),
(105, 33, 0, 'Every two years (with each election)', 'article 2 states that the President should give this address \"from time to time\".'),
(106, 33, 0, 'Whenever he feels it is necessary', 'article 2 states that the President should give this address \"from time to time\".'),
(107, 33, 1, 'From time to time', 'article 2 states that the President should give this address \"from time to time\".'),
(108, 34, 1, 'True', 'section one of article three states that the compensation should not be diminished while in office.'),
(109, 34, 0, 'False', 'the Constitution states that judges\' pay may not be diminished while in office.'),
(110, 35, 1, 'All cases regarding the Constitution', 'article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction.'),
(111, 35, 1, 'Cases regarding federal laws', 'article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction.'),
(112, 35, 1, 'Cases where the United States itself is a party', 'article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction.'),
(113, 35, 1, 'Controversies between multiple states', 'article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction.'),
(114, 35, 1, 'Controversies between citizens in different states', 'article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction.'),
(115, 35, 1, 'Cases affecting ambassadors, public ministers, and consuls', 'article 3 section 2 states this as a case in which the Supreme Court does have original jurisdiction.'),
(116, 35, 0, 'Cases within a territory of the United States', 'article 3 section 2 states this as a case in which the Supreme Court does not have original jurisdiction.'),
(117, 35, 0, 'Military offenses', 'article 3 section 2 states this as a case in which the Supreme Court does not have original jurisdiction.'),
(118, 35, 0, 'Impeachment of the President', 'impeachments are handled by the Senate.'),
(119, 35, 0, 'Impeachment of any public official', 'impeachments are handled by the Senate.'),
(120, 36, 0, '3', 'the Constitution only states that there should be a Supreme Court, but does not dictate the size.'),
(121, 36, 0, '5', 'the Constitution only states that there should be a Supreme Court, but does not dictate the size.'),
(122, 36, 0, '7', 'the Constitution only states that there should be a Supreme Court, but does not dictate the size.'),
(123, 36, 0, '9', 'the Constitution only states that there should be a Supreme Court, but does not dictate the size.'),
(124, 36, 0, '15', 'the Constitution only states that there should be a Supreme Court, but does not dictate the size.'),
(125, 36, 1, 'The Constitution does not specify', 'the Constitution only states that there should be a Supreme Court, but does not dictate the size.'),
(126, 37, 1, 'They may be limited by Congress', 'the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings.'),
(127, 37, 0, 'They must be replaced by the three-branch system, similar to the federal government', 'the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings.'),
(128, 37, 0, 'They may conduct their proceedings however they see fit', 'the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings.'),
(129, 37, 0, 'The President can force these processes to change', 'the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings.'),
(130, 38, 1, 'New states may be admitted by the Congress', 'article four section three states that this is the case.'),
(131, 38, 0, 'New states may be admitted by the President', 'article four section three states that Congress must admit states.'),
(132, 38, 1, 'A new state may not be formed within another state', 'article four section three states that a new state may not be formed within any other state.'),
(133, 38, 1, 'A state may not combine with another without the approval of Congress and the state\'s legislatures', 'article four section three states that this is the case.'),
(134, 39, 1, 'True', 'article four section four states this.'),
(135, 39, 0, 'False', 'article four section four states that the United States shall guarantee a republican form of government in every state.'),
(136, 40, 1, 'True', 'article four section four states this.'),
(137, 40, 0, 'False', 'article four section four states that the United States will protect each state against invasion, and apply legislation/executive power to prevent domestic violence.'),
(138, 41, 1, '2/3 of the Senate\'s votes', 'article five states that this is required to amend the constitution (through way of the Congress).'),
(139, 41, 0, '3/4 of the Senate\'s votes', 'only 2/3 of the Senate\'s votes are needed.'),
(140, 41, 1, '2/3 of the House of Representatives\'s votes', 'article five states that this is required to amend the constitution (through way of the Congress).'),
(141, 41, 0, '3/4 of the House of Representatives\'s votes', 'only 2/3 of the House of Representatives\'s votes are needed.'),
(142, 41, 0, 'Ratification by 2/3 of the states', '3/4 of the states must ratify the amendment.'),
(143, 41, 1, 'Ratification by 3/4 of the states', 'article five states that this is required to amend the constitution (through way of the Congress).'),
(144, 41, 0, 'Presidential approval', 'article five does not state that this is required to amend the constitution.'),
(145, 41, 0, 'Approval by the Supreme Court for constitutional', 'article five does not state that this is required to amend the constitution.'),
(146, 42, 1, 'True', 'article 6 section 2 states that laws and treaties made by the United States are the supreme law of the land, and that judges in every state must be bound by it.'),
(147, 42, 0, 'False', 'article 6 section 2 states that federal laws are the supreme law of the land'),
(148, 43, 0, 'True', 'article 7 states that the constitution will only take effect in the states which ratify it, and only upon ratification by at least nine states.'),
(149, 43, 1, 'False', 'article 7 states that the constitution will only take effect in the states which ratify it, and only upon ratification by at least nine states.'),
(150, 44, 1, 'religion', 'the first amendment states that congress may not make laws prohibiting or abridging this freedom.'),
(151, 44, 1, 'speech', 'the first amendment states that congress may not make laws prohibiting or abridging this freedom.'),
(152, 44, 1, 'press', 'the first amendment states that congress may not make laws prohibiting or abridging this freedom.'),
(153, 44, 1, 'assembly', 'the first amendment states that congress may not make laws prohibiting or abridging this freedom.'),
(154, 44, 1, 'petition', 'the first amendment states that congress may not make laws prohibiting or abridging this freedom.'),
(155, 44, 0, 'bearing arms', 'this right is protected by the second amendment.'),
(156, 44, 0, 'not quarter troops', 'this right is protected by the third amendment.'),
(157, 44, 0, 'jury trial', 'this right is protected by the sixth amendment.'),
(158, 45, 1, 'Ensure that the federal government does not take too much power from the states and people', 'these amendments states that rights not named in the constitution must not be taken away either (9) and that powers not expressly forbidden or given to the federal government belong to the states (10).'),
(159, 45, 0, 'Ensure that the United States is protected from foreign armies', 'this is part of the second amendment.'),
(160, 45, 0, 'Ensure that the United States does not become communist.', 'this is not part of the constitution.'),
(161, 45, 0, 'Ensure that citizens are not held in jail indefinitely.', 'this right is protected by the sixth amendment.'),
(162, 46, 1, 'Convince anti-federalists, who were afraid the federal government would grow too large and out of control, thus becoming tyrannical like Britain, to ratify the constitution', 'anti-federalists felt that the federal government may become tyrannical and revoke rights and freedoms from the people.  The Bill of Rights forbids this revocation, which helped to ebb this fear.'),
(163, 46, 0, 'Ensure equal rights for all people within the United States', 'this is part of later amendments.'),
(164, 46, 0, 'Convince federalists, who were afraid the federal government would still not have enough power, to ratify the constitution', 'federalists liked the new powers the Constitution gave the federal government (compared to the previous Articles of Confederation).  The Bill of Rights, in fact, limited the federal government\'s power.'),
(165, 46, 0, 'To abolish slavery', 'this is the purpose of the thirteenth amendment.'),
(166, 47, 1, 'Amendment 3', 'the third Intolerable Act required colonists to house and feed (quarter) troops.'),
(167, 47, 0, 'Amendment 2', 'no Intolerable Acts limited the rights to bear weapons or form a militia.'),
(168, 47, 0, 'Amendment 8', 'no Intolerable Acts directly called for cruel and unusual punishments.'),
(169, 48, 1, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(170, 48, 0, 'Right to bear arms', 'this description matches amendment two.'),
(171, 48, 0, 'Quartering of troops', 'this description matches amendment three.'),
(172, 48, 0, 'Search and seizure', 'this description matches amendment four.'),
(173, 48, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(174, 48, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(175, 48, 0, 'Common law suits', 'this description matches amendment seven.'),
(176, 48, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(177, 48, 0, 'Rights not named', 'this description matches amendment nine.'),
(178, 48, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(179, 49, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(180, 49, 1, 'Right to bear arms', 'this description matches amendment two.'),
(181, 49, 0, 'Quartering of troops', 'this description matches amendment three.'),
(182, 49, 0, 'Search and seizure', 'this description matches amendment four.'),
(183, 49, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(184, 49, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(185, 49, 0, 'Common law suits', 'this description matches amendment seven.'),
(186, 49, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(187, 49, 0, 'Rights not named', 'this description matches amendment nine.'),
(188, 49, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(189, 50, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(190, 50, 0, 'Right to bear arms', 'this description matches amendment two.'),
(191, 50, 1, 'Quartering of troops', 'this description matches amendment three.'),
(192, 50, 0, 'Search and seizure', 'this description matches amendment four.'),
(193, 50, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(194, 50, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(195, 50, 0, 'Common law suits', 'this description matches amendment seven.'),
(196, 50, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(197, 50, 0, 'Rights not named', 'this description matches amendment nine.'),
(198, 50, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(199, 51, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(200, 51, 0, 'Right to bear arms', 'this description matches amendment two.'),
(201, 51, 0, 'Quartering of troops', 'this description matches amendment three.'),
(202, 51, 1, 'Search and seizure', 'this description matches amendment four.'),
(203, 51, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(204, 51, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(205, 51, 0, 'Common law suits', 'this description matches amendment seven.'),
(206, 51, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(207, 51, 0, 'Rights not named', 'this description matches amendment nine.'),
(208, 51, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(209, 52, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(210, 52, 0, 'Right to bear arms', 'this description matches amendment two.'),
(211, 52, 0, 'Quartering of troops', 'this description matches amendment three.'),
(212, 52, 0, 'Search and seizure', 'this description matches amendment four.'),
(213, 52, 1, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(214, 52, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(215, 52, 0, 'Common law suits', 'this description matches amendment seven.'),
(216, 52, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(217, 52, 0, 'Rights not named', 'this description matches amendment nine.'),
(218, 52, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(219, 53, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(220, 53, 0, 'Right to bear arms', 'this description matches amendment two.'),
(221, 53, 0, 'Quartering of troops', 'this description matches amendment three.'),
(222, 53, 0, 'Search and seizure', 'this description matches amendment four.'),
(223, 53, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(224, 53, 1, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(225, 53, 0, 'Common law suits', 'this description matches amendment seven.'),
(226, 53, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(227, 53, 0, 'Rights not named', 'this description matches amendment nine.'),
(228, 53, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(229, 54, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(230, 54, 0, 'Right to bear arms', 'this description matches amendment two.'),
(231, 54, 0, 'Quartering of troops', 'this description matches amendment three.'),
(232, 54, 0, 'Search and seizure', 'this description matches amendment four.'),
(233, 54, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(234, 54, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(235, 54, 1, 'Common law suits', 'this description matches amendment seven.'),
(236, 54, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(237, 54, 0, 'Rights not named', 'this description matches amendment nine.'),
(238, 54, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(239, 55, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(240, 55, 0, 'Right to bear arms', 'this description matches amendment two.'),
(241, 55, 0, 'Quartering of troops', 'this description matches amendment three.'),
(242, 55, 0, 'Search and seizure', 'this description matches amendment four.'),
(243, 55, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(244, 55, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(245, 55, 0, 'Common law suits', 'this description matches amendment seven.'),
(246, 55, 1, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(247, 55, 0, 'Rights not named', 'this description matches amendment nine.'),
(248, 55, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(249, 56, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(250, 56, 0, 'Right to bear arms', 'this description matches amendment two.'),
(251, 56, 0, 'Quartering of troops', 'this description matches amendment three.'),
(252, 56, 0, 'Search and seizure', 'this description matches amendment four.'),
(253, 56, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(254, 56, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(255, 56, 0, 'Common law suits', 'this description matches amendment seven.'),
(256, 56, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(257, 56, 1, 'Rights not named', 'this description matches amendment nine.'),
(258, 56, 0, 'Powers reserved to states', 'this description matches amendment ten.'),
(259, 57, 0, 'Freedom of religion, speech, press, assembly, petition', 'this description matches amendment one.'),
(260, 57, 0, 'Right to bear arms', 'this description matches amendment two.'),
(261, 57, 0, 'Quartering of troops', 'this description matches amendment three.'),
(262, 57, 0, 'Search and seizure', 'this description matches amendment four.'),
(263, 57, 0, 'Due process, double jeopardy, self-incrimination', 'this description matches amendment five.'),
(264, 57, 0, 'Jury trial, right to counsel', 'this description matches amendment six.'),
(265, 57, 0, 'Common law suits', 'this description matches amendment seven.'),
(266, 57, 0, 'Excess bail or fines, cruel and unusual punishment', 'this description matches amendment eight.'),
(267, 57, 0, 'Rights not named', 'this description matches amendment nine.'),
(268, 57, 1, 'Powers reserved to states', 'this description matches amendment ten.'),
(269, 58, 1, 'The second-most voted candidate became the Vice President', 'electors previously cast votes only for President.  After the amendment, they cast votes for each President and Vice President.'),
(270, 58, 0, 'The President chose the Vice President', 'the President, after this amendment, would choose a running-mate who would likely become Vice President, however, prior to this amendment, the second-most voted candidate became the Vice President.'),
(271, 58, 0, 'The were elected on a seperate ballot', 'this is what happened after this amendment was put into place.'),
(272, 58, 0, 'The Supreme Court nominates a Vice President to keep the President in check', 'this is not true.'),
(273, 58, 0, 'There was no Vice President prior to this amendment.', 'this is not true.'),
(274, 59, 1, 'An individual suing a different state or country', 'this amendment extended sovereign immunity to this case.'),
(275, 59, 0, 'A citizen violating traffic laws in the state which they live', 'the Supreme Court never held authority over disputes within one state.'),
(276, 60, 1, 'Ban the sale of alcohol', 'this amendment began Prohibition, a period where alcohol was illegal.'),
(277, 60, 0, 'Declare US participation in World War II', 'declarations of war do not become amendments.'),
(278, 60, 0, 'Suspend the freedom of speech', 'this is not what the eighteenth amendment did.'),
(279, 61, 0, 'Amendment 16, which allowed income taxes', 'taxes had no impact on the democratic process.'),
(280, 61, 1, 'Amendment 17, which allowed direct election of senators by the people', 'this amendment allowed the people to directly elect their senators.'),
(281, 61, 0, 'Amendment 18, which banned the sale of alcohol', 'alcohol had no direct impact on election of senators.'),
(282, 62, 0, 'Amendment 16, which allowed income taxes', 'taxes had no impact on the women\'s suffrage.'),
(283, 62, 1, 'Amendment 19, which allowed women to vote', 'this amendment allowed women suffrage, or the right to vote.'),
(284, 62, 0, 'Amendment 18, which banned the sale of alcohol', 'alcohol had no direct impact on women\'s suffrage.'),
(285, 64, 0, 'Amendment 22, which limited the number of terms a President could serve', 'the number of terms the President could serve holds no impact on who is able to vote.'),
(286, 64, 1, 'Amendment 23, which allowed citizens of Washington D.C to vote for President and Vice President', 'this amendment allowed the people of Washington D.C., who could not previously vote in the presidential election, to vote.'),
(287, 64, 1, 'Amendment 24, which disallowed poll taxes', 'removing poll taxes allowed more people to vote as they did not have to pay.'),
(288, 64, 0, 'Amendment 25, which determines the actions to take if the President suddenly leaves office', 'this holds no affect on who can vote.'),
(289, 64, 1, 'Amendment 26, which lowered the voting age', 'this allowed younger people to vote.'),
(290, 64, 0, 'Amendment 27, which controls how Congressmen are paid', 'this did not affect who could vote.');

-- --------------------------------------------------------

--
-- Structure de la table `pending_thumbnail_queue`
--

CREATE TABLE `pending_thumbnail_queue` (
  `ID` int(11) UNSIGNED NOT NULL COMMENT 'Unique DB Identifier of the row',
  `FOLDER` varchar(22) NOT NULL COMMENT 'Folder the image resides in',
  `TOKEN` varchar(12) NOT NULL COMMENT 'Token for the image',
  `PATH` varchar(15) NOT NULL COMMENT 'Image path'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pending_thumbnail_queue`
--

INSERT INTO `pending_thumbnail_queue` (`ID`, `FOLDER`, `TOKEN`, `PATH`) VALUES
(1, 'profile_pictures', 'b2xvyz5a0x', 'vsw9nrk4mx.png'),
(2, 'profile_pictures', '10hyqmsxq5', 'z0u3cnf8fb.png'),
(3, 'profile_pictures', 'napku2vqae', '01oycb98sg.png');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `ID` int(10) UNSIGNED NOT NULL,
  `QUIZ_ID` int(10) UNSIGNED NOT NULL,
  `QUESTION` mediumtext NOT NULL,
  `ANSWER_TYPE` enum('MC','TF','CHECK','DROPDOWN','BLANK') NOT NULL,
  `ANSWER` varchar(255) DEFAULT NULL COMMENT 'Only if BLANK answer type',
  `EXPLANATION` mediumtext DEFAULT NULL COMMENT 'only if type blank'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`ID`, `QUIZ_ID`, `QUESTION`, `ANSWER_TYPE`, `ANSWER`, `EXPLANATION`) VALUES
(1, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Navigation Acts', 'TF', NULL, NULL),
(2, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Revenue Act', 'TF', NULL, NULL),
(3, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Stamp Act', 'TF', NULL, NULL),
(4, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Declaratory Act', 'TF', NULL, NULL),
(5, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Townshend Taxes', 'TF', NULL, NULL),
(6, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Intolerable Acts', 'TF', NULL, NULL),
(7, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Quartering Act', 'TF', NULL, NULL),
(8, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Proclamation of 1763', 'TF', NULL, NULL),
(9, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Tea Tax Act', 'TF', NULL, NULL),
(10, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: America Act', 'TF', NULL, NULL),
(11, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Constitution Acts', 'TF', NULL, NULL),
(12, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: The Act of Massachusetts', 'TF', NULL, NULL),
(13, 1, 'The following is a British law(s)/act(s) and lead in some way to the American Revolution: Rebellion Acts', 'TF', NULL, NULL),
(14, 2, 'Where was the constitution originally drafted?', 'MC', NULL, NULL),
(15, 2, 'What was America\'s first constitution?', 'MC', NULL, NULL),
(16, 2, 'How many of the original thirteen states had to ratify the Constitution? (number only)', 'BLANK', '9', 'the Articles of Confederation stated that 3/4 of the states, or 9/13, had to ratify any changes'),
(17, 2, 'Which of the following were major issues with the Articles of Confederation?', 'CHECK', NULL, NULL),
(18, 2, 'True or false: \"the original drafters of the Constitution were called framers?\"', 'TF', NULL, NULL),
(19, 3, 'How many articles are in the constitution?  (Note: the preamble is not considered an article)', 'BLANK', '7', 'there are seven articles in the Constitution.'),
(20, 3, 'Which article is the longest?', 'MC', NULL, NULL),
(21, 3, 'Three articles describe the three branches of government, one for each branch.', 'TF', NULL, NULL),
(22, 3, 'Which article describes the process of amending the Constitution?', 'MC', NULL, NULL),
(23, 3, 'Which article describes the process of ratification?', 'MC', NULL, NULL),
(24, 4, 'What are the three well-known words which begin the Preamble?', 'BLANK', 'We the people', 'these are the first three words of the Preamble.'),
(25, 4, 'Which of the following does the preamble expressly state are reasons for creating the Constitution?', 'CHECK', NULL, NULL),
(26, 5, 'What is the first thing that this article states?', 'MC', NULL, NULL),
(27, 5, 'What requirements must a representative meet?', 'CHECK', NULL, NULL),
(28, 5, 'What requirements must a senator meet?', 'CHECK', NULL, NULL),
(29, 5, 'Which are true of the President of the Senate?', 'CHECK', NULL, NULL),
(30, 5, 'Which of the following can a state NOT do?', 'CHECK', NULL, NULL),
(31, 6, 'The presidential oath is written in the Constitution', 'TF', NULL, NULL),
(32, 6, 'The President can fill vacant offices without congressional approval while the Congress is in recess', 'TF', NULL, NULL),
(33, 6, 'How often does the Constitution say that the President should give a State of the Union?', 'MC', NULL, NULL),
(34, 7, 'Judges, per the Constitution, may not have their pay decreased while in office.', 'TF', NULL, NULL),
(35, 7, 'Which of the following circumstances does the Supreme Court have original jurisdiction over?', 'CHECK', NULL, NULL),
(36, 7, 'Per the Constitution, how many judges should serve on the Supreme Court?', 'TF', NULL, NULL),
(37, 8, 'What was the result of the Constitution on the existing processes of a state?', 'MC', NULL, NULL),
(38, 8, 'Which of the following is/are true regarding the formation of states?', 'CHECK', NULL, NULL),
(39, 8, 'True or false: every state must have a republican form of government', 'TF', NULL, NULL),
(40, 8, 'True or false: the United States agrees to protect states from invasion AND domestic violence', 'TF', NULL, NULL),
(41, 9, 'Which of the following are needed to amend the constitution through the congressional method?', 'CHECK', NULL, NULL),
(42, 9, 'True or false: federal laws supercede those of any state', 'TF', NULL, NULL),
(43, 9, 'True or false: the Constitution would take full effect and hold jurisdiction across all states immediately upon ratification by nine of the thirteen states.', 'TF', NULL, NULL),
(44, 10, 'Which of the following freedoms/rights does the first amendment protect?', 'CHECK', NULL, NULL),
(45, 10, 'What are the intentions of amendments nine and ten?', 'MC', NULL, NULL),
(46, 10, 'Why were the Bill of Rights created?', 'MC', NULL, NULL),
(47, 10, 'Which amendment is the most direct response to one of King George\'s \"Intolerable Acts\"?', 'MC', NULL, NULL),
(48, 10, 'What is the purpose of amendment one?', 'DROPDOWN', NULL, NULL),
(49, 10, 'What is the purpose of amendment two?', 'DROPDOWN', NULL, NULL),
(50, 10, 'What is the purpose of amendment three?', 'DROPDOWN', NULL, NULL),
(51, 10, 'What is the purpose of amendment four?', 'DROPDOWN', NULL, NULL),
(52, 10, 'What is the purpose of amendment five?', 'DROPDOWN', NULL, NULL),
(53, 10, 'What is the purpose of amendment six?', 'DROPDOWN', NULL, NULL),
(54, 10, 'What is the purpose of amendment seven?', 'DROPDOWN', NULL, NULL),
(55, 10, 'What is the purpose of amendment eight?', 'DROPDOWN', NULL, NULL),
(56, 10, 'What is the purpose of amendment nine?', 'DROPDOWN', NULL, NULL),
(57, 10, 'What is the purpose of amendment ten?', 'DROPDOWN', NULL, NULL),
(58, 11, 'Prior to the twelfth amendment, how was the Vice President chosen?', 'MC', NULL, NULL),
(59, 11, 'What type of case did the eleventh amendment prevent the Supreme Court from having jurisdiction over which was previously allowed in Article 3?', 'MC', NULL, NULL),
(60, 12, 'The eighteenth amendment (which was later repealed by the twenty-first amendment) did what?', 'DROPDOWN', NULL, NULL),
(61, 12, 'One of these amendments directly increased the power of America\'s democracy in the legislature.  Which one is this?', 'MC', NULL, NULL),
(62, 12, 'Which of the following amendments was the result of women\'s rights advocates and allowed suffrage for both genders?', 'MC', NULL, NULL),
(63, 13, 'The twenty-second amendment limited the number of terms a president could hold office.  How many terms was this limit? (Input a number)', 'BLANK', '2', 'This limited the President to two terms, or eight years, maximum.'),
(64, 13, 'Three of these amendments enabled more people to vote.  Which were they?', 'CHECK', NULL, NULL),
(65, 13, 'The twenty-sixth amendment lowered the voting age to what it is today.  What is the current minimum age to vote? (number only)', 'BLANK', '18', 'This amendment allowed people as young as eighteen to vote.');

-- --------------------------------------------------------

--
-- Structure de la table `quizzes`
--

CREATE TABLE `quizzes` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `SORT` int(10) UNSIGNED NOT NULL,
  `TOPIC` enum('HISTORY','AMENDMENTS','CONSTITUTION','ALL') NOT NULL,
  `URL` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `quizzes`
--

INSERT INTO `quizzes` (`ID`, `NAME`, `SORT`, `TOPIC`, `URL`) VALUES
(1, 'Causes of the American Revolution', 0, 'HISTORY', 'american-revolution'),
(2, 'History of the Constitution', 10, 'HISTORY', 'constitution-history'),
(3, 'Structure', 100, 'CONSTITUTION', 'structure'),
(4, 'Preamble', 110, 'CONSTITUTION', 'preamble'),
(5, 'Article I (Legislature)', 120, 'CONSTITUTION', 'article-1'),
(6, 'Article II (Executive)', 130, 'CONSTITUTION', 'article-2'),
(7, 'Article III (Judicial)', 140, 'CONSTITUTION', 'article-3'),
(8, 'Article IV (States\' Relations)', 150, 'CONSTITUTION', 'article-4'),
(9, 'Article V, Article VI, and Article VII', 160, 'CONSTITUTION', 'article-5-article-6-and-article-7'),
(10, 'Amendments I-X (Bill of Rights)', 200, 'AMENDMENTS', 'amendments-i-x'),
(11, 'Amendments XI and XII', 210, 'AMENDMENTS', 'amendments-xi-xii'),
(12, 'Amendments XVI-XXI', 230, 'AMENDMENTS', 'amendments-xvi-xxi'),
(13, 'Amendments XXII-XXVII', 240, 'AMENDMENTS', 'amendments-xxii-xxvii');

-- --------------------------------------------------------

--
-- Structure de la table `records`
--

CREATE TABLE `records` (
  `ID` int(10) UNSIGNED NOT NULL,
  `USER_ID` int(10) UNSIGNED NOT NULL,
  `QUIZ_ID` int(10) UNSIGNED NOT NULL,
  `TOKEN` char(30) NOT NULL,
  `TIME` int(11) NOT NULL COMMENT 'Seconds',
  `GRADE` decimal(5,4) UNSIGNED NOT NULL COMMENT 'decimal not percentage',
  `DATA` longtext NOT NULL COMMENT 'data to show feedback and stuff to the user who took it',
  `DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `records`
--

INSERT INTO `records` (`ID`, `USER_ID`, `QUIZ_ID`, `TOKEN`, `TIME`, `GRADE`, `DATA`, `DATE`) VALUES
(1, 4, 6, 'pommtqdn89yz3srg7tp3h39qzl1d6x', 30, '1.0000', '[{\"id\":\"32\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true},{\"id\":\"31\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true},{\"id\":\"33\",\"answer\":\"From time to time\",\"correct_answer\":\"From time to time\",\"correct\":true}]', '2018-10-17'),
(3, 4, 9, '5fccp3yqx3k74pmcamgowvmqrfywve', 78, '0.6667', '[{\"id\":\"43\",\"answer\":\"False\",\"correct_answer\":\"False\",\"correct\":true},{\"id\":\"41\",\"answer\":\"2\\/3 of the House of Representatives\'s votes, Approval by the Supreme Court for constitutional, 2\\/3 of the Senate\'s votes, Ratification by 3\\/4 of the states\",\"correct_answer\":\"2\\/3 of the House of Representatives\'s votes, Ratification by 3\\/4 of the states, 2\\/3 of the Senate\'s votes\",\"correct\":false},{\"id\":\"42\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true}]', '2018-10-17'),
(4, 4, 10, 'inpf53swnp4z5xsidhnbt2k7r9bok2', 141, '1.0000', '[{\"id\":\"52\",\"answer\":\"Due process, double jeopardy, self-incrimination\",\"correct_answer\":\"Due process, double jeopardy, self-incrimination\",\"correct\":true},{\"id\":\"45\",\"answer\":\"Ensure that the federal government does not take too much power from the states and people\",\"correct_answer\":\"Ensure that the federal government does not take too much power from the states and people\",\"correct\":true},{\"id\":\"50\",\"answer\":\"Quartering of troops\",\"correct_answer\":\"Quartering of troops\",\"correct\":true},{\"id\":\"48\",\"answer\":\"Freedom of religion, speech, press, assembly, petition\",\"correct_answer\":\"Freedom of religion, speech, press, assembly, petition\",\"correct\":true},{\"id\":\"46\",\"answer\":\"Convince anti-federalists, who were afraid the federal government would grow too large and out of control, thus becoming tyrannical like Britain, to ratify the constitution\",\"correct_answer\":\"Convince anti-federalists, who were afraid the federal government would grow too large and out of control, thus becoming tyrannical like Britain, to ratify the constitution\",\"correct\":true},{\"id\":\"56\",\"answer\":\"Rights not named\",\"correct_answer\":\"Rights not named\",\"correct\":true},{\"id\":\"51\",\"answer\":\"Search and seizure\",\"correct_answer\":\"Search and seizure\",\"correct\":true},{\"id\":\"55\",\"answer\":\"Excess bail or fines, cruel and unusual punishment\",\"correct_answer\":\"Excess bail or fines, cruel and unusual punishment\",\"correct\":true},{\"id\":\"44\",\"answer\":\"speech, press, religion, assembly, petition\",\"correct_answer\":\"religion, press, assembly, petition, speech\",\"correct\":true},{\"id\":\"47\",\"answer\":\"Amendment 3, which prevents quartering of troops\",\"correct_answer\":\"Amendment 3, which prevents quartering of troops\",\"correct\":true},{\"id\":\"53\",\"answer\":\"Jury trial, right to counsel\",\"correct_answer\":\"Jury trial, right to counsel\",\"correct\":true},{\"id\":\"57\",\"answer\":\"Powers reserved to states\",\"correct_answer\":\"Powers reserved to states\",\"correct\":true},{\"id\":\"49\",\"answer\":\"Right to bear arms\",\"correct_answer\":\"Right to bear arms\",\"correct\":true},{\"id\":\"54\",\"answer\":\"Common law suits\",\"correct_answer\":\"Common law suits\",\"correct\":true}]', '2018-10-17'),
(5, 4, 1, '18fd25iq7a84vf6s7jxkayprafds0f', 17, '0.3846', '[{\"id\":\"9\",\"answer\":\"False\",\"correct_answer\":\"False\",\"correct\":true},{\"id\":\"10\",\"answer\":\"True\",\"correct_answer\":\"False\",\"correct\":false},{\"id\":\"11\",\"answer\":\"True\",\"correct_answer\":\"False\",\"correct\":false},{\"id\":\"5\",\"answer\":\"False\",\"correct_answer\":\"True\",\"correct\":false},{\"id\":\"6\",\"answer\":\"False\",\"correct_answer\":\"True\",\"correct\":false},{\"id\":\"12\",\"answer\":\"False\",\"correct_answer\":\"False\",\"correct\":true},{\"id\":\"1\",\"answer\":\"False\",\"correct_answer\":\"True\",\"correct\":false},{\"id\":\"7\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true},{\"id\":\"13\",\"answer\":\"True\",\"correct_answer\":\"False\",\"correct\":false},{\"id\":\"3\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true},{\"id\":\"4\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true},{\"id\":\"8\",\"answer\":\"False\",\"correct_answer\":\"True\",\"correct\":false},{\"id\":\"2\",\"answer\":\"False\",\"correct_answer\":\"True\",\"correct\":false}]', '2018-10-17'),
(6, 4, 3, '8o22jcqd6v7ch9w2dwbaluxajn4wnw', 12, '1.0000', '[{\"id\":\"21\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true},{\"id\":\"19\",\"answer\":\"7\",\"correct_answer\":\"7\",\"correct\":true},{\"id\":\"22\",\"answer\":\"Article 5\",\"correct_answer\":\"Article 5\",\"correct\":true},{\"id\":\"20\",\"answer\":\"Article 1\",\"correct_answer\":\"Article 1\",\"correct\":true},{\"id\":\"23\",\"answer\":\"Article 7\",\"correct_answer\":\"Article 7\",\"correct\":true}]', '2018-10-17'),
(7, 4, 2, 'q7j6hm1fww6s4k4iuap50vmfpl5imy', 12, '1.0000', '[{\"id\":\"15\",\"answer\":\"The Articles of Confederation\",\"correct_answer\":\"The Articles of Confederation\",\"correct\":true},{\"id\":\"16\",\"answer\":\"9\",\"correct_answer\":\"9\",\"correct\":true},{\"id\":\"14\",\"answer\":\"The Constitutional Convention\",\"correct_answer\":\"The Constitutional Convention\",\"correct\":true},{\"id\":\"18\",\"answer\":\"True\",\"correct_answer\":\"True\",\"correct\":true},{\"id\":\"17\",\"answer\":\"Unregulated commerce regulation between countries and states, Lack of a court or judicial system, Inability to collect sufficient taxes, Inability to raise an army\",\"correct_answer\":\"Lack of a court or judicial system, Inability to collect sufficient taxes, Inability to raise an army, Unregulated commerce regulation between countries and states\",\"correct\":true}]', '2018-10-17');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) UNSIGNED NOT NULL,
  `FILE_TOKEN` char(10) CHARACTER SET ascii NOT NULL,
  `USERNAME` varchar(64) CHARACTER SET ascii NOT NULL,
  `HASHED_PASSWORD` varchar(255) CHARACTER SET ascii NOT NULL,
  `TOTP_KEY` binary(10) DEFAULT NULL,
  `EMAIL` varchar(254) CHARACTER SET ascii DEFAULT NULL,
  `EMAIL_VERIFIED` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `EMAIL_TOKEN` varchar(12) CHARACTER SET ascii NOT NULL,
  `PICTURE_LOC` varchar(15) CHARACTER SET ascii DEFAULT NULL,
  `NICK` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mistake',
  `SCHOOL` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `CITY` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `STATE_PROVINCE` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `COUNTRY` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DEACTIVATED` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `FILE_TOKEN`, `USERNAME`, `HASHED_PASSWORD`, `TOTP_KEY`, `EMAIL`, `EMAIL_VERIFIED`, `EMAIL_TOKEN`, `PICTURE_LOC`, `NICK`, `SCHOOL`, `CITY`, `STATE_PROVINCE`, `COUNTRY`, `DEACTIVATED`) VALUES
(2, '10hyqmsxq5', 'foo_bar', 'DELETED USER', NULL, 'smileytechguy@icloud.com', 1, 'xhwa6p5bxkft', NULL, 'Deleted user', '', '', '', '', 1),
(3, 'bnge9xz8c6', 'zoopers', '$argon2i$v=19$m=32768,t=5,p=4$cy83anExZUJmMVFIU09BSw$ycmpQKjDQK77TFgwKuCjQpxY9GWBrSrNcoiYn44Z08Y', NULL, NULL, 0, 'zq6l87iqtm0c', NULL, 'zoopers', 'zooper', 'bleh', 'WV', 'American Samoa', 0),
(4, 'napku2vqae', 'smileytechguy', '$argon2i$v=19$m=32768,t=5,p=4$RC94am9yNWVtZElrdHd5VA$Ir2yVetG5VrIqUkgkmzhpHsvPg1AphrsAZuuGActH0k', NULL, 'smileytechguy@smileytechguy.com', 1, 'vekr92xl41hw', '01oycb98sg.png', 'Noah Overcash', 'South Pointe High School', 'Rock Hill', 'SC', 'United States', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CORRECT` (`CORRECT`),
  ADD KEY `QUESTION_ID` (`QUESTION_ID`) USING BTREE;

--
-- Index pour la table `pending_thumbnail_queue`
--
ALTER TABLE `pending_thumbnail_queue`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `QUIZ_ID` (`QUIZ_ID`);

--
-- Index pour la table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `URL` (`URL`),
  ADD KEY `SORT` (`SORT`);

--
-- Index pour la table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `QUIZ_ID` (`QUIZ_ID`),
  ADD KEY `TIME` (`TIME`),
  ADD KEY `GRADE` (`GRADE`),
  ADD KEY `DATE` (`DATE`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FILE_TOKEN` (`FILE_TOKEN`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT pour la table `pending_thumbnail_queue`
--
ALTER TABLE `pending_thumbnail_queue`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique DB Identifier of the row', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `records`
--
ALTER TABLE `records`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `ibfk_question_1` FOREIGN KEY (`QUESTION_ID`) REFERENCES `questions` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `ibfk_quiz_1` FOREIGN KEY (`QUIZ_ID`) REFERENCES `quizzes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `ibfk_quiz` FOREIGN KEY (`QUIZ_ID`) REFERENCES `quizzes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_user` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
