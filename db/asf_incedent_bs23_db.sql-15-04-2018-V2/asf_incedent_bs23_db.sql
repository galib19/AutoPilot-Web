-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 10:59 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asf_incedent_bs23_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `asf_options`
--

CREATE TABLE `asf_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asf_options`
--

INSERT INTO `asf_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'violence_type', 'a:3:{i:1;s:13:\"Acid Violence\";i:2;s:13:\"Burn Violence\";i:3;s:14:\"Child Marriage\";}', NULL, NULL),
(2, 'action_taken', 'a:3:{i:1;s:17:\"Refer to hospital\";i:2;s:15:\"Refer to police\";i:3;s:14:\"Refer to other\";}', NULL, NULL),
(3, 'action_taken2', 'a:3:{i:1;s:17:\"Refer to hospital\";i:2;s:15:\"Refer to police\";i:3;s:14:\"Refer to other\";}', NULL, NULL),
(7, 'user_location', 'a:4:{s:12:\"norshindi-01\";s:12:\"Norshindi 01\";s:12:\"norshindi-02\";s:12:\"Norshindi 02\";s:12:\"norshindi-03\";s:12:\"Norshindi 03\";s:12:\"norshindi-04\";s:12:\"Norshindi 04\";}', '2018-03-21 03:56:19', '2018-03-21 04:15:44'),
(11, 'otp_01674752564', '3516', '2018-03-23 02:49:46', '2018-03-23 02:54:15'),
(12, 'otp_01674752565', '6126', '2018-03-23 03:21:20', '2018-03-27 10:25:03'),
(13, 'otp_01812345678', '6176', '2018-04-11 08:33:21', '2018-04-11 10:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `case_comments`
--

CREATE TABLE `case_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_comments`
--

INSERT INTO `case_comments` (`id`, `case_id`, `user_id`, `comment_content`, `created_at`, `updated_at`) VALUES
(2, 53, 2, 'comment from field agent', '2018-04-15 05:41:14', '2018-04-15 05:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `case_incedents`
--

CREATE TABLE `case_incedents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `case_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_details` longtext COLLATE utf8mb4_unicode_ci,
  `case_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_taken` text COLLATE utf8mb4_unicode_ci,
  `incident_date` datetime NOT NULL,
  `incident_info` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_incedents`
--

INSERT INTO `case_incedents` (`id`, `user_id`, `case_title`, `case_details`, `case_status`, `case_type`, `action_taken`, `incident_date`, `incident_info`, `created_at`, `updated_at`) VALUES
(1, 1, 'Qui enim distinctio et dolor cupiditate iusto non inventore.', 'Error deserunt et quia laboriosam est quibusdam dolor ut. Ut asperiores pariatur maxime id in quia omnis. Est et delectus nesciunt non.\n\nRepellat molestiae et quia rerum. Similique ut enim nobis debitis sit adipisci sunt. In est enim quia beatae.\n\nDoloribus aut vel libero voluptatem. Soluta voluptatem illum tempora velit. Exercitationem voluptatem dolorem saepe laudantium sit ut placeat. Necessitatibus sequi quas vel.\n\nDeleniti deserunt maxime maxime. Ducimus voluptatem modi blanditiis laboriosam et et. Libero ratione quidem mollitia et velit at.\n\nSoluta et aut dolorem non. Deserunt qui in quis eum. Odit sint ducimus quod quae. Provident eaque fugiat officia earum.\n\nDolores libero laudantium similique ut corrupti illum sed. Numquam ea quia voluptatum beatae qui eveniet et. Modi rerum excepturi ipsam facere. Debitis atque quas corporis eaque et molestiae laudantium eum.\n\nEt quia molestias velit beatae et provident. Aut ut ut cum. Dolores laudantium enim voluptatem cupiditate libero ut sed.\n\nCommodi doloremque sapiente ex fugit distinctio et. Aut a excepturi praesentium eaque qui molestias saepe. Hic ea sunt dolor quaerat dolor ab et.\n\nMinus eligendi est deleniti perspiciatis quia. Dolores molestiae facilis voluptatem consequatur. Recusandae quae et alias iusto impedit voluptatem. Dolores expedita eum et ipsa.\n\nQuae aliquam eos consequatur accusantium nostrum impedit. Culpa earum facere est tempore aut. Exercitationem ullam temporibus sit aperiam quia ut provident.', 'new', '1', '1', '2017-08-07 09:00:00', 'Est beatae itaque est voluptatibus sit. Voluptatem deleniti vel aut quia. Voluptates quos repellat iure sed et.', '2017-08-07 03:00:00', '2017-08-07 03:00:00'),
(2, 1, 'Sit minus sed ipsum nulla veniam cumque alias vel.', 'Atque voluptas ut odit enim autem. Molestias quis omnis et impedit.\n\nDelectus non excepturi quas voluptatibus molestiae omnis. Odit corrupti esse velit aliquam. Laudantium voluptate delectus ut aut et autem. Sint explicabo dolorum et.\n\nQuae saepe sed quos facere perferendis. Est optio in non omnis tenetur mollitia. Dolor voluptas qui impedit nulla nemo. Aut dolor in dolore voluptate enim nihil.\n\nConsequuntur sit veniam non possimus aliquid et atque rem. Inventore rerum sed nisi perspiciatis. Possimus recusandae qui deserunt ea in.\n\nCumque temporibus quos eum at labore non voluptatibus. Quis placeat iusto eaque quam. Vel consectetur nemo vel qui ea in nulla. Fuga officiis debitis sunt dolorem fugiat ut nisi.\n\nInventore quidem quia repudiandae est error itaque. Omnis temporibus tenetur dolorem. Consequuntur amet aut nobis cum. Occaecati ipsum sed odio at nam ut alias.\n\nProvident rerum totam aut est voluptates laudantium. Ex voluptates quia amet a non. Incidunt iure molestiae quis soluta rerum. Voluptatem odit neque ea eos vero consequatur.\n\nQuis enim dolorum beatae sed assumenda. Voluptatem magni esse magnam et. Magni aut qui voluptatem beatae repellat. Odio ea occaecati placeat omnis. Nostrum neque accusantium occaecati enim.\n\nSed eveniet qui assumenda ipsam sed. Quia tempora sed omnis laboriosam atque ut cumque. Facilis corporis nisi maiores velit. Nisi exercitationem maiores aut excepturi impedit consequatur aut.\n\nAssumenda reprehenderit suscipit omnis molestias placeat sed aut quia. Quisquam exercitationem labore rerum eaque nisi blanditiis qui. Reiciendis omnis laborum ea unde exercitationem itaque vel.\n\nOdio nesciunt error et corrupti. Blanditiis libero et sequi ipsam. Maxime corrupti et natus at eaque. A molestiae excepturi molestias consequatur praesentium.\n\nOdio repellat numquam ipsa dignissimos quas. Officiis non quas minus fugiat fugit. Consequuntur eum et ut laborum consequatur sint veniam.\n\nRatione fuga ea veniam consectetur ipsa error. Vero molestias officia fuga rem dolores voluptatum. Eos quo laudantium nisi eligendi. Sapiente vel distinctio rerum ratione.\n\nVoluptas aut consectetur aut rem. Aut vero quaerat facere nobis sed. Dolorem doloribus consequatur veritatis laboriosam architecto alias qui vitae.', 'new', '5', '2', '2017-08-08 09:00:00', 'Et omnis sint ut eos. Atque quod quaerat inventore maiores nemo qui.', '2017-08-08 03:00:00', '2017-08-08 03:00:00'),
(3, 1, 'Adipisci sint voluptatibus veniam atque deleniti facilis.', 'Impedit modi fugit dolorum magnam. Ut et illum quod quasi nesciunt. Sed optio molestiae optio odio fuga. Natus alias dolorem culpa cupiditate.\n\nQuia accusamus animi itaque et et iusto. Dolorem dolores ex excepturi sunt et vel. Provident commodi voluptatum dolorem sint commodi sit. Voluptatem aut qui tempora libero dolorum.\n\nHic aut autem sequi ab dolores sapiente possimus. Qui voluptas beatae non vero sed. Nihil libero reiciendis quidem. Molestiae illo pariatur eum quasi unde nesciunt sint.\n\nLaborum rerum et voluptatem ut iusto ipsa. Commodi asperiores praesentium delectus. Asperiores velit quidem placeat qui dolorem illum explicabo.\n\nHic nisi non minima dolor. Laudantium rerum odio debitis est quia molestiae eos voluptas. Et provident doloremque dolorem rem.\n\nAccusantium et natus iure sit blanditiis et nulla quos. Veritatis quia aut voluptatem maiores quia. Accusamus quia ex molestiae quis minus. Vero qui eaque facilis incidunt excepturi consequatur.\n\nIn molestiae sequi quas. Dolor debitis cumque incidunt officiis placeat tempora. Quisquam consectetur est pariatur quo.\n\nEst mollitia impedit mollitia. Non nihil neque est qui quia.\n\nEius nesciunt veniam harum harum sed quae minus. Fuga a sapiente saepe fugit ducimus libero. Dicta aliquam ea enim voluptas. Quidem est eos dolor et consequatur et quidem.\n\nAutem aut eos dolores enim cum eligendi pariatur. Maiores et distinctio sapiente corrupti suscipit impedit laudantium. Laudantium enim eum error quas molestias.', 'new', '4', '3', '2017-08-09 09:00:00', 'Blanditiis eaque molestiae autem earum dolorum omnis. Vel et aliquam quasi fuga aut sed a. Aut eos doloremque incidunt dignissimos laborum enim. Nobis quisquam itaque sit voluptatem. Optio praesentium officiis quidem id eaque harum similique doloremque.', '2017-08-09 03:00:00', '2017-08-09 03:00:00'),
(4, 1, 'Voluptatem aut ut iste beatae aliquid dignissimos impedit velit illum est.', 'Aut delectus illo nisi eveniet. Sed dolorem libero sapiente expedita ipsam amet. Provident iste qui sit qui non quidem voluptatibus.\n\nDebitis rerum magnam excepturi maiores quam possimus voluptates. Consectetur eum dolore nobis laudantium. Expedita voluptas nihil in ut autem non est repudiandae.\n\nMinus animi praesentium ut modi ut culpa. Quaerat voluptas qui tenetur nam eum ut. Sed distinctio qui veritatis amet repudiandae sunt. Quae eveniet ipsam mollitia aliquam architecto nisi.\n\nDistinctio aut quasi expedita aut voluptatem perferendis. Ex accusantium in aliquid cupiditate blanditiis. Maxime quidem labore accusantium quod in debitis sit. Ut consectetur pariatur ducimus optio est quis labore.\n\nSit sint molestias quis repellat expedita. Eaque odit quibusdam dolor vitae quisquam. Id et et tempora.\n\nQui fugit suscipit laborum velit. Necessitatibus explicabo veritatis cumque ex. Nostrum et consequatur vitae sit dolores neque.\n\nInventore dolores fugiat aperiam asperiores. Itaque qui ad explicabo modi.\n\nItaque ea eum dolorem velit. Architecto et voluptate nihil ea occaecati ex. Nam omnis officiis omnis omnis reiciendis. Sit modi sunt pariatur et tempore nobis modi voluptates.\n\nSit molestiae voluptatem eaque odit ad qui cum asperiores. Voluptate vel assumenda omnis eaque. Aut delectus eos minus autem perferendis. Eius tempora autem qui sunt iste officiis beatae. Provident earum architecto eum omnis soluta quaerat maxime incidunt.\n\nUt sunt quasi quidem et. Quam provident aspernatur officia et et soluta. Est omnis et voluptas eligendi iure autem. Aut rerum molestias consequuntur nihil maiores.\n\nMolestias cumque odit eius autem dicta ut. Incidunt autem dolor corporis et maxime alias deserunt praesentium. Et est sunt soluta cumque. Molestiae qui aut nihil dolor.\n\nEnim eligendi officia sapiente ut. Neque rerum aut illo dolores sed nemo. Quidem harum tempore in iste laudantium animi porro. Omnis tempora est optio.', 'new', '3', '4', '2017-08-10 09:00:00', 'Quos et perspiciatis recusandae doloremque. Numquam qui commodi sed aspernatur quia repellat est. Sed et odio qui neque. Et et unde reprehenderit quasi. Facilis illo harum non qui. Non voluptatem fugit aperiam ut voluptatem sit incidunt.', '2017-08-10 03:00:00', '2017-08-10 03:00:00'),
(5, 3, 'Magnam ea ex dolor expedita consectetur.', 'Et voluptas iure qui illo aliquam nisi officiis labore. Nisi quia consequatur et. Eum est doloremque similique similique veniam fugit aut. Consequatur aliquam sed nemo cum.\n\nOdio occaecati accusamus veritatis sed quia. Et suscipit harum sint omnis eum itaque beatae. Tenetur commodi voluptas similique. Rem mollitia est at ducimus voluptates assumenda autem. Eos enim maxime maxime minus enim repellat consequatur.\n\nAlias rerum qui quaerat recusandae. Placeat commodi modi et ea porro sint voluptatem. Excepturi molestias aliquid aliquid.\n\nFuga est reprehenderit consequuntur consequatur aliquam sint sed quia. Enim consectetur nostrum itaque modi. Officia similique dolorem est modi rerum maxime.\n\nIllum sit veritatis asperiores consequatur est nostrum non. Voluptatem necessitatibus maxime repudiandae odit. Veritatis provident expedita a assumenda. Atque aut facilis iure voluptas.\n\nIn nisi deleniti ut enim. Consequuntur est veritatis sed soluta assumenda. Quaerat itaque non voluptate asperiores ipsam quo. Dolorem rerum et est recusandae perspiciatis iste harum repellendus.\n\nEst corporis perspiciatis quisquam aut optio velit. Quo rerum eos ad et id aut. Aliquid excepturi nemo eligendi omnis impedit rerum. Perspiciatis repudiandae illo fuga enim.\n\nImpedit provident quia cumque. Voluptas illo qui voluptas saepe reiciendis tempora voluptas deserunt. Nobis et eos quis perspiciatis velit animi. Maxime et nam et adipisci voluptatem impedit.\n\nEt a dolorum doloremque et veritatis dolorum officia. Sit aperiam doloremque recusandae dolore alias quo.\n\nEt molestiae dolorum soluta iusto voluptatem alias reprehenderit. Quibusdam rerum voluptatem sint. Perferendis ut repellendus occaecati quasi sunt id. Et quo doloribus sit ut.\n\nNobis sapiente iure voluptate id fugit est dolorem. Repudiandae ut provident est placeat repellendus autem. Alias aliquam sed reiciendis sint fugit. Provident accusamus ex sint omnis sapiente quis.\n\nQuos ipsum consequatur optio facilis dolor sunt. Omnis odio doloremque impedit. Nihil perferendis distinctio ut necessitatibus eaque adipisci exercitationem.\n\nIncidunt aut culpa quo eum illo saepe animi. Eos debitis non magni laborum non. Molestiae libero et quas eius.', 'new', '2', '5', '2017-08-11 09:00:00', 'Repellat quo eos enim accusantium. Enim sit assumenda at quasi quo quibusdam laboriosam doloremque. Laboriosam illum reiciendis quo voluptas pariatur.', '2017-08-11 03:00:00', '2017-08-11 03:00:00'),
(12, 3, 'New Case incident from mobile', 'New Case incident from mobile Content', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-13 05:16:39', '2018-03-13 05:16:39'),
(13, 3, 'New Case incident from mobile', 'New Case incident from mobile Content', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-13 05:19:19', '2018-03-13 05:19:19'),
(14, 3, 'Serious Gazipur Acid Case', 'New Case incident from mobile Content', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-13 07:37:14', '2018-03-13 07:37:14'),
(15, 3, 'Serious Gazipur Acid Case', 'New Case incident from mobile Content', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-17 23:31:13', '2018-03-17 23:31:13'),
(16, 3, 'Serious Gazipur Acid Case', 'New Case incident from mobile Content', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-17 23:31:18', '2018-03-17 23:31:18'),
(17, 3, 'Serious Gazipur Acid Case last', 'New Case incident from mobile Content', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-17 23:32:04', '2018-03-17 23:32:04'),
(18, 3, 'Serious Gazipur Acid Case last', 'New Case incident from mobile Content', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-18 04:38:12', '2018-03-18 04:38:12'),
(19, 3, 'Faridpur Acid Incident', 'New Case incident from mobile Conte', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-18 23:38:59', '2018-03-18 23:38:59'),
(20, 3, 'Faridpur Acid Incident From ASF', 'New Case incident from mobile Contet', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-21 03:51:23', '2018-03-21 03:51:23'),
(21, 3, 'Vola Child marrege incident', 'New Case incident from mobile Contet', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-21 03:52:47', '2018-03-21 03:52:47'),
(22, 3, 'test', 'test details', 'new', '1', '1', '2018-01-01 04:00:04', NULL, '2018-03-22 02:54:41', '2018-03-22 02:54:41'),
(23, 3, 'test', 'test details', 'new', '1', '1', '2018-01-01 04:00:04', NULL, '2018-03-22 02:55:20', '2018-03-22 02:55:20'),
(24, 3, 'Faridpur Child marrege incident', 'New Case incident from mobile Contet', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-28 09:10:12', '2018-03-28 09:10:12'),
(25, 3, 'Faridpur Child marrege incident', 'New Case incident from mobile Contet', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-28 09:10:45', '2018-03-28 09:10:45'),
(26, 3, 'Jamalpur Child marrege incident', 'New Case incident from mobile Contet', 'approve', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-28 09:14:52', '2018-04-08 09:46:30'),
(27, 3, 'coxbazar Child marrege incident', 'New Case incident from mobile Contet', 'open', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-28 09:16:43', '2018-04-11 05:01:05'),
(28, 3, 'Coxbazar Acid ncident', 'New Case incident from mobile Contet', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-28 10:14:34', '2018-03-28 10:14:34'),
(29, 3, 'Coxbazar Acid ncident Two', 'New Case incident from mobile Contet', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-03-29 11:57:58', '2018-03-29 11:57:58'),
(30, 3, 'Coxbazar child merrage incident Two', 'New Case incident from mobile Contet', 'new', '1', '[1,2,3]', '2017-08-07 09:00:00', NULL, '2018-04-05 09:28:53', '2018-04-05 09:28:53'),
(31, 3, 'Coxbazar child merrage incident Two', 'New Case incident from mobile Contet', 'new', '1', '[3,1,2]', '2017-08-07 09:00:00', NULL, '2018-04-05 10:07:55', '2018-04-05 10:07:55'),
(32, 3, 'Coxbazar child merrage incident Two', 'New Case incident from mobile Contet', 'new', '1', NULL, '2017-08-07 09:00:00', NULL, '2018-04-05 10:09:33', '2018-04-05 10:09:33'),
(33, 3, 'Coxbazar child merrage incident Two', 'New Case incident from mobile Contet', 'new', '1', '1', '2017-08-07 09:00:00', NULL, '2018-04-05 10:09:54', '2018-04-05 10:09:54'),
(34, 3, 'Coxbazar child merrage incident Two last', 'New Case incident from mobile Contet', 'new', '1', '[2,3,1]', '2017-08-07 09:00:00', NULL, '2018-04-05 10:10:37', '2018-04-05 10:10:37'),
(35, 3, 'Coxbazar acid incident', 'New Case incident from mobile Contet', 'open', '1', '[2,3,1]', '2017-08-07 09:00:00', NULL, '2018-04-05 12:54:40', '2018-04-08 09:14:05'),
(36, 3, 'test', 'test details', 'new', '1', '1', '2018-01-01 04:00:04', NULL, '2018-04-08 05:45:16', '2018-04-08 05:45:16'),
(37, 3, 'test', 'test details', 'new', '1', '[1,2]', '2018-01-01 04:00:04', NULL, '2018-04-08 05:48:13', '2018-04-08 05:48:13'),
(38, 3, 'Test Case', 'Test Case Details', 'approve', '2', '2,3', '2018-04-08 14:21:43', NULL, '2018-04-08 08:22:16', '2018-04-11 09:32:32'),
(40, 3, 'Test', 'Test Details', 'new', '1', '1', '2018-04-08 14:26:04', NULL, '2018-04-08 08:26:22', '2018-04-08 08:26:22'),
(41, 3, 'Test', 'Test Details', 'new', '1', '1,2', '2018-04-08 14:26:04', NULL, '2018-04-08 08:27:34', '2018-04-08 08:27:34'),
(42, 3, 'Tarun Case', 'Tarun Case Details', 'approve', '3', '1,2', '2018-04-08 14:44:52', NULL, '2018-04-08 08:45:27', '2018-04-12 07:16:51'),
(43, 3, 'T 1 c', 'T 1 f', 'approve', '1', '1,2', '2018-04-08 15:05:59', NULL, '2018-04-08 09:06:29', '2018-04-08 09:20:25'),
(44, 3, 'T 2 c', 'T 2 d', 'open', '1', '1,2', '2018-04-08 15:17:53', NULL, '2018-04-08 09:18:41', '2018-04-11 05:32:50'),
(47, 3, 'New case C', 'New case D', 'approve', '1', '2,3', '2018-04-12 14:22:00', NULL, '2018-04-11 08:23:41', '2018-04-11 09:10:26'),
(48, 2, 'Gazipur acid incident case', 'Serius ibjured', 'approve', '1', '1,2', '2018-04-02 15:34:00', NULL, '2018-04-11 09:35:10', '2018-04-12 06:57:59'),
(50, 2, 'Faridpur burn incident', 'This is faridpur serious case burn victim', 'open', '2', '1', '2018-04-09 11:50:00', NULL, '2018-04-12 05:52:04', '2018-04-12 06:54:55'),
(53, 2, 'Faridpur case incident', 'serious case incident', 'new', '2', '2', '2018-04-14 11:39:00', NULL, '2018-04-15 05:40:44', '2018-04-15 05:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `case_metas`
--

CREATE TABLE `case_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_metas`
--

INSERT INTO `case_metas` (`id`, `case_id`, `user_id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 13, 3, 'multi_files_images-0', '/2018/03/1520939960_androidslider-compressor.jpg', NULL, NULL),
(2, 13, 3, 'multi_files_images-1', '/2018/03/1520939960_postfeatimg18.jpg', NULL, NULL),
(3, 14, 3, 'multi_files_images-0', '/2018/03/1520948234_androidslider-compressor.jpg', NULL, NULL),
(4, 14, 3, 'multi_files_images-1', '/2018/03/1520948234_postfeatimg18.jpg', NULL, NULL),
(5, 19, 3, 'multi_files_images-0', '/2018/03/1521437939_postfeatimg21.jpg', NULL, NULL),
(6, 19, 3, 'multi_files_images-1', '/2018/03/1521437939_postfeatimg23.jpg', NULL, NULL),
(7, 20, 3, 'multi_files_images-0', '/2018/03/1521625883_postfeatimg6.jpg', NULL, NULL),
(8, 20, 3, 'multi_files_images-1', '/2018/03/1521625883_postfeatimg21.jpg', NULL, NULL),
(9, 21, 3, 'multi_files_images-0', '/2018/03/1521625967_androidslider-compressor.jpg', NULL, NULL),
(10, 21, 3, 'multi_files_images-1', '/2018/03/1521625967_androidslider-compressor.jpg', NULL, NULL),
(11, 23, 3, 'multi_files_images-0', '/2018/03/1521708921_dashboardrevised022x.png', NULL, NULL),
(12, 23, 3, 'multi_files_images-1', '/2018/03/1521708921_dashboard-empty.png', NULL, NULL),
(13, 24, 3, 'multi_files-0', '/2018/03/1522228213_asf---incident-management-app---process-flow.pdf', NULL, NULL),
(14, 25, 3, 'multi_files_images-0', '/2018/03/1522228246_1.png', NULL, NULL),
(15, 25, 3, 'multi_files_images-1', '/2018/03/1522228246_2.png', NULL, NULL),
(16, 25, 3, 'multi_files-2', '/2018/03/1522228246_asf---incident-management-app---process-flow.pdf', NULL, NULL),
(17, 26, 3, 'other_filed', 'Test additional filed', NULL, NULL),
(18, 26, 3, 'multi_files_images-0', '/2018/03/1522228492_1.png', NULL, NULL),
(19, 26, 3, 'multi_files_images-1', '/2018/03/1522228492_2.png', NULL, NULL),
(20, 26, 3, 'multi_files-2', '/2018/03/1522228492_asf---incident-management-app---process-flow.pdf', NULL, NULL),
(21, 26, 3, 'single_files-additional_files', '/2018/03/1522228492_6.png', NULL, NULL),
(22, 27, 3, 'other_filed', 'Test additional filed', NULL, NULL),
(23, 27, 3, 'multi_files_images-0', '/2018/03/1522228603_1.png', NULL, NULL),
(24, 27, 3, 'multi_files_images-1', '/2018/03/1522228603_2.png', NULL, NULL),
(25, 27, 3, 'multi_files-2', '/2018/03/1522228603_asf---incident-management-app---process-flow.pdf', NULL, NULL),
(26, 27, 3, 'single_files-additional_files_image', '/2018/03/1522228603_6.png', NULL, NULL),
(27, 27, 3, 'additional_files_other', '/2018/03/1522228604_1right to information act 2009.pdf', NULL, NULL),
(28, 28, 3, 'other_filed', 'Test additional filed', NULL, NULL),
(29, 28, 3, 'multi_files_images-0', '/2018/03/1522232075_1.png', NULL, NULL),
(30, 28, 3, 'multi_files_images-1', '/2018/03/1522232075_2.png', NULL, NULL),
(31, 28, 3, 'multi_files_other-2', '/2018/03/1522232075_asf---incident-management-app---process-flow.pdf', NULL, NULL),
(32, 28, 3, 'single_file_image-additional_files_image', '/2018/03/1522232075_6.png', NULL, NULL),
(33, 28, 3, 'single_file_other-additional_files_other', '/2018/03/1522232075_1right-to-information-act-2009.pdf', NULL, NULL),
(34, 28, 2, 'case_info_hd|text_content_1', 'This is serious case from help desk team', NULL, NULL),
(35, 28, 2, 'case_info_hd|all_files_1|file_1', 'a:4:{s:8:\"filename\";s:20:\"1522313350_hero7.jpg\";s:3:\"url\";s:29:\"/2018/03/1522313350_hero7.jpg\";s:8:\"url_full\";s:62:\"http://172.16.231.77:8000/uploads/2018/03/1522313350_hero7.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(36, 28, 2, 'case_info_hd|all_files_1|file_2', 'a:4:{s:8:\"filename\";s:20:\"1522313350_hero8.jpg\";s:3:\"url\";s:29:\"/2018/03/1522313350_hero8.jpg\";s:8:\"url_full\";s:62:\"http://172.16.231.77:8000/uploads/2018/03/1522313350_hero8.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(37, 28, 2, 'case_info_hd|all_files_1|file_3', 'a:4:{s:8:\"filename\";s:31:\"1522313350_product-single-2.jpg\";s:3:\"url\";s:40:\"/2018/03/1522313350_product-single-2.jpg\";s:8:\"url_full\";s:73:\"http://172.16.231.77:8000/uploads/2018/03/1522313350_product-single-2.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(38, 28, 2, 'case_info_hd|all_files_1|file_4', 'a:4:{s:8:\"filename\";s:31:\"1522313350_product-single-3.jpg\";s:3:\"url\";s:40:\"/2018/03/1522313350_product-single-3.jpg\";s:8:\"url_full\";s:73:\"http://172.16.231.77:8000/uploads/2018/03/1522313350_product-single-3.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(39, 28, 2, 'case_info_hd|text_content_1', 'This is test message', NULL, NULL),
(40, 28, 2, 'case_info_hd|all_files_1|file_1', 'a:4:{s:8:\"filename\";s:20:\"1522314151_hero7.jpg\";s:3:\"url\";s:29:\"/2018/03/1522314151_hero7.jpg\";s:8:\"url_full\";s:62:\"http://172.16.231.77:8000/uploads/2018/03/1522314151_hero7.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(41, 28, 2, 'case_info_hd|text_content_1', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', NULL, NULL),
(42, 28, 2, 'case_info_hd|all_files_1|file_1', 'a:4:{s:8:\"filename\";s:20:\"1522314557_work5.jpg\";s:3:\"url\";s:29:\"/2018/03/1522314557_work5.jpg\";s:8:\"url_full\";s:62:\"http://172.16.231.77:8000/uploads/2018/03/1522314557_work5.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(43, 28, 2, 'case_info_hd|all_files_1|file_2', 'a:4:{s:8:\"filename\";s:24:\"1522314557_ab-apps-1.jpg\";s:3:\"url\";s:33:\"/2018/03/1522314557_ab-apps-1.jpg\";s:8:\"url_full\";s:66:\"http://172.16.231.77:8000/uploads/2018/03/1522314557_ab-apps-1.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(44, 28, 2, 'case_info_hd|all_files_1|file_3', 'a:3:{s:8:\"filename\";s:23:\"1522314557_scan0003.pdf\";s:3:\"url\";s:32:\"/2018/03/1522314557_scan0003.pdf\";s:8:\"url_full\";s:65:\"http://172.16.231.77:8000/uploads/2018/03/1522314557_scan0003.pdf\";}', NULL, NULL),
(45, 28, 2, 'case_info_hd|text_content-2', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', NULL, NULL),
(46, 28, 2, 'case_info_hd|all_files-2|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522314631_1right to information act 2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522314631_1right to information act 2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522314631_1right to information act 2009.pdf\";}', NULL, NULL),
(47, 28, 2, 'case_info_hd|all_files_1|file_2', 'a:4:{s:8:\"filename\";s:30:\"1522314631_head-office-pic.jpg\";s:3:\"url\";s:39:\"/2018/03/1522314631_head-office-pic.jpg\";s:8:\"url_full\";s:72:\"http://172.16.231.77:8000/uploads/2018/03/1522314631_head-office-pic.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', NULL, NULL),
(56, 28, 2, 'case_info_hd|hd_content-1|text_content', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', '2018-03-28 22:25:45', NULL),
(57, 28, 2, 'case_info_hd|hd_content-1|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522319145_1right-to-information-act-2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522319145_1right-to-information-act-2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522319145_1right-to-information-act-2009.pdf\";}', '2018-03-28 22:25:45', NULL),
(58, 28, 2, 'case_info_hd|hd_content-1|file-2', 'a:4:{s:8:\"filename\";s:19:\"1522319145_logo.png\";s:3:\"url\";s:28:\"/2018/03/1522319145_logo.png\";s:8:\"url_full\";s:61:\"http://172.16.231.77:8000/uploads/2018/03/1522319145_logo.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:25:45', NULL),
(59, 28, 2, 'case_info_hd|hd_content-1|file-3', 'a:4:{s:8:\"filename\";s:26:\"1522319145_wp4.4.2-erd.png\";s:3:\"url\";s:35:\"/2018/03/1522319145_wp4.4.2-erd.png\";s:8:\"url_full\";s:68:\"http://172.16.231.77:8000/uploads/2018/03/1522319145_wp4.4.2-erd.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:25:45', NULL),
(60, 28, 2, 'case_info_hd|hd_content-1|text_content', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', '2018-03-28 22:29:17', NULL),
(61, 28, 2, 'case_info_hd|hd_content-1|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522319357_1right-to-information-act-2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522319357_1right-to-information-act-2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522319357_1right-to-information-act-2009.pdf\";}', '2018-03-28 22:29:17', NULL),
(62, 28, 2, 'case_info_hd|hd_content-1|file-2', 'a:4:{s:8:\"filename\";s:19:\"1522319357_logo.png\";s:3:\"url\";s:28:\"/2018/03/1522319357_logo.png\";s:8:\"url_full\";s:61:\"http://172.16.231.77:8000/uploads/2018/03/1522319357_logo.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:29:17', NULL),
(63, 28, 2, 'case_info_hd|hd_content-1|file-3', 'a:4:{s:8:\"filename\";s:26:\"1522319357_wp4.4.2-erd.png\";s:3:\"url\";s:35:\"/2018/03/1522319357_wp4.4.2-erd.png\";s:8:\"url_full\";s:68:\"http://172.16.231.77:8000/uploads/2018/03/1522319357_wp4.4.2-erd.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:29:17', NULL),
(64, 28, 2, 'case_info_hd|hd_content-1|text_content', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', '2018-03-28 22:30:15', NULL),
(65, 28, 2, 'case_info_hd|hd_content-1|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522319415_1right-to-information-act-2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522319415_1right-to-information-act-2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522319415_1right-to-information-act-2009.pdf\";}', '2018-03-28 22:30:15', NULL),
(66, 28, 2, 'case_info_hd|hd_content-1|file-2', 'a:4:{s:8:\"filename\";s:19:\"1522319415_logo.png\";s:3:\"url\";s:28:\"/2018/03/1522319415_logo.png\";s:8:\"url_full\";s:61:\"http://172.16.231.77:8000/uploads/2018/03/1522319415_logo.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:30:15', NULL),
(67, 28, 2, 'case_info_hd|hd_content-1|file-3', 'a:4:{s:8:\"filename\";s:26:\"1522319415_wp4.4.2-erd.png\";s:3:\"url\";s:35:\"/2018/03/1522319415_wp4.4.2-erd.png\";s:8:\"url_full\";s:68:\"http://172.16.231.77:8000/uploads/2018/03/1522319415_wp4.4.2-erd.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:30:15', NULL),
(68, 28, 2, 'case_info_hd|hd_content-1|text_content', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', '2018-03-28 22:30:27', NULL),
(69, 28, 2, 'case_info_hd|hd_content-1|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522319427_1right-to-information-act-2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522319427_1right-to-information-act-2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522319427_1right-to-information-act-2009.pdf\";}', '2018-03-28 22:30:27', NULL),
(70, 28, 2, 'case_info_hd|hd_content-1|file-2', 'a:4:{s:8:\"filename\";s:19:\"1522319427_logo.png\";s:3:\"url\";s:28:\"/2018/03/1522319427_logo.png\";s:8:\"url_full\";s:61:\"http://172.16.231.77:8000/uploads/2018/03/1522319427_logo.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:30:27', NULL),
(71, 28, 2, 'case_info_hd|hd_content-1|file-3', 'a:4:{s:8:\"filename\";s:26:\"1522319427_wp4.4.2-erd.png\";s:3:\"url\";s:35:\"/2018/03/1522319427_wp4.4.2-erd.png\";s:8:\"url_full\";s:68:\"http://172.16.231.77:8000/uploads/2018/03/1522319427_wp4.4.2-erd.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:30:27', NULL),
(72, 28, 2, 'case_info_hd|hd_content-1|text_content', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', '2018-03-28 22:32:04', NULL),
(73, 28, 2, 'case_info_hd|hd_content-1|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522319524_1right-to-information-act-2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522319524_1right-to-information-act-2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522319524_1right-to-information-act-2009.pdf\";}', '2018-03-28 22:32:04', NULL),
(74, 28, 2, 'case_info_hd|hd_content-1|file-2', 'a:4:{s:8:\"filename\";s:19:\"1522319524_logo.png\";s:3:\"url\";s:28:\"/2018/03/1522319524_logo.png\";s:8:\"url_full\";s:61:\"http://172.16.231.77:8000/uploads/2018/03/1522319524_logo.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:32:04', NULL),
(75, 28, 2, 'case_info_hd|hd_content-1|file-3', 'a:4:{s:8:\"filename\";s:26:\"1522319524_wp4.4.2-erd.png\";s:3:\"url\";s:35:\"/2018/03/1522319524_wp4.4.2-erd.png\";s:8:\"url_full\";s:68:\"http://172.16.231.77:8000/uploads/2018/03/1522319524_wp4.4.2-erd.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:32:04', NULL),
(76, 28, 2, 'case_info_hd|hd_content-1|text_content', 'I have been on google for hours trying out others people ideas but none of them seem to be working.', '2018-03-28 22:32:18', NULL),
(77, 28, 2, 'case_info_hd|hd_content-1|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522319538_1right-to-information-act-2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522319538_1right-to-information-act-2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522319538_1right-to-information-act-2009.pdf\";}', '2018-03-28 22:32:18', NULL),
(78, 28, 2, 'case_info_hd|hd_content-1|file-2', 'a:4:{s:8:\"filename\";s:19:\"1522319538_logo.png\";s:3:\"url\";s:28:\"/2018/03/1522319538_logo.png\";s:8:\"url_full\";s:61:\"http://172.16.231.77:8000/uploads/2018/03/1522319538_logo.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:32:18', NULL),
(79, 28, 2, 'case_info_hd|hd_content-1|file-3', 'a:4:{s:8:\"filename\";s:26:\"1522319538_wp4.4.2-erd.png\";s:3:\"url\";s:35:\"/2018/03/1522319538_wp4.4.2-erd.png\";s:8:\"url_full\";s:68:\"http://172.16.231.77:8000/uploads/2018/03/1522319538_wp4.4.2-erd.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:32:18', NULL),
(80, 28, 2, 'case_info_hd|hd_content_text|text_content', 'I have been on google for hours trying out others people ideas but none of them seem to be working. wwwwwwwwwwwwww', '2018-03-28 22:56:13', NULL),
(81, 28, 2, 'case_info_hd|hd_content_files|file-1', 'a:3:{s:8:\"filename\";s:45:\"1522320973_1right-to-information-act-2009.pdf\";s:3:\"url\";s:54:\"/2018/03/1522320973_1right-to-information-act-2009.pdf\";s:8:\"url_full\";s:87:\"http://172.16.231.77:8000/uploads/2018/03/1522320973_1right-to-information-act-2009.pdf\";}', '2018-03-28 22:56:13', NULL),
(82, 28, 2, 'case_info_hd|hd_content_files|file-2', 'a:4:{s:8:\"filename\";s:22:\"1522320973_logo-sm.png\";s:3:\"url\";s:31:\"/2018/03/1522320973_logo-sm.png\";s:8:\"url_full\";s:64:\"http://172.16.231.77:8000/uploads/2018/03/1522320973_logo-sm.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:56:13', NULL),
(83, 28, 2, 'case_info_hd|hd_content_files|file-3', 'a:4:{s:8:\"filename\";s:19:\"1522320973_logo.png\";s:3:\"url\";s:28:\"/2018/03/1522320973_logo.png\";s:8:\"url_full\";s:61:\"http://172.16.231.77:8000/uploads/2018/03/1522320973_logo.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-28 22:56:13', NULL),
(84, 29, 3, 'other_filed', 'Test additional filed', NULL, NULL),
(85, 29, 3, 'multi_files_other-0', '/2018/03/1522324678_1right-to-information-act-2009.pdf', NULL, NULL),
(86, 29, 3, 'multi_files_images-1', '/2018/03/1522324678_head-office-pic.jpg', NULL, NULL),
(87, 29, 3, 'multi_files_images-2', '/2018/03/1522324678_img20160713171204r.jpg', NULL, NULL),
(88, 29, 3, 'single_file_image-additional_files_image', '/2018/03/1522324678_bangladeshi-it-industry.jpg', NULL, NULL),
(89, 29, 3, 'single_file_other-additional_files_other', '/2018/03/1522324678_design-of-bod-page.pdf', NULL, NULL),
(90, 28, 2, 'case_info_hd|hd_content_text-4|text_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-03-29 01:03:35', NULL),
(91, 28, 2, 'case_info_hd|hd_content_files-4|file-1', 'a:4:{s:8:\"filename\";s:28:\"1522328615_postfeatimg25.jpg\";s:3:\"url\";s:37:\"/2018/03/1522328615_postfeatimg25.jpg\";s:8:\"url_full\";s:70:\"http://172.16.231.77:8000/uploads/2018/03/1522328615_postfeatimg25.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:03:35', NULL),
(92, 28, 2, 'case_info_hd|hd_content_files-4|file-2', 'a:4:{s:8:\"filename\";s:27:\"1522328615_postfeatimg9.jpg\";s:3:\"url\";s:36:\"/2018/03/1522328615_postfeatimg9.jpg\";s:8:\"url_full\";s:69:\"http://172.16.231.77:8000/uploads/2018/03/1522328615_postfeatimg9.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:03:35', NULL),
(93, 28, 2, 'case_info_hd|hd_content_text-4|text_content', '', '2018-03-29 01:04:31', NULL),
(94, 28, 2, 'case_info_hd|hd_content_files-4|file-1', 'a:3:{s:8:\"filename\";s:22:\"1522328671_license.pdf\";s:3:\"url\";s:31:\"/2018/03/1522328671_license.pdf\";s:8:\"url_full\";s:64:\"http://172.16.231.77:8000/uploads/2018/03/1522328671_license.pdf\";}', '2018-03-29 01:04:31', NULL),
(95, 28, 2, 'case_info_hd|hd_content_text-4|text_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-03-29 01:06:56', NULL),
(96, 28, 2, 'case_info_hd|hd_content_files-4|file-1', 'a:3:{s:8:\"filename\";s:22:\"1522328816_license.pdf\";s:3:\"url\";s:31:\"/2018/03/1522328816_license.pdf\";s:8:\"url_full\";s:64:\"http://172.16.231.77:8000/uploads/2018/03/1522328816_license.pdf\";}', '2018-03-29 01:06:56', NULL),
(97, 28, 2, 'case_info_hd|hd_content_files-4|file-1', 'a:4:{s:8:\"filename\";s:77:\"1522328926_minify---w3-total-cache-google-hightest-score--gtcl--wordpress.png\";s:3:\"url\";s:86:\"/2018/03/1522328926_minify---w3-total-cache-google-hightest-score--gtcl--wordpress.png\";s:8:\"url_full\";s:119:\"http://172.16.231.77:8000/uploads/2018/03/1522328926_minify---w3-total-cache-google-hightest-score--gtcl--wordpress.png\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:08:46', NULL),
(98, 28, 2, 'case_info_hd|hd_content_text-4|text_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-03-29 01:09:33', NULL),
(99, 28, 2, 'case_info_hd|hd_content_text-8|text_content', 'Raiha Chow Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-03-29 01:28:12', NULL),
(100, 28, 2, 'case_info_hd|hd_content_files-9|file-1', 'a:4:{s:8:\"filename\";s:21:\"1522330225_slide2.jpg\";s:3:\"url\";s:30:\"/2018/03/1522330225_slide2.jpg\";s:8:\"url_full\";s:63:\"http://172.16.231.77:8000/uploads/2018/03/1522330225_slide2.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:30:25', NULL),
(101, 28, 2, 'case_info_hd|hd_content_files-9|file-2', 'a:4:{s:8:\"filename\";s:21:\"1522330225_slide3.jpg\";s:3:\"url\";s:30:\"/2018/03/1522330225_slide3.jpg\";s:8:\"url_full\";s:63:\"http://172.16.231.77:8000/uploads/2018/03/1522330225_slide3.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:30:25', NULL),
(102, 29, 2, 'case_info_hd|hd_content_text-0|text_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-03-29 01:52:57', NULL),
(103, 29, 2, 'case_info_hd|hd_content_files-0|file-1', 'a:4:{s:8:\"filename\";s:21:\"1522331577_slide1.jpg\";s:3:\"url\";s:30:\"/2018/03/1522331577_slide1.jpg\";s:8:\"url_full\";s:63:\"http://172.16.231.77:8000/uploads/2018/03/1522331577_slide1.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:52:57', NULL),
(104, 29, 2, 'case_info_hd|hd_content_files-0|file-2', 'a:4:{s:8:\"filename\";s:21:\"1522331577_slide2.jpg\";s:3:\"url\";s:30:\"/2018/03/1522331577_slide2.jpg\";s:8:\"url_full\";s:63:\"http://172.16.231.77:8000/uploads/2018/03/1522331577_slide2.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:52:57', NULL),
(105, 29, 2, 'case_info_hd|hd_content_files-0|file-3', 'a:4:{s:8:\"filename\";s:21:\"1522331577_slide3.jpg\";s:3:\"url\";s:30:\"/2018/03/1522331577_slide3.jpg\";s:8:\"url_full\";s:63:\"http://172.16.231.77:8000/uploads/2018/03/1522331577_slide3.jpg\";s:9:\"url_thumb\";s:42:\"http://172.16.231.77:8000/uploads/2018/03/\";}', '2018-03-29 01:52:57', NULL),
(106, 29, 89, 'case_info_hd|hd_content_text-3|text_content', 'Getting Started', '2018-03-31 20:56:37', NULL),
(107, 29, 89, 'case_info_hd|hd_content_files-3|file-1', 'a:3:{s:8:\"filename\";s:22:\"1522572997_license.pdf\";s:3:\"url\";s:31:\"/2018/04/1522572997_license.pdf\";s:8:\"url_full\";s:65:\"http://172.16.228.210:8000/uploads/2018/04/1522572997_license.pdf\";}', '2018-03-31 20:56:37', NULL),
(108, 29, 89, 'case_info_admin|admin_content_text-0|text_content', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary', '2018-03-31 21:26:37', NULL),
(109, 29, 89, 'case_info_admin|admin_content_files-0|file-1', 'a:3:{s:8:\"filename\";s:22:\"1522574797_license.pdf\";s:3:\"url\";s:31:\"/2018/04/1522574797_license.pdf\";s:8:\"url_full\";s:65:\"http://172.16.228.210:8000/uploads/2018/04/1522574797_license.pdf\";}', '2018-03-31 21:26:37', NULL),
(110, 29, 89, 'case_info_admin|admin_content_files-0|file-2', 'a:4:{s:8:\"filename\";s:17:\"1522574797_05.jpg\";s:3:\"url\";s:26:\"/2018/04/1522574797_05.jpg\";s:8:\"url_full\";s:26:\"/2018/04/1522574797_05.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-03-31 21:26:37', NULL),
(111, 29, 89, 'case_info_admin|admin_content_files-0|file-3', 'a:4:{s:8:\"filename\";s:17:\"1522574797_09.jpg\";s:3:\"url\";s:26:\"/2018/04/1522574797_09.jpg\";s:8:\"url_full\";s:26:\"/2018/04/1522574797_09.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-03-31 21:26:37', NULL),
(112, 29, 89, 'case_info_admin|admin_content_text-4|text_content', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable', '2018-03-31 21:36:19', NULL),
(113, 29, 89, 'case_info_admin|admin_content_files-4|file-1', 'a:4:{s:8:\"filename\";s:17:\"1522575379_13.jpg\";s:3:\"url\";s:26:\"/2018/04/1522575379_13.jpg\";s:8:\"url_full\";s:26:\"/2018/04/1522575379_13.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-03-31 21:36:19', NULL),
(114, 29, 89, 'case_info_admin|admin_content_files-6|file-1', 'a:3:{s:8:\"filename\";s:22:\"1522575407_license.pdf\";s:3:\"url\";s:31:\"/2018/04/1522575407_license.pdf\";s:8:\"url_full\";s:65:\"http://172.16.228.210:8000/uploads/2018/04/1522575407_license.pdf\";}', '2018-03-31 21:36:47', NULL),
(115, 29, 89, 'case_info_ff|ff_content_text-0|text_content', '&#34;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&#34;', '2018-03-31 22:16:52', NULL),
(116, 29, 89, 'case_info_ff|ff_content_files-0|file-1', 'a:3:{s:8:\"filename\";s:22:\"1522577812_license.pdf\";s:3:\"url\";s:31:\"/2018/04/1522577812_license.pdf\";s:8:\"url_full\";s:65:\"http://172.16.228.210:8000/uploads/2018/04/1522577812_license.pdf\";}', '2018-03-31 22:16:52', NULL),
(117, 29, 89, 'case_info_ff|ff_content_files-0|file-2', 'a:4:{s:8:\"filename\";s:33:\"1522577812_west-zone-pipeline.jpg\";s:3:\"url\";s:42:\"/2018/04/1522577812_west-zone-pipeline.jpg\";s:8:\"url_full\";s:42:\"/2018/04/1522577812_west-zone-pipeline.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-03-31 22:16:52', NULL),
(118, 29, 89, 'case_info_ff|ff_content_text-3|text_content', 'Section 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34;, written by Cicero in 45 BC', '2018-03-31 22:19:58', NULL),
(119, 29, 89, 'case_info_ff|ff_content_files-3|file-1', 'a:4:{s:8:\"filename\";s:37:\"1522577998_north-south-pipeline-1.jpg\";s:3:\"url\";s:46:\"/2018/04/1522577998_north-south-pipeline-1.jpg\";s:8:\"url_full\";s:46:\"/2018/04/1522577998_north-south-pipeline-1.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-03-31 22:19:58', NULL),
(120, 29, 89, 'case_info_admin|admin_content_text-7|text_content', 'Section 1.10.32 of &#34;de Finibus Bonorum \r\n et Malorum&#34;, written by Cicero in 45 BC', '2018-03-31 22:23:15', NULL),
(121, 29, 89, 'case_info_admin|admin_content_text-8|text_content', 'Bonorum et Malorum&#34;, written by  Cicero in 45 BC', '2018-03-31 22:24:46', NULL),
(122, 29, 89, 'case_info_hd|hd_content_text-6|text_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-01 19:29:55', NULL),
(123, 29, 89, 'case_info_hd|hd_content_files-6|file-1', 'a:4:{s:8:\"filename\";s:43:\"1522654195_1521106748postfeatimg23thumb.jpg\";s:3:\"url\";s:52:\"/2018/04/1522654195_1521106748postfeatimg23thumb.jpg\";s:8:\"url_full\";s:52:\"/2018/04/1522654195_1521106748postfeatimg23thumb.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-01 19:29:55', NULL),
(124, 29, 89, 'case_info_hd|hd_content_files-6|file-2', 'a:4:{s:8:\"filename\";s:38:\"1522654195_1521354945postfeatimg10.jpg\";s:3:\"url\";s:47:\"/2018/04/1522654195_1521354945postfeatimg10.jpg\";s:8:\"url_full\";s:47:\"/2018/04/1522654195_1521354945postfeatimg10.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-01 19:29:55', NULL),
(125, 29, 89, 'case_info_hd|hd_content_text-9|text_content', 'five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-03 01:05:21', NULL),
(126, 29, 89, 'case_info_ff|ff_content_text-5|text_content', 'Section 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34;, written by Cicero in 45 BC', '2018-04-03 01:05:50', NULL),
(127, 29, 89, 'case_info_admin|admin_content_text-9|text_content', 'Block Quotes Pulled Right', '2018-04-03 01:06:22', NULL),
(128, 29, 3, 'case_info_hd|hd_content_text-10|text_content', 'Block Quotes Pulled Right', '2018-04-03 01:06:34', NULL),
(129, 23, 89, 'case_info_admin|admin_content_text-0|text_content', 'Section 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34;, written by Cicero in 45 BC\r\nSection 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34;, written by Cicero in 45 BC', '2018-04-03 01:13:06', NULL),
(130, 23, 89, 'case_info_admin|admin_content_files-0|file-1', 'a:4:{s:8:\"filename\";s:25:\"1522761186_city-touch.png\";s:3:\"url\";s:34:\"/2018/04/1522761186_city-touch.png\";s:8:\"url_full\";s:34:\"/2018/04/1522761186_city-touch.png\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-03 01:13:06', NULL),
(131, 23, 89, 'case_info_admin|admin_content_text-1|text_content', 'This is very serous message', '2018-04-03 02:02:54', NULL),
(132, 28, 2, 'case_info_ff|ff_content_text-0|text_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-04 05:10:07', NULL),
(133, 28, 89, 'case_info_ff|ff_content_files-0|file-1', 'a:4:{s:8:\"filename\";s:93:\"1522818607_37405c10a8aef93ebf81b6b21f26d20769ec935b657c3f9d57pimgpshfullsizedistr-360x270.jpg\";s:3:\"url\";s:102:\"/2018/04/1522818607_37405c10a8aef93ebf81b6b21f26d20769ec935b657c3f9d57pimgpshfullsizedistr-360x270.jpg\";s:8:\"url_full\";s:102:\"/2018/04/1522818607_37405c10a8aef93ebf81b6b21f26d20769ec935b657c3f9d57pimgpshfullsizedistr-360x270.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-04 05:10:07', NULL),
(134, 28, 89, 'case_info_ff|ff_content_files-0|file-2', 'a:4:{s:8:\"filename\";s:33:\"1522818607_city-touch-632x395.png\";s:3:\"url\";s:42:\"/2018/04/1522818607_city-touch-632x395.png\";s:8:\"url_full\";s:42:\"/2018/04/1522818607_city-touch-632x395.png\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-04 05:10:07', NULL),
(135, 29, 89, 'case_info_hd|hd_content_text-11|text_content', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 22:41:24', NULL),
(136, 29, 89, 'case_info_hd|hd_content_files-11|file-1', 'a:4:{s:8:\"filename\";s:93:\"1522838484_37405c10a8aef93ebf81b6b21f26d20769ec935b657c3f9d57pimgpshfullsizedistr-296x300.jpg\";s:3:\"url\";s:102:\"/2018/04/1522838484_37405c10a8aef93ebf81b6b21f26d20769ec935b657c3f9d57pimgpshfullsizedistr-296x300.jpg\";s:8:\"url_full\";s:102:\"/2018/04/1522838484_37405c10a8aef93ebf81b6b21f26d20769ec935b657c3f9d57pimgpshfullsizedistr-296x300.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-03 22:41:24', NULL),
(137, 29, 89, 'case_info_hd|hd_content_files-11|file-2', 'a:4:{s:8:\"filename\";s:54:\"1522838484_challenges-in-banking-blog-post-296x354.png\";s:3:\"url\";s:63:\"/2018/04/1522838484_challenges-in-banking-blog-post-296x354.png\";s:8:\"url_full\";s:63:\"/2018/04/1522838484_challenges-in-banking-blog-post-296x354.png\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-03 22:41:24', NULL),
(138, 29, 89, 'case_info_hd|hd_content_files-11|file-3', 'a:3:{s:8:\"filename\";s:22:\"1522838484_license.pdf\";s:3:\"url\";s:31:\"/2018/04/1522838484_license.pdf\";s:8:\"url_full\";s:65:\"http://172.16.228.210:8000/uploads/2018/04/1522838484_license.pdf\";}', '2018-04-03 22:41:24', NULL),
(139, 29, 89, 'case_info_hd|hd_content_text-11|text_content', 'This is hacking things', '2018-04-03 22:43:41', NULL),
(140, 29, 89, 'case_info_admin|admin_content_text-10|text_content', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 22:50:33', NULL),
(141, 29, 89, 'case_info_admin|admin_content_text-11|text_content', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 22:51:19', NULL),
(142, 29, 89, 'case_info_admin|admin_content_text-12|text_content', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 22:51:32', NULL),
(143, 28, 89, 'case_info_admin|admin_content_text-0|text_content', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 22:54:22', NULL),
(144, 23, 2, 'case_info_hd|hd_content_text-0|text_content', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 22:54:57', NULL),
(145, 20, 2, 'case_info_admin|admin_content_text-0|text_content', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:\r\nI had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 23:19:54', NULL),
(146, 20, 2, 'case_info_admin|admin_content_text-0|text_content', 'adsssss', '2018-04-03 23:20:14', NULL),
(147, 20, 2, 'case_info_admin|admin_content_text-1|text_content|sp-0', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:\r\n\r\nI had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 23:40:11', NULL),
(148, 20, 2, 'case_info_admin|admin_content_text-1|text_content|sp-0', 'dsfjkdskjfhdksljhafdskjhfkjl', '2018-04-03 23:40:34', NULL),
(149, 20, 2, 'case_info_admin|admin_content_text-1|text_content|sp-0', 'asdasdswwwwwwwwww', '2018-04-03 23:41:42', NULL),
(150, 20, 2, 'case_info_admin|admin_content_text-1|text_content|sp-1522842415', 'wwwwwwwwwwwww', '2018-04-03 23:46:55', NULL),
(151, 20, 2, 'case_info_admin|admin_content_text-1|text_content|sp-1522842441', 'I had been hunting for an answer to the elusive question of how do I reset array keys in PHP.  I finally found the perfect (and thorough) answer here. There are 3 ways to reset array keys in PHP.  All of these solutions work with numerically indexed arrays only. To recap:', '2018-04-03 23:47:21', NULL),
(152, 20, 2, 'case_info_admin|admin_content_files-1|file-1', 'a:3:{s:8:\"filename\";s:22:\"1522842515_license.pdf\";s:3:\"url\";s:31:\"/2018/04/1522842515_license.pdf\";s:8:\"url_full\";s:65:\"http://172.16.228.210:8000/uploads/2018/04/1522842515_license.pdf\";}', '2018-04-03 23:48:35', NULL),
(153, 20, 2, 'case_info_admin|admin_content_files-1|file-1|sp-1522842548', 'a:4:{s:8:\"filename\";s:24:\"1522842548_aboutimg2.jpg\";s:3:\"url\";s:33:\"/2018/04/1522842548_aboutimg2.jpg\";s:8:\"url_full\";s:33:\"/2018/04/1522842548_aboutimg2.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-03 23:49:08', NULL),
(154, 20, 2, 'case_info_admin|admin_content_text-2|text_content', 'zfsfdsadsadas', '2018-04-04 00:05:27', NULL),
(155, 28, 2, 'case_info_admin|admin_content_text-1|text_content|sp-1522843951', 'sdsasdsdas', '2018-04-04 00:12:31', NULL),
(156, 25, 90, 'case_info_hd|hd_content_text-0|text_content', 'In finance, the acid-test or quick ratio or liquidity ratio measures the ability of a company to use its near cash or quick assets to extinguish or retire its current liabilities immediately. Quick assets include those current assets that presumably can be quickly converted to cash at close to their book values.', '2018-04-04 01:10:02', NULL),
(157, 25, 90, 'case_info_admin|admin_content_text-0|text_content|sp-1522847432', 'In finance, the acid-test or quick ratio or liquidity ratio measures the ability of a company to use its near cash or quick assets to extinguish or retire its current liabilities immediately. Quick assets include those current assets that presumably can be quickly converted to cash at close to their book values.', '2018-04-04 01:10:32', NULL),
(158, 25, 90, 'case_info_admin|admin_content_files-0|file-1|sp-1522847432', 'a:4:{s:8:\"filename\";s:29:\"1522847432_avatar-6-85x85.jpg\";s:3:\"url\";s:38:\"/2018/04/1522847432_avatar-6-85x85.jpg\";s:8:\"url_full\";s:38:\"/2018/04/1522847432_avatar-6-85x85.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-04 01:10:32', NULL),
(159, 31, 3, 'multi_files_images-0', '/2018/04/1522922875_864.jpg', NULL, NULL),
(160, 31, 3, 'multi_files_images-1', '/2018/04/1522922875_1179.jpg', NULL, NULL),
(161, 32, 3, 'multi_files_images-0', '/2018/04/1522922973_864.jpg', NULL, NULL),
(162, 32, 3, 'multi_files_images-1', '/2018/04/1522922973_1179.jpg', NULL, NULL),
(163, 33, 3, 'multi_files_images-0', '/2018/04/1522922995_864.jpg', NULL, NULL),
(164, 33, 3, 'multi_files_images-1', '/2018/04/1522922995_1179.jpg', NULL, NULL),
(165, 34, 3, 'multi_files_images-0', '/2018/04/1522923037_864.jpg', NULL, NULL),
(166, 34, 3, 'multi_files_images-1', '/2018/04/1522923037_1179.jpg', NULL, NULL),
(167, 34, 89, 'case_info_admin|admin_content_text-0|text_content|sp-1522924148', 'Serious case info', '2018-04-04 22:29:08', NULL),
(168, 35, 3, 'multi_files_images-0', '/2018/04/1522932881_864.jpg', NULL, NULL),
(169, 35, 3, 'multi_files_images-1', '/2018/04/1522932881_1179.jpg', NULL, NULL),
(170, 35, 89, 'case_info_admin|admin_content_text-0|text_content|sp-1523169212', 'When building an application, we often need to set up an access control list (ACL). An ACL specifies the level of permission granted to a user of an application. For example a user John may have the permission to read and write to a resource while another user Smith may have the permission only to read the resource.\r\n\r\nIn this tutorial, I will teach you how to add access control to a Laravel app using Laravel-permission package. For this tutorial we will build a simple blog application where users can be assigned different levels of permission. Our user admin page will look like this:', '2018-04-08 06:33:32', NULL),
(171, 35, 89, 'case_info_admin|admin_content_files-0|file-1|sp-1523169212', 'a:4:{s:8:\"filename\";s:24:\"1523169212_banner-07.jpg\";s:3:\"url\";s:33:\"/2018/04/1523169212_banner-07.jpg\";s:8:\"url_full\";s:33:\"/2018/04/1523169212_banner-07.jpg\";s:9:\"url_thumb\";s:9:\"/2018/04/\";}', '2018-04-08 06:33:32', NULL),
(172, 40, 3, 'multi_files_other-0', '/2018/04/1523175983_201803051128256950894f-8e01-439e-84d0-208e96c5bb1a-2.pdf', NULL, NULL),
(173, 41, 3, 'multi_files_other-0', '/2018/04/1523176054_201803051128256950894f-8e01-439e-84d0-208e96c5bb1a-2.pdf', NULL, NULL),
(174, 41, 3, 'multi_files_other-1', '/2018/04/1523176054_201803051128256950894f-8e01-439e-84d0-208e96c5bb1a-1.pdf', NULL, NULL),
(175, 41, 3, 'multi_files_images-2', '/2018/04/1523176054_img20171105234550.jpg', NULL, NULL),
(176, 42, 3, 'multi_files_other-0', '/2018/04/1523177127_201803051128256950894f-8e01-439e-84d0-208e96c5bb1a-2.pdf', NULL, NULL),
(177, 42, 3, 'multi_files_images-1', '/2018/04/1523177127_img20171105234550.jpg', NULL, NULL),
(178, 43, 3, 'multi_files_other-0', '/2018/04/1523178389_privacy.pdf', NULL, NULL),
(179, 44, 3, 'multi_files_other-0', '/2018/04/1523179122_privacy.pdf', NULL, NULL),
(180, 44, 3, 'multi_files_images-1', '/2018/04/1523179122_image-c7739039-9a1d-47b9-b309-be61a0351ea7.jpg', NULL, NULL),
(181, 44, 3, 'multi_files_images-2', '/2018/04/1523179122_screenshot2018-01-26-12-56-00.png', NULL, NULL),
(186, 44, 4, 'case_info_hd|hd_content_text-0|text_content', 'asdasdasds', '2018-04-09 19:06:29', NULL),
(188, 27, 2, 'case_info_admin|admin_content_text-0|text_content|sp-1523423065', 'sadsadsad', '2018-04-11 05:04:25', NULL),
(191, 47, 3, 'multi_files_other-0', '/2018/04/1523435021_privacy.pdf', NULL, NULL),
(192, 47, 3, 'multi_files_images-1', '/2018/04/1523435021_screenshot2018-01-26-12-56-00.png', NULL, NULL),
(194, 48, 2, 'multi_files_images-0', '/2018/04/1523439310_image-30f13b67-c217-438c-9e17-ef97eb079cc3.jpg', NULL, NULL),
(195, 48, 2, 'case_info_admin|admin_content_text-0|text_content|sp-1523511858', 'asdasdasd', '2018-04-12 05:44:18', NULL),
(199, 50, 2, 'multi_files_images-0', '/2018/04/1523512324_image-616c0ed7-1621-49be-91e9-2bdac3a07275.jpg', NULL, NULL),
(200, 50, 4, 'case_info_hd|hd_content_text-0|text_content', 'asdasdasdas', '2018-04-12 06:00:38', NULL),
(201, 50, 4, 'case_info_hd|hd_content_text-1|text_content', 'awdasdasds', '2018-04-12 06:01:10', NULL),
(202, 50, 5, 'case_info_ff|ff_content_text-0|text_content', 'sadsadsada', '2018-04-12 06:19:23', NULL),
(212, 53, 2, 'multi_files_images-0', '/2018/04/1523770845_image-6437e38d-fd85-457e-9e18-06ae1b0bacd6.jpg', NULL, NULL),
(213, 53, 2, 'case_info_admin|admin_content_text-0|text_content|sp-1523782519', 'sdsdsdsd', '2018-04-14 20:55:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `case_victims`
--

CREATE TABLE `case_victims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `districts` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `age` int(10) UNSIGNED NOT NULL,
  `sex` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_victims`
--

INSERT INTO `case_victims` (`id`, `case_id`, `name`, `parents`, `districts`, `location`, `age`, `sex`, `created_at`, `updated_at`) VALUES
(1, 1, 'Voluptatibus provident non fugit neque repudiandae et fugiat.', 'Adipisci autem aliquid fugiat assumenda debitis est ducimus.', 'Non fugit officiis animi aut eligendi quas blanditiis.', 'Eos placeat cupiditate deleniti nostrum cupiditate voluptatem fugiat necessitatibus.', 41, 'women', '2017-08-07 03:00:00', '2017-08-07 03:00:00'),
(2, 2, 'Illum et maiores enim commodi autem labore aut est ea quia quia impedit aut pariatur.', 'Voluptas perferendis culpa dolores dolores quia pariatur optio corporis autem nostrum et earum.', 'Ratione earum tempore et id officia illo iste hic eum.', 'Omnis qui commodi rem alias voluptatem qui officiis et.', 35, 'women', '2017-08-08 03:00:00', '2017-08-08 03:00:00'),
(3, 3, 'Qui voluptatem consequatur aut sed et illo soluta omnis libero aut.', 'Accusantium consequatur fugiat temporibus quo qui in sequi ab.', 'Repellat totam veniam recusandae eaque qui sunt voluptatem eos doloribus omnis.', 'Quis illum et et dolor eius ab quia magni cum voluptatum est.', 31, 'women', '2017-08-09 03:00:00', '2017-08-09 03:00:00'),
(4, 4, 'Dolorem perferendis similique dicta illum soluta tenetur.', 'Vel esse voluptatem quod odio autem.', 'Saepe quis rerum qui nostrum architecto error debitis.', 'Non temporibus ullam exercitationem cumque delectus ipsa similique aut officia ut cumque.', 33, 'women', '2017-08-10 03:00:00', '2017-08-10 03:00:00'),
(5, 5, 'Explicabo consequatur quas ducimus aspernatur asperiores qui quia.', 'Aut quisquam ipsa excepturi dolor et consequuntur facilis accusantium earum atque voluptates ipsa aliquam non corrupti.', 'Numquam sunt adipisci enim laudantium dolorum tempore ad voluptas sed sunt ex itaque rerum.', 'Recusandae autem et harum eaque aut maxime magni.', 46, 'women', '2017-08-11 03:00:00', '2017-08-11 03:00:00'),
(6, 12, 'Salma', 'Motin', NULL, 'Gazipur', 22, 'girl', NULL, NULL),
(7, 13, 'Salma', 'Motin', NULL, 'Gazipur', 22, 'girl', NULL, NULL),
(8, 14, 'Salma', 'Motin', NULL, 'Gazipur', 22, 'girl', NULL, NULL),
(9, 15, 'Salma', 'Motin', NULL, 'Gazipur', 22, 'girl', NULL, NULL),
(10, 16, 'Salma', 'Motin', NULL, 'Gazipur', 22, 'girl', NULL, NULL),
(11, 17, 'Salma', 'Motin', NULL, 'Gazipur', 22, 'girl', NULL, NULL),
(12, 18, 'Salma', 'Motin', NULL, 'Gazipur', 22, 'girl', NULL, NULL),
(13, 19, 'Salma', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(14, 20, 'Salma', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(15, 21, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(16, 22, 'ayub', 'ayub f', NULL, 'Dhaka, Bangladesh', 22, 'girl', NULL, NULL),
(17, 23, 'ayub', 'ayub f', NULL, 'Dhaka, Bangladesh', 22, 'girl', NULL, NULL),
(18, 24, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(19, 25, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(20, 26, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(21, 27, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(22, 28, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(23, 29, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(24, 30, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(25, 31, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(26, 32, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(27, 33, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(28, 34, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(29, 35, 'Salma 2', 'Motin', NULL, 'Faridpur', 22, 'girl', NULL, NULL),
(30, 36, 'ayub', 'ayub f', NULL, 'Dhaka, Bangladesh', 22, 'girl', NULL, NULL),
(31, 37, 'Rakib', 'Rakib Ff', NULL, 'Dhaka, Bangladesh', 22, 'girl', NULL, NULL),
(32, 38, 'Test', 'Test F', NULL, 'Dhaka', 21, 'man', NULL, NULL),
(34, 40, 'Attachment', 'Test Attachment', NULL, 'Sylhet', 21, 'man', NULL, NULL),
(35, 41, 'Attachment', 'Test Attachment', NULL, 'Sylhet', 21, 'man', NULL, NULL),
(36, 42, 'Tarun', 'Tarun F', NULL, 'Shariatpur', 22, 'boys', NULL, NULL),
(37, 43, 'T 1', 'T 1 F', NULL, 'Dhaka', 16, 'woman', NULL, NULL),
(38, 44, 'T 2', 'T 2 F', NULL, 'Dhaka', 18, 'boys', NULL, NULL),
(41, 47, 'New case', 'New case F', NULL, 'Shariatpur', 14, 'boys', NULL, NULL),
(42, 48, 'salma', 'salam', NULL, 'gazipur', 34, 'woman', NULL, NULL),
(44, 50, 'Masuma', 'selim', NULL, 'Faridpur', 41, 'woman', NULL, NULL),
(47, 53, 'bilkis', 'motin', NULL, 'faridpur', 19, 'woman', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(16, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(17, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(18, '2016_06_01_000004_create_oauth_clients_table', 1),
(19, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(21, '2018_02_27_070126_create_case_incedents_table', 1),
(22, '2018_03_01_093136_create_case_metas_table', 1),
(23, '2018_03_06_175719_create_user_metas_table', 1),
(24, '2018_03_12_060925_create_case_victims_table', 1),
(26, '2018_03_12_124245_create_asf_options_table', 2),
(27, '2018_03_23_190701_drop_password_reset_table', 3),
(28, '2018_03_23_190734_drop_password_resets_table', 3),
(29, '2018_03_23_191430_drop_password_resets_table', 4),
(30, '2018_03_23_191545_create_password_resets_table', 5),
(31, '2018_04_08_160320_laratrust_setup_tables', 6),
(32, '2014_10_12_000000_create_users_table', 7),
(33, '2018_02_22_065938_create_case_comments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0064f730a0192eee978421b50ed57da8d4eaa7533c45ee6100313b9d008ecb5af818f371ce61cfb3', 89, 1, 'MyApp', '[]', 0, '2018-03-27 10:12:54', '2018-03-27 10:12:54', '2019-03-27 16:12:54'),
('01003247f2c4f7d9f246a24b4401ad3affe32ebe9e534072a87d0253c58a99d6a65c60dfc1671a72', 3, 1, 'MyApp', '[]', 0, '2018-03-18 23:52:24', '2018-03-18 23:52:24', '2019-03-19 05:52:24'),
('0112c405038fcd47ec9ea61bee42cb110ecd738b3ba184a7e8146dd099ef16f2c8d02c18bc865312', 3, 1, 'MyApp', '[]', 0, '2018-04-04 05:19:16', '2018-04-04 05:19:16', '2019-04-04 11:19:16'),
('01f5627bd17ab98854753b0369544e12fed5611188ef15f9a677248793fb8880d0bedc840c2c1f84', 3, 1, 'MyApp', '[]', 1, '2018-04-12 06:52:20', '2018-04-12 06:52:20', '2019-04-12 12:52:20'),
('0225ca3a3db1de64f6ccb0d52d15101c765f944ac660a1cb1d2c8aecc7341aef84aaadc21dc3b1b9', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:49:31', '2018-03-19 00:49:31', '2019-03-19 06:49:31'),
('02e2fef16f77a64701cbc9ec054169b57943f343880bc04d9955ad2f9cf23e76e1e522ae7265026f', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:47:37', '2018-04-05 10:47:37', '2019-04-05 16:47:37'),
('038ffa5d5eeb5fa1f154af472a6939101a6af7604c8e70a194534e6ce49f050f540f74c1ff23d2d0', 3, 1, 'MyApp', '[]', 1, '2018-04-11 11:38:49', '2018-04-11 11:38:49', '2019-04-11 17:38:49'),
('03b0b7bafb2a848c7ef471cc6ad48e11321069887c2c677e53f95f470c1938843d3e357c1bc21cb4', 3, 1, 'MyApp', '[]', 0, '2018-04-08 09:14:28', '2018-04-08 09:14:28', '2019-04-08 15:14:28'),
('04705ec1673acb8604f3a2ab91b989439898cbb0a683f5f65fcbfa4bed405e025310e8b46fb87377', 3, 1, 'MyApp', '[]', 0, '2018-04-09 10:41:48', '2018-04-09 10:41:48', '2019-04-09 16:41:48'),
('0471c6608bed15b3e3c984e84eec4817092e90a668efebd2da4d3b40e463c32dc19f4f78b79f4871', 3, 1, 'MyApp', '[]', 0, '2018-03-18 02:04:34', '2018-03-18 02:04:34', '2019-03-18 08:04:34'),
('049f3bb6e88b116643f6e45f248299db231135775330c646846bdc6c1e6ce9b2e2d1401bcf773ec5', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:23:53', '2018-03-22 02:23:53', '2019-03-22 08:23:53'),
('04baade9b9e13975a81b27e224310efae9963fae5120c2fc7a6b766759ff070405a40b80c80e68a8', 3, 1, 'MyApp', '[]', 0, '2018-03-22 00:11:02', '2018-03-22 00:11:02', '2019-03-22 06:11:02'),
('05fd0bfbd622414db84b9510b4c5eb7e073e55c3f47ce9e5c151cba545a070b722f5e911629e1067', 3, 1, 'MyApp', '[]', 0, '2018-04-01 08:23:06', '2018-04-01 08:23:06', '2019-04-01 14:23:06'),
('060b29188762e4ae20d151122705477cfc09d57cfe687d26c42e69583d383d0521276c2f67d69e0b', 3, 1, 'MyApp', '[]', 1, '2018-04-12 06:10:54', '2018-04-12 06:10:54', '2019-04-12 12:10:54'),
('067db1f219ac66921ac0ab7e7df768efc7cb7503c3e18de3c961b496947d7ef6da72aec3ab468686', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:44:47', '2018-03-18 06:44:47', '2019-03-18 12:44:47'),
('06ebfa747850d4396fe762662164f17e6b6a4bdbffdf64f57e2933c25699fb8070cb9e1e4c5ac933', 89, 1, 'MyApp', '[]', 1, '2018-03-27 06:36:04', '2018-03-27 06:36:04', '2019-03-27 12:36:04'),
('0803435f4cc0026c45799306b88c0fed9b321c20faa08577f3a99797f7b6d4bfbe7b81bb94b1065e', 3, 1, 'MyApp', '[]', 0, '2018-04-08 09:05:39', '2018-04-08 09:05:39', '2019-04-08 15:05:39'),
('080efc05236942c813b983e716a9fc77e628ff1e8444583c1f26ea1d1b0561d04b7a78de3431a977', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:44:30', '2018-04-10 12:44:30', '2019-04-10 18:44:30'),
('0897eeff045f988b478836b6d63cc87689beab36b9ab1a0576a16e945eef0ffb3b3bc05f28ce7fd4', 89, 1, 'newToken', '[]', 1, '2018-03-23 13:42:00', '2018-03-23 13:42:00', '2019-03-23 19:42:00'),
('08e3010156e737d627972eb495a5867c3cc7bb841fbba2264998614810ad7ed38f0577e227f0d986', 89, 1, 'MyApp', '[]', 1, '2018-03-27 06:32:30', '2018-03-27 06:32:30', '2019-03-27 12:32:30'),
('094bed7b3f1824b8c8c14eb1dc8b0c4b1b4466643afb8fb49730f27cb168b2976e09cf6eb26f434b', 3, 1, 'MyApp', '[]', 0, '2018-04-01 06:33:23', '2018-04-01 06:33:23', '2019-04-01 12:33:23'),
('0969668d45d3b5d863bf31ca02653a47a63f6d6e7291285bfd04b950e45f0eff2a9a0828bb3a7224', 3, 1, 'MyApp', '[]', 0, '2018-04-10 08:30:59', '2018-04-10 08:30:59', '2019-04-10 14:30:59'),
('0aa86cb9de6dc583d896ef955c66c5ff810c52141308dd72f9d1db541603773399cc8a1399cc5fa0', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:43:20', '2018-04-05 09:43:20', '2019-04-05 15:43:20'),
('0aeb0bc5873ea6233813582ba1b560e31d8a81ef86c5c14815a022f1d7315cfae9b9395195586237', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:12:38', '2018-04-08 07:12:38', '2019-04-08 13:12:38'),
('0ba9c5956d6b341c5e78f735a0963550b4fcf604fbfde93f818675b110a5b47a737002f6824fbd66', 3, 1, 'MyApp', '[]', 0, '2018-04-04 08:32:43', '2018-04-04 08:32:43', '2019-04-04 14:32:43'),
('0c51f53c74d7bc00a3f4de95b4a98ea10c4a4ec85e3039fe848f01e7d2cd6248254deb355e4ab99f', 3, 1, 'MyApp', '[]', 0, '2018-04-11 05:17:43', '2018-04-11 05:17:43', '2019-04-11 11:17:43'),
('0daeb1ab361b6b5c80a01f15fe8f868e883ef0ee4f602eb6dd9dde88adfe733b2f96d085e6e6f8a8', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:58:44', '2018-04-01 12:58:44', '2019-04-01 18:58:44'),
('0db45ff109a5dd552077d8dc5cf594acc73a48a3ea415be788115a08bcd125c2c9eb481fed696c98', 3, 1, 'MyApp', '[]', 0, '2018-03-20 23:48:55', '2018-03-20 23:48:55', '2019-03-21 05:48:55'),
('0dcda1e709a3b793a7db4238743ee801d02690abb7644f7672e7e72dfa0bab5358c655376f6d398b', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:47:37', '2018-03-19 00:47:37', '2019-03-19 06:47:37'),
('0ddf219a3b75ed2c460be82f9c5fd8a231f784f269217e92f949ec5c56cc4b55d1d18b11123b9af9', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:24:47', '2018-03-18 01:24:47', '2019-03-18 07:24:47'),
('0ebbb00ecb9d4eb26e1fa678997f923b4984945876f8cc4c5cd449007105860705cd84b8737e1382', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:19:23', '2018-04-08 07:19:23', '2019-04-08 13:19:23'),
('0f67409348adc395f196c320d8b702df6fbc789c2e52bc020c31bdd86b90e4ce16b5cc393d75c976', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:07:14', '2018-03-18 01:07:14', '2019-03-18 07:07:14'),
('10a8565d223f48d8d12b0bc17a88c32b4b76f13a2d0ef5aaf3e349313610f4e4c6e768919760cd65', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:21:05', '2018-03-18 05:21:05', '2019-03-18 11:21:05'),
('10b829161ae97c7a90c5b058301728b1235c04a19c981b78e5c022c1c1a31a5139ab3f9ab16af412', 89, 1, 'newToken', '[]', 1, '2018-03-27 05:51:11', '2018-03-27 05:51:11', '2019-03-27 11:51:11'),
('11c2df0bbe97785509462959e9967157ec70d933f46f0c19da2a837970f49185fd89b8bd1f159655', 2, 1, 'MyApp', '[]', 0, '2018-04-10 10:41:07', '2018-04-10 10:41:07', '2019-04-10 16:41:07'),
('1258475b59e2a8843941d42c1433f78016489cdc2ec2138e33693b7817075e68883d7c7afd882dd0', 3, 1, 'MyApp', '[]', 0, '2018-04-08 06:55:46', '2018-04-08 06:55:46', '2019-04-08 12:55:46'),
('1311c54b563e28ec5915481a1a07bc38b734e3336b25983359284f323a9b3f48cecc58fc501c53e5', 89, 1, 'newToken', '[]', 1, '2018-03-23 12:46:30', '2018-03-23 12:46:30', '2019-03-23 18:46:30'),
('13e8cc9c64e478ee1c274860ca306efc796788481e26ac29dc5302f70893cc61dc1ea532b652c9bc', 3, 1, 'MyApp', '[]', 0, '2018-04-01 08:51:44', '2018-04-01 08:51:44', '2019-04-01 14:51:44'),
('149f7821388ad33b79ef075696d5ef007b6508fb8eedde19f2cfb2a172310a62e355dfa749410d8a', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:47:16', '2018-03-17 23:47:16', '2019-03-18 05:47:16'),
('15092abcc87a5743f6b3713127ab8c776a9871af9c5d79c9d095a055807cc5c7242be971be0f70ed', 3, 1, 'MyApp', '[]', 0, '2018-03-18 22:23:41', '2018-03-18 22:23:41', '2019-03-19 04:23:41'),
('151941272a472443b1776c1c8562d8ead9b81f454382cd5c9eb88301f285903fa7a63e7fd5d71d35', 3, 1, 'MyApp', '[]', 0, '2018-04-01 13:11:14', '2018-04-01 13:11:14', '2019-04-01 19:11:14'),
('15b0e55d0e4d7a53a95ca8bd2cab1d7c8d95c59da0dc4941669bc1697f73c00b7897c965f877aa09', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:50:55', '2018-04-05 09:50:55', '2019-04-05 15:50:55'),
('168843197285e1b0bb45d85614afaf840edc98720d1ca8d18386be62b1773f4fc359b2fab208ab14', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:38:37', '2018-04-05 10:38:37', '2019-04-05 16:38:37'),
('1699bcdaae0258fdec8d60e190551a3011097aa299c7b031bedad2c5940ea96a4ceb504ada7e0de3', 3, 1, 'MyApp', '[]', 0, '2018-04-08 05:44:50', '2018-04-08 05:44:50', '2019-04-08 11:44:50'),
('16b7609f927abcf69d051c40be2028b2abc5cfe5a17c43692282343f740ad3114223c3b93bedc569', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:07:00', '2018-03-18 01:07:00', '2019-03-18 07:07:00'),
('16f1f7b667c80af47b35f2f7147bfdec3a88e55151d1d27dc3cb560fb8c4fdf7f4991f1584eff9c2', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:41:07', '2018-04-05 09:41:07', '2019-04-05 15:41:07'),
('171192849f9ddb202e7bed773bb2c1a21d11741fd66cd8a1da7f7a85a84bd9f506707c8132dd283c', 3, 1, 'MyApp', '[]', 0, '2018-03-20 23:29:05', '2018-03-20 23:29:05', '2019-03-21 05:29:05'),
('1889cf6780c7fc4abb12586b1fd337bc9bb85ac9c9b16756ed4cc9bd3f5cf59f08d03260587ccf1c', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:12:22', '2018-04-10 12:12:22', '2019-04-10 18:12:22'),
('195a1f9c1820b3504c46bc5e904b2629be127d6d9fc0f3b97a555094317128001b8364dec3ff19c8', 3, 1, 'MyApp', '[]', 0, '2018-04-10 09:15:25', '2018-04-10 09:15:25', '2019-04-10 15:15:25'),
('19da04a001445241d5ee89bf705e343070884f3ce26e132030c26fd15889c495c300a4eecbda218f', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:00:18', '2018-04-01 12:00:18', '2019-04-01 18:00:18'),
('1a1aeea3cc064b993f1a73508fc5f633efbba653df012f7d716762fcca4f46aac76a6d360ab75ed9', 3, 1, 'MyApp', '[]', 0, '2018-04-01 11:25:41', '2018-04-01 11:25:41', '2019-04-01 17:25:41'),
('1a80a7af3618fb17fe9c27c0b63e9ca7e96c0ff14d6e1a34a55316ec6e3fe43d2cdd4991e2450bf9', 3, 1, 'MyApp', '[]', 0, '2018-03-18 04:23:20', '2018-03-18 04:23:20', '2019-03-18 10:23:20'),
('1b5d88a4d74df9e308bb86202fdbff9b6d7f01493a27b2b805e1059faf9b29ca4ad237f3a2934b9f', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:37:22', '2018-04-04 09:37:22', '2019-04-04 15:37:22'),
('1cd4d96edc7289aafb648bb9e893424cf2ae35dacf22c4cb7039b057439fe64cb56a000e4cfdd5a7', 2, 1, 'MyApp', '[]', 0, '2018-04-09 12:02:09', '2018-04-09 12:02:09', '2019-04-09 18:02:09'),
('1d426288c390333cc79a2ce1d52c7d4949b35560614afcf023c46746b14e24ddc025134f8b0786a3', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:35:26', '2018-04-08 07:35:26', '2019-04-08 13:35:26'),
('1daedeac3231f85da1dcff33671083643661c75d08e677a77d58725ec84ee82a2921036e11d8d555', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:08:40', '2018-03-19 01:08:40', '2019-03-19 07:08:40'),
('1e65fc2e352e01a58492aef6cceb42d1658df56a2d00747b456556868f5e83e60957447e5e12a7ca', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:11:36', '2018-04-08 08:11:36', '2019-04-08 14:11:36'),
('1eeaf85ec4113f6d7c5a61a37fab8a4725ad7553f944b35e2427f5c4433b2d6a9330550b0faab2c0', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:48:59', '2018-03-17 23:48:59', '2019-03-18 05:48:59'),
('1f4e7653226aeb2bc18cd8a1bb48f464d8fa1550e4a4f4919236c3eb8e99cb4a117043c0c95ef0d9', 3, 1, 'MyApp', '[]', 0, '2018-04-11 08:17:48', '2018-04-11 08:17:48', '2019-04-11 14:17:48'),
('205f8e5c90b3622ce827e97b59ffaf2f4ea64cf1ab7d109278aa00a0b54714ed0679143c02a8feb9', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:52:44', '2018-04-04 09:52:44', '2019-04-04 15:52:44'),
('20ea68ed2a21a441d88da5d13bd74c32e642cf8077063f05145d80c1ec37d7b1cd175fc5f2d26290', 2, 1, 'MyApp', '[]', 0, '2018-04-09 11:54:14', '2018-04-09 11:54:14', '2019-04-09 17:54:14'),
('20fd1c2f3d4988c9d5ce5736f0cc43704f6bf08d79fdc0ea9157eab7bed9ced5e9d021a3ae212373', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:44:51', '2018-04-01 07:44:51', '2019-04-01 13:44:51'),
('22b3da54302160f9ebe12db619e8d0d402798ba59641fa5f7548e0751147f347fd6f58fdd336b669', 3, 1, 'MyApp', '[]', 0, '2018-04-01 10:36:14', '2018-04-01 10:36:14', '2019-04-01 16:36:14'),
('22fbf06e1377bb5f266f8a5572154ae4ba4965f2d89daceeacddd3d4a3b96cd8f319aa8ad32f76d3', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:14:33', '2018-03-19 01:14:33', '2019-03-19 07:14:33'),
('233f4418d96a803bbd24d5ef24360eb6ac3de879ed23ed91153a4ba69c5677f5e96f91e5588e72a7', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:25:09', '2018-03-22 02:25:09', '2019-03-22 08:25:09'),
('2384a023824c1ff69ae569a93256652f41fb29e10ed892f65c498dc7b86d874ba19bc493f596b071', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:47:14', '2018-03-18 05:47:14', '2019-03-18 11:47:14'),
('23a9d190cf5e43e70d4b3e513b705adc61127ced68b7a0018184389da5afc6aa7d7a8bafc4575bcc', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:42:48', '2018-03-19 00:42:48', '2019-03-19 06:42:48'),
('24dda1e3ec89e4bd26a83dc4af04cd7e8370150a9aa97cde18e49f9cf5204ef418c5de20c17ab46c', 3, 1, 'MyApp', '[]', 0, '2018-04-10 05:36:45', '2018-04-10 05:36:45', '2019-04-10 11:36:45'),
('25259106577a02bcae35d91c87f9ef5a9b0b27c710a712979e20fdd6f2e68e8c8a9d33a8e0ce97cf', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:30:21', '2018-03-18 00:30:21', '2019-03-18 06:30:21'),
('25422e67a65cac1c716e0f4e21f99c0cadf34a45557f52a9d61a89e338fc82580f2a1523e17cab96', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:00:15', '2018-03-18 01:00:15', '2019-03-18 07:00:15'),
('264b20f2082133ea14267508c44af5f0b01e382508a25e9848523b5e3e7a6166f6dc9968f56a5c57', 2, 1, 'MyApp', '[]', 0, '2018-04-10 10:24:18', '2018-04-10 10:24:18', '2019-04-10 16:24:18'),
('26c61dca45bd4293d8529f32309be8e9b4df860a97699c384c71ac906dcadea0d0467ab3eb014084', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:39:31', '2018-03-18 06:39:31', '2019-03-18 12:39:31'),
('27abe66227424f593e591997fcfcd06addb79c6035295cf0f419abf65d69a765e0937c373deb0bf8', 5, 1, 'newToken', '[]', 1, '2018-04-10 11:54:16', '2018-04-10 11:54:16', '2019-04-10 17:54:16'),
('281e2ed9c11a9d19cf4bc91bf9d0d6b51e5944a5d7492024f81f614dc96b619e1babeb2fe03f240f', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:14:00', '2018-03-19 00:14:00', '2019-03-19 06:14:00'),
('289ed2fbdb3ddad384c0c74e8bc67fd1dba71b655e6df3e4f97b6e2f0d829a6f9ec4f4f409ced9be', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:22:40', '2018-03-22 02:22:40', '2019-03-22 08:22:40'),
('29dd5d4a81786ff8bd802adbe81f8e8f130ea6ae939cf6586f7328398e02c03471d11899b8473037', 2, 1, 'MyApp', '[]', 0, '2018-03-18 23:54:54', '2018-03-18 23:54:54', '2019-03-19 05:54:54'),
('29f5faa5b232e6990d6b7e1c1d81a12c6e527cd2f1c8ca832927a57c3b747f82f9eb02a425eea72b', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:39:27', '2018-04-01 07:39:27', '2019-04-01 13:39:27'),
('2a8c583172253bce9c3d73be2f89fdbee0667da6d10d485c689aba1bcb6e1b105d6e4e43419baa91', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:31:47', '2018-03-22 02:31:47', '2019-03-22 08:31:47'),
('2b3af9a2a7d62d8fb3ff6dde163316ab767b8f5eba93595dbe4385e674763d97d39ed3b1650bc379', 89, 1, 'MyApp', '[]', 0, '2018-04-08 05:48:59', '2018-04-08 05:48:59', '2019-04-08 11:48:59'),
('2c757ee347782d9cca6efd52b66e8f815039c9383079081b95b9f08d6e2520a93f571ae6e2e0d8b4', 3, 1, 'MyApp', '[]', 0, '2018-04-05 12:21:58', '2018-04-05 12:21:58', '2019-04-05 18:21:58'),
('2d859f13d26236f452d7f04f1a44006de323e02ace991e5ad6b21041b1b869ff612db9cdc3274a2b', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:39:08', '2018-04-05 10:39:08', '2019-04-05 16:39:08'),
('2dbfcb9a555c0c2760e9613a4e9defb72773524d8108d5ea298d9582b2861154f5c218f0d499194a', 3, 1, 'MyApp', '[]', 0, '2018-04-01 08:44:52', '2018-04-01 08:44:52', '2019-04-01 14:44:52'),
('2e243856f59644ce2af1b29e33d734d2c4e6a1167201db797088eaa1496f27149a9758673b45a433', 3, 1, 'MyApp', '[]', 0, '2018-03-19 02:16:56', '2018-03-19 02:16:56', '2019-03-19 08:16:56'),
('2f6116ddb998feb7e532ce07d7b0dd71134ebd850a5819fa4c0f99c0d6f08607996cc61dc84a63e5', 3, 1, 'MyApp', '[]', 1, '2018-04-11 11:42:37', '2018-04-11 11:42:37', '2019-04-11 17:42:37'),
('2fd35364ca9b6e055320119323e7aec88f62ab38e0abcd78c44f3f6dfa121868143bf54b465ff133', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:29:02', '2018-03-18 05:29:02', '2019-03-18 11:29:02'),
('2feba1fe3e0802a058b995a99a64a0ce276c5ef9be0001512613a30d12ded99dcd321ed111a99743', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:38:03', '2018-03-18 06:38:03', '2019-03-18 12:38:03'),
('3018b10aa16a57495c4a10be82b37a758111bdaa6f70fceaeaeb19cf9a68467ec2632e0a825dfa28', 3, 1, 'MyApp', '[]', 0, '2018-04-12 06:59:04', '2018-04-12 06:59:04', '2019-04-12 12:59:04'),
('307628b02c421c2e7fa856094dc6733598904eac71ee5a83dfca9a212ecebaf707c6cfab939d1d57', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:07:28', '2018-04-04 09:07:28', '2019-04-04 15:07:28'),
('30f2eb47fb6eebdfd6c1d5a512a51253dc4db30c7b88ee81021e90d2f69407605e8d591cbcf5cbb4', 3, 1, 'MyApp', '[]', 0, '2018-04-04 10:07:50', '2018-04-04 10:07:50', '2019-04-04 16:07:50'),
('31218e966829dd84172209e7de22293f05a31053277f95f6a1123ed140e175a906a61d885430cd15', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:41:31', '2018-03-18 05:41:31', '2019-03-18 11:41:31'),
('31cbe2cac56cc5fe56199f9f00886b05d829e2f9e1baf5e17ef0caafa09eb3d7f6f450f8e619ff56', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:11:49', '2018-04-10 12:11:49', '2019-04-10 18:11:49'),
('320946b39fb3750ea102e42474902f90220f8358017a96964121c94b69769afeeccbd969a0fe42b7', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:46:09', '2018-04-04 09:46:09', '2019-04-04 15:46:09'),
('326a1206659ce47e9e5e1125e25df2d18884813d4bfe823a93928d1399c08dd1621f5f5f50c78500', 89, 1, 'newToken', '[]', 0, '2018-03-27 06:30:44', '2018-03-27 06:30:44', '2019-03-27 12:30:44'),
('32d73be4198ebee210d27266c7571307f254fa077d034ab38ca0ad939e212b3cde74702941188afc', 3, 1, 'MyApp', '[]', 0, '2018-04-05 11:24:00', '2018-04-05 11:24:00', '2019-04-05 17:24:00'),
('3346305f59212d2d6d500f73aa23a5bee7dd30c7ce186a4fd3299baf5923ee6318d507976fc25d5e', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:05:57', '2018-04-08 08:05:57', '2019-04-08 14:05:57'),
('33df66d9eee318218603498cf76eaa0f0910377c7e8ac51c3921d9017a85c3c91082781e17e8aa5e', 2, 1, 'MyApp', '[]', 0, '2018-04-01 06:13:42', '2018-04-01 06:13:42', '2019-04-01 12:13:42'),
('35d8e8f18d625f3f6972b65abd0881f3e789b2e31e5f975c0ddd45088aac3127f14a22e66e2d62a2', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:00:38', '2018-04-09 11:00:38', '2019-04-09 17:00:38'),
('35e0022594a1c385599f27e3ba16ffe6a072a89bd369c6a48d82e139302fc4c65c73636c95a8aaad', 89, 1, 'MyApp', '[]', 0, '2018-03-27 09:05:09', '2018-03-27 09:05:09', '2019-03-27 15:05:09'),
('371281fca536698f190769e87142d1ca50fbe215ba5b19077e5d8b7aa9b1f3809e9e296d2472b47d', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:55:49', '2018-03-17 23:55:49', '2019-03-18 05:55:49'),
('3740ab484e1e04295940722adebdccdad8d309ff08cf490653a3d9e4f1ca79fa6ffa1db8baa04a36', 3, 1, 'MyApp', '[]', 1, '2018-04-12 07:27:26', '2018-04-12 07:27:26', '2019-04-12 13:27:26'),
('378c41af91c35e6a09a6839674dcb66f982b5e4936dfb7ddc1298400057464e567d6ae966a467699', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:38:49', '2018-03-18 00:38:49', '2019-03-18 06:38:49'),
('3792f999096c38945232f62fe33100dfeadff2c3e50f6887ee06703967428f2b328cc322db330286', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:56:39', '2018-03-18 01:56:39', '2019-03-18 07:56:39'),
('381b6b2ba83d7b43bdc21c34171ead755724f5bbaf6b0adf995ee4326ea6eb77555a7a625505113b', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:31:28', '2018-03-18 05:31:28', '2019-03-18 11:31:28'),
('384938968c64325c9b93722098e700c1cd8c6170fc84799e04659c0fa88dad289f1bd95a8ec79d24', 5, 1, 'MyApp', '[]', 1, '2018-04-10 11:33:37', '2018-04-10 11:33:37', '2019-04-10 17:33:37'),
('389b1aeb3429ff2d5cbb1ae7fbe255972fc1d793a8a66adf8c68613ab9c05c63c70a2f60acb678b3', 3, 1, 'MyApp', '[]', 1, '2018-04-12 07:29:55', '2018-04-12 07:29:55', '2019-04-12 13:29:55'),
('389dc72046aa57fbc6f349ef29c90663f5116b84a83db235244444840c6ea4863d10e943aa3d05d4', 2, 1, 'MyApp', '[]', 0, '2018-03-20 23:16:33', '2018-03-20 23:16:33', '2019-03-21 05:16:33'),
('3999236947bb15e54b1e00fb2dadfee276c551dc232fd56ba3b631cf916bced0050921d8a87b1bac', 3, 1, 'MyApp', '[]', 0, '2018-04-04 08:43:18', '2018-04-04 08:43:18', '2019-04-04 14:43:18'),
('3a389e8a93eb5701f671a63cf7daa97438eb179f1633c540511957f593430bbe9e5e2c2997db7f38', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:31:46', '2018-04-10 12:31:46', '2019-04-10 18:31:46'),
('3a6e5a683e757f7db64a3717a6f8c909ae1acdeb8f6ae7f7967bb4a3cd3b522955a3ea201e4be80b', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:15:25', '2018-04-04 09:15:25', '2019-04-04 15:15:25'),
('3ae1945adb329e564327017cb0ac7d92caf0372bc93ee3cbb61bd6f15e96d12f416c273ab2f09899', 3, 1, 'MyApp', '[]', 0, '2018-03-19 02:20:57', '2018-03-19 02:20:57', '2019-03-19 08:20:57'),
('3b69adcc86c5f2eb4eab2f1146fd4dd7e0bb56dcc3a9f4ae3460d56c0950b9a40df55520bb6d0626', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:26:20', '2018-03-18 05:26:20', '2019-03-18 11:26:20'),
('3d08c84fd735b2ed73e57b16758e25609870e1c8b33b37c85729f1eec8a0c1ed5fd860d35cdf863d', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:08:11', '2018-03-18 01:08:11', '2019-03-18 07:08:11'),
('3e3ec7e150c3437b1d8a38db6b1a11c0bf5e8165dd7535bd4314489fbc3e6912489fcd697ac6324e', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:32:54', '2018-04-04 09:32:54', '2019-04-04 15:32:54'),
('3e89daf24860f0948276c34b000e10d7875ccddbb7357fa168b72a84ab3a49330ada0d40b6dd55fc', 89, 1, 'MyApp', '[]', 1, '2018-03-23 12:48:07', '2018-03-23 12:48:07', '2019-03-23 18:48:07'),
('3fee2bcc9945abd0b9a2dd2e34edef4bb3a5063d2e5fba8291d0382b6998382f79b7e8270cf76399', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:32:53', '2018-04-05 10:32:53', '2019-04-05 16:32:53'),
('4069da51bb4e21a780c87ca7643cd275f3e4732a1f950361c439a74f999f699ab60f2d80416de8c9', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:24:20', '2018-03-18 01:24:20', '2019-03-18 07:24:20'),
('40aec9d460918326ce32810030cf652771892725a469cf9970a063cfe8f55e01419e1829d4a4f487', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:10:24', '2018-03-19 00:10:24', '2019-03-19 06:10:24'),
('40c81366cfafd84c7c36e5e5ba407435a5057c2c1183e517343eb8cd34b09aae14e917cc3cfeb178', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:07:57', '2018-03-18 01:07:57', '2019-03-18 07:07:57'),
('40f542e1964631f1b1a9e4177fe8b81f4cbfd17abced817f80699e2a24b117987c32955cb67a9812', 3, 1, 'MyApp', '[]', 0, '2018-04-10 11:48:02', '2018-04-10 11:48:02', '2019-04-10 17:48:02'),
('40fcdf51407e42da31a264698d717efa72729d643fbc7a1a9d3f3195d7f8c48f24b074da6786115e', 3, 1, 'MyApp', '[]', 0, '2018-04-08 05:22:57', '2018-04-08 05:22:57', '2019-04-08 11:22:57'),
('410e8e490fe0390bdeafd64beb00ffcef586529bbd00c5aa44a7954e6b144abb05c1d99ded669e82', 3, 1, 'MyApp', '[]', 0, '2018-03-22 00:18:34', '2018-03-22 00:18:34', '2019-03-22 06:18:34'),
('42ed8c127b025fe537914501394bd4b9fdb7e5be1b767e13caae81dca9cf8218b148bda619f01eec', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:38:54', '2018-04-05 10:38:54', '2019-04-05 16:38:54'),
('45065dbe978a810f2bf4568f7a98c008385a707b7ccb7896cbd619c2fd0aed91178c05f19892b21d', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:15:12', '2018-04-08 07:15:12', '2019-04-08 13:15:12'),
('45992ca79d5a0bbcfc372b226e25ba292ccad0171c2f63a020681afc52154239d6970d20c67b36f2', 3, 1, 'MyApp', '[]', 1, '2018-04-10 11:48:47', '2018-04-10 11:48:47', '2019-04-10 17:48:47'),
('4697bfcf321607e361795ab274dc0d2ac5a04e53a4af4fd1d130af885ece1f15ad26d1708f30c4f8', 4, 1, 'MyApp', '[]', 0, '2018-04-12 10:19:24', '2018-04-12 10:19:24', '2019-04-12 16:19:24'),
('484c3df851bf339148ef0e0165663fc05bb07653dc0e0dfb673a7100f31416edd9f0c99005a47578', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:43:12', '2018-04-05 09:43:12', '2019-04-05 15:43:12'),
('489a73b3d60e20955c6261be93af1772ce31287f17bc12e5750c242ac2fc7dd44c4d9a9d9f4fd04a', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:22:07', '2018-04-08 07:22:07', '2019-04-08 13:22:07'),
('492d04a3743e71ebaa883ea46a8123f0e4723b29a91c620c1107a584f6697f68779d074a0abe6b7e', 89, 1, 'newToken', '[]', 0, '2018-03-27 06:37:49', '2018-03-27 06:37:49', '2019-03-27 12:37:49'),
('493b59207af4c4d58037e8e9722e6e25cfac93bc11690648ca51c2a222a2535ed37ddcbb04f94b49', 3, 1, 'MyApp', '[]', 1, '2018-04-11 11:01:59', '2018-04-11 11:01:59', '2019-04-11 17:01:59'),
('49c8fdc43bcb0cd4a9392e343975f5a305d6e96126635c1c496a0da5731b1bd1ce467838f0412281', 89, 1, 'newTokenApp', '[]', 0, '2018-03-27 10:10:22', '2018-03-27 10:10:22', '2019-03-27 16:10:22'),
('4b437aa7f63c9512056799e5a9cfa052ea95a1530b907b7685364913c6a69caca4ee97743a0e289a', 3, 1, 'MyApp', '[]', 0, '2018-03-20 23:19:33', '2018-03-20 23:19:33', '2019-03-21 05:19:33'),
('4b567e499067657e2c83da57279791f70a6d0e11b0e7415ff5d50a94f40b79e3c69eaade443aa371', 5, 1, 'MyApp', '[]', 1, '2018-04-10 12:18:54', '2018-04-10 12:18:54', '2019-04-10 18:18:54'),
('4c6bf6ce7a798c14c4ff061e61246e2d2de8e00a58313bc535e2c06ba09623e6fffe99085f70b23a', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:40:53', '2018-03-18 06:40:53', '2019-03-18 12:40:53'),
('4f0101f413cc3a9dcc80a0ede0a1ff816e1e9aa673f01c7bbd95407ff86ff7239aee7fa7c264686f', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:06:08', '2018-04-08 07:06:08', '2019-04-08 13:06:08'),
('4f378d1aa7d939edc3f1b80f3bc1a5e88ca2775090d16c4836477a206e0721f21c0a7b5721a74382', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:43:44', '2018-04-05 09:43:44', '2019-04-05 15:43:44'),
('4f8881fc65f5c823221907512b1dac954cb9728213e024a2fe3dd262205498c948a6a92472cc8733', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:55:19', '2018-04-05 09:55:19', '2019-04-05 15:55:19'),
('4fda6ca8186d93e3a9145bb5c127ebbf1d3ee89f63e2b84cf8b2c2b6cc74fcfc96b4b664d3a831d0', 3, 1, 'MyApp', '[]', 0, '2018-03-21 23:48:12', '2018-03-21 23:48:12', '2019-03-22 05:48:12'),
('4ff087c88b52165c03827ac5cea95e4e4de053df815c0ba854a7ad6ff3bdbd17c9ea14c575e2ab51', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:44:28', '2018-04-08 08:44:28', '2019-04-08 14:44:28'),
('51e762792c76466d8875f9a6aebf0c685ecefcd3648a1ea1ced0101e954944453f2515354ad92bf9', 5, 1, 'MyApp', '[]', 0, '2018-04-10 10:25:17', '2018-04-10 10:25:17', '2019-04-10 16:25:17'),
('52524f987166a5bc72d136f54a32343fb63968ebedda934a58f19ef61e7ca051da61d519ae5498ce', 2, 1, 'MyApp', '[]', 0, '2018-04-09 11:38:48', '2018-04-09 11:38:48', '2019-04-09 17:38:48'),
('527e301bd71b875d05a15bf0a17b14a30ef336b91fe927ba2fde10c95a031adfa8f129e915678383', 3, 1, 'newToken', '[]', 0, '2018-04-10 12:33:49', '2018-04-10 12:33:49', '2019-04-10 18:33:49'),
('52b2eb22d1709e7fab94605121deb983407383cc07cdcd2da058919d15c15e84d1f21b77c7671f9e', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:32:58', '2018-03-17 23:32:58', '2019-03-18 05:32:58'),
('532ca3825c19c2fd011e21fd87e438868f90bb9a1da5877f72ff41fa133c867ab1a531ce206bf202', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:37:05', '2018-04-09 11:37:05', '2019-04-09 17:37:05'),
('535197fbb018d5bf578329f4aa2b58fe990bf86493c6aac032133ed9d6add5e2080d658d0452258a', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:16:51', '2018-03-18 05:16:51', '2019-03-18 11:16:51'),
('54948e8315701c4593d044e9194729e75eff6e866f15407a0bb4e114638317c757a413806af652c7', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:19:21', '2018-03-17 23:19:21', '2019-03-18 05:19:21'),
('54f78132660e0e9566551f15f7161f9b46cac5446882b5aa95c4f5a6a01c6e386b73bc9023bb83b2', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:01:02', '2018-03-19 00:01:02', '2019-03-19 06:01:02'),
('5670082abedd90520896402cd4ebc88207292edde46e0f4c22238efd0b8e4d49dc189caee3f993cc', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:35:11', '2018-03-18 06:35:11', '2019-03-18 12:35:11'),
('5672f4f694990373f0d139b5bfb34d8acc986395b68cbdff1538ea71bad088daafe76364d02d4b4f', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:16:32', '2018-03-19 01:16:32', '2019-03-19 07:16:32'),
('56ed397b5db97a1814c3a638ee406bc84decf5524460493251d48422d1633a33a4a1aabb2bb2665d', 5, 1, 'MyApp', '[]', 1, '2018-04-10 12:20:08', '2018-04-10 12:20:08', '2019-04-10 18:20:08'),
('57a46ce52c8f3286871a2cac57f41f6d9eba6868d98b95f6ca99eb8c4482045a52f28dd138110bca', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:57:56', '2018-03-18 01:57:56', '2019-03-18 07:57:56'),
('57edf86b84cf5035bd3df61f5ddd734bb65253de58f5a8377151eb595b06b693a56703ead1bca298', 3, 1, 'MyApp', '[]', 1, '2018-04-12 09:46:48', '2018-04-12 09:46:48', '2019-04-12 15:46:48'),
('58848d8c302a2eb2c273682da343f897f6262cc04688b1fc503ad864446c6d26c3ab6636a34ab624', 3, 1, 'MyApp', '[]', 0, '2018-04-05 12:18:19', '2018-04-05 12:18:19', '2019-04-05 18:18:19'),
('59536a0874303a06e9b42f024b0595d44c8b39c35e7dbc58895bd886a99cfefcd9de32360dc1dec8', 3, 1, 'MyApp', '[]', 0, '2018-03-22 03:21:43', '2018-03-22 03:21:43', '2019-03-22 09:21:43'),
('59876ef6871c47451ba246b416f73263c485c5edab9e4ff718dc8b05730d4ab4491bde881ece9323', 3, 1, 'MyApp', '[]', 0, '2018-04-10 05:46:12', '2018-04-10 05:46:12', '2019-04-10 11:46:12'),
('5a78cf660ab69de28fd92468f8771a604ca14d46c9c338c7001f7185115986811096fd7a10600c43', 89, 1, 'MyApp', '[]', 1, '2018-03-23 12:44:39', '2018-03-23 12:44:39', '2019-03-23 18:44:39'),
('5b97e8c766f3b0620a764c026558551ced2931f5adef5ea7f7c2854874d91e757886457c52cff2b0', 2, 1, 'MyApp', '[]', 0, '2018-04-11 05:30:44', '2018-04-11 05:30:44', '2019-04-11 11:30:44'),
('5cb06269c967cb6f9b2779a3a1b0223cfd0adcad638c3752e47d2dffa6137af6f3b27cb8e06ce7fc', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:50:35', '2018-03-18 06:50:35', '2019-03-18 12:50:35'),
('5d2e7c82b3390f83ad308663934b84ef8c02e011c00992f87783032a012107c8a8ce8acc35fe52a1', 3, 1, 'MyApp', '[]', 1, '2018-04-12 07:15:47', '2018-04-12 07:15:47', '2019-04-12 13:15:47'),
('5d4aff894ca89f51830f016003cb38840d22b5fb0a2e6bd48ffc9bf736db565ce0eeefa2b699ff0e', 3, 1, 'MyApp', '[]', 0, '2018-03-21 23:59:12', '2018-03-21 23:59:12', '2019-03-22 05:59:12'),
('5d4c40fea85956725ae035d9d925ea6b63f878be4e009ac1d3690b43e05d3dd27ebcc75288961172', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:28:35', '2018-04-10 12:28:35', '2019-04-10 18:28:35'),
('5da565faa9c50ebfbad8032fc57587a4e2b28f34c7fe103cf3d0ed6005e968175d5d9b1245832b3c', 3, 1, 'MyApp', '[]', 0, '2018-04-10 05:37:20', '2018-04-10 05:37:20', '2019-04-10 11:37:20'),
('5dd11d1fa46e5538d937687748381a2e5d52d0bcaa395478ee061465965d1bdea276dbd76c79a653', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:39:50', '2018-03-17 23:39:50', '2019-03-18 05:39:50'),
('5eee6022ed6c65eaa7272111c48014dd7e59e0303afdb6b02fe7d145eff2f6b58912c34d53102bff', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:41:24', '2018-04-01 07:41:24', '2019-04-01 13:41:24'),
('5f5dfdc777fc5e1b137de8596ba7dce316581d9ad0432dc252e1c1562610074bed2fbe76853304e3', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:51:48', '2018-03-18 05:51:48', '2019-03-18 11:51:48'),
('5f8e505bc77f1797fd5e9020045c03a8bf890a7e159c032969f784a7788edf662495e63fed0f8a8a', 3, 1, 'MyApp', '[]', 0, '2018-04-01 11:11:58', '2018-04-01 11:11:58', '2019-04-01 17:11:58'),
('6038f16dc35af9074067cec578dc16c257b661782da443c46a48808e23178b8eeb14d55b8ffac17f', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:05:58', '2018-03-18 01:05:58', '2019-03-18 07:05:58'),
('6054bf19a5f600ed91d5f61bb401aafd7c4969eec2bc9e9644baf6aeb3802d9512623913d0f5c3ac', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:40:17', '2018-03-18 05:40:17', '2019-03-18 11:40:17'),
('60be8823940eef9539647b7e8ecc7aff89498db736008056cbc0b305d434e8323c883aa3d5b1a350', 3, 1, 'MyApp', '[]', 0, '2018-03-22 00:00:35', '2018-03-22 00:00:35', '2019-03-22 06:00:35'),
('60bf2537fb079d216b17c6db132dcfa624ae10553b69dda96c9d634f26ae9a1d1dd6a550ec258426', 3, 1, 'MyApp', '[]', 0, '2018-04-09 12:01:04', '2018-04-09 12:01:04', '2019-04-09 18:01:04'),
('611317701d2e56d2523dc56a9323ed7994e16de6abc4482dd02115850dff5d0dd53a38d93e969ab2', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:38:24', '2018-04-01 07:38:24', '2019-04-01 13:38:24'),
('6191859e72acb8b758cf800a7262039ad3ca920d27d55bc07e122ea65752438fb5520024b3ce404e', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:07:09', '2018-03-19 01:07:09', '2019-03-19 07:07:09'),
('621f47aaff1d3f141c2d52b3dbc1580d9c4f4a88432628cd686468b874e2d17c51ad9f37360a8c0d', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:52:27', '2018-04-09 11:52:27', '2019-04-09 17:52:27'),
('62c7536a6e9264fad543c2f56054564f52f1a0c4bdaa3a29a3f410691747d1db28e395af5060326a', 3, 1, 'MyApp', '[]', 0, '2018-04-11 10:53:11', '2018-04-11 10:53:11', '2019-04-11 16:53:11'),
('62fa8dc9261a7631d3af6ebc6cb1f0cbd1b15d643817727b7d946f1df38f512251584042847fe354', 89, 1, 'MyApp', '[]', 0, '2018-04-08 05:48:21', '2018-04-08 05:48:21', '2019-04-08 11:48:21'),
('640fae3d5ca6a24f31aad4c4cc7c8a55fdd046b8632f0116c7321e6c3db255c3d9cb5b729f7a705a', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:33:41', '2018-03-18 00:33:41', '2019-03-18 06:33:41'),
('642dfac378fb2554a16c81500013694bf8ef43ae25026838a49af0acfc11b29f0ddbd325b2a47543', 3, 1, 'MyApp', '[]', 0, '2018-03-22 00:25:19', '2018-03-22 00:25:19', '2019-03-22 06:25:19'),
('6541c3c00035ae586980c52570781eecbd805adc6f440cc69b5a960c5c34d471c56e548178d9f4ac', 3, 1, 'MyApp', '[]', 0, '2018-04-10 05:45:42', '2018-04-10 05:45:42', '2019-04-10 11:45:42'),
('65cd4ab92d8ec2495ad6b38fb202c14f2ecf47c6c5ae6e984c90cfe804e2cf33bdbfa4cfb4e8167b', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:47:38', '2018-04-01 12:47:38', '2019-04-01 18:47:38'),
('675b17365817caed6d82d1dd0adc38b35e9f378cc9d62d2afeac156edd90de2764c4818d1429ab9a', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:32:45', '2018-04-10 12:32:45', '2019-04-10 18:32:45'),
('67c1b45556d7f43898284572e12a28dc346223774fe3a6cc03968eae3663f35c7b32b3fb59f39606', 3, 1, 'MyApp', '[]', 1, '2018-04-11 05:16:55', '2018-04-11 05:16:55', '2019-04-11 11:16:55'),
('6886b9e04cfaa2b1ff8410e6d6dd18cadde489a910438b66e0ac009e5c5148dc19ecb4a813be934a', 3, 1, 'MyApp', '[]', 0, '2018-04-10 05:41:11', '2018-04-10 05:41:11', '2019-04-10 11:41:11'),
('6890652d0dd23677ac418981b2163c476d43f7e1c7d1786d163b891b61593c7b90ee4afe6be48918', 3, 1, 'MyApp', '[]', 1, '2018-04-12 07:18:58', '2018-04-12 07:18:58', '2019-04-12 13:18:58'),
('6891cf582de4ad0c4947cb8ab204de2f1a09f2ea022c040409d6b370bacbe4b6ec5fbd82cec55d74', 3, 1, 'MyApp', '[]', 0, '2018-04-10 11:02:45', '2018-04-10 11:02:45', '2019-04-10 17:02:45'),
('693bf1ca145b498819b4d9e262f1fce1c1a1aa49ea62ad3238f81f5de7c53dd23773d17ca71f5f97', 3, 1, 'MyApp', '[]', 1, '2018-04-11 05:11:02', '2018-04-11 05:11:02', '2019-04-11 11:11:02'),
('69f42f8826d69ab1decef1398268d8d367cb04c9f08307b0bfe20cb7707dfa81df449a1e1ff43528', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:43:41', '2018-04-01 07:43:41', '2019-04-01 13:43:41'),
('6bee863de334acb21067cf7134512019856654520121fc1121875af2cccc7f7c0a10344d4445b2b3', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:36:11', '2018-04-05 09:36:11', '2019-04-05 15:36:11'),
('6c1913d02a35f640a2e0280782d731110fc70bd9f86112582cd5c16b34fcd402384858866a247c64', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:29:21', '2018-03-18 05:29:21', '2019-03-18 11:29:21'),
('6cea30eec281bebee473a68db71b4bd1a78abf32d87bc206b8e86558ccb4938e16888243bf30993c', 3, 1, 'MyApp', '[]', 0, '2018-04-01 13:18:29', '2018-04-01 13:18:29', '2019-04-01 19:18:29'),
('6d4e9b8151ea1498a56a6f0ad728e39f3b797db084d321bb53a1fe642473132b8201c1d4ceca39c4', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:46:44', '2018-03-18 06:46:44', '2019-03-18 12:46:44'),
('6db0747b7547f0badfce4f4359e81ae17d384f9668fa35f3474a32b2fe06970706d64b08df05d3c6', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:07:29', '2018-03-18 01:07:29', '2019-03-18 07:07:29'),
('6e23ebcea5ca4b7c84563302cdfc39e048688ed1feeb11dc5a1dedce3c29ab52f38a2919a9b95456', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:49:56', '2018-03-18 00:49:56', '2019-03-18 06:49:56'),
('6ec3a78d8eeb3afd1f6b8e68b4b164291ae51111cf615af4f04de357899f6dcd0fa890a55da6e4e5', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:25:49', '2018-03-22 02:25:49', '2019-03-22 08:25:49'),
('700ecb5cded4b0921e04a8e3163626f29d855fd879eeee711c392a92d2ab63979c8ad94cd1e7f473', 3, 1, 'MyApp', '[]', 0, '2018-03-18 23:30:10', '2018-03-18 23:30:10', '2019-03-19 05:30:10'),
('7060ea465b2dd14f608f529f329368063c3dd04b886274d0b51c10c828151f04fb627f76ad7eef78', 3, 1, 'MyApp', '[]', 0, '2018-04-09 10:55:30', '2018-04-09 10:55:30', '2019-04-09 16:55:30'),
('7104e6e23783e5a996adbc0689b2ab4c8d6c48a60ca1f17269960599a16f9bb357cbf2b4282ca386', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:40:02', '2018-04-08 08:40:02', '2019-04-08 14:40:02'),
('7194ce8e830bf8fa390234cb8e3c10b1a7c06fa641ea89a9680f90bee3e3afd4f95139e29c88ec96', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:38:58', '2018-04-01 07:38:58', '2019-04-01 13:38:58'),
('724da424105674ed81bdfd3b96f6e78df395bd817455b9f4161e7d10aa8bf0335682d366563036bb', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:41:40', '2018-04-08 08:41:40', '2019-04-08 14:41:40'),
('73470573d13065e56a119e51c7411a8879e328d1caab99064574a3236a1acab4759a0a9a3817b1c7', 3, 1, 'MyApp', '[]', 0, '2018-03-15 06:57:48', '2018-03-15 06:57:48', '2019-03-15 12:57:48'),
('7402570bb5ee439302ada2153ee85fb03860c8a95362cc4a09f992ed3da39c81c1ca2dafc5ae0e7f', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:24:06', '2018-03-18 01:24:06', '2019-03-18 07:24:06'),
('75aa30e2b07fdf37480369a0f787c9fd9a8128198eb4edb665fdb9f78585fb5f086beff0b3220834', 3, 1, 'MyApp', '[]', 0, '2018-04-12 07:03:06', '2018-04-12 07:03:06', '2019-04-12 13:03:06'),
('7625f1b7944cb147f4b57509a97f84abf453677914829abd7426dcd5040260a517bf81dce46226f0', 3, 1, 'MyApp', '[]', 0, '2018-04-01 10:49:43', '2018-04-01 10:49:43', '2019-04-01 16:49:43'),
('762fc4d67ed700e55c2060cdb2763f304f505bfb7a58ab9e379ef195785976fab3af0cb758f93b16', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:54:04', '2018-04-05 10:54:04', '2019-04-05 16:54:04'),
('763abaf083b67400290aa897a1042ecc7b69602ed8e52ec33204b5e2ed5813912f4a4d72f60668f1', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:19:50', '2018-04-04 09:19:50', '2019-04-04 15:19:50'),
('768ff8ce1df4a237bd295f40d3ca7e476fbb654dcef8dbebab31409498d5c01417133c640984119d', 3, 1, 'MyApp', '[]', 0, '2018-04-01 08:36:58', '2018-04-01 08:36:58', '2019-04-01 14:36:58'),
('76b1a20d2b9e0f8531d3a1d96e50e1a44e672a22b5fb6c17a10652c9b805bbaf6612164bb6bee6ad', 3, 1, 'MyApp', '[]', 0, '2018-04-09 10:44:55', '2018-04-09 10:44:55', '2019-04-09 16:44:55'),
('7725e969b65df81892733edc63b3d739e622e3c7db4a0a24853ac62ea5e9634962e12bcd9e527211', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:25:40', '2018-04-08 08:25:40', '2019-04-08 14:25:40'),
('7775c104648831eea2af28b574481b3fc3bee66fb6564db1ed202ccabe6542f6cc48970d0ceaf1e0', 3, 1, 'MyApp', '[]', 0, '2018-03-22 03:08:40', '2018-03-22 03:08:40', '2019-03-22 09:08:40'),
('7804b7a6cb856996933df7bba605cfca7305b21d3d0c2cb04c0483aa1920b321265e0a17073f075c', 2, 1, 'MyApp', '[]', 0, '2018-04-11 06:32:30', '2018-04-11 06:32:30', '2019-04-11 12:32:30'),
('788887741980e886bad2f891263197cf0316d8c66228dbf0c7e859a4b83ee6439c29f3ed1adf1717', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:39:15', '2018-04-10 12:39:15', '2019-04-10 18:39:15'),
('78acb2d322c7202994e0e2ea013572318573065850d5610a35b5d6f4c41760034e091f22dd8e3eff', 89, 1, 'newToken', '[]', 0, '2018-03-27 05:29:41', '2018-03-27 05:29:41', '2019-03-27 11:29:41'),
('78b889d7f2476749ee8a94cf05bf5ee357dcbdbf11bb2cc0991e9fa0a23107805953a61f4720fa9d', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:26:26', '2018-04-05 09:26:26', '2019-04-05 15:26:26'),
('7902921b08557645aade95d90432366d27d20e7b0e47d68cef3dbd13933817b31d6d338ba9ac10ec', 3, 1, 'MyApp', '[]', 0, '2018-04-08 09:00:18', '2018-04-08 09:00:18', '2019-04-08 15:00:18'),
('794a48624a57c064a854e3c99790e6bea5e10b5b8781654aea3c8b263405d68de01c660f6e20bf90', 3, 1, 'MyApp', '[]', 0, '2018-03-21 23:45:40', '2018-03-21 23:45:40', '2019-03-22 05:45:40'),
('7978ce789a8282f2560ed073a2981120de36c8be0d99c07f24925c4a339fac6c427da20c5058776d', 3, 1, 'MyApp', '[]', 0, '2018-03-22 03:16:47', '2018-03-22 03:16:47', '2019-03-22 09:16:47'),
('7b3952ea510528ba9b37380547dd8b7517781efe2f4381d5da6d253b713fda235996747e434a8002', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:14:51', '2018-03-18 05:14:51', '2019-03-18 11:14:51'),
('7b656ab35c7923c5cf7d4eb072d5a8a6f980e59fa45f1198c430d038537f3486cb78ff9335a320fa', 3, 1, 'MyApp', '[]', 1, '2018-04-11 05:06:46', '2018-04-11 05:06:46', '2019-04-11 11:06:46'),
('7c0bf11a46fc3baa170fc27c04ecbfe48499bc138cccdda8a0746201ac29a30712b0cd192c048397', 3, 1, 'newToken', '[]', 0, '2018-04-10 12:32:04', '2018-04-10 12:32:04', '2019-04-10 18:32:04'),
('7c0ee5d5e21b5bb0d050b2591407ac745128c89b6d2cc5f23ae72a4275b0c9899290f1eee8007ef7', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:32:45', '2018-04-01 07:32:45', '2019-04-01 13:32:45'),
('7c634dc0c22a85f6416b3ec38a635a3c0215c6f0861c99415eef6c26824b36795e8a4bed0f6fb32b', 3, 1, 'MyApp', '[]', 0, '2018-03-20 23:16:16', '2018-03-20 23:16:16', '2019-03-21 05:16:16'),
('7c8623a0829059a092c5a75c4e0442fde1c7a364260656dea0d75edb70df2208f30c2f173d4a15e5', 3, 1, 'MyApp', '[]', 0, '2018-04-05 08:20:19', '2018-04-05 08:20:19', '2019-04-05 14:20:19'),
('7cc04da36b589af45afa72a79605ce1987f18975373bc842248691f3438c480c4a0e50d89043f280', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:57:33', '2018-03-18 01:57:33', '2019-03-18 07:57:33'),
('7d953915f959fcb06d5401f60a8a63e662fac0e23be28f30bee805aeb9503f2a0260b8dda0395ed7', 3, 1, 'MyApp', '[]', 0, '2018-03-22 03:17:39', '2018-03-22 03:17:39', '2019-03-22 09:17:39'),
('7da5bad93e4254a90ee234312a6a057a9960712194b631585355e6a9fa63bbe553915284ebcd497e', 3, 1, 'MyApp', '[]', 1, '2018-04-11 05:07:55', '2018-04-11 05:07:55', '2019-04-11 11:07:55'),
('7dbd989123357522881838ce4c1000230df473c02bad348deeb68dd8d47988f74a1ae54a465d586b', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:48:49', '2018-03-18 05:48:49', '2019-03-18 11:48:49'),
('7de0e35ab43f10173af78a538fd509c2441e5b0e2e91c34660d1d60c6eae7b38d96b108dbc6f5bc5', 3, 1, 'MyApp', '[]', 0, '2018-04-01 11:22:44', '2018-04-01 11:22:44', '2019-04-01 17:22:44'),
('7ef7f1c88c5fb1c386e8dcca263e25fc88715b4ad8adb1ce259b6c2cadfdb84551e9941f7687bedd', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:32:10', '2018-03-19 00:32:10', '2019-03-19 06:32:10'),
('7fd4d4aa95c8e5eff2f9ce7fa2592deff246c4952b358c8c40aec935c1113ed7f62d64aaf3345ffc', 3, 1, 'MyApp', '[]', 0, '2018-03-20 23:14:55', '2018-03-20 23:14:55', '2019-03-21 05:14:55'),
('81d1f8c72946176fc2303d06ab118c7845c7967f91407b03855fdd4558c29c080f6414113bade7b7', 89, 1, 'newToken', '[]', 0, '2018-03-27 06:29:22', '2018-03-27 06:29:22', '2019-03-27 12:29:22'),
('81db62da4f910cc1c0df34498a95dc9572f11dfee51cb29340cf71527dbc6c2fd6d3034987a8903c', 89, 1, 'newToken', '[]', 0, '2018-03-27 05:29:09', '2018-03-27 05:29:09', '2019-03-27 11:29:09'),
('83578b6fc40260e6501f29e2d68ce3f6b6a47ae6f7f561dede0fe6e830ec326d58192d4ee1cb5bb3', 3, 1, 'newToken', '[]', 0, '2018-04-10 12:23:41', '2018-04-10 12:23:41', '2019-04-10 18:23:41'),
('8400a496e72c283adef2bc007571c16ef70babb2a44166a207a4ec964f1e71eea80cbd9e82212918', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:32:39', '2018-03-19 01:32:39', '2019-03-19 07:32:39'),
('85a8ef21018c19534412a7b517d0fe87845cecf691db6bc5b46977271b90eb2daf9017df507a246b', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:54:30', '2018-04-09 11:54:30', '2019-04-09 17:54:30'),
('85c09a9e814d817eaf7cb0b196d4749140e695e7709ba5045b542e372a4f512ab4932fac78384a50', 89, 1, 'newToken', '[]', 0, '2018-03-27 06:36:37', '2018-03-27 06:36:37', '2019-03-27 12:36:37'),
('85c1c324e64af82fcc12f1a41f45f40fb4877e1b8b8714a95abf2c058e0f7160c969b11c1936ec68', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:37:54', '2018-03-18 00:37:54', '2019-03-18 06:37:54'),
('85e50526dde06f74c3c66a5eced47269731fec5c1b9dff84af7ff932f6d4f53e39bb0f4097981291', 3, 1, 'MyApp', '[]', 0, '2018-04-01 11:48:06', '2018-04-01 11:48:06', '2019-04-01 17:48:06'),
('875fb43d41c9214579249da430aaba9240357fde895c04df15b42df124c3764f7aa94dc8ed82b5d3', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:30:11', '2018-03-18 00:30:11', '2019-03-18 06:30:11'),
('87980b1a23cddebe2017d97b45ac6ad72dc6728dd9ebad8e07195f575a17527a3c5a41ad872c1a70', 3, 1, 'MyApp', '[]', 0, '2018-04-01 09:22:43', '2018-04-01 09:22:43', '2019-04-01 15:22:43'),
('87df87e48e02d15b32c626846dc281429b18aad1075113723df154d82a7b59b4d5ec56ac6d00d7a4', 3, 1, 'MyApp', '[]', 0, '2018-04-10 10:48:08', '2018-04-10 10:48:08', '2019-04-10 16:48:08'),
('8960c859e1606c128b0138edcb9664e56bf0bf1159ef1a06e4b7b75c5bf0732266bccc235e12bf8d', 89, 1, 'MyApp', '[]', 0, '2018-04-01 05:20:23', '2018-04-01 05:20:23', '2019-04-01 11:20:23'),
('896363ddecfdd61b6cab6077dde9bc1be0eedc610353b8824458129d85d80a786d0fed140137cba9', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:49:51', '2018-03-19 00:49:51', '2019-03-19 06:49:51'),
('89c5bc85d2f1509b5fc516fc54f0b8db3afe8ab3524ab8522f45f4c5a8dbb2a1e8f3ec781a3a5323', 3, 1, 'MyApp', '[]', 0, '2018-03-22 00:06:29', '2018-03-22 00:06:29', '2019-03-22 06:06:29'),
('89f983551034d588f22e8668aa74987a2ded032ca0bd432afaca291a7ecaf7e14521a722847c11b0', 3, 1, 'MyApp', '[]', 0, '2018-04-01 06:32:53', '2018-04-01 06:32:53', '2019-04-01 12:32:53'),
('8a90c711a5004d8eacb67a12acfafb4a4b9074ba3e059c7c4c2dff1f770535b5e53666cdfaced98c', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:29:54', '2018-03-18 05:29:54', '2019-03-18 11:29:54'),
('8adb8a3f6010c81471f5502a45605ee30197f9158513e9ecaab43f479900ca996ea905d00b0cc9ca', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:39:50', '2018-04-01 07:39:50', '2019-04-01 13:39:50'),
('8b25bd1c21041e60c80493b28ac14f3ec158cf472ec7babb480feb0b1015e650b6e2c090139e026f', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:13:45', '2018-04-09 11:13:45', '2019-04-09 17:13:45'),
('8b366fa057db88265e72311821e41e259d32079a924d452a14fa0edce32564f3caef9a0d2a7e4996', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:23:53', '2018-04-10 12:23:53', '2019-04-10 18:23:53'),
('8b411b1724365ed54282c263796e13d84af2e6dc84a1b0340bf2a9c63400afb783b8c0e268ba2e5b', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:33:51', '2018-03-18 05:33:51', '2019-03-18 11:33:51'),
('8bd4d094890dc6e11a489423b508e0841975b15a4bfa564c8c66598f3b66905d7acc73eae56f334f', 3, 1, 'MyApp', '[]', 0, '2018-04-01 11:06:10', '2018-04-01 11:06:10', '2019-04-01 17:06:10'),
('8cf1d51f51f416adbd7b29a4a0f0aba1c3f367152811b3d3512e14fce283f2cadaba9a8f6a98e6c8', 89, 1, 'MyApp', '[]', 0, '2018-03-23 12:48:38', '2018-03-23 12:48:38', '2019-03-23 18:48:38'),
('8d567a4cc79d72bcbf6db6fc9eb01cbe6e025d8ed155a0928a5be4a1b1b870a863e11d6ffe897599', 3, 1, 'MyApp', '[]', 0, '2018-04-09 10:59:19', '2018-04-09 10:59:19', '2019-04-09 16:59:19'),
('8dc5f01dfb872e103e213228ba3c3090059b30eca01dd4203a4212454261caceaa662f4f80678da9', 3, 1, 'MyApp', '[]', 0, '2018-04-10 08:24:46', '2018-04-10 08:24:46', '2019-04-10 14:24:46'),
('8fbff6f8f368a834c030d8199c14eedfaaa438025b067d98078b90f2d016698416a6d23923dcd5af', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:06:09', '2018-03-18 01:06:09', '2019-03-18 07:06:09'),
('8fe65a511a52cb38cfebad6877e9aad05530b40093e070e1ff7785c441ad954d3884a67b05774e61', 3, 1, 'MyApp', '[]', 0, '2018-04-04 10:17:35', '2018-04-04 10:17:35', '2019-04-04 16:17:35'),
('9147eb4199b6cd2309f9f86e801e29d40d3565aab21c1e81bdd545fd6dda943c2474aff9eb9f167e', 3, 1, 'MyApp', '[]', 0, '2018-04-10 11:46:23', '2018-04-10 11:46:23', '2019-04-10 17:46:23'),
('9195bfb27cb275764e44fc3af7f388c89d4bed4b7906ce1d8f58bed1dfee9ef1765f782910312262', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:11:01', '2018-04-05 10:11:01', '2019-04-05 16:11:01'),
('93598de1771b3b6ad71750d50a6b6c41d32b497ffa553bf1fcc2d699e8094111c740a0c224e52279', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:21:22', '2018-04-08 08:21:22', '2019-04-08 14:21:22'),
('938ec83455bbeb3040fd1db19582214803a6f59a78adb3edd33d78309d0270b11da41ef63945c550', 3, 1, 'MyApp', '[]', 0, '2018-03-22 04:45:08', '2018-03-22 04:45:08', '2019-03-22 10:45:08'),
('93978000b5784a0f6fffb9e2047ae2acb5216de84bced05f7e6731bd1b346d74732db45c749184d3', 89, 1, 'MyApp', '[]', 0, '2018-03-29 11:55:42', '2018-03-29 11:55:42', '2019-03-29 17:55:42'),
('939fd73b5ab82814b558dd20cd4c5325ba14537bc9d8a520cb59271d7d71c2cb2d8947725219f5ec', 3, 1, 'MyApp', '[]', 0, '2018-04-01 06:18:31', '2018-04-01 06:18:31', '2019-04-01 12:18:31'),
('94444cfe8824e8d617be5ff20312abb3857d0d1674010953c53278d3d6edae201f1d2e5088fcff7d', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:47:40', '2018-03-18 00:47:40', '2019-03-18 06:47:40'),
('949237b96829f513f54e3bf47262db0761a552d5e4da9c079a3969353e9feae60c0f5d20685b7014', 3, 1, 'newToken', '[]', 0, '2018-04-10 12:33:02', '2018-04-10 12:33:02', '2019-04-10 18:33:02'),
('94a05cec3895beb6af809e59957ee0d6d0478eabf08fdf340793de715b8838bd4076057e48aefe84', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:27:17', '2018-03-22 02:27:17', '2019-03-22 08:27:17'),
('95099a72839f3bb95396a3689d72625180db86ccdc31038b9beea3be8a473394b417a638e58d2d53', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:40:32', '2018-04-04 12:40:32', '2019-04-04 18:40:32'),
('95118f0234981cba250dd24190d21bfaaa53d02784ace06d07ceaadfeb9c8d282faa0bf885dbb035', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:02:01', '2018-04-01 07:02:01', '2019-04-01 13:02:01'),
('9540a5dbed00759dd9028dc907cf693174d6a2acb9f5d697f6e24830887532758dc632d5d373424b', 3, 1, 'MyApp', '[]', 0, '2018-04-10 08:30:02', '2018-04-10 08:30:02', '2019-04-10 14:30:02'),
('96365c463eabfdfbbbc60d5a62c90468b893ca06ca2aaabdb8ec2e95b193908c1f9f2d4d4c2348c2', 2, 1, 'MyApp', '[]', 0, '2018-04-15 05:09:12', '2018-04-15 05:09:12', '2019-04-15 11:09:12'),
('97fde1bb64580dd46653849c1b43a6f10446a19a6d05c8efb9f5214c9a7e82c1e423bb7fd796ad25', 3, 1, 'MyApp', '[]', 0, '2018-04-10 08:24:35', '2018-04-10 08:24:35', '2019-04-10 14:24:35'),
('993a3fab17867a14a22e1132fc3065b4edb8295430430054f9740641620fa23e08afbc1214e7ba26', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:46:21', '2018-04-04 12:46:21', '2019-04-04 18:46:21'),
('99425364a385514c59f6b93a8ebdd3156a3feb75c0d641b588af0b69e4eb7a9fc990a2ae53aa78be', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:48:52', '2018-04-04 12:48:52', '2019-04-04 18:48:52'),
('998549292026cd4f6f9da64f79d95ebf1205a36a5e0920fe6fb674476870859a75c0648c1003ae54', 89, 1, 'MyApp', '[]', 0, '2018-03-27 10:27:03', '2018-03-27 10:27:03', '2019-03-27 16:27:03'),
('9a343633d324cdda0b394a7fa3428868c6a40d1444ef3892dfe8b45345ccafb13128a3e890de2dc1', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:40:24', '2018-03-19 00:40:24', '2019-03-19 06:40:24'),
('9a53f5729b7418fe297a17bb7a66d1ecf2a6f016da2bbc364c3ecfef8d475427bf760ed9d010b34e', 3, 1, 'MyApp', '[]', 1, '2018-04-11 10:01:52', '2018-04-11 10:01:52', '2019-04-11 16:01:52'),
('9a8a13a63f266b05cf1b4942d0874908d8b1fc0693fc40cbbbe788b833ccac8509314492c809854c', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:06:17', '2018-03-18 01:06:17', '2019-03-18 07:06:17'),
('9b546c49ed685ac23c891a9433de33aee3cd1f1961fbd05a41e67ebd41100ff8aca30641b4e7513b', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:25:43', '2018-04-01 12:25:43', '2019-04-01 18:25:43'),
('9b8b3798fe16d56de1ae3d4e8d9d7f38e74bce6ba65c9991ec1f08ced8e16487e35c93471709bcb4', 3, 1, 'newToken', '[]', 0, '2018-04-10 12:35:57', '2018-04-10 12:35:57', '2019-04-10 18:35:57'),
('9beec095983218734fd6c11f8800d145cb5c6dd4769b21f99a355dd7286c6d0872ce63b3b8a3f632', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:30:48', '2018-03-18 05:30:48', '2019-03-18 11:30:48'),
('9c7c851e9ff996ed89172e68216a005671b068ad2b6c9e9d4676d913be7792fc205f64df6f4bbdaa', 89, 1, 'MyApp', '[]', 0, '2018-03-27 09:01:57', '2018-03-27 09:01:57', '2019-03-27 15:01:57'),
('9d1718d369248f99f5fcbee6e2921084b1135d1d8c7b7c5bf4a48a5de4ea88ef8ff132d1d54606bf', 3, 1, 'MyApp', '[]', 0, '2018-03-19 02:18:05', '2018-03-19 02:18:05', '2019-03-19 08:18:05'),
('9db3f422798dab5fccb44ae02cf8c5d4fb8341d33c4f29ea5cd622aa57fe890e6c902ff1984f2085', 3, 1, 'MyApp', '[]', 0, '2018-04-01 09:47:39', '2018-04-01 09:47:39', '2019-04-01 15:47:39'),
('9e6eb315e7678d0c543391b53178bce1565a2fb808ca9c714677e3ac2ebfc6714bb3cee78fe51b4b', 3, 1, 'MyApp', '[]', 1, '2018-04-11 10:01:01', '2018-04-11 10:01:01', '2019-04-11 16:01:01'),
('9f3ab68d997ed189cc575a3ebde41297fb3b57be41f780f6525a8cfd61155cf66424ccdf01c24009', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:37:42', '2018-03-18 00:37:42', '2019-03-18 06:37:42');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('9f4748f6abbc76defcd4cb0762fbf1ca6d0b31626904572cb7e7faaaafc3251310ae9bb78b39d78e', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:40:24', '2018-03-18 06:40:24', '2019-03-18 12:40:24'),
('9f7c476864b8a288bc1d8fc8824aa7fc936ed912a2eab30f811a090f3baa23b533fb22fb0f4f802a', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:05:18', '2018-03-19 01:05:18', '2019-03-19 07:05:18'),
('9f83f7749f1264b19a452cfd2e8bddf900aa7409eeb9416db41a7c5a6600c9ad602090c59cef3cba', 3, 1, 'MyApp', '[]', 0, '2018-03-19 02:17:30', '2018-03-19 02:17:30', '2019-03-19 08:17:30'),
('9f9334f058a8d705435e412b11c169d9683978b479c58f96e86a8c33ca0281540d724ef78aac621b', 3, 1, 'MyApp', '[]', 0, '2018-03-22 00:09:44', '2018-03-22 00:09:44', '2019-03-22 06:09:44'),
('9fb9083244adc820b3c74315b2acb2654f59d0e08c819c50f254db3cf2a6e820bcb2302c011c0cf7', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:44:06', '2018-04-01 07:44:06', '2019-04-01 13:44:06'),
('a03b5a1e9f8bfc3534dada58bd0df3791deaebb1a637e305212f8a4a3c52bf466e055baeef479f15', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:37:18', '2018-04-10 12:37:18', '2019-04-10 18:37:18'),
('a1fa2a83899bcb8f64939b9ce4d0fb3b0aeec893494cfb622dfae7bde124ca1e31772ff8102286d8', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:01:31', '2018-04-08 07:01:31', '2019-04-08 13:01:31'),
('a255be1d0471d1bfefe261b8896c47de056c33d500794d3788033c90a01f73cdf6f38365846e40a0', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:00:01', '2018-03-19 00:00:01', '2019-03-19 06:00:01'),
('a3404f8b151a154c30223d281a551e060882ed208a7dea69c8f69f9231f2811abc5e3039bbe9dadc', 3, 1, 'MyApp', '[]', 0, '2018-04-11 06:46:58', '2018-04-11 06:46:58', '2019-04-11 12:46:58'),
('a3caf7f673785d10cf9f5a67565c4d16760d557af0478df13f6334c89825dcdd392ec24d3f61c756', 3, 1, 'MyApp', '[]', 0, '2018-03-21 23:38:50', '2018-03-21 23:38:50', '2019-03-22 05:38:50'),
('a441bcd2d5b4f64003f8dec56f4cd8db0eeb70d06522fc455d88249b0b69cb4972a4bdb3b211104a', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:43:15', '2018-04-04 12:43:15', '2019-04-04 18:43:15'),
('a48b867b5765d788140dd6d56ecd75c2613266c9ff275874c00c7140e9c55ae81b082b9013b39a37', 3, 1, 'MyApp', '[]', 0, '2018-04-10 10:47:40', '2018-04-10 10:47:40', '2019-04-10 16:47:40'),
('a5a402d758489121dc11fed8219a30f53ff0cdb66b88fc0f9992ca3fad6ca5150d0e89e4beef56b7', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:19:17', '2018-04-08 07:19:17', '2019-04-08 13:19:17'),
('a5a8aaba342e7f1ce6d2aad0cb40faf2818c42356b04c0ef4a365044edc3ca5a0f32af037b8b96c5', 3, 1, 'MyApp', '[]', 1, '2018-04-12 11:00:53', '2018-04-12 11:00:53', '2019-04-12 17:00:53'),
('a6304bfcb8ec823a833c1480cf2c90b993d4c0d06b0a5717304df6f72f76fe6e3d7075d8f07beebd', 3, 1, 'MyApp', '[]', 0, '2018-04-10 08:54:02', '2018-04-10 08:54:02', '2019-04-10 14:54:02'),
('a63ca43be334ccc8194655e2a1e7203410176ab6129b4257dc0eac5d4ae07a8e5c1d15d037796455', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:32:00', '2018-03-18 00:32:00', '2019-03-18 06:32:00'),
('a6876b164f6bd76714b06563637d4b570a2ff33dffe362b145ac2d762fb60ed7a14292c724f91ae2', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:56:38', '2018-03-19 00:56:38', '2019-03-19 06:56:38'),
('a84b6e37c4825903af5fc370bbd38240a2659069a8aaf6ca25f94fc570ae6fde8320f8053db19814', 3, 1, 'MyApp', '[]', 0, '2018-03-18 03:07:11', '2018-03-18 03:07:11', '2019-03-18 09:07:11'),
('a901c16a1bba79db657ac1ee3c4976c9d5a6f1f9f0bed5aa1ebf3a985d092e4754668648faba2650', 3, 1, 'MyApp', '[]', 0, '2018-04-01 11:09:24', '2018-04-01 11:09:24', '2019-04-01 17:09:24'),
('a9ad27242987a0b881228deeeeef14cd2ecfecef564cca4406f57b415a16b49e568b45665cf9508f', 3, 1, 'MyApp', '[]', 0, '2018-04-08 09:17:33', '2018-04-08 09:17:33', '2019-04-08 15:17:33'),
('aa41aa3fa9730c2d5a074f5aa9ecc7215e0622ee9e69112cd6a70653c7d16b0630bedb8e865b504e', 3, 1, 'newToken', '[]', 0, '2018-04-10 12:12:07', '2018-04-10 12:12:07', '2019-04-10 18:12:07'),
('aa6aac98c37b379f7d4325c005bde969c8dbef81055c1eef9d7ca2016946167323304c0087d12f92', 3, 1, 'MyApp', '[]', 0, '2018-04-04 05:15:50', '2018-04-04 05:15:50', '2019-04-04 11:15:50'),
('aa8379bcea7edd9a846f98b6c144ddf0db43436f630fd933f47c2c7cf8c3e302e00b09883a82d246', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:51:23', '2018-04-04 12:51:23', '2019-04-04 18:51:23'),
('aa85d8445e1257e7eeaf88b55ce8889c328b39b0e3897eb547c9ca55085f31d03ead632b0b690d0e', 3, 1, 'MyApp', '[]', 0, '2018-03-22 03:25:53', '2018-03-22 03:25:53', '2019-03-22 09:25:53'),
('aa95a20bb3111408e07a9a0108dc15f657e058dec4088e5348e25ce688832d9e14b7cfe8a4ea010a', 3, 1, 'MyApp', '[]', 0, '2018-04-01 10:37:23', '2018-04-01 10:37:23', '2019-04-01 16:37:23'),
('aabed7e7c5523642b848b454349d02b63253e2350a333cba81f207eaa20e5aea993a0ca991d11d88', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:27:40', '2018-03-18 05:27:40', '2019-03-18 11:27:40'),
('ab67c79d20278033fa25e22466b91b2be6bcea09ea8e5ba017c7b374384d3ad3aabc96e29a287443', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:45:34', '2018-04-01 07:45:34', '2019-04-01 13:45:34'),
('abca016cf6aa96706efb8017eaad9ee8c7ebf73209bb4723d9cd5af26b58cb2ee201acbb67f528cb', 3, 1, 'MyApp', '[]', 0, '2018-03-22 04:07:29', '2018-03-22 04:07:29', '2019-03-22 10:07:29'),
('abed962313c42b112cb91ce64fc2e781045270494c9237473257eefbd586a157304710912fb1107c', 3, 1, 'MyApp', '[]', 1, '2018-04-12 05:43:37', '2018-04-12 05:43:37', '2019-04-12 11:43:37'),
('ac3a74763dc54793898e748ed79e2afc6c96141d64926cda5e733d1c3cb708f1e40d750340b6b284', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:55:38', '2018-04-05 10:55:38', '2019-04-05 16:55:38'),
('ac8b407348876ae28c745ec64c8b8be7886e01166211fc5c9145e530f022c0f42eb29f88b139bd58', 3, 1, 'MyApp', '[]', 0, '2018-03-22 04:04:08', '2018-03-22 04:04:08', '2019-03-22 10:04:08'),
('ae01762026792526e84a490670beb0106830004f3c13a1ab0bca26ed565e6297cda8408d3f280bd5', 3, 1, 'MyApp', '[]', 0, '2018-04-01 08:54:43', '2018-04-01 08:54:43', '2019-04-01 14:54:43'),
('b04bfe330405798f0e07c7dcf98cd7a3d6184002e68098325e5ef82d8b6172ec7abeabf4e85c2951', 3, 1, 'MyApp', '[]', 1, '2018-04-11 11:22:23', '2018-04-11 11:22:23', '2019-04-11 17:22:23'),
('b050555e0712141b82d8288d8c263b58f0bedbd3358464eb18ae9c79fcc879c8ac0d908e25a44607', 3, 1, 'MyApp', '[]', 0, '2018-03-18 04:41:49', '2018-03-18 04:41:49', '2019-03-18 10:41:49'),
('b0b63c1eb692e63e2eb7bc996ebf5382a260d6368f3ab4a321e0968d8474e7f2e1d19b31436466ac', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:05:21', '2018-04-01 12:05:21', '2019-04-01 18:05:21'),
('b127cba6859ea76e8dc1c25cfb673d3b0cd9c37a057978fb1d2dc39ccacb385cebcacef1d287f6ee', 3, 1, 'MyApp', '[]', 0, '2018-03-18 03:05:17', '2018-03-18 03:05:17', '2019-03-18 09:05:17'),
('b1eff1ecc833c2b98c3d4ae6d1368bd4a4abc44be894aa453679ec180dbb48cc2e033c858efeabd7', 3, 1, 'MyApp', '[]', 0, '2018-04-05 11:15:20', '2018-04-05 11:15:20', '2019-04-05 17:15:20'),
('b2e5d2216d79450c9cf273c9ba747da043b52a9a662d39d811ed952667a7ced63a920d8a55a9b58c', 3, 1, 'MyApp', '[]', 0, '2018-04-01 08:39:38', '2018-04-01 08:39:38', '2019-04-01 14:39:38'),
('b2f312e618021fc793a73fcbe3021f2fe564aa0a26f5e1cda47c17d8a39965ba6b94b88babc679bf', 3, 1, 'MyApp', '[]', 0, '2018-04-01 09:40:27', '2018-04-01 09:40:27', '2019-04-01 15:40:27'),
('b42e7d11b37ae6ff629d2046f6c69833307ee1347fc01c318c17167235a13beee6996509a94efd2c', 2, 1, 'MyApp', '[]', 0, '2018-03-18 23:55:27', '2018-03-18 23:55:27', '2019-03-19 05:55:27'),
('b4cdaf142b36090188e3e820950925f00700ced4ebde0a79477a9fc4cd265e9072ea430386b39e4b', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:35:07', '2018-03-18 00:35:07', '2019-03-18 06:35:07'),
('b4faf0c82ff3d5e2b26f29fc1cb33832f19c369c2df52bfadfe9363181408b7eebf6bde520eab9de', 3, 1, 'MyApp', '[]', 0, '2018-04-01 10:56:33', '2018-04-01 10:56:33', '2019-04-01 16:56:33'),
('b658e83dc798d96fb36dd1fc6d4a1dd817141a7e0708b1016689ed76c2244ed3eb71509d1dffdea8', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:42:37', '2018-03-19 00:42:37', '2019-03-19 06:42:37'),
('b672d1e05ad17a66d5852b55c8eee24149667653777b869737b100b0fa30cdfcb957398111d9ed29', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:36:16', '2018-04-01 07:36:16', '2019-04-01 13:36:16'),
('b6bcd13be36ac448161f0a8206b669aeb1d4a100ac236ad675061b50a4c59149590d8f5a867198d9', 2, 1, 'MyApp', '[]', 0, '2018-03-22 00:26:09', '2018-03-22 00:26:09', '2019-03-22 06:26:09'),
('b6e3a05cad5e33723d5192aed3b2c16af4f60a5e1ffd907b556cf8e254c16b13eb2a4ff3042eb0d6', 3, 1, 'MyApp', '[]', 0, '2018-04-04 05:09:50', '2018-04-04 05:09:50', '2019-04-04 11:09:50'),
('b78da0ff148f6e83e97b9411c6af77f2b2bc0e1ce8e11dad21e4105580dcd7023ddc5d185df0d1ee', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:10:47', '2018-03-18 01:10:47', '2019-03-18 07:10:47'),
('b7972fb575e4a0a47d848b0691ff865c8a11929c6307938c965e39c51726b3ecc26a6a7dd8780c04', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:14:47', '2018-03-19 00:14:47', '2019-03-19 06:14:47'),
('b7e80170ced53a601ea175fe7b03a754fea4afbf95184df574e572d10862f2e75e5201ada617116a', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:06:46', '2018-03-18 01:06:46', '2019-03-18 07:06:46'),
('b8ec80736c7a190d678d5067822f6bc1e035edc9e2544277c21c332380e7ed0d8961a38d2f02d656', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:59:46', '2018-03-18 01:59:46', '2019-03-18 07:59:46'),
('b9c5cdd1f016338d02301fa366478457f9599345dafb79bdb600096da5ac2d0c956e46bd33fade49', 3, 1, 'MyApp', '[]', 0, '2018-04-10 12:48:56', '2018-04-10 12:48:56', '2019-04-10 18:48:56'),
('bade359b271e1e87af159720be21e34891ecf4d03fb86fa21e4d8e06a5e03d46ed0b5e9a4521fb0a', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:44:01', '2018-04-04 09:44:01', '2019-04-04 15:44:01'),
('bb4623b97118142ea871c851fc1ee930e7c408123f6ccda6e469202e40ac69e330d52ca6478fbdfd', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:35:14', '2018-04-08 07:35:14', '2019-04-08 13:35:14'),
('bba16a165aec11583fd1a9a5f1690f75556f026f9275fce7fd347986785d5c07ad7e8b74c5721ea1', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:07:44', '2018-03-18 01:07:44', '2019-03-18 07:07:44'),
('bbe31ec72c42f90414f70916a92f8b369ac637336d76edc8bde66d0f44c567b8157ec3ce3d8b34c6', 3, 1, 'MyApp', '[]', 0, '2018-04-01 09:54:12', '2018-04-01 09:54:12', '2019-04-01 15:54:12'),
('bc4272a7e7f0d74ae26b2571d588f5f6de054cc8faa66cef28270a6bb1372271cf21911a9b6acc22', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:07:59', '2018-04-09 11:07:59', '2019-04-09 17:07:59'),
('bc8670197a0a6cfe495d96633b3e299851997ea600f42d7502f8c97bbee3047d4d9409dc0970bce0', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:32:14', '2018-04-04 09:32:14', '2019-04-04 15:32:14'),
('bcafccf1a6fbdc57f93d1ee89031f90915c228de0c2ecd21dbb4153eff55ab343a1764b763a229b7', 89, 1, 'newToken', '[]', 0, '2018-03-23 13:45:05', '2018-03-23 13:45:05', '2019-03-23 19:45:05'),
('bd4fc9b833178613329749387aef271f716c211a0a06fb08ca60fd88bbbd09f6f831b05f8e03bf10', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:51:05', '2018-03-18 05:51:05', '2019-03-18 11:51:05'),
('be5070cb2efe69611262b0011ab99a86f8cb01294984cca7ca53c8d8793813c2e472d745345f39a7', 3, 1, 'MyApp', '[]', 0, '2018-04-10 08:57:34', '2018-04-10 08:57:34', '2019-04-10 14:57:34'),
('be7190b8a43d4be49c2febc29d44cfc182e0e55d483ea5db90bb56fe20017fc55043e80a68029e9a', 3, 1, 'MyApp', '[]', 1, '2018-04-11 11:41:28', '2018-04-11 11:41:28', '2019-04-11 17:41:28'),
('be82e94b9f27b90134bbca959168d2fc37621980d2512d5e582f2803404a63d74aef0d4e09f9669f', 3, 1, 'MyApp', '[]', 0, '2018-04-04 08:19:19', '2018-04-04 08:19:19', '2019-04-04 14:19:19'),
('beaac5c571ab2dfca93a85a1348fbecc6713c786d851a4e5335978809ad302b5c3ccc5e8cb95486d', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:20:59', '2018-03-17 23:20:59', '2019-03-18 05:20:59'),
('bef959018e76216d43abe16b4e08d13449768d5c620f3c7ff260f23485ed3fe79c54f0e258300f78', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:14:35', '2018-04-04 09:14:35', '2019-04-04 15:14:35'),
('c04eb2156c7f8b72edbe0ea6045acccde02ecf5882226e22a89c07549e628a33767c7c4f8b5b785f', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:33:03', '2018-04-04 12:33:03', '2019-04-04 18:33:03'),
('c0b97ea25b7dc7d3b4f25326a9ba871c4991c33745fd3e4d006f38763a8d84db2d82327cf428054e', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:35:28', '2018-04-10 12:35:28', '2019-04-10 18:35:28'),
('c2d955b3871e5bbb292a1fd1570a62024822b4ea0a718ba1085b8c9c6d19ab32f9f695022cb642f9', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:48:45', '2018-03-19 00:48:45', '2019-03-19 06:48:45'),
('c35ba973300d46efcd42ff21d604fb94db89c15ee869f3c6657c0f258f82c094ae4ce128bb3f8d22', 3, 1, 'MyApp', '[]', 0, '2018-04-10 09:39:49', '2018-04-10 09:39:49', '2019-04-10 15:39:49'),
('c43a36c44a359d44d31ffad96a3ec796bd3ae7b463b490f8e8a5976acf799cdd99e6133090d6b890', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:36:27', '2018-04-04 12:36:27', '2019-04-04 18:36:27'),
('c479db889298cff75809497366ae08d9684f372a694fb2d75e6afe7474c3ac55b8782ac8f63b8de1', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:42:08', '2018-03-18 05:42:08', '2019-03-18 11:42:08'),
('c5336057d8d81c62c6c7b0911ef5d41a256689a893159ec7854af6393a0873d185c6d282d8e112ed', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:24:34', '2018-03-18 01:24:34', '2019-03-18 07:24:34'),
('c66523c0fed90c4f8a4e9e565408c111224acc6433e9b8b03c6f239fcd741a88f0662723d8d8f19c', 3, 1, 'MyApp', '[]', 0, '2018-04-01 10:53:08', '2018-04-01 10:53:08', '2019-04-01 16:53:08'),
('c6ae427a5c230e85928a95bca52542c399a601d44ab33e096a139b6361df5e27dcabc920b61177f3', 3, 1, 'MyApp', '[]', 0, '2018-03-22 03:30:38', '2018-03-22 03:30:38', '2019-03-22 09:30:38'),
('c6b327db1f8b523c547ce8c14c5c10aa11a95da4cc7c3eabf59e0c801cba453b224c2fdef6f07ec5', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:56:04', '2018-03-22 02:56:04', '2019-03-22 08:56:04'),
('c6b45d13a5b6165a51ad45de4645b687358bd953ac17bcb4f75c97077c98de644775f70913b661b3', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:12:03', '2018-04-09 11:12:03', '2019-04-09 17:12:03'),
('c6c418b496262fbf443b56fc99c60165f08a1f777d02b6b28a9dc52df2892f9ea39d0f511f38ccf2', 3, 1, 'MyApp', '[]', 0, '2018-04-04 08:39:31', '2018-04-04 08:39:31', '2019-04-04 14:39:31'),
('c797777981dfdfd52b46002be5c7fccf8ce78a0113819c107deecf49370957c2ecb10e893fa1f454', 3, 1, 'MyApp', '[]', 0, '2018-03-18 06:37:04', '2018-03-18 06:37:04', '2019-03-18 12:37:04'),
('c862ed74016b604fc99e5e0bd043ba8f7cc9ea499fcabba2331c436a15a10b3137b3bc832e95f994', 3, 1, 'MyApp', '[]', 0, '2018-04-08 07:12:01', '2018-04-08 07:12:01', '2019-04-08 13:12:01'),
('c9adaca6e4149914cb8ca723e42fe405ebafc9ec0fee9fab687cd2834c4f9c5e04d3eff0ed9364d4', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:52:59', '2018-03-18 05:52:59', '2019-03-18 11:52:59'),
('c9bcb7bf1041d00d778afff41959bd0c9efff307e776361bf4c39ea8b65cc64985af6b7401efd6f9', 2, 1, 'MyApp', '[]', 0, '2018-03-20 05:31:37', '2018-03-20 05:31:37', '2019-03-20 11:31:37'),
('c9e2d16ffc3035e2a2abc175e8a0c87cd81f1be09a7f3eef7b544c3c3f02e28fbc128b82a4de8139', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:58:03', '2018-04-04 09:58:03', '2019-04-04 15:58:03'),
('ca3ffd506a889c8ebfec257f906b76ec35fa28f1841f98cd6b5fa49bb1e534e081640122d6b223e0', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:18:17', '2018-03-18 00:18:17', '2019-03-18 06:18:17'),
('ca5a64ba82714ccbad03101a1105b5a57bdff94585a3489dbeb44d411fe0aff2c49fc5ea483c0fcc', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:38:51', '2018-04-01 07:38:51', '2019-04-01 13:38:51'),
('ca6aa6b996112f19fccdf06e2264334eaf546abf63b7d644436744d38d48e05fb6a048afa5a4197b', 3, 1, 'MyApp', '[]', 0, '2018-04-10 05:39:13', '2018-04-10 05:39:13', '2019-04-10 11:39:13'),
('caad7c1aa08fa4019d791d9585b5755b6c87434bdf450171b4b1377fa55bfaa5c44fe9a8864a6c42', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:48:13', '2018-04-05 10:48:13', '2019-04-05 16:48:13'),
('cad6a9f157ca78b40fd04b74f55b776a6be2e68356c9d3c75fad4377f13edf01173178413acf7ea2', 3, 1, 'MyApp', '[]', 0, '2018-04-01 06:14:42', '2018-04-01 06:14:42', '2019-04-01 12:14:42'),
('cb4465e33c12ab2412771a53caaa898305a8a53f1e4ce45c71a53e214069cf0e2c96c7432057ec96', 3, 1, 'MyApp', '[]', 0, '2018-04-10 10:59:06', '2018-04-10 10:59:06', '2019-04-10 16:59:06'),
('cbae42c12119048c8bd2cd30c3012f79a1dc4b6cc55acee1a349f67bf65398d8ac687f36801ff717', 89, 1, 'newToken', '[]', 1, '2018-03-23 12:48:26', '2018-03-23 12:48:26', '2019-03-23 18:48:26'),
('cd63e7d4128e99118141614808619563a756400c08fa0181e92854225bea60a5a06ecc7a5103545f', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:58:22', '2018-03-22 02:58:22', '2019-03-22 08:58:22'),
('cda6a8045c45f2bfe4d00b5d4ff3bf12dea7fb857fe1aa86a7bda36d8cbb6eb8b42d121284e28756', 3, 1, 'MyApp', '[]', 0, '2018-04-10 09:21:39', '2018-04-10 09:21:39', '2019-04-10 15:21:39'),
('cdfb026a7644b57235d3e1074222e00de68bd0edecbd536e193a7618237c776b0720a454fa6d641a', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:19:36', '2018-03-19 00:19:36', '2019-03-19 06:19:36'),
('ce6c1838030c56e803b431bb47ef388b4c4e4c1c3e27e98a99ded31e24585064c9889d69776d52f0', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:03:14', '2018-03-18 01:03:14', '2019-03-18 07:03:14'),
('cf0f3e465a503c283c4c4248eb34e773226b4a2ab06655739b49ea96e2a7f525c8e2437d7379d2c9', 3, 1, 'MyApp', '[]', 1, '2018-04-12 05:24:59', '2018-04-12 05:24:59', '2019-04-12 11:24:59'),
('cf26cf8f1b0c104b2a743212a2e1b8a95eaac4da67ade3b590ec88ab19a1f8ad4d83cbc19a140d0b', 3, 1, 'MyApp', '[]', 0, '2018-03-22 03:29:02', '2018-03-22 03:29:02', '2019-03-22 09:29:02'),
('cfa2d5b54261b0a1c605989cc7df6b2a058ae74c3909c80fd6cfb4286662ebb6274fc9d248921e1a', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:30:00', '2018-03-17 23:30:00', '2019-03-18 05:30:00'),
('cfcde9aa920c011f1aec9eb51c575cc780055b5c78b63322b79cf0505d44df76453bef832548ce0e', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:06:34', '2018-04-01 07:06:34', '2019-04-01 13:06:34'),
('d021885dcda3ed9fbd076d84244c585771ade8aabe0304fcff286eaf84325f6efab6167b99dc6c03', 3, 1, 'MyApp', '[]', 1, '2018-04-12 09:54:23', '2018-04-12 09:54:23', '2019-04-12 15:54:23'),
('d03dda2ed2044db05aaa50353b5051907e7ad29a89ca337ca0a4521343730d9137b272c276fabe82', 3, 1, 'MyApp', '[]', 0, '2018-04-08 05:49:47', '2018-04-08 05:49:47', '2019-04-08 11:49:47'),
('d03e8cd6ed3fc130cfdc91e769c9d1bdf2686e7503f7c0417eb52c94e86be49e59f93d32499f60b3', 2, 1, 'MyApp', '[]', 0, '2018-03-19 02:17:43', '2018-03-19 02:17:43', '2019-03-19 08:17:43'),
('d15e3b21d4c30c3be19fe3cd79e6effd77fc1e98f4fc011250fbc20dd16cf16f14044cd4f7fd5a25', 3, 1, 'MyApp', '[]', 0, '2018-03-19 02:15:34', '2018-03-19 02:15:34', '2019-03-19 08:15:34'),
('d1a5582b4a79e4bdedff1d34ece69bfb1a102ca6efe1974dc3ce196a9aaae04503c2b9ecd51382bd', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:55:19', '2018-04-08 08:55:19', '2019-04-08 14:55:19'),
('d1c6dc865bbdb949fa47f14f0cefbb30cde7ab7c5a6e0149cf93bc36a7645d533637eeb4d0003a0f', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:34:25', '2018-03-18 00:34:25', '2019-03-18 06:34:25'),
('d2576ba9d9bc014d3ffd3a2813cb43169d5c3d4c61d70597ab8a37f7574a9255aa39c4092f03cbb6', 3, 1, 'MyApp', '[]', 0, '2018-03-22 00:08:03', '2018-03-22 00:08:03', '2019-03-22 06:08:03'),
('d2fd52ff9a4ac698683d06dc7cde28de2920952f055f2384331e2972dbe6142287f510dc1adc9c28', 3, 1, 'MyApp', '[]', 0, '2018-03-18 02:04:42', '2018-03-18 02:04:42', '2019-03-18 08:04:42'),
('d3a4d1cbeaee2ba72a797d38efb5f037e282edca14e6abb00758bd4d9009940b8b4ae8ba09f4c5f0', 3, 1, 'MyApp', '[]', 0, '2018-03-20 23:16:55', '2018-03-20 23:16:55', '2019-03-21 05:16:55'),
('d3a839f6f8f1d3007bd2b0653b34c0aa6dd8855732d803a0c447b42211c046ca682a8763b0c79c7f', 3, 1, 'MyApp', '[]', 0, '2018-04-05 11:11:23', '2018-04-05 11:11:23', '2019-04-05 17:11:23'),
('d40181ca7ee29aa63b7adaa52f0e783ca5ee2f74fbbd72028454224774982d5f01b389f1fb7c62fa', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:33:07', '2018-03-19 00:33:07', '2019-03-19 06:33:07'),
('d4d45353c5eb1e24a8b2ae0e7f97eb34381d55e5b76af65e3e21d21d297b706457a460e95c0406fd', 2, 1, 'MyApp', '[]', 0, '2018-04-11 09:30:44', '2018-04-11 09:30:44', '2019-04-11 15:30:44'),
('d531618b9a13e701c1d1e7c564b62d347b7452b4ebaf593b71d8e63d4c53b6797dcfc5be744e9a58', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:26:10', '2018-04-01 12:26:10', '2019-04-01 18:26:10'),
('d6448cbb71b12e61b08609b1325ca3efb2ebb6542951c71740585c60a0ed61da1eb83addef0e8307', 3, 1, 'MyApp', '[]', 1, '2018-04-11 04:50:06', '2018-04-11 04:50:06', '2019-04-11 10:50:06'),
('d67ac8528d6b2745c1c19e403d49f2e39f0fcfa5cb7fab8c2c1670223ccef7c1ed20049177adc8cd', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:54:30', '2018-03-19 00:54:30', '2019-03-19 06:54:30'),
('d7719e0fd9fc1cde0f28118edd452f2d9feaa4b8066e852d4abae57699841d746afd1e6cca78bf1e', 3, 1, 'MyApp', '[]', 0, '2018-04-10 08:43:05', '2018-04-10 08:43:05', '2019-04-10 14:43:05'),
('d83dce06cb08f74f10b5ce3ba0230550fec125672447e03607d9c35b11caffe0c18bd432cdb59e46', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:39:16', '2018-04-08 08:39:16', '2019-04-08 14:39:16'),
('d87d2b4586206399f1c3b53ff3aa7708b898d55b30dbeff93a29588ab44df74df6a3a08ef790070e', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:45:18', '2018-03-19 00:45:18', '2019-03-19 06:45:18'),
('d89ee9ccfb84a8b245f5a4d8f0551d17290d3f5c05e16a568e05035e8a2e73a760852a7a73db24bf', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:20:19', '2018-03-19 00:20:19', '2019-03-19 06:20:19'),
('d8ef424cd1608b41988750577e85a60477cc9f8fef6d5b64b712b4253a6c4fdfc0e93266bcfe1f62', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:41:37', '2018-03-18 00:41:37', '2019-03-18 06:41:37'),
('da9f535194c145ff24185a3abcb84426728302d1f956b23dd1555eb65e1d45a90bea50a0ce9519d5', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:55:49', '2018-03-18 00:55:49', '2019-03-18 06:55:49'),
('daa5ca51d38090d52386e8b03a6f26658fdd19131f11a909267bf461e265f9777a8e520e544c9073', 3, 1, 'MyApp', '[]', 0, '2018-04-04 06:44:21', '2018-04-04 06:44:21', '2019-04-04 12:44:21'),
('db1a713a5db98c9b04f3bddb7431e16a95789cb904efca34f4621f09f28dcb2713666db2abf0794c', 2, 1, 'MyApp', '[]', 0, '2018-04-11 06:31:54', '2018-04-11 06:31:54', '2019-04-11 12:31:54'),
('db7ede9e81d8892157322271c6d17b1eca0ccada96f2af6b4448407b38575e149df56c1d7c2d339c', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:21:37', '2018-03-19 00:21:37', '2019-03-19 06:21:37'),
('dc33db3995a5a3e7ba31e98ecac24b01e0804a645f67ebfac77cf4291605f5173c546c89b69cbd0c', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:46:12', '2018-04-01 07:46:12', '2019-04-01 13:46:12'),
('dd7361059e8044d5bbb5f0ae25dd861e20adec28576401bc3d168d2ad75676340c934a3743da770b', 3, 1, 'MyApp', '[]', 0, '2018-04-04 08:35:21', '2018-04-04 08:35:21', '2019-04-04 14:35:21'),
('dd966d790a50a14db16cb8263d8a85307886f920f8cb23dad5445fa9b7279ea76bf100960cc21619', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:00:33', '2018-04-05 10:00:33', '2019-04-05 16:00:33'),
('de99886b9d2cf53f5546d99b7666a03614ff74c153c22da455ba86b53c01adeea964384ca7d35a4b', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:34:41', '2018-03-19 01:34:41', '2019-03-19 07:34:41'),
('deac1c68c4adc092a46257d8cb3fb7c44f9c04605af17b5eb29886e96643b4aba764ba8f8c3797a6', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:29:17', '2018-03-22 02:29:17', '2019-03-22 08:29:17'),
('dec78c8d7d058163099ee8e400e44a3a86ca51750a58194c401b1f4bd45ae76938b212f77b2108fa', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:44:30', '2018-04-01 12:44:30', '2019-04-01 18:44:30'),
('df3b51a49413b075eea0be2c44d10546f8472396221b06ba06d425ef1b050bee4796b2f6a7b3f1ae', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:51:34', '2018-03-17 23:51:34', '2019-03-18 05:51:34'),
('df592fb4050087b653e0d9c0cb138295be6fcd91672187c0a7045ff63d0a8521ad559148d77b34c7', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:14:52', '2018-04-05 09:14:52', '2019-04-05 15:14:52'),
('e01ff9610698fb35e11ea4f968734292827ca789e2b97321a072a55ed1eac8da419b48f598fef2dd', 3, 1, 'MyApp', '[]', 0, '2018-03-22 02:20:52', '2018-03-22 02:20:52', '2019-03-22 08:20:52'),
('e0532784918a37533107d0f0f35fd6ef70d50e6f938bee629a141c853610072fa4e6536765e17f87', 3, 1, 'MyApp', '[]', 0, '2018-03-19 01:25:11', '2018-03-19 01:25:11', '2019-03-19 07:25:11'),
('e095f62429acada14b01d7056410530c27485982fdcf9fd245811daedbc2da5fbf2b1700af2a3e98', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:06:23', '2018-03-18 01:06:23', '2019-03-18 07:06:23'),
('e184c4ff6f0e0dc15314c98726063384ff726cde184035110cfbfad472f7103058bb48c672f92461', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:33:33', '2018-04-10 12:33:33', '2019-04-10 18:33:33'),
('e2d4344e62a5b6541163c29dc6916d33eebe95ef1c208ff6cc8b7758c533764bf2b6d3aa2456bc63', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:08:59', '2018-04-09 11:08:59', '2019-04-09 17:08:59'),
('e3214ad85d0b19499fa21d69de7d9a4c9d7a9f0d1c53805515ff815a31e0f031ffb9bedebfb75a1f', 3, 1, 'MyApp', '[]', 0, '2018-04-09 10:47:15', '2018-04-09 10:47:15', '2019-04-09 16:47:15'),
('e3357d9c96c7bc8a4b0a27a14e159b635a20ffca2930bef44f6e26e919070d4d36046ef09d501965', 3, 1, 'MyApp', '[]', 0, '2018-04-05 10:43:53', '2018-04-05 10:43:53', '2019-04-05 16:43:53'),
('e361e7c65c71dee83b9a812daa8aac3e9e4eba2e14ed8ebc361dd07fd0de07b98b1a6e4f6462fe14', 3, 1, 'MyApp', '[]', 0, '2018-04-05 11:19:25', '2018-04-05 11:19:25', '2019-04-05 17:19:25'),
('e389c79001d077e5e4a4186986c26f82eca83ed8e3567a879ada7880a703c59c3a36fdb809584212', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:23:34', '2018-03-18 01:23:34', '2019-03-18 07:23:34'),
('e3b16e74a963d67f4296f7b4915796edffd50205ee70938600800aab0c8fb85561dfb38b77431c82', 3, 1, 'MyApp', '[]', 0, '2018-03-18 02:04:27', '2018-03-18 02:04:27', '2019-03-18 08:04:27'),
('e407d0bc58180519ee0d08fec2054c1c39a1daa7387534aad0e3a01a00c8b097c2540fef6513b9ec', 3, 1, 'MyApp', '[]', 0, '2018-04-05 12:08:50', '2018-04-05 12:08:50', '2019-04-05 18:08:50'),
('e483fcfae185b3458a09fabc3d449c037354070172030dcfd77487651f0ed189f94d41cfd329854c', 3, 1, 'MyApp', '[]', 0, '2018-04-09 11:39:35', '2018-04-09 11:39:35', '2019-04-09 17:39:35'),
('e4a4dc15ffcec5f86a58951bdf4bfcb4c7632ae1302c0c9b95c2f5a2ecee2580f877fe1516e9e0cc', 3, 1, 'MyApp', '[]', 0, '2018-04-11 06:03:45', '2018-04-11 06:03:45', '2019-04-11 12:03:45'),
('e4c6b3ca7fa70e5729f72c28518cbeb75fbc8707ddede69646efb2a804418487a95f0a5fc0024f34', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:42:49', '2018-04-05 09:42:49', '2019-04-05 15:42:49'),
('e4e7332c9528096cc3ec1af7f23df648d43da83586ba5ee4894724f671680750ebd03ae49929c701', 3, 1, 'MyApp', '[]', 0, '2018-03-12 03:50:35', '2018-03-12 03:50:35', '2019-03-12 09:50:35'),
('e5213b5ce5d47ea8100da4e1cb2660eeb3f29c81eb1942e56a814c3fc74b534b76305a2dbdffb845', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:03:55', '2018-03-18 01:03:55', '2019-03-18 07:03:55'),
('e55076a8b034cd97123d5c0b7011b74b7fe963b2fba2f7f48095d134acc07467a7d02dace2ea077a', 3, 1, 'MyApp', '[]', 0, '2018-04-04 12:45:02', '2018-04-04 12:45:02', '2019-04-04 18:45:02'),
('e5920847ba380c8d17eff995034a9a3ba499d7e0c19aee130b871715ff2fd4f0d18b90eaaa195d09', 2, 1, 'MyApp', '[]', 0, '2018-03-19 00:55:53', '2018-03-19 00:55:53', '2019-03-19 06:55:53'),
('e5fb025bf9ad2d6fc8ed67cd7f66b9c22af5d8e18b8f1ed94acff15af44df88f73db3c6fbee91b49', 3, 1, 'MyApp', '[]', 0, '2018-03-18 03:14:28', '2018-03-18 03:14:28', '2019-03-18 09:14:28'),
('e679c76635b3a335876193c02c143bcd0f9fbabcc34560f97f6f095f6414b5f345553de79ff8be87', 3, 1, 'MyApp', '[]', 0, '2018-04-01 09:03:46', '2018-04-01 09:03:46', '2019-04-01 15:03:46'),
('e67b0f1b71be4693f294a242b94c0ecbde1cb415a475df0402dc8d989ffcec3e5f2cbd381cf6a6f8', 3, 1, 'MyApp', '[]', 0, '2018-03-21 23:54:36', '2018-03-21 23:54:36', '2019-03-22 05:54:36'),
('e6da2eb4c7ff9f3c5bfa5f42db88914c95bcb5cb64914aea98f2341b3f0b136044d2a08c080301b3', 3, 1, 'MyApp', '[]', 0, '2018-04-04 08:27:13', '2018-04-04 08:27:13', '2019-04-04 14:27:13'),
('e724a319e78fd82e0aae911bf107282e5ba84574206ff083e9761382004809c917d9dc1f57e8a6da', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:18:32', '2018-03-17 23:18:32', '2019-03-18 05:18:32'),
('e92a7afd8fa81af502a65d81efc677cfa171653710156d4d80715b370e31793c8fa86f08bbaccd5a', 3, 1, 'newToken', '[]', 0, '2018-04-10 11:54:37', '2018-04-10 11:54:37', '2019-04-10 17:54:37'),
('e993f4245e26e37452d8a3b7e4a2325b81df8c8f0f6c6f19974f86c9e590b50778c830bf42d66557', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:57:17', '2018-03-19 00:57:17', '2019-03-19 06:57:17'),
('e9ecb34718063f907b337ba34b189a4628fbbd8795cf1a43df32468a25082ac766c78c69cc324668', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:34:51', '2018-03-19 00:34:51', '2019-03-19 06:34:51'),
('eaaf36a1cea0dbe527591a4e9fdef3e3f84757fae031370da0c1dbc36b91b6e4fc79b13a608a09f7', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:40:46', '2018-04-04 09:40:46', '2019-04-04 15:40:46'),
('ec4a5e2ebe4c4e7968074b3e9d424e7e5a2008028e64e5d499f31e68dee6e966653e13fa4d9f89d8', 3, 1, 'MyApp', '[]', 0, '2018-04-08 06:31:47', '2018-04-08 06:31:47', '2019-04-08 12:31:47'),
('eca2e15aa304320fbae8f10d2e38a9fd4a5b333023b0167d456f165690e2074064c0e15635951943', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:29:05', '2018-03-18 00:29:05', '2019-03-18 06:29:05'),
('ed0c912e3a6656af27fec9b6f9b2ee2e18ecd3d85e5de87272620c1b93320b3cd2adfa79ef0ad428', 3, 1, 'MyApp', '[]', 0, '2018-04-01 08:41:10', '2018-04-01 08:41:10', '2019-04-01 14:41:10'),
('ed358d45d70a690d00f8b60322a5d249b9882d6649f2b47f14826a30d5bd895738ec654d26f00c9d', 3, 1, 'newToken', '[]', 0, '2018-04-10 12:31:12', '2018-04-10 12:31:12', '2019-04-10 18:31:12'),
('ee7c34874ad5f1ab5c6cfc1e2c09583ac2f5d58dc01ebb1bbf295e8cd85cbc17821485de3942d8dc', 3, 1, 'MyApp', '[]', 0, '2018-04-05 09:53:03', '2018-04-05 09:53:03', '2019-04-05 15:53:03'),
('f08d8af8ab15f658823bee7ea85fd9b3c059ed16a7b44888a12acb7fb8f0cede8e0acb76e70f73ef', 3, 1, 'MyApp', '[]', 0, '2018-03-18 05:21:34', '2018-03-18 05:21:34', '2019-03-18 11:21:34'),
('f0a0d6cc275a79e1db1f56bc0926c4cc13ea166838b0c3690d3aae32ba9bd476fdda5e514396db1e', 3, 1, 'MyApp', '[]', 0, '2018-04-10 10:25:49', '2018-04-10 10:25:49', '2019-04-10 16:25:49'),
('f0c9bba3b75fbd694577818046708e977ba8144febe08f89b37846a2d120fac7d214121d16c72b37', 3, 1, 'MyApp', '[]', 1, '2018-04-10 12:41:16', '2018-04-10 12:41:16', '2019-04-10 18:41:16'),
('f1ab777760965989ed88f424c578f658ef798f16b9d8feb529e18c6c674aad38ec84006b07a86464', 3, 1, 'MyApp', '[]', 0, '2018-03-21 23:50:08', '2018-03-21 23:50:08', '2019-03-22 05:50:08'),
('f24082e186849480e7174a52f428eff30664a0c41fedf4f730dbaffb3d3c29177cc46608be2473dc', 3, 1, 'MyApp', '[]', 1, '2018-04-12 09:42:52', '2018-04-12 09:42:52', '2019-04-12 15:42:52'),
('f2676e364d30e3eddac220fa9a3e4a3d91eca519b0395fe6994db36984e61da035f72e18736200cf', 3, 1, 'MyApp', '[]', 0, '2018-04-10 11:24:33', '2018-04-10 11:24:33', '2019-04-10 17:24:33'),
('f2c8eb0d203b35f1ccbcddba44b45528e9732b3e7f464bcbaaa826f85e31fa048937d6d6b5c91cc0', 89, 1, 'MyApp', '[]', 1, '2018-03-23 13:45:25', '2018-03-23 13:45:25', '2019-03-23 19:45:25'),
('f38defdd17c5fc39fafda0b7da5bb820b505fb4f4119204149b815dbc01ac28d0ff1213e96846621', 5, 1, 'MyApp', '[]', 0, '2018-04-11 05:53:02', '2018-04-11 05:53:02', '2019-04-11 11:53:02'),
('f39c7ab3a5511a0a13fa8fdc6a8b999a2edeb4eba7c3146b91e48bcdead317bb01b3792586a000f1', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:43:50', '2018-03-18 00:43:50', '2019-03-18 06:43:50'),
('f3ee32bf6572e3006cd9478814dfa4616865278168fece6887b4b096544c89d0dd1dc2ff7182230c', 3, 1, 'MyApp', '[]', 0, '2018-04-08 08:09:20', '2018-04-08 08:09:20', '2019-04-08 14:09:20'),
('f50870ee2d5774b3dfdcd59b218f19e6e2130404c292a54f3ebe9745145dd01551697d638e146591', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:37:52', '2018-03-18 00:37:52', '2019-03-18 06:37:52'),
('f64649b47a43be0f8ff16eeb4cbead8c53e6794d27b895c945f469cf51644be5f56f7804494ad62b', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:41:25', '2018-04-04 09:41:25', '2019-04-04 15:41:25'),
('f698c70b563972654e453911ba5ec079587bc9f0bfd8d8e602af118d5e40c29c305479f6e7bfcf28', 3, 1, 'MyApp', '[]', 0, '2018-03-18 01:08:26', '2018-03-18 01:08:26', '2019-03-18 07:08:26'),
('f6ba61d86b45e5cec2f6c51d37ab9904ed289e1fc2250ea44f6e7353a0c1613672df2cc492fc82ff', 3, 1, 'MyApp', '[]', 0, '2018-03-19 00:43:14', '2018-03-19 00:43:14', '2019-03-19 06:43:14'),
('f8039c37cf769dd82b2956227d0ae3372f89bd1323241c5ce16521e7bfb53783a63e07c3b93bf7ea', 3, 1, 'MyApp', '[]', 0, '2018-04-01 11:21:42', '2018-04-01 11:21:42', '2019-04-01 17:21:42'),
('faadc4fa614fe2f646d94fc3cb2caff83285f57dd171433851e859876be87f5810e26a6c89a35700', 3, 1, 'MyApp', '[]', 0, '2018-04-01 12:24:38', '2018-04-01 12:24:38', '2019-04-01 18:24:38'),
('faaeb9c4dc1a5bfd717b5b3821b691cc2865ba8147ddcb5fe9a4f93f9216e171c42c503374dad65f', 3, 1, 'MyApp', '[]', 0, '2018-04-11 10:54:41', '2018-04-11 10:54:41', '2019-04-11 16:54:41'),
('fb17f326c02ff8f8e175e8af108d036b30981857e56bbae171def0ba52c90eb41869bfccc4b4be6b', 3, 1, 'MyApp', '[]', 0, '2018-03-18 00:19:16', '2018-03-18 00:19:16', '2019-03-18 06:19:16'),
('fc6baef2b93b308ff9d268feff5a79fc6debe499694273c88241fa1e40e18ac78b808985abe62131', 3, 1, 'MyApp', '[]', 0, '2018-03-17 23:18:57', '2018-03-17 23:18:57', '2019-03-18 05:18:57'),
('fc90fedab0c01e654957d99d1e7e695dd4014d918aa31f822d4fdb3d36dc5aa11e2cbbeb67516472', 3, 1, 'MyApp', '[]', 0, '2018-04-09 10:57:33', '2018-04-09 10:57:33', '2019-04-09 16:57:33'),
('fd19b0a8c3252cb624d56ed864a71466d456e3f1922be97caa5e5f29cb3bce234022a74f93a91ddb', 3, 1, 'MyApp', '[]', 0, '2018-04-09 10:54:31', '2018-04-09 10:54:31', '2019-04-09 16:54:31'),
('fdbda672a00a741212c70480c637ac9b0bd9e5975ab93fec786a25fc7eecf226609c117fbf2d7455', 3, 1, 'MyApp', '[]', 0, '2018-04-04 09:48:45', '2018-04-04 09:48:45', '2019-04-04 15:48:45'),
('fdd81da78fc1e43fdee7a085a8dd19d843bc558e4b49ddc57ce7b356f0447be9b70e5e4ad3916c8e', 3, 1, 'MyApp', '[]', 1, '2018-04-11 05:16:14', '2018-04-11 05:16:14', '2019-04-11 11:16:14'),
('fefc20d677baa3e3c17bc970a81bcc37db7be0988e79dce6309e4cc2cfcfaba226ce4d6998d7e465', 3, 1, 'MyApp', '[]', 0, '2018-04-01 07:46:44', '2018-04-01 07:46:44', '2019-04-01 13:46:44'),
('ff20639a336acbbeb966e8093fbf46fde26e58fbad5882718caf182fe58fd5771b59b486f91c5768', 3, 1, 'MyApp', '[]', 0, '2018-03-23 12:43:53', '2018-03-23 12:43:53', '2019-03-23 18:43:53'),
('ffd934e13ffb2c3e2e3860a144e6fc3554e5e2aefc408486e836b7ef7f88c0b4d94de06b9d63a77a', 3, 1, 'MyApp', '[]', 0, '2018-04-10 12:40:00', '2018-04-10 12:40:00', '2019-04-10 18:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Acid Survival Foundation Personal Access Client', 'jfUIuNn3wDGSlcAyclTZjMLA7y4ywBfWQLaJENp6', 'http://localhost', 1, 0, 0, '2018-03-12 03:50:28', '2018-03-12 03:50:28'),
(2, NULL, 'Acid Survival Foundation Password Grant Client', 'VfOUkF0al8vKsCwpbbERPVRBDzzUwbfugBTgiEkk', 'http://localhost', 0, 1, 0, '2018-03-12 03:50:29', '2018-03-12 03:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-03-12 03:50:29', '2018-03-12 03:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CaseIncedent_index', NULL, NULL, '2018-04-12 06:38:46', '2018-04-12 06:38:46'),
(2, 'CaseIncedent_create', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(3, 'CaseIncedent_store', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(4, 'CaseIncedent_show', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(5, 'CaseIncedent_edit', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(6, 'CaseIncedent_update', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(7, 'CaseIncedent_destroy', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(8, 'CaseIncedent_CaseInfoUpdateHd', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(9, 'CaseIncedent_CaseInfoUpdateFF', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(10, 'CaseIncedent_CaseInfoUpdateAdmin', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(11, 'CaseIncedent_CaseChangeStatus', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(12, 'CaseIncedent_CaseChangeStatusAdmin', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(13, 'Users_index', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(14, 'Users_create', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(15, 'Users_store', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(16, 'Users_edit', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(17, 'Users_update', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(18, 'Users_show', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(19, 'Users_destroy', NULL, NULL, '2018-04-12 06:38:47', '2018-04-12 06:38:47'),
(20, 'Settings_index', NULL, NULL, '2018-04-12 06:38:48', '2018-04-12 06:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 5),
(3, 1),
(3, 2),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 1),
(7, 2),
(8, 1),
(8, 4),
(9, 1),
(9, 3),
(10, 1),
(10, 2),
(11, 1),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', NULL, '2018-04-10 09:38:50', '2018-04-10 09:38:50'),
(2, 'admin', 'Admin', NULL, '2018-04-10 09:38:50', '2018-04-10 09:38:50'),
(3, 'fact_finding', 'Fact Finding', NULL, '2018-04-10 09:38:50', '2018-04-10 09:38:50'),
(4, 'help_desk', 'Help Desk', NULL, '2018-04-10 09:38:50', '2018-04-10 09:38:50'),
(5, 'field_agent', 'Field Agent', NULL, '2018-04-10 09:38:50', '2018-04-10 09:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(5, 3, 'App\\User'),
(4, 4, 'App\\User'),
(3, 5, 'App\\User'),
(5, 89, 'App\\User'),
(5, 90, 'App\\User'),
(5, 91, 'App\\User'),
(5, 93, 'App\\User'),
(5, 94, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `active`, `remember_token`, `created_at`, `updated_at`, `fcm_token`, `device`) VALUES
(1, 'Super Admin', '01674752564', 'r.chowdhury@brainstation-23.com', '$2y$10$dlR8q3QIkN1Ld7wCLcWaFuSvxH/G3jIK.PZ930f1ix3A3CbwQqTa2', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Raihan Chow', '01712345678', 'raihan@info.com', '$2y$10$09u6zj9c6VMTARO5IOCXTuZjoem506EzU04kuWUch4SrgngDAfUL.', 1, 'cRkuUAyLhHmcwRrlh67hjwUL152hcch9JRO3hjBNd7o6R9VsCl66NtwgMmvu', NULL, '2018-04-15 05:09:14', 'cR7FL3rfO1I:APA91bEHIO1SVoNsbl5SCRbp4UZfOUNdPUngSuzNsYlIWBYEGR6KJOSQHyK4D0v6EiK9_NvSWi5pr-PWZji_Z6fepGv2rTSN2QoXYdjj6fSGPoJ9-V3pCYqkkYBYd7qOBEKiYZFmBaE4', 'android'),
(3, 'Tarun Aronno', '01812345678', NULL, '$2y$10$IYcyTXcsNWci8R2coX7OKuQ83f0Jjs7yTnPY1tnrrf2o2L7aV4xZC', 1, 'KdMnv0pKtTJ4ShcmQkEzEhC4ZeH21yeTrgIWsv8S00iyjAeJqSHowwFbb6Nd', NULL, '2018-04-15 05:08:56', NULL, NULL),
(4, 'Shishir', '01912345678', NULL, '$2y$10$BifNfpqNOLxg.QzfNawFw.uO869Udxio.JAQkMee4YxyRiUbmuSli', 1, '7dL8fOGNhrkG8XsN7G6DTTp2F7LAbSH4RbMwjDlY7sjHaZ1W417paNWvZKay', NULL, '2018-04-12 10:20:08', 'cQmVKV1J34E:APA91bHIsVunUggt7-YrS5nT22lp6cIsQl6PIaFpD0N2lyiG98Y5z5nYaIdyR4tcrcLUT0aTrNM_-hFv10QlMnnpaLZbVKQOWiD5uy7o2dqaawYpcRTqblwYkxTHchvVHPYjovF-CmDs', 'android'),
(5, 'Nizam Chow 3', '01512345678', NULL, '$2y$10$sGsJETWEPHIzi1lQyWGJi.W6QcV7funz4.Hyx.tkGpdg74Zse1Cm.', 1, 'Ofbi9BQyutjEMAguxKP6fxxtXeihrDeBdNLvzaQtx9SOjCSuEoVEqSBkhVSH', NULL, '2018-04-11 07:12:06', NULL, NULL),
(89, 'Test', '01212345678', 'test@info.com', '$2y$10$vf9xvmTkxalfVxiof62Ij.OVGqnnEoq6GD8wPg2COmyfDxj7U2H1.', 1, 'LiBVPqb9CMHhQSLS0apIvxhF5CBkf4vCT8Y75DZ4jEkCTwaW0orAA4AOnf9S', NULL, '2018-04-09 12:05:01', 'ddsfsdlkfjsdfheiworoiewhjrkjlenfkjdfd', 'android'),
(90, 'new user', '01111111111', 'new@info.com', '$2y$10$oZs.AhBkpzN1bYPtntUBBu53aZkyG2KjXu7YpWa0/xWT6KFcgmP4q', 1, NULL, '2018-04-11 09:49:40', '2018-04-11 09:49:40', NULL, NULL),
(91, 'New test', '01234567890', 'nnshishir@info.com', '$2y$10$G9IwUrSq5LtP8MB.KmhTRerD4JU54ZO78mPEReSl/pjgx3jeBCdte', 1, NULL, '2018-04-11 09:53:10', '2018-04-11 09:53:10', NULL, NULL),
(93, 'Selim Ahmed', '01868686868', '11shishir@info.com', '$2y$10$SeMlkKA3nhQS4t7.J1ZsMOWVeywP.FknvpX4FvwTNcQZE2UvfXHYS', 1, 'ALtXUhZuhWTxrHOmom6O9hrIlBhiIIQJ8Xh1pOgFjFnToBLosSWL9f6JDD6b', '2018-04-11 10:11:24', '2018-04-12 05:10:44', NULL, NULL),
(94, 'selim rana', '01711111111', 'selim@info.com', '$2y$10$/8tMNxFzH3zSuYaRbdSxqek0sXYZpbpoMyb/TB2UBAUi6DC8HdGj2', 0, 'qFM3piptsOVxmtLxse2eyxz98rdumgmKIqYmmJMDaRS1ukvmtnNU05VJjWQz', '2018-04-12 11:14:37', '2018-04-12 11:16:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_metas`
--

INSERT INTO `user_metas` (`id`, `user_id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(3, 3, 'designation', 'Field Agent Senior 2', NULL, '2018-03-18 00:45:33'),
(4, 3, 'profile_pic', 'a:4:{s:8:\"filename\";s:31:\"1523530245_2018-04-09044734.jpg\";s:3:\"url\";s:40:\"/2018/04/1523530245_2018-04-09044734.jpg\";s:8:\"url_full\";s:40:\"/2018/04/1523530245_2018-04-09044734.jpg\";s:9:\"url_thumb\";s:46:\"/2018/04/1523530245_2018-04-09044734_thumb.jpg\";}', NULL, '2018-04-12 10:50:45'),
(9, 89, 'designation', 'Field Agent', NULL, NULL),
(10, 89, 'profile_pic', 'a:4:{s:8:\"filename\";s:26:\"1522646938_profilepic1.jpg\";s:3:\"url\";s:35:\"/2018/04/1522646938_profilepic1.jpg\";s:8:\"url_full\";s:35:\"/2018/04/1522646938_profilepic1.jpg\";s:9:\"url_thumb\";s:41:\"/2018/04/1522646938_profilepic1_thumb.jpg\";}', NULL, '2018-04-02 05:28:59'),
(11, 2, 'designation', 'Field Agent Senior', '2018-03-20 04:32:44', '2018-03-22 03:55:34'),
(12, 2, 'profile_pic', 'a:4:{s:8:\"filename\";s:27:\"1523271391_postfeatimg6.jpg\";s:3:\"url\";s:36:\"/2018/04/1523271391_postfeatimg6.jpg\";s:8:\"url_full\";s:36:\"/2018/04/1523271391_postfeatimg6.jpg\";s:9:\"url_thumb\";s:42:\"/2018/04/1523271391_postfeatimg6_thumb.jpg\";}', '2018-03-20 04:32:44', '2018-04-09 10:56:32'),
(19, 2, 'user_location', 'norshindi-01', '2018-03-21 07:36:50', '2018-03-21 23:22:13'),
(26, 3, 'user_location', 'norshindi-01', '2018-03-21 23:43:28', '2018-03-21 23:43:28'),
(27, 89, 'user_location', 'norshindi-01', '2018-03-23 13:42:57', '2018-03-23 13:42:57'),
(28, 90, 'designation', 'Field Agent', NULL, NULL),
(29, 90, 'profile_pic', NULL, NULL, NULL),
(30, 90, 'user_location', 'norshindi-03', NULL, NULL),
(31, 4, 'designation', 'Senior Field Agent 2w', '2018-04-09 06:25:43', '2018-04-09 06:25:43'),
(32, 4, 'user_location', 'norshindi-01', '2018-04-09 06:25:43', '2018-04-09 06:25:43'),
(33, 5, 'designation', 'Field Agent Senior 2', NULL, '2018-04-11 07:19:04'),
(34, 5, 'profile_pic', 'a:4:{s:8:\"filename\";s:29:\"1523431144_custommarker-1.png\";s:3:\"url\";s:38:\"/2018/04/1523431144_custommarker-1.png\";s:8:\"url_full\";s:38:\"/2018/04/1523431144_custommarker-1.png\";s:9:\"url_thumb\";s:44:\"/2018/04/1523431144_custommarker-1_thumb.png\";}', NULL, '2018-04-11 07:19:04'),
(35, 5, 'user_location', 'norshindi-02', NULL, '2018-04-09 07:19:48'),
(36, 4, 'profile_pic', 'a:4:{s:8:\"filename\";s:57:\"1523528536_image-3e01573a-985b-404c-b065-50607e923da5.jpg\";s:3:\"url\";s:66:\"/2018/04/1523528536_image-3e01573a-985b-404c-b065-50607e923da5.jpg\";s:8:\"url_full\";s:66:\"/2018/04/1523528536_image-3e01573a-985b-404c-b065-50607e923da5.jpg\";s:9:\"url_thumb\";s:72:\"/2018/04/1523528536_image-3e01573a-985b-404c-b065-50607e923da5_thumb.jpg\";}', '2018-04-09 10:59:27', '2018-04-12 10:22:17'),
(37, 90, 'designation', 'Field Agent', NULL, NULL),
(38, 90, 'profile_pic', 'a:4:{s:8:\"filename\";s:27:\"1523440180_postfeatimg9.jpg\";s:3:\"url\";s:36:\"/2018/04/1523440180_postfeatimg9.jpg\";s:8:\"url_full\";s:36:\"/2018/04/1523440180_postfeatimg9.jpg\";s:9:\"url_thumb\";s:42:\"/2018/04/1523440180_postfeatimg9_thumb.jpg\";}', NULL, NULL),
(39, 90, 'user_location', 'norshindi-04', NULL, NULL),
(40, 91, 'designation', 'dddd', NULL, NULL),
(41, 91, 'profile_pic', 'a:4:{s:8:\"filename\";s:28:\"1523440390_postfeatimg20.jpg\";s:3:\"url\";s:37:\"/2018/04/1523440390_postfeatimg20.jpg\";s:8:\"url_full\";s:37:\"/2018/04/1523440390_postfeatimg20.jpg\";s:9:\"url_thumb\";s:43:\"/2018/04/1523440390_postfeatimg20_thumb.jpg\";}', NULL, NULL),
(42, 91, 'user_location', 'norshindi-03', NULL, NULL),
(43, 93, 'designation', 'Field Agent', NULL, NULL),
(44, 93, 'profile_pic', NULL, NULL, NULL),
(45, 93, 'user_location', 'norshindi-04', NULL, '2018-04-11 12:20:57'),
(46, 94, 'designation', 'UV', NULL, NULL),
(47, 94, 'profile_pic', NULL, NULL, NULL),
(48, 94, 'user_location', 'norshindi-02', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asf_options`
--
ALTER TABLE `asf_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `case_comments`
--
ALTER TABLE `case_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_comments_case_id_foreign` (`case_id`);

--
-- Indexes for table `case_incedents`
--
ALTER TABLE `case_incedents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_incedents_user_id_foreign` (`user_id`);

--
-- Indexes for table `case_metas`
--
ALTER TABLE `case_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_metas_case_id_foreign` (`case_id`),
  ADD KEY `case_metas_user_id_foreign` (`user_id`);

--
-- Indexes for table `case_victims`
--
ALTER TABLE `case_victims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_victims_case_id_foreign` (`case_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_phone_index` (`phone`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_metas_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asf_options`
--
ALTER TABLE `asf_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `case_comments`
--
ALTER TABLE `case_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `case_incedents`
--
ALTER TABLE `case_incedents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `case_metas`
--
ALTER TABLE `case_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `case_victims`
--
ALTER TABLE `case_victims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_comments`
--
ALTER TABLE `case_comments`
  ADD CONSTRAINT `case_comments_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `case_incedents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `case_incedents`
--
ALTER TABLE `case_incedents`
  ADD CONSTRAINT `case_incedents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `case_metas`
--
ALTER TABLE `case_metas`
  ADD CONSTRAINT `case_metas_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `case_incedents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `case_metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `case_victims`
--
ALTER TABLE `case_victims`
  ADD CONSTRAINT `case_victims_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `case_incedents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD CONSTRAINT `user_metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
