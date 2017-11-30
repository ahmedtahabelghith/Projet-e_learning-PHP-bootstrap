-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Mars 2017 à 11:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `testdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dernierConsultation` date NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `login`, `mdp`, `nom`, `prenom`, `dernierConsultation`) VALUES
(2, 'admin', 'admin', 'SÃ©mi', 'ben slimen', '2017-02-28');

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE IF NOT EXISTS `authentification` (
  `Id` int(4) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `cin` varchar(11) NOT NULL,
  `matricule` varchar(4) NOT NULL,
  `classe` varchar(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `authentification`
--

INSERT INTO `authentification` (`Id`, `Nom`, `Email`, `prenom`, `cin`, `matricule`, `classe`) VALUES
(9, 'semi', 'semi.gth@gmail.com', 'salhi', '1', '1', 'RT4'),
(10, 'hawes', 'achrefhawes@gmail.com', 'achref', '02552145', '2152', 'gl4');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `nom` varchar(20) NOT NULL,
  `nbrQuestionQCM` int(11) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`nom`, `nbrQuestionQCM`) VALUES
('Collections', 2),
('Entrees Sorties', 8),
('Exceptions', 1),
('Genericite', 1),
('Interface avec le sy', 3),
('Interfaces graphique', 5),
('les bases ', 6),
('Securite', 2),
('Sockets threads desi', 3),
('Threads', 3);

-- --------------------------------------------------------

--
-- Structure de la table `examencerificat`
--

CREATE TABLE IF NOT EXISTS `examencerificat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `cin` varchar(10) DEFAULT NULL,
  `matricule` varchar(4) DEFAULT NULL,
  `noteEnPourcentage` double DEFAULT NULL,
  `dateExamen` datetime DEFAULT NULL,
  `mdpResponsable` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `examencerificat`
--

INSERT INTO `examencerificat` (`id`, `login`, `mdp`, `cin`, `matricule`, `noteEnPourcentage`, `dateExamen`, `mdpResponsable`) VALUES
(1, '1', '1', '02336525', '2514', 0, '2017-03-15 13:40:08', 'admin'),
(2, '2', '2', '03336254', '2515', 0.6, '2017-03-06 17:40:46', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `questionexamenfinal`
--

CREATE TABLE IF NOT EXISTS `questionexamenfinal` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Questions` varchar(500) NOT NULL,
  `Note` int(11) NOT NULL,
  `nomcat` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `questionexamenfinal`
--

INSERT INTO `questionexamenfinal` (`Id`, `Questions`, `Note`, `nomcat`) VALUES
(3, 'What will be the result of attempting to compile and run the following class?\r\npublic class IfTest {\r\npublic static void main(String[] args) {\r\nif (true)\r\nif (false)\r\nSystem.out.println("a");\r\nelse\r\nSystem.out.println("b");\r\n}\r\n}\r\nSelect the one correct answer. ', 2, 'Exceptions'),
(4, 'Which statements are true?\r\nSelect the three correct answers.', 1, 'les bases '),
(5, 'What, if anything, is wrong with the following code?\r\nvoid test(int x) {\r\nswitch (x) {\r\ncase 1:\r\ncase 2:\r\ncase 0:\r\ndefault:\r\ncase 4: \r\n}\r\n}\r\nSelect the one correct answer. ', 1, 'les bases '),
(6, 'Which of these combinations of switch expression types and case label value types\r\nare legal within a switch statement?\r\nSelect the two correct answers.', 1, 'Interfaces graphique'),
(7, 'What will be the result of attempting to compile and run the following program?\r\npublic class Switching {\r\npublic static void main(String[] args) {\r\nfinal int iLoc = 3;\r\nswitch (6) {\r\ncase 1:\r\ncase iLoc:\r\ncase 2 * iLoc:\r\nSystem.out.println("I am not OK.");\r\ndefault:\r\nSystem.out.println("You are OK.");\r\ncase 4:\r\nSystem.out.println("It''s OK.");\r\n}\r\n}\r\n}\r\nSelect the one correct answer. ', 1, 'Exceptions'),
(8, 'What will be the result of attempting to compile and run the following program?\r\npublic class MoreSwitching {\r\npublic static void main(String[] args) {\r\nfinal int iLoc = 3;\r\nInteger iRef = 5;\r\nswitch (iRef) {\r\ndefault:\r\nSystem.out.println("You are OK.");\r\ncase 1:\r\ncase iLoc:\r\ncase 2 * iLoc:\r\nSystem.out.println("I am not OK.");\r\nbreak;\r\ncase 4:\r\nSystem.out.println("It''s OK.");\r\n}\r\n}\r\n}\r\nSelect the one correct answer. ', 1, 'Exceptions'),
(9, 'What will be the result of attempting to compile and run the following program?\r\npublic class KeepOnSwitching {\r\npublic static void main(String[] args) {\r\nfinal int iLoc = 3; \r\nfinal Integer iFour = 4;\r\nInteger iRef = 4;\r\nswitch (iRef) {\r\ncase 1:\r\ncase iLoc:\r\ncase 2 * iLoc:\r\nSystem.out.println("I am not OK.");\r\ndefault:\r\nSystem.out.println("You are OK.");\r\ncase iFour:\r\nSystem.out.println("ItÃ¢â‚¬â„¢s OK.");\r\n}\r\n}\r\n}\r\nSelect the one correct answer. ', 1, 'les bases '),
(10, 'What will be the result of attempting to compile and run the following code?\r\npublic enum Scale5 {\r\nGOOD, BETTER, BEST;\r\npublic char getGrade() {\r\nchar grade = ''\\u0000'';\r\nswitch(this){\r\ncase GOOD:\r\ngrade = ''C'';\r\nbreak;\r\ncase BETTER:\r\ngrade = ''B'';\r\nbreak;\r\ncase BEST:\r\ngrade = ''A'';\r\nbreak;\r\n}\r\nreturn grade;\r\n}\r\npublic static void main (String[] args) {\r\nSystem.out.println(GOOD.getGrade());\r\n}\r\n} ', 1, 'les bases '),
(11, 'Given:\r\n11. public class Key {\r\n12. private long id1;\r\n13. private long 1d2;\r\n14.\r\n15. // class Key methods\r\n16. }\r\nA programmer is developing a class Key, that will be used as a key in a standard\r\njava.util.HashMap. Which two methods should be\r\noverridden to assure that Key works correctly as a key? (Choose two.)', 1, 'Securite'),
(12, 'Which two statements are true about the hashCode method? (Choose two.)', 1, 'Genericite'),
(13, 'Given:\r\n1. import java.util.*;\r\n2\r\n3. public class LetterASort {\r\n4. public static void main(String[] args) {\r\n5. ArrayList<String> strings = new ArrayList<String>();\r\n6. strings.add(Ã¢â‚¬â„¢aAaAÃ¢â‚¬Â);\r\n7. strings.add(Ã¢â‚¬ÂAaAÃ¢â‚¬Â);\r\n8. strings.add(Ã¢â‚¬â„¢aAaÃ¢â‚¬Â);\r\n9. strings.add(Ã¢â‚¬ÂAAaaÃ¢â‚¬Â);\r\n10. Collections.sort(strings);\r\n11. for (String s: strings) { System.out.print(s + Ã¢â‚¬Å“ Ã¢â‚¬Å“); } \r\n12. }\r\n13. }\r\nWhat is the result? ', 1, 'Collections');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `Id` int(4) NOT NULL AUTO_INCREMENT,
  `Questions` varchar(500) NOT NULL,
  `Note` int(1) NOT NULL,
  `nomcat` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `nomcat` (`nomcat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`Id`, `Questions`, `Note`, `nomcat`) VALUES
(90, 'What will be the result of attempting to compile and run the following class?\npublic class IfTest {\npublic static void main(String[] args) {\nif (true)\nif (false)\nSystem.out.println("a");\nelse\nSystem.out.println("b");\n}\n}\nSelect the one correct answer. ', 2, 'Exceptions'),
(91, 'Which statements are true?\nSelect the three correct answers.\n\n\n.', 2, 'les bases '),
(92, 'What, if anything, is wrong with the following code?\nvoid test(int x) {\nswitch (x) {\ncase 1:\ncase 2:\ncase 0:\ndefault:\ncase 4: \n}\n}\nSelect the one correct answer. ', 2, 'les bases '),
(93, 'Which of these combinations of switch expression types and case label value types\nare legal within a switch statement?\nSelect the two correct answers.', 2, 'Interfaces graphique'),
(94, 'What will be the result of attempting to compile and run the following program?\npublic class Switching {\npublic static void main(String[] args) {\nfinal int iLoc = 3;\nswitch (6) {\ncase 1:\ncase iLoc:\ncase 2 * iLoc:\nSystem.out.println("I am not OK.");\ndefault:\nSystem.out.println("You are OK.");\ncase 4:\nSystem.out.println("It''s OK.");\n}\n}\n}\nSelect the one correct answer. ', 2, 'Exceptions'),
(95, 'What will be the result of attempting to compile and run the following program?\npublic class MoreSwitching {\npublic static void main(String[] args) {\nfinal int iLoc = 3;\nInteger iRef = 5;\nswitch (iRef) {\ndefault:\nSystem.out.println("You are OK.");\ncase 1:\ncase iLoc:\ncase 2 * iLoc:\nSystem.out.println("I am not OK.");\nbreak;\ncase 4:\nSystem.out.println("It''s OK.");\n}\n}\n}\nSelect the one correct answer. ', 2, 'Exceptions'),
(96, 'What will be the result of attempting to compile and run the following program?\npublic class KeepOnSwitching {\npublic static void main(String[] args) {\nfinal int iLoc = 3; \nfinal Integer iFour = 4;\nInteger iRef = 4;\nswitch (iRef) {\ncase 1:\ncase iLoc:\ncase 2 * iLoc:\nSystem.out.println("I am not OK.");\ndefault:\nSystem.out.println("You are OK.");\ncase iFour:\nSystem.out.println("Itâ€™s OK.");\n}\n}\n}\nSelect the one correct answer. ', 2, 'les bases '),
(97, 'What will be the result of attempting to compile and run the following code?\npublic enum Scale5 {\nGOOD, BETTER, BEST;\npublic char getGrade() {\nchar grade = ''\\u0000'';\nswitch(this){\ncase GOOD:\ngrade = ''C'';\nbreak;\ncase BETTER:\ngrade = ''B'';\nbreak;\ncase BEST:\ngrade = ''A'';\nbreak;\n}\nreturn grade;\n}\npublic static void main (String[] args) {\nSystem.out.println(GOOD.getGrade());\n}\n} ', 2, 'les bases '),
(98, 'What will be the output when running the following program?\r\npublic class MyClass {\r\npublic static void main(String[] args) {\r\nint i=0;\r\nint j;\r\nfor (j=0; j<10; ++j) { i++; }\r\nSystem.out.println(i + " " + j);\r\n}\r\n}\r\nSelect the two correct answers', 2, 'Entrees Sorties'),
(99, 'What will be the result of attempting to compile and run the following code?\r\nclass MyClass {\r\npublic static void main(String[] args) {\r\nfor (int i = 0; i<10; i++) {\r\nswitch(i) {\r\ncase 0:\r\nSystem.out.println(i);\r\n}\r\nif (i) {\r\nSystem.out.println(i);\r\n}\r\n}\r\n}\r\n}\r\nSelect the one correct answer. ', 2, 'Exceptions'),
(100, 'Given the following code, which statement is true?\r\nclass MyClass {\r\npublic static void main(String[] args) {\r\nint k=0;\r\nint l=0;\r\nfor (int i=0; i <= 3; i++) {\r\nk++;\r\nif (i == 2) break;\r\nl++;\r\n}\r\nSystem.out.println(k + ", " + l); \r\n}\r\n}\r\nSelect the one correct answer. ', 2, 'Genericite'),
(101, 'Which declaration will result in the program compiling and printing 90, when run?\r\npublic class RQ400_10 {\r\npublic static void main(String[] args) {\r\n// (1) INSERT DECLARATION HERE\r\nint sum = 0;\r\nfor (int i : nums)\r\nsum += i;\r\nSystem.out.println(sum);\r\n}\r\n}\r\nSelect the two correct answers. ', 2, 'les bases '),
(102, 'Which digits, and in what order, will be printed when the following program is run?\r\npublic class MyClass {\r\npublic static void main(String[] args) {\r\nint k=0;\r\ntry {\r\nint i = 5/k;\r\n} catch (ArithmeticException e) {\r\nSystem.out.println("1");\r\n} catch (RuntimeException e) {\r\nSystem.out.println("2");\r\nreturn;\r\n} catch (Exception e) {\r\nSystem.out.println("3");\r\n} finally {\r\nSystem.out.println("4");\r\n}\r\nSystem.out.println("5"); \r\n}\r\n}\r\nSelect the one correct answer. ', 2, 'Exceptions'),
(103, 'Given the following program, which statements are true?\r\npublic class Exceptions {\r\npublic static void main(String[] args) {\r\ntry {\r\nif (args.length == 0) return;\r\nSystem.out.println(args[0]);\r\n} finally {\r\nSystem.out.println("The end");\r\n}\r\n}\r\n}\r\nSelect the two correct answers. ', 2, 'Exceptions'),
(104, 'Which digits, and in what order, will be printed when the following program is run?\r\npublic class MyClass {\r\npublic static void main(String[] args) throws InterruptedException {\r\ntry {\r\nf();\r\nSystem.out.println("1");\r\n} finally {\r\nSystem.out.println("2");\r\n}\r\nSystem.out.println("3");\r\n}\r\n// InterruptedException is a direct subclass of Exception.\r\nstatic void f() throws InterruptedException {\r\nthrow new InterruptedException("Time to go home.");\r\n}\r\n}\r\nSelect the one correct answer. ', 2, 'Exceptions'),
(105, 'What is wrong with the following code?\r\npublic class MyClass {\r\npublic static void main(String[] args) throws A {\r\ntry {\r\nf();\r\n} finally {\r\nSystem.out.println("Done.");\r\n} catch (A e) {\r\nthrow e;\r\n}\r\n}\r\npublic static void f() throws B {\r\nthrow new B();\r\n}\r\n}\r\nclass A extends Throwable {}\r\nclass B extends A {}\r\nSelect the one correct answer. \r\n', 2, 'Interface avec le sy'),
(106, 'What, if anything, would cause the following code not to compile?\r\nclass A {\r\nvoid f() throws ArithmeticException {\r\n//...\r\n}\r\n}\r\npublic class MyClass extends A {\r\npublic static void main(String[] args) {\r\nA obj = new MyClass();\r\ntry {\r\nobj.f();\r\n} catch (ArithmeticException e) {\r\nreturn;\r\n} catch (Exception e) {\r\nSystem.out.println(e);\r\nthrow new RuntimeException("Something wrong here");\r\n}\r\n}\r\n// InterruptedException is a direct subclass of Exception.\r\nvoid f() throws InterruptedException {\r\n/', 2, 'Genericite'),
(107, 'Which of the following are valid runtime options?\r\nSelect the two correct answers.\r\n', 2, 'Genericite'),
(108, 'What will be the result of compiling and running the following code with assertions\r\nenabled?\r\npublic class TernaryAssertion {\r\npublic static void assertBounds(int low, int high, int value) {\r\nassert ( value > low ? value < high : false )\r\n: (value < high ? "too low" : "too high" );\r\n}\r\npublic static void main(String[] args) {\r\nassertBounds(100, 200, 150); \r\n}\r\n}\r\nSelect the one correct answer. ', 2, 'Entrees Sorties'),
(109, 'public static void main(String[] args) {\r\n // INSERT DECLARATION HERE\r\n for (int i = 0; i <= 10; i++) {\r\n List<Integer> row = new ArrayList<Integer>();\r\n for (int j = 0; j <= 10; j++)\r\n row.add(i * j);\r\n table.add(row);\r\n }\r\n for (List<Integer> row : table)\r\n System.out.println(row);\r\n }\r\n Which statements could be inserted at // INSERT DECLARATION HERE to allow this code to\r\n compile and run? (Choose all that apply.) \r\n', 2, 'Collections'),
(110, 'Which statements are true about comparing two instances of the same class, given that the\r\n equals() and hashCode() methods have been properly overridden? (Choose all that apply.', 2, 'les bases '),
(111, 'Given:\r\n public static void before() {\r\n Set set = new TreeSet();\r\n set.add("2");\r\n set.add(3); \r\nset.add("1");\r\n Iterator it = set.iterator();\r\n while (it.hasNext())\r\n System.out.print(it.next() + " ");\r\n }\r\n Which statements are true? \r\n', 2, 'Genericite'),
(112, 'Give:\r\n11. public static Iterator reverse(List list) {\r\n12. Collections.reverse(list);\r\n13. return list.iterator();\r\n14. }\r\n15. public static void main(String[] args) {\r\n16. List list = new ArrayList();\r\n17. list.add(â€ 1â€); list.add(â€2â€); list.add(â€3â€);\r\n18. for (Object obj: reverse(list))\r\n19. System.out.print(obj + â€œ,â€);20. }\r\nâ€˜What is the result?\r\n', 2, 'Exceptions'),
(113, 'Given:\r\n11. public static Collection get() {\r\n12. Collection sorted = new LinkedList();\r\n13. sorted.add(â€™Bâ€); sorted.add(â€Câ€); sorted.add(â€Aâ€);\r\n14. return sorted;\r\n15. }\r\n16. public static void main(String[] args) {\r\n17. for (Object obj: get()) {\r\n18. System.out.print(obj + â€œ, â€œ);\r\n19. }\r\n20. }\r\nWhat is the result? ', 2, 'Genericite'),
(114, 'Given:\n11. public class Key {\n12. private long id1;\n13. private long 1d2;\n14.\n15. // class Key methods\n16. }\nA programmer is developing a class Key, that will be used as a key in a standard\njava.util.HashMap. Which two methods should be\noverridden to assure that Key works correctly as a key? (Choose two.)', 2, 'Securite'),
(115, 'Which two statements are true about the hashCode method? (Choose two.)', 2, 'Genericite'),
(116, 'Given:\r\n1. import java.util.*;\r\n2. public class Test { 3. public static void main(String[] args) {\r\n4. List<String> strings = new ArrayList<String>();\r\n5. // insert code here\r\n6. } \r\n7. }\r\nWhich four, inserted at line 5, will allow compilation to succeed?\r\n(Choose four.)\r\n', 2, 'Genericite'),
(117, 'Given:\r\n11. public static void append(List list) { list.add(â€0042â€); }\r\n12. public static void main(String[] args) {\r\n13. List<Integer> intList = new ArrayList<Integer>();\r\n14. append(intList);\r\n15. System.out.println(intList.get(0));\r\n16. }\r\nâ€˜What is the result?\r\n', 2, 'Genericite'),
(118, 'Given:\r\n1. public class Drink implements Comparable {\r\n2. public String name;\r\n3. public int compareTo(Object o) {\r\n4. return 0;\r\n5. }\r\n6. }\r\nand:\r\n20. Drink one = new Drink();\r\n21. Drink two = new Drink();\r\n22. one.name= â€œCoffeeâ€;\r\n23. two.name= â€œTeaâ€;\r\n23. TreeSet set = new TreeSet();\r\n24. set.add(one);\r\n25. set.add(two);\r\nA programmer iterates over the TreeSet and prints the name of each\r\nDrink object.\r\nWhat is the result? ', 2, 'Collections'),
(119, '11. Given:\r\nint[] myArray=newint[] {1, 2,3,4, 5}; \r\nWhat allows you to create a list from this array? ', 2, 'Collections'),
(120, 'Given:\r\n13. public static void search(List<String> list) {\r\n14. list.clear();\r\n15. list.add(â€bâ€);\r\n16. list.add(â€aâ€);\r\n17. list.add(â€câ€);\r\n18. System.out.println(Collections.binarySearch(list, â€œaâ€));\r\n19. }\r\nWhat is the result of calling search with a valid List implementation? ', 2, 'Collections'),
(121, 'Given:\n1. import java.util.*;\n2\n3. public class LetterASort {\n4. public static void main(String[] args) {\n5. ArrayList<String> strings = new ArrayList<String>();\n6. strings.add(â€™aAaAâ€);\n7. strings.add(â€AaAâ€);\n8. strings.add(â€™aAaâ€);\n9. strings.add(â€AAaaâ€);\n10. Collections.sort(strings);\n11. for (String s: strings) { System.out.print(s + â€œ â€œ); } \n12. }\n13. }\nWhat is the result? ', 2, 'Collections'),
(122, 'Given:\r\n34. HashMap props = new HashMap();\r\n35. props.put(â€key45â€, â€œsome valueâ€);\r\n36. props.put(â€key12â€, â€œsome other valueâ€);\r\n37. props.put(â€key39â€, â€œyet another valueâ€);\r\n38. Set s = props.keySet();\r\n39. // insert code here \r\nWhat, inserted at line 39, will sort the keys in the props HashMap? \r\n', 2, 'Interface avec le sy'),
(123, 'Given:\r\n1. import java.util.*;\r\n2. public class Example {\r\n3. public static void main(String[] args) {\r\n4. // insert code here\r\n5. set.add(new integer(2));\r\n6. set.add(new integer(l));\r\n7. System.out.println(set);\r\n8. }\r\n9. }\r\nWhich code, inserted at line 4, guarantees that this program will output [1, 2]? ', 2, 'Entrees Sorties'),
(124, 'A programmer has an algorithm that requires a java.util.List that provides an efficient implementation of add(0,object), but does\r\nNOT need to support quick random access. What supports these\r\nrequirements?\r\n', 2, 'Genericite'),
(125, 'Which collection class(es) allows you to grow or shrink its size and provides indexed access to\r\nits elements, but whose methods are not synchronized? (Choose all that apply.) \r\n', 2, 'Interface avec le sy'),
(126, '3. import java.util.*;\r\n 4. class Business { }\r\n 5. class Hotel extends Business { }\r\n 6. class Inn extends Hotel { }\r\n 7. public class Travel {\r\n 8. ArrayList<Hotel> go() {\r\n 9. // insert code here\r\n10. }\r\n11. }\r\nWhich, inserted independently at line 9, will compile? (Choose all that apply.)\r\n', 2, 'Collections');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(900) NOT NULL,
  `Correct` int(1) NOT NULL DEFAULT '0',
  `Id_Question` int(6) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_Question` (`Id_Question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=808 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`Id`, `reponse`, `Correct`, `Id_Question`) VALUES
(513, '(b) The code will fail to compile because the compiler will not be able to determine which if statement the else clause belongs to. ', 1, 90),
(514, '(c) The code will compile correctly and display the letter a, when run. ', 0, 90),
(515, '(d) The statement if (false) ; else ; is illegal', 1, 90),
(516, '(e) Only expressions which evaluate to a boolean value can be used as the condition in an if statement. ', 0, 90),
(517, '', 0, 90),
(518, '', 0, 90),
(519, '', 0, 90),
(520, '(a) The conditional expression in an if statement can have method calls.', 1, 91),
(521, '(b) If a and b are of type boolean, the expression (a = b) can be the conditional expression of an if statement', 1, 91),
(522, '(c) An if statement can have either an if clause or an else clause.', 0, 91),
(523, '(d) The statement if (false) ; else ; is illegal.', 0, 91),
(524, '(e) Only expressions which evaluate to a boolean value can be used as the condition in an if statement', 1, 91),
(525, '', 0, 91),
(526, '', 0, 91),
(527, '', 0, 91),
(528, '(a) The variable x does not have the right type for a switch expression. ', 0, 92),
(529, '(b) The case label 0 must precede case label 1. ', 0, 92),
(530, '(c) Each case section must end with a break statement. ', 0, 92),
(531, '(d) The default label must be the last label in the switch statement', 0, 92),
(532, '(e) The body of the switch statement must contain at least one statement. ', 0, 92),
(533, '(f) There is nothing wrong with the code. ', 1, 92),
(534, '', 0, 92),
(535, '', 0, 92),
(536, '(a) switch expression of type int and case label value of type char. ', 1, 93),
(537, '(b) switch expression of type float and case label value of type int. ', 0, 93),
(538, '(c) switch expression of type byte and case label value of type float.', 0, 93),
(539, '(d) switch expression of type char and case label value of type long. ', 0, 93),
(540, '(e) switch expression of type boolean and case label value of type boolean. ', 0, 93),
(541, '(f) switch expression of type Byte and case label value of type byte.', 1, 93),
(542, '(g) switch expression of type byte and case label value of type Byte. ', 0, 93),
(543, '', 0, 93),
(544, '(a) The code will fail to compile because of the case label value 2 * iLoc. ', 0, 94),
(545, '(b) The code will fail to compile because the default label is not specified last in the switch statement.', 0, 94),
(546, '(c) The code will compile correctly and will only print the following, when run: I am not OK. You are OK. It''s OK. ', 1, 94),
(547, '(d) The code will compile correctly and will only print the following, when run: You are OK. It''s OK. ', 0, 94),
(548, '(e) The code will compile correctly and will only print the following, when run: It''s OK', 0, 94),
(549, '', 0, 94),
(550, '', 0, 94),
(551, '', 0, 94),
(552, '(a) The code will fail to compile because the type of the switch expression is not valid. ', 0, 95),
(553, '(b) The code will compile correctly and will only print the following, when run: You are OK. I am not OK. ', 1, 95),
(554, '(c) The code will compile correctly and will only print the following, when run: You are OK. I am not OK. It''s OK. ', 0, 95),
(555, '(d) The code will compile correctly and will only print the following, when run: It''s OK.', 0, 95),
(556, '', 0, 95),
(557, '', 0, 95),
(558, '', 0, 95),
(559, '', 0, 95),
(560, '(a) The code will fail to compile because of the value of one of the case labels. ', 1, 96),
(561, '(b) The code will fail to compile because of the type of the switch expression. ', 0, 96),
(562, '(c) The code will compile correctly and will only print the following, when run: You are OK. It''s OK. ', 0, 96),
(563, '(d) The code will compile correctly and will only print the following, when run: It''s OK', 0, 96),
(564, '', 0, 96),
(565, '', 0, 96),
(566, '', 0, 96),
(567, '', 0, 96),
(568, '(a) The program will not compile because of the switch expression. ', 0, 97),
(569, '(b) The program will not compile, as enum constants cannot be used as case labels. ', 0, 97),
(570, '(c) The code will compile without error and will print 1, when run. ', 0, 97),
(571, '(d) The code will compile without error and will print 2, when run. ', 0, 97),
(572, '(e) The code will compile without error and will print 3, when run. ', 1, 97),
(573, '', 0, 97),
(574, '', 0, 97),
(575, '', 0, 97),
(576, '(a) The first number printed will be 9. ', 0, 98),
(577, '(b) The first number printed will be 10. ', 1, 98),
(578, '(c) The first number printed will be 11.', 0, 98),
(579, '(d) The second number printed will be 9. ', 0, 98),
(580, '(e) The second number printed will be 10', 1, 98),
(581, '(f) The second number printed will be 11.', 0, 98),
(582, '', 0, 98),
(583, '', 0, 98),
(584, '(a) The code will fail to compile because of an illegal switch expression in the switch statement. ', 0, 99),
(585, '(b) The code will fail to compile because of an illegal conditional expression in the if statement. ', 1, 99),
(586, '(c) The code will compile without error and will print the numbers 0 through 10, when run. ', 0, 99),
(587, '(d) The code will compile without error and will print the number 0, when run. ', 0, 99),
(588, '(e) The code will compile without error and will print the number 0 twice, when run. ', 0, 99),
(589, '(f) The code will compile without error and will print the numbers 1 through 10, when run. ', 0, 99),
(590, '', 0, 99),
(591, '', 0, 99),
(592, '(a) The program will fail to compile. ', 0, 100),
(593, '(b) The program will print 3, 3, when run.', 0, 100),
(594, '(c) The program will print 4, 3, when run, if break is replaced by continue. ', 1, 100),
(595, '(d) The program will fail to compile if break is replaced by return. ', 0, 100),
(596, '(e) The program will fail to compile if break is by an empty statement. ', 0, 100),
(597, '', 0, 100),
(598, '', 0, 100),
(599, '', 0, 100),
(600, ' (a) Object[] nums = {20, 30, 40}; ', 0, 101),
(601, '(b) Number[] nums = {20, 30, 40}; ', 0, 101),
(602, '(c) Integer[] nums = {20, 30, 40}; ', 1, 101),
(603, '(d) int[] nums = {20, 30, 40};', 1, 101),
(604, '(e) None of the above', 0, 101),
(605, '', 0, 101),
(606, '', 0, 101),
(607, '', 0, 101),
(608, '(a) The program will only print 5. ', 0, 102),
(609, '(b) The program will only print 1 and 4, in that order. ', 0, 102),
(610, '(c) The program will only print 1, 2, and 4, in that order. ', 1, 102),
(611, '(d) The program will only print 1, 4, and 5, in that order.', 0, 102),
(612, '(e) The program will only print 1, 2, 4, and 5, in that order. ', 0, 102),
(613, '(f) The program will only print 3 and 5, in that order.', 0, 102),
(614, '', 0, 102),
(615, '', 0, 102),
(616, '(a) If run with no arguments, the program will produce no output. ', 0, 103),
(617, '(b) If run with no arguments, the program will print "The end". ', 1, 103),
(618, '(c) The program will throw an ArrayIndexOutOfBoundsException. ', 0, 103),
(619, '(d) If run with one argument, the program will simply print the given argument. ', 0, 103),
(620, '(e) If run with one argument, the program will print the given argument followed by "The end". ', 1, 103),
(621, '', 0, 103),
(622, '', 0, 103),
(623, '', 0, 103),
(624, '(a) The program will print 2 and throw InterruptedException. ', 1, 104),
(625, '(b) The program will print 1 and 2, in that order.', 0, 104),
(626, '(c) The program will print 1, 2, and 3, in that order. ', 0, 104),
(627, '(d) The program will print 2 and 3, in that order', 0, 104),
(628, '(e) The program will print 3 and 2, in that order', 0, 104),
(629, '(f) The program will print 1 and 3, in that order', 0, 104),
(630, '', 0, 104),
(631, '', 0, 104),
(632, '(a) The main() method must declare that it throws B.', 0, 105),
(633, '(b) The finally block must follow the catch block in the main() method.', 1, 105),
(634, '(c) The catch block in the main() method must declare that it catches B rather than A. ', 0, 105),
(635, '(d) A single try block cannot be followed by both a finally and a catch block. ', 0, 105),
(636, '(e) The declaration of class A is illegal. ', 0, 105),
(637, '', 0, 105),
(638, '', 0, 105),
(639, '', 0, 105),
(640, '(a) The main() method must declare that it throws RuntimeException. ', 0, 106),
(641, '(b) The overriding f() method in MyClass must declare that it throws ArithmeticException, since the f() method in class A declares that it does. ', 0, 106),
(642, '(c) The overriding f() method in MyClass is not allowed to throw InterruptedException, since the f() method in class A does not throw this exception. ', 1, 106),
(643, '(d) The compiler will complain that the catch(ArithmeticException) block shadows the catch(Exception) block', 0, 106),
(644, '(e) You cannot throw exceptions from a catch block.', 0, 106),
(645, '(f) Nothing is wrong with the code, it will compile without errors. ', 0, 106),
(646, '', 0, 106),
(647, '', 0, 106),
(648, '(a) -ae', 0, 107),
(649, '(b) -enableassertions ', 1, 107),
(650, '(c) -source 1.6 ', 0, 107),
(651, '(d) -disablesystemassertions ', 1, 107),
(652, '(e) -dea ', 0, 107),
(653, '', 0, 107),
(654, '', 0, 107),
(655, '', 0, 107),
(656, '(a) The compilation fails because the method name assertBounds cannot begin with the keyword assert.', 0, 108),
(657, '(b) The compilation fails because the assert statement is invalid. ', 0, 108),
(658, '(c) The compilation succeeds and the program runs without errors. ', 1, 108),
(659, '(d) The compilation succeeds and an AssertionError with the error message "too low" is thrown. ', 0, 108),
(660, '(e) The compilation succeeds and an AssertionError with the error message "too high" is thrown. ', 0, 108),
(661, '', 0, 108),
(662, '', 0, 108),
(663, '', 0, 108),
(664, 'A. List<List<Integer>> table = new List<List<Integer>>(); ', 0, 109),
(665, 'B. List<List<Integer>> table = new ArrayList<List<Integer>>(); ', 1, 109),
(666, 'C. List<List<Integer>> table = new ArrayList<ArrayList<Integer>>(); ', 0, 109),
(667, 'D. List<List, Integer> table = new List<List, Integer>();', 0, 109),
(668, 'E. List<List, Integer> table = new ArrayList<List, Integer>(); ', 0, 109),
(669, 'F. List<List, Integer> table = new ArrayList<ArrayList, Integer>(); ', 0, 109),
(670, 'G. None of the above', 0, 109),
(671, '', 0, 109),
(672, 'A. If the equals() method returns true, the hashCode() comparison == might return false ', 0, 110),
(673, 'B. If the equals() method returns false, the hashCode() comparison == might return true ', 1, 110),
(674, 'C. If the hashCode() comparison == returns true, the equals() method must return true ', 0, 110),
(675, 'D. If the hashCode() comparison == returns true, the equals() method might return true ', 1, 110),
(676, 'E. If the hashCode() comparison != returns true, the equals() method might return true ', 0, 110),
(677, '', 0, 110),
(678, '', 0, 110),
(679, '', 0, 110),
(680, 'A. The before() method will print 12', 0, 111),
(681, 'B. The before() method will print 123 ', 0, 111),
(682, 'C. The before() method will print three numbers, but the order cannot be determined', 0, 111),
(683, 'D. The before() method will not compile', 0, 111),
(684, 'E. The before() method will throw an exception at runtime', 1, 111),
(685, '', 0, 111),
(686, '', 0, 111),
(687, '', 0, 111),
(688, 'A. 3,2, 1,', 0, 112),
(689, 'B. 1, 2, 3, ', 0, 112),
(690, 'C. Compilation fails. ', 1, 112),
(691, 'D. The code runs with no output.', 0, 112),
(692, 'E. An exception is thrown at runtime. ', 0, 112),
(693, '', 0, 112),
(694, '', 0, 112),
(695, '', 0, 112),
(696, 'A. A, B, C, ', 0, 113),
(697, 'B. B, C, A,', 1, 113),
(698, 'C. Compilation fails. ', 0, 113),
(699, 'D. The code runs with no output. ', 0, 113),
(700, 'E. An exception is thrown at runtime. ', 0, 113),
(701, '', 0, 113),
(702, '', 0, 113),
(703, '', 0, 113),
(704, 'A. public int hashCode() ', 1, 114),
(705, 'B. public boolean equals(Key k', 0, 114),
(706, 'C. public int compareTo(Object o) ', 0, 114),
(707, 'D. public boolean equals(Object o)', 1, 114),
(708, 'E. public boolean compareTo(Key k) ', 0, 114),
(709, '', 0, 114),
(710, '', 0, 114),
(711, '', 0, 114),
(712, 'A. The hashCode method for a given class can be used to test for object equality and object inequality for that class. ', 0, 115),
(713, 'B. The hashCode method is used by the java.util.SortedSet collection class to order the elements within that set. ', 1, 115),
(714, 'C. The hashCode method for a given class can be used to test for object inequality, but NOT object equality, for that class. ', 0, 115),
(715, 'D. The only important characteristic of the values returned by a hashCode method is that the distribution of values must follow a Gaussian distribution. ', 0, 115),
(716, 'E. The hashCode method is used by the java.util.HashSet collection class to group the elements within that set into hash buckets for swift retrieval.', 1, 115),
(717, '', 0, 115),
(718, '', 0, 115),
(719, '', 0, 115),
(720, 'A. String s = strings.get(0);', 1, 116),
(721, 'B. Iterator i1 = strings.iterator(); ', 1, 116),
(722, 'C. String[] array1 = strings.toArray(); ', 0, 116),
(723, 'D. Iterator<String> i2 = strings.iterator();', 1, 116),
(724, 'E. String[] array2 = strings.toArray(new String[1]); ', 1, 116),
(725, 'F. Iterator<String> i3 = strings.iterator<String>(); ', 0, 116),
(726, '', 0, 116),
(727, '', 0, 116),
(728, 'A. 42 ', 0, 117),
(729, 'B. 0042', 1, 117),
(730, 'C. An exception is thrown at runtime. ', 0, 117),
(731, 'D. Compilation fails because of an error in line 13. ', 0, 117),
(732, 'E. Compilation fails because of an error in line 14. ', 0, 117),
(733, '', 0, 117),
(734, '', 0, 117),
(735, '', 0, 117),
(736, 'A. Tea ', 1, 118),
(737, 'B. Coffee ', 0, 118),
(738, 'C. Coffee Tea', 0, 118),
(739, 'D. Compilation fails. ', 0, 118),
(740, 'E. The code runs with no output. ', 0, 118),
(741, 'F. An exception is thrown at runtime. ', 0, 118),
(742, '', 0, 118),
(743, '', 0, 118),
(744, 'A. List myList = myArray.asList(); ', 0, 119),
(745, 'B. List myList = Arrays.asList(myArray);', 1, 119),
(746, 'C. List myList = new ArrayList(myArray); ', 0, 119),
(747, 'D. List myList = Collections.fromArray(myArray);', 0, 119),
(748, '', 0, 119),
(749, '', 0, 119),
(750, '', 0, 119),
(751, '', 0, 119),
(752, '0', 0, 120),
(753, '1', 0, 120),
(754, '2', 0, 120),
(755, 'a', 0, 120),
(756, 'b', 0, 120),
(757, 'c', 0, 120),
(758, ' The result is undefined. ', 1, 120),
(759, '', 0, 120),
(760, 'A. Compilation fails. ', 0, 121),
(761, 'B. aAaA aAa AAaa AaA ', 0, 121),
(762, 'C. AAaa AaA aAa aAaA ', 1, 121),
(763, 'D. AaA AAaa aAaA aAa ', 0, 121),
(764, 'E. aAa AaA aAaA AAaa ', 0, 121),
(765, 'F. An exception is thrown at runtime.', 0, 121),
(766, '', 0, 121),
(767, '', 0, 121),
(768, 'A. Arrays.sort(s); ', 0, 122),
(769, 'B. s = new TreeSet(s); ', 1, 122),
(770, 'C. Collections.sort(s); ', 0, 122),
(771, 'D. s = new SortedSet(s); ', 0, 122),
(772, '', 0, 122),
(773, '', 0, 122),
(774, '', 0, 122),
(775, '', 0, 122),
(776, 'A. Set set = new TreeSet(); ', 1, 123),
(777, 'B. Set set = new HashSet();', 0, 123),
(778, 'C. Set set = new SortedSet(); ', 0, 123),
(779, 'D. List set = new SortedList(); ', 0, 123),
(780, 'E. Set set = new LinkedHashSet();', 0, 123),
(781, '', 0, 123),
(782, '', 0, 123),
(783, '', 0, 123),
(784, 'A. java.util.Queue ', 0, 124),
(785, 'B. java.util.ArrayList ', 0, 124),
(786, 'C. java.util.LinearList ', 0, 124),
(787, 'D. java.util.LinkedList', 1, 124),
(788, '', 0, 124),
(789, '', 0, 124),
(790, '', 0, 124),
(791, '', 0, 124),
(792, 'A. java.util.HashSet  ', 0, 125),
(793, 'B. java.util.LinkedHashSet ', 0, 125),
(794, 'C. java.util.List ', 0, 125),
(795, 'D. java.util.ArrayList ', 1, 125),
(796, 'E. java.util.Vector', 0, 125),
(797, 'F. java.util.PriorityQueue ', 0, 125),
(798, '', 0, 125),
(799, '', 0, 125),
(800, 'A. return new ArrayList<Inn>(); ', 0, 126),
(801, ' B. return new ArrayList<Hotel>(); ', 1, 126),
(802, 'C. return new ArrayList<Object>(); ', 0, 126),
(803, ' D. return new ArrayList<Business>();', 0, 126),
(804, '', 0, 126),
(805, '', 0, 126),
(806, '', 0, 126),
(807, '', 0, 126);

-- --------------------------------------------------------

--
-- Structure de la table `reponseexamenfinal`
--

CREATE TABLE IF NOT EXISTS `reponseexamenfinal` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(900) NOT NULL,
  `Correct` int(1) NOT NULL,
  `Id_Question` int(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Contenu de la table `reponseexamenfinal`
--

INSERT INTO `reponseexamenfinal` (`Id`, `reponse`, `Correct`, `Id_Question`) VALUES
(7, '(b) The code will fail to compile because the compiler will not be able to determine which if statement the else clause belongs to. ', 0, 3),
(8, '(c) The code will compile correctly and display the letter a, when run. ', 0, 3),
(9, '(d) The statement if (false) ; else ; is illegal', 1, 3),
(10, '(e) Only expressions which evaluate to a boolean value can be used as the condition in an if statement. ', 0, 3),
(11, '', 0, 3),
(12, '', 0, 3),
(13, '', 0, 3),
(14, '', 0, 3),
(15, '(a) The conditional expression in an if statement can have method calls.', 1, 4),
(16, '(b) If a and b are of type boolean, the expression (a = b) can be the conditional expression of an if statement', 1, 4),
(17, '(c) An if statement can have either an if clause or an else clause.', 0, 4),
(18, '(d) The statement if (false) ; else ; is illegal.', 0, 4),
(19, '(e) Only expressions which evaluate to a boolean value can be used as the condition in an if statement', 0, 4),
(20, '', 0, 4),
(21, '', 0, 4),
(22, '', 0, 4),
(23, '(a) The variable x does not have the right type for a switch expression. ', 0, 5),
(24, '(b) The case label 0 must precede case label 1. ', 0, 5),
(25, '(c) Each case section must end with a break statement. ', 0, 5),
(26, '(d) The default label must be the last label in the switch statement', 0, 5),
(27, '(e) The body of the switch statement must contain at least one statement. ', 0, 5),
(28, '(f) There is nothing wrong with the code. ', 1, 5),
(29, '', 0, 5),
(30, '', 0, 5),
(31, '(a) switch expression of type int and case label value of type char. ', 1, 6),
(32, '(b) switch expression of type float and case label value of type int. ', 0, 6),
(33, '(c) switch expression of type byte and case label value of type float.', 0, 6),
(34, '(d) switch expression of type char and case label value of type long. ', 0, 6),
(35, '(e) switch expression of type boolean and case label value of type boolean. ', 0, 6),
(36, '(f) switch expression of type Byte and case label value of type byte.', 1, 6),
(37, '(g) switch expression of type byte and case label value of type Byte. ', 0, 6),
(38, '', 0, 6),
(39, '(a) The code will fail to compile because of the case label value 2 * iLoc. ', 0, 7),
(40, '(b) The code will fail to compile because the default label is not specified last in the switch statement.', 0, 7),
(41, '(c) The code will compile correctly and will only print the following, when run: I am not OK. You are OK. It''s OK. ', 1, 7),
(42, '(d) The code will compile correctly and will only print the following, when run: You are OK. It''s OK. ', 0, 7),
(43, '(e) The code will compile correctly and will only print the following, when run: It''s OK', 0, 7),
(44, '', 0, 7),
(45, '', 0, 7),
(46, '', 0, 7),
(47, '(a) The code will fail to compile because the type of the switch expression is not valid. ', 0, 8),
(48, '(b) The code will compile correctly and will only print the following, when run: You are OK. I am not OK. ', 1, 8),
(49, '(c) The code will compile correctly and will only print the following, when run: You are OK. I am not OK. It''s OK. ', 0, 8),
(50, '(d) The code will compile correctly and will only print the following, when run: It''s OK.', 0, 8),
(51, '', 0, 8),
(52, '', 0, 8),
(53, '', 0, 8),
(54, '', 0, 8),
(55, '(a) The code will fail to compile because of the value of one of the case labels. ', 1, 9),
(56, '(b) The code will fail to compile because of the type of the switch expression. ', 0, 9),
(57, '(c) The code will compile correctly and will only print the following, when run: You are OK. It''s OK. ', 0, 9),
(58, '(d) The code will compile correctly and will only print the following, when run: It''s OK', 0, 9),
(59, '', 0, 9),
(60, '', 0, 9),
(61, '', 0, 9),
(62, '', 0, 9),
(63, '(a) The program will not compile because of the switch expression. ', 0, 10),
(64, '(b) The program will not compile, as enum constants cannot be used as case labels. ', 0, 10),
(65, '(c) The code will compile without error and will print 1, when run. ', 0, 10),
(66, '(d) The code will compile without error and will print 2, when run. ', 0, 10),
(67, '(e) The code will compile without error and will print 3, when run. ', 1, 10),
(68, '', 0, 10),
(69, '', 0, 10),
(70, '', 0, 10),
(71, 'A. public int hashCode() ', 1, 11),
(72, 'B. public boolean equals(Key k', 0, 11),
(73, 'C. public int compareTo(Object o) ', 0, 11),
(74, 'D. public boolean equals(Object o)', 1, 11),
(75, 'E. public boolean compareTo(Key k) ', 0, 11),
(76, '', 0, 11),
(77, '', 0, 11),
(78, '', 0, 11),
(79, 'A. The hashCode method for a given class can be used to test for object equality and object inequality for that class. ', 0, 12),
(80, 'B. The hashCode method is used by the java.util.SortedSet collection class to order the elements within that set. ', 1, 12),
(81, 'C. The hashCode method for a given class can be used to test for object inequality, but NOT object equality, for that class. ', 0, 12),
(82, 'D. The only important characteristic of the values returned by a hashCode method is that the distribution of values must follow a Gaussian distribution. ', 0, 12),
(83, 'E. The hashCode method is used by the java.util.HashSet collection class to group the elements within that set into hash buckets for swift retrieval.', 1, 12),
(84, '', 0, 12),
(85, '', 0, 12),
(86, '', 0, 12),
(87, 'A. Compilation fails. ', 0, 13),
(88, 'B. aAaA aAa AAaa AaA ', 0, 13),
(89, 'C. AAaa AaA aAa aAaA ', 1, 13),
(90, '', 0, 13),
(91, '', 0, 13),
(92, '', 0, 13),
(93, '', 0, 13),
(94, '', 0, 13);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`Id_Question`) REFERENCES `questions` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
