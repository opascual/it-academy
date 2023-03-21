# IT Academy Exercices

- Fizzbuzz technical test
- Layout exercices

## Fizzbuzz test

Technical test to print a list of numbers with some restrictions using TDD:

- Print fizz if the number is multiple of 3
- Print buzz if the number is multiple of 5
- Print fizzbuzz if the number is multiple of 3 and 5

## Level 1

Inside nivell-1 folder we can find the requested layout for Desktop, Tablet and Mobile.

## Level 2

Inside nivell-2 folder we can find the final website with graphics and icons. The layout is still responsive for Desktop, Tablet and Mobile.

## Level 3

Inside nivell-3 folder we develop the final website with graphics and icons but using Grid layout. The layout will be responsive for Desktop, Tablet and Mobile.

## PHP

- `HelloWorld.php` is the classical introductory exercise. Just returns "Hello, World!".

- `ReverseString.php` reverse a string.

- `ResistorColor.php` look up the numerical value associated with a particular color band to list the different band colors.

- `Hamming.php` calculates the Hamming Distance between two DNA strands. If we compare two strands of DNA and count the differences between them we can see how many mistakes occurred. This is known as the "Hamming Distance".

- `Gigasecond.php` determine the date and time one gigasecond after a certain date. A gigasecond is one thousand million seconds. If you were born on `January 24th, 2015 at 22:00 (10:00:00pm)`, then you would be a gigasecond old on `October 2nd, 2046 at 23:46:40 (11:46:40pm)`.

- `Tournament.php` talls the results of a small football competition. The outcome should be ordered by points, descending. In case of a tie, teams are ordered alphabetically.

- `SimpleCipher.php` implements a simple shift cipher like Caesar and a more secure substitution cipher. The code allow us to specify a key and use that for the shift distance. This is called a substitution cipher. If someone doesn't submit a key at all, generates a truly random key of at least 100 alphanumeric characters in length.

- `HighScores.php` returns the list of scores, the highest score from the list, the last added score and the three highest scores.

- `Bob.php` Bob is a lackadaisical teenager. In conversation, his responses are very limited.

  - Bob answers 'Sure.' if you ask him a question, such as "How are you?".

  - He answers 'Whoa, chill out!' if you YELL AT HIM (in all capitals).

  - He answers 'Calm down, I know what I'm doing!' if you yell a question at him.

  - He says 'Fine. Be that way!' if you address him without actually saying anything.

  - He answers 'Whatever.' to anything else.

- `RnaTranscription.php` given a DNA strand, return its RNA complement (per RNA transcription).

- `Luhn.php` given a number determines whether or not it is valid per the Luhn formula. The Luhn algorithm is a simple checksum formula used to validate a variety of identification numbers, such as credit card numbers and Canadian Social Insurance Numbers.

- `Isogram.php` determine if a word or phrase is an isogram. An isogram (also known as a "nonpattern word") is a word or phrase without a repeating letter, however spaces and hyphens are allowed to appear multiple times.

- `Robot.php` generates a random name in the format of two uppercase letters followed by three digits, such as RX837 or BC811. Every once in a while we need to reset a robot to its factory settings, which means that its name gets wiped. The next time you ask, that robot will respond with a new random name. The names must be random and ensure that every existing robot has a unique name.

- `DifferenceOfSquares.php` finds the difference between the square of the sum and the sum of the squares of the first N natural.

  - The square of the sum of n natural numbers (1 + 2 + ... + n)² => `(n * (n + 1)) / 2`.
  - The sum of the squares of n natural numbers 1² + 2² + ... + n² => `(n * (n + 1) * ((n * 2) + 1)) / 6`
  - Difference between first and second

- `GradeSchool.php` creates a roster for the school given student's names along with the grade that they are in.

  - Add a student's name to the roster for a grade
  - Get a list of all students enrolled in a grade
  - Get a sorted list of all students in all grades. Grades should sort as 1, 2, 3, etc., and students within a grade should be sorted alphabetically by name.

- `RobotSimulator.php` The robots have three possible movements: turn right, turn left and advance. Robots are placed on a hypothetical infinite grid, facing a particular direction (north, east, south, or west) at a set of {x,y} coordinates. The robot then receives a number of instructions, as a string, at which point the testing facility verifies the robot's new position, and in which direction it is pointing, where:
  - A = advance
  - R = turn right
  - L = turn left
